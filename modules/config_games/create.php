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

function exec_ogp_module() {
	@$arch = $_POST['arch'];
	@$os = $_POST['os'];
	@$protocol = $_POST['protocol'];
	@$query_name = $_POST['query_name'];
	@$installer = $_POST['installer'];
	@$control_protocol_type = $_POST['control_protocol_type'];
	@$control_protocol = $_POST['control_protocol'];
	@$query_diff = $_POST['query_diff'];
	@$map_location = $_POST['map_location'];
	@$maplist_file = $_POST['maplist_file'];
	@$max_players_amount = $_POST['max_players_amount'];
	@$exec_path = $_POST['exec_path'];
	@$server_exec_name = $_POST['server_exec_name'];
	@$key_name = $_POST['key_name'];
	@$game_name = $_POST['game_name'];
	@$pid_file_cli = $_POST['pid_file_cli'];
	@$hostname_cli = $_POST['hostname_cli'];
	@$players_cli = $_POST['players_cli'];
	@$map_cli = $_POST['map_cli'];
	@$query_port_cli = $_POST['query_port_cli'];
	@$port_cli = $_POST['port_cli'];
	@$ip_cli = $_POST['ip_cli'];
	@$game_type_cli = $_POST['game_type_cli'];
	@$cli_option = $_POST['cli_option'];
	@$separator = $_POST['separator'];
	@$main_params = $_POST['main_params'];
	$template = "
	<game_config>
	<game_key>$key_name"."_"."$os$arch</game_key>";
	if($protocol != "" )
	{
		$template .= "
	<protocol>$protocol</protocol>
	<".$protocol."_query_name>$query_name</".$protocol."_query_name>";
	}
	if($installer != "" )
	{
		$template .= "<installer>$installer</installer>";
	}
	$template .= "
	<game_name>$game_name</game_name>
	<server_exec_name>$server_exec_name</server_exec_name>";
	if($query_diff != "" )
	{
		$template .= "
	<query_port type='add'>$query_diff</query_port>";
	}
	$template .= "
	<cli_template>%GAME_TYPE%$separator%IP%$separator%PORT%$separator%QUERY_PORT%$separator%MAP%$separator%PLAYERS%$separator%HOSTNAME%$separator%PID_FILE%</cli_template>
	<cli_params>  
	 <cli_param id='GAME_TYPE' cli_string='$game_type_cli' options='$cli_option'/>
	 <cli_param id='IP' cli_string='$ip_cli' options='$cli_option'/>
	 <cli_param id='PORT' cli_string='$port_cli' options='$cli_option'/>
	 <cli_param id='QUERY_PORT' cli_string='$query_port_cli' options='$cli_option'/>
	 <cli_param id='MAP' cli_string='$map_cli' options='$cli_option'/>
	 <cli_param id='PLAYERS' cli_string='$players_cli' options='$cli_option'/>
	 <cli_param id='HOSTNAME' cli_string='$hostname_cli' options='$cli_option'/>
	 <cli_param id='PID_FILE' cli_string='$pid_file_cli' options='$cli_option' />
	</cli_params>";
	if($map_location != "" )
	{
		$template .= "
	<maps_location>$map_location</maps_location>";
	}
	if($maplist_file != "" )
	{
		$template .= "
	<map_list>$maplist_file</map_list>";
	}
	if($exec_path != "" )
	{
		$template .= "
	<exe_location>$exec_path</exe_location>";
	}
	if($max_players_amount != "" )
	{
		$template .= "
	<max_user_amount>$max_players_amount</max_user_amount>";
	}
	if($control_protocol != "" )
	{
		$template .= "
	<control_protocol>$control_protocol</control_protocol>";
	}
	if($control_protocol_type != "" )
	{
		$template .= "
	<control_protocol_type>$control_protocol_type</control_protocol_type>";

	}
	$template .= "
	<mods>";

	if(!isset($_SESSION['mods']))
	{
		$_SESSION['mods'][1]['mod_name'] = "none";
		$_SESSION['mods'][1]['mod_key'] = $key_name;
		$_SESSION['mods'][1]['mod_installer_name'] = $key_name;
	}
	$mods = $_SESSION['mods'];
	foreach($mods as $mod)
	{
		$template .= "
	 <mod key='".$mod['mod_key']."'>
	  <name>".$mod['mod_name']."</name>
	  <installer_name>".$mod['mod_installer_name']."</installer_name>
	 </mod>";
	}
	unset($_SESSION['mods']);
	$template .= "
	</mods>";
	if(isset($_SESSION['params']))
	{
		$template .= "
	<server_params>";
		$params = $_SESSION['params'];
		foreach($params as $param)
		{
			$template .= "
	 <param key='".$param['param_key']."' type='".$param['param_type']."'>
	  <option>".$param['no_space']."</option>
	  <default>".$param['default']."</default>
	  <caption>".$param['caption']."</caption>
	  <desc>".$param['description']."</desc>
	 </param>";
		}
		unset($_SESSION['params']);
		$template .= "
	</server_params>";
	}
	$template .= "
	</game_config>
	";
	$myXML = "modules/config_games/server_configs/".$key_name."_".$os.$arch.".xml";
	echo "<b>".$myXML."</b>";
	echo "<xmp>".$template."</xmp>";
	$myXML = "modules/config_games/server_configs/".$key_name."_".$os.$arch.".xml";
	$fh = fopen($myXML, 'w') or die("No Write Permission.");
	fwrite($fh, $template);
	fclose($fh);
}