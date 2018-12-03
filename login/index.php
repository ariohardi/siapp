<?php
session_start();
//clear session from disk
session_destroy();

?>

<!DOCTYPE html>
<!-- saved from url=(0030)http://update.tidy.eideus.com/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


		<title>Login</title>

		<link rel="stylesheet" href="./index_files/bootstrap.min.css">
		<link rel="stylesheet" href="../js/sweetalert-master/dist/sweetalert.css">
		<link rel="stylesheet" href="./index_files/font-awesome.min.css">
		<link href="./index_files/css" rel="stylesheet" type="text/css">
		<!-- <link rel="stylesheet" href="/css/lib/bootstrap-responsive.min.css"> -->
		<link rel="stylesheet" href="./index_files/main.css?a=1">
		<style type="text/css">
			input[type=email], input[type=password]{
				border-radius: 2px;
				background: #CCC;
			}
			html, body {
			    height:100% !important;
			}
			body {
				background: url(bg-login-back.jpg) no-repeat center !important;
				background-size: 100% 100% !important;
				background-position: center;
			}
			img {
				border: none !important;
			}
		</style>
	<body>

		<div class="apollo" style="border-color: transparent;max-width: 420px;box-shadow: none;">
			<div style="background: url(bg-login.png);background-size: 100% 100%;padding: 0px;" class="apollo-container clearfix">
				<div style="padding: 56px 45px 40px 45px;">
				<img style="float: right;margin-top: -30px;margin-right: -20px;" width="52" src="../logo/guard.png">
				<img style="margin-top: -30px;margin-left: -20px;" width="52" src="../logo/logo_koperasi.png">
				<div id="coin-flip-cont" class="apollo-facebook">
					<div id="coin" class="apollo-image">
						<img src="../LogoJN1.png?a=4" class="front">
						<img src="../logo1a.jpg?a=2" class="back">
					</div>
				</div>
				<div class="apollo-login" style="max-width: none;">
					<form class="form-signin" id="apollo-login-form" style="margin-top: 240px">

						<div class="form-group">
							<input name="email" type="email" value="" class="form-control email" placeholder="Alamat email" onchange="this.setCustomValidity(validity.valueMissing ? 'Masukkan email Anda dengan benar !' : '');" id="email" required>
						</div>

						<div class="form-group">
							<input name="password" required type="password" value="" class="form-control" placeholder="Kata sandi" onchange="this.setCustomValidity(validity.valueMissing ? 'Masukkan password Anda' : '');" id="pass" required>
						</div>

						<button class="btn btn-lg btn-signin btn-block" type="submit">Masuk</button>
					</form>

					<p class="apollo-register-account"><a href="javascript:void(0)" class="password-link"><small>Lupa password?</small></a> </p>
					<br/><br/>
				</div>

				<!-- <div class="apollo-forgotten-password">
					<form class="form-signin" id="apollo-forgotten-password-form">
						<div class="form-group">
							<input type="text" value="" class="form-control email" placeholder="Alamat email">
						</div>
						<button class="btn btn-lg btn-block btn-primary" type="submit">Reset password</button>
					</form>

					<p class="apollo-back"> <a href="http://update.tidy.eideus.com/#"><i class="icon-arrow-left"></i> back to login</a> </p>
				</div> -->

				<div class="apollo-logging-in">
					<h2>Welcome back<span class="user-name"></span>!</h2>
					<p><strong>Please wait whilst we securely log you in…</strong></p>

					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dignissim enim suscipit massa ornare rutrum.</p>
				</div>

				<div class="apollo-registering">
					<h2>Thanks<span class="user-name"></span>!</h2>
					<p><strong>We've sent you an activation email, blah blah...</strong></p>
					<p>Nullam ac erat nunc. Donec in orci purus, vel tempor tortor. Integer tincidunt ipsum sed ipsum scelerisque malesuada.</p>
				</div>

				<div class="apollo-password-reset">
					<h2>Check your email</h2>
					<p><strong>We've sent you a link, blah blah...</strong></p>
					<p>Nullam ac erat nunc. Donec in orci purus, vel tempor tortor. Integer tincidunt ipsum sed ipsum scelerisque malesuada.</p>
				</div>
			</div>
			</div>
		</div>

		<script src="./index_files/jquery.min.js"></script>
		<script src="./index_files/images.js"></script>
		<script src="../js/sweetalert-master/dist/sweetalert.min.js"></script>
		<script src="./index_files/md5.js"></script>
		<script src="./index_files/bootstrap.min.js"></script>
		<script src="./index_files/main.js"></script>
		<script src="./index_files/jQueryRotate.js"></script>

		<script type="text/javascript">
  document.getElementById("email").setCustomValidity("Masukkan email Anda dengan benar !");
  document.getElementById("pass").setCustomValidity("Masukkan password Anda");
</script>

		<script>
			$(function(){
				$('[name="optionsRadios"]').change(function(){
					if($(this).val() == 'yes'){
						window.location.href="/?hasAccount"
					}
					else {
						window.location.href = '/';
					}
				});
			})
		</script>

</body></html>
