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
$module_title = "Module manager";
$module_version = "1.1";
$db_version = 2;
$module_required = TRUE;
$module_menus = array(
	array( 'subpage' => '', 'name'=>'Modules', 'group'=>'admin' )
	);
	
## You will need uncomment the next three lines (remove /* from the beginning and */ from the end) 
## of the next array if you are updating from a version previous or equal to 2429:
$install_queries[0] = array();
$install_queries[1] = array();
$install_queries[2] = array("DROP TABLE IF EXISTS ".OGP_DB_PREFIX."module_access_rights",
							"CREATE TABLE IF NOT EXISTS `".OGP_DB_PREFIX."module_access_rights` (".
							"`module_id` int(11) NOT NULL COMMENT 'This references to modules.id',".
							"`flag` char(1) NOT NULL,".
							"`description` varchar(64) NOT NULL,".
							"UNIQUE (`flag`)".
							") ENGINE=MyISAM DEFAULT CHARSET=latin1;");
?>
