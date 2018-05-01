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

//Open Game Panel Subusers Addon By
// OwN-3m-All

require_once("includes/functions.php");
function exec_ogp_module()
{
	global $db,$view;
			
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
	$users_login = sanitizeInputStr($_POST['users_login']);
	$users_passwd = clean($_POST['users_passwd']);
	$users_cpasswd = clean($_POST['users_cpasswd']);
	$parent_user = clean($_SESSION['user_id']);


	if( !empty($users_login) ) {
		$input['users_login'] = $users_login;
	}
	
	
	//Input Validations
	if($users_login == '') {
		$errmsg_arr[] = get_lang('err_login_name');
		$errflag = true;
	}
	if($users_passwd == '') {
		$errmsg_arr[] = get_lang('err_password');
		$errflag = true;
	}
	if($users_cpasswd == '') {
		$errmsg_arr[] = get_lang('err_confirm_password');
		$errflag = true;
	}
	if( strcmp($users_passwd, $users_cpasswd) != 0 ) {
		$errmsg_arr[] = get_lang('err_password_mismatch');
		$errflag = true;
	}
	if(empty($parent_user)){
		$errmsg_arr[] = get_lang('err_parent_user');
		$errflag = true;
	}
	
	//Create INSERT query
	if( !$errflag )
	{
		if(!$db->addUser($users_login,$users_passwd,"subuser",NULL,$parent_user))
		{
			$errmsg_arr[] = get_lang('err_login_name');
			$errflag = true;
		}
		
		echo "<p>" . get_lang_f('subuser_added',$users_login) . "</p>";
		$view->refresh("?m=subusers&p=submanage", 5);
	}
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		$_SESSION['INPUT'] = $input;
		$view->refresh("home.php?m=subusers&p=add",0);
	}
}
?>
