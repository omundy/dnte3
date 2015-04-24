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
		'0_heading' => 'Bienvenue sur Illuminus.',
		'callout' => 'Comprendre la puissance de vos données',
		'select_assessment' => 'Choisir une analyse personnelle sur la gauche pour commencer',
		'please_login' => 'Connectez-vous avec Facebook pour démarrer l\'analyse personnelle',
        'and' => 'et'
	),




	// step 1 - Personality Assessment
	array(
		'1_1_heading' => 'Analyse personelle',
		'1_1_welcome' => 'Bienvenue sur Illuminus',
		'1_1_subheading' => 'Vos données ont été analysées. </br>',
		'1_1_p1_1' => 'Votre activité sur les réseaux sociaux en dit long sur vous.',
		'1_1_p1_2' => 'Votre profil révèle par exemple que',
		'1_1_p1_3' => 'vous avez ',
		// insert [age]
		'1_1_p1_4' => 'ans et',
		// insert [age]
		'1_1_p1_5' => 'que vous êtes',
		// insert [GENDER]

		'1_1_p1_6' => 'Mais ce sont les données accumulées sur vous par Facebook au fil des années qui sont la véritable mine d\'informations.',
		'1_1_p1_7' => 'En étudiant les ',
		// insert [NUMBER OF LIKES]
		'1_1_p1_8' => 'éléments que vous avez likés sur Facebook, notre algorithme a analysé votre personnalité et déterminé que votre trait le plus marqué est ',
		// insert [BIG5 CATEGORIES]
		'1_1_p1_9_pos' => 'ce qui indique chez vous une tendance à être',
		'1_1_p1_9_and' => 'et',
		'1_1_p1_9_neg' => 'mais également',
		
		// insert [BIG5 TRAITS]

		'1_1_p1_10' => 'Notre évaluation prédictive de la personnalité à partir de caractéristiques psycho-démographiques utilise l\'API <a href="http://applymagicsauce.com/" target="_blank">Apply Magic Sauce</a> développée au <a href="http://www.psychometrics.cam.ac.uk/" target="_blank">centre de psychométrie de l\'université de Cambridge</a>.', 
		'1_1_p1_11' => 'Cela va peut-être vous surprendre mais votre intérêt pour', 
		// [likes]
		'1_1_p1_12' => 'nous a aidé à déterminer qui vous étiez véritablement. Même si ce ne sont pas les seules choses que vous avez likées.', 
		'1_1_p1_next' => 'Lancer l\'analyse de Likes.',
		'1_1_chartcaption' => 'Répartition de vos Likes par année',
		
		// [error]
		'1_1_not_connected' => '',
		'1_1_no_permission' => '',
		'1_1_no_likes' => '',
		'1_1_no_magic_sauce' => '',
		
		// page 2
		'1_2_heading' => 'Analyse de Likes',
		'1_2_subheading' => 'Découpage par catégories',
		'1_2_p1_1' => 'Le graphique ci-contre est une représentation de vos Likes sur Facebook triés par centres d\'intérêt. Passez votre souris sur le graphe pour les afficher. Vos centres d\'intérêt, notamment les principaux comme',
		'1_2_p1_2' => 'et',
		'1_2_p1_3' => ', servent à vous cibler et à déterminer quel type de publicité vous sera présenté.', 
		'1_2_p1_4' => 'Cliquez sur le bouton ci-dessous pour analyser vos données Facebook au moyen d\'un algorithme de mesure de vos traits de caractère.',

		'1_2_p1_back' => '<<',
		'1_2_p1_next' => 'Analyse de personnalité',
		'1_2_chartcaption' => 'Découpage de likes',
        '1_2_other' => 'Autre',
		

		// page 3
		'1_3_heading' => 'Analyse de personnalité',
		'1_3_subheading' => ' ',
		'1_3_1' => 'Les psychologues estiment que le caractère de chaque être humain est composé de ces cinq traits de personnalité, les <a href="http://en.wikipedia.org/wiki/Big_Five_personality_traits" target="_blank">Big Five</a> : l\'extraversion, l\'ouverture à de nouvelles expériences, la conscienciosité, l\'agréabilité, et le névrosisme. Une personne qui aura un grand score sur l\'échelle de l\'extraversion sera par exemple très ouverte aux autres, amicale et active. Celles avec un score de conscienciosité élevé sont organisées, responsables et travailleuses.',
		'1_3_2' => 'Après analyse de vos données, nous avons déterminé que vos deux traits principaux sont :',
		// insert [BIG5 CATEGORY]
		'1_3_3' => 'et',
		// insert [BIG5 CATEGORY]
		'1_3_chartcaption' => 'Représentation de vos cinq traits de personnalités',
		'1_3_click_on_risk' => 'Cliquez sur l\'une des évaluations de risques pour découvrir comment vos données peuvent être utilisés pour déterminer vos risques potentiels.',
		'1_3_gorisk_btn' => 'Accédez à votre évaluation de risques.',
	),




	// step 2 - Financial Risk Evaluation
	array(

		'2_heading' => 'Évaluation du risque financier',
		'2_1' => 'À partir de vos traits de caractères tels que déterminés par vos données Facebook et selon les recherches scientifiques publiées dans le <a href="http://dx.doi.org/10.1080/1366987032000123856" target="_blank">Journal of Risk Research</a>, notre algorithme a déterminé',
		// good || mediocre || unreliable
		'2_2_unreliable' => 'que vous êtiez trop peu fiable pour obtenir un prêt bancaire',
		'2_2_mediocre' => 'que vous seriez jugé médiocre candidat à l\'obtention d\'un prêt bancaire',
		'2_2_good' => 'qu\'une candidature de votre part à l\'obtention d\'un prêt bancaire serait jugée fiable',
		
		// eval_risk()
		'eval_risk_1' => 'Votre score élevé sur l\'échelle de',
		'eval_risk_2' => 'indique une tendance',
		'eval_risk_3' => 'aux comportements à risque dans la prise de décisions touchant à votre',
		'eval_risk_4' => '.',
		
		// career
		'2_career_heading' => 'Risque professionnel',
		'2_career_risk_eg' => 'Par ex., quitter votre emploi actuel avant d\'en avoir trouvé un autre.',
		
		'2_career_risk_more' => '',
		'2_career_risk_more_text' => 'Des comportements à risque dans le domaine professionnel sont généralement associés avec des emplois de niveau moins élevé, dans des entreprises de taille plus réduite ou pour de plus courte durée, un nombre accru d\'employeurs différents et une tendance à travailler pour des start-up.',
		
		'2_finance_heading' => 'Risque budgétaire',
		'2_finance_risk_eg' => 'par ex., parier ou jouer à des jeux d\'argent, pratiquer des investissements risqués.',
		
		'2_social_heading' => 'Risque social',
		'2_social_risk_eg' => 'par ex., se présenter à une élection, dénoncer publiquement une loi ou une décision de justice.',
		
		// GENDER
		'eval_risk_overview_1' => 'En plus de vos données qui sont tout sauf anodines, le fait que vous soyez',
		// [MALE/FEMALE]
		'eval_risk_overview_2' => 'contribue',
		// adjectives
		'eval_risk_overview_adj_1_1' => 'grandement',
		'eval_risk_overview_adj_1_2' => 'probablement',
		'eval_risk_overview_adj_1_3' => 'peu ou pas du tout',
		'eval_risk_overview_3' => 'à l\'accroissement de votre risque global dans la mesure où',
		
		'eval_risk_overview_3_1' => 'les hommes prennent en général significativement plus de risques que les femmes.',
		'eval_risk_overview_3_2' => 'les femmes prennent significativement plus de risques que les hommes dans les domaines professionnel et social',
		'eval_risk_overview_3_3' => 'les hommes prennent significativement plus de risques que les femmes, notamment sur les plans de la santé et de la sécurité.',
		'eval_risk_overview_3_4' => 'les femmes prennent significativement plus de risques sur le plan professionnel et social.',
		'eval_risk_overview_3_5' => 'les hommes prennent en général significativement plus de risques que les femmes, tandis que les femmes prennent significativement plus de risques dans les domaines professionnel et social.',
		
		
		// AGE
		'eval_risk_overview_age_1' => 'Votre',
		'eval_risk_overview_age_2' => 'âge',
		'eval_risk_overview_age_2_greatly' => 'contribue grandement',
		'eval_risk_overview_age_2_likely' => 'contribue probablement',
		'eval_risk_overview_age_2_didnot' => 'ne contribue pas',
		'eval_risk_overview_age_3' => 'à l\'accroissement de votre risque global dans la mesure où',
		'eval_risk_overview_age_4' => 'la prise de risque diminue dans tous les domaines proportionnellement à l\'âge',
		'eval_risk_overview_age_5' => 'En clair, plus vous êtes jeune, plus vous êtes susceptible d\'avoir un comportement à risque, ce qui affecte le calcul de votre risque global.',
	),







	// step 3 - Health Risk Evaluation
	array(

		'3_heading' => 'Évaluation du risque physique',
		'3_1' => 'Votre activité sur les réseaux sociaux livre de précieuses informations permettant de déterminer si vous êtes susceptible ou non d\'être un risque pour vous-même. Nous pouvons par exemple savoir si vous êtes susceptible d\'aller à un rendez-vous avec un(e) inconnu(e), d\'avoir un rapport sexuel non protégé, ou de vous livrer à un sport extrême. Au final, votre prédisposition à un comportement à risque peut se traduire par un coût médical accru pour nous. Pour nous aider à déterminer ce risque potentiel, nous avons comparé votre analyse de la personnalité à une étude sur le risque publiée dans le <a href="http://dx.doi.org/10.1080/1366987032000123856" target="_blank">Journal of Risk Research</a> et avons conclu que',
		
		// good || mediocre || unreliable
		'2_3_extreme' => 'votre niveau de risque est extrême et vous ne pouvez souscrire à aucune assurance santé.',
		'2_3_high' => 'votre niveau de risque est trop important pour vous laisser souscrire un contrat d\'assurance santé standard',
		'2_3_moderate' => 'votre niveau de risque est modéré ce qui vous permet de souscrire à certaines assurances santé',
		'2_3_low' => 'votre niveau de risque est faible, ce qui vous permet de souscrire au contrat de santé de votre choix',
		
		'3_health_heading' => 'Risque santé ',
		'3_health_risk_eg' => 'par ex., fumer, mauvais régime alimentaire, forte consommation d\'alcool',
		
		'3_safety_heading' => 'Risque sécurité',
		'3_safety_risk_eg' => 'par ex., conduite dangereuse, circuler à vélo sans équipement de sécurité',
		
		'3_recreation_heading' => 'Risque loisirs',
		'3_recreation_risk_eg' => 'par ex., pratiquer le parapente, le saut à l\'élastique, la plongée',
	),






	// meta - links, etc.
	'meta' => array(
		'product_name' => 'Voir aujourd\'hui les risques de demain',
		'product_callout' => 'Savoir ce que nous savons déjà de vous',
		'login_with_facebook' => 'Connectez-vous avec Facebook',
		'nav_link_zero' => 'Bienvenue',
		'nav_link_load_data' => 'Commencer',
		'nav_link_one' => 'Analyse de la personnalité',
		'nav_link_two' => 'Évaluation du risque financier',
		'nav_link_three' => 'Évaluation du risque santé',
		'nav_footer_link_home' => 'Home',
		'nav_footer_link_privacy' => 'Mentions légales',
		'nav_footer_link_credits' => 'Crédits',
		'nav_footer_link_logout' => 'Déconnexion',
		'risk_words' => array('faible','modérée','significative','sévère','extrême'),
		'resume_video' => 'Retour à l\'épisode',
		'alt_data_heading' => 'Bon ben',
		'alt_data_p1' => 'Nous avons rencontré un problème lors de l\'accès à vos données Facebook. IIl semblerait que',
		'alt_data_reasons' => array(
			'notloggedin' => 'you are not logged into Facebook',
			'app_permissions' => 'you didn\'t give the app permission',
			'nodata' => 'you don\'t have enough data to participate or you may have manually increased the privacy of your data.
			
			
				To make Likes public:
				<ul>
				<li>Ouvrez votre page Facebook</li>
				<li>Cliquez sur l\'onglet <b>Plus</b> après l\'onglet Photos sous votre Cover</li>
				<li>Cliquez <b>Mentions J\'aime</b></li>
				<li>En haut à droite, cliquez sur l\icône crayon <b>Gérer</b></li>
				<li>Sélectionnez <b>Modifier la confidentialité</b></li>
				<li>Vous pouvez alors modifier la confidentialité des différentes catégories de Likes.</li>
				</ul>
			',
			'big5prediction' => 'L\'API Apply MAgic Sauce a rencontré une erreur.',
		),
		'alt_data_click' => 'Cliquez ici',
		'alt_data_p2' => 'pour poursuivre l\'utilisation d\'Illuminus avec les données de Richard Gutjahr.',
		'no_data_found' => 'Pas de données disponibles',
		'no_data_found2' => 'Cliquez sur Commencer pour démarrer',
		
		'no_data_found_statement' => 'Soit vous avez choisi de ne pas connecté votre compte Facebook, soit votre compte ne contient pas suffisamment de données pour effectuer une analyse satisfaisante. Nous allons poursuivre l\'utilisation d\'Illuminus avec les données issues du compte Facebook de Richard. Consultez notre FAQ pour en savoir plus. ',
		
		'get_current_data_set' => 'Vous êtes en train d\évaluer le profil suivant',
		'get_select_a_data_set' => 'Sélectionnez un compte pour commencer',
		'get_select_or' => 'ou',
		'get_sample_data_btn' => 'Analysez un compte témoin',
		'get_fb_data_btn' => 'Utiliser vos données Facebook',
		'get_started_btn' => 'Commencer',
	),
	
	
	
	
	// LOAD_DATA
	'load_data' => array(
		'0_heading' => 'Commencer',
	),
	
	
	
	
	// PRIVACY
	'privacy' => array(
		
		'0_heading' => 'Privacy Policy',
		'policy' => '
		
		
<p>Illuminus is a satirical website created for the documentary series Do Not Track (<a href="https://www.donottrack-doc.com">www.donottrack-doc.com</a>).  When you log in via Facebook, we access information you have shared on Facebook to build the Illuminus website.  </p>

<p>When you use Illuminus, it will create a "personality profile" for you.  If you access Illuminus while watching an episode of Do Not Track, and you create an account on Do Not Track, we will store this information on your profile.  This profile will only contain the information you gave authorization for us to access. If you access Illuminus at <a href="https://illuminus.io">illuminus.io</a> your personal information will not be saved.</p>

<p>When you use <a href="https://www.donottrack-doc.com">www.donottrack-doc.com</a>, we do request some information from you, such as your email address, as well as aspects of your browsing history.  If you volunteer that information, the terms below describe your rights and our responsibilities.

<h4>Your data</h4>

<p>The Producers guarantee that they are the sole recipients of the data collected and that it will be used exclusively for the Project and will neither be passed on, nor accessible, nor sold to any third party whatsoever. The Producers implement technical and organizational security measures to ensure that its users’ personal data is protected against loss, fraudulent alterations, or unauthorized access by third parties. The transmission of data collected during registration is carried out in an encrypted manner, as is subsequent communication between the server and the Project.</p>

<p>The producers will use your email address for the following purposes:
<ul>
<li>keep you abreast of the broadcast of upcoming episodes of the Project,</li>
<li>invite you to follow the Project’s news</li>
<li>offer personalized content</li>
</ul>

Your personal data will be stored within the Project database and retained for the life of the Project (3 years).</p>

<p>You have the right to access, modify, correct, and delete your information. To exercise this right, or to opt out, write to: data@donottrack-doc.com</p>

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
		'what_text' => 'Illuminus is a fantasy corporation that analyses your Facebook likes to build a character profile.  It is a work of satire to accompany Do Not Track, a personalized documentary series about tracking and the web economy. Illuminus uses a fictional scenario of a corporation deciding your financial services to uncover real-life techniques of data analysis.',
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
			'name' => 'l\'extraversion',
			'keywords' => 'extraverti, amical, ouvert',
			'keywords_F' => 'extravertie, amicale, ouverte',
			'opposite' => 'l\'introversion',
			'opposite_keywords' => 'timide, réservé',
			'opposite_keywords_F' => 'timide, réservée',
			'desc' => ''
		),
		'Openness' => array(
			'name' => 'l\'ouverture',
			'keywords' => 'créatif, imaginatif, curieux',
			'keywords_F' => 'créative, imaginative, curieuse',
			'opposite' => 'l\'étroitesse d\'esprit',
			'opposite_keywords' => 'fermé, borné, non-curieux',
			'opposite_keywords_F' => 'fermée, bornée, non-curieuse',
			'desc' => ''
		),
		'Conscientiousness' => array(
			'name' => 'la conscienciosité',
			'keywords' => 'organisé, responsable, travailleur',
			'keywords_F' => 'organisée, responsable, travailleuse',
			'opposite' => 'impulsivité',
			'opposite_keywords' => 'peu fiable, impulsif',
			'opposite_keywords_F' => 'peu fiable, impulsive',
			'desc' => ''
		),
		'Agreeableness' => array(
			'name' => 'l\'agréabilité',
			'keywords' => 'serviable, chaleureux, sympathique',
			'keywords_F' => 'serviable, chaleureuse, sympathique',
			'opposite' => 'l\'hositilité',
			'opposite_keywords' => 'hostile, inamical',
			'opposite_keywords_F' => 'hostile, inamicale',
			'desc' => ''
		),
		'Neuroticism' => array(
			'name' => 'le névrosisme',
			'keywords' => 'anxieux, lunatique, dépréssif',
			'keywords_F' => 'anxieuse, lunatique, dépressive',
			'opposite' => 'la stabilité émotionnelle',
			'opposite_keywords' => 'calme, cool, de bonne humeur',
			'opposite_keywords_F' => 'calme, cool, de bonne humeur',
			'desc' => ''
		)
	

	),
	
	
	// Illuminus home page
	'homepage' => array(
		
		'title' => 'Illuminus - Unlocking the power of you',
	
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
		'future_present' => 'Voir ',
		'learn_what' => 'Learn what we already know about you ',
		'launch_btn' => 'Launch risk assessment tool',
		
		// more links
		'privacy' => 'Privacy',
		'contact' => 'Contact',
			
		
	),


);


?>