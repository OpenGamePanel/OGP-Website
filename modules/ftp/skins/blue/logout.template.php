<?php defined("NET2FTP") or die("Direct access to this location is not allowed."); ?>
<!-- Template /skins/blue/logout.php begin -->
<?php
if( isset($_SESSION['home_id']) ) $home = "?home_id=".$_SESSION['home_id']; else $home = "";
if( isset($_SERVER['HTTPS']) AND !empty($_SERVER['HTTPS']) ) $http = "https://"; else $http = "http://";
echo "<meta http-equiv=\"refresh\" content=\"0;url=$http".$_SERVER['HTTP_HOST']."$url$home\">";
?>
<!-- Template /skins/blue/logout.php end -->
