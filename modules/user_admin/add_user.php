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
    if( isset($_POST['submit']) )
    {
        $username = sanitizeInputStr($_POST['username']);
        $user_role = trim($_POST['user_role']);
        $password = trim($_POST['newpass']);
        $password2 = trim($_POST['newpass2']);
		
		// Check a username is actually entered...
		if(empty($username) === true){
			print_failure(get_lang('enter_valid_username'));
			$view->refresh("?m=user_admin");
			return;
		}
		
		// Check _POST['user_role'] is what we expect it to be: either user or admin.
		// Without this it can be anything else. It's pointless being anything else - but why allow it to be anything else?
		if(in_array($_POST['user_role'], array('user', 'admin')) === false){
			print_failure(get_lang('unexpected_role'));
			$view->refresh("?m=user_admin");
			return;
		}
		
        if( empty($password) || empty($password2) )
        {
            print_failure(get_lang('you_need_to_enter_both_passwords'));
            $view->refresh("?m=user_admin");
            return;
        }

        if($password !== $password2)
        {
            print_failure(get_lang('passwords_did_not_match'));
            $view->refresh("?m=user_admin");
            return;
        }

        if ( !$db->addUser($username,$password,$user_role) )
        {
            print_failure(get_lang_f('could_not_add_user_because_user_already_exists', $username));
            $view->refresh("?m=user_admin");
            return;
        }

        print_success(get_lang_f('successfully_added_user', $username));
		$db->logger(get_lang_f('successfully_added_user', $username));
        $view->refresh("?m=user_admin");
    }
    else
    {
?>
    <div class="center">
    <h2><?php print_lang('add_a_new_user'); ?></h2>
    <form action="?m=user_admin&amp;p=add" method="post">
    <table class="center">
    <tr><td align='right'><label for='username'><?php print_lang('username'); ?>:</label></td><td><input id="username" type="text" name="username" value="" /></td></tr>
    <tr><td align='right'><?php print_lang('user_role'); ?>:</td><td align='left'>
    <select name='user_role'>
    <option value="admin"><?php print_lang('admin'); ?></option>
    <option value="user" selected="selected"><?php print_lang('user'); ?></option></select></td></tr>
    <tr><td align='right'><label for='password'><?php print_lang('password'); ?>:</label></td><td><input id="password" type="password" name="newpass" value="" /></td></tr>
    <tr><td align='right'><label for='confirm_password'><?php print_lang('confirm_password'); ?>:</label></td>
        <td><input id="confirm_password" type="password" name="newpass2" value="" /></td></tr>
    </table>
    <p><input type="submit" name="submit" value="<?php print_lang('add_user'); ?>" /></p>
    </form>
    </div><?php
    }
}
?>
