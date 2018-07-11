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

//Open Game Panel Sub User Registration Add On By
//  own3mall

function exec_ogp_module()
{
	global $db;
    global $view;
	startSession();

	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) 
		{
		$errmsg = '<table>';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) 
			{
			$errmsg .= "<tr><td><img width='8px' src='images/offline.png'/></td><td style='text-align:left;color:red;'>".$msg.'</td></tr>'; 
			}
		$errmsg .= '</table><br>';
		unset($_SESSION['ERRMSG_ARR']);
		}
	echo "<h2>".get_lang('subuser_man')."</h2>";
	if(isset($errmsg))
	{
		echo $errmsg;
		$input = $_SESSION['INPUT'];
	}
	$lang_switch = ( isset( $_GET['lang'] ) AND $_GET['lang'] != "-" ) ? "&amp;lang=" . $_GET['lang'] : "";
	
	if( !isset($_GET['lang']) )
	{
		$panel_settings = $db->getSettings();
		$lang = $panel_settings['panel_language'];
	}
	else
	{
		$lang = $_GET['lang'];
	}
	?>
	<p><a href="?m=subusers&p=add"><?php echo get_lang('create_sub_user'); ?></a></p>
	<p><a href="?m=subusers&p=del"><?php echo get_lang('listdel_sub_user'); ?></a></p>
	<?php
}
?>
