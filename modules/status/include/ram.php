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

if ($os == "windows") {

	error_reporting(E_ALL);
	if (extension_loaded('com_dotnet'))
	{
		$wmiq = new COM("Winmgmts://");
		$ossq = $wmiq->execquery("SELECT * FROM Win32_OperatingSystem");
		foreach ($ossq as $osq) {
			$total = $osq->TotalVisibleMemorySize * 1024;
			$free = $osq->FreePhysicalMemory * 1024;
		}
		$belegtq = $total - $free;
		$percentage_used = 100 * $belegtq / $total;

		$ramusage = numbersFormatting($belegtq) . " ".get_lang('ram_of')." " . numbersFormatting($total);
		$rampercent = round($percentage_used, "2");
	}
	else
		$modulememory = "0";
} 
elseif ($os == "linux" or $os == "cygwin") {

	if( isset($_GET['remote_server_id']) )
	{
		require_once('includes/lib_remote.php');
		global $db;
		$rhost_id = $_GET['remote_server_id'];
		$remote_server = $db->getRemoteServer($rhost_id);
		$remote = new OGPRemoteLibrary($remote_server['agent_ip'], $remote_server['agent_port'], $remote_server['encryption_key'], $remote_server['timeout']);
		$ramstatus = $remote->shell_action('get_ram_usage' , 'status');
		$ramusage = numbersFormatting($ramstatus['used']) . " ".get_lang('ram_of')." " . numbersFormatting($ramstatus['total']);
		$rampercent = $ramstatus['percent'];
	}
	else 
	{
		if( ini_get('open_basedir') )
		{
			$dirs = preg_split( "/:|;/", ini_get('open_basedir') , -1, PREG_SPLIT_NO_EMPTY );
			if( !in_array('/proc', $dirs) )
				$modulememory = "0";
			else
				$mem = file_get_contents("/proc/meminfo");
		}
		else
			$mem = file_get_contents("/proc/meminfo");
	
		if( isset($mem) )
		{
			if (preg_match('/MemTotal\:\s+(\d+) kB/', $mem, $matches))
			{
				$total = $matches[1];
			}
			
			if (preg_match('/Buffers\:\s+(\d+) kB/', $mem, $matches))
			{
				$buffers = $matches[1];
			}
			
			if (preg_match('/Cached\:\s+(\d+) kB/', $mem, $matches))
			{
				$cached = $matches[1];
			}
			
			unset($matches);
			
			if (preg_match('/MemFree\:\s+(\d+) kB/', $mem, $matches))
			{
				$free = $matches[1];
			}
			
			$Used = $total - $free - @$cached - @$buffers; // Added at(@) to avoid errors on some virtual machines that are not using pagefile or using the host OS pagefile.
			$percentage_used = 100 * $Used / $total;
			$ramusage = numbersFormatting($Used*1024) . " ".get_lang('ram_of')." " . numbersFormatting($total*1024);
			$rampercent = round($percentage_used, "2");
		}
	}
} 
else
{
	$ramusage = "Unable to Detect";
	$rampercent = "100";
}
?>