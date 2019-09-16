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

function exec_ogp_module() {
    global $db, $view, $loggedInUserInfo;
	
	$page_user = (isset($_GET['page']) && (int)$_GET['page'] > 0) ? (int)$_GET['page'] : 1;
	$limit_user = (isset($_GET['limit']) && (int)$_GET['limit'] > 0) ? (int)$_GET['limit'] : 10;
	$search_field = (isset($_GET['search']) && !empty($_GET['search'])) ? $_GET['search'] : false;
	
	if(hasValue($loggedInUserInfo) && is_array($loggedInUserInfo) && $loggedInUserInfo["users_page_limit"] && !(isset($_GET['limit']) and !empty($_GET['limit']))){
		$limit_user = $loggedInUserInfo["users_page_limit"];
	}

	echo '<h2>'.get_lang('users')."</h2>";

	$result = $db->getUserList_limit($page_user, $limit_user, $search_field);

	if (empty($result) && $search_field !== false) {
		print_failure(get_lang_f('no_results_found', htmlentities($search_field)));

		$view->refresh("?m=user_admin", 5);
		return;
	}

	echo '<table style="width: 100%;">
			<tr>
				<td style="width: 50%; vertical-align: middle; text-align: left;">
					<p><a href="?m=user_admin&amp;p=add">'.get_lang("add_new_user").'</a></p>
				</td>
				<td style="width: 50%; vertical-align: middle; text-align: right;">
					<form action="home.php" method="GET" style="float:right;">
					<input type ="hidden" name="m" value="user_admin" />
					<input name="search" type="text" id="search" value="' . $search_field . '"/>
					<input type="submit" value="'.get_lang('search').'" />
					</form>
				</td>
			</tr>
		</table>';

    echo '<table class="userListTable center" style="width: 100%;margin-top:50px;">';
    echo '<tr><th>'.get_lang('actions')."</th><th>".get_lang('username')."</th>";
    echo "<th>".get_lang('user_role')."</th>";
    echo "<th>".get_lang('email_address')."</th>";
    echo "<th>".get_lang('expires')."</th>";
    echo "<th class='subuserColumn'>".get_lang('subusers')."</th></tr>";

    $i = 0;
    foreach ( $result as $row )
    {
		// Show user's parent
		$ownedBy = "";
		if(!is_null($row['users_parent'])){
			$ownedBy = $row['users_parent'];
			$parentInfo = $db->getUserById($ownedBy);
			if(is_array($parentInfo) && array_key_exists("user_expires", $parentInfo) && $parentInfo['user_expires'] != "X"){
				$row['user_expires'] = $parentInfo['user_expires'];
			}
		}
		
        $user_expires = read_expire($row['user_expires']);
        print "<tr class='tr".($i++%2)." ";
        print $row['users_role'] . " ";
        if(!empty($ownedBy) && empty($search_field)){
			print "hide";
		}else{
			print "subusersShowHide";
		}
        print "' uid='" . $row['user_id'] . "'";
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
    echo '</table><br>';

	$count_users = $db->get_user_count($search_field);
	
	if(isset($_GET['search']) && !empty($_GET['search'])){
	$uri = '?m=user_admin&search='.$_GET['search'].'&limit='.$limit_user.'&page=';
	}
	else{
	$uri = '?m=user_admin&limit='.$limit_user.'&page=';
	}
	echo paginationPages($count_users[0]['total'], $page_user, $limit_user, $uri, 3, 'userManager');
	
}
?>
