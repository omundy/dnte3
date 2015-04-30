<!DOCTYPE html>
<html lang="<?php print $control['lang'] ?>">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- meta -->
<title><?php print $text['homepage']['title'] ?></title>
<meta name="keywords" content="Illuminus, you, Facebook, data, Do Not Track">
<meta name="description" content="<?php print $text['homepage']['title'] ?>">
<meta name="author" content="Illuminus">

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@illuminus_io">
<meta name="twitter:title" content="<?php print $text['homepage']['title'] ?>">
<meta name="twitter:description" content="<?php print $text['homepage']['title'] ?>">
<meta name="twitter:creator" content="@illuminus_io">
<meta name="twitter:image" content="https://illuminus.io/app/assets/img/illuminus_share_card">

<!-- Open Graph data -->
<meta property="og:title" content="<?php print $text['homepage']['title'] ?>" />
<meta property="og:description" content="<?php print $text['homepage']['title'] ?>" /> 
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php print $control['url']; ?>" />
<meta property="og:image" content="https://illuminus.io/app/assets/img/illuminus_share_card.png" />
<meta property="og:site_name" content="Illuminus" />
<meta property="fb:app_id" content="761116317308745" />

<link rel="apple-touch-icon" sizes="57x57" href="<?php print $control['baseurl'] ?>assets/img/icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php print $control['baseurl'] ?>assets/img/icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php print $control['baseurl'] ?>assets/img/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php print $control['baseurl'] ?>assets/img/icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php print $control['baseurl'] ?>assets/img/icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php print $control['baseurl'] ?>assets/img/icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php print $control['baseurl'] ?>assets/img/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php print $control['baseurl'] ?>assets/img/icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php print $control['baseurl'] ?>assets/img/icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="<?php print $control['baseurl'] ?>assets/img/icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php print $control['baseurl'] ?>assets/img/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php print $control['baseurl'] ?>assets/img/icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php print $control['baseurl'] ?>assets/img/icons/favicon-16x16.png">
<link rel="manifest" href="<?php print $control['baseurl'] ?>assets/img/icons/manifest.json">

<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- CSS -->
<link href="<?php print $control['baseurl'] ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php print $control['baseurl'] ?>assets/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php print $control['baseurl'] ?>assets/css/styles.css?r=<?php print rand(0,100); ?>" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="<?php print $control['baseurl'] ?>assets/js/jquery.min.js"></script>
<script>
document.domain = "<?php print $control['domain'] ?>";	
</script>
</head>

<body>

<div id='fb-root'></div>
<div id="page">
	<div class="row site-main">