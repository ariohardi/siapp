angular.module("RDash").controller("Regu",function($scope,$rootScope,$http,$window,$location,$timeout,$state){
	$rootScope.title_tag = "Daftar Regu";
	$scope.filter = {};
	$scope.filter.keyword = "";
	$scope.get_data = function(){
		$scope.loading = true;
		$scope.query_string = jQuery.param($scope.filter);
		$http.post('api/index.php/regu/data',{
			keyword : $scope.filter.keyword,
		}).success(function(data){
			$scope.loading = false;
			$scope.array_regu = data;
		}).error(function(err){ console.log(err); });
	}
	$scope.get_data();
	$scope.cari = function(){
		$timeout.cancel(search_timeout);
		search_timeout = $timeout(function(){
			$scope.get_data();
		},500);
	}
	$scope.hapus = function(ctx){
		console.log(ctx);
		var yes = $window.confirm("Anda yakin akan menghapus regu "+ctx.nama_regu+"?");
		if(yes){
			$http.post('api/index.php/regu/simpan',{
				ID : ctx.ID,
				status : 0
			}).success(function(data){
				$scope.loading = false;
				$.toast({
				    heading: data.status ? 'Berhasil' : 'Error',
				    text: 'Berhasil menghapus regu '+ctx.nama_regu,
				    hideAfter: $rootScope.toastTimeout,
				    icon: data.status ? 'success' : 'error',
				    position: 'top-right'
				});
				if(data.status){
					$state.go($state.current, {}, {reload: true});
				}
			}).error(function(err){ console.log(err); });
		}
	}
});