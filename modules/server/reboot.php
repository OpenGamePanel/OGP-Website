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
	echo "<h2>".get_lang('reboot')."</h2>";
	$rhost_id = @$_REQUEST['rhost_id'];
    $remote_server = $db->getRemoteServer($rhost_id);
	$remote = new OGPRemoteLibrary($remote_server['agent_ip'], $remote_server['agent_port'], $remote_server['encryption_key'], $remote_server['timeout']);
	$ipAndName = $remote_server['remote_server_name'] . " " . "(" . $remote_server['agent_ip'] . ")";

	// Confirm user wants to reboot the server
	if (!isset($_POST['re_check'])) {
		echo "<table class='center' style='width:100%;' ><tr>\n" . "<td>" . get_lang_f('confirm_reboot', $ipAndName) . "</td>" . "</tr><tr><td>" . '<form method="post" >' . "\n" . '<input type="hidden" name="rhost_id" value="' . $rhost_id . '">' . "\n" . '<button name="re_check" value="yes" >' . get_lang('yes') . "</button>\n" . '<button name="re_check" value="no" >' . get_lang('no') . "</button>\n" . "</form>\n" . "</td>\n" . "</tr>\n" . "</table><br>\n";
	} else if($_POST['re_check'] == "yes") {
		// Confirmed... so reboot the server in 10 seconds
		$file_info =  $remote->remote_rebootnow();
		echo "<p>" . get_lang_f('reboot_success', $ipAndName) . "</p>";
		
		// 150 seconds should be enough for the server to come back up?
		$view->refresh("?m=server",150);

	} else if ($_POST['re_check'] == "no"){
		$view->refresh("?m=server",0);
	}


    
	
    
}
?>
