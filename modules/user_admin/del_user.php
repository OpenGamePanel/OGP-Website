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

    $user_id = $_GET['user_id'];
    $y = isset($_GET['y']) ? $_GET['y'] : "";

    $user = $db->getUserById($user_id);

    if ( empty($user) )
    {
        print_failure(get_lang_f('user_with_id_does_not_exist', $user_id));
        return;
    }

    $username = $user['users_login'];

    if($y !== 'y')
    {
		if(!$db->isModuleInstalled("subusers")){
			echo "<p>".get_lang_f('are_you_sure_you_want_to_delete_user', $username)."</p>";
		}else{
			if(!$db->isSubUser($user_id)){
				echo "<p>".get_lang_f('are_you_sure_you_want_to_delete_user', $username) . get_lang('andSubUsers') . "</p>";
			}else{
				echo "<p>".get_lang_f('are_you_sure_you_want_to_delete_user', $username)."</p>";
			}
		}
        echo "<p><a href=\"?m=user_admin&amp;p=del&amp;user_id=$user_id&amp;y=y\">".
            get_lang('yes')."</a> <a href=\"?m=user_admin\">".
            get_lang('no')."</a></p>";
        return;
    }

    if( !$db->delUser($user_id) )
    {
        print_failure(get_lang_f('unable_to_delete_user', $username));
        $view->refresh("?m=user_admin");
        return;
    }

    print_success(get_lang_f('successfully_deleted_user', $username));
	$db->logger(get_lang_f('successfully_deleted_user', $username));
    $view->refresh("?m=user_admin");
};
?>
