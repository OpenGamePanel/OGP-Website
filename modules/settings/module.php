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
$module_title = "Settings";
$module_version = "1.1";
$db_version = 1;
$module_required = TRUE;
$module_menus = array(
    array( 'subpage' => '', 'name'=>'Panel Settings', 'group'=>'admin' ),
	array( 'subpage' => 'themes', 'name'=>'Theme Settings', 'group'=>'admin' )
);

$install_queries = array();
$install_queries[0] = array(
    "DROP TABLE IF EXISTS ".OGP_DB_PREFIX."settings;",
    "CREATE TABLE ".OGP_DB_PREFIX."settings (
        `setting` varchar(63) NOT NULL,
        `value` varchar(255) NOT NULL,
        PRIMARY KEY  (`setting`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

$install_queries[1] = array(
    "ALTER TABLE `".OGP_DB_PREFIX."settings` CHANGE `value` `value` VARCHAR( 1024 ) NOT NULL;");
?>
