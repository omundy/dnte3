<?php

use Facebook\FacebookRequest;

/**
 *	Generic API call
 */
function fb_generic_api_call($name){
	global $session, $fb_data, $permissions, $login, $fb_login_state;

	$permissions = fb_get_permissions();

	// check for permission
	if (isset($permissions[$name]) && $permissions[$name] == 'granted' ||
		isset($permissions[$fb_data[$name]['scope']]) && $permissions[$fb_data[$name]['scope']] == 'granted'){
		$permission_html =  '<button type="button" class="btn btn-success btn-xs disabled">'. $fb_data[$name]['scope'] .": permission granted</button> <a href='./app.php?revoke=".$fb_data[$name]['scope']."&q=$name'>revoke permission</a>";
	} else {
		$permission_html =  '<button type="button" class="btn btn-danger btn-xs disabled">'. $fb_data[$name]['scope'] .": permission not granted or revoked</button>";
		$permission_html .= ' <a href="https://www.facebook.com/dialog/oauth?client_id='.$login['app_id'].'&redirect_uri='.$login['login_url'].'?q='.$fb_data[$name]['name'].'&auth_type=rerequest&scope='. $fb_data[$name]['scope'] .'">enable permission</a>';
	}

	$report = "<h3>". $fb_data[$name]['name'] ."</h3>";
	$report .= "call: ". $fb_data[$name]['call'] ."<br>";
	$report .=  "scope: $permission_html<br>";
	$report .=  "desc: ". $fb_data[$name]['desc'] ."<br>";
	$report .=  "<br>";
	print $report;

	// define query
	$q = $fb_data[$name]['call'];
	$offset = 0;
	$limit = 100;
	$exit = false;
	$arr = array('data'=>array());
	
	// adding paging just for likes
	if ($q == '/me/likes'){
		// paging
		while ($exit == false){
			$a = fb_call($q,$offset,$limit);
			
			if (isset($a['data'])){
				foreach($a['data'] as $val){
					$arr['data'][] = $val;
				}
		
				if (isset($a['error'])){
					return $a;
				} else if (isset($a['paging']->next)){
					$offset += $limit;
				} else {
					$exit = true;
				}
			}
		}
	} else {
		$arr = fb_call($q,$offset,$limit);
	}
	return $arr;
}

function fb_call($q,$offset,$limit){
	global $session;
	try {
		$request = new FacebookRequest($session,'GET',$q."/?offset=$offset&limit=$limit");
		$response = $request->execute();
		$arr = $response->getGraphObject()->asArray();
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