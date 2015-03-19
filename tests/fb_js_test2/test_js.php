<!DOCTYPE html>
<html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/facebook.js"></script>
</head>
<body>
<div id='fb-root'></div>
<script>

document.domain = "dnt.dev";



var login_status = false; 
var accessToken = false;

// 1. run after SDK loads. 
window.fbAsyncInit = function() {
	
	// init FB...
	FB.init({
		appId      : '761116317308745',
		cookie     : true,  // enable cookies to allow the server to access the session
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.2' // use version 2.1
	});
	
	/*	After JavaScript SDK init, FB.getLoginStatus() gets status of visitor.
		These 3 cases are handled in the getLoginStatus(checkLoginStatus) callback function.
	
		1. connected: Logged into your app
		2. not_authorized: Logged into Facebook, but not your app
		3. [else]: Not logged into Facebook / can't tell if they are logged into app
	*/
	
	// 3. check login
	FB.getLoginStatus(checkLoginStatus);
};
	
// Check the result of the user status and display login button if necessary
function checkLoginStatus(response) {
	if(response && response.status == 'connected') {
		console.log('user is logged in AND has authorized app');
	
	// first try to send access token to php	
	accessToken = response.authResponse.accessToken;
	
	
		logout_prompt();
		start_app_prompt();
	} else if (response.status === 'not_authorized') {
		console.log('user is logged in BUT has not authorized app');
		login_prompt();
	} else {
		console.log('user is not logged into Facebook');
		login_prompt();
	}
}
// Login user
function login_user(_scope) {
	FB.login(function(response) {
		// handle the response
		if (response.authResponse) {
			logout_prompt();
			start_app_prompt();
		} else {
			console.log('User cancelled login or did not fully authorize.');
		}
	}, { scope: _scope });
}
// Logout user
function logout_user() {
	FB.api('/me/permissions', 'DELETE', function(res){
	    if(res.success === true){
	        console.log('app deauthorized');
	        login_prompt();
	    } else if(res.error){
	        console.log('res.error');
	        console.error(res.error.type + ': ' + res.error.message);
	    } else {
	        console.log(res);
	    }
	}); 
}

// show logout button / text
function logout_prompt(){
	// show login button
	$('#login_btn').html('<input id="fb_logout_btn" type="button" value="Logout" />');
	$('#status').html('Welcome!!');
}
// show login button / text
function login_prompt(){
	$('#login_btn').html('<input id="fb_login_btn" type="button" value="Login" />');
	$('#status').html('Please log into this app.');
	$('#start_app').html('');
}
     




function start_app_prompt(){
	$('#start_app').html('<input id="start_app_btn" type="button" value="Go" />');
	$('#status').html('Click go to proceed.');
	
}


function php_connect(_token){
	$.ajax({
		method: "POST",
		url: "test_php.php",
		data: { name: "owen", token: _token }
	})
	.done(function( msg ) {
		console.log( "RESPONSE FROM PHP: " + msg );
		// update iframe
		loadIframe('frame','test_php.php?token='+_token);
	});
}



function loadIframe(iframeName, url) {
    var $iframe = $('#' + iframeName);
    if ( $iframe.length ) {
        $iframe.attr('src',url);   
        return false;
    }
    return true;
}
	
      
$(document).ready(function(){
	
	$(document).on('click','#fb_login_btn',function() {
		login_user('email,user_likes');
	});
	$(document).on('click','#fb_logout_btn',function() {
		logout_user();
	});	
	$(document).on('click','#start_app_btn',function() {
		go();
	});	
	
});
	
	
	
function go(){
	// show logout button
	
	

	FB.api('/me', function(response) {
		console.log('Successful login for: ' + response.name);
		$('#status').html('Thanks for logging in, ' + response.name + '!');
	});
	
	FB.api('/me','get', function(response) {
		console.log(response);
	});
	
	//FB.api('/me/likes','get', get_likes);
	

	
	//console.log('accessToken: '+accessToken)
	php_connect(accessToken)





};
var data =[];
var likes =[];

function get_likes(response){
	
		// push to data array
		data = data.concat(response.data);
		
		console.log(response);
		
		if (response.paging.next && response.paging.next != "undefined"){
			FB.api(response.paging.next, get_likes);
		} else {
			// after paging done
			
			for(var like of data){
				likes = likes.concat(like.id);
			}
			
			
			
			//magic_auth();
			//magic_likes(token,likes);
			
			$('#data').html(JSON.stringify(likes));
		}
		
	
	
}
/*
function magic_auth(){
	$.ajax({
	    url: 'http://api-v2.applymagicsauce.com/auth/',
	    type: 'POST',
	    data: {
	        'customer_id': 727,
	        'api_key': 'ue68q7vlfruh6qoh7of8sidsi3'
	    },
	    headers: {
	        'Content-Type': 'application/json',
	        'Accept': 'application/json'
	    },
        crossDomain: true,
	    dataType: 'json',
	    success: function(data, textStatus, jqXHR) {
	        console.log(data)
	        //return resp.token;
	    },
	    error: function (jqXHR, textStatus, errorThrown)
	    {
			console.log(jqXHR)
			console.log(textStatus)
			console.log(errorThrown)
	    }
	});
}
function magic_likes(token,likes){
	$.ajax({
	    url: 'http://api-v2.applymagicsauce.com/like_ids',
	    type: 'POST',
	    data: { 
		    'uid': 780985312 
		},
	    headers: {
	        'X-Auth-Token': token,
	        'Content-type': 'application/json',
	        'Accept': 'application/json'
	    },
	    dataType: 'jsonp',
	    jsonp: false, jsonpCallback: "callbackName",
	    success: function (resp) {
	        console.log( resp);
	    }
	});
}
*/



	
	
	
	
	
	
	

// Called when someone finishes with the Login Button. See the onlogin handler attached to it in the sample code.
function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}
</script>

<!--
This button uses the JavaScript SDK to present a graphical Login button that triggers
the FB.login() function when clicked.

<fb:login-button scope="public_profile,email" onlogin="login_user('email,user_likes');"></fb:login-button>
-->


<div id="status"></div>
<div id="login_btn"></div>
<div id="start_app"></div>
<div id="data"></div>
<iframe id="frame" src="test_php.php" style="width:800px; height: 500px"></iframe>

</body>
</html>