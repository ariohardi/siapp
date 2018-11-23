var search_timeout;
angular.module("RDash").controller("Edit_anggota_regu",function($scope,$rootScope,$http,$window,$location,$timeout,$state){
	$rootScope.title_tag = "Data Anggota Regu";
	$scope.filter = {};
	$scope.filter.level = "";
	$scope.filter.keyword = "";
	$scope.filter.jenis_kelamin = "";
	$scope.loading = true;
	$scope.anggota_terpilih_id = [];
	$scope.anggota_terpilih_data = [];
	$scope.route = $location.path().substring(1).split('/');
	$scope.get_data = function(){
		$scope.loading = true;
		$timeout(function(){
			$http.post('api/index.php/personil/satpam_danru',{
				level : $scope.filter.level,
				jenis_kelamin : $scope.filter.jenis_kelamin,
				keyword : $scope.filter.keyword,
				id_not_in : $scope.anggota_terpilih_id.join(",")
			}).success(function(data){
				$scope.loading = false;
				$scope.loading2 = true;
				$scope.array_personil = data;
				$http.post('api/index.php/regu/anggota_regu',{
					regu : $scope.regu.ID
				}).success(function(data){
					$scope.loading2 = false;
					if(data){
						$scope.anggota_terpilih_data = data;
					}
				}).error(function(err){ console.log(err); });
			}).error(function(err){ console.log(err); });
		},500);
	}
	$http.post('api/index.php/regu/detail_by_md5id',{
		md5_id : $scope.route[1]
	}).success(function(data){
		if(data){
			$scope.get_data();
			$scope.regu = data;
		}
	}).error(function(err){ console.log(err); });
	$scope.cari = function(){
		$timeout.cancel(search_timeout);
		search_timeout = $timeout(function(){
			$scope.get_data();
		},500);
	}
	$scope.pilih = function(personil){
		var param = {
			klien : $scope.regu.klien,
			proyek : $scope.regu.proyek,
			regu : $scope.regu.ID,
			satpam : personil.ID
		};
		$http.post('api/index.php/regu/tambah_anggota',param).success(function(data){
			console.log(data,param);
			if(data){
				$scope.get_data();
			}
		}).error(function(err){ console.log(err); });
	}
	$scope.hapus = function(personil){
		$scope.loading2 = true;
		var param = {
			regu : $scope.regu.ID,
			satpam : personil.ID
		};
		$http.post('api/index.php/regu/hapus_anggota',param).success(function(data){
			console.log(data,param);
			if(data){
				$scope.get_data();
			}
		}).error(function(err){ console.log(err); });
	}
	$scope.edit = function(context){
		$rootScope.tanggal_lahir = context.tanggal_lahir;
		$location.path("/edit_personil/"+context.ID);
	}
});