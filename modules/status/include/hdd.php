<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) Copyright (C) 2008 - 2013 The OGP Development Team
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

if( isset($_GET['remote_server_id']) AND $os != "nocpu" ) {
	require_once('includes/lib_remote.php');
	global $db;
	$rhost_id = $_GET['remote_server_id'];
	$remote_server = $db->getRemoteServer($rhost_id);
	$remote = new OGPRemoteLibrary($remote_server['agent_ip'], $remote_server['agent_port'], $remote_server['encryption_key'] );
	if($cygwin)
		$disk_info = $remote->exec('df -lP|grep "^.:\s"|awk \'{size+=$2}{used+=$3}{avail+=$4} END {print size, used, avail}\'');
	else
		$disk_info = $remote->exec('df -lP|grep "^/dev/.*"|awk \'{size+=$2}{used+=$3}{avail+=$4} END {print size, used, avail}\'');
	list($insgesamtKB, $belegtKB, $freiKB) = explode(" ", $disk_info);
	$frei = 1024*$freiKB;
	$belegt = 1024*$belegtKB;
	$insgesamt = 1024*$insgesamtKB;
} else {
	if($os == "windows")
	{
		$insgesamt = disk_total_space("./");
		$frei = disk_free_space("./");
		$belegt = $insgesamt - $frei;
	}
	else
	{
		if($cygwin)
			$disk_info = shell_exec('df -lP|grep "^.:\s"|awk \'{size+=$2}{used+=$3}{avail+=$4} END {print size, used, avail}\'');
		else
			$disk_info = shell_exec('df -lP|grep "^/dev/.*"|awk \'{size+=$2}{used+=$3}{avail+=$4} END {print size, used, avail}\'');
		list($insgesamtKB, $belegtKB, $freiKB) = explode(" ", $disk_info);
		$frei = 1024*$freiKB;
		$belegt = 1024*$belegtKB;
		$insgesamt = 1024*$insgesamtKB;
	}
}

$prozent_belegt = 100 * $belegt / $insgesamt;
$diskspace = numbersFormatting($insgesamt);
$diskinuse = numbersFormatting($belegt) . ' (' . round($prozent_belegt, "2") .
    '%)';
$hddbarusage = round($prozent_belegt, "2");
$hddfreespace = numbersFormatting($frei);
?>