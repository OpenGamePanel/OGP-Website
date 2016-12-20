<script type="text/javascript" src="js/modules/show_users.js"></script>
<style type="text/css">
tr.hide{
	display: none;
}
table.userListTable{
	border-collapse: collapse;
	border: 0px;
}
table.userListTable td{
	padding-left: 5px;
}

tr.subusersShowHide{cursor: pointer;}

th.subuserColumn{
	width: 140px;
}

td.actions{
	cursor: default;
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
function exec_ogp_module() {
    global $db;
    echo '<h2>'.get_lang('users')."</h2>";
	echo "<p><a href='?m=user_admin&amp;p=add'>".get_lang('add_new_user')."</a></p>";
    echo '<table class="userListTable center" style="width: 100%;">';
    echo '<tr><th>'.get_lang('actions')."</th><th>".get_lang('username')."</th>";
    echo "<th>".get_lang('user_role')."</th>";
    echo "<th>".get_lang('email_address')."</th>";
    echo "<th>".get_lang('expires')."</th>";
    echo "<th class='subuserColumn'>".get_lang('subusers')."</th></tr>";
    $result = $db->getUserList();
    $i = 0;
    foreach ( $result as $row )
    {
		// Show user's parent
		$ownedBy = "";
		if(!is_null($row['users_parent'])){
			$ownedBy = $row['users_parent'];
		}
        $user_expires = read_expire($row['user_expires']);
        print "<tr class='tr".($i++%2)." ";
        print $row['users_role'] . " ";
        if(!empty($ownedBy)){
			print "hide";
		}else{
			print "subusersShowHide";
		}
        print "' uid='" . $row[user_id] . "'";
        if(!empty($ownedBy)){
			print "ownedby='" . $ownedBy . "'";
		}
        print ">";
        print "<td class='actions'><a href='?m=user_games&amp;p=assign&amp;user_id=$row[user_id]'>[".
            get_lang('assign_homes')."]</a><br />
            <a href='?m=user_admin&amp;p=del&amp;user_id=$row[user_id]'>[".get_lang('delete')."]</a><br />
            <a href='?m=user_admin&amp;p=edit_user&amp;user_id=$row[user_id]'>[".get_lang('edit_profile')."]</a></td>
            <td>".htmlentities($row['users_login'])."</td><td>".htmlentities($row['users_role'])."</td>
            <td>".htmlentities($row['users_email'])."</td>
            <td>$user_expires</td>";
        if(!empty($ownedBy)){
			print "<td></td>";
		}else{
			print "<td class='subUserShowHideTextTd expand' showtext='" . get_lang('show_subusers') . "' hidetext='" . get_lang('hide_subusers') . "'>" . get_lang('show_subusers') . " &darr;</td>";
		}  
        print "</tr>";
    }
    echo '</table>';
}
?>
