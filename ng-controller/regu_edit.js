angular.module("RDash").controller("Regu_edit",function($scope,$rootScope,$http,$location,$timeout){
	$scope.loading = true;
	$rootScope.title_tag = "Edit Data Regu";
	$scope.route = $location.path().substring(1).split('/');
	$scope.widget_title = $rootScope.title_tag;

	$scope.FormData = {};
	$scope.ro = {};

	$http.post('api/index.php/klien/data').success(function(data){
		$scope.array_klien = data;
		$http.post('api/index.php/geo/propinsi').success(function(data){
			$scope.loading = false;
			$scope.array_propinsi = data;
			})
			$http.post('api/index.php/proyek/data').success(function(data){
				$scope.array_proyek = data;
			$http.post('api/index.php/regu/detail',{
				ID : $scope.route[1]
			}).success(function(data){
				$scope.FormData = data;
				$scope.ganti_propinsi();
				$http.post('api/index.php/geo/kabupaten',{
					id_propinsi : $scope.FormData.propinsi
				}).success(function(data){
					$scope.loading = false;
					$scope.array_kabupaten = data;
					$http.post('api/index.php/personil/chief_security').success(function(data){
						$scope.loading = false;
						$scope.array_chief_security = data;
						$http.post('api/index.php/regu/detail',{
							ID : $scope.route[1]
						}).success(function(data){
							$scope.FormData = data;
							$scope.FormData.chief_security = parseInt(data.chief_security);
							$timeout(function() {
								var mapOptions = {
									zoom: 17,
									center: new google.maps.LatLng(parseFloat(data.map_latitude), parseFloat(data.map_longitude)),
									mapTypeId: google.maps.MapTypeId.ROADMAP
								};
								$scope.map = new google.maps.Map(document.getElementById('map'), mapOptions);
								google.maps.event.addListener($scope.map, 'dragend', function() {
									$scope.geocoder.geocode({'latLng':$scope.map.getCenter()},function(results, status){
									    if (status == google.maps.GeocoderStatus.OK) {              
									        var myLatLng = results[0].geometry.location;
									        $scope.FormData.map_address = results[0].formatted_address;
									    } else {
									        console.log("Geocode was not successful for the following reason: " + status);
									    }
									});
								});
								google.maps.event.addListener($scope.map, 'idle', function() {
									$scope.FormData.map_latitude = $scope.map.getCenter().lat();
									$scope.FormData.map_longitude = $scope.map.getCenter().lng();
								} );
							}, 1000);
						});
					}).error(function(err){ console.log(err); });
				}).error(function(err){ console.log(err); });
			});
		}).error(function(err){ console.log(err); });
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

	$scope.do_searching = false;
	$scope.geocoder = new google.maps.Geocoder;
	$scope.find_address = function(){
		if($scope.do_searching){
			$timeout.cancel($scope.do_searching);
		}
		$scope.do_searching = $timeout(function(){
			$scope.geocoder.geocode({'address':$scope.FormData.map_address},function(results, status){
			    if (status == google.maps.GeocoderStatus.OK) {              
			        var myLatLng = results[0].geometry.location;
			        $scope.places = results;
			        $scope.map.setCenter(myLatLng);
			        console.log('Mencari....');
			    } else {
			        console.log("Geocode was not successful for the following reason: " + status);
			    }
			});
		}, 500);
	}

	$scope.searching = function(){
		console.log('Sedang mencari');
		$scope.sedang_mencari = true;
	}

	$scope.end_searching = function(){
		console.log('Selesai mencari');
		$timeout(function(){
			$scope.sedang_mencari = false;
		}, 500);
	}

	$scope.pilih = function(place){
		$scope.FormData.map_address = place.formatted_address;
		$scope.FormData.map_latitude = place.geometry.location.lat();
		$scope.FormData.map_longitude = place.geometry.location.lng();
	}

});