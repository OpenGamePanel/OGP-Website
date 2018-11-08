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
	require_once 'includes/api_functions.php';
	$api_hosts_file = 'api_authorized.hosts';
	$api_fwd_hosts_file = 'api_authorized.fwd_hosts';
		
	echo "<h2>".get_lang('autohorized_hosts')."</h2>";
	
	if(isset($_POST['remove_hosts']) or isset($_POST['remove_fwd_hosts']))
	{
		if(isset($_POST['remove_hosts']))
		{
			$hosts_file = $api_hosts_file;
			$to_remove = $_POST['hosts_to_remove'];
		}
		else
		{
			$hosts_file = $api_fwd_hosts_file;
			$to_remove = $_POST['fwd_hosts_to_remove'];
		}
		
		if(file_exists($hosts_file))
		{
			$hosts_list = file_get_contents($hosts_file);
			$hosts = preg_split("/[\r\n]+/", $hosts_list);
			$new_hosts = array();
			foreach($hosts as $host)
			{
				$host = trim($host);
				if($host == '')
					continue;
				if(in_array($host, $to_remove))
					continue;
				$new_hosts[] = $host;
			}
			file_put_contents($hosts_file, implode("\n", $new_hosts));
		}
	}
	
	if(isset($_POST['add_host']) or isset($_POST['add_fwd_host']))
	{
		if(isset($_POST['add_host']))
		{
			$hosts_file = $api_hosts_file;
			$host_to_add = trim($_POST['host_to_add']);
		}
		else
		{
			$hosts_file = $api_fwd_hosts_file;
			$host_to_add = trim($_POST['fwd_host_to_add']);
		}
		
		$new_hosts = array();
		
		if(file_exists($hosts_file))
		{
			$hosts_list = file_get_contents($hosts_file);
			$hosts = preg_split("/[\r\n]+/", $hosts_list);
			
			foreach($hosts as $host)
			{
				$host = trim($host);
				if($host == '' or in_array($host, $new_hosts))
					continue;
				$new_hosts[] = $host;
			}
		}
				
		if(strstr($host_to_add, '/'))
		{
			list($ip, $range) = explode('/', $host_to_add, 2);
			if(is_valid_ipv4($ip) and !in_array($host_to_add, $new_hosts))
				$new_host = $host_to_add;
			elseif(is_valid_ipv6($ip) and !in_array(ipv6_compress($ip)."/".$range, $new_hosts))
				$new_host = ipv6_compress($ip)."/".$range;
		}
		else
		{
			$ip = getHostByName($host_to_add);
			if(is_valid_ipv4($ip) and !in_array($ip, $new_hosts))
				$new_host = $ip;
			elseif(is_valid_ipv6($ip) and !in_array(ipv6_compress($ip), $new_hosts))
				$new_host = ipv6_compress($ip);
		}
				
		if(file_exists($hosts_file))
		{
			if(isset($new_host))
				$new_hosts[] = $new_host;
			file_put_contents($hosts_file, implode("\n", $new_hosts));
		}
		else
		{
			if(isset($new_host))
				file_put_contents($hosts_file, $new_host);
		}
	}
	
	$authorized_hosts = array();
	$ip = getHostByName(getHostName());
	if(filter_var($ip, FILTER_VALIDATE_IP))
		$authorized_hosts[] = $ip;
	
	$remote_servers = $db->getRemoteServers();
	foreach($remote_servers as $remote_server)
	{
		$ip = getHostByName($remote_server['agent_ip']);
		if(filter_var($ip, FILTER_VALIDATE_IP))
			if(!in_array($ip, $authorized_hosts))
				$authorized_hosts[] = $ip;
	}
	
	echo "<h4>".get_lang('default_trusted_hosts')."</h4>\n<br>\n<div align='center'>\n";
	foreach($authorized_hosts as $authorized_host)
	{
		echo $authorized_host."<br>\n";
	}
	echo "</div>\n<br>\n<form method=POST action='?m=settings&p=api_hosts'>\n<div align='center'>\n".
		 "<h4>".get_lang('trusted_host_or_proxy_addresses_or_cidr')."</h4>\n<br>\n";
	if(file_exists($api_hosts_file))
	{
		$hosts_list = file_get_contents($api_hosts_file);
		$hosts = preg_split("/[\r\n]+/", $hosts_list);
		$hosts = array_filter($hosts);
		if(!empty($hosts))
		{
			foreach($hosts as $host)
			{
				$host = trim($host);
				if($host == '')
					continue;
				echo "<input type=checkbox id='$host' name='hosts_to_remove[]' value='$host' ><label for='$host'>$host</label><br>\n";
			}
			echo "<br><input type=submit name=remove_hosts value='".get_lang('remove')."'>\n<br>\n<br>\n";
		}
	}
	
	echo "<input type=text name='host_to_add' >\n".
		 "<input type=submit name=add_host value='".get_lang('add')."'>\n".
		 "</div>\n".
		 "</form>\n".
		 "<br>\n".
		 "<br>\n";
		 
	echo "<form method=POST action='?m=settings&p=api_hosts'>\n<div align='center'>\n".
		 "<h4>".get_lang('trusted_forwarded_ip_addresses_or_cidr')."</h4>\n<br>\n";
	if(file_exists($api_fwd_hosts_file))
	{
		$fwd_hosts_list = file_get_contents($api_fwd_hosts_file);
		$fwd_hosts = preg_split("/[\r\n]+/", $fwd_hosts_list);
		$fwd_hosts = array_filter($fwd_hosts);
		if(!empty($fwd_hosts))
		{
			foreach($fwd_hosts as $fwd_host)
			{
				$fwd_host = trim($fwd_host);
				if($fwd_host == '')
					continue;
				echo "<input type=checkbox id='$fwd_host' name='fwd_hosts_to_remove[]' value='$fwd_host' ><label for='$fwd_host'>$fwd_host</label><br>\n";
			}
			echo "<br><input type=submit name=remove_fwd_hosts value='".get_lang('remove')."'>\n<br>\n<br>\n";
		}
	}
	
	echo "<input type=text name='fwd_host_to_add' >\n".
		 "<input type=submit name=add_fwd_host value='".get_lang('add')."'>\n".
		 "</div>\n".
		 "</form>\n".
		 "<br>\n".
		 "<br>\n".
		 "<a href='?m=settings'>".get_lang('back')."</a>";
}