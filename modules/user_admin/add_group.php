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

    if( isset($_POST['add_group']) )
    {
        $group = sanitizeInputStr($_POST['group_name']);

        if (empty($group))
        {
            print_failure(get_lang('group_name_empty'));
            return;
        }

        if ( !$db->addGroup($group,$_SESSION['user_id']) )
        {
            print_failure(get_lang_f("failed_to_add_group",$group));
            $view->refresh("?m=user_admin&amp;p=show_groups");
            return;
        }

        print_success(get_lang_f('successfully_added_group',$group));
		$db->logger(get_lang_f('successfully_added_group',$group));
        $view->refresh("?m=user_admin&amp;p=show_groups");
    }
}
?>
