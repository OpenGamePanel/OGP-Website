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

require_once("includes/functions.php");
require_once("includes/helpers.php");
require_once("includes/html_functions.php");
startSession();

// Report all PHP errors
error_reporting(E_ERROR);

// Path definitions
define("IMAGES", "images/");
define("INCLUDES", "includes/");
define("MODULES", "modules/");

define("CONFIG_FILE","includes/config.inc.php");

require_once CONFIG_FILE;
// Connect to the database server and select database.
$db = createDatabaseConnection($db_type, $db_host, $db_user, $db_pass, $db_name, $table_prefix);

// Load languages.
include_once("includes/lang.php");

if (!$db instanceof OGPDatabase) {
	ogpLang();
	die(get_lang('no_db_connection'));
}

// Logged in user settings - access this global variable where needed
if(hasValue($_SESSION['user_id'])){
	$loggedInUserInfo = $db->getUserById($_SESSION['user_id']);
}

$settings = $db->getSettings();
@$GLOBALS['panel_language'] = $settings['panel_language'];
ogpLang();

require_once("includes/view.php");
$view = new OGPView();
$view->setCharset(get_lang('lang_charset'));
$view->setTimeZone($settings['time_zone']);
if(isset($_GET['type']) && $_GET['type'] == 'cleared')
{
	if(isset($_GET['data_type'])){
		heading(true);
		$view->printView(true, $_GET['data_type']);
	}else{
	   heading(true);
	   $view->printView(true);
	}
}
else
{
	ogpHome();
	$view->printView();
}

function heading()
{
	global $db,$view,$settings;
	
	if ( !file_exists(CONFIG_FILE) )
    {
        print_failure(get_lang('failed_to_read_config'));
        $view->refresh("index.php");
        return;
    }
    // Start Output Buffering
    if (!isset($_SESSION['users_login']))
    {
        print_failure(get_lang('invalid_login_information'));
		echo "<p class='note' style='color:red;'>".get_lang('invalid_redirect')."...</p>";
		$view->refresh("index.php", 2);
        return;
    }   
    else
    {
        $info = $db->getUserById($_SESSION['user_id']);
        
        // Use parent expiration date for subusers
		if(!is_null($info['users_parent']) && is_numeric($info['users_parent'])){
			$parentInfo = $db->getUserById($info['users_parent']);
			if(is_array($parentInfo) && array_key_exists("user_expires", $parentInfo) && $parentInfo['user_expires'] != "X"){
				$info['user_expires'] = $parentInfo['user_expires'];
			}
		}
        
		if($info['user_expires'] != "X")
		{
			list($days,$strd,$hours,$strh,$minutes,$strm) = explode(" ", read_expire($info['user_expires']));
			
			$minutes2expire = $minutes + intval( $hours * 60 ) + intval( $days * 24 * 60 );

 			if($minutes2expire <= 0)
			{
				echo "<h1>".get_lang('account_expired')."</h1>";
				echo "<p class='note'>".get_lang('contact_admin_to_enable_account')."</p>";
				session_destroy();
				return;
			}
		}
		
		if( isset($settings['maintenance_mode']) && $settings['maintenance_mode'] == "1" )
		{
			if ($_SESSION['users_group'] == "user")
			{
				echo "<h2>".$settings['maintenance_title']."</h2>";
				echo "<p>".$settings['maintenance_message']."</p>";
				$view->setTitle("OGP: Maintenance.");
				echo "<p class='failure'>".get_lang('logging_out_10')."...</p>";
				$view->refresh("index.php", 10);
				session_destroy();
				return;
			}
		}
		if ( isset($_REQUEST['logout']) )
		{
			session_destroy();
			print_success(get_lang('logout_message'));
			$view->refresh("index.php");
			return;
		}
		include "includes/navig.php";
	}
	if(isset($maintenance))echo $maintenance;
}

function ogpHome()
{
    global $db,$view,$settings;
	?>
	%top%
	<?php
	if(isset($_SESSION['user_id']))
	{
		$isAdmin = $db->isAdmin($_SESSION['user_id']);
			
		if ( $isAdmin )
			$server_homes = $db->getHomesFor('admin', $_SESSION['user_id']);
		else
			$server_homes = $db->getHomesFor('user_and_group', $_SESSION['user_id']);
				
		if(!empty($server_homes))
		{
			$servers_by_game_name = array();
			foreach( $server_homes as $server_home )
			{
				if(isset($settings['check_expiry_by']) and $settings['check_expiry_by'] == "once_logged_in")
				{
					if($db->check_expire_date($_SESSION['user_id'], $server_home['home_id']))
						continue;
				}
				$servers_by_game_name["$server_home[game_name]"][] = $server_home;
			}
			ksort($servers_by_game_name);
			$game_homes_list = "<ul id='submenu_0' >\n";
			require_once("modules/config_games/server_config_parser.php");
			foreach( $servers_by_game_name as $game_name => $server_homes )
			{
				$server_xml = read_server_config(SERVER_CONFIG_LOCATION."/".$server_homes[0]['home_cfg_file']);
				$mod = $server_homes[0]['mod_key'];
				// If query name does not exist use mod key instead.
				if ($server_xml->protocol == "gameq")
					$query_name = $server_xml->gameq_query_name;
				elseif ($server_xml->protocol == "lgsl")
					$query_name = $server_xml->lgsl_query_name;
				elseif ($server_xml->protocol == "teamspeak3")
					$query_name = 'ts3';
				else
					$query_name = $mod;
				
				//----------+ getting the lgsl image icon
				$icon_paths = array("images/icons/$mod.png",
									"images/icons/$query_name.png",
									"protocol/lgsl/other/icon_unknown.gif");

				$icon_path = get_first_existing_file($icon_paths);
				
				$game_homes_list .= "<li>\n<a href='?m=gamemanager&p=game_monitor&home_cfg_id=".$server_homes[0]['home_cfg_id'].
									"'><span data-icon_path='$icon_path'>$game_name</span></a>\n<ul id='submenu_1' >\n";
				foreach($server_homes as $server_home)
				{
					$button_name = htmlentities($server_home['home_name']);
					if( ! preg_match("/none/i", $server_home['mod_name']) ) 
						$button_name .= " - ".$server_home['mod_name'];
					$game_homes_list .= "<li><a title='".$server_home['ip'].':'.$server_home['port'].
										"' class='user_menu_link' href='?m=gamemanager&p=game_monitor&home_id-mod_id-ip-port=".
										$server_home['home_id'].'-'.$server_home['mod_id'].'-'.$server_home['ip'].'-'.
										$server_home['port']."'>".$button_name."</a></li>\n";
				}
				$game_homes_list .= "</ul>\n</li>\n";
			}
			$game_homes_list .= "</ul>\n";
		}
		else
			$game_homes_list = "";
		?>
		<div class="menu-bg">
			<div class="menu">
			<ul>
			<?php
			$menus = $db->getMenusForGroup('user');
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
				$button_url = "?m=".$module.$subpage;
				
				if ( preg_match( '/\\_?\\_/', get_lang("$button") ) )
				{
					$button_name = $menu['menu_name'];
				}
				else
				{
					$button_name = get_lang("$button");
				}
				
				echo "<li><a class='".$menu_link_class."' href='".$button_url."'><span class='$button'>".$button_name."</span></a>";
				if( $menu['subpage'] == "game_monitor" )
						echo $game_homes_list;
				echo "</li>\n";
			}
			
			if($isAdmin)
			{
				$data = "";
				$TotalSelected = false;
				$menus = $db->getMenusForGroup('admin');
				
				foreach ($menus as $key => $row) {
					if ( !empty( $row['subpage'] ) )
						$name[$key]  = $row['subpage'];
					else
						$name[$key]  = $row['module'];
												
					$translation[$key] = get_lang($name[$key]);
				}
				array_multisort($translation, $name, SORT_DESC, $menus);
				
				foreach ( $menus as $menu )
				{
					$module = $menu['module'];
					if ( !empty( $menu['subpage'] ) )
					{
						$subpage = "&amp;p=".$menu['subpage'];
						$button = $menu['subpage'];
						if (isset($_GET['p']) AND $_GET['p'] == $menu['subpage'] ) $menu_link_class = 'admin_menu_link_selected'; else $menu_link_class = 'admin_menu_link';
					}
					else
					{
						$subpage = "";
						$button = $menu['module'];
						if (isset($_GET['m']) AND $_GET['m'] == $menu['module'] ) $menu_link_class = 'admin_menu_link_selected'; else $menu_link_class = 'admin_menu_link';
					}
					if($menu_link_class == 'admin_menu_link_selected' && isset($_GET['m']) && $_GET['m'] != 'user_admin')
						$TotalSelected = true;
					else if (isset($_GET['m']) && $_GET['m'] == 'user_admin')
						if(!isset($_GET['p']))
							$TotalSelected = true;
						else if($_GET['p'] != 'edit_user')
							$TotalSelected = true;
					$button_url = "?m=".$module.$subpage;
					
					if ( preg_match( '/\\_?\\_/', get_lang("$button") ) )
					{
						$button_name = $menu['menu_name'];
					}
					else
					{
						$button_name = get_lang("$button");
					}
					
					$data .= "<li><a class='".$menu_link_class."' href='".$button_url."'><span class='$button'>".$button_name."</span></a></li>\n";
				}
				?>
				<li><a href="?m=administration&amp;p=main" 
				<?php 
				if ((isset($_GET['m']) AND $_GET['m'] == "administration") || $TotalSelected )
					echo 'class="admin_menu_link_selected"'; else echo 'class="admin_menu_link"';
				?> target="_self" ><span class="administration" ><?php echo get_lang('administration'); ?></span></a>
				<ul id="administration" >
					<?php echo $data ?>
				</ul>
			</li>
			<?php
			}
			else
				$isSubUser = $db->isSubUser($_SESSION['user_id']);
				?>
				<li>
					<a href="?m=user_admin&amp;p=edit_user&amp;user_id=<?php echo $_SESSION['user_id'] ?>" 
					<?php if (isset($_GET['p']) AND $_GET['p'] == "edit_user" ) echo 'class="user_menu_link_selected"'; else echo 'class="user_menu_link"'; 
					?> target="_self" ><span class="username" ><?php echo $_SESSION['users_login']; ?></span></a>
					<ul>
					<?php
					// Normal users only!
					if(!$isAdmin && !$isSubUser)
					{
						if($db->isModuleInstalled("subusers")){
					?>
						<li><a href="?m=subusers&p=submanage"><span class="subusers"><?php print_lang('sub_users'); ?></span></a></li>
					<?php
						}
					?>
						<li><a href="?m=user_admin&p=show_groups"><span class="groups"><?php print_lang('show_groups'); ?></span></a></li>
					<?php
					}
					?>
						<li><a href="?logout"><span class="logout">[<?php print_lang('logout'); ?>]</span></a></li>
					</ul>
				</li>
			<?php
			// Custom Tabs
			if( isset($settings['custom_tab']) && $settings['custom_tab'] == "1" && isset($settings['custom_tab_name']) && $settings['custom_tab_name'] != "" )
			{
				echo "<li><a href='$settings[custom_tab_link]' target='$settings[custom_tab_target_blank]'><span class='customtab'>$settings[custom_tab_name]</span></a>";

				if( isset($settings['custom_tab_sub']) && $settings['custom_tab_sub'] == "1" )
				{
					echo '<ul>';
					for($i = 1; $i <= 4; $i++)
					{
						$num = $i == 1 ? "" : $i;
						if( isset($settings["custom_tab_sub_name$num"]) && $settings["custom_tab_sub_name$num"] != "" )
						{
							echo '<li><a href="'.$settings["custom_tab_sub_link$num"].'" target="'.
								 $settings["custom_tab_target_blank"].'" ><span class="customtab">'.$settings["custom_tab_sub_name$num"].'</span></a></li>';
						}
					}
					echo '</ul>';
				}
				echo '</li>';
			}
			?>
			</ul>
			</div>
		</div>
	<?php
	}
	?>
	%topbody%
	<?php 
	heading();
	?>
	<div class="clear"></div>
	%botbody%
	%bottom%
<?php
}
?>
