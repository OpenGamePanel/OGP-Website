<div>
	<a href="#" id="clearLink" style=""></a>
	<img src="modules/TS3Admin/images/loading.gif" id="loadingImage" style="visibility:hidden;" />
	<img src="modules/TS3Admin/images/spacer.png" width="16" height="16" style="visibility:hidden;" />
	<a href="home.php?m=TS3Admin&token">{$lang.OGP_LANG_head_vserver_token}</a> | <a href="home.php?m=TS3Admin&liveview">{$lang.OGP_LANG_head_vserver_liveview}</a>
</div>

<fieldset class="infoBox" style="width:500px;float:left;"><legend>{$lang.OGP_LANG_vsoverview_virtualserver} #{$data.virtualserver_id} {$lang.OGP_LANG_vsoverview_information_head}</legend>
<table width="100%" border="0" cellspacing="1" cellpadding="3">
	<tr>
		<td colspan="2"><div class="propHeadline"><b>{$lang.OGP_LANG_vsoverview_info_general_head}</b></div></td>
	</tr>
	{if $subusers_installed and $is_parent_user}
		{if $subusers|@is_array}
		<tr>
			<td width="120"><b>{$lang.OGP_LANG_assign_to_subuser}</b></td>
			<td>
			<form method=POST>
			<input type=hidden name=assign_subuser>
			<select name="user_id" onchange="this.form.submit();">
			<option>{$lang.OGP_LANG_select_subuser}</option>
			{foreach from=$subusers item=subuser}
			<option value="{$subuser.user_id}">{$subuser.users_login}</option>
			{/foreach}
			</select>
			</form>
			</td>
		</tr>
		{/if}
		{if $subusers_assigned|@is_array}
		<tr>
			<td width="120"><b>{$lang.OGP_LANG_unassign_from_subuser}</b></td>
			<td>
			<form method=POST>
			<input type=hidden name=unassign_subuser>
			<select name="user_id" onchange="this.form.submit();">
			<option>{$lang.OGP_LANG_select_subuser}</option>
			{foreach from=$subusers_assigned item=subuser}
			<option value="{$subuser.user_id}">{$subuser.users_login}</option>
			{/foreach}
			</select>
			</form>
			</td>
		</tr>
		{/if}
	{/if}
	<tr>
		<td width="120"><b>{$lang.OGP_LANG_vsoverview_info_servername}</b></td>
		<td><span id="virtualserver_name">{$data.virtualserver_name}</span> <a href="javascript:serveredit('virtualserver_name');" class="edit"><img src="modules/TS3Admin/images/edit.png" alt="edit" border="0" /></a></td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_info_host}</b></td>
		<td>{$data.virtualserver_platform} {$data.virtualserver_version}</td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_info_state}</b></td>
		<td><span id="serverstatus" class="{$data.virtualserver_status}">{$data.virtualserver_status}</span>{if $data.virtualserver_status == "online"} - {$lang.OGP_LANG_vsselect_ip}:{$lang.OGP_LANG_vsselect_port} <a href="ts3server://{$display_public_ip}:{$data.virtualserver_port}">{$display_public_ip}:{$data.virtualserver_port}</a>{/if}</td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_info_uptime}</b></td>
		<td><span id="virtualserver_uptime">{$webinterface->parseTime($data.virtualserver_uptime)}</span>  <a href="javascript:serverupdate(new Array('virtualserver_uptime'));" class="edit"><img src="modules/TS3Admin/images/refresh.png" alt="edit" border="0" /></a></td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_info_welcomemsg}</b></td>
		<td><span id="virtualserver_welcomemessage">{$data.virtualserver_welcomemessage}</span> <a href="javascript:serveredit('virtualserver_welcomemessage');" class="edit"><img src="modules/TS3Admin/images/edit.png" alt="edit" border="0" /></a></td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_info_hostmsg}</b></td>
		<td><span id="virtualserver_hostmessage">{$data.virtualserver_hostmessage}</span> <a href="javascript:serveredit('virtualserver_hostmessage');" class="edit"><img src="modules/TS3Admin/images/edit.png" alt="edit" border="0" /></a></td>
	</tr>
	<tr>
		<td><b>&nbsp;&rArr; {$lang.OGP_LANG_vsoverview_info_hostmsg_mode_output}</b></td>
		<td>
			<span id="virtualserver_hostmessage_mode">
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td><input type="radio" name="virtualserver_hostmessage_mode" value="0"{if $data.virtualserver_hostmessage_mode == 0} checked="checked"{/if} onchange="serveredit_enum('virtualserver_hostmessage_mode');" /> {$lang.OGP_LANG_vsoverview_info_hostmsg_mode_0}</td>
						<td><input type="radio" name="virtualserver_hostmessage_mode" value="1"{if $data.virtualserver_hostmessage_mode == 1} checked="checked"{/if} onchange="serveredit_enum('virtualserver_hostmessage_mode');" /> {$lang.OGP_LANG_vsoverview_info_hostmsg_mode_1}</td>
					</tr>
					<tr>
						<td><input type="radio" name="virtualserver_hostmessage_mode" value="2"{if $data.virtualserver_hostmessage_mode == 2} checked="checked"{/if} onchange="serveredit_enum('virtualserver_hostmessage_mode');" /> {$lang.OGP_LANG_vsoverview_info_hostmsg_mode_2}</td>
						<td><input type="radio" name="virtualserver_hostmessage_mode" value="3"{if $data.virtualserver_hostmessage_mode == 3} checked="checked"{/if} onchange="serveredit_enum('virtualserver_hostmessage_mode');" /> {$lang.OGP_LANG_vsoverview_info_hostmsg_mode_3}</td>
					</tr>
				</table>
			</span> 
		</td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_info_req_security}</b></td>
		<td><span id="virtualserver_needed_identity_security_level">{$data.virtualserver_needed_identity_security_level}</span> {$lang.OGP_LANG_vsoverview_info_req_securitylvl}<a href="javascript:serveredit('virtualserver_needed_identity_security_level');" class="edit"><img src="modules/TS3Admin/images/edit.png" alt="edit" border="0" /></a></td>
	</tr>
	
	<tr>
		<td colspan="2"><div class="propHeadline"><b>{$lang.OGP_LANG_vsoverview_info_hostbanner_head}</b></div></td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_info_hostbanner_url}</b></td>
		<td><span id="virtualserver_hostbanner_url">{$data.virtualserver_hostbanner_url}</span> <a href="javascript:serveredit('virtualserver_hostbanner_url');" class="edit"><img src="modules/TS3Admin/images/edit.png" alt="edit" border="0" /></a></td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_info_hostbanner_imgurl}</b></td>
		<td><span id="virtualserver_hostbanner_gfx_url">{$data.virtualserver_hostbanner_gfx_url}</span> <a href="javascript:serveredit('virtualserver_hostbanner_gfx_url');" class="edit"><img src="modules/TS3Admin/images/edit.png" alt="edit" border="0" /></a></td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_info_hostbanner_buttonurl}</b></td>
		<td><span id="virtualserver_hostbutton_url">{$data.virtualserver_hostbutton_url}</span> <a href="javascript:serveredit('virtualserver_hostbutton_url');" class="edit"><img src="modules/TS3Admin/images/edit.png" alt="edit" border="0" /></a></td>
	</tr>
	
	<tr>
		<td colspan="2"><div class="propHeadline"><b>{$lang.OGP_LANG_vsoverview_info_antiflood_head}</b></div></td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_info_antiflood_warning}</b></td>
		<td><span id="virtualserver_antiflood_points_needed_warning">{$data.virtualserver_antiflood_points_needed_warning}</span> {$lang.OGP_LANG_vsoverview_info_antiflood_points} <a href="javascript:serveredit('virtualserver_antiflood_points_needed_warning');" class="edit"><img src="modules/TS3Admin/images/edit.png" alt="edit" border="0" /></a></td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_info_antiflood_kick}</b></td>
		<td><span id="virtualserver_antiflood_points_needed_kick">{$data.virtualserver_antiflood_points_needed_kick}</span> {$lang.OGP_LANG_vsoverview_info_antiflood_points} <a href="javascript:serveredit('virtualserver_antiflood_points_needed_kick');" class="edit"><img src="modules/TS3Admin/images/edit.png" alt="edit" border="0" /></a></td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_info_antiflood_ban}</b></td>
		<td><span id="virtualserver_antiflood_points_needed_ban">{$data.virtualserver_antiflood_points_needed_ban}</span> {$lang.OGP_LANG_vsoverview_info_antiflood_points} <a href="javascript:serveredit('virtualserver_antiflood_points_needed_ban');" class="edit"><img src="modules/TS3Admin/images/edit.png" alt="edit" border="0" /></a></td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_info_antiflood_banduration}</b></td>
		<td><span id="virtualserver_antiflood_ban_time">{$data.virtualserver_antiflood_ban_time}</span> {$lang.OGP_LANG_vsoverview_info_antiflood_in_seconds} <a href="javascript:serveredit('virtualserver_antiflood_ban_time');" class="edit"><img src="modules/TS3Admin/images/edit.png" alt="edit" border="0" /></a></td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_info_antiflood_decrease}</b></td>
		<td><span id="virtualserver_antiflood_points_tick_reduce">{$data.virtualserver_antiflood_points_tick_reduce}</span> {$lang.OGP_LANG_vsoverview_info_antiflood_points_per_tick} <a href="javascript:serveredit('virtualserver_antiflood_points_tick_reduce');" class="edit"><img src="modules/TS3Admin/images/edit.png" alt="edit" border="0" /></a></td>
	</tr>
</table>
</fieldset>


<fieldset class="infoBox" style="width:300px;float:left;"><legend>{$lang.OGP_LANG_vsoverview_virtualserver} #{$data.virtualserver_id} {$lang.OGP_LANG_vsoverview_connection_head}</legend>
<table width="100%" border="0" cellspacing="1" cellpadding="3">
	<tr>
		<td colspan="3"><div class="propHeadline"><b>{$lang.OGP_LANG_vsoverview_conn_total_head}</b> <a href="javascript:serverupdate(new Array('connection_packets_sent_total', 'connection_packets_received_total', 'connection_bytes_sent_total', 'connection_bytes_received_total', 'connection_bandwidth_sent_last_second_total', 'connection_bandwidth_received_last_second_total', 'connection_bandwidth_sent_last_minute_total', 'connection_bandwidth_received_last_minute_total'));" class="edit"><img src="modules/TS3Admin/images/refresh.png" alt="edit" border="0" /></a></div></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><span class="small italic">{$lang.OGP_LANG_vsoverview_conn_total_send}</span></td>
		<td><span class="small italic">{$lang.OGP_LANG_vsoverview_conn_total_received}</span></td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_conn_total_packets}</b></td>
		<td><span id="connection_packets_sent_total">{$data.connection_packets_sent_total}</span></td>
		<td><span id="connection_packets_received_total">{$data.connection_packets_received_total}</span></td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_conn_total_bytes}</b></td>
		<td><span id="connection_bytes_sent_total">{$webinterface->convertByteToMB($data.connection_bytes_sent_total)}</span> <span class="small">MB</span></td>
		<td><span id="connection_bytes_received_total">{$webinterface->convertByteToMB($data.connection_bytes_received_total)}</span> <span class="small">MB</span></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3"><div class="propHeadline"><b>{$lang.OGP_LANG_vsoverview_conn_bandwidth_head}</b></div></td>
	</tr>
	<tr>
		<td><span class="small italic">{$lang.OGP_LANG_vsoverview_conn_bandwidth_last}</span></td>
		<td><span class="small italic">{$lang.OGP_LANG_vsoverview_conn_bandwidth_send}</span></td>
		<td><span class="small italic">{$lang.OGP_LANG_vsoverview_conn_bandwidth_received}</span></td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_conn_bandwidth_second}</b></td>
		<td><span id="connection_bandwidth_sent_last_second_total">{$webinterface->convertByteToKB($data.connection_bandwidth_sent_last_second_total)}</span> <span class="small">kB</span></td>
		<td><span id="connection_bandwidth_received_last_second_total">{$webinterface->convertByteToKB($data.connection_bandwidth_received_last_second_total)}</span> <span class="small">kB</span></td>
	</tr>
	<tr>
		<td><b>{$lang.OGP_LANG_vsoverview_conn_bandwidth_minute}</b></td>
		<td><span id="connection_bandwidth_sent_last_minute_total">{$webinterface->convertByteToKB($data.connection_bandwidth_sent_last_minute_total)}</span> <span class="small">kB/s</span></td>
		<td><span id="connection_bandwidth_received_last_minute_total">{$webinterface->convertByteToKB($data.connection_bandwidth_received_last_minute_total)}</span> <span class="small">kB/s</span></td>
	</tr>
</table>
</fieldset>
