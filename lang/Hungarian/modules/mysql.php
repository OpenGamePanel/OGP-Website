<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2016 The OGP Development Team
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

define('configured_mysql_hosts', "MySQL kiszolgáló beállítása");
define('add_new_mysql_host', "MySQL kiszolgáló hozzáadása");
define('enter_mysql_ip', "Add meg a MySQL IP-t.");
define('enter_valid_port', "Add meg egy valós portot.");
define('enter_mysql_root_password', "Add meg a MySQL root jelszavát.");
define('enter_mysql_name', "Add meg a MySQL nevét.");
define('could_not_add_mysql_server', "Nem sikerült hozzáadni a MySQL szervert.");
define('game_server_name_info', "Szerver neve segít a felhasználóknak beazonosítani a szervereiket.");
define('note_mysql_host', "Note: Using a 'Direct connection' the server must accept external connections so the servers can connect remotely, whereas connecting through a remote server it will be used just as a local connection.");
define('direct_connection', "Közvetlen kapcsolat");
define('connection_through_remote_server_named', "Kapcsolat a(z) %s nevű távoli szerveren keresztül");
define('add_mysql_server', "MySQL szerver hozzáadása");
define('mysql_online', "MySQL elérhető");
define('mysql_offline', "MySQL nem elérhető");
define('encryption_key_mismatch', "A titkosítási kulcs nem egyezik");
define('unknown_error', "Ismeretlen hiba");
define('remove', "Törlés");
define('assign_db', "Adatbázis hozzárendelése");
define('mysql_server_name', "MySQL szerver neve");
define('server_status', "Szerver állapota");
define('mysql_ip_port', "MySQL IP:port");
define('mysql_root_passwd', "MySQL root jelszava");
define('connection_method', "Csatlakozási mód");
define('user_privilegies', "Felhasználói jogosultságok");
define('current_dbs', "Jelenlegi adatbázisok");
define('mysql_name', "MySQL szerver név");
define('mysql_ip', "MySQL IP");
define('mysql_port', "MySQL port");
define('privilegies', "jogosultságok");
define('all', "Összes");
define('custom', "Egyéni");
define('server_added', "Szerver hozzáadva.");
define('sql_alter', "MÓDOSÍTÁS");
define('sql_create', "LÉTREHOZÁS");
define('sql_create_temporary_tables', "IDEIGLENES TÁBLÁK LÉTREHOZÁSA");
define('sql_drop', "KIDOBNI");
define('sql_index', "INDEX");
define('sql_insert', "INSERT");
define('sql_lock_tables', "TÁBLÁK ZÁROLÁSA");
define('sql_select', "VÁLASZT");
define('sql_grant_option', "GRANT OPTION");
define('sql_update', "FRISSÍTÉS");
define('sql_delete', "TÖRLÉS");
define('sql_alter_info', "<b>Enables use of ALTER TABLE.</b>");	
define('sql_create_info', "<b>Enables use of CREATE TABLE.</b>");	
define('sql_create_temporary_tables_info', "<b>Enables use of CREATE TEMPORARY TABLE.</b>");
define('sql_delete_info', "<b>Enables use of DELETE.</b>");
define('sql_drop_info', "<b>Enables use of DROP TABLE.</b>");	
define('sql_index_info', "<b>Enables use of CREATE INDEX and DROP INDEX.</b>");	
define('sql_insert_info', "<b>Enables use of INSERT.</b>");	
define('sql_lock_tables_info', "<b>Enables use of LOCK TABLES on tables for which you have the SELECT privilege.</b>");	
define('sql_select_info', "<b>Enables use of SELECT.</b>");
define('sql_update_info', "<b>Enables use of UPDATE.</b>");	
define('sql_grant_option_info', "<b>Enables privileges to be granted.</b>");
define('select_game_server', "Válassz játék szervert");
define('invalid_mysql_server_id', "Érvénytelen MySQL szerver ID.");
define('there_is_another_db_named_or_user_named', "There is another database named <b>%s</b> or another user named <b>%s</b>.");
define('db_added_for_home_id', "Added database for home ID <b>%s</b>.");
define('could_not_remove_db', "A kiválasztott adatbázist nem lehet eltávolítani.");
define('db_removed_successfully_from_mysql_server_named', "Az adatbázis eltávolítva a(z) %s szerverről.");
define('areyousure_remove_mysql_server', "Are you sure that you want remove MySQL server named <b>%s</b>?");
define('db_changed_successfully', "A(z) %s nevű adatbázist sikeresen megváltoztattuk.");
define('error_while_remove', "Hiba az eltávolítás közben.");
define('mysql_server_removed', "A(z) <b>%s</b> nevű MySQL szerver eltávolítása sikeresen megtörtént.");
define('unable_to_set_changes_to', "Unable to set changes to MySQL server named <b>%s</b>.");
define('mysql_server_settings_changed', "MySQL server named <b>%s</b> has been changed successfully.");
define('editing_mysql_server', "A(z) <b>%s</b> nevű MySQL szerver szerkesztése.");
define('save_settings', "Beállítások mentése");
define('mysql_dbs_for', "Adatbázisok a(z) %s szerverhez");
define('edit_dbs', "Adatbázisok szerkesztése");
define('edit_db_settings', "Adatbázis beállítások szerkesztése");
define('remove_db', "Adatbázis eltávolítása");
define('save_db_changes', "Adatbázis változások mentése.");
define('add_db', "Adatbázis hozzáadása");
define('select_db', "Adatbázis választása");
define('db_user', "Adatbázis felhasználó");
define('db_passwd', "Adatbázis jelszó");
define('db_name', "Adatbázis név");
define('enabled', "Engedélyezve");
define('game_server', "Játék szerver");
define('there_are_no_databases_assigned_for', "There are no databases assigned for <b>%s</b>.");
define('unable_to_connect_to_mysql_server_as', "Unable to connect to MySQL server as %s.");
define('unable_to_create_db', "Nem sikerült létrehozni az adatbázist.");
define('unable_to_select_db', "Nem lehet kiválasztani a(z) %s adatbázist.");
define('db_info', "Adatbázis információ");
define('db_tables', "Adatbázis táblák");
define('db_backup', "Adatbázis mentés");
define('download_db_backup', "Adatbázis mentés letöltése");
define('restore_db_backup', "Adatbázis mentés visszaállítása");
define('sql_file', "fájl(.sql)");
?>