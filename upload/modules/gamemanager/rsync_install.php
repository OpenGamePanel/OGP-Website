<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2013 The OGP Development Team
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

function do_progress($kbytes,$rsyncPath)
{
	$mbytes = round($kbytes / 1024, 2);
	
	$sizes = file("modules/gamemanager/sizes.list", FILE_IGNORE_NEW_LINES)or print_failure("Can't open sizes.list");
	
	# Adds a backslash on each slash so it can be used as patern at preg_match
	$rsyncPath = addcslashes($rsyncPath,"/");
	
	# Sets a default file size
	$totalsize = 0;
	
	# loops all available sizes to work over a string instead of an array.
	foreach($sizes as $key => $size)
	{
		# If the rsync path matches the path at the string on the variable $size 
		# then lists the path and the total size on separated variables 
		# using explode over the string saved on $size
		if ( preg_match("/$rsyncPath/i", $size) )
			list( $path, $totalsize ) = explode( ";", $size );
	}
		
	if($kbytes > 0)
	{
		$pct = round(( $kbytes / $totalsize ) * 100, 2);
	}
	else
	{
		$pct = "unavailable";
	}
	#echo "Percent is $pct";
	$pct = $pct > 100 ? 100 : $pct;
	return "$totalsize;$mbytes;$pct"; 
}

function update_local_copies()
{
	$last_updated = filemtime("modules/gamemanager/sizes.list");
	$nowtime=time();
	$diff = $nowtime - $last_updated;
	
	if( $diff < 86400)
	{
		#echo "Now $nowtime last $last_updated diff $diff<br>";
		return 0; 
	}
 	echo "Updating local cache of rsync meta data files<br>";	
	$update_files = array('sizes.list', 'rsync.list', 'rsync_sites.list');
	$update_urls = array('opengamepanel.org', 'gkfsystems.com', 'rsync.gkfsystems.com');
	
	foreach($update_files as $file_chk)
	{
		#echo "Trying to update $file_chk<br>";
		foreach($update_urls as $site)
		{
			#echo "Trying $file_chk from $site<br>";
			if(!is_writable("modules/gamemanager/$file_chk"))
			{
				print_failure("modules/gamemanager/$file_chk is not writable...please make it writable by the webserver");
			}
			if($tmp_content = file_get_contents("http://$site/sync_data/$file_chk"))
			{
				if(!file_put_contents("modules/gamemanager/$file_chk",$tmp_content)){echo "Failed to write<br>";};
				break;
			}

		}
	}
	
	if(is_writable('modules/gamemanager'))
	{
		$tmp = 'modules/gamemanager';
	}
	elseif(is_writable('/tmp'))
	{
		$tmp = 'modules/gamemanager'; 
	}
	else
	{
		return "-1";
	}
}

require_once("includes/lib_remote.php");
require_once("modules/config_games/server_config_parser.php");
function exec_ogp_module() {
//update_local_copies(); #Disabled until the rsync_sites.list file from master servers is corrected.
    global $db,$view,$settings;

	if(isset($_REQUEST['url'])) $url = $_REQUEST['url']; else $url = "";
	
    $home_id = isset($_REQUEST['home_id']) ? $_REQUEST['home_id'] : "";
    $mod_id = isset($_REQUEST['mod_id']) ? $_REQUEST['mod_id'] : "";
	$state = isset($_POST['state']) ? $_POST['state'] : "";
	$update = isset($_GET['update']) ? $_GET['update'] : "";
	
	
	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
	if($isAdmin) 
		$home_info = $db->getGameHome($home_id);
	else
		$home_info = $db->getUserGameHome($_SESSION['user_id'],$home_id);

    if ( $home_info === FALSE || preg_match("/u/",$home_info['access_rights']) != 1 )
    {
        print_failure(get_lang('no_rights'));
        echo create_back_button("gamemanager","game_monitor");
        return;
    }

	$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key']);
	$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$home_info['home_cfg_file']);
	
	if( isset($server_xml->lgsl_query_name) )
	{
		$lgslname = $server_xml->lgsl_query_name;
		if($lgslname == "quake3")
		{
			if($server_xml->game_name == "Quake 3")
				$lgslname = "q3";
		}
	}
	elseif( isset($server_xml->gameq_query_name) )
	{
		$lgslname = $server_xml->gameq_query_name;
		if($lgslname == "minecraft")
		{
			if($server_xml->game_name == "Minecraft Tekkit")
				$lgslname = "tekkit";
			elseif($server_xml->game_name == "Minecraft Bukkit")
				$lgslname = "bukkit";
		}
	}
	elseif( isset($server_xml->protocol) )
		$lgslname = $server_xml->protocol;
	else
		$lgslname = $server_xml->mods->mod['key'];
	
	if( preg_match("/win32/", $server_xml->game_key) OR preg_match("/win64/", $server_xml->game_key) ) 
		$os = "windows";
	elseif( preg_match("/linux/", $server_xml->game_key) )
		$os = "linux";
		
	$full_url = $url."/ogp_game_installer/$lgslname/$os/";
		
    echo "<h2>Update $home_info[home_name]</h2>";
	
	if ( $remote->is_screen_running(OGP_SCREEN_TYPE_HOME,$home_id) == 1 )
    {
        print_failure(get_lang('server_running_cant_update'));
        return;
    }
	$update_active = $remote->get_log(OGP_SCREEN_TYPE_UPDATE,
		// Note exec location should not be added here as the log is in root where rsync is executed.
		$home_id,clean_path($home_info['home_path']),
		$log_txt,30);
	if ($update_active === 0)
	{
		print_failure(get_lang('agent_offline'));
		echo "<meta http-equiv='refresh' content='5'>";
		return;
	}
	// Start update.
	elseif ($state == 'start' && $update_active != 1)
	{
		$mod_cfg_id = $home_info['mod_cfg_id'];
		$game_mod_precmd = $db->resultQuery("SELECT DISTINCT precmd FROM OGP_DB_PREFIXgame_mods WHERE mod_id='$mod_id'");
		if ($game_mod_precmd[0]['precmd'] === NULL OR empty($game_mod_precmd[0]['precmd']))
		{
			$config_mod_precmd = $db->resultQuery("SELECT DISTINCT def_precmd FROM OGP_DB_PREFIXconfig_mods WHERE mod_cfg_id='$mod_cfg_id'");
			if ($config_mod_precmd[0]['def_precmd'] === NULL OR empty($config_mod_precmd[0]['def_precmd']))
				$precmd = "";
			else
				$precmd = $config_mod_precmd[0]['def_precmd'];
		}
		else
			$precmd = $game_mod_precmd[0]['precmd'];
		

		$game_mod_postcmd = $db->resultQuery("SELECT DISTINCT postcmd FROM OGP_DB_PREFIXgame_mods WHERE mod_id='$mod_id'");
		if ($game_mod_postcmd[0]['postcmd'] === NULL OR empty($game_mod_postcmd[0]['postcmd']))
		{
			$config_mod_postcmd = $db->resultQuery("SELECT DISTINCT def_postcmd FROM OGP_DB_PREFIXconfig_mods WHERE mod_cfg_id='$mod_cfg_id'");
			if ($config_mod_postcmd[0]['def_postcmd'] === NULL OR empty($config_mod_postcmd[0]['def_postcmd']))
				$postcmd = "";
			else
				$postcmd = $config_mod_postcmd[0]['def_postcmd'];
		}
		else
			$postcmd = $game_mod_postcmd[0]['postcmd'];
					
		$exec_folder_path = clean_path($home_info['home_path'] . "/" . $server_xml->exe_location );
		$exec_path = clean_path($exec_folder_path . "/" . $server_xml->server_exec_name );
		
		if( isset( $_REQUEST['master_server_home_id'] ) )
		{
			$ms_home_id = $_REQUEST['master_server_home_id'];
			$ms_info = $db->getGameHome($ms_home_id);
			print_success(get_lang_f("starting_copy_with_master_server_named",$ms_info['home_name']));
			$rsync = $remote->masterServerUpdate( $home_id,$home_info['home_path'],$ms_home_id,$ms_info['home_path'],$exec_folder_path,$exec_path,$precmd,$postcmd );
			$master = "&amp;master=true";
		}
		else
		{
			print_success(get_lang_f("starting_sync_with", $full_url));
			$rsync = $remote->start_rsync_install($home_id,$home_info['home_path'],"$full_url",$exec_folder_path,$exec_path,$precmd,$postcmd);
			$master = "";
		}
		if( $rsync === 0 )
		{
			print_failure(get_lang('failed_to_start_rsync_update'));
			return;
		}
		else if ( $rsync === 1 )
		{
			print_success(get_lang('update_started'));
			echo "<p><a href=\"?m=gamemanager&amp;p=rsync_install&amp;update=refresh&amp;home_id=$home_id&amp;mod_id=$mod_id$master\">";
			echo get_lang('refresh_rsync_status')."</a></p>";
			$view->refresh("?m=gamemanager&amp;p=rsync_install&amp;update=refresh&amp;home_id=$home_id&amp;mod_id=$mod_id$master",5);
			return;
		}
		elseif( $rsync === 0 )
		{
			print_failure(get_lang('agent_offline'));
			return;
		}
	}
	elseif($update_active == 1)
	{
		echo "<p class='note'></p>\n";
		if ( isset( $_POST['stop_update_x'] ) )
		{
			$stop_update = sprintf( "screen -S OGP_UPDATE_%09d -X quit", $home_id );
			$remote->exec("$stop_update");
		}
        $update_complete = false;
		echo "<form method=POST><input type='image' name='stop_update' onsubmit='submit-form();' src='modules/administration/images/remove.gif'>".get_lang('stop_update')."</input></form>";
		if (empty($log_txt))
			$log_txt = get_lang('not_available');
		if(!isset($_GET['master']))
		{
			$kbytes = $remote->rsync_progress($home_info['home_path']);
			list($totalsize,$mbytes,$pct) = explode(";",do_progress($kbytes,$lgslname."/".$os));
			$totalmbytes = round($totalsize / 1024, 2);
			echo '<div class="dragbox bloc rounded" style="background-color:#dce9f2;" >
					<h4>'.get_lang('update_in_progress')." ${mbytes}MB/${totalmbytes}MB</h4>
				  <div style='background-color:#dce9f2;' >
				  ";
			$bar = '';
			for( $i = 1; $i <= $pct; $i++ )
			{
				$bar .= '<img style="width:0.92%;vertical-align:middle;" src="images/progressBar.png">';
			}
			echo "$bar <b style='vertical-align:top;display:inline;font-size:1.2em;color:red;' >$pct%</b>
					</div>
				  </div><br>";
		}
		else
		{
			echo '<h4>'.get_lang('update_in_progress').'</h4>';
		}
		
		echo "<pre>".$log_txt."</pre>\n";
		echo "<p><a href=\"?m=gamemanager&amp;p=rsync_install&amp;update=refresh&amp;home_id=$home_id&amp;mod_id=$mod_id\">";
		echo get_lang('refresh_rsync_status')."</a></p>";
		$view->refresh("?m=gamemanager&amp;p=rsync_install&amp;update=refresh&amp;home_id=$home_id&amp;mod_id=$mod_id",5);
		return;
		
	}
	elseif($update != "update")
	{
		echo "<meta http-equiv='refresh' content='60'>";
		print_success(get_lang('update_completed'));
		echo "<table class='center'><tr><td><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id=".$home_info['home_id']."'><< ".get_lang('back')."</a></td></tr></table>";
		echo "<pre>".$log_txt."</pre>\n";
		echo "<table class='center'><tr><td><a href='?m=gamemanager&amp;p=game_monitor&amp;home_id=".$home_info['home_id']."'><< ".get_lang('back')."</a></td></tr></table>";
		$update_complete = true;
	}
	else
	{		
		$rsync_remote_sites = file("modules/gamemanager/rsync_sites.list"); #load offical rsync sites
		$rsync_local_sites = file("modules/gamemanager/rsync_sites_local.list"); #load user custom sites
		$settings['rsync_available'] = isset($settings['rsync_available']) ? $settings['rsync_available'] : "1";
		if(is_array($rsync_local_sites) and $settings['rsync_available'] == "1")
		{
			$rsync_sites = array_merge($rsync_remote_sites, $rsync_local_sites); #merge arrays
		}
		elseif( $settings['rsync_available'] == "2" )
		{
			$rsync_sites = $rsync_remote_sites;
		}
		elseif( $settings['rsync_available'] == "3" )
		{
			$rsync_sites = $rsync_local_sites;
		}
		#echo "LGSL or GameQ query name is $server_xml->lgsl_query_name$server_xml->gameq_query_name";
		$sync_list = @file("modules/gamemanager/rsync.list", FILE_IGNORE_NEW_LINES);

		if(!is_array($sync_list))
		{
			if(!is_file("modules/gamemanager/rsync.list"))
			{
				print_failure("Trouble accessing http://www.opengamepanel.org/rsync.list");
				print_failure("Make sure allow_fopen_url is set to \"On\" in your php.ini and opengamepanel.org is online");
				print_failure("In the mean time, you can get a local copy of the file by running wget http://www.opengamepanel.org/sync_data/rsync.list -O /path/to/ogpweb/modules/gamemanager/rsync.list");
				return;
			}
			# print_failure("Error loading rsync.list");
			# return;
			$sync_list = @file("modules/gamemanager/rsync.list", FILE_IGNORE_NEW_LINES); 
			if(!is_array($sync_list))
			{ 
				print_failure("Failed to open local copy of rsync.list in modules/gamemanager/rsync.list");
				return;
			}
		}
		$master_server_home_id = $db->getMasterServer( $home_info['remote_server_id'], $home_info['home_cfg_id'] );
		if ( in_array($lgslname, $sync_list) ) 
		{
			echo "Game type supported<br>
				 <p class='center'>To add your own rsync site, create modules/gamemanager/rsync_sites_local.list and put a server name on each line.</p><br>
				 <form action='?m=gamemanager&amp;p=rsync_install' method='post'>
				 <table class='center'>
				 <input type='hidden' name='home_id' value='$home_id' />
				 <input type='hidden' name='mod_id' value='$mod_id' />
				 <input type='hidden' name='lgslname' value='$lgslname' />
				 <input type='hidden' name='state' value='start' />
				 <tr><td align='right'>Game name:</td><td align='left'>$home_info[game_name]</td></tr>
				 <tr><td align='right'>Directory:</td><td align='left'>$home_info[home_path]</td></tr>
				 <tr><td align='right'>Remoteserver:</td>
				 <td align='left'>$home_info[remote_server_name] ($home_info[agent_ip]:$home_info[agent_port])</td></tr>
				 <tr><td align='right'>Rsync Server:</td>
				 <td align='left'>".create_drop_box_from_array_rsync($rsync_sites,"url")."<br>";
			if( $master_server_home_id != FALSE AND $master_server_home_id != $home_id )
			{
				echo "<input type='checkbox' name='master_server_home_id' value='$master_server_home_id' /><b>".get_lang('update_from_local_master_server')."</b>";
			}
			echo "</td></tr></table><p><input type='submit' name='update' value='update' /></p>
				 </form>";
		}
		elseif($master_server_home_id != FALSE AND $master_server_home_id != $home_id)
		{
			$ms_home_info = $db->getGameHome($master_server_home_id);
			echo "<br>
				 <p class='success'>Master server update available</p><br>
				 <form action='?m=gamemanager&amp;p=rsync_install' method='post'>
				 <table class='center'>
				 <input type='hidden' name='home_id' value='$home_id' />
				 <input type='hidden' name='mod_id' value='$mod_id' />
				 <input type='hidden' name='lgslname' value='$lgslname' />
				 <input type='hidden' name='state' value='start' />
				 <tr><td align='right'>Game name:</td><td align='left'>$home_info[game_name]</td></tr>
				 <tr><td align='right'>Master Server Name:</td><td align='left'>$ms_home_info[home_name]</td></tr>
				 <tr><td align='right'>Master Server Directory:</td><td align='left'>$ms_home_info[home_path]</td></tr>
				 <tr><td align='right'>Local Directory:</td><td align='left'>$home_info[home_path]</td></tr>".
				 "<input type='hidden' name='master_server_home_id' value='$master_server_home_id' />".
				 "</td></tr></table><p><input type='submit' name='update' value='".
				 get_lang('update_from_local_master_server')."' /></p>
				 </form>";
		}
		else 
		{ 
			print_failure("This game type [ $lgslname ] is not yet supported with rsync install");
		}
    }
}
?>
