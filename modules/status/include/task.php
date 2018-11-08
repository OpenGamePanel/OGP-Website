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

// Setup the remote connection
include_once("modules/status/config.php");
if( isset($_GET['remote_server_id']) && $_GET['remote_server_id'] != "webhost")
{
	require_once('includes/lib_remote.php');
	$rhost_id = $_GET['remote_server_id'];
	$remote_server = $db->getRemoteServer($rhost_id);
	$remote = new OGPRemoteLibrary($remote_server['agent_ip'], $remote_server['agent_port'], $remote_server['encryption_key'], $remote_server['timeout']);
	$taskoutput = $remote->shell_action('get_tasklist', 'tasks');
}else{
	if ($os == "windows" || $cygwin === true)
	{
		$taskoutput = array();
		$taskoutput["task"] = shell_exec ("tasklist /fo TABLE");
	}else{
		if($os == "linux"){
			$taskoutput = array();
			$taskoutput["task"] = shell_exec ("top -b -c -i -w512 -n2 -o+%CPU | awk '/^top/{i++}i==2' | grep 'PID' -A 30");
		}
	}
}
?>
