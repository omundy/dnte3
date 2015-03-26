<?php

use Facebook\FacebookRequest;

/**
 *	Generic API call
 */
function fb_generic_api_call($name){
	global $session, $fb_api_calls, $permissions, $login, $fb_login_state;

	$permissions = fb_get_permissions();
	//print_r($permissions);
	
	
	
	
	// check for permission
	if (isset($permissions[$name]) && $permissions[$name] == 'granted' || isset($permissions[$fb_api_calls[$name]['scope']]) && $permissions[$fb_api_calls[$name]['scope']] == 'granted') {
		$permission_html =  '<button type="button" class="btn btn-success btn-xs disabled">';
		$permission_html .=  $fb_api_calls[$name]['scope'] .": permission granted</button> ";
		$permission_html .=  "<a href='./app.php?revoke=".$fb_api_calls[$name]['scope']."&q=$name'>revoke permission</a>";
		$proceed = true;
	} else {
		$permission_html =  '<button type="button" class="btn btn-danger btn-xs disabled">';
		$permission_html .= $fb_api_calls[$name]['scope'] .": permission not granted or revoked</button>";
		$permission_html .= ' <a href="https://www.facebook.com/dialog/oauth?client_id='.$login['app_id'].'&redirect_uri='.$login['login_url'].'?q='.$fb_api_calls[$name]['name'].'&auth_type=rerequest&scope='. $fb_api_calls[$name]['scope'] .'">enable permission</a>';
		$proceed = false;
	}
	$report = "<h3>". $fb_api_calls[$name]['name'] ."</h3>";
	$report .= "call: ". $fb_api_calls[$name]['call'] ."<br>";
	$report .=  "scope: $permission_html<br>";
	$report .=  "desc: ". $fb_api_calls[$name]['desc'] ."<br>";
	$report .=  "<br>";
	print $report;
	

	
	if ($proceed == true){
		// define query
		$q = $fb_api_calls[$name]['call'];
		$offset = 0;
		$limit = 100;
		$exit = false;
		$arr = array('data'=>array());

		// adding paging just for likes
		if ($q == '/me/likes'){
			
			// start paging loop and continue until 'error' isset
			while ($exit == false){
				
				// get data
				$a = fb_call_paging($q,$offset,$limit);
				
				if (isset($a['data'])){
		
					foreach($a['data'] as $val){
						$arr['data'][] = $val;
					}
				
		
		
		
		/*
		print "<pre>";
		print_r($a);
		print "</pre>";
*/
					
					
					
					
			
					if (isset($a['error'])){
						$exit = true;
						return $a;
					} else if (isset($a['paging']->next)){
						//print_r($a['paging']->next);
						$offset += $limit;
					} else {
						$exit = true;
					}
					/**/
					
				} else {
					$exit = true;
				}
			}
		} else {
			$arr = fb_call_basic($q,$offset,$limit);
		}
		/*
		print count($arr['data']);
		print "<pre>";
		print_r($arr);
		print "</pre>";
		*/
		return $arr;
	} else {
		return false;
	}
	
}

/**
 *	Basic FB call for paging
 */
function fb_call_paging($q,$offset=0,$limit=100){
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
 *	Nothing but the basics, ma'am
 */
function fb_call_basic($q,$offset=0,$limit=100){
	global $session;
	try {
		$request = new FacebookRequest($session,'GET',$q);
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