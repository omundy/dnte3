<?php

$health_domains = array('Health', 'Safety', 'Recreation');
$financial_domains = array('Career', 'Finance', 'Social');

function init_control() {
    // for reporting / recording states
    $control = array();

    // figure out what domain we're on
    if (isset($_SERVER['HTTP_HOST'])){
    	$search = array('https://','http://','www');
    	$control['domain'] = str_replace($search,'',$_SERVER['HTTP_HOST']);
    } else {
    	$control['domain'] = 'dnt.dev';
    }

    // get lang / step
    if(isset($_GET['lang']) && isset($_GET['step'])) {
    	$control['step'] = $_GET['step'];
    	$control['lang'] = $_GET['lang'];
    } else {
    	$control['step'] = 'zero';
    	$control['lang'] = 'EN';
    }

    // get player
    if(isset($_GET['player']) && $_GET['player'] == 'no') {
    	// app is loaded in player
    	$control['player'] = 'no';
    } else {
    	// standalone app
    	$control['player'] = 'yes';
    }; 
    
    return $control;   
}

function overall_risk($domain) {
	global $user, $health_domains, $financial_domains;
	$score = 0;

	if ($domain = 'health') $arr = $health_domains;
	if ($domain = 'financial') $arr = $financial_domains;

	foreach ($user['big5_risk_domains'] as $key => $risk_arr) {
		if (in_array($key,$arr)){
			foreach ($risk_arr as $risk_score){
				$score += $risk_score;
				//if ($risk_score > .5) {
				//	return true;
				//}
			}
			return $score / count($risk_arr);
		}
	}

}

function get_risk_color($total){
	$risk_color = '';
	if ($total > .9){
		$risk_color = '#ff1d00';
	} else if ($total > .8){
		$risk_color = '#ff3f0a';
	} else if ($total > .7){
		$risk_color = '#ff6f14';
	} else if ($total > .6){
		$risk_color = '#ffa51e';
	} else if ($total > .5){
		$risk_color = '#ffd828';
	} else if ($total > .4){
		$risk_color = '#f6fb30';
	} else if ($total > .3){
		$risk_color = '#cdfb32';
	} else if ($total > .2){
		$risk_color = '#a3fb34';
	} else if ($total > .1){
		$risk_color = '#7ffa35';
	} else if ($total > .0){
		$risk_color = '#5ffa36';
	}
	return $risk_color;
}

function eval_risk_overview($risk_name, $overall_domain_risk){
	global $user, $control, $text, $health_domains, $financial_domains;
	//report($user);

	if (isset($user['gender']) && $user['gender'] != 'NOT DECLARED' && isset($user['age']) && $user['age'] != 'NOT DECLARED'){

		print '<ul>';

		if ( isset($user['gender']) && $user['gender'] != 'NOT DECLARED'){

			print '<li>';
			// In addition to your seemingly boring Facebook data, your
			print $text[2]['eval_risk_overview_1'];
			// gender
            
            if ( isset($text[0][$user['gender'].'_pronoun']) )
                $gender = $text[0][$user['gender'].'_pronoun'];
            else
                $gender = $user['gender'];
            
			print ' <span class="udata">'. $gender;
			print ' '. $text[2]['eval_risk_overview_2'] .' ';
			print '</span> ';



			if ( $user['gender'] === 'male' ){
				if ($risk_name == 'Recreation' || $risk_name == 'Health' || $risk_name == 'Safety' || $risk_name == 'Overall'){
					// greatly contributed
					print ' <span style="color: '. get_risk_color(.7) .'">'. $text[2]['eval_risk_overview_adj_1_1'] .'</span> ';
				} else if ( $overall_domain_risk > .3) {
					// likely contributed
					print ' <span style="color: '. get_risk_color(.5) .'">'. $text[2]['eval_risk_overview_adj_1_2'] .'</span> ';
				} else {
					// did not contribute
					print ' <span style="color: '. get_risk_color(.2) .'">'. $text[2]['eval_risk_overview_adj_1_3'] .'</span> ';
				}
			} else if ($user['gender'] == 'female'){
				if ($risk_name == 'Career' || $risk_name == 'Social' || $risk_name == 'Finance'){
					// greatly contributed
					print ' <span style="color: '. get_risk_color(.7) .'">'. $text[2]['eval_risk_overview_adj_1_1'] .'</span> ';
				} else if ( $overall_domain_risk > .3) {
					// likely contributed
					print ' <span style="color: '. get_risk_color(.5) .'">'. $text[2]['eval_risk_overview_adj_1_2'] .'</span> ';
				} else {
					// did not contribute
					print ' <span style="color: '. get_risk_color(.2) .'">'. $text[2]['eval_risk_overview_adj_1_3'] .'</span> ';
				}
			} else {
				print ' '. $text[2]['eval_risk_overview_adj_1_3'] .' ';
			}


			// to your estimated risk as
			print ' '. $text[2]['eval_risk_overview_3'] .' '. ' "<em>';




			// financial - men
			if ( strtolower($risk_name) == 'financial' && $user['gender'] === 'male' ){
				// Men reported significantly greater risk taking than women in the overall risk-taking scale
				print ' '. $text[2]['eval_risk_overview_3_1'];
			}
			// financial - women
			else if ( strtolower($risk_name) == 'financial' && $user['gender'] === 'female' ){
				print ' '. $text[2]['eval_risk_overview_3_2'];
			}
			// health - men
			else if ( strtolower($risk_name) == 'health' && $user['gender'] === 'male' ){
				print ' '. $text[2]['eval_risk_overview_3_3'];
			}
			// health - women
			else if ( strtolower($risk_name) == 'health' && $user['gender'] === 'female' ){
				print ' '. $text[2]['eval_risk_overview_3_4'];
			}
			else {
				print ' '. $text[2]['eval_risk_overview_3_5'];
			}

			print '.</em>" (Nicholson, 163)</li>';



		}

		if (isset($user['age']) && $user['age'] != 'NOT DECLARED'){

			$age = $user['age'];
			$risk_score = 0;

			if ($age > 0){
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


			// Your ... age
			print '<li>'. $text[2]['eval_risk_overview_age_1'] .' <span class="udata">'. $text[2]['eval_risk_overview_age_2'] .' ('. $user['age'] .')';
			if ($age < 29){
				// greatly contributed
				print ' <span style="color: '. get_risk_color(.9) .'">'. $text[2]['eval_risk_overview_age_2_greatly'] .'</span> ';
			} else if ($age < 49){
				// likely contributed
				print ' <span style="color: '. get_risk_color(.6) .'">'. $text[2]['eval_risk_overview_age_2_likely'] .'</span> ';
			} else {
				// did not contribute
				print ' <span style="color: '. get_risk_color(.2) .'">'. $text[2]['eval_risk_overview_age_2_didnot'] .'</span> ';
			}



			// to your estimated risk as
			print '</span> '. $text[2]['eval_risk_overview_age_3'] .' "<em>';
			// Risk taking decreased with age in every domain
			print ' '. $text[2]['eval_risk_overview_age_4'] ;
			print '.</em>" (Nicholson, 164)';



			if ( $risk_name == 'financial'){
				// nothing
			} else if ( $risk_name == 'health'){
				// Meaning, the younger you are, the more likely you are to engage in risky behavior, which may affect our bottom line
				print ' '. $text[2]['eval_risk_overview_age_5'];
			}

			print '.</li>';





		}

		print '</ul>';
	}
}



function eval_risk($risk_name) {

	global $user, $control, $text;


	$arr = $user['big5_risk_domains'][$risk_name];
	arsort($arr);
	//return($arr);
	$keys=array_keys($arr);
    $risk_level = floor($arr[$keys[0]] * 10);
    if ($risk_level > 13) $risk_level = 13;

	if ( $risk_level > 4 ) print '<img src="assets/img/warning_risk_'. $risk_level .'.png" style="height:22px; margin-right:5px">';


	// Your high scores in
	print $text[2]['eval_risk_1'].' ';
	// this one colors the words
	//print ' <span class="udata" style="color:'. get_risk_color($arr[$keys[0]]) .'">'. $keys[0] .'</span> ('. $arr[$keys[0]] .') ';
    if (isset($text['big5'][$keys[0]]['name']))
        $label = $text['big5'][$keys[0]]['name'];
    else
        $label = $keys[0];
    
	print ' <span class="udata">'. $label .' ('. $arr[$keys[0]] .')</span> ';
    $and = ( isset($text[0]['and']) ? $text[0]['and'] : 'and');
	print ' '.$and.' ';
	// this one colors the words
	//print ' <span class="udata" style="color:'. get_risk_color($arr[$keys[1]]) .'">'. $keys[1] .'</span> ('. $arr[$keys[1]] .') ';
    if (isset($text['big5'][$keys[1]]['name']))
        $label = $text['big5'][$keys[1]]['name'];
    else
        $label = $keys[1];

	print ' <span class="udata">'. $label .' ('. $arr[$keys[1]] .')</span> ';
	// indicate
	print ' '. $text[2]['eval_risk_2'] .' ';

	$r = floor( ($arr[$keys[0]] * 10)/2 );
	print ' <span class="udata" style="color:'. get_risk_color($arr[$keys[0]]) .'">'. $text['meta']['risk_words'][ $r ] .'</span>';
	//print ' ('.$r.') ';
	// potential for risk-taking behavior in your
	print ' '. $text[2]['eval_risk_3'] .' ';
    $rnl = strtolower($risk_name);
    if (isset($text[0][$rnl]))
        print strtolower($text[0][$rnl]);
    else
	    print $rnl;
	// decisions
	print ' '. $text[2]['eval_risk_4'] .' ';
}

function is_female($user) {
    
    if (isset($user['gender']) && in_array($user['gender'], array('female', 'femme', 'weiblich')))
        return true;
    
    return false;
}