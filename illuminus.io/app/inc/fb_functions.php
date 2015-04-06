<?php

use Facebook\FacebookRequest;




/**
 *	Generic API call (works for likes only)
 */
function fb_generic_api_call($name){
	global $session, $fb_api_calls;


	// define query
	$q = '/me/likes';
	$offset = 0;
	$limit = 100;
	$exit = false;
	$arr = array('data'=>array());
	
	// start paging loop and continue until 'error' isset
	while ($exit == false){
		

		// get data
		$a = fb_call_paging($q,$offset,$limit);
		
		//report($a);
		
		
		if (isset($a['data'])){


			

			foreach($a['data'] as $val){
				$arr['data'][] = $val;
			}
		
	
			if (isset($a['error'])){
				report('ERROR: '. $a['error']);
				$exit = true;
				return $a;
			} else if (isset($a['paging']->next)){
				//report('NEXT: '. $a['paging']->next);
				$offset += $limit;
			} else {
				$exit = true;
			}
			
			
		} else {
			$exit = true;
		}
	}

	/**/
	//print count($arr['data']);
	//report($arr);
	
	return $arr;

	
}

/**
 *	Basic FB call for paging
 */
function fb_call_paging($q,$offset=10,$limit=100){
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
 *	Basic FB call 
 */
function fb_call_basic($q){
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
 *	Retrieves and stores all FB permissions for given user w/this app
 *	@param $scope String - if set then will return a single permission (e.g. 'user_birthday')
 */
function fb_get_permissions($scope=''){
	global $session,$fb_api_calls;
	$arr = array();
	// scope is all
	$q = "/me/permissions";
	// narrow scope?
	if ($scope != ''){
		$q .= "/$scope";
	} else {
		// include scopes that don't require permissions
		foreach($fb_api_calls as $a){
			if ($a['scope'] == 'granted'){
				$arr[$a['name']] = 'granted';
			}
		}
	}
	// get permission(s)
	try {
		$request = new FacebookRequest($session,'GET',$q);
		$response = $request->execute();
		$resp_arr = $response->getGraphObject()->asArray();
		//print_r($resp_arr);

		// store each permission as it's key => value
		foreach($resp_arr as $obj){
			$arr[$obj->permission] = $obj->status;
		}
		return $arr;
	} catch (Exception $e) {
		return array('error' => $e->getMessage());
	}
}

/**
 *	Deletes one or all FB permissions for given user w/this app
 *	@param $scope String - if set then will DELETE a single permission (e.g. 'user_birthday')
 */
function fb_delete_permissions($scope=''){
	global $session;
	$q = "/me/permissions";
	if ($scope != ''){
		$q .= "/$scope";
	}
	// delete permission(s)
	try {
		$request = new FacebookRequest($session,'DELETE',$q);
		$response = $request->execute();
		$resp_arr = $response->getGraphObject()->asArray();
		return true;
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
			'width' => '200'
		)
	);
	$response = $request->execute();
	$graphObject = $response->getGraphObject()->asArray();
	return $graphObject['url'];
}



?>