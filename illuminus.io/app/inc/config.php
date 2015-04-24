<?php 

$is_dev = false;

if ($is_dev) {
    $login = array(
    	'app_id' => '810225145731195',
    	'app_secret' => '652de52346bc5af39eb520142ffb610d',
    	'login_url' => 'http://localhost:8888/',
        'upian_api_url' => 'https://preprod-crm.donottrack-doc.com',
        'base_url' => 'http://unblankapp.com/donottrack/'
    );    
} else {
    $login = array(
        'app_id' => '761116317308745',
        'app_secret' => 'f084368f5ab3b3e5e63ccb8cd9645338',
        'login_url' => 'http://dnt.dev/illuminus.io/app/',
        'upian_api_url' => 'https://preprod-crm.donottrack-doc.com',
        'base_url' => 'https://preprod-episode3.donottrack-doc.com/fbapp/app/',
    );
}