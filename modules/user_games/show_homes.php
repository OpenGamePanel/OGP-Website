<script type="text/javascript" src="js/jquery/jquery-1.11.0.min.js"></script>
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

	$page_GameHomes = isset($_GET['page']) ? $_GET['page'] : 1;
	$limit_GameHomes = isset($_GET['limit']) ? $_GET['limit'] : 10;
	
	echo "<h2>".get_lang('game_servers')."</h2>";
	echo "<p><a href='?m=user_games&amp;p=add'>".get_lang('add_new_game_home')."</a></p>";

	$game_homes = $db->getGameHomes_limit($page_GameHomes,$limit_GameHomes);
	if ( empty($game_homes) )
	{
		echo "<p>".get_lang('no_game_homes_found')."</p>";
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
	sort($game_homes);
	foreach( $game_homes as $row )
	{
		$os_arch = preg_match('/win/',$row['game_key']) ? "(Windows" : "(Linux";
		$os_arch .= preg_match('/(win|linux)64/',$row['game_key']) ? " 64bit)" : ")";
		echo "<tr class='tr".($i++%2)."'><td class='tdh'>$row[home_id]</td><td>".$row['agent_ip']."</td>".
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

	$count_GameHomes = $db->get_GameHomes_count();
	if($count_GameHomes > $limit_GameHomes)
	{
		$total_pages = $count_GameHomes[0]['total'] / $limit_GameHomes;
		$pagination = "";
		for($page=1; $page <= $total_pages+1; $page++)
		{
			if($page == $page_GameHomes){
				$pagination .= " <b>$page</b>,";
				if($total_pages <= 1){$pagination = "";}
			}else{
				if(isset($_GET['limit'])){
					$limits = $_GET['limit'];
					$pagination .= "<a href='?m=user_games&page=$page&limit=$limits'>$page</a>,";
				}else{
					$pagination .= " <a href='?m=user_games&page=$page' >$page</a>,";
				}
			}
		}
		echo rtrim($pagination, ",");
	}

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
