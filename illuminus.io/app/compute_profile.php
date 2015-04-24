<?php

session_set_cookie_params(3600,"/");
session_start();

require_once('inc/om_functions.php');
require_once('inc/big5_helper.php');


if (isset($_POST['gender']) && in_array($_POST['gender'], array('male', 'female', 'homme', 'femme', 'männlich', 'weiblich')))
    $genre = $_POST['gender'];
else
    $genre = 'NOT DECLARED';

if (!ctype_digit($_POST['id']))
    die;

if (!filter_var($_POST['picture'], FILTER_VALIDATE_URL) === false) {
    $picture = $_POST['picture'];
} else 
    $picture = null;

if (isset($_POST['birthday']) && preg_match('/^[0-9\/]+$/i', $_POST['birthday']))
    $age = calculate_age($_POST['birthday']);
else
    $age = 'NOT DECLARED';

$user = array();
$user['gender'] = $genre;
$user['id'] = $_POST['id'];
$user['name'] = $_POST['name'];
$user['picture'] = $picture;
$user['age'] = $age;

if (isset($_POST['likes']) && is_array($_POST['likes']))
    $user['likes'] = $_POST['likes'];

$in_session = fbUserToSessionUser($user);
$_SESSION['dnt_user'] = $in_session;

$res = array();
if (!empty($in_session['big5'])) {
    $big5 = $in_session['big5'];
    $res['personality'] = $in_session['big5'];    
}

if ( count($in_session['like_categories']) ) {
    $vals = array_keys($in_session['like_categories']);
    $res['interest'] = array_shift($vals);
    if ( ($res['interest'] == 'Other') && ( count($in_session['like_categories']) > 1 )  )
        $res['interest'] = array_shift($vals);
}

echo json_encode($res);