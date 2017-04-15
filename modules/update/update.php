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
 
 // todo, make checking and updating functions for updateing on the background.
 // todo, more specified updates in smaller packages
function check_file($local_path, $remote_url)
{
	// Load remote file contents in to variable
	$remote_file = file_get_contents($remote_url);
	// Load local file contents in to variable
	$local_file = file_get_contents($local_path);
	if( $remote_file != $local_file and preg_match("/exec_ogp_module/", $remote_file) )
	{
		// The file have changes, save them:
		if( ! file_put_contents($local_path, $remote_file) )
		{
			print_failure($local_path . ' has been changed, but the file can not be updated, you should ensure that your panel files are writeable and try again.');
			return False;
		}
		return True;
	}
	else
	{
		return "nochange";
	}
}

function exec_ogp_module()
{
	if ($_SESSION['users_group'] != "admin") 
	{
		print_failure(get_lang('no_access'));
		return;
	}

	global $db,$settings;
	
	// GitHub URL
	$gitHubURL = $settings["custom_github_update_URL"];	
	
	define('REPONAME', 'OGP-Website');
	define('RSS_REMOTE_PATH', $gitHubURL . REPONAME . '/commits/master.atom');
	define('MODULE_PATH', 'modules/'.$_GET['m'].'/');
	define('RSS_LOCAL_PATH', MODULE_PATH.'master.atom');
		
	// Reinstall update module for db changes if needed
	if($db->updateModuleNeedsUpdate()){
		require_once('modules/modulemanager/module_handling.php');
		$updateModuleId = $db->getModuleIDByName("update");
		if($updateModuleId){
			uninstall_module($db, $updateModuleId, "update", true);	
			install_module($db, "update");
		}
	}
		
	if( is_writable(MODULE_PATH) )
	{
		if( ! file_put_contents(RSS_LOCAL_PATH, file_get_contents(RSS_REMOTE_PATH)))
		{
			print_failure('Unable to download : ' . RSS_REMOTE_PATH);
		}	
	}
	
	if( file_exists(RSS_LOCAL_PATH) )
	{
		try {
			$feedXml = new SimpleXMLElement(file_get_contents(RSS_LOCAL_PATH), LIBXML_NOCDATA);
			$seed = basename(  (string) $feedXml->entry[0]->link['href'] );
			unlink(RSS_LOCAL_PATH);
		} catch (Exception $e) {
			print_failure('Unable to update: '.$e->getMessage());
			return;
		}
	}
	else
	{
		print_failure('Unable to read : ' . RSS_LOCAL_PATH);
		return;
	}
	
	if(isset($seed))
	{
		/// Checking for changes in the main update files:
		$main_update_files = array( 'modules/update/update.php' => 'https://raw.githubusercontent.com/OpenGamePanel/'.REPONAME.'/'.$seed.'/modules/update/update.php',
									'modules/update/updating.php' => 'https://raw.githubusercontent.com/OpenGamePanel/'.REPONAME.'/'.$seed.'/modules/update/updating.php' );
		$refresh = False;
		foreach($main_update_files as $local_path => $remote_url)
		{
			$result = check_file($local_path, $remote_url);
			if ($result === 'nochange')
			{
				continue;
			}
			elseif($result)
			{
				$refresh = True;
			}
			else
			{
				return;
			}
		}
		
		if($refresh)
		{
			header("Refresh:0");
			return;
		}
		
		echo "<h2>".get_lang('update')."</h2>";
		$pversion = $settings['ogp_version'];
		echo '<a href="?m='.$_GET['m'].'&p=blacklist" >'.get_lang('blacklist_files')."</a>&nbsp;".get_lang('blacklist_files_info')."</br></br>";
		echo get_lang('panel_version').": ".$pversion."</br></br>";
		echo get_lang('latest_version').": $seed</br></br>";
		
		if ( $seed != $pversion )
		{	
			$dwl = $gitHubURL . REPONAME . '/archive/'.$seed.'.zip';
			$dwlHeaders = get_headers($dwl);
			if($dwlHeaders[0] != 'HTTP/1.1 302 Found')
				print_failure('The generated URL for the download returned a bad response code: ' . $dwlHeaders[0]);
			else
				echo "<form action='?m=".$_GET['m']."&amp;p=updating&amp;version=".$seed."' method='post'>\n".
					 "<input type='submit' value='".get_lang('update_now')."' /></form><br><br>\n";
		}
		else
		{
			print_success(get_lang('the_panel_is_up_to_date'));
		}
	}
}
?>
