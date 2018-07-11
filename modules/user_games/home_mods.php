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

require_once("includes/lib_remote.php");
require_once("modules/config_games/server_config_parser.php");
function exec_ogp_module()
{
	global $db;
	$home_id = $_GET['home_id'];
	echo "<h3>". get_lang("mods") ."</h3>";
	echo "<p class='info'>". get_lang("extra_cmd_line_info") ."</p>\n";
	$enabled_mods = $db->getHomeMods($home_id);
	$home_info = $db->getGameHomeWithoutMods($home_id);
	$server_xml = read_server_config(SERVER_CONFIG_LOCATION.$home_info['home_cfg_file']);
	$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key'], $home_info['timeout']);
	if( empty($enabled_mods) )
	{	
		$cpu_count = $remote->cpu_count();
		if($cpu_count === -1)
		{
			print_failure( get_lang("warning_agent_offline_defaulting_CPU_count_to_1") );
			$cpu_count = 'NA';
		}
		else
		{
			// cpu numbering starts from 0 so lets remove the last cpu.
			$cpu_count -= 1;
		}
		
		$game_mods = $db->getAvailableModsForGameHome($home_id);
		foreach ( $game_mods as $game_mod )
		{
			if( preg_match("/^none$/i", $game_mod['mod_name']) )
			{
				$mod_cfg_id = $game_mod['mod_cfg_id'];
				break;
			}
		}
		
		if( isset($mod_cfg_id) )
		{
			if ( $db->addModToGameHome($home_id,$mod_cfg_id) === FALSE )
			{
				print_failure(get_lang_f('failed_to_assing_mod_to_home',$mod_cfg_id));
			}
			else
			{
				$maxplayers = $server_xml->max_user_amount ? $server_xml->max_user_amount : 0;
				if( $db->updateGameModParams($maxplayers,'','NA','0',$home_id,$mod_cfg_id) === FALSE )
				{
					print_failure(get_lang_f('failed_to_assing_mod_to_home',$mod_cfg_id));
				}
				else
					$enabled_mods = $db->getHomeMods($home_id);
			}
		}
		else
		{
			print_failure( get_lang("note") .":". get_lang("note_no_mods") );
			echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>\n";
			echo "<input type='hidden' name='home_id' value=\"$home_id\" />\n";
			echo "<p>". get_lang("available_mods") .": <select name='mod_cfg_id'>\n";
			foreach ( $game_mods as $game_mod )
			{
				echo "<option value='".$game_mod['mod_cfg_id']."'>".$game_mod['mod_name']."</option>\n";
			}
			echo "</select>\n";
			echo "<input type='submit' name='add_mod' value='". get_lang("add_mod") ."' /></p>";
			echo "</form>";
		}
	}
	
	if( !empty($enabled_mods) )
	{
		$cpu_count = $remote->cpu_count();
		
		if($cpu_count === -1)
		{
			print_failure( get_lang("warning_agent_offline_defaulting_CPU_count_to_1") );
			$cpu_count = 'NA';
		} else {
			// cpu numbering starts from 0 so lets remove the last cpu.
			--$cpu_count;
		}

		echo "<table class='center'>\n".
			 "<tr>".
			 "<td></td>".
			 "<td><b>". get_lang("mod_name") ."</b></td>";
		if ( $server_xml->max_user_amount )
			echo "<td><b>". get_lang("max_players") ."</b></td>";
		echo "<td><b>". get_lang("extra_cmd_line_args") ."</b></td>".
			 "<td><b>". get_lang("nice_level") ."</b></td><td></td>".
			 "</tr>\n";
		foreach ( $enabled_mods as $enabled_rows ) {
			echo "<tr id='mod_cfg_id_$enabled_rows[mod_cfg_id]'>".
				 "<td><a href='?m=user_games&amp;p=edit&amp;mod_id=".$enabled_rows['mod_id'].
				 "&amp;home_id=$home_id&amp;submit=delete_mod'>[ ". get_lang("remove_mod") ." ]</a><br>".
				 "<a href='?m=user_games&p=install_cmds&home_id=$home_id&mod_id=".$enabled_rows['mod_id'].
				 "'>". get_lang("mod_install_cmds") ."</a></td>\n".
				 "<td>".$enabled_rows['mod_name']."</td>\n".
				 "<td>\n";
			if ( $server_xml->max_user_amount )
			{
				echo create_drop_box_from_array(range(0,$server_xml->max_user_amount),
					'maxplayers',$enabled_rows['max_players'],true).
					"</td><td>";
			}
			echo "<input id='cliopts' type='text' name='cliopts' size='20' value=\"".
				 str_replace('"', "&quot;", strip_real_escape_string($enabled_rows['extra_params']))."\" />".
				 "</td><td>\n";

				 echo create_drop_box_from_array(array_merge(range(-19,19)),
				 'nice',$enabled_rows['nice']).
				 "</td><td>\n".
				 "<button class='set_options' id='$enabled_rows[mod_cfg_id]' >". get_lang("set_options") ."</button>\n".
				 "</td></tr>\n";

		}
			
		echo '</table>';
		
		$game_mods = $db->getAvailableModsForGameHome($home_id);
		$mods_available = 0;
		foreach ( $game_mods as $game_mod )
		{
			if( !preg_match("/^none$/i", $game_mod['mod_name']) )
			{
				$mods_available++;
				break;
			}
		}
		if($mods_available > 0)
		{
			echo "<form action='?m=user_games&p=edit&home_id=".$home_id."' method='post'>\n".
				 "<input type='hidden' name='home_id' value=\"$home_id\" />\n".
				 "<p>". available_mods .": <select name='mod_cfg_id'>\n";
			foreach ( $game_mods as $game_mod )
			{
				echo "<option value='".$game_mod['mod_cfg_id']."'>".$game_mod['mod_name']."</option>\n";
			}
			echo "</select>\n".
				 "<input type='submit' name='add_mod' value='". get_lang("add_mod") ."' /></p>".
				 "</form>";
		}

		echo '<h3>'.get_lang('cpu_affinity').'</h3>';
		echo "<p class='info'>". get_lang("cpu_affinity_info") ."</p>\n";
		echo '<div id="cpu_select" class="cpu_select_div inline-block">';
		
		// Get the selected cores.
		$enabledCores = $db->getHomeAffinity($home_id);
		$cores = array();
		
		if ($enabledCores !== 'NA')
		{
			
			if (preg_match('/win/', $remote->what_os()))
			{
				$coreHex = hexdec($enabledCores);
				$cores = array();
				$core = 0;

				while ($coreHex > 0)
				{
					if ($coreHex & 1 === 1)
					{
						$cores[] = $core;
					}
					
					$core++;
					$coreHex >>= 1;
				}
			} else {
				$cores = explode(',', $enabledCores);
			}
			
		}
		
		for($x = 0; $x <= $cpu_count; ++$x)
		{
			echo '<span><label for="cpu_'.$x.'">CPU '.$x.'</label> <input type="checkbox" name="cpus[]" value="'.$x.'" id="cpu_'.$x.'" class="cpus" '. ( in_array($x, $cores) ? 'checked' : '' ) .'/></span>';
		}
		
		echo '<button class="set_options set_affinity_button" id="'.$enabled_rows['mod_cfg_id'].'" style="margin-left:10px;">'.get_lang('set_affinity').'</button></div>';
	}
	?>
	<script type="text/javascript" src="js/modules/user_games-mods.js"></script>
	<?php
}
?>
