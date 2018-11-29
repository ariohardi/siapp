var search_timeout;
angular.module("RDash").controller("Hitung_Absensi",function($scope,$rootScope,$http,$window,$location,$timeout,$state,$filter,$sce){
	$rootScope.title_tag = "Hitung Absensi";
	$scope.absensi = [];
	$scope.filter = {};
	$scope.filter.keyword = "";
	$scope.loading = true;
	$scope.first_loading = true;
	$scope.date = new Date();
	$scope.filter.tanggal_awal = "2018-04-18";
	$scope.filter.tanggal_akhir = "2018-07-18";
	$scope.tanggal = $scope.date.getFullYear() + "-" + $rootScope.angka_bulan[$scope.date.getMonth()] + "-"+ ($scope.date.getDate() < 10 ? '0'+$scope.date.getDate() : $scope.date.getDate());
	$scope.tanggal_start = $scope.date.getFullYear() + "-" + $rootScope.angka_bulan[$scope.date.getMonth()] + "-"+ ($scope.date.getDate() < 10 ? '0'+$scope.date.getDate() : $scope.date.getDate());
	$scope.tanggal_end = $scope.date.getFullYear() + "-" + $rootScope.angka_bulan[$scope.date.getMonth()] + "-"+ ($scope.date.getDate() < 10 ? '0'+$scope.date.getDate() : $scope.date.getDate());
	$scope.tanggal_text = ($scope.date.getDate() < 10 ? '0'+$scope.date.getDate() : $scope.date.getDate()) + " " + $rootScope.nama_bulan[$scope.date.getMonth()] + " "+ $scope.date.getFullYear();
	$scope.get_data = function(){
		$scope.loading = true;
		$scope.query_string = jQuery.param($scope.filter);
			$http.post('api/index.php/hr/absensi',{
				keyword : $scope.filter.keyword,
				tanggal_awal : $scope.filter.tanggal_awal,
				tanggal_akhir : $scope.filter.tanggal_akhir,
				start : $scope.tanggal_start,
				end : $scope.tanggal_end,
				sort : "TANGGAL"
			}).success(function(data){
				$scope.loading = false;
				var datanya = [];
				var datahold = [];
				var totalDurasi = 0;
				angular.forEach(data, function(v, k){
					console.log('v',v);
					if(typeof v.jam_pulang !== "undefined"){
						var start = moment(v.jam_masuk.replace(" ","T"));
						var end = moment(v.jam_pulang.replace(" ","T"));
						var minutes = end.diff(start, 'minutes');
						var jamInt = Math.floor(minutes/60);
						var minInt = minutes%60;
						var jam = jamInt;
						var min = minInt;
						if(parseInt(jamInt)<10){
							jam = "0"+jam;
						}
						if(parseInt(minInt)<10){
							min = "0"+min;
						}
						data[k].durasi = jam+" jam "+ min + " menit";
						totalDurasi += jam;
					} else {
						data[k].durasi = "";
					}	
					data[k].tanggalnya = $filter('date')(new Date(v.tanggal) ,'dd/MM/yyyy');
					if(datahold.indexOf(v.id)<0){
						datahold.push(v.id);
						datanya.push(data[k]);
					}
				});
			$scope.array_absensi = data;
			$scope.totalDurasi = totalDurasi;
			}).error(function(err){ console.log(err); });
	}

	$scope.ganti_tanggal_awal = function(tgl){
		$scope.loading = true;
		$scope.filter.tanggal_awal = $filter('date')(tgl ,'yyyy-MM-dd');
		$scope.query_string = jQuery.param($scope.filter);
		$http.post('api/index.php/hr/absensi',{
				keyword : $scope.filter.keyword,
				tanggal_awal : $scope.filter.tanggal_awal,
				tanggal_akhir : $scope.filter.tanggal_akhir,
				start : $scope.tanggal_start,
				end : $scope.tanggal_end,
				sort : "TANGGAL"
			}).success(function(data){
				$scope.loading = false;
				var datanya = [];
				var datahold = [];
				var totalDurasi = 0;
				angular.forEach(data, function(v, k){
					console.log('v',v);
					if(typeof v.jam_pulang !== "undefined"){
						var start = moment(v.jam_masuk.replace(" ","T"));
						var end = moment(v.jam_pulang.replace(" ","T"));
						var minutes = end.diff(start, 'minutes');
						var jamInt = Math.floor(minutes/60);
						var minInt = minutes%60;
						var jam = jamInt;
						var min = minInt;
						if(parseInt(jamInt)<10){
							jam = "0"+jam;
						}
						if(parseInt(minInt)<10){
							min = "0"+min;
						}
						data[k].durasi = jam+" jam "+ min + " menit";
						totalDurasi += jam;
					} else {
						data[k].durasi = "";
					}	
					data[k].tanggalnya = $filter('date')(new Date(v.tanggal) ,'dd/MM/yyyy');
					if(datahold.indexOf(v.id)<0){
						datahold.push(v.id);
						datanya.push(data[k]);
					}
				});
			$scope.array_absensi = data;
			}).error(function(err){ console.log(err); });
	}

	$scope.ganti_tanggal_akhir = function(tgl){
		$scope.loading = true;
		$scope.filter.tanggal_akhir = $filter('date')(tgl ,'yyyy-MM-dd');
		$scope.query_string = jQuery.param($scope.filter);
		$http.post('api/index.php/hr/absensi',{
				keyword : $scope.filter.keyword,
				tanggal_awal : $scope.filter.tanggal_awal,
				tanggal_akhir : $scope.filter.tanggal_akhir,
				start : $scope.tanggal_start,
				end : $scope.tanggal_end,
				sort : "TANGGAL"
			}).success(function(data){
				$scope.loading = false;
				var datanya = [];
				var datahold = [];
				var totalDurasi = 0;
				angular.forEach(data, function(v, k){
					console.log('v',v);
					if(typeof v.jam_pulang !== "undefined"){
						var start = moment(v.jam_masuk.replace(" ","T"));
						var end = moment(v.jam_pulang.replace(" ","T"));
						var minutes = end.diff(start, 'minutes');
						var jamInt = Math.floor(minutes/60);
						var minInt = minutes%60;
						var jam = jamInt;
						var min = minInt;
						if(parseInt(jamInt)<10){
							jam = "0"+jam;
						}
						if(parseInt(minInt)<10){
							min = "0"+min;
						}
						data[k].durasi = jam+" jam "+ min + " menit";
						totalDurasi += jam;
					} else {
						data[k].durasi = "";
					}	
					data[k].tanggalnya = $filter('date')(new Date(v.tanggal) ,'dd/MM/yyyy');
					if(datahold.indexOf(v.id)<0){
						datahold.push(v.id);
						datanya.push(data[k]);
					}
				});
			$scope.array_absensi = data;
			}).error(function(err){ console.log(err); });
	}

	$scope.get_data();
	$scope.cari = function(){
		$timeout.cancel(search_timeout);
		search_timeout = $timeout(function(){
			$scope.get_data();
		},500);
	}
});