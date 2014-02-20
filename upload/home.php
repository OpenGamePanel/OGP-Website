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

// Report all PHP errors
error_reporting(E_ERROR);

session_start();

// Path definitions
define("IMAGES", "images/");
define("INCLUDES", "includes/");
define("MODULES", "modules/");

define("CONFIG_FILE","includes/config.inc.php");

require_once("includes/functions.php");
require_once("includes/helpers.php");
require_once("includes/html_functions.php");

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
$view->setTimeZone($settings['time_zone']);
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
        echo "<meta http-equiv='refresh' content='2;url=index.php'";
        return;
    }   
    else
    {
        $info = $db->getUser($_SESSION['users_login']);

        $chk_expire = $info['user_expires'];
        $exptime = read_expire($chk_expire);

		if($exptime != "X")
		{
			list($days,$strd,$hours,$strh,$minutes,$strm) = explode(" ", $exptime);
			
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
				echo "<meta http-equiv='refresh' content='10;url=index.php'";
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
			$server_homes = $db->getIpPorts();
		else
			$server_homes = $db->getIpPortsForUser($_SESSION['user_id']);
			
		$servers_by_game_name = array();
		foreach( $server_homes as $server_home )
		{
			$servers_by_game_name["$server_home[game_name]"][] = $server_home;
		}
		ksort($servers_by_game_name);
		$game_homes_list = "<ul id='submenu_0' >\n";
		foreach( $servers_by_game_name as $game_name => $server_homes )
		{
			$game_homes_list .= "<li>\n<a href='?m=gamemanager&p=game_monitor&home_cfg_id=".$server_homes[0]['home_cfg_id']."'>$game_name</a>\n<ul id='submenu_1' >\n";
 			foreach($server_homes as $server_home)
			{
				$button_name = $server_home['home_name'];
				if( ! preg_match("/none/i", $server_home['mod_name']) ) 
					$button_name .= " - ".$server_home['mod_name'];
				$game_homes_list .= "<li><a title='".$server_home['ip'].':'.$server_home['port']."' class='user_menu_link' href='?m=gamemanager&p=game_monitor&home_id-mod_id-ip-port=".$server_home['home_id'].'-'.$server_home['mod_id'].'-'.$server_home['ip'].'-'.$server_home['port']."'>".$button_name."</a></li>\n";
			}
			$game_homes_list .= "</ul>\n</li>\n";
		}
		$game_homes_list .= "</ul>\n";
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
				
				echo "<li><a class='".$menu_link_class."' href='".$button_url."'>".$button_name."</a>";
				if( !empty($server_homes) and $menu['subpage'] == "game_monitor" )
						echo $game_homes_list;
				echo "</li>\n";
			}
	
			if(!$isAdmin){
				$isSubUser = $db->isSubUser($_SESSION['user_id']);
			}
			if ($isAdmin)
			{
			?>
			<li>
				<?php
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
						
						$data .= "<li><a class='".$menu_link_class."' href='".$button_url."'>".$button_name."</a></li>\n";
					}
				?>
				<a href="?m=administration&amp;p=main" <?php if ((isset($_GET['m']) AND $_GET['m'] == "administration") || $TotalSelected ) echo 'class="admin_menu_link_selected"'; else echo 'class="admin_menu_link"'; ?> target="_self" ><?php echo get_lang('administration'); ?></a>
				<ul>
					<?php echo $data ?>
				</ul>
			</li>
			<?php
			}
				?>
				<li>
					<a href="?m=user_admin&amp;p=edit_user&amp;user_id=<?php echo $_SESSION['user_id'] ?>" <?php if (isset($_GET['p']) AND $_GET['p'] == "edit_user" ) echo 'class="user_menu_link_selected"'; else echo 'class="user_menu_link"'; ?> target="_self" ><?php echo $_SESSION['users_login']; ?></a>
					<ul>
					<?php
					// Normal users only!
					if(!$isAdmin && !$isSubUser)
					{
						if($db->isModuleInstalled("subusers")){
					?>
						<li><a href="?m=subusers&p=submanage"><?php print_lang('sub_users'); ?></a></li>
					<?php
						}
					?>
						<li><a href="?m=user_admin&p=show_groups"><?php print_lang('show_groups'); ?></a></li>
					<?php
					}
					?>
						<li><a href="?logout">[<?php print_lang('logout'); ?>]</a></li>
					</ul>
				</li>
			<?php
					if( isset($settings['custom_tab']) && $settings['custom_tab'] == "1" )
					{
						if( isset($settings['custom_tab_name']) && !empty($settings['custom_tab_name'] ))
						{
			?>
				<li>
					<a href="<?php echo $settings['custom_tab_link']; ?>" target="<?php echo $settings['custom_tab_target_blank']; ?>" ><?php echo $settings['custom_tab_name']; ?></a>
					<?php
					if( isset($settings['custom_tab_sub']) && $settings['custom_tab_sub'] == "1" )
					{
					?>
					<ul>
						<li><a href="<?php echo $settings['custom_tab_sub_link']; ?>" target="<?php echo $settings['custom_tab_target_blank']; ?>" ><?php echo $settings['custom_tab_sub_name']; ?></a></li>
						<?php
						if( isset($settings['custom_tab_sub_name2']) && !empty($settings['custom_tab_sub_name2'] ))
						{
						?>
						<li><a href="<?php echo $settings['custom_tab_sub_link2']; ?>" target="<?php echo $settings['custom_tab_target_blank']; ?>" ><?php echo $settings['custom_tab_sub_name2']; ?></a></li>
						<?php
						}
						if( isset($settings['custom_tab_sub_name3']) && !empty($settings['custom_tab_sub_name3'] ))
						{
						?>
						<li><a href="<?php echo $settings['custom_tab_sub_link3']; ?>" target="<?php echo $settings['custom_tab_target_blank']; ?>" ><?php echo $settings['custom_tab_sub_name3']; ?></a></li>
						<?php
						}
						if( isset($settings['custom_tab_sub_name4']) && !empty($settings['custom_tab_sub_name4'] ))
						{
						?>
						<li><a href="<?php echo $settings['custom_tab_sub_link4']; ?>" target="<?php echo $settings['custom_tab_target_blank']; ?>" ><?php echo $settings['custom_tab_sub_name4']; ?></a></li>
						<?php
						}
						?>
					</ul>
					<?php
					}
					?>
				</li>
			<?php
						}
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
			//tagged for future use...
			/*
				$postdata = "";
				foreach($_POST as $key =>$value)
					$postdata .= ",'$key': '$value'";
				$postdata = substr($postdata,1);
				$postdata = "{".$postdata."}";
			*/
		?>
		<div class="clear"></div>
		
	%botbody%
	%bottom%
<?php
}
?>
