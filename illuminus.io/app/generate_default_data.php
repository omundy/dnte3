<?php

require_once('inc/om_functions.php');
require_once('inc/big5_helper.php');

$json = file_get_contents('inc/default_user.json');
//$json = file_get_contents('inc/margaux.json');
$data = (Array)json_decode($json,true);

$user = array();

$user['gender'] = $data['me']['gender'];
$user['id'] = $data['me']['id'];
$user['name'] = $data['me']['name'];
$user['picture'] = $data['me']['photo'];
$user['age'] = ($data['me']['birthday'] ? calculate_age($data['me']['birthday']) : 'NOT DECLARED');
$user['likes'] = isset($data['likes']) ? $data['likes'] : null;

/*
$user['gender'] = $data['gender'];
$user['id'] = $data['id'];
$user['name'] = $data['name'];
$user['picture'] = $data['picture'];
$user['age'] = ($data['birthday'] ? calculate_age($data['me']['birthday']) : 'NOT DECLARED');
$user['likes'] = isset($data['likes']) ? $data['likes'] : null;
*/

$in_session = fbUserToSessionUser($user);

file_put_contents('inc/default_session_user.json', json_encode($in_session));
//file_put_contents('inc/margaux_session.json', json_encode($in_session));

echo 'Done';