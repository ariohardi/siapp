angular.module("RDash").controller("Klien",function($scope,$rootScope,$http,$window,$location,$timeout,$state){
	$rootScope.title_tag = "Data Klien";
	$scope.filter = {};
	$scope.filter.keyword = "";
	$scope.get_data = function(){
		$scope.loading = true;
		$scope.query_string = jQuery.param($scope.filter);
		$http.post('api/index.php/klien/data',{
			keyword : $scope.filter.keyword,
		}).success(function(data){
			$scope.loading = false;
			$scope.array_klien = data;
		}).error(function(err){ console.log(err); });
	}
	$scope.get_data();
	$scope.cari = function(){
		$timeout.cancel(search_timeout);
		search_timeout = $timeout(function(){
			$scope.get_data();
		},500);
	}
	$scope.hapus = function(cbg){
		console.log(cbg);
		var yes = $window.confirm("Anda yakin akan menghapus klien "+cbg.nama_klien+"?");
		if(yes){
			$http.post('api/index.php/klien/simpan',{
				ID : cbg.ID,
				status : 0
			}).success(function(data){
				$scope.loading = false;
				$.toast({
				    heading: data.status ? 'Berhasil' : 'Error',
				    text: 'Berhasil menghapus klien '+cbg.nama_klien,
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