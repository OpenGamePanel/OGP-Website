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

require_once("modules/config_games/server_config_parser.php");
require_once('includes/form_table_class.php');

$custom_fields = array();
$isAdmin = false;
function renderCustomFields($field, $home_id)
{
	global $db, $custom_fields, $isAdmin;
	$attributesString = "";
	$disabledString = ((!property_exists($field, 'access') || $field->access != "admin") || $isAdmin) ? "" : "disabled ";
	
	foreach ($field->attribute as $attribute)
		$attributesString .= $attribute['key']. "='$attribute' ";

	if (is_array($custom_fields) and array_key_exists((string)$field['key'], $custom_fields))
		$fieldValue = (string)$custom_fields[(string)$field['key']];
	else
		$fieldValue = (string)$field->default_value;
	
	$idString = "id='".clean_id_string($field['key'])."'";
	$nameString = "name='fields[".$field['key']."]'";
	$fieldType = $field['type'];
	if ($fieldType == "select")
	{
		$inputElementString = "<select $idString $nameString $disabledString>";
		foreach ($field->option as $option)
		{
			$optionValue = (string)($option['value']);
			$selectedString = ($optionValue == $fieldValue) ? "selected='selected'" : "";
			$valueString = "value=\"".str_replace('"', "&quot;", strip_real_escape_string($optionValue))."\"";
			$inputElementString .= "<option $selectedString $valueString>$option</option>";
		}
		$inputElementString .="</select>";
	} else
		{
			if ($fieldType == "checkbox_key_value") {
				if ($fieldValue) // convert the XML object to string
					$attributesString .= "checked='checked' ";
				$fieldValue = $field['key'];
				$fieldType = "checkbox";
			} 
			else if ($fieldType == "checkbox")
			{
				if ($fieldValue) // convert the XML object to string
					$attributesString .= "checked='checked' ";
			}
			$inputElementString = "<input $idString $nameString ".
				"type='$fieldType' value=\"".str_replace('"', "&quot;", strip_real_escape_string($fieldValue))."\" $attributesString $disabledString/>";
		}

	echo "<tr><td class='right'><label for='".clean_id_string($field['key'])."'>".$field['key'].
		":</label></td><td class='left'>$inputElementString<label for='".clean_id_string($field['key'])."'>";

	if ( !empty($field->caption) )
		echo $field->caption;
	if ( !empty($field->desc) )
		echo "<br/><span class='info'>(".$field->desc.")</span>";

	echo "</label></td></tr>\n";
}

function exec_ogp_module()
{
    global $db,$view,$custom_fields,$isAdmin;
		
	$home_id = $_GET['home_id'];
	
	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
	if( $isAdmin )
	{
		$home_info = $db->getGameHome($home_id);
		$custom_fileds_access_enabled = TRUE;
	}
	else
	{
		$home_info = $db->getUserGameHome($_SESSION['user_id'],$home_id);
		$custom_fileds_access_enabled = preg_match("/c/",$home_info['access_rights']) > 0 ? TRUE : FALSE;
	}
		
	if( !$home_info OR !$custom_fileds_access_enabled )
		return;
		
	//get used custom value or get default
	$custom_fields = json_decode($db->getCustomFields($home_id), True);
		
	$server_xml = read_server_config(SERVER_CONFIG_LOCATION.$home_info['home_cfg_file']);
	
	include('includes/lib_remote.php');
	$remote = new OGPRemoteLibrary($home_info['agent_ip'],$home_info['agent_port'],$home_info['encryption_key'],$home_info['timeout']);
	
	echo "<h2>".get_lang('editing_home_called')." \"".htmlentities($home_info['home_name'])."\"</h2>";

	echo "<p>";
	echo "<a href='?m=gamemanager&p=game_monitor&home_id=$home_id'>&lt;&lt; ".get_lang('back_to_game_monitor')."</a>";
	echo "</p>";
	
	if(isset($_POST['update_settings']))
	{
		$save_field = $_POST['fields'];
		$updatedSettings = array();
		foreach($server_xml->custom_fields->field as $field)
		{
			if (array_key_exists((string)$field['key'], $custom_fields)){
				$origValue = (string)$custom_fields[(string)$field['key']];
			}else{
				$origValue = "";
			}
			
			$found = 0;
			foreach ($save_field as $key => $value )
			{
				if($key == (string)$field['key']){
					$found++;
					
					// If locked by an admin, ignore the value posted by the user
					$lockedByAdmin = false;
					if(property_exists($field, 'access') && $field->access == "admin")
					{
						$lockedByAdmin = true;
						if(!$isAdmin){
							$value = $origValue; // Set it to the old saved value (which was last set by an admin) or set it to its default value
						}														
					}
					
					if (strlen(trim($value)) > 0) {
						$updatedSettings[$key] = $value;
					}
					
					break;
				}
			}
			
			if($found == 0 && !empty($origValue)){
				$updatedSettings[(string)$field['key']] = $origValue;
			}
		}
		
		if(is_array($updatedSettings) && count($updatedSettings) > 0){
			$db->changeCustomFields($home_info['home_id'],json_encode($updatedSettings));
		}else{
			$db->changeCustomFields($home_info['home_id'],"");
		}
			
		print_success(get_lang('settings_updated'));
		$view->refresh("?m=user_games&p=custom_fields&home_id=".$home_id);
	}

	$ft = new FormTable();
    $ft->start_form("", "post", "autocomplete=\"off\"");
    $ft->start_table();
	foreach($server_xml->custom_fields->field as $field)
	{
		renderCustomFields($field, $home_info['home_id']);
	}
	$ft->end_table();
    $ft->add_button("submit","update_settings",get_lang('update_settings'));
    $ft->end_form();
}
?>
