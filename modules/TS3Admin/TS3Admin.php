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
	$templates_folder = 'modules/TS3Admin/templates_c';
	if( is_writable( $templates_folder ) )
	{
		global $db,$settings;
		$isAdmin = $db->isAdmin( $_SESSION['user_id'] );

		if( isset($_GET['changeRemoteServer']) )
			unset($_SESSION['ts3_ip']);

		if( isset( $_GET['changevServer'] ) ||  !isset( $_SESSION['ts3_ip'] ))
		{
			if(!$isAdmin)
				$remote_servers = $db->getRemoteServers_ts3($_SESSION['user_id']);
			else
				$remote_servers = $db->getRemoteServers();

			if ($remote_servers !== false) {
				echo "<form action='home.php?m=TS3Admin' method='GET'>
					 <input type='hidden' name='m' value='". $_GET['m'] . "' />
					 <table class='center'>
					 <tr>
					 <td class='left'>
					 <select onchange=".'"this.form.submit()"'." name='rserver_id'>
					 <option></option>\n";
				foreach ( $remote_servers as $server )
				{
					$display_ip = checkDisplayPublicIP($server['display_public_ip'],$server['ip'] != $server['agent_ip'] ? $server['ip'] : $server['agent_ip']);
					echo "<option value='".$server['remote_server_id']."'>".
						$server['remote_server_name']." (".$display_ip.")</option>\n";
				}
				echo "</select>
					  </form>
					  </td></tr></table>";

			} else {
				echo get_lang('no_remote_servers');

			}
		}

		if( isset( $_GET['rserver_id'] ) )
		{
			$_SESSION['rserver_id'] = $_GET['rserver_id'];
			if( $isAdmin )
			{
				$TS3_list = $db->resultQuery("SELECT * FROM OGP_DB_PREFIXts3_homes WHERE rserver_id='".$_SESSION['rserver_id']."'");
			}
			else
			{
				$sql = "SELECT * FROM OGP_DB_PREFIXts3_homes WHERE";
				if(!$isAdmin){
					$sql .= " user_id='".$_SESSION['user_id']."' AND";
				}	
				$sql .= " rserver_id='".$_SESSION['rserver_id']."'";
				
				$TS3_list = $db->resultQuery($sql);
			}

			if( !empty( $TS3_list ) )
			{
				$remote_server = $db->getRemoteServer($_SESSION['rserver_id']);
				$_SESSION['remote_key'] = $remote_server['encryption_key'];

				if( isset( $_POST['vserver_id'] ) && !$isAdmin )
				{
					foreach($TS3_list as $TS3)
					{
						if($_POST['vserver_id'] == $TS3['vserver_id'])
						{
							$_SESSION['ts3_ip'] = $TS3['ip'];
							$_SESSION['ts3_pwd'] = $TS3['pwd'];
							$_SESSION['ts3_vserver_id'] = $TS3['vserver_id'];
							$_SESSION['ts3_port'] = $TS3['port'];
							break;
						}
					}
				}

				if( $isAdmin )
				{
					$TS3 = $TS3_list[0];
					$_SESSION['ts3_ip'] = $TS3['ip'];
					$_SESSION['ts3_pwd'] = $TS3['pwd'];
					$_SESSION['ts3_port'] = $TS3['port'];
				}
				else
				{
					echo "<table><tr>";
					$counter = 0;
					foreach( $TS3_list as $TS3 )
					{
						$counter++;
						echo "<td><form action='' method='POST'>
							  <input type='hidden' name='vserver_id' value='". $TS3['vserver_id'] . "' />
							  <input type='submit' value='Virtual Server ID ". $TS3['vserver_id'] . ".' />
							  </form></td>";
						if($counter >= 5)
						{
							echo "</tr><tr>";
							$counter = 0;
						}
					}
					echo "</tr></table>";
				}
			}
			else
			{
				echo get_lang('no_ts3_servers_assigned_to_account');
				return;
			}
		}
		if( !isset( $_SESSION['ts3_ip'] ) ) return;

		if( isset($_GET['type']) && $_GET['type'] == "cleared" )
		{
			$refreshing = TRUE;
		}
		else
		{
			echo '<link href="modules/TS3Admin/webinterface.css" rel="stylesheet" type="text/css" />';
			$refreshing = FALSE;
		}

		if ( $isAdmin )
		{
			if( !$refreshing )
				echo '<a href="home.php?m=TS3Admin&changevServer">'.get_lang("change_virtual_server").'</a>&nbsp;';
		}
		else
		{
			if( !$refreshing )
				echo '<a href="home.php?m=TS3Admin&changeRemoteServer">'.get_lang("change_remote_server").'</a>&nbsp;';
		}

		define('TS3WEBINTERFACE_IP', $_SESSION['ts3_ip']);	// edit server ip
		define('TS3WEBINTERFACE_PORT', $_SESSION['ts3_port']);	// edit server query port
		define('TS3WEBINTERFACE_NAME', "serveradmin");
		define('TS3WEBINTERFACE_PWD', $_SESSION['ts3_pwd']);
		if ( !$isAdmin )
			define('TS3WEBINTERFACE_VSERVER_ID', $_SESSION['ts3_vserver_id']);
		define('TS3WEBINTERFACE_LANG', $settings['panel_language']);	// edit language


		require('ts3webinterface.class.php');

		$wi = new TS3webinterface(TS3WEBINTERFACE_IP, TS3WEBINTERFACE_PORT);
	}
	else
	{
		print_failure( get_lang_f( 'temp_folder_not_writable', $templates_folder ) );
	}
}
?>
