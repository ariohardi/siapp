angular.module("RDash").controller("Pesan",function($scope,$rootScope,$http,$window,$location,$timeout,$state){
	$rootScope.title_tag = "Riwayat Pengiriman Instruksi";
	$scope.filter = {};
	$scope.filter.keyword = "";
	$scope.penerima = [
	"",
	"Semua Personil",
	"Semua Satpam",
	"Semua Komandan Regu",
	"Semua Chief Security",
	"Komandan Regu dan Chief Security"
	];
	$scope.get_data = function(){
		$scope.loading = true;
		$scope.query_string = jQuery.param($scope.filter);
		$http.post('api/index.php/pesan/data',{
			keyword : $scope.filter.keyword,
		}).success(function(data){
			$scope.loading = false;
			$scope.array_pesan = data;
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