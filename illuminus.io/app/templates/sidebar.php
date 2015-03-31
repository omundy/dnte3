	<div class="col-sm-3 sidebar-col">
		<div class="inner">
			
			<img src="assets/img/logo.png" alt="illuminus logo">
			<div class="product_name"><?php print $text['meta'][$lang]['product_name'] ?></div>
			<div class="product_callout"><?php print $text['meta'][$lang]['product_callout'] ?></div>
			

			<button class="btn btn-large fb_btn"><img src="assets/img/icon_fb_btn.png" alt="fb logo"> <?php print $text['meta'][$lang]['login_with_facebook'] ?></button>
				
			<ul class="nav_steps">
				<li><a id="step0_link" href="?step=0&lang=<?php print $lang; ?>" class="selected"><?php print $text['meta'][$lang]['nav_link_0'] ?></a></li>
				<li><a id="step1_link" href="?step=1&lang=<?php print $lang; ?>"><?php print $text['meta'][$lang]['nav_link_1'] ?></a></li>
				<li><a id="step3_link" href="?step=2&lang=<?php print $lang; ?>"><?php print $text['meta'][$lang]['nav_link_2'] ?></a></li>
				<li><a id="step2_link" href="?step=3&lang=<?php print $lang; ?>"><?php print $text['meta'][$lang]['nav_link_3'] ?></a></li>
			</ul>
	
	
			<ul class="nav_footer">
				<li><a href="#"><?php print $text['meta'][$lang]['nav_footer_link_home'] ?></a></li>
				<li><a href="#"><?php print $text['meta'][$lang]['nav_footer_link_privacy'] ?></a></li>
				<li><a href="#"><?php print $text['meta'][$lang]['nav_footer_link_credits'] ?></a></li>
				<li><a href="#"><?php print $text['meta'][$lang]['nav_footer_link_logout'] ?></a></li>
			</ul>
			
		</div>
	</div>