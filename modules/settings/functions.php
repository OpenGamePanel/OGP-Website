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

/// @param $selected What value should be selected.
function get_theme_html_str( $selected, $add_empty = FALSE )
{
    $themes = makefilelist("themes/", ".|..|.svn", true, "folders");

    $retval = "<select id='theme' name='theme'>";
    if ( empty($selected) )
    {
        $retval .= "<option value='' selected=selected >-</option>";
    }
    foreach ( $themes as $theme )
    {
        $retval .= "<option value='$theme'";
        if ( $theme === $selected )
            $retval .= ' selected=selected ';
        $retval .= ">$theme</option>";
    }
    if ( $add_empty )
    {
        $retval .= "<option value='' >-</option>";
    }

    $retval .= "</select>";
    return $retval;
}
?>
