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

function do_progress($kbytes,$totalsize)
{
	$mbytes = round($kbytes / 1024, 2);
					
	if($kbytes > 0)
	{
		$pct = round(( $kbytes / $totalsize ) * 100, 2);
	}
	else
	{
		$pct = "-";
	}
	#echo "Percent is $pct";
	return "$totalsize;$mbytes;$pct"; 
}

require_once("includes/lib_remote.php");
require_once("modules/config_games/server_config_parser.php");
require_once("protocol/lgsl/lgsl_protocol.php");

function exec_ogp_module() {

    global $db,$view;
	$home_id = $_REQUEST['home_id'];
	$mod_id = $_REQUEST['mod_id'];
	$ip = $_REQUEST['ip'];
	$port = $_REQUEST['port'];
	$user_id = $_SESSION['user_id'];
	
    $isAdmin = $db->isAdmin( $_SESSION['user_id'] );
	$query_groups = "";
	if($isAdmin) 
		$home_info = $db->getGameHome($home_id);
	else
	{
		$home_info = $db->getUserGameHome($user_id,$home_id);
		$groups = $db->getUsersGroups($_SESSION['user_id']);
		$query_groups .= " AND (";
		foreach($groups as $group)
			$query_groups .= "group_id=".$group['group_id']." OR ";
		$query_groups .= "group_id=0 OR group_id IS NULL)";
	}
	
    if ( $home_info === FALSE )
    {
        print_failure(get_lang('no_rights'));
        echo create_back_button("addonsmanager","user_addons");
        return;
    }
	
	$home_cfg_id = $home_info['home_cfg_id'];
	$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$home_info['home_cfg_file']);
	
	$addon_types = array('plugin', 'mappack', 'config');
	$addon_type = isset($_REQUEST['addon_type']) ? $_REQUEST['addon_type'] : "";

    $state = isset($_REQUEST['state']) ? $_REQUEST['state'] : "";
    $pid = isset($_REQUEST['pid']) ? $_REQUEST['pid'] : -1;
	
    if ( $state != "" )
    {
        $addon_id = (int)$_REQUEST['addon_id'];
		
		$addons_rows = $db->resultQuery("SELECT url, path, post_script FROM OGP_DB_PREFIXaddons WHERE addon_id=".$addon_id.$query_groups);

		if (!$addons_rows) {
			print_failure(get_lang('invalid_addon'));
			$view->refresh('?m=addonsmanager&p=user_addons&home_id='. $home_id .'&mod_id='. $mod_id .'&ip='. $ip .'&port='.$port);
			return;
		}
		
		$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key'],$home_info['timeout']);
		
		$addon_info = $addons_rows[0];
		$url = $addon_info['url'];
		$filename = basename($url);
		#### This makes replacements to the bash script:
		if($addon_info['post_script'] != "")
		{
			$addon_info['post_script'] = strip_real_escape_string($addon_info['post_script']);
			$check_passed = FALSE;
			$address_at_post = $ip.":".$port;
			$ip_ports = $db->getHomeIpPorts($home_info['home_id']);
			foreach($ip_ports as $ip_port);
			{
				$address_owned = $ip_port['ip'].":".$ip_port['port'];
				if($address_owned == $address_at_post)
				{
					$check_passed = TRUE;
					$ip = $ip_port['ip'];
					$port = $ip_port['port'];
				}
			}
			if($check_passed)
			{
				$home_info['ip'] = $ip;
				$home_info['port'] = $port;
				
				if(	isset($server_xml->gameq_query_name) )
				{
					require_once("modules/gamemanager/home_handling_functions.php");
					$home_info['query_port'] = get_query_port($server_xml, $home_info['port']);
				}
				elseif(	isset($server_xml->lgsl_query_name) )
				{
					$get_q_and_s = lgsl_port_conversion((string)$server_xml->lgsl_query_name, $home_info['port'], "", "");
					$home_info['query_port'] = $get_q_and_s['1'];
				}
				
				$home_info["incremental"] = $db->incrementalNumByHomeId( $home_info['home_id'], $home_info['mods'][$mod_id]['mod_cfg_id'], $home_info['remote_server_id'] );
				
				$post_script = preg_replace( "/\%home_path\%/i", $home_info['home_path'], $addon_info['post_script']);
				$post_script = preg_replace( "/\%home_name\%/i", $home_info['home_name'], $post_script);
				$post_script = preg_replace( "/\%control_password\%/i", $home_info['control_password'], $post_script);
				$post_script = preg_replace( "/\%max_players\%/i", $home_info['mods'][$mod_id]['max_players'], $post_script);
				$post_script = preg_replace( "/\%ip\%/i", $home_info['ip'], $post_script);
				$post_script = preg_replace( "/\%port\%/i", $home_info['port'], $post_script);
				$post_script = preg_replace( "/\%query_port\%/i", $home_info['query_port'], $post_script);
				$post_script = preg_replace( "/\%incremental\%/i", $home_info['incremental'], $post_script);
			}
		}

		#### end of replacememnts
		if ( $state == "start" AND $addon_id != "" )
			$pid = $remote->start_file_download( $addon_info['url'], $home_info['home_path']."/".$addon_info['path'], $filename, "uncompress", $post_script);

		$headers = get_headers($url, 1);

		$download_available = !$headers ? FALSE : TRUE;
		// Check if any error occured
		if($download_available)
		{
			$bytes = is_array($headers['Content-Length']) ? $headers['Content-Length'][1] : $headers['Content-Length'];
			// Display the File Size
			$totalsize = $bytes / 1024;
			clearstatcache();
		}

		$kbytes = $remote->rsync_progress($home_info['home_path']."/".$addon_info['path']."/".$filename);
        list($totalsize,$mbytes,$pct) = explode(";",do_progress($kbytes,$totalsize));
		$totalmbytes = round($totalsize / 1024, 2);
		$pct = $pct > 100 ? 100 : $pct;
		echo "<h2>" . htmlentities($home_info['home_name']) . "</h2>";
		echo '<div class="dragbox bloc rounded" style="background-color:#dce9f2;" >
				<h4>'.get_lang('install')." ".$filename." ${mbytes}MB/${totalmbytes}MB</h4>
			  <div style='background-color:#dce9f2;' >
			  ";
		$bar = '';
 		for( $i = 1; $i <= $pct; $i++ )
		{
			$bar .= '<img style="width:0.92%;vertical-align:middle;" src="images/progressBar.png">';
		}
		echo "<center>$bar <b style='vertical-align:top;display:inline;font-size:1.2em;color:red;' >$pct%</b></center>
				</div>
			  </div>";
		
		if ( ( $pct == "100" or !$download_available ) AND $post_script != "" )
		{
			$log_retval = $remote->get_log( "post_script",
											$pid,
											clean_path($home_info['home_path']."/".$server_xml->exe_location),
											$script_log);
			if ($log_retval == 0)
			{
				print_failure(get_lang('agent_offline'));
			}
			elseif ($log_retval == 1 || $log_retval == 2)
			{
				echo "<pre class='log'>".$script_log."</pre>";
			}
			elseif( $remote->is_screen_running("post_script",$pid) == 1 )
			{
				print_failure(get_lang_f('unable_to_get_log',$log_retval));
			}
		}
		
		if( $pct == "100" or !$download_available or ( $download_available and $pct == "-" and $pid > 0 ) )
		{
			if(!$download_available)
			{
				print_failure(get_lang('failed_to_start_file_download'));
			}
			elseif( $remote->is_file_download_in_progress($pid) === 1 )
			{
				print_success(get_lang_f('wait_while_decompressing', $filename));
				echo "<p><a href=\"?m=addonsmanager&amp;p=addons&amp;state=refresh&amp;home_id=$home_id&amp;mod_id=$mod_id".
					 "&amp;ip=$ip&amp;port=$port&amp;addon_id=$addon_id&amp;pid=$pid\">".get_lang('refresh')."</a></p>";
				$view->refresh("?m=addonsmanager&amp;p=addons&amp;state=refresh&amp;home_id=$home_id&amp;mod_id=$mod_id".
							   "&amp;ip=$ip&amp;port=$port&addon_id=$addon_id&amp;pid=$pid",5);
			}
			elseif( $remote->is_file_download_in_progress($pid) === 0 AND $remote->is_screen_running("post_script",$pid) === 0 )
			{
				print_success(get_lang('addon_installed_successfully'));
				echo "<p><a href=\"?m=addonsmanager&amp;p=user_addons&amp;home_id=$home_id".
					 "&amp;mod_id=$mod_id&amp;ip=$ip&amp;port=$port\">".get_lang('back')."</a></p>";
				$view->refresh("?m=addonsmanager&amp;p=user_addons&amp;home_id=$home_id".
							   "&amp;mod_id=$mod_id&amp;ip=$ip&amp;port=$port",10);
				return;
			}
		}
		else
		{
			echo "<p><a href=\"?m=addonsmanager&amp;p=addons&amp;state=refresh&amp;home_id=$home_id&amp;mod_id=$mod_id".
				 "&amp;ip=$ip&amp;port=$port&amp;addon_id=$addon_id&amp;pid=$pid\">".get_lang('refresh')."</a></p>";
			$view->refresh("?m=addonsmanager&amp;p=addons&amp;state=refresh&amp;home_id=$home_id&amp;mod_id=$mod_id".
						   "&amp;ip=$ip&amp;port=$port&amp;addon_id=$addon_id&amp;pid=$pid",5);
		}
		
    }
    elseif( $addon_type != "" )
    {

    	if (!in_array($addon_type, $addon_types)) {
    		print_failure(get_lang('invalid_addon_type'));
    		$view->refresh('?m=addonsmanager&p=user_addons&home_id='. $home_id .'&mod_id='. $mod_id .'&ip='. $ip .'&port='.$port);

    		return;
    	}

		?>
			<h2><?php echo htmlentities($home_info['home_name'])."&nbsp;".get_lang($addon_type) ;?></h2>
            <table class='center'>
			<form method='get'>
			<input type='hidden' name='m' value='addonsmanager' />
            <input type='hidden' name='p' value='addons' />
            <input type='hidden' name='home_id' value='<?php echo $home_id; ?>' />
			<input type='hidden' name='mod_id' value='<?php echo $mod_id; ?>' />
			<input type='hidden' name='ip' value='<?php  echo $ip; ?>' />
			<input type='hidden' name='port' value='<?php  echo $port; ?>' />
            <input type='hidden' name='state' value='start' />
            <tr><td align='right'><?php print_lang('game_name'); ?>: </td><td align='left'><?php  echo $home_info['game_name']; ?></td></tr>
            <tr><td align='right'><?php print_lang('directory'); ?>: </td><td align='left'><?php  echo $home_info['home_path']; ?></td></tr>
            <tr><td align='right'><?php print_lang('remote_server'); ?>: </td>
            <td align='left'><?php  echo "$home_info[remote_server_name] ($home_info[agent_ip]:$home_info[agent_port])"; ?></td></tr>
            <tr><td align='right'><?php print_lang('select_addon'); ?>: </td>
            <td align='left'>
			<select name="addon_id">
			<?php
			$addons = $db->resultQuery("SELECT addon_id, name FROM OGP_DB_PREFIXaddons WHERE addon_type='".$addon_type."' AND home_cfg_id=" . $home_cfg_id . $query_groups . " ORDER BY name ASC");
			foreach($addons as $addon) 
			{
			?>
			<option value="<?php echo $addon['addon_id']; ?>"><?php echo $addon['name']; ?></option>
			<?php 
			}
			?>
			</select>
			</td></tr>
            <tr><td colspan='2' class='info'>&nbsp;</td></tr>
            <td align='left'>
			&nbsp;
			</td></tr><tr><td align="right">
            <input type="submit" name="update" value="<?php print_lang('install'); ?>" />
            </form></td><td>
			<form method="get">
			<input type="hidden" name="m" value="addonsmanager" />
            <input type="hidden" name="p" value="user_addons" />
			<input type="hidden" name="home_id" value="<?php  echo $home_id; ?>" />
			<input type="hidden" name="mod_id" value="<?php  echo $mod_id; ?>" />
			<input type="hidden" name="ip" value="<?php  echo $ip; ?>" />
			<input type="hidden" name="port" value="<?php  echo $port; ?>" />
			<input type="submit" value="<?php print_lang('back'); ?>" />
			</form>
			</td></tr>
			</table>
<?php 
    }
}
?>