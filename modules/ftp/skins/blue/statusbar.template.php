<?php defined("NET2FTP") or die("Direct access to this location is not allowed."); ?>
<!-- Template /skins/blue/statusbar.template.php begin -->
		<div style="float: right; text-align: left;">
			<form id="StatusbarForm" method="post" action="<?php echo $net2ftp_globals["action_url"]; ?>">
			<span style="color:black;font-family: 'Trebuchet MS', 'Lucida Grande', Verdana, Arial, Sans-Serif; text-align: <?php echo __("right"); ?>; font-size: 2em;"><?php echo $net2ftp_globals["ftpserver"]; ?></span><br />
<?php			printLoginInfo(); ?>
			<input type="hidden" name="state"     value="browse" />
			<input type="hidden" name="state2"    value="main" />
			<input type="hidden" name="directory" value="<?php echo $net2ftp_globals["directory_html"]; ?>" />
			<input type="hidden" name="url"       value="<?php echo printPHP_SELF("bookmark"); ?>" />
			<input type="hidden" name="text"      value="net2ftp <?php echo $net2ftp_globals["ftpserver"]; ?>" />
<?php			if ($net2ftp_globals["state"] != "bookmark") { printActionIcon("bookmark", "document.forms['StatusbarForm'].state.value='bookmark';document.forms['StatusbarForm'].submit();"); } ?>
<?php			printActionIcon("refresh",  "window.location.reload();"); ?>
<?php			printActionIcon("help",     "void(window.open('" . $net2ftp_globals["application_rootdir_url"] . "/help.html','Help','location,menubar,resizable,scrollbars,status,toolbar'));"); ?>
<?php			printActionIcon("logout",   "document.forms['StatusbarForm'].state.value='logout';document.forms['StatusbarForm'].submit();"); ?>
			</form>
		</div>
<!-- Template /skins/blue/statusbar.template.php end -->
