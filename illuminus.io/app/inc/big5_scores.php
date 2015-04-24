<?php

/**
 *	MagicSauce Scoring sheet
 *
 */


/**


From Table 5 of Nicholson, Nigel - Personality and domain-specific risk taking

SO IF:	
	BIG5_Openness: 0.6452 (more open than not)
		Social: 
			+ .32 / 2 = 0.4826
			* .32 = 0.206464
	BIG5_Agreeableness: 0.3759
		Finance:
			+ -.21 (0.1659) / 2 = 0.08295
			* -.21 = -0.078939

*/
$big5_risk = array(
	'BIG5_Neuroticism' 		 => array('Recreation' => -.16, 'Health' => .11, 'Career' => -.11, 'Finance' => -.14, 'Safety' => -.09, 'Social' => -.12, 'Overall' => -.18),
	'BIG5_Extraversion' 	   => array('Recreation' => .17, 'Health' => .17, 'Career' => .01, 'Finance' => .09, 'Safety' => .22, 'Social' => .22, 'Overall' => .26),
	'BIG5_Openness' 		    => array('Recreation' => .2, 'Health' => .06, 'Career' => .34, 'Finance' => .1, 'Safety' => .05, 'Social' => .32, 'Overall' => .36),
	'BIG5_Agreeableness' 	 => array('Recreation' => -.12, 'Health' => -.17, 'Career' => -.18, 'Finance' => -.21, 'Safety' => -.19, 'Social' => -.16, 'Overall' => -.31),
	'BIG5_Conscientiousness' => array('Recreation' => -.09, 'Health' => -.13, 'Career' => -.08, 'Finance' => -.17, 'Safety' => -.16, 'Social' => -.07, 'Overall' => -.2)
);





$big5 = array(
	'Extraversion' => array(
		'name' => 'Extraversion',
		'keywords' => 'outgoing, friendly, lively, active, talkative',
		'opposite' => 'Introversion',
		'opposite_keywords' => 'shy, reserved',
		'desc' => ''
	),
	'Openness' => array(
		'name' => 'Openness',
		'keywords' => 'creative, imaginative, intelligent, curious, broad-minded, sophisticated, adventurous',
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
		'keywords' => 'helpful, warm, caring, softhearted, sympathetic',
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
);

$big5_defs = array(
	'health-social-well-being' => array(
		'description' => 'Social well-being is a good predictor of mental and physical health.',
		'study_desc' => 'This study shows that increases in openness, extroversion, conscientiousness and agreeableness and a decrease in neuroticism correlate to increased social well-being.',
		'citation' => '<a href="http://news.illinois.edu/news/12/1218personality_BrentRoberts.html">Study links personality changes to changes in social well-being</a>',
	),
	'health-smoking' => array(
		'description' => 'A high neuroticism score is associated with cigarette smoking.',
		'study_desc' => 'Higher neuroticism is associated with cigarette smoking (Gilbert, 1995; Kirk et al., 2001; Lerman et al., 2000). Persons high in neuroticism are more likely to smoke, tend to smoke more, and have greater difficulty quitting smoking (Almada et al., 1991; Raush et al., 1990).',
		'citation' => '<a href="http://www.feinberg.northwestern.edu/sites/ipham/docs/SeminarSeries/20130919-IPHAMSeminarSeries-Mroczek-Slides.pdf">link</a>',
	),
	'health-drinking' => array(
		'description' => 'Higher neuroticism and agreeableness is related to alcohol consumption.',
		'study_desc' => 'Several studies have documented that higher neuroticism is related to alcohol abuse and dependence (Almada et al., 1991; Grekin et al., 2006; Larkins & Sher, 2006; Read & O’Connor, 2006) Neuroticism is also associated with greater negative consequences from drinking (Fischer et al., 2007). ',
		'citation' => '1) <a href="http://www.feinberg.northwestern.edu/sites/ipham/docs/SeminarSeries/20130919-IPHAMSeminarSeries-Mroczek-Slides.pdf">link</a>; 2) Soldz, Stephen; Vaillant (1999). "<a href="http://www.sciencedirect.com/science/article/pii/S0092656699922432">The Big Five Personality Traits and the Life Course: A 45-Year Longetudinal Study</a>". Journal of Research in Personality 33: 208–232. doi:10.1006/jrpe.1999.2243.',
	),
);