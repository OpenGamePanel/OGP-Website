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

function exec_ogp_module()
{
	global $db;
	$expired_servers = $db->resultQuery("SELECT home_name, home_id, server_expiration_date FROM OGP_DB_PREFIXserver_homes WHERE server_expiration_date NOT LIKE 'X' AND server_expiration_date <= ".time().";");
	if($expired_servers)
	{
		foreach($expired_servers as $expired_server)
		{
			$db->logger(date('d/m/Y H:i:s', $expired_server['server_expiration_date'])." : SERVER EXPIRED: HOME ID:$expired_server[home_id] ($expired_server[home_name])");
			$db->check_expire_date(0, $expired_server['home_id'], array('server'));
		}
	}

	$expired_users	 = $db->resultQuery("SELECT user_id, home_id, user_expiration_date FROM OGP_DB_PREFIXuser_homes WHERE user_expiration_date NOT LIKE 'X' AND user_expiration_date <= ".time().";");
	if($expired_users)
	{
		foreach($expired_users as $expired_user)
		{
			$db->logger(date('d/m/Y H:i:s', $expired_user['user_expiration_date'])." : USER ASSIGNATION EXPIRED : HOME ID:$expired_user[home_id] TO USER ID:$expired_user[user_id]");
			$db->check_expire_date($expired_user['user_id'], $expired_user['home_id'], array('user'));
		}
	}

	$expired_groups	 = $db->resultQuery("SELECT g.group_id, g.home_id, g.user_group_expiration_date, ug.user_id
										 FROM OGP_DB_PREFIXuser_group_homes g
										 INNER JOIN
										 OGP_DB_PREFIXuser_groups ug
										 ON ug.group_id=g.group_id
										 WHERE g.user_group_expiration_date NOT LIKE 'X' AND g.user_group_expiration_date <= ".time()." GROUP BY g.home_id;");
	if($expired_groups)
	{
		foreach($expired_groups as $expired_group)
		{
			$db->logger(date('d/m/Y H:i:s', $expired_group['user_group_expiration_date'])." : GROUP ASSIGNATION EXPIRED : HOME ID:$expired_group[home_id] TO GROUP ID:$expired_group[group_id]");
			$db->check_expire_date($expired_group['user_id'], $expired_group['home_id'], array('user_group'));
		}
	}
}
?>