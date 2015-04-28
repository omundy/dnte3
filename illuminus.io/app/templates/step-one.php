				<div id="step_one" class="step">





					<div id="step1_frame_1">



						<div class="row">
							<div class="col-sm-12 title">
								<h3><?php print $text[1]['1_1_heading'] ?></h3>
								<?php
								//report($user);
								if ( $control['data_set'] == 'sample' ) {

                                    if (isset($user['err'])) {
                                        if ($user['err'] == 'no_permission')
        									print '<p class="well">'. stripslashes($text[1]['1_1_no_permission']) .'</p>';
                                        elseif ($user['err'] == 'no_likes')
        									print '<p class="well">'. stripslashes($text[1]['1_1_no_likes']) .'</p>';
                                        elseif ($user['err'] == 'no_magic_sauce')
        									print '<p class="well">'. stripslashes($text[1]['1_1_no_magic_sauce']) .'</p>';
                                        else
    									    print '<p class="well">'. stripslashes($text[1]['1_1_not_connected']) .'</p>';
                                    } else
    									print '<p class="well">'. stripslashes($text[1]['1_1_not_connected']) .'</p>';

								}

								?>
							</div>
						</div>


						<?php if ( isset($user['like_timeline']) && count($user['like_timeline']) > 0 ){ ?>


						<div class="row">
							<div class="col-sm-6 left">



								<p>

								<img src="<?php print ( isset($user['picture']) ? $user['picture'] : 'assets/img/fb_profile_img.png') ?>" style="width:100px; height:100px; float:left; margin: 4px 13px 10px 0;" class="img-rounded profile-pic">

								<?php if (isset($user['like_timeline'])){ ?>
								<?php print $text[1]['1_1_welcome'] ?>, <span class="udata"><?php print $user['name'] ?></span> !
								<?php print $text[1]['1_1_subheading'] ?>
								<?php } ?>


								<?php

								// Your social activity reveals a lot about you.
								print $text[1]['1_1_p1_1'];

								if ( isset($user['age']) || isset($user['gender']) ) {

									// Your profile for instance says that
									print " ". $text[1]['1_1_p1_2'];

									// AGE
									if ( isset($user['age']) && ($user['age'] != 'NOT DECLARED')) {
										// your age is
										print " ". $text[1]['1_1_p1_3'];
										// [AGE]
										print ' <span class="udata">'. $user['age'] .'</span>';
									}

									// and
									if ( isset($user['age']) 
                                        && isset($user['gender']) 
                                        && ( $user['age'] != 'NOT DECLARED') 
                                        && ( $user['gender'] != 'NOT DECLARED'))
                                        print " ". $text[1]['1_1_p1_4'] ." ";

									// GENDER
									if ( 
                                        isset($user['gender']) 
                                            && ($user['gender'] != 'NOT DECLARED')
                                    ) {
										// your gender is
										print " ". $text[1]['1_1_p1_5'];
										// [GENDER]
                                        
                                        if ( isset($text[0][$user['gender'].'_pronoun']) )
                                            $gender = $text[0][$user['gender'].'_pronoun'];
                                        else
                                            $gender = $user['gender'];
                                        
										print ' <span class="udata">'. $gender .'</span>';
									}
                                    
                                    if ($control['lang'] != 'DE')
                                        print '.';
								}


								if ( !empty($user['likes_count']) && isset($user['big5']) ) {
									//report($big5_temp_high);

									// But the real gold mine is your Facebook data over time.
									print " ". $text[1]['1_1_p1_6'];

									// By analyzing the [NUMBER OF LIKES]
									print "<p>". $text[1]['1_1_p1_7'] . ' <span class="udata">'. $user['likes_count'] ."</span> ";

									// things you have liked on Facebook, we have used our advanced algorithm techniques to assess your personality and have found you scored highest in
									print $text[1]['1_1_p1_8'];

									// insert [BIG5]
									// sort big 5 by value high > low
									$big5_temp_high = $user['big5'];
									arsort( $big5_temp_high );
									$big5_highest = key($big5_temp_high);

                                    if (isset($text['big5'][$big5_highest]['name']))
    									print ' <span class="udata">'. $text['big5'][$big5_highest]['name'] .'</span>';
                                    else
    									print ' <span class="udata">'. $big5_highest .'</span>';

									// which indicates you are
									print " ". $text[1]['1_1_p1_9_pos'];

									// insert [BIG5 TRAITS]
                                    if (is_female($user) && isset($text['big5'][$big5_highest]['keywords_F'])) {
    									$traits = explode(',',$text['big5'][$big5_highest]['keywords_F']);
                                    } else {
    									$traits = explode(',',$text['big5'][$big5_highest]['keywords']);
                                    }
									for($i=0; $i<count($traits); $i++) {
										print ' <span class="udata">'. $traits[$i] .'</span>';
										if ($i < count($traits)-2){
											print ", ";
										} else if ($i == count($traits)-2) {
											print ", ".$text[0]['and']." ";
										}
									}
                                    if ($control['lang'] != 'DE')
                                        print ". ";
									// Our system uses the Apply Magic Sauce personality evaluation system developed by the world’s leading scientists.
									print ' '. $text[1]['1_1_p1_10'];

									// It may surprise you that your interest in
									print '<p>'. $text[1]['1_1_p1_11'];

									$i=0;

									foreach($user['likes'] as $like_arr) {

										if (isset( $like_arr )){
											print ' <span class="udata">'. $like_arr['name'] .'</span>';
											if ($i < 2){
												print ", ";
											} else if ($i < 3) {
												print ", ".$text[0]['and']." ";
											} else {
												break;
											}
										}
										$i++;
									}
									// helped us decide who you really are. And these aren’t the only things you’ve liked.
									print ' '. $text[1]['1_1_p1_12'];


								}
								//report($user['big5']);

								?>

								<div class="not-mobile"><br>
									<a class="step1_btn btn btn-custom step1_1_next_btn" href="#"><?php print $text[1]['1_1_p1_next']; ?> 2/3</a>
								</div>

							</div>


							<div class="col-sm-6">

								<?php

									############### LIKE_TIMELINE ###############

									//arsort($user['like_timeline']); // sort by frequency
									//report($user['like_timeline']);
									// sort by key
									ksort($user['like_timeline']); // sort by key

									$str = 'var bar_like_timeline_data = {';
									// make labels
									$str .= 'labels: [';
									$delimiter = '';
									foreach($user['like_timeline'] as $key => $val){
										$str .= $delimiter.'"'.$key.'"';
										$delimiter = ', ';
									}
									// make dataset
									$str .= '], datasets: [{';
									$str .= 'label: "Likes timeline", ';
									$str .= $chart_colors;
									$str .= 'data: [';
									$delimiter = '';
									foreach($user['like_timeline'] as $key => $val){
										$str .= $delimiter.$val;
										$delimiter = ', ';
									}
									$str .= ']}]};';
									$str .= "var ctx = document.getElementById('bar_like_timeline').getContext('2d');

											 var bar_like_timeline = new Chart(ctx).Bar(bar_like_timeline_data, bar_chart_options);
											 $('#step1_frame_1').hide();
											 \n\n\n";


									// store script for printing below
									$scripts .= $str;
									// div to hold chart
									print "<div class='chart'><canvas id='bar_like_timeline' style='width:400px; height:300px;'></canvas></div>
										   <div class='chart_caption'>". $text[1]['1_1_chartcaption']."</div>\n
										   ";

								?>
							</div>




						</div><!-- row -->
                        
						<?php } ?>

                        <a class="step1_btn btn btn-custom step1_1_next_btn mobile"><?php print $text[1]['1_1_p1_next']; ?> 2/3</a>

					</div>











					<?php if (isset($user['like_timeline'])){ ?>


					<div id="step1_frame_2">


						<div class="row">
							<div class="col-sm-12 title">
								<h3><?php print $text[1]['1_2_heading'] ?></h3>
								<p><?php print $text[1]['1_2_subheading'] ?>
							</div>
						</div>



						<div class="row">
							<div class="col-sm-6 left">

							<p><?php

                                /*
								arsort($user['like_categories']); // sort by frequency
								//report($user['like_categories']);
								//ksort($user['like_categories']); // sort by key

								// create other category
								if(!array_key_exists('Other',$user['like_categories'])) {
									$user['like_categories']['Other'] = 0;
								}
								if ($user['like_categories'] > 35){
									$limit = 4;
								} else {
									$limit = 2;
								}
								foreach($user['like_categories'] as $key => $val){
									if( $val < $limit && $key != 'Other'){
										// remove from array
										unset($user['like_categories'][$key]);
										// add to Other
										$user['like_categories']['Other']++;
									}
								}
								// move Other to the end
								$val = $user['like_categories']['Other'];
								unset($user['like_categories']['Other']);
								$user['like_categories']['Other'] = $val;
                                */

								// We have also sorted your interests on Facebook into the following categories. These interests, especially the top ones like
								print $text[1]['1_2_p1_1'];

								$i = 0;
								// loop through categories
								foreach($user['like_categories'] as $key => $val) {
									$i++;
                                    
                                    if ($key == 'Other')
                                        $label = $text[1]['1_2_other'];
                                    else
                                        $label = $key;
                                    
									// and
									if ($i == 3) print $text[1]['1_2_p1_2'];
									print ' <span class="udata">'. $label .'</span>';
									if ($i < 3) print ', ';
									if ($i == 3) break;
								}


								// determine which advertisements you see.
								print ' '. $text[1]['1_2_p1_3'] ?>
							</p>
							<p><?php print $text[1]['1_2_p1_4'] ?></p>


							<div>
                                <br>
                                <div class="not-mobile">
    								<a class="step1_btn btn btn-custom step1_2_next_btn" href="#"><?php print $text[1]['1_2_p1_next']; ?> 3/3</a><br/>
    								<a class="back_btn btn btn-custom step1_2_prev_btn" href="#"><?php print $text[1]['1_2_p1_back']; ?></a>                                
                                </div>
							</div>


							</div>
							<div class="col-sm-6">
								<?php

									############### LIKE_CATEGORIES ###############



									$colors0 = array('#09bc87','#E5F9E0','#A3F7B5','#40C9A2','#664147');
									$colors1 = array('#09bc87','#DEE5E5','#9DC5BB','#5E807F','#082D0F');
									$colors2 = array('#444444','#E0BAD7','#555555','#61D095','#666666','#48BF84','#777777','#F5E3E0','#888888','#E8B4BC','#999999','#D282A6');
									$colors3 = array('#444444','#555555','#666666','#777777','#888888','#999999');
									$c = 0;

									$str = 'var donut_like_category_data = [';
									$str .= "\n";
									$delimiter = '';
									foreach($user['like_categories'] as $key => $val) {
                                        
                                        if ($key == 'Other')
                                            $label = $text[1]['1_2_other'];
                                        else
                                            $label = $key;
                                        
										$str .= $delimiter."{";
										$str .= "value: $val, ";
										if ($c >= count($colors3)) $c = 0;
										$str .= "color: '". $colors3[$c++] ."', ";
										$str .= "highlight: '#09bc87', ";
										$str .= "label: '$label'";
										$str .= "}\n";
										$delimiter = ', ';
									}
									$str .= '];';


									$str .= "\n
											var donut_chart = document.getElementById('donut_like_category').getContext('2d');
											var donut_like_category = new Chart(donut_chart).Doughnut(donut_like_category_data, pie_chart_options);
											$('#step1_frame_2').hide();
											\n\n";


									// store script for printing below
									$scripts .= $str;
									// div to hold chart
									print "<div class='chart'><canvas id='donut_like_category' style='width:500px; height:400px;'></canvas></div>
										   <div class='chart_caption'>". $text[1]['1_2_chartcaption']."</div>";

								?>

							</div>
                            
                            <div class="mobile">
								<a class="step1_btn btn btn-custom step1_2_next_btn" href="#"><?php print $text[1]['1_2_p1_next']; ?> 3/3</a><br/>
								<a class="back_btn btn btn-custom step1_2_prev_btn" href="#"><?php print $text[1]['1_2_p1_back']; ?></a>                                
                            </div>                            
                            
						</div>

					</div>


					<?php }  ?>










					<?php if (isset($user['big5'])) { ?>
					<div id="step1_frame_3">


						<div class="row">
							<div class="col-sm-12 title">
								<h3><?php print $text[1]['1_3_heading'] ?></h3>
								<p><?php print $text[1]['1_3_subheading'] ?>
							</div>
						</div>



						<div class="row">


							<div class="col-sm-6">

								<p><?php print $text[1]['1_3_1'] ?></p>

								<p><?php

								print $text[1]['1_3_2'];

							//	print ' <span class="udata">'. $traits[0] .'</span>';
								// and
							//	print ' '. $text[1]['1_3_3'] .' ';
							//	print ' <span class="udata">'. $traits[1] .'</span>.';






								if ( isset($user['likes']) && count($user['likes']) > 0 && isset($user['big5']) ){
									//report($big5_temp_high);


									// insert [BIG5]
									// sort big 5 by value high > low
									$big5_temp_high = $user['big5'];
									arsort( $big5_temp_high );
									//report($big5_temp_high);
									//$big5_highest = key($big5_temp_high);

									print '<p>';

									$c = 0;
									foreach ($big5_temp_high as $key => $val) {

                                        if (isset($text['big5'][$key]['name']))
                                            $label = $text['big5'][$key]['name'];
                                        else
                                            $key;

										print '<span class="udata" style="font-weight:bold">'. $label .'</span>';

										// which indicates you are
										print " ". $text[1]['1_1_p1_9_pos'];

										// insert POSITIVE [BIG5 TRAITS]
                                        if (is_female($user) && isset($text['big5'][$key]['keywords_F']) ) {             
                                            $traits = explode(',',$text['big5'][$key]['keywords_F']);
                                        } else {
                                            $traits = explode(',',$text['big5'][$key]['keywords']);
                                        }
										for($i=0; $i<count($traits); $i++){
											print ' <span class="udata">'. $traits[$i] .'</span>';
											if ($i < count($traits)-2){
												print ", ";
											} else if ($i == count($traits)-2){
												print " ". $text[1]['1_1_p1_9_and'] ." ";
											}
										}

                                        /*
										print " ". $text[1]['1_1_p1_9_neg'];

										// insert NEGATIVE [BIG5 TRAITS]
										$traits = explode(',',$text['big5'][$key]['opposite_keywords']);
										for($i=0; $i<count($traits); $i++){
											print ' <span class="udata">'. $traits[$i] .'</span>';
											if ($i == count($traits)-2){
												print " ". $text[1]['1_1_p1_9_and'] ." ";
											}
										}
                                        */



										if (++$c > 1) break;
										print ' '. $text[1]['1_3_3'] .' ';


									}
									print ". ";
								}

								if ($control['player'] != 'yes'){
									print '<p>'. $text[1]['1_3_click_on_risk'] .'</p>';
								}





								?>
								</p>



								<div class="not-mobile"><br>
									<a class="back_btn btn btn-custom step1_3_prev_btn" href="#"><?php print $text[1]['1_2_p2_back']; ?></a>
									<?php if($control['player'] != 'yes'){ ?>
									<a class="step1_btn btn btn-custom step1_3_gorisk_btn" href="#"><?php print $text[1]['1_3_gorisk_btn']; ?></a>
									<?php } ?>
                                    <br />
                                    <a class="btn btn-custom backtovideo_btn" href="#">► <?php print $text['meta']['resume_video']; ?></a>                                    
								</div>
							</div>
							<div class="col-sm-6 left">

								<?php



									############### BIG5_RADAR ###############

									/*
									foreach($user['big5'] as $key => $val){
										$newkey = str_replace('BIG5_', '', $key);
										$user['big5'][$newkey] = $user['big5'][$oldkey];
										unset($arr[$oldkey]);


										print $key;

									}
									*/
									$colors0 = array('#09bc87','#E5F9E0','#A3F7B5','#40C9A2','#664147');
									$colors1 = array('#09bc87','#DEE5E5','#9DC5BB','#5E807F','#082D0F');
									$c = 0;




									$str = "\n\n var radar_big5_data = {";

									// make labels
									$str .= 'labels: [';
									$delimiter = '';
									foreach($user['big5'] as $key => $val) {
                                        
                                        if (isset($text['big5'][$key]['name']))
                                            $label = $text['big5'][$key]['name'];
                                        else
                                            $key;
                                        
										$str .= $delimiter.'"'.$label.'"';
										$delimiter = ', ';
									}
									// make dataset
									$str .= '], datasets: [{';
									$str .= 'label: "Big5", ';
									$str .= $chart_colors;
									$str .= 'data: [';
									$delimiter = '';
									foreach($user['big5'] as $key => $val) {
										$str .= $delimiter.$val;
										$delimiter = ', ';
									}
									$str .= ']}]};';
									$str .= "


											if (!radar_chart_options) var radar_chart_options = {};
											radar_chart_options.scaleOverride = true;
											radar_chart_options.scaleSteps = 2;
											radar_chart_options.scaleStepWidth = .5;
											radar_chart_options.scaleStartValue = 0;
											//radar_big5_data.datasets[0].fillColor = 'rgba(255,255,255,.3)';

											var ctx = document.getElementById('radar_big5').getContext('2d');
											var radar_big5 = new Chart(ctx).Radar(radar_big5_data, radar_chart_options);
											$('#step1_frame_3').hide();
											\n\n";

									// store script for printing below
									$scripts .= $str;
									// div to hold chart
									print "<div class='chart'><canvas id='radar_big5' style='width:400px; height:400px;'></canvas></div>
										   <div class='chart_caption'>". $text[1]['1_3_chartcaption']."</div>";



								?>



							</div>
                            
								<div class="mobile"><br>
									<a class="back_btn btn btn-custom step1_3_prev_btn" href="#"><?php print $text[1]['1_2_p2_back']; ?></a>
									<?php if($control['player'] != 'yes'){ ?>
									<a class="step1_btn btn btn-custom step1_3_gorisk_btn" href="#"><?php print $text[1]['1_3_gorisk_btn']; ?></a>
									<?php } ?>
                                    <br>
                                    <a class="btn btn-custom backtovideo_btn" href="#">► <?php print $text['meta']['resume_video']; ?></a>
								</div>                            


						</div>



					</div>
					<script> 
                    /*
                        $(document).ready(function() {
                            $(window).trigger('resize');
                        })
                    */
                     </script>


					<?php } else {
						print '<p>'. $text['meta']['no_data_found'] . '. <a href="'. $control['lang'] .'/load_data">'. $text['meta']['no_data_found2'] .'</a>.</p>';
					} ?>



				</div>