<script type="text/javascript" src="js/jquery/plugins/jquery.tablesorter.collapsible.js"></script>
<script type="text/javascript" src="js/jquery/plugins/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="js/modules/server.js"></script>
<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2014 The OGP Development Team
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
function exec_ogp_module() {

	global $view;
	global $db;

	echo "<h2>". add_new_remote_host ."</h2>";
	echo "<p>". note_remote_host ."</p>";

	require_once("includes/form_table_class.php");

	$ft = new FormTable();
	$ft->start_form("?m=server&amp;p=add");
	$ft->start_table();
	$ft->add_field('string','remote_host',"");
	$ft->add_field('string','remote_host_port',"12679");
	$ft->add_field('string','remote_host_name',"");
	$ft->add_field('string','remote_host_ftp_ip',"");
	$ft->add_field('string','remote_host_ftp_port',"21");
	$ft->add_field('string','remote_encryption_key',"");
	$ft->add_field('string','timeout',"5");
	$ft->add_field('on_off','use_nat',"0");
	$ft->end_table();
	$ft->add_button('submit','add_remote_host', add_remote_host );
	$ft->end_form();

	$servers = $db->getRemoteServers();

	if ( $servers === FALSE )
		return;
		
	$tr = 0;
	
	?><table id="servermonitor" class="tablesorter remote">
		<thead> 
		<tr> 
			<th colspan="4" class="header sorter-false"><?php print_lang('configured_remote_hosts'); ?></th> 
		</tr> 
		</thead> 
		<tbody> <?php
	foreach ( $servers as $server_row )
	{
		#check to see if the remote daeomns are up status_chk is found in lib_remote.php
		$remote = new OGPRemoteLibrary($server_row['agent_ip'],$server_row['agent_port'],$server_row['encryption_key'],$server_row['timeout']);

		$host_stat = $remote->status_chk();

		$buttons = "<a href='?m=server&amp;p=edit&amp;rhost_id=".
					$server_row['remote_server_id']."&amp;delete'>[". delete ."]</a>\n".
					"<a href='?m=server&amp;p=edit&amp;rhost_id=".$server_row['remote_server_id'].
					"&amp;edit'>[". edit ."]</a>\n";

		$tittle = "<b>ID#:</b>  <b style='color:red;'>".$server_row['remote_server_id']."</b></td>
					<td class='collapsible' ><b>". server_name .":</b> ".$server_row['remote_server_name']."</td>
					<td class='collapsible' ><b>". agent_status .":</b> ";

		$booble = "";

		if($host_stat === 0 )
		{
			$tittle .= "<span class='failure'>". offline ."</span> ";
		}
		elseif( $host_stat === 1)
		{
			$os = $remote->what_os();
			$buttons .= "<a href='?m=server&amp;p=reboot&amp;rhost_id=".$server_row['remote_server_id'].
						"'>[". reboot ."]</a>\n<a href='?m=server&amp;p=restart&amp;rhost_id=".$server_row['remote_server_id'].
						"'>[". restart ."]</a>\n".
						"<a href='?m=server&amp;p=log&amp;rhost_id=".$server_row['remote_server_id']."'>[". view_log ."]</a>\n";
			$tittle .= "<span class='success'>". online ."</span>";
			$booble .= "<img src='images/magnifglass.png' data-url='includes/api.php?remote_server=$server_row[remote_server_id]&mon_stats' weight='8' class='center' />";
		}
		elseif( $host_stat === -1 )
		{
			$tittle .= "<span class='failure'>". encryption_key_mismatch ."</span>\n";
		}
		else
		{
			$tittle .= "<span class='failure'>". unknown_error .": $host_stat</span>\n";
		}
		
		$tittle .= "</td><td>$buttons</td>";
			
		$ftp_ip = empty( $server_row['ftp_ip'] ) ? $server_row['agent_ip'] : $server_row['ftp_ip'];
		$data = "<tr class='expand-child' >
				   <td>$booble</td><td>
					<b>". ogp_user .":</b> ".$server_row['ogp_user']."<br />
					<b>". agent_ip_port .":</b> ".$server_row['agent_ip'].":".$server_row['agent_port']."<br />
					<b>". remote_host_ftp_ip .":</b> ".$ftp_ip."<br />
					<b>". remote_host_ftp_port .":</b> ".$server_row['ftp_port']."<br />
					<b>". timeout .":</b> ".$server_row['timeout']."&nbsp;". seconds ."<br />
					<b>". encryption_key .":</b> ".$server_row['encryption_key']."<br />
				   </td>
				   <td><b>".  ips .": </b><br>";
		
		// Next we print the IP addresses and one empty field.
		$remote_server_ips = $db->getRemoteServerIPs($server_row['remote_server_id']);

		if ( empty($remote_server_ips) )
		{
			$data .= "<span class='failure'>". no_ip_for_remote_host ."</span>";
		}
		else
		{
			foreach ( $remote_server_ips as $ip_row )
			{
				$data .= $ip_row['ip']."<br>";
			}
		}
		
		$data .="</td><td>";
		
		if( $host_stat === 1)
		{
			$data .= "<b>OS:</b> ".@$os."<br><b>". firewall_status .":</b> ";
			$firewall_settings = $db->getFirewallSettings($server_row['remote_server_id']);
			if ( !$firewall_settings )
			{
				$status = "disable";
			}
			else
			{
				$status = isset($firewall_settings['status']) ? $firewall_settings['status'] : "disable";
			}
			
			if($status == "enable")
			{
				$data .= on;
			}
			elseif($status == "disable")
			{
				
				$data .= off;
			}
			$data .= "<br />
					  <a href='?m=server&amp;p=firewall&amp;rhost_id=".
					  $server_row['remote_server_id']."'>[". firewall_settings ."]</a>\n<br />";
		}
		$data .= "</td></tr>";
		// Template
		$first = "<tr class='maintr'><td class='collapsible' >$tittle</td></tr>";
		$second = $data;
		//Echo them all
		echo "$first$second";
	}
	echo "</tbody>";	
	echo "</table>\n";
}
