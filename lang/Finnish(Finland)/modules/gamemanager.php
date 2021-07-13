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

define('OGP_LANG_no_games_to_monitor', "Tilillesi ei ole määritetty pelejä, joita voit monitoroida.");
define('OGP_LANG_status', "Tila");
define('OGP_LANG_fail_no_mods', "Tälle pelille ei ole otettu käyttöön modeja! Sinun on pyydettävä OGP-järjestelmänvalvojaasi lisäämään sinulle mod(i/eja) määrättyyn peliin.");
define('OGP_LANG_no_game_homes_assigned', "Tilillesi ei ole määritetty palvelimia.");
define('OGP_LANG_select_game_home_to_configure', "Valitse peliserveri jota haluat määrittää");
define('OGP_LANG_file_manager', "Tiedostonhallinta");
define('OGP_LANG_configure_mods', "Määritä modit");
define('OGP_LANG_install_update_steam', "Asenna/päivitä Steamilla");
define('OGP_LANG_install_update_manual', "Asenna/päivitä manuaalisesti");
define('OGP_LANG_assign_game_homes', "Määritä pelipalvelimet");
define('OGP_LANG_user', "Käyttäjä");
define('OGP_LANG_group', "Ryhmä");
define('OGP_LANG_start', "Käynnistä");
define('OGP_LANG_ogp_agent_ip', "OGP agentin IP");
define('OGP_LANG_max_players', "Enint. pelaajat");
define('OGP_LANG_max', "Maks.");
define('OGP_LANG_ip_and_port', "IP ja portti");
define('OGP_LANG_available_maps', "Saatavilla olevat kartat");
define('OGP_LANG_map_path', "Kartan polku");
define('OGP_LANG_available_parameters', "Saatavilla olevat parametrit");
define('OGP_LANG_start_server', "Käynnistä palvelin");
define('OGP_LANG_start_wait_note', "Palvelimen käynnistys saattaa viedä hetken. Älä sulje selainta.");
define('OGP_LANG_game_type', "Pelin tyyppi");
define('OGP_LANG_map', "Kartta");
define('OGP_LANG_starting_server', "Käynnistetään palvelinta, odota hetki...");
define('OGP_LANG_starting_server_settings', "Käynnistetään palvelinta seuraavilla asetuksilla");
define('OGP_LANG_startup_params', "Käynnistys parametrit");
define('OGP_LANG_startup_cpu', "CPU jota palvelin käyttää");
define('OGP_LANG_startup_nice', "Nice-arvo palvelimella");
define('OGP_LANG_game_home', "Kodin polku");
define('OGP_LANG_server_started', "Palvelin käynnistyi onnistuneesti.");
define('OGP_LANG_no_parameter_access', "Sinulla ei ole oikeuksia parametreihin.");
define('OGP_LANG_extra_parameters', "Lisäparametrit");
define('OGP_LANG_no_extra_param_access', "Sinulla ei ole oikeuksia lisäparametreihin.");
define('OGP_LANG_extra_parameters_info', "Nämä parametrit on laitettu komentorivin loppuun, kun peli on käynnistynyt.");
define('OGP_LANG_game_exec_not_found', "Pelin suoritettavaa tiedostoa %s ei löytynyt etäpalvelimelta.");
define('OGP_LANG_select_params_and_start', "Valitse palvelimen käynnistysparametrit ja paina '%s'.");
define('OGP_LANG_no_ip_port_pairs_assigned', "Tälle kodille ei ole määritetty IP-porttiparia. Jos sinulla ei ole pääsyä kodin muokkaukseen, ota yhteyttä järjestelmänvalvojaasi.");
define('OGP_LANG_unable_to_get_log', "Lokia ei saada, palautusarvo %s.");
define('OGP_LANG_server_binary_not_executable', "Palvelinbinaaria ei voida suorittaa. Tarkista, että sinulla on asianmukaiset oikeudet palvelimen kotihakemistossa.");
define('OGP_LANG_server_not_running_log_found', "Palvelin ei ole käynnissä, mutta loki löytyy. HUOMAUTUS: Tämä loki ei välttämättä liity palvelimen viimeiseen käynnistykseen.");
define('OGP_LANG_ip_port_pair_not_owned', "IP:PORTTI-paria ei omisteta.");
define('OGP_LANG_unsuitable_maxplayers_value_maximum_reachable_number_of_slots_has_been_set', "Sopimaton maksimipelaajaa-arvo, suurin käytettävissä oleva paikkamäärä on asetettu.");
define('OGP_LANG_server_running_not_responding', "Palvelin on käynnissä, mutta ei vastaa, <br>siinä saattaa olla jonkinlainen ongelma ja haluat ehkä");
define('OGP_LANG_update_started', "Päivitys alkoi, odota hetki...");
define('OGP_LANG_failed_to_start_steam_update', "Steampäivityksen aloittaminen epäonnistui. Katso agent loki.");
define('OGP_LANG_failed_to_start_rsync_update', "Rsyncin päivitys epäonnistui. Katso agent loki.");
define('OGP_LANG_update_completed', "Päivitys onnistui.");
define('OGP_LANG_update_in_progress', "Päivitys on käynnissä, odota hetki...");
define('OGP_LANG_refresh_steam_status', "Päivitä Steam tila");
define('OGP_LANG_refresh_rsync_status', "Päivitä Rsync tila");
define('OGP_LANG_server_running_cant_update', "Palvelin käynnissä joten päivitys ei ole mahdollista. Pysäytä palvelin ennen päivitystä.");
define('OGP_LANG_xml_steam_error', "Valittu palvelintyyppi ei tue Steam asennusta/päivitystä.");
define('OGP_LANG_mod_key_not_found_from_xml', "Modi-avainta '%s' ei löydy XML-tiedostosta.");
define('OGP_LANG_stop_update', "Pysäytä päivitys");
define('OGP_LANG_statistics', "Statistiikka");
define('OGP_LANG_servers', "Palvelimet");
define('OGP_LANG_players', "Pelaajat");
define('OGP_LANG_current_map', "Nykyinen kartta");
define('OGP_LANG_stop_server', "Pysäytä palvelin");
define('OGP_LANG_server_ip_port', "Palvelimen IP:Portti");
define('OGP_LANG_server_name', "Palvelimen nimi");
define('OGP_LANG_server_id', "Palvelimen ID");
define('OGP_LANG_player_name', "Pelaajan nimi");
define('OGP_LANG_score', "Pisteet");
define('OGP_LANG_time', "Aika");
define('OGP_LANG_no_rights_to_stop_server', "Sinulla ei ole oikeuksia pysäyttää tätä palvelinta.");
define('OGP_LANG_no_ogp_lgsl_support', "Tällä palvelimella (käynnissä: %s) ei ole LGSL-tukea OGP:ssä, eikä sen tilastoja voida näyttää.");
define('OGP_LANG_server_status', "Palvelin %s on %s.");
define('OGP_LANG_server_stopped', "Palvelin '%s' on pysäytetty.");
define('OGP_LANG_if_want_to_start_homes', "Jos haluat käynnistää pelipalvelimet, siirry osoitteeseen %s.");
define('OGP_LANG_view_log', "Lokin katseluohjelma");
define('OGP_LANG_if_want_manage', "Jos haluat hallita pelejäsi, voit tehdä sen");
define('OGP_LANG_columns', "sarakkeita");
define('OGP_LANG_group_users', "Ryhmän käyttäjät:");
define('OGP_LANG_assigned_to', "Määrätty käyttäjälle:");
define('OGP_LANG_restart_server', "Uudelleenkäynnistä palvelin");
define('OGP_LANG_restarting_server', "Uudelleenkäynnistetään palvelinta, odota hetki...");
define('OGP_LANG_server_restarted', "Palvelin '%s' on käynnistetty uudelleen.");
define('OGP_LANG_server_not_running', "Palvelin ei ole käynnissä.");
define('OGP_LANG_address', "Osoite");
define('OGP_LANG_owner', "Omistaja");
define('OGP_LANG_operations', "Toiminnot");
define('OGP_LANG_search', "Haku");
define('OGP_LANG_maps_read_from', "Kartat luettu");
define('OGP_LANG_file', "tiedosto");
define('OGP_LANG_folder', "kansio");
define('OGP_LANG_unable_retrieve_mod_info', "Modi-tietoja ei voitu hakea tietokannasta.");
define('OGP_LANG_unexpected_result_libremote', "Odottamaton tulos libremotesta, ilmoita asiasta kehittäjille.");
define('OGP_LANG_unable_get_info', "Käynnistyksen edellyttämiä tietoja ei saada, käynnistys estetään.");
define('OGP_LANG_server_already_running', "Palvelin on jo käynnissä. Jos et näe palvelinta pelimonitorissa, siinä saattaa olla jokin ongelma ja haluat ehkä");
define('OGP_LANG_already_running_stop_server', "Pysäytä palvelin.");
define('OGP_LANG_error_server_already_running', "VIRHE: Palvelin on jo käynnissä portissa");
define('OGP_LANG_failed_start_server_code', "Etäpalvelimen käynnistäminen epäonnistui. Virhekoodi: %s");
define('OGP_LANG_disabled', "poistettu käytöstä");
define('OGP_LANG_not_found_server', "Ei löydetty etäpalvelinta ID:llä");
define('OGP_LANG_rcon_command_title', "RCON-komento");
define('OGP_LANG_has_sent_to', "on lähetetty osoitteeseen");
define('OGP_LANG_need_set_remote_pass', "Sinun täytyy asettaa etäohjauksen salasana");
define('OGP_LANG_before_sending_rcon_com', "ennen rcon-komentojen lähettämistä sille.");
define('OGP_LANG_retry', "Yritä uudelleen");
define('OGP_LANG_page', "sivu");
define('OGP_LANG_server_cant_start', "palvelinta ei voi käynnistää");
define('OGP_LANG_server_cant_stop', "palvelinta ei voi pysäyttää");
define('OGP_LANG_error_occured_remote_host', "Etäosoitteessa tapahtui virhe");
define('OGP_LANG_follow_server_status', "Voit seurata palvelimen tilaa");
define('OGP_LANG_addons', "Lisäosat");
define('OGP_LANG_hostname', "Verkko-osoite");
define('OGP_LANG_rsync_install', "[Rsync-asennus]");
define('OGP_LANG_ping', "Ping");
define('OGP_LANG_team', "Joukkue");
define('OGP_LANG_deaths', "Kuolemat");
define('OGP_LANG_pid', "PID");
define('OGP_LANG_skill', "Taito");
define('OGP_LANG_AIBot', "AIBot");
define('OGP_LANG_steamid', "Steam ID");
define('OGP_LANG_player', "Pelaaja");
define('OGP_LANG_port', "Portti");
define('OGP_LANG_rcon_presets', "RCON esiasetukset");
define('OGP_LANG_update_from_local_master_server', "Päivitä paikallisesta pääpalvelimesta");
define('OGP_LANG_update_from_selected_rsync_server', "Päivitä valitusta Rsync-palvelimesta");
define('OGP_LANG_execute_selected_server_operations', "Suorita valitut palvelintoiminnot");
define('OGP_LANG_execute_operations', "Suorita toiminnot");
define('OGP_LANG_account_expiration', "Tilin vanhentuminen");
define('OGP_LANG_mysql_databases', "MySQL-tietokannat");
define('OGP_LANG_failed_querying_server', "* Palvelimelta kysely epäonnistui.");
define('OGP_LANG_query_protocol_not_supported', "* OGP:ssä ei ole kyselyprotokollaa, joka voisi tukea tätä palvelinta.");
define('OGP_LANG_queries_disabled_by_setting_disable_queries_after', "Kyselyt poistettu käytöstä asetuksilla: Poista kyselyt: %s jälkeen, koska sinulla on %s palveliminta.<br>");
define('OGP_LANG_presets_for_game_and_mod', "RCON-esiasetukset %s ja modi %s");
define('OGP_LANG_name', "Nimi");
define('OGP_LANG_command', "RCON&nbsp;komennot");
define('OGP_LANG_add_preset', "Lisää esiasetus");
define('OGP_LANG_edit_presets', "Muokkaa esiasetuksia");
define('OGP_LANG_del_preset', "Poista");
define('OGP_LANG_change_preset', "Muuta");
define('OGP_LANG_send_command', "Lähetä komento");
define('OGP_LANG_starting_copy_with_master_server_named', "Aloitetaan kopiointi pääpalvelimelta nimeltä '%s' ...");
define('OGP_LANG_starting_sync_with', "Aloitetaan synkronointi %s kanssa ...");
define('OGP_LANG_refresh_interval', "Lokin päivitysväli");
define('OGP_LANG_finished_manual_update', "Manuaalinen päivitys valmis.");
define('OGP_LANG_failed_to_start_file_download', "Tiedoston latauksen aloittaminen epäonnistui.");
define('OGP_LANG_game_name', "Pelin nimi");
define('OGP_LANG_dest_dir', "Kohdehakemisto");
define('OGP_LANG_remote_server', "Etäpalvelin");
define('OGP_LANG_file_url', "Tiedoston URL");
define('OGP_LANG_file_url_info', "URL-osoite tiedostolle joka on lähetetty ja purettu hakemistoon.");
define('OGP_LANG_dest_filename', "Kohteen tiedostonimi");
define('OGP_LANG_dest_filename_info', "Kohdetiedoston tiedostonimi.");
define('OGP_LANG_update_server', "Päivitä palvelin");
define('OGP_LANG_unavailable', "Ei käytettävissä");
define('OGP_LANG_upload_map_image', "Lähetä kartan kuva");
define('OGP_LANG_upload_image', "Lähetä kuva");
define('OGP_LANG_jpg_gif_png_less_than_1mb', "Kuvan on oltava jpg, gif tai png ja alle 1 MB.");
define('OGP_LANG_check_dev_console', "Virhe ladattaessa tiedostoa, tarkista selaimen kehittäjäkonsoli.");
define('OGP_LANG_uploaded_successfully', "Lähetys onnistui.");
define('OGP_LANG_cant_create_folder', "Kansiota ei voitu luoda:<br><b>%s</b>");
define('OGP_LANG_cant_write_file', "Tiedostoa ei voi kirjoittaa:<br><b>%s</b>");
define('OGP_LANG_exceeded_php_directive', "Ylitetty PHP direktiivi.<br><b>%s</b>");
define('OGP_LANG_unknown_errors', "Tuntemattomat virheet.");
define('OGP_LANG_directory', "Hakemisto");
define('OGP_LANG_view_player_commands', "Näytä pelaajan komennot");
define('OGP_LANG_hide_player_commands', "Piilota pelaajan komennot");
define('OGP_LANG_no_online_players', "Ei pelaajia paikalla.");
define('OGP_LANG_invalid_game_mod_id', "Virheellinen peli/modi ID määritetty.");
define('OGP_LANG_auto_update_title_popup', "Steam automaattinen päivitys-linkki");
define('OGP_LANG_auto_update_popup_html', "<p>Käytä alla olevaa linkkiä tarkistaaksesi ja automaattisesti päivittääksesi pelipalvelimesi Steamin kautta tarvittaessa.&nbsp; Voit kysellä sitä käyttäen cronjobia tai aloittaa prosessin manuaalisesti.</p>");
define('OGP_LANG_api_links_popup_html', "<p>Valitse toiminto, jonka haluat suorittaa tämän pelipalvelimen OGP API:n avulla. &nbsp; Suorita sitten haluamasi toiminto käyttämällä alla olevaa linkkiä. &nbsp; Voit suorittaa haluamasi toiminnon käyttämällä cronjobia tai pyytämällä sitä suoraan.</p>");
define('OGP_LANG_auto_update_copy_me', "Kopioi");
define('OGP_LANG_auto_update_copy_me_success', "Kopioitu!");
define('OGP_LANG_auto_update_copy_me_fail', "Kopiointi epäonnistui. Kopioi linkki manuaalisesti.");
define('OGP_LANG_get_steam_autoupdate_api_link', "Automaattinen päivitys-linkki");
define('OGP_LANG_show_api_actions', "Näytä API toiminnot");
define('OGP_LANG_api_links', "API linkit");
define('OGP_LANG_update_attempt_from_nonmaster_server', "Käyttäjä %s yritti päivittää koti_id %d muusta kuin pääpalvelimesta. (Koti ID: %d)");
define('OGP_LANG_attempting_nonmaster_update', "Yrität päivittää tätä palvelinta muusta kuin pääpalvelimesta.");
define('OGP_LANG_cannot_update_from_own_self', "Paikallinen palvelinpäivitys ei välttämättä toimi pääpalvelimessa.");
define('OGP_LANG_show_server_id', "Näytä palvelimen ID:t");
define('OGP_LANG_hide_server_id', "Piilota palvelimen ID:t");
define('OGP_LANG_edit_configuration_files', "Muokkaa määritystiedostoa");
define('OGP_LANG_admin', "Järjestelmänvalvoja");
define('OGP_LANG_cid', "CID");
define('OGP_LANG_phan', "Haamu");
define('OGP_LANG_sec', "Sekuntia");
define('OGP_LANG_unknown_rsync_mirror', "Yritit aloittaa päivityksen peilistä, jota ei ole olemassa.");
define('OGP_LANG_custom_fields', "Mukautetut kentät");
?>
