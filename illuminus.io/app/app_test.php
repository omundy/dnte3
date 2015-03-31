<?php

//
global $session, $fb_login_state, $login_btn;
$fb_login_state = false;
$q = (isset($_GET['q'])) ? $_GET['q']: '/me';
$offset = 0;
$limit = 100;

include_once('inc/fb_login.php');
include_once('inc/fb_api_calls.php');
include_once('inc/fb_functions.php');
include_once('inc/fb_wrappers.php');
include_once('inc/om_functions.php');

// $fb_login_state should be set before proceeding
if ($fb_login_state){
	// so store permissions
	$permissions = fb_get_permissions();
	// or maybe they are trying to remove all permissions
	if (isset($_GET['revoke']) && isset($_GET['q'])){
		if ($_GET['q'] == 'all'){
			fb_delete_permissions();
			header( 'Location: ./app.php' );
		} else {
			// or a specific permission
			fb_delete_permissions($_GET['revoke']);
			header( 'Location: ./app.php?q='.$_GET['q'] );
		}
	}
}

include_once('templates/header.php');

?>

<div class="container">
	<div class="row">

<?php 

if ($fb_login_state){	

include_once('templates/sidebar.php');
print '<div class="col-md-10">';


/**
*	Example for getting all text from a data set
*/	
if ($q == "feed") {
$feed_text = "";
$arr = fb_generic_api_call($q);
if (!isset( $arr['error']) ) {
print '<pre>';
foreach( $arr['data'] as $key => $val ) {
	if ( isset( $val->message ) ) {
		$feed_text .= $val->message . " ";
	}
	if ( isset( $val->description ) ) {
		$feed_text .= $val->description . " ";
	}
}
print($feed_text);
print '</pre>';
} else {
print $arr['error'];
}

		
		
		
		
/**
*	Working example of DNT illuminus.io application
*/	
} else if ($q == "likes") {	

// get all likes and likeids		
$likes = array();
$likeIds = array();

if ($arr = fb_generic_api_call($q));
//print_r($arr);
//die('end');
if (!isset( $arr['error']) ) {

if ( count($arr['data']) > 0 ) {

// store all likes
foreach( $arr['data'] as $key => $val ) {
$likes[$val->id] = array('id'=> $val->id, 'name'=> $val->name, 'category'=> $val->category);
$likeIds[] = $val->id;
}
				
				
				print "<pre>Following is the step by step of user walking through entire process.</pre>";
				
				
				/**
				 *	STEP 0. FB LOGIN PROMPT
				 */
				print '<hr><hr>';
				print '<h3>STEP 0. FB LOGIN PROMPT</h3>';
				print '<p>Learn what we already know about you</p>';
				
				
				
				/**
				 *	STEP 1. WELCOME / SHOW THEIR DATA / INTRODUCE PERSONALITY TEST
				 */
				print '<hr><hr>';
				print '<h3>STEP 1. WELCOME / SHOW THEIR DATA / INTRODUCE PERSONALITY TEST</h3>';
print '<h5>Welcome to Illuminus.</h5>';
print '<p>Please wait while we access your data...</p>';
print '<p>Data acquisition successful. </p>';
if (!isset($likes) || count($likes) < 10) {
print '<p>You don\'t have enough likes to participate :-( (show user a simple click through test)</p>';
} else {

if (count($likes) < 100) {
print '<p>OK, it looks like you have enough data for us to evaluate. Analyzing your interests...</p>';
} else if (count($likes) >= 100) {
print "<p>Wow, you have spent a lot of time on Facebook. Evaluating your data trail should be a breeze ...</p>";
}
					

$me = fb_call_basic('/me?fields=id,name,locale,birthday,gender,age_range');
/*
print "<pre>";
print_r($me);
print "</pre>";
*/
					
$user = array('id'=>$me['id'],'name'=>$me['name'],'locale'=>$me['locale'],'gender'=>'','age'=>0);

if (isset($me['gender']) && $me['gender'] != ''){
	$user['gender'] = $me['gender'];
} else {
	$user['gender'] = 'NOT DECLARED';
}
if (isset($me['birthday']) && $me['birthday'] != ''){
	$user['age'] = calculate_age($me['birthday']);
} else {
	$user['age'] = 'NOT DECLARED';
}
					

print '<p>It looks like we already know...';

if (isset($user['name']) && $user['name'] != '')
print 'your name:</p><p><b>'. $user['name'] .'</b></p>';

if (isset($user['gender']) && $user['gender'] != '' && $user['gender'] != 'NOT DECLARED')
print '<p>Your gender:</p><p><b>'. $user['gender'] .'</b></p>';

if (isset($user['age']) && $user['age'] != '' && $user['age'] != 'NOT DECLARED')
print '<p>Your age:</p><p><b>'. $user['age'] .'</b></p>';

					
					
				

// for testing
//$likes_pages = fb_call_basic('?ids=695641060487490,220779885077,9258148868&fields=name,about,link,likes,picture');

// get all liked pages (FB has a limit of 50 for above type calls)
$likes_str = implode(',',array_slice($likeIds,0,49));
$likes_pages = fb_call_basic('?ids='. $likes_str .'&fields=name,about,link,likes,picture');
					
print '<p>We also know a quite a bit about you based on your interests like: ';
$i=0;
foreach($likes_pages as $like_page){
if($i > 2) print ' and ';
print '<a href="'. $like_page->link .'" title="'. $like_page->name .'">'. $like_page->name .'</a>, ';
if($i++ > 2) break;
}

print ' but there are many more interests. We can use these to tell us about you and predict your behavior.</p>';
					
					//print "<pre>";
					//print_r($likes_pages);
					//print "</pre>";
					
					$design ='<div style="background:#000; padding:40px; overflow:auto">';
					print '<div class="likes_pages"><div class="likes_pages_scroll">';
					foreach($likes_pages as $like_page){
						
						$about = (isset($like_page->about) ? $like_page->about : '');
						
						print '<div>';
						print '<a href="'. $like_page->link .'" title="'. $about .'"><img src="'. $like_page->picture->data->url .'" class="img">';
						print '<span class="name">'. $like_page->name .'</span></a><br>';
						print limit_words($about,70) .'';
						print '</div>';
						
						
						$design .= '<img src="'. $like_page->picture->data->url .'" style="width:95px; height:95px; float:left; padding:5px;" class="sepia">';
					
					}
					print '</div></div>';
					
					
					//print $design.'</div>';
					
/**
*	STEP 1a. INTRODUCE PERSONALITY TEST
*/
print '<hr>';
print '<h3>NOW WE WILL ANALYZE YOU PERSONALITY ATTRIBUTES BASED ON YOUR FACEBOOK DATA....</h3>';	
print '<p>Very interesting results!!!</p>';
include('inc/big5_scores.php');

include('inc/papi2-client-php/example.php');
$predictions = get_prediction('return');
sort($predictions->_predictions); // sort

$big5_result = array();
print "<div id='likes_chart'>";
foreach($predictions->_predictions as $val){

if (isset($val->_trait) && $val->_value > 0){



// REPORT AS PERCENTILE 

// if BIG5_
if (strpos($val->_trait, "BIG5_") !== false
// || strpos($val->_trait, "Satisfaction_Life") !== false
// || strpos($val->_trait, "Intelligence") !== false
){
print "<div>". $val->_trait .": ".$val->_value .' (PERCENTILE)</div>';
print "<div class='barbg' style='width:920px'><div class='bar' style='width:". ($val->_value*920) ."px'> </div></div>";

// store for use below
$big5_result[$val->_trait] = $val->_value;
}
/*
else if (strpos($val->_trait, "Age") !== false){
print "<div>Age: ".$val->_value .' (PERCENTILE)</div>';
}

//print_r($val);
else {
print "<div>". $val->_trait .": ".$val->_value .' (PROBABILITY)</div>';
print "<div class='barbg' style='width:".($val->_value*920)."px'></div>";
}
*/
}	
}
					print "<div class='arrow-up'></div>";
					print "<div class=''><p>Above values expressed as percentiles. </div>";
print "<div class=''><p>$big5_overview</p></div>";
print '</div>';
					
		
					
					
					/**
					 *	RISK TABLE (FOR DEVELOPMENT PURPOSES ONLY - NOT TO BE SEEN BY USER)
					 */
					print '<hr><hr>';
					print '<h3>RISK TABLES (for testing / development only - not to be seen by user)</h3>';
					
					
					
					
					
					
					




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

					
					
						
					/**
					 *	Print TEST iteration of risk table
					 */
					function print_table($big5_risk_table, $big5_result=NULL, $show_big5_col=false){
						
						// create headers using one of the arrays in the big risk table
						$header = '<th></th>'; 
						$header_names = array_keys( $big5_risk_table['BIG5_Neuroticism'] );
						foreach ($header_names as $header_name){
							$header .= '<th>'. $header_name .'</th>';
						}
						
						// for each row
						$rows = '';
						foreach($big5_risk_table as $big5_name => $risk_arr){
							// row header
							$rows .= '<tr><th>' . $big5_name . ' - '. round($big5_result[$big5_name],5) .'</th>';
							// loop through each col
							foreach($risk_arr as $risk_name => $risk_score){
								$rows .= "<td style='background: ".get_risk_color($risk_score)."'>";
								$rows .= $risk_score .'</td>';
							}
							$rows .= '</tr>';
						}
						return '<table class="table"><tr>'. $header .'</tr>'. $rows . '</table>';
					}
						
						
						
						
						
						
						
						
					/**
					 *	Create risk table for user using their Magic Sauce results and risk scores
					 */
					function compute_risk($big5_result, $big5_risk, $options='', $g='', $age=0){
						
						print '<p>$options='.$options.', $gender='.$g.', $age='.$age.'</p>';
						
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
					/*
					print "<pre>";
					print_r(compute_risk($big5_result, $big5_risk));
					print "</pre>";
					*/
					
					
					
					
					
					print '<br><br><br>';
					print '<hr>';
					
					print '<h4>Nicholson paper risk table</h4>';
					print "The basic risk table from the Nicholson paper ";
					print print_table( compute_risk($big5_result, $big5_risk, '', '', 0), NULL, false );
					
					print '<h4>Default risk table for MALES</h4>';
					print "The risk table with increases to account for <b>male</b> risk (Recreation, Health, Safety, Overall)";
					print print_table( compute_risk($big5_result, $big5_risk, '', 'male', 0), NULL, false );
					
					print '<h4>Default risk table for FEMALES</h4>';
					print "The risk table with increases to account for <b>female</b> risk (Career, Social, Finance)";
					print print_table( compute_risk($big5_result, $big5_risk, '', 'female', 0), NULL, false );
					
					
					
					print '<br><br><br>';
					print '<hr>';
					
					print '<h4>Default risk table for 20 year old</h4>';
					print "The risk table with increases to account for <b>AGE</b> (Risk taking is higher for young people and decreases with age)";
					print print_table( compute_risk($big5_result, $big5_risk, '', '', 20), NULL, false );
					
					print '<h4>Default risk table for 60 year old</h4>';
					print print_table( compute_risk($big5_result, $big5_risk, '', '', 60), NULL, false );
					
					
					
					print '<br><br><br>';
					print '<hr>';
					
					print '<h4>Default risk table for 20 year old MALE</h4>';
					print "The risk table with increases to account for <b>GENDER and AGE</b> (This is the MOST risky group)";
					print print_table( compute_risk($big5_result, $big5_risk, '', 'male', 20), NULL, false );
					
					print '<h4>Default risk table for 60 year old MALE</h4>';
					print "The risk table with increases to account for <b>GENDER and AGE</b>";
					print print_table( compute_risk($big5_result, $big5_risk, '', 'male', 60), NULL, false );
					
					print '<h4>Default risk table for 100 year old FEMALE</h4>';
					print "The risk table with increases to account for <b>GENDER and AGE</b> (This is the LEAST risky group)";
					print print_table( compute_risk($big5_result, $big5_risk, '', 'female', 100), NULL, false );
					
					
					
					print '<br><br><br>';
					print '<hr>';
					
					
					// owen	- saved for testing
					$big5_fictional_0 = array(
						'BIG5_Agreeableness' => 0.37591666616156,
						'BIG5_Conscientiousness' => 0.4399594145818,
						'BIG5_Extraversion' => 0.31011798064728,
						'BIG5_Neuroticism' => 0.35395026480524,
						'BIG5_Openness' => 0.64524753012707
					);
					
					
					// fictional 1	
					$big5_fictional_1 = array(
						'BIG5_Agreeableness' => 0.77591666616156,
						'BIG5_Conscientiousness' => 0.2399594145818,
						'BIG5_Extraversion' => 0.81011798064728,
						'BIG5_Neuroticism' => 0.25395026480524,
						'BIG5_Openness' => 0.44524753012707
					);
					print '<h4>FB personality-trait defined risk for a FICTIONAL USER </h4>';
					print "(female, 35 years old, high agreeableness, extraversion)";
					print print_table( compute_risk($big5_fictional_1, $big5_risk, 'calc_user_risk', 'female', 35), $big5_fictional_1, true );
					
					
					// fictional 2	
					$big5_fictional_2 = array(
						'BIG5_Agreeableness' => 0.17591666616156,
						'BIG5_Conscientiousness' => 0.9399594145818,
						'BIG5_Extraversion' => 0.21011798064728,
						'BIG5_Neuroticism' => 0.95395026480524,
						'BIG5_Openness' => 0.14524753012707
					);
					print '<h4>FB personality-trait defined risk for a FICTIONAL USER</h4>';
					print "(male, 55 years old, high conscientiousness, neuroticism; low agreeableness, extraversion)";
					print print_table( compute_risk($big5_fictional_2, $big5_risk, 'calc_user_risk', 'male', 55), $big5_fictional_2, true );
								
					
					
					
					print '<br><br><br>';
					print '<hr>';
					
					print '<h4>Your FB personality-trait defined risk </h4>';
					print "The table computed with FB/MagicSauce personality scores and above risk tables for the logged-in user";
					print print_table( compute_risk($big5_result, $big5_risk, 'calc_user_risk', '', 0), $big5_result, true );
					
					print '<h4>Your FB personality-trait defined risk and <u>gender</u> ['.$user['gender'].'] (if available)</h4>';
					print "The table computed with FB/MagicSauce personality scores and above risk tables for the logged-in user";
					print print_table( compute_risk($big5_result, $big5_risk, 'calc_user_risk', $user['gender'], 0), $big5_result, true );
					
					print '<h4>Your FB personality-trait defined risk and <u>gender</u> ['.$user['gender'].'] (if available) and <u>age</u> ['.$user['age'].'] (if available)</h4>';
					print "The table computed with FB/MagicSauce personality scores and above risk tables for the logged-in user";
					print print_table( compute_risk($big5_result, $big5_risk, 'calc_user_risk', $user['gender'], $user['age']), $big5_result, true );
					
					
					
					
					
					
					
					
					
					
					
					
					
					/**
					 *	STEP 2. NOW WE ANALYZE YOUR HEALTH RISK
					 */
					print '<hr><hr>';
					print '<h3>STEP 2. NOW WE ANALYZE YOUR <b>HEALTH RISK</b></h3>';
					$user_risk = compute_risk($big5_result, $big5_risk, 'calc_user_risk', $user['gender'], $user['age']);
					
					
					function calc_risk_domain($arr,$col){
						$data = array();
						foreach($arr as $big5_name => $risk_arr){
							foreach($risk_arr as $risk_name => $risk_val){
								if($risk_name == $col){
									
									$data[] = $risk_val;
								}
							}
						}
						return $data;
					}
					
					
					print "<p>According to our charts, your risk score is <b>"."</b></p>";
					
					
					//print '<pre>';
					//print_r(calc_risk_domain($user_risk,'Health'));
					//print '</pre>';
				
					
					function print_risk_result($user_risk,$risk_name,$big5_result){
						global $big5;
						$risk_arr = calc_risk_domain($user_risk,$risk_name);
						$i = 0;
						foreach ($big5_result as $big5_name => $big5_value){
							print '<p style="background:'. get_risk_color($risk_arr[$i]) .'">';
							print 'You scored '. ($big5_value > .5 ? 'high' : 'low') .' in <b>'. $big5[$big5_name]['meta']['name'] .'</b>';
							print ' which influenced your health risk score: '. $risk_arr[$i] .'. ';
							print ($risk_arr[$i] > .5 ? '<b>This does not look good!!</b>' : '');
							print '</p>';
							$i++;
						}
					}
					
					print '<h4>Health</h4>';
					print_risk_result($user_risk,'Health',$big5_result);
					
					print '<h4>Safety</h4>';
					print_risk_result($user_risk,'Safety',$big5_result);
					
					print '<h4>Recreation</h4>';
					print_risk_result($user_risk,'Recreation',$big5_result);
					
					
					
					
					
					
					
					
					/**
					 *	STEP 3. NOW WE ANALYZE YOUR FINANCIAL RISK
					 */
					print '<hr><hr>';
					print '<h3>STEP 3. NOW WE ANALYZE YOUR <b>FINANCIAL RISK</b></h3>';
					
					
					print '<h4>Career</h4>';
					print_risk_result($user_risk,'Career',$big5_result);
					
					print '<h4>Finance</h4>';
					print_risk_result($user_risk,'Finance',$big5_result);
					
					print '<h4>Social</h4>';
					print_risk_result($user_risk,'Social',$big5_result);
					
					
					
					
					
					
					/**
					 *	TESTING TESTING TESTING
					 */
					
					print '<hr><hr>';
					print '<h3>TESTING TESTING TESTING</h3>';
					
					print '<h3>Magic sauce output (clean)</h3>';
					print '<textarea class="print_display">';
					print_r($big5_result);
					print '</textarea>';
					
					print '<h3>Magic sauce output</h3>';
					print '<textarea class="print_display">';
					print_r($predictions);
					print '</textarea>';

				}
				
				print '<h3>$likes array only</h3>';
				print '<textarea class="print_display">';
				print_r($likes);
				print '</textarea>';
				
				print '<h3>Everything</h3>';
				print '<textarea class="print_display">';
				print_r($arr);
				print '</textarea>';


			} else {
				print "no data found";
			}

		} else {
			print $arr['error'];
		}
		
		
		
		
		
	/**
	 *	Default call
	 */	
	} else if (array_key_exists($q,$fb_api_calls) ) {
		$arr = fb_generic_api_call($q);
		if (!isset($arr['error'])){
			if ( count($arr) == 0) print "<p><b>No data returned</b></p>";
			print '<pre>';
			print_r($arr);
			print '</pre>';
		} else {
			print $arr['error'];
		}
	}
	
	
}
else {
	print_r($session);
}
include_once('templates/footer.php');


?>

