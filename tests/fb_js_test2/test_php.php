<?php

$token = $_GET['token'];
print "TOKEN: $token";


session_start();
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

include_once('inc/fb_config.php');
FacebookSession::setDefaultApplication($login['app_id'],$login['app_secret']);


//$helper = new FacebookRedirectLoginHelper('test.php');
//$helper = new FacebookJavaScriptLoginHelper();

// Use the login url on a link or button to redirect to Facebook for authentication


$helper = new FacebookJavaScriptLoginHelper();
try {
	$session = new FacebookSession($token);
  //print_r($session);
} catch(FacebookRequestException $ex) {
  // When Facebook returns an error
} catch(\Exception $ex) {
  // When validation fails or other local issues
}
if ($session) {
  // Logged in
  //print_r($session);
}

$request = new FacebookRequest($session, 'GET', '/me');
$response = $request->execute();
$graphObject = $response->getGraphObject();
print "<pre>";
print_r($graphObject);
print "</pre>";


?>

