<?php

/**
 *	fb_login.php - Confirms user:
 *
 *	1. Is logged into FB
 *	2. Has given permission to our app
 *
 *	Otherwise attempts to route them to do so.
 *
 */

// required for library
session_start();

// include fb
require_once './facebook-php-sdk-v4/autoload.php';
use Facebook\FacebookSession;
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

// init SDK
include_once('fb_config.php');
//$login_url = 'http://owenmundy.local/owenmundy.com/work/dnt/dnt3/app.php';
$login_url = 'http://owenmundy.com/work/dnt/dnt3/app.php';
FacebookSession::setDefaultApplication($app_id,$app_secret);

// requested permissions for the app - optional
$permissions = array('public_profile','user_likes','email');

// login helper with redirect_uri
$helper = new FacebookRedirectLoginHelper($login_url);






$msg = '';



// check if a $_SESSION exists
if (isset($_SESSION) && isset($_SESSION['fb_token'])) {
	
	//print '<p>$_SESSION exists';
	
	// create new session from saved access_token
	$session = new FacebookSession($_SESSION['fb_token']);
		
	// validate the session:
	try {
		if (!$session->validate()) {
			print "<br>session doesn't validate: ";
			$session = null;
		}
	} catch (FacebookRequestException $ex) {
		// session not valid, Graph API returned an exception with the reason.
		echo $ex->getMessage();
	} catch (\Exception $ex) {
		// Graph API returned info, but it may mismatch the current app or have expired.
		print "<br>exception: ";
		echo $ex->getMessage();
	}
		
	
} else {
	// No session exists
	$msg .= "<p>no \$_SESSION exists, attempt login";
	try {
		$session = $helper->getSessionFromRedirect();
	} catch (FacebookRequestException $ex) {
		// When Facebook returns an error
	} catch (Exception $ex) {
		// When validation fails or other local issues
		echo $ex->message;
	}
}	
	
	
// show session data
//print "<p>";
//print_r($_SESSION);
	
	
$login_btn = 'login';


// logged in
if (isset($session)) {
	//print "<p>session: ". $_SESSION['fb_token'];
	
	$_SESSION['fb_token'] = $session->getToken();	
	
	// Create the logout URL (logout page should destroy the session)
	//$logoutURL = $helper->getLogoutUrl( $session, '?logout=true' );
	$login_btn = '<a class="btn btn-default navbar-btn" href="./fb_logout.php">logout</a>';
	
	$loggedin = true;
	
} else {
	$msg .= '<p>no $session';
	
	// Get login URL
	$loginUrl = $helper->getLoginUrl( $permissions );
	$login_btn = '<a class="btn btn-default navbar-btn" href="' . $loginUrl . '">login</a>';
	
}

// show session data
//print "<p>";
//print_r($_SESSION);


?>