<?php
// include fb_login
include_once('fb_login.php');
use Facebook\FacebookRequest;
include_once('inc/fb_api_calls.php');
include_once('inc/fb_functions.php');


if (isset($loggedin)){
	$permissions = fb_get_permissions();

	if (isset($_GET['revoke']) && isset($_GET['q'])){
		if ($_GET['q'] == 'all'){
			fb_delete_permissions();
			header( 'Location: ./app.php' );
		} else {
			fb_delete_permissions($_GET['revoke']);
			header( 'Location: ./app.php?q='.$_GET['q'] );
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>dnt3</title>
<style>
img.user_thumb { height:30px; }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<?php



/**
 *	Generic API call
 */
function fb_generic_api_call($name){
	global $session, $fb_data, $permissions, $login;

	// update permissions
	$permissions = fb_get_permissions();
	print '<pre>';
	print_r($permissions);
	//print_r($fb_data);
	print '</pre>';

	// check for permission
	if (isset($permissions[$name]) && $permissions[$name] == 'granted' ||
		isset($permissions[$fb_data[$name]['scope']]) && $permissions[$fb_data[$name]['scope']] == 'granted'){
		$permission =  '<button type="button" class="btn btn-success btn-xs disabled">'. $fb_data[$name]['scope'] .": permission granted</button> <a href='./app.php?revoke=".$fb_data[$name]['scope']."&q=$name'>revoke permission</a>";
	} else {
		$permission =  '<button type="button" class="btn btn-danger btn-xs disabled">'. $fb_data[$name]['scope'] .": permission not granted or revoked</button>";
		$permission .= ' <a href="https://www.facebook.com/dialog/oauth?client_id='.$login['app_id'].'&redirect_uri='.$login['login_url'].'?q='.$fb_data[$name]['name'].'&auth_type=rerequest&scope='. $fb_data[$name]['scope'] .'">enable permission</a>';
	}

	$report = "<h3>". $fb_data[$name]['name'] ."</h3>";
	$report .= "call: ". $fb_data[$name]['call'] ."<br>";
	$report .=  "scope: $permission<br>";
	$report .=  "desc: ". $fb_data[$name]['desc'] ."<br>";
	$report .=  "<br>";
	//$report .=  "$permission<br><br>";
	print $report;

	// define query
	$q = $fb_data[$name]['call'];
	$offset = 0;
	$limit = 100;
	try {
		$request = new FacebookRequest($session,'GET',$q."/?offset=$offset&limit=$limit");
		$response = $request->execute();
		$arr = $response->getGraphObject()->asArray();

		/*
		// store original array
		$arr2 = $arr;

		// handle any pagination
		if (isset($arr2['paging']->next) && $arr2['paging']->next != '') {
			$request = new FacebookRequest($session,'GET',$q.'/?offset=100&limit=100');
			$response = $request->execute();
			$arr3 = $response->getGraphObject()->asArray();
			//$str .= get_tags_likes($arr2);
			$arr2d = $arr2['data'];
			$arr = array_merge($arr,$arr2d);
		}
			*/

		return $arr;
	} catch (Exception $e) {
		return array('error' => $e->getMessage());
	}



}


?>


<div class="container">
	<div class="row">
		<div class="col-md-10">
		</div>
		<div class="col-md-2">

			<?php if (isset($loggedin)){ ?>
			<img src="<?php print fb_photo_thumb_url();?>" class="user_thumb">
			<?php } ?>
			<?php print $login_btn; ?>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-2">

			<?php
				foreach($fb_data as $key => $a){

//print_r($a);


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

print $msg;

if (isset($_GET['q'])) {
	$q = $_GET['q'];
} else {
	$q = 'profile';
}



$offset = 0;
$limit = 100;

if (isset($loggedin)){

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





/**
 *	Get tags from Likes
 */
function get_tags_likes($arr){
	$str = '';
	if (count($arr) > 0){
		foreach($arr['data'] as $obj){
			$str .= ' '. str_replace('/',' ',$obj->category);
			$str .= ' '. str_replace('/',' ',$obj->name);
		}
	}
	return $str;
}


/**
 *	Return user thumb url
 */
function fb_photo_thumb_url(){
	global $session;
	$request = new FacebookRequest(
		$session,'GET','/me/picture',
		array (
			'redirect' => false,
			'height' => '200',
			'type' => 'normal',
			'width' => '200',
		)
	);
	$response = $request->execute();
	$graphObject = $response->getGraphObject()->asArray();
	return $graphObject['url'];
}






?>




		</div>

	</div>

</div>
</body>
</html>