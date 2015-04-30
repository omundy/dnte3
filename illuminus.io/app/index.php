<?php


require_once('inc/localization.php');
require_once('inc/fb_login.php');
if ($control['player'] != 'yes') //$control['lang'] = get_language();
require_once('inc/text_'. $control['lang'] .'.php');
include_once('templates/header.php');



// show correct step
$css = '<style scoped media="all" type="text/css">';
$css .= '#step_'.$control['step'].' { display: block; }';

// all chart colors
$chart_colors = 'fillColor: "rgba(100,100,100,1)", strokeColor: "rgba(0,0,0,0)", highlightFill: "rgba(10,188,136,.75)", highlightStroke: "rgba(0,0,0,0)", ';


if($control['player'] == 'yes'){
	$scripts .= "\n $('#backtovideo_btn').on('click',function(){ parent.resumeVideo() }); \n";
	$content_col = 12;
	$css .= '.content-col .inner { margin-top: 100px; }';
} else {
	include_once('templates/sidebar.php');
	$content_col = 9;
}




print $css . '</style>';


$genders_male = array('homme', 'mänlich', 'male', 'homme');
$genders_female = array('femme', 'weiblich', 'female', 'femme');



?>


<div id="page">
	<div class="row site-main">

		<div class="col-sm-<?php print $content_col; ?> content-col">
			<div class="inner">


				<?php if($control['player'] == 'yes'){ ?>
				<div class="row">
					<div class="col-sm-10 ">
						<img src='<?php print $control['baseurl'] ?>assets/img/logo.png' alt='illuminus logo' style="float: left; margin: 0 0 20px 0;">
						<div class='product_name' style="float: left; margin: 18px 0 0 20px;"><?php print $text['meta']['product_name']?> </div>
					</div>
					<div class="col-sm-2 ">
						<button class="step1_btn btn btn-custom" id="backtovideo_btn"><?php print $text['meta']['resume_video']; ?></button>
					</div>
				</div>
				<?php } ?>


<?php

$pic = $control['baseurl'] .'assets/img/fb_profile_img.png';

if (isset($_SESSION['dnt_user'])){

	if ( isset($user['me']['photo'])){
		if ( strpos($user['me']['photo'], 'http') === false ){
			$pic = $control['baseurl'] . $user['me']['photo'];
		} else {
			$pic = $user['me']['photo'];
		}	
	}
}

?>




				<!-- load_data -->
				<?php if ($control['step'] == 'load_data'){ ?>
				<div id="" class="step">
					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text['load_data']['0_heading'] ?></h3>
						</div>

					</div>
					<div class="row">
						<div class="col-sm-12">





							<?php

							if (isset($_SESSION['dnt_user'])){

							?>
								<p><?php print $text['meta']['get_current_data_set']; ?></p>
								<div class="profile_box">
									<div class="profile_img"><img src="<?php print $pic ?>" class="img-rounded profile-pic"></div>
									<div class="profile_txt">
										<div class="profile_name"><?php print $user['me']['name'] ?></div>
										<div class="profile_age"><?php print $user['me']['gender'] ?></div>
										<div class="profile_gender"><?php print $user['me']['age'] ?> years</div>
									</div>
								</div>

								<br>

								<p><?php print $text[0]['select_assessment'] ?></p>



							<?php } else { ?>

							<img src="<?php print $control['baseurl'] ?>assets/img/illuminus_cover_img.jpg">

							<?php } ?>



							<h4 style="clear: both; margin: 30px 0 0 0"><?php print $text['meta']['get_select_a_data_set']; ?></h4>

							<p>
							<?php if( $control['fb_login_state'] == 'no' ){ ?>
							<button id="fb_login_btn" class="btn btn-large fb_btn"><img src="<?php print $control['baseurl'] ?>assets/img/icon_fb_btn.png" alt="fb logo">
							<?php print $text['meta']['login_with_facebook'] ?>
							<?php } else { ?>
							<button id="get_fb_data_btn" class="btn btn-large fb_btn"><img src="<?php print $control['baseurl'] ?>assets/img/icon_fb_btn.png" alt="fb logo">
							<?php print $text['meta']['get_fb_data_btn']; ?>
							<?php } ?>
							</button>

							<p>... <?php print $text['meta']['get_select_or']; ?> ...

							<p><button id="get_sample_data_btn" class="btn btn-large btn-custom"><?php print $text['meta']['get_sample_data_btn']; ?></button>


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
							<h3><?php print $text['privacy']['0_heading'] ?></h3>

						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<?php print $text['privacy']['policy']; ?>
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- /privacy -->





				<!-- faq -->
				<?php if ($control['step'] == 'faq'){ ?>
				<div id="" class="step">
					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text['faq']['0_heading'] ?></h3>

						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">

							<!--
							<h4><?php print $text['faq']['what_heading'] ?></h4>
							<p><?php print $text['faq']['what_text'] ?></p>

							<h4><?php print $text['faq']['who_heading'] ?></h4>
							<p><?php print $text['faq']['who_text1'] ?>
								<a href="<?php print $control['dataurl'] ?>credits?player=<?php print $control['player'] ?>">
								<?php print $text['faq']['who_text2'] ?></a>.</p>
							-->
							
							<h4><?php print $text['faq']['fberror_heading'] ?></h4>
							<p><?php print $text['faq']['fberror_text'] ?></p>

							<h4><?php print $text['faq']['bugs_heading'] ?></h4>
							<p><?php print $text['faq']['bugs_text'] ?>.</p>


						</div>
					</div>
				</div>
				<?php } ?>
				<!-- /faq -->







				<!-- credits -->
				<?php if ($control['step'] == 'credits'){ ?>
				<div id="" class="step">
					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text['credits']['0_heading'] ?></h3>

						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">


							<!--<h4><?php print $text['credits']['1_creators'] ?></h4>

							<p>Owen Mundy, Brett Gaylor, Tim Schwartz, Sébastien Brothier, Christiane Miethge, Wolfi Christl, Eric Drier, Richard Gutjahr, Margaux Missika, Auriane Meilhon, Maxime Quintard, Nicolas Menetand, and Gregory Trowbridge</p>
							
							<a href="https://donottrack-doc.com/<?php print $control['lang'] ?>/credits/">Do Not Track production</a>
								
							<br><br>-->

							<h4><?php print $text['credits']['1_predictions'] ?></h4>

							<p>
							<?php print $text['credits']['cambridge'] ?><br>
							Dr Michal Kosinski<br>
							Vesselin Popov<br>
							Dr David Stillwell<br>
							Bartosz Kielczewski<br>
							</p>

							<br>




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
							<h3><?php print $text['meta']['alt_data_heading'] ?></h3>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">

							<p><?php
								print $text['meta']['alt_data_p1'] .' ';
								print $text['meta']['alt_data_reasons'][$control['show_alt_data_reason']]  .'. ';
								print '</p><p>';
								print '<a href="'. $control['dataurl'] .'one" class="step1_btn btn btn-custom">' . $text['meta']['alt_data_click'] .'</a> ';
								print $text['meta']['alt_data_p2'];
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
						<div class="col-sm-10 title">


							<p><?php print $text[0]['0_heading'] ?></p>


							<div align="center" class="embed-responsive embed-responsive-16by9">
								<video class="homepage_video" autoplay class="embed-responsive-item">
									<source src="https://download.arte.tv/permanent/donottrack/episode3/illuminus/illuminus_promo2.mp4" type='video/mp4' />
									<source src="https://download.arte.tv/permanent/donottrack/episode3/illuminus/illuminus_promo2.webm" type='video/webm' />
									Your browser does not support the video tag.
								</video>
								
							</div>


							<h1><?php print $text[0]['callout'] ?></h1>


							<?php

							if (isset($session)) {
								print $text[0]['select_assessment'];
							} else {
								print $text[0]['please_login'];
							}

							?>

							<p>
							<?php if( $control['fb_login_state'] == 'no' ){ ?>
							<button id="fb_login_btn" class="btn btn-large fb_btn"><img src="<?php print $control['baseurl'] ?>assets/img/icon_fb_btn.png" alt="fb logo">
							<?php print $text['meta']['login_with_facebook'] ?>
							<?php } else { ?>
							<button id="get_fb_data_btn" class="btn btn-large fb_btn"><img src="<?php print $control['baseurl'] ?>assets/img/icon_fb_btn.png" alt="fb logo">
							<?php print $text['meta']['get_fb_data_btn']; ?>
							<?php } ?>
							</button>


						</div>
					</div>
					<?php } ?>
					<div class="row">
						<div class="col-sm-7">

						</div>
						<div class="col-sm-5">
							<!--<img src="<?php print $control['baseurl'] ?>assets/img/network.png" alt="network" class="img-responsive">
							<p><?php print $text[0]['0_heading'] ?></p>
							<h1><?php print $text[0]['callout'] ?></h1>-->

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
								<h3><?php print $text[1]['1_1_heading'] ?></h3>
								<?php

								//report($user);

								if ( isset($user['fb_data_problems']) && $user['fb_data_problems'] == true ){

									//print '<p>'. $control['show_alt_data_reason'];
									//print '<p>'. $control['fb_error'];
									print '<p class="well">'. $text['meta']['no_data_found_statement'] .'</p>';

									// use sample user data
									$json = file_get_contents('inc/default_user_data/default_user_format_'. $control['lang'] .'.json');
									$user = (Array)json_decode($json,true);
									$user['fb_data_problems'] = true;
									// make that the user
									$_SESSION['dnt_user'] = $user;
								}

								?>
							</div>
						</div>


						<?php if ( isset($user['like_timeline']) && count($user['like_timeline']) > 0 ){ ?>


						<div class="row">
							<div class="col-sm-6 left">



								<p>

								<img src="<?php print $pic ?>" style="width:100px; height:100px; float:left; margin: 4px 13px 10px 0;" class="img-rounded profile-pic">

								<?php if (isset($user['like_timeline'])){ ?>
								<?php print $text[1]['1_1_welcome'] ?>, <span class="udata"><?php print $user['me']['name'] ?></span>!!!
								<?php print $text[1]['1_1_subheading'] ?>
								<?php } ?>


								<?php

								// Your social activity reveals a lot about you.
								print $text[1]['1_1_p1_1'];

								if ( isset($user['me']['age']) || isset($user['me']['gender']) ){

									// Your profile for instance says that
									print " ". $text[1]['1_1_p1_2'];

									// AGE
									if ( isset($user['me']['age']) ){
										// your age is
										print " ". $text[1]['1_1_p1_3'];
										// [AGE]
										print ' <span class="udata">'. $user['me']['age'] .'</span>';
									}

									// and
									if ( isset($user['me']['age']) && isset($user['me']['gender']) ) print " ". $text[1]['1_1_p1_4'] ." ";

									// GENDER
									if ( isset($user['me']['gender']) ){
										// your gender is
										print " ". $text[1]['1_1_p1_5'];
										// [GENDER]
										print ' <span class="udata">'. $user['me']['gender'] .'</span>';
									}

									print '.';
								}


								if ( isset($user['likes']) && $user['likes_count'] > 0 && isset($user['big5']) ){
									//report($big5_temp_high);

									// But the real gold mine is your Facebook data over time.
									print " ". $text[1]['1_1_p1_6'];

									// By analyzing the [NUMBER OF LIKES]
									print "<p>". $text[1]['1_1_p1_7'] . ' <span class="udata">'. $user['likes_count'] ."</span> ";

									// things you have liked on Facebook, we have used our advanced algorithm techniques to assess your personality and have found you scored highest in
									print $text[1]['1_1_p1_8'];

									// insert [BIG5]
									// sort big 5 by value high > low
									$big5_temp_high = $user['big5'];
									arsort( $big5_temp_high );
									$big5_highest = key($big5_temp_high);
									//print ' <span class="udata">'. $big5_highest .'</span>';
									// showing instead translated big5::name
									print ' <span class="udata">'. $text['big5'][$big5_highest]['name'] .'</span>';

									// which indicates you are
									print " ". $text[1]['1_1_p1_9_pos'];

									// insert [BIG5 TRAITS]
									// adding gender specific adjectives
									if ( isset($user['me']['gender']) && in_array($user['me']['gender'], $genders_female) ){
										$traits = explode(',',$text['big5'][$big5_highest]['keywords_F']);
									} else {
										$traits = explode(',',$text['big5'][$big5_highest]['keywords']);
									}
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
									print ' '. $text[1]['1_1_p1_10'];

									// It may surprise you that your interest in
									print '<p>'. $text[1]['1_1_p1_11'];

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
									print ' '. $text[1]['1_1_p1_12'];


								}
								//report($user['big5']);

								?>

								<div><br>
									<button class="step1_btn btn btn-custom" id="step1_1_next_btn"><?php print $text[1]['1_1_p1_next']; ?></button>
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
									print "<div class='chart'><canvas id='bar_like_timeline' style='width:400px; height:300px;'></canvas></div>
										   <div class='chart_caption'>". $text[1]['1_1_chartcaption']."</div>\n
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
								<h3><?php print $text[1]['1_2_heading'] ?></h3>
								<p><?php print $text[1]['1_2_subheading'] ?>
							</div>
						</div>



						<div class="row">
							<div class="col-sm-6 left">

							<p><?php


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


								// We have also sorted your interests on Facebook into the following categories. These interests, especially the top ones like
								print $text[1]['1_2_p1_1'];

								$i = 0;
								// loop through categories
								foreach($user['like_categories'] as $key => $val){
									$i++;
									// and
									if ($i == 3) print $text[1]['1_2_p1_2'];
									print ' <span class="udata">'. $key .'</span>';
									if ($i < 3) print ', ';
									if ($i == 3) break;
								}


								// determine which advertisements you see.
								print ' '. $text[1]['1_2_p1_3'] ?>
							</p>
							<p><?php print $text[1]['1_2_p1_4'] ?></p>


							<div><br>
								<button class="step1_btn btn btn-custom" id="step1_2_prev_btn"><?php print $text[1]['1_2_p1_back']; ?></button>
								<button class="step1_btn btn btn-custom" id="step1_2_next_btn"><?php print $text[1]['1_2_p1_next']; ?></button>
							</div>


							</div>
							<div class="col-sm-6">
								<?php

									############### LIKE_CATEGORIES ###############



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
										$str .= "value: ". htmlentities($val, ENT_QUOTES) .", ";
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
									print "<div class='chart'><canvas id='donut_like_category' style='width:500px; height:400px;'></canvas></div>
										   <div class='chart_caption'>". $text[1]['1_2_chartcaption']."</div>";

								?>

							</div>
						</div>

					</div>


					<?php }  ?>










					<?php if (isset($user['big5'])){ ?>
					<div id="step1_frame_3">


						<div class="row">
							<div class="col-sm-12 title">
								<h3><?php print $text[1]['1_3_heading'] ?></h3>
								<p><?php print $text[1]['1_3_subheading'] ?>
							</div>
						</div>



						<div class="row">


							<div class="col-sm-6">

								<p><?php print $text[1]['1_3_1'] ?></p>

								<p><?php

								print $text[1]['1_3_2'];

							//	print ' <span class="udata">'. $traits[0] .'</span>';
								// and
							//	print ' '. $text[1]['1_3_3'] .' ';
							//	print ' <span class="udata">'. $traits[1] .'</span>.';






								if ( isset($user['likes']) && count($user['likes']) > 0 && isset($user['big5']) ){
									//report($big5_temp_high);


									// insert [BIG5]
									// sort big 5 by value high > low
									$big5_temp_high = $user['big5'];
									arsort( $big5_temp_high );
									//report($big5_temp_high);
									//$big5_highest = key($big5_temp_high);

									print '<p>';

									$c = 0;
									foreach ($big5_temp_high as $key => $val){

										//print '<p>'.$c .' '. $key .'<p>';

										//print '<span class="udata" style="font-weight:bold">'. $key .'</span>';
										// showing instead translated big5::name
										print '<span class="udata" style="font-weight:bold">'. $text['big5'][$key]['name'] .'</span>';
										

										// which indicates you are
										print " ". $text[1]['1_1_p1_9_pos'];


										// insert POSITIVE [BIG5 TRAITS]
										// adding gender specific adjectives
										if ( isset($user['me']['gender']) && in_array($user['me']['gender'], $genders_female) ){
											$traits = explode(',',$text['big5'][$key]['keywords_F']);
										} else {
											$traits = explode(',',$text['big5'][$key]['keywords']);
										}
										for($i=0; $i<count($traits); $i++){
											print ' <span class="udata">'. $traits[$i] .'</span>';
											if ($i < count($traits)-2){
												print ", ";
											} else if ($i == count($traits)-2){
												print " ". $text[1]['1_1_p1_9_and'] ." ";
											}
										}


										/*
										print " ". $text[1]['1_1_p1_9_neg'];
										
										// insert NEGATIVE [BIG5 TRAITS]
										// adding gender specific adjectives
										if ( isset($user['me']['gender']) && in_array($user['me']['gender'], $genders_female) ){
											$traits = explode(',',$text['big5'][$key]['opposite_keywords_F']);
										} else {
											$traits = explode(',',$text['big5'][$key]['opposite_keywords']);
										}
										
										
										for($i=0; $i<count($traits); $i++){
											print ' <span class="udata">'. $traits[$i] .'</span>';
											if ($i == count($traits)-2){
												print " ". $text[1]['1_1_p1_9_and'] ." ";
											}
										}
										*/



										if (++$c > 1) break;
										print ' '. $text[1]['1_3_3'] .' ';


									}
									print ". ";
								}

								if ($control['player'] != 'yes'){
									print '<p>'. $text[1]['1_3_click_on_risk'] .'</p>';
								}





								?>
								</p>



								<div><br>
									<button class="step1_btn btn btn-custom" id="step1_3_prev_btn"><?php print $text[1]['1_2_p1_back']; ?></button>
									<?php if($control['player'] != 'yes'){ ?>
									<button class="step1_btn btn btn-custom" id="step1_3_gorisk_btn"><?php print $text[1]['1_3_gorisk_btn']; ?></button>
									<?php } ?>
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
									$str .= 'label: "Big Five", ';
									$str .= $chart_colors;
									$str .= 'data: [';
									$delimiter = '';
									foreach($user['big5'] as $key => $val){
										$str .= $delimiter . htmlentities($val, ENT_QUOTES);
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
									print "<div class='chart'><canvas id='radar_big5' style='width:400px; height:400px;'></canvas></div>
										   <div class='chart_caption'>". $text[1]['1_3_chartcaption']."</div>";



								?>



							</div>

						</div>


					</div>
					<script>  </script>


					<?php } else {
						print '<p>'. $text['meta']['no_data_found'] . '. <a href="'. $control['dataurl'] .'load_data">'. $text['meta']['no_data_found2'] .'</a>.</p>';
					} ?>



				</div>
				<?php } ?>
				<!-- /step_one -->




<?php

$health_domains = array('Health', 'Safety', 'Recreation');
$financial_domains = array('Career', 'Finance', 'Social');


function overall_risk($domain){
	global $user, $health_domains, $financial_domains;
	$score = 0;

	if ($domain = 'health') $arr = $health_domains;
	if ($domain = 'financial') $arr = $financial_domains;

	foreach ($user['big5_risk_domains'] as $key => $risk_arr){
		if (in_array($key,$arr)){
			foreach ($risk_arr as $risk_score){
				$score += $risk_score;
				//if ($risk_score > .5) {
				//	return true;
				//}
			}
			return $score / count($risk_arr);
		}
	}

}



function get_risk_color($total){
	$risk_color = '';
	if ($total > .9){
		$risk_color = '#ff1d00';
	} else if ($total > .8){
		$risk_color = '#ff3f0a';
	} else if ($total > .7){
		$risk_color = '#ff6f14';
	} else if ($total > .6){
		$risk_color = '#ffa51e';
	} else if ($total > .5){
		$risk_color = '#ffd828';
	} else if ($total > .4){
		$risk_color = '#f6fb30';
	} else if ($total > .3){
		$risk_color = '#cdfb32';
	} else if ($total > .2){
		$risk_color = '#a3fb34';
	} else if ($total > .1){
		$risk_color = '#7ffa35';
	} else if ($total > .0){
		$risk_color = '#5ffa36';
	}
	return $risk_color;
}




function eval_risk_overview($risk_name, $overall_domain_risk){
	global $user, $control, $text, $health_domains, $financial_domains;
	//report($user);

	if (isset($user['me']['gender']) && $user['me']['gender'] != 'NOT DECLARED' && isset($user['me']['age']) && $user['me']['age'] != 'NOT DECLARED'){

		print '<ul>';

		if ( isset($user['me']['gender']) && $user['me']['gender'] != 'NOT DECLARED'){

			print '<li>';
			// In addition to your seemingly boring Facebook data, your
			print $text[2]['eval_risk_overview_1'];
			// gender
			print ' <span class="udata">'. $user['me']['gender'];
			print ' '. $text[2]['eval_risk_overview_2'] .' ';
			print '</span> ';



			if ( $user['me']['gender'] === 'male' ){
				if ($risk_name == 'Recreation' || $risk_name == 'Health' || $risk_name == 'Safety' || $risk_name == 'Overall'){
					// greatly contributed
					print ' <span style="color: '. get_risk_color(.7) .'">'. $text[2]['eval_risk_overview_adj_1_1'] .'</span> ';
				} else if ( $overall_domain_risk > .3) {
					// likely contributed
					print ' <span style="color: '. get_risk_color(.5) .'">'. $text[2]['eval_risk_overview_adj_1_2'] .'</span> ';
				} else {
					// did not contribute
					print ' <span style="color: '. get_risk_color(.2) .'">'. $text[2]['eval_risk_overview_adj_1_3'] .'</span> ';
				}
			} else if ($user['me']['gender'] == 'female'){
				if ($risk_name == 'Career' || $risk_name == 'Social' || $risk_name == 'Finance'){
					// greatly contributed
					print ' <span style="color: '. get_risk_color(.7) .'">'. $text[2]['eval_risk_overview_adj_1_1'] .'</span> ';
				} else if ( $overall_domain_risk > .3) {
					// likely contributed
					print ' <span style="color: '. get_risk_color(.5) .'">'. $text[2]['eval_risk_overview_adj_1_2'] .'</span> ';
				} else {
					// did not contribute
					print ' <span style="color: '. get_risk_color(.2) .'">'. $text[2]['eval_risk_overview_adj_1_3'] .'</span> ';
				}
			} else {
				print ' '. $text[2]['eval_risk_overview_adj_1_3'] .' ';
			}


			// to your estimated risk as
			print ' '. $text[2]['eval_risk_overview_3'] .' '. ' "<em>';




			// financial - men
			if ( strtolower($risk_name) == 'financial' && $user['me']['gender'] === 'male' ){
				// Men reported significantly greater risk taking than women in the overall risk-taking scale
				print ' '. $text[2]['eval_risk_overview_3_1'];
			}
			// financial - women
			else if ( strtolower($risk_name) == 'financial' && $user['me']['gender'] === 'female' ){
				print ' '. $text[2]['eval_risk_overview_3_2'];
			}
			// health - men
			else if ( strtolower($risk_name) == 'health' && $user['me']['gender'] === 'male' ){
				print ' '. $text[2]['eval_risk_overview_3_3'];
			}
			// health - women
			else if ( strtolower($risk_name) == 'health' && $user['me']['gender'] === 'female' ){
				print ' '. $text[2]['eval_risk_overview_3_4'];
			}
			else {
				print ' '. $text[2]['eval_risk_overview_3_5'];
			}

			print '.</em>" (Nicholson, 163)</li>';



		}

		if (isset($user['me']['age']) && $user['me']['age'] != 'NOT DECLARED'){

			$age = $user['me']['age'];
			$risk_score = 0;

			if ($age > 0){
				if ($age < 20){
					$risk_score *= 1.4;
				} else if ($age < 30){
					$risk_score *= 1.3;
				} else if ($age < 40){
					$risk_score *= 1.15;
				} else if ($age < 50){
					$risk_score *= .9;
				} else if ($age < 60){
					$risk_score *= .8;
				} else if ($age < 70){
					$risk_score *= .7;
				} else if ($age < 80){
					$risk_score *= .6;
				} else if ($age < 120){
					$risk_score *= .5;
				}
			}


			// Your ... age
			print '<li>'. $text[2]['eval_risk_overview_age_1'] .' <span class="udata">'. $text[2]['eval_risk_overview_age_2'] .' ('. $user['me']['age'] .')';
			if ($age < 29){
				// greatly contributed
				print ' <span style="color: '. get_risk_color(.9) .'">'. $text[2]['eval_risk_overview_age_2_greatly'] .'</span> ';
			} else if ($age < 49){
				// likely contributed
				print ' <span style="color: '. get_risk_color(.6) .'">'. $text[2]['eval_risk_overview_age_2_likely'] .'</span> ';
			} else {
				// did not contribute
				print ' <span style="color: '. get_risk_color(.2) .'">'. $text[2]['eval_risk_overview_age_2_didnot'] .'</span> ';
			}



			// to your estimated risk as
			print '</span> '. $text[2]['eval_risk_overview_age_3'] .' "<em>';
			// Risk taking decreased with age in every domain
			print ' '. $text[2]['eval_risk_overview_age_4'] ;
			print '.</em>" (Nicholson, 164)';



			if ( $risk_name == 'financial'){
				// nothing
			} else if ( $risk_name == 'health'){
				// Meaning, the younger you are, the more likely you are to engage in risky behavior, which may affect our bottom line
				print ' '. $text[2]['eval_risk_overview_age_5'];
			}

			print '.</li>';





		}

		print '</ul>';
	}
}



function eval_risk($risk_name,$eg,$adj){

	global $user, $control, $text;


	$arr = $user['big5_risk_domains'][$risk_name];
	arsort($arr);
	//return($arr);
	$keys=array_keys($arr);
	$risk_level = floor($arr[$keys[0]] * 10);
	if ($risk_level > 13) $risk_level = 13;

	if ( floor($arr[$keys[0]] * 10) > 4 ) print '<img src="'. $control['baseurl'] .'assets/img/warning_risk_'. $risk_level .'.png" style="height:22px; margin-right:5px">';
/*
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=286500671396775";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

*/
	// Your high scores in
	print $text[2]['eval_risk_1']. ' ';
	// this one colors the words
	//print ' <span class="udata" style="color:'. get_risk_color($arr[$keys[0]]) .'">'. $keys[0] .'</span> ('. $arr[$keys[0]] .') ';
	print ' <span class="udata">'. $keys[0] .' ('. $arr[$keys[0]] .')</span> ';
	print ' and ';
	// this one colors the words
	//print ' <span class="udata" style="color:'. get_risk_color($arr[$keys[1]]) .'">'. $keys[1] .'</span> ('. $arr[$keys[1]] .') ';
	print ' <span class="udata">'. $keys[1] .' ('. $arr[$keys[1]] .')</span> ';
	// indicate
	print ' '. $text[2]['eval_risk_2'] .' ';

	$r = floor( ($arr[$keys[0]] * 10)/2 );
	print ' <span class="udata" style="color:'. get_risk_color($arr[$keys[0]]) .'">'. $text['meta']['risk_words'][ $r ] .'</span>';
	//print ' ('.$r.') ';
	// potential for risk-taking behavior in your
	print ' '. $text[2]['eval_risk_3'] .' ';
	print strtolower($risk_name);
	// decisions
	print ' '. $text[2]['eval_risk_4'] .' ';

	// e.g.
	print '(<em>'. $eg .'</em>). ';
	
	// social
	print '<span style="display:inline-block">';
	
	print '<div style="vertical-align:9px; margin-right:8px;" class="fb-like" data-href="https://illuminus.io/app" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>';
		
	print ' <a class="twitter-share-button" href="https://twitter.com/intent/tweet?button_hashtag=DoNotTrack&text=Your Facebook data indicates '. $text['meta']['risk_words'][$r] .' potential for risky '. $adj .' decisions http://illuminus.io/app @illuminus_io" >';
	print '</a></span>';
	
	
}


	




?>




				<!-- step_two -->
				<?php if ($control['step'] == 'two'){ ?>
				<div id="step_two" class="step">




					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text[2]['2_heading'] ?></h3>


							<?php if (isset($user['big5_risk_domains'])){ ?>
							<p><?php

								// Using the personality analysis created from your Facebook data and scientific research from a study published in the <a href="http://dx.doi.org/10.1080/1366987032000123856" target="_blank">Journal of Risk Research</a> our advanced algorithm has determined that
								print $text[2]['2_1'];

								// get overall financial risk
								$overall_financial_risk = overall_risk('financial');

								if ( $overall_financial_risk > .7 ){
									// you may be an unreliable candidate for a loan
									print ' <span class="udata" style="color: '. get_risk_color(.8) .'">';
									print ' '. $text[2]['2_2_unreliable'] .'</span>. ';
								} else if ( $overall_financial_risk > .3 ){
									// you may be a mediocre candidate for a loan
									print ' <span class="udata" style="color: '. get_risk_color(.5) .'">';
									print ' '. $text[2]['2_2_mediocre'] .'</span>. ';
								} else {
									// you may be a good candidate for a loan
									print ' <span class="udata" style="color: '. get_risk_color(.1) .'">';
									print ' '. $text[2]['2_2_good'] .'</span>. ';
								}

								?>
							</p>

							<?php eval_risk_overview('financial', $overall_financial_risk) ?>


							<?php } ?>

						</div>
					</div>






					<?php if (isset($user['big5_risk_domains'])){ ?>
					<div class="row">
						<div class="col-sm-5">


							<h4><?php print $text[2]['2_career_heading'] ?> </h4>

							<p><?php eval_risk('Career', $text[2]['2_career_risk_eg'], 'career'); ?></p>


							<?php /*
							<button id="career_info_btn" class="btn btn-custom"><?php print $text[2]['2_career_risk_more'] ?></button>
							<blockquote class="more_info" id="career_info">"<em><?php print $text[2]['2_career_risk_more_text'] ?>.</em>" (Nicholson, 164) </blockquote>
							*/ ?>

						</div>
						<div class="col-sm-7">

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
									   <div class='chart_caption'>". $text[2]['2_career_heading'] ."</div>";

							?>
						</div>
					</div>




					<div class="row">
						<div class="col-sm-5">


							<h4><?php print $text[2]['2_finance_heading'] ?></h4>
							<p><?php eval_risk('Finance', $text[2]['2_finance_risk_eg'], 'financial') ?></p>


						</div>
						<div class="col-sm-7">

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
									   <div class='chart_caption'>". $text[2]['2_finance_heading'] ."k</div>";

							?>
						</div>
					</div>




					<div class="row">
						<div class="col-sm-5">


							<h4><?php print $text[2]['2_social_heading'] ?></h4>
							<p><?php eval_risk('Social', $text[2]['2_social_risk_eg'], 'social') ?></p>


						</div>
						<div class="col-sm-7">

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
									   <div class='chart_caption'>". $text[2]['2_social_heading'] ."</div>";

							?>
						</div>
					</div>







					<?php } else {
						print '<p>'. $text['meta']['no_data_found'] . '. <a href="'. $control['dataurl'] .'load_data">'. $text['meta']['no_data_found2'] .'</a>.</p>';
					} ?>


					<div><br>
						<?php if($control['player'] == 'yes'){ ?>
						<button class="step1_btn btn btn-custom" id="backtovideo_btn"><?php print $text['meta']['resume_video']; ?></button><?php } ?>
					</div>


				</div>
				<?php } ?>
				<!-- / step_two -->
















				<!-- step_three -->
				<?php if ($control['step'] == 'three'){ ?>
				<div id="step_three" class="step">


					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text[3]['3_heading'] ?></h3>


							<?php if (isset($user['big5_risk_domains'])){ ?>

							<p><?php

								// Your activity on social networks can tell us a lot about whether or not you are a risk to yourself. It lets us know how likely you are to meet a stranger, to engage in unprotected sex, or to enjoy dangerous extreme sports. Your predisposition to risky behavior could mean higher medical costs for us. To help us understand how dangerous you are, we compared your personality analysis to results from a study on risk in the <a href="http://dx.doi.org/10.1080/1366987032000123856" target="_blank">Journal of Risk Research</a>.
								print $text[3]['3_1'];

								// get overall health risk
								$overall_health_risk = overall_risk('health');

								if ( $overall_health_risk > .7 ){
									// your risk level is too extreme to make you a candidate for health insurance
									print ' <span class="udata" style="color: '. get_risk_color(.8) .'">';
									print ' '. $text[3]['2_3_extreme'] .'</span>. ';
								} else if ( $overall_health_risk > .4 ){
									// your risk level is too high to make you a candidate for health insurance
									print ' <span class="udata" style="color: '. get_risk_color(.6) .'">';
									print ' '. $text[3]['2_3_high'] .'</span>. ';
								} else if ( $overall_health_risk > .3 ){
									// your risk level is moderate which may barely qualify you for health insurance
									print ' <span class="udata" style="color: '. get_risk_color(.3) .'">';
									print ' '. $text[3]['2_3_moderate'] .'</span>. ';
								} else {
									// your risk level is low which makes you a good candidate for health insurance
									print ' <span class="udata" style="color: '. get_risk_color(.1) .'">';
									print ' '. $text[3]['2_3_low'] .'</span>. ';
								}

								?>
							</p>

							<?php eval_risk_overview('Health', $overall_health_risk) ?>







							<?php } ?>


						</div>
					</div>



					<?php if (isset($user['big5_risk_domains'])){ ?>
					<div class="row">
						<div class="col-sm-5">


							<h4><?php print $text[3]['3_health_heading'] ?></h4>
							<p><?php eval_risk('Health', $text[3]['3_health_risk_eg'], 'health') ?></p>


						</div>
						<div class="col-sm-7">

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
									   <div class='chart_caption'>". $text[3]['3_health_heading'] ."</div>";

							?>

						</div>
					</div>



					<div class="row">
						<div class="col-sm-5">


							<h4><?php print $text[3]['3_safety_heading'] ?></h4>
							<p><?php eval_risk('Safety', $text[3]['3_safety_risk_eg'], 'safety') ?></p>


						</div>
						<div class="col-sm-7">

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
									   <div class='chart_caption'>". $text[3]['3_safety_heading'] ."</div>";

							?>

						</div>
					</div>



					<div class="row">
						<div class="col-sm-5">


							<h4><?php print $text[3]['3_recreation_heading'] ?></h4>
							<p><?php eval_risk('Recreation', $text[3]['3_recreation_risk_eg'], 'recreational') ?></p>


						</div>
						<div class="col-sm-7">

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
									   <div class='chart_caption'>". $text[3]['3_recreation_heading'] ."</div>";

							?>

						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<br><br><p>Intrigued? <button class="btn btn-custom" onclick="location.href='https://episode3.donottrack-doc.com/'">Learn more about the science behind Illuminus in Episode 3 of Do Not Track</button></p>

						</div>
					</div>



					<?php } else {
						print '<p>'. $text['meta']['no_data_found'] . '. <a href="'. $control['dataurl'] .'load_data">'. $text['meta']['no_data_found2'] .'</a>.</p>';
					} ?>


					<div><br>
						<?php if($control['player'] == 'yes'){ ?>
						<button class="step1_btn btn btn-custom" id="backtovideo_btn"><?php print $text['meta']['resume_video']; ?></button><?php } ?>
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
			window.location.replace("<?php print $control['langurl'] ?>user/load_data_fb?player="+player);
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
	    } else if(res.error){
	        console.log('APP: res.error');
	        console.error('APP: ' + res.error.type + ': ' + res.error.message);
	    } else {
	        console.log('APP: '+res);
	    }
	});

	var url = "<?php print $control['dataurl'] ?>logout?player="+player;
	window.location.replace(url);
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
$('#step1_3_gorisk_btn').on('click',function(){ window.location.replace("<?php print $control['dataurl'] ?>two?player="+player); });


$('#get_sample_data_btn').on('click',function(){ window.location.replace("<?php print $control['dataurl'] ?>load_data_sample?player="+player); });
$('#get_fb_data_btn').on('click',function(){ window.location.replace("<?php print $control['dataurl'] ?>load_data_fb?player="+player); });

$('#fb_login_btn').on('click',function() { login_user('email,user_birthday,user_likes'); });
$('#fb_logout_btn').on('click',function() { logout_user(); });


$('#step_one_cover').hide();


$( "#career_info_btn" ).click(function() {
	$( "#career_info" ).slideToggle( "slow", function() {
		// Animation complete.
	});
});
$( "#career_info" ).hide()

// video
$('.homepage_video').click(function(){this.paused?this.play():this.pause();});
$("video").bind("ended", function() {
   window.location.replace("<?php print $control['dataurl'] ?>load_data?player="+player);
});



</script>

<script>
window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
</script>


<?php
$path_to_stats = $control['baseurl'] .'inc/stats/';
include_once('inc/stats/analytics-illuminus.inc.php');
?>



</body>
</html>