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

	if (!isset($_GET['mod_num']))
		$mod_num = 0;
	else
		$mod_num = $_GET['mod_num'] + 1;
		
	if(isset($_POST['add_mod']))
	{
		$_SESSION['mods'][$mod_num]['mod_name'] = $_POST['mod_name'];
		$_SESSION['mods'][$mod_num]['mod_key'] = $_POST['mod_key'];
		$_SESSION['mods'][$mod_num]['mod_installer_name'] = $_POST['mod_installer_name'];
	}
	@$mods = $_SESSION['mods'];
	$template = "";
	if ($mods)
	{
		foreach($mods as $mod)
		{
			$template .= " ";
			$template .= $mod['mod_name'];
		}
		echo "<p><b>Added Mods:</b>".$template."</p>";
	}
	?>
	<table BORDER=1>
	<?php 
	if( isset( $_POST['set_mods'] ) )
	{
		?>
		<form action="home.php?m=config_games&p=set_params&type=cleared" method="POST">
		<?php 
	}
	else
	{
		?>
		<form action="home.php?m=config_games&p=set_mods&type=cleared&mod_num=<?php echo $mod_num; ?>" method="POST">
		<?php 
	}
	?>
	<input type="hidden" name="main_params"/>
	<?php
	echo $main_params_inputs;
	if(isset($_POST['add_mods']))
	{
		?>
		<tr>
		 <td>
		  Set Mods
		 </td>
		 <td>
		</tr>
		<tr>
		 <td>
		  Mod #<?php echo $mod_num; ?>
		  <input type="hidden" name="mod_num" value="<?php echo $mod_num; ?>"/>
		 </td>
		</tr>
		<tr>
		 <td>
		  Mod Name
		 </td>
		 <td>
		  <input type="text" name="mod_name" value=""/>
		 </td>
		</tr>
		<tr>
		 <td>
		  Mod Key
		 </td>
		 <td>
		  <input type="text" name="mod_key" value=""/>
		 </td>
		</tr>
		<tr>
		 <td>
		  Mod Installer name
		 </td>
		 <td>
		  <input type="text" name="mod_installer_name" value=""/>
		 </td>
		</tr>
		<tr>
		 <td>
		  <input type="submit" name="add_mod" value="Add Mod"/>
		  <input type="submit" name="set_mods" value="Continue"/>
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
		  <input type="submit" name="add_mods" value="Add Mods"/>
		  <input type="submit" name="set_mods" value="Continue"/>
		   </td>
		 </form>
		</tr>
		<?php
	}
	?>
	</table>
	<?php
}