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
	$path = getcwd()."/".$_GET['randir']."/"; // change the path to fit your websites document structure
	$fullPath = $path.$_GET['dwfile'];

	if ($fd = fopen ($fullPath, "r")) {
		header("Content-Disposition: attachment; filename=\"".$_GET['dwfile']."\"");
		header("Content-length: ".filesize($fullPath));
		while(!feof($fd)) {
			$buffer = fread($fd, 2048);
			echo $buffer;
		}
		fclose($fd);
	}
	unlink($fullPath);
	rmdir($path);
	exit;
}
?>