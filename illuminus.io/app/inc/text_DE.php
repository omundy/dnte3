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
		'0_heading' => 'Willkommen bei Illuminus.',
		'callout' => 'Erfahren Sie, was in Ihnen steckt',
		'select_assessment' => 'Wählen Sie zuerst links den Persönlichkeitstest aus',
		'please_login' => 'Um den Persönlichkeitstest zu machen, melden Sie sich bitte mit Ihrem Facebook-Konto an',
        'loading' => 'Ihre Daten werden analysiert, bitte einen Augenblick warten.'
	),




	// step 1 - Personality Assessment
	array(
		'1_1_heading' => 'Persönlichkeitstest',
		'1_1_welcome' => 'Willkommen bei Illuminus',
		'1_1_subheading' => 'Ihre Daten wurden erfolgreich übermittelt.',
		'1_1_p1_1' => 'Ihr Verhalten in sozialen Netzwerken erzählt eine Menge über Sie.',
		'1_1_p1_2' => 'Ihr Profil besagt beispielweise, dass',
		'1_1_p1_3' => 'Sie',
		// insert [age]
		'1_1_p1_4' => 'Jahre alt sind und dass',
		// insert [age]
		'1_1_p1_5' => 'Ihr Geschlecht',
		// insert [GENDER]

		'1_1_p1_6' => 'ist. Doch tatsächlich sind Ihre Facebook-Daten, die Sie mit der Zeit angesammelt haben, eine wahre Goldgrube.',
		'1_1_p1_7' => 'Wir haben Ihre mindestens',
		// insert [NUMBER OF LIKES]
		'1_1_p1_8' => 'Likes auf Facebook ausgewertet und so dank fortschrittlicher Algorithmen Aufschlüsse über Ihren Charakter erhalten. Den höchsten Wert haben Sie in der Kategorie ',
		// insert [BIG5 CATEGORIES]
		'1_1_p1_9_pos' => ', was darauf schließen lässt, dass Sie',
		'1_1_p1_9_and' => 'und',
		'1_1_p1_9_neg' => 'sind, aber auch',
		
		// insert [BIG5 TRAITS]

		'1_1_p1_10' => 'sein können. Zur Auswertung Ihrer Charakterzüge haben wir mithilfe von <a href="http://applymagicsauce.com/" target="_blank">Apply Magic Sauce API</a> psycho- und demografische Prognosen gemacht. Dieser Algorithmus wurde am <a href="http://www.psychometrics.cam.ac.uk/" target="_blank">Psychometrics Centre der University of Cambridge</a> entwickelt.', 
		'1_1_p1_11' => 'Vielleicht überrascht es Sie, dass Ihr Interesse an', 
		// [likes]
		'1_1_p1_12' => 'uns bei der Bewertung Ihres wahren Charakters geholfen hat. Und das sind noch lange nicht alle Dinge, denen Sie ein „Gefällt mir" gegeben haben.', 
		'1_1_p1_next' => 'Gefällt mir Analyse beginnen.',
		'1_1_chartcaption' => 'Ihre Likes im Laufe der Zeit.',
				
		// [error]
		'1_1_not_connected' => "Sie sind nicht mit Ihrem Facebook Profil verbunden. Illuminus wird daher stattdessen die Daten von Richards Facebook-Account verwenden.",
		'1_1_no_permission' => "Weil Sie die Verbindung zu Ihrem Facebook-Account nicht genehmigt haben, können wir Ihre Daten nicht abrufen. Illuminus wird daher stattdessen die Daten von Richards Facebook-Account verwenden.",
		'1_1_no_likes' => "Leider ist die Anzahl Ihrer Likes in Ihrem Facebook-Account unzureichend. Ein Persönlichkeitsprofil mit so wenig Daten zu erstellen wäre Rätselraten. Illuminus wird daher stattdessen die Daten von Richards Facebook-Account verwenden.",
		'1_1_no_magic_sauce' => "Leider entsprechen zu wenig Likes von Ihrem Facebook-Account, der Datenbank der Apply Magic Sauce API. Ein Persönlichkeitsprofil trotzdem zu erstellen wäre Rätselraten. Illuminus wird stattdessen die Daten von Richards Facebook-Account verwenden.",
		
		// page 2
		'1_2_heading' => 'Gefällt mir Analyse',
		'1_2_subheading' => 'Kategorisierte Anordnung',
		'1_2_p1_1' => ' in diesem Kreisdiagramm haben wir Ihre Interessen auf Facebook dargestellt. Bewegen Sie Ihre Maus über das Diagramm, um die Kategorie zu sehen. Diese Interessen, insbesondere die mit dem größten Anteil, wie',
		'1_2_p1_2' => 'und',
		'1_2_p1_3' => 'werden genutzt, um Sie immer wieder neu in bestimmte Kategorien einzusortieren und Ihnen so passende Werbung zu zeigen.', 
		'1_2_p1_4' => 'Als nächstes werden die Daten, die Sie auf Facebook gespeichert haben, mit Hilfe eines Algorithmus analysiert und auf diese Weise Ihre Charaktereigenschaften ausgewertet.',

		'1_2_p1_back' => 'Zurück zum Persönlichkeitsprofil',
        '1_2_p2_back' => 'Zurück zur Gefällt mir Analyse',
		'1_2_p1_next' => 'Wollen Sie Ihr Persönlichkeitsprofil sehen?',
		'1_2_chartcaption' => 'Ihre Likes in Kategorien unterteilt',
        '1_2_other' => 'Other',         
		

		// page 3
		'1_3_heading' => 'Ihr Persönlichkeitsprofil',
		'1_3_subheading' => ' ',
		'1_3_1' => 'Psychologen gehen davon aus, dass sich der Charakter eines jeden Menschen gemäß dem <a href="http://en.wikipedia.org/wiki/Big_Five_personality_traits" target="_blank">Fünf-Faktoren-Modell</a> (den sog. Big Five) auf den Skalen Extraversion, Offenheit für Erfahrungen, Gewissenhaftigkeit, Verträglichkeit und Neurotizismus einordnen lässt. Wenn eine Person einen hohen Wert in der Kategorie Extraversion hat, ist sie beispielsweise meist sehr gesellig, freundlich und aktiv. Menschen, die einen hohen Wert in der Kategorie Gewissenhaftigkeit haben, sind in der  Regel gut organisiert, vernünftig und strebsam.',
		'1_3_2' => 'Nach Auswertung der Daten haben wir also festgestellt, dass Sie bei den folgenden zwei Big Five die höchsten Werte haben:',
		// insert [BIG5 CATEGORY]
		'1_3_3' => 'und',
		// insert [BIG5 CATEGORY]
		'1_3_chartcaption' => 'Ihre Big Five-Persönlichkeitsbewertung',
		'1_3_click_on_risk' => 'Klicken Sie eine der Risikoeinschätzungen an und erfahren Sie, wie Ihre Daten verwendet werden, um Auskunft über potentielle Risiken zu erhalten.',
		'1_3_gorisk_btn' => 'Sehen Sie sich Ihre Risikoeinschätzung an',
	),




	// step 2 - Financial Risk Evaluation
	array(

		'2_heading' => 'Einschätzung des finanziellen Risikos',
		'2_1' => 'Unser Algorithmus hat aufgrund der Bewertung Ihrer Persönlichkeit, die sich aus Ihren Facebook-Daten ergeben hat, und einer wissenschaftliche Studie, die im <a href="http://dx.doi.org/10.1080/1366987032000123856" target="_blank">Journal of Risk Research</a> veröffentlicht wurde, ergeben,',
		// good || mediocre || unreliable
		'2_2_unreliable' => 'dass Sie ein unzuverlässiger Kreditnehmer wären',
		'2_2_mediocre' => 'dass Sie ein mittelmäßiger Kreditnehmer wären',
		'2_2_good' => 'dass Sie ein zuverlässiger Kreditnehmer wären',
		
		// eval_risk()
		'eval_risk_1' => 'Ihre hohe Bewertung in der Kategorie',
		'eval_risk_2' => 'zeigt an, dass Sie',
		'eval_risk_3' => 'häufig riskante',
		'eval_risk_4' => 'Entscheidungen treffen.',
		
		// career
		'2_career_heading' => 'Ihre berufliche Risikobereitschaft ist',
		'2_career_risk_eg' => 'z. B. eine Anstellung kündigen, ohne bereits eine neue gefunden zu haben',
		
		'2_career_risk_more' => 'Mehr über Ihre berufliche Risikobereitschaft',
		'2_career_risk_more_text' => 'Riskante berufliche Entscheidungen korrelieren oft mit einer geringeren Beschäftigung, der Arbeit in kleinen Betrieben, kürzeren Anstellungsverträgen, einer größeren Arbeitgeberzahl und der Beschäftigung bei Start-up-Unternehmen',
		
		'2_finance_heading' => 'Finanzielle Risikobereitschaft',
		'2_finance_risk_eg' => 'z. B. Glücksspiel und riskante Investitionen',
		
		'2_social_heading' => 'Gesellschaftliche Risikobereitschaft',
		'2_social_risk_eg' => 'z. B. politische Kandidatur, öffentliche Kritik an Regeln oder Entscheidungen',
		
		// GENDER
		'eval_risk_overview_1' => 'Neben Ihren scheinbar langweiligen Facebook-Daten hat Ihr',
		// [MALE/FEMALE]
		'eval_risk_overview_2' => 'Geschlecht',
		// adjectives
		'eval_risk_overview_adj_1_1' => 'sehr',
		'eval_risk_overview_adj_1_2' => 'eher',
		'eval_risk_overview_adj_1_3' => 'nicht',
		'eval_risk_overview_3' => 'zur Einschätzung Ihrer Risikobereitschaft beigetragen.',
		
		'eval_risk_overview_3_1' => 'In der allgemeinen Bewertung sind Männer deutlich risikofreudiger als Frauen',
		'eval_risk_overview_3_2' => 'Frauen zeigen sich hingegen bei beruflichen und gesellschaftlichen Entscheidungen risikobereiter',
		'eval_risk_overview_3_3' => 'In vier Bereichen, darunter Gesundheit und Sicherheit, gehen Männer ein deutlich höheres Risiko ein als Frauen',
		'eval_risk_overview_3_4' => 'Frauen zeigen sich hingegen bei beruflichen und gesellschaftlichen Entscheidungen risikobereiter',
		'eval_risk_overview_3_5' => 'In der allgemeinen Bewertung sind Männer deutlich risikofreudiger als Frauen, jedoch zeigen sich diese bei beruflichen und gesellschaftlichen Entscheidungen risikobereiter',
		
		
		// AGE
		'eval_risk_overview_age_1' => 'Ihr',
		'eval_risk_overview_age_2' => 'Alter hat',
		'eval_risk_overview_age_2_greatly' => 'sehr',
		'eval_risk_overview_age_2_likely' => 'eher',
		'eval_risk_overview_age_2_didnot' => 'nicht',
		'eval_risk_overview_age_3' => 'zu Ihrer Risikoeinschätzung beigetragen.',
		'eval_risk_overview_age_4' => 'Die Bereitschaft, ein Risiko einzugehen, sinkt in allen Kategorien mit zunehmendem Alter',
		'eval_risk_overview_age_5' => 'Je jünger Sie sind, desto eher verhalten Sie sich demnach riskant, was Ihren Durchschnittswert beeinflusst',
	),







	// step 3 - Health Risk Evaluation
	array(

		'3_heading' => 'Einschätzung Ihrer gesundheitlichen Risikobereitschaft',
		'3_1' => 'Ihr Verhalten in sozialen Netzwerken gibt Aufschluss darüber, wie sehr Sie sich mit Ihrem Lebensstil selbst in Gefahr bringen. Wir können daraus ablesen, mit welcher Wahrscheinlichkeit Sie Fremde treffen, unverhütet Sex haben oder gefährliche Extremsportarten betreiben. Ihr Hang zu riskantem Verhalten kann demnach höhere medizinische Kosten für uns bedeuten. Um zu verstehen, wie gefährlich Sie leben, haben wir Ihr Persönlichkeitsprofil mit den Ergebnissen einer Studie des <a href="http://dx.doi.org/10.1080/1366987032000123856" target="_blank">Journal of Risk Research</a> verglichen, mit folgendem Ergebnis:',
		
		// good || mediocre || unreliable
		'2_3_extreme' => 'Ihre Risikobereitschaft ist viel zu hoch, als dass Sie für unsere Krankenversicherung in Frage kämen',
		'2_3_high' => 'Ihre Risikobereitschaft ist etwas zu hoch, als dass Sie für unsere Krankenversicherung in Frage kämen',
		'2_3_moderate' => 'Ihre Risikobereitschaft ist mäßig, so dass Sie unter Umständen gerade noch für unsere Krankenversicherung in Frage kämen',
		'2_3_low' => 'Ihre Risikobereitschaft ist niedrig. Wir würden uns freuen, Sie in unserer Krankenversicherung aufnehmen zu können.',
		
		'3_health_heading' => 'Gesundheits-Risikobereitschaft',
		'3_health_risk_eg' => 'z. B. Rauchen, schlechte Ernährung, hoher Alkoholkonsum',
		
		'3_safety_heading' => 'Sicherheits-Risikobereitschaft',
		'3_safety_risk_eg' => 'z. B. rasantes Autofahren, Fahrradfahren durch die Stadt ohne Helm',
		
		'3_recreation_heading' => 'Risikobereitschaft in der Freizeit',
		'3_recreation_risk_eg' => 'z. B. Klettern, Sporttauchen',
	),






	// meta - links, etc.
	'meta' => array(
		'product_name' => 'Zukünftige und gegenwärtige Risikoprognose',
		'product_callout' => 'Erfahren Sie, was wir bereits über Sie wissen',
		'login_with_facebook' => 'Melden Sie sich mit Ihrem Facebook-Konto an',
		'nav_link_zero' => 'Willkommen',
		'nav_link_load_data' => 'Fangen wir an',
		'nav_link_one' => 'Persönlichkeitstest',
		'nav_link_two' => 'Einschätzung der finanziellen Risikobereitschaft',
		'nav_link_three' => 'Einschätzung der Gesundheits-Risikobereitschaft',
		'nav_footer_link_home' => 'Home',
		'nav_footer_link_privacy' => 'Datenschutz',
		'nav_footer_link_credits' => 'Abspann',
		'nav_footer_link_logout' => 'Abmelden',
		'risk_words' => array('gering','mäßig','beträchtlich','stark','extrem'),
		'resume_video' => 'Zurück zum Video',
		'alt_data_heading' => 'Ups!',
		'alt_data_p1' => 'Beim Zugriff auf Ihre Facebook-Daten ist ein Fehler aufgetreten. Es scheint, ',
		'alt_data_reasons' => array(
			'notloggedin' => 'Sie sind nicht bei Facebook angemeldet',
			'app_permissions' => 'Sie haben der App den Zugriff verweigert',
			'nodata' => 'Sie haben nicht genug Daten oder Sie haben diese manuell geschützt und können deshalb nicht teilnehmen.
			
			
				So machen Sie Ihre „Likes“ öffentlich:
				<ul>
				<li>Gehen Sie zu Ihrem Facebook-Profil</li>
				<li>Klicken Sie in der Überschriftenleiste unter Ihrem Cover-Foto neben den Fotos auf <b>Mehr</b></li>
				<li>Klicken Sie auf <b>„Gefällt mir“-Angaben</b></li>
				<li>Klicken Sie in der oberen rechten Ecke auf das Stift-Symbol, um zu <b>Verwalten</b> zu gelangen</li>
				<li>Wählen Sie dann <b>Privatsphäre bearbeiten</b></li>
				<li>Hier können Sie die Privatsphäre der unterschiedlichen „Gefällt mir“-Angaben bearbeiten</li>
				</ul>
			',
			'big5prediction' => 'bei der Anwendung von Apply Magic Sauce API ist ein Fehler aufgetreten',
		),
		'alt_data_click' => 'Klicken Sie hier',
		'alt_data_p2' => 'wenn Sie Illuminus mit anderen Daten testen möchten, können Sie dafür die von Richard nutzen.',
		'no_data_found' => 'Es konnten keine Daten gefunden werden',
		'no_data_found2' => 'Klicken Sie auf „Fangen wir an“, um zu beginnen',
		
		'no_data_found_statement' => 'Sie haben entweder die Option gewählt, Ihr Facebook-Konto nicht zu verbinden, oder aber die dort gespeicherten Daten reichen nicht aus, um die Analyse richtig durchzuführen. Deshalb wird die Bewertung nun mit den Beispieldaten von Richards Facebook-Konto fortgeführt. Weitere Informationen finden Sie in unseren FAQ.',
		
		'get_current_data_set' => 'Sie werten derzeit dieses Profil aus',
		'get_select_a_data_set' => 'Wählen Sie eine der folgenden Optionen, um anzufangen',
		'get_select_or' => 'oder',
		'get_sample_data_btn' => 'Einen Beispielsdatensatz verwenden',
		'get_fb_data_btn' => 'Mit Ihrem Facebook-Profil einloggen',
		'get_started_btn' => 'Fangen wir an',
	),
	
	
	
	
	// LOAD_DATA
	'load_data' => array(
		'0_heading' => 'Fangen wir an',
	),
	
	
	
	
	// PRIVACY
	'privacy' => array(
		
		'0_heading' => 'Datenschutzrichtlinie',
		'policy' => '
		
		
<p>Wir haben die fiktive Illuminus-Website allein für die Doku-Serie Do Not Track erstellt (<a href="https://www.donottrack-doc.com">www.donottrack-doc.com</a>).  Wenn Sie sich über Facebook anmelden, erhalten wir Zugriff auf die Daten, die Sie bereits auf Facebook geteilt haben, und erstellen daraus die Illuminus-Website. </p>

<p>Wenn Sie Illuminus nutzen, wird Ihr „Persönlichkeitsprofil“ erstellt.  Wenn Sie auf Illuminus zugreifen, während Sie eine Do Not Track-Folge ansehen und Sie dabei ein Do Not Track-Konto erstellen, werden Ihre Informationen in Ihrem Profil gespeichert.  In diesem Profil sind allein jene Informationen gespeichert, für welche Sie uns die Zugriffserlaubnis erteilt haben. Wenn Sie die Illuminus-Website über <a href="https://illuminus.io">illuminus.io</a> aufrufen, werden Ihre personenbezogenen Daten nicht gespeichert.</p>

<p>Wenn Sie <a href="https://www.donottrack-doc.com">www.donottrack-doc.com</a> nutzen, verlangen wir einige Informationen von Ihnen, wie beispielsweise Ihre E-Mail-Adresse oder Auszüge Ihres Browserverlaufs.  Falls Sie Ihre Informationen bereitwillig zur Verfügung stellen, finden Sie unten Ihre entsprechenden Rechte und unsere Verpflichtungen.</p>

<h4>Ihre Daten</h4>

<p>Die Produzenten gewährleisten, dass sie allein die gesammelten Daten nutzen und dass diese ausschließlich für das Projekt genutzt werden und weder an Dritte weitergegeben, noch diesen zugänglich gemacht oder an sie verkauft werden. Die Produzenten wenden technische und organisatorische Sicherheitsmaßnahmen an, um zu gewährleisten, dass die personenbezogenen Daten der Nutzer vor Verlust, betrügerischer Veränderung oder unerlaubtem Zugriff Dritter geschützt sind. Die während der Anmeldung gesammelten Daten werden verschlüsselt übermittelt, ebenso wie die weitere Kommunikation zwischen dem Server und dem Projekt.</p>

<p>Die Produzenten nutzen Ihre E-Mail-Adresse für folgende Zwecke:
<ul>
<li>um Sie über die kommenden Episoden des Projekts auf dem Laufenden zu halten;</li>
<li>um Ihnen Neuigkeiten zum Projekt mitzuteilen;</li>
<li>um den Projektinhalt auf Sie zuzuschneiden</li>
</ul>

Ihre personenbezogenen Daten werden während der gesamten Laufzeit des Projekts (3 Jahre) auf der Datenbank des Projekts gespeichert.</p>

<p>Sie haben das Recht, auf Ihre Daten zuzugreifen, diese zu ändern, zu verbessern oder zu löschen. Um von diesem Recht Gebrauch zu machen oder uns den Zugriff auf Ihre Daten zu entziehen, schicken Sie bitte eine E-Mail an: data@donottrack-doc.com</p>

<h4>INFORMATIK UND FREIHEITSRECHTE</h4>

<p>Gemäß des französischen Gesetzes Nummer 78-17 vom 6. Januar 1978 zu Informatik, Daten und Freiheitsrechten hat jeder Nutzer, der zum Projekt beiträgt, das Recht, seinen Inhalten zu widersprechen (Art. 38), auf diese zuzugreifen (Art. 39, 41, 42) und sie zu berichtigen (Art.40).</p>

<p>Somit hat der Nutzer das Recht zu verlangen, dass sein Beitrag verbessert, vervollständigt, erläutert, aktualisiert oder gelöscht wird, sofern er fehlerhaft, unvollständig, falsch oder veraltet ist oder die Sammlung der Daten, deren Nutzung, Kommunikation oder Speicherung verboten ist.</p>

<p>Jeder Nutzer kann von diesem Recht Gebrauch machen, indem er an folgende E-Mail-Adresse schreibt: data@donottrack-doc.com</p>

<h4>COOKIES</h4>

<p>Die Website http://donottrack-doc.com/ nutzt Google Analytics & XiTi.</p>

<p>Google Analytics ist ein Online-Analysedienst, mit welchem Do Not Track Ihre Nutzung der Website untersucht.</p>

<p>Die Cookies zur Analyse Ihres Nutzungsverhaltens beim Browsen der Website generieren folgende Daten: welche Websites Sie besucht haben; wie häufig Sie unsere Website besuchen bzw. ob Sie sie wiederholt besuchen; wie viel Zeit Sie auf der Website verbringen; wonach Sie dabei suchen; welchen Browser Sie benutzen; welcher Provider diesen Dienst zur Verfügung stellt und wo Sie sich laut Ihrer IP-Adresse befinden.</p>

<p>Diese Informationen werden von Google in der Regel an Server in den USA übermittelt und dort gespeichert.</p>

<p>Falls Sie Ihre IP-Adresse für die Nutzung dieser Website anonymisiert haben, wird Ihre IP-Adresse dennoch an Google übermittelt, jedoch vorab innerhalb der Mitgliedsstaaten der Europäischen Union oder der unterzeichneten Staaten des Abkommens über den Europäischen Wirtschaftsraum gekürzt. Ihre IP-Adresse wird nur in Ausnahmefällen vollständig an einen Google-Server in den USA übermittelt und dort gekürzt.</p>

<p>Neben weiteren von Google gesammelten Daten wird Google die übermittelte IP-Adresse nicht über Google Analytics kürzen. Google nutzt diese Informationen, um Ihre Nutzung unserer Website auszuwerten und für Do Not Track Berichte zur Aktivität auf der Website und der Internetnutzung zu verfassen. Dabei wird das Browser- und Nutzerverhalten gemessen und analysiert, es werden anonyme Navigationsprofile erstellt und Bereiche mit Entwicklungspotenzial auf Grundlage der Analyse der gesammelten Nutzungsdaten ausfindig gemacht.</p>

<p>Mehr dazu finden Sie in der Datenschutzerklärung von Google.</p>

<p>Sie können Cookies über Ihren Browser blockieren oder Google Analytics über eine Google-Erweiterung während der Nutzung deaktivieren.</p>

<p>XiTi ist ein von AT Internet zur Verfügung gestelltes Webanalyse-Tool zur Messung des Online-Publikumsverkehrs. Mithilfe eines Cookies verfolgt XiTi den Verlauf der Nutzung eines Website-Besuchers und erstellt damit Statistiken zur Besucherzahl. So wird beispielsweise gewährleistet, dass Besucher nicht doppelt gezählt werden, wenn sie die Website aktualisieren. Dadurch kann XiTi verhindern, dass Websitebetreiber ihre eigenen Statistiken beschönigen, indem sie ihre Website ständig aktualisieren.  XiTi nutzt die von diesem Cookie gesammelten Daten gemäß den Vorgaben von Do Not Track, um Berichte und Dienste in Bezug auf die Nutzung der Website und des Internets auszuschreiben.  Dabei gleicht XiTi Ihre IP-Adresse jedoch keinesfalls mit den gespeicherten Daten ab.</p>

<p>Weitere Informationen finden Sie in den Datenschutzbestimmungen von XiTi.</p>

<h4>Weitere Informationen</h4>

<p>Internetnutzer können weitere Informationen über Cookies und die Nutzung von Webanalyse-Tools über die Website der französischen Datenschutzbehörde CNIL einholen.</p>


<h4>URL zu den Nutzungsbedingungen</h4>

User Support Email: <a href="mailto:contact@donottrack-doc.com">contact@donottrack-doc.com</a><br>
User Support URL <a href="https://hub.donottrack-doc.com/en/about/">https://hub.donottrack-doc.com/en/about/</a>

',
	
	),
	
	
	// CREDITS
	'credits' => array(
		'0_heading' => 'Abspann',
		'1_creators' => 'Entwickler von Illuminus',
		'1_thankyou' => 'Vielen Dank',
		'1_predictions' => 'Psycho- und demografische Prognosen zu Charaktereigenschaften',
		'cambridge' => 'Psycho-und demografische Prognosen zu Charaktereigenschaften wurden per <a href="http://applymagicsauce.com/" target="_blank">Apply Magic Sauce API</a> erstellt. Dieser Algorithmus wurde am <a href="http://www.psychometrics.cam.ac.uk/" target="_blank">Psychometrics Centre der University of Cambridge</a> entwickelt.',
		
	),
	
	
	
	
	
	
	// FAQ
	'faq' => array(
		'0_heading' => 'FAQ',
		'what_heading' => 'Was ist Illuminus?',
		'what_text' => 'Illuminus ist ein fiktives Unternehmen, das mithilfe Ihrer „Gefällt mir“-Angaben auf Facebook ein Persönlichkeitsprofil erstellt.  Es handelt sich um eine ausgedachte Website, die für Do Not Track genutzt wird, eine personalisierte Web-Serie über Tracking und die Internetwirtschaft. Hierbei nutzt Illuminus den fiktiven Fall eines Unternehmens, das mithilfe von tatsächlich existierenden Methoden zur Datenanalyse Entscheidungen über finanzielle Dienste macht, die Ihnen zur Verfügung gestellt werden. Ihr Persönlichkeitsprofil und die daraus abgeleitete Einschätzung Ihrer Risikobereitschaft sind das Ergebnis einer Analyse Ihres Facebook-Profils. Diese basiert auf statistischen Wahrscheinlichkeiten. Es kann daher durchaus vorkommen, dass Ihr Profil fehlerhaft ist. Solange Sie das nicht beweisen können, werden Firmen wie Illuminus jedoch immer davon ausgehen, dass Ihr digitales Profil Ihre wahre Identität widerspiegelt.',
		'who_heading' => 'Wer hat Illuminus entwickelt',
		'who_text1' => 'Sehen Sie sich hierzu bitte den ',
		'who_text2' => 'Abspann an',
		'fberror_heading' => 'Laut Illuminus reichen meine Daten nicht aus',
		'fberror_text' => 'Dieser Fehler kann aus folgenden Gründen auftreten:
			<ul>
			<li>Sie sind nicht bei Facebook angemeldet</li>
			<li>Sie haben Illuminus nicht die notwendigen Zugriffsberechtigungen erteilt</li>
			<li>Sie haben nicht genug Daten oder Sie haben diese manuell geschützt und können deshalb nicht teilnehmen So machen Sie Ihre „Likes“ öffentlich:
				<ol>
				<li>Gehen Sie zu Ihrem Facebook-Profil</li>
				<li>Klicken Sie in der Überschriftenleiste unter Ihrem Cover-Foto neben den Fotos auf <b>Mehr</b></li>
				<li>Wählen Sie <b>„Gefällt mir“-Angaben</b> aus (falls diese nicht aufgelistet werden, klicken Sie auf „Abschnitte verwalten“ und wählen Sie dann „Gefällt mir“-Angaben aus)</li>
				<li>Klicken Sie in der oberen rechten Ecke auf das Stift-Symbol, um zu <b>Verwalten</b> zu gelangen</li>
				<li>Wählen Sie dann <b>Privatsphäre bearbeiten</b></li>
				<li>Achten Sie darauf, dass die Privatsphäreneinstellungen Ihrer „Gefällt mir“-Angaben jeweils auf „öffentlich“ eingestellt sind</li>
				</ol>
			</li>
			</ul>',
		'bugs_heading' => 'Ich habe einen Bug entdeckt',
		'bugs_text' => 'Bitte melden Sie Bugs <a href="mailto:contact@donottrack-doc.com">contact@donottrack-doc.com</a>',

	),



	'big5' => array(
	
		'Extraversion' => array(
			'name' => 'Extraversion',
			'keywords' => 'gesellig, freundlich, gesprächig',
			'keywords_F' => 'gesellig, freundlich, gesprächig',
			'opposite' => 'Introversion',
			'opposite_keywords' => 'zurückhaltend, reserviert',
			'opposite_keywords_F' => 'zurückhaltend, reserviert',
			'desc' => ''
		),
		'Openness' => array(
			'name' => 'Offenheit',
			'keywords' => 'kreativ, erfinderisch, wagemutig',
			'keywords_F' => 'kreativ, erfinderisch, wagemutig',
			'opposite' => 'Engstirnigkeit',
			'opposite_keywords' => 'engstirnig, ungebildet',
			'opposite_keywords_F' => 'engstirnig, ungebildet',
			'desc' => ''
		),
		'Conscientiousness' => array(
			'name' => 'Gewissenhaftigkeit',
			'keywords' => 'organisiert, vernünftig, strebsam',
			'keywords_F' => 'organisiert, vernünftig, strebsam',
			'opposite' => 'Impulsivität',
			'opposite_keywords' => 'unzuverlässig, impulsiv',
			'opposite_keywords_F' => 'unzuverlässig, impulsiv',
			'desc' => ''
		),
		'Agreeableness' => array(
			'name' => 'Verträglichkeit',
			'keywords' => 'hilfsbereit, warmherzig, mitfühlend',
			'keywords_F' => 'hilfsbereit, warmherzig, mitfühlend',
			'opposite' => 'Feindseligkeit',
			'opposite_keywords' => 'feindselig, unfreundlich',
			'opposite_keywords_F' => 'feindselig, unfreundlich',
			'desc' => ''
		),
		'Neuroticism' => array(
			'name' => 'Neurotizismus',
			'keywords' => 'ruhig, gelassen, beherrscht',
			'keywords_F' => 'ruhig, gelassen, beherrscht',
			'opposite' => 'Emotionale Stabilität',
			'opposite_keywords' => 'launisch, nervös',
			'opposite_keywords_F' => 'launisch, nervös',
			'desc' => ''
		)
	

	),
	
	
	// Illuminus home page
	'homepage' => array(
		
		'title' => 'Illuminus – Erfahren Sie, was in Ihnen steckt',
	
		'home' => 'Home',
		'unlocking' => 'Erfahren Sie, was in Ihnen steckt',
		'get_started_btn' => 'Fangen wir an',
		
		'services' => 'Dienste',
		'our_services' => 'Unsere Dienste',
		
		// SERVICES
		'risk_assessment' => 'Einschätzung Ihrer Risikobereitschaft ',
		'future' => 'Ihre Vergangenheit bestimmt Ihre Zukunft',
		'liveforever' => 'LiveForever',
		'dna_backup' => 'DNA-Backup',
		'coming_soon' => 'bald',
		'social_media' => 'Integration für soziale Netzwerke ',
		'you_have_no_idea' => 'Sie haben keine Ahnung, was wir schon alles wissen',
		
		// future present
		'future_present' => 'Zukünftige und gegenwärtige Risikoprognose',
		'learn_what' => 'Erfahren Sie, was wir bereits über Sie wissen ',
		'launch_btn' => 'Tool zur Einschätzung Ihrer Risikobereitschaft starten',
		
		// more links
		'privacy' => 'Datenschutz',
		'contact' => 'Kontakt',
			
		
	),


);


?>