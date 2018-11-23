<?php header("Content-Type: application/javascript");
$r = glob('./ng-controller/*');
foreach ($r as $key => $file) {
	if(strpos($file, ".js")>0){
		require($file);
	}
}