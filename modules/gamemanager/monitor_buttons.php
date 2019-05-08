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
		"<a class='monitorbutton' href='?m=gamemanager&amp;p=log&amp;home_id-mod_id-ip-port=".$server_home['home_id']."-".$server_home['mod_id']."-".$server_home['ip']."-".$server_home['port']."'>
			<img src='" . check_theme_image("images/log.png") . "' title='". get_lang("view_log") ."'>
			<span>". get_lang("view_log") ."</span>
		</a>",
		"<a class='monitorbutton size' data-home_id='".$server_home['home_id']."'>
			<img src='" . check_theme_image("images/file_size.png") . "' title='". get_lang("get_size") ."'>
			<span>". get_lang("get_size") ."</span>
		</a>"
);


if (preg_match("/u/",$server_home['access_rights']))
{
	$hasSteamAutoUpdate = false;
	$master_server_home_id = $db->getMasterServer( $server_home['remote_server_id'], $server_home['home_cfg_id'] );
	if ( $master_server_home_id != FALSE )
	{
		if ( !$db->getGameHomeWithoutMods($master_server_home_id) )
		{
			$db->setMasterServer("remove", $master_server_home_id, $server_home['home_cfg_id'], $server_home['remote_server_id']);
			$master_server_home_id = FALSE;
		}
	}
	// In case game is compatible with steam we offer a way to use steam with the updates.
	if( $server_xml->installer == "steamcmd" )
	{						
		if( $master_server_home_id != FALSE AND $master_server_home_id != $server_home['home_id']  )
		{
			$module_buttons[] = "<a class='monitorbutton' href='?m=gamemanager&amp;p=update&amp;home_id=".$server_home['home_id']."&amp;mod_id=".$server_home['mod_id']."&amp;master_server_home_id=".$master_server_home_id."&amp;update=update'>
				<img src='" . check_theme_image("images/master.png") . "' title='". get_lang("update_from_local_master_server") ."'>
				<span>". get_lang("update_from_local_master_server") ."</span>
			</a>";
		}

		$module_buttons[] = "<a class='monitorbutton' href='?m=gamemanager&amp;p=update&amp;home_id=".$server_home['home_id']."&amp;mod_id=".$server_home['mod_id']."&amp;update=update'>
			<img src='" . check_theme_image("images/steam.png") ."' title='". get_lang("install_update_steam") ."'>
			<span>". get_lang("install_update_steam") ."</span>
		</a>";
		
		$hasSteamAutoUpdate = true;
	}
	// In other cases manual update is provided.
	else
	{
		$module_buttons[] = "<a class='monitorbutton' href='?m=gamemanager&amp;p=update_manual&amp;home_id=".$server_home['home_id']."&amp;mod_id=".$server_home['mod_id']."&amp;update=update'>
			<img src='" . check_theme_image("images/install.png") . "' title='". get_lang("install_update_manual") ."'>
			<span>". get_lang("install_update_manual") ."</span>
		</a>";
		
		$sync_name = get_sync_name($server_xml);
		$sync_list = @file("modules/gamemanager/rsync.list", FILE_IGNORE_NEW_LINES);
		if ( in_array($sync_name, $sync_list) OR ($master_server_home_id != FALSE and $master_server_home_id != $server_home['home_id']) )
		{
			$module_buttons[] = "<a class='monitorbutton' href='?m=gamemanager&amp;p=rsync_install&amp;home_id=".$server_home['home_id']."&amp;mod_id=".$server_home['mod_id']."&amp;update=update'>
				<img src='" . check_theme_image("images/rsync.png") . "' title='". rsync_install ."'>
				<span>". get_lang("rsync_install") ."</span>
			</a>";
		}
	}
	
	$module_buttons[] = "<a class='monitorbutton getAPILinks' hassteam='" . ($hasSteamAutoUpdate ? 'true' : 'false') . "' hasrcon='" . ($server_xml->control_protocol || ($server_xml->lgsl_query_name and $server_xml->lgsl_query_name == "7dtd") || ($server_xml->gameq_query_name and $server_xml->gameq_query_name == "minecraft") ? 'true' : 'false') . "' copyfail='" . get_lang("auto_update_copy_me_fail") . "' copysuccess='" . get_lang("auto_update_copy_me_success") . "' autoupdatetext='" . get_lang("auto_update_title_popup") . "' copyme='" . get_lang("auto_update_copy_me") . "' token='".$db->getApiToken($_SESSION['user_id'])."' ip='".$server_home['ip']."' port='".$server_home['port']."' modkey='".$server_home['mod_key']."' panelurl='" . getOGPSiteURL() . "'>
		<img src='" . check_theme_image("images/auto_update.png") . "' title='". get_lang("show_api_actions") . "'>
		<span>". get_lang("show_api_actions") . "</span>
		</a>";
}


if($_SESSION['users_role'] == "admin")
{
	if ( ( $server_xml->control_protocol and preg_match("/^(rcon|lcon|rcon2|armabe)$/" ,$server_xml->control_protocol) ) OR 
		 ( $server_xml->gameq_query_name and $server_xml->gameq_query_name == 'minecraft' ) )
	{
		$module_buttons[] = "<a class='monitorbutton' href='home.php?m=gamemanager&amp;p=rcon_presets&amp;home_id=".$server_home['home_id']."&amp;mod_id=".$server_home['mod_id']."'>
			<img src='" . check_theme_image("images/rcon_preset.png") . "' title='".get_lang("rcon_presets")."'>
			<span>".get_lang("rcon_presets")."</span>
		</a>";
	}
}
?>
