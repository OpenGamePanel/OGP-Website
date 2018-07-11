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
	@$main_params_inputs = "
	 <input type='hidden' name='arch' value='".$arch."'/>
	 <input type='hidden' name='os' value='".$os."'/>
	 <input type='hidden' name='protocol' value='".$protocol."'/>
	 <input type='hidden' name='query_name' value='".$query_name."'/>
	 <input type='hidden' name='installer' value='".$installer."'/> 
	 <input type='hidden' name='control_protocol_type' value='".$control_protocol_type."'/>
	 <input type='hidden' name='control_protocol' value='".$control_protocol."'/>
	 <input type='hidden' name='query_diff' value='".$query_diff."'/>
	 <input type='hidden' name='map_location' value='".$map_location."'/>
	 <input type='hidden' name='maplist_file' value='".$maplist_file."'/>
	 <input type='hidden' name='max_players_amount' value='".$max_players_amount."'/>
	 <input type='hidden' name='exec_path' value='".$exec_path."'/>
	 <input type='hidden' name='server_exec_name' value='".$server_exec_name."'/>
	 <input type='hidden' name='key_name' value='".$key_name."'/>
	 <input type='hidden' name='game_name' value='".$game_name."'/>
	 <input type='hidden' name='pid_file_cli' value='".$pid_file_cli."'/>
	 <input type='hidden' name='hostname_cli' value='".$hostname_cli."'/>
	 <input type='hidden' name='players_cli' value='".$players_cli."'/>
	 <input type='hidden' name='map_cli' value='".$map_cli."'/>
	 <input type='hidden' name='query_port_cli' value='".$query_port_cli."'/>
	 <input type='hidden' name='port_cli' value='".$port_cli."'/>
	 <input type='hidden' name='ip_cli' value='".$ip_cli."'/>
	 <input type='hidden' name='game_type_cli' value='".$game_type_cli."'/>
	 <input type='hidden' name='cli_option' value='".$cli_option."'/>
	 <input type='hidden' name='separator' value='".$separator."'/>
	 ";
	?>
	<table BORDER=1>
	<tr>
	<form action='home.php?m=config_games&p=set_mods&type=cleared' method='POST' name='xml_creator'>
	<?php
	echo $main_params_inputs;
	?>
	<td>
	<table BORDER=1>
	<tr>
	 <td>
	   Game name*:
	 </td>
	 <td>
	  <input type="text" name="game_name" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  Game key(short name)*:
	 </td>
	 <td>
	  <input type="text" name="key_name" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  Server executable file name*:
	 </td>
	 <td>
	  <input type="text" name="server_exec_name" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	   Server executable subfolder<br>(if applicable):
	 </td>
	 <td>
	   <input type="text" name="exec_path" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  MaxPlayer Amount:
	 </td>
	 <td>
	  <select name="max_players_amount">
	  <option value="">No Aplicable</option>
	  <?php
	  for ($maxplayers = 1; $maxplayers <= 1000; $maxplayers++){
	   echo "<option value='$maxplayers'>$maxplayers</option>";
	  }
	  ?>
	  </select>
	 </td>
	</tr>
	<tr>
	 <td>
	  Maplist file
	  <br>
	  (if applicable)
	 </td>
	 <td>
	  <input type="text" name="maplist_file" value=""/>
	 </td>
	<tr>
	 <td>
	   Maps subfolder
	   <br>
	   (if applicable)
	 </td>
	 <td>
	   <input type="text" name="map_location" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  Difference between Connection<br>Port and Query Port(if applicable):
	 </td>
	 <td>
	   <input type="text" name="query_diff" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  Control Protocol:
	 </td>
	 <td>
	  <select name="control_protocol">
	   <option value="">None</option>
	   <option value="rcon">HL/Quake/CoD Support</option>
	   <option value="rcon2">HL2/Source Support</option>
	   <option value="armabe">Arma 2 BattlEye Support</option>
	  </select>
	 </td>
	</tr>
	<tr>
	 <td>
	  Cotrol Protocol Type:
	 </td>
	 <td>
	  <select name="control_protocol_type">
	   <option value="">None</option>
	   <option value="old">Halflife old, Quake & CoD</option>
	   <option value="new">HalfLife newer than 1.1.0.6</option>
	  </select>
	 </td>
	</tr>
	</table>
	</td>
	<td>
	<table BORDER=1>
	<tr>
	 <td>
	   Startup CLI Variables:
	  </td>
	</tr>
	<tr>
	 <td>
	  Params should be joint or separate?
	 </td>
	 <td>
	  <select name="separator">
	   <option value=" ">Separated</option>
	   <option value="">Joint</option>
	  </select>
	 </td>
	</tr>
	<tr>
	 <td>
	  Param options
	 </td>
	 <td>
	  <select name="cli_option">
	   <option value="s">Separe variables from values</option>
	   <option value="q">Quote values</option>
	   <option value="sq">Separe && Quote values</option>
	   <option value="">None</option>
	  </select>
	 </td>
	</tr>
	<tr>
	 <td>
	  GAME TYPE
	 </td>
	 <td>
	  <input type="text" name="game_type_cli" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  IP
	 </td>
	 <td>
	  <input type="text" name="ip_cli" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  PORT
	 </td>
	 <td>
	  <input type="text" name="port_cli" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  QUERY PORT
	 </td>
	 <td>
	  <input type="text" name="query_port_cli" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  MAP
	 </td>
	 <td>
	  <input type="text" name="map_cli" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  PLAYERS
	 </td>
	 <td>
	  <input type="text" name="players_cli" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  HOSTNAME
	 </td>
	 <td>
	  <input type="text" name="hostname_cli" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  PID FILE
	 </td>
	 <td>
	  <input type="text" name="pid_file_cli" value=""/>
	 </td>
	</tr>
	</table>
	</td>
	</tr>
	 <tr>
	  <td>
	   <input type="submit" name="main_params"/>
	   </form>
	  </td>
	 </tr>
	</table>
	<?php
}