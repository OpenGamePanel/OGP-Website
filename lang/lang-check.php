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

error_reporting(E_ERROR);
chdir("..");
require_once("includes/helpers.php");
require_once("includes/config.inc.php");
require_once("includes/lang.php");
require_once("includes/functions.php");
function curPageURL() {
	$pageURL = ( isset($_SERVER['HTTPS']) and  get_true_boolean($_SERVER['HTTPS']) ) ? "https://" : "http://";
	if ($_SERVER["SERVER_PORT"] != "80")
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	else
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	return $pageURL;
}

if(isset($_GET['file']))
{
	$file = urldecode($_GET['file']);
	include($file);
	$constants = get_defined_constants(true);
	echo base64_encode(serialize($constants['user']));
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>OGP Lang Check</title>
<style type='text/css'>
.missing_lang {
float: left;
width: 100%;
}
.extra_lang {
float: left;
margin-left: 2em;
}
div h4 {
padding: 0;
margin: 0;
}
.clear {
clear: both;
}
.file_vars {
padding: 0;
margin: 0;
}
.file_var h3 {
margin: 0;
padding: 0;
}
.lang {
border: 1px dashed black;
margin: 1em;
padding: 1em;
}
.success {
color: green;
}
.failure {
color: red;
}
textarea {
width: 80%;
}
</style>
</head>
<body>

<h1>Open Game Panel - Language check</h1>
<p>This page can be used to check what variables there are missing or there is extra compared to the
default language (English).</p>
<?php
$db = createDatabaseConnection($db_type, $db_host, $db_user, $db_pass, $db_name, $table_prefix);
$error_text = "";
if (get_db_error_text($db,$error_text))
{
	print_failure($error_text);
	return;
}
chdir("lang");
$COMPARISON_LANG = "English";

$global_comparison_lang_files = array();

$gclf_tmp = glob($COMPARISON_LANG."/*.php");

// Remove the directory from filename.
foreach ( $gclf_tmp as $tmp )
{
	$array_tmp = explode("/",$tmp);
	array_push($global_comparison_lang_files,$array_tmp[1]);
}

$gclf_tmp = glob($COMPARISON_LANG."/modules/*.php");

foreach ( $gclf_tmp as $tmp )
{
	$array_tmp = explode("/",$tmp);
	array_push($global_comparison_lang_files,"modules/".$array_tmp[2]);
}

$locale_files = makefilelist("./", ".|..|.svn", true, "folders");

echo "<ul id='lang_list'>";
foreach ($locale_files as $lang_name)
{
	echo "<li><a href='#$lang_name'>$lang_name</a></li>\n";
}
echo "</ul>";

startSession();

if ( isset($_SESSION['users_login']) )
{
	$userInfo = $db->getUser($_SESSION['users_login']);
	if( $db->isAdmin($_SESSION['user_id']) AND isset($_SESSION['users_passwd']) AND !empty($_SESSION['users_passwd']) AND $_SESSION['users_passwd'] == $userInfo['users_passwd'])
	{
		if( !empty( $_POST ) )
		{
			foreach ($locale_files as $lang_name)
			{
				if ( $lang_name == $COMPARISON_LANG ) continue;
				
				$lang_ok = true;

				foreach ( $global_comparison_lang_files as $glf )
				{
					$file = $lang_name."/".$glf;
					if( isset( $_POST[str_replace(".", "_", $file)] ) )
					{
						echo "<h2>".$lang_name."</h2>\n";
						echo $file."\n Values Added.";
						$add_values = '<?php '."\n";
						foreach ( $_POST as $var => $value )
						{
							if( $var != str_replace(".", "_", $file) )
								$add_values .= 'define(\''.$var.'\', "'.$value.'");'."\n";
						}
						$add_values .= '?>';
						$fh = fopen($file, 'a') or die("can't open file");
						fwrite($fh, $add_values);
						fclose($fh);
					}
				}
			}
		}
	}
}

$current_url = curPageURL();
foreach ($global_comparison_lang_files as $glf)
{
	$file = $COMPARISON_LANG."/".$glf;
	$contents = file_get_contents($current_url.'?file='.$file);
	$lang[$glf] = unserialize(base64_decode($contents));
}


// Check every lang.
foreach ($locale_files as $lang_name)
{
	if ( $lang_name == $COMPARISON_LANG ) continue;

	echo "<div id='$lang_name' class='lang'><h2>".$lang_name."</h2>\n";

	$lang_ok = true;

	foreach ( $global_comparison_lang_files as $glf )
	{
		$file = $lang_name."/".$glf;
		if ( !is_file($file) )
		{
			echo "<h3>File $file is missing</h3>\n";
			$lang_ok = false;
			continue;
		}
		
		$compare_lang = array();
		$contents = file_get_contents("$current_url?file=$file");
		$compare_lang = unserialize(base64_decode($contents));
		if(!is_array($compare_lang))
			echo "Errors where found at $file";
		$extra_lang_vars = @array_diff_key($compare_lang,$lang[$glf]);
		$missing_lang_vars = @array_diff_key($lang[$glf],$compare_lang);
		if(isset($extra_lang_vars['']))
			unset($extra_lang_vars['']);

		// If there is nothign wrong with the file lest skip it.
		if ( empty($missing_lang_vars) && empty($extra_lang_vars) )
			continue;
		
		echo "<div class='file_vars'>\n";
		echo "<h3>File: $file</h3>
			  <form action='' method='POST' name='".str_replace(".", "_", $file)."' >\n";
		
		if ( !empty($missing_lang_vars) )
		{
			echo "<div class='missing_lang'><h4>Missing lang vars:</h4>\n";
			echo "<br>";
			foreach ( $missing_lang_vars as $var => $value )
			{
				echo "<label for='$var' >$var</label><br><textarea id='$var' name='$var'>".$lang[$glf][$var]."</textarea><br>\n";
			}
			echo "<input name='".str_replace(".", "_", $file)."' type='submit' />
				  </form>
				  </div>\n";
			$lang_ok = false;
		}

		if ( !empty($extra_lang_vars) )
		{
			echo "<div class='extra_lang'><h4>Extra lang vars:</h4>\n";
			echo "<ul>";
			foreach ( $extra_lang_vars as $var => $value )
			{
				echo "<li>$var</li>";
			}
			echo "</ul></div>";
			$lang_ok = false;
		}
		echo "</div><div class='clear'></div>\n";
	}

	if ( $lang_ok )
	{
		echo "<p class='success'>Lang is $lang_name is OK.</p>\n";
	}
	else
	{
		echo "<p class='failure'>Errors found from lang $lang_name.</p>\n";
	}
	echo "<div class='clear'></div> </div>\n";
}
?>
</html>

