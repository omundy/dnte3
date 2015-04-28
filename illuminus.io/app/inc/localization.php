<?php

function get_language() {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    switch ($lang) {
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

function get_locale() {
    global $control;
    
    $lang = (isset($control['lang']) ? $control['lang'] : 'EN');
    
    switch($lang) {

        case 'FR':
            $locale = 'fr_FR';
            break;
        case 'CA':
            $locale = 'fr_CA';
            break;            
        case 'DE':
            $locale = 'de_DE';
            break;
        default:
            $locale = 'en_US';
    }
    
    return $locale;
    
}

?>