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

define("OGP_DB_PREFIX", "OGP_DB_PREFIX");

abstract class OGPDatabase {

    protected $queries_ = 0;

    public function getNbOfQueries()
    {
        return $this->queries_;
    }
    
    public function generateMySQLInClause($arrayOfInputs){
		$inClause = "IN ('";
		for($i = 0; $i < count($arrayOfInputs); $i++){
			if($i == 0){
				$inClause .= $this->realEscapeSingle($arrayOfInputs[$i]);
			}else{
				$inClause .= "','" . $this->realEscapeSingle($arrayOfInputs[$i]);
			}
		}
		$inClause .= "')";
			
		return $inClause;
	}

    /// \return TRUE if connection was created successfully.
    /// \return -1 When host is invalid.
    /// \return -11 When connection to database could not be established
    /// \return -12 When database was not valid.
    abstract public function connect($db_host, $db_user, $db_pass, $db_name, $table_prefix = NULL);

    /// Get all available settings
    abstract public function getSettings();
    
    // Real escape
    abstract public function realEscapeSingle($string);

    /// Get one setting value
    /// \return FALSE if setting does not exist.
    /// \return setting value if setting exists.
    abstract public function getSetting($name);

    /// $settings Contains settings in array. Key is the name of the setting
    /// and value is the setting value.
    abstract public function setSettings($settings);

    abstract public function getUser($username);

    abstract public function getUserById($user_id);

    abstract public function getUserByEmail($email);

    abstract public function updateUsersPassword($user_id, $new_password);

    abstract public function getGroupById($group_id);

    abstract public function getUserList();
    
    abstract public function getUserList_limit($page_user,$limit_user,$search_field);

    abstract public function getGroupList();

    abstract public function getUsersGroups($user_id);
    
    abstract public function getGameServersWithSamePath($remote_id, $home_path);
    
    abstract public function getUserGroupList($user_id);

    /// \return array of users. Array is empty if there is no users available.
    abstract public function getAvailableUsersForGroup($group_id);
    
    abstract public function getAvailableSubUsersForGroup($group_id, $user_id);

    abstract public function listUsersInGroup($group_id);

    abstract public function getUsersSubUsersIds($user_id);
    
    abstract public function getNumberOfOwnedServersPerUser($userID);
    
    abstract public function listServersInGroup($group_id);

    abstract public function addUser($username,$password,$user_role,$user_email = "");

    abstract public function addUserToGroup($user_id,$group_id);

    abstract public function addServerToGroup($rserver_id,$group_id);

    abstract public function addGroup($group,$main_user_id);

    abstract public function delGroup($group_id);

    abstract public function delUserFromGroup($user_id, $group_id);

    abstract public function delServerFromGroup($rserver_id,$group_id);

    abstract public function delUser($user_id);

    /**
     * Returns TRUE if user is admin.
     * \todo This function might require change as we are creating
     *       group functionality.
     */
    abstract public function isAdmin($user_id);
    
    abstract public function getAdmins();
    
    /**
     * Returns TRUE if user is admin.
     * \todo This function might require change as we are creating
     *       group functionality.
     */
    abstract public function isSubUser($user_id);

    abstract public function addModule($module_title,$module,$module_version,$db_version);

    abstract public function getModuleMenu($module_id);
    
    abstract public function getModuleIDByName($name);
    
    abstract public function getModule($id);

    abstract public function addModuleMenu($module_id,$subpage,$group,$name,$pos);

    abstract public function delModule($module_id);

    abstract public function getMenusForGroup($group);

    abstract public function addGameModCfg($game_id,$mod_key,$mod_name);

	abstract public function getCurrentHomeConfigMods($clear_all);
	
	abstract public function updateOGPGameModsWithNewIDs($oldModStructure);

    abstract public function clearGameCfgs($clear_all);

    abstract public function addGameCfg($config);

    abstract public function getGameCfgs();

    /// \brief Used to make plain query to the database.
    /// \return true if success and false otherwise.
    /// When false is returned user can check error with getError() function.
    abstract public function query( $query );

    /// \brief This query return array of values or false on failure.
    abstract public function resultQuery( $query );

    /// \brief Returns the last error message
    abstract public function getError();

    // Server module functions
    /// \brief Adds remote server to database.
    abstract public function addRemoteServer($rhost_ip,$rhost_name,$rhost_user_name,$rhost_port,$rhost_ftp_ip,$rhost_ftp_port,$encryption_key,$rhost_timeout,$use_nat,$display_public_ip);

    abstract public function getRemoteServer($id);

    /// \brief Get Remote servers
    abstract public function getRemoteServers();
    
    abstract public function getRemoteServers_ts3($assign_id);

    abstract public function removeRemoteServer($remote_server_id);

    abstract public function addRemoteServerIP($remote_server_id, $ip);

    /// \brief Get remote server IP's
    abstract public function getRemoteServerIPs($server_id);

    abstract public function removeRemoteServerIPs($server_id);

    /// \brief Change encryption key for remote server.
    abstract public function changeRemoteServerSettings($server_id,
        $agent_ip,$agent_port,$remote_server_name,$remote_server_user_name,$remote_host_ftp_ip,$remote_host_ftp_port,$encryption_key,$rhost_timeout,$use_nat,$display_public_ip);

    // Gamemanager functions
    abstract public function getHomeIpPorts($home_id);

    abstract public function getHomesFor($id_type,$assign_id);
    
    abstract public function getHomesFor_limit($id_type,$assign_id,$home_page,$home_limit,$home_cfg_id,$search_field);

    abstract public function getHomeMods($home_id);

    /// \return FALSE if home is not owned by the user.
    /// \return home_id of the home if home owned by the user.
    abstract public function isIpPortOwnedByUser($user_id, $ip, $port);

    abstract public function getRemoteServerById($remote_server_id);
    
    abstract public function getCfgHomeById($cfgid);

    abstract public function getIpPortsForUser($user_id);

	abstract public function getIpPortsForUser_limit($user_id,$page_user,$limit_user);
 	
 	abstract public function getIpPorts_count($id_type,$assign_id);
	
    // Module manager functions

    /// \brief Returns the installed modules.
    abstract public function getInstalledModules();

    /// \brief Returns TRUE if module is installed, FALSE otherwise.
    abstract public function isModuleInstalled($module_folder);

    // User game functions

    /// \brief Assignes a game home to user.
    abstract public function assignHomeTo($id_type,$assign_id,$home_id,$access_rights);

    abstract public function unassignHomeFrom($id_type,$assign_id,$home_id);

    /// \brief Adds game home to database.
    /// \return FALSE if failure
    /// \return id of the home in case of success.
    abstract public function addGameHome($rserver_id,$user_id_main,$home_cfg_id,$game_path,$server_name,$control_password,$ftp_password);

    /// \return FALSE if game home does not exist
    /// \return array containing the information of the gamehome.
    abstract public function getGameHome($home_id, $getIPInfo = false);

    /// \return FALSE if game home does not exist or user does not have access to it.
    /// \return array information of the gamehome.
    abstract public function getUserGameHome($user_id, $home_id);

    /// \brief Deletes the game home.
    abstract public function deleteGameHome($home_id);

    /// \brief Adds game mod to home.
    abstract public function addModToGameHome($home_id, $mod_cfg_id);

    abstract public function delGameMod($mod_id);

    abstract public function changeHomePath($home_id,$path);
    
    abstract public function changeUserIdMain($home_id,$userid);
    
    abstract public function changeFtpPassword($home_id,$password);
    
    /// \brief get available mods for game home.
    abstract public function getAvailableModsForGameHome($home_id);

    abstract public function updateGameModParams($max_players,$extra_params,
        $cpu_affinity,$nice,$home_id,$mod_cfg_id);

    abstract public function addGameIpPort($home_id, $ip, $port);

    abstract public function delGameIpPort($home_id, $ip, $port);

    abstract public function changeHomeName($home_id, $name);

    abstract public function changeHomeControlPassword($home_id, $control_password);

    abstract public function getAvailableHomesFor($id_type,$assign_id);

    abstract public function getGameHomes();
    
    abstract public function getGameHomes_limit($page_gameHomes, $limit_gameHomes, $searchType, $searchString);

    /// \return true If username and password match.
    /// \return false If username and password does not match
    abstract public function is_valid_login($username,$password);
    
    abstract public function getTablePrefix();
    
    abstract public function getHomeAffinity($home_id);
    
    abstract public function saveGameServerOrder($order);
    
    abstract public function resetGameServerOrder();
    
    abstract public function runMultiSQLQuery($sql);
}

?>
