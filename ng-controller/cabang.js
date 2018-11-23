angular.module("RDash").controller("Cabang",function($scope,$rootScope,$http,$window,$location,$timeout,$state){
	$rootScope.title_tag = "Data Kantor Cabang";
	$scope.filter = {};
	$scope.first_loading = true;
	$scope.get_data = function(){
		$scope.loading = true;
		$scope.query_string = jQuery.param($scope.filter);
		$http.post('api/index.php/cabang/data',{
			keyword : $scope.filter.keyword,
		}).success(function(data){
			$scope.loading = false;
			$scope.array_cabang = data;
		}).error(function(err){ console.log(err); });	
	}
	//membuat keyup fuction cari
	$scope.get_data();
	$scope.cari = function(){
		$timeout.cancel(search_timeout);
		search_timeout = $timeout(function(){
			$scope.get_data();
		},500);
	}
	$scope.hapus = function(cbg){
		console.log(cbg);
		var yes = $window.confirm("Anda yakin akan menghapus cabang "+cbg.nama_cabang+"?");
		if(yes){
			$http.post('api/index.php/cabang/simpan',{
				ID : cbg.ID,
				status : 0
			}).success(function(data){
				$scope.loading = false;
				$.toast({
				    heading: data.status ? 'Berhasil' : 'Error',
				    text: 'Berhasil menghapus cabang '+cbg.nama_cabang,
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