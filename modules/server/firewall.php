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
require_once("includes/form_table_class.php");

function exec_ogp_module() {
	global $view;
	global $db;

	$rhost_id = @$_REQUEST['rhost_id'];
	$remote_server = $db->getRemoteServer($rhost_id);
	if ( $remote_server === FALSE )
	{
		print_failure(get_lang_f('invalid_remote_host_id',$rhost_id));
		$view->refresh("?m=server");
		return;
	}

	echo "<h2>".get_lang_f('editing_firewall_for_remote_server',$remote_server['remote_server_name'])."</h2>";

	$firewall_settings = $db->getFirewallSettings($remote_server['remote_server_id']);

	$remote = new OGPRemoteLibrary($remote_server['agent_ip'],$remote_server['agent_port'],$remote_server['encryption_key'],$remote_server['timeout']);
	$host_stat = $remote->status_chk();

	if( isset($_POST['reset_firewall']) )
	{
		if($host_stat === 1)
		{
			$remote->sudo_exec($firewall_settings['disable_firewall_command']);
			$remote->sudo_exec($firewall_settings['reset_firewall_command']);
			$addresses = explode(",",$firewall_settings['default_allowed']);
			if(is_array($addresses))
			{
				$trimed_addresses = array();
				foreach($addresses as $key => $address)
				{
					$address = trim($address);
					if(strpos($address,':'))
					{
						list($ip,$port) = explode(':',$address);
						set_firewall($remote, $firewall_settings, 'allow', $port, $ip);
					}
					else
					{
						$port = trim($address);
						set_firewall($remote, $firewall_settings, 'allow', $port);
					}
				}
			}
			$remote->sudo_exec($firewall_settings['enable_firewall_command']);
		}
	}

	if( isset($_POST['save_firewall_settings']) )
	{
		$addresses = explode(",",$_POST['default_allowed']);
		if(is_array($addresses))
		{
			$trimed_addresses = array();
			foreach($addresses as $key => $address)
			{
				$address = trim($address);
				if(strpos($address,':'))
				{
					list($ip,$port) = explode(':',$address);
					if(preg_match('/^[0-9]{1,5}$/',$port) 
					   and $port >= 1 and $port <= 65535
					   and filter_var($ip, FILTER_VALIDATE_IP)
					   and !in_array($address,$trimed_addresses))
						$trimed_addresses[$key] = $address;
				}
				else
				{
					$port = trim($address);
					if(preg_match('/^[0-9]{1,5}$/',$port) 
					   and $port >= 1 
					   and $port <= 65535 and 
					   !in_array($port,$trimed_addresses) )
						$trimed_addresses[$key] = $port;
				}
			}
			$firewall_settings['default_allowed'] = implode(",",$trimed_addresses);
		}
		$firewall_settings['allow_port_command'] = trim($_POST['allow_port_command']);
		$firewall_settings['deny_port_command'] = trim($_POST['deny_port_command']);
		$firewall_settings['allow_ip_port_command'] = trim($_POST['allow_ip_port_command']);
		$firewall_settings['deny_ip_port_command'] = trim($_POST['deny_ip_port_command']);
		$firewall_settings['enable_firewall_command'] = trim($_POST['enable_firewall_command']);
		$firewall_settings['disable_firewall_command'] = trim($_POST['disable_firewall_command']);
		$firewall_settings['get_firewall_status_command'] = trim($_POST['get_firewall_status_command']);
		$firewall_settings['reset_firewall_command'] = trim($_POST['reset_firewall_command']);
		$db->updateFirewallSettings($remote_server['remote_server_id'],$firewall_settings);
	}

	if( isset($_GET['ch_fw_status']) )
	{
		$firewall_settings['status'] = $_GET['ch_fw_status'];
		if($host_stat === 1)
		{
			if($_GET['ch_fw_status'] == "enable")
			{
				$addresses = explode(",",$firewall_settings['default_allowed']);
				if(is_array($addresses))
				{
					$trimed_addresses = array();
					foreach($addresses as $key => $address)
					{
						$address = trim($address);
						if(strpos($address,':'))
						{
							list($ip,$port) = explode(':',$address);
							set_firewall($remote, $firewall_settings, 'allow', $port, $ip);
						}
						else
						{
							$port = trim($address);
							set_firewall($remote, $firewall_settings, 'allow', $port);
						}
					}
				}
				$remote->sudo_exec($firewall_settings['enable_firewall_command']);
			}
			else
			{
				$remote->sudo_exec($firewall_settings['disable_firewall_command']);
			}
		}

		if($db->updateFirewallSettings($remote_server['remote_server_id'],$firewall_settings))
		{
			$firewall_settings = $db->getFirewallSettings($remote_server['remote_server_id']);
		}
	}

	if($firewall_settings['status'] == "enable")
	{
		echo "<b>".get_lang('status')."</b> ".get_lang('on')."<br />
			  <a href='?m=server&amp;p=firewall&amp;rhost_id=".
			  $remote_server['remote_server_id']."&amp;ch_fw_status=disable'>[".get_lang('stop_firewall')."]</a>\n";
	}
	else
	{
		echo "<b>".get_lang('status')."</b> ".get_lang('off')."<br />
			  <a href='?m=server&amp;p=firewall&amp;rhost_id=".
			  $remote_server['remote_server_id']."&amp;ch_fw_status=enable'>[".get_lang('start_firewall')."]</a>\n";
	}

	$ft = new FormTable();
	$ft->start_form("?m=server&amp;p=firewall&amp;rhost_id=$rhost_id");
	$ft->start_table();
	$ft->add_field('text','default_allowed',$firewall_settings['default_allowed'], 38);
	$ft->add_field('string','allow_port_command',$firewall_settings['allow_port_command']);
	$ft->add_field('string','deny_port_command',$firewall_settings['deny_port_command']);
	$ft->add_field('string','allow_ip_port_command',$firewall_settings['allow_ip_port_command']);
	$ft->add_field('string','deny_ip_port_command',$firewall_settings['deny_ip_port_command']);
	$ft->add_field('string','enable_firewall_command',$firewall_settings['enable_firewall_command']);
	$ft->add_field('string','disable_firewall_command',$firewall_settings['disable_firewall_command']);
	$ft->add_field('string','get_firewall_status_command',$firewall_settings['get_firewall_status_command']);
	$ft->add_field('string','reset_firewall_command',$firewall_settings['reset_firewall_command']);
	$ft->end_table();
	$ft->add_button('submit','save_firewall_settings',get_lang("save_firewall_settings"));
	$ft->end_form();
	
	echo "<h3>".get_lang("firewall_status")."</h3>";
	echo "<pre class='log'>";
	echo $remote->sudo_exec($firewall_settings['get_firewall_status_command']);
	echo "</pre>";
	$ft = new FormTable();
	$ft->start_form("?m=server&amp;p=firewall&amp;rhost_id=$rhost_id");
	$ft->add_button('submit','reset_firewall',get_lang("reset_firewall"));
	$ft->end_form();
	echo create_back_button($_GET['m']);
}
