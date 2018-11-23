<!DOCTYPE html>
<html>
<head>
<title><?php echo $personil->nama_personil ?> - Curriculum Vitae</title>
<!-- <base href="" /> -->
<meta name="viewport" content="width=device-width"/>
<meta name="description" content="The Curriculum Vitae of Joe Bloggs."/>
<meta charset="UTF-8"> 

<style type="text/css">
	html,body,div,span,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,abbr,address,cite,code,del,dfn,em,img,ins,kbd,q,samp,small,strong,sub,sup,var,b,i,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,figcaption,figure,footer,header,hgroup,menu,nav,section,summary,time,mark,audio,video {
		border:0;
		font:inherit;
		font-size:100%;
		margin:0;
		padding:0;
		vertical-align:baseline;
		}

		article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section {
		display:block;
		}

		html, body {background: #181818; font-family: 'Lato', helvetica, arial, sans-serif; font-size: 16px; color: #222;}

		.clear {clear: both;}

		p {
			font-size: 1em;
			line-height: 1.4em;
			margin-bottom: 20px;
			color: #444;
		}

		#cv {
			width: 90%;
			max-width: 800px;
			background: #f3f3f3;
			margin: 30px auto;
		}

		.mainDetails {
			padding: 25px 35px;
			border-bottom: 2px solid #cf8a05;
			background: #ededed;
		}

		#name h1 {
			font-size: 2.5em;
			font-weight: 700;
			font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
			margin-bottom: -6px;
		}

		#name h2 {
			font-size: 2em;
			margin-left: 2px;
			font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
		}

		#mainArea {
			padding: 0 40px;
		}

		#headshot {
			width: 12.5%;
			float: left;
			margin-right: 20px;
		}

		#headshot img {
			width: 100%;
			height: auto;
			/*-webkit-border-radius: 50px;*/
			/*border-radius: 50px;*/
		}

		#name {
			float: left;
		}

		#contactDetails {
			float: right;
			margin-top: -10px;
			margin-right: -20px;
		}

		#contactDetails ul {
			list-style-type: none;
			font-size: 0.9em;
			margin-top: 2px;
		}

		#contactDetails ul li {
			margin-bottom: 3px;
			color: #444;
		}

		#contactDetails ul li a, a[href^=tel] {
			color: #444; 
			text-decoration: none;
			-webkit-transition: all .3s ease-in;
			-moz-transition: all .3s ease-in;
			-o-transition: all .3s ease-in;
			-ms-transition: all .3s ease-in;
			transition: all .3s ease-in;
		}

		#contactDetails ul li a:hover { 
			color: #cf8a05;
		}


		section {
			border-top: 1px solid #dedede;
			padding: 20px 0 0;
		}

		section:first-child {
			border-top: 0;
		}

		section:last-child {
			padding: 20px 0 10px;
		}

		.sectionTitle {
			float: left;
			width: 25%;
		}

		.sectionContent {
			float: right;
			width: 72.5%;
		}

		.sectionTitle h1 {
			font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
			font-style: italic;
			font-size: 1.4em;
			color: #cf8a05;
		}

		.sectionContent h2 {
			font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
			font-size: 1.5em;
			margin-bottom: -2px;
		}

		.subDetails {
			font-size: 0.8em;
			font-style: italic;
			margin-bottom: 3px;
		}

		.keySkills {
			list-style-type: none;
			-moz-column-count:3;
			-webkit-column-count:3;
			column-count:3;
			margin-bottom: 20px;
			font-size: 1em;
			color: #444;
		}

		.keySkills ul li {
			margin-bottom: 3px;
		}

		/*@media all and (min-width: 602px) and (max-width: 800px) {
			#headshot {
				display: none;
			}
			
			.keySkills {
			-moz-column-count:2;
			-webkit-column-count:2;
			column-count:2;
			}
		}

		@media all and (max-width: 601px) {
			#cv {
				width: 95%;
				margin: 10px auto;
				min-width: 280px;
			}
			
			#headshot {
				display: none;
			}
			
			#name, #contactDetails {
				float: none;
				width: 100%;
				text-align: center;
			}
			
			.sectionTitle, .sectionContent {
				float: none;
				width: 100%;
			}
			
			.sectionTitle {
				margin-left: -2px;
				font-size: 1.25em;
			}
			
			.keySkills {
				-moz-column-count:2;
				-webkit-column-count:2;
				column-count:2;
			}
		}

		@media all and (max-width: 480px) {
			.mainDetails {
				padding: 15px 15px;
			}
			
			section {
				padding: 15px 0 0;
			}
			
			#mainArea {
				padding: 0 25px;
			}

			
			.keySkills {
			-moz-column-count:1;
			-webkit-column-count:1;
			column-count:1;
			}
			
			#name h1 {
				line-height: .8em;
				margin-bottom: 4px;
			}
		}*/

		@media print {
		    #cv {
		        width: 100%;
		        margin-top: -5px;
		    }
		}

		@-webkit-keyframes reset {
			0% {
				opacity: 0;
			}
			100% {
				opacity: 0;
			}
		}

		@-webkit-keyframes fade-in {
			0% {
				opacity: 0;
			}
			40% {
				opacity: 0;
			}
			100% {
				opacity: 1;
			}
		}

		@-moz-keyframes reset {
			0% {
				opacity: 0;
			}
			100% {
				opacity: 0;
			}
		}

		@-moz-keyframes fade-in {
			0% {
				opacity: 0;
			}
			40% {
				opacity: 0;
			}
			100% {
				opacity: 1;
			}
		}

		@keyframes reset {
			0% {
				opacity: 0;
			}
			100% {
				opacity: 0;
			}
		}

		@keyframes fade-in {
			0% {
				opacity: 0;
			}
			40% {
				opacity: 0;
			}
			100% {
				opacity: 1;
			}
		}

		.instaFade {
		    /*-webkit-animation-name: reset, fade-in;*/
		    /*-webkit-animation-duration: 1.5s;*/
		    /*-webkit-animation-timing-function: ease-in;*/
			
			/*-moz-animation-name: reset, fade-in;*/
		    /*-moz-animation-duration: 1.5s;*/
		    /*-moz-animation-timing-function: ease-in;*/
			
			/*animation-name: reset, fade-in;*/
		    /*animation-duration: 1.5s;*/
		    /*animation-timing-function: ease-in;*/
		}

		.quickFade {
		    /*-webkit-animation-name: reset, fade-in;*/
		    /*-webkit-animation-duration: 2.5s;*/
		    /*-webkit-animation-timing-function: ease-in;*/
			
			/*-moz-animation-name: reset, fade-in;*/
		    /*-moz-animation-duration: 2.5s;*/
		    /*-moz-animation-timing-function: ease-in;*/
			
			/*animation-name: reset, fade-in;*/
		    /*animation-duration: 2.5s;*/
		    /*animation-timing-function: ease-in;*/
		}
		 
		.delayOne {
			/*-webkit-animation-delay: 0, .5s;*/
			/*-moz-animation-delay: 0, .5s;*/
			/*animation-delay: 0, .5s;*/
		}

		.delayTwo {
			/*-webkit-animation-delay: 0, 1s;*/
			/*-moz-animation-delay: 0, 1s;*/
			/*animation-delay: 0, 1s;*/
		}

		.delayThree {
			/*-webkit-animation-delay: 0, 1.5s;*/
			/*-moz-animation-delay: 0, 1.5s;*/
			/*animation-delay: 0, 1.5s;*/
		}

		.delayFour {
			/*-webkit-animation-delay: 0, 2s;*/
			/*-moz-animation-delay: 0, 2s;*/
			/*animation-delay: 0, 2s;*/
		}

		.delayFive {
			/*-webkit-animation-delay: 0, 2.5s;*/
			/*-moz-animation-delay: 0, 2.5s;*/
			/*animation-delay: 0, 2.5s;*/
		}
</style>
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body id="top">
<div id="cv" class="instaFade">
	<div class="mainDetails">
		<?php if(intval($personil->upload_foto)==1): ?>
		<div id="headshot" class="quickFade">
			<img src="/api/foto/<?php echo $personil->md5_id ?>.png" alt="<?php echo $personil->nama_personil ?>" />
		</div>
		<?php endif ?>
		<div id="name">
			<h1 class="quickFade delayTwo"><?php echo $personil->nama_personil ?></h1>
			<!-- <h1 class="quickFade delayTwo">Intan Permatasari</h1> -->
			<h2 class="quickFade delayThree">
			<?php switch ($personil->level) {
				case 'C':
					echo "Chief Security";
					break;
				
				case 'D':
					echo "Komandan Regu";
					break;
				
				default:
					echo "Guard";
					break;
			} ?>
			</h2>
		</div>
		
		<div id="contactDetails" class="quickFade delayFour">
			<img width="64" src="/logoa.png">
			<!-- <ul>
				<li>e: <a href="mailto:joe@bloggs.com" target="_blank">joe@bloggs.com</a></li>
				<li>w: <a href="http://www.bloggs.com">www.bloggs.com</a></li>
				<li>m: 01234567890</li>
			</ul> -->
		</div>
		<div class="clear"></div>
	</div>
	
	<div id="mainArea" class="quickFade delayFive">
		<section>
			<article>
				<div class="sectionTitle">
					<h1>Profil Personal</h1>
				</div>
				
				<div class="sectionContent">
					<table>
						<tbody>
							<tr>
								<td width="180">Tempat dan Tanggal Lahir</td><td align="center" width="10">:</td>
								<td><?php echo $personil->tempat_lahir ?>, <?php echo date("d/m/Y",strtotime($personil->tanggal_lahir)) ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td><td align="center" width="10">:</td>
								<td><?php echo ($personil->jenis_kelamin==="L") ? "Pria" : "Wanita" ?></td>
							</tr>
							<tr>
								<td>Tinggi / Berat Badan</td><td align="center" width="10">:</td>
								<td><?php echo $personil->tinggi_badan ?>cm / <?php echo $personil->berat_badan ?>kg</td>
							</tr>
							<tr>
								<td>Alamat</td><td align="center" width="10">:</td>
								<td><?php echo $personil->alamat ?></td>
							</tr>
							<tr>
								<td>Kabupaten</td><td align="center" width="10">:</td>
								<td><?php echo $personil->nama_kabupaten ?></td>
							</tr>
							<tr>
								<td>Propinsi</td><td align="center" width="10">:</td>
								<td><?php echo $personil->nama_propinsi ?></td>
							</tr>
							<tr>
								<td>Nomor Handphone</td><td align="center" width="10">:</td>
								<td><?php echo $personil->nomor_handphone ?></td>
							</tr>
							<tr>
								<td>Alamat Email</td><td align="center" width="10">:</td>
								<td><?php echo $personil->email ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</article>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<div class="clear"></div>
		</section>
		
		
		<?php if($personil->pengalaman_kerja): ?>
		<section>
			<div class="sectionTitle">
				<h1>Pendidikan Formal</h1>
			</div>
			
			<div class="sectionContent">
				<?php foreach ($personil->pendidikan as $key => $value) { ?>
				<article>
					<h2><?php echo $value['nama_sekolah'] ?></h2>
					<p class="subDetails">Masuk tahun <?php echo $value['tahun_masuk'] ?> - Lulus tahun <?php echo $value['tahun_keluar'] ?></p>
				</article>
				<?php } ?>
			</div>
			<div class="clear"></div>
		</section>
		<br/>
		<?php endif ?>
		
		<?php if($personil->pengalaman_kerja): ?>
		<section>
			<div class="sectionTitle">
				<h1>Pelatihan Satpam</h1>
			</div>
			
			<div class="sectionContent">
				<?php foreach ($personil->pelatihan as $key => $value) { ?>
				<?php if($value['tingkat']): ?>
					<article>
						<h2><?php switch ($key) {
							case 0:
								echo "GADA PRATAMA";
								break;
							
							case 1:
								echo "GADA MADYA";
								break;	

							default:
								echo "GADA UTAMA";
								break;
						} ?></h2>
						<p class="subDetails"><?php echo $value['instansi'] ?>, <?php echo $value['kota'] ?> <?php echo $value['tahun'] ?></p>
					</article>
				<?php endif ?>
				<?php } ?>
			</div>
			<div class="clear"></div>
		</section>
		<br/>
		<?php endif ?>
		
		<?php if($personil->pengalaman_kerja): ?>
		<section>
			<div class="sectionTitle">
				<h1>Pengalaman Kerja</h1>
			</div>
			
			<div class="sectionContent">
				<?php foreach ($personil->pengalaman_kerja as $key => $value) { ?>
				<article>
					<h2><?php echo $value['jabatan'] ?> di <?php echo $value['nama_perusahaan'] ?></h2>
					<p class="subDetails"><?php echo $value['bulan_masuk'] ?> <?php echo $value['tahun_masuk'] ?> - <?php echo $value['bulan_keluar'] ?> <?php echo $value['tahun_keluar'] ?></p>
					<p><?php echo $value['deskripsi'] ?></p>
				</article>
				<?php } ?>
			</div>
			<div class="clear"></div>
		</section>
		<?php endif ?>
		
		<?php if($personil->keahlian): ?>
		<section>
			<div class="sectionTitle">
				<h1>Keahlian</h1>
			</div>
			
			<div class="sectionContent">
				<?php foreach ($personil->keahlian as $key => $value) { ?>
				<article>
					<h2><?php echo $value['nama_keahlian'] ?></h2>
					<p><?php echo $value['keterangan'] ?></p>
				</article>
				<?php } ?>
			</div>
			<div class="clear"></div>
		</section>
		<?php endif ?>
		
	<!-- <pre>
		<?php print_r($personil) ?>
	</pre> -->
</div>
<script type="text/javascript">
// var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
// document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-3753241-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>
<script type="text/javascript">
	setTimeout(function(){
		window.print();
	}, 100);
	setTimeout(function() {
		window.close();
	}, 250);
</script>
</body>
</html>