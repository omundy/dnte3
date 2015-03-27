<?php

if(isset($_GET['start'])) die("Logging in");

// init session
session_start();
// for all user data
$user = array();
// store all (chart) scripts to include once html is loaded
$scripts = '';
// all chart colors
$chart_colors = 'fillColor: "rgba(220,220,220,0.5)", strokeColor: "rgba(0,0,0,0)", highlightFill: "rgba(10,188,136,.75)", highlightStroke: "rgba(0,0,0,0)", ';
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
			
			
			// maybe more things here
			
		}
		
		
	
		// store all user data in session
		$_SESSION['dnt_user'] = $user;
	}	
	
	report($user);
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
					<div class="row content">
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
						<div class="col-sm-12 title">
							<h3>Data Sequencing</h3>
						</div>
					</div>
					<div class="row content">
						<div class="col-sm-12">
							
							<p>Please wait while we access your data...</p>
							<p>Data acquisition successful. </p>
							
							
							<?php
							
							if (!isset($user['likes']) || count($user['likes']) < 5) {
								print '<p>You don\'t have enough likes to participate :-( (show user Brett\'s data or make up a test for them)</p>';
							} else {
								
								if (count($user['likes']) < 100) {
									print '<p>OK, it looks like you have enough data for us to evaluate. Analyzing your interests...</p>';
								} else if (count($user['likes']) >= 100) {
									print "<p>Wow, you have spent a lot of time on Facebook. Evaluating your data trail should be a breeze ...</p>";
								}
								
								
								report($user['likes']);
								
								
								// like timeline
								$like_timeline = array();
								
								// like categories
								$like_categories = array();
								
								// loop through likes
								foreach ($user['likes'] as $key => $arr){
									
									$time = strtotime($arr['created_time']);
									$month = date("Y", $time);
									
									if (isset($like_timeline[$month])){
										$like_timeline[$month]++;
									} else {
										$like_timeline[$month] = 1;
									}	
									
									
									if (isset($like_categories[$arr['category']])){
										$like_categories[$arr['category']]++;
									} else {
										$like_categories[$arr['category']] = 1;
									}
								}
								
								
								
								
								############### LIKE_TIMELINE ###############
								
								//arsort($like_timeline); // sort by frequency
								//report($like_timeline);
								// sort by key
								ksort($like_timeline); // sort by key
								
								$str = 'var bar_like_timeline_data = {';
								// make labels
								$str .= 'labels: [';
								$delimeter = '';
								foreach($like_timeline as $key => $val){
									$str .= $delimeter.'"'.$key.'"';
									$delimeter = ', ';
								}
								// make dataset
								$str .= '], datasets: [{';
								$str .= 'label: "Likes timeline", ';
								$str .= $chart_colors;
								$str .= 'data: [';
								$delimeter = '';
								foreach($like_timeline as $key => $val){
									$str .= $delimeter.$val;
									$delimeter = ', ';
								}
								$str .= ']}]};';
								$str .= "var ctx = document.getElementById('bar_like_timeline').getContext('2d');
										 var bar_like_timeline = new Chart(ctx).Bar(bar_like_timeline_data, bar_chart_options);";
								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<canvas id='bar_like_timeline' class='chart' width='400px' height='400'></canvas>
									   <div class='chart_caption'>Your likes over time</div>";
            
            
            
            
								############### LIKE_CATEGORIES ###############
								
								arsort($like_categories); // sort by frequency
								//report($like_categories);
								//ksort($like_categories); // sort by key
								
								
								
								$colors0 = array('#60FF6A','#A5FFDD','#91C2B5','#645075','#381F25');
								$colors1 = array('#170312','#33032F','#531253','#A0ACAD','#97D8B2');
								$c = 0;
								
								$str = 'var donut_like_category_data = [';
								$delimeter = '';
								foreach($like_categories as $key => $val){
									$str .= $delimeter."{";
									$str .= "value: $val, ";
									if ($c >= count($colors1)) $c = 0;
									$str .= "color: '". $colors1[$c++] ."', ";
									$str .= "highlight: '#09bc87', ";
									$str .= "label: '$key', ";
									$str .= "}";
									$delimeter = ', ';
								}
								
								
								
								
	/*						
								
								
								// make labels
								$str .= 'labels: [';
								$delimeter = '';
								foreach($like_categories as $key => $val){
									$str .= $delimeter.'"'.$key.'"';
									$delimeter = ', ';
								}
								// make dataset
								$str .= '], datasets: [{';
								$str .= 'label: "Like categories", ';
								$str .= $chart_colors;
								$str .= 'data: [';
								$delimeter = '';
								foreach($like_categories as $key => $val){
									$str .= $delimeter.$val;
									$delimeter = ', ';
								}
								*/
								
								$str .= '];';
								$str .= "var ctx = document.getElementById('donut_like_category').getContext('2d');
										 var donut_like_category = new Chart(ctx).Doughnut(donut_like_category_data, pie_chart_options);";
								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<canvas id='donut_like_category' class='chart' width='400px' height='400'></canvas>
									   <div class='chart_caption'>Your likes categories</div>";
            
            
            
            
          				
								arsort($like_categories);
								report($like_categories);
							}
							?>
							
							


							
							
							
						</div>
					</div>
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
					<div class="row content">
					
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
							
							<p>Proin venenatis justo ac sapien congue volutpat vitae eget mi. Phasellus at mattis arcu. Morbi at pulvinar dui. Aenean eget lacus sagittis lectus pharetra imperdiet. Proin vel massa semper, consequat augue vel, imperdiet lorem. Nam libero turpis, efficitur non quam ut, lacinia sagittis erat. Proin ac ornare felis, pulvinar tempor mi. Suspendisse molestie lectus risus, id auctor velit condimentum ut. Integer pharetra, nunc quis congue aliquam, velit sapien aliquet nisl, ut viverra sem massa eu risus. Nulla hendrerit, sapien vel euismod aliquam, erat dolor molestie neque, et accumsan magna sapien sit amet eros. Sed dictum volutpat libero sed pharetra. Aliquam volutpat mauris efficitur tortor pharetra euismod. Etiam dapibus porta nulla et finibus. Sed sed bibendum nisi, eget scelerisque est.</p>
							
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur ultrices metus, id ornare ligula finibus et. In auctor est tellus, vitae egestas quam congue sed. In at elit et dui maximus congue. Quisque sed nibh semper, lacinia lorem sed, tristique arcu. Phasellus at sem quis sapien sodales convallis. Vestibulum est massa, vestibulum non mauris commodo, egestas dapibus orci. Etiam ut quam eu arcu condimentum interdum. Nulla vitae enim leo. Sed quis dignissim nibh. Vestibulum maximus laoreet lectus eu aliquam. Donec in nisi rhoncus, tempus ligula eget, malesuada dui. Donec viverra vehicula ex, sed pulvinar risus aliquet sed.</p>
							
							<p>Proin venenatis justo ac sapien congue volutpat vitae eget mi. Phasellus at mattis arcu. Morbi at pulvinar dui. Aenean eget lacus sagittis lectus pharetra imperdiet. Proin vel massa semper, consequat augue vel, imperdiet lorem. Nam libero turpis, efficitur non quam ut, lacinia sagittis erat. Proin ac ornare felis, pulvinar tempor mi. Suspendisse molestie lectus risus, id auctor velit condimentum ut. Integer pharetra, nunc quis congue aliquam, velit sapien aliquet nisl, ut viverra sem massa eu risus. Nulla hendrerit, sapien vel euismod aliquam, erat dolor molestie neque, et accumsan magna sapien sit amet eros. Sed dictum volutpat libero sed pharetra. Aliquam volutpat mauris efficitur tortor pharetra euismod. Etiam dapibus porta nulla et finibus. Sed sed bibendum nisi, eget scelerisque est.</p>
					
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
					<div class="row content">
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
							
							<p>Proin venenatis justo ac sapien congue volutpat vitae eget mi. Phasellus at mattis arcu. Morbi at pulvinar dui. Aenean eget lacus sagittis lectus pharetra imperdiet. Proin vel massa semper, consequat augue vel, imperdiet lorem. Nam libero turpis, efficitur non quam ut, lacinia sagittis erat. Proin ac ornare felis, pulvinar tempor mi. Suspendisse molestie lectus risus, id auctor velit condimentum ut. Integer pharetra, nunc quis congue aliquam, velit sapien aliquet nisl, ut viverra sem massa eu risus. Nulla hendrerit, sapien vel euismod aliquam, erat dolor molestie neque, et accumsan magna sapien sit amet eros. Sed dictum volutpat libero sed pharetra. Aliquam volutpat mauris efficitur tortor pharetra euismod. Etiam dapibus porta nulla et finibus. Sed sed bibendum nisi, eget scelerisque est.</p>
							
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur ultrices metus, id ornare ligula finibus et. In auctor est tellus, vitae egestas quam congue sed. In at elit et dui maximus congue. Quisque sed nibh semper, lacinia lorem sed, tristique arcu. Phasellus at sem quis sapien sodales convallis. Vestibulum est massa, vestibulum non mauris commodo, egestas dapibus orci. Etiam ut quam eu arcu condimentum interdum. Nulla vitae enim leo. Sed quis dignissim nibh. Vestibulum maximus laoreet lectus eu aliquam. Donec in nisi rhoncus, tempus ligula eget, malesuada dui. Donec viverra vehicula ex, sed pulvinar risus aliquet sed.</p>
							
							<p>Proin venenatis justo ac sapien congue volutpat vitae eget mi. Phasellus at mattis arcu. Morbi at pulvinar dui. Aenean eget lacus sagittis lectus pharetra imperdiet. Proin vel massa semper, consequat augue vel, imperdiet lorem. Nam libero turpis, efficitur non quam ut, lacinia sagittis erat. Proin ac ornare felis, pulvinar tempor mi. Suspendisse molestie lectus risus, id auctor velit condimentum ut. Integer pharetra, nunc quis congue aliquam, velit sapien aliquet nisl, ut viverra sem massa eu risus. Nulla hendrerit, sapien vel euismod aliquam, erat dolor molestie neque, et accumsan magna sapien sit amet eros. Sed dictum volutpat libero sed pharetra. Aliquam volutpat mauris efficitur tortor pharetra euismod. Etiam dapibus porta nulla et finibus. Sed sed bibendum nisi, eget scelerisque est.</p>
					
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