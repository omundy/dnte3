<!DOCTYPE html>
<html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<div id='fb-root'></div>
<script>

document.domain = "dnt.dev";


/**
 *	Facebook
 */

// 0. load the SDK asynchronously
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// 1. callback after SDK loads...
window.fbAsyncInit = function() {

	// 2. init SDK
	FB.init({
		appId      : '761116317308745',
		cookie     : true,  // enable cookies to allow the server to access the session
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.2' // use version 2.1
	});
	
	/*
	Now that we've initialized the JavaScript SDK, we call FB.getLoginStatus().  
	This function gets the state of the person visiting this page and can return 
	one of three states to the callback you provide.  They can be:
	
		1. Logged into your app ('connected')
		2. Logged into Facebook, but not your app ('not_authorized')
		3. Not logged into Facebook and can't tell if they are logged into your app or not.
	
	These three cases are handled in the callback function.
	*/
	
	// 3. check login
	FB.getLoginStatus(checkLoginStatus);
};

	
// Login in the current user via Facebook and ask for email permission
function authUser() {
	
	FB.login(function(response) {
		// handle the response
		if (response.authResponse) {
			console.log('Welcome!  Fetching your information.... ');
			FB.api('/me', function(response) {
				console.log('Good to see you, ' + response.name + '.');
			});
		} else {
			console.log('User cancelled login or did not fully authorize.');
		}
	}, {scope: 'email,user_likes'});		
	
}

// Check the result of the user status and display login button if necessary
function checkLoginStatus(response) {
	if(response && response.status == 'connected') {
		console.log('User is authorized');
		
		// Hide the login button
		//document.getElementById('loginButton').style.display = 'none';
		
		// Now Personalize the User Experience
		console.log('Access Token: ' + response.authResponse.accessToken);
		go();
	} else {
		console.log('User is not authorized');
		
		// Display the login button
		document.getElementById('loginButton').style.display = 'block';
	}
}
  
      

function go(){

	console.log('go');

	FB.api('/me', function(response) {
		console.log('Successful login for: ' + response.name);
		document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!';
	});
	
	FB.api('/me/feed','get', function(response) {
		console.log(response);
	});
	
	

};






	
      
   $(document).ready(function(){
    
	$("#fb_logout_button").click(function() {
		
		/*
		if(FB.logout(function(response) {
			console.log('User logout.');
		})){
			console.log('User  logout.');
		} else {
			console.log('User didnt logout.');
		}
		*/
		
		FB.api('/me/permissions', 'DELETE', function(res){
    if(res === true){
        console.log('app deauthorized');
    }else if(res.error){
        console.error(res.error.type + ': ' + res.error.message);
    }else{
        console.log(res);
    }
});
		
	});	
	
	});
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*
	
	
	
	
// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
	console.log('statusChangeCallback');
	console.log(response);
	
	// The response object is returned with a status field that lets the
	// app know the current login status of the person.
	// Full docs on the response object can be found in the documentation
	// for FB.getLoginStatus().
	if (response.status === 'connected') {
		// Logged into your app and Facebook so proceed
		testAPI();
	} else if (response.status === 'not_authorized') {
		// The person is logged into Facebook, but not your app.
		document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
	} else {
		// The person is not logged into Facebook, so not sure if they are logged into this app or not.
		document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
	}
}

// Called when someone finishes with the Login Button. See the onlogin handler attached to it in the sample code.
function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}

// Here we run a very simple test of the Graph API after login is successful.  See statusChangeCallback() for when this call is made.
function testAPI() {
	console.log('Welcome!  Fetching your information.... ');
	FB.api('/me', function(response) {
		console.log('Successful login for: ' + response.name);
		document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!';
	});
}

*/


</script>

<!--
Below we include the Login Button social plugin. This button uses
the JavaScript SDK to present a graphical Login button that triggers
the FB.login() function when clicked.
-->

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>

<div id="status"></div>




<input id="loginButton" type="button" value="Login" onclick="authUser();" />
<input id="fb_logout_button" type="button" value="Logout" />

</body>
</html>