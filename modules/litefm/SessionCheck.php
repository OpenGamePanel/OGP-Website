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

if(file_exists("includes/helpers.php")){
	require_once("includes/helpers.php");
}else{
	if(file_exists(__DIR__ . "/../../includes/helpers.php")){
		require_once(__DIR__ . '/../../includes/helpers.php');
	}
}

if(function_exists("startSession")){
	startSession();
}else{
	session_name("opengamepanel_web");
	session_start();
}

if (isset($_SESSION['users_login']))
	$json['valid'] = true;
else
	$json['valid'] = false;
echo json_encode($json);
?>
