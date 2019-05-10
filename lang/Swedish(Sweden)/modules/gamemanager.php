<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2018 The OGP Development Team
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

define('OGP_LANG_no_games_to_monitor', "Du har inga spel upplagda som du kan kontrollera. ");
define('OGP_LANG_status', "Status");
define('OGP_LANG_fail_no_mods', "Inga moddar är aktiverade för detta spel! Du måste fråga din OGP-administratör för att lägga till modd(ar) för det spel som tilldelats till dig. ");
define('OGP_LANG_no_game_homes_assigned', "You don't have any servers assigned to your account.");
define('OGP_LANG_select_game_home_to_configure', "Välj en spelserver du vill konfigurera");
define('OGP_LANG_file_manager', "Filhanterare");
define('OGP_LANG_configure_mods', "Konfigurera moddar ");
define('OGP_LANG_install_update_steam', "Installera/uppdatera via Steam");
define('OGP_LANG_install_update_manual', "Installera/uppdatera manuellt ");
define('OGP_LANG_assign_game_homes', "Tilldela spelservrar");
define('OGP_LANG_user', "Användare");
define('OGP_LANG_group', "Grupp");
define('OGP_LANG_start', "Starta");
define('OGP_LANG_ogp_agent_ip', "OGP-Agent IP");
define('OGP_LANG_max_players', "Max antal spelare");
define('OGP_LANG_max', "Max");
define('OGP_LANG_ip_and_port', "IP och port");
define('OGP_LANG_available_maps', "Tillgängliga kartor");
define('OGP_LANG_map_path', "Kartsökväg");
define('OGP_LANG_available_parameters', "Tillgängliga parametrar ");
define('OGP_LANG_start_server', "Starta servern");
define('OGP_LANG_start_wait_note', "Serveruppstarten kan ta en stund. Vänta utan att stänga ned din webbläsare. ");
define('OGP_LANG_game_type', "Speltyp");
define('OGP_LANG_map', "Karta");
define('OGP_LANG_starting_server', "Startar servern, vänta...");
define('OGP_LANG_starting_server_settings', "Startar servern med följande inställningar");
define('OGP_LANG_startup_params', "Uppstartsparametrar");
define('OGP_LANG_startup_cpu', "CPU som servern körs på");
define('OGP_LANG_startup_nice', "Prioritetsvärde på servern");
define('OGP_LANG_game_home', "Hemkatalog");
define('OGP_LANG_server_started', "Serverstarten lyckades.");
define('OGP_LANG_no_parameter_access', "Du har inte tillgång till dessa parametrar. ");
define('OGP_LANG_extra_parameters', "Extra parametrar");
define('OGP_LANG_no_extra_param_access', "Du har inte tillgång till dessa extra parametrar. ");
define('OGP_LANG_extra_parameters_info', "Dessa parametrar läggs till i slutet av kommandoraden när spelet startas. ");
define('OGP_LANG_game_exec_not_found', "Spelets exekverbara filer %s hittades inte på fjärrservern. ");
define('OGP_LANG_select_params_and_start', "Välj startparametrar för servern och tryck på '%s'. ");
define('OGP_LANG_no_ip_port_pairs_assigned', "Inget IP och portpar har blivit tilldelade för denna hemkatalog. Om du inte har tillgång till att kunna ändra på hemkataloger, kontakta administratören. ");
define('OGP_LANG_unable_to_get_log', "Kunde inte läsa loggen, retval %s. ");
define('OGP_LANG_server_binary_not_executable', "Serverns binär är inte körbar. Kontrollera att du har rätta behörigheter i serverns hemkatalog.");
define('OGP_LANG_server_not_running_log_found', "Servern körs inte, men en logg har hittats. NOTERA: Denna logg är kanske inte relaterad till senaste serverstart. ");
define('OGP_LANG_ip_port_pair_not_owned', "IP:PORT pair ej ägd. ");
define('OGP_LANG_unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Ogiltigt maxspelarvärde, maximalt antal spelarplatser har ställts in. ");
define('OGP_LANG_server_running_not_responding', "Servern körs, men svarar inte, <br>det kan vara något problem och du borde");
define('OGP_LANG_update_started', "Uppdatering startades, vänta...");
define('OGP_LANG_failed_to_start_steam_update', "Misslyckades med att starta Steam-uppdateringen. Se agentloggen. ");
define('OGP_LANG_failed_to_start_rsync_update', "Misslyckades med att starta Rsync-uppdateringen. Se agentlogg. ");
define('OGP_LANG_update_completed', "Uppdateringen lyckades. ");
define('OGP_LANG_update_in_progress', "Pågående uppdatering, vänta...");
define('OGP_LANG_refresh_steam_status', "Refresh Steam status");
define('OGP_LANG_refresh_rsync_status', "Refresh Rsync status");
define('OGP_LANG_server_running_cant_update', "Servern körs, så uppdatering är ej möjlig. Stoppa servern innan du uppdaterar. ");
define('OGP_LANG_xml_steam_error', "Den valda servertypen stödjer inte steamuppdatering/installation. ");
define('OGP_LANG_mod_key_not_found_from_xml', "Moddnyckel '%s' hittades inte i XML-filen. ");
define('OGP_LANG_stop_update', "Stoppa uppdatering");
define('OGP_LANG_statistics', "Statistik");
define('OGP_LANG_servers', "Servrar");
define('OGP_LANG_players', "Spelare");
define('OGP_LANG_current_map', "Nuvarande karta");
define('OGP_LANG_stop_server', "Stoppa servern");
define('OGP_LANG_server_ip_port', "Server IP:Port");
define('OGP_LANG_server_name', "Servernamn");
define('OGP_LANG_server_id', "Server-ID");
define('OGP_LANG_player_name', "Spelarnamn");
define('OGP_LANG_score', "Poäng");
define('OGP_LANG_time', "Tid");
define('OGP_LANG_no_rights_to_stop_server', "Du har inte rättigheter att stoppa denna server. ");
define('OGP_LANG_no_ogp_lgsl_support', "Denna Servern (körs: %s) har inte LGSL-support i OGP, så statistik kan inte visas. ");
define('OGP_LANG_server_status', "Servern på %s är%s.");
define('OGP_LANG_server_stopped', "Servern '%s' har stoppats. ");
define('OGP_LANG_if_want_to_start_homes', "Om du vill starta spelservrar går du till %s.");
define('OGP_LANG_view_log', "Loggvisning ");
define('OGP_LANG_if_want_manage', "Om du vill hantera dina spel, kan du göra detta på");
define('OGP_LANG_columns', "Kolumner");
define('OGP_LANG_group_users', "Gruppanvändare: ");
define('OGP_LANG_assigned_to', "Tilldelat till:");
define('OGP_LANG_restart_server', "Starta om servern");
define('OGP_LANG_restarting_server', "Startar om server, vänta...");
define('OGP_LANG_server_restarted', "Servern '%s' har blivit omstartad.");
define('OGP_LANG_server_not_running', "Servern körs inte. ");
define('OGP_LANG_address', "Adress ");
define('OGP_LANG_owner', "Ägare");
define('OGP_LANG_operations', "Åtgärder");
define('OGP_LANG_search', "Sök");
define('OGP_LANG_maps_read_from', "Kartor läses från");
define('OGP_LANG_file', "fil");
define('OGP_LANG_folder', "mapp");
define('OGP_LANG_unable_retrieve_mod_info', "Kunde inte hämta modd-information från databas. ");
define('OGP_LANG_unexpected_result_libremote', "Oväntat resultat från libremote, informera utvecklarna. ");
define('OGP_LANG_unable_get_info', "Kunde inte få nödvändig information för uppstart, blockerar uppstart. ");
define('OGP_LANG_server_already_running', "Servern körs redan. Om du inte kan se servern i spelhanteraren, kan det vara något fel, och du borde kanske");
define('OGP_LANG_already_running_stop_server', "Stoppa servern. ");
define('OGP_LANG_error_server_already_running', "FEL: Servern körs redan på port");
define('OGP_LANG_failed_start_server_code', "Misslyckades med att starta fjärrservern. Felkod: %s");
define('OGP_LANG_disabled', "inaktiverad");
define('OGP_LANG_not_found_server', "Kunde inte hitta fjärrservern med ID");
define('OGP_LANG_rcon_command_title', "RCON-Kommando ");
define('OGP_LANG_has_sent_to', "har skickats till");
define('OGP_LANG_need_set_remote_pass', "Du måste sätta fjärrkontroll lösenord på");
define('OGP_LANG_before_sending_rcon_com', "innan du skickar rcon-kommandon till den. ");
define('OGP_LANG_retry', "Försök igen");
define('OGP_LANG_page', "sida");
define('OGP_LANG_server_cant_start', "servern kan inte starta");
define('OGP_LANG_server_cant_stop', "servern kan inte stoppa");
define('OGP_LANG_error_occured_remote_host', "Fel uppstod på fjärrvärden ");
define('OGP_LANG_follow_server_status', "Du kan följa serverstatus från");
define('OGP_LANG_addons', "Tillägg");
define('OGP_LANG_hostname', "Hostnamn");
define('OGP_LANG_rsync_install', "[Rsync-installation]");
define('OGP_LANG_ping', "Ping");
define('OGP_LANG_team', "Lag");
define('OGP_LANG_deaths', "Dödsfall");
define('OGP_LANG_pid', "PID");
define('OGP_LANG_skill', "Skicklighetsnivå");
define('OGP_LANG_AIBot', "AIBot");
define('OGP_LANG_steamid', "Steam-ID");
define('OGP_LANG_player', "Spelare");
define('OGP_LANG_port', "Port");
define('OGP_LANG_rcon_presets', "RCON-förinställningar");
define('OGP_LANG_update_from_local_master_server', "Uppdatera från lokal Master-server. ");
define('OGP_LANG_update_from_selected_rsync_server', "Uppdatera från vald Rsync-server. ");
define('OGP_LANG_execute_selected_server_operations', "Utför valda server åtgärder");
define('OGP_LANG_execute_operations', "Utför åtgärder");
define('OGP_LANG_account_expiration', "Kontot upphör");
define('OGP_LANG_mysql_databases', "MySQL Databaser");
define('OGP_LANG_failed_querying_server', "* Misslyckades med att skicka fråga till servern. ");
define('OGP_LANG_query_protocol_not_supported', "* Det finns inget frågeprotokoll i OGP som supportar denna servern. ");
define('OGP_LANG_queries_disabled_by_setting_disable_queries_after', "Serverfrågor avaktiverat i inställningar: Avaktivera frågor efter: %s, eftersom du har %s servers.<br>");
define('OGP_LANG_presets_for_game_and_mod', "RCON-förinställningar för %s och modd %s");
define('OGP_LANG_name', "Namn");
define('OGP_LANG_command', "RCON&nbsp;Kommando");
define('OGP_LANG_add_preset', "Lägg till förinställning");
define('OGP_LANG_edit_presets', "Ändra förinställning");
define('OGP_LANG_del_preset', "Ta bort");
define('OGP_LANG_change_preset', "Byt");
define('OGP_LANG_send_command', "Skicka kommando");
define('OGP_LANG_starting_copy_with_master_server_named', "Startar kopiering med masterservern som har namn '%s'...");
define('OGP_LANG_starting_sync_with', "Startar synkronisering med %s...");
define('OGP_LANG_refresh_interval', "Log-uppdateringsintervall ");
define('OGP_LANG_finished_manual_update', "Färdig med manuell uppdatering.");
define('OGP_LANG_failed_to_start_file_download', "Misslyckades med att starta filhämtning");
define('OGP_LANG_game_name', "Spelnamn");
define('OGP_LANG_dest_dir', "Destinationskatalog");
define('OGP_LANG_remote_server', "Fjärrserver");
define('OGP_LANG_file_url', "Fil-URL");
define('OGP_LANG_file_url_info', "URL'en av filen som är uppladdad och uppackad till katalogen. ");
define('OGP_LANG_dest_filename', "Destinationsfilnamn ");
define('OGP_LANG_dest_filename_info', "Filnamnet för destinationsfilen.");
define('OGP_LANG_update_server', "Uppdatera server");
define('OGP_LANG_unavailable', "Otillgänglig");
define('OGP_LANG_upload_map_image', "Ladda upp kartimage");
define('OGP_LANG_upload_image', "Ladda upp bild");
define('OGP_LANG_jpg_gif_png_less_than_1mb', "Bilden måste vara av formaten jpg, gif eller png, och mindre än 1 MB. ");
define('OGP_LANG_check_dev_console', "Fel vid uppladdning av fil, var god kontrollera webbläsarens utvecklarkonsol. ");
define('OGP_LANG_uploaded_successfully', "Uppladdningen lyckades.");
define('OGP_LANG_cant_create_folder', "Kan inte skapa mapp: <br><b>%s</b>");
define('OGP_LANG_cant_write_file', "Kan inte skriva fil: <br><b>%s</b>");
define('OGP_LANG_exceeded_php_directive', "Överskred PHP direktiv. <br><b>%s</b>.");
define('OGP_LANG_unknown_errors', "Okända fel. ");
define('OGP_LANG_directory', "Katalogsökväg");
define('OGP_LANG_view_player_commands', "Se spelarkommandon ");
define('OGP_LANG_hide_player_commands', "Göm spelarkommandon");
define('OGP_LANG_no_online_players', "Det är inga spelare online.");
define('OGP_LANG_invalid_game_mod_id', "Ogiltig Spel/Modds ID specificerad. ");
define('OGP_LANG_auto_update_title_popup', "Steam-autouppdateringslänk ");
define('OGP_LANG_auto_update_popup_html', "<p>Använd länken nedan för att automatiskt uppdatera din spelserver via steam. Om det krävs kan du använda dig av cronjob eller manuellt starta uppdateringsprocessen. </p>");
define('OGP_LANG_api_links_popup_html', "<p>Select an action you would like to perform using the OGP API for this game server.&nbsp; Then, use the link below to perform your desired action.&nbsp; You can run your desired action using a cronjob or by making a direct request to it.</p>");
define('OGP_LANG_auto_update_copy_me', "Kopiera");
define('OGP_LANG_auto_update_copy_me_success', "Kopierad!");
define('OGP_LANG_auto_update_copy_me_fail', "Misslyckades med att kopiera. Kopiera länken manuellt. ");
define('OGP_LANG_get_steam_autoupdate_api_link', "Autouppdateringslänk");
define('OGP_LANG_show_api_actions', "Show API Actions");
define('OGP_LANG_api_links', "API Links");
define('OGP_LANG_update_attempt_from_nonmaster_server', "Användaren %s försökte att uppdatera hem_id %d från en icke-Masterserver. (Home ID: %d)");
define('OGP_LANG_attempting_nonmaster_update', "Du försöker att uppdatera denna server fårn en icke-masterserver. ");
define('OGP_LANG_cannot_update_from_own_self', "Lokal uppdatering kanske inte kan köras på en Masterserver. ");
define('OGP_LANG_show_server_id', "Visa server-ID's ");
define('OGP_LANG_hide_server_id', "Göm server-ID's");
define('OGP_LANG_edit_configuration_files', "Ändra konfigurationsfilerna ");
define('OGP_LANG_admin', "Admin");
define('OGP_LANG_cid', "CID");
define('OGP_LANG_phan', "Fantom");
define('OGP_LANG_sec', "Sekunder");
define('OGP_LANG_unknown_rsync_mirror', "You attempted to start an update from a mirror which doesn't exist.");
define('OGP_LANG_custom_fields', "Custom Fields");
?>
