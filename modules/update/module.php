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
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
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
?>
