<?php

require_once('inc/languages.php');
require_once('inc/fb_login.php');
include_once('templates/header.php');



// all chart colors
$chart_colors = 'fillColor: "rgba(100,100,100,1)", strokeColor: "rgba(0,0,0,0)", highlightFill: "rgba(10,188,136,.75)", highlightStroke: "rgba(0,0,0,0)", ';


if($control['player'] == 'yes'){
	$content_col = 12;
} else {
	include_once('templates/sidebar.php');
	$content_col = 9;
}


// show correct step
$css = '<style scoped media="all" type="text/css">';
$css .= '#step_'.$control['step'].' { display: block; }';
$css .= '</style>';
print $css;


$branding = '';
$branding .= "<img src='assets/img/logo.png' alt='illuminus logo'>";
$branding .= "<div class='product_name'>". $text['meta'][$control['lang']]['product_name'] ."</div>";
$branding .= "<div class='product_callout'>". $text['meta'][$control['lang']]['product_callout'] ."</div>";



?>	

		<div class="col-sm-<?php print $content_col; ?> content-col">
			<div class="inner">
		
		
		
				
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
							
							
							<p>??</p>
							
							
							
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- /credits -->
				
				
				
				
				
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
				
				
				
				
				
				<!-- step_zero -->
				<?php if ($control['step'] == 'zero'){ ?>
				<div id="step_zero" class="step">
					<?php if($control['player'] == 'no'){ // put branding on step zero ?>
					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text[0][$control['lang']]['0_heading'] ?></h3>							
						</div>
					</div>
					<?php } ?>
					<div class="row">
						<div class="col-sm-12">
							<?php 
							
							if($control['player'] == 'yes'){ // put branding on step_zero
								
								print $branding;	
									
							} else {
								
							}
							
							?>
							
							<p>Please log in to Facebook begin risk assessment.</p>
							
							
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- /step_zero -->
	
	
	
	
	
	
	
	
	
				
				
				<!-- step_one -->
				<div id="step_one_cover"></div>
				<?php if ($control['step'] == 'one'){ ?>
				<div id="step_one" class="step">
					
					
					
					
					<?php if (isset($user['like_timeline'])){ ?>
					<div id="step1_frame_1">
						
						
											
						<div class="row">
							<div class="col-sm-12 title">
								<h3><?php print $text[1][$control['lang']]['1_1_heading'] ?></h3>
								<p><?php print $text[1][$control['lang']]['1_1_subheading'] ?>
							</div>
						</div>
						
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
							
						
					</div>
					
					
					
					
					
						
					
					
					
					
					
					
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
					<script>  </script>
					<?php } else { print '<p>No likes data found</p>'; } ?>
					
					
					
					
					
					
					
					
					
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
					<?php } else { print '<p>No Big5 data found</p>'; } ?>
					
					
					
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
					<?php } else { print '<p>No Big5 risk data found</p>'; } ?>
	

				</div>
				<?php } ?>
				<!-- / step_two -->
	
				
	
				
				
				
				
				
			
			
				
						
						
			
				<!-- step_three -->
				<?php if ($control['step'] == 'three'){ ?>
				<div id="step_three" class="step">
					
					
					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text[3][$control['lang']]['3_heading'] ?></h3>
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
					
					
					<?php } else { print '<p>No Big5 risk data found</p>'; } ?>
					
					
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



	
	
// only include FB login for standalone app
if($control['player'] == 'no'){ 
	
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
		$('#fb_login_btn').hide()
		
	// not_authorized: Logged into Facebook, but not your app
	} else if (response.status === 'not_authorized') {
		console.log('APP: user is logged in BUT has not authorized app');
		$('#fb_login_btn').show()
	// [else]: Not logged into Facebook / can't tell if they are logged into app	
	} else {
		console.log('APP: user is not logged into Facebook');
		$('#fb_login_btn').show()
	}
}

// Login user
function login_user(_scope) {
	FB.login(function(response) {
		// handle the response
		if (response.authResponse) {
			// redirect
			window.location.replace("./?step=one&lang="+lang);
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
			window.location.replace("./?step=zero&lang="+lang);
	    } else if(res.error){
	        console.log('APP: res.error');
	        console.error('APP: ' + res.error.type + ': ' + res.error.message);
	    } else {
	        console.log('APP: '+res);
	    }
	}); 
}



$('#fb_login_btn').on('click',function() { login_user('email,user_birthday,user_likes'); });
$('#fb_logout_btn').on('click',function() { logout_user(); });


console.log('step: '+ step +' - lang: '+ lang); 


// Called when someone finishes with the Login Button. See the onlogin handler attached to it in the sample code.
function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}

<?php } ?></script>


<script>
				
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

$('#step_one_cover').hide();

</script>



</body>
</html>