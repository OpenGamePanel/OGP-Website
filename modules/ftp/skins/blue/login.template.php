<?php defined("NET2FTP") or die("Direct access to this location is not allowed."); ?>
<!-- Template /skins/iphone/login.template.php begin -->
<form id="LoginForm" action="" method="post" onsubmit="return CheckInput(this);">
<div style="display: table; width:100%;">
	<div style="display: table-cell; text-align: left; font-weight: bold;">
		Open Game Panel FTP Client
	</div>
	<div style="display: table-cell; text-align: right;">
	Change Language to: <?php printLanguageSelect("language", $language_onchange, "width: 90px;", ""); ?><input type="submit"/>
	</div>
</div>
</form>
<div class="page">
<?php 	
$home_id = $_GET['home_id'];
$user_homes = $_SESSION['user_homes'];
$isAdmin = $_SESSION['isAdmin'];
foreach($user_homes as $ftp_info)
{
	if($ftp_info['home_id'] == $home_id OR !$home_id)
	{
		if( $isAdmin )
		{
			$access_rights = true;
		}
		else
		{
			if( preg_match("/t/",$ftp_info['access_rights']) > 0 )
				$access_rights = true;
			else
				$access_rights = false;
		}
		$ftp_login = isset($ftp_info['ftp_login']) ? $ftp_info['ftp_login'] : $ftp_info['home_id'];
		$isFtpEnabled = $ftp_info['ftp_status'] == 1 ? TRUE : FALSE;
		$ftp_ip = empty($ftp_info['ftp_ip']) ? $ftp_info['agent_ip'] : $ftp_info['ftp_ip'];
		$display_ip = checkDisplayPublicIP($ftp_info['display_public_ip'],$ftp_ip);

		?><table style="text-align:center;width:100%;border:1px solid black;background-image:url(../../themes/Revolution/images/wrapper-bg.png);">
			<tr>
			  <td colspan="3">
				<h1><?php echo htmlentities($ftp_info['home_name']); ?></h1>
			  </td>
			</tr>
			<?php
		if ( $access_rights && $isFtpEnabled )
		{
		?>
			<tr>
			  <td colspan="3">
			    <table>
				  <tr  >
			        <td style='width: 50%;'>
				      <?php echo "".__("FTP server").":</td><td style='width: 50%;'><input type='text' readonly='readonly' size='26' onclick='select()' value='".$display_ip.":".$ftp_info['ftp_port']."'/></td></tr><tr><td>".__("Username").":</td><td><input type='text' readonly='readonly' size='26' onclick='select()' value=\"".str_replace('"', "&quot;", $ftp_login)."\"/></td></tr><tr><td>".__("Password").":</td><td><input type='text' readonly='readonly' size='26' onclick='select()' value=\"".str_replace('"', "&quot;", $ftp_info['ftp_password'])."\"/>"; ?>
			        </td>
				  </tr>
				</table>
			  </td>
			</tr>
			<tr>
				<?php
				echo "<td><a style='text-decoration:none;color:black;' href=\"ftp://".str_replace('"', "&quot;", $ftp_login).":".str_replace('"', "&quot;", $ftp_info['ftp_password'])."@".$ftp_ip.":".$ftp_info['ftp_port']."\" TARGET='_blank'><img style='border:1px solid transparent' width=64px src='../../images/ftp.png'/><br><b>FTP Link</b></a></td>";
				?>
			</tr>
			<tr>
			  <td colspan="3">
				<form id="LoginForm" action="<?php echo $net2ftp_globals["action_url"]; ?>" method="post" onsubmit="return CheckInput(this);">
				<input type="hidden" name="language" value="<?php echo $_POST['language']; ?>">
				<input type="hidden" name="ftpserverport" value="<?php echo $ftp_info['ftp_port']; ?>">
				<input type="hidden" name="ftpserver" value="<?php echo $ftp_ip; ?>">
				<input type="hidden" name="username" value="<?php echo $ftp_login; ?>" autocorrect="off" autocapitalize="off" style="width: 80%;" />
				<input type="hidden" name="password" value="<?php echo $ftp_info['ftp_password']; ?>" autocorrect="off" autocapitalize="off" style="width: 80%;" />
				<input type="hidden" name="directory" value="/">
				<input type="hidden" name="state" value="browse" />
				<input type="hidden" name="state2" value="main" />
				<input type="submit" value="<?php echo __("Login"); ?>" style="margin-bottom: 30px; margin-top: 10px;" />
				</form>
			  </td>
			</tr><?php
		}
		else
		{
			?>
			<tr>
			  <td colspan="3">
			    <center>
			    <b style="color:red;">There Is No Login Available For This Game Server.</b><br><br>
				</center>
			  </td>
			</tr>
			<?php
		}
		
		?></table><?php
	}
}
?>
</div>
<?php require_once($net2ftp_globals["application_skinsdir"] . "/" . $net2ftp_globals["skin"] . "/footer.template.php"); ?>
<!-- Template /skins/iphone/login.template.php end -->

