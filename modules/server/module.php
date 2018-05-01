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
$module_title = "Server manager";
$module_version = "1.6.1";
$db_version = 7;
$module_required = TRUE;
$module_menus = array(
	array( 'subpage' => '', 'name'=>'Servers', 'group'=>'admin' )
	);

$install_queries = array();
$install_queries[0] = array(
"DROP TABLE IF EXISTS `".OGP_DB_PREFIX."remote_server_ips`;",
"CREATE TABLE IF NOT EXISTS `".OGP_DB_PREFIX."remote_server_ips` (
  `ip_id` int(11) NOT NULL AUTO_INCREMENT,
  `remote_server_id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY (`ip_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;",
"DROP TABLE IF EXISTS `".OGP_DB_PREFIX."remote_servers`;",
"CREATE TABLE IF NOT EXISTS `".OGP_DB_PREFIX."remote_servers` (
  `remote_server_id` int(11) NOT NULL auto_increment,
  `remote_server_name` varchar(100) NOT NULL,
  `ogp_user` varchar(100) NOT NULL,
  `agent_ip` varchar(255) NOT NULL,
  `agent_port` int(11) NOT NULL,
  `ftp_port` int(11) NOT NULL,
  `encryption_key` varchar(50) NOT NULL,
  `timeout` int(11) NOT NULL,
  PRIMARY KEY  (`remote_server_id`),
  UNIQUE KEY `agent_ip` (`agent_ip`,`agent_port`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Remote servers and IPs';");

$install_queries[1] = array(	
	"ALTER TABLE `".OGP_DB_PREFIX."remote_servers` 
	 ADD `use_nat` int(11) NOT NULL;"); 
$install_queries[2] = array(
	"ALTER TABLE `OGP_DB_PREFIXremote_servers` 
	 ADD `ufw_status` CHAR(8);");
$install_queries[3] = array(
	"ALTER TABLE `OGP_DB_PREFIXremote_servers` 
	 ADD `ftp_ip` varchar(255) NOT NULL;");
	 
$install_queries[4] = array(
"DROP TABLE IF EXISTS `".OGP_DB_PREFIX."arrange_ports`;",
"CREATE TABLE IF NOT EXISTS `".OGP_DB_PREFIX."arrange_ports` (
  `range_id` int(11) NOT NULL auto_increment,
  `ip_id` int(11) NOT NULL,
  `home_cfg_id` int(11) NOT NULL,
  `start_port` smallint(11) unsigned NOT NULL,
  `end_port` smallint(11) unsigned NOT NULL,
  `port_increment` smallint(11) unsigned NOT NULL,
  PRIMARY KEY  (`range_id`),
  UNIQUE KEY `ip_id` (`ip_id`,`home_cfg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Remote servers and IPs';");

$install_queries[5] = array(
	"ALTER TABLE `OGP_DB_PREFIXremote_servers` 
	 DROP COLUMN `ufw_status`;",
	"ALTER TABLE `OGP_DB_PREFIXremote_servers` 
	 ADD `firewall_settings` LONGTEXT NULL;");

$install_queries[6] = array(
        "ALTER TABLE `OGP_DB_PREFIXremote_servers`
	ADD `display_public_ip` varchar(15) NOT NULL;");

$install_queries[7] = array(
        "ALTER TABLE `OGP_DB_PREFIXremote_servers`
        MODIFY `display_public_ip` varchar(255) NOT NULL;");

?>
