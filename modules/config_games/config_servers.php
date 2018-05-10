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

require_once("server_config_parser.php");

function exec_ogp_module() {

    global $db,$view;
    $game_cfgs = $db->getGameCfgs();
    echo "<h2>".get_lang('game_config_setup')."</h2>\n
          <p>".get_lang_f("modify_configs_info",SERVER_CONFIG_LOCATION)."</p>\n
		  <form action='?m=config_games' method='post'>\n
          <p><input id='reset_old_configs' type='checkbox' name='clear_old' value='yes' /><label for='reset_old_configs'>".get_lang('reset_old_configs')."</label></p>\n
          <p class='note'>".get_lang('note').": ".get_lang('config_reset_warning')."</p>\n
		  <p><input type='submit' name='reconfig' value='".get_lang('update_configs')."' /></p>\n
          </form>\n";

    if ( isset($_REQUEST['reconfig']) )
    {
		// Remove any old config files that may have been renamed or removed by developers
		// Function is defined in helpers.php (add entries to array there)
		removeOldGameConfigs();
		
        $files = glob(SERVER_CONFIG_LOCATION."*.xml");

        if ( empty($files) )
        {
            print_failure(get_lang_f("no_configs_found",SERVER_CONFIG_LOCATION));
            return;
        }

        /// \todo remove the clear_old hack when the update on duplicate is completed to database.
        $clear_old = FALSE;

        if ( isset( $_REQUEST['clear_old']) && $_REQUEST['clear_old'] === 'yes' )
        {
            echo "<p class='info'>".get_lang('resetting_configs').":</p>";
            $clear_old = TRUE;
        }
        else
        {
            echo "<p class='info'>".get_lang('updating_configs').":</p>";
        }
        
        $oldStructure = $db->getCurrentHomeConfigMods();

        $db->clearGameCfgs($clear_old);

        foreach ( $files as $config_file )
        {
            $config = read_server_config($config_file);
            
            if ( empty($config) )
            {
                print_failure(get_lang_f("error_when_handling_file",$config_file));
                continue;
            }
            echo "<p class='info'>".get_lang_f("updating_config_from_file",$config_file)."</p>";
            if ( !$db->addGameCfg($config) )
            {
                print_failure(get_lang_f("error_while_adding_cfg_to_db",$config_file));
                continue;
            }
        }
        
        // Update and remove invalid old game mod ids
        if($clear_old){
			$db->updateOGPGameModsWithNewIDs($oldStructure);
		}

        print_success(get_lang('configs_updated_ok'));
    }
	
	$game_cfgs = $db->getGameCfgs();
	echo "<table class='center'>\n
		  <form action='' method='GET'>\n
		  <input type='hidden' name='m' value='config_games'/>
		  <tr>\n
		  <td class='left'>\n
		  <select name='home_cfg_id' onchange=".'"this.form.submit()"'.">\n
		  <option style='background:black;color:white;' value=''>".get_lang('select_game')."</option>\n";	  
	foreach ( $game_cfgs as $row )
	{
		if ( preg_match( "/_win/", $row['game_key'] ) )
			$os = "(Windows)";
		if (preg_match( "/_linux/", $row['game_key'] ) )
			$os = "(Linux)";
		if (preg_match( "/64/", $row['game_key'] ) )
			$arch = "(64bit)";
		else
			$arch = "";
		if ( isset($_GET['home_cfg_id']) AND $row['home_cfg_id'] == $_GET['home_cfg_id'])
			$selected = "selected='selected'";
		else
			$selected = "";

		echo "<option value='".$row['home_cfg_id']."' $selected >".$row['game_name']." $os $arch</option>\n";
		unset ($os,$arch);
	}
	echo "</select>\n
		  </td>\n
		  </tr>\n
		  </form>\n
		  </table>\n";
	
	if ( isset($_GET['home_cfg_id']) )
    {
		$home_cfg_id = trim($_GET['home_cfg_id']);
		
		$cfg_info = $db->getGameCfg($home_cfg_id);
		
		if($cfg_info !== FALSE)
		{
			$config_file = SERVER_CONFIG_LOCATION.$cfg_info['home_cfg_file'];
			
			if ( preg_match( "/_win/", $cfg_info['game_key'] ) )
					$os = "(Windows)";
			if (preg_match( "/_linux/", $cfg_info['game_key'] ) )
				$os = "(Linux)";
			if (preg_match( "/64/", $cfg_info['game_key'] ) )
				$arch = "(64bit)";
			else
				$arch = "";
			
			if( isset($_GET['delete']) )
			{				
				if( $db->delGameCfgAndMods($home_cfg_id) === FALSE )
				{
					print_failure(get_lang_f('failed_to_delete_config_from_db',$cfg_info['game_name']));
					$view->refresh('?m=config_games&home_cfg_id='.$home_cfg_id,3);
				}
				elseif( unlink($config_file) === FALSE )
				{
					print_failure(get_lang_f('failed_removing_file',$config_file));
					$view->refresh('?m=config_games&home_cfg_id='.$home_cfg_id,3);
				}
				else
				{
					print_success(get_lang_f('removed_game_cfg_from_disk_and_datbase',$cfg_info['game_name']." $os $arch"));
					$view->refresh('?m=config_games',3);
				}
			}
			else
			{
				echo "<a href='?m=config_games&home_cfg_id=".$home_cfg_id."&delete'>".get_lang_f('delete_game_config_for',$cfg_info['game_name']." $os $arch")."</a><br>";
				
				$configs = read_server_config($config_file);
				echo "<table>\n";
				foreach( $configs as $key => $value )
				{
					echo "<tr><td><b>$key<b></td><td colspan=25 >$value</td></tr>\n";
					foreach($value as $subkey => $subvalue )
					{
						echo "<tr><td><b>$subkey<b></td><td>$subvalue</td>\n";
						
						list($attributes,$attrvalue)=each($subvalue);

						foreach($attrvalue as $attrkey => $attrval)
						{
							echo "<td><b>$attrkey<b></td><td>$attrval</td>\n";
						}

						echo "</td>";
						foreach($subvalue as $option => $options )
						{
								echo "<td><b>$option<b></td><td>$options</td>\n";
						}
					}
					echo "</tr>\n";
				}
				echo "</table>\n";
			}
		}
	}
	if(isset($_GET['xml_config_creator']))
	{
		echo "<iframe style='width:100%;height:600px;' frameBorder='0' src='home.php?m=config_games&p=xml_config_creator&type=cleared' ></iframe>";
	}
	else
	{
		echo "<br><form action='' method='GET'><input type='hidden' name='m' value='config_games' /><input type='submit' name='xml_config_creator' value='".get_lang('create_xml_configs')."'/></form>";
	}
}
?>
