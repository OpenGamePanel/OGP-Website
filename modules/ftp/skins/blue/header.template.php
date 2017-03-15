<?php defined("NET2FTP") or die("Direct access to this location is not allowed."); ?>
<!-- Template /skins/shinra/header.template.php begin -->

	<!-- WRAPPER -->
	<div id="wrapper">
			
		<!-- HEADER -->
		<div id="header">

			<img id="logo" src="skins/blue/images/img/logo.png" alt="net2ftp" />

		</div>
		<!-- ENDS HEADER -->
			
		<!-- MAIN -->
		<div id="main" style="display: table; margin-left: auto; margin-right: auto;">

			<!-- content -->
			<div id="content">
				
				<!-- title -->
				<div id="page-title">
					<span class="title"><?php echo $net2ftp_globals["ftpserver"]; ?></span>
					<div style="text-align: right; margin-top: 10px;">
						<form id="StatusbarForm" method="post" action="<?php echo $net2ftp_globals["action_url"]; ?>">
<?php						printLoginInfo(); ?>
						<input type="hidden" name="state"         value="browse" />
						<input type="hidden" name="state2"        value="main" />
						<input type="hidden" name="directory"     value="<?php echo $net2ftp_globals["directory_html"]; ?>" />
						<input type="hidden" name="url_withpw"    value="<?php echo printPHP_SELF("bookmark_withpw"); ?>" />
						<input type="hidden" name="url_withoutpw" value="<?php echo printPHP_SELF("bookmark_withoutpw"); ?>" />
						<input type="hidden" name="text"          value="net2ftp <?php echo $net2ftp_globals["ftpserver"]; ?>" />
<?php						if ($net2ftp_globals["state"] != "bookmark") { printActionIcon("bookmark", "document.forms['StatusbarForm'].state.value='bookmark';document.forms['StatusbarForm'].submit();"); } ?>
<?php						if (getBrowser("agent") != "Chrome")         { printActionIcon("refresh",  "window.location.reload();"); } ?>
<?php						printActionIcon("help",     "void(window.open('" . $net2ftp_globals["application_rootdir_url"] . "/modules/help/help-user.html','Help','location,menubar,resizable,scrollbars,status,toolbar'));"); ?>
<?php						printActionIcon("logout",   "document.forms['StatusbarForm'].state.value='logout';document.forms['StatusbarForm'].submit();"); ?>
						</form>
					</div>
				</div>
				<!-- ENDS title -->

<!-- Template /skins/shinra/header.template.php end -->
