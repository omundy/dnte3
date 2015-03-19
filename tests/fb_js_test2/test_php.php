<?php

//$token = $_POST['token'];
//print $token;


session_start();
//NO COMPOSER
require '../facebook-php-sdk-v4-4.0-dev/autoload.php';
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

FacebookSession::setDefaultApplication('761116317308745', 'f084368f5ab3b3e5e63ccb8cd9645338');

//$helper = new FacebookRedirectLoginHelper('test.php');
$helper = new FacebookJavaScriptLoginHelper();

// Use the login url on a link or button to redirect to Facebook for authentication


$helper = new FacebookJavaScriptLoginHelper();
try {
  $session = $helper->getSession();
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
print_r($graphObject);


?>