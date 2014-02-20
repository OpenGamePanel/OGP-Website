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

// server.php
$lang['add_new_mysql_host'] = "Add MySQL host";
$lang['enter_mysql_ip'] = "Enter MySQL IP.";
$lang['enter_valid_port'] = "Enter a valid port.";
$lang['enter_mysql_root_password'] = "Enter MySQL root password.";
$lang['enter_mysql_name'] = "Enter MySQL name.";
$lang['could_not_add_mysql_server'] = "Could not add MySQL server.";
$lang['game_server_name_info'] = "Server added.";
$lang['note_mysql_host'] = "Note: Using a 'Direct connection' the server must accept external connections so the servers can connect remotely, whereas connecting through a remote server it will be used just as a local connection.";
$lang['direct_connection'] = "Direct connection";
$lang['connection_through_remote_server_named'] = "Connection through remote server named %s";
$lang['add_mysql_server'] = "Add MySQL server";
$lang['offline'] = "Offline";
$lang['online'] = "Online";
$lang['mysql_online'] = "MySQL online";
$lang['mysql_offline'] = "MySQL offline";
$lang["encryption_key_mismatch"] = "Encription key mismatch";
$lang["unknown_error"] = "Unknown error";
$lang["remove"] = "Delete";
$lang["assign_db"] = "Assign Database";
$lang["mysql_server_name"] = "MySQL server name";
$lang["server_status"] = "Server status";
$lang['mysql_ip_port'] = "MySQL IP:port";
$lang['mysql_root_passwd'] = "MySQL root password";
$lang['connection_method'] = "Connection method";
$lang['user_privilegies'] = "User privileges";
$lang['current_dbs'] = "Current databases";
$lang['mysql_name'] = "MySQL server name";
$lang['mysql_ip'] = "MySQL IP";
$lang['mysql_port'] = "MySQL port";
$lang['privilegies'] = "privileges";
$lang['all'] = "All";
$lang['custom'] = "Custom";
$lang['server_added'] = "Server added.";

//privileges
$lang['alter'] = "ALTER";	
$lang['create'] = "CREATE";	
$lang['create_temporary_tables'] = "CREATE TEMPORARY TABLES";
$lang['delete'] = "DELETE";
$lang['drop'] = "DROP";	
$lang['index'] = "INDEX";	
$lang['insert'] = "INSERT";	
$lang['lock_tables'] = "LOCK TABLES";
$lang['select'] = "SELECT";	
$lang['update'] = "UPDATE";	
$lang['grant_option'] = "GRANT OPTION";
//privileges descriptions
$lang['alter_info'] = "<b>Enables use of ALTER TABLE.</b>";	
$lang['create_info'] = "<b>Enables use of CREATE TABLE.</b>";	
$lang['create_temporary_tables_info'] = "<b>Enables use of CREATE TEMPORARY TABLE.</b>";
$lang['delete_info'] = "<b>Enables use of DELETE.</b>";
$lang['drop_info'] = "<b>Enables use of DROP TABLE.</b>";	
$lang['index_info'] = "<b>Enables use of CREATE INDEX and DROP INDEX.</b>";	
$lang['insert_info'] = "<b>Enables use of INSERT.</b>";	
$lang['lock_tables_info'] = "<b>Enables use of LOCK TABLES on tables for which you have the SELECT privilege.</b>";	
$lang['select_info'] = "<b>Enables use of SELECT.</b>";
$lang['update_info'] = "<b>Enables use of UPDATE.</b>";	
$lang['grant_option_info'] = "<b>Enables privileges to be granted.</b>";


// edit_server.php
$lang['select_game_server'] = "Select game server";
$lang['invalid_mysql_server_id'] = "Invalid MySQL server ID.";
$lang['there_is_another_db_named_or_user_named'] = "There is another database named <b>%s</b> or another user named <b>%s</b>.";
$lang['db_added_for_home_id'] = "Added database for home ID <b>%s</b>.";
$lang['could_not_remove_db'] = "The selected database could not be removed.";
$lang['db_removed_successfully_from_mysql_server_named'] = "The database was removed from server %s.";
$lang['areyousure_remove_mysql_server'] = "Are you sure that you want remove MySQL server named <b>%s</b>?";
$lang['db_changed_successfully'] = "The database named %s was changed successfully.";
$lang['error_while_remove'] = "Error while remove.";
$lang['mysql_server_removed'] = "MySQL server named <b>%s</b> has been removed successfully.";
$lang['unable_to_set_changes_to'] = "Unable to set changes to MySQL server named <b>%s</b>.";
$lang['mysql_server_settings_changed'] = "MySQL server named <b>%s</b> has been changed successfully.";
$lang['editing_mysql_server'] = "Editing MySQL server named <b>%s</b>.";
$lang['save_settings'] = "Save settings";
$lang['mysql_dbs_for'] = "Databases for server %s";
$lang['edit_dbs'] = "Edit databases";
$lang['edit_db_settings'] = "Edit database settings";
$lang['remove_db'] = "Remove database";
$lang['save_db_changes'] = "Save database changes.";
$lang['add_db'] = "Add database";
$lang['select_db'] = "Select database";
$lang['db_user'] = "DB User";
$lang['db_passwd'] = "DB Password";
$lang['db_name'] = "DB name";
$lang['enabled'] = "Enabled";
$lang['game_server'] = "Game server";


// user_db.php
$lang['there_are_no_databases_assigned_for'] = "There are no databases assigned for <b>%s</b>.";
$lang['unable_to_connect_to_mysql_server_as'] = "Unable to connect to MySQL server as %s.";
$lang['unable_to_create_db'] = "Unable to create a database.";
$lang['unable_to_select_db'] = "Unable to select database %s.";
$lang['db_info'] = "Database Information";
$lang['db_tables'] = "Database tables";
$lang['db_backup'] = "Бэкап БД";
$lang['download_db_backup'] = "Скачать бэкап БД";
$lang['restore_db_backup'] = "Восстановить БД из бэкапа";
$lang['sql_file'] = "файл(.sql)";

?>