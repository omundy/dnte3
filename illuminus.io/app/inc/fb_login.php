<?php




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


// for reporting / recording states
$control = array();

// figure out what domain we're on
if (isset($_SERVER['HTTP_HOST'])){
	$search = array('https://','http://','www');
	$control['domain'] = str_replace($search,'',$_SERVER['HTTP_HOST']);
} else {
	$control['domain'] = 'dnt.dev';
}


// which data_set to show
if(isset($_GET['data_set'])){
	$control['data_set'] = $_GET['data_set'];
} else {
	// default to sample
	$control['data_set'] = 'sample';
}; 

// get lang / step
if(isset($_GET['lang']) && isset($_GET['step'])) { 
	$control['step'] = $_GET['step'];
	$control['lang'] = $_GET['lang'];
} else {
	$control['step'] = 'zero';
	$control['lang'] = 'EN';
}

// get player
if(isset($_GET['player']) && $_GET['player'] == 'yes'){
	// app is loaded in player
	$control['player'] = 'yes';
} else {
	// standalone app
	$control['player'] = 'no';
}; 






$control['show_alt_data_reason'] = '';


$control['fb_error'] = '';

// store all scripts to include once html is loaded
$scripts = '';
$scripts .= "var step = '". $control['step'] ."';\n ";
$scripts .= "var lang = '". $control['lang'] ."';\n ";
$scripts .= "var player = '". $control['player'] ."'; \n\n";




/*
	

1. First run, no data_set	

illuminus.io/app/?data_set=user&step=zero&lang=EN


*/


// init session
session_start();
//report($_SESSION);

//unset($_SESSION['dnt_user']);

// for all user data
$user = array();

// global functions
require_once('inc/om_functions.php');

// CHECK IF THEY ARE LOGGED INTO APP
require_once('inc/fb_config.php');
require_once('inc/fb_functions.php');
require_once('inc/fb_api_calls.php');
require_once('inc/facebook-php-sdk-v4/autoload.php');

// create Facebook
FacebookSession::setDefaultApplication($login['app_id'],$login['app_secret']);

// JavaScriptLoginHelper for including app in iframe
$helper = new FacebookJavaScriptLoginHelper();
try {
	$session = $helper->getSession();
} catch(FacebookRequestException $ex) {
	// When Facebook returns an error
	$control['fb_error'] = $ex->getMessage();
	$control['show_alt_data_reason'] = 'notloggedin';
} catch(\Exception $ex) {
	// When validation fails or other local issues
	$control['fb_error'] = $ex->getMessage();
	$control['show_alt_data_reason'] = 'notloggedin';
}

// if FB session
if (isset($session) && $session) {
	$control['fb_login_state'] = 'yes';
} else {
	$control['fb_login_state'] = 'no';
	$control['show_alt_data_reason'] = 'notloggedin';
	$scripts .= "console.log('Could not login: ". $control['fb_error'] ."'); \n";
}







	
		

if ( $control['step'] == 'credits' ){
	// do nothing
} else if ( $control['step'] == 'privacy' ){
	// do nothing
} 
// connect to FB, get data, analyze
else if ($control['fb_login_state'] == 'yes') {

}



//report($control,150);	
	


// attempt to get sample data
if ( $control['step'] == 'load_data_sample'){
	
	// use sample user data
	$json = file_get_contents('inc/default_user.json');
	$user = (Array)json_decode($json,true);

	// make that the user
	$_SESSION['dnt_user'] = $user;

	//report($user);
	//exit();
	header('Location: ./?data_set=sample&step=one&lang='.$control['lang'].'&player='.$control['player']);

}
// attempt to get FB data
else if ( $control['step'] == 'load_data_fb'){
	
	// if we were able to login
	if (isset($session) && $session) {

		
		/* GET ALL THE FB DATA WE NEED FOR THE APP */
		
		// PERMISSIONS
		$user['permissions'] = fb_get_permissions();
		
		// USER
		$str = '/me?fields=id,name,locale,gender';
		// make sure birthday was granted
		if (isset($user['permissions']['user_birthday']) == 'granted') $str .= ',birthday';
		$user['me'] = fb_call_basic($str);
		
		// get photo
		$user['me']['photo'] = fb_photo_thumb_url();
		
		
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
			
			
			
			
			if ($arr = fb_generic_api_call('/me/likes')){
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
				
				// report
				$control['retrieve_fb_likes_data'] = 'true';
				
	
	
	
	
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
				if ($predictions = get_prediction('return',$user['like_ids'],$user['me']['id'])){
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
					$control['retrieve_big5_data'] = 'true';
				} else {
					$control['show_alt_data_reason'] = 'big5prediction';
				}
			} else {
				$control['show_alt_data_reason'] = 'nodata';
			}	

		} else {
			$control['show_alt_data_reason'] = 'app_permissions';
		}
		
		
		
		

										
						
		if(isset($user['big5'])){		
			
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
								$risk_score *= 1.5; 
							}
						} else if ($g == 'female'){
							if ($risk_name == 'Career' || $risk_name == 'Social' || $risk_name == 'Finance'){
								$risk_score *= 1.5; 
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
				'Neuroticism' => array('Recreation' => -.16, 'Health' => .11, 'Career' => -.11, 'Finance' => -.14, 'Safety' => -.09, 'Social' => -.12, 'Overall' => -.18),
				'Extraversion' => array('Recreation' => .17, 'Health' => .17, 'Career' => .01, 'Finance' => .09, 'Safety' => .22, 'Social' => .22, 'Overall' => .26),
				'Openness' => array('Recreation' => .2, 'Health' => .06, 'Career' => .34, 'Finance' => .1, 'Safety' => .05, 'Social' => .32, 'Overall' => .36),
				'Agreeableness' => array('Recreation' => -.12, 'Health' => -.17, 'Career' => -.18, 'Finance' => -.21, 'Safety' => -.19, 'Social' => -.16, 'Overall' => -.31),
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
				foreach($arr as $risk_domain => $val){
					$user['big5_risk_domains'][$risk_domain][$key] = $val;
				}
			}
		} else {
			$control['show_alt_data_reason'] = 'big5prediction';
		}	
		
	
		// store all user data in session
		$_SESSION['dnt_user'] = $user;
		header('Location: ./?data_set=user&step=one&lang='.$control['lang'].'&player='.$control['player']);
	}	
	else {
		$control['fb_login_state'] = 'no';
		$control['show_alt_data_reason'] = 'notloggedin';
		$scripts .= "console.log('Could not login.'); \n";
	}
	





} else {
	
	
		
	
	// check if all user data is already in a session
	if (isset($_SESSION['dnt_user'])){
		
		$control['dnt_user_session'] = 'previous dnt_user session FOUND';
		$user = $_SESSION['dnt_user'];
		
		//report($user);
		//die();
		
		// for saving user data
		//report(JSON_encode($user));
		//die();
		
	} else {
		$control['dnt_user_session'] = 'previous dnt_user session NOT FOUND';
		
		
	}
	





	
}



//report($user['big5_risk_domains']);
//report($control);
//report($_SESSION);
//report($user);
	

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




?>


