<?php defined("NET2FTP") or die("Direct access to this location is not allowed."); ?>
<!-- Template /skins/blue/error.template.php begin -->
<script type="text/javascript" src="<?php echo $net2ftp_globals["application_rootdir_url"]; ?>/modules/edit/edit.js"></script>
		<div style='width:450px;'>
		<h1><?php echo __("An error has occured"); ?></h1> 
		<p><?php echo $net2ftp_result["errormessage"]; ?><br /><br />
		<a href="javascript:top.history.back();"><?php echo __("Go back"); ?></a>
		</div>
<?php require_once($net2ftp_globals["application_skinsdir"] . "/" . $net2ftp_globals["skin"] . "/footer.template.php"); ?>
<!-- Template /skins/blue/error.template.php end -->
