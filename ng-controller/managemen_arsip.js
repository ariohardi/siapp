angular.module("RDash").controller("Managemen_arsip",function($scope,$rootScope,$http,$window,$location,$timeout,$state){
	$rootScope.title_tag = "Managemen Arsip";
	$scope.loading = false;

	$scope.managemen_arsip = function(){
		$scope.loading = true;
		$timeout(function(){
			$scope.current = "ARSIP";
			$scope.icon = "folder";
			$scope.title = "Managemen Arsip";
			$scope.loading = false;
		},500);
	}

	$scope.managemen_arsip();

	$scope.absensi_harian = function(id){
		if(id.substring(0, 7)==="absensi"){
			$http.post('api/index.php/absensi/data_absensi_harian', {
				tanggal : id.substring(8,18)
			}).success(function(data){
				$scope.loading = false;
				$scope.absensi = data;
				$scope.current = "ABSENSI HARIAN";
				$scope.icon = "clock-o";
				$scope.title = "Daftar Hadir Harian "+id.substring(16,18)+" "+id.substring(19)+" "+id.substring(8,12);
			}).error(function(err){ console.log(err); });
		}
	}

	var setting = {
		view : {
			dblClickExpand : true,
			showLine : true
		},
		data: {
			simpleData: {
				enable: true
			}
		},
		callback: {
			onClick : function(evt,evt1,target){
				if(target.id.substring(0, 7)==="absensi"){
					$scope.loading = true;
					$scope.absensi_harian(target.id);
				}
			}
		}
	};

	$http.post('api/index.php/managemen_arsip').success(function(data){
		console.log(data);
		setTimeout(function() {
			jQuery(document).ready(function($){
				$.fn.zTree.init($("#treeDemo"), setting, data);
			});
		}, 1000);
	}).error(function(err){ console.log(err); });

});