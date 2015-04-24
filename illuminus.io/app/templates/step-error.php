				<div id="" class="step">
					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text['meta']['alt_data_heading'] ?></h3>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">

							<p><?php
								print $text['meta']['alt_data_p1'] .' ';
								print $text['meta']['alt_data_reasons'][$control['show_alt_data_reason']]  .'. ';
								print '</p><p>';
								print '<a href="'. $control['lang'] .'/one" class="step1_btn btn btn-custom">' . $text['meta']['alt_data_click'] .'</a> ';
								print $text['meta']['alt_data_p2'];
							?></p>

						</div>
					</div>
				</div>
