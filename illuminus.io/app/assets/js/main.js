if (!window.console) window.console = {};
if (!window.console.log) window.console.log = function () { };

/**
 *	Facebook
 */

// load the Javascript SDK
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/'+locale+'/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// initialize Facebook
window.fbAsyncInit = function() {
	FB.init({
		appId: app_id,
		cookie: true,	// enable cookies to allow the server to access the session
		xfbml: true,	// parse social plugins on this page
		version: 'v2.3' // use version 2.1
	});
	// check login
	FB.getLoginStatus(checkLoginStatus, true);
  
};



// check login status
function checkLoginStatus(response) {
	//console.log(response);

	// connected: Logged into your app
	if(response && response.status == 'connected') {
		var userID = response.authResponse.userID;
		var accessToken = response.authResponse.accessToken;
    
    if (typeof afterFBInit == 'function')
      afterFBInit(accessToken);
    
		console.log('APP: user='+ userID +' logged in AND has authorized app - accessToken (ends with)='+ accessToken.substr(accessToken.length - 10) +'');

	// not_authorized: Logged into Facebook, but not your app
	} else if (response.status === 'not_authorized') {
		console.log('APP: user is logged in BUT has not authorized app');
    if (typeof afterFBInit == 'function')    
      afterFBInit();
    
	// [else]: Not logged into Facebook / can't tell if they are logged into app

	} else {
		console.log('APP: user is not logged into Facebook');
    if (typeof afterFBInit == 'function')    
      afterFBInit();
	}
}

// Login user
function login_user(_scope) {
  
	FB.login(function(response) {
		// handle the response
		if (response.authResponse) {
			// redirect
      loadUserData();
		} else {
			console.log('APP: User cancelled login or did not fully authorize.');
		}
	}, { scope: _scope });
}
// Logout user
function logout_user() {
  
  showSpinner();
  
	FB.api('/me/permissions', 'DELETE', function(res){
    
    hideSpinner();
    
    if (res.success === true) {
        console.log('APP: app deauthorized');
        window.location.replace(lang+"/zero");
    } else if (res.error) {
        console.log('APP: res.error');
        console.error('APP: ' + res.error.type + ': ' + res.error.message);
    } else {
        console.log('APP: '+res);
    }
    
	});
}

var userLikes = null;
var userData = null;
var hasCheckedUserConnected = false;
var hasLoadedUserData = false;
var isUserConnected = false;

var firstName = '';
var lastName = '';

function loadUserData(at) {
  
  showSpinner();

  checkUserConnected();
  
  var d = {fields: 'id,name,locale,gender,birthday,picture,likes.limit(100),first_name,last_name', locale: locale};
  if (at != undefined)
    d.access_token = at;
  
  FB.api('/me', d, function(response) {
    
    console.log(response);
    
    userData = {};
    userData.gender = response.gender;
    userData.id = response.id;
    userData.name = response.name;
    firstName = response.first_name;
    lastName = response.last_name;
    
    if (response.birthday)
      userData.birthday = response.birthday;
    if (response.picture && response.picture.data && response.picture.data.url)
      userData.picture = response.picture.data.url;
    
    if (response.likes != undefined) {
      var likesData = response.likes;
      userLikes = likesData.data;      
    }
    
    if (response.likes != undefined && likesData.paging != undefined && likesData.paging.next != undefined) {
      loadMoreLikes(likesData.paging.next);
    } else {
      hasLoadedUserData = true;      
      sendUserData();
    }
    
  });
  
}

function checkUserConnected() {
  $.ajax({
    type: 'GET',
    timeout: 3000,
    url: api_url+'/api/user', 
    dataType: 'json',
    xhrFields: { withCredentials: true },
    success: function(response) {
      isUserConnected = (response.status == undefined || response.status);
      hasCheckedUserConnected = true;
      sendUserData();
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      isUserConnected = false;
      hasCheckedUserConnected = true;
      sendUserData();
    }
  });
}

function loadMoreLikes(next) {
  
  $.get(next, function(response) {
    
    var likesData = response;
    userLikes = userLikes.concat(likesData.data);
    if (likesData.paging != undefined && likesData.paging.next != undefined) {    
      loadMoreLikes(likesData.paging.next);
    } else {
      hasLoadedUserData = true;
      sendUserData();
    }

  })
}

function sendUserData() {
  
  if (!hasCheckedUserConnected || !hasLoadedUserData)
    return;
  
  userData.likes = userLikes;
  
  $.post('compute_profile.php', userData, function(response) {
    
    if (isUserConnected) {
      
      var likes = new Array();
      for (var i in userData.likes) {
        var like = userData.likes[i];
        likes.push({
          'name': like.name,
          'id': like.id,
        });
        if (likes.length >= 5)
          break;
      }
      
      var JRes = JSON.parse(response);
      var personality = (JRes.personality != undefined ? JRes.personality : []);
      var interest = (JRes.interest != undefined ? JRes.interest : '');
      var newPersonality = {};
      for (var i in personality) {
        newPersonality[i.toLowerCase()] = personality[i];
      }
      
      var data = [{
        firstname: firstName,
        lastname: lastName,
        birth: userData.birthday,
        gender: userData.gender,
        personality: newPersonality,
        likes: likes,
        interest: interest
      }];
      
      $.ajax({
        type: 'POST',
        timeout: 3000,
        url: api_url+'/api/episode3', 
        data: {FBobject: JSON.stringify(data)},
        xhrFields: { withCredentials: true },        
        success: function() {
          gotoFirstScreen();
        },
        error: function() {
          gotoFirstScreen();
        }
      });
      
    } else
        gotoFirstScreen();
    
  });
  
}

function gotoFirstScreen() {
  window.location.replace(lang +"/one");
}

function showSpinner() {
  $('#spinner').show();
}

function hideSpinner() {
  $('#spinner').hide();
}

// Called when someone finishes with the Login Button. See the onlogin handler attached to it in the sample code.
function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}

function step1_frames_event(frame){
	// hide
	for(var i=1; i<=3; i++) {
		$('#step1_frame_'+i).hide()
	}
	if (!frame){
		frame = 1;
	}
	$('#step1_frame_'+frame).show();


}

$(document).ready(function() {
  step1_frames_event(1);  
})

$('#step1_1_next_btn').on('click',function(){ step1_frames_event(2) });
$('#step1_2_prev_btn').on('click',function(){ step1_frames_event(1) });
$('#step1_2_next_btn').on('click',function(){ step1_frames_event(3) });
$('#step1_3_prev_btn').on('click',function(){ step1_frames_event(2) });
$('#step1_3_gorisk_btn').on('click',function(){ window.location.replace(lang+"/two"); });


$('#get_sample_data_btn').on('click',function() { 
  
  $.post('reset.php', function() {
    window.location.replace(lang+"/one");     
  });  

});

$('#get_fb_data_btn').on('click',function(){ 
  loadUserData();
});

$('#fb_login_btn').on('click',function() { login_user('email,user_birthday,user_likes'); });
$('#fb_logout_btn').on('click',function() { logout_user(); });

$(document).ready(function() {
  $('#step_one_cover').hide();  
})


$("video").bind("ended", function() {
   window.location.replace(lang+"/load_data");
});

$( "#career_info_btn" ).click(function() {
	$( "#career_info" ).slideToggle( "slow", function() {
		// Animation complete.
	});
});
$( "#career_info" ).hide()
