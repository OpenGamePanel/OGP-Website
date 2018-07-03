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
$module_title = "Addons Manager";
$module_version = "1.2";
$db_version = 2;
$module_required = TRUE;
$module_menus = array( array( 'subpage' => 'addons_manager', 'name'=>'Addons Manager', 'group'=>'admin' ) );

$install_queries = array();
$install_queries[0] = array(
"DROP TABLE IF EXISTS `".OGP_DB_PREFIX."addons`;",
"CREATE TABLE IF NOT EXISTS ".OGP_DB_PREFIX."addons 
 (addon_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(80) NOT NULL,
  url VARCHAR(200) NOT NULL,
  path VARCHAR(80) NOT NULL,
  addon_type VARCHAR(7) NOT NULL,
  home_cfg_id VARCHAR(7) NOT NULL) ENGINE=MyISAM;");

$install_queries[1] = array(
	"ALTER TABLE `".OGP_DB_PREFIX."addons` ADD `post_script` longtext NOT NULL;");
	
$install_queries[2] = array(
	"ALTER TABLE `".OGP_DB_PREFIX."addons` ADD `group_id` int(11) NULL;");
?>
