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

define('OGP_LANG_configured_mysql_hosts', "Määritetyt MySQL-verkkonimet");
define('OGP_LANG_add_new_mysql_host', "Lisää MySQL-isäntä");
define('OGP_LANG_enter_mysql_ip', "Syötä MySQL IP-osoite.");
define('OGP_LANG_enter_valid_port', "Anna kelvollinen portti.");
define('OGP_LANG_enter_mysql_root_password', "Anna MySQL-pääsalasana.");
define('OGP_LANG_enter_mysql_name', "Kirjoita MySQL-nimi.");
define('OGP_LANG_could_not_add_mysql_server', "MySQL-palvelinta ei voitu lisätä.");
define('OGP_LANG_game_server_name_info', "Palvelimen nimi auttaa käyttäjiä tunnistamaan palvelimensa.");
define('OGP_LANG_note_mysql_host', "Huomautus: Käyttämällä 'Suora yhteys' palvelimen on hyväksyttävä ulkoiset yhteydet, että palvelimet voivat muodostaa etäyhteyden, kun taas yhdistämällä etäpalvelimen kautta sitä käytetään kuten paikallista yhteys.");
define('OGP_LANG_direct_connection', "Suora yhteys");
define('OGP_LANG_connection_through_remote_server_named', "Yhteys etäpalvelimen kautta nimetty %s");
define('OGP_LANG_add_mysql_server', "Lisää MySQL-palvelin");
define('OGP_LANG_mysql_online', "MySQL online");
define('OGP_LANG_mysql_offline', "MySQL offline");
define('OGP_LANG_encryption_key_mismatch', "Salausavain epäsuhta");
define('OGP_LANG_unknown_error', "Tuntematon virhe");
define('OGP_LANG_remove', "Poista");
define('OGP_LANG_assign_db', "Määritä tietokanta");
define('OGP_LANG_mysql_server_name', "MySQL-palvelimen nimi");
define('OGP_LANG_server_status', "Palvelimen tila");
define('OGP_LANG_mysql_ip_port', "MySQL IP:portti");
define('OGP_LANG_mysql_root_passwd', "MySQL-pääsalasana.");
define('OGP_LANG_connection_method', "Yhteys menetelmä");
define('OGP_LANG_user_privilegies', "Käyttäjän oikeudet");
define('OGP_LANG_current_dbs', "Nykyiset tietokannat");
define('OGP_LANG_mysql_name', "MySQL-palvelimen nimi");
define('OGP_LANG_mysql_ip', "MySQL IP");
define('OGP_LANG_mysql_port', "MySQL portti");
define('OGP_LANG_privilegies', "oikeudet");
define('OGP_LANG_all', "Kaikki");
define('OGP_LANG_custom', "Mukautettu");
define('OGP_LANG_server_added', "Palvelin lisätty.");
define('OGP_LANG_sql_alter', "ALTER");
define('OGP_LANG_sql_create', "CREATE");
define('OGP_LANG_sql_create_temporary_tables', "CREATE TEMPORARY TABLES");
define('OGP_LANG_sql_drop', "DROP");
define('OGP_LANG_sql_index', "INDEX");
define('OGP_LANG_sql_insert', "INSERT");
define('OGP_LANG_sql_lock_tables', "LOCK TABLES");
define('OGP_LANG_sql_select', "SELECT");
define('OGP_LANG_sql_grant_option', "GRANT OPTION");
define('OGP_LANG_sql_update', "UPDATE");
define('OGP_LANG_sql_delete', "DELETE");
define('OGP_LANG_sql_alter_info', "<b>Mahdollistaa ALTER TABLE-toiminnon käytön.</b>");	
define('OGP_LANG_sql_create_info', "<b>Mahdollistaa CREATE TABLE-toiminnon käytön.</b>");	
define('OGP_LANG_sql_create_temporary_tables_info', "<b>Mahdollistaa CREATE TEMPORARY TABLE-toiminnon käytön</b>");
define('OGP_LANG_sql_delete_info', "<b>Mahdollistaa DELETE-toiminnon käytön.</b>");
define('OGP_LANG_sql_drop_info', "<b>Mahdollistaa DROP TABLE -toiminnon käytön.</b>");	
define('OGP_LANG_sql_index_info', "<b>Mahdollistaa CREATE INDEX- ja DROP INDEX -asetusten käytön.</b>");	
define('OGP_LANG_sql_insert_info', "<b>Mahdollistaa INSERT-toiminnon käytön.</b>");	
define('OGP_LANG_sql_lock_tables_info', "<b>Sallii LOCK TABLES -toiminnon käytön taulukoissa, joille sinulla on SELECT-oikeus.</b>");	
define('OGP_LANG_sql_select_info', "<b>Mahdollistaa SELECT-toiminnon käytön.</b>");
define('OGP_LANG_sql_update_info', "<b>Mahdollistaa UPDATE-toiminnon käytön.</b>");	
define('OGP_LANG_sql_grant_option_info', "<b>Mahdollistaa käyttöoikeuksien myöntämisen.</b>");
define('OGP_LANG_select_game_server', "Valitse pelipalvelin");
define('OGP_LANG_invalid_mysql_server_id', "Virheellinen MySQL-palvelin ID.");
define('OGP_LANG_there_is_another_db_named_or_user_named', "On toinen tietokanta nimeltä <b>%s</b> tai toinen käyttäjä nimeltä <b>%s</b>.");
define('OGP_LANG_db_added_for_home_id', "Lisätty tietokanta koti ID:lle <b>%s</b>.");
define('OGP_LANG_could_not_remove_db', "Valittua tietokantaa ei voitu poistaa.");
define('OGP_LANG_db_removed_successfully_from_mysql_server_named', "Tietokanta poistettiin palvelimelta %s.");
define('OGP_LANG_areyousure_remove_mysql_server', "Haluatko varmasti poistaa MySQL-palvelimen nimeltä <b>%s</b>?");
define('OGP_LANG_db_changed_successfully', "Tietokantaa nimeltään %s muutettiin onnistuneesti.");
define('OGP_LANG_error_while_remove', "Virhe poistettaessa.");
define('OGP_LANG_mysql_server_removed', "MySQL-palvelin <b>%s</b> on poistettu onnistuneesti. ");
define('OGP_LANG_unable_to_set_changes_to', "Ei voida tehdä muutoksia MySQL-palvelimeen nimeltä <b>%s</b>.");
define('OGP_LANG_mysql_server_settings_changed', "MySQL-palvelinta <b>%s</b> on muutettu onnistuneesti.");
define('OGP_LANG_editing_mysql_server', "Muokkaa MySQL-palvelimenta nimeltä <b>%s</b>.");
define('OGP_LANG_save_settings', "Tallenna asetukset");
define('OGP_LANG_mysql_dbs_for', "Tietokannat palvelimella %s");
define('OGP_LANG_edit_dbs', "Muokkaa tietokantoja");
define('OGP_LANG_edit_db_settings', "Muokkaa tietokannan asetuksia");
define('OGP_LANG_remove_db', "Poista tietokanta");
define('OGP_LANG_save_db_changes', "Tallenna tietokannan muutokset.");
define('OGP_LANG_add_db', "Lisää tietokanta");
define('OGP_LANG_select_db', "Valitse tietokanta");
define('OGP_LANG_db_user', "DB käyttäjä");
define('OGP_LANG_db_passwd', "DB salasana");
define('OGP_LANG_db_name', "DB nimi");
define('OGP_LANG_enabled', "Ota käyttöön");
define('OGP_LANG_game_server', "Pelipalvelin");
define('OGP_LANG_there_are_no_databases_assigned_for', "Kohteelle <b>%s</b> ei ole määritetty tietokantoja.");
define('OGP_LANG_unable_to_connect_to_mysql_server_as', "Ei voida muodostaa yhteyttä MySQL-palvelimeen %s.");
define('OGP_LANG_unable_to_create_db', "Tietokannan luominen epäonnistui.");
define('OGP_LANG_unable_to_select_db', "Tietokantaa %s ei voi valita.");
define('OGP_LANG_db_info', "Tietokannan tiedot");
define('OGP_LANG_db_tables', "Tietokannan taulut");
define('OGP_LANG_db_backup', "DB varmuuskopio");
define('OGP_LANG_download_db_backup', "Lataa DB varmuuskopio");
define('OGP_LANG_restore_db_backup', "Palauta DB varmuuskopio");
define('OGP_LANG_sql_file', "tiedosto(.sql)");
?>