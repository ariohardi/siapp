angular.module("RDash").controller("Personil_baru",function($scope,$rootScope,$http,$location,$timeout,$state,$filter,$window){
	$scope.loading = true;
	$scope.FormData = {};
	$scope.route = $location.path().substring(1).split('/');
	$scope.FormData.jenis_kelamin = 'L';
	$scope.FormData.level = '';
	$scope.FormData.kabupaten = '';
	$scope.FormData.tanggal_lahir = "1990-04-18";
	$scope.foto_default = "img/guard.png";
	$scope.ketik_jabatan = function(indx){
		if($scope.FormData.pengalaman_kerja[indx].jabatan.length==0){
			$scope.FormData.pengalaman_kerja[indx].deskripsi = "";
			$scope.FormData.pengalaman_kerja[indx].bulan_masuk = "";
			$scope.FormData.pengalaman_kerja[indx].tahun_masuk = "";
			$scope.FormData.pengalaman_kerja[indx].bulan_keluar = "";
			$scope.FormData.pengalaman_kerja[indx].tahun_keluar = "";
		}
	}
	$scope.months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    $scope.onDateSelect = function(dateVal){
        alert(dateVal);
    }
	$rootScope.title_tag = "Tambah Personil Baru";
	$scope.widget_title = $rootScope.title_tag;
	
	$http.post('api/index.php/geo/propinsi').success(function(data){
		$scope.loading = false;
		$scope.array_propinsi = data;
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
		if($scope.FormData.password){
			if($scope.FormData.password.length<6){
				$.toast({
				    heading: 'Peringatan',
				    text: 'Panjang kata sandi minimal 6 karakter',
				    hideAfter: $rootScope.toastTimeout,
				    icon: 'info',
				    position: 'top-right'
				});
				return;
			}
			if($scope.FormData.password!==$scope.FormData.password2){
				$.toast({
				    heading: 'Peringatan',
				    text: 'Kata sandi yang Anda masukan tidak sama',
				    hideAfter: $rootScope.toastTimeout,
				    icon: 'info',
				    position: 'top-right'
				});
				return;
			}
		}
		$scope.loading = true;
		$scope.FormData.base64 = jQuery('#fotopersonil').attr('src');
		$http.post('api/index.php/personil/simpan',$scope.FormData).success(function(data){
			console.log(data);
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