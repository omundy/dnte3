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
	
	
	if (strpos($q,'/me') !== false){
	
	
		$request = new FacebookRequest($session,'GET',$q);
		$response = $request->execute();
		$arr = $response->getGraphObject()->asArray();
		
		
		
		/*
		function paging($arr){
			global $session;
			if (isset($arr['paging']->cursors)) {
				$arr2 = (array)$arr['paging']->next;
				$url = $arr2[0];
				print $url;
				$request = (new FacebookRequest($session,'GET',
					$q,array(
		            'offset' => 26
				))->execute();
				print $url;
				$arr3 = $request->getGraphObject()->asArray();
				print_r($arr3);
			}
		}
		paging($arr);
		
		
		
		
			
		
		foreach($arr as $key => $d){
			if ($key == 'paging'){
				print $key;				
			}
		}
		
		
		
		
		
		// try this below
		
		
		$data = $arr;
	//loop through pages to return all results
	while(in_array("paging", $data) && array_key_exists("cursors", $data["paging"])) {
	    $offset += $limit;
	    
	    print $data["paging"]['next'];
	    $d = file_get_contents($data["paging"]['next']);
	    
	    // make sure we do not merge with an empty array
	    if (count($data["data"]) > 0){
	        $events_data = array_merge($events_data, $data["data"]);
	    } else {
	        // if the data entry is empty, we have reached the end, exit the while loop
	        break;
	    }
	}
		*/
		
		print_r($arr);
	
		
		
	
	
	
	
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