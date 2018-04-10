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

require_once('includes/lib_remote.php');
if ( function_exists('mysqli_connect') )
	require_once("modules/mysql/mysqli_database.php");
else
	require_once("modules/mysql/mysql_database.php");

function exec_ogp_module() {

	$modDb = new MySQLModuleDatabase();
	require("includes/config.inc.php");
	$modDb->connect($db_host,$db_user,$db_pass,$db_name,$table_prefix);
	
	global $view,$db;
	
    echo "<h2>".get_lang('add_new_mysql_host')."</h2>";
    	
	if(isset($_GET['add_mysql_server']))
	{
		foreach ($_GET as $name => $value)
		{
			$get[$name] = trim($value);
		}
		
        if ( empty($get['mysql_ip']) ){
            print_failure(get_lang('enter_mysql_ip'));
        }
			
        if ( !isPortValid($get['mysql_port']) ){
            print_failure(get_lang('enter_valid_port'));
        }
		
		if ( empty($get['mysql_root_passwd']) ){
            print_failure(get_lang('enter_mysql_root_password'));
        }
		
		if ( empty($get['mysql_name']) ){
            print_failure(get_lang('enter_mysql_name'));
        }
		
		
		if ($get['privilegies'] == "custom")
		{
			$priv = $get;
			$privilegies_str = "";
			unset($priv['m'],$priv['p'],$priv['remote_server_id'],$priv['mysql_ip'],$priv['mysql_port'],$priv['mysql_root_passwd'],$priv['mysql_name'],$priv['privilegies'],$priv['add_mysql_server']);
			foreach($priv as $name => $value)
			{
				$privilegies_str .= str_replace("_"," ",$name).", ";
			}
		}
		else
		{
			$privilegies_str = "ALL";
		}
		
		$privilegies_str = rtrim( $privilegies_str , ', ' );
		
		$mysql_server_id = $modDb->addMysqlServer($get['remote_server_id'],$get['mysql_name'],$get['mysql_ip'],$get['mysql_port'],$get['mysql_root_passwd'],$privilegies_str);
        if ( !$mysql_server_id )
        {
            print_failure(get_lang('could_not_add_mysql_server'));
            $view->refresh("?m=mysql&p=mysql_admin");
            return;
        }

        print_success(get_lang('server_added'));
		$view->refresh("?m=mysql&p=mysql_admin");
        return;
	}
	
	echo "<p>".get_lang('note_mysql_host')."</p>";
	
	$servers = $db->getRemoteServers();
	
	$conn_method[0] = get_lang('direct_connection');
	foreach ( $servers as $server_row )
    {
		$id = $server_row['remote_server_id'];
		$name = get_lang_f('connection_through_remote_server_named',$server_row['remote_server_name']);
		$conn_method[$id] = $name;
	}
    require_once("includes/form_table_class.php");

    $ft = new FormTable();
	$ft->start_form("", "GET");
    $ft->start_table();
	$ft->add_field_hidden('m', 'mysql');
	$ft->add_field_hidden('p', 'mysql_admin');
	$ft->add_custom_field('connection_method',
		create_drop_box_from_array($conn_method,"remote_server_id","0",false));
	$ft->add_field('string','mysql_name',isset($_GET['mysql_name']) ? $_GET['mysql_name'] : "");
    $ft->add_field('string','mysql_ip',isset($_GET['mysql_ip']) ? $_GET['mysql_ip'] : "localhost");
    $ft->add_field('string','mysql_port',isset($_GET['mysql_port']) ? $_GET['mysql_port'] : "3306");
	$ft->add_field('string','mysql_root_passwd',isset($_GET['mysql_root_passwd']) ? $_GET['mysql_root_passwd'] : "");
	$ft->add_custom_field('privilegies',
		create_drop_box_from_array(array('all' => get_lang('all'), 'custom' => get_lang('custom')),"privilegies",isset($_GET['privilegies']) ? $_GET['privilegies'] : "all",false));
	
	if(isset($_GET['privilegies']) and $_GET['privilegies'] == "custom")
	{
		$ft->add_custom_field('sql_alter','<input type="checkbox" name="ALTER" checked="checked" >');
		$ft->add_custom_field('sql_create','<input type="checkbox" name="CREATE" checked="checked" >');
		$ft->add_custom_field('sql_create_temporary_tables','<input type="checkbox" name="CREATE TEMPORARY TABLES" checked="checked" >');
		$ft->add_custom_field('sql_delete','<input type="checkbox" name="DELETE" checked="checked" >');
		$ft->add_custom_field('sql_drop','<input type="checkbox" name="DROP" checked="checked" >');
		$ft->add_custom_field('sql_index','<input type="checkbox" name="INDEX" checked="checked" >');
		$ft->add_custom_field('sql_insert','<input type="checkbox" name="INSERT" checked="checked" >');
		$ft->add_custom_field('sql_lock_tables','<input type="checkbox" name="LOCK TABLES" checked="checked" >');
		$ft->add_custom_field('sql_select','<input type="checkbox" name="SELECT" checked="checked" >');
		$ft->add_custom_field('sql_update','<input type="checkbox" name="UPDATE" checked="checked" >');
		$ft->add_custom_field('sql_grant_option','<input type="checkbox" name="GRANT OPTION" checked="checked" >');
	}
	$ft->end_table();
    $ft->add_button("submit","add_mysql_server",get_lang('add_mysql_server'));
    $ft->end_form();
	
	$mysql_servers = $modDb->getMysqlServers();
	
    if ( $mysql_servers === FALSE )
        return;
		
	$tr = 0;
	
	
	?><table id="servermonitor" class="tablesorter remote">
		<thead> 
		<tr> 
			<th colspan="4" class="sorter-false"><?php print_lang('configured_mysql_hosts'); ?></th> 
		</tr> 
		</thead> 
		<tbody> <?php
    foreach ( $mysql_servers as $mysql_server )
    {			
		
		if($mysql_server['remote_server_id'] != 0)
		{
			$remote_server = $db->getRemoteServer($mysql_server['remote_server_id']);
			$remote = new OGPRemoteLibrary($remote_server['agent_ip'],$remote_server['agent_port'],$remote_server['encryption_key'],$remote_server['timeout']);
			$host_stat = $remote->status_chk();
			if($host_stat === 0 )
			{
				$server_status = "<span class='failure'>".get_lang('offline')."</span> ";
			}
			elseif( $host_stat === 1)
			{
				$server_status = "<span class='success'>".get_lang('online')."</span>";
				$command = "mysql -h ".$mysql_server['mysql_ip']." -P ".$mysql_server['mysql_port']." -u root -p".$mysql_server['mysql_root_passwd'].' -e exit; echo $?';
				$test_mysql_conn = $remote->exec($command);
				
				if($test_mysql_conn == 0)
				{
					$server_status .= " / <span class='success'>".get_lang('mysql_online')."</span>";
				}
				else
				{
					$server_status .= "/<span class='failure'>".get_lang('mysql_offline')."</span>";
				}
			}
			elseif( $host_stat === -1 )
			{
				$server_status = "<span class='failure'>".get_lang('encryption_key_mismatch')."</span>\n";
			}
			else
			{
				$server_status = "<span class='failure'>".get_lang('unknown_error').": $host_stat</span>\n";
			}
			
		}
		else
		{
			if( function_exists('mysqli_connect') )
			{
				@$link = mysqli_connect($mysql_server['mysql_ip'], 'root', $mysql_server['mysql_root_passwd'], "", $mysql_server['mysql_port']);

				if ( $link === FALSE )
				{
					$server_status = "<span class='failure'>".get_lang('mysql_offline')."</span>";
				}
				else
				{
					$server_status = "<span class='success'>".get_lang('mysql_online')."</span>";
					mysqli_close($link);
				}
			}
			else
			{
				@$link = mysql_connect($mysql_server['mysql_ip'].':'.$mysql_server['mysql_port'], 'root', $mysql_server['mysql_root_passwd']);

				if ( $link === FALSE )
				{
					$server_status = "<span class='failure'>".get_lang('mysql_offline')."</span>";
				}
				else
				{
					$server_status = "<span class='success'>".get_lang('mysql_online')."</span>";
					mysql_close($link);
				}
			}
		}
		
		$databases = "";
		$mysql_server_dbs = $modDb->getMysqlServerDBs($mysql_server['mysql_server_id']);
        if ( !empty($mysql_server_dbs) )
        {
			foreach ( $mysql_server_dbs as $mysql_db )
			{
				$databases .= $mysql_db['db_name']."<a href='?m=mysql&p=edit&mysql_server_id=".$mysql_server['mysql_server_id'].
							  "&assign=true&db_id=".$mysql_db['db_id']."&edit_db_settings'>[".get_lang('edit')."]</a>\n".
							  "<a href='?m=mysql&p=edit&mysql_server_id=".$mysql_server['mysql_server_id'].
							  "&assign=true&db_id=".$mysql_db['db_id']."&remove_db'>[".get_lang('remove')."]</a>\n".
							  "<br>";
			}
		}
		
		$conection_type = $mysql_server['remote_server_id'] == 0 ? 
						  get_lang('direct_connection') : 
						  get_lang_f('connection_through_remote_server_named',$remote_server['remote_server_name']);
		
		$buttons = "<a href='?m=mysql&amp;p=edit&amp;mysql_server_id=".
					$mysql_server['mysql_server_id']."&amp;delete'>[".get_lang('remove')."]</a>\n".
					"<a href='?m=mysql&amp;p=edit&amp;mysql_server_id=".$mysql_server['mysql_server_id'].
					"&amp;edit'>[".get_lang('edit')."]</a>\n".
					"<a href='?m=mysql&amp;p=edit&amp;mysql_server_id=".$mysql_server['mysql_server_id'].
					"&amp;assign'>[".get_lang('assign_db')."]</a>\n";

		$tittle = "<b>ID#:</b>  <b style='color:red;'>".$mysql_server['mysql_server_id']."</b></td>
					<td class='collapsible' ><b>".get_lang('mysql_server_name').":</b> ".$mysql_server['mysql_name']."</td>
					<td class='collapsible' ><b>".get_lang('server_status').": </b>$server_status</td>";
		
		$data = "<tr class='expand-child' >
				   <td>
					<b>".get_lang('mysql_ip_port').":</b> ".$mysql_server['mysql_ip'].":".$mysql_server['mysql_port']."<br />
					<b>".get_lang('mysql_root_passwd').":</b> ".$mysql_server['mysql_root_passwd']."<br />
					<b>".get_lang('connection_method').":</b> ".$conection_type."<br />
					<b>".get_lang('user_privilegies').":</b> ".$mysql_server['privilegies_str']."<br />
				   </td>
				   <td>
				    <b>".get_lang('current_dbs').":</b><br />".$databases.
				   "</td>
				   <td>
				    $buttons
				   </td>
				 </tr>";
		// Template
		$first = "<tr class='maintr'><td class='collapsible' >$tittle</td></tr>";
		$second = $data;
		//Echo them all
		echo "$first$second";
    }
	echo "</tbody>";	
	echo "</table>\n";
?>
<script type="text/javascript">
$(document).ready(function(){ 
	$("#servermonitor")
		.collapsible("td.collapsible", {collapse: true});
});
</script>
<?php
	unset($modDb);
}
