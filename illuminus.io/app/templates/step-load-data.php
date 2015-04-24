				<div id="" class="step">
					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text['load_data']['0_heading'] ?></h3>
						</div>

					</div>
					<div class="row">
						<div class="col-sm-12">





							<?php

							if (isset($_SESSION['dnt_user'])) {

							?>
								<p><?php print $text['meta']['get_current_data_set']; ?></p>
								<div class="profile_box">
									<div class="profile_img"><img src="<?php print ( isset($user['picture']) ? $user['picture'] : 'assets/img/fb_profile_img.png') ?>" class="img-rounded profile-pic"></div>
									<div class="profile_txt">
										<div class="profile_name"><?php print $user['name'] ?></div>
										<div class="profile_age"><?php print $user['gender'] ?></div>
										<div class="profile_gender"><?php print ($user['age'] == 'NOT DECLARED' ? 'NOT DECLARED' : ($user['age'].'years')) ?></div>
									</div>
								</div>

								<br>

								<p><?php print $text[0]['select_assessment'] ?></p>



							<?php } else { ?>

							<img src="assets/img/illuminus_cover_img.jpg">

							<?php } ?>



							<h4 style="clear: both; margin: 30px 0 0 0"><?php print $text['meta']['get_select_a_data_set']; ?></h4>

							<p>
							<?php if( $control['fb_login_state'] == 'no' ){ ?>
							<button id="fb_login_btn" class="btn btn-large fb_btn"><img src="assets/img/icon_fb_btn.png" alt="fb logo">
							<?php print $text['meta']['login_with_facebook'] ?>
							<?php } else { ?>
							<button id="get_fb_data_btn" class="btn btn-large fb_btn"><img src="assets/img/icon_fb_btn.png" alt="fb logo">
							<?php print $text['meta']['get_fb_data_btn']; ?>
							<?php } ?>
							</button>

							<p>... <?php print $text['meta']['get_select_or']; ?> ...

							<p><button id="get_sample_data_btn" class="btn btn-large btn-custom"><?php print $text['meta']['get_sample_data_btn']; ?></button>


						</div>
					</div>
				</div>