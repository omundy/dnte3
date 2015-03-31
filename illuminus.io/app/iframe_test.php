<?php
	
// for reporting what is going on
$control = array();

if (isset($_SERVER['HTTP_HOST'])){
	$search = array('https://','http://','www');
	$control['domain'] = str_replace($search,'',$_SERVER['HTTP_HOST']);
} else {
	$control['domain'] = 'dnt.dev';
}
?>	
<!DOCTYPE html>
<html>
<head>
<title>Illuminus - Future Present Risk Detection</title>
<meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>
html,body { margin: 0; padding: 0; background: #000; color: #ddd; font:11px/11px Arial}
#infobar { background-color: rgba(0,0,0,.5); width: 100%; height: 20px; position: absolute; top:0; left: 0; z-index: 999999}
iframe { display:none; position: fixed; top:0px; left:0px; bottom:0px; right:0px; border: none; margin: 0 0 0 0; padding: 0; overflow:hidden; z-index:999998; width: 100%; height: 100%; }
</style>
</head>
<body>
<div id='fb-root'></div>
<div id="infobar">
	<span id="login_btn"></span>
	<span id="load_btns">
		 - - 0: 
		<input id="step_zero_CA" type="button" value="CA" />
		<input id="step_zero_DE" type="button" value="DE" />
		<input id="step_zero_EN" type="button" value="EN" />
		<input id="step_zero_FR" type="button" value="FR" />
		 - - 1: 
		<input id="step_one_CA" type="button" value="CA" />
		<input id="step_one_DE" type="button" value="DE" />
		<input id="step_one_EN" type="button" value="EN" />
		<input id="step_one_FR" type="button" value="FR" />
		 - - 2: 
		<input id="step_two_CA" type="button" value="CA" />
		<input id="step_two_DE" type="button" value="DE" />
		<input id="step_two_EN" type="button" value="EN" />
		<input id="step_two_FR" type="button" value="FR" />
		 - - 3: 
		<input id="step_three_CA" type="button" value="CA" />
		<input id="step_three_DE" type="button" value="DE" />
		<input id="step_three_EN" type="button" value="EN" />
		<input id="step_three_FR" type="button" value="FR" />
		 - - - -  
		<input id="standalone" type="button" value="standalone" />
		<input id="player" type="button" value="player" />

		
	</span>
	<span id="status"></span>
</div>
<iframe id="app_frame" src="" frameBorder="0"></iframe>





<script>

document.domain = "<?php print $control['domain'] ?>";	

var player = 'yes';
var step = 'zero';
var lang = 'EN';

function setPlayer(state){
	// 1
	if (state == 'yes'){
		$('#player').css('color','red') 
		$('#standalone').css('color','black') 
	} else {
		$('#player').css('color','black') 
		$('#standalone').css('color','red') 
	}

	player = state
	loadIframe(step,lang)
}

	
/**
 *	Facebook
 */

// load the Javascript SDK 
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// initialize Facebook
window.fbAsyncInit = function() {
	FB.init({
		appId: 761116317308745,
		cookie: true,	// enable cookies to allow the server to access the session
		xfbml: true,	// parse social plugins on this page
		version: 'v2.3' // use version 2.1
	});
	// check login
	FB.getLoginStatus(checkLoginStatus);
};

// check login status
function checkLoginStatus(response) {
	// connected: Logged into your app
	if(response && response.status == 'connected') {
		
		var userID = response.authResponse.userID;
		var accessToken = response.authResponse.accessToken;
		console.log('IFRAME: user='+ userID +' logged in AND has authorized app - accessToken (ends with)='+ accessToken.substr(accessToken.length - 10) +'');
		logout_prompt();
		loadIframe();
		
	// not_authorized: Logged into Facebook, but not your app
	} else if (response.status === 'not_authorized') {
		console.log('IFRAME: user is logged in BUT has not authorized app');
		login_prompt();
	// [else]: Not logged into Facebook / can't tell if they are logged into app	
	} else {
		console.log('IFRAME: user is not logged into Facebook');
		login_prompt();
	}
}









// Login user
function login_user(_scope) {
	FB.login(function(response) {
		// handle the response
		if (response.authResponse) {
			logout_prompt();
			loadIframe();
		} else {
			console.log('IFRAME: User cancelled login or did not fully authorize.');
		}
	}, { scope: _scope });
}
// Logout user
function logout_user() {
	FB.api('/me/permissions', 'DELETE', function(res){
	    if(res.success === true){
	        console.log('IFRAME: app deauthorized');
	        login_prompt();
	    } else if(res.error){
	        console.log('IFRAME: res.error');
	        console.error('IFRAME: ' + res.error.type + ': ' + res.error.message);
	    } else {
	        console.log('IFRAME: '+res);
	    }
	}); 
}

// show logout button / text
function logout_prompt(){
	// show login button
	$('#login_btn').html('<input id="fb_logout_btn" type="button" value="logout" />');
	$('#load_btns').css('display','inline-block');
	$('#status').html('Welcome!!');
	$("#app_frame").attr('src','');
}
// show login button / text
function login_prompt(){
	$('#login_btn').html('<input id="fb_login_btn" type="button" value="login" />');
	$('#load_btns').css('display','hidden');
	$('#status').html('Please log into this app.');
	$("#app_frame").attr('src','');
}
     
function loadIframe(_step,_lang) {
	step = _step;
	lang = _lang;
	var params = '';
	
	params += '&step='+step;
	params += '&lang='+lang;
	params += '&player='+player;
	
    $("#app_frame")
    	.attr('src','index.php?v' + Math.random() + params)
    	.css('display','block');

}
	


$(document).on('click','#fb_login_btn',function() { login_user('email,user_birthday,user_likes'); });
$(document).on('click','#fb_logout_btn',function() { logout_user(); });
		
$(document).on('click','#step_zero_CA',function() { loadIframe('zero','CA'); });
$(document).on('click','#step_zero_DE',function() { loadIframe('zero','DE'); });
$(document).on('click','#step_zero_EN',function() { loadIframe('zero','EN'); });	
$(document).on('click','#step_zero_FR',function() { loadIframe('zero','FR'); });	
		
$(document).on('click','#step_one_CA',function() { loadIframe('one','CA'); });
$(document).on('click','#step_one_DE',function() { loadIframe('one','DE'); });
$(document).on('click','#step_one_EN',function() { loadIframe('one','EN'); });	
$(document).on('click','#step_one_FR',function() { loadIframe('one','FR'); });	
	
$(document).on('click','#step_two_CA',function() { loadIframe('two','CA'); });	
$(document).on('click','#step_two_DE',function() { loadIframe('two','DE'); });	
$(document).on('click','#step_two_EN',function() { loadIframe('two','EN'); });	
$(document).on('click','#step_two_FR',function() { loadIframe('two','FR'); });		
	
$(document).on('click','#step_three_CA',function() { loadIframe('three','CA'); });	
$(document).on('click','#step_three_DE',function() { loadIframe('three','DE'); });	
$(document).on('click','#step_three_EN',function() { loadIframe('three','EN'); });	
$(document).on('click','#step_three_FR',function() { loadIframe('three','FR'); });	


$(document).on('click','#standalone',function() { setPlayer('no') });	
$(document).on('click','#player',function() { setPlayer('yes') });	


	
	


</script>


</body>
</html>