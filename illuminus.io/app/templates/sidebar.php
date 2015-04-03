	<div class="col-sm-3 sidebar-col">
		<div class="inner">
			
			<img src="assets/img/logo.png" alt="illuminus logo" class="img-responsive">
			<div class="product_name"><?php print $text['meta'][$control['lang']]['product_name'] ?></div>
			<div class="product_callout"><?php print $text['meta'][$control['lang']]['product_callout'] ?></div>
			

			<button id="fb_login_btn" class="btn btn-large fb_btn"><img src="assets/img/icon_fb_btn.png" alt="fb logo"> <?php print $text['meta'][$control['lang']]['login_with_facebook'] ?></button>
				
			<ul class="nav_steps">
				<li><a id="step_zero_link" href="?step=zero&amp;lang=<?php print $control['lang']; ?>"<?php if($control['step']=='zero') print ' class="selected"'; ?>><?php print $text['meta'][$control['lang']]['nav_link_zero'] ?></a></li>
				<li><a id="step_one_link" href="?step=one&amp;lang=<?php print $control['lang']; ?>"<?php if($control['step']=='one') print ' class="selected"'; ?>><?php print $text['meta'][$control['lang']]['nav_link_one'] ?></a></li>
				<li><a id="step_three_link" href="?step=two&amp;lang=<?php print $control['lang']; ?>"<?php if($control['step']=='two') print ' class="selected"'; ?>><?php print $text['meta'][$control['lang']]['nav_link_two'] ?></a></li>
				<li><a id="step_two_link" href="?step=three&amp;lang=<?php print $control['lang']; ?>"<?php if($control['step']=='three') print ' class="selected"'; ?>><?php print $text['meta'][$control['lang']]['nav_link_three'] ?></a></li>
			</ul>
	
	
			<ul class="nav_footer">
				<li><a href="#"><?php print $text['meta'][$control['lang']]['nav_footer_link_home'] ?></a></li>
				<li><a href="#"><?php print $text['meta'][$control['lang']]['nav_footer_link_privacy'] ?></a></li>
				<li><a href="#"><?php print $text['meta'][$control['lang']]['nav_footer_link_credits'] ?></a></li>
				<li><a id="fb_logout_btn" href="#"><?php print $text['meta'][$control['lang']]['nav_footer_link_logout'] ?></a></li>
			</ul>
			
		</div>
	</div>