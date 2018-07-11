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
	if (!isset($_GET['param_num']))
		$param_num = 0;
	else
		$param_num = $_GET['param_num'] + 1;
		
	if(isset($_POST['add_param']))
	{
		
		$_SESSION['params'][$param_num]['param_key'] = $_POST['param_key'];
		$_SESSION['params'][$param_num]['param_type'] = $_POST['param_type'];
		$_SESSION['params'][$param_num]['no_space'] = $_POST['no_space'];
		$_SESSION['params'][$param_num]['default'] = $_POST['default'];
		$_SESSION['params'][$param_num]['caption'] = $_POST['caption'];
		$_SESSION['params'][$param_num]['description'] = $_POST['description'];
		
	}
	@$params = $_SESSION['params'];

	if ($params)
	{
		$template = "";
		foreach($params as $param)
		{
			$template .= $param['param_key'];
		}
		echo "<p><b>Added Params:</b>".$template."</p>";
	}
	?>
	<table BORDER=1>
	
	<?php 
	if( isset( $_POST['create'] ) )
	{
		?>
		<form action="home.php?m=config_games&p=create&type=cleared" method="POST">
		<?php 
	}
	else
	{
		?>
		<form action="?m=config_games&p=set_params&type=cleared&param_num=<?php echo $param_num; ?>" method="POST">
		<?php 
	}
	?>
	<input type="hidden" name="set_mods"/>
	<?php
	echo $main_params_inputs;
	if(isset($_POST['add_params']))
	{
	?>
	<tr>
	 <td>
	  Set Params
	 </td> 
	<input type='hidden' name='set_mods'/>
	</tr>
	<tr>
	 <td>
	  Server Param #<?php echo $param_num; ?>
	 </td>
	</tr>
	<tr>
	 <td>
	  Param Variable
	 </td>
	 <td>
	  <input type="text" name="param_key" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  Param Input type
	 </td>     
	 <td>
	  <select name="param_type">
	   <option value="checkbox_key_value">Checkbox</option>
	   <option value="text">Text</option>
	  </select>
	 </td>
	</tr>
	<tr>
	 <td>
	  Option<br>
	  (Spaces between variables and values?)
	 </td>
	 <td>
	  <select name="no_space">
	   <option value="">With Spaces</option>
	   <option value="ns">Without Spaces</option>
	  </select>
	 </td>
	</tr>
	<tr>
	 <td>
	  Default Value
	 </td>
	 <td>
	  <input type="text" name="default" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  Param Title
	 </td>
	 <td>
	  <input type="text" name="caption" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  Param Description
	 </td>
	 <td>
	  <input type="text" name="description" value=""/>
	 </td>
	</tr>
	<tr>
	 <td>
	  <input type="submit" name="add_param" value="Add Param"/>
	  <input type="submit" name="create" value="Create XML Config"/>
	 </td>
	 </form>
	</tr>
		<?php
	}
	else
	{
		?>
	<tr>
	 <td>
	  <input type="submit" name="add_params" value="Add Params"/>
	  <input type="submit" name="create" value="Continue"/>
	  </td>
	 </form>
	</tr>
		<?php
	}
	?>
	</table>
<?php
}
