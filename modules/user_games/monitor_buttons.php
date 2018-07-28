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
 
$module_buttons = array(
		"<a class='monitorbutton' href='?m=user_games&amp;p=edit&amp;home_id=".$server_home['home_id']."'>
			<img src='" . check_theme_image("images/edit.png") . "' title='". get_lang("edit") ."'>
			<span>". get_lang("edit") ."</span>
		</a>"
);

if(preg_match("/c/",$server_home['access_rights'])){
	if( isset($server_xml->custom_fields) ) {
		$module_buttons[] = "<a href=\"?m=user_games&p=custom_fields&home_id=".$server_home['home_id']."\" class=\"monitorbutton\">
						<img src='" . check_theme_image("images/customfields.png") . "' title='". get_lang("custom_fields") ."'>
						<span>". get_lang("custom_fields") ."</span>
					</a>";
	}
}
?>