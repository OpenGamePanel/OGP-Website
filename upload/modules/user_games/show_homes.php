<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
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
	
	echo "<h2>".get_lang('game_servers')."</h2>";
    echo "<p><a href='?m=user_games&amp;p=add'>".get_lang('add_new_game_home')."</a></p>";

    $game_homes = $db->getGameHomes();
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
        <th>".get_lang('game_home_name')."</th><th>".get_lang('actions')."</th></tr>";
    $i = 0;
	sort($game_homes);
    foreach( $game_homes as $row )
    {
        echo "<tr class='tr".($i++%2)."'><td class='tdh'>$row[home_id]</td><td>".$row['agent_ip']."</td>".
			 "<td class='tdh'>$row[game_name]</td><td>$row[home_path]<br><div class='size' id='".$row["home_id"].
			 "' style='cursor:pointer;' >[".get_lang('get_size')."]</div></td><td class='tdh'>";
        echo empty($row['home_name']) ? get_lang('not_available') : $row['home_name'];
        echo "</td><td>
            <a href='?m=user_games&amp;p=del&amp;home_id=$row[home_id]'>[".get_lang('delete')."]</a>
            <a href='?m=user_games&amp;p=edit&amp;home_id=$row[home_id]'>[".get_lang('edit')."]</a>
            <a href='?m=user_games&amp;p=clone&amp;home_id=$row[home_id]'>[".get_lang('clone')."]</a>
            </td></tr>";
    }
    
	echo "<tr><td colspan='3' style='border:none;' ></td><td style='border:none;' ><div style='float:left;margin-left:5px;' >".get_lang('total_size').":</div><div class='size' id='total' ".
		 "style='cursor:pointer;float:left;margin-left:5px;' >[".get_lang('get_size')."]</div></td><td colspan='2' style='border:none;' ></td></tr>";
	
	echo "</table>";
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
