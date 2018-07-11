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
		$pct = unavailable;
	}
	#echo "Percent is $pct";
	return "$totalsize;$mbytes;$pct"; 
}

require_once("includes/lib_remote.php");
require_once("modules/config_games/server_config_parser.php");

function exec_ogp_module() {

	global $db, $view;

	$home_id = isset($_REQUEST['home_id']) ? $_REQUEST['home_id'] : "";
	$mod_id = isset($_REQUEST['mod_id']) ? $_REQUEST['mod_id'] : "";

	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
	if($isAdmin) 
		$home_info = $db->getGameHome($home_id);
	else
		$home_info = $db->getUserGameHome($_SESSION['user_id'],$home_id);

	if ( $home_info === FALSE || preg_match("/u/",$home_info['access_rights']) != 1 )
	{
		print_failure( get_lang("no_rights") );
		echo create_back_button("gamemanager","gamemanager");
		return;
	}
	
	$home_id = $home_info['home_id'];
	
	$state = isset($_REQUEST['state']) ? $_REQUEST['state'] : "";
	$pid = isset($_REQUEST['pid']) ? $_REQUEST['pid'] : -1;
	$filename = isset($_REQUEST['filename']) ? $_REQUEST['filename'] : "";

	echo "<h2>". get_lang("install_update_manual") ." $home_info[home_name]</h2>";

	if ( !empty($state) )
	{
		$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$home_info['home_cfg_file']);
		$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key'],$home_info['timeout']);
		if ( $state == "start" )
		{
			$postinstall = $server_xml->post_install ? $server_xml->post_install : "";
			
			$pid = $remote->start_file_download($_REQUEST['url'],$home_info['home_path'],
				$filename,"uncompress",$postinstall);

			if ( $pid < 0 )
			{
				print_failure( get_lang("failed_to_start_file_download") );
				return;
			}
		}
		
		$url = $_REQUEST['url'];
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
		
		$kbytes = $remote->rsync_progress($home_info['home_path']."/".$filename);
		list($totalsize,$mbytes,$pct) = explode(";",do_progress($kbytes,$totalsize));
		$totalmbytes = round($totalsize / 1024, 2);
		$pct = $pct > 100 ? 100 : $pct;
		echo '<div class="dragbox bloc rounded" style="background-color:#dce9f2;" >
				<h4>'. get_lang("update_in_progress") ." ${mbytes}MB/${totalmbytes}MB</h4>
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

		if ( $remote->is_file_download_in_progress($pid) == 0 )
		{
			// Lock the executable when done
			$remote->secure_path("chattr+i", $home_info['home_path'] . "/" . ($server_xml->exe_location ? $server_xml->exe_location . "/" : "") . $server_xml->server_exec_name);
			
			print_success( get_lang("finished_manual_update") );
		}
		else
		{
			echo "<p><a href=\"?m=gamemanager&amp;p=update_manual&amp;state=refresh&amp;home_id=".
				$home_id."&amp;mod_id=$mod_id&amp;pid=$pid&amp;url=$url&amp;filename=$filename\">Refresh</a></p>";
			$view->refresh("?m=gamemanager&amp;p=update_manual&amp;state=refresh&amp;home_id=".
				$home_id."&amp;mod_id=$mod_id&amp;pid=$pid&amp;url=$url&amp;filename=$filename",5);
		}
		echo create_back_button($_GET['m'],"game_monitor&amp;home_id=".$home_id);
	}
	else
	{
		echo "<form action='?m=gamemanager&amp;p=update_manual' method='post'>
			<table class='center'>
			<input type='hidden' name='home_id' value='$home_id' />
			<input type='hidden' name='mod_id' value='$mod_id' />
			<input type='hidden' name='state' value='start' />
			<tr><td align='right'>". get_lang("game_name") .":</td><td align='left'>$home_info[game_name]</td></tr>
			<tr><td align='right'>". get_lang("dest_dir") .":</td><td align='left'>$home_info[home_path]</td></tr>
			<tr><td align='right'>". get_lang("remote_server") .":</td>
			<td align='left'>$home_info[remote_server_name] ($home_info[agent_ip]:$home_info[agent_port])</td></tr>
			<tr><td align='right'>". get_lang("file_url") .":</td>
			<td align='left'><input type='text' id='url' name='url' value='' onChange='setFilename(this.value)' size='50' /></td></tr>
			<tr><td colspan='2' class='info'>". get_lang("file_url_info") ."</td></tr>
			<tr><td align='right'>". get_lang("dest_filename") .":</td>
            <td align='left'><input type='text' id='filename' name='filename' value='' size='50'/></td></tr>
            <tr><td colspan='2' class='info'>". get_lang("dest_filename_info") ."</td></tr>
			</table>
			<p><input type='submit' name='update' value='". get_lang("update_server") ."' /></p>
			</form>";
		?>
		<script type="text/javascript">
		function setFilename(url)
		{
			filename = url.substring(url.lastIndexOf('/')+1);
			document.getElementById('filename').setAttribute('value', filename);
		}
		</script>
		<?php
	}

	return;
}
?>
