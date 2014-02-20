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

session_start();
// Path definitions
define("IMAGES", "images/");
define("INCLUDES", "includes/");
define("MODULES", "modules/");

define("CONFIG_FILE","includes/config.inc.php");

require_once("includes/functions.php");
require_once("includes/helpers.php");
require_once("includes/html_functions.php");

//Config Check
$config_inc_readable = is_readable(CONFIG_FILE);
if ( !$config_inc_readable && file_exists("install.php") ) {
	header('Location: install.php');
	exit();
}
if ( '' == file_get_contents(CONFIG_FILE) ) { 
	header('Location: install.php');
	exit();
}

require_once CONFIG_FILE;
// Connect to the database server and select database.
$db = createDatabaseConnection($db_type, $db_host, $db_user, $db_pass, $db_name, $table_prefix);
$settings = $db->getSettings();
@$GLOBALS['panel_language'] = $settings['panel_language'];

// Load languages.
include_once("includes/lang.php");
ogpLang();

require_once("includes/view.php");
$view = new OGPView();
$view->setCharset(get_lang('lang_charset'));
if(isset($_GET['type']) && $_GET['type'] == 'cleared')
{
	heading(true);
	$view->printView(true);
}
else
{
	ogpHome();
	$view->printView();
}

function heading()
{

	global $db,$view,$settings;
	
	$view->setCharset(get_lang('lang_charset'));
	$view->setTimeZone($settings['time_zone']);
	
	if ( !file_exists(CONFIG_FILE) )
    {
        print_failure(get_lang('failed_to_read_config'));
        $view->refresh("index.php");
        return;
    }
    // Start Output Buffering
    	
	if( isset($settings['maintenance_mode']) && $settings['maintenance_mode'] == "1" )
	{
		if ($_SESSION['users_group'] != "admin" )
		{
			echo "<h2>".$settings['maintenance_title']."</h2>";
			echo "<p>".$settings['maintenance_message']."</p>";
			$view->setTitle("OGP: Maintenance.");
			echo "<p class='failure'>".get_lang('logging_out_10')."...</p>";
			echo "<meta http-equiv='refresh' content='10;url=index.php'";
			session_destroy();
			return;
		}
	}
	include "includes/navig.php";
	if(isset($maintenance))echo $maintenance;
}

function ogpHome()
{
    global $db,$view,$settings;
	
	if( isset($_GET['lang']) AND $_GET['lang'] != "-")
		$lang = $_GET['lang'];
	elseif( isset($settings['panel_language']) )
		$lang = $settings['panel_language'];
	else
		$lang = "English";
	
	$locale_files = makefilelist("lang/", ".|..|.svn", true, "folders");
	$lang_sel = "<form method=GET ><select name='lang' onchange=\"this.form.submit();\" >\n".
				"<option>-</option>\n";
	for ($i=0;$i < count($locale_files);$i++) 
	{
		$selected = ( isset( $_GET['lang'] ) AND $_GET['lang'] != "-" AND $_GET['lang'] == $locale_files[$i] ) ? "selected='selected'" : "";
		$lang_sel .= "<option $selected value='".$locale_files[$i]."' >".$locale_files[$i]."</option>\n";
	}
	$lang_sel .= "</select></form>\n";
	$lang_switch = ( isset( $_GET['lang'] ) AND $_GET['lang'] != "-" ) ? "&amp;lang=" . $_GET['lang'] : "";
	?>
	%top%
	<div class="menu-bg">
		<div class="menu">
		<ul>
		<li><a href="index.php<?php echo preg_replace( "/\&amp;/", "?", $lang_switch ); ?>" <?php if (!isset($_GET['m'])) echo 'class="admin_menu_link_selected"'; else echo 'class="admin_menu_link"'; ?> target="_self" ><?php echo get_lang('login_title'); ?></a></li>
<?php
	$menus = $db->getMenusForGroup('guest');
	if(!empty($menus))
	{
		foreach ( $menus as $menu )
		{
			$module = $menu['module'];
			if ( !empty( $menu['subpage'] ) )
			{
				$subpage = "&amp;p=".$menu['subpage'];
				$button = $menu['subpage'];
				if (isset($_GET['p']) AND $_GET['p'] == $menu['subpage'] ) $menu_link_class = 'user_menu_link_selected'; else $menu_link_class = 'user_menu_link';
			}
			else
			{
				$subpage = "";
				$button = $menu['module'];
				if (isset($_GET['m']) AND $_GET['m'] == $menu['module'] ) $menu_link_class = 'user_menu_link_selected'; else $menu_link_class = 'user_menu_link';
			}
						
			$button_url = "?m=".$module.$subpage.$lang_switch;
			
			if ( preg_match( '/\\_?\\_/', get_lang("$button") ) )
			{
				$button_name = $menu['menu_name'];
			}
			else
			{
				$button_name = get_lang("$button");
			}
			
			echo "<li><a class='".$menu_link_class."' href='".$button_url."'>".$button_name."</a>
				  </li>\n";
		}
	}
?>
		</ul>
		</div>
	</div>
	%topbody%
	<?php 
	if (isset($_GET['m']))
	{
		heading();
		//tagged for future use...
		/*
			$postdata = "";
			foreach($_POST as $key =>$value)
				$postdata .= ",'$key': '$value'";
			$postdata = substr($postdata,1);
			$postdata = "{".$postdata."}";
		*/
	}
	else
	{
		if ( isset($_SESSION['users_login']) )
		{
			$userInfo = $db->getUser($_SESSION['users_login']);
			if( isset($_SESSION['users_passwd']) AND !empty($_SESSION['users_passwd']) AND $_SESSION['users_passwd'] == $userInfo['users_passwd'])
			{
				print_success(get_lang('already_logged_in_redirecting_to_dashboard').".");
				$view->refresh("home.php?m=dashboard&amp;p=dashboard",2);
				echo "%botbody%
					  %bottom%";
				return;
			}
		}
		
		if ( isset($_POST['login']) )
		{
			if ( isset($_SERVER["REMOTE_ADDR"]) )
			{
				$client_ip = $_SERVER["REMOTE_ADDR"];
			}
			elseif ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) )
			{
				$client_ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			} 
			elseif( isset($_SERVER["HTTP_CLIENT_IP"]) )
			{
				$client_ip = $_SERVER["HTTP_CLIENT_IP"]; 
			}
			
			$ban_list = $db->resultQuery("SHOW TABLES LIKE 'OGP_DB_PREFIXban_list';");
			if ( empty( $ban_list ) )
			{
				$db->query("CREATE TABLE IF NOT EXISTS `OGP_DB_PREFIXban_list` (
							`client_ip` varchar(255) NOT NULL,
							`logging_attempts` int(11) NOT NULL DEFAULT '0',
							`banned_until` varchar(16) NOT NULL DEFAULT '0',
							 PRIMARY KEY (`client_ip`)
							) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
			}
			
			$banlist_info = $db->resultQuery("SELECT logging_attempts, banned_until FROM `OGP_DB_PREFIXban_list` WHERE client_ip='".$client_ip."';");
			$login_attempts = $banlist_info == FALSE ? 0 : $banlist_info['0']['logging_attempts'];
			
			if( $banlist_info == FALSE )
				$db->query("INSERT INTO `OGP_DB_PREFIXban_list` (`client_ip`) VALUES('$client_ip');");

			if( $banlist_info != FALSE AND $banlist_info['0']['banned_until'] > 0 AND $banlist_info['0']['banned_until'] <= time() )
				$db->query("UPDATE `OGP_DB_PREFIXban_list` SET logging_attempts='0', banned_until='0' WHERE client_ip = '$client_ip';");
				
			if( $login_attempts >= 3 )
			{
				print_failure("Banned until " . date("r",$banlist_info['0']['banned_until']));
				echo "%botbody%
					  %bottom%";
				return;
			}
						
			$userInfo = $db->getUser($_POST['ulogin']);
			// If result matched $myusername and $mypassword, table row must be 1 row
			if( isset($userInfo['users_passwd']) && md5($_POST['upassword']) == $userInfo['users_passwd'])
			{
				$_SESSION['user_id'] = $userInfo['user_id'];
				$_SESSION['users_login'] = $userInfo['users_login'];
				$_SESSION['users_passwd'] = $userInfo['users_passwd'];
				$_SESSION['users_group'] = $userInfo['users_role'];
				$_SESSION['users_lang'] = isset( $_GET['lang'] ) ? $_GET['lang'] : $userInfo['users_lang'];
				$_SESSION['users_theme'] = $userInfo['users_theme'];
				print_success(get_lang('logging_in')."...");
				$db->logger(get_lang('logging_in')."...");
				$db->query("UPDATE `OGP_DB_PREFIXban_list` SET logging_attempts='0', banned_until='0' WHERE client_ip = '$client_ip';");
				$view->refresh("home.php?m=dashboard&amp;p=dashboard",2);
			}
			else
			{
				print_failure(get_lang('bad_login'));
				$login_attempts++;
				$db->query("UPDATE `OGP_DB_PREFIXban_list` SET logging_attempts='$login_attempts' WHERE client_ip = '$client_ip';");
				if($login_attempts >= 3)
				{
					$banned_until = time() + 300; // Five minutes banned from the panel.
					$db->query("UPDATE `OGP_DB_PREFIXban_list` SET banned_until='".$banned_until."' WHERE client_ip = '$client_ip';");
				}
				$view->refresh("index.php",2);
			}
			echo "%botbody%
				  %bottom%";
			return;
		}
	?>
	<!-- Made for Revolution Theme v2 -->
	<style type="text/css">
	div.main-content {
		background:transparent;
		border:none;
		padding:0;
		border-radius:0px;
		-moz-border-radius:0px;
	}
	</style>
	<table style='width:200px' align='center'>
	  <tr style='background-color:transparent;' >
		<td style='background-color:transparent;' >
		<div class='bloc' >
		<h4><?php print_lang('login_title'); ?></h4>
		<br>
		<table>
			<tr>
				<td><?php print_lang('lang'); ?>:</td>
				<td><?php echo $lang_sel; ?></td>
			</tr>
			<form action="index.php<?php echo preg_replace( "/\&amp;/", "?", $lang_switch ); ?>" name="login_form" method="post">
			<tr>
				<td><?php print_lang('login'); ?>:</td>
				<td><input type="text" name="ulogin" id="ulogin" value="" ONFOCUS="clearDefault(this)" size="20" /></td>
			</tr>
			<tr>
				<td><?php print_lang('password'); ?>:</td>
				<td><input type="password" name="upassword" value="" size="20" /></td>
			</tr>
			<tr>
				<td><input type="submit" name="login" value="<?php print_lang('login_button'); ?>" /></td>
				<td><a href="?m=lostpwd<?php echo $lang_switch; ?>"><?php print_lang('lost_passwd'); ?></a></td>
			</tr>
			</form>
			<script language="JavaScript">
			document.login_form.ulogin.focus();
			</script> 
		</table>
		<br>
		</div>
		</td>
	  </tr>
	</table>
	<?php
	}
	?>
	<div class="clear"></div>	
	%botbody%
	%bottom%
<?php
}
?>