<script type="text/javascript" src="js/modules/addonsmanager.js"></script>
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

function exec_ogp_module() {

	global $db;
	
	if (isset($_POST['create_addon']) AND isset($_POST['name']) AND $_POST['url']=="")
	{
		print_failure(get_lang("fill_the_url_address_to_a_compressed_file"));
	}
	elseif(isset($_POST['create_addon']) AND isset($_POST['url']) AND $_POST['name']=="")
	{
		print_failure(get_lang("fill_the_addon_name"));
	}	
	elseif(isset($_POST['create_addon']) AND isset($_POST['name']) and isset($_POST['url']) and empty($_POST['addon_type']) )	
	{	
		print_failure(get_lang("select_an_addon_type"));
	}
	elseif(isset($_POST['create_addon']) AND isset($_POST['name']) and isset($_POST['url']) and isset($_POST['addon_type']) and empty($_POST['home_cfg_id']) )	
	{	
		print_failure(get_lang("select_a_game_type"));
	}
	elseif (isset($_POST['create_addon']) AND isset($_POST['name']) AND isset($_POST['url']) AND isset($_POST['addon_type']) and isset($_POST['home_cfg_id']) )
	{	
		$fields['name'] = $_POST['name'];
		$fields['url'] = $_POST['url'];
		$fields['path'] = $_POST['path'];
		$fields['addon_type'] = $_POST['addon_type'];
		$fields['home_cfg_id'] = $_POST['home_cfg_id'];
		$fields['post_script'] = $_POST['post_script'];
		$fields['group_id'] = $_POST['group_id'];
		if( is_numeric($db->resultInsertId( 'addons', $fields )) )
		{
			print_success(get_lang_f("addon_has_been_created",$_POST['name']));
			if (isset($_POST['addon_id']) && (int)$_POST['addon_id'] > 0 && isset($_POST['edit']))
				$db->query("DELETE FROM OGP_DB_PREFIXaddons WHERE addon_id=" . (int)$_POST['addon_id']);
		}
	}

	echo "<h2>".get_lang('addons_manager')."</h2>";
	$name = isset($_POST['name']) ? $_POST['name'] : "";
	$url = isset($_POST['url']) ? $_POST['url'] : "";
	$path = isset($_POST['path']) ? $_POST['path'] : "";
	$post_script = isset($_POST['post_script']) ? $_POST['post_script'] : "";
	$home_cfg_id = isset($_POST['home_cfg_id']) ? $_POST['home_cfg_id'] : "";
	$addon_type = isset($_POST['addon_type']) ? $_POST['addon_type'] : "";
	$group_id = isset($_POST['group_id']) ? $_POST['group_id'] : "";
	$addon_types = array('plugin', 'mappack', 'config');

	if (isset($_POST['addon_id']) && (int)$_POST['addon_id'] > 0 && isset($_POST['edit']))
	{
		$addons_rows = $db->resultQuery("SELECT * FROM OGP_DB_PREFIXaddons WHERE addon_id=".(int)$_POST['addon_id']);
		$addon_info = $addons_rows[0];
		$name = isset($addon_info['name']) ? $addon_info['name'] : "";
		$url = isset($addon_info['url']) ? $addon_info['url'] : "";
		$path = isset($addon_info['path']) ? $addon_info['path'] : "";
		$post_script = isset($addon_info['post_script']) ? $addon_info['post_script'] : "";
		$home_cfg_id = isset($addon_info['home_cfg_id']) ? $addon_info['home_cfg_id'] : "";
		$addon_type = isset($addon_info['addon_type']) ? $addon_info['addon_type'] : "";
		$group_id = isset($addon_info['group_id']) ? $addon_info['group_id'] : "";
	}
	?>
	<form action="" method="post">
		<table class="center">
			<tr>				
				<td align="right">
					<b><?php print_lang('addon_name'); ?></b>
				</td>
				<td align="left">
					<input type="text" value="<?php echo $name; ?>" name="name" size="85" title="<?php print_lang('addon_name_info'); ?>" />
				</td>
			</tr>
			<tr>					
				<td align="right">
					<b><?php print_lang('url'); ?></b>
				</td>
				<td align="left">
					<input type="text" value="<?php echo $url; ?>" name="url" size="85" title="<?php print_lang('url_info'); ?>" />
				</td>
			</tr>
			<!-- If any, you can set the destination path, should be a relative path to the main game server folder. -->
			<tr>					
				<td align="right">
					<b><?php print_lang('path'); ?></b>
					</td>
					<td align="left">
					<input type="text" value="<?php echo $path; ?>" name="path" size="85" title="<?php print_lang('path_info'); ?>" />
				</td>
			</tr>
			<tr>					
				<td align="right">
					<b><?php print_lang('post-script'); ?></b><br>
					<u><?php print_lang('replacements'); ?></u><br>
					%home_path%<br>
					%home_name%<br>
					%control_password%<br>
					%max_players%<br>
					%ip%<br>
					%port%<br>
					%query_port%<br>
					%incremental%<br>
				</td>
				<td align="left">
					<textarea name="post_script" style="width:99%;height:175px;" title="<?php print_lang('post-script_info'); ?>" ><?php echo strip_real_escape_string($post_script); ?></textarea>
				</td>
			</tr>
			<tr>
				<td align="right">
					<b><?php print_lang('select_game_type'); ?></b>
				</td>
				<td align="left">
				<select name='home_cfg_id'>
		<?php
		$game_cfgs = $db->getGameCfgs();
		echo "<option style='background:black;color:white;' value=''>".get_lang('linux_games')."</option>\n";
		
		foreach ( $game_cfgs as $row )
		{
			if ( preg_match("/linux/", $row['game_key']) )
			{
				$selected = (isset($home_cfg_id) AND $row['home_cfg_id'] == $home_cfg_id) ? 'selected="selected"' : '';
				echo "<option $selected value='".$row['home_cfg_id']."'>".$row['game_name'];
				if  ( preg_match("/64/", $row['game_key']) ) echo " (64bit)";
				echo "</option>\n";
			}
		}
		echo "<option style='background:black;color:white;' value=''>".get_lang('windows_games')."</option>\n";
		foreach ( $game_cfgs as $row )
		{
			if ( preg_match("/win/", $row['game_key']) )
			{
				$selected = (isset($home_cfg_id) AND $row['home_cfg_id'] == $home_cfg_id) ? 'selected=selected' : '';
				echo "<option $selected value='".$row['home_cfg_id']."'>".$row['game_name'];
				if  ( preg_match("/64/", $row['game_key']) ) echo " (64bit)";
				echo "</option>\n";
			}
		}
		?>
				</select>
				</td>
			</tr>
			<tr>
				<td align="right">
				<b><?php print_lang('type'); ?></b>	
				</td>
				<td align="left">
		<?php
		$types = array( 'plugin', 'mappack', 'config' );
		foreach($types as $type)
		{
			$checked = ( isset($addon_type) AND $type == $addon_type) ? 'checked' : '';
			echo '<input type="radio" name="addon_type" value="'.$type.'" '.$checked.'>'.get_lang($type);
		}
		?>
				</td>
			</tr>
			<tr>
				<td align="right">
					<b><?php print_lang('show_to_group'); ?></b>
				</td>
				<td align="left">
				<select name='group_id'>
				<option value="0"><?php print_lang('all_groups'); ?></option>
		<?php
		$groups = $db->getGroupList();
		foreach($groups as $group)
		{
			$selected = (isset($group_id) AND $group['group_id'] == $group_id) ? 'selected=selected' : '';
			echo "<option value='".$group['group_id']."' $selected>".$group['group_name']."</option>\n";
		}
		?>
				</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<?php 
				if (isset($_POST['addon_id']) && isset($_POST['edit']))
				{
					echo '<input type="hidden" name="addon_id" value="'.$_POST['addon_id'].'" >';
					echo '<input type="hidden" name="edit" value="'.$_POST['edit'].'" >';
					?>
					<button name="create_addon" type="submit">
					<?php print_lang('edit_addon'); ?>
					</button>
				<?php
				}
				else
				{
				?>
					<button name="create_addon" type="submit">
					<?php print_lang('create_addon'); ?>
					</button>
				<?php
				}
				?>
				</td>
			</tr>
		</table>
	</form>
	<br>
	<h2><?php print_lang('addons_db'); ?></h2>
	<table class="center">
		<tr>	
			<td align="center">
				<form name="remove" action="" method="get">
				<input name="m" type="hidden" value="addonsmanager"/>
				<input name="p" type="hidden" value="addons_manager"/>
				<b><?php print_lang('game'); ?></b> <select name='home_cfg_id'>
				<?php
				echo "<option style='background:black;color:white;' value=''>".get_lang('linux_games')."</option>\n";
				foreach ( $game_cfgs as $row )
				{
					if ( preg_match("/linux/", $row['game_key']) )
					{
						if(isset($_GET['home_cfg_id']) AND $row['home_cfg_id'] == $_GET['home_cfg_id']) 
							$selected = "selected='selected'";
						else
							$selected = "";
						echo "<option value='".$row['home_cfg_id']."' $selected >".$row['game_name'];
						if  ( preg_match("/64/", $row['game_key']) ) echo " (64bit)";
						echo "</option>\n";
					}
				}
				echo "<option style='background:black;color:white;' value=''>".get_lang('windows_games')."</option>\n";
				foreach ( $game_cfgs as $row )
				{
						if(isset($_GET['home_cfg_id']) AND $row['home_cfg_id'] == $_GET['home_cfg_id']) 
							$selected = "selected='selected'";
						else
							$selected = "";
					if ( preg_match("/win/", $row['game_key']) )
					{
						echo "<option value='".$row['home_cfg_id']."' $selected >".$row['game_name'];
						if  ( preg_match("/64/", $row['game_key']) ) echo " (64bit)";
						echo "</option>\n";
					}
				}
				
				?>
				</select>
				<b><?php print_lang('type'); ?></b>
				<select name="addon_type">
				<?php
					$option = '';

					foreach ($addon_types as $k) {
						$option .= '<option';

						if (isset($_GET['addon_type']) && $_GET['addon_type'] == $k) {
							$option .= ' selected';
						}

						$option .= ' value="'. $k .'">'.get_lang($k).'</option>';
					}

					echo $option;
				?>
		
				</select>
				<b><?php print_lang('group'); ?></b>
				<select name='group_id'>
				<option value="0"><?php print_lang('all_groups'); ?></option>
				<?php
				foreach($groups as $group)
				{
					$selected = (isset($_GET['group_id']) AND $group['group_id'] == $_GET['group_id']) ? 'selected=selected' : '';
					echo "<option value='".$group['group_id']."' $selected>".$group['group_name']."</option>\n";
				}
				?>
				</select>	
				<button name="show" type="submit">
				<?php print_lang('show'); ?>
				</button>
			</td>
		</tr>
		<tr>
			<td>
				<input name="show_game" type="submit" value="<?php print_lang('show_addons_for_selected_game'); ?>"/>
				<input name="show_type" type="submit" value="<?php print_lang('show_addons_for_selected_type'); ?>"/>
				<input name="show_group" type="submit" value="<?php print_lang('show_addons_for_selected_group'); ?>"/>
				<input name="show_all" type="submit" value="<?php print_lang('show_all_addons'); ?>"/>
			</td>
		</tr>
	</form>
	</table>
	<?php 
	if (isset($_POST['addon_id']) && (int)$_POST['addon_id'] > 0 && isset($_POST['remove']))
	{
		if (!$db->query("DELETE FROM OGP_DB_PREFIXaddons WHERE addon_id=" . (int)$_POST['addon_id']))
			print_lang('can_not_remove_addon');
	}
	
	$home_cfg_id = !empty($_GET['home_cfg_id']) && (int)$_GET['home_cfg_id'] > 0 ? (int)$_GET['home_cfg_id'] : 0;
	$addon_type = !empty($_GET['addon_type']) && in_array($_GET['addon_type'], $addon_types) ? $_GET['addon_type'] : "";
	$group_id = isset($_GET['group_id']) && is_numeric($_GET['group_id']) ? (int)$_GET['group_id'] : 0;
	
	if ( isset($_GET['show']) )
	{
		$result = $db->resultQuery("SELECT DISTINCT addon_id, name, game_name, url, path, group_id FROM OGP_DB_PREFIXaddons NATURAL JOIN OGP_DB_PREFIXconfig_homes WHERE addon_type='".$addon_type."' AND home_cfg_id=".$home_cfg_id);
	}
	elseif ( isset($_GET['show_all']) )
	{
		$result = $db->resultQuery("SELECT DISTINCT addon_id, name, game_name, url, path, group_id FROM OGP_DB_PREFIXaddons NATURAL JOIN OGP_DB_PREFIXconfig_homes");
	}
	elseif ( isset($_GET['show_type']))
	{
		$result = $db->resultQuery("SELECT DISTINCT addon_id, name, game_name, url, path, group_id FROM OGP_DB_PREFIXaddons NATURAL JOIN OGP_DB_PREFIXconfig_homes WHERE addon_type='".$addon_type."'");
	}
	elseif ( isset($_GET['show_game']))
	{
		$result = $db->resultQuery("SELECT DISTINCT addon_id, name, game_name, url, path, group_id FROM OGP_DB_PREFIXaddons NATURAL JOIN OGP_DB_PREFIXconfig_homes WHERE home_cfg_id=".$home_cfg_id);
	}
	elseif ( isset($_GET['show_group']))
	{
		$group_id = $group_id == '0' ? $group_id." OR group_id IS NULL" : $group_id;
		$result = $db->resultQuery("SELECT DISTINCT addon_id, name, game_name, url, path, group_id FROM OGP_DB_PREFIXaddons NATURAL JOIN OGP_DB_PREFIXconfig_homes WHERE group_id=".$group_id);
	}
	?>	
	<table class="center">
	<?php
	$group_names = array();
	foreach($groups as $group)
		$group_names[$group['group_id']] = $group['group_name'];
	
	if (isset($result) and $result > 0)
	{
		foreach($result as $row)
		{
		?>
		<tr>
		<form action="" method="post">
		 <td class='left'>
		  <b><?php echo $row['game_name']; ?></b>
		 </td>
		 <td>
		  <?php echo $row['name'];?>
		 </td>
		 <td>
		  <?php echo "[".get_lang('group').": ". (isset($group_names[$row['group_id']])?$group_names[$row['group_id']]:get_lang('all_groups')) ."]";?>
		 </td>
		 <td>
		  <input name="addon_id" type="hidden" value="<?php echo $row['addon_id'];?>"/>
		  <input name="edit" type="submit" value="<?php print_lang('edit_addon'); ?>"/>
		  <input name="remove" type="submit" value="<?php print_lang('remove_addon'); ?>"/>
		 </td>
		</form>
		</tr>
		<?php
		}
	}
	?>
	</table>
	<?php
}
?>