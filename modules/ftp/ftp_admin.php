<script type="text/javascript" src="js/modules/ftp.js"></script>
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
	include('includes/lib_remote.php');
	
	global $db;
	global $view;
	
	if(isset($_POST['add_ftp_user']))
	{
		$success = true;
		$server_row = $db->getRemoteServer($_POST['remote_server_id']);
		$remote = new OGPRemoteLibrary($server_row['agent_ip'],$server_row['agent_port'],$server_row['encryption_key'],$server_row['timeout']);
		$post_ftp_login = strip_real_escape_string($_POST['ftp_login']);		
		$post_ftp_password = strip_real_escape_string($_POST['ftp_password']);
		$post_full_path = strip_real_escape_string($_POST['full_path']);
		$host_stat = $remote->status_chk();
		
		// Validation
		if(strlen($post_ftp_login) > 20){
			print_failure( get_lang("ftp_account_username_too_long") );
			$success = false;
		}
		
		if(strlen($post_ftp_password) > 20){
			print_failure( get_lang("ftp_account_password_too_long") );
			$success = false;
		}
		
		$ftp_accounts_list = $remote->ftp_mgr("list");
		$ftp_accounts = explode("\n",$ftp_accounts_list);
		$user_exists = FALSE;
		foreach($ftp_accounts as $ftp_account)
		{
			if( $ftp_account != "" )
			{
				list($ftp_login, $ftp_path) = explode("\t",$ftp_account);
				$ftp_login = trim($ftp_login);
				if ($ftp_login == $post_ftp_login)
				{
					$user_exists = TRUE;
					break;
				}
			}
		}
		
		if( $user_exists === TRUE )
		{
			print_failure( get_lang("ftp_account_already_exists") );
		}
		else
		{
			if($success)
				$remote->ftp_mgr("useradd", $post_ftp_login, $post_ftp_password, $post_full_path);
		}
	}

	if(isset($_POST['del_ftp_user_y']))
	{
		$ftp_login = strip_real_escape_string($_POST['ftp_login']);
		$server_row = $db->getRemoteServer($_POST['remote_server_id']);
		$remote = new OGPRemoteLibrary($server_row['agent_ip'],$server_row['agent_port'],$server_row['encryption_key'],$server_row['timeout']);

		$remote->ftp_mgr("userdel", $ftp_login);

		$home_info = $db->getHomeByFtpLogin($server_row['remote_server_id'], $ftp_login);
		$db->changeFtpStatus('disabled',$home_info['home_id']);
	}

	if(isset($_POST['edit_ftp_user']))
	{
		$server_row = $db->getRemoteServer($_POST['remote_server_id']);
		$remote = new OGPRemoteLibrary($server_row['agent_ip'],$server_row['agent_port'],$server_row['encryption_key'],$server_row['timeout']);
		$ftp_login = strip_real_escape_string($_POST['ftp_login']);
		$settings = "";
		foreach($_POST as $key => $value)
		{
			if ($key != "edit_ftp_user" and $key != "ftp_login" and $key != "remote_server_id")
			{
				$clean_value = strip_real_escape_string($value);
				$account_settings .= "$key\t$clean_value\n";
			}
		}
		$remote->ftp_mgr("usermod", $ftp_login, $account_settings );
	}

	echo "<h2>" . get_lang("ftp_admin") . "</h2>";
	
	$servers = $db->getRemoteServers();

	if ($servers !== false) {
		echo "<tr><td colspan='3' >
			<form method=POST >
			<table class='center' style='width:100%' ><tr>
			<td>". get_lang("remote_server") ." <select style='width:250px' name='remote_server_id' >";

		foreach ( $servers as $server_row )
		{
			$display_ip = checkDisplayPublicIP($server_row['display_public_ip'],$server_row['agent_ip']);
			echo "<option value='" . $server_row['remote_server_id'] . "' >" . $server_row['remote_server_name'] . " (" . $display_ip . ":" . $server_row['agent_port'] . ")</option>";
		}
		echo "</select>
				</td>
				<td>". get_lang("login") ."<input type=text name='ftp_login' /></td>
				<td>". get_lang("password") ."<input type=text name='ftp_password' /></td>
				<td>". get_lang("full_path") ."<input type=text name='full_path' /></td>
			  </tr>
			  <tr>
				<td colspan=4 ><input style='width:100%;' type=submit name='add_ftp_user' value='". get_lang("add_ftp_account") ."' /></td>
			  </tr>
			 </table>
			 </form>
			 </td></tr>";
	?>
	<table id="servermonitor" class="tablesorter" data-sortlist='[[2,0]]'>
				<thead> 
				<tr> 
					<th class="header sorter-false"></th><th><?php print_lang('remote_server'); ?></th><th><?php print_lang('login'); ?></th><th><?php print_lang('server_name'); ?></th><th><?php print_lang('full_path'); ?></th> 
				</tr> 
				</thead> 
				<tbody>
	<?php		
		foreach ( $servers as $server_row )
		{
			$display_ip = checkDisplayPublicIP($server_row['display_public_ip'],$server_row['agent_ip']);
			$remote = new OGPRemoteLibrary($server_row['agent_ip'],$server_row['agent_port'],$server_row['encryption_key'],$server_row['timeout']);

			$host_stat = $remote->status_chk();
			
			$status = ( $host_stat === 0 or  $host_stat === -1 ) ? "<span class='failure'>". get_lang("offline") ."</span>" : "<span class='success'>". get_lang("online") ."</span>";
					
			if( $host_stat === 1)
			{			
				$ftp_accounts_list = $remote->ftp_mgr("list");
				$ftp_accounts = explode("\n", $ftp_accounts_list);
				foreach($ftp_accounts as $ftp_account)
				{
					if( !empty($ftp_account))
					{
						list($ftp_login, $ftp_path) = explode("\t", $ftp_account);
						$ftp_login = trim($ftp_login);
						$home_info = $db->getHomeByFtpLogin($server_row['remote_server_id'], $ftp_login);
						$expandme = ( ( isset($_POST['ftp_login']) and $ftp_login == strip_real_escape_string($_POST['ftp_login']) ) AND ( isset($_POST['remote_server_id']) and $home_info['remote_server_id'] == $_POST['remote_server_id'] ) ) ? "expandme" : "";
						$home_name = isset( $home_info['home_name'] ) ? $home_info['home_name'] : $ftp_path;
						echo "<tr class='maintr $expandme'><td class='collapsible' ></td><td>".$server_row['remote_server_name']." (".$display_ip.")</td><td><b class='failure' >$ftp_login</td><td>" . htmlentities($home_name) . "</td><td>$ftp_path</td></tr>
							  <tr class='expand-child' ><td colspan='4' >
							  <form method=POST >
							  <table>";
							  
						$account_details = $remote->ftp_mgr("show",$ftp_login);
						
						$ftp_account_detail_list = explode("\n",$account_details);
											
						foreach($ftp_account_detail_list as $detail_line)
						{
							if( !empty($detail_line))
							{
								list($key,$value) = explode(" : ",$detail_line);
								$key = trim($key);
								$value = trim($value);
								$blacklist = array("Login", "Password", "UID", "GID", "ftp_user_id", "username", 
												   "username_prefix", "password", "sys_userid", "sys_groupid", 
												   "sys_perm_user", "sys_perm_group", "sys_perm_other", 
												   "server_id", "parent_domain_id", "uid", "gid" );
								if( in_array($key, $blacklist) )
									continue;
								if(substr($value, -1) == ')')
								{
									$value_parts = explode(" ", $value);
									if(is_numeric($value_parts[0]))
									{
										if(count($value_parts) > 1)
										{
											$value = array_shift($value_parts);
											$advert = implode(" ", $value_parts);
										}
									}
									else
									{
										$first_pos = array_shift($value_parts);
										$parts = preg_split('/:|-/', $first_pos);
										if(count(array_filter($parts, 'is_numeric') === 2))
										{
											$value = $first_pos;
											$advert = implode(" ", $value_parts);
										}
									}
								}
								if ($key == "Allowed local  IPs" or $key == "ul_ratio" or $key == "ForceSsl" or ( count($ftp_account_detail_list) == 4 and $key == "Directory" ) )
									echo "</table>\n</td><td>\n<table>\n";
								if ($key == "Directory" )
									$value = str_replace( "/./", "", $value );
								if($key == "Username")
									$readOnly = true;
								echo "<tr><td>$key</td><td>
										  <input type=text name='$key' value='$value' ";
								
								if(isset($readOnly) && ($readOnly)){
									echo "readonly ";
								}
								if(isset($advert))
									echo "/>".
										 "</td><td>$advert</td></tr>\n";
								else
									echo "/>".
										 "</td></tr>\n";
								unset($readOnly, $key, $value, $advert);
							}
						}
						echo "<tr>
								<td colspan='2' >
								 <center>
								  <input type=hidden name='remote_server_id' value='".$server_row['remote_server_id']."'/>
								  <input type=hidden name='ftp_login' value=\"" . str_replace('"', '&quot;', $ftp_login) . "\"/>
								  <input type=submit name='edit_ftp_user' value='". get_lang("change_account_details") ."' />
								 </center>
								</td>
								<td>
								   <input type='image' name='del_ftp_user' onsubmit='submit-form();' src='modules/administration/images/remove.gif'>". get_lang("remove_account") ."</input>
								</td>
							  </tr>
							 </table>
							 </form>
							 </td>
							</tr>";
					}
					
				}
			}	// end: host_stat === 1
			
		}	// end: foreach $servers as $server_row

	} else {
		echo get_lang('no_remote_servers');
	}
	echo "</tbody>";	
	echo "</table>\n";
}
