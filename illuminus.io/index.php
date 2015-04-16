<?php
require_once('app/inc/languages.php');
include_once('templates/header.php');
?>
<style>

a, a:link, a:visited, a:hover, a:active { color: #fff; text-decoration: none}	

</style>

<div id="page">
	<div class="row site-main homepage">


	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="inner">

			<!-- black -->
			<div class="row bkg-black">
				<div class="col-xs-12 col-sm-12 col-md-12">
					
					
					<div class="row shim">
						<div class="col-xs-12 col-sm-12 col-md-7" style="text-align: left">
							<img src="app/assets/img/logo.png" alt="illuminus logo">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-5 menu home" style="text-align: left">
							<!--<a href="#about">About</a>-->
							<a href="#services">Services</a>
							<a href="app/?data_set=sample&step=privacy&lang=EN">Privacy</a>
							<a href="#contact">Contact</a>
						</div>
					</div>
					
					<div class="row shim">
						
						<div class="col-xs-12 col-sm-12 col-md-7 pad-top">
							<!--<div align="center" class="embed-responsive embed-responsive-16by9">-->
							<div>
								<video class="homepage_video"  style="width:600px; height: auto;" poster="app/assets/img/illuminus_promo_banner_video.png">
									<source src="video/illuminus_promo.mp4" type="video/mp4">
									Your browser does not support the video tag.
								</video>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-5 pad-top" style="text-align: left">
							
							
							<img src="app/assets/img/unlocking.png" class="left">
							<script> 
								$('.homepage_video').click(function(){this.paused?this.play():this.pause();}); 
								$('.homepage_video').on('ended',function(){
								    $(this).load();     
								});
								
								$(document).ready(function(){
								  $('a[href*=#]').click(function() {
								    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
								    && location.hostname == this.hostname) {
								      var $target = $(this.hash);
								      $target = $target.length && $target
								      || $('[name=' + this.hash.slice(1) +']');
								      if ($target.length) {
								        var targetOffset = $target.offset().top;
								        $('html,body')
								        .animate({scrollTop: targetOffset}, 1000);
								       return false;
								      }
								    }
								  });
								});
																
							</script>
							
							
							<div class="unlocking-content left">Unlocking the power of you<br>
							<a href="./app">Get started</a></div>
						</div>
					</div>
					
					
				</div>
			</div>

			<!-- green -->
			<div class="row bkg-green">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="row shim">
						<div class="col-xs-12 col-sm-12 col-md-12 services" id="services">
							Our Services
						</div>
					</div>
					<div class="row shim services-kids">
						<div class="col-xs-12 col-sm-4 col-md-4">
							<a href="#risk">
								<img src="app/assets/img/risk.png">
								<br>
								<span class="med">Risk Assessment</span>
								<br>
								<span class="sm">Your past determines your future</span>
							</a>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<img src="app/assets/img/liveforever.png">
							<br>
							<span class="med">LiveForever&trade;</span>
							<br>
							<span class="sm">DNA backup<br>[coming soon]</span>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<img src="app/assets/img/socialintegration.png">
							<br>
							<span class="med">Social Media Integration</span>
							<br>
							<span class="sm">You have no idea what we know<br>[coming soon]</span>
						</div>
					</div>
				</div>
			</div>

			<!-- grid -->
			<div class="row bkg-grid risk">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="row shim">
						<div class="col-xs-12 col-sm-6 col-md-6" id="risk">
							<div class="unlocking-content left">Future Present Risk Detection</div>
							<div class="med left">
								Learn what we already know about you
								<br><br>
							<a href="./app">Launch risk assessment tool</a></div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<img src="app/assets/img/riskgraph.png">
						</div>
					</div>
				</div>
			</div>


			<!-- light gray -->
			<div class="row bkg-lightgray">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="row shim">
						<div class="col-xs-12 col-sm-12 col-md-12 services" id="contact">
							Contact
						</div>
					</div>
					<div class="row shim">
						<div class="col-xs-12 col-sm-4 col-md-4 address">
							<span>Illuminus America</span><br>
							11 W 53rd St <br>
							New York, NY <br>
							10019<br>
							USA
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 address">
							<span>Illuminus ASIA</span><br>
							1 Wusi Street<br>
							Dongcheng District<br>
							Beijing, China<br>
							100010
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 address">
							<span>Illuminus Europe</span><br>
							Bankside<br>
							London SE1 9TG<br>
							United Kingdom
						</div>
					</div>
				</div>
			</div>


			<!-- dark gray -->
			<div class="row bkg-darkgray">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="row shim">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<img src="app/assets/img/logo_footer.png">
							<div class="menu"> 
								<a href="#top">Home</a>
								<a href="#services">Services</a>
								<a href="app/?data_set=sample&step=privacy&lang=EN">Privacy</a>
								<a href="#contact">Contact</a>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>





<?php
include_once('templates/header.php');
?>
