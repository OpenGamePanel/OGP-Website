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

define('OGP_LANG_configured_mysql_hosts', "Konfigurált MySQL kiszolgálók");
define('OGP_LANG_add_new_mysql_host', "MySQL állomás hozzáadása");
define('OGP_LANG_enter_mysql_ip', "Add meg a MySQL IP-t.");
define('OGP_LANG_enter_valid_port', "Adj meg egy érvényes portot.");
define('OGP_LANG_enter_mysql_root_password', "Add meg a MySQL root jelszavát.");
define('OGP_LANG_enter_mysql_name', "Add meg a MySQL nevét.");
define('OGP_LANG_could_not_add_mysql_server', "Nem sikerült hozzáadni a MySQL szervert.");
define('OGP_LANG_game_server_name_info', "Szerver neve segít a felhasználóknak beazonosítani a szervereiket.");
define('OGP_LANG_note_mysql_host', "Note: Using a 'Direct connection' the server must accept external connections so the servers can connect remotely, whereas connecting through a remote server it will be used just as a local connection.");
define('OGP_LANG_direct_connection', "Közvetlen kapcsolat");
define('OGP_LANG_connection_through_remote_server_named', "Kapcsolat a(z) %s nevű távoli szerveren keresztül");
define('OGP_LANG_add_mysql_server', "MySQL szerver hozzáadása");
define('OGP_LANG_mysql_online', "MySQL elérhető");
define('OGP_LANG_mysql_offline', "MySQL nem elérhető");
define('OGP_LANG_encryption_key_mismatch', "A titkosítási kulcs nem egyezik");
define('OGP_LANG_unknown_error', "Ismeretlen hiba");
define('OGP_LANG_remove', "Törlés");
define('OGP_LANG_assign_db', "Adatbázis hozzárendelése");
define('OGP_LANG_mysql_server_name', "MySQL szerver neve");
define('OGP_LANG_server_status', "Szerver állapota");
define('OGP_LANG_mysql_ip_port', "MySQL IP:port");
define('OGP_LANG_mysql_root_passwd', "MySQL root jelszava");
define('OGP_LANG_connection_method', "Csatlakozási mód");
define('OGP_LANG_user_privilegies', "Felhasználói jogosultságok");
define('OGP_LANG_current_dbs', "Jelenlegi adatbázisok");
define('OGP_LANG_mysql_name', "MySQL szerver név");
define('OGP_LANG_mysql_ip', "MySQL IP");
define('OGP_LANG_mysql_port', "MySQL port");
define('OGP_LANG_privilegies', "jogosultságok");
define('OGP_LANG_all', "Összes");
define('OGP_LANG_custom', "Egyéni");
define('OGP_LANG_server_added', "Szerver hozzáadva.");
define('OGP_LANG_sql_alter', "MÓDOSÍTÁS");
define('OGP_LANG_sql_create', "LÉTREHOZÁS");
define('OGP_LANG_sql_create_temporary_tables', "IDEIGLENES TÁBLÁK LÉTREHOZÁSA");
define('OGP_LANG_sql_drop', "KIDOBNI");
define('OGP_LANG_sql_index', "INDEX");
define('OGP_LANG_sql_insert', "ÚJ SOR BEVITELE");
define('OGP_LANG_sql_lock_tables', "TÁBLÁK ZÁROLÁSA");
define('OGP_LANG_sql_select', "VÁLASZT");
define('OGP_LANG_sql_grant_option', "GRANT OPTION");
define('OGP_LANG_sql_update', "FRISSÍTÉS");
define('OGP_LANG_sql_delete', "TÖRLÉS");
define('OGP_LANG_sql_alter_info', "<b>Engedélyezi a TÁBLA SZERKEZETÉNEK A MÓDOSÍTÁSA használatát.</b>");	
define('OGP_LANG_sql_create_info', "<b>Engedélyezi az ADATTÁBLA LÉTREHOZÁSA használatát.</b>");	
define('OGP_LANG_sql_create_temporary_tables_info', "Engedélyezi az IDEIGLENES ADATTÁBLA LÉTREHOZÁSÁT.");
define('OGP_LANG_sql_delete_info', "<b>Engedélyezi a TÖRLÉS használatát.</b>");
define('OGP_LANG_sql_drop_info', "<b>Engedélyezi a TÁBLA TÖRLÉSE használatát.</b>");	
define('OGP_LANG_sql_index_info', "<b>Engedélyezi az INDEXEK KÉSZÍTÉSÉT és az INDEXEK TÖRLÉSÉT.</b>");	
define('OGP_LANG_sql_insert_info', "<b>Engedélyezi az ÚJ SOR BEVITELE használatát.</b>");	
define('OGP_LANG_sql_lock_tables_info', "<b>Enables use of LOCK TABLES on tables for which you have the SELECT privilege.</b>");	
define('OGP_LANG_sql_select_info', "Engedélyezi a KIJELÖLÉS használatát.");
define('OGP_LANG_sql_update_info', "Engedélyezi a FRISSÍTÉS használatát.");	
define('OGP_LANG_sql_grant_option_info', "Engedélyezi, hogy jogok kerülhessenek megadásra.");
define('OGP_LANG_select_game_server', "Válassz játékszervert");
define('OGP_LANG_invalid_mysql_server_id', "Érvénytelen MySQL szerver ID.");
define('OGP_LANG_there_is_another_db_named_or_user_named', "Már van egy adatbázis <b>%s</b> néven, vagy egy <b>%s</b> nevű felhasználó.");
define('OGP_LANG_db_added_for_home_id', "Adatbázis hozzáadva a(z) <b>%s</b>-s ID-hez");
define('OGP_LANG_could_not_remove_db', "A kiválasztott adatbázist nem lehet eltávolítani.");
define('OGP_LANG_db_removed_successfully_from_mysql_server_named', "Az adatbázis eltávolítva a(z) %s szerverről.");
define('OGP_LANG_areyousure_remove_mysql_server', "Biztos, hogy el akarod távolítani a(z) <b>%s</b> nevű MySQL szervert?");
define('OGP_LANG_db_changed_successfully', "A(z) %s nevű adatbázist sikeresen megváltoztattuk.");
define('OGP_LANG_error_while_remove', "Hiba az eltávolítás közben.");
define('OGP_LANG_mysql_server_removed', "A(z) <b>%s</b> nevű MySQL szerver eltávolítása sikeresen megtörtént.");
define('OGP_LANG_unable_to_set_changes_to', "Nem sikerült beállítani a módosításokat a(z) <b>%s</b> nevű MySQL szerverhez.");
define('OGP_LANG_mysql_server_settings_changed', "A(z) <b>%s</b> nevű MySQL szerver sikeresen megváltoztatva.");
define('OGP_LANG_editing_mysql_server', "A(z) <b>%s</b> nevű MySQL szerver szerkesztése.");
define('OGP_LANG_save_settings', "Beállítások mentése");
define('OGP_LANG_mysql_dbs_for', "Adatbázisok a(z) %s szerverhez");
define('OGP_LANG_edit_dbs', "Adatbázisok szerkesztése");
define('OGP_LANG_edit_db_settings', "Adatbázis beállítások szerkesztése");
define('OGP_LANG_remove_db', "Adatbázis eltávolítása");
define('OGP_LANG_save_db_changes', "Adatbázis változások mentése.");
define('OGP_LANG_add_db', "Adatbázis hozzáadása");
define('OGP_LANG_select_db', "Adatbázis választása");
define('OGP_LANG_db_user', "Adatbázis felhasználó");
define('OGP_LANG_db_passwd', "Adatbázis jelszó");
define('OGP_LANG_db_name', "Adatbázis név");
define('OGP_LANG_enabled', "Engedélyezve");
define('OGP_LANG_game_server', "Játék szerver");
define('OGP_LANG_there_are_no_databases_assigned_for', "Nincsenek hozzárendelt adatbázisok a %s-hez.");
define('OGP_LANG_unable_to_connect_to_mysql_server_as', "Nem sikerült csatlakozni a %s MySQL szerverhez.");
define('OGP_LANG_unable_to_create_db', "Nem sikerült létrehozni az adatbázist.");
define('OGP_LANG_unable_to_select_db', "Nem lehet kiválasztani a(z) %s adatbázist.");
define('OGP_LANG_db_info', "Adatbázis információ");
define('OGP_LANG_db_tables', "Adatbázis táblák");
define('OGP_LANG_db_backup', "Adatbázis mentés");
define('OGP_LANG_download_db_backup', "Adatbázis mentés letöltése");
define('OGP_LANG_restore_db_backup', "Adatbázis mentés visszaállítása");
define('OGP_LANG_sql_file', "fájl(.sql)");
?>