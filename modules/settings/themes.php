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
	require_once('modules/settings/functions.php');
	require_once('includes/form_table_class.php');
	global $db,$view,$settings;

	if ( isset($_REQUEST['update_settings']) )
	{
		$settings = array("theme" => $_REQUEST['theme'],
			"welcome_title" => $_REQUEST['welcome_title'],
			"welcome_title_message" => $_REQUEST['welcome_title_message'],
			"logo_link" => $_REQUEST['logo_link'],
			"bg_wrapper" => @$_REQUEST['bg_wrapper'],
			"custom_tab" => $_REQUEST['custom_tab'],
			"custom_tab_name" => @$_REQUEST['custom_tab_name'],
			"custom_tab_link" => @$_REQUEST['custom_tab_link'],
			"custom_tab_sub" => @$_REQUEST['custom_tab_sub'],
			"custom_tab_sub_name" => @$_REQUEST['custom_tab_sub_name'],
			"custom_tab_sub_link" => @$_REQUEST['custom_tab_sub_link'],
			"custom_tab_sub_name2" => @$_REQUEST['custom_tab_sub_name2'],
			"custom_tab_sub_link2" => @$_REQUEST['custom_tab_sub_link2'],
			"custom_tab_sub_name3" => @$_REQUEST['custom_tab_sub_name3'],
			"custom_tab_sub_link3" => @$_REQUEST['custom_tab_sub_link3'],
			"custom_tab_sub_name4" => @$_REQUEST['custom_tab_sub_name4'],
			"custom_tab_sub_link4" => @$_REQUEST['custom_tab_sub_link4'],
			"custom_tab_target_blank" => @$_REQUEST['custom_tab_target_blank']);
		$db->setSettings($settings);
		print_success(get_lang('settings_updated'));
		$view->refresh("?m=settings&p=themes");
		return;
	}

	echo "<h2>".get_lang('theme_settings')."</h2>";
	
	$bg_wrapper = array("" => "Default",
						"url(images/bg/connect.png);" => "Connect",
						"url(images/bg/foggy_birds.png);" => "Foggy Birds",
						"url(images/bg/handmadepaper.png);" => "Handmade Paper",
						"url(images/bg/tvlines.png);" => "TV Lines",
						"url(images/bg/graycells.png);" => "Gray Cells",
						"url(images/bg/coated.png);" => "Coated");

	$tab_targets = array("_self" => "Self Page",
						 "_blank" => "New Page");

	$row = $db->getSettings();
	$ft = new FormTable();
	$ft->start_form("?m=settings&p=themes");
	$ft->start_table();
	$ft->add_custom_field('theme',get_theme_html_str(@$row['theme']));
	$ft->add_field('on_off','welcome_title',@$row['welcome_title']);
	$ft->add_field('text','welcome_title_message',@$row['welcome_title_message'], 38);
	$ft->add_field('string','logo_link',@$row['logo_link']);
	$ft->add_custom_field('bg_wrapper',
		 create_drop_box_from_array($bg_wrapper,"bg_wrapper",@$row['bg_wrapper'],false));
	$ft->add_field('on_off','custom_tab',@$row['custom_tab']);

	if( isset($settings['custom_tab']) && $settings['custom_tab'] == "1" )
	{
		$ft->add_field('string','custom_tab_name',@$row['custom_tab_name']);
		$ft->add_field('string','custom_tab_link',@$row['custom_tab_link']);
		$ft->add_field('on_off','custom_tab_sub',@$row['custom_tab_sub']);

		if( isset($settings['custom_tab_sub']) && $settings['custom_tab_sub'] == "1" )
		{
			$ft->add_field('string','custom_tab_sub_name',@$row['custom_tab_sub_name']);
			$ft->add_field('string','custom_tab_sub_link',@$row['custom_tab_sub_link']);
			$ft->add_field('string','custom_tab_sub_name2',@$row['custom_tab_sub_name2']);
			$ft->add_field('string','custom_tab_sub_link2',@$row['custom_tab_sub_link2']);
			$ft->add_field('string','custom_tab_sub_name3',@$row['custom_tab_sub_name3']);
			$ft->add_field('string','custom_tab_sub_link3',@$row['custom_tab_sub_link3']);
			$ft->add_field('string','custom_tab_sub_name4',@$row['custom_tab_sub_name4']);
			$ft->add_field('string','custom_tab_sub_link4',@$row['custom_tab_sub_link4']);
		}
		$ft->add_custom_field('custom_tab_target_blank',
		 create_drop_box_from_array($tab_targets,"custom_tab_target_blank",@$row['custom_tab_target_blank'],false));
	}

	$ft->end_table();
	$ft->add_button("submit","update_settings",get_lang('update_settings'));
	$ft->end_form();
}
?>
