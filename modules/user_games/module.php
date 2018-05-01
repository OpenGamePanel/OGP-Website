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
$module_title = "User games";
$module_version = "1.3";
$db_version = 3;
$module_required = TRUE;
$module_menus = array(
	array( 'subpage' => '', 'name'=>'Game Servers', 'group'=>'admin' )
);
$install_queries = array();
$install_queries[0] = array(
	"DROP TABLE IF EXISTS `".OGP_DB_PREFIX."user_homes`;",
	"CREATE TABLE IF NOT EXISTS ".OGP_DB_PREFIX."user_homes (
		`home_id` int(11) NOT NULL,
		`user_id` int(11) NOT NULL,
		`access_rights` varchar(63) default NULL,
		PRIMARY KEY (`user_id`,`home_id`)
	) ENGINE=MyISAM DEFAULT CHARSET=latin1;",
	"DROP TABLE IF EXISTS ".OGP_DB_PREFIX."user_group_remote_servers;",
	"CREATE TABLE ".OGP_DB_PREFIX."user_group_remote_servers (
		`remote_server_id` int(11) NOT NULL,
		`group_id` int(11) NOT NULL,
		`access_rights` varchar(63) default NULL,
		PRIMARY KEY (`remote_server_id`, `group_id`)
	)ENGINE=MyISAM DEFAULT CHARSET=latin1;",
	"DROP TABLE IF EXISTS ".OGP_DB_PREFIX."user_group_homes;",
	"CREATE TABLE ".OGP_DB_PREFIX."user_group_homes (
		`home_id` int(11) NOT NULL,
		`group_id` int(11) NOT NULL,
		`access_rights` varchar(63) default NULL,
		PRIMARY KEY (`home_id`, `group_id`)
	)ENGINE=MyISAM DEFAULT CHARSET=latin1;");

$install_queries[1] = array(
	"DROP TABLE IF EXISTS `".OGP_DB_PREFIX."master_server_homes`;",
	"CREATE TABLE IF NOT EXISTS ".OGP_DB_PREFIX."master_server_homes (
		`home_id` int(11) NOT NULL,
		`home_cfg_id` int(11) NOT NULL,
		`remote_server_id` int(11) NOT NULL,
		PRIMARY KEY (`remote_server_id`, `home_cfg_id`)
	)ENGINE=MyISAM DEFAULT CHARSET=latin1;");

$install_queries[2] = array(
	"ALTER TABLE `".OGP_DB_PREFIX."user_homes` ADD `user_expiration_date` VARCHAR(21) NOT NULL default 'X';",
	"ALTER TABLE `".OGP_DB_PREFIX."user_group_homes` ADD `user_group_expiration_date` VARCHAR(21) NOT NULL default 'X';");

$install_queries[3] = array(
	"ALTER TABLE `".OGP_DB_PREFIX."game_mods` modify column `cpu_affinity` varchar(64) null AFTER `extra_params`, comment = 'utf8mb4_general_ci';");
?>
