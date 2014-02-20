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


if ($os == "windows")
{
	$wmi = new \COM("Winmgmts://");
	$cpus = $wmi->execquery("SELECT * FROM Win32_Processor");
	
	$cpu_num = '0';
	
	foreach ($cpus as $cpu)
	{
		$cpu_num = $cpu->NumberOfLogicalProcessors;
	}
	
	$cpus_info = $wmi->execquery("select * from Win32_PerfFormattedData_PerfOS_Processor");

	$cores = array();
	
	$cpu_loop = 1;
	
	foreach($cpus_info as $cpu_info)
	{
		$cores[$cpu_loop] = 100 - $cpu_info->PercentIdleTime;
		
		$cpu_loop++;

		if($cpu_loop > $cpu_num)
			break;
	}
	$nocpushow = "0";
} 
elseif ($os == "linux")
{
	function getStat()
	{
		$_statPath = '/proc/stat';

		if( isset($_GET['remote_server_id']) and $_GET['remote_server_id'] != "" and $_GET['remote_server_id'] != "webhost" ) {
			require_once('includes/lib_remote.php');
			global $db;
			$rhost_id = $_GET['remote_server_id'];
			$remote_server = $db->getRemoteServer($rhost_id);
			$remote = new OGPRemoteLibrary($remote_server['agent_ip'], $remote_server['agent_port'], $remote_server['encryption_key'] );
			$stat = $remote->exec('cat ' . $_statPath);
		}
		else {
			ob_start();
			passthru('cat ' . $_statPath);
			$stat = ob_get_contents();
			ob_end_clean();
		}
		
		$lb = explode("\n", $stat);

		$first = 1;

		$cores = array();
		foreach($lb as $line)
		{
			if($first == 0)
			{
				if(preg_match('/^cpu[0-9]/', $line))
				{
					$info = explode(' ', $line );
					$cores[] = array(
						'user' => $info[1],
						'nice' => $info[2],
						'sys' => $info[3],
						'idle' => $info[4],
						'total' => $info[1] + $info[2] + $info[3] + $info[4]
						);
					
				}
			}
			else
			{
				$first = 0;
			}
		}
		return $cores;
	}

	/* compares two information snapshots and returns the cpu percentage */
	function getCpuUsage($stat1, $stat2)
	{
		if( count($stat1) !== count($stat2) )
		{
			return;
		}

		for( $i = 0; $i < count($stat1) ; $i++ )
		{
			$diff_idle[$i] = $stat2[$i]['idle'] - $stat1[$i]['idle'];
			$diff_total[$i] = $stat2[$i]['total'] - $stat1[$i]['total'];
			$DU = round(( 1000 * ( $diff_total[$i] - $diff_idle[$i] ) / $diff_total[$i] ) / 10, 2);
			$diff_usage[$i] = $DU > 100 ? 100 : $DU;
		}

		return $diff_usage;
	}
   
	$stat1 = getStat();
	sleep(1);
	$stat2 = getStat();
	$cores = getCpuUsage($stat1, $stat2);
	$nocpushow = "0";
} 
elseif ($os == "nocpu")
{
	$nocpushow = "1";
} 
else
{
	$nocpushow = "1";
}

?>