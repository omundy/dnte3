<?php

$control = array();
require_once('app/inc/om_functions.php');
$control['url'] = request_protocol() . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// figure out what domain we're on
if (isset($_SERVER['HTTP_HOST'])){
	$search = array('https://','http://','www');
	$control['domain'] = str_replace($search,'',$_SERVER['HTTP_HOST']);
	if ($control['domain'] == 'dnt.dev'){
		$control['baseurl'] = request_protocol() . "://dnt.dev/illuminus.io/";
	} else {
		$control['baseurl'] = request_protocol() . "://illuminus.io/";
	}
} else {
	$control['baseurl'] = request_protocol() . "://$_SERVER[HTTP_HOST]/illuminus.io/";
	$control['domain'] = 'dnt.dev';
}


// get page
if( isset($_GET['page']) ){
	$control['page'] = $_GET['page'];
} else {
	$control['page'] = '';
}

// get lang
if( isset($_GET['lang']) ){
	$control['lang'] = $_GET['lang'];
} else {
	require_once('app/inc/localization.php');
	$control['lang'] = get_language();
	header('Location: '. $control['baseurl'] .''. $control['lang'] .'/'. $control['page'], true, 303);
}

//report($control,200);

require_once('app/inc/text_'. strtolower($control['lang']) .'.php');
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
							<a href="<?php print $control['baseurl'] ?>"><img src="<?php print $control['baseurl'] ?>app/assets/img/logo.png" alt="illuminus logo"></a>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-5 menu home" style="text-align: left">
							<!--<a href="#about">About</a>-->
							<a href="#services"><?php print $text['homepage']['services'] ?></a>
							<a href="<?php print $control['baseurl'] ?><?php print $control['lang'] ?>/privacy"><?php print $text['homepage']['privacy'] ?></a>
								<a href="<?php print $control['baseurl'] ?><?php print $control['lang'] ?>/press"><?php print $text['homepage']['press'] ?></a>
							<a href="#contact"><?php print $text['homepage']['contact'] ?></a>
						</div>
					</div>
					

					
					


				<?php if ( !isset($control['page']) || $control['page'] == ''){ ?>
				
					<div class="row shim">

						<div class="col-xs-12 col-sm-12 col-md-7 pad-top">
							<div align="center" class="embed-responsive embed-responsive-16by9">
							
								<video class="homepage_video" poster="<?php print $control['baseurl'] ?>app/assets/img/illuminus_promo_banner_video.png">
									<source src="https://download.arte.tv/permanent/donottrack/episode3/illuminus/illuminus_promo2.mp4" type='video/mp4' />
									<source src="https://download.arte.tv/permanent/donottrack/episode3/illuminus/illuminus_promo2.webm" type='video/webm' />
									Your browser does not support the video tag.
								</video>
								
							</div>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-5 pad-top" style="text-align: left">


							<img src="<?php print $control['baseurl'] ?>app/assets/img/unlocking.png" class="left">
							
							<div class="unlocking-content left"><?php print $text['homepage']['unlocking'] ?><br>
							<a href="<?php print $control['baseurl'] ?>app/<?php print $control['lang'] ?>/user/zero"><?php print $text['homepage']['get_started_btn'] ?></a></div>
						</div>
					</div>
					
					
				<?php } else if ( isset($control['page']) && $control['page'] == 'press' ){ ?>
					
					<div class="row shim">
						<div class="col-xs-12 col-sm-12 col-md-12 pad-top" style="text-align: left">
							
							<p>FOR IMMEDIATE RELEASE</p>
							
							<p>APRIL 28, 2015</p> 
							
							<h4>ILLUMINUS CORP LAUNCHES FUTURE PRESENT RISK DETECTION APP</h4>
							
						</div>	
					</div>
					
					
					<div class="row shim">


						<div class="col-xs-12 col-sm-12 col-md-8" style="text-align: left">


<p>Today Illuminus launches a groundbreaking web service that uses your Facebook data to tell you how risky you might be in your financial and health decisions. 

<p>Illuminus' new <a href="<?php print $control['baseurl'] ?>app/">Future Present Risk Detection application</a> first analyzes users' Facebook data to build a character profile, revealing insights into how Facebook targets users and matches them to ad content. 

<p>Illuminus then analyzes the things you have liked on Facebook to determine your Big Five personality traits and shows how even your most boring data can be used to determine your behavior.

<p>Next, it uses this information to assess users' potential health and financial risk and concludes whether or a user would be a good candidate for health insurance or a loan.

<p>This application employs cutting-edge research in psycho-demographic trait predictions developed at the University of Cambridge Psychometrics Centre, as well as additional information published in the Journal of Risk Research.

<p>Illuminus' Future Present Risk Detection has the potential to bring the power of your social data to bear on your insurance and financial evaluations. Whether you like it or not!!



<h4>Additional information</h4>

<p>Illuminus is a new service to accompany Do Not Track (<a href="https://donottrack-doc.com">https://donottrack-doc.com</a>) a personalized documentary series about tracking and the web economy. Illuminus uses a fictional scenario of a corporation deciding your financial services to uncover real-life techniques of data analysis.

<h4>Contact information</h4>
<a href="https://twitter.com/illuminus_io">Twitter</a><br>
<a href="https://www.facebook.com/pages/Illuminus/1576518889296783">Facebook</a>


							
						</div>
						
						
						<div class="col-xs-12 col-sm-12 col-md-4 pad-top" style="text-align: left"> </div>
						
						
					</div>
					<?php } else if ( isset($control['page']) && $control['page'] == 'privacy' ){ ?>
					
					<div class="row shim">
						<div class="col-xs-12 col-sm-12 col-md-12 pad-top" style="text-align: left">
							
							<h4><?php print $text['privacy']['0_heading'] ?></h4>
							
						</div>	
					</div>
					
					
					<div class="row shim">

						<div class="col-xs-12 col-sm-12 col-md-8" style="text-align: left">

							<?php print $text['privacy']['policy'] ?>

						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-4 pad-top" style="text-align: left"> </div>
						
						
					</div>
					<?php } ?>	
					
					
					
					
					

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
								<img src="<?php print $control['baseurl'] ?>app/assets/img/risk.png">
								<br>
								<span class="med"><?php print $text['homepage']['risk_assessment'] ?></span>
								<br>
								<span class="sm"><?php print $text['homepage']['future'] ?></span>
							</a>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<img src="<?php print $control['baseurl'] ?>app/assets/img/liveforever.png">
							<br>
							<span class="med"><?php print $text['homepage']['liveforever'] ?>&trade;</span>
							<br>
							<span class="sm"><?php print $text['homepage']['dna_backup'] ?><br>[<?php print $text['homepage']['coming_soon'] ?>]</span>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<img src="<?php print $control['baseurl'] ?>app/assets/img/socialintegration.png">
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
							<a href="<?php print $control['baseurl'] ?>app/<?php print $control['lang'] ?>/user/zero"><?php print $text['homepage']['launch_btn'] ?></a></div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<img src="<?php print $control['baseurl'] ?>app/assets/img/riskgraph.png">
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
						<a href="https://www.facebook.com/pages/Illuminus/1576518889296783"><i class="fa fa-facebook fa-2x" style="margin-right: 30px"></i></a>
						<a href="mailto:contact@donottrack-doc.com"><i class="fa fa-envelope-o fa-2x"></i></a>
					</div>
				</div>
			</div>


			<!-- dark gray -->
			<div class="row bkg-darkgray">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="row shim">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<img src="<?php print $control['baseurl'] ?>app/assets/img/logo_footer.png">
							<div class="menu">
								<a href="#top"><?php print $text['homepage']['home'] ?></a>
								<a href="<?php print $control['baseurl'] ?><?php print $control['lang'] ?>/privacy"><?php print $text['homepage']['privacy'] ?></a>
								<a href="<?php print $control['baseurl'] ?><?php print $control['lang'] ?>/press"><?php print $text['homepage']['press'] ?></a>
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
$path_to_stats = $control['baseurl'] .'app/inc/stats/';
include_once('app/inc/stats/analytics-illuminus.inc.php');
include_once('templates/footer.php');
?>
								
