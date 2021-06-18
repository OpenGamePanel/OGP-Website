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

define('OGP_LANG_add_mods_note', "Sinun on lisättävä modeja, kun olet lisännyt palvelimen käyttäjälle. Tämä voidaan tehdä muokkaamalla palvelinta.");
define('OGP_LANG_game_servers', "Pelipalvelimet");
define('OGP_LANG_game_path', "Pelin polku");
define('OGP_LANG_game_path_info', "Absoluuttinen palvelimen polku. /home/ogpbot/OGP_User_Files/Minun_Palvelin");
define('OGP_LANG_game_server_name_info', "Palvelimen nimi auttaa käyttäjiä tunnistamaan palvelimensa.");
define('OGP_LANG_control_password', "Hallinta-salasana");
define('OGP_LANG_control_password_info', "Tätä salasanaa käytetään palvelimen hallintaan, kuten RCON-salasana. Jos salasana on tyhjä, käytetään muita keinoja.");
define('OGP_LANG_add_game_home', "Lisää pelipalvelin");
define('OGP_LANG_game_path_empty', "Pelin polku ei voi olla tyhjä.");
define('OGP_LANG_game_home_added', "Pelipalvelin lisätty onnistuneesti. Uudelleenohjaus kodin muokkaussivulle.");
define('OGP_LANG_failed_to_add_home_to_db', "Kodin lisääminen tietokantaan epäonnistui. Virhe: %s");
define('OGP_LANG_caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms', "<b>Varoitus!</b> Agentti on offline-tilassa, ei voi saada käyttöjärjestelmän tyyppiä ja arkkitehtuuria,<br> Näytetään palvelimet kaikille alustoille:");
define('OGP_LANG_select_remote_server', "Valitse etäpalvelin");
define('OGP_LANG_no_remote_servers_configured', "Ei etäpalvelimia määritetty Open Game Paneliin.<br>Sinun on lisättävä etäpalvelimia, ennen kuin voit lisätä palvelimia käyttäjille.");
define('OGP_LANG_no_game_configurations_found', "Pelin määrityksiä ei löytynyt. Sinun on lisättävä pelimäärityksiä");
define('OGP_LANG_game_configurations', ">pelin määritykset sivu");
define('OGP_LANG_add_remote_server', "Lisää palvelin.");
define('OGP_LANG_wine_games', "Wine-pelit");
define('OGP_LANG_home_path', "Kodin polku");
define('OGP_LANG_change_home_info', "Asennetun pelipalvelimen sijainti. Esimerkki: /home/ogp/minun_palvelin/");
define('OGP_LANG_game_server_name', "Pelipalvelimen nimi");
define('OGP_LANG_change_name_info', "Palvelimen nimi, joka auttaa käyttäjiä tunnistamaan sen.");
define('OGP_LANG_game_control_password', "Pelin hallinta-salasana");
define('OGP_LANG_change_control_password_info', "Hallinta-salasana on esimerkiksi rcon-salasana.");
define('OGP_LANG_available_mods', "Saatavilla olevat modit");
define('OGP_LANG_note_no_mods', "Tälle pelille ei ole saatavilla modeja.");
define('OGP_LANG_change_home', "Vaihda koti");
define('OGP_LANG_change_control_password', "Vaihda hallinta-salasana");
define('OGP_LANG_change_name', "Vaihda nimi");
define('OGP_LANG_add_mod', "Lisää modi");
define('OGP_LANG_set_ip', "Aseta IP");
define('OGP_LANG_ips_and_ports', "IP:t ja portit");
define('OGP_LANG_mod_name', "Modin nimi");
define('OGP_LANG_max_players', "Enint. pelaajat");
define('OGP_LANG_extra_cmd_line_args', "Extra komentoriviargumentit");
define('OGP_LANG_extra_cmd_line_info', "Extra-komentorivin argumentit tarjoavat tavan syöttää ylimääräisiä argumentteja pelin komentorivillä kun se käynnistetään.");
define('OGP_LANG_cpu_affinity', "CPU affiniteetti");
define('OGP_LANG_nice_level', "Nice-taso");
define('OGP_LANG_set_options', "Aseta valinnat");
define('OGP_LANG_remove_mod', "Poista modi");
define('OGP_LANG_mods', "Modit");
define('OGP_LANG_ip', "IP");
define('OGP_LANG_port', "Portti");
define('OGP_LANG_no_ip_ports_assigned', "Ainakin yksi IP:Porttipari on määritettävä kodille.");
define('OGP_LANG_successfully_assigned_ip_port', " IP:Portti-parin määrittäminen onnistui kodille.");
define('OGP_LANG_port_range_error', "Portin on oltava välillä 0–65535.");
define('OGP_LANG_failed_to_assing_mod_to_home', "Modin, jonka ID on %d, määrittäminen kodille epäonnistui.");
define('OGP_LANG_successfully_assigned_mod_to_home', "Määritetty modi ID:llä %d onnistuneesti kodille.");
define('OGP_LANG_successfully_modified_mod', "Modin tietojen muokkaaminen onnistui.");
define('OGP_LANG_back_to_game_monitor', "Takaisin pelimonitoriin");
define('OGP_LANG_back_to_game_servers', "Takaisin pelipalvelimiin");
define('OGP_LANG_user_id_main', "Pääomistaja");
define('OGP_LANG_change_user_id_main', "Vaihda pääomistaja");
define('OGP_LANG_change_user_id_main_info', "Pääpalvelimen kodin omistaja.");
define('OGP_LANG_server_ftp_password', "FTP-salasana");
define('OGP_LANG_change_ftp_password', "Vaihda FTP-salasana");
define('OGP_LANG_change_ftp_password_info', "Tämä on salasana, jolla kirjaudutaan tämän kodin FTP-palvelimeen.");
define('OGP_LANG_Delete_old_user_assigned_homes', "Määritä koti nykyisille käyttäjille.");
define('OGP_LANG_editing_home_called', "Muokataan kotia nimeltä");
define('OGP_LANG_control_password_updated_successfully', "Hallinta-salasana päivitetty onnistuneesti.");
define('OGP_LANG_control_password_update_failed', "Hallinta-salasanan päivitys epäonnistui");
define('OGP_LANG_successfully_changed_game_server', "Pelipalvelimen vaihtaminen onnistui.");
define('OGP_LANG_error_ocurred_on_remote_server', "Etäpalvelimessa tapahtui virhe,");
define('OGP_LANG_ftp_password_can_not_be_changed', "FTP-salasanaa ei voi vaihtaa.");
define('OGP_LANG_ftp_can_not_be_switched_on', "FTP:tä ei voida kytkeä päälle.");
define('OGP_LANG_ftp_can_not_be_switched_off', "FTP:tä ei voi kytkeä pois päältä.");
define('OGP_LANG_invalid_home_id_entered', "Virheellinen kodin id syötetty.");
define('OGP_LANG_ip_port_already_in_use', "%s:%s on jo käytössä. Valitse toinen.");
define('OGP_LANG_successfully_assigned_ip_port_to_server_id', "Onnistuneesti määritetty %s:%s kodille, jonka ID on %s.");
define('OGP_LANG_no_ip_addresses_configured', "Pelipalvelimellasi ei ole määritetty IP-osoitteita. Voit määrittää ne");
define('OGP_LANG_server_page', "palvelinsivu");
define('OGP_LANG_successfully_removed_mod', "Pelimodin poisto onnistui.");
define('OGP_LANG_warning_agent_offline_defaulting_CPU_count_to_1', "Varoitus - Agentti offline-tilassa, oletusarvoinen suorittimen määrä on 1.");
define('OGP_LANG_mod_install_cmds', "Modi asenna CMD:t");
define('OGP_LANG_cmds_for', "Komennot");
define('OGP_LANG_preinstall_cmds', "Esiasennuskomennot");
define('OGP_LANG_postinstall_cmds', "Jälkiasennuskomennot");
define('OGP_LANG_edit_preinstall_cmds', "Muokkaa esiasennuskomentoja");
define('OGP_LANG_edit_postinstall_cmds', "Muokkaa jälkiasennuskomentoja");
define('OGP_LANG_save_as_default_for_this_mod', "Tallenna tämän modin oletusasetukseksi");
define('OGP_LANG_empty', "tyhjä");
define('OGP_LANG_master_server_for_clon_update', "Pääpalvelin paikallista päivitystä varten");
define('OGP_LANG_set_as_master_server', "Aseta pääpalvelimeksi");
define('OGP_LANG_set_as_master_server_for_local_clon_update', "Aseta pääpalvelimeksi paikallista päivitystä varten.");
define('OGP_LANG_only_available_for', "Saatavana vain '%s' jota isännöidään etäpalvelimelta nimeltä ''%s.");
define('OGP_LANG_ftp_on', "Ota käyttöön FTP");
define('OGP_LANG_ftp_off', "Poista käytöstä FTP");
define('OGP_LANG_change_ftp_account_status', "Muuta FTP-tilin tilaa");
define('OGP_LANG_change_ftp_account_status_info', "Kun FTP-tili on otettu käyttöön tai poistettu käytöstä, se lisätään tai poistetaan FTP:n tietokantaan.");
define('OGP_LANG_server_ftp_login', "Palvelimen FTP-kirjautuminen");
define('OGP_LANG_change_ftp_login_info', "Muuta FTP-kirjautumista mukautetulla.");
define('OGP_LANG_change_ftp_login', "Muuta FTP-kirjautumista");
define('OGP_LANG_ftp_login_can_not_be_changed', "FTP-kirjautumista ei voi muuttaa.");
define('OGP_LANG_server_is_running_change_addresses_not_available', "Palvelin on käynnissä, IP:tä ei voi muuttaa.");
define('OGP_LANG_change_game_type', "Vaihda pelin tyyppi");
define('OGP_LANG_change_game_type_info', "Muuttamalla pelin tyyppiä nykyiset modi-määritykset poistetaan.");
define('OGP_LANG_force_mod_on_this_address', "Pakota modi tähän osoitteeseen");
define('OGP_LANG_successfully_assigned_mod_to_address', "Modin määrittäminen osoitteeseen onnistui");
define('OGP_LANG_switch_mods', "Vaihda modeja");
define('OGP_LANG_switch_mod_for_address', "Vaihda modin osoitteeksi %s");
define('OGP_LANG_invalid_path', "Virheellinen polku");
define('OGP_LANG_add_new_game_home', "Lisää uusi pelipalvelin");
define('OGP_LANG_no_game_homes_found', "Pelipalvelimia ei löytynyt");
define('OGP_LANG_available_game_homes', "Saatavilla olevat pelipalvelimet");
define('OGP_LANG_home_id', "Kodin ID");
define('OGP_LANG_game_server', "Pelipalvelin");
define('OGP_LANG_game_type', "Pelin tyyppi");
define('OGP_LANG_game_home', "Kodin polku");
define('OGP_LANG_game_home_name', "Pelipalvelimen nimi");
define('OGP_LANG_clone', "Kloonaa");
define('OGP_LANG_unassign', "Poista määritys");
define('OGP_LANG_access_rights', "Käyttöoikeudet");
define('OGP_LANG_assigned_homes', "Tällä hetkellä määritetyt kodit");
define('OGP_LANG_assign', "Määritä");
define('OGP_LANG_allow_updates', "Salli pelipäivitykset");
define('OGP_LANG_allow_updates_info', "Antaa käyttäjän päivittää pelin asennuksen, jos se on mahdollista.");
define('OGP_LANG_allow_file_management', "Salli tiedostojen hallinta");
define('OGP_LANG_allow_file_management_info', "Salli käyttäjän pääsy pelipalvelimeen tiedostojen hallintamoduuleilla.");
define('OGP_LANG_allow_parameter_usage', "Salli parametrien käyttö");
define('OGP_LANG_allow_parameter_usage_info', "Antaa käyttäjän muuttaa käytettävissä olevia komentoriviparametreja.");
define('OGP_LANG_allow_extra_params', "Salli lisäparametrit");
define('OGP_LANG_allow_extra_params_info', "Antaa käyttäjän muokata komentorivi lisäparametreja.");
define('OGP_LANG_allow_ftp', "Salli FTP");
define('OGP_LANG_allow_ftp_info', "Näytä FTP pääsytiedot käyttäjälle.");
define('OGP_LANG_allow_custom_fields', "Salli mukautetut kentät");
define('OGP_LANG_allow_custom_fields_info', "Antaa käyttäjän käyttää mahdollisia pelipalvelimen mukautettuja kenttiä.");
define('OGP_LANG_select_home', "Valitse määritettävä koti");
define('OGP_LANG_assign_new_home_to_user', "Määritä uusi koti käyttäjälle %s");
define('OGP_LANG_assign_new_home_to_group', "Määritä uusi koti ryhmälle %s");
define('OGP_LANG_assigned_home_to_user', "Määritetty koti (ID: %d) käyttäjälle %s.");
define('OGP_LANG_failed_to_assign_home_to_user', "Kodin (ID: %d) määrittäminen käyttäjälle %s epäonnistui.");
define('OGP_LANG_assigned_home_to_group', "Määritetty koti (ID: %d) ryhmälle %s.");
define('OGP_LANG_unassigned_home_from_user', "Määritys poistettu kodilta (ID: %d) käyttäjältä %s.");
define('OGP_LANG_unassigned_home_from_group', "Määritys poistettu kodilta (ID: %d) ryhmältä %s.");
define('OGP_LANG_no_homes_assigned_to_user', "Käyttäjälle %s ei ole määritetty koteja.");
define('OGP_LANG_no_homes_assigned_to_group', "Ryhmälle %s ei ole osoitettu koteja.");
define('OGP_LANG_no_more_homes_available_that_can_be_assigned_for_this_user', "Ei enempää koteja saatavilla, jotka voisi määritellä tälle käyttäjälle");
define('OGP_LANG_no_more_homes_available_that_can_be_assigned_for_this_group', "Ei enempää koteja saatavilla, jotka voisi määritellä tälle ryhmälle");
define('OGP_LANG_you_can_add_a_new_game_server_from', "Voit lisätä uuden pelipalvelimen osoitteesta %s.");
define('OGP_LANG_no_remote_servers_available_please_add_at_least_one', "Etäpalvelimia ei ole käytettävissä, lisää vähintään yksi!");
define('OGP_LANG_cloning_of_home_failed', "Kodin kloonaus ID:llä '%s' epäonnistui.");
define('OGP_LANG_no_mods_to_clone', "Tälle pelille ei ole vielä otettu käyttöön modeja. Mitään ei kloonattu.");
define('OGP_LANG_failed_to_add_mod', "Modin, jonka ID on '%s', lisääminen kotiin, jonka ID on '%s', epäonnistui.");
define('OGP_LANG_failed_to_update_mod_settings', "Kodin mod-asetusten päivittäminen ID:llä '%s' epäonnistui.");
define('OGP_LANG_successfully_cloned_mods', "Modien kloonaaminen kotiin ID:llä '%s' onnistui.");
define('OGP_LANG_successfully_copied_home_database', "Kotitietokannan kopiointi onnistui.");
define('OGP_LANG_copying_home_remotely', "Kopioidaan koti etäpalvelimella sijainnista '%s' sijaintiin '%s'.");
define('OGP_LANG_cloning_home', "Kloonataan koti nimeltä '%s'");
define('OGP_LANG_current_home_path', "Nykyinen kotipolku");
define('OGP_LANG_current_home_path_info', "Kopioidun kodin nykyinen sijainti etäpalvelimella.");
define('OGP_LANG_clone_home', "Kloonaa koti");
define('OGP_LANG_new_home_name', "Uusi kotinimi");
define('OGP_LANG_new_home_path', "Uusi kotipolku");
define('OGP_LANG_agent_ip', "Agentin IP");
define('OGP_LANG_game_server_copy_is_running', "Pelipalvelimen kopiointi on käynnissä...");
define('OGP_LANG_game_server_copy_was_successful', "Pelipalvelimen kopiointi onnistui");
define('OGP_LANG_game_server_copy_failed_with_return_code', "Pelipalvelimen kopiointi epäonnistui palautuskoodilla %s");
define('OGP_LANG_clone_mods', "Kloonaa modit");
define('OGP_LANG_game_server_owner', "Pelipalvelimen omistaja");
define('OGP_LANG_the_name_of_the_server_to_help_users_to_identify_it', "Palvelimen nimi, joka auttaa käyttäjiä tunnistamaan sen.");
define('OGP_LANG_ips_and_ports_used_in_this_home', "Tässä kodissa käytetyt IP-osoitteet ja portit ");
define('OGP_LANG_note_ips_and_ports_are_not_cloned', "Huom - IP-osoitteita ja portteja ei kloonata");
define('OGP_LANG_mods_and_settings_for_this_game_server', "Modit ja asetukset tälle pelipalvelimelle");
define('OGP_LANG_sure_to_delete_serverid_from_remoteip_and_directory', "Haluatko varmasti poistaa pelipalvelimen (ID: %s) palvelimelta %s ja on hakemistossa %s");
define('OGP_LANG_yes_and_delete_the_files', "Kyllä ja poista tiedostot");
define('OGP_LANG_failed_to_remove_gamehome_from_database', "Pelikodin poistaminen tietokannasta epäonnistui.");
define('OGP_LANG_successfully_deleted_game_server_with_id', "Pelipalvelin tunnuksella %s on poistettu.");
define('OGP_LANG_failed_to_remove_ftp_account_from_remote_server', "FTP-tilin poistaminen etäpalvelimesta epäonnistui.");
define('OGP_LANG_remove_it_anyway', "Haluatko silti poistaa sen?");
define('OGP_LANG_sucessfully_deleted', "%s on poistettu onnistuneesti");
define('OGP_LANG_the_agent_had_a_problem_deleting', "Agentilla oli ongelma poistettaessa %s. Tarkista agentin loki.");
define('OGP_LANG_connection_timeout_or_problems_reaching_the_agent', "Yhteys aikakatkaistu tai ongelmia agentin tavoittamisessa");
define('OGP_LANG_does_not_exist_yet', "Ei ole vielä olemassa.");
define('OGP_LANG_update_settings', "Päivitä asetukset");
define('OGP_LANG_settings_updated', "Asetukset päivitetty.");
define('OGP_LANG_selected_path_already_in_use', "Valittu polku on jo käytössä.");
define('OGP_LANG_browse', "Selaa");
define('OGP_LANG_cancel', "Peruuta");
define('OGP_LANG_set_this_path', "Aseta tämä polku");
define('OGP_LANG_select_home_path', "Valitse kotipolku");
define('OGP_LANG_folder', "Kansio");
define('OGP_LANG_owner', "Omistaja");
define('OGP_LANG_group', "Ryhmä");
define('OGP_LANG_level_up', "Taso ylös");
define('OGP_LANG_level_up_info', "Takaisin edelliseen kansioon");
define('OGP_LANG_add_folder', "Lisää kansio");
define('OGP_LANG_add_folder_info', "Kirjoita nimi uudelle kansiolle ja paina sitten kuvaketta.");
define('OGP_LANG_valid_user', "Määritä kelvollinen käyttäjä.");
define('OGP_LANG_valid_group', "Määritä kelvollinen ryhmä.");
define('OGP_LANG_set_affinity', "Aseta palvelimen affiniteetti");
define('OGP_LANG_cpu_affinity_info', "Valitse CPU:n ydin (ytimet), jotka haluat määrittää pelipalvelimelle.");
define('OGP_LANG_expiration_date_changed', "Valitun kodin viimeinen voimassaolopäivä on muuttunut.");
define('OGP_LANG_expiration_date_could_not_be_changed', "Valitun kodin vanhentumispäivää ei voitu muuttaa.");
define('OGP_LANG_search', "Haku");
define('OGP_LANG_ftp_account_username_too_long', "FTP-käyttäjänimi on liian pitkä. Kokeile lyhyempää käyttäjänimeä, enintään 20 merkkiä.");
define('OGP_LANG_ftp_account_password_too_long', "FTP-salasana on liian pitkä. Kokeile lyhyempää salasanaa, enintään 20 merkkiä.");
define('OGP_LANG_other_servers_exist_with_path_please_change', "Muita koteja on samalla polulla. On suositeltavaa (mutta ei pakollista), että vaihdat tämän polun ainutlaatuiseksi. Sinulla voi olla ongelmia, jos et.");
define('OGP_LANG_change_access_rights_for_selected_servers', "Muuta valittujen palvelinten käyttöoikeuksia");
?>
