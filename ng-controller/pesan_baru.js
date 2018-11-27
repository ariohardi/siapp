angular.module("RDash").controller("Pesan_baru",function($scope,$rootScope,$http,$location,$timeout,$interval,Upload){
	$scope.FormData = {};
	$rootScope.title_tag = "Kirim Instruksi";
	$scope.widget_title = $rootScope.title_tag;
	$scope.lampiran_asli = [];
	$scope.lampiran_temp = [];
	$scope.submit = function(){
		$scope.loading = true;
		$scope.FormData.lampiran = $scope.lampiran_asli;
		console.log($scope.FormData);
		$http.post('api/index.php/pesan/simpan',$scope.FormData).success(function(data){
			console.log(data);
			$scope.loading = false;
			$.toast({
			    heading: data.status ? 'Error' : 'Berhasil',
			    text: data.message,
			    hideAfter: $rootScope.toastTimeout,
			    icon: data.status ? 'error' : 'success',
			    position: 'top-right'
			});
			if(data.status){
				$location.path("/pesan");
			}
			else {
				$location.path("/pesan");
			}
		}).error(function(err){ console.log(err); });
	}

	$scope.persen = 0;
	$scope.remaining = 0;
	$scope.remaining_interval= false;
	$scope.detik_berjalan = 0;

	$scope.upload = function (file) {
		$scope.loading = true;
		$scope.persen = 0;
		$scope.detik_berjalan = 0;
		$scope.remaining_interval = $interval(function(){
			$scope.detik_berjalan++;
			$scope.average = $scope.detik_berjalan / $scope.persen;
            $scope.remaining = parseInt($scope.average * 100 - $scope.detik_berjalan);
		}, 1000);
        Upload.upload({
            url: 'api/index.php/pesan/tambah_lampiran',
            data: {file: file}
        }).then(function (resp) {
        	console.log(resp);
        	var type = resp.data.file.type.split("/");
        	$scope.lampiran_asli.push(type[0]+":"+resp.data.target);
        	$scope.lampiran_temp.push([resp.data.file.name, type[0]]);
            console.log('Success ' + resp.config.data.file.name + ' uploaded. Response: ' + resp.data);
        }, function (resp) {
            console.log('Error status: ' + resp.status);
        }, function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            if(parseInt(progressPercentage)==100){
            	$scope.loading = false;
            }
            $scope.persen = progressPercentage;
            console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
            if(parseInt(progressPercentage)==100){
	            $timeout(function(){
	            	$scope.persen = 0;
	            }, 1000);
	            $interval.cancel($scope.remaining_interval);
	        }    
        });
    };
});