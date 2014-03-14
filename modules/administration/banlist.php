<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) Copyright (C) 2008 - 2013 The OGP Development Team
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
	global $db;
	if(isset($_POST['unban']))
	{
		unset($_POST['unban']);
		foreach($_POST as $name => $ip)
		{
			$db->query("UPDATE `OGP_DB_PREFIXban_list` SET logging_attempts='0', banned_until='0' WHERE client_ip = '$ip';");
		}
	}
	$ban_list = $db->resultQuery("SELECT logging_attempts, banned_until, client_ip FROM `OGP_DB_PREFIXban_list`;");
	$ban_qty = 0;
	$ban_table = '';
	foreach($ban_list as $ban)
	{
		if($ban['logging_attempts'] >= 3)
		{
			$ban_table .= "<tr><td><input type=checkbox name='".$ban_qty."' value='".$ban['client_ip']."' /></td><td>".$ban['client_ip']."</td><td>".date("r",$ban['banned_until'])."</td></tr>\n";
			$ban_qty++;
		}
		else
		{
			continue;
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
		?>
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript">
		$('span#check').css({'cursor':'pointer','color':'blue'});
		$('span#check').click(function(){
			$('input[type=checkbox]').each(function( ){
				if( this.checked )
				{
					$(this).attr('checked', false);
				}
				else
				{
					$(this).attr('checked', true);
				}
			});
		});
		</script>
		<?php
	}
	echo create_back_button($_GET['m'],"main");
}
?>