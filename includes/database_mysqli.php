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

require_once("includes/database.php");

function real_escape_string_recursive(&$item, $key, $link){
    $item = $this->realEscapeSingle($item);
}

class OGPDatabaseMySQL extends OGPDatabase
{
	protected $link;

	protected $table_prefix;

	function __construct()
	{

	}

	function __destruct() {
		if ( $this->link )
			mysqli_close($this->link);
	}

	/// \return TRUE if connection was created successfully.
	/// \return -1 When host is invalid.
	/// \return -11 When connection to database could not be established
	/// \return -12 When database was not valid.
	/// \return -99 When mysql php module is not available.
	public function connect($db_host, $db_user, $db_pass, $db_name, $table_prefix = NULL) {
		if ( !extension_loaded("mysqli") )
			return -99;

		$this->table_prefix = $table_prefix;

		/// \todo We might want to do other checks here as well?
		if ( $db_host === NULL )
			return -1;

		$this->link = mysqli_connect( $db_host, $db_user, $db_pass, $db_name );

		if ( $this->link === FALSE )
			return -11;

		return TRUE;
	}
	
	public function realEscapeSingle($string){
		return mysqli_real_escape_string($this->link, $string);
	}

	private function listQuery($query) {
		if ( !$this->link ) return FALSE;

		++$this->queries_;
		$result = mysqli_query($this->link,$query);

		if ( mysqli_errno($this->link) > 0 )
			print mysqli_error($this->link);

		if ( $result === FALSE )
			return FALSE;

		if ( mysqli_num_rows($result) == 0 )
			return FALSE;

		$results = array();

		while ( $row = mysqli_fetch_assoc( $result ) )
			array_push($results,$row);

		return $results;
	}

	public function getSettings() {
		if ( !$this->link ) return;
		$query = sprintf("SELECT * FROM `%ssettings`",
			$this->table_prefix);
		++$this->queries_;
		$result = mysqli_query($this->link,$query);

		$results = array();

		while ( $row = mysqli_fetch_assoc($result) )
			$results[$row['setting']] = strip_real_escape_string($row['value']);

		// Default setting values in case one hasn't been set
		if(!isset($results["login_attempts_before_banned"]) || empty($results["login_attempts_before_banned"]) || !is_numeric($results["login_attempts_before_banned"])){
			$results["login_attempts_before_banned"] = 6;
		}

		return $results;
	}

	public function getSetting($name) {
		if ( !$this->link ) return;
		$query = sprintf("SELECT `value` FROM `%ssettings`
			WHERE `setting` = '%s'",
			$this->table_prefix,
			$this->realEscapeSingle($name));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);

		if ( mysqli_affected_rows($this->link) !== 1 )
			return FALSE;

		$results = mysqli_fetch_assoc($result);

		return strip_real_escape_string($results["value"]);
	}

	public function setSettings($settings) {
		if ( !$this->link ) return FALSE;
		if ( !is_array($settings) ) return FALSE;

		foreach ( $settings as $s_key => $s_value )
		{
			$query = sprintf('INSERT INTO `%1$ssettings` (`setting`,`value`)
				VALUES(\'%2$s\', \'%3$s\') ON DUPLICATE KEY
				UPDATE value=\'%3$s\'',
				$this->table_prefix,
				$this->realEscapeSingle($s_key),
				$this->realEscapeSingle($s_value));
			++$this->queries_;
			mysqli_query($this->link,$query);
		}
		return TRUE;
	}

	public function getUser($username) {
		if ( !$this->link ) return array();
		$query = sprintf("SELECT * FROM `%susers` WHERE `users_login` = '%s';",
			$this->table_prefix,
			$this->realEscapeSingle($username));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		return mysqli_fetch_assoc($result);
	}

	public function getUserById($user_id) {
		if ( !$this->link ) return array();
		$query = sprintf("SELECT * FROM `%susers` WHERE `user_id` = %d;",
			$this->table_prefix,
			$this->realEscapeSingle($user_id));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		return mysqli_fetch_assoc($result);
	}

	public function getUsersByHomeId($home_id) {
		$query = sprintf('SELECT *
			FROM %1$susers
			NATURAL JOIN %1$suser_homes
			WHERE home_id = %2$s',
			$this->table_prefix,
			$this->realEscapeSingle($home_id));
		return $this->listQuery($query);
	}
	
	public function getGroupUsersByHomeId($home_id) {
		$query = sprintf('SELECT *
			FROM %1$susers
			NATURAL JOIN %1$suser_groups
			NATURAL JOIN %1$suser_group_homes
			WHERE home_id = %2$s',
			$this->table_prefix,
			$this->realEscapeSingle($home_id));
		return $this->listQuery($query);
	}
	
	public function getGroupsForHome($home_id) {
		$query = sprintf('SELECT *
			FROM %1$suser_group_homes
			WHERE home_id = %2$s',
			$this->table_prefix,
			$this->realEscapeSingle($home_id));
		return $this->listQuery($query);
	}
	
	public function getUserByEmail($email) {
		if ( !$this->link ) return FALSE;
		$query = sprintf("SELECT * FROM `%susers` WHERE `users_email` LIKE '%s';",
			$this->table_prefix,
			$this->realEscapeSingle($email));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		if ( mysqli_num_rows($result) != 1 ) return FALSE;
		return mysqli_fetch_assoc($result);
	}

	public function updateUsersPassword($user_id, $new_password)
	{
		if ( !$this->link ) return FALSE;
		$query = sprintf("UPDATE %susers SET users_passwd='%s'
			WHERE user_id = %d;",
			$this->table_prefix,
			$this->realEscapeSingle($new_password),
			$this->realEscapeSingle($user_id));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		if( mysqli_affected_rows($this->link) == '0' )
			return FALSE;
		return TRUE;
	}

	public function getGroupById($group_id) {
		if ( !$this->link ) return array();
		$query = sprintf("SELECT * FROM `%suser_group_info` WHERE `group_id` = %d;",
			$this->table_prefix,
			$this->realEscapeSingle($group_id));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		return mysqli_fetch_assoc($result);
	}

	public function getUserList() {
		if ( !$this->link ) return;
		$query = sprintf("SELECT user_id,users_login,users_lang,
			users_role,users_fname,users_lname,users_email,user_expires,users_parent
			FROM %susers",
			$this->table_prefix);

		++$this->queries_;
		$result = mysqli_query($this->link,$query);

		$results = array();

		while ( $row = mysqli_fetch_assoc( $result ) )
			array_push($results,$row);

		return $results;
	}
	
	public function getUserList_limit($page_user, $limit_user, $search_field) {
		$search_field = $this->realEscapeSingle($search_field);
		$user_get_id = ($page_user - 1) * $limit_user;
		
		if(!is_numeric($user_get_id) || !is_numeric($limit_user)){
			return false;
		}

		$sql = "SELECT
					user_id, users_login, users_lang,
					users_role, users_fname, users_lname,
					users_email, user_expires, users_parent
			FROM ".$this->table_prefix."users ";

		if (!empty($search_field)) {
			$sql .= "WHERE user_id = '$search_field' OR users_login LIKE '%$search_field%' OR users_lang = '$search_field'
						OR users_role = '$search_field' OR users_fname LIKE '%$search_field%' OR users_lname LIKE '%$search_field%' OR users_email LIKE '%$search_field%' ";
		}

		$sql .= "ORDER BY users_login ASC LIMIT $user_get_id, $limit_user";

		++$this->queries_;
		$result = mysqli_query($this->link, $sql);
		$results = array();
		
		while ( $row = mysqli_fetch_assoc($result)) {
			array_push($results, $row);
		}

		return $results;
	}
	
	public function get_user_count($search_field) {
		$search_field = $this->realEscapeSingle($search_field);
		
		$sql = "SELECT COUNT(1) AS total FROM ".$this->table_prefix."users ";

		if (!empty($search_field)) {
			$sql .= "WHERE user_id = '$search_field' OR users_login LIKE '%$search_field%' OR users_lang = '$search_field'
						OR users_role = '$search_field' OR users_fname LIKE '%$search_field%' OR users_lname LIKE '%$search_field%' OR users_email LIKE '%$search_field%'";
		}

		++$this->queries_;
		return $this->resultQuery($sql);
	}

	public function getGroupList() {
		$query = sprintf("SELECT group_id,group_name
			FROM %suser_group_info",
			$this->table_prefix);
		return $this->listQuery($query);
	}
	
	public function get_group_count($search_field){
		$search_field = $this->realEscapeSingle($search_field);
		
		$sql = "SELECT COUNT(1) AS total FROM ".$this->table_prefix."user_group_info ";
		if (!empty($search_field)) {
			$sql .= "WHERE main_user_id = '$search_field' OR group_id = '$search_field' OR group_name LIKE '%$search_field%'";
		}		
		++$this->queries_;
		return $this->resultQuery($sql);
	}
	
	public function getGroupList_limit($page_user,$limit_user,$search_field) {
		
		$search_field = $this->realEscapeSingle($search_field);
		
		$user_get_id = ($page_user - 1) * $limit_user;
		
		if(!is_numeric($user_get_id) || !is_numeric($limit_user)){
			return false;
		}
		
		$query = sprintf("SELECT group_id,group_name
			FROM %suser_group_info
			
			".($search_field ? "WHERE main_user_id = '$search_field' OR group_id = '$search_field' OR group_name LIKE \"%%".$search_field."%%\" " : "")."
			
			ORDER BY group_id ASC LIMIT $user_get_id, $limit_user
			",
			$this->table_prefix);
		return $this->listQuery($query);
	}

	public function getUsersGroups($user_id) {
		$query = sprintf("SELECT *
			FROM %suser_groups
			WHERE `user_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($user_id));
		return $this->listQuery($query);
	}
	
	public function getUserGroupList($main_user_id) {
		$query = sprintf("SELECT *
			FROM %suser_group_info
			WHERE `main_user_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($main_user_id));
		return $this->listQuery($query);
	}
	
	public function getUserGroupList_count($main_user_id,$search_field) {
		$search_field = $this->realEscapeSingle($search_field);
		$main_user_id = $this->realEscapeSingle($main_user_id);
		
		$sql = "SELECT COUNT(1) AS total FROM ".$this->table_prefix."user_group_info WHERE `main_user_id` = $main_user_id ";
		if (!empty($search_field)) {
			$sql .= "AND group_id = '$search_field' OR group_name LIKE '%$search_field%' ";
		}		
		++$this->queries_;
		return $this->resultQuery($sql);
	}
	
	public function getUserGroupList_limit($main_user_id,$page_user,$limit_user,$search_field) {
		$user_get_id = ($page_user - 1) * $limit_user;
		
		$search_field = $this->realEscapeSingle($search_field);
		
		if(!is_numeric($user_get_id) || !is_numeric($limit_user)){
			return false;
		}
		
		$query = sprintf("SELECT *
			FROM %suser_group_info
			WHERE `main_user_id` = %d 
			".($search_field ? "AND group_id = '$search_field' OR group_name LIKE \"%%".$search_field."%%\" " : "")."
			ORDER BY group_id ASC LIMIT $user_get_id, $limit_user",
			$this->table_prefix,
			$this->realEscapeSingle($main_user_id));
		return $this->listQuery($query);
	}

	public function addUser($username,$password,$user_role,$user_email=NULL,$user_parent=NULL){
		$panel_language = isset($GLOBALS['panel_language']) ? $GLOBALS['panel_language'] : $_SESSION['users_lang']; // $_SESSION['users_lang'] is used at install.php
		if ( !$this->link ) return false;
		$query = "INSERT INTO `" . $this->table_prefix . "users` (`users_login`,`users_passwd`,
			`users_lang`,`user_expires`,`users_role`,`users_email`, `users_parent`)
			VALUES('" . $this->realEscapeSingle($username) .
			"', MD5('" . $this->realEscapeSingle($password) .
			"'),'" . $this->realEscapeSingle($panel_language) .
			"', 'X', '" . $this->realEscapeSingle($user_role) . "', ";

		if(is_null($user_email)){
			$query .= "NULL, ";
		}else{
			$query .= "'" . $this->realEscapeSingle($user_email) . "', ";
		}

		if(is_null($user_parent)){
			$query .= "NULL)";
		}else{
			$query .= "'" . $this->realEscapeSingle($user_parent) . "')";
		}
				
		++$this->queries_;
		mysqli_query($this->link,$query);
		
		$user_id = mysqli_insert_id($this->link);
		if( !$user_id )
		{
			echo mysqli_errno($this->link) . ": " . mysqli_error($this->link);
			return false;
		}
		else
		{
			if($this->isModuleInstalled('dashboard'))
				return $this->createUserWidgets($user_id);
			else
				return true;
		}
	}
	
	public function createUserWidgets($user_id){
		$user_id = $this->realEscapeSingle($user_id);
		
		$widgets = $this->resultQuery("SELECT * FROM `".$this->table_prefix."widgets`");
		$query = "INSERT INTO `".$this->table_prefix."widgets_users` (`user_id`, `widget_id`, `column_id`, `sort_no`, `collapsed`, `title`) VALUES";
		foreach($widgets as $widget){
			$query .= "(" . $user_id . ", " . $widget['id'] . ", " . $widget['column_id'] . ", " . $widget['sort_no'] . ", " . $widget['collapsed'] . ", '" . $widget['title'] . "'),";
		}
		$query = substr($query, 0, -1);
		$query .= ";";
		++$this->queries_;
		mysqli_query($this->link,$query);
		if( mysqli_errno($this->link) != 0 )
			return false;
		return true;
	}
	
	public function editUser($fields,$user_id){
		$query = "UPDATE `".$this->table_prefix."users` SET ";
		
		foreach($fields as $key => $value)
		{
			if($value == "")
				$query .= "`$key`=DEFAULT,";
			else
				$query .= "`$key`='".$this->realEscapeSingle($value)."',";
		}
		
		$query = rtrim($query, ',');
		
		$query .= " WHERE `user_id`=".$this->realEscapeSingle($user_id).";";
				
		++$this->queries_;
		
		mysqli_query($this->link,$query);
				
		if( mysqli_errno($this->link) != 0 )
			return false;

		return true;
	}

	public function addUsertoGroup($user_id,$group_id){
		if ( !$this->link ) return false;

		$query = sprintf("INSERT INTO `%suser_groups` (`user_id`,`group_id`) VALUES('%d', '%d')",
			$this->table_prefix,
			$this->realEscapeSingle($user_id),
			$this->realEscapeSingle($group_id));

		++$this->queries_;
		mysqli_query($this->link,$query);

		if( mysqli_errno($this->link) != 0 )
			return false;

		return true;
	}

	public function addServertoGroup($rserver_id,$group_id){
		if ( !$this->link ) return false;

		$query = sprintf("INSERT INTO `%suser_group_remote_servers` (`remote_server_id`,`group_id`) VALUES('%d', '%d')",
			$this->table_prefix,
			$this->realEscapeSingle($rserver_id),
			$this->realEscapeSingle($group_id));
		++$this->queries_;
		mysqli_query($this->link,$query);

		if( mysqli_errno($this->link) != 0 )
			return false;

		return true;
	}

	public function addGroup($group,$main_user_id){
		if ( !$this->link ) return false;

		$query = sprintf("INSERT INTO `%suser_group_info` (`group_id`, `group_name`,`main_user_id` ) VALUES(NULL, '%s', '%d')",
			$this->table_prefix,
			$this->realEscapeSingle($group),
			$this->realEscapeSingle($main_user_id));
		++$this->queries_;
		mysqli_query($this->link,$query);

		if( mysqli_errno($this->link) != 0 )
			return false;

		return true;
	}

	public function delGroup($group_id)
	{
		$queries = array( "DELETE FROM `%suser_group_info` WHERE `group_id` = %d",
			"DELETE FROM `%suser_groups` WHERE `group_id` = %d",
			"DELETE FROM `%suser_group_homes` WHERE `group_id` = %d",
			"DELETE FROM `%suser_group_remote_servers` WHERE `group_id` = %d" );

		foreach ($queries as $query_template)
		{
			$query = sprintf($query_template,
				$this->table_prefix,
				$this->realEscapeSingle($group_id));
			++$this->queries_;
			mysqli_query($this->link,$query)
				or die("Failed to delete group from user_groups: ". mysqli_error($this->link));
		}

		return TRUE;
	}

	public function delUserFromGroup($user_id, $group_id)
	{
		$query = sprintf("DELETE FROM `%suser_groups` WHERE `group_id` = '%d'
			AND `user_id` = '%d'",
			$this->table_prefix,
			$this->realEscapeSingle($group_id),
			$this->realEscapeSingle($user_id));
		++$this->queries_;
		mysqli_query($this->link,$query)
			or die("Failed to delete user from group:".mysqli_error($this->link));
		if ( mysqli_affected_rows($this->link) != 1 )
			return FALSE;
		return TRUE;
	}

	public function delServerFromGroup($rserver_id, $group_id)
	{
		$query = sprintf("DELETE FROM `%suser_group_remote_servers` WHERE `group_id` = '%d'
			AND `remote_server_id` = '%d'",
			$this->table_prefix,
			$this->realEscapeSingle($group_id),
			$this->realEscapeSingle($rserver_id));

		++$this->queries_;
		mysqli_query($this->link,$query)
			or die("Failed to delete server from group:".mysqli_error($this->link));
		if( mysqli_affected_rows($this->link) != 1 )
			return FALSE;
		return TRUE;
	}

	public function getAvailableUsersForGroup($group_id)
	{
		$query = sprintf('SELECT * FROM `%1$susers`
			WHERE `user_id` NOT IN (
				SELECT `user_id` FROM `%1$suser_groups`
				WHERE `group_id` = %2$d
			)
			AND `user_id` NOT IN (
				SELECT `main_user_id` FROM `%1$suser_group_info`
				WHERE `group_id` = %2$d
			)
			AND `users_parent` IS NULL;',
			$this->table_prefix,
			$this->realEscapeSingle($group_id));
		return $this->listQuery($query);
	}
	
	public function getAvailableSubUsersForGroup($group_id, $userID)
	{
		$query = sprintf('SELECT * FROM `%1$susers`
			WHERE `user_id` NOT IN (
				SELECT `user_id` FROM `%1$suser_groups`
				WHERE `group_id` = %2$d
			) AND `users_parent` = %3$d;',
			$this->table_prefix,
			$this->realEscapeSingle($group_id),
			$this->realEscapeSingle($userID)
			);
		return $this->listQuery($query);
	}

	public function listUsersInGroup($group_id)
	{
		$query = sprintf("SELECT `user_id` FROM `%suser_groups` WHERE `group_id` = %d;",
			$this->table_prefix,
			$this->realEscapeSingle($group_id));
		return $this->listQuery($query);
	}
	
	public function getUsersSubUsersIds($parent_id){
		$query = sprintf("SELECT `user_id` FROM `%susers` WHERE `users_parent` = %d;",
			$this->table_prefix,
			$this->realEscapeSingle($parent_id));
		$results = $this->listQuery($query);
		
		if($results !== false){
			foreach($results as $result){
				$ids[] = $result['user_id'];
			}
			
			if(is_array($ids) && count($ids) > 0){
				return $ids;
			}
		}
		
		return false;
	}
	
	public function getNumberOfOwnedServersPerUser($userID){
		if($this->isAdmin($userID)){
			$query = sprintf('SELECT COUNT(`home_id`)
			FROM `%1$sserver_homes`;',
			$this->table_prefix);
		}else{
			$query = sprintf('SELECT COUNT(`home_id`)
			FROM `%1$sserver_homes` WHERE `user_id_main` = %2$d;',
			$this->table_prefix,
			$this->realEscapeSingle($userID));
		}
			
		$result = mysqli_query($this->link,$query) or die("Query failed".mysqli_error($this->link));
			
		if ( $row = mysqli_fetch_row( $result ) ){
			return $row[0];
		}
		
		return 0;
	}

	public function listServersInGroup($group_id)
	{
		$query = sprintf('SELECT `remote_server_id`,`remote_server_name`
			FROM `%1$suser_group_remote_servers` NATURAL JOIN `%1$sremote_servers`
			WHERE `group_id` = %2$d;',
			$this->table_prefix,
			$this->realEscapeSingle($group_id));
		return $this->listQuery($query);
	}

	public function delUser($user_id)
	{
		// Get list of subusers with current user as parent
		$subusers = $this->getUsersSubUsersIds($user_id);
		if( $subusers !== false )
		{
			foreach ($subusers as $subuser) {
				$this->delUser($subuser);
			}
		}
		
		// Optimization...
		$user_id = $this->realEscapeSingle($user_id);

		$query = sprintf("SELECT user_id FROM `%susers` WHERE `user_id` = $user_id",
			$this->table_prefix);

		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		if( mysqli_affected_rows($this->link) == 0 )
			return false;

		$query = sprintf("DELETE FROM `%susers` WHERE `user_id` = $user_id",
			$this->table_prefix);
		++$this->queries_;
		mysqli_query($this->link,$query) or die("Failed to delete user:".mysqli_error($this->link));
		
		// Deletes any sub-user that may reference this parent username
		$query = sprintf("DELETE FROM `%susers` WHERE users_parent = $user_id;",
			$this->table_prefix);
		++$this->queries_;
		mysqli_query($this->link,$query) or die("Failed to delete subuser:".mysqli_error($this->link));
		
		 // Deletes entries from user_groups 
		$query = sprintf("DELETE FROM `%suser_groups` WHERE user_id = $user_id;",
			$this->table_prefix);
		++$this->queries_;
		mysqli_query($this->link,$query) or die("Failed to delete user:".mysqli_error($this->link));
		
		// Deletes group owned by user only if the subuser module is enabled
		$subUsersEnabled = $this->isModuleInstalled("subusers");
		if($subUsersEnabled){
			$query = sprintf("DELETE FROM `%suser_group_info` WHERE main_user_id = $user_id;",
				$this->table_prefix);
			++$this->queries_;
			mysqli_query($this->link,$query) or die("Failed to delete group information:".mysqli_error($this->link));
		}
		
		$query = sprintf("DELETE FROM `%swidgets_users` WHERE `user_id` = $user_id",
			$this->table_prefix);
		++$this->queries_;
		mysqli_query($this->link,$query) or die("Failed to delete user:".mysqli_error($this->link));

		$query = sprintf("DELETE FROM `%suser_homes` WHERE user_id = $user_id;",
			$this->table_prefix);
		++$this->queries_;
		mysqli_query($this->link,$query) or die("Failed to delete user:".mysqli_error($this->link));

		return true;
	}

	public function isAdmin($user_id)
	{
		if ( !$this->link ) return false;
		$query = sprintf("SELECT `users_role` FROM `%susers` WHERE `user_id` = %d AND `users_role` = 'admin'",
			$this->table_prefix,
			$this->realEscapeSingle($user_id));
		++$this->queries_;
		$result = mysqli_query($this->link,$query) or die("Query failed".mysqli_error($this->link));

		if(mysqli_affected_rows($this->link) == 0)
			return false;

		return true;
	}
	
	public function getAdmins()
	{
		if ( !$this->link ) return false;
		$query = sprintf("SELECT * FROM `%susers` WHERE `users_role` = 'admin'",
			$this->table_prefix);
		++$this->queries_;
		$result = mysqli_query($this->link,$query);

		$results = array();

		while ( $row = mysqli_fetch_assoc( $result ) )
			array_push($results,$row);

		return $results;
	}
	
	public function isSubUser($user_id)
	{
		if ( !$this->link ) return false;
		$query = sprintf("SELECT `users_role` FROM `%susers` WHERE `user_id` = %d AND `users_role` = 'subuser'",
			$this->table_prefix,
			$this->realEscapeSingle($user_id));
		++$this->queries_;
		$result = mysqli_query($this->link,$query) or die("Query failed".mysqli_error($this->link));

		if(mysqli_affected_rows($this->link) == 0)
			return false;
			
		return true;
	}

	public function addModule($module_title,$module,$module_version,$db_version)
	{
		if ( !$this->link ) return false;
		$query = sprintf("INSERT INTO `%smodules` VALUES(NULL,'%s','%s','%s', '%d');",
			$this->table_prefix,
			$this->realEscapeSingle($module_title),
			$this->realEscapeSingle($module),
			$this->realEscapeSingle($module_version),
			$this->realEscapeSingle($db_version));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		return mysqli_insert_id($this->link);
	}
	
	public function getModuleMenu($module_id){
		if ( !$this->link ) return false;
		$query = sprintf("SELECT * FROM `%smodule_menus` WHERE `module_id` = '%d'",
			$this->table_prefix,
			$this->realEscapeSingle($module_id));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		if($result && mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			return $row;
		}
		return false;
	}

	public function addModuleMenu($module_id,$subpage,$group,$name,$pos = 0)
	{
		if ( !$this->link ) return false;
		$query = sprintf("INSERT INTO `%smodule_menus` VALUES( '%d','%s','%s','%s','%d');",
			$this->table_prefix,
			$this->realEscapeSingle($module_id),
			$this->realEscapeSingle($subpage),
			$this->realEscapeSingle($group),
			$this->realEscapeSingle($name),
			$this->realEscapeSingle($pos));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);

		if( mysqli_errno($this->link) != 0 )
			return false;

		return true;
	}

	public function delModuleMenu($module_id)
	{
		if ( !$this->link ) return FALSE;
		$query = sprintf("DELETE FROM `%smodule_menus` WHERE `module_id` = %d;",
			$this->table_prefix,
			$this->realEscapeSingle($module_id));

		++$this->queries_;
		$result = mysqli_query($this->link,$query);

		return TRUE;
	}

	public function delModule($module_id)
	{
		if ( !$this->link ) return FALSE;
		$query = sprintf("DELETE FROM `%smodules` WHERE `id` = %d;",
			$this->table_prefix,
			$this->realEscapeSingle($module_id));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);

		$query = sprintf("DELETE FROM `%smodule_menus` WHERE `module_id` = %d;",
			$this->table_prefix,
			$this->realEscapeSingle($module_id));

		++$this->queries_;
		$result = mysqli_query($this->link,$query);

		return TRUE;
	}

	public function getMenusForGroup($group)
	{
		$query = sprintf('SELECT `folder` as module, `subpage`, `menu_name`, `pos`, `module_id`
			FROM `%1$smodules`, `%1$smodule_menus`
			WHERE `group` = \'%2$s\'
			AND `id` = `module_id`
			ORDER BY `pos` ASC;',
			$this->table_prefix,
			$this->realEscapeSingle($group));
		return $this->listQuery($query);
	}
	
	public function changeMenuPosition( $module_id, $new_pos )
	{
		$query = sprintf("UPDATE `%smodule_menus` 
						  SET pos='%d'
						  WHERE module_id = '%d';",
						  $this->table_prefix,
						  $this->realEscapeSingle($new_pos),
						  $this->realEscapeSingle($module_id) );
		++$this->queries_;
		mysqli_query($this->link,$query);

		if( mysqli_errno($this->link) != 0 )
			return FALSE;

		return true;
	}

	public function addGameModCfg($game_id,$mod_key,$mod_name)
	{
		$query = sprintf('INSERT INTO `%1$sconfig_mods` (`mod_cfg_id`, `home_cfg_id`, `mod_key`, `mod_name`)
			VALUES(NULL, \'%2$s\', \'%3$s\', \'%4$s\') ON DUPLICATE KEY UPDATE mod_name=\'%4$s\';',
				$this->table_prefix,
				$this->realEscapeSingle($game_id),
				$this->realEscapeSingle($mod_key),
				$this->realEscapeSingle($mod_name));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
	}
	
	public function removeInvalidModCfgIDs($game_id, $validModIDs)
	{
		$inClause = parent::generateMySQLInClause($validModIDs);
		
		// Get records we're going to delete
		$qStr = 'SELECT * FROM `%1$sconfig_mods` WHERE `home_cfg_id` = \'%2$s\' AND mod_key NOT %3$s;';
		$query = sprintf($qStr,	
				$this->table_prefix,
				$this->realEscapeSingle($game_id),
				$inClause);
		++$this->queries_;
		$result = mysqli_query($this->link, $query);
		if ( mysqli_num_rows($result) != 0 )
		{
			while ($row = mysqli_fetch_assoc($result))
			{
				$delVals[] = $row["mod_cfg_id"];
			}
		}
		
		if(isset($delVals) && is_array($delVals) && count($delVals) > 0){
			// Delete the invalid mods
			$query = sprintf('DELETE FROM `%1$sconfig_mods` WHERE `home_cfg_id` = \'%2$s\' AND mod_key NOT %3$s;',
					$this->table_prefix,
					$this->realEscapeSingle($game_id),
					$inClause);
			++$this->queries_;
			$result = mysqli_query($this->link,$query);
		
			// Cleanup invalid mod assignments to current homes
			$inClause = parent::generateMySQLInClause($delVals);
			$query = sprintf('DELETE FROM `%1$sgame_mods` WHERE `mod_cfg_id` %2$s;',
				$this->table_prefix,
				$inClause);
			++$this->queries_;
			$result = mysqli_query($this->link, $query);
		}
		
	}
	
	public function getCurrentHomeConfigMods($joinGameMods = true){
		// Build query
		$qStr = 'SELECT * FROM `%1$sconfig_homes` NATURAL JOIN `%1$sconfig_mods`';
		if($joinGameMods){
			$qStr .= ' NATURAL JOIN `%1$sgame_mods`';
		}
		$qStr .= ';';
		
		$query = sprintf($qStr,
		$this->table_prefix);

		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		if ( mysqli_num_rows($result) != 0 )
		{
			while ($oldConfigStructure = mysqli_fetch_assoc($result))
			{
				$results[] = $oldConfigStructure;
			}
			
			if(isset($results) && is_array($results)){
				return $results;
			}
		}
		
		return false;
	}
	
	public function updateOGPGameModsWithNewIDs($oldModStructure){
		$currentStructure = $this->getCurrentHomeConfigMods(false);
		
		if(isset($oldModStructure) && is_array($oldModStructure) && isset($currentStructure) && is_array($currentStructure)){
			
			foreach($oldModStructure as $oldEntry){
				$oldModId = $oldEntry["mod_cfg_id"];
				$oldCFGId = $oldEntry["home_cfg_id"];
				$oldHomeId = $oldEntry["home_id"];
								
				$match = 0;
				$cfgMatch = 0;
				foreach($currentStructure as $newEntry){
					if($newEntry["game_key"] == $oldEntry["game_key"]){
						// Update server home home_cfg_id
						$cfgMatch++;
						$newCFGId = $newEntry["home_cfg_id"];
						$query = sprintf("UPDATE `%sserver_homes` 
						  SET home_cfg_id='%d'
						  WHERE home_cfg_id = '%d'
						  AND home_id = '%d';",
						  $this->table_prefix,
						  $this->realEscapeSingle($newCFGId),
						  $this->realEscapeSingle($oldCFGId),
						  $this->realEscapeSingle($oldHomeId) );
						++$this->queries_;
						mysqli_query($this->link,$query);
						
						// Update game_mods mod_cfg_id
						if($newEntry["mod_name"] == $oldEntry["mod_name"]){
							$match++;
							$newModId = $newEntry["mod_cfg_id"];
							$map[$oldModId] = $newModId;
							$query = sprintf("UPDATE `%sgame_mods` 
							  SET mod_cfg_id='%d'
							  WHERE mod_cfg_id = '%d'
							  AND home_id = '%d';",
							  $this->table_prefix,
							  $this->realEscapeSingle($newModId),
							  $this->realEscapeSingle($oldModId),
							  $this->realEscapeSingle($oldHomeId) );
							++$this->queries_;
							mysqli_query($this->link,$query);
						}
						
						if($match > 0){
							break;
						}
					}
				}
				
				if($match == 0){
					// This game mod is no longer valid, so delete it
					$query = sprintf("DELETE FROM `%sgame_mods` WHERE `mod_cfg_id` = '%d' AND `home_id` = '%d'",
					$this->table_prefix,
					$this->realEscapeSingle($oldModId),
					$this->realEscapeSingle($oldHomeId));
					
					++$this->queries_;
					mysqli_query($this->link,$query);
				}
				
				if($cfgMatch == 0){
					// Old game config file doesn't exist anymore, so delete the server home entry
					$query = sprintf("DELETE FROM `%sserver_homes` WHERE `home_cfg_id` = '%d' AND `home_id` = '%d'",
					$this->table_prefix,
					$this->realEscapeSingle($oldCFGId),
					$this->realEscapeSingle($oldHomeId));
					
					++$this->queries_;
					mysqli_query($this->link,$query);
				}
			}
		}
		
		return true;
	}

	public function clearGameCfgs($clear_all)
	{
		if ( $clear_all == TRUE )
		{			
			++$this->queries_;
			mysqli_query($this->link,"TRUNCATE `".$this->table_prefix."config_homes`;");
			++$this->queries_;
			mysqli_query($this->link,"TRUNCATE `".$this->table_prefix."config_mods`;");
		}
	}

	public function addGameCfg($config)
	{
		/// \todo Escape the required values and add on duplicate key update.
		$query = "INSERT INTO `".$this->table_prefix."config_homes` (`home_cfg_id`,
			`game_key`, `game_name`, `home_cfg_file` ) VALUES ".
			"(NULL, '".$config->game_key."', '".
			$config->game_name."', '".$config->home_cfg_file."' )
			ON DUPLICATE KEY UPDATE game_name=VALUES(game_name),
				home_cfg_file=VALUES(home_cfg_file);";
		++$this->queries_;

		$result = mysqli_query($this->link,$query);

		if ( !$result )
			return FALSE;

		$query = sprintf('SELECT `home_cfg_id` FROM `%1$sconfig_homes` WHERE `game_key` = \'%2$s\';',
			$this->table_prefix,
			$config->game_key);

		++$this->queries_;
		$id_result = mysqli_query($this->link,$query);
		$id_result = mysqli_fetch_assoc($id_result);
		$config_id = $id_result['home_cfg_id'];

		// Adding mods.
		$validMods = array();
		foreach ( $config->mods->mod as $mod )
		{
			$this->addGameModCfg($config_id,$mod['key'],$mod->name);
			$validMods[] = (string)$mod['key'];  // https://stackoverflow.com/questions/2867575/get-value-from-simplexmlelement-object [strange]		
		}
		
		// Remove mods that have been renamed or deleted.
		if(count($validMods) > 0){
			$this->removeInvalidModCfgIDs($config_id, $validMods); 
		}

		return TRUE;
	}

	public function getGameCfgs()
	{
		$query = sprintf('SELECT * FROM `%sconfig_homes`
			ORDER BY `game_name` ASC',
			$this->table_prefix);
		return $this->listQuery($query);
	}
	
	public function getGameCfg($home_cfg_id)
	{
		$query = sprintf('SELECT * FROM `%sconfig_homes`
			WHERE `home_cfg_id` = %d;',
			$this->table_prefix,
			$this->realEscapeSingle($home_cfg_id));
		
		++$this->queries_;
		$result = mysqli_query($this->link,$query);

		// If there are no servers then we can stop here.
		if ( mysqli_num_rows($result) != 1 )
			return FALSE;
		
		return mysqli_fetch_assoc($result);
	}
	
	public function delGameCfgAndMods($home_cfg_id)
	{
		$home_cfg_id = $this->realEscapeSingle($home_cfg_id);
		
		$queries = array("DELETE FROM `%sconfig_mods` WHERE `home_cfg_id` = %d",
						 "DELETE FROM `%sconfig_homes` WHERE `home_cfg_id` = %d");

		foreach ( $queries as $query )
		{
			$query = sprintf($query,$this->table_prefix,$home_cfg_id);
			++$this->queries_;
			$result = mysqli_query($this->link,$query);
			$return = (  mysqli_affected_rows($this->link) >= 1 ) ? TRUE : FALSE;
			if($return === FALSE)
				break;
		}
		return $return;
	}
	
	public function getCfgMods($home_cfg_id)
	{
		$query = sprintf('SELECT * FROM `%sconfig_mods`
			WHERE `home_cfg_id` = %d;',
			$this->table_prefix,
			$this->realEscapeSingle($home_cfg_id));
		return $this->listQuery($query);
	}
	
	public function updateHomeCfgId($home_id, $new_home_cfg_id)
	{
		$query = sprintf("UPDATE `%sserver_homes` 
						  SET home_cfg_id='%d'
						  WHERE home_id = '%d';",
						  $this->table_prefix,
						  $this->realEscapeSingle($new_home_cfg_id),
						  $this->realEscapeSingle($home_id) );
		++$this->queries_;
		mysqli_query($this->link,$query);

		if( mysqli_errno($this->link) != 0 )
			return FALSE;

		return true;
	}
	/// \brief Used to make plain query to the database.
	/// \return true if success and false otherwise.
	/// When false is returned user can check error with getError() function.
	public function query( $query )
	{
		if ( !$this->link ) return FALSE;

		$query = str_replace( "OGP_DB_PREFIX", $this->table_prefix, $query );

		++$this->queries_;
		mysqli_query($this->link,$query);

		if( mysqli_errno($this->link) != 0 )
		{
			return FALSE;
		}

		return TRUE;
	}

	/// \brief This query return array of values or false on failure.
	public function resultQuery( $query ) {
		$query = str_replace( "OGP_DB_PREFIX", $this->table_prefix, $query );
		return $this->listQuery($query);
	}
	
	public function resultInsertId( $table, $fields )
	{
		if ( !$this->link ) return FALSE;
		$keys = "";
		$values = "";
		foreach($fields as $key => $val)
		{
			$keys .= "`$key`,";
			$values .= "'".$this->realEscapeSingle($val)."',";
		}
		$keys = rtrim($keys,',');
		$values = rtrim($values,',');
		$query = "INSERT INTO `".$this->table_prefix."$table`( ";
		$query .= $keys;
		$query .= " ) VALUES ( ";
		$query .= $values;
		$query .= " );";
				
		mysqli_query($this->link,$query);
		
		if ( mysqli_affected_rows($this->link) != 1 )
			return FALSE;
		$insert_id = mysqli_insert_id($this->link);
		return $insert_id;
	}

	/// \brief Returns the last error message
	public function getError() {
		if ( !$this->link ) return;
		return mysqli_error($this->link);
	}

	// Server module functions
	/// \brief Adds remote server to database.
	public function addRemoteServer($rhost_ip,$rhost_name,$rhost_user_name,$rhost_port,$rhost_ftp_ip,$rhost_ftp_port,$encryption_key,$rhost_timeout,$use_nat,$display_public_ip)
	{
		$rhost_ip = trim($rhost_ip);
		$rhost_port = trim($rhost_port);
		$rhost_user_name = trim($rhost_user_name);
		$rhost_ftp_ip = trim($rhost_ftp_ip);
		$rhost_ftp_port = trim($rhost_ftp_port);
		$encryption_key = trim($encryption_key);
		$rhost_timeout = trim($rhost_timeout);
		$use_nat = trim($use_nat);
		$display_public_ip = trim($display_public_ip);

		if ( empty($rhost_ip) )
			return false;
		else if ( empty($rhost_port) )
			return false;
		else if ( empty($rhost_user_name) )
			return false;

		$rhost_name = trim($rhost_name);
		$query = sprintf("INSERT INTO `%sremote_servers` (`agent_ip`,remote_server_name,ogp_user,agent_port,ftp_ip,ftp_port,`encryption_key`,timeout,use_nat,display_public_ip)
			VALUES('%s','%s','%s','%d','%s','%s','%s','%s','%s','%s');",
				$this->table_prefix,
				$this->realEscapeSingle($rhost_ip),
				$this->realEscapeSingle($rhost_name),
				$this->realEscapeSingle($rhost_user_name),
				$this->realEscapeSingle($rhost_port),
				$this->realEscapeSingle($rhost_ftp_ip),
				$this->realEscapeSingle($rhost_ftp_port),
				$this->realEscapeSingle($encryption_key),
				$this->realEscapeSingle($rhost_timeout),
				$this->realEscapeSingle($use_nat),
				$this->realEscapeSingle($display_public_ip));
		++$this->queries_;
		mysqli_query($this->link,$query);

		if( mysqli_errno($this->link) != 0 )
		{
			return false;
		}

		return mysqli_insert_id($this->link);
	}

	public function getRemoteServer($id) {
		if ( !$this->link ) return FALSE;

		$query = sprintf("SELECT * FROM `%sremote_servers` WHERE `remote_server_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($id));

		++$this->queries_;
		$result = mysqli_query($this->link,$query);

		// If there are no servers then we can stop here.
		if ( mysqli_num_rows($result) != 1 )
			return FALSE;

		return mysqli_fetch_assoc( $result );
	}

	/// \brief Get Remote servers
	public function getRemoteServers(){
		$query = sprintf("SELECT * FROM %sremote_servers;",
			$this->table_prefix);
		return $this->listQuery($query);
	}
	
	public function getRemoteServers_ts3($assign_id){
		$assign_id = $this->realEscapeSingle($assign_id);
		$query = sprintf("SELECT * FROM ".$this->table_prefix."remote_servers WHERE agent_ip IN (SELECT ip FROM `".$this->table_prefix."ts3_homes` WHERE user_id = $assign_id)");
		return $this->listQuery($query);
	}

	public function removeRemoteServer($remote_server_id) {
		$remote_server_id = $this->realEscapeSingle($remote_server_id);

		$return = TRUE;

		$queries = array("DELETE FROM `%sremote_servers` WHERE remote_server_id = %d;",
			"DELETE FROM `%smaster_server_homes` WHERE remote_server_id = %d;",
			"DELETE FROM `%suser_group_remote_servers` WHERE remote_server_id = %d;",
			"DELETE FROM `%sts3_homes` WHERE rserver_id = %d;",
			'DELETE FROM %1$sarrange_ports WHERE `ip_id` IN
			(SELECT ip_id FROM `%1$sremote_server_ips` WHERE remote_server_id = %2$d);',
			'DELETE FROM %1$sstatus_cache WHERE `ip_id` IN
			(SELECT ip_id FROM `%1$sremote_server_ips` WHERE remote_server_id = %2$d);',
			"DELETE FROM `%sremote_server_ips` WHERE remote_server_id = %d;",
			'DELETE FROM `%1$suser_homes` WHERE home_id IN
			(SELECT home_id FROM `%1$sserver_homes` WHERE remote_server_id = %2$d);',
			'DELETE FROM `%1$suser_group_homes` WHERE home_id IN
			(SELECT home_id FROM `%1$sserver_homes` WHERE remote_server_id = %2$d);',
			'DELETE FROM `%1$smysql_databases` WHERE home_id IN
			(SELECT home_id FROM `%1$sserver_homes` WHERE remote_server_id = %2$d);',
			'DELETE FROM `%1$sgame_mods` WHERE home_id IN
			(SELECT home_id FROM `%1$sserver_homes` WHERE remote_server_id = %2$d);',
			'DELETE FROM %1$shome_ip_ports WHERE `home_id` IN
			(SELECT home_id FROM `%1$sserver_homes` WHERE remote_server_id = %2$d);',
			"DELETE FROM `%sserver_homes` WHERE remote_server_id = %d;");

		foreach ( $queries as $query )
		{
			$query = sprintf($query,$this->table_prefix,$remote_server_id);
			++$this->queries_;
			$result = mysqli_query($this->link,$query);
			$return = ($result === FALSE) ? FALSE : $return;
		}
		return $return;
	}

	public function addRemoteServerIP($remote_server_id, $ip)
	{
		$query = sprintf("INSERT INTO `%sremote_server_ips`
			VALUES (null ,'%d','%s');",
				$this->table_prefix,
				$this->realEscapeSingle($remote_server_id),
				$this->realEscapeSingle($ip) );

		++$this->queries_;
		mysqli_query($this->link,$query);

		if( mysqli_errno($this->link) != 0 )
			return FALSE;

		return true;
	}
	
	public function editRemoteServerIPs($ip_id, $ip)
	{
		$ip_id = $this->realEscapeSingle($ip_id);
		$ip = $this->realEscapeSingle($ip);
		
		$return = TRUE;
		
		$queries = array('UPDATE `%1$sts3_homes` SET ip=\'%2$s\' WHERE ip IN
			(SELECT ip FROM `%1$sremote_server_ips` WHERE ip_id = %3$d);',
			"UPDATE `%sremote_server_ips` SET ip='%s' WHERE ip_id = %d;");

		foreach ( $queries as $query )
		{
			$query = sprintf($query,$this->table_prefix,$ip,$ip_id);
			++$this->queries_;
			$result = mysqli_query($this->link,$query);
			$return = ($result === FALSE) ? FALSE : $return;
		}
		return $return;
	}

	/// \brief Get remote server IP's
	public function getRemoteServerIPs($server_id){
		$query = sprintf("SELECT ip_id,ip FROM `%sremote_server_ips` WHERE remote_server_id = %d;",
			$this->table_prefix,
			$this->realEscapeSingle($server_id));
		return $this->listQuery($query);
	}

	public function removeRemoteServerIPs($ip_id) {
		$ip_id = $this->realEscapeSingle($ip_id);
		$return = TRUE;
		
		$queries = array("DELETE FROM `%sarrange_ports` WHERE ip_id = %d;",
			"DELETE FROM `%sstatus_cache` WHERE ip_id = %d;",
			'DELETE FROM `%1$sts3_homes` WHERE ip IN
			(SELECT ip FROM `%1$sremote_server_ips` WHERE ip_id = %2$d);',
			"DELETE FROM `%sremote_server_ips` WHERE ip_id = %d;");

		foreach ( $queries as $query )
		{
			$query = sprintf($query,$this->table_prefix,$ip_id);
			++$this->queries_;
			$result = mysqli_query($this->link,$query);
			$return = ($result === FALSE) ? FALSE : $return;
		}
		return $return;
	}

	public function changeRemoteServerSettings($server_id,
		$agent_ip,$agent_port,$remote_server_name,$remote_server_user_name,$remote_host_ftp_ip,$remote_host_ftp_port,$encryption_key,$remote_timeout,$use_nat,$display_public_ip)
	{
		$query = sprintf("UPDATE %sremote_servers SET agent_ip='%s',
			agent_port='%s', encryption_key='%s',
			remote_server_name='%s',
			ogp_user='%s',
			ftp_ip='%s',
			ftp_port='%s',
			timeout='%s',
			use_nat='%s',
			display_public_ip='%s'
			WHERE remote_server_id = %d;",
			$this->table_prefix,
			$this->realEscapeSingle($agent_ip),
			$this->realEscapeSingle($agent_port),
			$this->realEscapeSingle($encryption_key),
			$this->realEscapeSingle($remote_server_name),
			$this->realEscapeSingle($remote_server_user_name),
			$this->realEscapeSingle($remote_host_ftp_ip),
			$this->realEscapeSingle($remote_host_ftp_port),
			$this->realEscapeSingle($remote_timeout),
			$this->realEscapeSingle($use_nat),
			$this->realEscapeSingle($display_public_ip),
			$this->realEscapeSingle($server_id));
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}

	// Gamemanager functions
	public function getHomeIpPorts($home_id){
		$query = sprintf("SELECT ip_id, ip, port, force_mod_id, agent_ip, use_nat 
			FROM %shome_ip_ports NATURAL JOIN %sremote_server_ips NATURAL JOIN %sremote_servers
			WHERE home_id = %d;",
			$this->table_prefix,
			$this->table_prefix,
			$this->table_prefix,
			$this->realEscapeSingle($home_id));
		return $this->listQuery($query);
	}

	public function getHomesFor($id_type,$assign_id){
		if ( $id_type == "admin" )
		{
			$template = 'SELECT	%1$sserver_homes.*, 
								%1$sremote_servers.*, 
								%1$sconfig_homes.*, 
								%1$shome_ip_ports.port,
								%1$shome_ip_ports.force_mod_id,
								%1$sremote_server_ips.ip_id,
								%1$sremote_server_ips.ip,
								%1$sgame_mods.mod_id,
								%1$sgame_mods.mod_cfg_id,
								%1$sgame_mods.max_players,
								%1$sgame_mods.extra_params,
								%1$sgame_mods.cpu_affinity,
								%1$sgame_mods.nice,
								%1$sgame_mods.precmd,
								%1$sgame_mods.postcmd,
								%1$sconfig_mods.mod_key,
								%1$sconfig_mods.mod_name,
								%1$sconfig_mods.def_precmd,
								%1$sconfig_mods.def_postcmd,
								%1$sconfig_mods.mod_cfg_id
						FROM %1$sserver_homes
						NATURAL JOIN %1$sremote_servers
						NATURAL JOIN %1$sconfig_homes
						LEFT JOIN %1$sgame_mods 
							NATURAL JOIN %1$sconfig_mods
							ON %1$sserver_homes.home_id=%1$sgame_mods.home_id
						LEFT JOIN %1$shome_ip_ports 
							NATURAL JOIN %1$sremote_server_ips 
							ON %1$sserver_homes.home_id=%1$shome_ip_ports.home_id
						WHERE `force_mod_id` IN
						(
							SELECT `force_mod_id`
							FROM `%1$shome_ip_ports`
							WHERE `force_mod_id` = %1$sgame_mods.mod_id OR %1$shome_ip_ports.force_mod_id = 0
						)
						OR %1$shome_ip_ports.force_mod_id IS NULL ORDER BY home_user_order ASC, %1$sserver_homes.home_id ASC;';
			$template2 = 'SELECT user_expiration_date, home_id FROM %1$suser_homes WHERE user_id = %2$d;';
			$template3 = 'SELECT user_group_expiration_date, home_id FROM %1$suser_group_homes WHERE group_id IN(
							SELECT %1$suser_groups.group_id
							FROM %1$suser_groups
							WHERE %1$suser_groups.user_id=%2$d
						  );';
		}
		else if ( $id_type == "user" )
		{
			$template = 'SELECT %1$sserver_homes.*, %1$suser_homes.access_rights,
				%1$suser_homes.user_expiration_date, %1$sremote_servers.*, %1$sconfig_homes.*
				FROM %1$sremote_servers NATURAL JOIN %1$suser_homes
				NATURAL JOIN %1$sserver_homes NATURAL JOIN %1$sconfig_homes
				WHERE %1$suser_homes.user_id = %2$d ORDER BY home_user_order ASC, %1$sserver_homes.home_id ASC;';
		}
		else if ( $id_type == "group" )
		{
			$template = 'SELECT %1$sserver_homes.*, %1$suser_group_homes.access_rights,
				%1$suser_group_homes.user_group_expiration_date, %1$sremote_servers.*, %1$sconfig_homes.*
				FROM %1$sremote_servers NATURAL JOIN %1$suser_group_homes
				NATURAL JOIN %1$sserver_homes NATURAL JOIN %1$sconfig_homes
				WHERE %1$suser_group_homes.group_id = %2$d ORDER BY home_user_order ASC, %1$sserver_homes.home_id ASC;';
		}
		else if ( $id_type == "user_and_group" )
		{
			$template = 'SELECT	%1$suser_homes.*, 
								%1$sserver_homes.*, 
								%1$sremote_servers.*, 
								%1$sconfig_homes.*, 
								%1$shome_ip_ports.port,
								%1$shome_ip_ports.force_mod_id,
								%1$sserver_homes.home_id as hid,
								%1$sremote_server_ips.ip_id,
								%1$sremote_server_ips.ip,
								%1$sgame_mods.mod_id,
								%1$sgame_mods.mod_cfg_id,
								%1$sgame_mods.max_players,
								%1$sgame_mods.extra_params,
								%1$sgame_mods.cpu_affinity,
								%1$sgame_mods.nice,
								%1$sgame_mods.precmd,
								%1$sgame_mods.postcmd,
								%1$sconfig_mods.mod_key,
								%1$sconfig_mods.mod_name,
								%1$sconfig_mods.def_precmd,
								%1$sconfig_mods.def_postcmd,
								%1$sconfig_mods.mod_cfg_id
						FROM %1$sremote_servers 
						NATURAL JOIN %1$suser_homes 
						NATURAL JOIN %1$sserver_homes 
						NATURAL JOIN %1$sconfig_homes
						LEFT JOIN %1$shome_ip_ports 
							NATURAL JOIN %1$sremote_server_ips 
							ON %1$sserver_homes.home_id=%1$shome_ip_ports.home_id
						LEFT JOIN %1$sgame_mods 
							NATURAL JOIN %1$sconfig_mods
							ON %1$sserver_homes.home_id=%1$sgame_mods.home_id
						WHERE %1$suser_homes.user_id = %2$d
						AND (
							`force_mod_id` IN(
								SELECT `force_mod_id`
								FROM `%1$shome_ip_ports`
								WHERE `force_mod_id` = %1$sgame_mods.mod_id OR %1$shome_ip_ports.force_mod_id = 0
							)
							OR %1$shome_ip_ports.force_mod_id IS NULL
						) 
						UNION
						SELECT	%1$suser_group_homes.*,
								%1$sserver_homes.*, 
								%1$sremote_servers.*, 
								%1$sconfig_homes.*, 
								%1$shome_ip_ports.port,
								%1$shome_ip_ports.force_mod_id,
								%1$sserver_homes.home_id as hid,
								%1$sremote_server_ips.ip_id,
								%1$sremote_server_ips.ip,
								%1$sgame_mods.mod_id,
								%1$sgame_mods.mod_cfg_id,
								%1$sgame_mods.max_players,
								%1$sgame_mods.extra_params,
								%1$sgame_mods.cpu_affinity,
								%1$sgame_mods.nice,
								%1$sgame_mods.precmd,
								%1$sgame_mods.postcmd,
								%1$sconfig_mods.mod_key,
								%1$sconfig_mods.mod_name,
								%1$sconfig_mods.def_precmd,
								%1$sconfig_mods.def_postcmd,
								%1$sconfig_mods.mod_cfg_id
						FROM %1$sremote_servers 
						NATURAL JOIN %1$suser_group_homes 
						NATURAL JOIN %1$sserver_homes 
						NATURAL JOIN %1$sconfig_homes
						LEFT JOIN %1$shome_ip_ports 
							NATURAL JOIN %1$sremote_server_ips 
							ON %1$sserver_homes.home_id=%1$shome_ip_ports.home_id
						LEFT JOIN %1$sgame_mods 
							NATURAL JOIN %1$sconfig_mods
							ON %1$sserver_homes.home_id=%1$sgame_mods.home_id
						WHERE %1$suser_group_homes.group_id
						IN(
							SELECT %1$suser_groups.group_id
							FROM %1$suser_groups
							WHERE %1$suser_groups.user_id=%2$d
						)
						AND (
							`force_mod_id` IN(
								SELECT `force_mod_id`
								FROM `%1$shome_ip_ports`
								WHERE `force_mod_id` = %1$sgame_mods.mod_id OR %1$shome_ip_ports.force_mod_id = 0
							)
							OR %1$shome_ip_ports.force_mod_id IS NULL
						) ORDER BY home_user_order ASC, hid ASC;';
		}
		else
		{
			return FALSE;
		}
		
		if ( $id_type == "admin" )
		{
			$query1 = sprintf($template,
				$this->table_prefix,
				$this->realEscapeSingle($assign_id) );
			$query2 = sprintf($template2,
				$this->table_prefix,
				$this->realEscapeSingle($assign_id) );
			$query3 = sprintf($template3,
				$this->table_prefix,
				$this->realEscapeSingle($assign_id) );
			$servers = $this->listQuery($query1);
			if($servers)
			{
				$user_expiration_dates = $this->listQuery($query2);
				$user_group_expiration_dates = $this->listQuery($query3);
				foreach($servers as $key => $server)
				{
					$servers[$key]['access_rights'] = $this->getFullAccessRightsString();
					if($user_expiration_dates)
					{
						foreach($user_expiration_dates as $user_expiration_date)
						{
							if($server['home_id'] == $user_expiration_date['home_id'])
								$servers[$key]['user_expiration_date'] = $user_expiration_date['user_expiration_date'];
						}
					}
					if($user_group_expiration_dates)
					{
						foreach($user_group_expiration_dates as $user_group_expiration_date)
						{
							if($server['home_id'] == $user_group_expiration_date['home_id'])
								$servers[$key]['user_group_expiration_date'] = $user_group_expiration_date['user_group_expiration_date'];
						}
					}
				}
			}
			return $servers;
		}
		else
		{
			$query = sprintf($template,
				$this->table_prefix,
				$this->realEscapeSingle($assign_id) );
			return $this->listQuery($query);
		}
	}
	
	public function getHomesFor_count($id_type,$assign_id,$home_cfg_id,$search_field){
		$search_field = $this->realEscapeSingle($search_field);
		$assign_id = $this->realEscapeSingle($assign_id);
		$home_cfg_id = $this->realEscapeSingle($home_cfg_id);
		
		if ( $id_type == "admin" )
		{
			return $this->resultQuery('SELECT COUNT('.($search_field ?'distinct':'').' home_id) AS total FROM `'.$this->table_prefix.'server_homes`
			'.($search_field ? '
			NATURAL JOIN `'.$this->table_prefix.'user_homes`
			NATURAL JOIN `'.$this->table_prefix.'remote_servers` 
 			NATURAL JOIN `'.$this->table_prefix.'home_ip_ports`
			' : '').'
			'
 			.($home_cfg_id ?" WHERE home_cfg_id = '$home_cfg_id'
 			".($search_field ?" AND home_id = '$search_field' OR user_id_main = '$search_field' OR home_path LIKE '%".$search_field."%'
 								OR home_name LIKE '%".$search_field."%'
 								OR user_id_main IN (SELECT `user_id` FROM `".$this->table_prefix."users` WHERE users_login LIKE '%".$search_field."%')
 								OR user_id = '$search_field'
 								OR user_id IN (SELECT `user_id` FROM `".$this->table_prefix."users` WHERE users_login LIKE '%".$search_field."%')
 								OR agent_ip = '$search_field' OR port = '$search_field'
 								" : '')." ": '
 			'.($search_field ?" WHERE home_cfg_id = '$home_cfg_id' OR home_id = '$search_field' OR user_id_main = '$search_field' OR home_path LIKE '%".$search_field."%'
 								OR home_name LIKE '%".$search_field."%'
 								OR user_id_main IN (SELECT `user_id` FROM `".$this->table_prefix."users` WHERE users_login LIKE '%".$search_field."%')
 								OR user_id = '$search_field'
								OR user_id IN (SELECT `user_id` FROM `".$this->table_prefix."users` WHERE users_login LIKE '%".$search_field."%')
								OR agent_ip = '$search_field' OR port = '$search_field'
								" : '').'
								'));
		}
		else if ( $id_type == "user_and_group" )
		{
			return $this->resultQuery('SELECT COUNT('.($search_field ?'distinct':'').' home_id) AS total FROM `'.$this->table_prefix.'user_homes`
			'.($search_field ? '
			NATURAL JOIN `'.$this->table_prefix.'server_homes`
			NATURAL JOIN `'.$this->table_prefix.'remote_servers` 
 			NATURAL JOIN `'.$this->table_prefix.'home_ip_ports`
			' : '').'
			WHERE user_id = '.$assign_id.' ' .($home_cfg_id ? 'AND `home_id`
			IN (SELECT `home_id` FROM `'.$this->table_prefix.'server_homes` WHERE home_cfg_id = '.$home_cfg_id.'
			'.($search_field ?" AND home_id = '$search_field' OR user_id_main = '$search_field' OR home_path LIKE '%".$search_field."%'
 								OR home_name LIKE '%".$search_field."%'
 								OR user_id_main IN (SELECT `user_id` FROM `".$this->table_prefix."users` WHERE users_login LIKE '%".$search_field."%')
 								OR user_id = '$search_field'
 								OR user_id IN (SELECT `user_id` FROM `".$this->table_prefix."users` WHERE users_login LIKE '%".$search_field."%')
 								OR agent_ip = '$search_field' OR port = '$search_field'
 								" : '').')'
								: 
								'
				 			'.($search_field ?" AND home_id IN ( home_cfg_id = '$home_cfg_id' OR user_id_main = '$search_field' OR home_path LIKE '%".$search_field."%'
 								OR home_name LIKE '%".$search_field."%'
 								OR user_id_main IN (SELECT `user_id` FROM `".$this->table_prefix."users` WHERE users_login LIKE '%".$search_field."%')
 								OR user_id = '$search_field'
								OR user_id IN (SELECT `user_id` FROM `".$this->table_prefix."users` WHERE users_login LIKE '%".$search_field."%')
								OR agent_ip = '$search_field' OR port = '$search_field'
								)" : '').'				
								' 
								));
		
		
		}
		else if ( $id_type == "subuser" )
		{
			return $this->resultQuery('SELECT COUNT('.($search_field ?'distinct':'').' home_id) AS total FROM `'.$this->table_prefix.'user_group_homes`
			'.($search_field ? '
			NATURAL JOIN `'.$this->table_prefix.'user_homes`
			NATURAL JOIN `'.$this->table_prefix.'server_homes`
			NATURAL JOIN `'.$this->table_prefix.'remote_servers` 
 			NATURAL JOIN `'.$this->table_prefix.'home_ip_ports`
			' : '').'			
			WHERE group_id IN (SELECT group_id FROM `'.$this->table_prefix.'user_groups` WHERE user_id = '.$assign_id.' )
			
			' .($home_cfg_id ? 'AND `home_id` IN (SELECT `home_id` FROM `'.$this->table_prefix.'server_homes` WHERE home_cfg_id = '.$home_cfg_id.'
			'.($search_field ?" AND home_id = '$search_field' OR user_id_main = '$search_field' OR home_path LIKE '%".$search_field."%'
 								OR home_name LIKE '%".$search_field."%'
 								OR user_id_main IN (SELECT `user_id` FROM `".$this->table_prefix."users` WHERE users_login LIKE '%".$search_field."%')
 								OR agent_ip = '$search_field' OR port = '$search_field'
 								" : '').')'
			:'
			'.($search_field ?" AND home_id = '$search_field' OR user_id_main = '$search_field' OR home_path LIKE '%".$search_field."%'
 								OR home_name LIKE '%".$search_field."%'
 								OR user_id_main IN (SELECT `user_id` FROM `".$this->table_prefix."users` WHERE users_login LIKE '%".$search_field."%')
 								OR agent_ip = '$search_field' OR port = '$search_field'
 								" : '').'
			'));
		}		
		
	}
	
	public function getHomesFor_limit($id_type,$assign_id,$home_page,$home_limit,$home_cfg_id,$search_field){
		$search_field = $this->realEscapeSingle($search_field);	
		$assign_id = $this->realEscapeSingle($assign_id);
		$home_cfg_id = $this->realEscapeSingle($home_cfg_id);
		
		$gethome_page_forlimit = ($home_page - 1) * $home_limit;	
		
		if(!is_numeric($gethome_page_forlimit) || !is_numeric($home_limit)){
			return false;
		}
		
		if ( $id_type == "admin" )
		{
			$template = 'SELECT '.($search_field ?'distinct':'').' 
								%1$sserver_homes.*, 
								%1$sremote_servers.*, 
								%1$sconfig_homes.*, 
								%1$shome_ip_ports.port,
								%1$shome_ip_ports.force_mod_id,
								%1$sremote_server_ips.ip_id,
								%1$sremote_server_ips.ip,
								%1$sgame_mods.mod_id,
								%1$sgame_mods.mod_cfg_id,
								%1$sgame_mods.max_players,
								%1$sgame_mods.extra_params,
								%1$sgame_mods.cpu_affinity,
								%1$sgame_mods.nice,
								%1$sgame_mods.precmd,
								%1$sgame_mods.postcmd,
								%1$sconfig_mods.mod_key,
								%1$sconfig_mods.mod_name,
								%1$sconfig_mods.def_precmd,
								%1$sconfig_mods.def_postcmd,
								%1$sconfig_mods.mod_cfg_id
						FROM %1$sserver_homes
						'.($search_field ?'NATURAL JOIN `%1$suser_homes`':'').'
						NATURAL JOIN %1$sremote_servers
						NATURAL JOIN %1$sconfig_homes
						LEFT JOIN %1$sgame_mods 
							NATURAL JOIN %1$sconfig_mods
							ON %1$sserver_homes.home_id=%1$sgame_mods.home_id
						LEFT JOIN %1$shome_ip_ports 
							NATURAL JOIN %1$sremote_server_ips 
							ON %1$sserver_homes.home_id=%1$shome_ip_ports.home_id
						WHERE `force_mod_id` IN
						(
							SELECT `force_mod_id`
							FROM `%1$shome_ip_ports`
							WHERE `force_mod_id` = %1$sgame_mods.mod_id OR %1$shome_ip_ports.force_mod_id = 0
						)
						'.($home_cfg_id ? '
						AND %1$sserver_homes.home_cfg_id = \''.$home_cfg_id.'\'
						'.($search_field ?'
						AND %1$sserver_homes.home_id = \''.$search_field.'\'
						OR user_id_main = \''.$search_field.'\' OR home_path LIKE \'%%'.$search_field.'%%\'
						OR user_id_main IN (SELECT `user_id` FROM `%1$susers` WHERE users_login LIKE \'%%'.$search_field.'%%\')
						OR user_id = \''.$search_field.'\'
						OR user_id IN (SELECT `user_id` FROM `%1$susers` WHERE users_login LIKE \'%%'.$search_field.'%%\')
						OR home_name LIKE \'%%'.$search_field.'%%\'
						OR agent_ip = \''.$search_field.'\' OR port = \''.$search_field.'\'
						OR ip LIKE \'%%' . $search_field . '%%\'
						' : '').'
						'
						: 
						'
						'.($search_field ?'
						AND %1$sserver_homes.home_id = \''.$search_field.'\'
						OR user_id_main = \''.$search_field.'\' OR home_path LIKE \'%%'.$search_field.'%%\'
						OR user_id_main IN (SELECT `user_id` FROM `%1$susers` WHERE users_login LIKE \'%%'.$search_field.'%%\')
						OR user_id = \''.$search_field.'\'
						OR user_id IN (SELECT `user_id` FROM `%1$susers` WHERE users_login LIKE \'%%'.$search_field.'%%\')
						OR home_name LIKE \'%%'.$search_field.'%%\'
						OR agent_ip = \''.$search_field.'\' OR port = \''.$search_field.'\'
						OR ip LIKE \'%%'.$search_field.'%%\'
						' : '').'
						').' OR %1$shome_ip_ports.force_mod_id IS NULL ORDER BY home_user_order ASC, %1$sserver_homes.home_id ASC LIMIT '.$gethome_page_forlimit.','.$home_limit.';';
						
			$template2 = 'SELECT user_expiration_date, home_id FROM %1$suser_homes WHERE user_id = %2$d ORDER BY home_id ASC;';
			$template3 = 'SELECT user_group_expiration_date, home_id FROM %1$suser_group_homes WHERE group_id IN(
							SELECT %1$suser_groups.group_id
							FROM %1$suser_groups
							WHERE %1$suser_groups.user_id=%2$d
						  );';
		}
		else if ( $id_type == "user" )
		{
			$template = 'SELECT %1$sserver_homes.*, %1$suser_homes.access_rights,
				%1$suser_homes.user_expiration_date, %1$sremote_servers.*, %1$sconfig_homes.*
				FROM %1$sremote_servers NATURAL JOIN %1$suser_homes
				NATURAL JOIN %1$sserver_homes NATURAL JOIN %1$sconfig_homes
				WHERE %1$suser_homes.user_id = %2$d '.($home_cfg_id ? 'AND %1$sserver_homes.home_cfg_id = '.$home_cfg_id : '').' home_user_order ASC, %1$sserver_homes.home_id ASC LIMIT '.$gethome_page_forlimit.','.$home_limit.';';
		}
		else if ( $id_type == "group" )
		{
			$template = 'SELECT %1$sserver_homes.*, %1$suser_group_homes.access_rights,
				%1$suser_group_homes.user_group_expiration_date, %1$sremote_servers.*, %1$sconfig_homes.*
				FROM %1$sremote_servers NATURAL JOIN %1$suser_group_homes
				NATURAL JOIN %1$sserver_homes NATURAL JOIN %1$sconfig_homes
				WHERE %1$suser_group_homes.group_id = %2$d '.($home_cfg_id ? 'AND %1$sserver_homes.home_cfg_id = '.$home_cfg_id : '').' ORDER BY home_user_order ASC, %1$sserver_homes.home_id ASC LIMIT '.$gethome_page_forlimit.','.$home_limit.';';
		}
		else if ( $id_type == "user_and_group" )
		{
			$template = 'SELECT	'.($search_field ?'distinct':'').'
								%1$suser_homes.*, 
								%1$sserver_homes.*, 
								%1$sremote_servers.*, 
								%1$sconfig_homes.*, 
								%1$shome_ip_ports.port,
								%1$shome_ip_ports.force_mod_id,
								%1$sserver_homes.home_id as hid,
								%1$sremote_server_ips.ip_id,
								%1$sremote_server_ips.ip,
								%1$sgame_mods.mod_id,
								%1$sgame_mods.mod_cfg_id,
								%1$sgame_mods.max_players,
								%1$sgame_mods.extra_params,
								%1$sgame_mods.cpu_affinity,
								%1$sgame_mods.nice,
								%1$sgame_mods.precmd,
								%1$sgame_mods.postcmd,
								%1$sconfig_mods.mod_key,
								%1$sconfig_mods.mod_name,
								%1$sconfig_mods.def_precmd,
								%1$sconfig_mods.def_postcmd,
								%1$sconfig_mods.mod_cfg_id
						FROM %1$sremote_servers 
						NATURAL JOIN %1$suser_homes 
						NATURAL JOIN %1$sserver_homes 
						NATURAL JOIN %1$sconfig_homes
						LEFT JOIN %1$shome_ip_ports 
							NATURAL JOIN %1$sremote_server_ips 
							ON %1$sserver_homes.home_id=%1$shome_ip_ports.home_id
						LEFT JOIN %1$sgame_mods 
							NATURAL JOIN %1$sconfig_mods
							ON %1$sserver_homes.home_id=%1$sgame_mods.home_id
						WHERE %1$suser_homes.user_id = %2$d
						AND (
							`force_mod_id` IN(
								SELECT `force_mod_id`
								FROM `%1$shome_ip_ports`
								WHERE `force_mod_id` = %1$sgame_mods.mod_id OR %1$shome_ip_ports.force_mod_id = 0
							)
						'.($home_cfg_id ? '
						AND %1$sserver_homes.home_cfg_id = \''.$home_cfg_id.'\'
						'.($search_field ?'
						AND %1$sserver_homes.home_id = \''.$search_field.'\'
						OR user_id_main = \''.$search_field.'\' OR home_path LIKE \'%%'.$search_field.'%%\'
						OR user_id_main IN (SELECT `user_id` FROM `%1$susers` WHERE users_login LIKE \'%%'.$search_field.'%%\')
						OR user_id = \''.$search_field.'\'
						OR user_id IN (SELECT `user_id` FROM `%1$susers` WHERE users_login LIKE \'%%'.$search_field.'%%\')
						OR home_name LIKE \'%%'.$search_field.'%%\'
						OR agent_ip = \''.$search_field.'\' OR port = \''.$search_field.'\'
						OR ip LIKE \'%%' . $search_field . '%%\'
						' : '').' ' : '
						'.($search_field ?'
						AND %1$sserver_homes.home_id = \''.$search_field.'\'
						OR user_id_main = \''.$search_field.'\' OR home_path LIKE \'%%'.$search_field.'%%\'
						OR user_id_main IN (SELECT `user_id` FROM `%1$susers` WHERE users_login LIKE \'%%'.$search_field.'%%\')
						OR user_id = \''.$search_field.'\'
						OR user_id IN (SELECT `user_id` FROM `%1$susers` WHERE users_login LIKE \'%%'.$search_field.'%%\')
						OR home_name LIKE \'%%'.$search_field.'%%\'
						OR agent_ip = \''.$search_field.'\' OR port = \''.$search_field.'\'
						OR ip LIKE \'%%'.$search_field.'%%\'
						' : '').'
						').'
							OR %1$shome_ip_ports.force_mod_id IS NULL
						)
						UNION
						SELECT	'.($search_field ?'distinct':'').'
								%1$suser_group_homes.*,
								%1$sserver_homes.*, 
								%1$sremote_servers.*, 
								%1$sconfig_homes.*, 
								%1$shome_ip_ports.port,
								%1$shome_ip_ports.force_mod_id,
								%1$sserver_homes.home_id as hid,
								%1$sremote_server_ips.ip_id,
								%1$sremote_server_ips.ip,
								%1$sgame_mods.mod_id,
								%1$sgame_mods.mod_cfg_id,
								%1$sgame_mods.max_players,
								%1$sgame_mods.extra_params,
								%1$sgame_mods.cpu_affinity,
								%1$sgame_mods.nice,
								%1$sgame_mods.precmd,
								%1$sgame_mods.postcmd,
								%1$sconfig_mods.mod_key,
								%1$sconfig_mods.mod_name,
								%1$sconfig_mods.def_precmd,
								%1$sconfig_mods.def_postcmd,
								%1$sconfig_mods.mod_cfg_id
						FROM %1$sremote_servers
						NATURAL JOIN %1$suser_group_homes 
						NATURAL JOIN %1$sserver_homes 
						NATURAL JOIN %1$sconfig_homes
						LEFT JOIN %1$shome_ip_ports 
							NATURAL JOIN %1$sremote_server_ips 
							ON %1$sserver_homes.home_id=%1$shome_ip_ports.home_id
						LEFT JOIN %1$sgame_mods 
							NATURAL JOIN %1$sconfig_mods
							ON %1$sserver_homes.home_id=%1$sgame_mods.home_id
						WHERE %1$suser_group_homes.group_id
						IN(
							SELECT %1$suser_groups.group_id
							FROM %1$suser_groups
							WHERE %1$suser_groups.user_id=%2$d
						)
						AND (
							`force_mod_id` IN(
								SELECT `force_mod_id`
								FROM `%1$shome_ip_ports`
								WHERE `force_mod_id` = %1$sgame_mods.mod_id OR %1$shome_ip_ports.force_mod_id = 0
							)
						'.($home_cfg_id ? '
						AND %1$sserver_homes.home_cfg_id = \''.$home_cfg_id.'\'
						'.($search_field ?'
						AND %1$sserver_homes.home_id = \''.$search_field.'\'
						OR user_id_main = \''.$search_field.'\' OR home_path = \''.$search_field.'\'
						OR user_id_main IN (SELECT `user_id` FROM `%1$susers` WHERE users_login LIKE \'%%'.$search_field.'%%\')
						OR home_name LIKE \'%%'.$search_field.'%%\'
						OR agent_ip = \''.$search_field.'\' OR port = \''.$search_field.'\'
						OR ip LIKE \'%%'.$search_field.'%%\'
						' : '').' ' : '
						'.($search_field ?'
						AND %1$sserver_homes.home_id = \''.$search_field.'\'
						OR user_id_main = \''.$search_field.'\' OR home_path LIKE \'%%'.$search_field.'%%\'
						OR user_id_main IN (SELECT `user_id` FROM `%1$susers` WHERE users_login LIKE \'%%'.$search_field.'%%\')
						OR home_name LIKE \'%%'.$search_field.'%%\'
						OR agent_ip = \''.$search_field.'\' OR port = \''.$search_field.'\'
						OR ip LIKE \'%%'.$search_field.'%%\'
						' : '').'
						').'
							OR %1$shome_ip_ports.force_mod_id IS NULL 
						) 
						ORDER BY home_user_order ASC, hid ASC LIMIT '.$gethome_page_forlimit.','.$home_limit.';';
		}
		else
		{
			return FALSE;
		}
		
		if ( $id_type == "admin" )
		{
			$query1 = sprintf($template,
				$this->table_prefix,
				$assign_id );
			$query2 = sprintf($template2,
				$this->table_prefix,
				$assign_id );
			$query3 = sprintf($template3,
				$this->table_prefix,
				$assign_id );
			$servers = $this->listQuery($query1);
			if($servers)
			{
				$user_expiration_dates = $this->listQuery($query2);
				$user_group_expiration_dates = $this->listQuery($query3);
				foreach($servers as $key => $server)
				{
					$servers[$key]['access_rights'] = $this->getFullAccessRightsString();
					if($user_expiration_dates)
					{
						foreach($user_expiration_dates as $user_expiration_date)
						{
							if($server['home_id'] == $user_expiration_date['home_id'])
								$servers[$key]['user_expiration_date'] = $user_expiration_date['user_expiration_date'];
						}
					}
					if($user_group_expiration_dates)
					{
						foreach($user_group_expiration_dates as $user_group_expiration_date)
						{
							if($server['home_id'] == $user_group_expiration_date['home_id'])
								$servers[$key]['user_group_expiration_date'] = $user_group_expiration_date['user_group_expiration_date'];
						}
					}
				}
			}
			return $servers;
		}
		else
		{
			$query = sprintf($template,
				$this->table_prefix,
				$assign_id);
			return $this->listQuery($query);
		}
	}

	public function getHomeMods($home_id) {
		$query = sprintf('SELECT %1$sgame_mods.*, %1$sconfig_homes.game_key as gametype,
			%1$sconfig_mods.mod_name
			FROM %1$sgame_mods NATURAL JOIN %1$sconfig_mods NATURAL JOIN %1$sserver_homes
			NATURAL JOIN %1$sconfig_homes
			WHERE %1$sgame_mods.home_id = %2$d;',
			$this->table_prefix,
			$this->realEscapeSingle($home_id) );
		return $this->listQuery($query);
	}

	public function isIpPortOwnedByUser( $user_id, $ip, $port ) {
		$query = sprintf('SELECT *
			FROM `%1$shome_ip_ports` NATURAL JOIN `%1$sserver_homes`
			NATURAL JOIN `%1$suser_homes`
			WHERE `ip` = \'%2$s\'
			AND `port` = %3$d
			AND `user_id` = %4$d;',
			$this->table_prefix,
			$this->realEscapeSingle($ip),
			$this->realEscapeSingle($port),
			$this->realEscapeSingle($user_id) );

		++$this->queries_;
		$result = mysqli_query($this->link,$query);

		// If there are no servers then we can stop here.
		if ( mysqli_num_rows($result) != 1 )
			return FALSE;

		$info = mysqli_fetch_assoc($result);

		return $info['home_id'];
	}

	public function getCfgHomeById($cfgid){
		$query = sprintf("SELECT *
			FROM `%sconfig_homes`
			WHERE `home_cfg_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($cfgid));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);

		if ( mysqli_num_rows($result) != 1 )
			return FALSE;

		return mysqli_fetch_assoc($result);
	}
	
	public function getRemoteServerById($remote_server_id){
		$query = sprintf("SELECT `agent_ip`, `agent_port`, `encryption_key`, `timeout`
			FROM `%sremote_servers`
			WHERE `remote_server_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($remote_server_id));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		if ( mysqli_num_rows($result) != 1 )
			return FALSE;

		return mysqli_fetch_assoc($result);
	}

	public function getIpPortsForUser($user_id) {
		$isAdmin = $this->isAdmin($user_id);
		if(!$isAdmin){
			$query = sprintf('SELECT *
				FROM `%1$shome_ip_ports`
				NATURAL JOIN `%1$sremote_servers`
				NATURAL JOIN `%1$sserver_homes`
				NATURAL JOIN `%1$sconfig_homes`
				NATURAL JOIN `%1$sremote_server_ips`
				NATURAL JOIN `%1$sconfig_mods`
				NATURAL JOIN `%1$sgame_mods`
				NATURAL JOIN
				(
					SELECT `home_id`
					FROM `%1$suser_homes`
					WHERE `user_id` = %2$d
					UNION
					SELECT `home_id`
					FROM `%1$suser_groups`
					NATURAL JOIN `%1$suser_group_homes`
					WHERE `user_id` = %2$d
				) temp
				WHERE `force_mod_id` IN
				(
					SELECT `force_mod_id`
					FROM `%1$shome_ip_ports`
					WHERE `force_mod_id` = %1$sgame_mods.mod_id OR `force_mod_id` = "0"
				) ORDER BY home_user_order ASC, %1$sserver_homes.home_id ASC;',
				$this->table_prefix,
				$this->realEscapeSingle($user_id) );
								
			return $this->listQuery($query);
		}else{
			return $this->getIpPorts();
		}
	}
	
	public function getIpPortsForUser_limit($user_id,$page_dashboardlist,$limit_dashboardlist) {
		
		$user_request_page = ($page_dashboardlist - 1) * $limit_dashboardlist;
		
		if(!is_numeric($user_request_page) || !is_numeric($limit_dashboardlist)){
			return false;
		}
		
		$query = sprintf('SELECT *
			FROM `%1$shome_ip_ports`
			NATURAL JOIN `%1$sremote_servers`
			NATURAL JOIN `%1$sserver_homes`
			NATURAL JOIN `%1$sconfig_homes`
			NATURAL JOIN `%1$sremote_server_ips`
			NATURAL JOIN `%1$sconfig_mods`
			NATURAL JOIN `%1$sgame_mods`
			NATURAL JOIN
			(
				SELECT `home_id`
				FROM `%1$suser_homes`
				WHERE `user_id` = %2$d
				UNION
				SELECT `home_id`
				FROM `%1$suser_groups`
				NATURAL JOIN `%1$suser_group_homes`
				WHERE `user_id` = %2$d
			) temp
			WHERE `force_mod_id` IN
			(
				SELECT `force_mod_id`
				FROM `%1$shome_ip_ports`
				WHERE `force_mod_id` = %1$sgame_mods.mod_id OR `force_mod_id` = "0"
			) ORDER BY home_user_order ASC, %1$sserver_homes.home_id ASC LIMIT '.$user_request_page.','.$limit_dashboardlist.';',
			$this->table_prefix,
			$this->realEscapeSingle($user_id) );
							
		return $this->listQuery($query);
	}
	
	public function getIpPorts( $ip_id = 0 ) {
		
		$ip_id = $this->realEscapeSingle($ip_id);
		$ip_id_and = $ip_id == 0 ? "" : "`ip_id`='".$ip_id."' AND ";
		
		$query = sprintf('SELECT %1$sremote_server_ips.*,%1$shome_ip_ports.*,%1$sserver_homes.*,
			%1$sremote_servers.*,
			%1$sconfig_homes.*,
			%1$sconfig_mods.*,
			%1$sgame_mods.*
			FROM `%1$shome_ip_ports`
			NATURAL JOIN `%1$sremote_servers`
			NATURAL JOIN `%1$sserver_homes`
			NATURAL JOIN `%1$sconfig_homes`
			NATURAL JOIN `%1$sremote_server_ips`
			NATURAL JOIN `%1$sconfig_mods`
			NATURAL JOIN `%1$sgame_mods` 
			WHERE `force_mod_id` IN
			(
				SELECT `force_mod_id`
				FROM `%1$shome_ip_ports`
				WHERE '.$ip_id_and.'(`force_mod_id` = %1$sgame_mods.mod_id OR `force_mod_id` = "0")
			) ORDER BY home_user_order ASC, %1$sserver_homes.home_id ASC;',
			$this->table_prefix );

		return $this->listQuery($query);
	}
	
	public function getIpPorts_limit($ip_id = 0,$page_dashboardlist,$limit_dashboardlist) {
		$ip_id = $this->realEscapeSingle($ip_id);
		$user_request_page = ($page_dashboardlist - 1) * $limit_dashboardlist;
		
		if(!is_numeric($user_request_page) || !is_numeric($limit_dashboardlist)){
			return false;
		}

		$ip_id_and = $ip_id == 0 ? "" : "`ip_id`='".$ip_id."' AND ";
		$query = sprintf('SELECT %1$sremote_server_ips.*,%1$shome_ip_ports.*,%1$sserver_homes.*,
			%1$sremote_servers.*,
			%1$sconfig_homes.*,
			%1$sconfig_mods.*,
			%1$sgame_mods.*
			FROM `%1$shome_ip_ports`
			NATURAL JOIN `%1$sremote_servers`
			NATURAL JOIN `%1$sserver_homes`
			NATURAL JOIN `%1$sconfig_homes`
			NATURAL JOIN `%1$sremote_server_ips`
			NATURAL JOIN `%1$sconfig_mods`
			NATURAL JOIN `%1$sgame_mods` 
			WHERE `force_mod_id` IN
			(
				SELECT `force_mod_id`
				FROM `%1$shome_ip_ports`
				WHERE '.$ip_id_and.'(`force_mod_id` = %1$sgame_mods.mod_id OR `force_mod_id` = "0")
			) ORDER BY home_user_order ASC, %1$sserver_homes.home_id ASC LIMIT '.$user_request_page.','.$limit_dashboardlist.';',
			$this->table_prefix );

		return $this->listQuery($query);
	}
	

	
	public function getIpPorts_count($id_type,$assign_id){
		$assign_id = $this->realEscapeSingle($assign_id);
		if ( $id_type == "admin" ){
			return $this->resultQuery("SELECT COUNT(home_id) AS total FROM `".$this->table_prefix."home_ip_ports`;");
		}
		else if ( $id_type == "user_and_group" ){
			return $this->resultQuery("SELECT COUNT(home_id) AS total FROM `".$this->table_prefix."home_ip_ports` WHERE home_id IN (SELECT home_id FROM `".$this->table_prefix."user_homes` WHERE user_id = $assign_id);");
		}
		else if ( $id_type == "subuser" ){
			return $this->resultQuery("SELECT COUNT(home_id) AS total FROM `".$this->table_prefix."home_ip_ports` WHERE home_id IN (SELECT group_id FROM `".$this->table_prefix."user_groups` WHERE user_id = $assign_id);");
		}
	}

	// Module manager functions

	/// \brief Returns the installed modules.
	public function getInstalledModules() {
		$query = sprintf("SELECT `id`,`title`,`folder`,`version`,`db_version` FROM `%smodules`",
			$this->table_prefix);
		return $this->listQuery($query);
	}
	
	public function getModule($id) {
		$query = sprintf("SELECT `id`,`title`,`folder`,`version`,`db_version` FROM `%smodules` WHERE `id` = '%d'",
			$this->table_prefix,
			$this->realEscapeSingle($id));
		$result = $this->listQuery($query);
		return $result[0];
	}
	
	public function getModuleIDByName($name) {
		$query = sprintf("SELECT `id` FROM `%smodules` WHERE `folder` = '%d'",
			$this->table_prefix,
			$this->realEscapeSingle($name));
		$result = $this->listQuery($query);
		return $result[0];
	}

	public function isModuleInstalled($module_folder)
	{
		$query = sprintf('SELECT * FROM `%smodules`
			WHERE `folder`="%s";',
			$this->table_prefix,
			$this->realEscapeSingle($module_folder) );
		++$this->queries_;
		mysqli_query($this->link,$query);
		if ( mysqli_affected_rows($this->link) != 1 )
			return FALSE;

		return TRUE;
	}
	
	public function updateModule($id, $version, $db_version)
	{
		$query = sprintf("UPDATE `%smodules` 
						 SET `version`='%s', `db_version`='%d'
						 WHERE `id` = '%d';",
				$this->table_prefix,
				$this->realEscapeSingle($version),
				$this->realEscapeSingle($db_version),
				$this->realEscapeSingle($id) );

		++$this->queries_;
		mysqli_query($this->link,$query);

		if( mysqli_errno($this->link) != 0 )
			return FALSE;

		return true;
	}
	
	public function clearModuleAccessRights($module_id)
	{
		$query = sprintf("DELETE FROM `%smodule_access_rights` WHERE `module_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($module_id));
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;
		return TRUE;
	}
	
	public function setModuleAccessRight($module_id, $flag, $description)
	{
		$module_id = $this->realEscapeSingle($module_id);
		$flag = $this->realEscapeSingle($flag);
		$description = $this->realEscapeSingle($description);
		$query = "INSERT INTO `".$this->table_prefix."module_access_rights` (`module_id`, `flag`, `description` )
			VALUES ( '$module_id', '$flag', '$description' );";

		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
	
	public function getModulesAccessRights()
	{
		$query = sprintf('SELECT * FROM `%1$smodule_access_rights`;', $this->table_prefix);
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		if (!$result or mysqli_num_rows($result) == 0)
			return FALSE;
		$results = array();
		while($row = mysqli_fetch_assoc($result))
			array_push($results,$row);
		return $results;
	}
	
	public function getFullAccessRightsString()
	{
		$full_rights = '';
		foreach($this->getModulesAccessRights() as $ar)
			$full_rights .= $ar['flag'];
		return $full_rights;
	}

	// User game functions

	/// \brief Assignes a game home to user.
	public function assignHomeTo($id_type,$assign_id,$home_id,$access_rights)
	{
		if ( $id_type == "user" )
		{
			$template = "INSERT INTO `%suser_homes` ( `user_id`, `home_id`, `access_rights` )
				VALUES (%d,%d,'%s')";
		}
		else if ( $id_type == "group")
		{
			$template = "INSERT INTO `%suser_group_homes` ( `group_id`, `home_id`, `access_rights` )
				VALUES (%d,%d,'%s')";
		}
		else
		{
			return FALSE;
		}

		$query = sprintf($template,
			$this->table_prefix,
			$this->realEscapeSingle($assign_id),
			$this->realEscapeSingle($home_id),
			$this->realEscapeSingle($access_rights));

		++$this->queries_;
		mysqli_query($this->link,$query);

		if ( mysqli_affected_rows($this->link) != 1 )
			return FALSE;

		return TRUE;
	}
	
	public function updateAccessRightsFor($id_type,$assign_id,$home_id,$access_rights)
	{
		if ( $id_type == "user" )
		{
			$template = "UPDATE `%suser_homes` SET `access_rights` = '%s' WHERE `user_id` = %d AND home_id = %d";	
		}
		else if ( $id_type == "group")
		{
			$template = "UPDATE `%suser_group_homes` SET `access_rights` = '%s' WHERE `group_id` = %d AND home_id = %d";
		}
		else
		{
			return FALSE;
		}

		$query = sprintf($template,
			$this->table_prefix,
			$this->realEscapeSingle($access_rights),
			$this->realEscapeSingle($assign_id),
			$this->realEscapeSingle($home_id));

		++$this->queries_;
		mysqli_query($this->link,$query);

		if ( mysqli_affected_rows($this->link) != 1 )
			return FALSE;

		return TRUE;
	}

	public function unassignHomeFrom($id_type, $assign_id, $home_id)
	{
		if ( $id_type == "user" )
		{
			$template = "DELETE FROM `%suser_homes` WHERE `user_id` = %d
				AND `home_id` = %d;";
		}
		else if ( $id_type == "group" )
		{
			$template = "DELETE FROM `%suser_group_homes` WHERE `group_id` = %d
				AND `home_id` = %d;";
		}
		else
		{
			return FALSE;
		}

		$query = sprintf($template,
			$this->table_prefix,
			$this->realEscapeSingle($assign_id),
			$this->realEscapeSingle($home_id));

		++$this->queries_;
		mysqli_query($this->link,$query);

		if ( mysqli_affected_rows($this->link) != 1 )
			return FALSE;

		return TRUE;
	}

	/// \brief Adds game home to database.
	/// \return FALSE if failure
	/// \return id of the home in case of success.
	public function addGameHome($rserver_id,$user_id_main,$home_cfg_id,$game_path,$server_name,$control_password,$ftp_password,$skipId = false){
		$query = sprintf("INSERT INTO `%sserver_homes`
			( `home_id`, `remote_server_id`, `user_id_main`, `home_cfg_id`, `home_path`, `home_name`,`control_password`,`ftp_password`)
			VALUES(NULL, '%d', '%d', '%d', '%s', '%s', '%s', '%s')",
				$this->table_prefix,
				$this->realEscapeSingle($rserver_id),
				$this->realEscapeSingle($user_id_main),
				$this->realEscapeSingle($home_cfg_id),
				$this->realEscapeSingle($game_path),
				$this->realEscapeSingle($server_name),
				$this->realEscapeSingle($control_password),
				$this->realEscapeSingle($ftp_password));
		++$this->queries_;
		mysqli_query($this->link,$query);
		if ( mysqli_affected_rows($this->link) != 1 )
			return FALSE;
		$homeid = mysqli_insert_id($this->link);
		if(!$skipId)
			$this->changeHomePath($homeid,$game_path.$homeid);
		return $homeid;
	}

	public function getGameHome($home_id, $getIPInfo = false) {
		$queryStr = 'SELECT *
			FROM `%1$sremote_servers` 
			NATURAL JOIN `%1$sserver_homes` 
			NATURAL JOIN `%1$sconfig_homes`';
		if($getIPInfo){
			$queryStr .= ' NATURAL JOIN `%1$sremote_server_ips` NATURAL JOIN `%1$shome_ip_ports`';
		}
		$queryStr .= ' WHERE `home_id` = %2$d;';
		$query = sprintf($queryStr,
			$this->table_prefix,
			$this->realEscapeSingle($home_id));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		if ( mysqli_num_rows($result) == 0 )
			return FALSE;

		$game_home = mysqli_fetch_assoc($result);
		
		// The arguments does not specify a user_id
		// so its imposible to get the access rights
		// this function is meant to be used only for admin.
		
		// Add mods to home.
		$query = sprintf('SELECT *
			FROM `%1$sgame_mods` NATURAL JOIN `%1$sconfig_mods`
			WHERE `home_id` = %2$d',
			$this->table_prefix,
			$this->realEscapeSingle($home_id));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);

		$mods_array = array();

		if ( mysqli_num_rows($result) != 0 )
		{
			while ($mod_row = mysqli_fetch_assoc($result))
			{
				$mods_array[$mod_row['mod_id']] = $mod_row;
			}
		}

		$game_home['mods'] = $mods_array;
		// Since this function is only called for administrators
		// we must give all access rights
		$game_home['access_rights'] = $this->getFullAccessRightsString();
		// Return the game home and mods.
		return $game_home;
	}
	
	public function getGameServersWithSamePath($remote_id, $home_path){
		$query = sprintf('SELECT * FROM `%1$sserver_homes` 
			WHERE `home_path` LIKE \'%%%2$s%%\' AND remote_server_id = \'%3$d\';',
			$this->table_prefix,
			$this->realEscapeSingle($home_path),
			$this->realEscapeSingle($remote_id));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		if ( mysqli_num_rows($result) > 0 ){
			while ($row = mysqli_fetch_assoc($result))
			{
				$servers[] = $row;
			}
		}

		if(isset($servers) && is_array($servers)){
			return $servers;
		}
	
		return false;
	}
	
	public function getGameHomeWithoutMods($home_id) {
		$query = sprintf('SELECT *
			FROM `%1$sremote_servers` 
			NATURAL JOIN `%1$sserver_homes` 
			NATURAL JOIN `%1$sconfig_homes`
			WHERE `home_id` = %2$d;',
			$this->table_prefix,
			$this->realEscapeSingle($home_id));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		if ( mysqli_num_rows($result) == 0 )
			return FALSE;

		$game_home = mysqli_fetch_assoc($result);

		return $game_home;
	}
	
	public function getHomeByFtpLogin($remote_server_id,$ftp_login) {
		$query = sprintf('SELECT *
			FROM `%1$sremote_servers` 
			NATURAL JOIN `%1$sserver_homes` 
			NATURAL JOIN `%1$sconfig_homes`
			WHERE `remote_server_id` = "%2$d" AND `ftp_login` = "%3$s";',
			$this->table_prefix,
			$this->realEscapeSingle($remote_server_id),
			$this->realEscapeSingle($ftp_login));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		if ( mysqli_num_rows($result) == 0 )
		{
			$query = sprintf('SELECT *
				FROM `%1$sremote_servers` 
				NATURAL JOIN `%1$sserver_homes` 
				NATURAL JOIN `%1$sconfig_homes`
				WHERE `home_id` = %2$d;',
				$this->table_prefix,
				$this->realEscapeSingle($ftp_login));
			++$this->queries_;
			$result = mysqli_query($this->link,$query);
			if ( mysqli_num_rows($result) == 0 )
				return FALSE;
		}

		$game_home = mysqli_fetch_assoc($result);

		return $game_home;
	}
	
	public function getGameHomeByIP($ip, $port){
		$query = sprintf('SELECT *
			FROM `%1$sremote_servers` 
			NATURAL JOIN `%1$sserver_homes` 
			NATURAL JOIN `%1$sconfig_homes` 
			NATURAL JOIN `%1$sconfig_mods` 
			NATURAL JOIN `%1$sgame_mods`
			NATURAL JOIN `%1$sremote_server_ips`
			NATURAL JOIN `%1$shome_ip_ports`
			WHERE `ip` = \'%2$s\' AND `port` = \'%3$s\';',
			$this->table_prefix,
			$this->realEscapeSingle($ip),
			$this->realEscapeSingle($port));
			
		++$this->queries_;

		$result = mysqli_query($this->link,$query);

		if ( mysqli_num_rows($result) == 0 )
			return FALSE;

		$game_home = mysqli_fetch_assoc($result);

		// Add mods to home.
		$home_id =  $game_home['home_id'];

		$query = sprintf('SELECT *
			FROM `%1$sgame_mods` NATURAL JOIN `%1$sconfig_mods`
			WHERE `home_id` = %2$d',
			$this->table_prefix,
			$this->realEscapeSingle($home_id));

		++$this->queries_;

		$result = mysqli_query($this->link,$query);

		$mods_array = array();

		if ( mysqli_num_rows($result) != 0 )
		{
			while ($mod_row = mysqli_fetch_assoc($result))
			{
				$mods_array[$mod_row['mod_id']] = $mod_row;
			}
		}

		$game_home['mods'] = $mods_array;

		// Return the line with merged rights.
		return $game_home;
	}

	public function getUserGameHome($user_id, $home_id) {
		$query = sprintf('SELECT %1$suser_homes.access_rights as access_rights, %1$sremote_servers.*,
			%1$sserver_homes.*, %1$sconfig_homes.*
			FROM `%1$sremote_servers` 
			NATURAL JOIN `%1$sserver_homes`
			NATURAL JOIN `%1$sconfig_homes` 
			NATURAL JOIN `%1$suser_homes`
			WHERE `home_id` = %2$d
			AND `user_id` = %3$d
			UNION
			SELECT %1$suser_group_homes.access_rights as access_rights, %1$sremote_servers.*,
			%1$sserver_homes.*, %1$sconfig_homes.*
			FROM `%1$sremote_servers` 
			NATURAL JOIN `%1$sserver_homes`
			NATURAL JOIN `%1$sconfig_homes` 
			NATURAL JOIN `%1$suser_group_homes`
			NATURAL JOIN `%1$suser_groups`
			WHERE `home_id` = %2$d
			AND `user_id` = %3$d;',
			$this->table_prefix,
			$this->realEscapeSingle($home_id),
			$this->realEscapeSingle($user_id));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		if ( mysqli_num_rows($result) == 0 )
			return FALSE;

		$game_home = mysqli_fetch_assoc($result);

		// If the home is assigned to user and group at the same time
		// we need to merge the access right flags to get proper
		// rights for the user shown.
		// NOTE: If there is same access rights for user and group(s) mysql
		// returns only one line.
		while ( $tmp_line = mysqli_fetch_assoc($result) )
		{
			if(isset($game_home['access_rights']) and isset($tmp_line['access_rights']))
			{
				$current_rights = str_split($game_home['access_rights']);
				$merging_rights = str_split($tmp_line['access_rights']);
				$merged_rights = array_merge($current_rights,$merging_rights);
				$game_home['access_rights'] = implode("",array_unique($merged_rights));
				break;
			}
			
			if(isset($tmp_line['access_rights']))
				$game_home['access_rights'] = $tmp_line['access_rights'];
		}

		// Add mods to home.
		$query = sprintf('SELECT *
			FROM `%1$sgame_mods` NATURAL JOIN `%1$sconfig_mods`
			WHERE `home_id` = %2$d',
			$this->table_prefix,
			$this->realEscapeSingle($home_id));
		++$this->queries_;
		$result = mysqli_query($this->link,$query);

		$mods_array = array();

		if ( mysqli_num_rows($result) != 0 )
		{
			while ($mod_row = mysqli_fetch_assoc($result))
			{
				$mods_array[$mod_row['mod_id']] = $mod_row;
			}
		}

		$game_home['mods'] = $mods_array;

		// Return the line with merged rights.
		return $game_home;
	}


	/// \brief Deletes the game home.
	public function deleteGameHome($home_id){
		$home_id = $this->realEscapeSingle($home_id);
		$return = TRUE;

		$queries = array("DELETE FROM `%suser_homes` WHERE `home_id` = %d;",
			"DELETE FROM `%sserver_homes` WHERE `home_id` = %d;",
			"DELETE FROM `%sgame_mods` WHERE `home_id` = %d;",
			"DELETE FROM `%suser_group_homes` WHERE `home_id` = %d;",
			"DELETE FROM `%smysql_databases` WHERE `home_id` = %d;",
			"DELETE FROM `%smaster_server_homes` WHERE `home_id` = %d;",
			'DELETE FROM `%1$sstatus_cache` WHERE (`ip_id`, `port`) IN
			(SELECT ip_id, port FROM `%shome_ip_ports` WHERE `home_id` = %d);',
			"DELETE FROM `%shome_ip_ports` WHERE `home_id` = %d;");

		foreach ( $queries as $query )
		{
			$query = sprintf($query,$this->table_prefix,$home_id);
			++$this->queries_;
			$result = mysqli_query($this->link,$query);
			$return = ($result === FALSE) ? FALSE : $return;
		}
		return $return;
	}

	/// \brief Adds game mod to home.
	public function addModToGameHome($home_id, $mod_cfg_id){
		$query = sprintf("INSERT INTO `%sgame_mods` (`mod_id`,`home_id`, `mod_cfg_id`)
			VALUES(NULL,'%d','%d')",
				$this->table_prefix,
				$this->realEscapeSingle($home_id),
				$this->realEscapeSingle($mod_cfg_id));
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;
		$mod_id = mysqli_insert_id($this->link);
		return $mod_id;
	}

	public function delGameMod($mod_id){
		$query = sprintf("DELETE FROM `%sgame_mods` WHERE `mod_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($mod_id));
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;
		$query = sprintf("UPDATE `%shome_ip_ports` SET `force_mod_id` = 0 WHERE `force_mod_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($mod_id));
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;
		return TRUE;
	}

	public function changeHomePath($home_id,$path) {
		$query = sprintf("UPDATE `%sserver_homes` SET `home_path` = '%s' WHERE `home_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($path),
			$this->realEscapeSingle($home_id));
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}

	public function changeUserIdMain($home_id,$userid) {
		$query = sprintf("UPDATE `%sserver_homes` SET `user_id_main` = '%s' WHERE `home_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($userid),
			$this->realEscapeSingle($home_id));
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
	
	public function changeFtpLogin($home_id,$ftp_login) {
		$query = sprintf("UPDATE `%sserver_homes` SET `ftp_login` = '%s' WHERE `home_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($ftp_login),
			$this->realEscapeSingle($home_id));
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
	
	public function changeFtpPassword($home_id,$password) {
		$query = sprintf("UPDATE `%sserver_homes` SET `ftp_password` = '%s' WHERE `home_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($password),
			$this->realEscapeSingle($home_id));
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
	
	public function changeFtpStatus ($status,$home_id) {
		$status_val = $status == "enabled" ? 1 : 0;
		$query = sprintf("UPDATE `%sserver_homes` SET `ftp_status` = '%d' WHERE `home_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($status_val),
			$this->realEscapeSingle($home_id));
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
	
	public function IsFtpEnabled($home_id) {
		$query = sprintf("SELECT `ftp_status` FROM `%sserver_homes` WHERE `home_id` = %d AND `ftp_status` = 1",
			$this->table_prefix,
			$this->realEscapeSingle($home_id));
		++$this->queries_;
		$result = mysqli_query($this->link,$query) or die("Query failed".mysqli_error($this->link));

		if(mysqli_affected_rows($this->link) == 0)
			return false;

		return true;
	}
	
	public function setMasterServer($action,$home_id,$home_cfg_id,$remote_server_id) {
		if($action == "add")
		{
			$query = sprintf("INSERT INTO `%smaster_server_homes` (`home_id`,`home_cfg_id`, `remote_server_id`) VALUES('%d','%d','%d')",
					$this->table_prefix,
					$this->realEscapeSingle($home_id),
					$this->realEscapeSingle($home_cfg_id),
					$this->realEscapeSingle($remote_server_id));
		}
		elseif($action == "remove")
		{
			$query = sprintf("DELETE FROM `%smaster_server_homes` WHERE `home_id` = %d AND `home_cfg_id` = %d AND `remote_server_id` = %d",
					$this->table_prefix,
					$this->realEscapeSingle($home_id),
					$this->realEscapeSingle($home_cfg_id),
					$this->realEscapeSingle($remote_server_id));
		}
		++$this->queries_;
			
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
	
	public function getMasterServer( $remote_server_id, $home_cfg_id ){
		$query = sprintf("SELECT home_id FROM `%smaster_server_homes` WHERE `home_cfg_id` = %d AND `remote_server_id` = %d",
					$this->table_prefix,
					$this->realEscapeSingle($home_cfg_id),
					$this->realEscapeSingle($remote_server_id));

		$retval = $this->listQuery($query);
		if( empty( $retval ) )
		{
			//print_r($this->getError());
			return FALSE;
		}
		return $retval[0]['home_id'];
	}
	
	/// \brief get available mods for game home.
	public function getAvailableModsForGameHome($home_id){
		$query = sprintf('SELECT `mod_cfg_id`, `mod_key`,`mod_name`
			FROM `%1$sserver_homes` NATURAL JOIN `%1$sconfig_homes` NATURAL JOIN `%1$sconfig_mods`
			WHERE `home_id` = %2$d
			ORDER BY `mod_name` ASC',
			$this->table_prefix,
			$this->realEscapeSingle($home_id));
		$retval = $this->listQuery($query);
		print_r($this->getError());
		return $retval;
	}

	public function updateGameModParams($max_players,$extra_params,$cpu_affinity,$nice,$home_id,$mod_cfg_id) {
		$max_players = $this->realEscapeSingle($max_players);
		$extra_params = $this->realEscapeSingle($extra_params);
		$cpu_affinity = $this->realEscapeSingle($cpu_affinity);
		$nice = $this->realEscapeSingle($nice);
		$home_id = $this->realEscapeSingle($home_id);
		$mod = $this->realEscapeSingle($mod_cfg_id);
		$query = "UPDATE `".$this->table_prefix."game_mods` SET `max_players` = '$max_players',
			`extra_params` = '$extra_params', `cpu_affinity` = '$cpu_affinity', `nice` = $nice
			WHERE `home_id` = $home_id
			AND `mod_cfg_id` = $mod_cfg_id;";

		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}

	public function addGameIpPort($home_id, $ip, $port) {
		$home_id = $this->realEscapeSingle($home_id);
		$ip = $this->realEscapeSingle($ip);
		$port = $this->realEscapeSingle($port);
		$query = "INSERT INTO `".$this->table_prefix."home_ip_ports` (`ip_id`, `port`, `home_id` )
			VALUES ( '$ip', '$port', '$home_id' );";

		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}

	public function delGameIpPort($home_id, $ip, $port) {
		$home_id = $this->realEscapeSingle($home_id);
		$ip = $this->realEscapeSingle($ip);
		$port = $this->realEscapeSingle($port);
		$query = "DELETE FROM `".$this->table_prefix."home_ip_ports`
			WHERE `ip_id` = '$ip' AND `port` = '$port' AND `home_id` = '$home_id'";

		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}

	public function forceModAtAddress($ip_id, $port, $force_mod_id) {
		$force_mod_id = $this->realEscapeSingle($force_mod_id);
		$ip_id = $this->realEscapeSingle($ip_id);
		$port = $this->realEscapeSingle($port);
		$query = "UPDATE `".$this->table_prefix."home_ip_ports` SET `force_mod_id` = '$force_mod_id'
				  WHERE `ip_id` = '$ip_id' AND `port` = '$port'";

		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
	
	public function changeHomeName($home_id, $name) {
		$home_id = $this->realEscapeSingle($home_id);
		$name = $this->realEscapeSingle($name);
		$query = "UPDATE `".$this->table_prefix."server_homes` SET `home_name` = '$name'
			WHERE `home_id` = $home_id";

		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}

	public function changeHomeControlPassword($home_id, $control_password)
	{
		$home_id = $this->realEscapeSingle($home_id);
		$control_password = $this->realEscapeSingle($control_password);
		$query = "UPDATE `".$this->table_prefix."server_homes` SET `control_password` = '$control_password'
			WHERE `home_id` = $home_id";

		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}

	public function getAvailableHomesFor($id_type, $assign_id) {
		if ( $id_type == "user" )
		{
			$template = 'SELECT * FROM `%1$sserver_homes`
				WHERE `home_id` NOT IN
				(
					SELECT `home_id` FROM `%1$suser_homes`
					WHERE `user_id` = %2$d
				) ORDER BY home_user_order ASC, home_id ASC;';
		}
		else if ( $id_type == "group" )
		{
			$template = 'SELECT * FROM `%1$sserver_homes`
				WHERE `home_id` NOT IN
				(
					SELECT `home_id` FROM `%1$suser_group_homes`
					WHERE `group_id` = %2$d
				) ORDER BY home_user_order ASC, home_id ASC;';
		}
		else
		{
			return FALSE;
		}

		$query = sprintf($template,
			$this->table_prefix,
			$this->realEscapeSingle($assign_id));

		return $this->listQuery($query);
	}
	
	public function getAvailableUserHomesFor($id_type, $assign_id, $user_id) {
		if ( $id_type == "group" )
		{
			$gid = array();
			$currentGroups = $this->getUsersGroups($user_id);
			foreach($currentGroups as $group){
				$gid[] = $group["group_id"];
			}
			
			$template ='SELECT * FROM `%1$sserver_homes`
						WHERE (
						`home_id` IN
						(
							SELECT `home_id` FROM `%1$suser_homes`
							WHERE `user_id` = %3$d
						)';
						
			if(count($gid)){
				
				$template .= ' OR `home_id` IN
						(
							SELECT `home_id` FROM `%1$suser_group_homes`
							WHERE `group_id` IN (' . implode(',', $gid) . ')
						)';
			}
						
			$template .= ') AND
						`home_id` NOT IN
						(
							SELECT `home_id` FROM `%1$suser_group_homes`
							WHERE `group_id` = %2$d
						)';
						
			$template .= ' ORDER BY %1$sserver_homes.home_user_order ASC, %1$sserver_homes.home_id ASC';
		}
		else
		{
			return FALSE;
		}

		$query = sprintf($template,
			$this->table_prefix,
			$this->realEscapeSingle($assign_id),
			$this->realEscapeSingle($user_id));

		return $this->listQuery($query);
	}

	public function getGameHomes(){
		$sql = 'SELECT %1$sserver_homes.*,%1$sremote_servers.*, %1$sconfig_homes.*
				FROM `%1$sserver_homes` NATURAL JOIN `%1$sconfig_homes` NATURAL JOIN `%1$sremote_servers`
				ORDER BY %1$sserver_homes.home_user_order ASC, %1$sserver_homes.home_id ASC;';
		$query = sprintf($sql, $this->table_prefix);
		return $this->listQuery($query);
	}
	
	public function getGameHomes_limit($page_gameHomes, $limit_gameHomes, $searchType, $searchString) {
		$searchString = $this->realEscapeSingle($searchString);
		$game_home_id = ($page_gameHomes - 1) * $limit_gameHomes;
		
		if(!is_numeric($game_home_id) || !is_numeric($limit_gameHomes)){
			return false;
		}
		
		$sql = 'SELECT %1$sserver_homes.*, %1$sremote_servers.*, %1$sconfig_homes.*, %1$shome_ip_ports.port
					FROM `%1$sserver_homes`
						NATURAL JOIN `%1$sconfig_homes`
						NATURAL JOIN `%1$sremote_servers`
						LEFT JOIN %1$shome_ip_ports 
							NATURAL JOIN %1$sremote_server_ips ON %1$sserver_homes.home_id=%1$shome_ip_ports.home_id ';
		
		if (!empty($searchString)) {
			if ($searchType == 'ip_port') {
				$sql .= "WHERE CONCAT_WS(':', %1\$sremote_server_ips.ip, %1\$shome_ip_ports.port) = '$searchString'
							OR agent_ip = '$searchString' ";
			}

			if ($searchType == 'home_name') {
				$sql .= "WHERE home_name LIKE '%%$searchString%%' ";
			}
			
			if ($searchType == 'ownedBy') {
				$sql .= "WHERE user_id_main IN (SELECT user_id FROM %1\$susers WHERE users_login LIKE '%%$searchString%%')
							OR user_id_main = '$searchString' ";
			}

			if ($searchType == 'rserver') {
				$sql .= "WHERE remote_server_name LIKE '%%$searchString%%'
							OR %1\$sserver_homes.remote_server_id = '$searchString' ";
			}
		}

		$sql .= 'ORDER BY %1$sserver_homes.home_user_order ASC, %1$sserver_homes.home_id ASC LIMIT' . " $game_home_id, $limit_gameHomes;";
		$sql = sprintf($sql, $this->table_prefix);

		return $this->listQuery($sql);
	}
	
	public function get_GameHomes_count($searchType, $searchString) {
		$searchString = $this->realEscapeSingle($searchString);
		$sql = 'SELECT COUNT(1) AS total FROM %1$sserver_homes NATURAL JOIN %1$sremote_servers
					LEFT JOIN %1$shome_ip_ports 
						NATURAL JOIN %1$sremote_server_ips ON %1$sserver_homes.home_id=%1$shome_ip_ports.home_id ';

		if (!empty($searchString)) {
			if ($searchType == 'ip_port') {
				$sql .= "WHERE CONCAT_WS(':', %1\$sremote_server_ips.ip, %1\$shome_ip_ports.port) = '$searchString'
							OR agent_ip = '$searchString' ";
			}

			if ($searchType == 'home_name') {
				$sql .= "WHERE home_name LIKE '%%$searchString%%' ";
			}
			
			if ($searchType == 'ownedBy') {
				$sql .= "WHERE user_id_main IN (SELECT user_id FROM %1\$susers WHERE users_login LIKE '%%$searchString%%')
							OR user_id_main = '$searchString' ";
			}

			if ($searchType == 'rserver') {
				$sql .= "WHERE remote_server_name LIKE '%%$searchString%%'
							OR %1\$sserver_homes.remote_server_id = '$searchString' ";
			}
		}

		$sql = sprintf($sql, $this->table_prefix);
		return $this->resultQuery($sql);
	}
	
	public function changeLastParam($home_id,$json) {
		$query = sprintf("UPDATE `%sserver_homes` SET `last_param` = '%s' WHERE `home_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($json),
			$this->realEscapeSingle($home_id));
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
	
	public function getLastParam($home_id) {
		if ( !$this->link ) return FALSE;

		$query = sprintf("SELECT `last_param` FROM `%sserver_homes` WHERE `home_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($home_id));

		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		
		if ( mysqli_num_rows($result) != 1 )
			return FALSE;
			
		$result = mysqli_fetch_assoc( $result );

		return $result['last_param'];
	}
	
	public function saveServerStatusCache($ip_id,$port,$status) {
		$query = sprintf("SELECT * FROM `%sstatus_cache` WHERE `ip_id` = %s AND `port` = %s;",
			$this->table_prefix,
			$this->realEscapeSingle($ip_id),
			$this->realEscapeSingle($port));

		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		
		if ( mysqli_num_rows($result) > 0 )
		{
			$query = sprintf("DELETE FROM `%sstatus_cache` WHERE `ip_id` = %s AND `port` = %s;",
				$this->table_prefix,
				$this->realEscapeSingle($ip_id),
				$this->realEscapeSingle($port));

			++$this->queries_;
			mysqli_query($this->link,$query);	
		}
			
		$now = time();
		$json = json_encode($status);
		$query = sprintf("INSERT INTO `%sstatus_cache` ( `date_timestamp`, `ip_id`, `port`, `server_status_cache` ) VALUES ( '%s', '%s', '%s', '%s' );",
			$this->table_prefix,
			$this->realEscapeSingle($now),
			$this->realEscapeSingle($ip_id),
			$this->realEscapeSingle($port),
			$this->realEscapeSingle($json));
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
	
	public function getServerStatusCache($ip_id,$port) {
		if ( !$this->link ) return FALSE;

		$query = sprintf("SELECT * FROM `%sstatus_cache` WHERE `ip_id` = %s AND `port` = %s;",
			$this->table_prefix,
			$this->realEscapeSingle($ip_id),
			$this->realEscapeSingle($port));

		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		
		if ( mysqli_num_rows($result) != 1 )
			return FALSE;
			
		$result = mysqli_fetch_assoc( $result );
		
		$cache = json_decode( $result['server_status_cache'], True);
		
		$cache['date_timestamp'] = $result['date_timestamp'];

		return $cache;
	}
	
	public function delServerStatusCache($ip_id,$port) {
		if ( !$this->link ) return FALSE;

		$query = sprintf("DELETE FROM `%sstatus_cache` WHERE `ip_id` = %s AND `port` = %s;",
			$this->table_prefix,
			$this->realEscapeSingle($ip_id),
			$this->realEscapeSingle($port));

		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;
		
		return TRUE;
	}


	public function is_valid_login($user_id,$password)
	{
		++$this->queries_;
		$query = sprintf("SELECT *
			FROM `%susers`
			WHERE `user_id` = %d AND
			`users_passwd` = MD5('%s');",
				$this->table_prefix,
				$this->realEscapeSingle($user_id),
				$this->realEscapeSingle($password));

		$result = mysqli_query($this->link,$query);

		if (mysqli_affected_rows($this->link) == 1)
			return TRUE;

		return FALSE;
	}
	
	public function addAdminExternalLink($name, $url, $user_id) {
		$name = $this->realEscapeSingle($name);
		$url = $this->realEscapeSingle($url);
		$user_id = $this->realEscapeSingle($user_id);
		$query = "INSERT INTO `".$this->table_prefix."adminExternalLinks` (	`link_id`, `name`, `url`, `user_id` )
			VALUES ( NULL, '$name', '$url', '$user_id' );";

		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
	
	public function getAdminExternalLinks($user_id) {
		$user_id = $this->realEscapeSingle($user_id);
		if ( !$this->link ) return;
		$query = sprintf("SELECT * FROM `%sadminExternalLinks` WHERE user_id=".$user_id,
			$this->table_prefix);
		return $this->listQuery($query);
	}
	
	public function delAdminExternalLink($link_id, $user_id){
		$user_id = $this->realEscapeSingle($user_id);
		$link_id = $this->realEscapeSingle($link_id);
		$query = "DELETE FROM `".$this->table_prefix."adminExternalLinks`
			WHERE `link_id` = '$link_id' AND `user_id` = '$user_id'";
		
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
	
	public function addRconPreset($name,$command,$home_cfg_id,$mod_cfg_id)
	{
		$name = $this->realEscapeSingle($name);
		$command = $this->realEscapeSingle($command);
		$home_cfg_id = $this->realEscapeSingle($home_cfg_id);
		$mod_cfg_id = $this->realEscapeSingle($mod_cfg_id);
		$query = "INSERT INTO `".$this->table_prefix."rcon_presets` (	`preset_id`, `name`, `command`, `home_cfg_id`, `mod_cfg_id` )
			VALUES ( NULL, '$name', '$command', '$home_cfg_id', '$mod_cfg_id' );";

		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
	
	public function delRconPreset($preset_id)
	{
		$preset_id = $this->realEscapeSingle($preset_id);
		$query = "DELETE FROM `".$this->table_prefix."rcon_presets`
				  WHERE `preset_id` = '$preset_id'";

		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
	
	public function changeRconPreset($name,$command,$preset_id)
	{
		$name = $this->realEscapeSingle($name);
		$command = $this->realEscapeSingle($command);
		$preset_id = $this->realEscapeSingle($preset_id);
		$query = "UPDATE `".$this->table_prefix."rcon_presets` SET `name` = '$name',
																   `command` = '$command'
															 WHERE `preset_id` = $preset_id";

		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
	
	public function getRconPresets($home_cfg_id,$mod_cfg_id)
	{
		$home_cfg_id = $this->realEscapeSingle($home_cfg_id);
		$mod_cfg_id = $this->realEscapeSingle($mod_cfg_id);
		
		if ( !$this->link ) return;
		$query = sprintf("SELECT * FROM `%srcon_presets` WHERE home_cfg_id=".$home_cfg_id." AND mod_cfg_id=".$mod_cfg_id,
			$this->table_prefix);
		return $this->listQuery($query);
	}
		
	public function getTablePrefix()
	{
		return $this->table_prefix;
	}

	public function incrementalNumByHomeId($home_id,$mod_cfg_id,$remote_server_id)
	{
		$mod_cfg_id = $this->realEscapeSingle($mod_cfg_id);
		$remote_server_id = $this->realEscapeSingle($remote_server_id);
		$query = "SELECT `home_id` FROM `".$this->table_prefix."server_homes` 
				  NATURAL JOIN `".$this->table_prefix."game_mods`
				  WHERE mod_cfg_id=".$mod_cfg_id." AND remote_server_id=".$remote_server_id;
		$result = $this->listQuery($query);
		
		$position = 0;
		foreach($result as $maching_mod )
		{
			if ( $maching_mod['home_id'] < $home_id )
				$position = $position + 2;
		}

		if ($position <= 9)
			return "00"."$position";
		elseif ($position <= 99)
			return "0"."$position";
		else
			return $position;
	}
	
	public function logger($message){
		$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
		$client_ip = getClientIPAddress();
		$message = $this->realEscapeSingle($message);
		$this->query("INSERT INTO OGP_DB_PREFIXlogger (date, user_id, ip, message) VALUE (FROM_UNIXTIME(UNIX_TIMESTAMP(), '%d-%m-%Y %H:%i:%s'), $user_id, '$client_ip', '$message');");
	}

	public function get_logger_count($search_field) {
		$search_field = $this->realEscapeSingle($search_field);
		
		$sql = "SELECT COUNT(1) AS total FROM ".$this->table_prefix."logger ";

		if (!empty($search_field)) {
			$sql .= "WHERE ip = '$search_field' OR message LIKE '%$search_field%'
				OR user_id IN (SELECT user_id FROM `".$this->table_prefix."users` WHERE users_login LIKE '%$search_field%')";
		}

		return $this->resultQuery($sql);
	}
	
	public function read_logger($page,$limit, $search_field) {
		$search_field = $this->realEscapeSingle($search_field);
		
		$log_id = ($page - 1) * $limit;

		if(!is_numeric($log_id) || !is_numeric($limit)){
			return false;
		}

		$sql = "SELECT * FROM ".$this->table_prefix."logger ";

		if (!empty($search_field)) {
			$sql .= "WHERE ip = '$search_field' OR message LIKE '%$search_field%'
				OR user_id IN (SELECT user_id FROM `".$this->table_prefix."users` WHERE users_login LIKE '%$search_field%') ";
		}

		$sql .= "ORDER BY log_id DESC LIMIT $log_id, $limit;";

		return $this->resultQuery($sql);
	}
	
	public function del_logger_log($log_id){
		$log_id = $this->realEscapeSingle($log_id);
		return $this->query("DELETE FROM `".$this->table_prefix."logger` WHERE log_id=$log_id;");
	}
	
	public function empty_logger(){
		return $this->query("TRUNCATE `".$this->table_prefix."logger`;");
	}
	
	public function getIpIdByIp($ip){
		$query = sprintf("SELECT ip_id FROM `%sremote_server_ips` WHERE ip = '%s';",
			$this->table_prefix,
			$this->realEscapeSingle($ip));
		$result = $this->listQuery($query);
		return $result[0]['ip_id'];
	}
	
	public function getIpById($ip_id){
		$query = sprintf("SELECT ip FROM `%sremote_server_ips` WHERE ip_id = '%d';",
			$this->table_prefix,
			$this->realEscapeSingle($ip_id));
		$result = $this->listQuery($query);
		return $result[0]['ip'];
	}
	
	public function addPortsRange($ip_id,$home_cfg_id,$start_port,$end_port,$port_increment){
		if ( !$this->link ) return false;
		if ($start_port == "" or $end_port == "" or $port_increment == "" or
			$start_port == "0" or $end_port == "0" or $port_increment == "0" or
			$start_port > $end_port)
			return 1;
		$ranges = $this->getPortsRange($ip_id);
		if($ranges != FALSE)
		{
			$used_range_ports = array();
			foreach($ranges as $range)
			{
				for($port = $range['start_port']; $port >= $range['start_port'] and $port <= $range['end_port']; $port++)
				{
					$used_range_ports[] = $port;
				}
			}
			if(!empty($used_range_ports))
			{
				$range_ports = array();
				for($port = $start_port; $port >= $start_port and $port <= $end_port; $port++)
				{
					$range_ports[] = $port;
				}
				foreach($range_ports as $range_port)
				{
					if(in_array($range_port,$used_range_ports))
						return 2;
				}
			}
		}
		$query = sprintf("INSERT INTO `%sarrange_ports` (`ip_id`,`home_cfg_id`,`start_port`,`end_port`,`port_increment`) VALUES('%d','%d', '%d','%d', '%d')",
			$this->table_prefix,
			$this->realEscapeSingle($ip_id),
			$this->realEscapeSingle($home_cfg_id),
			$this->realEscapeSingle($start_port),
			$this->realEscapeSingle($end_port),
			$this->realEscapeSingle($port_increment));

		++$this->queries_;
		mysqli_query($this->link,$query);

		if( mysqli_errno($this->link) != 0 )
			return false;
	
		return true;
	}
	
	public function getPortsRange($ip_id,$home_cfg_id = FALSE){
		if ( !$this->link ) return false;
		
		$and_cfg_id = $home_cfg_id !== FALSE ? "AND home_cfg_id=".$this->realEscapeSingle($home_cfg_id) : "";
		$query = sprintf("SELECT * FROM `%sarrange_ports` WHERE ip_id=%d $and_cfg_id;",
			$this->table_prefix,
			$this->realEscapeSingle($ip_id));

		++$this->queries_;
		
		return $this->listQuery($query);
	}
	
	public function delPortsRange($range_id){
		$range_id = $this->realEscapeSingle($range_id);
		return $this->query("DELETE FROM `".$this->table_prefix."arrange_ports` WHERE range_id=$range_id;");
	}
	
	public function editPortsRange($range_id,$ip_id,$start_port,$end_port,$port_increment){
		if ($start_port == "" or $end_port == "" or $port_increment == "" or
			$start_port == "0" or $end_port == "0" or $port_increment == "0" or
			$start_port > $end_port)
			return 1;
		$ranges = $this->getPortsRange($ip_id);
		if($ranges != FALSE)
		{
			$used_range_ports = array();
			foreach($ranges as $range)
			{
				if($range['range_id'] == $range_id)
					continue;
				for($port = $range['start_port']; $port >= $range['start_port'] and $port <= $range['end_port']; $port++)
				{
					$used_range_ports[] = $port;
				}
			}
			if(!empty($used_range_ports))
			{
				$range_ports = array();
				for($port = $start_port; $port >= $start_port and $port <= $end_port; $port++)
				{
					$range_ports[] = $port;
				}
				
				foreach($range_ports as $range_port)
				{
					if(in_array($range_port,$used_range_ports))
						return 2;
				}
			}
		}
		$query = sprintf("UPDATE %sarrange_ports 
								 SET 
								 start_port='%d',
								 end_port='%d',
								 port_increment='%d'
								 WHERE range_id='%d';",
								 $this->table_prefix,
								 $this->realEscapeSingle($start_port),
								 $this->realEscapeSingle($end_port),
								 $this->realEscapeSingle($port_increment),
								 $this->realEscapeSingle($range_id));
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
		
	public function getNextAvailablePort($ip_id,$home_cfg_id){
		$ranges = $this->getPortsRange($ip_id,$home_cfg_id);
		$range = $ranges[0];
		if(empty($range))
		{
			$ranges = $this->getPortsRange($ip_id,"0");
			$range = $ranges[0];
		}
		if(empty($range))
			$range = array('start_port' => '27015','end_port' => '39915', 'port_increment' => '100');
			
		$home_used_ports = $this->getIpPorts($ip_id);	
		$used_ports = array();
		if(!empty($home_used_ports))
		{
			foreach($home_used_ports as $home_used_port)
			{
				$used_ports[] = $home_used_port['port'];
			}
		}
		
		for($port = $range['start_port']; $port >= $range['start_port'] and $port <= $range['end_port']; $port+=$range['port_increment'])
		{
			if(!in_array($port,$used_ports))
				return $port;
		}
		return FALSE;
	}
	
	public function changeCustomFields($home_id,$json) {
		$query = sprintf("UPDATE `%sserver_homes` SET `custom_fields` = '%s' WHERE `home_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($json),
			$this->realEscapeSingle($home_id));
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;

		return TRUE;
	}
	
	public function getCustomFields($home_id) {
		if ( !$this->link ) return FALSE;

		$query = sprintf("SELECT `custom_fields` FROM `%sserver_homes` WHERE `home_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($home_id));

		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		
		if ( mysqli_num_rows($result) != 1 )
			return FALSE;
			
		$result = mysqli_fetch_assoc( $result );

		return $result['custom_fields'];
	}
	
	public function getFirewallSettings($remote_server_id)
	{
		if ( !$this->link ) return FALSE;
		$query = sprintf("SELECT `firewall_settings` FROM `%sremote_servers` WHERE `remote_server_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($remote_server_id));

		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		
		if ( !$result )
			$result['firewall_settings'] = NULL;
		else
			$result = mysqli_fetch_assoc( $result );
		
		if(!is_null($result['firewall_settings']))
			$firewall_settings = unserialize(base64_decode($result['firewall_settings']));
		if(!isset($firewall_settings['default_allowed']))
		{
			$remote_server = $this->getRemoteServer($remote_server_id);
			$agent_ip = gethostbyname($remote_server['agent_ip']);
			$ftp_ip = gethostbyname($remote_server['ftp_ip']);
		}
		$firewall_settings['status'] = isset($firewall_settings['status']) ?
											 $firewall_settings['status'] :
											 "disable";
		$firewall_settings['default_allowed'] = isset($firewall_settings['default_allowed']) ?
													  $firewall_settings['default_allowed'] :
													  "$agent_ip:$remote_server[agent_port],$ftp_ip:$remote_server[ftp_port],22,25,80";
		$firewall_settings['allow_port_command'] = isset($firewall_settings['allow_port_command']) ?
														 $firewall_settings['allow_port_command'] :
														 "ufw allow %PORT%";
		$firewall_settings['deny_port_command'] = isset($firewall_settings['deny_port_command']) ?
														$firewall_settings['deny_port_command'] :
														"ufw deny %PORT%";
		$firewall_settings['deny_ip_port_command'] = isset($firewall_settings['deny_ip_port_command']) ?
														   $firewall_settings['deny_ip_port_command'] :
														   "ufw deny to %IP% port %PORT%";
		$firewall_settings['allow_ip_port_command'] = isset($firewall_settings['allow_ip_port_command']) ?
															$firewall_settings['allow_ip_port_command'] :
															"ufw allow to %IP% port %PORT%";
		$firewall_settings['enable_firewall_command'] = isset($firewall_settings['enable_firewall_command']) ?
															  $firewall_settings['enable_firewall_command'] :
															  "echo y | ufw enable";
		$firewall_settings['disable_firewall_command'] = isset($firewall_settings['disable_firewall_command']) ? 
														 $firewall_settings['disable_firewall_command'] : 
														 "ufw disable";
		$firewall_settings['get_firewall_status_command'] = isset($firewall_settings['get_firewall_status_command']) ? 
														 $firewall_settings['get_firewall_status_command'] : 
														 "ufw status";
		$firewall_settings['reset_firewall_command'] = isset($firewall_settings['reset_firewall_command']) ? 
														 $firewall_settings['reset_firewall_command'] : 
														 "echo y | ufw reset";
		return $firewall_settings;
	}
	
	public function updateFirewallSettings($remote_server_id,$firewall_settings) {
		$settings = base64_encode(serialize($firewall_settings));
		$query = sprintf("UPDATE `%sremote_servers` SET `firewall_settings` = '%s' WHERE `remote_server_id` = %d",
			$this->table_prefix,
			$this->realEscapeSingle($settings),
			$this->realEscapeSingle($remote_server_id));
		++$this->queries_;
		if ( mysqli_query($this->link,$query) === FALSE )
			return FALSE;
		return TRUE;
	}
	
	public function real_escape_string($string) {
		return $this->realEscapeSingle($string);
	}
	
	public function updateExpirationDate($home_id, $expiration_date, $type, $assign_id = NULL) {
		if(preg_match('/^([0-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[1-2][0-9][0-9][0-9][\s|\t]+([0-1][0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/',$expiration_date) or $expiration_date == 'X' or $expiration_date == '')
		{
			if($expiration_date == 'X' or $expiration_date == '')
			{
				$ed = 'X';
			}
			else
			{
				$dateTime = DateTime::createFromFormat('d/m/Y H:i:s', $expiration_date);
				$ed = $dateTime->getTimestamp();
			}
			$type = $type != "group" ? $type : "user_group";
			$query = sprintf("UPDATE `%s${type}_homes` SET `${type}_expiration_date` = '%s' WHERE `home_id` = %d",
				$this->table_prefix,
				$ed,
				$this->realEscapeSingle($home_id));
			if($assign_id != NULL)
			{
				$id_type = $type == "user" ? "user_id" : "group_id";
				$query .= " AND `$id_type` = $assign_id";
			}
			++$this->queries_;
			if ( mysqli_query($this->link,$query) === FALSE )
				return FALSE;
			return TRUE;
		}
		return FALSE;
	}
	
	public function check_expire_date($user_id, $home_id, $types = array('user', 'user_group', 'server')) {
		foreach($types as $type)
		{
			switch ($type) {
				case 'user':
					$query = 'SELECT `%2$s_expiration_date` as `expiration_date` FROM `%1$s%2$s_homes` WHERE `home_id` = %3$d AND `user_id`=%4$d;';
					break;
				case 'user_group':
					$query = 'SELECT `%2$s_expiration_date` as `expiration_date`, `group_id` FROM `%1$s%2$s_homes` WHERE `home_id` = %3$d AND `group_id` IN (
									SELECT group_id
									FROM %1$suser_groups
									WHERE user_id=%4$d
								);';
					break;
				case 'server':
					$query = 'SELECT `%2$s_expiration_date` as `expiration_date` FROM `%1$s%2$s_homes` WHERE `home_id` = %3$d;';
					break;
			}
			
			$query = sprintf( $query,
							  $this->table_prefix,
							  $type,
							  $this->realEscapeSingle($home_id),
							  $this->realEscapeSingle($user_id));
			++$this->queries_;
			$result = mysqli_query($this->link,$query);
			if($result === FALSE)
				continue;
			$result = mysqli_fetch_assoc( $result );
			if(empty($result) OR $result['expiration_date'] == 'X')
				continue;
			if($result['expiration_date'] < time())
			{
				switch ($type) {
					case 'user':
						$user = $this->getUserById($user_id);
						if ( $this->unassignHomeFrom('user',$user_id,$home_id) === TRUE )
							$this->logger(get_lang_f("unassigned_home_from_user", $home_id, $user['users_login']));
						return TRUE;
						break;
					case 'user_group':
						$group = $this->getGroupById($result['group_id']);
						if ( $this->unassignHomeFrom('group',$result['group_id'],$home_id) === TRUE )
							$this->logger(get_lang_f("unassigned_home_from_group", $home_id, $group['group_name']));
						return TRUE;
						break;
					case 'server':
						require_once('includes/lib_remote.php');
						$home_info = $this->getGameHomeWithoutMods($home_id);
						$remote = new OGPRemoteLibrary($home_info['agent_ip'], $home_info['agent_port'], $home_info['encryption_key'], $home_info['timeout']);
						$agent_online = $remote->status_chk() === 1;
						if( $agent_online )
						{
							if( $this->IsFtpEnabled($home_id) )
							{
								$ftp_login = isset($home_info['ftp_login']) ? $home_info['ftp_login'] : $home_id;
								$remote->ftp_mgr("userdel", $ftp_login);
							}
							$assigned = $this->getHomeIpPorts($home_id);
							if( !empty($assigned) )
							{
								foreach($assigned as $address)
								{
									if($remote->rfile_exists( "startups/".$address['ip']."-".$address['port'] ) === 1)
									{
										require_once("modules/gamemanager/home_handling_functions.php");
										require_once("modules/config_games/server_config_parser.php");
										exec_operation('stop', $home_id, FALSE, $address['ip'], $address['port']);
									}
								}
							}
							
							if( $remote->remove_home($home_info['home_path']) == 1 )
							{
								$this->logger(get_lang_f('sucessfully_deleted', $home_info['home_path']));
							}
						}
						if ( $this->deleteGameHome($home_id) )
							$this->logger(get_lang_f('successfully_deleted_game_server_with_id', $home_id));
						return TRUE;
						break;
				}
			}
		}
		return FALSE;
	}
	
	public function getHomeAffinity ($home_id)
	{
		if (is_numeric($home_id) === false)
		{
			return false;
		}
		$home_id = $this->realEscapeSingle($home_id);
		
		$query = 'SELECT `cpu_affinity` FROM `%sgame_mods` WHERE `home_id` = %2$d;';
		$query = sprintf($query, $this->table_prefix, (int)$home_id);
		
		$result = mysqli_query($this->link, $query);
		++$this->queries_;
		
		if($result === false)
		{
			return false;
		}
		
		$tmp = mysqli_fetch_row($result);
		return $tmp[0];
	}
	
	public function getApiToken($user_id)
	{
		if (is_numeric($user_id) === false)
			return false;
		$this->checkApiTable();
		
		$user_id = (int)$this->realEscapeSingle($user_id);
		
		$query = 'SELECT `token` FROM `%sapi_tokens` WHERE `user_id` = %2$d;';
		$query = sprintf($query, $this->table_prefix, $user_id);
		
		$result = mysqli_query($this->link, $query);
		++$this->queries_;
		$tmp = mysqli_fetch_row($result);
		++$this->queries_;
		if(empty($tmp))
		{
			$token = bin2hex(openssl_random_pseudo_bytes(32));
			$query ='INSERT INTO %sapi_tokens'.
					' (user_id, token)'.
					' VALUES'.
					' (\'%2$d\', \'%3$s\')'.
					' ON DUPLICATE KEY UPDATE'.
					' user_id = VALUES(user_id),'.
					' token = VALUES(token);';
			$query = sprintf($query, $this->table_prefix, $user_id, $token);
			if(!$this->query($query))
				return false;
		}
		else
		{
			$token = $tmp[0];
		}
		
		return $token;
	}
	
	public function checkApiTable()
	{
		if(!$this->query('SELECT 1 FROM '.$this->table_prefix.'api_tokens LIMIT 1'))
		{
			$this->query(	"CREATE TABLE IF NOT EXISTS `".$this->table_prefix.'api_tokens'."` (".
							"`user_id` int(11) NOT NULL,".
							"`token` varchar(64) NOT NULL,".
							"PRIMARY KEY  (`user_id`),".
							"UNIQUE KEY user_id (user_id)".
							") ENGINE=MyISAM DEFAULT CHARSET=latin1;");
		}
	}
	
	public function currentApiToken($user_id)
	{
		if (is_numeric($user_id) === false)
			return false;
		$this->checkApiTable();
		
		$user_id = (int)$this->realEscapeSingle($user_id);
		
		$query = 'SELECT `token` FROM `%sapi_tokens` WHERE `user_id` = %2$d;';
		$query = sprintf($query, $this->table_prefix, $user_id);
		
		$result = mysqli_query($this->link, $query);
		++$this->queries_;
		$tmp = mysqli_fetch_row($result);
		++$this->queries_;
		if(empty($tmp))
			return false;
		
		return $tmp[0];
	}
	
	public function saveGameServerOrder($order){
		if(is_array($order) && count($order)){
			$sql = "";
			foreach($order as $homeOrder){
				if(is_numeric($homeOrder["home_id"]) && is_numeric($homeOrder["order"])){
					$sql .= sprintf("UPDATE %sserver_homes SET home_user_order='%d'
						WHERE home_id = '%d';",
						$this->table_prefix,
						$this->realEscapeSingle($homeOrder["order"]),
						$this->realEscapeSingle($homeOrder["home_id"]));
				}
			}
			
			if ( !$this->link || empty($sql)) return FALSE;
			return $this->runMultiSQLQuery($sql);
		}
		
		return false;
	}
	
	public function resetGameServerOrder(){
		$query = sprintf("UPDATE %sserver_homes SET home_user_order=99999;",
			$this->table_prefix);
		++$this->queries_;
		$result = mysqli_query($this->link,$query);
		if( mysqli_affected_rows($this->link) == '0' )
			return FALSE;
		return TRUE;
	}
	
	public function runMultiSQLQuery($sql){
		if(!empty($sql) || !$this->link){
			$success = mysqli_multi_query($this->link, $sql);
			if($success !== false){
				do {
					if($result = mysqli_store_result($this->link)){
						mysqli_free_result($this->link);
					}
				} while(mysqli_next_result($this->link));
				
				return $success;
			}
		}
		
		return false;
	}
}
?>
