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
	    'and' => 'et',
        'career' => 'carrière',
        'finance' => 'budget',
        'social' => 'vie sociale',
        'health' => 'santé',
        'safety' => 'sécurité',
        'recreation' => 'manière de vous divertir',
        'homme_pronoun' => 'un homme',
        'femme_pronoun' => 'une femme'
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
        '1_2_other' => 'Other',        
		

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
		'nav_footer_link_home' => 'Accueil',
		'nav_footer_link_privacy' => 'Confidentialité',
		'nav_footer_link_credits' => 'Crédits',
		'nav_footer_link_logout' => 'Déconnexion',
		'risk_words' => array('faible','modérée','significative','sévère','extrême'),
		'resume_video' => 'Retour à l\'épisode',
		'alt_data_heading' => 'Bon ben',
		'alt_data_p1' => 'Nous avons rencontré un problème lors de l\'accès à vos données Facebook. Il semblerait que',
		'alt_data_reasons' => array(
			'notloggedin' => 'Vous n\'êtes pas connecté à Facebook',
			'app_permissions' => 'Vous n\'avez pas autorisé l\'application à accéder à votre compte Facebook',
			'nodata' => 'Vous n\'avez pas assez de données pour participer ou vous avez manuellement modifié la confidentialité de vos Likes.
			
			
				Pour rendre vos Likes publiques :
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
		
		'no_data_found_statement' => 'Soit vous avez choisi de ne pas connecté votre compte Facebook, soit votre compte ne contient pas suffisamment de données pour effectuer une analyse satisfaisante. Nous allons poursuivre l\'utilisation d\'Illuminus avec les données issues du compte Facebook de Richard. <a class="faq_data_link" href="./faq">Consultez notre FAQ pour en savoir plus</a>. ',
		
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
		
		'0_heading' => 'Politique de confidentialité',
		'policy' => '
		
		
<p>Illuminus est un site Web satirique créé pour la série documentaire (<a href="https://www.donottrack-doc.com">Traque Interdite</a>). Lorsque vous vous connectez via Facebook, nous récupérons les informations que vous partagez avec Facebook pour construire les pages du site Illuminus.</p>

<p>Quand vous utilisez Illuminus, nous créons votre profil personnel avec ces données. Si vous accédez au site Illuminus pendant que vous regardez un épisode de Traque Interdite, et que vous êtes connecté sur Traque Interdite via votre lien personnalisé, ces informations sont enregistrés sur le site et ajoutées à votre profil. Vous pouvez consulter ces informations sur la page <a href=" https://donottrack-doc.com/ca/your-datas/">Vos Données</a>. Si vous vous connectez à Illuminus via at <a href="https://illuminus.io">illuminus.io</a> vos informations personnelles ne sont pas enregistrées. </p>

<p>Lorsque vous consultez <a href="https://www.donottrack-doc.com">www.donottrack-doc.com</a>, nous vous demandons certains informations personnelles, comme votre courriel, ainsi que certains éléments de votre historique de navigation. Si vous nous donnez ces informations, les conditions ci-dessous détaillent vos droits et nos responsabilités.

<h4>Vos données</h4>

<p>Les producteurs garantissent qu\'ils sont les seuls destinataires des informations collectées et qu\'elles seront utilisées exclusivement dans le cadre du projet Traque Interdite et qu\'elles ne seront ni transmises, ni cédées, ni rendues accessibles à aucune tierce partie quelle qu\'elle soit. Les producteurs mettront en oeuvre les mesures de sécurité nécessaires pour garantir la confidentialité des données personnelles des utilisateurs et les protéger contre la perte, le vol, les utilisations frauduleuses ou un accès non autorisé de tierce partie. La transmission des données collectées pendant la connexion est effectuée de manière cryptée, ainsi que tous les échanges de données subséquents entre le serveur et le programme.</p>

<p>Les producteurs utiliserons votre courriel uniquement aux fins suivantes : 
<ul>
<li>vous avertir du lancement de nouveaux épisodes de Traque Interdite,</li>
<li>vous informer de nouveautés concernant Traque Interdite</li>
<li>vous offrir l\'accès à votre version personnalisée</li>
</ul>

Vos données personnelles ne seront pas conservées dans la base de données de Traque Interdite Your au delà de la durée de vie du projet (3 ans).</p>

<p>Vous avez le droit d\'accéder, de modifier, de corriger ou d\'effacer les informations vous concernant. Pour exercer ce droit, écrivez à : data@donottrack-doc.com</p>

<h4>INFORMATIQUE & LIBERTÉS</h4>

<p>En application de la loi n°78-17 du 6 janvier 1978 relative à l\'informatique, aux fichiers et aux libertés, l\'Internaute dispose d\'un droit d\'accès, de rectification et d\'opposition des données qui le
concernent.</p>

<p>Ainsi, il peut exiger que soient rectifiées, complétées, clarifiées, mises à jour ou effacées les informations le concernant qui sont inexactes, incomplètes, équivoques, périmées ou dont la collecte ou l\'utilisation, la communication ou la conservation est interdite.</p>

<p>Tout internaute peut exercer ce droit en écrivant à l\'adresse data@donottrack-doc.com</p>

<h4>COOKIES</h4>

<p>Le site http://donottrack-doc.com/ utilise Google Analytics & Xiti.</p>

<p>Google Analytics est un service d’analyse de sites Web édité par Google qui nous aide à étudier l’utilisation que vous faites du site.</p>

<p>Ce service enregistre des informations comme : comment vous êtes arrivés sur Traque Interdite, fréquence, nombre et répétition des visites, durée de navigation, recherches effectuées, navigateur utilisé, opérateur qui fournit le service, emplacement lié à l’adresse IP.</p>

<p>Ces informations sont en règle générale transmises et stockées par Google sur des serveurs situés aux États-Unis.</p>

<p>Si vous avez choisi de rendre anonyme votre adresse IP sur ce site, votre adresse IP sera toutefois transmise par Google, mais tronquée dans les pays membres de l’Union européenne ou dans les autres États signataires de l’accord instituant l’Espace économique européen. Dans des cas exceptionnels uniquement, votre adresse IP sera transmise intégralement à un serveur de Google aux États-Unis, puis tronquée là-bas.</p>

<p>Google ne recoupera pas votre adresse IP transmise dans le cadre de Google Analytics avec d’autres données détenues par Google. Google utilisera ces informations pour évaluer votre utilisation du site, compiler pour UPIAN des rapports sur l’activité du site et l’utilisation d’Internet : mesure et analyse de la navigation et du comportement des utilisateurs, élaboration de profils anonymes de navigation, pistes d’améliorations en fonction de l’analyse des données d’utilisation.</p>

<p>Pour en savoir plus, consultez <a href="http://www.google.fr/intl/fr/policies/privacy/">les règles de confidentialité de Google</a><br></p>

<p>En plus de désactiver les cookies sur votre navigateur, vous pouvez bloquer Google Analytics pendant que vous naviguez grâce à un module fourni par Google.</p>

<p>Xiti est un outil de mesure d’audience Web proposé par la société AT Internet. Xiti dépose un cookie pour tracer le parcours du visiteur afin d’établir les statistiques de visites. Par exemple, cela permet de ne pas compter deux fois le visiteur comme si c’était un nouveau quand il recharge la page. Xiti empêche ainsi que les éditeurs de sites Web gonflent leurs propres statistiques en rechargeant en boucle. Xiti utilise les informations collectées par ses cookies à la demande d’UPIAN pour fournir des rapports et des prestations en lien avec l’utilisation du site et internet. XITI ne recoupera votre adresse IP avec aucune donnée qu’il détiendrait.</p>

<p>Pour en savoir plus, consultez <a href="http://www.atinternet.com/politique-du-respect-de-la-vie-privee/">la page Politique du respect de la vie privée de Xiti</a><br></p>.</p>

<h4>Pour plus d\'informations</h4>

<p>Pour obtenir plus d\'informations sur les cookies et l\'utilisation d\'outils d\'analyse d\'audience, l\'internaute peut visiter le site de la CNIL.</p>


<h4>URL de conditions d\'utilisation</h4>

Courriel du support technique : <a href="mailto:contact@traqueinterdite.ca">contact@donottrack-doc.com</a><br>
URL de support technique <a href="https://hub.donottrack-doc.com/ca/about/">https://hub.donottrack-doc.com/en/about/</a>

',
	
	),
	
	
	// CREDITS
	'credits' => array(
		'0_heading' => 'Crédits',
		'1_creators' => 'Créateurs d\'Illuminus',
		'1_thankyou' => 'Merci',
		'1_predictions' => 'Prédictions des caractéristiques psycho-démographiques',
		'cambridge' => 'La Prédiction des caractéristiques psycho-démographiques est basée sur l\'API<a href="http://applymagicsauce.com/" target="_blank">Apply Magic Sauce</a> développée au <a href="http://www.psychometrics.cam.ac.uk/" target="_blank">Centre de Psychométrie de l\'université de Cambridge</a>',
		
	),
	
	
	
	
	
	
	// FAQ
	'faq' => array(
		'0_heading' => 'FAQ',
		'what_heading' => 'Illuminus, c\'est quoi ?',
		'what_text' => 'Illuminus est une entreprise fictive qui analyse vos Likes Facebook afin de construire un profil de votre personnalité. Il s\'agit d\'une oeuvre satirique appartenant au programme Traque Interdite (<a href="https://www.donottrack-doc.com">www.donottrack-doc.com</a>), une série documentaire personnalisée consacrée au tracking et à l\'économie du Web. Illuminus suit ainsi un scénario fictif pour juger vos caractéristiques financières et personnelles afin d\'illustrer le fonctionnement de certaines techniques d\'analyse de données existant dans le monde réel.',
		'who_heading' => 'Qui a créé Illuminus ?',
		'who_text1' => 'Veuillez vous reporter à la',
		'who_text2' => 'page Crédits',
		'fberror_heading' => 'Illuminus dit que je n\'ai pas suffisamment de données.',
		'fberror_text' => 'Ce problème peut survenir pour l\'une des raisons suivantes:
			<ul>
			<li>Vous n\'êtes pas connecté à Facebook</li>
			<li>Vous n\'avez pas donné à Illuminus l\'autorisation nécessaire. </li>
			<li>Vous n\'avez pas assez de données pour participer ou vous avez manuellement modifié le niveau</li>
			</ul>',
		'bogues_heading' => 'Vous avez trouvé un bogue ?',
		'bogues_text' => 'Veuillez le signaler  <a href="mailto:contact@donottrack-doc.com">contact@donottrack-doc.com</a>',

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
		'press' => 'Presse',
		'contact' => 'Contact',
			
		
	),


);


?>