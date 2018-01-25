<script type="text/javascript" src="js/jquery/plugins/jquery.numeric.js"></script>
<script type="text/javascript" src="js/modules/server.js"></script>
<?php
function exec_ogp_module()
{		
	global $db,$view;
		
	if( isset( $_GET['rserver_id'] ) and $_GET['rserver_id'] != "" )
	{
		$remote_server_ips = $db->getRemoteServerIPs($_GET['rserver_id']);
		
		if(!empty($remote_server_ips))
		{
			if(isset( $_GET['ip_id'] ) and $_GET['ip_id'] != "")
			{
				$ip = $db->getIpById($_GET['ip_id']);
				echo "<h2>".get_lang_f('assign_new_ports_range_for_ip',$ip)."</h2>";
				if(isset($_POST['assign_range']))
				{
					if($_POST['home_cfg_id'] != "0")
						$cfg_info = $db->getGameCfg($_POST['home_cfg_id']);
					else
						$cfg_info['game_name'] = get_lang("unspecified_game_types");
						
					$retval = $db->addPortsRange($_POST['ip_id'],$_POST['home_cfg_id'],$_POST['start_port'],$_POST['end_port'],$_POST['port_increment']);
					if($retval === 1)
						print_failure( get_lang("invalid_values") );
					elseif($retval === 2)
						print_failure( get_lang("ports_in_range_already_arranged") );
					elseif($retval)
						print_success(get_lang_f('ports_range_added_successfull_for',$cfg_info['game_name']));
					else
						print_failure(get_lang_f('ports_range_already_configured_for',$cfg_info['game_name']));
				
					$view->refresh('?m=server&p=arrange_ports&rserver_id='.$_GET['rserver_id'].'&ip_id='.$_GET['ip_id'],3);
				}
				$game_homes = $db->getIpPorts( $_GET['ip_id'] );
				$game_cfgs = $db->getGameCfgs();
				//
				require_once('includes/lib_remote.php');
				$rhost_id = $_GET['rserver_id'];
				$remote_server = $db->getRemoteServer($rhost_id);
				require_once('includes/lib_remote.php');
				$remote = new OGPRemoteLibrary($remote_server['agent_ip'],$remote_server['agent_port'],$remote_server['encryption_key'],$remote_server['timeout']);
				$host_stat = $remote->status_chk();
				if( $host_stat === 1)
					$os = $remote->what_os();
				else
				{
					print_failure(get_lang_f("caution_agent_offline_can_not_get_os_and_arch_showing_servers_for_all_platforms"));
					$os = "Unknown OS";
				}
				
				echo "<form method='POST' action=''>\n
					  <input type='hidden' name='ip_id' value='". $_GET['ip_id'] . "' />\n
					  <table>\n
					  <tr>\n
					  <td>\n
					  <select name='home_cfg_id'>\n
					  <option style='background:black;color:white;' value='0'>". get_lang("unspecified_game_types") ."</option>\n";
					  
				echo "<b>". get_lang("assign_range_to_game_type") .":</b>";
				// Linux 64 bits + wine
				if( preg_match("/Linux/", $os) AND preg_match("/64/", $os) AND preg_match("/wine/", $os) )
				{
					foreach ( $game_cfgs as $row )
					{
						if ( preg_match("/linux/", $row['game_key']) )
						echo "<option value='".$row['home_cfg_id']."'>".$row['game_name'];
						if ( preg_match("/64/", $row['game_key']) ) echo " (64 bit)";
						echo "</option>\n";
					}
					echo "<option style='background:black;color:white;' value=''>". get_lang("wine_games") .":</option>\n";
					foreach ( $game_cfgs as $row )
					{
						if ( preg_match("/win/", $row['game_key']) )
						echo "<option value='".$row['home_cfg_id']."'>".$row['game_name'];
						if ( preg_match("/64/", $row['game_key']) ) echo " (64 bit)";
						echo "</option>\n";
					}
				}
				// Linux 64 bits
				elseif( preg_match("/Linux/", $os) AND preg_match("/64/", $os) )
				{
					foreach ( $game_cfgs as $row )
					{
						if ( preg_match("/linux/", $row['game_key']))
						echo "<option value='".$row['home_cfg_id']."'>".$row['game_name'];
						if ( preg_match("/64/", $row['game_key']) ) echo " (64 bit)";
						echo "</option>\n";
					}
				}
				// Linux 32 bits + wine
				elseif( preg_match("/Linux/", $os) AND preg_match("/wine/", $os) )
				{ 
					foreach ( $game_cfgs as $row )
					{
						if ( preg_match("/linux32/", $row['game_key']) )
						echo "<option value='".$row['home_cfg_id']."'>".$row['game_name']."</option>\n";
					}
					echo "<option style='background:black;color:white;' value=''>". get_lang("wine_games") ."</option>\n";
					foreach ( $game_cfgs as $row )
					{
						if ( preg_match("/win32/", $row['game_key']) )
						echo "<option value='".$row['home_cfg_id']."'>".$row['game_name']."</option>\n";
					}
				}
				// Linux 32 bits
				elseif( preg_match("/Linux/", $os) )
				{ 
					foreach ( $game_cfgs as $row )
					{
						if ( preg_match("/linux32/", $row['game_key']) )
						echo "<option value='".$row['home_cfg_id']."'>".$row['game_name']."</option>\n";
					}
				}
				// Windows 64 bits (CYGWIN)
				elseif( preg_match("/CYGWIN/", $os) AND preg_match("/64/", $os))
				{
					foreach ( $game_cfgs as $row )
					{
						if ( preg_match("/win/", $row['game_key']) )
						echo "<option value='".$row['home_cfg_id']."'>".$row['game_name'];
						if ( preg_match("/64/", $row['game_key']) ) echo " (64 bit)";
						echo "</option>\n";
					}
				}
				// Windows 32 bits (CYGWIN)
				elseif( preg_match("/CYGWIN/", $os))
				{
					foreach ( $game_cfgs as $row )
					{
						if ( preg_match("/win32/", $row['game_key']) )
						echo "<option value='".$row['home_cfg_id']."'>".$row['game_name']."</option>\n";
					}
				}
				elseif ( $os == "Unknown OS" )
				{
					foreach ( $game_cfgs as $row )
					{
						echo "<option value='".$row['home_cfg_id']."'>".$row['game_name'];
						if ( preg_match("/64/", $row['game_key']) ) echo " (64 bit)";
						echo "</option>\n";
					}
				}
				echo "</select>\n
					  </td>\n
					  <td>\n".
					   get_lang("start_port") .
					  "<input type='text' id='start_port' name='start_port' class='add' size='8' />\n
					   </td>\n
					   <td>\n".
					    get_lang("end_port") .
					  "<input type='text' id='end_port' name='end_port' class='add' size='8' />\n
					   </td>\n
					   <td>\n
					   ".
					    get_lang("port_increment") .
					  "<input type='text' id='port_increment' name='port_increment' class='add' value='1' size='2' />\n
					   </td>\n
					   <td>\n
					   ".
					    get_lang("total_assignable_ports") ."\t<span id='total_assignable_ports' class='add'></span>\n
					   </td>\n
					   <td>\n".
					  "<input type='submit' name='assign_range' value='". get_lang("assign_range") ."' />\n
					   </td>\n 
					   </tr>\n 
					   </table>\n
					   </form>\n";
				
				
				echo "<h2>".get_lang_f('assigned_port_ranges_for_ip',$ip)."</h2>";
				//
				if(isset($_POST['delete_range']))
				{
					if($db->delPortsRange($_POST['range_id']))
						print_success( get_lang("ports_range_deleted_successfull") );
					else
						print_failure( get_lang("failed_to_delete_ports_range") );
					$view->refresh('?m=server&p=arrange_ports&rserver_id='.$_GET['rserver_id'].'&ip_id='.$_GET['ip_id'],3);
				}
				if(isset($_POST['edit_range']))
				{
					if($_POST['home_cfg_id'] != "0")
						$cfg_info = $db->getGameCfg($_POST['home_cfg_id']);
					else
						$cfg_info['game_name'] = get_lang("unspecified_game_types");
					
					$retval = $db->editPortsRange($_POST['range_id'],$_POST['ip_id'],$_POST['start_port'],$_POST['end_port'],$_POST['port_increment']);
					if($retval === 1)
						print_failure( get_lang("invalid_values") );
					elseif($retval === 2)
						print_failure( get_lang("ports_in_range_already_arranged") );
					elseif($retval)
						print_success(get_lang_f('ports_range_edited_successfull_for',$cfg_info['game_name']));
					else
						print_failure(get_lang_f('ports_range_already_configured_for',$cfg_info['game_name']));
					$view->refresh('?m=server&p=arrange_ports&rserver_id='.$_GET['rserver_id'].'&ip_id='.$_GET['ip_id'],3);
				}
				$ranges = $db->getPortsRange($_GET['ip_id']);
				if(!empty($ranges))
				{
					echo "<table>\n";
					foreach($ranges as $range)
					{
						if($range['home_cfg_id'] != "0")
							$cfg_info = $db->getGameCfg($range['home_cfg_id']);
						else
							$cfg_info['game_name'] = get_lang("unspecified_game_types");
							
						
						$available_ports_amount = intval((($range['end_port'] - $range['start_port']) / $range['port_increment']) + 1);
						
						$usable_range_ports = array();
						for($port = $range['start_port']; $port >= $range['start_port'] and $port <= $range['end_port']; $port+=$range['port_increment'])
						{
							$usable_range_ports[] = $port;
						}
						
						$used_ports = array();
						if(!empty($game_homes))
						{
							foreach($game_homes as $game_home)
							{
								$used_ports[] = $game_home['port'];
							}
						}
						
						if(!empty($used_ports))
						{
							foreach($used_ports as $used_port)
							{
								if(in_array($used_port,$usable_range_ports))
									$available_ports_amount--;
							}
						}
						
						echo "<form method='POST' action=''>\n
							  <input type='hidden' name='range_id' value='". $range['range_id'] . "' />\n
							  <input type='hidden' name='ip_id' value='". $range['ip_id'] . "' />\n
							  <input type='hidden' name='home_cfg_id' value='". $range['home_cfg_id'] . "' />\n
							  <tr>\n
							   <td>\n".
							  $cfg_info['game_name'].
							  "</td>\n
							   <td>\n".
								 get_lang("start_port") .
								"<input type='text' id='start_port' name='start_port' value='".$range['start_port']."' size='8' />\n
							   </td>\n
							   <td>\n".
								 get_lang("end_port") .
								"<input type='text' id='end_port' name='end_port' value='".$range['end_port']."' size='8' />\n
							   </td>\n
							   <td>\n".
								 get_lang("port_increment") .
								"<input type='text' id='port_increment' name='port_increment' value='".$range['port_increment']."' value='1' size='2' />\n
							   </td>\n
							   <td>\n".
								 get_lang("available_range_ports") .
								"\t<span id='available_range_ports'>".$available_ports_amount."</span>\n
							   </td>\n
							   <td>\n
								<input type='submit' name='edit_range' value='". get_lang("edit_range") ."' />\n
								<input type='submit' name='delete_range' value='". get_lang("delete_range") ."' />\n
							   </td>\n 
							  </tr>\n 
						   </form>\n";
					}
					echo "</table>\n";
				}
				echo "<h2>".get_lang_f('assigned_ports_for_ip',$ip)."</h2>";
				if(!empty($game_homes))
				{
					echo "<table class='center'>";
					echo "<tr><th>". get_lang("home_id") ."</th><th>". get_lang("home_path") ."</th><th>". get_lang("game_type") ."</th><th>". get_lang("server_name") ."</th><th>". get_lang("port") ."</th></tr>";
					foreach($game_homes as $game_home)
					{
						echo "<tr><td>".$game_home['home_id']."</td><td>".$game_home['home_path']."</td><td>".$game_home['game_name']."</td><td>".htmlentities($game_home['home_name'])."</td><td>".$game_home['port']."</td></tr>";
					}
					echo "</table>";
				}
			}
		}
		else
		{
			echo "There are no IPs assigned to the selected remote server.";
			return;
		}
		echo create_back_button('server','edit&rhost_id='.$_GET['rserver_id'].'&edit');
	}
}
?>
