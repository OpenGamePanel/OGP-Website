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
    global $db;
    global $view;
	
	$group_id = $_GET['group_id'];
	
	if ( !$db->isAdmin($_SESSION['user_id']) )
	{
		$result = $db->getUserGroupList($_SESSION['user_id']);
		foreach ( $result as $row ) #loop through the groups
		{
			if ( $row['group_id'] == $group_id )
			{
				$own_group = TRUE;
			}
		}
	}
	
	if(!$db->isAdmin($_SESSION['user_id']) && !isset($own_group)) 
	{
		echo "<p class='note'>".get_lang('not_available')."</p>";
		return;
	}
	
    $y = isset($_GET['y']) ? $_GET['y'] : "";

    $group = $db->getGroupById($group_id);

    if ( empty($group) )
    {
        print_failure(get_lang_f('group_with_id_does_not_exist', $group_id));
        return;
    }

    $groupname = $group['group_name'];

    if($y !== 'y')
    {
        echo "<p>".get_lang_f('are_you_sure_you_want_to_delete_group', $groupname)."</p>";
        echo "<p><a href=\"?m=user_admin&amp;p=del_group&amp;group_id=$group_id&amp;y=y\">".
            get_lang('yes')."</a> <a href=\"?m=user_admin&amp;p=show_groups\">".
            get_lang('no')."</a></p>";
        return;
    }

    if( !$db->delGroup($group_id) )
    {
        print_failure(get_lang_f('unable_to_delete_group', $groupname));
        $view->refresh("?m=user_admin&amp;p=show_groups");
        return;
    }

    print_success(get_lang_f('successfully_deleted_group', $groupname));
	$db->logger(get_lang_f('successfully_deleted_group', $groupname));
    $view->refresh("?m=user_admin&amp;p=show_groups");
};
?>
