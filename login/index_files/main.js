var berputar;
var angle = 0;
jQuery(document).ready(function($){
	// swal("", "Lorem ipsum dollor sit ammet", "error")
	jQuery("#apollo-login-form").submit(function(){
		$('.apollo-login').slideUp(500,function(){
			setTimeout(function(){
				jQuery('#coin').removeClass();
				setTimeout(function(){
					jQuery('#coin').addClass(getSpin());
				}, 100);
				setTimeout(function(){
					$.post('../api/index.php/user/do_login', $("#apollo-login-form").serialize(), function(data){
						jQuery('#coin').removeClass();
						if(data.status){
							setTimeout(function(){
								jQuery.post('../index.php',{
									ID : data.ID,
									role : data.role,
									id_level : data.id_level,
									roleText : data.roleText,
									nama : data.nama,
									leveling : data.leveling
								}, function(data){
									window.location = '../';
								});
							},1500);
						}
						$('.apollo-login').slideDown(500,function(){
							swal("", data.message, data.status ? "success" : "error");
						});
					}, 'json').error(function(err){
						console.log(err);
					});
				},3500);
			},100);
		});
		return false;
	});
	var spinArray = ['animation900','animation1080','animation1260','animation1440','animation1620','animation1800','animation1980','animation2160'];

	function getSpin() {
		var spin = spinArray[Math.floor(Math.random()*spinArray.length)];
		return 'animation1440';
	}

	jQuery('#coin').on('click', function(){
		
	});
});