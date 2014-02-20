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
//Open Game Panel Free User Registration Add On By
//  MarkDogg18769

function checkEmail($email) {
	if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email))
	{
		return true;
	}
	return false;
}

require_once("includes/functions.php");
function exec_ogp_module()
{
	global $db,$view,$settings;
		
	$adminEmailList = '';
	// Get email address of all admins to inform him when a user has registered.
	$admins = $db->getAdmins();
	if(is_array($admins) && count($admins) > 0){
		foreach($admins as $admin){
			$adminEmail = $admin['users_email'];
			$adminEmailList .= $adminEmail . ',';
		}
	}
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Array to store input values
	$input = array();
	
	//Validation error flag
	$errflag = false;
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return $str;
	}
		
	//Sanitize the POST values
	$users_fname = $_POST['users_fname'];
	$users_fname = str_replace('"', '', $users_fname);
	$users_fname = str_replace("'", "", $users_fname);
	$users_lname = $_POST['users_lname'];
	$users_lname = str_replace('"', '', $users_lname);
	$users_lname = str_replace("'", "", $users_lname);
	$users_login = $_POST['login_name'];
	$users_login = str_replace('"', '', $users_login);
	$users_login = str_replace("'", "", $users_login);
	$users_passwd = clean($_POST['users_passwd']);
	$users_cpasswd = clean($_POST['users_cpasswd']);
	$users_email = clean($_POST['users_email']);
	$users_comment = clean($_POST['users_comment']);

	if( !empty($users_fname) ) {
	$input['users_fname'] = $users_fname;
	}
	if( !empty($users_lname) ) {
	$input['users_lname'] = $users_lname;
	}
	if( !empty($users_login) ) {
	$input['users_login'] = $users_login;
	}
	if( !empty($users_email) ) {
	$input['users_email'] = $users_email;
	}
	
	$lang_switch = (isset($_GET['lang']) AND $_GET['lang'] != "-" )? "lang=".$_GET['lang'] : "";
	
	//Input Validations
	if($users_fname == '') {
		$errmsg_arr[] = get_lang('err_first_name');
		$errflag = true;
	}
	if($users_lname == '') {
		$errmsg_arr[] = get_lang('err_last_name');
		$errflag = true;
	}
	if( $users_email == '' OR !checkEmail($users_email) ) {
		$errmsg_arr[] = get_lang('err_email_address');
		$errflag = true;
	}
	elseif($db->getUserByEmail($users_email) != FALSE)
	{
		$user = $db->getUserByEmail($users_email);
		$errmsg_arr[] = get_lang_f('err_email_address_already_in_use_by',$user['users_login']);
		$errflag = true;
	}
	if($users_login == '') {
		$errmsg_arr[] = get_lang('err_login_name');
		$errflag = true;
	}
	if($users_passwd == '') {
		$errmsg_arr[] = get_lang('err_password');
		$errflag = true;
	}else{
		// 6 char password minimum
		if(strlen($users_passwd) < 6){
			$errmsg_arr[] = get_lang('passwd_len');
			$errflag = true;
		}
	}
	if($users_cpasswd == '') {
		$errmsg_arr[] = get_lang('err_confirm_password');
		$errflag = true;
	}
	
	
	
	if( strcmp($users_passwd, $users_cpasswd) != 0 ) {
		$errmsg_arr[] = get_lang('err_password_mismatch');
		$errflag = true;
	}
	
	require_once('recaptchalib.php');
	require_once('captchakeys.php');
	$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

	if (!$resp->is_valid) 
	{
		$errmsg_arr[] = get_lang('err_captcha');
		$errflag = true;
	}
	
	//Create INSERT query
	if( !$errflag )
	{
		if(!$db->addUser($users_login,$users_passwd,"user",$users_email) )
		{
			$errmsg_arr[] = get_lang('err_login_name');
			$errflag = true;
		}
		else
		{
			$user = $db->getUser($users_login);
			$user_id = $user['user_id'];

			$fields['users_fname'] = $users_fname;
			$fields['users_lname'] = $users_lname;
			$fields['users_comment'] = $users_comment;
			if(isset($_GET['lang']))
				$fields['users_lang'] = $_GET['lang'];
			else
				$fields['users_lang'] = $settings['panel_language'];
			
			if($db->editUser($fields,$user_id))
			{
				if(isset($adminEmailList) && !empty($adminEmailList)){
					$to = $adminEmailList . $users_email;
				}else{
					$to = $users_email;
				}
				
				if( empty( $settings['panel_name'] ) )
					$subject = get_lang_f('subject',"Open Game Panel");
				else
					$subject = get_lang_f('subject',$settings['panel_name']);
				
				$message = get_lang_f('register_message',$users_login,$_POST['users_passwd']);
				
				$mail = mymail($to, $subject, $message, $settings);
				
				if($mail)
				{
					print_success(get_lang_f('your_account_details_has_been_sent_by_email_to',$users_email));
					$view->refresh("index.php?".$lang_switch,8);
				}
			}
			else
			{
				$user = $db->getUser($users_login);
				$user_id = $user['user_id'];
				$db->delUser($user_id);
				print_failure('FAILURE: Unable to set user details, try again.');
				$view->refresh("index.php?m=register&p=form&".$lang_switch,8);
			}
		}
	}
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		$_SESSION['INPUT'] = $input;
		$view->refresh("index.php?m=register&p=form&".$lang_switch,0);
	}
}
?>
