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
$module_title = "User admin";
$module_version = "1.1";
$db_version = 7;
$module_required = TRUE;
$module_menus = array(
    array( 'subpage' => '', 'name'=>'User Admin', 'group'=>'admin' ),
    array( 'subpage' => 'show_groups', 'name'=>'Group Admin', 'group'=>'admin' )
);

$install_queries = array();
$install_queries[0] = array(
    "DROP TABLE IF EXISTS ".OGP_DB_PREFIX."users;",
    "CREATE TABLE ".OGP_DB_PREFIX."users (
        `user_id` int(11) NOT NULL auto_increment,
        `users_login` varchar(255) NOT NULL,
        `users_passwd` varchar(255) NOT NULL,
        `users_lang` varchar(20) NOT NULL default 'English',
        `users_role` varchar(30) NOT NULL default 'user',
        `users_group` varchar(100) NULL,
        `users_fname` varchar(255) NULL,
        `users_lname` varchar(255) NULL,
        `users_email` varchar(255) NULL,
        `users_phone` varchar(12) NULL,
        `users_city` varchar(255) NULL,
        `users_province` varchar(255) NULL,
        `users_country` varchar(255) NULL,
        `users_comment` text NULL,
        `users_theme` varchar(255) NULL,
        `user_expires` varchar(30) NOT NULL default 'X',
        PRIMARY KEY  (`users_login`),
		UNIQUE KEY `id` (`user_id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;",
    "DROP TABLE IF EXISTS ".OGP_DB_PREFIX."user_groups;",
    "CREATE TABLE ".OGP_DB_PREFIX."user_groups (
        `user_id` int(11) NOT NULL,
        `role_id` int(11) NULL,
        `group_id` int(11) NOT NULL,
        PRIMARY KEY (`user_id`,`group_id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;",
    "DROP TABLE IF EXISTS ".OGP_DB_PREFIX."user_role_info;",
    "CREATE TABLE ".OGP_DB_PREFIX."user_role_info (
        `role_id` int(11) NOT NULL auto_increment,
        `role_name` varchar(100) NULL,
        PRIMARY KEY (`role_id`), UNIQUE KEY (`role_name`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;",
    "DROP TABLE IF EXISTS ".OGP_DB_PREFIX."user_group_info;",
    "CREATE TABLE ".OGP_DB_PREFIX."user_group_info (
        `group_id` int(11) NOT NULL auto_increment,
        `group_name` varchar(255), PRIMARY KEY (`group_id`),
        UNIQUE KEY (`group_name`)
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

$install_queries[1] = array("ALTER TABLE `".OGP_DB_PREFIX."user_group_info` ADD `main_user_id` int(11) NULL;");
$install_queries[2] = array("ALTER TABLE `".OGP_DB_PREFIX."users` ADD `users_parent` int(11) NULL;");
$install_queries[3] = array(
	"ALTER TABLE `".OGP_DB_PREFIX."users` CHANGE `users_email` `users_email` VARCHAR( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL",
	"UPDATE ".OGP_DB_PREFIX."users
	JOIN (
		SELECT users_email, MIN(user_id) minID
		FROM ".OGP_DB_PREFIX."users
		GROUP BY users_email
		HAVING COUNT(*) > 1
	) t2 ON ".OGP_DB_PREFIX."users.users_email = t2.users_email AND ".OGP_DB_PREFIX."users.user_id != t2.minID
	SET ".OGP_DB_PREFIX."users.users_email = DEFAULT;",
	"ALTER TABLE `".OGP_DB_PREFIX."users` ADD UNIQUE `email` (`users_email`);");
$install_queries[4] = array("UPDATE ".OGP_DB_PREFIX."users SET users_email = DEFAULT WHERE users_email = '';");
$install_queries[5] = array("ALTER TABLE `".OGP_DB_PREFIX."user_groups` MODIFY group_id int(11) NOT NULL;");
$install_queries[6] = array("ALTER TABLE `".OGP_DB_PREFIX."users` ADD `users_page_limit` int(11) NULL DEFAULT 25;");
$install_queries[7] = array("ALTER TABLE `".OGP_DB_PREFIX."users` ADD `user_receives_emails` tinyint(1) NOT NULL DEFAULT 1;");
?>
