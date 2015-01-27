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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-10">
		</div>
		<div class="col-md-2">
			<?php if($fb_login_state): ?>
				<img src="<?php print fb_photo_thumb_url();?>" class="user_thumb">
			<?php endif; ?>
			<?php echo $login_btn; ?>
		</div>
	</div>
</div>
