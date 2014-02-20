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
	global $db, $settings;

	$my_user_id = $_SESSION['user_id']; #who we're logged in as
	$user_id = $_REQUEST['user_id'];

	$isAdmin = $db->isAdmin($my_user_id);
	$mySubUsersAssoc = $db->listSubUsersByParent($my_user_id);
	if($mySubUsersAssoc)
	{
		foreach ($mySubUsersAssoc as $subuser) {
		  $mySubUsers[] = $subuser['user_id'];
		}
	}

	// Check that we are admin or the user itself.
	if ( ! isset( $user_id ) )
	{
		print_failure("Error in parameters.");
		return;
	}
	// Allow user to modify owned subuser account information
	else if ( ! $isAdmin && $my_user_id !== $user_id && @!in_array($user_id, $mySubUsers))
	{
		print_failure(get_lang('no_rights'));
		return;
	}

	if ( $isAdmin )
	{
		$users = $db->getUserList();
		foreach ( $users as $user )
		{
			if ( $db->isAdmin($user['user_id']) )
			{
				$first_admin_id = $user['user_id'];
				break;
			}
		}

		if( $db->isAdmin($user_id) and ( $first_admin_id != $my_user_id ) and ( $user_id != $my_user_id ) )
		{
			print_failure(get_lang('no_rights'));
			return;
		}
	}

	echo "<h2>".get_lang('your_profile')."</h2>";
	echo "<div align='center'>";
	require_once("includes/form_table_class.php");

	if ( ( isset($_POST['new_password']) || isset($_POST['retype_new_password']) ) &&
		$_POST['new_password'] !== $_POST['retype_new_password'] )
	{
		print_failure(get_lang('password_mismatch'));
	}
	# If we are editing our own profile we need to enter our current password as well
	elseif (isset($_POST['edit_user']) && 
		   ($my_user_id === $user_id) && 
		   !$db->is_valid_login($my_user_id,$_REQUEST['current_password']))
	{
		print_failure(get_lang('current_password_mismatch'));
	}
	else if (isset($_POST['edit_user']))
	{
		$user_id = $_POST['user_id'];
		$newlang = $_POST['newlang'];
		$login = $_POST['login'];
		$login = str_replace('"', '', $login);
		$login = str_replace("'", "", $login);
		$firstname = $_POST['first_name'];
		$firstname = str_replace('"', '', $firstname);
		$firstname = str_replace("'", "", $firstname);
		$lastname = $_POST['last_name'];
		$lastname = str_replace('"', '', $lastname);
		$lastname = str_replace("'", "", $lastname);
		$email = $_POST['email_address'];
		$city = $_POST['city'];
		$province = $_POST['province'];
		$country = $_POST['country'];
		$phone = $_POST['phone_number'];
		$phone = preg_replace("/[^0-9]/", "", $phone);
		$theme = $_POST['theme'];

		// OGP needs to set the new theme and language in the current session, only if I'm modifying my own user profile.
		if ( $my_user_id == $user_id )
		{
			$_SESSION['users_theme'] = $theme;
			$_SESSION['users_lang'] = $newlang;
		}
			
		$fields['users_lang'] = $_POST['newlang'];
		$fields['users_fname'] = $firstname;
		$fields['users_lname'] = $lastname;
		$fields['users_phone'] = $phone;
		$fields['users_city'] = $city;
		$fields['users_province'] = $province;
		$fields['users_country'] = $country;
	  
		if( isset($settings['editable_email']) )
		{
			if( $settings['editable_email'] == "1" OR ( $settings['editable_email'] == "0" and $isAdmin ) )
				$fields['users_email'] = $email;
		}
		elseif( !isset( $settings['editable_email'] ) )
		{
			$fields['users_email'] = $email;
		}

		if ( $isAdmin )
		{
			$comment = $_POST['comment'];
			$mins = $_POST['minutes'];
			$hours = $_POST['hours'];
			$months = $_POST['month'];
			$days = $_POST['days'];
			$years = $_POST['years'];

			if($months == 'X' || $days == 'X' || $years == 'X' || $hours == 'X' || $mins == 'X')
				$expire_timestamp = "X";
			else
				$expire_timestamp = mktime( $hours, $mins, 0, $months, $days, $years, -1);

			$fields['users_comment'] = $comment;
			$fields['user_expires'] = $expire_timestamp;
			$fields['users_login'] = $login;
		}

		if ( empty($theme) )
			$fields['users_theme'] = NULL;
		else
			$fields['users_theme'] = $theme;

		if ( isset($_POST['new_password']) && !empty($_POST['new_password']) )
			$fields['users_passwd'] = md5($_POST['new_password']);

		if ( !$db->editUser($fields,$user_id) )
		{
			print_failure(get_lang_f('failed_to_update_user_profile_error', $db->getError()));
		}
		else
		{
			print_success(get_lang_f('profile_of_user_modified_successfully',$login));
			$db->logger(get_lang_f('profile_of_user_modified_successfully',$login));
		}

		global $view;
		if ( $isAdmin )
		{
			$view->refresh("?m=user_admin");
		}
		else
		{
			if(isset($_SESSION['REFER']))
				$view->refresh($_SESSION['REFER']);
			else
				$view->refresh("?m=user_admin&amp;p=edit_user&user_id=".$_SESSION['user_id']);
		}
		return;
	}

	$userInfo = $db->getUserById($user_id);
	$ft = new FormTable();
	$ft->start_form('?m=user_admin&amp;p=edit_user');
	$ft->add_field_hidden('user_id',$user_id);
	$ft->start_table();

	$login_option = ( !$isAdmin ) ? 'readonly="readonly"' : "";
	$ft->add_field('string','login',$userInfo['users_login'],50,$login_option);

	if ( $my_user_id === $user_id )
	{
		$ft->add_field('password','current_password','');
	}

	$ft->add_field('password','new_password','');
	$ft->add_field('password','retype_new_password','');
	$locale_files = makefilelist("lang/", ".|..|.svn", true, "folders");
	array_push($locale_files,"-");
	sort($locale_files);
	$ft->add_custom_field('language',
		create_drop_box_from_array($locale_files,"newlang",@$userInfo['users_lang']));

	require_once('modules/settings/functions.php');
	$theme = "";
	$add_empty = FALSE;
	if ( isset($userInfo['users_theme']) )
	{
		$theme = $userInfo['users_theme'];
		$add_empty = TRUE;
	}

	$ft->add_custom_field('theme', get_theme_html_str($theme, $add_empty));
	$ft->add_field('string','first_name',$userInfo['users_fname']);
	$ft->add_field('string','last_name',$userInfo['users_lname']);
	$ft->add_field('string','phone_number',$userInfo['users_phone']);

	$email_option = ( !$isAdmin and isset( $settings['editable_email'] ) and $settings['editable_email'] == "0" ) ? 'readonly="readonly"' : "";
	$ft->add_field('string','email_address',$userInfo['users_email'],50,$email_option);

	$ft->add_field('string','city',$userInfo['users_city']);
	$ft->add_field('string','province',$userInfo['users_province']);
	$ft->add_field('string','country',$userInfo['users_country']);
	if ( $isAdmin ) {
		$ft->add_field('text','comment',$userInfo['users_comment']);
	?>
		<tr>
		<td align='right'><?php print_lang('expires'); ?>:</td>
	<?php
		$timediff = $userInfo["user_expires"];
		//echo "Timediff is $timediff<br>";
		if(read_expire($timediff) !== 'X')
		{
			$exday =  date("j", $timediff);
			$exyear =  date("Y", $timediff);
			$exmonth =  date("m", $timediff);
			$exhour =  date("H", $timediff);
			$exmin =  date("i", $timediff);
		}
		else
		{
			$exday = "X";
			$exyear = "X";
			$exmonth = "X";
			$exhour = "X";
			$exmin = "X";
		}

		$minutes = range(0,59);
		$pad_length = 2;

		foreach ($minutes as &$minute)
		{
			$minute = str_pad($minute, $pad_length, "0", STR_PAD_LEFT);
		}

		$months = array('X' => 'X', '1' => 'Jan', '2' => 'Feb', '3' => 'Mar', '4' => 'Apr', '5' => 'May', '6' => 'Jun', '7' => 'July',
						'8' => 'Aug', '9' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec');

		#The ugliness below is to populate the expiration fields with what is in the db
		#Looks bad, but it works well
		echo "<td align='left'>";
		$x_array = array('X');
		echo create_drop_box_from_array(array_merge($x_array,range(1,31)),"days",$exday,true);
		echo create_drop_box_from_array($months,"month",$exmonth,false);
		echo create_drop_box_from_array(array_merge($x_array,range(date('Y')-1,date('Y')+10)),
			"years",$exyear,true);
		echo " - ";
		echo create_drop_box_from_array(array_merge($x_array,range(0,23)),"hours",$exhour,true);
		echo ":";
		echo create_drop_box_from_array(array_merge($x_array,$minutes),"minutes",$exmin,true);
		echo "<tr><td colspan='2' class='info'>".get_lang('expires_info')."</td></tr>";
	}

	$ft->end_table();
	$ft->add_button("submit","edit_user",get_lang('save_profile'));
	$ft->end_form();
	echo "</div>";
}
?>