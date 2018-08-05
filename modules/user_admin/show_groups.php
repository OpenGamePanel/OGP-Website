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
    global $db, $loggedInUserInfo;
	
	$page_user = (isset($_GET['page']) && (int)$_GET['page'] > 0) ? (int)$_GET['page'] : 1;
	$limit_user = (isset($_GET['limit']) && (int)$_GET['limit'] > 0) ? (int)$_GET['limit'] : 10;
	$search_field = (isset($_GET['search']) && !empty($_GET['search'])) ? $_GET['search'] : false;

	if(hasValue($loggedInUserInfo) && is_array($loggedInUserInfo) && $loggedInUserInfo["users_page_limit"] && !(isset($_GET['limit']) and !empty($_GET['limit']))){
		$limit_user = $loggedInUserInfo["users_page_limit"];
	}
	
?>
    <div class="center">
    <h2><?php print_lang('add_new_group'); ?></h2>
    <p><?php print_lang('info_group'); ?></p>
<?php
    require_once('includes/form_table_class.php');
    $ft = new FormTable();
    $ft->start_form('?m=user_admin&amp;p=add_group');
    $ft->start_table();
    $ft->add_field('string','group_name','');
    $ft->end_table();
    $ft->add_button('submit','add_group',get_lang('add_group'));
    $ft->end_form();
?>
    </div>
<?php
    echo '<h2>'.get_lang('available_groups').'</h2>';
	
	echo '<table style="width: 100%;">
			<tr>
				<td style="width: 50%; vertical-align: middle; text-align: right;">
					<form action="home.php" method="GET" style="float:right;">
					<input type ="hidden" name="m" value="user_admin" />
					<input type ="hidden" name="p" value="show_groups" />
					<input name="search" type="text" id="search" value="' . $search_field . '"/>
					<input type="submit" value="'.get_lang('search').'" />
					</form>
				</td>
			</tr>
		</table>';	
	if ($db->isAdmin($_SESSION['user_id']))
		$result = $db->getGroupList_limit($page_user,$limit_user,$search_field);
	else
		$result = $db->getUserGroupList_limit($_SESSION['user_id'],$page_user,$limit_user,$search_field);
		
    if ( $result === FALSE )
    {
        echo "<p class='note'>".get_lang('no_groups_available')."</p>";
        return;
    }

    $i = 0;

    echo "<table class='center'><tr class='tr$i'><td>".
        get_lang('actions')."</td><td>".get_lang('group_name')."</td><td>".
        get_lang('users')."</td></tr>";

    foreach ( $result as $row ) #loop through the groups
    {
        $i++;
        echo "<tr class='tr$i'><td><a href='?m=user_games&amp;p=assign&amp;group_id=".$row['group_id']."'>[".
            get_lang('assign_homes')."]</a><br />
            <a href='?m=user_admin&amp;p=del_group&amp;group_id=".
            $row['group_id']."'>[".get_lang('delete_group').']</a>';
        echo "</td><td>".$row['group_name']."</td>";

        echo "<td class='left'>";
        
        
        $subusersEnabled = $db->isModuleInstalled("subusers");
		$subEnabled = false;
        if(!$subusersEnabled){
			$available_users = $db->getAvailableUsersForGroup($row['group_id']);
		}else{
			if(!$db->isAdmin($_SESSION['user_id'])){
				$available_users = $db->getAvailableSubUsersForGroup($row['group_id'], $_SESSION['user_id']);
				$subEnabled = true;
			}else{
				$available_users = $db->getAvailableUsersForGroup($row['group_id']);
			}
		}

        if ( is_array($available_users) )
        {
			if(count($available_users) > 0){
				echo "<form action=\"?m=user_admin&amp;p=add_to_group\" method=\"post\">".
					get_lang('add_user_to_group').
					": <select name=\"user_to_add\">";
				foreach ($available_users as $user_row )
				{
					echo "<option value=\"$user_row[user_id]\">" . htmlentities($user_row[users_login]) . "</option>";
				}
				echo "</select>\n";
				echo "<input type='hidden' name='group_id' value='$row[group_id]' />";
				echo "<input type='submit' name='add_user_to_group' value='".get_lang('add_user')."' />";
				echo "</form>\n";
			}else{
				if($subEnabled){
					echo "<p>" .get_lang('no_subusers'). "</p>";
				}
			}
        }else{
			if($subEnabled){
				echo "<p>" .get_lang('no_subusers'). "</p>";
			}
		}

        $group_users = $db->listUsersInGroup($row['group_id']);

        if (is_array($group_users))
        {
            echo "<ul>";
            foreach ($group_users as $user_id)
            {
                $user_info = $db->getUserById($user_id['user_id']);
                echo "<li><a href='?m=user_admin&amp;p=del_from_group&amp;group_id=".
                    $row['group_id']."&amp;user_id=".$user_id['user_id']."'>[".get_lang('remove_from_group').
                    "]</a> $user_info[users_login]</li>";
            }
            echo "</ul>";
        }
        echo "</td></tr>";
    }
    echo "</table>";
	
	if ($db->isAdmin($_SESSION['user_id']))
	$count_groups = $db->get_group_count($search_field);
	else
	$count_groups = $db->getUserGroupList_count($_SESSION['user_id'],$search_field);

	if(isset($_GET['search']) && !empty($_GET['search'])){
	$uri = '?m=user_admin&p=show_groups&search='.$_GET['search'].'&limit='.$limit_user.'&page=';
	}
	else{
	$uri = '?m=user_admin&p=show_groups&limit='.$limit_user.'&page=';
	}
	echo paginationPages($count_groups[0]['total'], $page_user, $limit_user, $uri, 3, 'userGroups');	
}
?>