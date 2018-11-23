angular.module("RDash").controller("Laporan_personil",function($scope,$rootScope,$http,$window,$location,$timeout,$interval,$state){
	$rootScope.title_tag = "Riwayat Laporan oleh Personil";
	$scope.filter = {};
	$scope.filter.keyword = "";
	$scope.loading = true;
	$scope.route = $location.path().substring(1).split("/");
	$scope.get_data = function(){
		$scope.loading = true;
		$scope.query_string = jQuery.param($scope.filter);
		$http.post('api/index.php/laporan/laporan_personil',{
			keyword : $scope.filter.keyword,
			md5_id : $scope.route[2],
		}).success(function(data){
			$scope.loading = false;
			$scope.datanya = data;
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