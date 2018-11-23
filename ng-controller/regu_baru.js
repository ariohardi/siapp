angular.module("RDash").controller("Regu_baru",function($scope,$rootScope,$http,$location,$timeout){
	$scope.loading = true;
	$scope.FormData = {};
	$rootScope.title_tag = "Buat Regu Baru";
	$scope.widget_title = $rootScope.title_tag;
	/*Read Only*/
	$scope.ro = {};

	$http.post('api/index.php/klien/data').success(function(data){
		$scope.array_klien = data;
		$http.post('api/index.php/personil/komandan_regu',{
			sedang_tugas : '0'
		}).success(function(data){
			$scope.loading = false;
			$scope.array_komandan_regu = data;
		}).error(function(err){ console.log(err); });
	}).error(function(err){ console.log(err); });
	
	$scope.ganti_klien = function(){
		$scope.loading = true;
		$scope.FormData.proyek = "";
		$scope.ro.lokasi = "";
		$scope.ro.nama_propinsi = "";
		$scope.ro.nama_kabupaten = "";
		$scope.ro.chief_security = "";
		if($scope.FormData.klien) $timeout(function(){
			$http.post('api/index.php/proyek/data',{
				id_klien : $scope.FormData.klien
			}).success(function(data){
				$scope.loading = false;
				$scope.array_proyek = data;
			}).error(function(err){ console.log(err); });
		},250);
		else $scope.loading = false;	
	}

	$scope.ganti_proyek = function(){
		$scope.loading = true;
		if($scope.FormData.proyek) $timeout(function(){
			$http.post('api/index.php/proyek/full_detail',{
				ID : $scope.FormData.proyek
			}).success(function(data){
				$scope.loading = false;
				$scope.ro.lokasi = data.lokasi;
				$scope.ro.nama_propinsi = data.nama_propinsi;
				$scope.ro.nama_kabupaten = data.nama_kabupaten;
				$scope.ro.chief_security = data.chief_security;
			}).error(function(err){ console.log(err); });
		},250);
		else $scope.loading = false;	
	}

	$scope.submit = function(){
		$scope.loading = true;
		$http.post('api/index.php/regu/simpan',$scope.FormData).success(function(data){
			$scope.loading = false;
			$.toast({
			    heading: data.status ? 'Berhasil' : 'Error',
			    text: data.message,
			    hideAfter: $rootScope.toastTimeout,
			    icon: data.status ? 'success' : 'error',
			    position: 'top-right'
			});
			if(data.status){
				$location.path("/regu");
			}
		}).error(function(err){ console.log(err); });
	}
});