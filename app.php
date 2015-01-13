<?php 
// include fb_login
include_once('fb_login.php'); 
use Facebook\FacebookRequest;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>dnt3</title>
<style>
img.user_thumb { height:30px; }
</style>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>


<nav class="navbar navbar-default">
	<div class="container">


		<a href="./app.php?q=/me" type="button" class="btn btn-default navbar-btn">/me</a> 
		<a href="./app.php?q=/me/books" type="button" class="btn btn-default navbar-btn">/books</a> 
		<a href="./app.php?q=/me/games" type="button" class="btn btn-default navbar-btn">/games</a> 
		<a href="./app.php?q=/me/likes" type="button" class="btn btn-default navbar-btn">/likes</a> 
		<a href="./app.php?q=/me/movies" type="button" class="btn btn-default navbar-btn">/movies</a> 
		<a href="./app.php?q=/me/music" type="button" class="btn btn-default navbar-btn">/music</a> 
		<a href="./app.php?q=/me/television" type="button" class="btn btn-default navbar-btn">/television</a> 
		<a href="./app.php?q=photo" type="button" class="btn btn-default navbar-btn">photo</a>

		<div class="nav navbar-nav navbar-right">
			<?php if (isset($loggedin)){ ?>
			<img src="<?php print fb_me_photo_thumb();?>" class="user_thumb">
			<?php } ?>
			<?php print $login_btn; ?>
		</div>
	
	</div>
</nav>





<div class="container">
	<div class="row">

	

<pre>
	
<?php

print $msg;

if (isset($_GET['q'])) { 
	$q = $_GET['q'];
} else {
	$q = 'profile';
}


if (isset($loggedin)){
	
	if ($q == '/me'){
	
	$request = new FacebookRequest($session,'GET',$q.'/?offset=0&limit=100');
	$response = $request->execute();
	$arr = $response->getGraphObject()->asArray();
	print_r($arr);
	
	} else if (strpos($q,'/me/') !== false){
	
		$str = "";
		$arr = array();
	
		$request = new FacebookRequest($session,'GET',$q.'/?offset=0&limit=100');
		$response = $request->execute();
		$arr2 = $response->getGraphObject()->asArray();
		$str .= get_tags($arr2);
		$arr2d = $arr2['data'];
		$arr = array_merge($arr,$arr2d);
	
		// do another one
		if (isset($arr2['paging']->cursors)) {
			$request = new FacebookRequest($session,'GET',$q.'/?offset=100&limit=100');
			$response = $request->execute();
			$arr2 = $response->getGraphObject()->asArray();
			$str .= get_tags($arr2);
			$arr2d = $arr2['data'];
			$arr = array_merge($arr,$arr2d);		}
	
		
		print '<h3>Tags ('. substr_count($str,' ') .')</h3>';
		print '<form>';
		print '<textarea rows="12" class="form-control">'. $str .'</textarea>';
		print '</form>';
		
		print '<h3>JSON</h3>';
		
		print_r($arr);
		
		
		/*
		// paging, not working yet
		
		function paging($arr){
			global $session;
			if (isset($arr['paging']->cursors)) {
				$arr2 = (array)$arr['paging']->next;
				$url = $arr2[0];
				print $url;
				print 'hi';
				$request = new FacebookRequest($session,'GET',$q.'/?offset=100&limit=100');
				$response = $request->execute();
				$arr3 = $response->getGraphObject()->asArray();
				print_r($arr3);
			}
		}
		paging($arr);
		
		*/
			
	
		
		
	
		
		
	
	
	
	
	} else if ($q == 'photo'){
		// Graph API to request profile picture
		$request = new FacebookRequest( $session, 'GET', '/me/picture?type=large&redirect=false' );
		$response = $request->execute();
		// Get response as an array
		$picture = $response->getGraphObject()->asArray();
		print_r( $picture );
		print '<img src="'. $picture['url'] .'">';
	
	}
}



function get_tags($arr){
	$str = '';
	if (count($arr) > 0){
		foreach($arr['data'] as $obj){
			$str .= ' '. str_replace('/',' ',$obj->category);
			$str .= ' '. str_replace('/',' ',$obj->name);
		}
	}
	return $str;
}




function fb_me_photo_thumb(){
	global $session;
	$request = new FacebookRequest(
	$session,
		'GET',
		'/me/picture',
		array (
			'redirect' => false,
			'height' => '200',
			'type' => 'normal',
			'width' => '200',
		)
	);
	$response = $request->execute();
	$graphObject = $response->getGraphObject()->asArray();
	return $graphObject['url'];
}




?>


</pre>


	</div>
</div>
</body>
</html>