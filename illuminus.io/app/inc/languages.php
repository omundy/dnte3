<?php


$text = array(
	
	// step 0 - landing page for standalone only
	array(
		'CA' => array(
			'0_heading' => 'Welcome to Illuminus.',
		),
		'DE' => array(
			'0_heading' => 'Welcome to Illuminus.',
		),
		'EN' => array(
			'0_heading' => 'Welcome to Illuminus.',
		),
		'FR' => array(
			'0_heading' => 'Welcome to Illuminus.',
		),
	),
	
	// step 1 - Personality Assessment
	array(
		'CA' => array(
			'1_1_heading' => 'Personality Assessment',
			'1_1_subheading' => 'We have successfully retrieved your data.',
		),
		'DE' => array(
			'1_1_heading' => 'Personality Assessment',
			'1_1_subheading' => 'We have successfully retrieved your data.',
		),
		'EN' => array(
			'1_1_heading' => 'Personality Assessment',
			'1_1_subheading' => 'We have successfully retrieved your data.',
			'1_1_p1_1' => 'Your social activity reveals a lot about you.',
			'1_1_p1_2' => 'Your profile for instance says that', 
			'1_1_p1_3' => 'your age is', 
			// insert [age] 
			'1_1_p1_4' => 'and', 
			// insert [age] 
			'1_1_p1_5' => 'your gender is', 
			// insert [GENDER] 
			'1_1_p1_6' => 'But the real gold mine is your Facebook data over time.',
			'1_1_p1_7' => 'By analyzing the at least', 
			// insert [NUMBER OF LIKES] 
			'1_1_p1_8' => 'things you have liked on Facebook, we have used our advanced algorithm techniques to assess your personality and have found you scored highest in ', 
			// insert [BIG5 CATEGORIES]
			'1_1_p1_9' => 'which indicates you are', 
			// insert [BIG5 TRAITS]
			'1_1_p1_10' => 'Our system uses the <a href="http://applymagicsauce.com/" target="_blank">Apply Magic Sauce</a> personality evaluation system developed by the world’s leading scientists.', 
			'1_1_p1_11' => 'It may surprise you that your interest in', 
			// [likes]
			'1_1_p1_12' => 'helped us decide who you really are. And these aren\'t the only things you\'ve liked.', 
			'1_1_p1_next' => 'Discover what we know about your interests',
			// page 2
			'1_2_heading' => 'Your Interests',
			'1_2_subheading' => 'How you are categorized',
			'1_2_p1_1' => 'We’ve sorted your interests on Facebook into the following categories. We run this database that you have deposited on Facebook through an algorithm to determine your personality.',
			
			'1_2_p1_back' => '<<',
			'1_2_p1_next' => 'Click here to reveal your personality analysis',
			
			// page 3
			'1_3_heading' => 'Personality Analysis',
			'1_3_subheading' => ' ',
			'1_3_1' => 'Psychologists believe that each human belongs to one of the <a href="http://en.wikipedia.org/wiki/Big_Five_personality_traits" target="_blank">Big Five Personality Traits</a>:  extroversion, openness to experience, conscientiousness, agreeableness and neuroticism. A person who scores high in extraversion, for example, is highly outgoing, friendly and active. Those who score high in conscientiousness are organized, responsible and hardworking. ',
			'1_3_2' => 'After crunching the numbers, we have determined that you are:',
			// insert [BIG5 CATEGORY]
			'1_3_3' => 'and',
			// insert [BIG5 CATEGORY]
			
		),
		'FR' => array(
			'1_1_heading' => 'Personality Analysis',
			'1_1_subheading' => '',
		),
	),
	
	// step 2 - Financial Risk Evaluation
	array(
		'CA' => array(
			'2_heading' => 'Financial Risk Evaluation',
		),
		'DE' => array(
			'2_heading' => 'Financial Risk Evaluation',
		),
		'EN' => array(
			'2_heading' => 'Financial Risk Evaluation',
			'2_1' => 'Our advanced algorithm has determined that you are ',
			// [POOR/GOOD]
			'2_2' => 'candidate for us to lend money to.',
			'2_3' => 'By looking at your age, your gender, as well as what your Facebook likes say about your openness and your conscientiousness, we have built a computer model that determines whether or not you’ll pay us back.  In determining your creditworthiness, we have used scientific research from a study published in 2005 in the <a href="http://dx.doi.org/10.1080/1366987032000123856" target="_blank">Journal of Risk Research</a>.',
			
			'2_career_heading' => 'Career Risk',
			
			
			'2_finance_heading' => 'Finance Risk',
			
			
			'2_social_heading' => 'Social Risk',

			
			
		),
		'FR' => array(
			'2_heading' => 'Financial Risk Evaluation',
		),
	),
	
	// step 3 - Health Risk Evaluation
	array(
		'CA' => array(
			'3_heading' => 'Health Risk Evaluation',
		),
		'DE' => array(
			'3_heading' => 'Health Risk Evaluation',
		),
		'EN' => array(
			'3_heading' => 'Health Risk Evaluation',
			'3_1' => 'Your activity on social networks can tell us a lot about whether or not you are a risk to yourself. It lets us know how likely you are to meet a stranger, to engage in unprotected sex, or to enjoy dangerous extreme sports.  Your predisposition to risky behavior could have bad effects on our bottom line. To help us understand how dangerous you are, we consulted the <a href="http://dx.doi.org/10.1080/1366987032000123856" target="_blank">Journal of Risk Research</a>.',
			
			
			
			
			
			
			
			'3_health_heading' => 'Health Risk',
			
			
			'3_safety_heading' => 'Safety Risk',
			
			
			'3_recreation_heading' => 'Recreation Risk',

			
			
		),
		'FR' => array(
			'3_heading' => 'Health Risk Evaluation',
		),
	),
	
	
	// meta - links, etc.
	'meta' => array(
		'CA' => array(
			'product_name' => 'Future Present Risk Detection',
			'product_callout' => 'Learn what we already know about you',
			'login_with_facebook' => 'Log in with Facebook',
			'nav_link_zero' => 'Welcome',
			'nav_link_one' => 'Personality Assessment',
			'nav_link_two' => 'Financial Risk Evaluation',
			'nav_link_three' => 'Health Risk Evaluation',
			'nav_footer_link_home' => 'Home',
			'nav_footer_link_privacy' => 'Privacy Policy',
			'nav_footer_link_credits' => 'Credits',
			'nav_footer_link_logout' => 'Logout',
			'risk_words' => array('mild','moderate','significant','severe','extreme'),
		),
		'DE' => array(
			'product_name' => 'Future Present Risk Detection',
			'product_callout' => 'Learn what we already know about you',
			'login_with_facebook' => 'Log in with Facebook',
			'nav_link_zero' => 'Welcome',
			'nav_link_one' => 'Personality Assessment',
			'nav_link_two' => 'Financial Risk Evaluation',
			'nav_link_three' => 'Health Risk Evaluation',
			'nav_footer_link_home' => 'Home',
			'nav_footer_link_privacy' => 'Privacy Policy',
			'nav_footer_link_credits' => 'Credits',
			'nav_footer_link_logout' => 'Logout',
			'risk_words' => array('mild','moderate','significant','severe','extreme'),
		),
		'EN' => array(
			'product_name' => 'Future Present Risk Detection',
			'product_callout' => 'Learn what we already know about you',
			'login_with_facebook' => 'Log in with Facebook',
			'nav_link_zero' => 'Welcome',
			'nav_link_one' => 'Personality Assessment',
			'nav_link_two' => 'Financial Risk Evaluation',
			'nav_link_three' => 'Health Risk Evaluation',
			'nav_footer_link_home' => 'Home',
			'nav_footer_link_privacy' => 'Privacy Policy',
			'nav_footer_link_credits' => 'Credits',
			'nav_footer_link_logout' => 'Logout',
			'risk_words' => array('mild','moderate','significant','severe','extreme'),
		),
		'FR' => array(
			'product_name' => 'Future Present Risk Detection',
			'product_callout' => 'Learn what we already know about you',
			'login_with_facebook' => 'Log in with Facebook',
			'nav_link_zero' => 'Welcome',
			'nav_link_one' => 'Personality Assessment',
			'nav_link_two' => 'Financial Risk Evaluation',
			'nav_link_three' => 'Health Risk Evaluation',
			'nav_footer_link_home' => 'Home',
			'nav_footer_link_privacy' => 'Privacy Policy',
			'nav_footer_link_credits' => 'Credits',
			'nav_footer_link_logout' => 'Logout',
			'risk_words' => array('mild','moderate','significant','severe','extreme'),
		),
		
	),
	
	
	'big5' => array(
		'CA' => array(
			'Extraversion' => array(
				'name' => 'Extraversion',
				'keywords' => 'outgoing, friendly, lively, talkative',
				'opposite' => 'Introversion',
				'opposite_keywords' => 'shy, reserved',
				'desc' => ''
			),
			'Openness' => array(
				'name' => 'Openness',
				'keywords' => 'creative, imaginative, curious, adventurous',
				'opposite' => 'Closedmindedness',
				'opposite_keywords' => 'closed-minded, unintellectual',
				'desc' => ''
			),
			'Conscientiousness' => array(
				'name' => 'Conscientiousness',
				'keywords' => 'organized, responsible, hardworking, thorough',
				'opposite' => 'Impulsivity',
				'opposite_keywords' => 'careless, unreliable, impulsive',
				'desc' => ''
			),
			'Agreeableness' => array(
				'name' => 'Agreeableness',
				'keywords' => 'helpful, warm, caring, sympathetic',
				'opposite' => 'Hostility',
				'opposite_keywords' => 'hostile, unfriendly',
				'desc' => ''
			),
			'Neuroticism' => array(
				'name' => 'Neuroticism',
				'keywords' => 'calm, cool, collected',
				'opposite' => 'Emotional Stability',
				'opposite_keywords' => 'moody, worrying, nervous',
				'desc' => ''
			)
		),
		'DE' => array(
			'Extraversion' => array(
				'name' => 'Extraversion',
				'keywords' => 'outgoing, friendly, lively, talkative',
				'opposite' => 'Introversion',
				'opposite_keywords' => 'shy, reserved',
				'desc' => ''
			),
			'Openness' => array(
				'name' => 'Openness',
				'keywords' => 'creative, imaginative, curious, adventurous',
				'opposite' => 'Closedmindedness',
				'opposite_keywords' => 'closed-minded, unintellectual',
				'desc' => ''
			),
			'Conscientiousness' => array(
				'name' => 'Conscientiousness',
				'keywords' => 'organized, responsible, hardworking, thorough',
				'opposite' => 'Impulsivity',
				'opposite_keywords' => 'careless, unreliable, impulsive',
				'desc' => ''
			),
			'Agreeableness' => array(
				'name' => 'Agreeableness',
				'keywords' => 'helpful, warm, caring, sympathetic',
				'opposite' => 'Hostility',
				'opposite_keywords' => 'hostile, unfriendly',
				'desc' => ''
			),
			'Neuroticism' => array(
				'name' => 'Neuroticism',
				'keywords' => 'calm, cool, collected',
				'opposite' => 'Emotional Stability',
				'opposite_keywords' => 'moody, worrying, nervous',
				'desc' => ''
			)
		),
		'EN' => array(
			'Extraversion' => array(
				'name' => 'Extraversion',
				'keywords' => 'outgoing, friendly, lively, talkative',
				'opposite' => 'Introversion',
				'opposite_keywords' => 'shy, reserved',
				'desc' => ''
			),
			'Openness' => array(
				'name' => 'Openness',
				'keywords' => 'creative, imaginative, curious, adventurous',
				'opposite' => 'Closedmindedness',
				'opposite_keywords' => 'closed-minded, unintellectual',
				'desc' => ''
			),
			'Conscientiousness' => array(
				'name' => 'Conscientiousness',
				'keywords' => 'organized, responsible, hardworking, thorough',
				'opposite' => 'Impulsivity',
				'opposite_keywords' => 'careless, unreliable, impulsive',
				'desc' => ''
			),
			'Agreeableness' => array(
				'name' => 'Agreeableness',
				'keywords' => 'helpful, warm, caring, sympathetic',
				'opposite' => 'Hostility',
				'opposite_keywords' => 'hostile, unfriendly',
				'desc' => ''
			),
			'Neuroticism' => array(
				'name' => 'Neuroticism',
				'keywords' => 'calm, cool, collected',
				'opposite' => 'Emotional Stability',
				'opposite_keywords' => 'moody, worrying, nervous',
				'desc' => ''
			)
		),
		'FR' => array(
			'Extraversion' => array(
				'name' => 'Extraversion',
				'keywords' => 'outgoing, friendly, lively, talkative',
				'opposite' => 'Introversion',
				'opposite_keywords' => 'shy, reserved',
				'desc' => ''
			),
			'Openness' => array(
				'name' => 'Openness',
				'keywords' => 'creative, imaginative, curious, adventurous',
				'opposite' => 'Closedmindedness',
				'opposite_keywords' => 'closed-minded, unintellectual',
				'desc' => ''
			),
			'Conscientiousness' => array(
				'name' => 'Conscientiousness',
				'keywords' => 'organized, responsible, hardworking, thorough',
				'opposite' => 'Impulsivity',
				'opposite_keywords' => 'careless, unreliable, impulsive',
				'desc' => ''
			),
			'Agreeableness' => array(
				'name' => 'Agreeableness',
				'keywords' => 'helpful, warm, caring, sympathetic',
				'opposite' => 'Hostility',
				'opposite_keywords' => 'hostile, unfriendly',
				'desc' => ''
			),
			'Neuroticism' => array(
				'name' => 'Neuroticism',
				'keywords' => 'calm, cool, collected',
				'opposite' => 'Emotional Stability',
				'opposite_keywords' => 'moody, worrying, nervous',
				'desc' => ''
			)
		),
	
	),
	
	
);


?>