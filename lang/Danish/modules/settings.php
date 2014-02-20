<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) Copyright (C) 2008 - 2013 The OGP Development Team
 *
 * http://www.opengamepanel.org/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 */

// settings.php

$lang['settings'] = "Panel indstillinger";
$lang['maintenance_mode'] = "Vedligeholdelse";
$lang['maintenance_mode_info'] = "Beskeden der bliver vist, til almindelige brugere under vedligeholdelse.";
$lang['maintenance_title'] = "Vedligeholdes Title";
$lang['maintenance_title_info'] = "Denne title bliver vist, til normale brugere, under vedligeholdes.";
$lang['maintenance_message'] = "Vedligeholde Besked";
$lang['maintenance_message_info'] = "Denne besked bliver vist til almindelige brugere imens vedligeholde fortages.";
$lang['update_settings'] = "Opdatere Indstillinger";
$lang['settings_updated'] = "Indstillinger succesfuldt opdateret";
$lang['panel_language'] = "Panel Sprog";
$lang['panel_language_info'] = "Dette sprog er standard sprog for panel. Brugere ka det, til deres eget sprog, fra redigere profil.";
$lang['page_auto_refresh'] = "Siden genopfrisker automatisk";
$lang['page_auto_refresh_info'] = "Automatisk genopfrisk sidens indehold, bliver primært brugt til panel fejlfinding. Under normal brug, burde den været sat til aktiveret.";
$lang['smtp_server'] = "Udgående E-Mail Server";
$lang['smtp_server_info'] = "Dette er en udgående mail server (SMTP server), som bliver brugt til, f.eks, til at sende glemte adgangskoder til brugere, lokalvært er som standard.";
$lang['panel_email_address'] = "Udgående E-Mail Addresse";
$lang['panel_email_address_info'] = "Dette er e-mail adressen, som er fra feltet, hvor adgangskoder bliver sendt til brugerne.";
$lang['panel_name'] = "Panel navn";
$lang['panel_name_info'] = "Navnet på panelet, som bliver vist på title siden. Denne værdi, vil overskrive alle siders titler, hvis det er tomt.";
$lang['feed_enable'] = "Aktivere LGSL Feed";
$lang['feed_enable_info'] = "Hvis din udbyder, har firewall til at blokere query port, så må der åbnes for den.";
$lang['feed_url'] = "Feed URL";
$lang['feed_url_info'] = "GrayCube.com deler LGSL feed lin til:<br><b>http://www.greycube.co.uk/lgsl/feed/lgsl_files/lgsl_feed.php</b>";
$lang['charset'] = "Character Encoding";
$lang['charset_info'] = "UTF8, ISO, ASCII, osv... Lad den stå blank, for at bruge ISO encoding.";
$lang['steam_user'] = "Steam Bruger";
$lang['steam_user_info'] = "Denne bruger bruges til at logge ind på steam, for at downloade nogle nye spil, så som CS: GO.";
$lang['steam_pass'] = "Steam Adgangskode";
$lang['steam_pass_info'] = "Skriv din steam adgangskode her.";
$lang['steam_guard'] = "Steam Guard";
$lang['steam_guard_info'] = "Nogle brugere har steam guard aktiveret, for at beskyttet deres konto mod hackning,<br>denne kode er sent til steam konto's email, når den første steam opdatering starter.";
$lang['smtp_port'] = "SMTP Port";
$lang['smtp_port_info'] = "Hvis SMTP porten ikke er sat standard port (25) Så skriv SMTP porten her.";
$lang['smtp_login'] = "SMTP Bruger";
$lang['smtp_login_info'] = "Hvis din SMTP server behøver godkendelse, så skriv din brugernavn her.";
$lang['smtp_passw'] = "SMTP Kodeord";
$lang['smtp_passw_info'] = "Hvis du ikke har sat et kodeord, vil SMTP godkendelse blive slået fra.";
$lang['smtp_ssl'] = "SMTP SSL";
$lang['smtp_ssl_info'] = "Brug SSL til at forbinde med SMTP server";
$lang['time_zone'] = "Tids Zone";
$lang['time_zone_info'] = "Sætter den standarde tidszone, bruges af alle dato/tids funktioner.";
$lang['query_cache_life'] = "Query cache liv";
$lang['query_cache_life_info'] = "Indstil timeout i sekunder, før serveren status bliver genopfrisket.";
$lang['query_num_servers_stop'] = "Disable Game Server Queries After";
$lang['query_num_servers_stop_info'] = "Use this setting to disable queries if a user owns more game servers than this amount specified to speed up panel loading.";
$lang['editable_email'] = "Editable E-Mail Address";
$lang['editable_email_info'] = "Select if users can edit their e-mail address or not.";
$lang['old_dashboard_behavior'] = "Old Dashboard behavior";
$lang['old_dashboard_behavior_info'] = "The old Dashboard was running slower but shows more server information, current players and map.";
$lang['rsync_available'] = "Available rsync servers";
$lang['rsync_available_info'] = "Select what servers list will be shown in the rsync installation.";
$lang['all_available_servers'] = "All available servers ( rsync_sites.list + rsync_sites_local.list )";
$lang['only_remote_servers'] = "Only remote servers ( rsync_sites.list )";
$lang['only_local_servers'] = "Only local servers ( rsync_sites_local.list )";
$lang['header_code'] = "Header code";
$lang['header_code_info'] = "Here you can write your own header code (like HTML code, Embed Code etc.) without editing the theme layout.";
$lang[''] = "";

// Theme settings
$lang['theme_settings'] = "Tema Indstillinger";
$lang['themes'] = "Tema Indstillinger";
$lang['theme'] = "Tema";
$lang['theme_info'] = "Dette tema, ville være det standarde tema for alle brugere. Brugere kan ændre deres tema, fra profil siden.";
$lang['welcome_title'] = "Velkommenst Titel";
$lang['welcome_title_info'] = "Aktivere titel, til at vise det I toppen af instrumentpanel.";
$lang['welcome_title_message'] = "Velkomst Titel besked";
$lang['welcome_title_message_info'] = "Titel besked, som bliver vist I toppen af instrumentpanelet (html tilladt).";
$lang['logo_link'] = "Logo Links";
$lang['logo_link_info'] = "Diverse logo links. <b style='font-size:10px; font-weight:normal;'>(Lad den stå blank, ville linke det til instrumentpanel)</b>";
$lang['custom_tab'] = "Tilpas Faneblad";
$lang['custom_tab_info'] = "Tilføjer tilpasset faneblad, for enden af menuen. <b style='font-size:10px; font-weight:normal;'>(Anvend og genfrisk side for at redigere indstillinger)</b>";
$lang['custom_tab_name'] = "Tilpasset Faneblad Navn";
$lang['custom_tab_name_info'] = "Faneblad vis navn.";
$lang['custom_tab_link'] = "Tilpasset Faneblad Link";
$lang['custom_tab_link_info'] = "Faneblads hyperlink.";
$lang['custom_tab_sub'] = "Tilpasset Under-Faner";
$lang['custom_tab_sub_info'] = "Tilføjer tilpasset under-faner, når musen føres over 'Tilpas Fanblad'.";
$lang['custom_tab_sub_name'] = "Under-Fane #1 Name";
$lang['custom_tab_sub_link'] = "Under-Fane #1 Link";
$lang['custom_tab_sub_name2'] = "Under-Fane #2 Name";
$lang['custom_tab_sub_link2'] = "Under-Fane #2 Link";
$lang['custom_tab_sub_name3'] = "Under-Fane #3 Name";
$lang['custom_tab_sub_link3'] = "Under-Fane #3 Link";
$lang['custom_tab_sub_name4'] = "Under-Fane #4 Name";
$lang['custom_tab_sub_link4'] = "Under-Fane #4 Link";
$lang['custom_tab_target_blank'] = "Tilpasset Fane-blade henvisning";
$lang['custom_tab_target_blank_info'] = "Sæt alle fane-blade til henvisning. <b style='font-size:10px; font-weight:normal;'>('_self' = Åben links på samme side. '_blank'  =  Åben link på en ny tab tab.)</b>";
$lang['bg_wrapper'] = "Indpaknings Baggrund";
$lang['bg_wrapper_info'] = "Indpaknings baggrunds billed. <b style='font-size:10px; font-weight:normal;'>(Fungere kun på nogle temaer.)</b>";

?>