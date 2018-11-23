angular.module("RDash").controller("Edit_klien",function($scope,$rootScope,$http,$location,$timeout){
	$scope.loading = true;
	$rootScope.title_tag = "Edit Data Klien";
	$scope.route = $location.path().substring(1).split('/');
	$scope.widget_title = $rootScope.title_tag;

	$http.post('api/index.php/geo/propinsi').success(function(data){
		$scope.loading = false;
		$scope.array_propinsi = data;
		$http.post('api/index.php/klien/detail',{
			ID : $scope.route[1]
		}).success(function(data){
			$scope.FormData = data;
			$scope.ganti_propinsi();
			$http.post('api/index.php/geo/kabupaten',{
				id_propinsi : $scope.FormData.propinsi
			}).success(function(data){
				$scope.loading = false;
				$scope.array_kabupaten = data;
				$http.post('api/index.php/klien/detail',{
					ID : $scope.route[1]
				}).success(function(data){
					data.hari_kerja = parseInt(data.hari_kerja);
					data.jam_kerja = parseInt(data.jam_kerja);
					data.gaji_chief = parseInt(data.gaji_chief);
					data.gaji_danru = parseInt(data.gaji_danru);
					data.gaji_satpam = parseInt(data.gaji_satpam);
					data.overtime_chief = parseInt(data.overtime_chief);
					data.overtime_danru = parseInt(data.overtime_danru);
					data.overtime_satpam = parseInt(data.overtime_satpam);
					$scope.FormData = data;
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
					console.log($scope.FormData);
				});
			}).error(function(err){ console.log(err); });
		});
	}).error(function(err){ console.log(err); });

	$scope.pilih_pola_jam_kerja = function(){
		$scope.FormData.shift_kerja = "";
		switch(parseInt($scope.FormData.pola_jam_kerja)){
			case 8 :
				$scope.FormData.shift_kerja = "3";
				break;
			case 12 :
				$scope.FormData.shift_kerja = "2";
				break;	
		}
	}
	
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

	$scope.submit = function(){
		$scope.loading = true;
		$http.post('api/index.php/klien/simpan',$scope.FormData).success(function(data){
			$scope.loading = false;
			$.toast({
			    heading: data.status ? 'Berhasil' : 'Error',
			    text: data.message,
			    hideAfter: $rootScope.toastTimeout,
			    icon: data.status ? 'success' : 'error',
			    position: 'top-right'
			});
			if(data.status){
				$location.path("/klien");
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