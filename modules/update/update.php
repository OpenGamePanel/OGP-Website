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
	global $db, $settings;
	define('REPONAME', 'OGP-Website');

	if ($_SESSION['users_group'] != "admin") 
	{
		print_failure(get_lang('no_access'));
		return;
	}

	// Check if PHP-ZIP is installed, otherwise we won't be able to extract the downloaded update.
	if (extension_loaded('zip') === false) {
		print_failure(get_lang('missing_zip_extension'));
		return;
	}
	
	// GitHub URL
	if(function_exists("getOGPGitHubURL") && function_exists("getOGPGitHubURLUnstrict") && function_exists("getGitHubOrganization")){
		$gitHubUsername = $settings["custom_github_update_username"];	
		$gitHubURL = getOGPGitHubURL($gitHubUsername, REPONAME);
		$gitHubOrganization = getGitHubOrganization($gitHubURL);
	}else{
		$gitHubURL = "https://github.com/OpenGamePanel/";
	}
	
	
	define('RSS_REMOTE_PATH', $gitHubURL . REPONAME . '/commits/master.atom');
	define('MODULE_PATH', 'modules/'.$_GET['m'].'/');
	define('RSS_LOCAL_PATH', MODULE_PATH.'master.atom');
		
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
		$main_update_files = array( 'modules/update/update.php' => 'https://raw.githubusercontent.com/' . $gitHubOrganization . '/'.REPONAME.'/'.$seed.'/modules/update/update.php',
									'modules/update/updating.php' => 'https://raw.githubusercontent.com/' . $gitHubOrganization . '/'.REPONAME.'/'.$seed.'/modules/update/updating.php' );
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
				
				if(function_exists('curl_version')){
					echo "<h2>Latest Changes</h2>";
					
					$commitsStart = 0;
					$commitsToShow = 5;
					
					$gitHubUpdateName = (!empty($settings['custom_github_update_username']) ? $settings['custom_github_update_username'] : 'OpenGamePanel');
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/repos/'.$gitHubUpdateName.'/'.REPONAME.'/commits');
					curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
					$data = curl_exec($ch);
					
					if ($data) {
						$json = json_decode($data, true);
						
						if (!empty($json[0]['commit'])) {
							echo '<ul>';
							foreach ($json as $k=>$v) {
								if ($commitsStart >= $commitsToShow) {
									break;
								}
								echo '<li>'.substr($v['commit']['author']['date'],0,10).' - '.$v['commit']['author']['name'] .'</a> committed <a href="'.$v['html_url'].'" target="_blank">'.substr($v[sha],0,7).'...</a><br>';
								echo '<b>'.$v['commit']['message'] .'</b></li><br>';
								++$commitsStart;
							}
							echo '</ul><a href="https://github.com/'.$gitHubUpdateName.'/'.REPONAME.'/commits/master" target="_blank">View more commits...</a>';
						}
					}
				}
		}
		else
		{
			print_success(get_lang('the_panel_is_up_to_date'));
		}
	}
}
?>
