angular.module("RDash").controller("Pesan_detail",function($scope,$rootScope,$http,$location,$timeout){
	$rootScope.title_tag = "Detail Instruksi";
	$scope.widget_title = $rootScope.title_tag;
	$scope.route = $location.path().substring(1).split('/');
	$scope.loading = true;
	$scope.penerima = [
	"",
	"Semua Personil",
	"Semua Satpam",
	"Semua Komandan Regu",
	"Semua Chief Security",
	"Komandan Regu dan Chief Security"
	];
	$http.post('api/index.php/pesan/detail',{
		ID : $scope.route[1]
	}).success(function(data){
		$scope.loading = false;
		$scope.detail = data;
	}).error(function(err){ console.log(err); });
});