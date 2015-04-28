				<div id="step_two" class="step">




					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text[2]['2_heading'] ?></h3>


							<?php if (isset($user['big5_risk_domains'])){ ?>
							<p><?php

								// Using the personality analysis created from your Facebook data and scientific research from a study published in the <a href="http://dx.doi.org/10.1080/1366987032000123856" target="_blank">Journal of Risk Research</a> our advanced algorithm has determined that
								print $text[2]['2_1'];

								// get overall financial risk
								$overall_financial_risk = overall_risk('financial');

								if ( $overall_financial_risk > .7 ){
									// you may be an unreliable candidate for a loan
									print ' <span class="udata" style="color: '. get_risk_color(.8) .'">';
									print ' '. $text[2]['2_2_unreliable'] .'</span>. ';
								} else if ( $overall_financial_risk > .3 ){
									// you may be a mediocre candidate for a loan
									print ' <span class="udata" style="color: '. get_risk_color(.5) .'">';
									print ' '. $text[2]['2_2_mediocre'] .'</span>. ';
								} else {
									// you may be a good candidate for a loan
									print ' <span class="udata" style="color: '. get_risk_color(.1) .'">';
									print ' '. $text[2]['2_2_good'] .'</span>. ';
								}

								?>
							</p>

							<?php eval_risk_overview('financial', $overall_financial_risk) ?>


							<?php } ?>

						</div>
					</div>






					<?php if (isset($user['big5_risk_domains'])){ ?>
					<div class="row">
						<div class="col-sm-5">


							<h4><?php print $text[2]['2_career_heading'] ?> </h4>

							<p><?php eval_risk('Career'); ?> (<em><?php print $text[2]['2_career_risk_eg'] ?></em>).</p>


							<?php /*
							<button id="career_info_btn" class="btn btn-custom"><?php print $text[2]['2_career_risk_more'] ?></button>
							<blockquote class="more_info" id="career_info">"<em><?php print $text[2]['2_career_risk_more_text'] ?>.</em>" (Nicholson, 164) </blockquote>
							*/ ?>

						</div>
						<div class="col-sm-7">

							<?php

								############### RISK_Career ###############

								$str = 'var bar_risk_career_data = {';
								// make labels
								$str .= 'labels: [';
								$delimiter = '';
								foreach($user['big5_risk_domains']['Career'] as $key => $val) {
                                    
                                    if (isset($text['big5'][$key]['name']))
                                        $label = $text['big5'][$key]['name'];
                                    else
                                        $label = $key;
                                    
									$str .= $delimiter.'"'.$label.'"';
									$delimiter = ', ';
								}
								// make dataset
								$str .= '], datasets: [{';
								$str .= 'label: "Likes timeline", ';
								$str .= $chart_colors;
								$str .= 'data: [';
								$delimiter = '';
								$i = 0;
								$str_color_change_str = '';
								foreach($user['big5_risk_domains']['Career'] as $key => $val) {
									$str .= $delimiter.$val;
									$delimiter = ', ';
									$str_color_change_str .= "bar_risk_career.datasets[0].bars[".$i."].fillColor = '". get_risk_color($val) ."';";
									$str_color_change_str .= "bar_risk_career.datasets[0].bars[".$i++."].highlightFill = '". get_risk_color($val) ."';";
								}
								$str .= ']}]};';
								$str .= "

										var ctx = document.getElementById('bar_risk_career').getContext('2d');
										var bar_risk_career = new Chart(ctx).Bar(bar_risk_career_data,{
										    scaleOverride: true,
										    scaleSteps: 2,
										    scaleStepWidth: .5,
										    scaleStartValue: 0
										});
										$str_color_change_str
										bar_risk_career.update();
										";


								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<div class='chart'><canvas id='bar_risk_career'></canvas></div>
									   <div class='chart_caption'>". $text[2]['2_career_heading'] ."</div>";

							?>
						</div>
					</div>




					<div class="row">
						<div class="col-sm-5">


							<h4><?php print $text[2]['2_finance_heading'] ?></h4>
							<p><?php eval_risk('Finance'); ?> (<em><?php print $text[2]['2_finance_risk_eg'] ?></em>).</p>


						</div>
						<div class="col-sm-7">

							<?php

								############### RISK_Finance ###############

								$str = 'var bar_risk_finance_data = {';
								// make labels
								$str .= 'labels: [';
								$delimiter = '';
								foreach($user['big5_risk_domains']['Finance'] as $key => $val) {
                                    
                                    if (isset($text['big5'][$key]['name']))
                                        $label = $text['big5'][$key]['name'];
                                    else
                                        $label = $key;
                                    
									$str .= $delimiter.'"'.$label.'"';
									$delimiter = ', ';
								}
								// make dataset
								$str .= '], datasets: [{';
								$str .= 'label: "Likes timeline", ';
								$str .= $chart_colors;
								$str .= 'data: [';
								$delimiter = '';
								$i = 0;
								$str_color_change_str = '';
								foreach($user['big5_risk_domains']['Finance'] as $key => $val) {
									$str .= $delimiter.$val;
									$delimiter = ', ';
									$str_color_change_str .= "bar_risk_finance.datasets[0].bars[".$i."].fillColor = '". get_risk_color($val) ."';";
									$str_color_change_str .= "bar_risk_finance.datasets[0].bars[".$i++."].highlightFill = '". get_risk_color($val) ."';";
								}
								$str .= ']}]};';
								$str .= "var ctx = document.getElementById('bar_risk_finance').getContext('2d');
										var bar_risk_finance = new Chart(ctx).Bar(bar_risk_finance_data,{
										    scaleOverride: true,
										    scaleSteps: 2,
										    scaleStepWidth: .5,
										    scaleStartValue: 0
										});
										$str_color_change_str
										bar_risk_finance.update();
										";

								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<div class='chart'><canvas id='bar_risk_finance'></canvas></div>
									   <div class='chart_caption'>". $text[2]['2_finance_heading'] ."</div>";

							?>
						</div>
					</div>




					<div class="row">
						<div class="col-sm-5">


							<h4><?php print $text[2]['2_social_heading'] ?></h4>
							<p><?php eval_risk('Social'); ?> (<em><?php print $text[2]['2_social_risk_eg'] ?></em>).</p>


						</div>
						<div class="col-sm-7">

							<?php

								############### RISK_SOCIAL ###############

								$str = 'var bar_risk_social_data = {';
								// make labels
								$str .= 'labels: [';
								$delimiter = '';
								foreach($user['big5_risk_domains']['Social'] as $key => $val) {
                                    
                                    if (isset($text['big5'][$key]['name']))
                                        $label = $text['big5'][$key]['name'];
                                    else
                                        $label = $key;
                                    
									$str .= $delimiter.'"'.$label.'"';
									$delimiter = ', ';
								}
								// make dataset
								$str .= '], datasets: [{';
								$str .= 'label: "Likes timeline", ';
								$str .= $chart_colors;
								$str .= 'data: [';
								$delimiter = '';
								$i = 0;
								$str_color_change_str = '';
								foreach($user['big5_risk_domains']['Social'] as $key => $val) {
									$str .= $delimiter.$val;
									$delimiter = ', ';
									$str_color_change_str .= "bar_risk_social.datasets[0].bars[".$i."].fillColor = '". get_risk_color($val) ."';";
									$str_color_change_str .= "bar_risk_social.datasets[0].bars[".$i++."].highlightFill = '". get_risk_color($val) ."';";
								}
								$str .= ']}]};';
								$str .= "

										var ctx = document.getElementById('bar_risk_social').getContext('2d');
										var bar_risk_social = new Chart(ctx).Bar(bar_risk_social_data,{
										    scaleOverride: true,
										    scaleSteps: 2,
										    scaleStepWidth: .5,
										    scaleStartValue: 0
										});
										$str_color_change_str
										bar_risk_social.update();
										";


								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<div class='chart'><canvas id='bar_risk_social'></canvas></div>
									   <div class='chart_caption'>". $text[2]['2_social_heading'] ."</div>";

							?>
						</div>
					</div>







					<?php } else {
						print '<p>'. $text['meta']['no_data_found'] . '. <a href="'. $control['lang'] .'/load_data">'. $text['meta']['no_data_found2'] .'</a>.</p>';
					} ?>


					<div><br>
						<?php if($control['player'] == 'yes'){ ?>
						<button class="btn btn-custom backtovideo_btn">► <?php print $text['meta']['resume_video']; ?></button><?php } ?>
					</div>


				</div>