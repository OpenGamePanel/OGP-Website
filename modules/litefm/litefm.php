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

function do_progress($kbytes,$totalsize)
{
	if( $totalsize != 0 )
	{
		$mbytes = round($kbytes / 1024, 2);
						
		if($kbytes > 0)
		{
			$pct = round(( $kbytes / $totalsize ) * 100, 2);
		}
		else
		{
			$pct = get_lang("unavailable");
		}
		#echo "Percent is $pct";
		return "$totalsize;$mbytes;$pct"; 
	}
	return "0;0;0"; 
}

function show_back($home_id)
{
    if( isset($_SESSION['fm_cwd_'.$home_id]) && preg_match("/^\/*$/",$_SESSION['fm_cwd_'.$home_id]) == 0 )
        return "<tr><td colspan='5' ><a href=\"?m=litefm&amp;home_id=$home_id&amp;back\" style='padding-left:5px;' > ..&nbsp;&nbsp;".get_lang("level_up")."</a></td></tr>";
}

function litefm_check($home_id)
{
	if (isset($_GET['item']) and !isset($_GET['upload']) and !isset( $_POST['delete'] ) and !isset( $_POST['create_folder'] ) and !isset( $_POST['secureButton'] ) and !isset( $_POST['delete_check'] ) and !isset( $_POST['secure_check'] ))
    {
		$fileName = !empty($_POST['name']) ? urldecode($_POST['name']) : urldecode($_GET['name']);
		if(isset($_GET['type'])){
			$type = $_GET['type'];
		}else{
			$type = "file";
		}
		
        if(!isset($_SESSION['fm_files_'.$home_id][$_GET['item']]))
			return FALSE;
			
		$path = $_SESSION['fm_files_'.$home_id][$_GET['item']];
		if($path == $fileName){
			// Make sure nobody tries to get outside thier game server by referencing the .. directory
			if(preg_match("/\/\.\.\/|\||;/", $path))
			{
				print_failure(get_lang("unallowed_char"));
				$_SESSION['fm_cwd_'.$home_id] = NULL;
				return FALSE;
			}
			else
			{
				if($type != "file"){
					$_SESSION['fm_cwd_'.$home_id] = @$_SESSION['fm_cwd_'.$home_id] . "/" . $path;
					$_SESSION['fm_cwd_'.$home_id] = clean_path($_SESSION['fm_cwd_'.$home_id]);
				}else{
					if((isset($_SESSION['fm_cwd_'.$home_id]) and !endsWith($_SESSION['fm_cwd_'.$home_id], $path)) or !isset($_SESSION['fm_cwd_'.$home_id])){
						$_SESSION['fm_cwd_'.$home_id] = @$_SESSION['fm_cwd_'.$home_id] . "/" . $path;
						$_SESSION['fm_cwd_'.$home_id] = clean_path($_SESSION['fm_cwd_'.$home_id]);
					}
				}
			}
		}
    }

    // To go back a dir, we just use dirname to strip the last directory or file off the path
    if (isset($_GET['back']) and !isset($_GET['upload']) and !isset( $_POST['delete'] ) and !isset( $_POST['create_folder'] ) and !isset( $_POST['secureButton'] ) and !isset( $_POST['delete_check'] ) and !isset( $_POST['secure_check'] ))
    {
        $_SESSION['fm_cwd_'.$home_id] = dirname( $_SESSION['fm_cwd_'.$home_id] );
    }

    return TRUE;
}
?>