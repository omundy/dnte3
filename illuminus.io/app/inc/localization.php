<?php

function get_language() {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    switch ($lang){
        case "fr":
            return 'FR';
            break;
        case "de":
            return 'DE';
            break;
        case "en":
        	if( "CA" == substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 3, 2) ) {
        		return  'CA';
        	} else {
    			return  'EN';
        	}
            break;
        default:
            return 'EN';
            break;
    }
}

?>