<script type="text/javascript" src="js/jquery/plugins/jquery.tablesorter.collapsible.js"></script>
<script type="text/javascript" src="js/jquery/plugins/jquery.tablesorter.mod.js"></script>
<script type="text/javascript" src="js/jquery/plugins/jquery.quicksearch.js"></script>
<script type="text/javascript" src="js/modules/administration.js"></script>
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
function exec_ogp_module() {
	global $db;
	echo "<h2>".get_lang('watch_logger')."</h2>";
	?>
	<table class="center">
	<tr>
	<td>
	<form>
		<b><?php print_lang('search'); ?>:</b>
		<input type="text" id="search">
	</form>
	</td>
	<td>
	<form method=POST>
		<input type="submit" name="empty_logger" value="<?php print_lang('empty_logger'); ?>" >
	</form>
	</td>
	</tr>
	</table>
	<table id="servermonitor" class="tablesorter"> 
	<thead> 
	<tr>
		<th style="width:16px;background-position: center;"></th> 
		<th><?php print_lang('when'); ?></th> 
		<th><?php print_lang('who'); ?></th> 
		<th><?php print_lang('where'); ?></th> 
		<th><?php print_lang('what'); ?></th> 
	</tr> 
	</thead> 
	<tbody> 
	<?php
	if( isset( $_POST['log_id'] ) )
		$db->del_logger_log($_POST['log_id']);
	if( isset( $_POST['empty_logger'] ) )
		$db->empty_logger();
	
	$p = isset($_GET['page']) ? $_GET['page'] : 1;
	$l = isset($_GET['limit']) ? $_GET['limit'] : 10;
	
	$logs = $db->read_logger($p,$l);
	
	if($logs)
	{
		foreach($logs as $log)
		{
			$user = $db->getUserById($log['user_id']);
			$when = $log['date'];
			$who = $user['users_login'];
			$where = $log['ip'];
			$what = $log['message'];
			$log_id = $log['log_id'];
			// Template
			echo "<tr class='maintr'>\n".
				 "<td class='collapsible'>\n".
				 "<center>\n".
				 "<form method=POST>\n".
				 "<input type='hidden' name='log_id' value='$log_id' />\n".
				 "<input type='image' name='remove_log' onclick=\"this.form.submit();\" src='modules/administration/images/remove.gif' />\n".
				 "</form>\n".
				 "</center>\n".
				 "</td>\n".
				 "<td class='collapsible'><span class='hidden' >$log_id</span><a></a>$when</td>\n".
				 "<td class='collapsible'><a></a>$who</td>\n".
				 "<td class='collapsible'><a></a>$where</td>\n".
				 "<td class='collapsible'><a></a>$what</td>\n".
				 "</tr>\n";
			
			echo "<tr class='expand-child'>\n".
				 "<td colspan='5' >\n".
				 "<table>\n";
				 
			$show_values = array( "users_login", "users_lang", "users_role", "users_email", "user_expires");
			foreach($user as $key => $value)
			{
				if( in_array( $key, $show_values ) )
					echo "<tr><td>".str_replace("_", "", substr($key,5))."</td><td>$value</td></tr>\n";
			}
			echo "</tr>\n".
				 "</td>\n".
				 "</table>\n";
		}
	}
	echo "</tbody>\n";
	echo "<tfoot style='border:1px solid grey;'></tfoot>\n";
	echo "</table>\n";
	$count_logs = $db->get_logger_count();
	if($count_logs > $l)
	{
		$total_pages = $count_logs[0]['total'] / $l;
		$pagination = "";
		for($page=1; $page <= $total_pages+1; $page++)
		{
			if($page == $p)
				$pagination .= " <b>$page</b>,";
			else
				$pagination .= " <a href='?m=administration&p=watch_logger&page=$page' >$page</a>,";
		}
		echo rtrim($pagination, ",");
	}
}
?>

