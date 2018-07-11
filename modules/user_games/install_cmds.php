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

require_once("modules/config_games/server_config_parser.php");

function exec_ogp_module()
{
	$home_id = $_GET['home_id'];
	$mod_id = $_GET['mod_id'];
	global $db;
	$home_info = $db->getGameHome($home_id);

	if ( array_key_exists($mod_id, $home_info['mods']) ) 
	{
		echo "<h2>".get_lang('cmds_for')." \"".htmlentities($home_info['home_name'])."\" [Mod:".$home_info['mods'][$mod_id]['mod_name']."]</h2>";
		$server_xml = read_server_config(SERVER_CONFIG_LOCATION.$home_info['home_cfg_file']);
		$mod_cfg_id = $home_info['mods'][$mod_id]['mod_cfg_id'];

		if(isset($_POST['edit_preinstall_cmds']))
		{
			$precmd = $db->real_escape_string($_POST['edit_preinstall_cmds']);
			if( isset( $_POST['save_as_default'] ) )
			{
				$game_mod_query = "UPDATE OGP_DB_PREFIXconfig_mods SET def_precmd='$precmd' WHERE mod_cfg_id='$mod_cfg_id'";
				$db->query($game_mod_query);
			}
			else
			{
				$game_mod_query = "UPDATE OGP_DB_PREFIXgame_mods SET precmd='$precmd' WHERE mod_id='$mod_id'";
				$db->query($game_mod_query);
			}
			$home_info = $db->getGameHome($home_id);
		}

		if(isset($_POST['edit_postinstall_cmds']))
		{
			$postcmd = $db->real_escape_string($_POST['edit_postinstall_cmds']);
			if( isset( $_POST['save_as_default'] ) )
			{
				$game_mod_query = "UPDATE OGP_DB_PREFIXconfig_mods SET def_postcmd='$postcmd' WHERE mod_cfg_id='$mod_cfg_id'";
				$db->query($game_mod_query);
			}
			else
			{
				$game_mod_query = "UPDATE OGP_DB_PREFIXgame_mods SET postcmd='$postcmd' WHERE mod_id='$mod_id'";
				$db->query($game_mod_query);
			}
			$home_info = $db->getGameHome($home_id);
		}
		
		$precmd = $home_info['mods'][$mod_id]['precmd'] == "" ? 
			( $home_info['mods'][$mod_id]['def_precmd'] == "" ? $server_xml->pre_install : 
			  $home_info['mods'][$mod_id]['def_precmd'] ) : $home_info['mods'][$mod_id]['precmd'];
		
		$postcmd = $home_info['mods'][$mod_id]['postcmd'] == "" ?
			(  $home_info['mods'][$mod_id]['def_postcmd'] == "" ? $server_xml->post_install : 
				$home_info['mods'][$mod_id]['def_precmd'] ) : $home_info['mods'][$mod_id]['postcmd'];
		?>
	  <h2><?php
		print_lang('preinstall_cmds');
	?></h2>
	  <table class="center">
		 <tr>
		  <td>
		   <form method="POST">
		   <textarea name="edit_preinstall_cmds" placeholder="<?php echo "[".get_lang('empty')."]"; ?>" style="width:80%;height:200px;"  ><?php 
		   echo $precmd; 
		 ?></textarea>
		  </td>
		 </tr>
		 <tr>
		  <td>
		   <button><?php
			print_lang('edit_preinstall_cmds');
		  ?></button>
			<input type="checkbox" name="save_as_default" value="true"/><?php print_lang('save_as_default_for_this_mod');?>
		   </form>
		  </td>
		 </tr>
		</table>
		<h2><?php
		print_lang('postinstall_cmds');
	  ?></h2>
		<table class="center">
		 <tr>
		  <td>
		   <form method="POST">
		   <textarea name="edit_postinstall_cmds" placeholder="<?php echo "[".get_lang('empty')."]"; ?>" style="width:80%;height:200px;" ><?php
		   echo $postcmd;
		 ?></textarea>
		  </td>
		 </tr>
		 <tr>
		  <td>
		   <button><?php
			print_lang('edit_postinstall_cmds');
		  ?></button>
			<input type="checkbox" name="save_as_default" value="true"/><?php print_lang('save_as_default_for_this_mod');?>
		   </form>
		  </td>
		 </tr>
		</table><?php
	}
	echo create_back_button('user_games','edit&amp;home_id='.$home_id);
}
?>