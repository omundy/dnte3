<?php

require_once('inc/languages.php');
require_once('inc/fb_login.php');
include_once('templates/header.php');




// show correct step
$css = '<style scoped media="all" type="text/css">';
$css .= '#step_'.$control['step'].' { display: block; }';

// all chart colors
$chart_colors = 'fillColor: "rgba(100,100,100,1)", strokeColor: "rgba(0,0,0,0)", highlightFill: "rgba(10,188,136,.75)", highlightStroke: "rgba(0,0,0,0)", ';


if($control['player'] == 'yes'){
	$scripts .= "\n $('#backtovideo_btn').on('click',function(){ parent.resumeVideo() }); \n";
	$content_col = 12;
	$css .= '.content-col .inner { margin-top: 10px; }';
} else {
	include_once('templates/sidebar.php');
	$content_col = 9;
}



print $css . '</style>';





?>	

		<div class="col-sm-<?php print $content_col; ?> content-col">
			<div class="inner">
		
		
				<?php if($control['player'] == 'yes'){ ?>
				<div class="row">
					<div class="col-sm-10 ">
						<img src='assets/img/logo.png' alt='illuminus logo' style="float: left; margin: 0 0 20px 0;">
						<div class='product_name' style="float: left; margin: 18px 0 0 20px;"><?php print $text['meta'][$control['lang']]['product_name']?> </div>
					</div>
					<div class="col-sm-2 ">
						<button class="step1_btn btn btn-custom" id="backtovideo_btn"><?php print $text['meta'][$control['lang']]['resume_video']; ?></button>
					</div>
				</div>
				<?php } ?>
		
		
<?php

$pic = 'assets/img/fb_profile_img.png';
						
if (isset($_SESSION['dnt_user'])){
	
	if ( isset($user['me']['photo'])){
		$pic = $user['me']['photo'];
	} 
}

?>		
		
		
		
				
				<!-- load_data -->
				<?php if ($control['step'] == 'load_data'){ ?>
				<div id="" class="step">
					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text['load_data'][$control['lang']]['0_heading'] ?></h3>							
						</div>
						<?php
							
							/*<div class="col-sm-2 title">
						<img src="<?php print $pic ?>" class="img-rounded" style="width:40px; height: 40px"><?php print $user['me']['name'] ?>			
						</div>*/
						?>
					</div>
					<div class="row">
						<div class="col-sm-12">
							
							
							
							
							
							<?php
							
							if (isset($_SESSION['dnt_user'])){
																
							?>
								<p><?php print $text['meta'][$control['lang']]['get_current_data_set']; ?></p>
								<div class="profile_box">
									<div class="profile_img"><img src="<?php print $pic ?>" class="img-rounded profile-pic"></div>
									<div class="profile_txt">
										<div class="profile_name"><?php print $user['me']['name'] ?></div>
										<div class="profile_age"><?php print $user['me']['gender'] ?></div>
										<div class="profile_gender"><?php print $user['me']['age'] ?> years</div>
									</div>	
								</div>
								
								<br>
								
								<p><?php print $text[0][$control['lang']]['select_assessment'] ?></p>
								
								
								
							<?php } else { ?>
							
							<img src="assets/img/illuminus_cover_img.jpg">							
						
							<?php } ?>
								
			<h4 style="clear: both; margin: 30px 0 0 0"><?php print $text['meta'][$control['lang']]['get_select_a_data_set']; ?></h4>
										
			<p>
			<?php if( $control['fb_login_state'] == 'no' ){ ?>
			<button id="fb_login_btn" class="btn btn-large fb_btn"><img src="assets/img/icon_fb_btn.png" alt="fb logo"> 
			<?php print $text['meta'][$control['lang']]['login_with_facebook'] ?>
			<?php } else { ?>
			<button id="get_fb_data_btn" class="btn btn-large fb_btn"><img src="assets/img/icon_fb_btn.png" alt="fb logo"> 
			<?php print $text['meta'][$control['lang']]['get_fb_data_btn']; ?>
			<?php } ?>
			</button>

			<p>... <?php print $text['meta'][$control['lang']]['get_select_or']; ?> ...

			<p><button id="get_sample_data_btn" class="btn btn-large btn-custom"><?php print $text['meta'][$control['lang']]['get_sample_data_btn']; ?></button>				
							
							

							
							
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- /load_data -->
				
				
				
				
				<!-- privacy -->
				<?php if ($control['step'] == 'privacy'){ ?>
				<div id="" class="step">
					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text['privacy'][$control['lang']]['0_heading'] ?></h3>							
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							

<p>Illuminus is a satirical website created for the documentary series Do Not Track (<a href="https://www.donottrack-doc.com">www.donottrack-doc.com</a>).  When you log in via Facebook, we access information you have shared on Facebook to build the Illuminus website.  </p>

<p>When you use Illuminus, it will create a "personality profile" for you.  If you access Illuminus while watching an episode of Do Not Track, and you create an account on Do Not Track, we will store this information on your profile.  This profile will only contain the information you gave authorization for us to access. If you access Illuminus at <a href="https://illuminus.io">illuminus.io</a> your personal information will not be saved.</p>

<p>When you use <a href="https://www.donottrack-doc.com">www.donottrack-doc.com</a>, we do request some information from you, such as your email address, as well as aspects of your browsing history.  If you volunteer that information, the terms below describe your rights and our responsibilities.

<h4>Your data</h4>

<p>The Producers guarantee that they are the sole recipients of the data collected and that it will be used exclusively for the Project and will neither be passed on, nor accessible, nor sold to any third party whatsoever. The Producers implement technical and organizational security measures to ensure that its users’ personal data is protected against loss, fraudulent alterations, or unauthorized access by third parties. The transmission of data collected during registration is carried out in an encrypted manner, as is subsequent communication between the server and the Project.</p>

<p>The producers will use your email address for the following purposes:
<ul>
<li>keep you abreast of the broadcast of upcoming episodes of the Project,</li>
<li>invite you to follow the Project’s news</li>
<li>offer personalized content</li>
</ul>

Your personal data will be stored within the Project database and retained for the life of the Project (3 years).</p>

<p>You have the right to access, modify, correct, and delete your information. To exercise this right, or to opt out, write to: data@donottrack-doc.com</p>

<h4>INFORMATICS AND LIBERTY</h4>

<p>According to French law n°78-17 of 6th January 1978 on informatics, files and liberties, every user who made a contribution has the right of opposition (art. 38), access (art. 39, 41, 42) and rectification (art.40) of his contents.</p>

<p>He thus can require his contribution to be corrected, completed, clarified, updated or erased if it is incorrect, incomplete, false, obsolete or if its collection, use, communication and conservation are prohibited.</p>

<p>Every user can assert this right by writing to the following address: data@donottrack-doc.com</p>

<h4>COOKIES</h4>

<p>The site http://donottrack-doc.com/ utilizes Google Analytics & Xiti.</p>

<p>Google Analytics, a web analytics service allows Do Not Track to study your usage of the site.</p>

<p>The data generated by these navigation analysis cookies regarding your usage of the site: sites visited, frequency, number and repeat of visits, navigation time, research carried out, browser used, operator providing the service, location relative to the IP address.</p>

<p>They are generally transmitted to and stored by Google on servers located in the United States.</p>

<p>If you choose to make your IP address anonymous on this site, your IP address will be nonetheless handed over to Google, yet truncated within the Member States of the European Union or among other signatory states of the European Economic Area Agreement. Only in exceptional circumstances will your IP address be fully transmitted to a Google server in the USA, and truncated there.</p>

<p>Along with other data captured by Google, Google will not shorten your transmitted IP address within Google Analytics. Google will use this information to evaluate your usage of the website, compile for Do Not Track reports on website activity and Internet usage: measures and analyses navigation and user behavior, development of anonymous navigation profiles, areas for improvement based on the analysis of usage data collected.</p>

<p>For more information, see Google’s privacy policy.</p>

<p>In addition to blocking cookies in the browser, you can disable Google Analytics while browsing through a module provided by Google.</p>

<p>Xiti is a web audience measurement tool offered by AT Internet company. In order to establish visitor statistics, Xiti leaves a cookie to track a visitor's journey. For example, this allows avoiding doubling up on the visitor count as if new when reloading the page. Additionally, Xiti prevents website publishers from exaggerating their own statistics when they reload a page. In order to provide reports and services in connection with the usage of the site and the Internet, Xiti uses information collected by its cookies at the request of Do Not Track. Xiti will not capture your IP address with any data it holds.</p>

<p>For more information, see Xiti’s Privacy Statement.</p>

<h4>For more information</h4>

<p>To obtain further information about cookies and the use of these analysis tools, the Internet user can visit the CNIL website.</p>


<h4>Terms of Service URL</h4>

User Support Email: <a href="mailto:contact@donottrack-doc.com">contact@donottrack-doc.com</a><br>
User Support URL <a href="https://hub.donottrack-doc.com/en/about/">https://hub.donottrack-doc.com/en/about/</a>




							
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- /privacy -->
				
				
				
				
				
				<!-- credits -->
				<?php if ($control['step'] == 'credits'){ ?>
				<div id="" class="step">
					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text['credits'][$control['lang']]['0_heading'] ?></h3>							
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							
							
							<h4><?php print $text['credits'][$control['lang']]['1_thankyou'] ?></h4>
							
							<p><br>
							<a href="http://www.psychometrics.cam.ac.uk/" target="_blank">University of Cambridge Psychometrics Centre</a><br>
							Dr Michal Kosinski<br>
							Vesselin Popov<br>
							Dr David Stillwell<br>
							Bartosz Kielczewski<br>
							</p>
							
							
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- /credits -->
				
				
				
				
				
				<!-- error -->
				<?php if ($control['step'] == 'error'){ ?>
				<div id="" class="step">
					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text['meta'][$control['lang']]['alt_data_heading'] ?></h3>					
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							
							<p><?php 
								print $text['meta'][$control['lang']]['alt_data_p1'] .' ';
								print $text['meta'][$control['lang']]['alt_data_reasons'][$control['show_alt_data_reason']]  .'. ';
								print '</p><p>';
								print '<a href="?data_set='.$control['data_set'].'&amp;step=one&amp;lang='. $control['lang'] .'" class="step1_btn btn btn-custom">' . $text['meta'][$control['lang']]['alt_data_click'] .'</a> ';
								print $text['meta'][$control['lang']]['alt_data_p2'];
							?></p>
							
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- /error -->
				
				
				

							
							
							
							
				
				
				
				
				<!-- step_zero -->
				<?php if ($control['step'] == 'zero'){ ?>
				<div id="step_zero" class="step">
					<?php if($control['player'] == 'no'){ ?>
					<div class="row">
						<div class="col-sm-12 title">
							
							
							<p><?php print $text[0][$control['lang']]['0_heading'] ?></p>

							
							<video autoplay>
							<source src="https://dl.dropboxusercontent.com/u/7968133/illuminus%20promo.mp4" type="video/mp4">
							Your browser does not support the video tag.
							</video>	
							
							<h1><?php print $text[0][$control['lang']]['callout'] ?></h1>
							
							
							<?php 
							
							if (isset($session)) {
								print '<p>'. $text[0][$control['lang']]['select_assessment'] .'.</p>';									
							} else {
								
								print '<p>'. $text[0][$control['lang']]['please_login'] .'.</p>';
							}
							
							?>
							
								
							
							
						</div>
					</div>
					<?php } ?>
					<div class="row">
						<div class="col-sm-7">
							
							
							
						</div>
						<div class="col-sm-5">
							<!--<img src="assets/img/network.png" alt="network" class="img-responsive">
							<p><?php print $text[0][$control['lang']]['0_heading'] ?></p>
							<h1><?php print $text[0][$control['lang']]['callout'] ?></h1>-->
							
							
							
							
							
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- /step_zero -->
	
	
	
	
	
	
	
		
	
	
				
				
				<!-- step_one -->
				<div id="step_one_cover"></div>
				<?php if ($control['step'] == 'one'){ ?>
				<div id="step_one" class="step">
					
		
					
					<div id="step1_frame_1">
						
											
						<div class="row">
							<div class="col-sm-12 title">
								<h3><?php print $text[1][$control['lang']]['1_1_heading'] ?></h3>
								
								
								<?php if (isset($user['like_timeline'])){ ?>
								<p><?php print $text[1][$control['lang']]['1_1_subheading'] ?>
								<?php } ?>
							</div>
						</div>
						
						<?php if (isset($user['like_timeline'])){ ?>
						<div class="row">
							<div class="col-sm-6 left">
								
								
								<?php
									
								// Your social activity reveals a lot about you.	
								print "<p>". $text[1][$control['lang']]['1_1_p1_1'];
								
								if ( isset($user['me']['age']) || isset($user['me']['gender']) ){
									
									// Your profile for instance says that 
									print " ". $text[1][$control['lang']]['1_1_p1_2'];
								
									// AGE
									if ( isset($user['me']['age']) ){
										// your age is
										print " ". $text[1][$control['lang']]['1_1_p1_3'];
										// [AGE] 
										print ' <span class="udata">'. $user['me']['age'] .'</span>';
									}
									
									// and
									if ( isset($user['me']['age']) && isset($user['me']['gender']) ) print " ". $text[1][$control['lang']]['1_1_p1_4'] ." ";
									
									// GENDER
									if ( isset($user['me']['gender']) ){
										// your gender is
										print " ". $text[1][$control['lang']]['1_1_p1_5'];
										// [GENDER] 
										print ' <span class="udata">'. $user['me']['gender'] .'</span>';
									}
									
									print '.';
								}
								
								
								if ( isset($user['likes']) && count($user['likes']) > 0 && isset($user['big5']) ){
									//report($big5_temp_high);
									
									// But the real gold mine is your Facebook data over time.
									print " ". $text[1][$control['lang']]['1_1_p1_6'];
									
									// By analyzing the [NUMBER OF LIKES]
									print "<p>". $text[1][$control['lang']]['1_1_p1_7'] . ' <span class="udata">'. count($user['likes']) ."</span> ";
									
									// things you have liked on Facebook, we have used our advanced algorithm techniques to assess your personality and have found you scored highest in 
									print $text[1][$control['lang']]['1_1_p1_8'];
									
									// insert [BIG5]
									// sort big 5 by value high > low
									$big5_temp_high = $user['big5'];
									arsort( $big5_temp_high );
									$big5_highest = key($big5_temp_high);
									print ' <span class="udata">'. $big5_highest .'</span>';
									
									// which indicates you are
									print " ". $text[1][$control['lang']]['1_1_p1_9'];
									
									// insert [BIG5 TRAITS]
									$traits = explode(',',$text['big5'][$control['lang']][$big5_highest]['keywords']);
									for($i=0; $i<count($traits); $i++){
										print ' <span class="udata">'. $traits[$i] .'</span>';
										if ($i < count($traits)-2){
											print ", ";
										} else if ($i == count($traits)-2){ 
											print ", and ";
										}
									}
									print ". ";
									// Our system uses the Apply Magic Sauce personality evaluation system developed by the world’s leading scientists.
									print ' '. $text[1][$control['lang']]['1_1_p1_10'];

									// It may surprise you that your interest in
									print '<p>'. $text[1][$control['lang']]['1_1_p1_11'];
									
									$i=0;
									//report($user['likes']);
									foreach($user['likes'] as $like_arr){
									
										if (isset( $like_arr )){
											print ' <span class="udata">'. $like_arr['name'] .'</span>';
											if ($i < 2){
												print ", ";
											} else if ($i < 3){ 
												print ", and ";
											} else { 
												break;
											}
										}
										$i++;
									}
									// helped us decide who you really are. And these aren’t the only things you’ve liked.
									print ' '. $text[1][$control['lang']]['1_1_p1_12'];
									
									
								}
								//report($user['big5']);

								?>
								
								<div><br>
									<button class="step1_btn btn btn-custom" id="step1_1_next_btn"><?php print $text[1][$control['lang']]['1_1_p1_next']; ?></button>
								</div>
								
							</div>
							
							
							<div class="col-sm-6">
								
								<?php
																	
									############### LIKE_TIMELINE ###############
									
									//arsort($user['like_timeline']); // sort by frequency
									//report($user['like_timeline']);
									// sort by key
									ksort($user['like_timeline']); // sort by key
									
									$str = 'var bar_like_timeline_data = {';
									// make labels
									$str .= 'labels: [';
									$delimiter = '';
									foreach($user['like_timeline'] as $key => $val){
										$str .= $delimiter.'"'.$key.'"';
										$delimiter = ', ';
									}
									// make dataset
									$str .= '], datasets: [{';
									$str .= 'label: "Likes timeline", ';
									$str .= $chart_colors;
									$str .= 'data: [';
									$delimiter = '';
									foreach($user['like_timeline'] as $key => $val){
										$str .= $delimiter.$val;
										$delimiter = ', ';
									}
									$str .= ']}]};';
									$str .= "var ctx = document.getElementById('bar_like_timeline').getContext('2d');
											 var bar_like_timeline = new Chart(ctx).Bar(bar_like_timeline_data, bar_chart_options); 
											 $('#step1_frame_1').hide();
											 \n\n\n";
									// store script for printing below
									$scripts .= $str;
									// div to hold chart
									print "<div class='chart'><canvas id='bar_like_timeline'></canvas></div>
										   <div class='chart_caption'>Your likes over time</div>\n
										   ";
		
								?>
							</div>
							
							
							
							
						</div><!-- row -->
						<?php } ?>	
						
					</div>
					
					
					
					
					
						
					
					
					
					
					
					<?php if (isset($user['like_timeline'])){ ?>
					<div id="step1_frame_2">
						
						
						<div class="row">
							<div class="col-sm-12 title">
								<h3><?php print $text[1][$control['lang']]['1_2_heading'] ?></h3>
								<p><?php print $text[1][$control['lang']]['1_2_subheading'] ?>
							</div>
						</div>	
						
												
						
						<div class="row">
							<div class="col-sm-6 left">
							
							<p><?php print $text[1][$control['lang']]['1_2_p1_1'] ?></p>
							
							
							<div><br>
								<button class="step1_btn btn btn-custom" id="step1_2_prev_btn"><?php print $text[1][$control['lang']]['1_2_p1_back']; ?></button>
								<button class="step1_btn btn btn-custom" id="step1_2_next_btn"><?php print $text[1][$control['lang']]['1_2_p1_next']; ?></button>
							</div>
							
							
							</div>
							<div class="col-sm-6">
								<?php
									
									############### LIKE_CATEGORIES ###############
									
									arsort($user['like_categories']); // sort by frequency
									//report($user['like_categories']);
									//ksort($user['like_categories']); // sort by key
									
									// create other category
									if(!array_key_exists('Other',$user['like_categories'])) {
										$user['like_categories']['Other'] = 0;
									}
									if ($user['like_categories'] > 35){
										$limit = 4;
									} else {
										$limit = 2;
									}
									foreach($user['like_categories'] as $key => $val){
										if( $val < $limit && $key != 'Other'){
											// remove from array
											unset($user['like_categories'][$key]);
											// add to Other
											$user['like_categories']['Other']++;
										}
									}
									// move Other to the end
									$val = $user['like_categories']['Other'];
									unset($user['like_categories']['Other']);
									$user['like_categories']['Other'] = $val;
									
									$colors0 = array('#09bc87','#E5F9E0','#A3F7B5','#40C9A2','#664147');
									$colors1 = array('#09bc87','#DEE5E5','#9DC5BB','#5E807F','#082D0F');
									$colors2 = array('#444444','#E0BAD7','#555555','#61D095','#666666','#48BF84','#777777','#F5E3E0','#888888','#E8B4BC','#999999','#D282A6');
									$colors3 = array('#444444','#555555','#666666','#777777','#888888','#999999');
									$c = 0;
									
									$str = 'var donut_like_category_data = [';
									$str .= "\n";
									$delimiter = '';
									foreach($user['like_categories'] as $key => $val){
										$str .= $delimiter."{";
										$str .= "value: $val, ";
										if ($c >= count($colors3)) $c = 0;
										$str .= "color: '". $colors3[$c++] ."', ";
										//$str .= "color: '". $colors2[rand(0,count($colors2)-1)] ."', "; // random
										$str .= "highlight: '#09bc87', ";
										$str .= "label: '$key'";
										$str .= "}\n";
										$delimiter = ', ';
									}
									$str .= '];';
									$str .= "\n 
											var donut_chart = document.getElementById('donut_like_category').getContext('2d');
											var donut_like_category = new Chart(donut_chart).Doughnut(donut_like_category_data, pie_chart_options);
											$('#step1_frame_2').hide();
											\n\n";
									// store script for printing below
									$scripts .= $str;
									// div to hold chart
									print "<div class='chart'><canvas id='donut_like_category'></canvas></div>
										   <div class='chart_caption'>Your likes categories</div>";
	      
								?>
								
							</div>
						</div>
						
					</div>
					<?php }  ?>
					
					
					
					
					
					
					
					
					
					<?php if (isset($user['big5'])){ ?>
					<div id="step1_frame_3">
						
											
						<div class="row">
							<div class="col-sm-12 title">
								<h3><?php print $text[1][$control['lang']]['1_3_heading'] ?></h3>
								<p><?php print $text[1][$control['lang']]['1_3_subheading'] ?>
							</div>
						</div>
						
						
						
						<div class="row">
							
							
							<div class="col-sm-6">
		
								<p><?php print $text[1][$control['lang']]['1_3_1'] ?></p>
								
								<p><?php 
								
								print $text[1][$control['lang']]['1_3_2'];
								
								print ' <span class="udata">'. $traits[0] .'</span>';
								// and 
								print ' '. $text[1][$control['lang']]['1_3_3'] .' ';
								print ' <span class="udata">'. $traits[1] .'</span>.';
								
								?>
								</p>
								
								<div><br>
									<button class="step1_btn btn btn-custom" id="step1_3_prev_btn"><?php print $text[1][$control['lang']]['1_2_p1_back']; ?></button>
								</div>
							</div>
							<div class="col-sm-6 left">
							
								<?php
									
									############### BIG5_RADAR ###############
									/*
									foreach($user['big5'] as $key => $val){
										$newkey = str_replace('BIG5_', '', $key);
										$user['big5'][$newkey] = $user['big5'][$oldkey];
										unset($arr[$oldkey]);
										
										
										print $key;
										
									}
									*/
									$colors0 = array('#09bc87','#E5F9E0','#A3F7B5','#40C9A2','#664147');
									$colors1 = array('#09bc87','#DEE5E5','#9DC5BB','#5E807F','#082D0F');
									$c = 0;
									
									
									$str = "\n\n var radar_big5_data = {";
									// make labels
									$str .= 'labels: [';
									$delimiter = '';
									foreach($user['big5'] as $key => $val){
										$str .= $delimiter.'"'.$key.'"';
										$delimiter = ', ';
									}
									// make dataset
									$str .= '], datasets: [{';
									$str .= 'label: "Big5", ';
									$str .= $chart_colors;
									$str .= 'data: [';
									$delimiter = '';
									foreach($user['big5'] as $key => $val){
										$str .= $delimiter.$val;
										$delimiter = ', ';
									}
									$str .= ']}]};';
									$str .= "
											if (!radar_chart_options) var radar_chart_options = {};
											radar_chart_options.scaleOverride = true;
											radar_chart_options.scaleSteps = 2;
											radar_chart_options.scaleStepWidth = .5;
											radar_chart_options.scaleStartValue = 0; 
											//radar_big5_data.datasets[0].fillColor = 'rgba(255,255,255,.3)';
											
											var ctx = document.getElementById('radar_big5').getContext('2d');
											var radar_big5 = new Chart(ctx).Radar(radar_big5_data, radar_chart_options);
											$('#step1_frame_3').hide();
											\n\n";
									// store script for printing below
									$scripts .= $str;
									// div to hold chart
									print "<div class='chart'><canvas id='radar_big5'></canvas></div>
										   <div class='chart_caption'>Your Big5 personality analysis</div>";
	      
	      
	            
								?>
								
								
								
							</div>
							
						</div>	
								
						
					</div>
					<script>  </script>
					<?php } else { print '<p>'. $text['meta'][$control['lang']]['no_data_found'] .'</p>'; } ?>
					
					
					
				</div>
				<?php } ?>
				<!-- /step_one -->
			
			
			
			
<?php			
			
function overall_risk(){
	global $user;
	foreach ($user['big5_risk_domains'] as $key => $risk_arr){
		if ($key == 'Career' || $key == 'Finance' || $key == 'Social'){
			$score = 0;
			foreach ($risk_arr as $risk_score){
				//$score += $risk_score;
				if ($risk_score > .5) {
					return true;
				}
			}
			//print "<p>". $score / count($risk_arr);
		}
	}
	
}	

function eval_risk($risk_name){
									
	global $user, $control, $text;
	
	
	
	
	if (isset($user['me']['gender'])){
		
		// calc user risk AND gender for logged in user
		if ( $user['me']['gender'] === 'male' ){
			if ($risk_name == 'Recreation' || $risk_name == 'Health' || $risk_name == 'Safety' || $risk_name == 'Overall'){
				//$risk_score *= 1.5; 
			}
		} else if ($user['me']['gender'] == 'female'){
			if ($risk_name == 'Career' || $risk_name == 'Social' || $risk_name == 'Finance'){
				//$risk_score *= 1.5; 
			}
		} else {
			// leave scores alone
		}
		
	}
	
	$arr = $user['big5_risk_domains'][$risk_name];
	arsort($arr);
	//return($arr);
	$keys=array_keys($arr);
	

	print 'Your high scores in ';
	print ' <span class="udata" style="color:'. get_risk_color($arr[$keys[0]]) .'">'. $keys[0] .'</span> ('. $arr[$keys[0]] .') ';
	print ' and ';
	print ' <span class="udata" style="color:'. get_risk_color($arr[$keys[1]]) .'">'. $keys[1] .'</span> ('. $arr[$keys[1]] .') ';
	print ' indicates a ';
		
	$r = floor( ($arr[$keys[0]] * 10)/2 );	
	print $text['meta'][$control['lang']]['risk_words'][ $r ];
	//print ' ('.$r.') ';
	print ' potential for risk-taking behavior in your ';
	print strtolower($risk_name);
	print ' decisions. ';
	
	foreach($arr as $personality => $score ){
		
	}	
}
		
			
?>			
			
			


				<!-- step_two -->
				<?php if ($control['step'] == 'two'){ ?>
				<div id="step_two" class="step">	
					
					
					
					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text[2][$control['lang']]['2_heading'] ?></h3>
							
							
							<?php if (isset($user['big5_risk_domains'])){ ?>
							<p><?php 
								
								print $text[2][$control['lang']]['2_1'];
								print ' <span class="udata">';
								
								
								
								if (overall_risk()){
									print " not a good ";
								} else {
									print " a good ";
								}
								print '</span> ';
								print $text[2][$control['lang']]['2_2'];
								
								?>
							</p>
							<p><?php print $text[2][$control['lang']]['2_3'] ?></p>
							<?php } ?>
							
						</div>
					</div>
					
					
					
					
					
					
					<?php if (isset($user['big5_risk_domains'])){ ?>
					<div class="row">
						<div class="col-sm-6">
							<h4><?php print $text[2][$control['lang']]['2_career_heading'] ?></h4>
							
							
							<p><?php
								
								eval_risk('Career');
								
								//report($user['big5_risk_domains']);
								
							?></p>
							
						</div>
						<div class="col-sm-6">
							
							<?php
																
								############### RISK_Career ###############
								
								$str = 'var bar_risk_career_data = {';
								// make labels
								$str .= 'labels: [';
								$delimiter = '';
								foreach($user['big5_risk_domains']['Career'] as $key => $val){
									$str .= $delimiter.'"'.$key.'"';
									$delimiter = ', ';
								}
								// make dataset
								$str .= '], datasets: [{';
								$str .= 'label: "Likes timeline", ';
								$str .= $chart_colors;
								$str .= 'data: [';
								$delimiter = '';
								$i = 0;
								$str_color_change_str = '';
								foreach($user['big5_risk_domains']['Career'] as $key => $val){
									$str .= $delimiter.$val;
									$delimiter = ', ';
									$str_color_change_str .= "bar_risk_career.datasets[0].bars[".$i."].fillColor = '". get_risk_color($val) ."';"; 
									$str_color_change_str .= "bar_risk_career.datasets[0].bars[".$i++."].highlightFill = '". get_risk_color($val) ."';"; 
								}
								$str .= ']}]};';
								$str .= "
										
										var ctx = document.getElementById('bar_risk_career').getContext('2d');
										var bar_risk_career = new Chart(ctx).Bar(bar_risk_career_data,{
										    scaleOverride: true,
										    scaleSteps: 2,
										    scaleStepWidth: .5,
										    scaleStartValue: 0 
										});
										$str_color_change_str 
										bar_risk_career.update();
										";		 
										 
										 
								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<div class='chart'><canvas id='bar_risk_career'></canvas></div>
									   <div class='chart_caption'>Career Risk</div>";
	
							?>
						</div>
					</div>
					
					
					
					
					<div class="row">
						<div class="col-sm-6">
							<h4><?php print $text[2][$control['lang']]['2_finance_heading'] ?></h4>
							<p><?php eval_risk('Finance'); ?></p>
							
						</div>
						<div class="col-sm-6">
							
							<?php
																
								############### RISK_Finance ###############
								
								$str = 'var bar_risk_finance_data = {';
								// make labels
								$str .= 'labels: [';
								$delimiter = '';
								foreach($user['big5_risk_domains']['Finance'] as $key => $val){
									$str .= $delimiter.'"'.$key.'"';
									$delimiter = ', ';
								}
								// make dataset
								$str .= '], datasets: [{';
								$str .= 'label: "Likes timeline", ';
								$str .= $chart_colors;
								$str .= 'data: [';
								$delimiter = '';
								$i = 0;
								$str_color_change_str = '';
								foreach($user['big5_risk_domains']['Finance'] as $key => $val){
									$str .= $delimiter.$val;
									$delimiter = ', ';
									$str_color_change_str .= "bar_risk_finance.datasets[0].bars[".$i."].fillColor = '". get_risk_color($val) ."';"; 
									$str_color_change_str .= "bar_risk_finance.datasets[0].bars[".$i++."].highlightFill = '". get_risk_color($val) ."';"; 
								}
								$str .= ']}]};';
								$str .= "var ctx = document.getElementById('bar_risk_finance').getContext('2d');
										var bar_risk_finance = new Chart(ctx).Bar(bar_risk_finance_data,{
										    scaleOverride: true,
										    scaleSteps: 2,
										    scaleStepWidth: .5,
										    scaleStartValue: 0 
										});
										$str_color_change_str 
										bar_risk_finance.update();
										";		 
										 
								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<div class='chart'><canvas id='bar_risk_finance'></canvas></div>
									   <div class='chart_caption'>Career Risk</div>";
	
							?>
						</div>
					</div>

					
					
					
					<div class="row">
						<div class="col-sm-6">
							<h4><?php print $text[2][$control['lang']]['2_social_heading'] ?></h4>
							<p><?php eval_risk('Social'); ?></p>
							
						</div>
						<div class="col-sm-6">
							
							<?php
																
								############### RISK_SOCIAL ###############
								
								$str = 'var bar_risk_social_data = {';
								// make labels
								$str .= 'labels: [';
								$delimiter = '';
								foreach($user['big5_risk_domains']['Social'] as $key => $val){
									$str .= $delimiter.'"'.$key.'"';
									$delimiter = ', ';
								}
								// make dataset
								$str .= '], datasets: [{';
								$str .= 'label: "Likes timeline", ';
								$str .= $chart_colors;
								$str .= 'data: [';
								$delimiter = '';
								$i = 0;
								$str_color_change_str = '';
								foreach($user['big5_risk_domains']['Social'] as $key => $val){
									$str .= $delimiter.$val;
									$delimiter = ', ';
									$str_color_change_str .= "bar_risk_social.datasets[0].bars[".$i."].fillColor = '". get_risk_color($val) ."';"; 
									$str_color_change_str .= "bar_risk_social.datasets[0].bars[".$i++."].highlightFill = '". get_risk_color($val) ."';"; 
								}
								$str .= ']}]};';
								$str .= "
										
										var ctx = document.getElementById('bar_risk_social').getContext('2d');
										var bar_risk_social = new Chart(ctx).Bar(bar_risk_social_data,{
										    scaleOverride: true,
										    scaleSteps: 2,
										    scaleStepWidth: .5,
										    scaleStartValue: 0 
										});
										$str_color_change_str 
										bar_risk_social.update();
										";		 
										 
										 
								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<div class='chart'><canvas id='bar_risk_social'></canvas></div>
									   <div class='chart_caption'>Social Risk</div>";
	
							?>
						</div>
					</div>
					
					
					
					
					
					<?php } else { print '<p>'. $text['meta'][$control['lang']]['no_data_found'] .'</p>'; } ?>
	
	
					<div><br>
						<?php if($control['player'] == 'yes'){ ?>
						<button class="step1_btn btn btn-custom" id="backtovideo_btn"><?php print $text['meta'][$control['lang']]['resume_video']; ?></button><?php } ?>
					</div>

				</div>
				<?php } ?>
				<!-- / step_two -->
	
				
	
				
				
				
				
				
			
			
				
						
						
			
				<!-- step_three -->
				<?php if ($control['step'] == 'three'){ ?>
				<div id="step_three" class="step">
					
					
					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text[3][$control['lang']]['3_heading'] ?></h3>
							
							
							<?php if (isset($user['big5_risk_domains'])){ ?>
							<p><?php 
								
								print $text[3][$control['lang']]['3_1'];
								print ' <span class="udata">';
								
								
								function overall_risk2(){
									global $user;
									foreach ($user['big5_risk_domains'] as $key => $risk_arr){
										if ($key == 'Health' || $key == 'Safety' || $key == 'Recreation'){
											$score = 0;
											foreach ($risk_arr as $risk_score){
												//$score += $risk_score;
												if ($risk_score > .5) {
													return true;
												}
											}
											//print "<p>". $score / count($risk_arr);
										}
									}
									
								}
								if (overall_risk()){
									//print " not a good ";
								} else {
									//print " a good ";
								}
								print '</span> ';
								
								?>
							</p>
							<?php } ?>
							
							
						</div>
					</div>
					
					
					
					<?php if (isset($user['big5_risk_domains'])){ ?>
					<div class="row">
						<div class="col-sm-6">
							<h4><?php print $text[3][$control['lang']]['3_health_heading'] ?></h4>
							<p><?php eval_risk('Health'); ?></p>
							
						</div>
						<div class="col-sm-6">
							
							<?php
																
								############### RISK_HEALTH ###############
								
								//arsort($user['big5_risk_domains']['Health']); // sort by frequency
								//report($user['big5_risk_domains']['Health']);
								// sort by key
								//ksort($user['big5_risk_domains']['Health']); // sort by key
								
								$str = 'var bar_risk_health_data = {';
								// make labels
								$str .= 'labels: [';
								$delimiter = '';
								foreach($user['big5_risk_domains']['Health'] as $key => $val){
									$str .= $delimiter.'"'.$key.'"';
									$delimiter = ', ';
								}
								// make dataset
								$str .= '], datasets: [{';
								$str .= 'label: "Likes timeline", ';
								$str .= $chart_colors;
								$str .= 'data: [';
								$delimiter = '';
								$i = 0;
								$str_color_change_str = '';
								foreach($user['big5_risk_domains']['Health'] as $key => $val){
									$str .= $delimiter.$val;
									$delimiter = ', ';
									$str_color_change_str .= "bar_risk_health.datasets[0].bars[".$i."].fillColor = '". get_risk_color($val) ."';"; 
									$str_color_change_str .= "bar_risk_health.datasets[0].bars[".$i++."].highlightFill = '". get_risk_color($val) ."';"; 
								}
								$str .= ']}]};';
								$str .= "
										
										var ctx = document.getElementById('bar_risk_health').getContext('2d');
										var bar_risk_health = new Chart(ctx).Bar(bar_risk_health_data,{
										    scaleOverride: true,
										    scaleSteps: 2,
										    scaleStepWidth: .5,
										    scaleStartValue: 0 
										});
										$str_color_change_str 
										bar_risk_health.update();
										";		 
										 
										 
								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<div class='chart'><canvas id='bar_risk_health'></canvas></div>
									   <div class='chart_caption'>Health Risk</div>";
	
							?>
						
						</div>
					</div>
					
					
					
					<div class="row">
						<div class="col-sm-6">
							<h4><?php print $text[3][$control['lang']]['3_safety_heading'] ?></h4>
							<p><?php eval_risk('Safety'); ?></p>
							
						</div>
						<div class="col-sm-6">
							
							<?php
																
								############### RISK_SAFETY ###############
								
								$str = 'var bar_risk_safety_data = {';
								// make labels
								$str .= 'labels: [';
								$delimiter = '';
								foreach($user['big5_risk_domains']['Safety'] as $key => $val){
									$str .= $delimiter.'"'.$key.'"';
									$delimiter = ', ';
								}
								// make dataset
								$str .= '], datasets: [{';
								$str .= 'label: "Likes timeline", ';
								$str .= $chart_colors;
								$str .= 'data: [';
								$delimiter = '';
								$i = 0;
								$str_color_change_str = '';
								foreach($user['big5_risk_domains']['Safety'] as $key => $val){
									$str .= $delimiter.$val;
									$delimiter = ', ';
									$str_color_change_str .= "bar_risk_safety.datasets[0].bars[".$i."].fillColor = '". get_risk_color($val) ."';"; 
									$str_color_change_str .= "bar_risk_safety.datasets[0].bars[".$i++."].highlightFill = '". get_risk_color($val) ."';"; 
								}
								$str .= ']}]};';
								$str .= "
										
										var ctx = document.getElementById('bar_risk_safety').getContext('2d');
										var bar_risk_safety = new Chart(ctx).Bar(bar_risk_safety_data,{
										    scaleOverride: true,
										    scaleSteps: 2,
										    scaleStepWidth: .5,
										    scaleStartValue: 0 
										});
										$str_color_change_str 
										bar_risk_safety.update();
										";		 
										 
										 
								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<div class='chart'><canvas id='bar_risk_safety'></canvas></div>
									   <div class='chart_caption'>Safety Risk</div>";
	
							?>
						
						</div>
					</div>
					
					
					
					<div class="row">
						<div class="col-sm-6">
							<h4><?php print $text[3][$control['lang']]['3_recreation_heading'] ?></h4>
							<p><?php eval_risk('Recreation'); ?></p>
							
						</div>
						<div class="col-sm-6">
							
							<?php
																
								############### RISK_recreation ###############
								
								$str = 'var bar_risk_recreation_data = {';
								// make labels
								$str .= 'labels: [';
								$delimiter = '';
								foreach($user['big5_risk_domains']['Recreation'] as $key => $val){
									$str .= $delimiter.'"'.$key.'"';
									$delimiter = ', ';
								}
								// make dataset
								$str .= '], datasets: [{';
								$str .= 'label: "Likes timeline", ';
								$str .= $chart_colors;
								$str .= 'data: [';
								$delimiter = '';
								$i = 0;
								$str_color_change_str = '';
								foreach($user['big5_risk_domains']['Recreation'] as $key => $val){
									$str .= $delimiter.$val;
									$delimiter = ', ';
									$str_color_change_str .= "bar_risk_recreation.datasets[0].bars[".$i."].fillColor = '". get_risk_color($val) ."';"; 
									$str_color_change_str .= "bar_risk_recreation.datasets[0].bars[".$i++."].highlightFill = '". get_risk_color($val) ."';"; 
								}
								$str .= ']}]};';
								$str .= "
										
										var ctx = document.getElementById('bar_risk_recreation').getContext('2d');
										var bar_risk_recreation = new Chart(ctx).Bar(bar_risk_recreation_data,{
										    scaleOverride: true,
										    scaleSteps: 2,
										    scaleStepWidth: .5,
										    scaleStartValue: 0 
										});
										$str_color_change_str 
										bar_risk_recreation.update();
										";		 
										 
										 
								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<div class='chart'><canvas id='bar_risk_recreation'></canvas></div>
									   <div class='chart_caption'>Recreation Risk</div>";
	
							?>
						
						</div>
					</div>
					
					
					
					<?php } else { print '<p>'. $text['meta'][$control['lang']]['no_data_found'] .'</p>'; } ?>
					
					
					<div><br>
						<?php if($control['player'] == 'yes'){ ?>
						<button class="step1_btn btn btn-custom" id="backtovideo_btn"><?php print $text['meta'][$control['lang']]['resume_video']; ?></button><?php } ?>
					</div>
					
				</div>
				<?php } ?>
				<!-- /step_three -->





	
	
			</div><!-- /.inner -->
		</div><!-- /.content-col -->

<?php
	
include_once('templates/footer.php');


?>


<script>

	
	
<?php 
	
print $scripts;

?>


/**
 *	Facebook
 */

// load the Javascript SDK 
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// initialize Facebook
window.fbAsyncInit = function() {
	FB.init({
		appId: 761116317308745,
		cookie: true,	// enable cookies to allow the server to access the session
		xfbml: true,	// parse social plugins on this page
		version: 'v2.3' // use version 2.1
	});
	// check login
	FB.getLoginStatus(checkLoginStatus, true);
	
};



// check login status
function checkLoginStatus(response) {
	//console.log(response);
	
	// connected: Logged into your app
	if(response && response.status == 'connected') {
		var userID = response.authResponse.userID;
		var accessToken = response.authResponse.accessToken;
		
		// confirm accessToken works
		/*
		var call ='/debug_token?input_token='+accessToken+'&access_token=761116317308745';
		console.log(call)
		FB.api(call, 'GET', function(response){
				console.log(JSON.stringify(response));
		}); 
		*/
		
		console.log('APP: user='+ userID +' logged in AND has authorized app - accessToken (ends with)='+ accessToken.substr(accessToken.length - 10) +'');
		
	// not_authorized: Logged into Facebook, but not your app
	} else if (response.status === 'not_authorized') {
		console.log('APP: user is logged in BUT has not authorized app');
	// [else]: Not logged into Facebook / can't tell if they are logged into app	
	} else {
		console.log('APP: user is not logged into Facebook');
	}
}

// Login user
function login_user(_scope) {
	FB.login(function(response) {
		// handle the response
		if (response.authResponse) {
			// redirect
			window.location.replace("./?data_set=user&step=load_data_fb&lang="+lang+"&player="+player);
		} else {
			console.log('APP: User cancelled login or did not fully authorize.');
		}
	}, { scope: _scope });
}
// Logout user
function logout_user() {
	FB.api('/me/permissions', 'DELETE', function(res){
	    if(res.success === true){
	        console.log('APP: app deauthorized');
			window.location.replace("./?data_set=<?php print $control['data_set']?>&amp;step=zero&lang="+lang+"&player="+player);
	    } else if(res.error){
	        console.log('APP: res.error');
	        console.error('APP: ' + res.error.type + ': ' + res.error.message);
	    } else {
	        console.log('APP: '+res);
	    }
	}); 
}






console.log('step: '+ step +' - lang: '+ lang); 


// Called when someone finishes with the Login Button. See the onlogin handler attached to it in the sample code.
function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}



				
function step1_frames_event(frame){
	// hide
	for(var i=1; i<=3; i++){
		$('#step1_frame_'+i).hide()
	}
	if (!frame){
		frame = 1;
	}
	$('#step1_frame_'+frame).show();
}	
step1_frames_event(1);


$('#step1_1_next_btn').on('click',function(){ step1_frames_event(2) });
$('#step1_2_prev_btn').on('click',function(){ step1_frames_event(1) });
$('#step1_2_next_btn').on('click',function(){ step1_frames_event(3) });
$('#step1_3_prev_btn').on('click',function(){ step1_frames_event(2) });


$('#get_sample_data_btn').on('click',function(){ window.location.replace("./?data_set=sample&step=load_data_sample&lang="+lang+"&player="+player); });
$('#get_fb_data_btn').on('click',function(){ window.location.replace("./?data_set=user&step=load_data_fb&lang="+lang+"&player="+player); });

$('#fb_login_btn').on('click',function() { login_user('email,user_birthday,user_likes'); });
$('#fb_logout_btn').on('click',function() { logout_user(); });


$('#step_one_cover').hide();


$("video").bind("ended", function() {
   window.location.replace("./?step=load_data&lang="+lang+"&player="+player);
});

</script>



</body>
</html>