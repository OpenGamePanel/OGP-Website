<?php

/*  Hi,
    
    Thanks for downloading net2ftp!
    
    This page shows how to integrate net2ftp in a generic PHP page.
    It is quite easy:
    1. Define the constants NET2FTP_APPLICATION_ROOTDIR and NET2FTP_APPLICATION_ROOTDIR_URL
    2. Include the file main.inc.php
    3. Execute 5 net2ftp() calls to send the HTTP headers, print the Javascript 
       code, print the HTML body, etc...
    4. Check if an error occured to print out an error message.
    
    Look in /integration for more elaborate examples.
    
    Enjoy,
    
    David 
*/
error_reporting(E_ERROR);

if(file_exists("includes/helpers.php")){
	require_once("includes/helpers.php");
}else{
	if(file_exists(__DIR__ . "/../../includes/helpers.php")){
		require_once(__DIR__ . "/../../includes/helpers.php");
	}
}

if(function_exists("startSession")){
	startSession();
}else{
	session_name("opengamepanel_web");
	session_start();
}

$settings = $_SESSION['settings'];
// ------------------------------------------------------------------------
// 1. Define the constants NET2FTP_APPLICATION_ROOTDIR and NET2FTP_APPLICATION_ROOTDIR_URL
// ------------------------------------------------------------------------
$server_protocol = "http://";
// This is wrong
// if (isset($_SERVER["SERVER_PROTOCOL"]) == true && stripos($_SERVER["SERVER_PROTOCOL"], "https") !== false) { $server_protocol = "https://"; } 
// Check HTTPS like this:
if (isset($_SERVER["HTTPS"]) && !empty($_SERVER["HTTPS"])) { $server_protocol = "https://"; } 
$http_host = "";
if (isset($_SERVER["HTTP_HOST"]) == true) { $http_host = $_SERVER["HTTP_HOST"]; }
$script_name = "/index.php";
if (isset($_SERVER["SCRIPT_NAME"]) == true)  { $script_name = dirname($_SERVER["SCRIPT_NAME"]); }
elseif (isset($_SERVER["PHP_SELF"]) == true) { $script_name = dirname($_SERVER["PHP_SELF"]); }
define("NET2FTP_APPLICATION_ROOTDIR", dirname(__FILE__));
define("NET2FTP_APPLICATION_ROOTDIR_URL", $server_protocol . $http_host . $script_name); 

// ------------------------------------------------------------------------
// 2. Include the file /path/to/net2ftp/includes/main.inc.php
// ------------------------------------------------------------------------
require_once("./includes/main.inc.php");

// ------------------------------------------------------------------------
// 3. Execute net2ftp($action). Note that net2ftp("sendHttpHeaders") MUST 
//    be called once before the other net2ftp() calls!
// ------------------------------------------------------------------------
net2ftp("sendHttpHeaders");
if ($net2ftp_result["success"] == false) {
	require_once("./skins/blue/error_wrapped.template.php");
	exit();
}
?>
<!DOCTYPE html PUBLIC "XHTML 1.0 Transitional" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="<?php echo __("en"); ?>" dir="<?php echo __("ltr"); ?>">
<head>
<meta http-equiv="Content-type" content="text/html;charset=<?php echo __("iso-8859-1"); ?>" />
<?php net2ftp("printJavascript"); ?>
<?php net2ftp("printCss"); ?>
</head>
<body onload="<?php net2ftp("printBodyOnload"); ?>">

<?php net2ftp("printBody"); ?>

<?php
// ------------------------------------------------------------------------
// 4. Check the result and print out an error message. This can be done using 
//    a template, or by accessing the $net2ftp_result variable directly.
// ------------------------------------------------------------------------
if ($net2ftp_result["success"] == false) {
	require_once($net2ftp_globals["application_rootdir"] . "/skins/" . $net2ftp_globals["skin"] . "/error.template.php");
}
?>

</body>
</html>
