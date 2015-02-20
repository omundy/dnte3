<?php

global $session, $fb_login_state, $login_btn;
$fb_login_state = false;
$q = (isset($_GET['q'])) ? $_GET['q']: 'profile';
$offset = 0;
$limit = 100;

include_once('fb_login.php');
include_once('inc/fb_api_calls.php');
include_once('inc/fb_functions.php');
include_once('inc/fb_wrappers.php');

// $fb_login_state should be set before proceeding
if ($fb_login_state){
	// so store permissions
	$permissions = fb_get_permissions();

	// or maybe they are trying to remove all permissions
	if (isset($_GET['revoke']) && isset($_GET['q'])){
		if ($_GET['q'] == 'all'){
			fb_delete_permissions();
			header( 'Location: ./app.php' );
		} else {
			// or a specific permission
			fb_delete_permissions($_GET['revoke']);
			header( 'Location: ./app.php?q='.$_GET['q'] );
		}
	}
}

include_once('templates/header.php');

?>

<div class="container">
	<div class="row">
		<?php include_once('templates/sidebar.php'); ?>
		<div class="col-md-10">

<?php

if ($fb_login_state){

	if ($q == "feed") {
		$feed_text = "";
		$arr = fb_generic_api_call($q);
		if (!isset( $arr['error']) ) {
			print '<pre>';
			foreach( $arr['data'] as $key => $val ) {
				if ( isset( $val->message ) ) {
					$feed_text .= $val->message . " ";
				}
				if ( isset( $val->description ) ) {
					$feed_text .= $val->description . " ";
				}
			}
			print($feed_text);
			print '</pre>';
		} else {
			print $arr['error'];
		}
	} else if ($q == "likes") {	
		
		// get all likes and likeids		
		$likes = array();
		$likeIds = array();
		$arr = fb_generic_api_call($q);
		if (!isset( $arr['error']) ) {
			foreach( $arr['data'] as $key => $val ) {
				$likes[$val->id] = array('id'=> $val->id, 'name'=> $val->name, 'category'=> $val->category);
				$likeIds[] = $val->id;
			}
			
			print '<h3>Magic sauce output</h3><pre>';
			
			include('inc/papi2-client-php/example.php');
			$predictions = get_prediction('return');
			
			print_r($predictions);
			print '</pre>';
			
			print '<h3>$likes array only</h3><pre>';
			print_r($likes);
			print '</pre>';
			print '<h3>Everything</h3><pre>';
			print_r($arr);
			print '</pre>';
		} else {
			print $arr['error'];
		}
	} else if (array_key_exists($q,$fb_data) ) {
		$arr = fb_generic_api_call($q);
		if (!isset($arr['error'])){
			print '<pre>';
			print_r($arr);
			print '</pre>';
		} else {
			print $arr['error'];
		}
	} else if ($q == '/me'){
		try {
			$request = new FacebookRequest($session,'GET',$q."/?offset=$offset&limit=$limit");
			$response = $request->execute();
			$arr = $response->getGraphObject()->asArray();
			print_r($arr);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}

	} else if (strpos($q,'/me/') !== false){

		$str = "";
		$arr = array();
		try {
			$request = new FacebookRequest($session,'GET',$q."/?offset=$offset&limit=$limit");
			$response = $request->execute();
			$arr2 = $response->getGraphObject()->asArray();
			$str .= get_tags_likes($arr2);
			$arr2d = $arr2['data'];
			$arr = array_merge($arr,$arr2d);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}

		// do another one
		if (isset($arr2['paging']->cursors)) {
			try {
				$request = new FacebookRequest($session,'GET',$q.'/?offset=100&limit=100');
				$response = $request->execute();
				$arr2 = $response->getGraphObject()->asArray();
				$str .= get_tags_likes($arr2);
				$arr2d = $arr2['data'];
				$arr = array_merge($arr,$arr2d);
			} catch (Exception $e) {
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}


		print '<h3>Tags ('. substr_count($str,' ') .')</h3>';
		print '<form>';
		print '<textarea rows="12" class="form-control">'. $str .'</textarea>';
		print '</form>';

		print '<h3>JSON</h3>';

		print '<pre>';
		print_r($arr);
		print '</pre>';




	} else if ($q == 'photo'){
		// Graph API to request profile picture
		$request = new FacebookRequest( $session, 'GET', '/me/picture?type=large&redirect=false' );
		$response = $request->execute();
		// Get response as an array
		$picture = $response->getGraphObject()->asArray();
		print_r( $picture );
		print '<img src="'. $picture['url'] .'">';

	}
}

include_once('templates/footer.php');


?>

