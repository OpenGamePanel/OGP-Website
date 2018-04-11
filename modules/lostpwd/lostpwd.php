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

function makeRandomPassword() {
    $salt = "abchefghjkmnpqrstuvwxyz0123456789";
    srand((double)microtime()*1000000);
    $i = 0;
	$pass = "";
    while ($i <= 7) {
        $num = rand() % 33;
        $tmp = substr($salt, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}

function exec_ogp_module() {
	
	global $db,$view,$settings;
	
	$view->setCharset(get_lang('lang_charset'));
	
	$errorCount = 0;
	if(isset($errors)){
		unset($errors);
	}
	
	$moduleLink = "index.php?m=lostpwd";
	$lang_switch = (isset($_GET['lang']) and $_GET['lang'] != "") ? '&lang='.$_GET['lang'] : "";
	
	echo '<h2>'. get_lang("recover") . '</h2>';
	
	// We either need to show the form or process the email address input
	if(!isset( $_GET['user_id'] ) AND !isset( $_GET['ch_pass_uid'] )){
	
		if(isset($_POST['email_address'])){
			/* Start of Process User Input */
			$email_address = trim($_POST['email_address']);
			
			if ( empty($email_address) )
			{
				$errorCount++;
				$errors[] = get_lang('incomplete');
			}

			if (!stristr($email_address,"@") OR !stristr($email_address,"."))
			{
				$errorCount++;
				$errors[] = get_lang('errormail');

			}
			
			if($errorCount == 0){
			
				// Check to see if email address is in the database
				$user_info = $db->getUserByEmail($email_address);

				if ( empty($user_info) )
				{
					$errorCount++;
					$errors[] = get_lang('errormail');
				}
				
				// Still no errors?
				if($errorCount == 0){
					$user_id = $user_info['user_id'];
					$ch_pass_uid = $user_info['users_passwd'];
					$subject = get_lang('confirm_change_subject');
					$s = ( isset($_SERVER['HTTPS']) and  get_true_boolean($_SERVER['HTTPS']) ) ? "s" : "";
					$recover_link = '<a href="http'.$s.'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."&user_id=".$user_id.'&ch_pass_uid='.$ch_pass_uid.
									'" >http'.$s.'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."&user_id=".$user_id.'&ch_pass_uid='.$ch_pass_uid.'</a>';
					$message = get_lang_f('confirm_change_password_message',$recover_link);

					if (mymail($email_address, $subject, $message, $settings) == TRUE)
					{
						echo "<p>".get_lang('confirm_send')."</p>";
					}
					else
					{
						echo "<p>".get_lang('mail_failed')."</p>";
					}
					unset($_POST['email_address']);
				}
			}
		}else{
			// Show form
			$showForm = 1;
		}
		
		// Any errors?  If so, show the form
		if($errorCount > 0){
			$showForm = 1;
		}
		
		if(isset($showForm) and $showForm == 1){
			echo '<table style="width:200px" align="center" >
					<tr>
						<td colspan=2 >';
			// Print errors if there are any
			if(isset($errors) && is_array($errors)){
				foreach($errors as $error){
					echo '<p style="color: red;">' . $error . '</p>';
				}
			}
			
			echo '<form method="post" action="?m=lostpwd'.$lang_switch.'">
							<label for="email_address">' . get_lang("email") . '</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" title="' . get_lang("enter_email") . '" name="email_address" size="30" value="';
			if(isset($email_address)){
				echo $email_address;
			}
			echo	'"/>
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">
							<input type="submit" value="' . get_lang("submit") . '" class="submit-button"/>
							</form>
						</td>
					</tr>
					<tr>
						<td style="text-align:left;">
							<form method="post" action="index.php' . str_replace("&","?",$lang_switch) . '" style="margin-top:-28px;">
							<input type="submit" value="<<&nbsp;' . get_lang("back") .'" class="submit-button"/>
							</form>
						</td>
					</tr></table>';
				
		}

	}else if(isset( $_GET['user_id'] ) AND isset( $_GET['ch_pass_uid'] )){
		$user_id = trim($_GET['user_id']);
		$ch_pass_uid = trim($_GET['ch_pass_uid']);
		$user_info = $db->getUserById($user_id);
		if ( empty($user_info) )
		{
			print_failure(get_lang('errormail'));
			echo "<p><a href='" . $moduleLink . "'>&lt;&lt; ".get_lang('back')."</a></p>";
			return;
		}
		$email_address = $user_info['users_email'];
		$random_password = makeRandomPassword();
		$db_password = md5($random_password);
		$old_pass_md5_hash = $user_info['users_passwd'];
		
		if ( $old_pass_md5_hash != $ch_pass_uid )
		{
			print_failure("Failed to update password for user.");
			echo "<p><a href='" . $moduleLink . "'>&lt;&lt; ".get_lang('back')."</a></p>";
			return;
		}
						
		$random_password = makeRandomPassword();
		$db_password = md5($random_password);
		
		if ( $db->updateUsersPassword($user_id,$db_password) === FALSE )
		{
			print_failure("Failed to update password for user.");
			echo "<p><a href='" . $moduleLink . "'>&lt;&lt; ".get_lang('back')."</a></p>";
			return;
		}
		
		$subject = get_lang('subject');
		$message = get_lang_f('password_message',$random_password);

		if (mymail($email_address, $subject, $message, $settings) == TRUE)
		{
			echo "<p>".get_lang('send')."</p>";
		}
		else
		{
			echo "<p>".get_lang('mail_failed')."</p>";
		}
		echo "<p>".get_lang('click')." <a href='index.php'>".get_lang('here')."</a> ".get_lang('to_login')."</p>";
	}else{
		print_failure("Security alert.");
	}
	
}
?>
