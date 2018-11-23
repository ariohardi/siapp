var search_timeout;
angular.module("RDash").controller("Personil",function($scope,$rootScope,$http,$window,$location,$timeout,$state){
	$rootScope.title_tag = "Data Personil";
	$scope.filter = {};
	$scope.filter.level = "";
	$scope.filter.keyword = "";
	$scope.filter.tinggi_badan = "";
	$scope.filter.jenis_kelamin = "";
	$scope.loading = true;
	$scope.first_loading = true;
	$scope.tinggi_badan = [];
	$scope.get_data = function(){
		$scope.loading = true;
		$scope.query_string = jQuery.param($scope.filter);
		$timeout(function(){
			$http.post('api/index.php/personil/data',{
				level : $scope.filter.level,
				jenis_kelamin : $scope.filter.jenis_kelamin,
				keyword : $scope.filter.keyword,
				tinggi_badan : $scope.filter.tinggi_badan
			}).success(function(data){
				$scope.loading = false;
				$scope.array_personil = data;
				$timeout(function(){
					angular.forEach($scope.array_personil, function(value, key) {
						console.log('.'+value.md5_id);
						if($scope.first_loading){
							if($scope.tinggi_badan.indexOf(parseInt(value.tinggi_badan))<0) $scope.tinggi_badan.push(parseInt(value.tinggi_badan));
						};
						jQuery('.'+value.md5_id).webuiPopover({
							title : value.nama_personil,
							content : "<div style='width: 600px;padding: 0px;'>\
								<div class='row' style='padding: 0px 0px 0px 5px;'>\
									<div class='col-xs-5' style='padding: 0px;'>\
										<img width='100%' src='"+(parseInt(value.upload_foto) == 1 ? 'api/foto/'+value.md5_id+'.png' : 'img/guard.png')+"' />\
									</div>\
									<div class='col-xs-7' style='padding: 0px 5px 0px 10px;'>\
										<table class='table table-bordered table-condensed'>\
											<tbody>\
											<tr><th style='width: 128px;'>Nama Lengkap</th><td align='right'>"+value.nama_personil+"</td></tr>\
											<tr><th>Jenis Kelamin</th><td align='right'>"+(value.jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan')+"</td></tr>\
											<tr><th>No. Handphone</th><td align='right'>"+value.nomor_handphone+"</td></tr>\
											<tr><th>Email</th><td align='right'>"+value.email+"</td></tr>\
											<tr><th>Tempat Lahir</th><td align='right'>"+value.tempat_lahir+"</td></tr>\
											<tr><th>Tanggal Lahir</th><td align='right'>"+$rootScope.mydate(value.tanggal_lahir)+"</td></tr>\
											<tr><th>Berat Badan</th><td align='right'>"+value.berat_badan+" Kg</td></tr>\
											<tr><th>Tinggi Badan</th><td align='right'>"+value.tinggi_badan+" Cm</td></tr>\
											<tr><th>Umur</th><td align='right'>"+$rootScope.myAge(value.tanggal_lahir)+" tahun</td></tr>\
											<tr><th>Alamat</th><td align='right'>"+value.alamat+"</td></tr>\
											<tr><th>Kota</th><td align='right'>"+(value.nama_kabupaten).replace('KOTA ','').replace('KABUPATEN','KAB.')+"</td></tr>\
											</tbody>\
										</table>\
									</div>\
								</div>\
							</div>",
							trigger : 'hover',
							type : 'html'
						});
					});
					$scope.first_loading = false;
				},(Math.floor($scope.array_personil.length / 1000) + 1) * 100);
			}).error(function(err){ console.log(err); });
		},500);
	}
	$scope.get_data();
	$scope.cari = function(){
		$timeout.cancel(search_timeout);
		search_timeout = $timeout(function(){
			$scope.get_data();
		},500);
	}
	$scope.hapus = function(context){
		// console.log(context);
		var yes = $window.confirm("Anda yakin akan menghapus personil "+context.nama_personil+"?");
		if(yes){
			$http.post('api/index.php/personil/hapus',{
				ID : context.ID
			}).success(function(data){
				$scope.loading = false;
				$.toast({
				    heading: data.status ? 'Berhasil' : 'Error',
				    text: 'Berhasil menghapus personil '+context.nama_personil,
				    hideAfter: $rootScope.toastTimeout,
				    icon: data.status ? 'success' : 'error',
				    position: 'top-right'
				});
				if(data.status){
					$state.go($state.current, {}, {reload: true});
				}
			}).error(function(err){ console.log(err); });
		}
	}
	$scope.edit = function(context){
		$rootScope.tanggal_lahir = context.tanggal_lahir;
		$location.path("/edit_personil/"+context.md5_id);
	}
	$scope.video_call = function(context){
		console.log($rootScope.sinchClient);
		// var call = $rootScope.sinchClient.callClient.callUser(context.ID);
		$rootScope.tanggal_lahir = context.tanggal_lahir;
		$location.path("/video_call/"+context.ID);
	}
});