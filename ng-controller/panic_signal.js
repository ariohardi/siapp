angular.module("RDash").controller("Panic_signal",function($scope,$rootScope,$http,$window,$location,$timeout,$state,$interval){
	$rootScope.title_tag = "Panic Signal";
	$scope.loading = true;
	$scope.total_emergency = 0;
	$timeout(function(){
		$http.post('api/index.php/panic_button/emergency_status').success(function(data){
			$scope.loading = false;
			$scope.map = new google.maps.Map(document.getElementById('map'), {
		      	zoom: 5,
		      	center: {lat: -1.1086356, lng: 119.8356679}
		  	});
		  	$scope.emergency_location = [];
		  	angular.forEach(data, function(value, index){
		  		var latlng = value.lokasi.split(",");
		  		$scope.emergency_location.push([
		  			value.nama_personil,
		  			parseFloat(latlng[0]),
		  			parseFloat(latlng[1]),
		  			index+1,
		  			value
		  			]);
		  	});
		  	$scope.setMarkers($scope.map);
		  	$scope.total_emergency = data.length;
		  	google.maps.event.trigger($scope.map, 'resize');
		  	$timeout(function() {
		  		google.maps.event.trigger($scope.map, 'resize');
		  		if(data.length>0) $scope.map.fitBounds($scope.bounds);
		  		$timeout(function(){
		  			if(parseInt($scope.map.getZoom())>18){
		  				$scope.map.setZoom(18);
		  			}
				  	/*google.maps.event.addListener($scope.map, 'zoom_changed', function() {
					    $scope.map.fitBounds($scope.bounds);
					});*/
		  		},350);
		  	}, 350);
		}).error(function(err){ console.log(err); });
	}, 2000);
  	$scope.setMarkers = function(map) {
        var image = {
			url: 'http://www.longmen.net/template/pc/main/default/images/markerred.gif'
        };
        $scope.bounds = new google.maps.LatLngBounds();
        for (var i = 0; i < $scope.emergency_location.length; i++) {
          	$scope.loc = $scope.emergency_location[i];
          	var markerImage = new google.maps.MarkerImage('http://www.longmen.net/template/pc/main/default/images/markerred.gif',
	        new google.maps.Size(30, 30),
	        new google.maps.Point(0, 0),
	        new google.maps.Point(10, 10));
	        var marker = new google.maps.Marker({
				position: {lat: $scope.loc[1], lng: $scope.loc[2]},
				map: $scope.map,
				optimized: false,
  				animation: google.maps.Animation.DROP,
				icon: markerImage,
				title: $scope.loc[0], 
				zIndex: $scope.loc[3],
				mydata: $scope.loc[4]
          	});
          	var circle = new google.maps.Circle({
	            map: map,
	            radius: 100,
	            strokeOpacity: 0.3,
	            fillOpacity: 0.08,
	            strokeColor: '#AA0000',
	            fillColor: '#AA0000'
	        });
	        circle.bindTo('center', marker, 'position');
          	marker.addListener('click', function(_marker,_param1,_param2) {
			    console.log(_marker,this.mydata,_param1,_param2);
			    jQuery.Zebra_Dialog('<img style="width: 100% !important;" src="http://maps.google.com/maps/api/staticmap?center='+this.mydata.lokasi+'&zoom=16&markers=size:big|color:min|label:L|'+this.mydata.lokasi+'&size=600x380&sensor=true&key=AIzaSyACsox-aTW9i1jR1EKXKURSIFp9qkrep8Y" />\
			    	<div style="padding: 10px;">\
			    	<strong>Lokasi Kejadian</strong> : <span>'+this.mydata.lokasi_alamat+'</span><br/>\
			    	<strong>Pengirim Sinyal</strong> : <span>'+this.mydata.nama_personil+'</span><br/>\
			    	<strong>No. Handphone</strong> : <span>'+this.mydata.nomor_handphone+'</span><br/>\
			    	<strong>Alamat Email</strong> : <span>'+this.mydata.email+'</span><br/>\
			    	<strong>Nama Regu</strong> : <span>'+this.mydata.nama_regu+'</span><br/>\
			    	<strong>Klien</strong> : <span>'+this.mydata.nama_klien+'</span><br/>\
			    	<strong>Waktu Kejadian</strong> : <span>'+$rootScope.mydatetime(this.mydata.waktu_mulai)+'</span>\
			    	</div>', {
				    'type': 'info',
				    'title': 'Sinyal Panik oleh '+this.mydata.nama_personil,
				    'buttons':  [
	                    {caption: 'Yes', callback: function() { alert('"Yes" was clicked')}},
	                    {caption: 'No', callback: function() { alert('"No" was clicked')}},
	                    {caption: 'Cancel', callback: function() { alert('"Cancel" was clicked')}}
	                ]
				});
				setTimeout(function() {
					jQuery(window).trigger('resize');
					jQuery('html').trigger('resize');
					jQuery('body').trigger('resize');
				}, 350);setTimeout(function() {
					jQuery(window).trigger('resize');
					jQuery('html').trigger('resize');
					jQuery('body').trigger('resize');
				}, 750);setTimeout(function() {
					jQuery(window).trigger('resize');
					jQuery('html').trigger('resize');
					jQuery('body').trigger('resize');
				}, 1000);setTimeout(function() {
					jQuery(window).trigger('resize');
					jQuery('html').trigger('resize');
					jQuery('body').trigger('resize');
				}, 3000);setTimeout(function() {
					jQuery(window).trigger('resize');
					jQuery('html').trigger('resize');
					jQuery('body').trigger('resize');
				}, 10000);
			});
        	$scope.bounds.extend(new google.maps.LatLng($scope.loc[1], $scope.loc[2]));
        }
        if($scope.emergency_location.length==1){
        	$timeout(function(){
        		$scope.map.setZoom($scope.map.getZoom()-1);
        	}, 2000);
        }
  	}
  	$scope.current = "map";
  	$scope.detail = function(data){
  		jQuery.Zebra_Dialog('<img style="width: 100% !important;" src="http://maps.google.com/maps/api/staticmap?center='+data.lokasi+'&zoom=16&markers=size:big|color:min|label:L|'+data.lokasi+'&size=600x380&sensor=true&key=AIzaSyACsox-aTW9i1jR1EKXKURSIFp9qkrep8Y" />\
	    	<div style="padding: 10px;">\
	    	<strong>Lokasi Kejadian</strong> : <span>'+data.lokasi_alamat+'</span><br/>\
	    	<strong>Pengirim Sinyal</strong> : <span>'+data.nama_personil+'</span><br/>\
	    	<strong>No. Handphone</strong> : <span>'+data.nomor_handphone+'</span><br/>\
	    	<strong>Alamat Email</strong> : <span>'+data.email+'</span><br/>\
	    	<strong>Nama Regu</strong> : <span>'+data.nama_regu+'</span><br/>\
	    	<strong>Klien</strong> : <span>'+data.nama_klien+'</span><br/>\
	    	<strong>Waktu Kejadian</strong> : <span>'+$rootScope.mydatetime(data.waktu_mulai)+'</span><br/>\
	    	<strong>Deskripsi Kejadian</strong> : <span>'+data.masalahnya+'</span><br/>\
	    	<strong>Penyelesaian Masalah</strong> : <span>'+data.solusinya+'</span>\
	    	</div>', {
		    'type': 'info',
		    'title': 'Sinyal Panik oleh '+data.nama_personil,
		    'buttons':  [
                {caption: 'Yes', callback: function() { alert('"Yes" was clicked')}},
                {caption: 'No', callback: function() { alert('"No" was clicked')}},
                {caption: 'Cancel', callback: function() { alert('"Cancel" was clicked')}}
            ]
		});
		setTimeout(function() {
			jQuery(window).trigger('resize');
			jQuery('html').trigger('resize');
			jQuery('body').trigger('resize');
		}, 350);setTimeout(function() {
			jQuery(window).trigger('resize');
			jQuery('html').trigger('resize');
			jQuery('body').trigger('resize');
		}, 750);setTimeout(function() {
			jQuery(window).trigger('resize');
			jQuery('html').trigger('resize');
			jQuery('body').trigger('resize');
		}, 1000);setTimeout(function() {
			jQuery(window).trigger('resize');
			jQuery('html').trigger('resize');
			jQuery('body').trigger('resize');
		}, 3000);setTimeout(function() {
			jQuery(window).trigger('resize');
			jQuery('html').trigger('resize');
			jQuery('body').trigger('resize');
		}, 10000);
  	}
  	$scope.riwayat = function(current){
  		$scope.current = current;
  		if(current!=='map'){
  			$scope.loading = true;
	  			$http.post('api/index.php/panic_button/history').success(function(data){
					$scope.datanya = data;
					$scope.loading = false;
				}).error(function(err){ console.log(err); $scope.loading = false; });
  		}
  	}
  	var interval = $interval(function(){
  		$http.post('api/index.php/panic_button/emergency_status').success(function(data){
			if(data.length!=$scope.total_emergency){
				$state.go($state.current, {}, {reload: true});
			}
		}).error(function(err){ console.log(err); });
  	}, 7500);
  	$scope.$on("$destroy", function(){
        $interval.cancel(interval);
    });
});