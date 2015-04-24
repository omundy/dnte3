<?php

//include('inc/big5_scores.php');
include('inc/papi2-client-php/example.php');

$big5_risk = array(
    'Neuroticism' => array('Recreation' => -.16, 'Health' => .11, 'Career' => -.11, 'Finance' => -.14, 'Safety' => -.09, 'Social' => -.12, 'Overall' => -.18),
    'Extraversion' => array('Recreation' => .17, 'Health' => .17, 'Career' => .01, 'Finance' => .09, 'Safety' => .22, 'Social' => .22, 'Overall' => .26),
    'Openness' => array('Recreation' => .2, 'Health' => .06, 'Career' => .34, 'Finance' => .1, 'Safety' => .05, 'Social' => .32, 'Overall' => .36),
    'Agreeableness' => array('Recreation' => -.12, 'Health' => -.17, 'Career' => -.18, 'Finance' => -.21, 'Safety' => -.19, 'Social' => -.16, 'Overall' => -.31),
    'Conscientiousness' => array('Recreation' => -.09, 'Health' => -.13, 'Career' => -.08, 'Finance' => -.17, 'Safety' => -.16, 'Social' => -.07, 'Overall' => -.2)
);

function fillLikes($user) {
    
    $likes = array();
    $user['like_ids'] = array();
    
    // store all likes, like_ids
    foreach( $user['likes'] as $key => $val ) {
			
        $likes[$val['id']] = array(
            'id'=> $val['id'], 
            'name'=> $val['name'], 
            'category'=> $val['category'], 
            'created_time'=> $val['created_time']
        );
        $user['like_ids'][] = $val['id'];
    
    }
    
    $user['likes'] = $likes;
		
    // COUNT LIKES
    $user['like_timeline'] = array(); // like timeline
    $user['like_categories'] = array(); // like categories
		
    // loop through likes
    foreach ($user['likes'] as $key => $arr) {
			
        $time = strtotime($arr['created_time']);
        $month = date("Y", $time);
			
        if (isset($user['like_timeline'][$month]))
            $user['like_timeline'][$month]++;
        else
            $user['like_timeline'][$month] = 1;
			
        if (isset($user['like_categories'][$arr['category']]))
            $user['like_categories'][$arr['category']]++;
        else
            $user['like_categories'][$arr['category']] = 1;
    }
		
    // done with ALL likes...
		
    // count them
    $user['likes_count'] = count($user['likes']);
		
    // and keep 20. Why 20?
    //$user['likes'] = array_slice($user['likes'], 0,20);
    
    return $user;
     
}

function getBig5Predictions($user) {
    
    $predictions = get_prediction('return',$user['like_ids'],$user['id']);
    
    if ($predictions) {
        
        sort($predictions->_predictions); // sort

		$big5_result = array();
		foreach($predictions->_predictions as $val) {
			
			if (isset($val->_trait) && $val->_value > 0) {

				// if BIG5_
				if (strpos($val->_trait, "BIG5_") !== false) {
					// store for use below
					$big5_result[str_replace('BIG5_', '', $val->_trait)] = $val->_value;
				}
			}
		}
        
        return $big5_result;
    }
    
    return false;
}

/**
 *	Create risk table for user using their Magic Sauce results and risk scores
 */
function compute_risk($big5_result, $big5_risk, $options='', $g='', $age=0){
	
	//print '<p>$options='.$options.', $gender='.$g.', $age='.$age.'</p>';
	
	// hold data
	$data = array(); 
	
	foreach($big5_result as $big5_name => $big5_score) {	
		// create new secondary arr
		$data[$big5_name] = array(); 
							
		// loop through and insert score for each
		foreach($big5_risk[$big5_name] as $risk_name => $big5_risk_score) {
			// convert to 0-1 range
			//$risk_score = convertRange($big5_risk_score,-.31,.36,0,1); // original 
			$risk_score = convertRange($big5_risk_score,-.33,.44,0,1); // tweak
			
			
			// calc user risk for logged in user
			if (strpos($options, 'calc_user_risk') === true){
				$risk_score = ($risk_score + $big5_score) / 2;
			} else {
				// leave scores alone
			}
			
			// calc user risk AND gender for logged in user
			if ( $g === 'male' ){
				if ($risk_name == 'Recreation' || $risk_name == 'Health' || $risk_name == 'Safety' || $risk_name == 'Overall'){
					$risk_score *= 1.5; 
				}
			} else if ($g == 'female'){
				if ($risk_name == 'Career' || $risk_name == 'Social' || $risk_name == 'Finance') {
					$risk_score *= 1.5; 
				}
			} else {
				// leave scores alone
			}
			
			if ($age > 0) {
				if ($age < 20){
					$risk_score *= 1.4; 
				} else if ($age < 30){
					$risk_score *= 1.3;  
				} else if ($age < 40){
					$risk_score *= 1.15;  
				} else if ($age < 50){
					$risk_score *= .9; 
				} else if ($age < 60){
					$risk_score *= .8; 
				} else if ($age < 70){
					$risk_score *= .7; 
				} else if ($age < 80){
					$risk_score *= .6; 
				} else if ($age < 120){
					$risk_score *= .5; 
				}
			}
			
			
			$data[$big5_name][$risk_name] = round($risk_score,5);
		}
	}
	return $data;
}

function fbUserToSessionUser($user) {
    
    global $big5_risk;
    
    $in_session = array();
    
	// LIKES, LIKE_IDS, LIKE_PAGES
    if ($user['likes']) {
        
        $user = fillLikes($user);
        
        $big5_result = getBig5Predictions($user);

        // BIG5
        if ($big5_result)
            $in_session['big5'] = $big5_result;

	}
    
	if(isset($in_session['big5'])) {		
		
        $g = ( $user['gender'] != 'NOT DECLARED' ? $user['gender'] : '');
        $a = ( $user['age'] != 'NOT DECLARED' ? $user['gender'] : 0);
		
		$user['big5_risk_final'] = compute_risk($in_session['big5'], $big5_risk, $g, $a);
		
		// order risk into separate domains					
		$user['big5_risk_domains'] = array();
		foreach($user['big5_risk_final'] as $key => $arr) {
			foreach($arr as $risk_domain => $val)
				$user['big5_risk_domains'][$risk_domain][$key] = $val;
		}
		
	}	
	
    $in_session['age'] = $user['age'];
    $in_session['gender'] = $user['gender'];
    $in_session['name'] = $user['name'];
    $in_session['picture'] = $user['picture'];
    
    if (!isset($user['likes'])) {
        $in_session['err'] = 'no_permission';
    } elseif(count($user['likes']) < 5) {
        $in_session['err'] = 'no_likes';
    }

    if ($in_session['big5'] && $user['big5_risk_domains']) {

        $in_session['like_timeline'] = $user['like_timeline'];
        $in_session['big5_risk_domains'] = $user['big5_risk_domains'];
        $in_session['likes_count'] = $user['likes_count'];
        $in_session['likes'] = array_slice($user['likes'], 0, 4);

        // like categories
    	arsort($user['like_categories']); // sort by frequency

    	// create other category
    	if(!array_key_exists('Other',$user['like_categories']))
    		$user['like_categories']['Other'] = 0;
    
    	if ($user['like_categories'] > 35)
    		$limit = 4;
        else
    		$limit = 2;

    	foreach($user['like_categories'] as $key => $val) {
    		if( $val < $limit && $key != 'Other') {
    			// remove from array
    			unset($user['like_categories'][$key]);
    			// add to Other
    			$user['like_categories']['Other']++;
    		}
    	}
    	// move Other to the end
    	$val = $user['like_categories']['Other'];
    	unset($user['like_categories']['Other']);
    	$user['like_categories']['Other'] = $val;
    
        $in_session['like_categories'] = $user['like_categories'];
    
    
    } else {
        $in_session['err'] = 'no_magic_sauce';
    }

	return $in_session;

}