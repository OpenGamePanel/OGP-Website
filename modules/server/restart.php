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

require_once('includes/lib_remote.php');
function exec_ogp_module() {

    global $view;
    global $db;
	echo "<h2>". get_lang("restart") ."</h2>";
	$rhost_id = @$_REQUEST['rhost_id'];
    $remote_server = $db->getRemoteServer($rhost_id);
	$remote = new OGPRemoteLibrary($remote_server['agent_ip'], $remote_server['agent_port'], $remote_server['encryption_key'], $remote_server['timeout']);
	
	
	
	if(isset($_GET['refresh']))
	{
		
		$host_stat = $remote->status_chk();
		if($host_stat === 0)
		{
			echo get_lang("restarting"); # "Restarting agent... Please wait."
			$view->refresh("?m=server&p=restart&rhost_id=".$rhost_id."&refresh",5);
		}
		else
		{
			$remote->remote_readfile( "screenlogs/screenlog.agent_restart", $restart_log );
			echo "<pre class='log'><xmp>".$restart_log."</xmp></pre>";
			$remote->remote_readfile( "screenlogs/screenlog.ogp_agent", $agent_log );
			if($agent_log == "")
			{
				$view->refresh("?m=server&p=restart&rhost_id=".$rhost_id."&refresh",5);
			}
			else
			{
				echo "<pre class='log'><xmp>".$agent_log."</xmp></pre>";
				print_success( get_lang("restarted") );
				echo create_back_button($_GET['m']);
				$view->refresh("?m=server",15);
			}
		}
	}
	// Confirm user wants to reboot the server
	else if (!isset($_POST['re_check'])) {
		$ipAndName = $remote_server['remote_server_name'] . " " . "(" . $remote_server['agent_ip'] . ")";
		echo "<table class='center' style='width:100%;' ><tr>\n" . "<td>".
			 get_lang_f('confirm_restart', $ipAndName) . "</td>" . "</tr><tr><td>".
			 '<form method="post" >' . "\n" . '<input type="hidden" name="rhost_id" value="'.
			 $rhost_id . '">' . "\n" . '<button name="re_check" value="yes" >'.
			 get_lang("yes") . "</button>\n" . '<button name="re_check" value="no" >'.
			 get_lang("no") . "</button>\n" . "</form>\n" . "</td>\n" . "</tr>\n" . "</table><br>\n";
	} else if($_POST['re_check'] == "yes") {
		// Confirmed... so restart the agent
		$remote->exec(  "if [ -e 'screenlogs/screenlog.agent_restart' ]; then rm -f 'screenlogs/screenlog.agent_restart'; fi && ".
						"if [ -e 'screenlogs/screenlog.ogp_agent' ]; then rm -f 'screenlogs/screenlog.ogp_agent'; fi" );
		$file_info =  $remote->agent_restart();		
		// 5 seconds should be enough for the agent to come back up
		echo get_lang("restarting"); # "Restarting agent... Please wait."
		$view->refresh("?m=server&p=restart&rhost_id=".$rhost_id."&refresh", 5);

	} else if ($_POST['re_check'] == "no"){
		$view->refresh("?m=server",0);
	}
}
?>
