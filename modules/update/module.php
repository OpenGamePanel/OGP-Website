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

// Module general information
$module_title = "Update";
$module_version = "1.1";
$db_version = 2; // avoid 'duplicate table' error message.
$module_required = TRUE;
$module_menus = array(
    array( 'subpage' => '', 'name'=>'Update', 'group'=>'admin' )
);

$install_queries = array();
$install_queries[0] = array();
$install_queries[1] = array(
    "CREATE TABLE IF NOT EXISTS ".OGP_DB_PREFIX."update_blacklist (
        `file_path` VARCHAR(1000) UNIQUE NOT NULL
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;");
$install_queries[2] = array(
	"DELETE FROM ".OGP_DB_PREFIX."update_blacklist
WHERE file_path IN (SELECT * 
             FROM (SELECT file_path FROM ".OGP_DB_PREFIX."update_blacklist 
                   GROUP BY file_path HAVING (COUNT(*) > 1)
                  ) AS A
            );",
    "ALTER TABLE ".OGP_DB_PREFIX."update_blacklist MODIFY file_path VARCHAR(1000);",
	"ALTER TABLE ".OGP_DB_PREFIX."update_blacklist ADD UNIQUE (file_path);"
);
/* 
$install_queries[3] = array(
	"ALTER TABLE `".OGP_DB_PREFIX."users` MODIFY COLUMN `users_login` NVARCHAR(128);",
	"ALTER TABLE `".OGP_DB_PREFIX."users` MODIFY COLUMN `users_passwd` NVARCHAR(128);",
	"ALTER TABLE `".OGP_DB_PREFIX."users` MODIFY COLUMN `users_fname` NVARCHAR(128);",
	"ALTER TABLE `".OGP_DB_PREFIX."users` MODIFY COLUMN `users_lname` NVARCHAR(128);",
	"ALTER TABLE `".OGP_DB_PREFIX."users` MODIFY COLUMN `users_email` NVARCHAR(128);",
	"ALTER TABLE `".OGP_DB_PREFIX."users` MODIFY COLUMN `users_city` NVARCHAR(128);",
	"ALTER TABLE `".OGP_DB_PREFIX."users` MODIFY COLUMN `users_province` NVARCHAR(128);",
	"ALTER TABLE `".OGP_DB_PREFIX."users` MODIFY COLUMN `users_country` NVARCHAR(128);",
	"ALTER TABLE `".OGP_DB_PREFIX."users` MODIFY COLUMN `users_theme` NVARCHAR(128);",
	"ALTER TABLE `".OGP_DB_PREFIX."user_group_info` MODIFY COLUMN `group_name` NVARCHAR(128);",
	"ALTER TABLE `".OGP_DB_PREFIX."ban_list` MODIFY COLUMN `client_ip` NVARCHAR(128);",
	"ALTER TABLE `".OGP_DB_PREFIX."addons` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."adminExternalLinks` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."api_tokens` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."arrange_ports` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."ban_list` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."config_homes` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."config_mods` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."game_mods` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."home_ip_ports` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."lgsl` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."logger` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."master_server_homes` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."module_access_rights` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."module_menus` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."modules` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."mysql_databases` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."mysql_servers` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."rcon_presets` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."remote_server_ips` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."remote_servers` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."server_homes` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."settings` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."status_cache` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."ts3_homes` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."update_blacklist` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."user_group_homes` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."user_group_info` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."user_group_remote_servers` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."user_groups` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."user_homes` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."user_role_info` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."users` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."widgets` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;",
	"ALTER TABLE `".OGP_DB_PREFIX."widgets_users` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");
?>
 */