<?php

use Papi\Client\Exception\NoPredictionException;
use Papi\Client\Model\TraitName;
use Papi\Client\PapiClient;

spl_autoload_register("autoload");

$serviceUrl = "http://api-v2.applymagicsauce.com";
$papiClient = new PapiClient($serviceUrl);

// This is what you got during registration
$customerId = 727;
$apiKey = "ue68q7vlfruh6qoh7of8sidsi3";
// Id of Facebook user
$uid = 1;





// from http://applymagicsauce.com/documentation.html
$traits = array(

// Linear Traits
	array("BIG5_Openness",.5),
	array("BIG5_Conscientiousness",.5),
	array("BIG5_Extraversion",.5),
	array("BIG5_Agreeableness",.5),
	array("BIG5_Neuroticism",.5),
	
	array("Satisfaction_Life",.17),
	array("Intelligence",.47),
	array("Age",.75),

// Categories	
	array("Female",.93),
	array("Gay",.88),
	array("Lesbian",.75),
	
	array("Concentration",.72),
	array("Concentration_Art",.72),
	array("Concentration_Biology",.72),
	array("Concentration_Business",.72),
	array("Concentration_IT",.72),
	array("Concentration_Education",.72),
	array("Concentration_Engineering",.72),
	array("Concentration_Journalism",.72),
	array("Concentration_Finance",.72),
	array("Concentration_History",.72),
	array("Concentration_Law",.72),
	array("Concentration_Nursing",.72),
	array("Concentration_Psychology",.72),
	
	array("Politics",.79),
	array("Politics_Liberal",.79),
	array("Politics_Conservative",.79),
	array("Politics_Uninvolved",.79),
	array("Politics_Libertanian",.79),
	
	array("Religion",.76),
	array("Religion_None",.76),
	array("Religion_Christian_Other",.76),
	array("Religion_Catholic",.76),
	array("Religion_Jewish",.76),
	array("Religion_Lutheran",.76),
	array("Religion_Mormon",.76),
	
	array("Relationship",.67),
	array("Relationship_None",.67),
	array("Relationship_Yes",.67),
	array("Relationship_Married",.67)
	
);





// Authentication. This token will be valid for at least one hour, so you want to store and re-use for further requests
if ( !isset($_SESSION['magic_token']) || !isset($_SESSION['magic_token_date']) ){
	// first run, get token
	$refresh_token = true;
} else {
	
	// token exists but check time 
	$time = $_SESSION['magic_token_date'];
	$curtime = time();
	// 3600 seconds == one day
	if(($curtime-$time) > 1000) { 
		// it has been ~ one day, refresh token
		$refresh_token = true;
	} else {
		$magic_token = $_SESSION['magic_token'];
	}

	
}
// problems with code so getting a new one every time
$refresh_token=true;
if (isset($refresh_token)){
	//print "getting new token";
	$token = $papiClient->getAuthResource()->requestToken($customerId, $apiKey);
	$magic_token = $_SESSION['magic_token'] = $token->getTokenString();
	$_SESSION['magic_token_date'] = $token->getExpires();
} else {
	$magic_token = $_SESSION['magic_token'];
}


/*
print "<pre>";
//print $token->getTokenString() ."<br>";
//print $token->getExpires() ."<br>";
print_r($_SESSION);
print "</pre>";
*/


function get_prediction($output='print',$likeIds,$uid) {
	global $papiClient, $magic_token, $traits;
	
	// Get predictions and print
	try {
	    $prediction = $papiClient->getPredictionResource()->getByLikeIds(
	        array(
	        
		    // submitting empty array returns all matches
		    // alternately can submit only ones we want below.
	        TraitName::BIG5, 
	        
	        /*
	        TraitName::INTELLIGENCE,
	        TraitName::SATISFACTION_WITH_LIFE, 
	        TraitName::INTELLIGENCE, 
	        TraitName::AGE, 
	        
	        TraitName::FEMALE, 
	        TraitName::GAY, 
	        TraitName::LESBIAN, 
	        TraitName::CONCENTRATION,  
	        TraitName::POLITICS, 
	        TraitName::RELIGION, 
	        TraitName::RELATIONSHIP
	        */
	    ), $magic_token, $uid, $likeIds);
	        
	        
	        if (count($likeIds) <1){
		        // His like ids
$likeIds = array("7010901522", "7721750727", "7557552517", "8536905548", "7723400562",
"8800570812", "10765693196", "14269799090", "12938634034", "14287253499");

	        }
	        
	        
	    if ($output == 'print'){
		    print '<pre>';
		    print_r($prediction);
		    print '</pre>';
		} else if ($output == 'return'){
			$return = $prediction;
			return $return;
		}
	} catch (NoPredictionException $e) {
	    print "No prediction could be made";
	}
}
//get_prediction();


function autoload($className)
{
    $className = ltrim($className, "\\");
    $fileName = "";
    if ($lastNsPos = strripos($className, "\\")) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = str_replace("\\", DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    require_once $fileName;
}

?>
