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
	global $db, $view, $loggedInUserInfo;
	
	$page_GameHomes = (isset($_GET['page']) && (int)$_GET['page'] > 0) ? (int)$_GET['page'] : 1;
	$limit_GameHomes = (isset($_GET['limit']) && (int)$_GET['limit'] > 0) ? (int)$_GET['limit'] : 10;

	$searchString = (isset($_GET['search']) && !empty($_GET['search'])) ? $_GET['search'] : false;
	$searchTypes = array('ip_port' => 'IP / Port', 'ownedBy' => 'Server Owner', 'rserver' => 'Remote Server', 'home_name' => 'Server Name');
	$searchType = isset($_GET['searchType']) ? $_GET['searchType'] : false;
	
	if(hasValue($loggedInUserInfo) && is_array($loggedInUserInfo) && $loggedInUserInfo["users_page_limit"] && !(isset($_GET['limit']) and !empty($_GET['limit']))){
		$limit_GameHomes = $loggedInUserInfo["users_page_limit"];
	}

	$game_homes = $db->getGameHomes_limit($page_GameHomes, $limit_GameHomes, $searchType, $searchString);

	echo "<h2>".get_lang('game_servers')."</h2>";
	echo '<table style="width: 100%; margin-bottom: 50px;">
			<tr>
				<td style="width: 50%; vertical-align: middle; text-align: left;">
					<p><a href="?m=user_games&amp;p=add">'.get_lang("add_new_game_home").'</a></p>
				</td>
				<td style="width: 50%; vertical-align: middle; text-align: right;">
					<form action="home.php" method="GET" style="float:right;">
					<input type ="hidden" name="m" value="user_games" />
					'. create_drop_box_from_array($searchTypes, 'searchType', $searchType, false) .'
					<input name="search" type="text" id="search" value="' . $searchString . '" />
					<input type="submit" value="'.get_lang('search').'" />
					</form>
				</td>
			</tr>
		</table>';
	
	if (empty($game_homes)) {
		if (!empty($search_field)) {
			print_failure(get_lang_f('no_results_found', htmlentities($search_field)));

			$view->refresh("?m=user_games", 5);
		} else {
			print_failure(get_lang('no_game_homes_found'));
		}

		return;
	}

	echo "<h2>".get_lang('available_game_homes')."</h2>";
	echo '<table class="center">';
	echo "<tr><th>".get_lang('home_id')."</th><th>".get_lang('game_server')."</th>
		<th>".get_lang('game_type')."</th>
		<th align='center'>".get_lang('game_home')."</th>
		<th>".get_lang('game_home_name')."</th>
		<th>".get_lang('server_expiration_date')."</th>
		<th>".get_lang('actions')."</th></tr>";
	$i = 0;
	// sort($game_homes);
	foreach( $game_homes as $row )
	{
		$display_ip = checkDisplayPublicIP($row['display_public_ip'], (isset($row['ip']) and $row['ip'] != $row['agent_ip']) ? $row['ip'] : $row['agent_ip']);

		$os_arch = preg_match('/win/',$row['game_key']) ? "(Windows" : "(Linux";
		$os_arch .= preg_match('/(win|linux)64/',$row['game_key']) ? " 64bit)" : ")";
		echo "<tr class='tr".($i++%2)."'><td class='tdh'>$row[home_id]</td><td>".$display_ip."</td>".
			 "<td class='tdh'>$row[game_name] $os_arch</td><td>$row[home_path]<br><div class='size' id='".$row["home_id"].
			 "' style='cursor:pointer;' >[".get_lang('get_size')."]</div></td><td class='tdh'>";
		echo empty($row['home_name']) ? get_lang('not_available') : htmlentities($row['home_name']);
		$expiration_date = $row['server_expiration_date'] == "X" ? "X" : date('d/m/Y H:i:s', $row['server_expiration_date']);
		echo "</td><td>".$expiration_date."</td><td>
			<a href='?m=user_games&amp;p=del&amp;home_id=$row[home_id]'>[".get_lang('delete')."]</a>
			<a href='?m=user_games&amp;p=edit&amp;home_id=$row[home_id]'>[".get_lang('edit')."]</a>
			<a href='?m=user_games&amp;p=clone&amp;home_id=$row[home_id]'>[".get_lang('clone')."]</a>
			</td></tr>";
	}
	
	echo "<tr><td colspan='3' style='border:none;' ></td><td style='border:none;' ><div style='float:left;margin-left:5px;' >".get_lang('total_size').":</div><div class='size' id='total' ".
		 "style='cursor:pointer;float:left;margin-left:5px;' >[".get_lang('get_size')."]</div></td><td colspan='2' style='border:none;' ></td></tr>";
	
	echo "</table>";

	$count_GameHomes = $db->get_GameHomes_count($searchType, $searchString);
	
	if (isset($_GET['search']) && !empty($_GET['search'])) {
		$uri = '?m=user_games&search='.$_GET['search'].'&limit='.$limit_GameHomes.'&page=';
	} else {
		$uri = '?m=user_games&limit='.$limit_GameHomes.'&page=';
	}
	
	echo paginationPages($count_GameHomes[0]['total'], $page_GameHomes, $limit_GameHomes, $uri, 3, 'userGames');

	?>
	<script type="text/javascript">
	$('.size').click(function(){
		var $id = $(this).attr('id');
		$.get( "home.php?m=user_games&type=cleared&p=get_size&home_id="+$id, function( data ) {
			$('#'+$id+".size").text( data );
		});
	});
	</script>
	<?php	
}
?>
