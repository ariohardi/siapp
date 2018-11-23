angular.module("RDash").controller("Edit_personil",function($scope,$rootScope,$http,$location,$timeout,$filter){
	$scope.loading = true;
	$rootScope.title_tag = "Edit Data Personil";
	$scope.route = $location.path().substring(1).split('/');
	$scope.widget_title = $rootScope.title_tag;
	$scope.FormData = {};
	$scope.months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
	$scope.FormData.tanggal_lahir = $rootScope.tanggal_lahir ? $rootScope.tanggal_lahir : "1990-04-18";
	$scope.foto_default = "img/guard.png";
	$http.post('api/index.php/geo/propinsi').success(function(data){
		$scope.loading = false;
		$scope.array_propinsi = data;
		$http.post('api/index.php/personil/detail',{
			ID : $scope.route[1]
		}).success(function(data){
			$scope.FormData = data;
			$scope.ganti_propinsi();
			$http.post('api/index.php/geo/kabupaten',{
				id_propinsi : $scope.FormData.propinsi
			}).success(function(data){
				$scope.loading = false;
				$scope.array_kabupaten = data;
				$http.post('api/index.php/personil/detail',{
					ID : $scope.route[1]
				}).success(function(data){
					data.tinggi_badan = parseInt(data.tinggi_badan);
					data.berat_badan = parseInt(data.berat_badan);
					data.gaji = parseInt(data.gaji);
					data.overtime = parseInt(data.overtime);
					$scope.FormData = data;
					if(parseInt(data.upload_foto)==1){
						$scope.foto_default = "api/foto/"+data.md5_id+".png";
					}
					console.log($scope.FormData);
				});
			}).error(function(err){ console.log(err); });
		});
	}).error(function(err){ console.log(err); });
	
	$scope.ganti_propinsi = function(){
		$scope.loading = true;
		$scope.FormData.kabupaten = '';
		$http.post('api/index.php/geo/kabupaten',{
			id_propinsi : $scope.FormData.propinsi
		}).success(function(data){
			$scope.loading = false;
			$scope.array_kabupaten = data;
		}).error(function(err){ console.log(err); });
	}

	$scope.tanggal_lahir = function(tgl){
		$scope.FormData.tanggal_lahir = $filter('date')(tgl ,'yyyy-MM-dd');
	}

	$scope.submit = function(){
		$scope.loading = true;
		$scope.FormData.base64 = jQuery('#fotopersonil').attr('src');
		$http.post('api/index.php/personil/simpan',$scope.FormData).success(function(data){
			$scope.loading = false;
			$.toast({
			    heading: data.status ? 'Berhasil' : 'Error',
			    text: data.message,
			    hideAfter: $rootScope.toastTimeout,
			    icon: data.status ? 'success' : 'error',
			    position: 'top-right'
			});
			if(data.status){
				$location.path("/personil");
			}
		}).error(function(err){ console.log(err); });
	}
});