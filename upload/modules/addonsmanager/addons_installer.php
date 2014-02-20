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

    global $db;
    global $view;

	$home_cfg_id = isset($_REQUEST['home_cfg_id']) ? $_REQUEST['home_cfg_id'] : "";
    $home_id = isset($_REQUEST['home_id']) ? $_REQUEST['home_id'] : "";
	$addon_id = isset($_REQUEST['addon_id']) ? $_REQUEST['addon_id'] : "";
	
    $isAdmin = $db->isAdmin( $_SESSION['user_id'] );
	if($isAdmin) 
		$home_info = $db->getGameHome($home_id);
	else
		$home_info = $db->getUserGameHome($_SESSION['user_id'],$home_id);
	
    if ( $home_info === FALSE )
    {
        print_failure(get_lang('no_rights'));
        echo create_back_button("addonsmanager","user_addons");
        return;
    }

	$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$home_info['home_cfg_file']);
    $state = isset($_REQUEST['state']) ? $_REQUEST['state'] : "";
    $pid = isset($_REQUEST['pid']) ? $_REQUEST['pid'] : -1;
	
    if ( !empty($state) )
    {
        $remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key']);
		$addons_rows = $db->resultQuery("SELECT url, path, post_script FROM OGP_DB_PREFIXaddons WHERE addon_id=".$addon_id);
		$addon_info = $addons_rows[0];
		$url = $addon_info['url'];
		$filename = basename($url);
		#### This makes replacements to the bash script:
		if(isset($addon_info['post_script']) AND !empty($addon_info['post_script']) AND $addon_info['post_script'] != "")
		{
			$check_passed = FALSE;
			$address_at_post = $_POST['ip'].":".$_POST['port'];
			$ip_ports = $db->getHomeIpPorts($home_info["home_id"]);
			foreach($ip_ports as $ip_port);
			{
				$address_owned = $ip_port['ip'].":".$ip_port['port'];
				if($address_owned == $address_at_post)
				{
					$check_passed = TRUE;
					break;
				}
				$ip = $ip_port['ip'];
				$port = $ip_port['port'];
			}
			
			$home_info["ip"] = $check_passed ? $_POST['ip'] : $ip;
			$home_info["port"] = $check_passed ? $_POST['port'] : $port;
			
			if(	isset($server_xml->gameq_query_name) )
			{
				$home_info["query_port"] = get_query_port($server_xml, $home_info['port']);
			}
			elseif(	isset($server_xml->lgsl_query_name) )
			{
				$get_q_and_s = lgsl_port_conversion((string)$server_xml->lgsl_query_name, $home_info['port'], "", "");
				$home_info["query_port"] = $get_q_and_s['1'];
			}
			
			$home_info["incremental"] = $db->incrementalNumByHomeId( $home_info["home_id"], $home_info["mod_cfg_id"], $home_info["remote_server_id"] );
			
			$post_script = preg_replace( "/\%home_path\%/i", $home_info["home_path"], $addon_info['post_script']);
			$post_script = preg_replace( "/\%home_name\%/i", $home_info["home_name"], $post_script);
			$post_script = preg_replace( "/\%control_password\%/i", $home_info["control_password"], $post_script);
			$post_script = preg_replace( "/\%max_players\%/i", $home_info["max_players"], $post_script);
			$post_script = preg_replace( "/\%ip\%/i", $home_info["ip"], $post_script);
			$post_script = preg_replace( "/\%port\%/i", $home_info["port"], $post_script);
			$post_script = preg_replace( "/\%query_port\%/i", $home_info["query_port"], $post_script);
			$post_script = preg_replace( "/\%incremental\%/i", $home_info["incremental"], $post_script);
		}
		else
			$post_script = "";
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
		echo "<h2>" . $home_info['home_name'] . "</h2>";
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
				echo "<p><a href=\"?m=addonsmanager&amp;p=addons&amp;state=refresh&amp;home_id=".
				$home_id."&addon_id=$addon_id&amp;pid=$pid\">".get_lang('refresh')."</a></p>";
				$view->refresh("?m=addonsmanager&amp;p=addons&amp;state=refresh&amp;home_id=".
				$home_id."&addon_id=$addon_id&amp;pid=$pid",5);
			}
			elseif( $remote->is_file_download_in_progress($pid) === 0 AND $remote->is_screen_running("post_script",$pid) === 0 )
			{
				print_success(get_lang('addon_installed_successfully'));
				$view->refresh("?m=addonsmanager&amp;p=user_addons&amp;home_id=".$home_id,10);
				return;
			}
		}
		else
		{
			echo "<p><a href=\"?m=addonsmanager&amp;p=addons&amp;state=refresh&amp;home_id=".
			$home_id."&addon_id=$addon_id&amp;pid=$pid\">".get_lang('refresh')."</a></p>";
			$view->refresh("?m=addonsmanager&amp;p=addons&amp;state=refresh&amp;home_id=".
			$home_id."&addon_id=$addon_id&amp;pid=$pid",5);
		}
		
    }
    elseif( !empty($_GET['addon_type']) )
    {
		?>
			<h2><?php echo $home_info['home_name']."&nbsp;".get_lang($_GET['addon_type']) ;?></h2>
            <table class='center'>
			<form action='?m=addonsmanager&amp;p=addons<?php echo "&amp;ip=".$_GET['ip']."&amp;port=".$_GET['port']; ?>' method='post'>
            <input type='hidden' name='home_id' value='<?php  echo "$home_id"; ?>' />
            <input type='hidden' name='state' value='start' />
            <tr><td align='right'><?php print_lang('game_name'); ?>: </td><td align='left'><?php  echo "$home_info[game_name]"; ?></td></tr>
            <tr><td align='right'><?php print_lang('directory'); ?>: </td><td align='left'><?php  echo "$home_info[home_path]"; ?></td></tr>
            <tr><td align='right'><?php print_lang('remote_server'); ?>: </td>
            <td align='left'><?php  echo "$home_info[remote_server_name] ($home_info[agent_ip]:$home_info[agent_port])"; ?></td></tr>
            <tr><td align='right'><?php print_lang('select_addon'); ?>: </td>
            <td align='left'>
			<select name="addon_id">
			<?php
			$addons = $db->resultQuery("SELECT addon_id, name FROM OGP_DB_PREFIXaddons WHERE addon_type='".$_GET['addon_type']."' AND home_cfg_id=" . $home_cfg_id);
			foreach($addons as $addon) 
			{
			?>
			<option value="<?php  echo $addon['addon_id']; ?>"><?php  echo $addon['name']; ?></option>
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
			<form action="" method="get">
			<input type="hidden" name="m" value="addonsmanager" />
            <input type="hidden" name="p" value="user_addons" />
			<input type="hidden" name="home_id" value="<?php  echo "$home_id"; ?>" />
			<input type="submit" value="<?php print_lang('back'); ?>" />
			</form>
			</td></tr>
			</table>
<?php 
    }
    return;
}

?>
