<?php defined("NET2FTP") or die("Direct access to this location is not allowed."); ?>
<!-- Template /skins/shinra/bookmark1.template.php begin -->

<?php if       ($net2ftp_globals["browser_agent"] == "Chrome") { ?>
<?php 	echo __("Drag and drop one of the links below to the bookmarks bar"); ?>
<?php } elseif ($net2ftp_globals["browser_agent"] == "IE") { ?>
<?php 	echo __("Right-click on one of the links below and choose \"Add to Favorites...\""); ?>
<?php } elseif ($net2ftp_globals["browser_agent"] == "Safari") { ?>
<?php 	echo __("Right-click on one the links below and choose \"Add Link to Bookmarks...\""); ?>
<?php } elseif ($net2ftp_globals["browser_agent"] == "Opera") { ?>
<?php 	echo __("Right-click on one of the links below and choose \"Bookmark link...\""); ?>
<?php } else { ?>
<?php 	echo __("Right-click on one of the links below and choose \"Bookmark This Link...\""); ?>
<?php } ?>
<br /><br />
<ul>
<li>
	<?php echo __("One click access (net2ftp won't ask for a password - less safe)"); ?> <a href="<?php echo $url_withpw; ?>"><?php echo $text; ?></a>
	<br /><br />
</li>
<li>
	<?php echo __("Two click access (net2ftp will ask for a password - safer)"); ?> <a href="<?php echo $url_withoutpw; ?>"><?php echo $text; ?></a><br />
	<?php echo __("Note: when you will use this bookmark, a popup window will ask you for your username and password."); ?><br />
	<br /><br />
</li>
</ul>

<!-- Template /skins/shinra/bookmark1.template.php end -->
