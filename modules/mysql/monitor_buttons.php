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
 

$mysql_dbs = $db->resultQuery("SELECT db_id FROM OGP_DB_PREFIXmysql_databases WHERE enabled=1 AND home_id=".$server_home['home_id']);
if(!empty($mysql_dbs))
{
	$module_buttons = array(
		"<a class='monitorbutton' href='?m=mysql&p=user_db&home_id=".$server_home['home_id']."'>
			<img src='" . check_theme_image("modules/administration/images/mysql_admin.png") . "' title='". get_lang("mysql_databases") ."'>
			<span>". get_lang("mysql_databases") ."</span>
		</a>"
	);
}
else
	$module_buttons = array();
?>