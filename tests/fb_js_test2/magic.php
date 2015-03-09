<?php



/**
 
 This PHP should fetch data from magic sauce and return to JS file
 need to work on the below
 http://api-v2.applymagicsauce.com/auth
 
 */ 





curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array(
	"Content-Type: application/json",
	"Accept: application/json"
	"APIuserID: $id", 
	"APIpassword: $password", 
	"Content-length: ".strlen($data)
)); 
	
	

?>