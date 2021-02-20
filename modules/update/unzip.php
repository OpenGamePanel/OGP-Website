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

function extractZip( $zipFile, $extract_path, $remove_path = '', $blacklist = '', $whitelist = '' )
{
	$temp_path = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
	$base_path = rtrim(getcwd(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

	if(!file_exists($extract_path))
	{
		return "Destination path (${extract_path}) does not exists.\n";
	}

	if(!is_writable($extract_path))
	{
		return "Can't extract to ${extract_path}, not writable.\n";
	}

	if($zipFile == '' or $extract_path == '')
		return "Invalid arguments.\n";
	if( ! file_exists( $zipFile ) )
		return "Unable to read ${zipFile}.\n";
	$remove_path = addcslashes($remove_path,"/");

	$zip = new ZipArchive; 
	if ($zip)
	{
		$i=0;
		$i2=0;
		$extracted_files = array();
		$ignored_files = array();
		if ($zip->open($zipFile) === TRUE) 
		{ 
			for($j = 0; $j < $zip->numFiles; $j++) 
			{ 
				$filename = $zip->getNameIndex($j);
				$file_path = preg_replace( "/$remove_path/", "", $filename  );
				$dir_path = preg_replace( "/$remove_path/", "", dirname( $filename ) );

				if( isset( $blacklist ) and is_array( $blacklist ) and in_array( $file_path , $blacklist  ) )
				{
					if( isset( $whitelist ) and is_array( $whitelist ) and in_array( $filename , $whitelist  ) )
					{
						$ignored_files[$i2] = $file_path;
						$i2++;
					}
					continue;
				}
				if( isset( $whitelist ) and is_array( $whitelist ) and !in_array( $filename , $whitelist  ) )
					continue;

				$completePath = $extract_path . $dir_path;
				$completeName = $extract_path . $file_path;
				$escaped_temp_path = str_replace('\\', '\\\\', $temp_path);// For Windows paths backslashes
				$root = preg_match("#^$escaped_temp_path#", $completePath)?$temp_path:$base_path;
				$escaped_root = str_replace('\\', '\\\\', $root);
				$relative_path = preg_replace("#^$escaped_root(.*)$#","$1",$completePath);

				// Walk through path to create non existing directories
				// This won't apply to empty directories ! They are created further below
				if(!file_exists($completePath) && preg_match( '/^' . $remove_path .'/', dirname($filename) ) )
				{
					$tmp = $root;
					foreach(preg_split('/(\/|\\\\)/',$relative_path) AS $k)
					{
						if( $k != "" )
						{
							$tmp .= $k.DIRECTORY_SEPARATOR;
							if( !file_exists($tmp) )
							{
								if(!mkdir($tmp, 0777))
								{
									return "Unable to write folder ${tmp}.\n";
								}
							}
						}
					}
				}
				
				if( preg_match( '/^' . $remove_path .'/', dirname($filename) ) )
				{
					if ( ! preg_match( "/\/$/", $completeName) )
					{
						if ( $fd = fopen($completeName, 'w+'))
						{
							$fp = $zip->getStream($filename);
							if($fp){
								fwrite($fd, stream_get_contents($fp));
								$extracted_files[$i]['filename'] = $filename;
								$i++;
							}
							fclose($fd);
						}
						else
						{
							return "Unable to write file ${completeName}.\n";
						}
					}
				}
			}
			$zip->close();
		}
		return array('ignored_files' => $ignored_files, 'extracted_files' => $extracted_files);
	}
	return "${zipFile} is corrupt.\n";
}

function extractZipGitUpdateFile( $zipFile, $extract_path)
{

	if(!file_exists($extract_path))
	{
		return "Destination path (${extract_path}) does not exists.\n";
	}

	if(!is_writable($extract_path))
	{
		return "Can't extract to ${extract_path}, not writable.\n";
	}

	if($zipFile == '' or $extract_path == '')
		return "Invalid arguments.\n";
	if( ! file_exists( $zipFile ) )
		return "Unable to read ${zipFile}.\n";

	$zip = new ZipArchive; 
	if ($zip)
	{
		if ($zip->open($zipFile) === TRUE) 
		{ 
			$zip->extractTo($extract_path);
			$zip->close();
		}
	
		$extracted_files = array();
		$ignored_files = array();
		
		// Construct the iterator
		$it = new RecursiveDirectoryIterator($extract_path);

		// Loop through files
		$i = 0;
		foreach(new RecursiveIteratorIterator($it) as $file) {
			$filename = $file->getPathname();
			$filenameRelative = $file->getFilename();
			
			if($filenameRelative == ".." || $filenameRelative == "."){
				continue;
			}
				
			$file_path_no_extract = preg_replace( "#$extract_path/#", "", $filename  );
			
			$extracted_files[$i]['filename'] = $file_path_no_extract;
			$i++;
		}
		
		return array('ignored_files' => $ignored_files, 'extracted_files' => $extracted_files);
	}
	return "${zipFile} is corrupt.\n";
}
?>
