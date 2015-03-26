<?php

if(isset($_GET['start'])) die("Logging in");

$fb_login_state = false;
session_start();

// for all user data
$user = array();

//NO COMPOSER
require 'inc/facebook-php-sdk-v4/autoload.php';
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
// create Facebook
include_once('inc/fb_config.php');
include_once('inc/fb_functions.php');
include_once('inc/fb_api_calls.php');
include_once('inc/om_functions.php');
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
			$user['likes'][$val->id] = array('id'=> $val->id, 'name'=> $val->name, 'category'=> $val->category);
			$user['like_ids'][] = $val->id;
		}
		
		// get all liked pages (FB has a limit of 50 for above type calls)
		$likes_str = implode(',',array_slice($user['like_ids'],0,49));
		$user['likes_pages'] = fb_call_basic('?ids='. $likes_str .'&fields=name,about,link,likes,picture');
		
		
		
		// BIG5
		
		include('inc/big5_scores.php');
		include('inc/papi2-client-php/example.php');
		$predictions = get_prediction('return',$user['like_ids'],$user['me']['id']);
		sort($predictions->_predictions); // sort

		$big5_result = array();
		print "<div id='likes_chart'>";
		foreach($predictions->_predictions as $val){
			
			if (isset($val->_trait) && $val->_value > 0){

				// if BIG5_
				if (strpos($val->_trait, "BIG5_") !== false
					// || strpos($val->_trait, "Satisfaction_Life") !== false
					// || strpos($val->_trait, "Intelligence") !== false
					){
					
					// store for use below
					$big5_result[$val->_trait] = $val->_value;
				}
			}	
		}
		$user['big5'] = $big5_result;
		
		
		
		
	}
	
	




  
}	

report($user);



/**
 *	Generic API call (works for likes only)
 */
function fb_generic_api_call($name){
	global $session, $fb_api_calls;


	// define query
	$q = '/me/likes';
	$offset = 0;
	$limit = 100;
	$exit = false;
	$arr = array('data'=>array());
	
	// start paging loop and continue until 'error' isset
	while ($exit == false){
		
		// get data
		$a = fb_call_paging($q,$offset,$limit);
		
		if (isset($a['data'])){

			foreach($a['data'] as $val){
				$arr['data'][] = $val;
			}
		

			
			
			
			
	
			if (isset($a['error'])){
				$exit = true;
				return $a;
			} else if (isset($a['paging']->next)){
				//print_r($a['paging']->next);
				$offset += $limit;
			} else {
				$exit = true;
			}
			/**/
			
		} else {
			$exit = true;
		}
	}

	/*
	print count($arr['data']);
	print "<pre>";
	print_r($arr);
	print "</pre>";
	*/
	return $arr;

	
}

/**
 *	Basic FB call for paging
 */
function fb_call_paging($q,$offset=0,$limit=100){
	global $session;
	try {
		$request = new FacebookRequest($session,'GET',$q."/?offset=$offset&limit=$limit");
		$response = $request->execute();
		$arr = $response->getGraphObject()->asArray();
		return $arr;
	} catch (Exception $e) {
		return array('error' => $e->getMessage());
	}
}



/**
 *	Basic FB call 
 */
function fb_call_basic($q){
	global $session;
	try {
		$request = new FacebookRequest($session,'GET',$q);
		$response = $request->execute();
		$arr = $response->getGraphObject()->asArray();
		return $arr;
	} catch (Exception $e) {
		return array('error' => $e->getMessage());
	}
}






	
?>	
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- meta -->
<title>Illuminus - Unlocking the power of you</title>
<meta name="description" content="illuminus.io - Unlocking the power of you">
<meta name="author" content="Produced in association with Do Not Track">
<link rel="apple-touch-icon" sizes="57x57" href="assets/img/icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="assets/img/icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="assets/img/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="assets/img/icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="assets/img/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="assets/img/icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"	href="assets/img/icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/img/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="assets/img/icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/img/icons/favicon-16x16.png">
<link rel="manifest" href="assets/img/icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/styles.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<div id="page">
	<div class="row site-main">
		
		
		<div class="col-sm-3 sidebar-col">
			<div class="inner">
				
				<img src="assets/img/logo.png" alt="illuminus logo">
				<div class="product_name">Future Present Risk Detection</div>
				<div class="callout">Learn what we already know about you</div>
				
				<button class="btn btn-large fb_btn"><img src="assets/img/icon_fb_btn.png" alt="fb logo"> Log in with Facebook</button>

				<ul class="nav_steps">
					<li><a href="#" class="selected">Welcome</a></li>
					<li><a href="#">Profile Data Sequencing</a></li>
					<li><a href="#">Health Risk Evaluation</a></li>
					<li><a href="#">Financial Risk Evaluation</a></li>
				</ul>

				<ul class="nav_footer">
					<li><a href="#">Home</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Logout</a></li>
				</ul>
				
			</div>
		</div>
		
		
		<div class="col-sm-9 content-col">
			<div class="inner">
		
		
				<div class="row">
					<div class="col-sm-12 title">
						
						<h3>Health Risk Evaluation</h3>
						<p>The following health risk evaluation is based on an interpretation of your Facebook profile.</p>
						
						
					</div>
				</div>
				
				
				<div class="row">
				
				<?php
					
if ($fb_login_state == true){
	
		
	
	
}
					
				
				?>
				
				
					<div class="col-sm-6">
						
						
						
						
						<canvas id="myChart" class="chart" width="500" height="500"></canvas>
						<div class="chart_caption">A donut chart</div>

						
					</div>
					
					
					<div class="col-sm-6">
				
				
				
				
				<p>Your Openness score indicates a high risk for sexually transmitted diseases and other bad things. You are 37% more likely to be friendly to a stranger. Your predisposition to risky behavior will likely have bad effects on our bottom line.</p>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur ultrices metus, id ornare ligula finibus et. In auctor est tellus, vitae egestas quam congue sed. In at elit et dui maximus congue. Quisque sed nibh semper, lacinia lorem sed, tristique arcu. Phasellus at sem quis sapien sodales convallis. Vestibulum est massa, vestibulum non mauris commodo, egestas dapibus orci. Etiam ut quam eu arcu condimentum interdum. Nulla vitae enim leo. Sed quis dignissim nibh. Vestibulum maximus laoreet lectus eu aliquam. Donec in nisi rhoncus, tempus ligula eget, malesuada dui. Donec viverra vehicula ex, sed pulvinar risus aliquet sed.</p>

<p>Proin venenatis justo ac sapien congue volutpat vitae eget mi. Phasellus at mattis arcu. Morbi at pulvinar dui. Aenean eget lacus sagittis lectus pharetra imperdiet. Proin vel massa semper, consequat augue vel, imperdiet lorem. Nam libero turpis, efficitur non quam ut, lacinia sagittis erat. Proin ac ornare felis, pulvinar tempor mi. Suspendisse molestie lectus risus, id auctor velit condimentum ut. Integer pharetra, nunc quis congue aliquam, velit sapien aliquet nisl, ut viverra sem massa eu risus. Nulla hendrerit, sapien vel euismod aliquam, erat dolor molestie neque, et accumsan magna sapien sit amet eros. Sed dictum volutpat libero sed pharetra. Aliquam volutpat mauris efficitur tortor pharetra euismod. Etiam dapibus porta nulla et finibus. Sed sed bibendum nisi, eget scelerisque est.</p>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur ultrices metus, id ornare ligula finibus et. In auctor est tellus, vitae egestas quam congue sed. In at elit et dui maximus congue. Quisque sed nibh semper, lacinia lorem sed, tristique arcu. Phasellus at sem quis sapien sodales convallis. Vestibulum est massa, vestibulum non mauris commodo, egestas dapibus orci. Etiam ut quam eu arcu condimentum interdum. Nulla vitae enim leo. Sed quis dignissim nibh. Vestibulum maximus laoreet lectus eu aliquam. Donec in nisi rhoncus, tempus ligula eget, malesuada dui. Donec viverra vehicula ex, sed pulvinar risus aliquet sed.</p>

<p>Proin venenatis justo ac sapien congue volutpat vitae eget mi. Phasellus at mattis arcu. Morbi at pulvinar dui. Aenean eget lacus sagittis lectus pharetra imperdiet. Proin vel massa semper, consequat augue vel, imperdiet lorem. Nam libero turpis, efficitur non quam ut, lacinia sagittis erat. Proin ac ornare felis, pulvinar tempor mi. Suspendisse molestie lectus risus, id auctor velit condimentum ut. Integer pharetra, nunc quis congue aliquam, velit sapien aliquet nisl, ut viverra sem massa eu risus. Nulla hendrerit, sapien vel euismod aliquam, erat dolor molestie neque, et accumsan magna sapien sit amet eros. Sed dictum volutpat libero sed pharetra. Aliquam volutpat mauris efficitur tortor pharetra euismod. Etiam dapibus porta nulla et finibus. Sed sed bibendum nisi, eget scelerisque est.</p>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur ultrices metus, id ornare ligula finibus et. In auctor est tellus, vitae egestas quam congue sed. In at elit et dui maximus congue. Quisque sed nibh semper, lacinia lorem sed, tristique arcu. Phasellus at sem quis sapien sodales convallis. Vestibulum est massa, vestibulum non mauris commodo, egestas dapibus orci. Etiam ut quam eu arcu condimentum interdum. Nulla vitae enim leo. Sed quis dignissim nibh. Vestibulum maximus laoreet lectus eu aliquam. Donec in nisi rhoncus, tempus ligula eget, malesuada dui. Donec viverra vehicula ex, sed pulvinar risus aliquet sed.</p>

<p>Proin venenatis justo ac sapien congue volutpat vitae eget mi. Phasellus at mattis arcu. Morbi at pulvinar dui. Aenean eget lacus sagittis lectus pharetra imperdiet. Proin vel massa semper, consequat augue vel, imperdiet lorem. Nam libero turpis, efficitur non quam ut, lacinia sagittis erat. Proin ac ornare felis, pulvinar tempor mi. Suspendisse molestie lectus risus, id auctor velit condimentum ut. Integer pharetra, nunc quis congue aliquam, velit sapien aliquet nisl, ut viverra sem massa eu risus. Nulla hendrerit, sapien vel euismod aliquam, erat dolor molestie neque, et accumsan magna sapien sit amet eros. Sed dictum volutpat libero sed pharetra. Aliquam volutpat mauris efficitur tortor pharetra euismod. Etiam dapibus porta nulla et finibus. Sed sed bibendum nisi, eget scelerisque est.</p>


					</div>


				</div>
	
	
				
			</div>
		</div>
		
		
		
	</div>
</div>




<!-- JS -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/Chart.js-master/Chart.js"></script>
<script src="assets/js/chart_options.js"></script>
<script src="assets/js/main.js"></script>
<script>



</script>
</body>
</html>
