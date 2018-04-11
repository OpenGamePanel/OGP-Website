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
	global $db,$view;
	echo "<h2>".get_lang('administration')."</h2>";
	echo "<table class='administration-table'>";
	
	### MAIN ICONS
	echo "<tr>\n";
	$menus = $db->getMenusForGroup('admin');
	
	foreach ($menus as $key => $row) {
	if ( !empty( $row['subpage'] ) )
		$name[$key]  = $row['subpage'];
	else
		$name[$key]  = $row['module'];
								
	$translation[$key] = get_lang($name[$key]);
	}
	
	array_multisort($translation, $name, SORT_DESC, $menus);
				
	$td = 0;
	foreach ( $menus as $menu )
	{
		$module = $menu['module'];
		if ( !empty( $menu['subpage'] ) )
		{
			$subpage = "&amp;p=".$menu['subpage'];
			$button = $menu['subpage'];
		}
		else
		{
			$subpage = "";
			$button = $menu['module'];
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

		echo "<td><a class='administration-buttons' href='".$button_url."' /><div><img src='modules/administration/images/$button.png' /><br>$button_name</div></a></td><td class='administration-buttons-hmargin' ></td>\n";
		$td++;
		if($td == 4) 
		{
			echo "</tr><tr class='administration-buttons-vmargin' ><td></td></tr><tr>\n";
			$td = 0;
		}
	}
	echo "<td><a class='administration-buttons' href='?m=administration&p=banlist' />".
		 "<div><img src='modules/administration/images/banlist.png' /><br>".get_lang('ban_list')."</div></a></td>".
		 "<td class='administration-buttons-hmargin' ></td>\n";
	echo "</tr>\n";
	echo "</table>\n";
	### END MAIN ICONS
	
	### DB BACKUP
	echo "<h2>".get_lang('db_backup')."</h2>";
	?>
	<table class='administration-table'>
	 <tr>
	  <td>
	  <form method="POST">
	   <button name="download"><?php print_lang('download_db_backup'); ?></button>
	  </form>
	  <br>
	  <form method="POST" enctype="multipart/form-data">
	   <label for="file"><?php print_lang('sql_file'); ?>:</label>
	   <input type="file" name="file" id="file" />
	   <button name="restore"><?php print_lang('restore_db_backup'); ?></button>
	  </form>
	  </td>
	 </tr>
	</table>
	<?php
	if(isset($_POST['download']))
	{
		require('includes/config.inc.php');
		$randomdir = genRandomString('20');
		@mkdir($randomdir);
		@chmod($randomdir, 0700);
		$file = $db_name . "_" . date("Y-m-d-H-i-s") . '.sql';
		$backupFile = $randomdir."/".$file;
		$command = "mysqldump --skip-opt --single-transaction --add-drop-table --create-options --extended-insert --quick --set-charset -u $db_user -p$db_pass $db_name > $backupFile";
		@system($command);
		$view->refresh('?m=administration&p=backupdwl&randir='.$randomdir.'&dwfile='.$file.'&type=cleared', 0);
	}
	if(isset($_POST['restore']))
	{
		require('includes/config.inc.php');
		$command = "mysql --user=$db_user --password=$db_pass $db_name < ".$_FILES["file"]["tmp_name"];
		@system($command);
	}
	### END OF DB BACKUP
	
	### ADD ICONS TO IFRAME FORM.
	echo "<h2>".get_lang('external_links')."</h2>";
	?>
	<table class='center'>
	<td>
	<form action="" method=POST ><b><?php print_lang('name'); ?>:</b><input name="name" type=text size=10> <b><?php print_lang('url'); ?>:</b>
	<input name="url" type=text size=40>
	<input type=submit value='<?php print_lang('add_it'); ?>'>
	</form>
	</td>
	</tr>
	</table>
	<table class='administration-table'>
	<tr>
	<?php
	if(isset($_POST['url']))
	{
		$add_link = $db->addAdminExternalLink($_POST['name'],$_POST['url'],$_SESSION['user_id']);
		if($add_link == FALSE) print_failure(get_lang('imposible_add_link_this_to_databse'));
	}
	### END FOR ADD ICONS TO IFRAME FORM.
	
	### ICONS TO FRAMES
	
	if(isset($_POST['link_id'])) 
	{	
		$external_links = $db->delAdminExternalLink($_POST['link_id'],$_SESSION['user_id']);
		if($external_links == TRUE)
			echo get_lang_f('link_has_been_removed', $_POST['name']);
		else
			print_failure(get_lang('link_does_not_exist'));
	}

	echo "<tr>\n";
	$external_links = $db->getAdminExternalLinks($_SESSION['user_id']);
	$td2 = 0;
	if($external_links != 0)
	{
		foreach ( $external_links as $external_link )
		{
			
			$url = $external_link['url'];
			$name = $external_link['name'];
			$link_id = $external_link['link_id'];
			echo "<td>";
			echo "<a href='?m=administration&amp;p=iframe&amp;external_link=".$url."' ><img class='administration-buttons' src='modules/administration/images/link.png' /><br>".$name."</a>\n";
			echo "<form action='' method='POST' ><input type='hidden' name='name' value='".$name."'><input type='hidden' name='link_id' value='".$link_id."'><input type='image' src='modules/administration/images/remove.gif' class='remove-button' onsubmit=".'"submit-form();"'."></form>";
			echo "</td>";
			$td2++;
			if($td2 == 4) 
			{
			echo "</tr><tr>\n";
			$td2 = 0;
			}
		}
	}
	echo "</tr>\n".
		 "</table>\n";
	### END ICONS TO FRAMES
	
	### CHANGE MENU ORDER
		
	if ( isset( $_POST['changeOrder'] ) )
	{
		foreach($_POST as $key => $value)
		{
			if( preg_match( "/^change_button/", $key ) )
			{
				list($trash,$module_id) = explode("-", $key);
				$new_pos = $value;
				$db->changeMenuPosition( $module_id, $new_pos );
			}
		}
	}
	
	echo "<h2>".get_lang('change_buttons_order')."</h2>";
	
	echo "<table class='center'>".
		 "<tr>".
		 "<form method=POST >";
	
	$menus = $db->getMenusForGroup('user');
	
	$pos = 0;
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
		
		echo "<td><input type=text name='change_button-".$menu['module_id']."' value=".$menu['pos']." style='text-align:right;width:20px;' > $button_name</input></td>\n";
		$pos++;
	}
	echo "</tr>\n".
		 "<tr>\n".
		 "<td colspan=$pos ><input type=submit name=changeOrder value='".get_lang('change_buttons_order')."' />\n".
		 "</form>\n".
		 "</td>\n".
         "</tr>\n".
		 "</table>\n";
}
?>
