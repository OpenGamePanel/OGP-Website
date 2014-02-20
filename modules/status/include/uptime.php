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
include_once ("modules/status/config.php");{
    if ($os == "windows") {
			{
            function ifif($value, $true, $false)
            {
                if ($value == 0) {
                    return $false;
                } else {
                    return $true;
                }
            }
            $upsince = filemtime($pagefilelocation);
            $gettime = (time() - filemtime($pagefilelocation));
            $days = floor($gettime / (24 * 3600));
            $gettime = $gettime - ($days * (24 * 3600));
            $hours = floor($gettime / (3600));
            $gettime = $gettime - ($hours * (3600));
            $minutes = floor($gettime / (60));
            $gettime = $gettime - ($minutes * 60);
            $seconds = $gettime;
            $days = ifif($days != 1, $days . ' Days', $days . ' Day');
            $hours = ifif($hours != 1, $hours . ' Hours', $hours . ' Hour');
            $minutes = ifif($minutes != 1, $minutes . ' Minutes', $minutes . ' Minute');
            $seconds = ifif($seconds != 1, $seconds . ' Seconds', $seconds . ' Second');
            if ($days == 0) {
                $days = "";
            }
            if ($hours == 0) {
                $hours = "";
            }
            if ($minutes == 0) {
                $minutes = "";
            }
            if ($seconds == 0) {
                $seconds = "";
            }
            $indexuptime = $days . ' ' . $hours . ' ' . $minutes . ' ' . $seconds;
            $indexuptimesince = date('F jS, Y. h:i A', $upsince);
        }
    }
    if ($os == "linux" or $os == "cygwin") {
        function format_uptime($seconds)
        {
            $secs = intval($seconds % 60);
            $mins = intval($seconds / 60 % 60);
            $hours = intval($seconds / 3600 % 24);
            $days = intval($seconds / 86400);

            if ($days > 0) {
                @$uptimeString .= $days;
                $uptimeString .= (($days == 1) ? " Day" : " Days");
            }
            if ($hours > 0) {
                @$uptimeString .= (($days > 0) ? " " : "") . $hours;
                $uptimeString .= (($hours == 1) ? " Hour" : " Hours");
            }
            if ($mins > 0) {
                @$uptimeString .= (($days > 0 || $hours > 0) ? " " : "") . $mins;
                $uptimeString .= (($mins == 1) ? " Minute" : " Minutes");
            }
            if ($secs > 0) {
                $uptimeString .= (($days > 0 || $hours > 0 || $mins > 0) ? " " : "") . $secs;
                $uptimeString .= (($secs == 1) ? " Second" : " Seconds");
            }
            return $uptimeString;
        }

		if( isset($_GET['remote_server_id']) ) {
			require_once('includes/lib_remote.php');
			global $db;
			$rhost_id = $_GET['remote_server_id'];
			$remote_server = $db->getRemoteServer($rhost_id);
			$remote = new OGPRemoteLibrary($remote_server['agent_ip'], $remote_server['agent_port'], $remote_server['encryption_key'] );
			$uptime = $remote->exec('cat /proc/uptime');
			$uptime = explode(" ", $uptime);
			$uptimeSecs = $uptime[0];
			$staticUptime = format_uptime($uptimeSecs);
			$indexuptime = $staticUptime;
			$indexuptimesince = $remote->exec('date -d "`cut -f1 -d. /proc/uptime` seconds ago"');
		}
		else {
			$uptime = exec("cat /proc/uptime");
			$uptime = explode(" ", $uptime);
			$uptimeSecs = $uptime[0];
			$staticUptime = format_uptime($uptimeSecs);
			$indexuptime = $staticUptime;
			$indexuptimesince = exec('date -d "`cut -f1 -d. /proc/uptime` seconds ago"');
		}
        
    }
}
?>