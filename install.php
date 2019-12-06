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

error_reporting(E_ALL);
$_GET['action'] = true;
define("MODULES", "modules/");

// Strip Input Function, prevents HTML in unwanted places
function stripinput($text) {
    if (ini_get('magic_quotes_gpc')) $text = stripslashes($text);
    $search = array("\"", "'", "\\", '\"', "\'", "<", ">", "&nbsp;");
    $replace = array("&quot;", "&#39;", "&#92;", "&quot;", "&#39;", "&lt;", "&gt;", " ");
    $text = str_replace($search, $replace, $text);
    return $text;
}

function is_function_available($function) {
	$available = true;
	if ( ! function_exists( $function ) ) 
	{
		if ( ! ini_get( $function ) )
		{
			$available = false;
		}
		else
		{
			$d = ini_get('disable_functions');
			$s = ini_get('suhosin.executor.func.blacklist');
			if ("$d$s") 
			{
				$array = preg_split('/,\s*/', "$d,$s");
				if ( in_array( $function, $array ) ) 
				{
					$available = false;
				}
			}
		}
	}
	else
	{
		$d = ini_get('disable_functions');
		$s = ini_get('suhosin.executor.func.blacklist');
		if ("$d$s") 
		{
			$array = preg_split('/,\s*/', "$d,$s");
			if (in_array($function, $array))
			{
				$available = false;
			}
		}
	}
	return $available;
}

session_start();

if ( !isset($_SESSION['users_lang']) )
    $_SESSION['users_lang'] = "English";
	
if ( isset($_GET['localeset']) )
    $_SESSION['users_lang'] = $_GET['localeset'];

define("REQUIRED_PHP_VERSION", "5.3");

require_once("includes/helpers.php");
require_once("includes/view.php");
require_once("includes/lang.php");
require_once("includes/html_functions.php");
require_once("includes/functions.php");
ogpLang();

$view = new OGPView();
$view->setCharset(get_lang('lang_charset'));

?>
<style>
body {
	background-image:url("images/bg.png");
}
#install-content { 
	width:650px;
	margin:0 auto; 
	margin-top:30px; 
	padding:0px 15px;
	background-color:#FFF;
	border-radius:9px;
	-moz-border-radius: 9px;
	border:1px solid #C8C8C8;
	overflow:hidden;
} 
#install-title { 
	width:680px;
	height:30px; 
	background:#f5f5f5;
	border-top-style:solid;
	border-top-color:#cfcfcf;
	border-top-width:1px;
	border-bottom-style:solid;
	border-bottom-color:#cfcfcf; 
	border-bottom-width:1px;
	margin-bottom:5px;
	margin-top:-1px;
	margin-left:-18px;
	margin-right:-15px;
	padding-top:5px;
	font-size: 20px;
	text-align: center;
	color: #000;
	font-family:"Trebuchet MS"
}
.lang {
	width:100%;
	text-align:center;
	margin-left:auto;
	margin-right:auto;
}
li {
	list-style-type:square;
}
</style>
<!--[if IE]>
<style>
    #install-content { 	text-align:center; width:100%; }
	#install-title { width:100% background:#FFF; border:none; }
</style>
<![endif]-->
<div id="install-content">
<?php
install();
function install() {
	global $db;
    $step = (isset($_REQUEST['step']) ? $_REQUEST['step'] : "0");
	
    if ($step == "0") {
        $locale_files = makefilelist("lang/", ".|..|.svn", true, "folders");
        $counter = 0; 
		$columns = 3;
		$width = round(100/$columns);
		
		echo "<div id=\"install-title\" style=\"margin-top:-4px;\">".get_lang('install_lang')."</div>";
        echo "<table class='lang' style=\"margin-bottom:10px;\">\n<tr>";
        for ($i=0;$i < count($locale_files);$i++) {

            if ($counter != 0 && ($counter % $columns == 0)) echo "</tr>\n<tr>\n";
            echo "<td style='width:".$width."%' >";

            if ($locale_files[$i] == $_SESSION['users_lang']) {
                echo "<li><b>".$locale_files[$i]."</b></li>";
            } else {
                echo "<li><a href='?localeset=".$locale_files[$i]."'>".$locale_files[$i]."</a></li>";
            }
            echo "</td>\n";
            $counter++;
        }
		
        echo "</tr>\n</table>\n"; 
        echo "<div id=\"install-title\">".get_lang('install_welcome')."</div>";

        echo "<h3>".get_lang('file_permission_check').":</h3>";
        $failed = false;
        echo "<table class='install'>\n";

        // config.inc.php is checked seperately because we need to check first if the file
        // exists or not.
        $value = 'includes/config.inc.php';

        if ( !is_file($value) )
        {
			@$control = fopen($value,"w+");  
			if($control == false){
            echo "<tr><td>".$value."</td><td><span class='failure'>".
                get_lang('create_an_empty_file')."</span></td></tr>";
            $failed = true;
			}
        }
        else if ( !is_writable($value) )
        {
            echo "<tr><td>".$value."</td><td><span class='failure'>".
                get_lang('write_permission_required')."</span></td></tr>";
            $failed = true;
        }
        else
        {
            echo "<tr><td>".$value."</td><td><span class='success'>".get_lang('OK')."</span></td></tr>";
        }
		
		// Check if the folder "modules/TS3Admin/templates_c" is writable
		$value = 'modules/TS3Admin/templates_c';
		if ( !is_writable($value) )
        {
            echo "<tr><td>".$value."</td><td><span class='failure'>".
                get_lang('write_permission_required')."</span></td></tr>";
            $failed = true;
        }
		else
        {
            echo "<tr><td>".$value."</td><td><span class='success'>".get_lang('OK')."</span></td></tr>";
        }
		
        echo "</table>";
        echo "<h3>".get_lang('php_version_check').":</h3>\n";
        echo "<table class='install'>";
        echo "<tr><td>PHP Version >= ".REQUIRED_PHP_VERSION."</td><td>";
        if ( version_compare(PHP_VERSION, REQUIRED_PHP_VERSION, ">=") )
        {
            echo "<span class='success'>".PHP_VERSION."</span>";
        }
        else
        {
            echo "<span class='failure'>".PHP_VERSION."</span>";
            $failed = true;
        }
        echo "</td></tr></table>";

        /* TODO: how to check if pear is enabled or not? */
        $properties_to_check = array(
            array( "name" => "PHP XML-RPC module", "type" => "f", "value" => "xmlrpc_server_create" ),
            array( "name" => "PHP Curl module", "type" => "f", "value" => "curl_init" ),
            array( "name" => "PHP XML Reader", "type" => "c", "value" => "XMLReader" ),
			array( "name" => "PHP JSON Extension", "type" => "f", "value" => "json_decode" ),
			array( "name" => "PHP Zip Extension", "type" => "c", "value" => "ZipArchive" ),
			array( "name" => "PHP mbstring Extension", "type" => "x", "value" => "mbstring" ),
			array( "name" => "PHP MySQLi Extension", "type" => "f", "value" => "mysqli_connect" ));
			
		$optional_properties_to_check = array(
			array( "name" => "PHP BCMath Extension", "type" => "f", "value" => "bcadd" ),
		);
		
        echo "<h3>".get_lang('checking_required_modules').":</h3>\n<table class='install'>";

        foreach ( $properties_to_check as $propertie ) {
			if(preReqInstalled($propertie)){
				echo "<tr><td>".$propertie['name']."</td><td><span class='success'>".get_lang('found')."</span></td></tr>";
			}else{
				echo "<tr><td>".$propertie['name']."</td><td><span class='failure'>".get_lang('not_found')."</span></td></tr>";
				$failed = true;
			}
        }

        echo "<tr><td>Pear XXTEA</td><td>";

        $xxtea_found = false;
        $pear_found = false;
        // Lets search for XXTEA pear module from include path.
        $include_paths = explode(PATH_SEPARATOR, get_include_path());
        foreach ( $include_paths as $include_path )
        {
            if ( file_exists( $include_path."/"."Crypt/XXTEA.php") )
                $xxtea_found = true;

            // Pear always includes System.php file that should be found from the include path.
            if ( file_exists( $include_path."/"."System.php") )
                $pear_found = true;
        }

        if ( $xxtea_found )
        {
            print_success(get_lang('found'));
        }
        else
        {
            print_failure(get_lang('not_found'));
            echo "<p class='info'>".get_lang('pear_xxtea_info')."</p>";
            $failed = true;
        }

        echo "</td></tr>";
        echo "<tr><td>Pear</td><td>";

        if ( $pear_found )
        {
            print_success(get_lang('found'));
        }
        else
        {
            print_failure(get_lang('not_found'));
            $failed = true;
        }

        echo "</td></tr>";		
		echo "<tr><td>file_get_contents()</td><td>";

        if ( is_function_available('file_get_contents') )
        {
            print_success(get_lang('found'));
        }
        else
        {
            print_failure(get_lang('not_found'));
            $failed = true;
        }

        echo "</td></tr>";
		
		echo "<tr><td>allow_url_fopen=on</td><td>";

        if ( is_function_available('allow_url_fopen') )
        {
            print_success(get_lang('found'));
        }
        else
        {
            print_failure(get_lang('not_found'));
            $failed = true;
        }

        echo "</td></tr>";

        echo "</table>\n";
        
        echo "<h3>".get_lang('checking_optional_modules').":</h3>\n<table class='install'>";
        
        foreach ( $optional_properties_to_check as $propertie ) {
			if(preReqInstalled($propertie)){
				echo "<tr><td>".$propertie['name']."</td><td><span class='success'>".get_lang('found')."</span></td></tr>";
			}else{
				echo "<tr><td>".$propertie['name']."</td><td><span class='warning'>".get_lang('not_found')."</span></td></tr>";
			}
        }
		
		echo "</table>\n";

        if ( $failed ) {
            echo "<p><a href='?'>".get_lang('refresh')."</a></p>\n";
        } else {
            echo "<p><a href='?step=1'>".get_lang('next')."</a></p>\n";
        }
		echo "</td></tr></table>\n";
    }
    else if ( $step == "1" )
    {
		echo "<table class='install'><tr><td>\n";
        if ( is_readable('includes/config.inc.php') )
            require_once "includes/config.inc.php";

        echo "<form name='setup' method='post' action='?step=2'>";
        echo "<table class='install'>\n";
        echo "<tr><td colspan='2'><div id=\"install-title\" style=\"margin-left:-21px; margin-top:-7px;\">".get_lang('database_settings')."</div></td></tr>
            <tr><td>".get_lang('database_type').":</td><td>MySQL</td></tr>
            <tr><td>".get_lang('database_hostname').":</td>
            <td><input type='text' value='";
        $OS = strtoupper(substr(PHP_OS, 0, 3));
        echo isset( $db_host ) ? $db_host : (($OS === 'WIN' || $OS === 'CYG') ? "127.0.0.1" : "localhost");
        echo "' name='db_host' class='textbox' /></td></tr>
            <tr><td>".get_lang('database_username').":</td>
            <td><input type='text' value='";
        echo isset( $db_user ) ? $db_user : "" ;
        echo "' name='db_user' class='textbox' /></td></tr>
            <tr><td>".get_lang('database_password').":</td>
            <td><input type='password' value='";
        echo isset( $db_pass ) ? $db_pass : "" ;
        echo "' name='db_pass' class='textbox' /></td></tr>
            <tr><td>".get_lang('database_name').":</td>
            <td><input type='text' value='";
        echo isset( $db_name ) ? $db_name : "" ;
        echo "' name='db_name' class='textbox' /></td></tr>";
        echo "<tr><td>".get_lang('database_prefix').":</td>
            <td><input type='text' value='";
        echo isset( $table_prefix ) ? $table_prefix : "ogp_";
        echo "' name='table_prefix' class='textbox' /></td></tr>";
        echo "</table>\n
            <p><input type='submit' name='next' value='".
            get_lang('next')."' class='button' /></p></form>";
        echo "<p><a href='?step=0'>".get_lang('back')."</a></p>";
		echo "</td></tr></table>\n";
    }
    else if ($step == "2")
    {
		echo "<table class='install'><tr><td>\n";
        if ( isset($_POST['db_host']) )
        {
            $db_host = stripinput($_POST['db_host']);
            $db_user = stripinput($_POST['db_user']);
            $db_pass = stripinput($_POST['db_pass']);
            $db_name = stripinput($_POST['db_name']);
            $table_prefix = stripinput($_POST['table_prefix']);
            $db_type = "mysql";
            $config = "<?php\n".
                "###############################################\n".
                "# Site configuration\n".
                "###############################################\n".
                "\$db_host=\"".$db_host."\";\n".
                "\$db_user=\"".$db_user."\";\n".
                "\$db_pass=\"".$db_pass."\";\n".
                "\$db_name=\"".$db_name."\";\n".
                "\$table_prefix=\"".$table_prefix."\";\n".
                "\$db_type=\"".$db_type."\";\n".
                "?>";

            $temp = @fopen("includes/config.inc.php","w");
            if (!@fwrite($temp, $config))
            {
                print_failure(get_lang('unable_to_write_config'));
                echo "<p><a href='?step=0'>".get_lang('back')."</a></p>";
                fclose($temp);
                return;
            }
            fclose($temp);
        }

        require_once "includes/config.inc.php";
        $db = createDatabaseConnection($db_type, $db_host, $db_user, $db_pass, $db_name, $table_prefix);
        $error_text = "";
        if ( get_db_error_text($db,$error_text) )
        {
            print_failure($error_text);
            echo "<p><a href='?step=1'>".get_lang('back')."</a></p>";
            return;
        }

        $fail = false;

        // These belong to module manager, but they need to be created before other modules can be "installed".
        $result = $db->query("DROP TABLE IF EXISTS ".$table_prefix."modules");
        $result = $db->query("CREATE TABLE IF NOT EXISTS `".$table_prefix."modules` (
            `id` smallint(5) unsigned NOT NULL auto_increment,
            `title` varchar(100) NOT NULL default '',
            `folder` varchar(100) NOT NULL default '',
            `version` varchar(10) NOT NULL default '0',
            `db_version` int(10) NOT NULL default '0',
            PRIMARY KEY  (`id`),
        UNIQUE KEY `folder` (`folder`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
        $result = $db->query("DROP TABLE IF EXISTS ".$table_prefix."module_menus");
        $result = $db->query("CREATE TABLE IF NOT EXISTS `".$table_prefix."module_menus` (
            `module_id` int(11) NOT NULL COMMENT 'This references to modules.id',
            `subpage` varchar(64) NOT NULL default '',
            `group` varchar(32) NOT NULL,
            `menu_name` varchar(128) NOT NULL,
			`pos` INT UNSIGNED NOT NULL,
            PRIMARY KEY  (`module_id`,`subpage`,`group`)
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
        if (!$result) $fail = true;

        // Install modules.
        require_once("modules/modulemanager/module_handling.php");
        @add_lang_module('modulemanager');
        $modules = list_available_modules();

		if(in_array('modulemanager', $modules))
		{
			// Install module manager first
			$fail = $fail || install_module($db, 'modulemanager', FALSE) < 0;
		}
		
        foreach ( $modules as $module )
        {
            if($module == 'modulemanager')//Has already been installed
				continue;
			$fail = $fail || install_module($db,$module,FALSE) < 0;
        }

        if ( $fail ) {
            print_failure(get_lang('database_setup_failure'));
            echo "<p><a href='?step=1'>".get_lang('back')."</a></p>";
            echo "<p>".get_lang('unable_to_resolve').
                " <a href='http://www.opengamepanel.org/'>http://www.opengamepanel.org</a></p>";
            return;
        }

        print_success(get_lang('config_written'));
        print_success(get_lang('database_created'));
        echo "<form name='setup' method='post' action='?'>\n
            <input type='hidden' name='step' value='3' />";
        echo "<table class='install'>\n";
        echo "<tr><td colspan='2'><div id=\"install-title\" style=\"margin-left:-21px;\">".get_lang('admin_login_details')."</div>";
        echo "<p>".get_lang('admin_login_details_info')."</p></td></tr>";
        echo "<tr><td>".get_lang('username').
            ":</td><td><input type='text' name='username' maxlength='30' class='textbox' /></td></tr>";
        echo "<tr><td>".get_lang('password').
            ":</td><td><input type='password' name='password1' maxlength='20' class='textbox' /></td></tr>";
        echo "<tr><td>".get_lang('repeat_password').
            ":</td><td><input type='password' name='password2' maxlength='20' class='textbox' /></td></tr>";
        echo "<tr><td>".get_lang('email').
            ":</td><td><input type='text' name='email' maxlength='100' class='textbox' /></td></tr>";
        echo "</table>\n";
        echo "<p><input type='submit' name='next' value='".get_lang('next')."' class='button' /></p></form>\n";
        echo "<p><a href='?step=1'>".get_lang('back')."</a></p>";
		echo "</td></tr></table>\n";
    }

    else if ($step == "3") {
		echo "<table class='install'><tr><td>\n";
        require_once "includes/config.inc.php";
        $db = createDatabaseConnection($db_type, $db_host, $db_user, $db_pass, $db_name, $table_prefix);

        $error = "";
        $username = stripinput($_POST['username']);
        $password1 = stripinput($_POST['password1']);
        $password2 = stripinput($_POST['password2']);
        $email = stripinput($_POST['email']);
        if (!preg_match("/^[-0-9A-Z_@\s]+$/i", $username))
        {
            print_failure(get_lang('invalid_username'));
            echo "<p><a href='?step=2'>".get_lang('back')."</a></p>";
            return;
        }
        // TODO: replace with a constant
        if (strlen($password1) < 6) {
            print_failure(get_lang_f('password_too_short', 6));
            echo "<p><a href='?step=2'>".get_lang('back')."</a></p>";
            return;
        }
        if (!preg_match("/^[0-9A-Z@]{6,20}$/i", $password1))
        {
            print_failure(get_lang('password_contains_invalid_characters'));
            echo "<p><a href='?step=2'>".get_lang('back')."</a></p>";
            return;
        }
        if ( $password1 != $password2 )
        {
            print_failure(get_lang('password_mismatch'));
            echo "<p><a href='?step=2'>".get_lang('back')."</a></p>";
            return;
        }
        if (!preg_match("/^[-0-9A-Z_\.]{1,50}@([-0-9A-Z_\.]+\.){1,50}([0-9A-Z]){2,4}$/i", $email))
        {
            print_failure(get_lang('invalid_email_address'));
            echo "<p><a href='?step=2'>".get_lang('back')."</a></p>";
            return;
        }
//detect nighly builds, if not its SVN

        if (file_exists("version.txt")) {
            $file = "version.txt";
            $contents = file($file);
            $nversion = implode($contents);
            $nversion2 = substr($nversion ,60);
			$nversion2 = trim($nversion2);
            
            $site_settings = array("title"=>"Open Game Panel",
            "slogan" => "".get_lang('slogan')."",
            "ogp_version" => "$nversion2",
            "version_type" => "SVN",
			"theme" =>  "Revolution",
			"welcome_title" =>  "1",
			"welcome_title_message" =>  "<h0>".get_lang('default_welcome_title_message')."</h0>",
			"page_auto_refresh" => "1");
            unlink('version.txt');
            
        } else {
        $site_settings = array("title"=>"Open Game Panel",
            "slogan" => "".get_lang('slogan')."",
            "ogp_version" => "0",
            "version_type" => "SVN",
			"theme" =>  "Revolution",
			"welcome_title" =>  "1",
			"welcome_title_message" =>  "<h0>".get_lang('default_welcome_title_message')."</h0>",
			"page_auto_refresh" => "1");
        }
        $result = $db->setSettings($site_settings);
        $result = $db->addUser($username,$password1,"admin",$email);
        $result = updateGameConfigsPostInstall();
        print_success(get_lang('setup_complete'));
        echo "<p class='note'>".get_lang('remove_install_and_secure_config')."</p>";
        echo "<p class='note'><a href='index.php'>".get_lang('go_to_panel')."</a></p>";
		echo "</td></tr></table>\n";
		echo "</div>\n";
    }
}

$view->printView();

?>
