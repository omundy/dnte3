<?php ob_start(); 

// FB namespaces (cannot be put in conditional statement)
/*
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
*/

$control['show_alt_data_reason'] = '';
$control['fb_data_problems'] = false;


$control['fb_error'] = '';

// store all scripts to include once html is loaded
$scripts = '';
$scripts .= "var step = '". $control['step'] ."';\n ";
$scripts .= "var lang = '". $control['lang'] ."';\n ";
$scripts .= "var player = '". $control['player'] ."'; \n\n";

// init session
session_set_cookie_params(3600,"/");
session_start();


if ($control['step'] == 'logout'){
	if ( isset($_SESSION['dnt_user']) ){
		unset($_SESSION['dnt_user']);
	}
	header('Location: '.$control['lang'].'/load_data', true, 303);
	exit();
}


// for all user data
$user = array();

// global functions
require_once('inc/om_functions.php');

// CHECK IF THEY ARE LOGGED INTO APP
require_once('inc/config.php');
require_once('inc/fb_functions.php');
require_once('inc/fb_api_calls.php');
require_once('inc/facebook-php-sdk-v4/autoload.php');
/*
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
*/

// attempt to get sample data
if ( $control['step'] == 'load_data_sample') {
    
	$control['show_alt_data_reason'] = '!!';
	
    /*
	// use sample user data
	$json = file_get_contents('inc/default_user.json');
	$user = (Array)json_decode($json,true);
	$user['fb_data_problems'] = true;
    */
	// make that the user
	$_SESSION['dnt_user'] = $user;

	//report($user);
	//exit();
	header('Location: '.$control['lang'].'/one', true, 303);
	ob_end_clean();
	exit();
} elseif ( $control['step'] != 'load_data_fb') {
	
	// check if all user data is already in a session
	if (
        isset($_SESSION['dnt_user'])
        && (
            !in_array($control['step'], array('one', 'two', 'three')) 
            || !empty($_SESSION['dnt_user']['big5'])
        )
    ) {
		
		$control['dnt_user_session'] = 'previous dnt_user session FOUND';
		$user = $_SESSION['dnt_user'];
		
        if ( isset($user['big5']) )
            $control['data_set'] = 'user';
        else
            $control['data_set'] = 'sample';
		
	} else {

    	$json = file_get_contents('inc/default_session_user_'.$control['lang'].'.json');
    	$user = (Array)json_decode($json,true);
        if (isset($_SESSION['dnt_user']['err']))
            $user['err'] = $_SESSION['dnt_user']['err'];

		$control['dnt_user_session'] = 'previous dnt_user session NOT FOUND';
        $control['data_set'] = 'sample';
		
	}
    
}