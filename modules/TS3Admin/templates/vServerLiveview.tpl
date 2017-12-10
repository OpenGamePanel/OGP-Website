<div>
	<a href="#" id="clearLink" style=""></a>
	<img src="modules/TS3Admin/images/loading.gif" id="loadingImage" style="visibility:hidden;" />
	<img src="modules/TS3Admin/images/spacer.png" width="16" height="16" style="visibility:hidden;" />
	<a href="home.php?m=TS3Admin">{$lang.OGP_LANG_head_vserver_overview}</a> | <a href="home.php?m=TS3Admin&token">{$lang.OGP_LANG_head_vserver_token}</a>
</div>

<span style="float:left;">
	<fieldset class="infoBox" style="width:320px;"><!--float:left;--><legend>{$lang.OGP_LANG_vsliveview_server_virtualserver} #{$data.virtualserver_id} {$lang.OGP_LANG_vsliveview_server_head}</legend>
		<!--not implemented ;) but backup works!-->
		<div id="serverview">
	{include file='liveview.tpl'}
		</div>
		<input type="hidden" name="liveViewSelection" id="liveViewSelection" />
		<br />
		<input type="checkbox" name="liveViewAutoUpdateActivated" id="liveViewAutoUpdateActivated" /> {$lang.OGP_LANG_vsliveview_liveview_enable_autorefresh}
		&nbsp;&nbsp;&nbsp;<a href="javascript:serverViewUpdate(true);document.getElementById('clearLink').focus();"><img src="modules/TS3Admin/images/refresh.png" alt="reload" border="0" /></a>
	</fieldset>
	<fieldset style="width:320px;"><legend>{$lang.OGP_LANG_vsliveview_channelbackup_head}</legend>
		<p>
			<form action="home.php?m=TS3Admin&getchannelbackup&type=cleared" method="post" target="_blank">
				<input type="submit" value="{$lang.OGP_LANG_vsliveview_channelbackup_get}" />
			</form>
		</p><br />
		<hr />
	{if !empty($insertResult)}
		{if $insertResult[0]|upper == "ERROR"}
			<p>{$lang.OGP_LANG_error} {$insertResult[1]}: {$insertResult[2]}</p>
		{else}
			<p>
				{$lang.OGP_LANG_vsliveview_channelbackup_new_added_ok}
			</p>
		{/if}
	{/if}
		<p>
			<h3>{$lang.OGP_LANG_vsliveview_channelbackup_load}</h3>
			<form action="home.php?m=TS3Admin&liveview&do=loadbackup" method="post" enctype="multipart/form-data">
				<input type="file" name="backup" accept="text/plain" style="width:200px;" /><br /><br />
				<input type="submit" name="loadChannelBackupSubmit" value="{$lang.OGP_LANG_vsliveview_channelbackup_load_submit}" />
			</form>
		</p>
	</fieldset>
</span>


<fieldset class="infoBox" style="width:700px;"><legend>{$lang.OGP_LANG_vsoverview_banlist_head}</legend>
	<div id="banlist">
	{include file='banlist.tpl'}
	</div>
	<br /><a href="javascript:banListUpdate();document.getElementById('clearLink').focus();"><img src="modules/TS3Admin/images/refresh.png" alt="reload" border="0" /></a>
</fieldset>
<fieldset class="infoBox" style="width:310px;"><legend>{$lang.OGP_LANG_vsoverview_banlist_new_head}</legend>
	<table>
		<tr>
			<td><b>{$lang.OGP_LANG_vsoverview_banlist_ip}</b></td>
			<td><input type="text" name="newBanIP" id="newBanIP" value="" style="width:140px;" /></td>
		</tr>
		<tr>
			<td><b>{$lang.OGP_LANG_vsoverview_banlist_name}</b></td>
			<td><input type="text" name="newBanName" id="newBanName" value="" style="width:140px;" /></td>
		</tr>
		<tr>
			<td><b>{$lang.OGP_LANG_vsoverview_banlist_uid}</b></td>
			<td><input type="text" name="newBanUID" id="newBanUID" value="" style="width:200px;" /></td>
		</tr>
		<tr>
			<td><b>{$lang.OGP_LANG_vsoverview_banlist_reason}</b></td>
			<td><input type="text" name="newBanReason" id="newBanReason" value="" style="width:200px;" /></td>
		</tr>
		<tr>
			<td><b>{$lang.OGP_LANG_vsoverview_banlist_duration}</b></td>
			<td>
				<input type="text" name="newBanDuration" id="newBanDuration" value="" style="width:50px;" />&nbsp;
				<select name="newBanDurationMode" id="newBanDurationMode" onchange="if(this.selectedIndex==0) document.getElementById('newBanDuration').disabled=true;else document.getElementById('newBanDuration').disabled=false;">
					<option value="0">{$lang.OGP_LANG_vsoverview_banlist_unlimited}</option>
					<option value="1">{$lang.OGP_LANG_time_seconds}</option>
					<option value="60" selected="selected">{$lang.OGP_LANG_time_minutes}</option>
					<option value="3600">{$lang.OGP_LANG_time_hours}</option>
					<option value="86400">{$lang.OGP_LANG_time_days}</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="button" value="{$lang.OGP_LANG_vsoverview_banlist_new_create}" onclick="addBan();" /></td>
		</tr>
	</table>
</fieldset>
<br class="clear" />
