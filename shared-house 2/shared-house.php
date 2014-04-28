<?php
/*
 Plugin Name: Shared House
 Plugin URI: http://www.shared-house.com/free-booking-calendar.php
 Description: Free booking calendar for wordpress
 Version: 1.0.1
 Author: Shared-house.com
 Author URI: http://www.shared-house.com
 */


/* Runs when plugin is activated */
register_activation_hook(__FILE__,'shared_house_install');

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'shared_house_remove' );

function shared_house_install() {
	/* Creates new database field */
	add_option("shared_house_data", '132', '', 'yes');
	add_option("shared_house_saison", 'avec', '', 'yes');
	add_option("shared_house_langue", 'fr', '', 'yes');

}

function shared_house_remove() {
	/* Deletes the database field */
	delete_option('shared_house_data');
	delete_option('shared_house_saison');
	delete_option('shared_house_langue');
}

function shared_house_widget()
{
	//	echo"<h2>Disponibilites</h2>I love ";


	$numero = get_option('shared_house_data');
	//$numero = intval( $params->get( 'numero', 5 ) );
	$langue = get_option('shared_house_langue'); ;
	//$langue = $params->get( 'langue') ;
	$saisons = get_option('shared_house_saison');
	//$saisons = $params->get( 'saisons') ;

	// Déclaration
	$lien_signature['fr']='http://www.shared-house.com/index_booking_calendar.php';
	$lien_signature['en']='http://www.shared-house.com/free-booking-calendar.php';
	$lien_signature['nl']='http://www.shared-house.com/index_booking_calendar_nl.php?&langue=nl';
	$lien_signature['es']='http://www.shared-house.com/index_booking_calendar_es.php?&langue=es';
	$lien_signature['fi']='http://www.shared-house.com/free-booking-calendar.php';
	$lien_signature['de']='http://www.shared-house.com/index_booking_calendar_de.php?&langue=de';


	$lien_accueil_c['fr']="http://www.shared-house.com";
	$lien_accueil_c['en']="http://www.shared-house.com/index.php?&langue=en";
	$lien_accueil_c['nl']="http://www.shared-house.com/index.php?&langue=nl";
	$lien_accueil_c['es']="http://www.shared-house.com/index.php?&langue=es";
	$lien_accueil_c['fi']="http://www.shared-house.com/index.php?&langue=fi";
	$lien_accueil_c['de']="http://www.shared-house.com/index.php?&langue=de";

	$text['toutes_dispos']['fr']='Toutes les disponibilites - reservation ou demande d\'information';$text['toutes_dispos']['en']='Availabilities overview - Reservation and information request';$text['toutes_dispos']['nl']='Overzicht van de beschikbaarheid - reservering of informatie aanvragen';$text['toutes_dispos']['fi']='Tarkista saatavuus - varaukset ja varauspyynnot';
	$text['toutes_dispos']['es']='Todas las disponibilidades - reserva o solicitud de informacion';
	$text['toutes_dispos']['de']='übersicht der Verfügbarkeit, Buchungs- und Informationsanfrage';


	$digit=$numero-10*(intval($numero/10));

	$text['catch1.1']['fr']=' pour votre ';$text['catch1.1']['en']=' for your ';$text['catch1.1']['nl']=' voor uw ';$text['catch1.1']['fi']=' sinun ';		$text['catch1.1']['de']=' für Ihre '; 		$text['catch1.1']['es']=' para su ';
	switch ($digit) {
	case 0:
	$text['catch1']['es']='reserva natural ';
		$text['catch1']['fr']='calendrier reservation par ';$text['catch1']['en']='free booking calendar by ';$text['catch1']['nl']='gratis reserveringskalender van ';$text['catch1']['fi']='ilmainen varauskalenteri ';
		$text['catch2']['fr']='calendrier disponibilite par ';$text['catch2']['en']='free availability calendar by ';$text['catch2']['nl']='gratis beschikbaarheidskalender van ';$text['catch2']['fi']='ilmainen saatavuuskalenteri ';
		$text['catch2']['es']='calendario de disponibilidad ';
		$text['catch1.3']['fr']='annonce location gratuite';$text['catch1.3']['en']='free holiday advertising';$text['catch1.3']['nl']='vakantiewoning verhuur';$text['catch1.3']['fi']='lomavuokraus';

		$text['catch1.3']['es']='anuncio de alquiler';
		$text['catch1']['de']='Gratis Buchungskalender von ';
		$text['catch2']['de']='Gratis Verfügbarkeitskalender von ';
		$text['catch1.3']['de']='Ferienwohnung Anzeige';
		break;
	case 1:
	$text['catch1']['es']='Calendario de disponibilidad ';
		$text['catch1']['fr']='calendrier de reservation par ';$text['catch1']['en']='booking calendar by ';$text['catch1']['nl']='reserveringskalender van ';$text['catch1']['fi']='ilmainen varauskalenteri ';
		$text['catch2']['fr']='calendrier de disponibilite par ';$text['catch2']['en']='availability calendar by ';$text['catch2']['nl']='beschikbaarheidskalender van ';$text['catch2']['fi']='ilmainen saatavuuskalenteri ';
		$text['catch2']['es']='calendario de libre disponibilidad ';
		$text['catch1.3']['fr']='location saisonniere vacances';$text['catch1.3']['en']='free online ads';$text['catch1.3']['nl']='vakantiewoning verhuur';$text['catch1.3']['fi']='lomavuokraus';
		 
		$text['catch1.3']['es']='anuncio de alquiler';
		$text['catch1']['de']='Gratis Buchungskalender von ';
		$text['catch2']['de']='Gratis Verfügbarkeitskalender von ';
		$text['catch1.3']['de']='Ferienwohnung Anzeige';
		break;
	case 2:
	$text['catch1']['es']='Alquiler de Calendario ';
		$text['catch1']['fr']='calendrier de location par ';$text['catch1']['en']='online booking calendar by ';$text['catch1']['nl']='reserveringskalender van ';$text['catch1']['fi']='ilmainen varauskalenteri ';
		$text['catch2']['fr']='calendrier de disponibilite par ';$text['catch2']['en']='online availability calendar by ';$text['catch2']['nl']='beschikbaarheidskalender van ';$text['catch2']['fi']='ilmainen saatavuuskalenteri ';
		$text['catch2']['es']='calendario de libre disponibilidad ';
		$text['catch1.3']['fr']='annonce gratuite location';$text['catch1.3']['en']='cottage holidays';$text['catch1.3']['nl']='vakantiewoning verhuur';$text['catch1.3']['fi']='lomavuokraus';
	
		$text['catch1.3']['es']='anuncio de alquiler';
		$text['catch1']['de']='Gratis Buchungskalender von ';
		$text['catch2']['de']='Gratis Verfügbarkeitskalender von ';
		$text['catch1.3']['de']='Ferienwohnung Anzeige';
		break;
	case 3:
 
	$text['catch1']['es']='la planificación de reservas ';
		$text['catch1']['fr']='planning de reservation par ';$text['catch1']['en']='joomla booking calendar by ';$text['catch1']['nl']='reserveringskalender van ';$text['catch1']['fi']='ilmainen varauskalenteri ';
		$text['catch2']['fr']='calendrier de disponibilite par ';$text['catch2']['en']='availability calendars by ';$text['catch2']['nl']='beschikbaarheidskalender van ';$text['catch2']['fi']='ilmainen saatavuuskalenteri ';
			$text['catch2']['es']='calendario de libre disponibilidad ';	
		$text['catch1.3']['fr']='annonce gratuite de location';$text['catch1.3']['en']='cottages to rent';$text['catch1.3']['nl']='vakantiewoning verhuur';$text['catch1.3']['fi']='lomavuokraus';
	
		$text['catch1.3']['es']='anuncio de alquiler';
		$text['catch1']['de']='Gratis Buchungskalender von ';
		$text['catch2']['de']='Gratis Verfügbarkeitskalender von ';
		$text['catch1.3']['de']='Ferienwohnung Anzeige';
		break;
	case 4:
	$text['catch1']['es']='reservas horario ';
		$text['catch1']['fr']='calendrier reservations par ';$text['catch1']['en']='reservation calendar by ';$text['catch1']['nl']='reserveringskalender van ';$text['catch1']['fi']='ilmainen varauskalenteri ';
		$text['catch2']['fr']='calendrier de disponibilite par ';$text['catch2']['en']='availability calendar free by ';$text['catch2']['nl']='beschikbaarheidskalender van ';$text['catch2']['fi']='ilmainen saatavuuskalenteri ';
				$text['catch2']['es']='calendario de libre disponibilidad ';
		$text['catch1.3']['fr']='location vacances saisonniere';$text['catch1.3']['en']='holiday accommodation';$text['catch1.3']['nl']='vakantiewoning verhuur';$text['catch1.3']['fi']='lomavuokraus';

		$text['catch1.3']['es']='anuncio de alquiler';
		$text['catch1']['de']='Gratis Buchungskalender von ';
		$text['catch2']['de']='Gratis Verfügbarkeitskalender von ';
		$text['catch1.3']['de']='Ferienwohnung Anzeige';
		break;
	case 5:
	$text['catch1']['es']='reserva guión calendario ';
		$text['catch1']['fr']='script calendrier reservation par ';$text['catch1']['en']='php booking calendar by ';$text['catch1']['nl']='reserveringskalender van ';$text['catch1']['fi']='ilmainen varauskalenteri ';
		$text['catch2']['fr']='calendrier de disponibilite par ';$text['catch2']['en']='availability calendar for website';$text['catch2']['nl']='beschikbaarheidskalender van ';$text['catch2']['fi']='ilmainen saatavuuskalenteri ';
				$text['catch2']['es']='calendario de libre disponibilidad ';
		$text['catch1.3']['fr']='location villa vacances';$text['catch1.3']['en']='cottage holiday rental';$text['catch1.3']['nl']='vakantiewoning verhuur';$text['catch1.3']['fi']='lomavuokraus';

		$text['catch1.3']['es']='anuncio de alquiler';
		$text['catch1']['de']='Gratis Buchungskalender von ';
		$text['catch2']['de']='Gratis Verfügbarkeitskalender von ';
		$text['catch1.3']['de']='Ferienwohnung Anzeige';
		break;
	case 6:
	$text['catch1']['es']='calendario de reservas gratuito ';
		$text['catch1']['fr']='calendrier reservation php par ';$text['catch1']['en']='web booking calendar';$text['catch1']['nl']='reserveringskalender van ';$text['catch1']['fi']='ilmainen varauskalenteri ';
		$text['catch2']['fr']='calendrier de disponibilite par ';$text['catch2']['en']='availability calendar script by ';$text['catch2']['nl']='beschikbaarheidskalender van ';$text['catch2']['fi']='ilmainen saatavuuskalenteri ';
				$text['catch2']['es']='calendario de libre disponibilidad ';
		$text['catch1.3']['fr']='location vacances particulier';$text['catch1.3']['en']='holiday home rentals';$text['catch1.3']['nl']='vakantiewoning verhuur';$text['catch1.3']['fi']='lomavuokraus';

		$text['catch1.3']['es']='anuncio de alquiler';
		$text['catch1']['de']='Gratis Buchungskalender von ';
		$text['catch2']['de']='Gratis Verfügbarkeitskalender von ';
		$text['catch1.3']['de']='Ferienwohnung Anzeige';
		break;
	case 7:
	$text['catch1']['es']='Calendario de disponibilidad ';
		$text['catch1']['fr']='calendrier de reservation par ';$text['catch1']['en']='booking calendar free';$text['catch1']['nl']='reserveringskalender van ';$text['catch1']['fi']='ilmainen varauskalenteri ';
		$text['catch2']['fr']='calendrier de disponibilite par ';$text['catch2']['en']='availability calendar html by ';$text['catch2']['nl']='beschikbaarheidskalender van ';$text['catch2']['fi']='ilmainen saatavuuskalenteri ';
				$text['catch2']['es']='calendario de libre disponibilidad ';
		$text['catch1.3']['fr']='location gite vacances';$text['catch1.3']['en']='holiday rental france';$text['catch1.3']['nl']='vakantiewoning verhuur';$text['catch1.3']['fi']='lomavuokraus';
	
		$text['catch1.3']['es']='anuncio de alquiler';
		$text['catch1']['de']='Gratis Buchungskalender von ';
				$text['catch2']['de']='Gratis Verfügbarkeitskalender von ';
		$text['catch1.3']['de']='Ferienwohnung Anzeige';
		break;
	case 8:
	$text['catch1']['es']='reserva natural ';
		$text['catch1']['fr']='calendrier reservation par ';$text['catch1']['en']='booking calendar script';$text['catch1']['nl']='reserveringskalender van ';$text['catch1']['fi']='ilmainen varauskalenteri ';
		$text['catch2']['fr']='calendrier de disponibilite par ';$text['catch2']['en']='availability calendar widget by ';$text['catch2']['nl']='beschikbaarheidskalender van ';$text['catch2']['fi']='calendario de libre disponibilidad ';
		 		$text['catch2']['es']='calendario de libre disponibilidad ';
		$text['catch1.3']['fr']='location appartement vacances';$text['catch1.3']['en']='holiday villa rental';$text['catch1.3']['nl']='vakantiewoning verhuur';$text['catch1.3']['fi']='lomavuokraus';
	
		$text['catch1.3']['es']='anuncio de alquiler';
		$text['catch1']['de']='Gratis Buchungskalender von ';
		$text['catch2']['de']='Gratis Verfügbarkeitskalender von ';
		$text['catch1.3']['de']='Ferienwohnung Anzeige';
		break;
	case 9:
	 
	$text['catch1']['es']='la planificación de reservas ';
		$text['catch1']['fr']='planning reservation par ';$text['catch1']['en']='booking calendar html';$text['catch1']['nl']='reserveringskalender van ';$text['catch1']['fi']='ilmainen varauskalenteri ';
		$text['catch2']['fr']='calendrier de disponibilite par ';$text['catch2']['en']='joomla availability calendar by ';$text['catch2']['nl']='beschikbaarheidskalender van ';$text['catch2']['fi']='ilmainen saatavuuskalenteri ';
		$text['catch2']['es']='calendario de libre disponibilidad ';
		$text['catch1.3']['fr']='location maison vacances';$text['catch1.3']['en']='holiday villa rentals';$text['catch1.3']['nl']='vakantiewoning verhuur';$text['catch1.3']['fi']='lomavuokraus';

		$text['catch1.3']['es']='anuncio de alquiler';
		$text['catch1']['de']='Gratis Buchungskalender von ';
		$text['catch2']['de']='Gratis Verfügbarkeitskalender von ';
		$text['catch1.3']['de']='Ferienwohnung Anzeige';
		break;
		
	}


	// echo JText::_('ADNUMBER');

	if ($saisons=='avec')
	{


		// 200
		// iframe 211
		//  border-style: none; border-width: 0px;
		// style="margin-left: -19px;
		// 196 / 190
		?>

<table align="center"
	style="text-align: center; width: 198px; border-style: none; border-width: 0px; border-collapse: collapse; margin: 0 auto;">
	<!-- <tr><td></td></tr> 	-->
	<tr align="center">
		<td>
		<div
			style="margin-left: -25px; border-style: none; border-width: 0px;"><iframe
			border-style:none;	border-width: 0px; src="http://www.shared-house.com/calendar_iframe_1.php?numero=<?php echo $numero; ?>&langue=<?php echo $langue; ?>&style=1"
			scrolling="no" frameborder="0" height="150" width="192" title=""
			allowtransparency="true";></iframe></div>
		</td>
	</tr>

	<tr>

		<td
			style="border-style: none; border-width: 0px; text-transform: uppercase; line-height: 1; vertical-align: top;">
		<div
			style="margin-left: -4px; border-style: none; border-width: 0px; text-align: center;">
		<a target="_top"
			style="font-family: Verdana; font-size: 10px; color: #006600; text-align: center; font-weight: bold;"
			href="http://www.shared-house.com/vacancy_planning.php?numero=<?php echo $numero; ?>&langue=<?php echo $langue; ?>&style=1"><?php echo $text['toutes_dispos'][$langue]; ?></a></div>
		</td>
	</tr>

	<tr>
		<td>
		<div style="margin-left: -5px; border-style: none; border-width: 0px;">
		<?php
		if ($langue=='es' or $langue=='es')
		{
			$height_haut=127;
		}
		else
		$height_haut=117;
		?> <iframe
			src="http://www.shared-house.com/cal_legend_iframe_1.php?langue=<?php echo $langue; ?>"
			scrolling="no" frameborder="0" height="<?php echo $height_haut; ?>"
			width="198" title="" allowtransparency="true";></iframe></div>
		</td>
	</tr>

	<tr>
		<td style="line-height: 1; vertical-align: top; font-family: Verdana; font-size: 9px; text-align: center; font-weight: normal; color: #006600;"><?php
		echo $text['catch2'][$langue].'<a style="font-family: Verdana; font-size: 9px; text-align: center; font-weight: normal; color: #006600;"
			href="'.$lien_signature[$langue].'">shared-house.com</a>';
		?>
		</td>
		</tr>
	<!-- 
-->
</table>

	<?php


	}
	else
	{ // sans saisons

		?>
<table align="center"
	style="text-align: center; width: 196px; border-style: none; border-width: 0px; border-collapse: collapse; margin: 0 auto;">
	<!-- <tr><td></td></tr> 	-->
	<tr align="center">
		<td>
		<div
			style="margin-left: -19px; border-style: none; border-width: 0px;"><iframe
			border-style:none;	border-width: 0px; src="http://www.shared-house.com/calendar_iframe_1.php?numero=<?php echo $numero; ?>&langue=<?php echo $langue; ?>&style=1"
			scrolling="no" frameborder="0" height="150" width="190" title=""
			allowtransparency="true";></iframe></div>
		</td>
	</tr>

	<tr>

		<td
			style="border-style: none; border-width: 0px; text-transform: uppercase; line-height: 1; vertical-align: top;">
		<div
			style="margin-left: -4px; border-style: none; border-width: 0px; text-align: center;">
		<a target="_top"
			style="font-family: Verdana; font-size: 10px; color: #006600; text-align: center; font-weight: bold;"
			href="http://www.shared-house.com/vacancy_planning.php?numero=<?php echo $numero; ?>&langue=<?php echo $langue; ?>&style=1"><?php echo $text['toutes_dispos'][$langue]; ?></a></div>
		</td>
	</tr>



	<tr>
		<td>
		<div style="margin-left: -5px; border-style: none; border-width: 0px;">
		<iframe
			src="http://www.shared-house.com/cal_legend_iframe_simple_1.php?langue=<?php echo $langue; ?>"
			scrolling="no" frameborder="0" height="60" width="198" title=""
			allowtransparency="true";></iframe></div>
		</td>
	</tr>

	<tr>

		<td style="line-height: 1; vertical-align: top; font-family: Verdana; font-size: 9px; text-align: center; font-weight: normal; color: #006600;"><?php
		echo $text['catch2'][$langue].'<a style="font-family: Verdana; font-size: 9px; text-align: center; font-weight: normal; color: #006600;"
			href="'.$lien_signature[$langue].'">shared-house.com</a>';
		?></td>
		</tr>
</table>
		<?php

	}





}

function init_shared_house()
{
	register_sidebar_widget("Shared House calendar", "shared_house_widget");
}
function shared_house_html_page() {



	?>
<div>
<h2>Shared House Options</h2>

<form method="post" action="options.php"><?php wp_nonce_field('update-options'); ?>
<div>Change the ad # by your actual ad number on shared-house.com. If you don't have
		an ad number yet, just create one by following this  <a
			href="http://	www.shared-house.com/admin.php?&langue=en">link</a>.<br><br></div>
<table width="820">
	<tr valign="top">
		<th width="220" scope="row">Ad # on shared-house.com:</th>
		<td width="600"><input name="shared_house_data" type="text"
			id="shared_house_data" size="8"
			value="<?php echo get_option('shared_house_data'); ?>" /></td>
	</tr>
	<tr valign="top">
		<th width="200" scope="row">Legend with seasons:</th>
		<td	width="600"><select name="shared_house_saison" id="shared_house_saison"
					>
					<option value=avec <?php if (get_option('shared_house_saison')=='avec') echo 'selected'; ?>>With</option>
					<option value=sans <?php if (get_option('shared_house_saison')=='sans') echo 'selected'; ?>>Without</option>
				</select> Select "With" if you want to use seasons (very high, high, medium ...)</td>
	</tr>
	<tr valign="top">
		<th width="200" scope="row">Language:</th>
		<td width="600"><select name="shared_house_langue" id="shared_house_langue"
					>
					<option value=fr <?php if (get_option('shared_house_langue')=='fr') echo 'selected'; ?>>Fran&ccedil;ais</option>
					<option value=en <?php if (get_option('shared_house_langue')=='en') echo 'selected'; ?>>English</option>
					<option value=nl <?php if (get_option('shared_house_langue')=='nl') echo 'selected'; ?>>Nederlands</option>
					<option value=es <?php if (get_option('shared_house_langue')=='es') echo 'selected'; ?>>Espa&ntilde;ol</option>			
					<option value=de <?php if (get_option('shared_house_langue')=='de') echo 'selected'; ?>>Deutsch</option>	
					<option value=fi <?php if (get_option('shared_house_langue')=='fi') echo 'selected'; ?>>Suomen</option>																	
				</select> Select the language in which you want to display the calendar
				<!--  <input name="shared_house_langue" type="text"
			id="shared_house_langue"
			value="<?php echo get_option('shared_house_langue'); ?>" /> (ex.
		Hello World)--></td>
	</tr>
</table>

<input type="hidden" name="action" value="update" /> <input
	type="hidden" name="page_options" value="shared_house_data,shared_house_saison,shared_house_langue" /> 
	
<p>
Enter the parameters, then click on "Save". <br><br>
This will create a widget. You can then display the widget where you wish: click on Appearance->Widget in the right menu, and drag and drop the "Shared House calendar" widget where you want to display it.
</p>

<p><input type="submit" value="<?php _e('Save Changes') ?>" /></p>

</form>
</div>
	<?php
}
add_action("plugins_loaded", "init_shared_house");
if ( is_admin() )
{

	/* Call the html code */
	add_action('admin_menu', 'shared_house_admin_menu');

	//on enregistre le plugin



	if (1==1)
	{

	}

	function shared_house_admin_menu() {
		add_options_page('Shared House', 'Shared House', 'administrator',
'shared-house', 'shared_house_html_page');
	}
}
?>
