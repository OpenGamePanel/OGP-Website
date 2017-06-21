<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2016 The OGP Development Team
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
	if ($db->isAdmin($_SESSION['user_id']))
		$result = $db->getGroupList();
	else
		$result = $db->getUserGroupList($_SESSION['user_id']);
		
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
}
