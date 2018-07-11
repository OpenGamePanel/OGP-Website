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

//Open Game Panel Sub User Add On By
//  own3mall


function exec_ogp_module() {
    require_once ("includes/functions.php");
    global $db;
    global $view;
    
    startSession();
    
    // Unset refer session used to redirect back to subusers page after editing account information
    if(isset($_SESSION['REFER'])){
		unset($_SESSION['REFER']);
	}
    
    if (isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
        $errmsg = '<table>';
        
        foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
            $errmsg.= "<tr><td><img width='8px' src='images/offline.png'/></td><td style='text-align:left;color:red;'>" . $msg . '</td></tr>';
        }
        $errmsg.= '</table><br>';
        unset($_SESSION['ERRMSG_ARR']);
    }
    echo "<h2>" . get_lang('delete_sub_user') . "</h2>";
    
    if (isset($errmsg)) {
        echo $errmsg;
    }

    // Subuser Delete Check
    if(isset($_POST['editUser'])){
		$_SESSION['REFER']="?m=subusers&p=del";
		$userID = $_POST['user_id'];
		unset($_POST['editUser']);
		$view->refresh("?m=user_admin&p=edit_user&user_id=" . $userID,0);
	}else{
    
		if (isset($_POST['delUser'])) {
			
			// Does user have permissions to delete this user?
			$isAdmin = $db->isAdmin($_SESSION['user_id']);
			$mySubUsers = $db->getUsersSubUsersIds($_SESSION['user_id']);
			if ( $mySubUsers === false || (!$isAdmin && @!in_array($_POST['user_id'], $mySubUsers)) || $_POST['user_id'] == $_SESSION['user_id'] ){
				print_failure(get_lang('no_rights'));
				return;
			}
			
			if (!isset($_POST['del_check'])) {
				$user_info = $db->getUserById($_POST['user_id']);
				echo "<table class='center' style='width:100%;' ><tr>\n" . "<td>" . get_lang_f('del_subuser_conf') . " " . $user_info['users_login'] . "?</td>" . "</tr><tr><td>" . '<form method="post" >' . "\n" . '<input type="hidden" name="user_id" value="' . $_POST['user_id'] . '">' . "\n" . '<input type="hidden" name="delUser" value="' . $_POST['delUser'] . '">' . "\n" . '<button name="del_check" value="yes" >' . get_lang('yes') . "</button>\n" . '<button name="del_check" value="no" >' . get_lang('no') . "</button>\n" . "</form>\n" . "</td>\n" . "</tr>\n" . "</table><br>\n";
			} elseif($_POST['del_check'] == "yes") {
				$userID = $_POST['user_id'];
				$user_info = $db->getUserById($userID);
				
				$errflag = false;
				if (!$db->delUser($userID)) {
					$errmsg_arr[] = get_lang('err_parent_user');
					$errflag = true;
				}

				//If there are input validations, redirect back to the registration form
				
				if ($errflag) {
					$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				} else {
					echo "<p>" . get_lang_f('subuser_deleted',$user_info['users_login']) . "</p>";
				}
			}
		}
		$results = listAllSubUsers();
		echo $results;
    
	}
}

function listAllSubUsers() {
    global $db;

    // echo $_SESSION['user_id'];
    $htmlCode = "";
    $subusers = $db->getUsersSubUsersIds($_SESSION['user_id']);
    
    if (is_array($subusers)) {
        $htmlCode.= "<table style=\"margin-left: 1em;\"><tr><th>" . get_lang('your_subusers') . "</th><th></th></tr>";
        
        if (count($subusers) > 0) {
            
            foreach ($subusers as $subuser) {
                $user_info = $db->getUserById($subuser);
                $htmlCode.= '<tr><td>' . $user_info['users_login'] . '</td><td><form method="post"><input type="hidden" name="user_id" value="' . $subuser . '" /><input type="submit" value="Edit" name="editUser" /><input type="submit" value="Delete" name="delUser" /></form></td></tr>';
            }
        } else {
            $htmlCode.= "<p>" . get_lang('no_subusers') . "</p>";
        }
        $htmlCode.= "</table>";
    } else {
       $htmlCode.= "<p>" . get_lang('no_subusers') . "</p>";
    }
    return $htmlCode;
}

?>
