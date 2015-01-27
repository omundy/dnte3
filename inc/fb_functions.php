<?php

use Facebook\FacebookRequest;

/**
 *	Retrieves and stores all FB permissions for given user w/this app
 *	@param $scope String - if set then will return a single permission (e.g. 'user_birthday')
 */
function fb_get_permissions($scope=''){
	global $session,$fb_data;
	$arr = array();
	// scope is all
	$q = "/me/permissions";
	// narrow scope?
	if ($scope != ''){
		$q .= "/$scope";
	} else {
		// include scopes that don't require permissions
		foreach($fb_data as $a){
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




?>