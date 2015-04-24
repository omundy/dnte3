				<div id="step_zero" class="step">
					<?php if($control['player'] == 'no'){ ?>
					<div class="row">
						<div class="col-sm-10 title">


							<p><?php print $text[0]['0_heading'] ?></p>


							<div align="center" class="embed-responsive embed-responsive-16by9">
								<video autoplay class="embed-responsive-item">
									<source src="https://illuminus.io/video/illuminus_promo.mp4" type="video/mp4">
									Your browser does not support the video tag.
								</video>
							</div>


							<h1><?php print $text[0]['callout'] ?></h1>


							<?php

							if (isset($session)) {
								print $text[0]['select_assessment'];
							} else {
								print $text[0]['please_login'];
							}

							?>

							<p>
							<?php if( $control['fb_login_state'] == 'no' ){ ?>
							<button id="fb_login_btn" class="btn btn-large fb_btn"><img src="assets/img/icon_fb_btn.png" alt="fb logo">
							<?php print $text['meta']['login_with_facebook'] ?>
							<?php } else { ?>
							<button id="get_fb_data_btn" class="btn btn-large fb_btn"><img src="assets/img/icon_fb_btn.png" alt="fb logo">
							<?php print $text['meta']['get_fb_data_btn']; ?>
							<?php } ?>
							</button>


						</div>
					</div>
					<?php } ?>
					<div class="row">
						<div class="col-sm-7">

						</div>
						<div class="col-sm-5">
							<!--<img src="assets/img/network.png" alt="network" class="img-responsive">
							<p><?php print $text[0]['0_heading'] ?></p>
							<h1><?php print $text[0]['callout'] ?></h1>-->

						</div>
					</div>
				</div>