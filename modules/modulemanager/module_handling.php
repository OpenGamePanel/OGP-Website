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

function list_available_modules()
{
    return makefilelist("modules/", ".|..|.svn", true, "folders");
}

/// \return -2 Error while handling db queries after installation.
/// \return -1 In case of error.
/// \return 0 If module already installed.
/// \return 1 If module installation was successfull.
/// \return 2 If module installation was optional and module was not installed.
function install_module($db, $module, $install_if_optional = TRUE)
{	
    // each module must have module.php file which contains the required variables.
    /// \todo We might want to turn this to XML file.
    if ( !is_file("modules/".$module."/module.php") )
    {
        print_failure("modules/".$module." ".get_lang("module_file_missing")."");
        return -1;
    }

    include("modules/".$module."/module.php");
    // Check that required fields exist.
    if ( !isset($module_title,$module_version) )
    {
        print_failure("modules/".$module."/module.php ".get_lang("module_file_missing_info")."");
        return -1;
    }

    if ( $db->isModuleInstalled($module) )
        return 0;
        
    // Prerequisites checking
    if(isset($module_prereqs) && is_array($module_prereqs) && count($module_prereqs)){
		$prereqPass = true;
		$missingPrereqs = "";
		$i = 0;
		foreach($module_prereqs as $prereq){
			if(!preReqInstalled($prereq)){
				if($i == 0){
					$missingPrereqs .= $prereq["name"];
				}else{
					$missingPrereqs .= ", " . $prereq["name"];
				}
				$prereqPass = false;
			}
			$i++;
		}
		
		if(!$prereqPass){
			print_failure(get_lang_f("prereqs_missing", $missingPrereqs, $module_title));
			return -2;
		}
	}

    // Check if the module should be installed or not.
    if ( $install_if_optional == FALSE && $module_required == FALSE )
        return 2;

    echo "<p>".get_lang_f('adding_module',$module_title)."</p>";

    $module_id = $db->addModule($module_title, $module, $module_version, $db_version);

    if ( isset( $install_queries ) )
    {
        foreach ( $install_queries as $key_db_version => $querys )
        {
			foreach ( $querys as $query )
			{
				if ( $db->query($query) )
					continue;

				print_failure("".get_lang("query_failed")." (".$query.") ".get_lang("query_failed_2")." ERROR: ".$db->getError()."");
				return -2;
			}
        }
    }
	
    if ( isset($module_menus) && is_array($module_menus) )
    {
        foreach( $module_menus as $menu )
        {
            $db->addModuleMenu($module_id,$menu['subpage'],$menu['group'],$menu['name']);
        }
    }
	
	$db->clearModuleAccessRights($module_id);
	if(isset($module_access_rights) and is_array($module_access_rights) and !empty($module_access_rights))
	{
		foreach($module_access_rights as $flag => $description)
		{
			$db->setModuleAccessRight($module_id, $flag, $description);
		}
	}
	
    return 1;
}

function uninstall_module($db, $module_id, $module, $adminOverride = false)
{
	// Don't allow users to uninstall core IMPORTANT MODULES
	if(!isCoreModule($module) || $adminOverride === true){
		if ( !is_file("modules/".$module."/module.php") )
		{
			print_failure("modules/".$module." ".get_lang("module_file_missing")."");
			return FALSE;
		}

		if ( $db->delModule($module_id) === FALSE )
		{
			print_failure(get_lang("failed_del_db"));
			return FALSE;
		}

		include("modules/".$module."/module.php");
		
		$db->clearModuleAccessRights($module_id);
		
		if ( isset( $uninstall_queries ) )
		{
			foreach ( $uninstall_queries as $query )
			{
				if ( !$db->query($query) )
				{
					print_failure("".get_lang("query_failed")." (".$query.") ".get_lang("query_failed_2")." ERROR: ".$db->getError()."");
					return FALSE;
				}
			}
		}

		return TRUE;
	}
	
	return false;
}

function update_module($db, $module_id, $module)
{
	if ( !is_file("modules/".$module."/module.php") )
    {
        print_failure("modules/".$module." ".get_lang("module_file_missing")."");
        return FALSE;
    }
    
    include("modules/".$module."/module.php");
    $module_info = $db->getModule($module_id);
    
    if ( $module_info['version'] != $module_version)
    {
		if(method_exists($db, "getModuleMenu")){ // Added this check for successful updates
			// Get position of module so that users don't need to reorder them after updating
			$currentModuleMenuInfo = $db->getModuleMenu($module_id);
			if($currentModuleMenuInfo !== false && is_array($currentModuleMenuInfo)){
				$pos = $currentModuleMenuInfo["pos"];
				if(!isset($pos) || empty($pos)){
					$pos = 0;
				}
			}else{
				$pos = 0;
			}
		}else{
			$pos = 0;
		}
		
		// Debug
		// echo "<p>Module position is " . $pos . " for module " . $currentModuleMenuInfo["menu_name"] . " with ID of " . $module_id . "</p>";
		
		$db->delModuleMenu($module_id);
		if ( isset($module_menus) && is_array($module_menus) )
		{
			foreach( $module_menus as $menu )
			{
				$db->addModuleMenu($module_id,$menu['subpage'],$menu['group'],$menu['name'],$pos);
			}
		}
	}
	
	if ( $module_info['db_version'] < $db_version)
	{
		$i = $module_info['db_version'];
		while ($i < $db_version)
		{
			if(isset($install_queries))
			{
				foreach ( $install_queries[$i+1] as $query )
				{
					if ( $db->query($query) )
						continue;

					print_failure("".get_lang("query_failed")." (".$query.") ".get_lang("query_failed_2")." ERROR: ".$db->getError()."");
					return -2;
				}
			}
			++$i;
		}
	}
	
	if(method_exists($db, "clearModuleAccessRights")){
		$db->clearModuleAccessRights($module_id);
	}
	
	if(isset($module_access_rights) and is_array($module_access_rights) and !empty($module_access_rights))
	{
		foreach($module_access_rights as $flag => $description)
		{
			if(method_exists($db, "setModuleAccessRight")){
				$db->setModuleAccessRight($module_id, $flag, $description);
			}
		}
	}
	
	$db->updateModule($module_id, $module_version, $db_version);
	echo "<p>".get_lang_f('updated_module',$module_title)." - ".$module_info['db_version'] ." to ". $db_version."</p>";
}

?>
