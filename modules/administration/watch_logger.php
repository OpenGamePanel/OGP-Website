<script type="text/javascript" src="js/modules/administration.js"></script>
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

function exec_ogp_module() {
	global $db, $view, $loggedInUserInfo;

	$search_field = (isset($_GET['search']) && !empty($_GET['search'])) ? $_GET['search'] : false;
	$p = (isset($_GET['page']) && (int)$_GET['page'] > 0) ? (int)$_GET['page'] : 1;
	$l = (isset($_GET['limit']) && (int)$_GET['limit'] > 0) ? (int)$_GET['limit'] : 10;

	if(hasValue($loggedInUserInfo) && is_array($loggedInUserInfo) && $loggedInUserInfo["users_page_limit"] && !(isset($_GET['limit']) and !empty($_GET['limit']))){
		$l = $loggedInUserInfo["users_page_limit"];
	}

	echo "<h2>".get_lang('watch_logger')."</h2>";

	$logs = $db->read_logger($p, $l, $search_field);

	if (empty($logs) && !empty($search_field)) {
		print_failure(get_lang_f('no_results_found', htmlentities($search_field)));
		$view->refresh("?m=administration&p=watch_logger", 5);

		return;
	}

?>
	<!-- Search, Empty Logger, and Paging Options Table -->
	<table style="width: 100%;">
		<tr>
			<td style="width: 50%; vertical-align: middle; text-align: left;">
				<form action="home.php" method="GET" style="display: inline;">
					<input type ="hidden" name="m" value="administration" />
					<input type ="hidden" name="p" value="watch_logger" />
					<input name="search" type="text" id="search" value="<?php if(hasValue($search_field)){ echo $search_field; } ?>" />
					<input type="submit" value="<?php echo get_lang('search'); ?>" />
				</form>
				<form method=POST style="display: inline;">
					<input type="submit" name="empty_logger" value="<?php print_lang('empty_logger'); ?>" >
				</form>
			</td>
			<td style="width: 50%; vertical-align: middle; text-align: right;">
				<?php echo print_lang('view'); ?> <a href='?m=administration&p=watch_logger&limit=10'>10</a> / <a href='?m=administration&p=watch_logger&limit=20'>20</a> / <a href='?m=administration&p=watch_logger&limit=50'>50</a> / <a href='?m=administration&p=watch_logger&limit=100'>100</a> <?php echo print_lang('per_page'); ?>
			</td>
		</tr>
	</table>
	<!-- END Search, Empty Logger, and Paging Options Table -->
	
	<table id="servermonitor" class="tablesorter" data-sortlist="[[1,1]]"> 
	<thead> 
	<tr>
		<th style="width:16px;background-position: center;" class="sorter-false"></th> 
		<th class="dateFormat-ddmmyyyy"><?php print_lang('when'); ?></th> 
		<th><?php print_lang('who'); ?></th> 
		<th><?php print_lang('where'); ?></th> 
		<th><?php print_lang('what'); ?></th> 
	</tr> 
	</thead> 
	<tbody> 
	<?php
	if( isset( $_POST['log_id'] ) ){
		$db->del_logger_log($_POST['log_id']);
		$newLogs = array();
		foreach($logs as $log){
			if($log['log_id'] != $_POST['log_id']){
				$newLogs[] = $log;
			}
		}
		$logs = $newLogs;
	}
		
	if( isset( $_POST['empty_logger'] ) ){
		$db->empty_logger();
		$logs = false;
	}
	
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
				 "<td class='collapsible'>$when</td>\n".
				 "<td class='collapsible'>$who</td>\n".
				 "<td class='collapsible'>$where</td>\n".
				 "<td class='collapsible'>$what</td>\n".
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
	$count_logs = $db->get_logger_count($search_field);
	
	if (isset($_GET['search']) && !empty($_GET['search'])) {
		$uri = '?m=administration&p=watch_logger&search='.$_GET['search'].'&limit='.$l.'&page=';
	} else {
		$uri = '?m=administration&p=watch_logger&limit='.$l.'&page=';
	}
	echo paginationPages($count_logs[0]['total'], $p, $l, $uri, 3, 'watchLogger');
}
?>
