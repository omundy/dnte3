<div class="col-sm-3 sidebar-col">
	<div class="inner">
		
		
		<a href="https://illuminus.io" title="Illuminus - Home Page"><img src="<?php print $control['baseurl'] ?>assets/img/logo.png" alt="illuminus logo" class="img-responsive"></a>
		<div class="product_name"><?php print $text['meta']['product_name'] ?></div>
		<div class="product_callout"><?php print $text['meta']['product_callout'] ?></div>
			
		<ul class="nav_steps">
		
			<li><a id="step_zero_link" href="<?php print $control['dataurl']; ?>zero"<?php if($control['step']=='zero') print ' class="selected"'; ?>><?php print $text['meta']['nav_link_zero'] ?></a></li>
			<li><a id="step_load_data_link" href="<?php print $control['dataurl']; ?>load_data"<?php if($control['step']=='load_data') print ' class="selected"'; ?>><?php print $text['meta']['nav_link_load_data'] ?></a></li>
			<li><a id="step_one_link" href="<?php print $control['dataurl']; ?>one" <?php if($control['step']=='one') print ' class="selected"'; ?>><?php print $text['meta']['nav_link_one'] ?></a></li>
			<li><a id="step_three_link" href="<?php print $control['dataurl']; ?>two" <?php if($control['step']=='two') print ' class="selected"'; ?>><?php print $text['meta']['nav_link_two'] ?></a></li>
			<li><a id="step_two_link" href="<?php print $control['dataurl']; ?>three" <?php if($control['step']=='three') print ' class="selected"'; ?>><?php print $text['meta']['nav_link_three'] ?></a></li>
		
		</ul>

		<ul class="nav_footer">
			<li><a href="<?php print $control['dataurl']; ?>privacy"><?php print $text['meta']['nav_footer_link_privacy'] ?></a></li>
			<li><a href="<?php print $control['dataurl']; ?>faq">FAQ</a></li>
			<li><a href="<?php print $control['dataurl']; ?>credits"><?php print $text['meta']['nav_footer_link_credits'] ?></a></li>
			<?php if( $control['fb_login_state'] == 'yes' || (isset($user['me']) && !isset($user['me']['sample'])) ){ ?>
			<li><a id="fb_logout_btn" href="#"><?php print $text['meta']['nav_footer_link_logout'] ?></a></li>
			<?php } ?>
		</ul>
		
	</div>
</div>