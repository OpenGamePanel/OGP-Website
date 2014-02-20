<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){ 
	$( "#db_id" ).change(function() {
		this.form.submit();
	});
}); 
</script>
<style>
.database{
	margin:5%;
	width:90%;
	float:middle;
}
.database td{
	width:50%;
	vertical-align:top;
}
.database pre{
	width:100%;
	height:100%;
	float:left;
}
.bloc{
	cursor:default;
}
.bloc h4{
	cursor:default;
	position:relative;
	top:-3px;
}
.database_info{
	width:100%;
	margin:30px;
}
.database_info td{
	border:1px solid transparent;
}

.database xmp{
	text-align:left;
}
</style>
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

require_once('includes/form_table_class.php');
require_once('includes/lib_remote.php');
require_once("modules/mysql/mysql_database.php");

function exec_ogp_module() {

	$modDb = new MySQLModuleDatabase();
	require("includes/config.inc.php");
	$modDb->connect($db_host,$db_user,$db_pass,$db_name,$table_prefix);
	
	global $view,$db;
	
	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );

	if( $isAdmin )
		$game_home = $db->getGameHome($_GET['home_id']);
	else
		$game_home = $db->getUserGameHome($_SESSION['user_id'],$_GET['home_id']);
	if ( ! $game_home and ! $isAdmin )
		return;
	
	echo "<h2>".get_lang_f('mysql_dbs_for',$game_home['home_name'])."</h2>";
	
	$home_dbs = $modDb->getMysqlDBsbyHomeId($game_home['home_id']);
	
	if(empty($home_dbs))
	{
		print_failure(get_lang_f('there_are_no_databases_assigned_for',$game_home['home_name']));
		return;
	}

	$db_array["0"] = get_lang('select_db');
	foreach ( $home_dbs as $home_db )
	{
		$db_array["$home_db[db_id]"] = $home_db['db_name'];
	}
		
	$ft = new FormTable();
	$ft->start_form('');
	$ft->start_table();
	$ft->add_custom_field('select_db',
		create_drop_box_from_array($db_array,"db_id",isset($_REQUEST['db_id'])?$_REQUEST['db_id']:"0",false));
	$ft->end_table();
	$ft->end_form();
	
	$database_exists = FALSE;
	$server_online = FALSE;
	if(isset($_REQUEST['db_id']) AND $_REQUEST['db_id'] != "0")
	{
		$db_id = $_REQUEST['db_id'];
		$mysql_db = $modDb->getMysqlHomeDBbyId($game_home['home_id'],$db_id);
		
		if(!$mysql_db)
			return;
			
		if($mysql_db['remote_server_id'] != "0")
		{
			$remote_server = $db->getRemoteServer($mysql_db['remote_server_id']);
			$remote = new OGPRemoteLibrary($remote_server['agent_ip'],$remote_server['agent_port'],$remote_server['encryption_key']);
			$host_stat = $remote->status_chk();
			if($host_stat === 1 )
			{
				$command = "mysql -h localhost -P ".$mysql_db['mysql_port']." -u root -p".$mysql_db['mysql_root_passwd'].' -e exit; echo $?';
				$test_mysql_conn = $remote->exec($command);

				if($test_mysql_conn == 0)
				{
					$user_db = $remote->exec('mysqlshow --user='.$mysql_db['db_user'].' --password='.$mysql_db['db_passwd'].' '.$mysql_db['db_name']);

					if($user_db != "")
						$database_exists = TRUE;

					$server_online = TRUE;
				}
			}
		}
		else
		{
			@$link = mysql_connect($mysql_db['mysql_ip'].':'.$mysql_db['mysql_port'], $mysql_db['db_user'], $mysql_db['db_passwd']);
			
			if ( $link !== FALSE )
			{
				$server_online = TRUE;			
				if ( mysql_select_db($mysql_db['db_name'],$link) !== FALSE )
				{		
					$databases = mysql_query("SHOW TABLES;");
				
					$user_db = "Database: ".$mysql_db['db_name']."\nTables:\n";

					while ( $table = mysql_fetch_array($databases) ) {
						$user_db .= $table[0] . "\n";
					}
					$database_exists = TRUE;
				}
			}
		}
		
		if(isset($_POST['restore']))
		{
			$command = 'mysql --host='.$mysql_db['mysql_ip'].' --port='.$mysql_db['mysql_port'].' --user='.$mysql_db['db_user'].
				   ' --password='.$mysql_db['db_passwd'].' '.$mysql_db['db_name'].' < ' . $_FILES["file"]["tmp_name"];
		
			if($mysql_db['remote_server_id'] != "0")
			{
				$remote->exec($command,$output);
			}
			else
			{
				system($command);
			}
			$view->refresh('?m=mysql&p=user_db&home_id='.$game_home['home_id'].'&db_id='.$db_id,0);
		}
		
		if($server_online and $database_exists)
		{
			echo "<table class='database' ><tr><td>\n<div class='dragbox bloc rounded' ><h4>".get_lang('db_info')."</h4>\n".
				 "<table class='database_info' ><tr>".
				 "<td><b>".get_lang('mysql_ip')." :</b></td><td>".$mysql_db['mysql_ip']."</td></tr>\n".
				 "<td><b>".get_lang('mysql_port')." :</b></td><td>".$mysql_db['mysql_port']."</td></tr>\n".
				 "<td><b>".get_lang('db_name')." :</b></td><td>".$mysql_db['db_name']."</td></tr>\n".
				 "<td><b>".get_lang('db_user')." :</b></td><td>".$mysql_db['db_user']."</td></tr>\n".
				 "<td><b>".get_lang('db_passwd')." :</b></td><td>".$mysql_db['db_passwd']."</td></tr>\n".
				 "<td><b>".get_lang('privilegies')." :</b></td><td>".$mysql_db['privilegies_str']."</td></tr></table></div>\n".
				 "<td><div class='dragbox bloc rounded' style='background:black;' ><h4>".get_lang('db_tables')."</h4>".
				 "<pre><xmp>".$user_db."</xmp></pre></div></td></tr></table>";
				 
			echo "<h2>".get_lang('db_backup')."</h2>";
			
			?>
			<table class='administration-table'>
			 <tr>
			  <td>
			  <form method="POST" action="?m=mysql&p=get_dump&home_id=<?php echo $game_home['home_id']; ?>&db_id=<?php echo $db_id; ?>&type=cleared" >
			   <button name="download"><?php print_lang('download_db_backup'); ?></button>
			  </form>
			  <br>
			  <form method="POST" action="?m=mysql&p=user_db&home_id=<?php echo $game_home['home_id']; ?>&db_id=<?php echo $db_id; ?>" enctype="multipart/form-data">
			   <label for="file"><?php print_lang('sql_file'); ?>:</label>
			   <input type="file" name="file" id="file" />
			   <button name="restore"><?php print_lang('restore_db_backup'); ?></button>
			  </form>
			  </td>
			 </tr>
			</table>
			<?php
		}
	}
}