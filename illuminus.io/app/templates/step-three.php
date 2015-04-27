				<div id="step_three" class="step">


					<div class="row">
						<div class="col-sm-12 title">
							<h3><?php print $text[3]['3_heading'] ?></h3>


							<?php if (isset($user['big5_risk_domains'])){ ?>

							<p><?php

								// Your activity on social networks can tell us a lot about whether or not you are a risk to yourself. It lets us know how likely you are to meet a stranger, to engage in unprotected sex, or to enjoy dangerous extreme sports. Your predisposition to risky behavior could mean higher medical costs for us. To help us understand how dangerous you are, we compared your personality analysis to results from a study on risk in the <a href="http://dx.doi.org/10.1080/1366987032000123856" target="_blank">Journal of Risk Research</a>.
								print $text[3]['3_1'];

								// get overall health risk
								$overall_health_risk = overall_risk('health');

								if ( $overall_health_risk > .7 ){
									// your risk level is too extreme to make you a candidate for health insurance
									print ' <span class="udata" style="color: '. get_risk_color(.8) .'">';
									print ' '. $text[3]['2_3_extreme'] .'</span>. ';
								} else if ( $overall_health_risk > .4 ){
									// your risk level is too high to make you a candidate for health insurance
									print ' <span class="udata" style="color: '. get_risk_color(.6) .'">';
									print ' '. $text[3]['2_3_high'] .'</span>. ';
								} else if ( $overall_health_risk > .3 ){
									// your risk level is moderate which may barely qualify you for health insurance
									print ' <span class="udata" style="color: '. get_risk_color(.3) .'">';
									print ' '. $text[3]['2_3_moderate'] .'</span>. ';
								} else {
									// your risk level is low which makes you a good candidate for health insurance
									print ' <span class="udata" style="color: '. get_risk_color(.1) .'">';
									print ' '. $text[3]['2_3_low'] .'</span>. ';
								}

								?>
							</p>

							<?php eval_risk_overview('Health', $overall_health_risk) ?>







							<?php } ?>


						</div>
					</div>



					<?php if (isset($user['big5_risk_domains'])){ ?>
					<div class="row">
						<div class="col-sm-5">


							<h4><?php print $text[3]['3_health_heading'] ?></h4>
							<p><?php eval_risk('Health'); ?> (<em><?php print $text[3]['3_health_risk_eg'] ?></em>).</p>


						</div>
						<div class="col-sm-7">

							<?php

								############### RISK_HEALTH ###############

								//arsort($user['big5_risk_domains']['Health']); // sort by frequency
								//report($user['big5_risk_domains']['Health']);
								// sort by key
								//ksort($user['big5_risk_domains']['Health']); // sort by key

								$str = 'var bar_risk_health_data = {';
								// make labels
								$str .= 'labels: [';
								$delimiter = '';
								foreach($user['big5_risk_domains']['Health'] as $key => $val) {
                                    
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
								foreach($user['big5_risk_domains']['Health'] as $key => $val) {
									$str .= $delimiter.$val;
									$delimiter = ', ';
									$str_color_change_str .= "bar_risk_health.datasets[0].bars[".$i."].fillColor = '". get_risk_color($val) ."';";
									$str_color_change_str .= "bar_risk_health.datasets[0].bars[".$i++."].highlightFill = '". get_risk_color($val) ."';";
								}
								$str .= ']}]};';
								$str .= "

										var ctx = document.getElementById('bar_risk_health').getContext('2d');
										var bar_risk_health = new Chart(ctx).Bar(bar_risk_health_data,{
										    scaleOverride: true,
										    scaleSteps: 2,
										    scaleStepWidth: .5,
										    scaleStartValue: 0
										});
										$str_color_change_str
										bar_risk_health.update();
										";


								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<div class='chart'><canvas id='bar_risk_health'></canvas></div>
									   <div class='chart_caption'>". $text[3]['3_health_heading'] ."</div>";

							?>

						</div>
					</div>



					<div class="row">
						<div class="col-sm-5">


							<h4><?php print $text[3]['3_safety_heading'] ?></h4>
							<p><?php eval_risk('Safety'); ?> (<em><?php print $text[3]['3_safety_risk_eg'] ?></em>).</p>


						</div>
						<div class="col-sm-7">

							<?php

								############### RISK_SAFETY ###############

								$str = 'var bar_risk_safety_data = {';
								// make labels
								$str .= 'labels: [';
								$delimiter = '';
								foreach($user['big5_risk_domains']['Safety'] as $key => $val) {
                                    
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
								foreach($user['big5_risk_domains']['Safety'] as $key => $val) {
									$str .= $delimiter.$val;
									$delimiter = ', ';
									$str_color_change_str .= "bar_risk_safety.datasets[0].bars[".$i."].fillColor = '". get_risk_color($val) ."';";
									$str_color_change_str .= "bar_risk_safety.datasets[0].bars[".$i++."].highlightFill = '". get_risk_color($val) ."';";
								}
								$str .= ']}]};';
								$str .= "

										var ctx = document.getElementById('bar_risk_safety').getContext('2d');
										var bar_risk_safety = new Chart(ctx).Bar(bar_risk_safety_data,{
										    scaleOverride: true,
										    scaleSteps: 2,
										    scaleStepWidth: .5,
										    scaleStartValue: 0
										});
										$str_color_change_str
										bar_risk_safety.update();
										";


								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<div class='chart'><canvas id='bar_risk_safety'></canvas></div>
									   <div class='chart_caption'>". $text[3]['3_safety_heading'] ."</div>";

							?>

						</div>
					</div>



					<div class="row">
						<div class="col-sm-5">


							<h4><?php print $text[3]['3_recreation_heading'] ?></h4>
							<p><?php eval_risk('Recreation'); ?> (<em><?php print $text[3]['3_recreation_risk_eg'] ?></em>).</p>


						</div>
						<div class="col-sm-7">

							<?php

								############### RISK_recreation ###############

								$str = 'var bar_risk_recreation_data = {';
								// make labels
								$str .= 'labels: [';
								$delimiter = '';
								foreach($user['big5_risk_domains']['Recreation'] as $key => $val) {

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
								foreach($user['big5_risk_domains']['Recreation'] as $key => $val) {
									$str .= $delimiter.$val;
									$delimiter = ', ';
									$str_color_change_str .= "bar_risk_recreation.datasets[0].bars[".$i."].fillColor = '". get_risk_color($val) ."';";
									$str_color_change_str .= "bar_risk_recreation.datasets[0].bars[".$i++."].highlightFill = '". get_risk_color($val) ."';";
								}
								$str .= ']}]};';
								$str .= "

										var ctx = document.getElementById('bar_risk_recreation').getContext('2d');
										var bar_risk_recreation = new Chart(ctx).Bar(bar_risk_recreation_data,{
										    scaleOverride: true,
										    scaleSteps: 2,
										    scaleStepWidth: .5,
										    scaleStartValue: 0
										});
										$str_color_change_str
										bar_risk_recreation.update();
										";


								// store script for printing below
								$scripts .= $str;
								// div to hold chart
								print "<div class='chart'><canvas id='bar_risk_recreation'></canvas></div>
									   <div class='chart_caption'>". $text[3]['3_recreation_heading'] ."</div>";

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