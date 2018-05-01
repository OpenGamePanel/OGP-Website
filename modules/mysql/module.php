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
$module_title = "MySQL";
$module_version = "0.1";
$db_version = 0;
$module_required = TRUE;
$module_menus = array( array( 'subpage' => 'mysql_admin', 'name'=>'MySQL Admin', 'group'=>'admin' ) );

$install_queries[0] = array(
    "DROP TABLE IF EXISTS `".OGP_DB_PREFIX."mysql_servers`;",
    "CREATE TABLE IF NOT EXISTS `".OGP_DB_PREFIX."mysql_servers` (
	`mysql_server_id` int(11) NOT NULL auto_increment,
	`remote_server_id` int(11) NOT NULL,
	`mysql_name` varchar(100) NOT NULL,
	`mysql_ip` varchar(255) NOT NULL,
	`mysql_port` int(11) NOT NULL,
	`mysql_root_passwd` VARCHAR( 32 ) NULL,
	`privilegies_str` LONGTEXT NULL,
	PRIMARY KEY  (`mysql_server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;",

"DROP TABLE IF EXISTS ".OGP_DB_PREFIX."mysql_databases",
"CREATE TABLE IF NOT EXISTS `".OGP_DB_PREFIX."mysql_databases` (
	`db_id` int(11) NOT NULL auto_increment,
	`mysql_server_id` int(11) NOT NULL,
	`home_id` int(11) NOT NULL,
	`db_user` varchar(50) NOT NULL,
	`db_passwd` varchar(50) NOT NULL,
	`db_name` varchar(50) NOT NULL,
	`enabled` int(11) NOT NULL,
	PRIMARY KEY  (`db_id`),
	UNIQUE KEY (`mysql_server_id`,`db_name`),
	UNIQUE KEY (`mysql_server_id`,`db_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

?>
