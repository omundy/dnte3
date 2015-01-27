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