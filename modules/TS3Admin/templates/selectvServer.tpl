<div>
	<a href="#" id="clearLink" style=""></a>
	<img src="modules/TS3Admin/images/loading.gif" id="loadingImage" style="visibility:hidden;" />
</div>		
<form action="home.php?m=TS3Admin" method="post">
	<table border="0" cellspacing="1" cellpadding="0">
		<tr>
			<td>&nbsp;</td>
			<td class="table0"><b>{$lang.OGP_LANG_vsselect_id}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vsselect_name}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vsselect_ip}:{$lang.OGP_LANG_vsselect_port}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vsselect_state}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vsselect_clients}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vsselect_uptime}</b></td>
		</tr>
{foreach from=$selectvServer item=curvServer}
		<tr class="{cycle values="table2,table1"}">
			<td><input type="radio" name="vserver" value="{$curvServer.virtualserver_id}" /></td>
			<td>{$curvServer.virtualserver_id}</td>
			<td>{$curvServer.virtualserver_name}</td>
			<td>{$display_public_ip}:{$curvServer.virtualserver_port}</td>
			<td><span id="serverstatus{$curvServer.virtualserver_id}" class="{if $curvServer.virtualserver_status=="none"}offline{else}{$curvServer.virtualserver_status}{/if}">{if $curvServer.virtualserver_status=="none"}offline{else}{$curvServer.virtualserver_status}{/if}</span></td>
			<td>{$curvServer.virtualserver_clientsonline}/{$curvServer.virtualserver_maxclients}</td>
			<td><!--'.TS3webinterface::parseTime($data[$i]['virtualserver_uptime']).'--><!--{$curvServer.virtualserver_uptime}-->{$webinterface->parseTime($curvServer.virtualserver_uptime)}</td>
		</tr>
{/foreach}
	</table>
	<br /><br />
	<span style="border-top:1px solid #CCCCCC;padding-top:13px;">
		<input type="submit" name="vserverSubmit" value="{$lang.OGP_LANG_vsselect_choose}" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="startvServer" onclick="setvserverstate('START');" value="{$lang.OGP_LANG_vsselect_start}" />&nbsp;&nbsp;<input type="button" name="stopvServer" onclick="setvserverstate('STOP');" value="{$lang.OGP_LANG_vsselect_stop}" />
	</span>
</form>
<br />
