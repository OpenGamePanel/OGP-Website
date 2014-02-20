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

require_once("modules/config_games/server_config_parser.php");

function exec_ogp_module()
{
	$home_id = $_GET['home_id'];
	$mod_id = $_GET['mod_id'];
	global $db;
	$home_info = $db->getGameHome($home_id);

	if ( array_key_exists($mod_id, $home_info['mods']) ) 
	{
		echo "<h2>".get_lang('cmds_for')." \"".$home_info['home_name']."\" [Mod:".$home_info['mods'][$mod_id]['mod_name']."]</h2>";
		include('includes/lib_remote.php');
		$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key']);
	
		$mod_cfg_id = $home_info['mod_cfg_id'];
		
		if(isset($_POST['edit_preinstall_cmds']))
		{
			$precmd = addslashes( $_POST['edit_preinstall_cmds'] );
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
			unset($precmd);
		}

		$game_mod_precmd = $db->resultQuery("SELECT DISTINCT precmd FROM OGP_DB_PREFIXgame_mods WHERE mod_id='$mod_id'");
		if ($game_mod_precmd[0]['precmd'] === NULL OR empty($game_mod_precmd[0]['precmd']))
		{
			$config_mod_precmd = $db->resultQuery("SELECT DISTINCT def_precmd FROM OGP_DB_PREFIXconfig_mods WHERE mod_cfg_id='$mod_cfg_id'");
			if ($config_mod_precmd[0]['def_precmd'] === NULL OR empty($config_mod_precmd[0]['def_precmd']))
				$precmd = "[".get_lang('empty')."]";
			else
				$precmd = $config_mod_precmd[0]['def_precmd'];
		}
		else
			$precmd = $game_mod_precmd[0]['precmd'];
		
		if(isset($_POST['edit_postinstall_cmds']))
		{
			$postcmd = addslashes( $_POST['edit_postinstall_cmds'] );
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
			unset($postcmd);
		}

		$game_mod_postcmd = $db->resultQuery("SELECT DISTINCT postcmd FROM OGP_DB_PREFIXgame_mods WHERE mod_id='$mod_id'");
		if ($game_mod_postcmd[0]['postcmd'] === NULL OR empty($game_mod_postcmd[0]['postcmd']))
		{
			$config_mod_postcmd = $db->resultQuery("SELECT DISTINCT def_postcmd FROM OGP_DB_PREFIXconfig_mods WHERE mod_cfg_id='$mod_cfg_id'");
			if ($config_mod_postcmd[0]['def_postcmd'] === NULL OR empty($config_mod_postcmd[0]['def_postcmd']))
				$postcmd = "[".get_lang('empty')."]";
			else
				$postcmd = $config_mod_postcmd[0]['def_postcmd'];
		}
		else
			$postcmd = $game_mod_postcmd[0]['postcmd'];
		
		?>
	  <h2><?php
		print_lang('preinstall_cmds');
	?></h2>
	  <table class="center">
		 <tr>
		  <td>
		   <form method="POST">
		   <textarea name="edit_preinstall_cmds" style="width:80%;height:200px;"  ><?php 
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
		   <textarea name="edit_postinstall_cmds" style="width:80%;height:200px;" ><?php
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