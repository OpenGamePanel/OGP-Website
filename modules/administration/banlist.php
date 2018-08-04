<script type="text/javascript" src="js/modules/administration.js"></script>
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
	echo "<h2>".get_lang('ban_list')."</h2>";
	global $db, $settings;
	
	if(isset($_POST['unban']))
	{
		unset($_POST['unban']);
		foreach($_POST as $name => $ip)
		{
			$ip = $db->real_escape_string($ip);
			$db->query("DELETE FROM `OGP_DB_PREFIXban_list` WHERE client_ip = '$ip';");
		}
	}
	$ban_list = $db->resultQuery("SELECT logging_attempts, banned_until, client_ip FROM `OGP_DB_PREFIXban_list`;");
	$ban_qty = 0;
	$ban_table = '';
	if($ban_list)
	{
		foreach($ban_list as $ban)
		{
			if($ban['logging_attempts'] >= $settings["login_attempts_before_banned"])
			{
				$ban_table .= "<tr><td><input type=checkbox name='".$ban_qty."' value='".$ban['client_ip']."' /></td><td>".$ban['client_ip']."</td><td>".date("r",$ban['banned_until'])."</td></tr>\n";
				$ban_qty++;
			}
			else
			{
				continue;
			}
		}
	}
	if($ban_qty == 0)
	{
		print_failure(get_lang('no_banned_ips'));
	}
	else
	{
		echo "<form method=post >\n".
			 "<table><tr><th><span id=check >".get_lang('unban')."</span></th><th>".get_lang('client_ip')."</th><th>".get_lang('banned_until')."</th></tr>\n".$ban_table."</table>\n".
			 "<input type=submit name=unban value='".get_lang('unban_selected_ips')."' /></form>";
	}
	echo create_back_button($_GET['m'],"main");
}
?>
