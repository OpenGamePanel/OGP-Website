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

if(isset($_POST['default']))
{
	unset($_SESSION['height']);
	unset($_SESSION['width']);
}

if(isset($_SESSION['height']))$height = $_SESSION['height']; 
else
{
	$height = 420;
	$_SESSION['height'] = $height;
}
	
if(isset($_SESSION['width']))$width = $_SESSION['width']; 
else
{
	$width = 770;
	$_SESSION['width'] = $width;
	
}



if(isset($_POST['h_bigger']))
{
	$_SESSION['height'] = $_SESSION['height'] + 50;
	$height = $_SESSION['height'];
}

if(isset($_POST['h_smaller']))
{	
	$_SESSION['height'] = $_SESSION['height'] - 50;
	$height = $_SESSION['height'];
}

if(isset($_POST['w_bigger']))
{	
	$_SESSION['width'] = $_SESSION['width'] + 50;
	$width = $_SESSION['width'];
}

if(isset($_POST['w_smaller']))
{	
	$_SESSION['width'] = $_SESSION['width'] - 50;
	$width = $_SESSION['width'];
}


?>
<IFRAME SRC="<?php echo $_GET['external_link']; ?>" WIDTH=<?php echo $width; ?> HEIGHT=<?php echo $height; ?> style="border:1px solid transparent;background-color:white" ></IFRAME>
<br>
<table style='text-align:center;'>
<tr>
<td colspan=3><form action="" method=POST><input type='submit' value='-H' name='h_smaller'/></form></td>
</tr>
<tr>
<td><form action="" method=POST><input type='submit' value='-W' name='w_smaller'/></form></td>
<td><form action="" method=POST><input type='submit' value='0' name='default'/></form></td>
<td><form action="" method=POST><input type='submit' value='+W' name='w_bigger'/></form></td>
</tr>
<tr>
<td colspan=3><form action="" method=POST><input type='submit' value='+H' name='h_bigger'/></form></td>
</tr>
<tr>

</tr></table>
<a href="?m=administration&p=main"><?php print_lang('back'); ?></a>
<?php
}
?>