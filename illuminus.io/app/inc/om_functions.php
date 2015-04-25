<?php


// http or https?
function request_protocol(){
	$isSecure = false;
	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
	    $isSecure = true;
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
	    $isSecure = true;
	}
	elseif ($_SERVER['SERVER_PORT'] == 443) {
	    $isSecure = true;
	}
	elseif ($_SERVER['HTTP_HOST'] == 'illuminus.io') {
	    $isSecure = true;
	}
	return $isSecure ? 'https' : 'http';
}



/**
 *	Reporter
 */
function report($d,$h=110){
	print "<textarea style='width:100%; height:$h; color:#fff; background:rgba(50,50,50,.5); font-size:80%; font: 10px/12px monospace; position:relative; '>";
	//print "<pre>";
	print_r($d);
	//print "</pre>";
	print "</textarea>";
}


/**
 *	Limit number of words
 */
function limit_words($string, $limit = 100) {
    // Return early if the string is already shorter than the limit
    if(strlen($string) < $limit) {return $string;}

    $regex = "/(.{1,$limit})\b/";
    preg_match($regex, $string, $matches);
    return $matches[1] .' ...';
}



/**
 *	Convert value from one number range to another
 */
function convertRange($old_value,$old_min,$old_max,$new_min,$new_max,$round=2){
	$old_range = ($old_max - $old_min); 
	$new_range = ($new_max - $new_min); 
	return round( (((($old_value - $old_min) * $new_range) / $old_range) + $new_min) ,2 );
}



/**
 *	Convert value from one number range to another
 */
function calculate_age($birthday,$options='year'){
	// new DateTime object for birthday
	$birthday = new DateTime($birthday); 
	// new DateTime object for today
	$today = new DateTime(); 
	// calc difference
	$diff = $today->diff($birthday);
	// testing
	//printf('%d years, %d month, %d days', $diff->y, $diff->m, $diff->d);
	//print_r($diff);
	
	// return year only
	if ($options == 'year'){
		return $diff->y;
	} 
	// return diff object
	else if ($options == 'diff'){
		return $diff;
	}
} 




?>