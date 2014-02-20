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

function extractZip( $zipFile, $extract_path, $remove_path = '', $blacklist, $whitelist =array() )
{   
	if($zipFile == '' or $extract_path == '')
		return false;
	if( ! file_exists( $zipFile ) )
		return false;
	$zip = zip_open($zipFile);
	$remove_path = addcslashes($remove_path,"/");
	
    if (is_resource($zip))
    {
        $i=0;
		$extracted_files = array();
		while ($zip_entry = zip_read($zip))
        {
			$filename = zip_entry_name( $zip_entry );
			$file_path = preg_replace( "/$remove_path/", "", $filename  );
			$dir_path = preg_replace( "/$remove_path/", "", dirname( $filename ) );
			
			if( isset( $blacklist ) and is_array( $blacklist ) and in_array( $file_path , $blacklist  ) )
				continue;
				
			if( isset( $whitelist ) and is_array( $whitelist ) and !in_array( $filename , $whitelist  ) )
				continue;
				
			$completePath = $extract_path . $dir_path;
            $completeName = $extract_path . $file_path;
           
            // Walk through path to create non existing directories
            // This won't apply to empty directories ! They are created further below
            if(!file_exists($completePath) && preg_match( '/^' . $remove_path .'/', dirname(zip_entry_name($zip_entry)) ) )
            {
				$tmp = PHP_OS == "WINNT" ? "" : DIRECTORY_SEPARATOR;
                foreach(explode('/',$completePath) AS $k)
                {
                    if( $k != "" )
					{
						$tmp .= $k.DIRECTORY_SEPARATOR;
						if( ! file_exists($tmp) )
						{
							mkdir($tmp, 0777);
						}
					}
                }
            }
           
            if (zip_entry_open($zip, $zip_entry, "r"))
            {
                if( preg_match( '/^' . $remove_path .'/', dirname(zip_entry_name($zip_entry)) ) )
                {
					if ( ! preg_match( "/\/$/", $completeName) )
					{
						if ( $fd = fopen($completeName, 'w+'))
						{
							fwrite($fd, zip_entry_read($zip_entry, zip_entry_filesize($zip_entry)));
							fclose($fd);
							$extracted_files[$i]['filename'] = zip_entry_name($zip_entry);
							$i++;
						}
					}
                }
				zip_entry_close($zip_entry);
            }
        }
        zip_close($zip);
	
		return $extracted_files;

    }
    return false;
}

?>