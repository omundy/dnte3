<?php

require_once('inc/languages.php');
require_once('inc/fb_login.php');
include_once('templates/header.php');


if($player){
	$content_col = 12;
} else {
	include_once('templates/sidebar.php');
	$content_col = 9;
}

?>	

		
		
		<div class="col-sm-<?php print $content_col; ?> content-col">
			<div class="inner">
		
				
				<?php
						
				// show correct step
				$css = '<style>';
				$css .= '#step'.$step.' { display: block; }';
				$css .= '</style>';
				print $css;
				print "step: ". $step ."; lang: ". $lang; 
				
				?>
				
				
				
				<!-- step0 -->
				<div id="step0" class="step">
					<div class="row">
						<div class="col-sm-12 title">
							<h3>Welcome to Illuminus.</h3>							
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<?php 
							
							if($player){
								// put branding on step0
							?>
								<img src="assets/img/logo.png" alt="illuminus logo">
								<div class="product_name"><?php print $text['meta'][$lang]['product_name'] ?></div>
								<div class="product_callout"><?php print $text['meta'][$lang]['product_callout'] ?></div>
							
							<?php	
							} else {
								
							}
							
							?>
							
							<p>Please log in to Facebook to get started.</p>
							
							
						</div>
					</div>
				</div>
				<!-- /step0 -->
	
	
				
	
	
				<!-- step1 -->
				<div id="step1" class="step">
					<div class="row">
						<div class="col-sm-6 title">
							<h3><?php print $text[1][$lang]['title'] ?></h3>
							<p><?php print $text[1][$lang]['title_2'] ?>
							
							<?php

							if (!isset($user['likes']) || count($user['likes']) < 5) {
								print ' However, you do not have enough data to participate. Would you like to continue using Illuminus with Richard’s data?.</p>';
								// stop, show button to use dummy data
								die();
							} else {
								
								if (count($user['likes']) < 100) {
									print ' It appears you have enough data for us to evaluate. Analyzing your interests';
								} else if (count($user['likes']) >= 100) {
									print ' It appears you have spent a lot of time on Facebook. Analyzing your interests';
								}
								
								if (isset($user['me']['name']) && $user['me']['name'] != ''){
									
									print ' we already know ';
									
									if (isset($user['me']['name']) && $user['me']['name'] != '')
										print 'your name is <span class="udata">'. $user['me']['name'] .'</span>';
									
									if (isset($user['me']['gender']) && $user['me']['gender'] != '' && $user['me']['gender'] != 'NOT DECLARED')
										print ', your gender is <span class="udata">'. $user['me']['gender'] .'</span>';
									
									if (isset($user['me']['age']) && $user['me']['age'] != '' && $user['me']['age'] != 'NOT DECLARED')
										print ' and your age is <span class="udata">'. $user['me']['age'] .'</span>';

									print '. ';
								}
								
								if (isset($user['likes'])){
									print ' We also know many details about the seemingly boring data that Facebook has been tracking. We know that you have "liked" <span class="udata">'. count($user['likes']) .'</span> things on Facebook. Let\'s take a look at some of them now. ';
								}
								print '</p>';
								
								
								//report($user['likes']);
								
								
								
								
							}	
							
							?>

							
						</div>
						<div class="col-sm-6">
							<p>We also know a quite a bit about you based on your interests like: [put likes here]</p>
							
							
							<?php
							$i=0;
							foreach($user['likes_pages'] as $like_page){
								if($i > 2) print ' and ';
								print '<a href="'. $like_page->link .'" title="'. $like_page->name .'">'. $like_page->name .'</a>, ';
								if($i++ > 2) break;
							}
							?>
					
							<p>but there are many more interests. We can use these to tell us about you and predict your behavior.</p>
					
					
					
						</div>
					</div>
					
					
					
					
					
					<?php if (isset($user['like_timeline'])){ ?>
					<div class="row">
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
										 var bar_like_timeline = new Chart(ctx).Bar(bar_like_timeline_data, bar_chart_options);";
								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<div class='chart'><canvas id='bar_like_timeline' width='300px' height='200px'></canvas></div>
									   <div class='chart_caption'>Your likes over time</div>";
	
							?>
						</div>
						<div class="col-sm-6">
							<h4>A timeline of how you have been tracked</h4>
							<p>This graphic displays how many likes you have "deposited" in the Facebook databases. With each of these likes, Facebook (and others) know your interests, and personality better.</p>
						</div>
					</div>
					<?php } ?>
					
					
					
					
					
					<div class="row">
						<div class="col-sm-6">
							<h4>Your interests</h4>
							<p>Proin venenatis justo ac sapien congue volutpat vitae eget mi. Phasellus at mattis arcu. Morbi at pulvinar dui. Aenean eget lacus sagittis lectus pharetra imperdiet. Proin vel massa semper, consequat augue vel, imperdiet lorem. Nam libero turpis, efficitur non quam ut, lacinia sagittis erat. Proin ac ornare felis, pulvinar tempor mi. Suspendisse molestie lectus risus, id auctor velit condimentum ut. .</p>
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
								$colors2 = array('#444','#E0BAD7','#555','#61D095','#666','#48BF84','#777','#F5E3E0','#888','#E8B4BC','#999','#D282A6');
								$colors3 = array('#444','#555','#666','#777','#888','#999');
								$c = 0;
								
								$str = 'var donut_like_category_data = [';
								$delimiter = '';
								foreach($user['like_categories'] as $key => $val){
									$str .= $delimiter."{";
									$str .= "value: $val, ";
									if ($c >= count($colors3)) $c = 0;
									$str .= "color: '". $colors3[$c++] ."', ";
									//$str .= "color: '". $colors2[rand(0,count($colors2)-1)] ."', "; // random
									$str .= "highlight: '#09bc87', ";
									$str .= "label: '$key', ";
									$str .= "}";
									$delimiter = ', ';
								}
								$str .= '];';
								$str .= "var ctx = document.getElementById('donut_like_category').getContext('2d');
										 var donut_like_category = new Chart(ctx).Doughnut(donut_like_category_data, pie_chart_options);";
								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<canvas id='donut_like_category' class='chart' width='400px' height='300px'></canvas>
									   <div class='chart_caption'>Your likes categories</div>";
      
							?>
							
						</div>
						
					</div>
					
					
					
					
					
					<?php if ($user['big5']){ ?>
					<div class="row">
						<div class="col-sm-6">
							<?php
								
								############### BIG5_POLAR ###############
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
								
								
								$str = 'var polar_big5_data = {';
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
								
								polar_chart_options.scaleOverride = true;
								polar_chart_options.scaleSteps = 2;
								polar_chart_options.scaleStepWidth = .5;
								polar_chart_options.scaleStartValue = 0; 
								
								var ctx = document.getElementById('polar_big5').getContext('2d');
										 var polar_big5 = new Chart(ctx).Radar(polar_big5_data, polar_chart_options);";
								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<canvas id='polar_big5' class='chart' width='400px' height='300px'></canvas>
									   <div class='chart_caption'>Your Big5 personality analysis</div>";
      
      
            
							?>
							
							
							
						</div>
						<div class="col-sm-6">
							<h3>Big 5 Personality Analysis</h3>
	
							<p>Now we analyze your personality attributes based on your Facebook data....</p>				
							<p>Very interesting results!!!</p>							
							
							<p>Psychologists often use the "big five" traits – extroversion, openness to experience, conscientiousness, agreeableness and neuroticism – to describe personality. A person who scores high in extroversion, for example, is highly outgoing, friendly and active. Those who score high in conscientiousness are organized, responsible and hardworking.</p>
						</div>
						
					</div>
					<?php } ?>
					
					
					
					
					
					
				</div>
				<!-- /step1 -->
			
			
			
			
			
			
			


				<!-- step2 -->
				<div id="step2" class="step">	
					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text[2][$lang]['title'] ?></h3>
							<p>The following xxx risk evaluation is based on an interpretation of your Facebook profile.</p>
						</div>
					</div>
					
					
					
					
					
					
					<div class="row">
						<div class="col-sm-6">
							<h4>Career Risk</h4>
							<p>Your ____ score indicates a ___ risk for ...</p>
							
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
								print "<canvas id='bar_risk_career' class='chart' width='400px' height='200px'></canvas>
									   <div class='chart_caption'>Career Risk</div>";
	
							?>
						</div>
					</div>
					
					
					
					
					<div class="row">
						<div class="col-sm-6">
							<h4>Finance Risk</h4>
							<p>Your ____ score indicates a ___ risk for ...</p>
							
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
								print "<canvas id='bar_risk_finance' class='chart' width='400px' height='200px'></canvas>
									   <div class='chart_caption'>Career Risk</div>";
	
							?>
						</div>
					</div>

					
					
					
					<div class="row">
						<div class="col-sm-6">
							<h4>Social Risk</h4>
							<p>Your ____ score indicates a ___ risk for ...</p>
							
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
								print "<canvas id='bar_risk_social' class='chart' width='400px' height='200px'></canvas>
									   <div class='chart_caption'>Social Risk</div>";
	
							?>
						</div>
					</div>
	

				</div>
				<!-- / step2 -->
	
			
			
			
				
						
						
			
				<!-- step3 -->
				<div id="step3" class="step">
					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text[3][$lang]['title'] ?></h3>
							<p>The following health risk evaluation is based on an interpretation of your Facebook profile.</p>
						</div>
					</div>
					
					
					
					<div class="row">
						<div class="col-sm-6">
							<h4>Health Risk</h4>
							<p>Your Openness score indicates a high risk for sexually transmitted diseases and other bad things. You are 37% more likely to be friendly to a stranger. Your predisposition to risky behavior will likely have bad effects on our bottom line.</p>
							
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
								print "<canvas id='bar_risk_health' class='chart' width='400px' height='200px'></canvas>
									   <div class='chart_caption'>Health Risk</div>";
	
							?>
						
						</div>
					</div>
					
					
					
					<div class="row">
						<div class="col-sm-6">
							<h4>Safety Risk</h4>
							<p>Your ____ score indicates a ___ risk for ...</p>
							
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
								print "<canvas id='bar_risk_safety' class='chart' width='400px' height='200px'></canvas>
									   <div class='chart_caption'>Safety Risk</div>";
	
							?>
						
						</div>
					</div>
					
					
					
					<div class="row">
						<div class="col-sm-6">
							<h4>Recreation Risk</h4>
							<p>Your ____ score indicates a ___ risk for ...</p>
							
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
								print "<canvas id='bar_risk_recreation' class='chart' width='400px' height='200px'></canvas>
									   <div class='chart_caption'>Recreation Risk</div>";
	
							?>
						
						</div>
					</div>
					
					
					
					
				</div>
				<!-- /step3 -->





	
	
			
		</div>

<?php

	
include_once('templates/footer.php');
print "<script>$scripts</script>";

?>