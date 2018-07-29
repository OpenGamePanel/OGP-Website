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
	global $db,$view,$settings;

	if ( is_readable("includes/config.inc.php") ) require("includes/config.inc.php");
	
	$isAdmin = $db->isAdmin( $_SESSION['user_id'] );
	
	if ( $isAdmin )
	{
		$user_homes = $db->getHomesFor('admin', $_SESSION['user_id']);
	}
	else
	{
		$user_homes = $db->getHomesFor('user_and_group', $_SESSION['user_id']);
	}
	
	echo "<h2>".get_lang('ftp')."</h2>";
	
	if( $user_homes === FALSE )
	{
		return;
	}
	if( empty( $_GET['home_id'] ) )
	{
		unset($_GET['home_id']);
	}
	
	if( isset($_GET['home_id']) ) $_SESSION['home_id'] = $_GET['home_id'];
	$_SESSION['settings'] = $settings;
	$_SESSION['remote_servers'] = $db->getRemoteServers();
	$_SESSION['isAdmin'] = $isAdmin;
	$_SESSION['user_homes'] = $user_homes;
	?>	<IFRAME SRC="modules/ftp/index.php<?php if( isset($_GET['home_id']) ) echo "?home_id=".$_GET['home_id']; ?>" ALIGN=center WIDTH=100% HEIGHT=460 style="border:1px solid transparent;background-color:white" >	</IFRAME>	<?php
	echo "<div align='center'><form action='' method='get'>
		  <input type='hidden' name='m' value='gamemanager' />
		  <input type='hidden' name='p' value='game_monitor' />
		  <input type='hidden' name='home_id' value='".$_GET['home_id']."' />
		  <input type='submit' value='".get_lang('back')."' />
		  </form></div>";
}
?>