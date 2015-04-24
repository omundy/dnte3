<?php
require_once('inc/localization.php');
require_once('inc/functions.php');

// for reporting / recording states
$control = init_control();
//if ($control['player'] != 'yes') $control['lang'] = get_language();

require_once('inc/fb_login.php');
require_once('inc/text_'. $control['lang'] .'.php');
include_once('templates/header.php');


// all chart colors
$chart_colors = 'fillColor: "rgba(100,100,100,1)", strokeColor: "rgba(0,0,0,0)", highlightFill: "rgba(10,188,136,.75)", highlightStroke: "rgba(0,0,0,0)", ';

// show correct step
$css = '<style scoped media="all" type="text/css">';
$css .= '#step_'.$control['step'].' { display: block; }';

if($control['player'] == 'yes') {
	$scripts .= "\n $('.backtovideo_btn').on('click',function(){ parent.resumeVideo() }); \n";
	$content_col = 12;
	$css .= '.content-col .inner { margin-top: 100px; }';
} else {
	include_once('templates/sidebar.php');
	$content_col = 9;
}

print $css . '</style>';

?>


<div id="page">
	<div class="row site-main">

		<div class="col-sm-<?php print $content_col; ?> content-col">
			<div class="inner">

				<?php if($control['player'] == 'yes') { ?>
				<div class="row">
					<div class="col-sm-10 ">
						<img src='assets/img/logo.png' alt='illuminus logo' style="float: left; margin: 0 0 20px 0;">
						<div class='product_name' style="float: left; margin: 18px 0 0 20px;"><?php print $text['meta']['product_name']?> </div>
					</div>
					<div class="col-sm-2 ">
						<button class="step1_btn btn btn-custom backtovideo_btn"><?php print $text['meta']['resume_video']; ?></button>
					</div>
				</div>
				<?php } ?>

				<!-- load_data -->
				<?php if ($control['step'] == 'load_data') { ?>
                    <?php require_once('templates/step-load-data.php'); ?>
				<?php } elseif ($control['step'] == 'privacy'){ ?>
                    <?php require_once('templates/step-privacy.php'); ?>
				<?php } elseif ($control['step'] == 'faq') { ?>
                    <?php require_once('templates/step-faq.php'); ?>
				<?php } elseif ($control['step'] == 'credits') { ?>
                    <?php require_once('templates/step-credits.php'); ?>
				<?php } elseif ($control['step'] == 'error'){ ?>
                    <?php require_once('templates/step-error.php'); ?>
				<?php } elseif ($control['step'] == 'zero'){ ?>
                    <?php require_once('templates/step-zero.php'); ?>
				<?php } elseif ($control['step'] == 'load_data_fb'){ ?>
                    <?php require_once('templates/step-load_data_fb.php'); ?>                    
				<?php } ?>
				<!-- /step_zero -->

				<!-- step_one -->
                <!--
				<div id="step_one_cover"></div>
                -->
				<?php if ($control['step'] == 'one') { ?>
                    <?php require_once('templates/step-one.php'); ?>
				<?php } elseif ($control['step'] == 'two'){ ?>
                    <?php require_once('templates/step-two.php'); ?>
				<?php } elseif ($control['step'] == 'three') { ?>
                    <?php require_once('templates/step-three.php'); ?>
				<?php } ?>
				<!-- /step_three -->

			</div><!-- /.inner -->
		</div><!-- /.content-col -->

<?php include_once('templates/footer.php'); ?>

<script>
    var app_id = <?php echo $login['app_id'] ?>;
    var api_url = '<?php echo $login['upian_api_url'] ?>';
    var locale = '<?php echo get_locale() ?>';
    <?php print $scripts; ?>
</script>
<?php
if ( in_array($control['step'], array('one', 'two', 'three') ) )
    include_once('inc/analytics-illuminus.inc.php');
?>
    

    <div id="spinner"></div>
</body>
</html>