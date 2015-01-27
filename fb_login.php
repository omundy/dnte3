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

global $session, $fb_login_state, $login_btn;

session_start();

require_once 'inc/facebook-php-sdk-v4/autoload.php';
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

include_once('inc/fb_config.php');

FacebookSession::setDefaultApplication($login['app_id'],$login['app_secret']);

// requested permissions for the app - optional
$permissions = array('public_profile');

// login helper with redirect_uri
$helper = new FacebookRedirectLoginHelper($login['login_url']);

if (isset($_SESSION) && isset($_SESSION['fb_token'])) {
	$session = new FacebookSession($_SESSION['fb_token']);
	try {
		$session->validate();
	} catch (FacebookRequestException $ex) {
		$session = null;
		$_SESSION = null;
		echo $ex->getMessage();
	}

} else {
	try {
		$session = $helper->getSessionFromRedirect();
	} catch (FacebookRequestException $ex) {
		echo $ex->message;
	}
}


// logged in
if (isset($session)) {
	$_SESSION['fb_token'] = $session->getToken();

	// Create the logout URL (logout page should destroy the session)
	$logoutURL = $helper->getLogoutUrl( $session, '?logout=true' );
	$login_btn = '<a class="btn btn-default navbar-btn btn-xs" href="./fb_logout.php">logout</a>';
	$fb_login_state = true;

} else {
	// Get login URL
	$loginUrl = $helper->getLoginUrl( $permissions );
	$login_btn = '<a class="btn btn-default navbar-btn btn-xs" href="' . $loginUrl . '">login</a>';

}


?>