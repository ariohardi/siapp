angular.module("RDash").controller("Absensi",function($scope,$rootScope,$http,$window,$location,$timeout,$state,$filter,$sce){
	$rootScope.title_tag = "Human Resources Information System";
	$scope.absensi = [];
	$scope.klien = "0";
	$scope.date = new Date();
	$scope.tanggal = $scope.date.getFullYear() + "-" + $rootScope.angka_bulan[$scope.date.getMonth()] + "-"+ ($scope.date.getDate() < 10 ? '0'+$scope.date.getDate() : $scope.date.getDate());
	$scope.tanggal_start = $scope.date.getFullYear() + "-" + $rootScope.angka_bulan[$scope.date.getMonth()] + "-"+ ($scope.date.getDate() < 10 ? '0'+$scope.date.getDate() : $scope.date.getDate());
	$scope.tanggal_end = $scope.date.getFullYear() + "-" + $rootScope.angka_bulan[$scope.date.getMonth()] + "-"+ ($scope.date.getDate() < 10 ? '0'+$scope.date.getDate() : $scope.date.getDate());
	$scope.tanggal_text = ($scope.date.getDate() < 10 ? '0'+$scope.date.getDate() : $scope.date.getDate()) + " " + $rootScope.nama_bulan[$scope.date.getMonth()] + " "+ $scope.date.getFullYear();
	setTimeout(function() {
	jQuery(function($){
		jQuery('.easyui-tabs-sub').tabs({tabPosition:"left",height:546,border:false});
		jQuery('#tt').tabs({
		    border:false,
		    selected:0
		});
		$("#dd-komponen").find(".menu-item").unbind('click');
        $("#dd-komponen").find(".menu-item").on("click", function(){
        	var selected = $(this).text().toUpperCase().trim();
        	alert(selected);
        });
        $("#p").panel();
        $('#cc-jadwal-karyawan').calendar({
		    current:new Date(),
		    onSelect: function(date){
				var tgl = (date.getFullYear()+"-"+(date.getMonth()+1<10 ? "0" : "")+(date.getMonth()+1)+"-"+(date.getDate()<10 ? "0" : "")+date.getDate());
				dgJadwalKaryawan(tgl);
			}
		});
        var date = new Date();
		var tgl = (date.getFullYear()+"-"+(date.getMonth()+1<10 ? "0" : "")+(date.getMonth()+1)+"-"+(date.getDate()<10 ? "0" : "")+date.getDate());
		var tgl_akhir = (date.getFullYear()+"-"+(date.getMonth()+1<10 ? "0" : "")+(date.getMonth()+1)+"-"+(date.getDate()<10 ? "0" : "")+date.getDate());
        dgJadwalKaryawan(tgl);
        // DATAGRID KOMPONEN GAJI
        dgKomponenGaji();
        dgDivisi();
        dgDepartemen();
        dgKaryawan();
        dgJadwalKerja();
        dgAbsensi(tgl, tgl_akhir);
	});
	}, 250);
	$scope.hello = function(){
		// alert("hello");
	}
	// $http.post('api/index.php/absensi/data_absensi_harian').success(function(data){
	// 	$scope.loading = false;
	// 	$scope.absensi = data;
	// }).error(function(err){ console.log(err); });
	// $scope.gantiTanggal = function(tgl){
	// 	$scope.tanggal = $filter('date')(tgl ,'yyyy-MM-dd');
	// 	$scope.tanggal_text = $filter('date')(tgl, 'dd');
	// 	$scope.tanggal_text += " "+ $rootScope.nama_bulan[parseInt($filter('date')(tgl, 'MM'))-1];
	// 	$scope.tanggal_text += " "+ $filter('date')(tgl, 'yyyy');
	// 	$http.post('api/index.php/absensi/data_absensi_harian', {
	// 		tanggal : $scope.tanggal
	// 	}).success(function(data){
	// 		$scope.loading = false;
	// 		$scope.absensi = data;
	// 	}).error(function(err){ console.log(err); });
	// }
	$scope.gantiTanggal = function(tgl){
		$scope.tanggal_start = $filter('date')(tgl ,'yyyy-MM-dd');
	}
	$scope.gantiTanggal1 = function(tgl){
		$scope.tanggal_end = $filter('date')(tgl ,'yyyy-MM-dd');
	}
	$scope.arrKlien = [];
	$http.post($rootScope.apiUrl("/DataKlienGrid"), {}).success(function(data){
		$scope.arrKlien = data.records;
	}).error(function(err){ console.log(err); });
	$scope.getAbsensi = function(){
		$scope.loading = true;
		$http.post($rootScope.apiUrl("/DataAbsensi"), {
			klien : jQuery("#klien").val(),
			start : $scope.tanggal_start,
			end : $scope.tanggal_end,
			sort : "TANGGAL"
		}).success(function(data){
			console.log(data, {
				klien : jQuery("#klien").val(),
				start : $scope.tanggal_start,
				end : $scope.tanggal_end,
				sort : "TANGGAL"
			});
			$scope.loading = false;
			var datanya = [];
			var datahold = [];
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
					data[k].durasi = jam+":"+min;
				} else {
					data[k].durasi = "";
				}	
				data[k].tanggalnya = $filter('date')(new Date(v.tanggal) ,'dd/MM/yyyy');
				if(datahold.indexOf(v.id)<0){
					datahold.push(v.id);
					datanya.push(data[k]);
				}
			});
			$scope.absensi = datanya;
		}).error(function(err){ $scope.loading = false; console.log(err); });
	}
});