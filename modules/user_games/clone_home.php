<style>
.html5-progress-bar {
	padding: 15px 15px;
	border-radius: 3px;
	background-color: #f5f5f5;
	box-shadow:  0px 1px 2px 0px rgba(0, 0, 0, .2);
}
.html5-progress-bar progress {
	background-color: #f3f3f3;
	border: 0;
	width: 93%;
	height: 18px;
	border-radius: 9px;
}
.html5-progress-bar progress::-webkit-progress-bar {
	background-color: #e3e3e3;
	border-radius: 9px;
}
.html5-progress-bar progress::-webkit-progress-value {
	background: #cdeb8e;
	background: -moz-linear-gradient(top,  #cdeb8e 0%, #a5c956 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#cdeb8e), color-stop(100%,#a5c956));
	background: -webkit-linear-gradient(top,  #cdeb8e 0%,#a5c956 100%);
	background: -o-linear-gradient(top,  #cdeb8e 0%,#a5c956 100%);
	background: -ms-linear-gradient(top,  #cdeb8e 0%,#a5c956 100%);
	background: linear-gradient(to bottom,  #cdeb8e 0%,#a5c956 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cdeb8e', endColorstr='#a5c956',GradientType=0 );
	border-radius: 9px;
}
.html5-progress-bar progress::-moz-progress-bar {
	background: #cdeb8e;
	background: -moz-linear-gradient(top,  #cdeb8e 0%, #a5c956 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#cdeb8e), color-stop(100%,#a5c956));
	background: -webkit-linear-gradient(top,  #cdeb8e 0%,#a5c956 100%);
	background: -o-linear-gradient(top,  #cdeb8e 0%,#a5c956 100%);
	background: -ms-linear-gradient(top,  #cdeb8e 0%,#a5c956 100%);
	background: linear-gradient(to bottom,  #cdeb8e 0%,#a5c956 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cdeb8e', endColorstr='#a5c956',GradientType=0 );
	border-radius: 9px;
}
.html5-progress-bar .progress-value {
	padding: 0px 5px;
	line-height: 20px;
	margin-left: 5px;
	font-size: 1.2em;
	color: #555;
	height: 18px;
	float: right;
}
</style>
<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) Copyright (C) 2008 - 2013 The OGP Development Team
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
	global $db;

	$home_id = $_REQUEST['home_id'];

	$server_row = $db->getGameHomeWithoutMods($home_id);
	if ( empty($server_row) )
	{
		print_failure(get_lang('invalid_home_id'));
		return;
	}

	echo "<h2>".get_lang_f('cloning_home',$server_row['home_name'])."</h2>";
	echo create_back_button('user_games');

	include('includes/lib_remote.php');
	$remote = new OGPRemoteLibrary($server_row['agent_ip'],$server_row['agent_port'],$server_row['encryption_key']);

	if(isset($_REQUEST['clone_home']))
	{
		$server_name = $_POST['new_home_name'];
		$user_group = $_POST['user_group'];

		$clone_home_id = $db->addGameHome($server_row['remote_server_id'], $server_row['user_id_main'],
			$server_row['home_cfg_id'], "/home/".$server_row['ogp_user']."/OGP_User_Files/", $server_name, '', genRandomString(8));
		
		$server_path = "/home/".$server_row['ogp_user']."/OGP_User_Files/".$clone_home_id;
		
		if ( $clone_home_id === FALSE )
		{
			print_failure(get_lang_f('cloning_of_home_failed',$home_id));
			return;
		}
		
		if( isset($_REQUEST['clone_mods']) )
		{
			$enabled_mods = $db->getHomeMods($home_id);
			if( empty($enabled_mods) )
			{
				print_failure(get_lang('note').": ".get_lang('no_mods_to_clone'));
			}
			else
			{
				foreach ( $enabled_mods as $enabled_rows )
				{
					if ( $db->addModToGameHome($clone_home_id,
						$enabled_rows['mod_cfg_id']) === FALSE )
					{
						print_failure(get_lang_f('failed_to_add_mod',$enabled_rows['mod_cfg'],
							$clone_home_id));
						return;
					}
					if ( $db->updateGameModParams($enabled_rows['max_players'],
						$enabled_rows['extra_params'],$enabled_rows['cpu_affinity'],
						$enabled_rows['nice'],$clone_home_id,
						$enabled_rows['mod_cfg_id']) === FALSE )
					{
						print_failure(get_lang_f('failed_to_update_mod_settings',$clone_home_id));
						return;
					}
				}
				print_success(get_lang_f('successfully_cloned_mods',$clone_home_id));
			}
		}

		print_success(get_lang('successfully_copied_home_database'));

		# do the remote copy call here
		echo "<p>".get_lang_f('copying_home_remotely',$server_row['home_path'],$server_path)."</p>";
		$db->logger(get_lang_f('copying_home_remotely',$server_row['home_path'],$server_path));
		$clone_rc = $remote->clone_home($server_row['home_path'],$server_path,$user_group);

		if($clone_rc == -1)
		{
			print_success(get_lang('game_server_copy_is_running'));
			?>
			<div class="html5-progress-bar">
			<progress id="progressbar" value="0" max="100"></progress>
			<span class="progress-value">0%</span>
			</div>
			<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
			<script type="text/javascript">
			$(document).ready(function() 
			{
				var refreshId = setInterval(function()
				{
					$.get( "home.php?m=user_games&type=cleared&p=get_size&home_id=<?php echo $clone_home_id;?>", function( dest_data ) {
						var dest_size = parseInt(dest_data,10);
						$.get( "home.php?m=user_games&type=cleared&p=get_size&home_id=<?php echo $home_id;?>", function( orig_data ) {
							var orig_size = parseInt(orig_data,10);
							var progress = parseInt(dest_size * 100 / orig_size);
							$('#progressbar').val(progress);
							$('.progress-value').html(progress + '%');
							if(progress == 100)
							{
								clearInterval(refreshId);
							}
						});
					});
				}, 2000);
			});
			</script>
			<?php
		}
		elseif($clone_rc == 1)
		{
			print_success(get_lang('game_server_copy_was_successful'));
		}
		else
		{
			print_failure(get_lang_f('game_server_copy_failed_with_return_code', $clone_rc));
		}
		echo "<br><a href='home.php?m=user_games'>&lt;&lt; ".get_lang('back_to_game_servers')."</a>";
		return;
	}

	// Form to edit game path.
	$avail_mods = $db->getHomeMods($home_id);

	$read_status = $remote->remote_readfile('/etc/passwd', $passwd_array);
	if ( $read_status === -1 )
	{
		print_failure(get_lang('agent_offline'));
		return;
	}
	else if ( $read_status == 1 )
	{
		$passwd_array = preg_split("/\n/",$passwd_array);
	}

	require_once("includes/form_table_class.php");

	$ft = new FormTable();

	$ft->start_form('?m=user_games&amp;p=clone');
	$ft->add_field_hidden('home_id',$home_id);
	$ft->start_table();
	$ft->add_custom_field('agent_ip',$server_row['agent_ip']);
	$ft->add_custom_field('current_home_path',$server_row['home_path']);
	$ft->add_field('string','new_home_name',$server_row['home_name']);
	echo "<tr><td class='right'>".get_lang('clone_mods').":</td>
		<td class='left'><input type='checkbox' name='clone_mods' value='y' /></td></tr>";
	echo "<input name='user_group' type='hidden' value='".get_user_uid_gid_from_passwd($passwd_array,$server_row['ogp_user'])."' /></tr>";
	echo "</table>";
	$ft->add_button('submit','clone_home',get_lang('clone_home'));
	echo "<p class='info'>".get_lang('the_name_of_the_server_to_help_users_to_identify_it')."</p>";
	echo "</form>";

	echo "<h3>".get_lang('ips_and_ports_used_in_this_home')."</h3>";
	echo "<p>".get_lang('note_ips_and_ports_are_not_cloned')."</p>";

	$assigned = $db->getHomeIpPorts($home_id);
	if( !empty($assigned) )
	{
		foreach ( $assigned as $assigned_rows )
		{
			echo "<p>".$assigned_rows['ip'].":".$assigned_rows['port']."</p>\n";
		}
	}

	$enabled_mods = $db->getHomeMods($home_id);

	echo "<h3>".get_lang('mods_and_settings_for_this_game_server')."</h3>";
	if( empty($enabled_mods) )
	{
		print_failure(get_lang('note').": ".get_lang('note_no_mods'));
		return;
	}

	echo "<table class='center'>\n";
	echo "<tr><td>".get_lang('mod_name')."</td><td>".
		get_lang('max_players')."</td><td>".
		get_lang('extra_cmd_line_args')."</td><td>".
		get_lang('cpu_affinity')."</td><td>".
		get_lang('nice_level')."</td></tr>\n";

	foreach ( $enabled_mods as $enabled_rows )
	{
		echo "<tr>";
		echo "<td>".$enabled_rows['mod_name']."</td>";
		echo "<td>".$enabled_rows['max_players']."</td>";
		echo "<td>".$enabled_rows['extra_params']."</td>";
		echo "<td>".$enabled_rows['cpu_affinity']."</td>";
		echo "<td>".$enabled_rows['nice']."</td></tr>\n";
	}
	echo "</table>\n";
}
?>
