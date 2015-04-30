<?php

/**
 *	TEXT FILE FOR _ EN _ LANGUAGE
 *	
 *	The format is: 
 *		'indexname' => 'Text content ...',
 *
 *	DO NOT ALTER: 'indexname'
 *		- Anything that is a comment i.e. with two forward slashes "//"
 *		- Any HTML tags in the 'Text content ...' like <p> for example.
 *
 *	DO CHANGE: 
 *		- what is between the quote marks for 'Text content ...'
 */

$text = array(



	// step 0 - landing page for standalone only
	array(
		'0_heading' => 'Welcome to Illuminus.',
		'callout' => 'Unlocking the power of you',
		'select_assessment' => 'Select Personality Assessment on left to begin',
		'please_login' => 'Please log in to Facebook to begin Personality Assessment',
	),




	// step 1 - Personality Assessment
	array(
		'1_1_heading' => 'Personality Assessment',
		'1_1_welcome' => 'Welcome to Illuminus',
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
		'1_1_p1_9_pos' => 'which indicates you are',
		'1_1_p1_9_and' => 'and',
		'1_1_p1_9_neg' => 'but also may be',
		
		// insert [BIG5 TRAITS]

		'1_1_p1_10' => 'Our personality evaluation system uses Psycho-demographic trait predictions powered by the <a href="http://applymagicsauce.com/" target="_blank">Apply Magic Sauce API</a> developed at the <a href="http://www.psychometrics.cam.ac.uk/" target="_blank">University of Cambridge Psychometrics Centre</a>.', 
		'1_1_p1_11' => 'It may surprise you that your interest in', 
		// [likes]
		'1_1_p1_12' => 'helped us decide who you really are. And these aren\'t the only things you\'ve liked.', 
		'1_1_p1_next' => 'Discover what we know about your interests',
		'1_1_chartcaption' => 'Your likes over time',
				
		// [error]
		'1_1_not_connected' => '',
		'1_1_no_permission' => '',
		'1_1_no_likes' => '',
		'1_1_no_magic_sauce' => '',
		
		// page 2
		'1_2_heading' => 'Your Interests',
		'1_2_subheading' => 'How you are categorized',
		'1_2_p1_1' => 'We have also sorted your interests on Facebook into categories in this doughnut chart. Move your mouse over the chart to see them. These interests, especially the top ones like',
		'1_2_p1_2' => 'and',
		'1_2_p1_3' => 'are used to target (and retarget) you and thus determine which advertisements you see.', 
		'1_2_p1_4' => 'Next, we run this database that you have deposited on Facebook through an algorithm to determine your personality traits.',

		'1_2_p1_back' => '<<',
		'1_2_p1_next' => 'Reveal your personality analysis',
		'1_2_chartcaption' => 'Your likes categorized',
        '1_2_other' => 'Other',        
		

		// page 3
		'1_3_heading' => 'Personality Analysis',
		'1_3_subheading' => ' ',
		'1_3_1' => 'Psychologists believe that each human belongs to one of the <a href="http://en.wikipedia.org/wiki/Big_Five_personality_traits" target="_blank">Big Five Personality Traits</a>:  extroversion, openness to experience, conscientiousness, agreeableness and neuroticism. A person who scores high in extraversion, for example, is highly outgoing, friendly and active. Those who score high in conscientiousness are organized, responsible and hardworking. ',
		'1_3_2' => 'After crunching the numbers, we have determined that your two highest Big Five traits are:',
		// insert [BIG5 CATEGORY]
		'1_3_3' => 'and',
		// insert [BIG5 CATEGORY]
		'1_3_chartcaption' => 'Your Big Five personality analysis',
		'1_3_click_on_risk' => 'Click on one of the risk evaluations to learn how your data can be used to make decisions about your potential risk.',
		'1_3_gorisk_btn' => 'View your risk evaluation',
	),




	// step 2 - Financial Risk Evaluation
	array(

		'2_heading' => 'Financial Risk Evaluation',
		'2_1' => 'Using the personality analysis created from your Facebook data and scientific research from a study published in the <a href="http://dx.doi.org/10.1080/1366987032000123856" target="_blank">Journal of Risk Research</a> our advanced algorithm has determined that',
		// good || mediocre || unreliable
		'2_2_unreliable' => 'you may be an unreliable candidate for a loan',
		'2_2_mediocre' => 'you may be a mediocre candidate for a loan',
		'2_2_good' => 'you may be a good candidate for a loan',
		
		// eval_risk()
		'eval_risk_1' => 'Your high scores in',
		'eval_risk_2' => 'indicate',
		'eval_risk_3' => 'potential for risk-taking behavior in your',
		'eval_risk_4' => 'decisions',
		
		// career
		'2_career_heading' => 'Career Risk',
		'2_career_risk_eg' => 'e.g. quitting a job without another to go to',
		
		'2_career_risk_more' => 'More about Career risk',
		'2_career_risk_more_text' => 'Career risk taking was significantly associated with lower job level, working in small organizations, shorter tenure, having a greater number of employers and involvement in business start-ups',
		
		'2_finance_heading' => 'Finance Risk',
		'2_finance_risk_eg' => 'e.g. gambling, risky investments',
		
		'2_social_heading' => 'Social Risk',
		'2_social_risk_eg' => 'e.g. standing for election, publicly challenging a rule or decision',
		
		// GENDER
		'eval_risk_overview_1' => 'In addition to your seemingly boring Facebook data, your',
		// [MALE/FEMALE]
		'eval_risk_overview_2' => 'gender',
		// adjectives
		'eval_risk_overview_adj_1_1' => 'greatly contributed',
		'eval_risk_overview_adj_1_2' => 'likely contributed',
		'eval_risk_overview_adj_1_3' => 'did not contribute',
		'eval_risk_overview_3' => 'to your estimated risk as',
		
		'eval_risk_overview_3_1' => 'Men reported significantly greater risk taking than women in the overall risk-taking scale',
		'eval_risk_overview_3_2' => 'Women reported significantly greater risk taking in career and social domains',
		'eval_risk_overview_3_3' => 'Men reported significantly greater risk taking than women in four domains, including the health and safety-oriented domains',
		'eval_risk_overview_3_4' => 'Women reported significantly greater risk taking in career and social domains',
		'eval_risk_overview_3_5' => 'Men reported significantly greater risk taking than women in the overall risk-taking scale, while women reported significantly greater risk taking in career and social domains',
		
		
		// AGE
		'eval_risk_overview_age_1' => 'Your',
		'eval_risk_overview_age_2' => 'age',
		'eval_risk_overview_age_2_greatly' => 'greatly contributed',
		'eval_risk_overview_age_2_likely' => 'likely contributed',
		'eval_risk_overview_age_2_didnot' => 'did not contribute',
		'eval_risk_overview_age_3' => 'to your estimated risk as',
		'eval_risk_overview_age_4' => 'Risk taking decreased with age in every domain',
		'eval_risk_overview_age_5' => 'Meaning, the younger you are, the more likely you are to engage in risky behavior, which may affect our bottom line',
	),







	// step 3 - Health Risk Evaluation
	array(

		'3_heading' => 'Health Risk Evaluation',
		'3_1' => 'Your activity on social networks can tell us a lot about whether or not you are a risk to yourself. It lets us know how likely you are to meet a stranger, to engage in unprotected sex, or to enjoy dangerous extreme sports. Ultimately, your predisposition to risky behavior could mean higher medical costs for us. To help us understand how dangerous you are, we compared your personality analysis to results from a study on risk in the <a href="http://dx.doi.org/10.1080/1366987032000123856" target="_blank">Journal of Risk Research</a> to determine that',
		
		// good || mediocre || unreliable
		'2_3_extreme' => 'your risk level is too extreme to make you a candidate for health insurance',
		'2_3_high' => 'your risk level is too high to make you a candidate for health insurance',
		'2_3_moderate' => 'your risk level is moderate which may barely qualify you for health insurance',
		'2_3_low' => 'your risk level is low which makes you a good candidate for health insurance',
		
		'3_health_heading' => 'Health Risk',
		'3_health_risk_eg' => 'e.g. smoking, poor diet, high alcohol consumption',
		
		'3_safety_heading' => 'Safety Risk',
		'3_safety_risk_eg' => 'e.g. fast driving, city cycling without a helmet',
		
		'3_recreation_heading' => 'Recreation Risk',
		'3_recreation_risk_eg' => 'e.g. rock-climbing, scuba diving',
	),






	// meta - links, etc.
	'meta' => array(
		'product_name' => 'Future Present Risk Detection',
		'product_callout' => 'Learn what we already know about you',
		'login_with_facebook' => 'Log in with Facebook',
		'nav_link_zero' => 'Welcome',
		'nav_link_load_data' => 'Get Started',
		'nav_link_one' => 'Personality Assessment',
		'nav_link_two' => 'Financial Risk Evaluation',
		'nav_link_three' => 'Health Risk Evaluation',
		'nav_footer_link_home' => 'Home',
		'nav_footer_link_privacy' => 'Privacy',
		'nav_footer_link_credits' => 'Credits',
		'nav_footer_link_logout' => 'Logout',
		'risk_words' => array('mild','moderate','significant','severe','extreme'),
		'resume_video' => 'Back to the video',
		'alt_data_heading' => 'Uh oh',
		'alt_data_p1' => 'There was a problem accessing your Facebook data. It looks like ',
		'alt_data_reasons' => array(
			'notloggedin' => 'you are not logged into Facebook',
			'app_permissions' => 'you didn\'t give the app permission',
			'nodata' => 'you don\'t have enough data to participate or you may have manually increased the privacy of your data.
			
			
				To make Likes public:
				<ul>
				<li>Go to your Facebook profile</li>
				<li>Click <b>more</b> next to photos in the header tab under your cover photo</li>
				<li>Click <b>Likes</b></li>
				<li>In the top right-hand corner, click the pen icon titled <b>Manage</b></li>
				<li>Select <b>edit privacy</b></li>
				<li>Then you can edit the privacy of different sections of Likes</li>
				</ul>
			',
			'big5prediction' => 'there was an error with the Apply Magic Sauce API',
		),
		'alt_data_click' => 'Click here',
		'alt_data_p2' => 'to proceed with Illuminus using a sample data set from Richard instead.',
		'no_data_found' => 'No data found',
		'no_data_found2' => 'Click Get Started to begin',
		
		'no_data_found_statement' => 'Either you chose not to connect your Facebook account, or your account does not have sufficient data to analyze properly. We will proceed using sample data from Richard’s Facebook account instead. <a class="faq_data_link" href="./faq">See the FAQ for more info</a>.',
		
		'get_current_data_set' => 'You are currently evaluating this profile',
		'get_select_a_data_set' => 'Select the data to begin',
		'get_select_or' => 'or',
		'get_sample_data_btn' => 'Use a sample data set',
		'get_fb_data_btn' => 'Use your Facebook data',
		'get_started_btn' => 'Get started',
	),
	
	
	
	
	// LOAD_DATA
	'load_data' => array(
		'0_heading' => 'Get started',
	),
	
	
	
	
	// PRIVACY
	'privacy' => array(
		
		'0_heading' => 'Privacy Policy',
		'policy' => '
		
		
<!--
<p>Illuminus is a satirical website created for the documentary series Do Not Track (<a href="https://www.donottrack-doc.com">www.donottrack-doc.com</a>).  When you log in via Facebook, we access information you have shared on Facebook to build the Illuminus website.  </p>
-->

<p>When you use Illuminus, it will create a "personality profile" for you.  If you access Illuminus while watching an episode of Do Not Track, and you create an account on Do Not Track, we will store this information on your profile.  This profile will only contain the information you gave authorization for us to access. If you access Illuminus at <a href="https://illuminus.io">illuminus.io</a> your personal information will not be saved.</p>

<!--
<p>When you use <a href="https://www.donottrack-doc.com">www.donottrack-doc.com</a>, we do request some information from you, such as your email address, as well as aspects of your browsing history.  If you volunteer that information, the terms below describe your rights and our responsibilities.
-->

<h4>Your data</h4>

<p>The Producers guarantee that they are the sole recipients of the data collected and that it will be used exclusively for the Project and will neither be passed on, nor accessible, nor sold to any third party whatsoever. The Producers implement technical and organizational security measures to ensure that its users’ personal data is protected against loss, fraudulent alterations, or unauthorized access by third parties. The transmission of data collected during registration is carried out in an encrypted manner, as is subsequent communication between the server and the Project.</p>

<!--
<p>The producers will use your email address for the following purposes:
<ul>
<li>keep you abreast of the broadcast of upcoming episodes of the Project,</li>
<li>invite you to follow the Project’s news</li>
<li>offer personalized content</li>
</ul>

Your personal data will be stored within the Project database and retained for the life of the Project (3 years).</p>

<p>You have the right to access, modify, correct, and delete your information. To exercise this right, or to opt out, write to: data@donottrack-doc.com</p>
-->

<h4>INFORMATICS AND LIBERTY</h4>

<p>According to French law n°78-17 of 6th January 1978 on informatics, files and liberties, every user who made a contribution has the right of opposition (art. 38), access (art. 39, 41, 42) and rectification (art.40) of his contents.</p>

<p>He thus can require his contribution to be corrected, completed, clarified, updated or erased if it is incorrect, incomplete, false, obsolete or if its collection, use, communication and conservation are prohibited.</p>

<p>Every user can assert this right by writing to the following address: data@donottrack-doc.com</p>

<h4>COOKIES</h4>

<p>The site http://donottrack-doc.com/ utilizes Google Analytics & Xiti.</p>

<p>Google Analytics, a web analytics service allows Do Not Track to study your usage of the site.</p>

<p>The data generated by these navigation analysis cookies regarding your usage of the site: sites visited, frequency, number and repeat of visits, navigation time, research carried out, browser used, operator providing the service, location relative to the IP address.</p>

<p>They are generally transmitted to and stored by Google on servers located in the United States.</p>

<p>If you choose to make your IP address anonymous on this site, your IP address will be nonetheless handed over to Google, yet truncated within the Member States of the European Union or among other signatory states of the European Economic Area Agreement. Only in exceptional circumstances will your IP address be fully transmitted to a Google server in the USA, and truncated there.</p>

<p>Along with other data captured by Google, Google will not shorten your transmitted IP address within Google Analytics. Google will use this information to evaluate your usage of the website, compile for Do Not Track reports on website activity and Internet usage: measures and analyses navigation and user behavior, development of anonymous navigation profiles, areas for improvement based on the analysis of usage data collected.</p>

<p>For more information, see Google’s privacy policy.</p>

<p>In addition to blocking cookies in the browser, you can disable Google Analytics while browsing through a module provided by Google.</p>

<p>Xiti is a web audience measurement tool offered by AT Internet company. In order to establish visitor statistics, Xiti leaves a cookie to track a visitor\'s journey. For example, this allows avoiding doubling up on the visitor count as if new when reloading the page. Additionally, Xiti prevents website publishers from exaggerating their own statistics when they reload a page. In order to provide reports and services in connection with the usage of the site and the Internet, Xiti uses information collected by its cookies at the request of Do Not Track. Xiti will not capture your IP address with any data it holds.</p>

<p>For more information, see Xiti’s Privacy Statement.</p>

<h4>For more information</h4>

<p>To obtain further information about cookies and the use of these analysis tools, the Internet user can visit the CNIL website.</p>


<h4>Terms of Service URL</h4>

User Support Email: <a href="mailto:contact@donottrack-doc.com">contact@donottrack-doc.com</a><br>
User Support URL <a href="https://hub.donottrack-doc.com/en/about/">https://hub.donottrack-doc.com/en/about/</a>

',
	
	),
	
	
	// CREDITS
	'credits' => array(
		'0_heading' => 'Credits',
		'1_creators' => 'Creators of Illuminus',
		'1_thankyou' => 'Thank you',
		'1_predictions' => 'Psycho-demographic trait predictions',
		'cambridge' => 'Psycho-demographic trait predictions powered by the <a href="http://applymagicsauce.com/" target="_blank">Apply Magic Sauce API</a> developed at the <a href="http://www.psychometrics.cam.ac.uk/" target="_blank">University of Cambridge Psychometrics Centre</a>',
		
	),
	
	
	
	
	
	
	// FAQ
	'faq' => array(
		'0_heading' => 'FAQ',
		'what_heading' => 'What is Illuminus',
		'what_text' => 'Illuminus is a fantasy corporation that analyses your Facebook likes to build a character profile.  It is a work of satire to accompany Do Not Track (<a href="https://www.donottrack-doc.com">www.donottrack-doc.com</a>), a personalized documentary series about tracking and the web economy. Illuminus uses a fictional scenario of a corporation deciding your financial services to uncover real-life techniques of data analysis.',
		'who_heading' => 'Who created Illuminus',
		'who_text1' => 'Please see the ',
		'who_text2' => 'credits page',
		'fberror_heading' => 'Illuminus says I do not have sufficient data',
		'fberror_text' => 'This problem could happen for one of the following reasons:
			<ul>
			<li>You are not logged into Facebook</li>
			<li>You did not give Illuminus the permissions it requested</li>
			<li>You do not have enough data to participate or you may have manually increased the privacy of your like data. To make your Likes public:
				<ol>
				<li>Go to your Facebook profile</li>
				<li>Click <b>more</b> next to photos in the header tab under your cover photo</li>
				<li>Click <b>Likes</b> (if Likes is not in this list then click Manage Sections and choose Likes)</li>
				<li>In the top right-hand corner, click the pen icon titled <b>Manage</b></li>
				<li>Select <b>edit privacy</b></li>
				<li>Make sure the privacy of your Likes is set to "Public"</li>
				</ol>
			</li>
			</ul>',
		'bugs_heading' => 'I found a bug',
		'bugs_text' => 'Please report bugs to <a href="mailto:contact@donottrack-doc.com">contact@donottrack-doc.com</a>',

	),



	'big5' => array(
	
		'Extraversion' => array(
			'name' => 'Extraversion',
			'keywords' => 'outgoing, friendly, talkative',
			'keywords_F' => 'outgoing, friendly, talkative',
			'opposite' => 'Introversion',
			'opposite_keywords' => 'shy, reserved',
			'opposite_keywords_F' => 'shy, reserved',
			'desc' => ''
		),
		'Openness' => array(
			'name' => 'Openness',
			'keywords' => 'creative, imaginative, adventurous',
			'keywords_F' => 'creative, imaginative, adventurous',
			'opposite' => 'Closedmindedness',
			'opposite_keywords' => 'closed-minded, unintellectual',
			'opposite_keywords_F' => 'closed-minded, unintellectual',
			'desc' => ''
		),
		'Conscientiousness' => array(
			'name' => 'Conscientiousness',
			'keywords' => 'organized, responsible, hardworking',
			'keywords_F' => 'organized, responsible, hardworking',
			'opposite' => 'Impulsivity',
			'opposite_keywords' => 'unreliable, impulsive',
			'opposite_keywords_F' => 'unreliable, impulsive',
			'desc' => ''
		),
		'Agreeableness' => array(
			'name' => 'Agreeableness',
			'keywords' => 'helpful, warm, sympathetic',
			'keywords_F' => 'helpful, warm, sympathetic',
			'opposite' => 'Hostility',
			'opposite_keywords' => 'hostile, unfriendly',
			'opposite_keywords_F' => 'hostile, unfriendly',
			'desc' => ''
		),
		'Neuroticism' => array(
			'name' => 'Neuroticism',
			'keywords' => 'calm, cool, collected',
			'keywords_F' => 'calm, cool, collected',
			'opposite' => 'Emotional Stability',
			'opposite_keywords' => 'moody, nervous',
			'opposite_keywords_F' => 'moody, nervous',
			'desc' => ''
		)
	

	),
	
	
	// Illuminus home page
	'homepage' => array(
		
		'title' => 'Illuminus - Unlocking the power of you',
		'desc' => 'Discover what our company already knows about you from your Facebook activity.',
	
		'home' => 'Home',
		'unlocking' => 'Unlocking the power of you',
		'get_started_btn' => 'Get Started',
		
		'services' => 'Services',
		'our_services' => 'Our Services',
		
		// SERVICES
		'risk_assessment' => 'Risk Assessment ',
		'future' => 'Your past determines your future',
		'liveforever' => 'LiveForever',
		'dna_backup' => 'DNA backup',
		'coming_soon' => 'coming soon',
		'social_media' => 'Social Media Integration ',
		'you_have_no_idea' => 'You have no idea what we know',
		
		// future present
		'future_present' => 'Future Present Risk Detection',
		'learn_what' => 'Learn what we already know about you ',
		'launch_btn' => 'Launch risk assessment tool',
		
		// more links
		'privacy' => 'Privacy',
		'press' => 'Press',
		'contact' => 'Contact',
			
		
	),


);


?>