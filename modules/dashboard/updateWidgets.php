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

function exec_ogp_module()
{
    global $db;

	if(!$_POST["data"]){  
		echo "Invalid data";  
		exit;  
	}  
	  
	//decode JSON data received from AJAX POST request  
	$data=$_POST["data"];  
	$data = str_replace('\\','',$data);
	$data = json_decode($data);
	  
	foreach($data->items as $item)  
	{  
		//Extract column number for panel  
		$col_id = preg_replace('/[^\d\s]/', '', $item->column);
		//Extract id of the panel  
		$widget_id = preg_replace('/[^\d\s]/', '', $item->id);

		if (is_numeric($col_id) && is_numeric($widget_id)) {
			$db->query("UPDATE ".OGP_DB_PREFIX."widgets_users SET column_id='$col_id', sort_no='".(int)$item->order."', collapsed='".(int)$item->collapsed."' WHERE widget_id='".$widget_id."' AND user_id='".$_SESSION['user_id']."'");
		}
	}

	echo "success";
}
?>