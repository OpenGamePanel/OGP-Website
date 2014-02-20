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
function exec_ogp_module() {
    global $db;
    echo '<h2>'.get_lang('users')."</h2>";
	echo "<p><a href='?m=user_admin&amp;p=add'>".get_lang('add_new_user')."</a></p>";
    echo '<table class="center" style="width: 100%;">';
    echo '<tr><th>'.get_lang('actions')."</th><th>".get_lang('username')."</th>";
    echo "<th>".get_lang('user_role')."</th>";
    echo "<th>".get_lang('email_address')."</th>";
    echo "<th>".get_lang('expires')."</th>";
    echo "<th>".get_lang('ownedby')."</th></tr>";
    $result = $db->getUserList();
    $i = 0;
    foreach ( $result as $row )
    {
		// Show user's parent
		$ownedBy = "";
		if(is_null($row['users_parent'])){
			if($row['users_role'] != "admin"){
				$ownedBy = "Root Admin";
			}
		}else{
			$ownedBy = $db->getUserById($row['users_parent']);
			$ownedBy = $ownedBy['users_login'];
		}
        $user_expires = read_expire($row['user_expires']);
        print "<tr class='tr".($i++%2)."'>";
        print "<td><a href='?m=user_games&amp;p=assign&amp;user_id=$row[user_id]'>[".
            get_lang('assign_homes')."]</a><br />
            <a href='?m=user_admin&amp;p=del&amp;user_id=$row[user_id]'>[".get_lang('delete')."]</a><br />
            <a href='?m=user_admin&amp;p=edit_user&amp;user_id=$row[user_id]'>[".get_lang('edit_profile')."]</a></td>
            <td>$row[users_login]</td><td>$row[users_role]</td>
            <td>$row[users_email]</td>
            <td>$user_expires</td>
            <td>$ownedBy</td></tr>";
    }
    echo '</table>';
}
?>
