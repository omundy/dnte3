<?php

global $session, $fb_login_state, $login_btn;
$fb_login_state = false;

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
		<div class="col-md-10">
		</div>
		<div class="col-md-2">
			<?php if($fb_login_state): ?>
				<img src="<?php print fb_photo_thumb_url();?>" class="user_thumb">
			<?php endif; ?>
			<?php echo $login_btn; ?>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-2">

			<?php
				foreach($fb_data as $key => $a){

					if (isset($permissions[$a['scope']]) && $permissions[$a['scope']] == 'granted' ||
							isset($permissions[$a['name']]) && $permissions[$a['name']] == 'granted'){
						$title = 'permission is granted';
						print '<span title="'.$title.'" class="circle success"></span> ';
					} else {
						$title = 'NO permissions granted';
						print '<span title="'.$title.'" class="circle danger"></span> ';
					}
					print '<a title="'.$title.'" href="./app.php?q='.$a['name'].'" >'.$a['name'].'</a> ';
					if (isset($a['approval'])){
						print '<span class="text-danger" title="this permission requires approval!"><b>!!!</b></span> ';
					}
					print '<br>';
				}

				print "<br><br><br><a href='./app.php?revoke=true&q=all'>revoke all</a>";

			?>
		</div>
		<div class="col-md-10">


<?php

if (isset($_GET['q'])) {
	$q = $_GET['q'];
} else {
	$q = 'profile';
}



$offset = 0;
$limit = 100;

if ($fb_login_state){

	if (array_key_exists($q,$fb_data)){
		$arr = fb_generic_api_call($q);
		if (!isset($arr['error'])){
			print '<pre>';
			print_r($arr);
			print '</pre>';
		} else {
			print $arr['error'];
		}
	/*
	} else if ($q == '/me/photos'){
		$arr = fb_generic_api_call($q);
		if (!isset($arr['error'])){
			print_r($arr);
		} else {
			print $arr['error'];
		}

	} else if ($q == '/me/permissions'){
		$arr = fb_generic_api_call($q);
		if (!isset($arr['error'])){
			print_r($arr);
		} else {
			print $arr['error'];
		}
	*/



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


		/*
		// paging, not working yet

		function paging($arr){
			global $session;
			if (isset($arr['paging']->cursors)) {
				$arr2 = (array)$arr['paging']->next;
				$url = $arr2[0];
				print $url;
				print 'hi';
				$request = new FacebookRequest($session,'GET',$q.'/?offset=100&limit=100');
				$response = $request->execute();
				$arr3 = $response->getGraphObject()->asArray();
				print_r($arr3);
			}
		}
		paging($arr);

		*/



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

