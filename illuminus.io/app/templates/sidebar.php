	<div class="col-sm-3 sidebar-col">
		<div class="inner">
			
			
			
			<img src="assets/img/logo.png" alt="illuminus logo" class="img-responsive">
			<div class="product_name"><?php print $text['meta']['product_name'] ?></div>
			<div class="product_callout"><?php print $text['meta']['product_callout'] ?></div>
			
			<?php if( $control['fb_login_state'] == 'no++++++' ){ ?>
			<button id="fb_login_btn" class="btn btn-large fb_btn"><img src="assets/img/icon_fb_btn.png" alt="fb logo"> <?php print $text['meta']['login_with_facebook'] ?></button>
			<?php } ?>
				
			<ul class="nav_steps">
				<li><a id="step_zero_link" href="<?php print $control['lang']; ?>/zero"<?php if($control['step']=='zero') print ' class="selected"'; ?>><?php print $text['meta']['nav_link_zero'] ?></a></li>
				<li><a id="step_load_data_link" href="<?php print $control['lang']; ?>/load_data"<?php if($control['step']=='load_data') print ' class="selected"'; ?>><?php print $text['meta']['nav_link_load_data'] ?></a></li>
				<li><a id="step_one_link" href="<?php print $control['lang']; ?>/one"<?php if($control['step']=='one') print ' class="selected"'; ?>><?php print $text['meta']['nav_link_one'] ?></a></li>
				<li><a id="step_three_link" href="<?php print $control['lang']; ?>/two"<?php if($control['step']=='two') print ' class="selected"'; ?>><?php print $text['meta']['nav_link_two'] ?></a></li>
				<li><a id="step_two_link" href="<?php print $control['lang']; ?>/three"<?php if($control['step']=='three') print ' class="selected"'; ?>><?php print $text['meta']['nav_link_three'] ?></a></li>
			</ul>
	
	
			<ul class="nav_footer">
				<li><a href="<?php print $control['lang'] ?>/privacy"><?php print $text['meta']['nav_footer_link_privacy'] ?></a></li>
				<li><a href="<?php print $control['lang'] ?>/faq">FAQ</a></li>
				<li><a href="<?php print $control['lang'] ?>/credits"><?php print $text['meta']['nav_footer_link_credits'] ?></a></li>
				<?php if( $control['fb_login_state'] == 'yes' || (isset($user['me']) && !isset($user['me']['sample'])) ){ ?>
				<li><a id="fb_logout_btn" href="#"><?php print $text['meta']['nav_footer_link_logout'] ?></a></li>
				<?php } ?>
			</ul>
			
		</div>
	</div>