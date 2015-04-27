<?php

function get_language() {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    switch ($lang){
        case "fr":
            return 'fr';
            break;
        case "de":
            return 'de';
            break;
        case "en":
        	if( "ca" == substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 3, 2) ) {
        		return  'ca';
        	} else {
    			return  'en';
        	}
            break;
        default:
            return 'en';
            break;
    }
}

?>