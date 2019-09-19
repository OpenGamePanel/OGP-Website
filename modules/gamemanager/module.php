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
$module_title = "Game manager";
$module_version = "1.33";
$db_version = 8;
$module_required = TRUE;
$module_menus = array( array( 'subpage' => 'game_monitor', 'name'=>'Game Monitor', 'group'=>'user' ) );
$module_access_rights = array('u' => 'allow_updates', 'p' => 'allow_parameter_usage', 'e' => 'allow_extra_params', 'c' => 'allow_custom_fields');

$install_queries[0] = array(
    "DROP TABLE IF EXISTS `".OGP_DB_PREFIX."home_ip_ports`;",
    "CREATE TABLE IF NOT EXISTS `".OGP_DB_PREFIX."home_ip_ports` (
	`ip_id` int(11) NOT NULL,
	`port` int(11) NOT NULL,
	`home_id` int(11) NOT NULL,
	PRIMARY KEY  (`ip_id`,`port`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;",

"DROP TABLE IF EXISTS ".OGP_DB_PREFIX."server_homes",
"CREATE TABLE IF NOT EXISTS `".OGP_DB_PREFIX."server_homes` (
	`home_id` int(50) NOT NULL auto_increment,
	`remote_server_id` int(11) NOT NULL,
	`user_id_main` int(11) NOT NULL,
	`home_path` varchar(100) NOT NULL,
	`home_cfg_id` int(50) NOT NULL,
	`home_name` varchar(128) NOT NULL,
	`control_password` VARCHAR( 32 ) NULL,
	`ftp_password` VARCHAR( 16 ) NULL,
	`last_param` LONGTEXT NULL,
	PRIMARY KEY  (`home_id`),
UNIQUE KEY remote_server_id (remote_server_id,home_path)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;",

"DROP TABLE IF EXISTS ".OGP_DB_PREFIX."rcon_presets;",
"CREATE TABLE ".OGP_DB_PREFIX."rcon_presets (
	`preset_id` int(50) NOT NULL auto_increment,
	`name` varchar(20) NOT NULL,
	`command` varchar(100) NOT NULL,
	`home_cfg_id` int(50) NOT NULL,
	`mod_cfg_id` int(50) NOT NULL,
	PRIMARY KEY  (`preset_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;",

"DROP TABLE IF EXISTS ".OGP_DB_PREFIX."game_mods",
"CREATE TABLE IF NOT EXISTS ".OGP_DB_PREFIX."game_mods (
    `mod_id` int(50) NOT NULL auto_increment,
    `home_id` int(255) NOT NULL,
    `mod_cfg_id` int(11) NOT NULL,
    `max_players` smallint(3) default NULL,
    `extra_params` varchar(255) default NULL,
    `cpu_affinity` varchar(2) default NULL,
    `nice` smallint(3) default '0',
    `precmd` TEXT,
    `postcmd` TEXT,
    PRIMARY KEY (mod_id),
UNIQUE KEY home_id (home_id,mod_cfg_id)
				  ) ENGINE=MyISAM;");
				  
$install_queries[1] = array(
	"ALTER TABLE `".OGP_DB_PREFIX."server_homes` ADD `ftp_login` varchar(32) NULL;",
	"ALTER TABLE `".OGP_DB_PREFIX."server_homes` ADD `ftp_status` int(11) NOT NULL DEFAULT '0';");
	
$install_queries[2] = array(
"DROP TABLE IF EXISTS `".OGP_DB_PREFIX."status_cache`",	
"CREATE TABLE IF NOT EXISTS `".OGP_DB_PREFIX."status_cache` (
  `date_timestamp` char(16) NOT NULL,
  `ip_id` char(3) NOT NULL,
  `port` char(6) NOT NULL,
  `server_status_cache` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

$install_queries[3] = array(
	"ALTER TABLE `".OGP_DB_PREFIX."server_homes` ADD `custom_fields` LONGTEXT NULL;");

$install_queries[4] = array(
	"ALTER TABLE `".OGP_DB_PREFIX."home_ip_ports` ADD `force_mod_id` int(11) NOT NULL DEFAULT '0';");

$install_queries[5] = array(
	"TRUNCATE `".OGP_DB_PREFIX."status_cache`;");
	
$install_queries[6] = array(
	"ALTER TABLE `".OGP_DB_PREFIX."server_homes` ADD `server_expiration_date` VARCHAR(21) NOT NULL default 'X';");

$install_queries[7] = array(
	"ALTER TABLE `".OGP_DB_PREFIX."server_homes` drop index `remote_server_id`;"
	);
	
$install_queries[8] = array(
	"ALTER TABLE `".OGP_DB_PREFIX."server_homes` ADD `home_user_order` INT NOT NULL default 99999;");
?>
