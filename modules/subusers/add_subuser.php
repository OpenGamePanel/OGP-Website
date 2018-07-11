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

//Open Game Panel Sub User Registration Add On By
//  own3mall

function exec_ogp_module()
{
	global $db,$view;

	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) 
	{
		$errmsg = '<table>';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) 
		{
			$errmsg .= "<tr><td><img width='8px' src='images/offline.png'/></td><td style='text-align:left;color:red;'>".$msg.'</td></tr>'; 
		}
		$errmsg .= '</table><br>';
		unset($_SESSION['ERRMSG_ARR']);
	}
	echo "<h2>".get_lang('create_sub_user')."</h2>";
	if(isset($errmsg))
	{
		echo $errmsg;
		$input = $_SESSION['INPUT'];
	}

	?>
	<form name="loginForm" method="post" action="?m=subusers&p=adduser">
	<table>
	<tr>
	  <td class="right">
		<?php echo get_lang('login_name'); ?>
	  </td>
	  <td class="left">
		<input name="users_login" type="text" size="25" id="users_login" value="<?php if(isset($input['users_login'])) echo $input['users_login']; ?>" />
	  </td>
	</tr>
	<tr>
	<td class="right">
		<?php echo get_lang('subuser_password'); ?>
	  </td>
	   <td class="left">
		   <input name="users_passwd" type="password" size="25" id="users_passwd" />
		   </td>
	</tr>
	<tr>
	<td class="right">
		<?php echo get_lang('confirm_password'); ?>
	  </td>
	   <td class="left">
		   <input name="users_cpasswd" type="password" size="25" id="users_cpasswd" />
		   </td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td class="left">
		  <input type="submit" name="Submit" value="<?php echo get_lang('create_sub_user'); ?>" /> 
	  </td>
	</tr>
	</table>
	</form>
	<?php
}
?>
