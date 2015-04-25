<?php

$control = array();
require_once('app/inc/om_functions.php');
$control['url'] = request_protocol() . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
require_once('app/inc/localization.php');
$control['lang'] = get_language();
require_once('app/inc/text_'. $control['lang'] .'.php');
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
							<a href="#services"><?php print $text['homepage']['services'] ?></a>
							<a href="app/?data_set=sample&step=privacy&lang=EN"><?php print $text['homepage']['privacy'] ?></a>
							<a href="#contact"><?php print $text['homepage']['contact'] ?></a>
						</div>
					</div>




					<div class="row shim">

						<div class="col-xs-12 col-sm-12 col-md-7 pad-top">
							<div align="center" class="embed-responsive embed-responsive-16by9">
							
								<video class="homepage_video" poster="app/assets/img/illuminus_promo_banner_video.png">
									<source src="https://download.arte.tv/permanent/donottrack/episode3/illuminus/illuminus_promo2.mp4" type='video/mp4' />
									<source src="https://download.arte.tv/permanent/donottrack/episode3/illuminus/illuminus_promo2.webm" type='video/webm' />
									Your browser does not support the video tag.
								</video>
								
							</div>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-5 pad-top" style="text-align: left">


							<img src="app/assets/img/unlocking.png" class="left">
							
							<div class="unlocking-content left"><?php print $text['homepage']['unlocking'] ?><br>
							<a href="./app"><?php print $text['homepage']['get_started_btn'] ?></a></div>
						</div>
					</div>


				</div>
			</div>


			<!-- green -->
			<div class="row bkg-green">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="row shim">
						<div class="col-xs-12 col-sm-12 col-md-12 services" id="services">
							<?php print $text['homepage']['our_services'] ?>
						</div>
					</div>
					<div class="row shim services-kids">
						<div class="col-xs-12 col-sm-4 col-md-4">
							<a href="#risk">
								<img src="app/assets/img/risk.png">
								<br>
								<span class="med"><?php print $text['homepage']['risk_assessment'] ?></span>
								<br>
								<span class="sm"><?php print $text['homepage']['future'] ?></span>
							</a>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<img src="app/assets/img/liveforever.png">
							<br>
							<span class="med"><?php print $text['homepage']['liveforever'] ?>&trade;</span>
							<br>
							<span class="sm"><?php print $text['homepage']['dna_backup'] ?><br>[<?php print $text['homepage']['coming_soon'] ?>]</span>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<img src="app/assets/img/socialintegration.png">
							<br>
							<span class="med"><?php print $text['homepage']['social_media'] ?></span>
							<br>
							<span class="sm"><?php print $text['homepage']['you_have_no_idea'] ?><br>[<?php print $text['homepage']['coming_soon'] ?>]</span>
						</div>
					</div>
				</div>
			</div>

			<!-- grid -->
			<div class="row bkg-grid risk">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="row shim">
						<div class="col-xs-12 col-sm-6 col-md-6" id="risk">
							<div class="unlocking-content left"><?php print $text['homepage']['future_present'] ?></div>
							<div class="med left">
								<?php print $text['homepage']['learn_what'] ?>
								<br><br>
							<a href="./app"><?php print $text['homepage']['launch_btn'] ?></a></div>
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
							<?php print $text['homepage']['contact'] ?>
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
					<div class="row shim">
						<a href="https://twitter.com/illuminus_io"><i class="fa fa-twitter fa-2x" style="margin: 40px 30px 0 0"></i></a>
						<a href="https://www.facebook.com/games/?fbs=-1&app_id=761116317308745"><i class="fa fa-facebook fa-2x" style="margin-right: 30px"></i></a>
						<a href="mailto:contact@donottrack-doc.com"><i class="fa fa-envelope-o fa-2x"></i></a>
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
								<a href="#top"><?php print $text['homepage']['home'] ?></a>
								<a href="#services"><?php print $text['homepage']['services'] ?></a>
								<a href="app/?data_set=sample&step=privacy&lang=EN"><?php print $text['homepage']['privacy'] ?></a>
								<a href="#contact"><?php print $text['homepage']['contact'] ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>





<?php
$control['step'] = "homepage";
$path_to_stats = 'app/inc/stats/';
include_once('app/inc/stats/analytics-illuminus.inc.php');
include_once('templates/footer.php');
?>
								
