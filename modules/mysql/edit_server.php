<script type="text/javascript">
$(document).ready(function(){ 
	$( "#privilegies" ).change(function() {
		this.form.submit();
	});
	$( "#remote_server_id" ).change(function() {
		if( $(this).val() != "0" )
		{
			$( "input#mysql_ip" ).val('localhost').prop('readonly', true);
		}
		else
		{
			$( "input#mysql_ip" ).prop('readonly', false);
		}
	});
	if( $( "#remote_server_id" ).val() != "0" )
	{
		$( "input#mysql_ip" ).prop('readonly', true);
	}
}); 
</script>
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

require_once('includes/form_table_class.php');
require_once('includes/lib_remote.php');
if ( function_exists('mysqli_connect') )
	require_once("modules/mysql/mysqli_database.php");
else
	require_once("modules/mysql/mysql_database.php");

function exec_ogp_module() {

	$modDb = new MySQLModuleDatabase();
	require("includes/config.inc.php");
	$modDb->connect($db_host,$db_user,$db_pass,$db_name,$table_prefix);
	
    global $view, $db;

    $mysql_server_id = @$_REQUEST['mysql_server_id'];
    $mysql_server = $modDb->getMysqlServer($mysql_server_id);
	
	if($mysql_server['remote_server_id'] == "0")
		$server_homes = $db->getGameHomes();
	else
		$server_homes = $modDb->getGameHomesByRemoteServerId($mysql_server['remote_server_id']);
		
	$homes_array[0] = get_lang('select_game_server');
	
	foreach($server_homes as $server_home)
	{
		$homes_array["$server_home[home_id]"] = "(ID ".$server_home['home_id'].") ".$server_home['home_name'];
	}
	
    if ( $mysql_server === FALSE )
    {
        print_failure(get_lang_f('invalid_mysql_server_id',$mysql_server_id));
        $view->refresh("?m=mysql&p=mysql_admin");
        return;
    }

	if ( isset($_REQUEST['add_db']) )
    {
		$home_id = $_POST['home_id'];
		$db_user = trim($_POST['db_user']);
		$db_passwd = trim($_POST['db_passwd']);
		$db_name = trim($_POST['db_name']);
		$enabled = $_POST['enabled'];
		
		if ( empty($db_user) ){
            print_failure(get_lang('enter_db_user'));
        }
		elseif ( empty($db_passwd) ){
            print_failure(get_lang('enter_db_password'));
        }
		elseif ( empty($db_name) ){
            print_failure(get_lang('enter_db_name'));
        }
		elseif ( $home_id == 0 ){
            print_failure(get_lang('select_game_server'));
        }
		else
		{       
			$db_id = $modDb->addMysqlServerDB($mysql_server_id, $home_id, $db_user, $db_passwd, $db_name, $enabled);
			if(!$db_id)
			{
				print_failure(get_lang_f('there_is_another_db_named_or_user_named',$db_name,$db_user));
			}
			else
			{
				$mysql_db = $modDb->getMysqlDBbyId($db_id);	
				
				if(!$mysql_db)
					return;
					
				if($mysql_db['remote_server_id'] != "0")
				{
					$remote_server = $db->getRemoteServer($mysql_db['remote_server_id']);
					$remote = new OGPRemoteLibrary($remote_server['agent_ip'],$remote_server['agent_port'],$remote_server['encryption_key'],$remote_server['timeout']);
					$host_stat = $remote->status_chk();
					if($host_stat === 1 )
					{
						$command = "mysql -h localhost -P ".$mysql_db['mysql_port']." -u root -p".$mysql_db['mysql_root_passwd'].' -e exit; echo $?';
						$test_mysql_conn = $remote->exec($command);

						if($test_mysql_conn == 0)
						{
							$SQL = "CREATE DATABASE IF NOT EXISTS \\`".$mysql_db['db_name']."\\`;".
								   "GRANT ".$mysql_db['privilegies_str']." ON \\`".$mysql_db['db_name']."\\`.* TO '".$mysql_db['db_user']."'@'%' IDENTIFIED BY '".$mysql_db['db_passwd']."';".
								   "FLUSH PRIVILEGES;";
							
							$command = "mysql --host=localhost --port=".$mysql_db['mysql_port']." -uroot -p".$mysql_db['mysql_root_passwd']." -e \"".$SQL."\"";
							$result = $remote->exec($command);
						}
					}
				}
				else
				{
					if( function_exists('mysqli_connect') )
					{
						@$link = mysqli_connect($mysql_db['mysql_ip'], $mysql_db['db_user'], $mysql_db['db_passwd'], $mysql_db['db_name'], $mysql_db['mysql_port']);
						
						if ( $link === FALSE )
						{
							@$link = mysqli_connect($mysql_db['mysql_ip'], 'root', $mysql_db['mysql_root_passwd'], "", $mysql_db['mysql_port']);

							if ( $link !== FALSE )
							{
								$queries = array("CREATE DATABASE IF NOT EXISTS `".$mysql_db['db_name']."`;",
												 "GRANT ".$mysql_db['privilegies_str']." ON `".$mysql_db['db_name']."`.* TO '".$mysql_db['db_user']."'@'%' IDENTIFIED BY '".$mysql_db['db_passwd']."';",
												 "FLUSH PRIVILEGES;");
								foreach( $queries as $query )
								{
									@$return = mysqli_query($link, $query);
									if(!$return)
									{
										break;
									}
								}
								
								mysqli_close($link);
							}
						}
					}
					else
					{
						@$link = mysql_connect($mysql_db['mysql_ip'].':'.$mysql_db['mysql_port'], $mysql_db['db_user'], $mysql_db['db_passwd']);
						
						if ( $link === FALSE )
						{
							@$link = mysql_connect($mysql_db['mysql_ip'].':'.$mysql_db['mysql_port'], 'root', $mysql_db['mysql_root_passwd']);

							if ( $link !== FALSE )
							{
								$queries = array("CREATE DATABASE IF NOT EXISTS `".$mysql_db['db_name']."`;",
												 "GRANT ".$mysql_db['privilegies_str']." ON `".$mysql_db['db_name']."`.* TO '".$mysql_db['db_user']."'@'%' IDENTIFIED BY '".$mysql_db['db_passwd']."';",
												 "FLUSH PRIVILEGES;");
								foreach( $queries as $query )
								{
									@$return = mysql_query($query);
									if(!$return)
									{
										break;
									}
								}
								
								mysql_close($link);
							}
						}
					}
				}
				print_success(get_lang_f('db_added_for_home_id',$_POST['home_id']));
			}
		}
		$view->refresh("?m=mysql&p=mysql_admin&amp;p=edit&amp;mysql_server_id=".$mysql_server_id."&amp;assign",5);
    }
	
    else if ( isset($_REQUEST['remove_db']) )
    {
		$db_id = $_REQUEST['db_id'];
		$mysql_db = $modDb->getMysqlDBbyId($db_id);
		if($mysql_db['remote_server_id'] != "0")
		{
			$remote_server = $db->getRemoteServer($mysql_db['remote_server_id']);
			$remote = new OGPRemoteLibrary($remote_server['agent_ip'],$remote_server['agent_port'],$remote_server['encryption_key'],$remote_server['timeout']);
			$host_stat = $remote->status_chk();
			if($host_stat === 1 )
			{
				$remote->exec('mysql --host=localhost --port='.$mysql_db['mysql_port'].' -uroot -p'.$mysql_db['mysql_root_passwd'].
							  ' -e "DROP DATABASE '.$mysql_db['db_name'].";DROP USER '".$mysql_db['db_user']."'@'%';\"");
			}
		}
		else
		{
			if( function_exists('mysqli_connect') )
			{
				@$link = mysqli_connect($mysql_db['mysql_ip'], 'root', $mysql_db['mysql_root_passwd'], "", $mysql_db['mysql_port']);
				
				if ( $link !== FALSE )
				{
					$queries = array("DROP DATABASE ".$mysql_db['db_name'].";",
									 "DROP USER '".$mysql_db['db_user']."'@'%';");
					foreach( $queries as $query )
					{
						@$return = mysqli_query($link, $query);
						if(!$return)
							break;
					}
					mysqli_close($link);
					$modDb->connect($db_host,$db_user,$db_pass,$db_name,$table_prefix);
				}
			}
			else
			{
				@$link = mysql_connect($mysql_db['mysql_ip'].':'.$mysql_db['mysql_port'], 'root', $mysql_db['mysql_root_passwd']);
				
				if ( $link !== FALSE )
				{
					$queries = array("DROP DATABASE ".$mysql_db['db_name'].";",
									 "DROP USER '".$mysql_db['db_user']."'@'%';");
					foreach( $queries as $query )
					{
						@$return = mysql_query($query);
						if(!$return)
							break;
					}
					mysql_close($link);
					$modDb->connect($db_host,$db_user,$db_pass,$db_name,$table_prefix);
				}
			}
		}
		
        if ( $modDb->removeMysqlServerDB($db_id) === FALSE )
		{
            print_failure(get_lang('could_not_remove_db'));
		}
		else
		{
			print_success(get_lang_f('db_removed_successfully_from_mysql_server_named',$mysql_db['mysql_name']));
		}
		$view->refresh("?m=mysql&p=mysql_admin&amp;p=edit&amp;mysql_server_id=".$mysql_server_id."&amp;assign");
    }
	
	else if ( isset($_POST['save_db_changes']) )
    {
		$db_id = $_POST['db_id'];
        $home_id = $_POST['home_id'];
		$post_db_user = trim($_POST['db_user']);
		$post_db_passwd = trim($_POST['db_passwd']);
		$post_db_name = trim($_POST['db_name']);
		$enabled = $_POST['enabled'];
		
		if ( empty($post_db_passwd) ){
            print_failure(get_lang('enter_db_password'));
        }
		elseif ( $home_id == 0 ){
            print_failure(get_lang('select_game_server'));
        }
		else
		{
			$mysql_db = $modDb->getMysqlDBbyId($db_id);
			
			if($post_db_passwd != $mysql_db['db_passwd'])
			{
				if($mysql_db['remote_server_id'] != "0")
				{
					$remote_server = $db->getRemoteServer($mysql_db['remote_server_id']);
					$remote = new OGPRemoteLibrary($remote_server['agent_ip'],$remote_server['agent_port'],$remote_server['encryption_key'],$remote_server['timeout']);
					$host_stat = $remote->status_chk();
					if($host_stat === 1 )
					{
						$SQL = "DROP USER '".$mysql_db['db_user']."'@'%';".
							   "GRANT ".$mysql_db['privilegies_str']." ON \\`".$mysql_db['db_name']."\\`.* TO '".$mysql_db['db_user']."'@'%' IDENTIFIED BY '".$post_db_passwd."';".
							   "FLUSH PRIVILEGES;";
							
						$command = "mysql --host=localhost --port=".$mysql_db['mysql_port']." -uroot -p".$mysql_db['mysql_root_passwd']." -e \"".$SQL."\"";
						$remote->exec($command);
					}
				}
				else
				{
					if( function_exists('mysqli_connect') )
					{
						@$link = mysqli_connect($mysql_db['mysql_ip'], 'root', $mysql_db['mysql_root_passwd'], "", $mysql_db['mysql_port']);
						
						if ( $link !== FALSE )
						{
							$queries = array("DROP USER '".$mysql_db['db_user']."'@'%';",
											 "GRANT ".$mysql_db['privilegies_str']." ON `".$mysql_db['db_name']."`.* TO '".$mysql_db['db_user']."'@'%' IDENTIFIED BY '".$post_db_passwd."';",
											 "FLUSH PRIVILEGES;");
							foreach( $queries as $query )
							{
								@$return = mysqli_query($link, $query);
								if(!$return)
									break;
							}
							mysqli_close($link);
							$modDb->connect($db_host,$db_user,$db_pass,$db_name,$table_prefix);
						}
					}
					else
					{
						@$link = mysql_connect($mysql_db['mysql_ip'].':'.$mysql_db['mysql_port'], 'root', $mysql_db['mysql_root_passwd']);
						
						if ( $link !== FALSE )
						{
							$queries = array("DROP USER '".$mysql_db['db_user']."'@'%';",
											 "GRANT ".$mysql_db['privilegies_str']." ON `".$mysql_db['db_name']."`.* TO '".$mysql_db['db_user']."'@'%' IDENTIFIED BY '".$post_db_passwd."';",
											 "FLUSH PRIVILEGES;");
							foreach( $queries as $query )
							{
								@$return = mysql_query($query);
								if(!$return)
									break;
							}
							mysql_close($link);
							$modDb->connect($db_host,$db_user,$db_pass,$db_name,$table_prefix);
						}
					}
				}
			}
			
			if($enabled != $mysql_db['enabled'] )
			{
				if($mysql_db['remote_server_id'] != "0")
				{
					$remote_server = $db->getRemoteServer($mysql_db['remote_server_id']);
					$remote = new OGPRemoteLibrary($remote_server['agent_ip'],$remote_server['agent_port'],$remote_server['encryption_key'],$remote_server['timeout']);
					$host_stat = $remote->status_chk();
					if($host_stat === 1 )
					{
						if($enabled == "0")
							$SQL = "DROP USER '".$mysql_db['db_user']."'@'%';".
								   "FLUSH PRIVILEGES;";
						else
							$SQL = "GRANT ".$mysql_db['privilegies_str']." ON \\`".$mysql_db['db_name']."\\`.* TO '".$mysql_db['db_user']."'@'%' IDENTIFIED BY '".$post_db_passwd."';".
								   "FLUSH PRIVILEGES;";
							
						$command = "mysql --host=localhost --port=".$mysql_db['mysql_port']." -uroot -p".$mysql_db['mysql_root_passwd']." -e \"".$SQL."\"";
						$remote->exec($command);
					}
				}
				else
				{
					if( function_exists('mysqli_connect') )
					{
						@$link = mysqli_connect($mysql_db['mysql_ip'], 'root', $mysql_db['mysql_root_passwd'], "", $mysql_db['mysql_port']);
						
						if ( $link !== FALSE )
						{
							if($enabled == "0")
								$queries = array("DROP USER '".$mysql_db['db_user']."'@'%';",
												 "FLUSH PRIVILEGES;");
							else
								$queries = array("GRANT ".$mysql_db['privilegies_str']." ON `".$mysql_db['db_name']."`.* TO '".$mysql_db['db_user']."'@'%' IDENTIFIED BY '".$post_db_passwd."';",
												 "FLUSH PRIVILEGES;");
												 
							foreach( $queries as $query )
							{
								@$return = mysqli_query($link, $query);
								if(!$return)
									break;
							}
							mysqli_close($link);
							$modDb->connect($db_host,$db_user,$db_pass,$db_name,$table_prefix);
						}
					}
					else
					{
						@$link = mysql_connect($mysql_db['mysql_ip'].':'.$mysql_db['mysql_port'], 'root', $mysql_db['mysql_root_passwd']);
						
						if ( $link !== FALSE )
						{
							if($enabled == "0")
								$queries = array("DROP USER '".$mysql_db['db_user']."'@'%';",
												 "FLUSH PRIVILEGES;");
							else
								$queries = array("GRANT ".$mysql_db['privilegies_str']." ON `".$mysql_db['db_name']."`.* TO '".$mysql_db['db_user']."'@'%' IDENTIFIED BY '".$post_db_passwd."';",
												 "FLUSH PRIVILEGES;");
												 
							foreach( $queries as $query )
							{
								@$return = mysql_query($query);
								if(!$return)
									break;
							}
							mysql_close($link);
							$modDb->connect($db_host,$db_user,$db_pass,$db_name,$table_prefix);
						}
					}
				}
			}
									
			if ( $modDb->editMysqlServerDB($db_id, $home_id, $post_db_user, $post_db_passwd, $post_db_name, $enabled) === FALSE )
			{       
				print_failure(get_lang('could_not_be_changed'));
			}
			else
			{
				print_success(get_lang_f('db_changed_successfully',$post_db_name));
			}
		}
		$view->refresh("?m=mysql&p=mysql_admin&amp;p=edit&amp;mysql_server_id=".$mysql_server_id."&amp;assign");
    }

    else if ( isset($_REQUEST['delete']) )
    {
        if ( !isset($_REQUEST['y'] ) )
        {
            echo "<p>".get_lang_f('areyousure_remove_mysql_server',$mysql_server['mysql_name'])."</p>
                <p><a href='?m=mysql&p=mysql_admin&amp;p=edit&amp;mysql_server_id=".$mysql_server_id."&amp;delete&amp;y=y'>".
                get_lang('yes')."</a> <a href='?m=mysql&p=mysql_admin'>".
                get_lang('no')."</a></p>";
            return;
        }
        else
		{
            $mysql_dbs = $modDb->getMysqlServerDBs($mysql_server_id);
			if(!empty($mysql_dbs))
			{
				foreach($mysql_dbs as $mysql_db)
				{		
					if($mysql_server['remote_server_id'] != "0")
					{
						$remote_server = $db->getRemoteServer($mysql_server['remote_server_id']);
						$remote = new OGPRemoteLibrary($remote_server['agent_ip'],$remote_server['agent_port'],$remote_server['encryption_key'],$remote_server['timeout']);
						$host_stat = $remote->status_chk();
						if($host_stat === 1 )
						{
							$remote->exec('mysql --host=localhost --port='.$mysql_server['mysql_port'].' -uroot -p'.$mysql_server['mysql_root_passwd'].
										  ' -e "DROP DATABASE '.$mysql_db['db_name'].";DROP USER '".$mysql_db['db_user']."'@'%';\"");
						}
					}
					else
					{
						if( function_exists('mysqli_connect') )
						{
							@$link = mysqli_connect($mysql_server['mysql_ip'], 'root', $mysql_server['mysql_root_passwd'], "", $mysql_server['mysql_port']);
							
							if ( $link !== FALSE )
							{
								$queries = array("DROP DATABASE ".$mysql_db['db_name'].";",
												 "DROP USER '".$mysql_db['db_user']."'@'%';");
								foreach( $queries as $query )
								{
									@$return = mysqli_query($query);
									if(!$return)
										break;
								}
								mysqli_close($link);
							}
						}
						else
						{
							@$link = mysql_connect($mysql_server['mysql_ip'].':'.$mysql_server['mysql_port'], 'root', $mysql_server['mysql_root_passwd']);
							
							if ( $link !== FALSE )
							{
								$queries = array("DROP DATABASE ".$mysql_db['db_name'].";",
												 "DROP USER '".$mysql_db['db_user']."'@'%';");
								foreach( $queries as $query )
								{
									@$return = mysql_query($query);
									if(!$return)
										break;
								}
								mysql_close($link);
							}
						}
					}
				}
			}
			
			if ( $modDb->removeMysqlServer($mysql_server_id) === FALSE )
				print_failure(get_lang('error_while_remove'));
			else	
				print_success(get_lang_f('mysql_server_removed',$mysql_server['mysql_name']));
		}

        $view->refresh("?m=mysql&p=mysql_admin");
        return;
    }
	
    else if ( isset($_POST['save_settings']) )
    {
        foreach ($_POST as $name => $value)
		{
			$get[$name] = trim($value);
		}
		
        if ( empty($get['mysql_ip']) ){
            print_failure(get_lang('enter_mysql_ip'));
        }
		elseif ( !isPortValid($get['mysql_port']) ){
            print_failure(get_lang('enter_valid_port'));
        }
		elseif ( empty($get['mysql_root_passwd']) ){
            print_failure(get_lang('enter_mysql_root_password'));
        }
		elseif ( empty($get['mysql_name']) ){
            print_failure(get_lang('enter_mysql_name'));
        }
		elseif(!$modDb->editMysqlServer($mysql_server_id,$get['remote_server_id'],$get['mysql_name'],$get['mysql_ip'],$get['mysql_port'],$get['mysql_root_passwd'],$mysql_server['privilegies_str']))
			print_failure(get_lang_f('unable_to_set_changes_to',$mysql_server['mysql_name']));
		else
			print_success(get_lang_f('mysql_server_settings_changed',$mysql_server['mysql_name']));
			
        $view->refresh("?m=mysql&p=mysql_admin&amp;p=edit&amp;mysql_server_id=".$mysql_server_id."&amp;edit",5);
    }
	
    elseif ( isset($_GET['edit']) )
    {
		echo "<h2>".get_lang_f('editing_mysql_server',$mysql_server['mysql_name'])."</h2>";
		$mysql_server = $modDb->getMysqlServer($mysql_server_id);
        
		$servers = $db->getRemoteServers();
		
		$conn_method[0] = get_lang('direct_connection');
		foreach ( $servers as $server_row )
		{
			$id = $server_row['remote_server_id'];
			$name = get_lang_f('connection_through_remote_server_named',$server_row['remote_server_name']);
			$conn_method[$id] = $name;
		}
		
        $ft = new FormTable();
        $ft->start_form('?m=mysql&amp;p=edit&amp;mysql_server_id='.$mysql_server_id.'&amp;edit');
		$ft->start_table();
		$ft->add_custom_field('connection_method',
			create_drop_box_from_array($conn_method,"remote_server_id",$mysql_server['remote_server_id'],false));
		$ft->add_field('string','mysql_name',$mysql_server['mysql_name']);
		$ft->add_field('string','mysql_ip',$mysql_server['mysql_ip']);
		$ft->add_field('string','mysql_port',$mysql_server['mysql_port']);
		$ft->add_field('string','mysql_root_passwd',$mysql_server['mysql_root_passwd']);
		$ft->end_table();
		$ft->add_button("submit","save_settings",get_lang('save_settings'));
		$ft->end_form();
        echo create_back_button('mysql','mysql_admin');
	}
	
	elseif ( isset($_GET['assign']) )
	{
        echo "<h2>".get_lang_f('mysql_dbs_for',$mysql_server['mysql_name'])."</h2>";
		
        $mysql_server_dbs = $modDb->getMysqlServerDBs($mysql_server['mysql_server_id']);
        if ( !empty($mysql_server_dbs) )
        {
			echo "<h4>".get_lang('edit_dbs')."</h4>";

			foreach ( $mysql_server_dbs as $mysql_db )
			{
				$home_info = $db->getGameHomeWithoutMods($mysql_db['home_id']);
				$db_array["$mysql_db[db_id]"] = $mysql_db['db_name']." (".$home_info['home_name'].")";
			}
			
			$ft = new FormTable();
			$ft->start_form('','GET');
			$ft->add_field_hidden('m', 'mysql');
			$ft->add_field_hidden('p', 'edit');
			$ft->add_field_hidden('mysql_server_id', $mysql_server_id);
			$ft->add_field_hidden('assign', 'true');
			$ft->start_table();
			$ft->add_custom_field('select_db',
				create_drop_box_from_array($db_array,"db_id",isset($_GET['db_id'])?$_GET['db_id']:"",false));
			$ft->end_table();
			$ft->add_button('submit','edit_db_settings',get_lang('edit_db_settings'));
			$ft->add_button('submit','remove_db',get_lang('remove_db'));
			$ft->end_form();

			if(isset($_GET['edit_db_settings']))
			{
				$mysql_db = $modDb->getMysqlDBbyId($_GET['db_id']);
				$ft = new FormTable();
				$ft->start_form('');
				$ft->add_field_hidden('db_id',$mysql_db['db_id']);
				$ft->start_table();
				$ft->add_custom_field('game_server',
					create_drop_box_from_array($homes_array,"home_id",$mysql_db['home_id'],false));
				$ft->add_field('string','db_user',$mysql_db['db_user'],"50","readonly");
				$ft->add_field('string','db_passwd',$mysql_db['db_passwd']);
				$ft->add_field('string','db_name',$mysql_db['db_name'],"50","readonly");
				$ft->add_field('on_off','enabled',$mysql_db['enabled']);
				$ft->end_table();
				$ft->add_button('submit','save_db_changes',get_lang('save_db_changes'));
				$ft->end_form();
			}
        }
 
		echo "<h4>".get_lang('add_db')."</h4>";
		
        $ft = new FormTable();
        $ft->start_form('');
        $ft->start_table();
		$ft->add_custom_field('game_server',
			create_drop_box_from_array($homes_array,"home_id","0",false));
		$ft->add_field('string','db_user','');
		$ft->add_field('string','db_passwd',genRandomString('10'));
		$ft->add_field('string','db_name','');
		$ft->add_field('on_off','enabled','1');
        $ft->end_table();
        $ft->add_button('submit','add_db',get_lang('add_db'));
        $ft->end_form();
		
		echo create_back_button('mysql','mysql_admin');
    }
	
    else
    {
        print_failure("Invalid url.");
        $view->refresh("?m=mysql&p=mysql_admin");
    }
}
?>
