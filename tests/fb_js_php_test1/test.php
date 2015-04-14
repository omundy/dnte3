<?php


session_start();
//NO COMPOSER
require 'facebook-php-sdk-v4-4.0-dev/autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookJavaScriptLoginHelper;

FacebookSession::setDefaultApplication('761116317308745', 'f084368f5ab3b3e5e63ccb8cd9645338');

$helper = new FacebookJavaScriptLoginHelper();
try {
   $session = $helper->getSession();
} catch(FacebookRequestException $ex) {
  // When Facebook returns an error
} catch(\Exception $ex) {
  // When validation fails or other local issues
}
if (isset($session)) {
  // Logged in.
  print_r($session);
}

?>