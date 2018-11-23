angular.module("RDash").controller("Personil_detail",function($scope,$rootScope,$http,$window,$location,$timeout,$interval,$state){
	$rootScope.title_tag = "Detail Personil";
	$scope.loading = true;
	$scope.route = $location.path().substring(1).split("/");
	$http.post('api/index.php/personil/detail_by_md5id',{
		md5_id : $scope.route[1]
	}).success(function(data){
		$scope.loading = false;
		$scope.data_mentah = data;
		var jabatan;
		switch(data.level){
			case 'C': jabatan = "Chief Security"; break;
			case 'S': jabatan = "Satpam"; break;
			default : jabatan = "Komandan Regu"; break;
		}
		$scope.personil = [
			["Nama Lengkap", data.nama_personil],
			["Level", jabatan],
			["Jenis Kelamin", data.jenis_kelamin === "L" ? "Laki-laki" : "Perempuan"],
			["Tempat Lahir", data.tempat_lahir],
			["Tanggal Lahir", $rootScope.mydate(data.tanggal_lahir)],
			["Umur", $rootScope.myAge(data.tanggal_lahir) + " Tahun"],
			["Tinggi Badan", data.tinggi_badan+" Cm"],
			["Berat Badan", data.berat_badan+" Kg"],
			["Alamat", data.alamat],
			["Kabupaten", data.nama_kabupaten],
			["Propinsi", data.nama_propinsi],
			["No. Handphone", data.nomor_handphone],
			["Email", data.email],
		];
		$scope.lokasi_personil = $scope.data_mentah.lokasi_terbaru.split(",");
		$timeout(function(){
			if($scope.lokasi_personil.length==3){
				$scope.myLatLng = {lat: parseFloat($scope.lokasi_personil[0]), lng: parseFloat($scope.lokasi_personil[1])};
				$scope.map = new google.maps.Map(document.getElementById('map'), {
				    zoom: 19,
				    center: $scope.myLatLng
				});
				$scope.marker = new google.maps.Marker({
				    position: $scope.myLatLng,
				    map: $scope.map,
				    title: $scope.data_mentah.nama_personil
				});
			}
		}, 2000);
	}).error(function(err){ console.log(err); });
	$scope.intervalnya = $interval(function(){
		if($scope.lokasi_personil.length==3){
			$http.post('api/index.php/personil/detail_by_md5id',{
				md5_id : $scope.route[1]
			}).success(function(data){
				console.log($scope.data_mentah.lokasi_terbaru, data.lokasi_terbaru);
				if($scope.data_mentah.lokasi_terbaru!==data.lokasi_terbaru){
					$scope.data_mentah = data;
					$scope.lokasi_personil = $scope.data_mentah.lokasi_terbaru.split(",");
					$scope.myLatLng = {lat: parseFloat($scope.lokasi_personil[0]), lng: parseFloat($scope.lokasi_personil[1])};
					$scope.marker.setMap(null);
					$scope.marker = new google.maps.Marker({
					    position: $scope.myLatLng,
					    map: $scope.map,
					    title: $scope.data_mentah.nama_personil
					});
					$scope.map.setCenter($scope.myLatLng);
				}
			});
		}
	},5000);
	$scope.$on("$destroy", function(){
        $interval.cancel($scope.intervalnya);
    });
});