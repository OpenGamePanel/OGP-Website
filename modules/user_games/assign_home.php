<script type="text/javascript" src="js/modules/user_games-assign.js"></script>
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

function create_selection($selection,$flag,$access_rights)
{
	$right = "<tr><td align='right'><label for='".clean_id_string($selection)."'>".get_lang($selection).":</label></td>
			  <td align='left'><input id='".clean_id_string($selection)."' type='checkbox' name='".$selection."' value='1' checked='checked' /></td></tr>
			  <tr><td colspan='2' class='info'>".get_lang($selection.'_info')."</td></tr>";
	
	if (preg_match("/$flag/",$access_rights))
		return $right;
}

function exec_ogp_module()
{
	global $db;
	
	$isAdmin = $db->isAdmin($_SESSION['user_id']);
		
	if(isset($_REQUEST['user_id'])){
		if(empty($_REQUEST['user_id']) || $db->getUserById($_REQUEST['user_id']) == null)
		{
			print_failure(get_lang("valid_user"));
			return;
		}
	}else if(isset($_REQUEST['group_id'])){
		if(empty($_REQUEST['group_id']) || $db->getGroupById($_REQUEST['group_id']) == null)
		{
			print_failure(get_lang("valid_group"));
			return;
		}
	}else{
		print_failure(get_lang("invalid_url"));
		return;
	}
	
	if ( isset( $_REQUEST['user_id'] ) && !$isAdmin )
	{
		echo "<p class='note'>".get_lang("not_available")."</p>";
		return;
	}
	
	if ( isset( $_REQUEST['group_id'] ) && !$isAdmin )
	{
		$result = $db->getUserGroupList($_SESSION['user_id']);
		foreach ( $result as $row ) #loop through the groups
		{
			if ( $row['group_id'] == $_REQUEST['group_id'] )
			{
				$own_group = TRUE;
			}
		}
	}
	
	if( !$isAdmin && !isset($own_group) ) 
	{
		echo "<p class='note'>".get_lang("not_available")."</p>";
		return;
	}
	
	$selections = array();
	$full_access = '';
	foreach($db->getModulesAccessRights() as $ar)
	{
		$selections[$ar['description']] = $ar['flag'];
		$full_access .= $ar['flag'];
	}
	
	if(isset($_POST['change_access_rights']))
	{		
		if(is_array($_POST['home_ids']))
		{
			if($isAdmin)
				$access_right_flags = implode('',$_POST['flags']);
			
			foreach($_POST['home_ids'] as $i => $home_id)
			{
				if(!$isAdmin)
				{
					$home_info = $db->getUserGameHome($_SESSION['user_id'],$home_id);
					$access_rights = $home_info['access_rights'];
					$flags = $_POST['flags'];
					foreach($flags as $i => $flag)
					{
						if(!strstr($access_rights, $flag))
							unset($flags[$i]);
					}
					$access_right_flags = implode('',$flags);
				}
				if(!$db->updateAccessRightsFor($_POST['id_type'],$_POST['assign_id'],$home_id,$access_right_flags))
					print_failure(get_lang_f("failed_to_assign_game_for_",$id_type,$db->getError()));
			}
		}
		return;
	}
	
	if ( isset($_REQUEST['user_id']) )
	{
		$assign_id = $_REQUEST['user_id'];
		$id_type = "user";
		$user = $db->getUserById($assign_id);
		$assign_name = $user['users_login'];
	}
	else if ( isset($_REQUEST['group_id']) )
	{
		$assign_id = $_REQUEST['group_id'];
		$id_type = "group";
		$group = $db->getGroupById($assign_id);
		$assign_name = $group['group_name'];
	}

	$submit = isset($_POST['submit']) ? $_POST['submit'] : "";

	if( isset($_REQUEST['assign']) )
	{
		$access_rights = "";

		foreach ($selections as $selection => $flag)
		{
			if (isset($_REQUEST[$selection]))
				$access_rights .= $flag;
		}
		
		$hacker = FALSE;
		if( !$isAdmin )
		{
			$home_info = $db->getUserGameHome($_SESSION['user_id'],$_REQUEST['home_id']);
			if(!$home_info)
			{
				print_failure(get_lang_f("failed_to_assign_game_for",$id_type,"(Hacking attempt)"));
				$hacker = TRUE;
			}
			else
			{
				foreach ($selections as $selection => $flag)
				{
					if (isset($_REQUEST[$selection]))
					{
						if( !preg_match("/$flag/",$home_info['access_rights']) )
						{
							print_failure(get_lang_f("failed_to_assign_game_for",$id_type,"(Hacking attempt)"));
							$hacker = TRUE;
						}
					}				
				}
			}
		}
		
		if (!$hacker)
		{
			if ( $db->assignHomeTo($id_type,$assign_id,$_REQUEST['home_id'], $access_rights) === TRUE )
			{
				$db->updateExpirationDate($_REQUEST['home_id'], $_POST['expiration_date'], $id_type, $assign_id);
				print_success(get_lang_f("assigned_home_to_".$id_type,$_REQUEST['home_id'],$assign_name));
				$db->logger(get_lang_f("assigned_home_to_".$id_type,$_REQUEST['home_id'],$assign_name));
			}
			else
			{
				print_failure(get_lang_f("failed_to_assign_game_for_",$id_type,$db->getError()));
			}
		}
		unset($_POST['home_id']);
	}
	else if ( isset($_REQUEST['unassign']) )
	{
		if ( $db->unassignHomeFrom($id_type,$assign_id,$_REQUEST['home_id']) === TRUE )
		{
			print_success(get_lang_f("unassigned_home_from_".$id_type,$_REQUEST['home_id'],$assign_name));
			$db->logger(get_lang_f("unassigned_home_from_".$id_type,$_REQUEST['home_id'],$assign_name));
		}
		else
		{
			print_failure(get_lang_f("failed_to_assign_game_from_",$id_type));
		}
	}

	$remote_servers = $db->getRemoteServers();

	if ( empty($remote_servers) )
	{
		print_failure(get_lang("no_remote_servers_available_please_add_at_least_one"));
		echo "<p><a href='?m=server'>".get_lang("add_remote_server")."</a></p>";
		return;
	}

	if ( $isAdmin )
		$available_homes = $db->getAvailableHomesFor($id_type,$assign_id);
	else
		$available_homes = $db->getAvailableUserHomesFor($id_type,$assign_id,$_SESSION['user_id']);

	if ( !empty($available_homes) )
	{
		echo "<h2>".get_lang_f('assign_new_home_to_'.$id_type,$assign_name)."</h2>";
		echo "<form action='?m=user_games&amp;p=assign' method='post'>";
		echo "<input name='".$id_type."_id' value='".$assign_id."' type='hidden' />\n";
		echo "<table class='center'><tr><td align='right'><label for='home_id'>".get_lang("select_home").":</label></td>";
		echo '<td align="left"><select id="home_id" name="home_id" onchange="this.form.submit();">';
		echo "<option></option>\n";
		foreach ( $available_homes as $home )
		{
			if( isset($_POST['home_id']) && $_POST['home_id'] == $home['home_id'])
				$selected="selected='selected'";
			else
				$selected="";
			echo "<option value='".$home['home_id']."' $selected >".htmlentities($home['home_name'])."</option>\n";
		}
		echo "</select></td>\n";
		if( isset($_POST['home_id']) and !empty($_POST['home_id']) )
		{
			?>
			<link rel="stylesheet" type="text/css" href="js/datetimepicker/jquery.datetimepicker.min.css">
			<script src="js/datetimepicker/jquery.datetimepicker.full.min.js"></script>
			<script type="text/javascript" src="js/modules/user_games.js"></script>
			<?php
			if( $isAdmin )
			{
				$access_rights = $full_access;
			}
			else
			{
				$home_info = $db->getUserGameHome($_SESSION['user_id'],$_POST['home_id']);
				$access_rights = $home_info['access_rights'];
			}
			foreach ( $selections as $selection => $flag)
			{
				echo create_selection($selection,$flag,$access_rights);
			}
			echo "<tr><td class='right'>".get_lang("assign_expiration_date").":</td>\n".
				 "<td class='left'>\n".
				 "<tr><td class='right'>".get_lang("server_expiration_date").":</td>\n".
				 "<td class='left'>".
				 "<div id='datetimepicker' class='input-append date'>".
				 "<input name='expiration_date' placeholder='dd/MM/yyyy hh:mm:ss' type='text' value='X' data-today='".date('d/m/Y H:i:s')."' >\n".
				 "</div></td></tr>\n".
				 "<tr><td  colspan='2' class='info'>". get_lang("assign_expiration_date_info") ."</td></tr>\n";
			echo "<tr><td colspan='2'><input type='submit' name='assign' value='".get_lang("assign")."' /></td></tr>\n";
		}
		echo "</table></form>\n";
	}
	else
	{
		echo "<h2>".get_lang("no_more_homes_available_that_can_be_assigned_for_this_$id_type")."</h2>";
		
		if( $isAdmin )
			echo get_lang_f("you_can_add_a_new_game_server_from","<a href='?m=user_games'>".get_lang("game_servers")."</a>")."</p>";
	}
	// View servers for use if there are any.
	$game_homes = $db->getHomesFor($id_type,$assign_id);

	if( empty($game_homes) )
	{
		echo "<h3>".get_lang_f("no_homes_assigned_to_".$id_type,$assign_name)."</h3>";
	}
	else
	{
		echo "<h2>".get_lang("assigned_homes")."</h2>";
		echo '<table class="center">';
		echo "<tr><th>".get_lang("home_id")."</th><th>".get_lang("game_server")."</th>
			<th>".get_lang("game_type")."</th>
			<th align='center'>".get_lang("game_home")."</th>
			<th>".get_lang("game_home_name")."</th><th>".get_lang("access_rights")."</th>
			<th>".get_lang("assign_expiration_date")."</th>
			<th>".get_lang("actions")."</th></tr>";
		foreach( $game_homes as $row )
		{
			$access_rights = empty($row['access_rights']) ? "-" : $row['access_rights'];
			$type = $id_type == "group" ? "user_group_expiration_date" : "user_expiration_date";
			$expiration = $row[$type] == "X" ? "X" : date('d/m/Y H:i:s', $row[$type]);
			echo "<tr><td><input type=checkbox class='change_access_rights' data-home_id='$row[home_id]' >$row[home_id]</td>
				<td>".$row['agent_ip']." (Agent)</td>
				<td>$row[game_name]</td>
				<td>$row[home_path]</td>
				<td>" . htmlentities($row["home_name"]) . "</td>
				<td>$access_rights</td>
				<td>$expiration</td>
				<td>
				<form action='?m=user_games&amp;p=assign' method='post'>
				<input name='".$id_type."_id' value='$assign_id' type='hidden' />
				<input name='home_id' value='".$row['home_id']."' type='hidden' />
				<input type='submit' name='unassign' value='".get_lang("unassign")."' /></form></td>
				</tr>";
		}
		echo "</table>";
		echo "<button id=\"change_access_rights_submit\" onclick=\"change_access_rights('".trim($id_type)."', '".trim($assign_id),"')\">".get_lang('change_access_rights_for_selected_servers')."</button>\n".
			 "<div id='dialog' ";
		foreach ( $selections as $selection => $flag)
		{
			echo "data-$flag=\"$selection\" ";
		}
		echo "></div>";
	}

	if ( $id_type === "group" )
		echo create_back_button('user_admin','show_groups');
	else 
		echo create_back_button('user_admin');
}
?>
