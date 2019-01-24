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

function print_failure($text, $class="failure")
{
    echo '<p class="' . $class . '">'.$text.'</p>';
}

function print_success($text)
{
    echo '<p class="success">'.$text.'</p>';
}

function create_back_button($module,$subpage = "")
{
    $retval = "<p><a href='?m=$module";
    if ( !empty($subpage) )
    {
        $retval .= "&amp;p=$subpage";
    }
    $retval .= "'>&lt;&lt; ".get_lang('back')."</a></p>\n";

    return $retval;
}

/// Creates HTML drop box from given array with the given listname, custom for Rsync sites
function create_drop_box_from_array_rsync($input_array, $listname, $current_value = "", $use_only_values = true)
{
    $count = 1;
    $retval = "<select id=\"$listname\" name=\"$listname\">\n";
    foreach($input_array as $key => $value)
    {
        $value = trim($value);
		list($rsync_site,$location) = explode("|", $value);
        // We want to print lines with zeros, but not empty lines.
        if ( $value !== "0" && empty($value) )
        {
            continue;
        }

        if ( $use_only_values === true )
        {
       #     $key = $value;
        }

        if ( $key == $current_value )
        {
            $retval .= "<option value='$count' selected='selected'>$rsync_site - $location</option>\n";
        }
        else
        {
            $retval .= "<option value='$count'>$rsync_site - $location</option>\n";
        }

        ++$count;
    }
    $retval .= "</select>\n";
    return $retval;
}


/// Creates HTML drop box from given array with the given listname.
function create_drop_box_from_array($input_array,$listname,$current_value = "", $use_only_values = true)
{
    $retval = "<select id=\"$listname\" name=\"$listname\" style=\"max-width:330px;\">\n";
    foreach($input_array as $key => $value)
    {
		// Make sure we don't allow HTML or script
		$key = trim(strip_tags($key));
        $value = trim(strip_tags($value));
        
        // We want to print lines with zeros, but not empty lines.
        if ( empty($value) and $value !="0" )
        {
            continue;
        }

        if ( $use_only_values === true )
        {
            $key = $value;
        }

		$sel = "";
		
        if ( $key == $current_value )
        {
            $sel .= "selected='selected'";
        }

		$retval .= "<option value='$key' $sel>$value</option>\n";
    }
    $retval .= "</select>\n";
    return $retval;
}

/// Creates HTML drop box from given array with the given listname.
/// Used to create a list of users/groups.  Remote_readfile is used to read in /etc/passwd and /etc/group
function create_drop_box_from_passwd($input_array,$listname)
{
    $retval = "<select name=\"$listname\">\n";

    foreach($input_array as $line)
    {
        $line = trim($line);
        if ( empty($line) ) continue;
        list($username, $junk, $uid, $gid, $comment, $home_dir, $shell) = explode(':', $line);
        if ( $uid < 500 ) continue; #this will filter out system id's, typically under 500
        $retval .= "<option value='$uid:$gid'>$username (uid=$uid gid=$gid home=$home_dir)</option>\n";
    }
    $retval .= "</select>\n";
    return $retval;
}

function get_user_uid_gid_from_passwd($input_array,$name)
{
    foreach($input_array as $line)
    {
        $line = trim($line);
        if ( empty($line) ) continue;
        list($username, $junk, $uid, $gid, $comment, $home_dir, $shell) = explode(':', $line);
        if ( $username === $name )
		{
			$retval = "$uid:$gid";
			return $retval;
		}
    }
}

function check_theme_image($base_image_path)
{
	$base_image_path = ltrim($base_image_path, "/");
	if(function_exists("getThemePath")){
		return file_exists( getThemePath() . $base_image_path ) ? 
						getThemePath() . $base_image_path :
						$base_image_path;
	}
	
	return $base_image_path;
}
?>
