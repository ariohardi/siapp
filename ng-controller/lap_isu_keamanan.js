angular.module("RDash").controller("Lap_isu_keamanan_detail",function($scope,$rootScope,$http,$window,$location,$timeout,$interval,$state){
	$rootScope.title_tag = "Laporan Isu Keamanan";
	$scope.loading = true;
	$scope.route = $location.path().substring(1).split("/");
	$http.post('api/index.php/laporan/isu_keamanan_detail_by_md5id',{
		md5_id : $scope.route[2]
	}).success(function(data){
		$scope.loading = false;
		$scope.datanya = data;
		$scope.lampiran = data.lampiran.split(",");
		console.log($scope.lampiran);
		jQuery('.lampiran').magnificPopup({
	        delegate: 'a', // the selector for gallery item
	        type: 'image',
	        gallery: {
	          enabled : true
	        }
	    });
	}).error(function(err){ console.log(err); });
});