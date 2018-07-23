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

function exec_ogp_module()
{
	global $db;
	$api_hosts_file = 'api_authorized.hosts';
	echo "<h2>".get_lang('autohorized_hosts')."</h2>";
	if(isset($_POST['remove_hosts']))
	{
		if(file_exists($api_hosts_file))
		{
			$new_hosts = array();
			$hosts_list = file_get_contents($api_hosts_file);
			$hosts = preg_split("/[\r\n]+/", $hosts_list);
			foreach($hosts as $host)
			{
				$host = trim($host);
				if($host == '')
					continue;
				if(in_array($host, $_POST['hosts_to_remove']))
					continue;
				$new_hosts[] = $host;
			}
			file_put_contents($api_hosts_file, implode("\n", $new_hosts));
		}
	}
	
	if(isset($_POST['add_host']))
	{
		if(file_exists($api_hosts_file))
		{
			$new_hosts = array();
			$hosts_list = file_get_contents($api_hosts_file);
			$hosts = preg_split("/[\r\n]+/", $hosts_list);
			foreach($hosts as $host)
			{
				$host = trim($host);
				if($host == '')
					continue;
				$new_hosts[] = $host;
			}
			$new_hosts[] = trim($_POST['host_to_add']);
			file_put_contents($api_hosts_file, implode("\n", $new_hosts));
		}
		else
		{
			file_put_contents($api_hosts_file, trim($_POST['host_to_add']));
		}
	}
	$autorized_hosts = array($_SERVER['SERVER_NAME'], getHostByName(getHostName()), '127.0.0.1', 'localhost');
	$remote_servers = $db->getRemoteServers();
	foreach($remote_servers as $remote_server)
	{
		foreach(gethostbynamel($remote_server['agent_ip']) as $agent_ip)
		{
			if(!in_array($agent_ip, $autorized_hosts))
				$autorized_hosts[] = $agent_ip;
		}
	}
	echo "<h4>".get_lang('default_hosts')."</h4>\n<br>\n<div align='center'>\n";
	foreach($autorized_hosts as $autorized_host)
	{
		echo $autorized_host."<br>\n";
	}
	echo "</div>\n<br>\n<form method=POST action='?m=settings&p=api_hosts'>\n<div align='center'>\n";
	if(file_exists($api_hosts_file))
	{
		$hosts_list = file_get_contents($api_hosts_file);
		$hosts = preg_split("/[\r\n]+/", $hosts_list);
		if(!empty(array_filter($hosts)))
		{
			echo "<h4>".get_lang('custom_hosts')."</h4>\n<br>\n";
			foreach($hosts as $host)
			{
				$host = trim($host);
				if($host == '')
					continue;
				echo "<input type=checkbox id='$host' name='hosts_to_remove[]' value='$host' ><label for='host'>$host</label><br>\n";
			}
			echo "<br><input type=submit name=remove_hosts value='".get_lang('remove_hosts')."'>\n<br>\n<br>\n";
		}
	}
	
	echo "<input type=text name='host_to_add' >\n".
		 "<input type=submit name=add_host value='".get_lang('add_host')."'>\n".
		 "</div>\n".
		 "</form>\n".
		 "<br>\n".
		 "<br>\n".
		 "<a href='?m=settings'>".get_lang('back')."</a>";
}