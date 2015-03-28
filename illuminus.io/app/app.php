<?php

if(isset($_GET['start'])) die("Logging in");


if(isset($_GET['step'])) {
	$step = $_GET['step'];
}

// init session
session_start();
// for all user data
$user = array();
// store all (chart) scripts to include once html is loaded
$scripts = '';
// all chart colors
$chart_colors = 'fillColor: "rgba(100,100,100,1)", strokeColor: "rgba(0,0,0,0)", highlightFill: "rgba(10,188,136,.75)", highlightStroke: "rgba(0,0,0,0)", ';
// global functions
require_once('inc/om_functions.php');
//report($_SESSION);

// FB namespaces (cannot be put in conditional statement)
use Facebook\FacebookSession;
use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphUser;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurl;
use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurlHttpClient;


// check if all user data is already in a session
// testing or maybe production
if (isset($_SESSION['dnt_user'])){
	require_once('inc/om_functions.php');
	$user = $_SESSION['dnt_user'];
	//report($_SESSION);
	//die();
}
// connect to FB, get data, analyze
else {	
	require_once('inc/fb_config.php');
	require_once('inc/fb_functions.php');
	require_once('inc/fb_api_calls.php');
	require_once('inc/facebook-php-sdk-v4/autoload.php');
	$fb_login_state = false;
		
	// create Facebook
	FacebookSession::setDefaultApplication($login['app_id'],$login['app_secret']);
	
	// JavaScriptLoginHelper for including app in iframe
	$helper = new FacebookJavaScriptLoginHelper();
	try {
		$session = $helper->getSession();
	} catch(FacebookRequestException $ex) {
		// When Facebook returns an error
	} catch(\Exception $ex) {
		// When validation fails or other local issues
	}
	if (isset($session) && $session) {
		
		// logged in.
		$fb_login_state = true;
		
		/* GET ALL THE FB DATA WE NEED FOR THE APP */
		
		// PERMISSIONS
		$user['permissions'] = fb_get_permissions();
		
		// USER
		$str = '/me?fields=id,name,locale,gender';
		// make sure birthday was granted
		if (isset($user['permissions']['user_birthday']) == 'granted') $str .= ',birthday';
		$user['me'] = fb_call_basic($str);
		
		// GENDER
		if ( !isset($user['me']['gender']) ){
			$user['me']['gender'] = 'NOT DECLARED';
		}
		
		// AGE
		if (isset($user['me']['birthday']) && $user['me']['birthday'] != ''){
			$user['me']['age'] = calculate_age($user['me']['birthday']);
		} else {
			$user['me']['age'] = 'NOT DECLARED';
		}
	
		// LIKES, LIKE_IDS, LIKE_PAGES
		if (isset($user['permissions']['user_likes'])){
			$arr = fb_generic_api_call('/me/likes');
			//report($arr);
			
			$user['likes'] = array();
			$user['like_ids'] = array();
			
			// store all likes, like_ids
			foreach( $arr['data'] as $key => $val ) {
				$user['likes'][$val->id] = array('id'=> $val->id, 'name'=> $val->name, 'category'=> $val->category, 'created_time'=> $val->created_time);
				$user['like_ids'][] = $val->id;
			}
			
			// get all liked pages (FB has a limit of 50 for above type calls)
			$likes_str = implode(',',array_slice($user['like_ids'],0,49));
			$user['likes_pages'] = fb_call_basic('?ids='. $likes_str .'&fields=name,about,link,likes,picture');
			




			// COUNT LIKES
					
			// like timeline
			$user['like_timeline'] = array();
			// like categories
			$user['like_categories'] = array();
			
			// loop through likes
			foreach ($user['likes'] as $key => $arr){
				
				$time = strtotime($arr['created_time']);
				$month = date("Y", $time);
				
				if (isset($user['like_timeline'][$month])){
					$user['like_timeline'][$month]++;
				} else {
					$user['like_timeline'][$month] = 1;
				}	
				
				
				if (isset($user['like_categories'][$arr['category']])){
					$user['like_categories'][$arr['category']]++;
				} else {
					$user['like_categories'][$arr['category']] = 1;
				}
			}

			
			
			// BIG5
			
			include('inc/big5_scores.php');
			include('inc/papi2-client-php/example.php');
			$predictions = get_prediction('return',$user['like_ids'],$user['me']['id']);
			sort($predictions->_predictions); // sort
	
			$big5_result = array();
			//print "<div id='likes_chart'>";
			foreach($predictions->_predictions as $val){
				
				if (isset($val->_trait) && $val->_value > 0){
	
					// if BIG5_
					if (strpos($val->_trait, "BIG5_") !== false
						// || strpos($val->_trait, "Satisfaction_Life") !== false
						// || strpos($val->_trait, "Intelligence") !== false
						){
						
						// store for use below
						$big5_result[str_replace('BIG5_', '', $val->_trait)] = $val->_value;
					}
				}	
			}
			$user['big5'] = $big5_result;
			

		}
		
		
		
		

										
						
				
			
		/**
		 *	Create risk table for user using their Magic Sauce results and risk scores
		 */
		function compute_risk($big5_result, $big5_risk, $options='', $g='', $age=0){
			
			//print '<p>$options='.$options.', $gender='.$g.', $age='.$age.'</p>';
			
			// hold data
			$data = array(); 
			
			foreach($big5_result as $big5_name => $big5_score){	
				// create new secondary arr
				$data[$big5_name] = array(); 
									
				// loop through and insert score for each
				foreach($big5_risk[$big5_name] as $risk_name => $big5_risk_score){
					// convert to 0-1 range
					//$risk_score = convertRange($big5_risk_score,-.31,.36,0,1); // original 
					$risk_score = convertRange($big5_risk_score,-.33,.44,0,1); // tweak
					
					
					// calc user risk for logged in user
					if (strpos($options, 'calc_user_risk') === true){
						$risk_score = ($risk_score + $big5_score) / 2;
					} else {
						// leave scores alone
					}
					
					// calc user risk AND gender for logged in user
					if ( $g === 'male' ){
						if ($risk_name == 'Recreation' || $risk_name == 'Health' || $risk_name == 'Safety' || $risk_name == 'Overall'){
							$risk_score *= 1.2; 
						}
					} else if ($g == 'female'){
						if ($risk_name == 'Career' || $risk_name == 'Social' || $risk_name == 'Finance'){
							$risk_score *= 1.2; 
						}
					} else {
						// leave scores alone
					}
					
					
					/*
					// calc user risk AND gender for logged in user
					if (strpos($options, 'calc_user_risk_gender') === true){
						global $gender;
						if ( $gender == 'male' && $risk_name == 'Recreation' || $risk_name == 'Health' || $risk_name == 'Safety' || $risk_name == 'Overall'){
							$risk_score *= 1.3; 
						} else if ($gender == 'female' && $risk_name == 'Career' || $risk_name == 'Social' || $risk_name == 'Finance'){
							$risk_score *= 1.3; 
						}	
					} 
					
					// testing male
					if (strpos($options, 'calc_gender_risk_male') === true){
						if ( $risk_name == 'Recreation' || $risk_name == 'Health' || $risk_name == 'Safety' || $risk_name == 'Overall' ){
							$risk_score *= 1.3; 
						}
					} 
					// testing female
					if (strpos($options, 'calc_gender_risk_female') === true){
						if ( $risk_name == 'Career' || $risk_name == 'Social' || $risk_name == 'Finance' ){
							$risk_score *= 1.3; 
						}
					}
					*/
					
					
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
					
					
					$data[$big5_name][$risk_name] = round($risk_score,5);
				}
			}
			/*
			// normalize all data
			$max = 0;
			$min = 100;
			// get max / min values
			foreach($data as $big5_name => $big5_arr){
				if ( max($big5_arr) > $max ) $max = max($big5_arr);
				if ( min($big5_arr) < $min ) $min = min($big5_arr);
			}
			print "<br>Pre-normalization values: $max (max) / $min (min)";
			
			foreach($data as $big5_name => $big5_arr){
				foreach($big5_arr as $risk_name => $risk_score){
					$data[$big5_name][$risk_name] = convertRange($risk_score,$min,$max,0,1);
				}
			}
			*/
			return $data;
		}
		/**/
		
		$big5_risk = array(
			'Neuroticism' 		 => array('Recreation' => -.16, 'Health' => .11, 'Career' => -.11, 'Finance' => -.14, 'Safety' => -.09, 'Social' => -.12, 'Overall' => -.18),
			'Extraversion' 	   => array('Recreation' => .17, 'Health' => .17, 'Career' => .01, 'Finance' => .09, 'Safety' => .22, 'Social' => .22, 'Overall' => .26),
			'Openness' 		    => array('Recreation' => .2, 'Health' => .06, 'Career' => .34, 'Finance' => .1, 'Safety' => .05, 'Social' => .32, 'Overall' => .36),
			'Agreeableness' 	 => array('Recreation' => -.12, 'Health' => -.17, 'Career' => -.18, 'Finance' => -.21, 'Safety' => -.19, 'Social' => -.16, 'Overall' => -.31),
			'Conscientiousness' => array('Recreation' => -.09, 'Health' => -.13, 'Career' => -.08, 'Finance' => -.17, 'Safety' => -.16, 'Social' => -.07, 'Overall' => -.2)
		);
		
		
		if (isset($user['me']['gender']) && $user['me']['gender'] != '' && $user['me']['gender'] != 'NOT DECLARED'){
			$g = $user['me']['gender'];
		} else {
			$g = '';
		}
		if (isset($user['me']['age']) && $user['me']['age'] != '' && $user['me']['age'] != 'NOT DECLARED'){
			$a = $user['me']['age'];
		} else {
			$a = 0;
		}

		
		$user['big5_risk_final'] = compute_risk($user['big5'], $big5_risk, $g, $a);
		//report($user['big5_risk_final']);
		
		
		
		// order risk into separate domains					
		$user['big5_risk_domains'] = array();
		foreach($user['big5_risk_final'] as $key => $arr){
			foreach($arr as $domain => $val){
				$user['big5_risk_domains'][$domain][$key] = $val;
			}
		}
		//report($user['big5_risk_domains']);
		
		
	
		// store all user data in session
		$_SESSION['dnt_user'] = $user;
	}	
	
	
}

//report($user);
function get_risk_color($total){
	$risk_color = '';
	if ($total > 1){
		$risk_color = '#ff1d00';
	} else if ($total > .9){
		$risk_color = '#ff3f0a';
	} else if ($total > .8){
		$risk_color = '#ff6f14';
	} else if ($total > .7){
		$risk_color = '#ffa51e';
	} else if ($total > .6){
		$risk_color = '#ffd828';
	} else if ($total > .5){
		$risk_color = '#f6fb30';
	} else if ($total > .4){
		$risk_color = '#cdfb32';
	} else if ($total > .3){
		$risk_color = '#a3fb34';
	} else if ($total > .2){
		$risk_color = '#7ffa35';
	} else if ($total > .1){
		$risk_color = '#5ffa36';
	} else if ($total >= 0){
		$risk_color = '#35fa38';
	}
	return $risk_color;
}

include_once('templates/header.php');
include_once('templates/sidebar.php');
	
?>	

		
		
		
		
		
		<div class="col-sm-9 content-col">
			<div class="inner">
		
				
	
				
				
				<!-- step0 -->
				<div id="step0" class="step">
					<div class="row">
						<div class="col-sm-12 title">
							<h3>Welcome to Illuminus.</h3>							
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							
							<p>Please click below to get started.</p>
							
							<button class="btn btn-large fb_btn"><img src="assets/img/icon_fb_btn.png" alt="fb logo"> Log in with Facebook</button>
							
						</div>
					</div>
				</div>
				<!-- /step0 -->
	
	
				
	
	
				<!-- step1 -->
				<div id="step1" class="step">
					<div class="row">
						<div class="col-sm-6 title">
							<h3>1. Data Sequencing</h3>
							<p>We have successfully retrieved your data. 
							
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
							put likes here
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
							<h3>Health Risk Evaluation</h3>
							<p>The following health risk evaluation is based on an interpretation of your Facebook profile.</p>
						</div>
					</div>
					<div class="row">
					
						<div class="col-sm-6">
							<h4>Risk...</h4>
							<p>Your Openness score indicates a high risk for sexually transmitted diseases and other bad things. You are 37% more likely to be friendly to a stranger. Your predisposition to risky behavior will likely have bad effects on our bottom line.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur ultrices metus, id ornare ligula finibus et. In auctor est tellus, vitae egestas quam congue sed. In at elit et dui maximus congue. Quisque sed nibh semper, lacinia lorem sed, tristique arcu. Phasellus at sem quis sapien sodales convallis. Vestibulum est massa, vestibulum non mauris commodo, egestas dapibus orci. Etiam ut quam eu arcu condimentum interdum. Nulla vitae enim leo. Sed quis dignissim nibh. Vestibulum maximus laoreet lectus eu aliquam. Donec in nisi rhoncus, tempus ligula eget, malesuada dui. Donec viverra vehicula ex, sed pulvinar risus aliquet sed.</p>
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
				</div>
				<!-- /step2 -->







				<!-- step3 -->
				<div id="step3" class="step">	
					<div class="row">
						<div class="col-sm-12 title">
							<h3>Financial Risk Evaluation</h3>
							<p>The following xxx risk evaluation is based on an interpretation of your Facebook profile.</p>
						</div>
					</div>
					<div class="row">
						<?php
										
						if (true){
						
							
						
						
						}
										
						?>
						<div class="col-sm-6">
							
							<canvas id="myChart" class="chart" width="500" height="500"></canvas>
							<div class="chart_caption">A donut chart</div>
	
						</div>
						<div class="col-sm-6">
							
							<p>Your Openness score indicates a high risk for sexually transmitted diseases and other bad things. You are 37% more likely to be friendly to a stranger. Your predisposition to risky behavior will likely have bad effects on our bottom line.</p>
							
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur ultrices metus, id ornare ligula finibus et. In auctor est tellus, vitae egestas quam congue sed. In at elit et dui maximus congue. Quisque sed nibh semper, lacinia lorem sed, tristique arcu. Phasellus at sem quis sapien sodales convallis. Vestibulum est massa, vestibulum non mauris commodo, egestas dapibus orci. Etiam ut quam eu arcu condimentum interdum. Nulla vitae enim leo. Sed quis dignissim nibh. Vestibulum maximus laoreet lectus eu aliquam. Donec in nisi rhoncus, tempus ligula eget, malesuada dui. Donec viverra vehicula ex, sed pulvinar risus aliquet sed.</p>
							
							
						</div>
	
	
					</div>
				</div>
				<!-- /step3 -->	

	

	
	
	
	
			</div>
		</div>

<?php

	
include_once('templates/footer.php');
print "<script>$scripts</script>";

?>