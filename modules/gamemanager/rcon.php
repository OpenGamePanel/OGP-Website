<table>
  <tr>
   <td>
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

function send_command($command, $remote, $server_xml, $home_info, $home_id, $ip, $port )
{
	if( $server_xml->gameq_query_name and $server_xml->gameq_query_name == "minecraft" )
	{
		include_once("MinecraftRcon.class.php");
		$server_properties_file = clean_path($home_info['home_path']."/server.properties");
		$retval = $remote->remote_readfile($server_properties_file, $data);
		if($retval == 1 and strpos($data, 'rcon.port') !== FALSE)
		{
			$server_properties = parse_ini_string($data);
			$rcon_port = $server_properties['rcon.port'];
		}
		else
		{
			$rcon_port = $port+10;
		}
		$rcon = new MinecraftRcon;
		if( $rcon->Connect($ip, $rcon_port, $home_info['control_password']) )
		{
			$return = $rcon->Command($command);
			if($return)
				return $return;
			else
				return FALSE;
			$rcon->Disconnect();
		}
		else
			return get_lang("need_set_remote_pass") . " " . $home_info['home_name'] . " " . get_lang("before_sending_rcon_com");
	}
	elseif( $server_xml->lgsl_query_name and  $server_xml->lgsl_query_name == "7dtd" )
	{
		$query_port = $port + 1;
		$return = $remote->exec('exec 3<>/dev/tcp/'.$ip.'/'. $query_port .' && echo -en "'.$command.'\\nexit\\n" >&3 && cat <&3');
		if(preg_match("/Connected with 7DTD server/",$return))	
			return $return;
		else
			return FALSE;
	}
	else
	{
		$remote_retval = $remote->remote_send_rcon_command( $home_id, $ip, $port, $server_xml->control_protocol, $home_info['control_password'],$server_xml->control_protocol_type,$command,$return);
		if ( $remote_retval === 1 )
			return $return;
		elseif ( $remote_retval === -10 )
			return get_lang("need_set_remote_pass") . " " . $home_info['home_name'] . " " . get_lang("before_sending_rcon_com");
		else
			return FALSE;
	}
}

if(isset($_POST['command']) and !is_array($_POST['command'])) 
	$_POST['command'] = array( '0' => stripcslashes($_POST['command']) );
elseif(isset($_POST['base64_command']))
{
	foreach($_POST['base64_command'] as $key => $command)
	{
		$_POST['command'][$key] = isset($_POST['input']) ?  str_replace("%input%", $_POST['input'], base64_decode($command)) : base64_decode($command);
	}
}

$presets = $db->getRconPresets($home_info['home_cfg_id'],$home_info['mods'][$mod_id]['mod_cfg_id']);
if($presets > 0)
{
	echo '<form action="" method="post">'.
		  get_lang("rcon_presets") . ':
		  <select onchange="this.form.submit()" name="command" >
		  <option></option>\n';
	foreach ($presets as $preset)
	{
		echo '<option value="'.$preset['command'].'" >'.$preset['name'].'</option>\n';
	}
	echo '<input type="hidden" name="remote_send_rcon_command" value="">';
	echo '</form>';
}
?>
  </td>
 </tr>
</table>
<table class="center" >
 <tr>
  <td>
	<?php echo get_lang("rcon_command_title"); ?></td>
  <td>
	<form method="post">
	<input class="rcon" type="text" name="command" size="200" style="width:98%;" value='<?php 
	if( isset($_POST['command']) )
		echo htmlentities($_POST['command'][0]);
	?>' />
  </td>
  <td>
	  <input type="submit" name="remote_send_rcon_command" value="<?php print_lang('send_command'); ?>" />
	</form>
  </td>
 </tr>
</table>
<?php
if(isset($_POST['remote_send_rcon_command']))
{
	$response = "";
	foreach($_POST['command'] as $command)
	{
		$ret = send_command($command, $remote, $server_xml, $home_info, $home_id, $ip, $port );
		if(!$ret)
		{
			$response = FALSE;
			break;
		}
		else
			$response .= $ret;
	}
	if($response)
	{
		echo "<div class='bloc' ><h4>" . get_lang("rcon_command_title") . ": [" . htmlentities(implode(" | ", $_POST['command'])) . "] " .
			 get_lang("has_sent_to") . " " . $home_info['home_name'] . "</h4><xmp style='overflow:auto;' >" . 
			 $response . "</xmp></div>";
	}
}

if($server_xml->list_players_command)
{
	if(isset($_GET['view_player_commands']))
	{
		$response = send_command($server_xml->list_players_command, $remote, $server_xml, $home_info, $home_id, $ip, $port );
		if($response and $response != "")
		{
			preg_match_all($server_xml->player_info_regex, $response, $matches);
			if(!empty($matches[0]))
			{
				$data = array();
				$infos = array();
				$commands = array();
				foreach($server_xml->player_info->index as $index )
				{
					$i = 0;
					$key = (string)$index['key'];
					$name = (string)$index;
					$infos[] = $name;
					foreach($matches[$key] as $info)
					{
						$data[$i][$name] = $info;
						$i++;
					}
				}

				foreach($server_xml->player_commands->command as $command)
				{
					$name = (string)$command['key'];
					$commands[] = $name;
					$default = (string)$command->default ? (string)$command->default : "";
					$options = array();
					if($command->option)
					{
						foreach($command->option as $option)
							$options[(string)$option] = (string)$option['value'];
					}
					
					$actions = array();
					$replacements = array();
					foreach($command->string as $action)
					{
						preg_match_all("#%(\w*)%#", (string)$action, $replace);
						$replacements[] = $replace;
						$actions[] = (string)$action;
					}
					
					$replaced_actions = array();
					for($id = 0; $id < $i; $id++)
					{
						foreach($actions as $key => $action)
						{
							foreach($replacements[$key][1] as $index)
							{
								if(isset($data[$id][$index]) and $index != 'input')
								{
									$action = str_replace("%$index%", $data[$id][$index], $action);
								}
							}
							$replaced_actions[$key] = base64_encode($action);
						}
						$data[$id]['commands'][$name] = array('actions' => $replaced_actions,
															  'type'    => (string)$command['type'],
															  'default' => $default,
															  'options' => $options);
					}
					unset($actions);
				}					
				$headers = array_merge( $infos, $commands );
				$player_actions_table = "<table class='center'>\n<thead>\n<tr>";
				foreach($headers as $name)
				{
					$player_actions_table .= "<th>$name</th>";
				}
				
				$player_actions_table .= "</tr>\n</thead>\n<tbody>\n";
				foreach($data as $player)
				{
					$player_actions_table .= "<tr>\n";
					foreach($infos as $info)
					{
						$player_actions_table .= "<td>".htmlentities($player[$info])."</td>\n";
					}
					foreach($commands as $command)
					{
						$actions = $player['commands'][$command]['actions'];
						$type    = $player['commands'][$command]['type'];
						$default = $player['commands'][$command]['default'];
						$options = $player['commands'][$command]['options'];
						/* echo "<xmp>";
						print_r($player['commands'][$command]['actions']);
						echo "</xmp><br>"; */
						$player_actions_table .= "<td>\n<form method='post'>\n";
						if($type == 'hidden')
						{
							foreach($actions as $key => $action)
								$player_actions_table .= "<input type='hidden' name='base64_command[$key]' value='$action'/>\n";
						}
						elseif($type == 'text')
						{
							foreach($actions as $key => $action)
								$player_actions_table .= "<input type='hidden' name='base64_command[$key]' value='$action'/>\n";
							$player_actions_table .= "<input type='text' name='input' value='$default'/>\n";
						}
						elseif($type == 'select')
						{
							foreach($actions as $key => $action)
								$player_actions_table .= "<input type='hidden' name='base64_command[$key]' value='$action'/>\n";
							$player_actions_table .= "<select name='input'>";
							foreach($options as $key => $value)
							{
								$player_actions_table .= "<option value='$value' >$key</option>";
							}
							$player_actions_table .= "<select name='input'>";
						}
						$player_actions_table .= "<input type='submit' name='remote_send_rcon_command' value='$command'/>\n".
												 "</form>\n</td>\n";
					}
					$player_actions_table .= "</tr>\n";
				}
				$player_actions_table .= "</tbody>\n</table>\n";
				echo $player_actions_table;
			}
			else
				print_failure( get_lang("no_online_players") );
		}
		echo "<form method='GET' >".
			 "<input type='hidden' name='m' value='gamemanager' />".
			 "<input type='hidden' name='p' value='log' />".
			 "<input type='hidden' name='home_id-mod_id-ip-port' value='" . $_GET['home_id-mod_id-ip-port'] . "' />";
		if(isset($_GET['setInterval']))
			echo "<input type='hidden' name='setInterval' value='" . $_GET['setInterval'] . "' />";
		if(isset($_GET['size']))
			echo "<input type='hidden' name='size' value='" . $_GET['size'] . "' />";
		echo "<input type='submit' name='hide_player_commands' value='" . get_lang("hide_player_commands") . "' />".
			 "</form>";
	}
	else
	{
		echo "<form method='GET' >".
			 "<input type='hidden' name='m' value='gamemanager' />".
			 "<input type='hidden' name='p' value='log' />".
			 "<input type='hidden' name='home_id-mod_id-ip-port' value='" . $_GET['home_id-mod_id-ip-port'] . "' />";
		if(isset($_GET['setInterval']))
			echo "<input type='hidden' name='setInterval' value='" . $_GET['setInterval'] . "' />";
		if(isset($_GET['size']))
			echo "<input type='hidden' name='size' value='" . $_GET['size'] . "' />";
		echo "<input type='submit' name='view_player_commands' value='" . get_lang("view_player_commands") . "' />".
			 "</form>";
	}
}
?>
