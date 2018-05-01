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
$module_title = "Administration";
$module_version = "1.1";
$db_version = 1;
$module_required = TRUE;
$module_menus = array( array( 'subpage' => 'watch_logger', 'name'=>'Watch Logger', 'group'=>'admin' ) );
$install_queries = array();
$install_queries[0] = array(
"DROP TABLE IF EXISTS `".OGP_DB_PREFIX."adminExternalLinks`;",
"CREATE TABLE IF NOT EXISTS ".OGP_DB_PREFIX."adminExternalLinks
(
  link_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(80) NOT NULL,
  url VARCHAR(200) NOT NULL,
  user_id VARCHAR(7) NOT NULL
) ENGINE=MyISAM;");

$install_queries[1] = array(
"DROP TABLE IF EXISTS `".OGP_DB_PREFIX."logger`;",
"CREATE TABLE IF NOT EXISTS `".OGP_DB_PREFIX."logger` 
(
  `log_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,  
  `date` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,  
  `ip` varchar(15) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
?>

