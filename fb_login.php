<?php

/**
 *	fb_login.php - Confirms user:
 *
 *	1. Is logged into FB
 *	2. Has given permission to our app
 *
 *	Otherwise attempts to route them to do so.
 */

global $session, $fb_login_state, $login_btn;

// start a session for user
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

// requested default permissions for the app (optional)
$permissions = array('public_profile');

// login helper with redirect_uri
$helper = new FacebookRedirectLoginHelper($login['login_url']);

// check if an access token exists
if(isset($_SESSION['access_token'])) {
			
	// store FacebookSession object
    $session = new FacebookSession($_SESSION['access_token']);

	// and validate the session
	try {
		$session->validate();
	} catch (FacebookRequestException $ex) {
		// session not valid, Graph API returned an exception with the reason.
		//echo $ex->getMessage();
		// set $session to false to prompt for login below
		$session = false;
	} catch (\Exception $ex) {
		// Graph API returned info, but it may mismatch the current app or have expired.
		//echo $ex->getMessage();
		// set $session to false to prompt for login below
		$session = false;
	}
}

// if they are not logged in or if session didn't validate
if ($session == false){
	
	// delete our current access token
    unset($_SESSION['access_token']);
    
    // try to connect and get new token
    try {
        $session = $helper->getSessionFromRedirect();
        if($session){                  
            $_SESSION['access_token'] = $session->getToken();
		}
    } catch(FacebookRequestException $ex) {
        // When Facebook returns an error
    } catch(Exception $ex) {
        // When validation fails or other local issues
    }
}




// logged in
if (isset($session) && $session != false) {
	$_SESSION['fb_token'] = $session->getToken();

	// Create the logout URL (logout page should destroy the session)
	$logoutURL = $helper->getLogoutUrl( $session, '?logout=true' );
	$login_btn = '<a class="btn btn-default navbar-btn btn-xs" href="./fb_logout.php">logout</a>';
	$fb_login_state = true;

} else {
	// Get login URL
	$loginUrl = $helper->getLoginUrl( $permissions );
	$login_btn = '<a class="btn btn-default navbar-btn btn-xs" href="' . $loginUrl . '">login</a>';
	$fb_login_state = false;
}


?>