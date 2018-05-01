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

class MySQLModuleDatabase extends OGPDatabaseMySQL
{
	protected $link;
	protected $table_prefix;
	
	public function __construct() {
        
    }
	
	public function __destruct() {
        parent::__destruct();
    }
	
	public function connect($db_host, $db_user, $db_pass, $db_name, $table_prefix = NULL) {
        if ( !extension_loaded("mysqli") )
            return -99;

        $this->table_prefix = $table_prefix;

        /// \todo We might want to do other checks here as well?
        if ( $db_host === NULL )
            return -1;

        $this->link = mysqli_connect($db_host, $db_user, $db_pass);

        if ( $this->link === FALSE )
            return -11;

        if ( mysqli_select_db($this->link,$db_name) === FALSE )
            return -12;

        return TRUE;
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
	
	public function addMysqlServer($remote_server_id,$mysql_name,$mysql_ip,$mysql_port,$mysql_root_passwd,$privilegies_str)
    {
        if ( empty($mysql_ip) )
            return false;
        else if ( empty($mysql_port) )
            return false;
		else if ( empty($mysql_root_passwd) )
            return false;

        $query = sprintf("INSERT INTO `%smysql_servers` (`remote_server_id`,`mysql_name`,`mysql_ip`,`mysql_port`,`mysql_root_passwd`,`privilegies_str`)
            VALUES('%s','%s','%s','%s','%s','%s');",
                $this->table_prefix,
				mysqli_real_escape_string($this->link,$remote_server_id),
                mysqli_real_escape_string($this->link,$mysql_name),
                mysqli_real_escape_string($this->link,$mysql_ip),
				mysqli_real_escape_string($this->link,$mysql_port),
                mysqli_real_escape_string($this->link,$mysql_root_passwd),
				mysqli_real_escape_string($this->link,$privilegies_str));
        ++$this->queries_;
        mysqli_query($this->link,$query);

        if( mysqli_errno($this->link) != 0 )
        {
            return false;
        }

        return mysqli_insert_id($this->link);
    }
	
	public function editMysqlServer($mysql_server_id,$remote_server_id,$mysql_name,$mysql_ip,$mysql_port,$mysql_root_passwd,$privilegies_str)
    {
		$query = sprintf("UPDATE `%smysql_servers` SET `remote_server_id` = '%s',
				`mysql_name` = '%s', `mysql_ip` = '%s', `mysql_port` = '%s',
				`mysql_root_passwd` = '%s', `privilegies_str` = '%s'
				WHERE `mysql_server_id` = %s;",
				$this->table_prefix,
				mysqli_real_escape_string($this->link,$remote_server_id),
				mysqli_real_escape_string($this->link,$mysql_name),
				mysqli_real_escape_string($this->link,$mysql_ip),
				mysqli_real_escape_string($this->link,$mysql_port),
				mysqli_real_escape_string($this->link,$mysql_root_passwd),
				mysqli_real_escape_string($this->link,$privilegies_str),
				mysqli_real_escape_string($this->link,$mysql_server_id));
		
        ++$this->queries_;
        if ( mysqli_query($this->link,$query) === FALSE )
            return FALSE;

        return TRUE;
    }
	
	public function getMysqlServers(){
        $query = sprintf("SELECT * FROM %smysql_servers;",
            $this->table_prefix);
        return $this->listQuery($query);
    }
	
	public function getMysqlServer($id) {
        if ( !$this->link ) return FALSE;

        $query = sprintf("SELECT * FROM `%smysql_servers` WHERE `mysql_server_id` = %d",
            $this->table_prefix,
            mysqli_real_escape_string($this->link,$id));

        ++$this->queries_;
        $result = mysqli_query($this->link,$query);

        // If there are no servers then we can stop here.
        if ( mysqli_num_rows($result) != 1 )
            return FALSE;

        return mysqli_fetch_assoc( $result );
    }
	
	public function removeMysqlServer($mysql_server_id){
		$mysql_server_id = mysqli_real_escape_string($this->link,$mysql_server_id);

        $return = TRUE;

        $queries = array("DELETE FROM `%smysql_databases` WHERE mysql_server_id = %d;",
						 "DELETE FROM `%smysql_servers` WHERE mysql_server_id = %d;");

        foreach ( $queries as $query )
        {
            $query = sprintf($query,$this->table_prefix,$mysql_server_id);
            ++$this->queries_;
            $result = mysqli_query($this->link,$query);
            $return = ($result === FALSE) ? FALSE : $return;
        }
        return $return;
	}
	
	public function getMysqlServerDBs($mysql_server_id){
        $query = sprintf("SELECT * FROM `%smysql_databases` WHERE mysql_server_id = %d;",
            $this->table_prefix,
            mysqli_real_escape_string($this->link,$mysql_server_id));
        return $this->listQuery($query);
    }
	
	public function addMysqlServerDB($mysql_server_id, $home_id, $db_user, $db_passwd, $db_name, $enabled){
		$query = sprintf("INSERT INTO `%smysql_databases` (`mysql_server_id`, `home_id`, `db_user`, `db_passwd`, `db_name`, `enabled`)
            VALUES('%d','%d','%s','%s','%s','%d');",
                $this->table_prefix,
				mysqli_real_escape_string($this->link,$mysql_server_id),
                mysqli_real_escape_string($this->link,$home_id),
                mysqli_real_escape_string($this->link,$db_user),
				mysqli_real_escape_string($this->link,$db_passwd),
                mysqli_real_escape_string($this->link,$db_name),
				mysqli_real_escape_string($this->link,$enabled));
        ++$this->queries_;
        mysqli_query($this->link,$query);

        if( mysqli_errno($this->link) != 0 )
        {
            return false;
        }

        return mysqli_insert_id($this->link);
	}
	
	public function getMysqlDBbyId($db_id){
		$query = sprintf('SELECT * FROM `%1$smysql_databases` NATURAL JOIN `%1$smysql_servers` WHERE db_id = %2$d;',
            $this->table_prefix,
            mysqli_real_escape_string($this->link,$db_id));
		$db_info = $this->listQuery($query);
        return $db_info[0];
	}
	
	public function getMysqlDBsbyHomeId($home_id){
		$query = sprintf('SELECT * FROM `%1$smysql_databases` WHERE enabled = 1 AND home_id = %2$d;',
            $this->table_prefix,
            mysqli_real_escape_string($this->link,$home_id));
        return $this->listQuery($query);
	}
	
	public function getMysqlHomeDBbyId($home_id,$db_id){
		$query = sprintf('SELECT * FROM `%1$smysql_databases` NATURAL JOIN `%1$smysql_servers` WHERE home_id = %2$d AND db_id = %3$d;',
            $this->table_prefix,
			mysqli_real_escape_string($this->link,$home_id),
            mysqli_real_escape_string($this->link,$db_id));
		$db_info = $this->listQuery($query);
        return $db_info[0];
	}
	
	public function editMysqlServerDB($db_id, $home_id, $db_user, $db_passwd, $db_name, $enabled)
    {
        $query = sprintf("UPDATE `%smysql_databases` 
						 SET `home_id`='%d', `db_user`='%s', `db_passwd`='%s', `db_name`='%s',`enabled`='%d'
						 WHERE `db_id` = '%d';",
                $this->table_prefix,
                mysqli_real_escape_string($this->link,$home_id),
                mysqli_real_escape_string($this->link,$db_user),
				mysqli_real_escape_string($this->link,$db_passwd),
				mysqli_real_escape_string($this->link,$db_name),
				mysqli_real_escape_string($this->link,$enabled),
                mysqli_real_escape_string($this->link,$db_id) );

        ++$this->queries_;
        mysqli_query($this->link,$query);

        if( mysqli_errno($this->link) != 0 )
            return FALSE;

        return true;
    }
	
	public function removeMysqlServerDB($db_id)
	{
        $query = sprintf("DELETE FROM `%smysql_databases`
				  WHERE `db_id` = '%d'",
				  $this->table_prefix,
                  mysqli_real_escape_string($this->link,$db_id));

        ++$this->queries_;
        if ( mysqli_query($this->link,$query) === FALSE )
            return FALSE;

        return TRUE;
    }
	
	public function getGameHomesByRemoteServerId($remote_server_id){
        $query = sprintf('SELECT %1$sserver_homes.*,%1$sremote_servers.*, %1$sconfig_homes.game_name
            FROM `%1$sserver_homes` NATURAL JOIN `%1$sconfig_homes` NATURAL JOIN `%1$sremote_servers` WHERE remote_server_id=%2$s;',
            $this->table_prefix,
			mysqli_real_escape_string($this->link,$remote_server_id));
        return $this->listQuery($query);
	}
}
?>
