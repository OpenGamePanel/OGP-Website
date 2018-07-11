	<table width="100%" border="0" cellspacing="1" cellpadding="3">
		<tr>
			<td class="table0"><b>{$lang.OGP_LANG_vsoverview_banlist_id}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vsoverview_banlist_ip}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vsoverview_banlist_name}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vsoverview_banlist_uid}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vsoverview_banlist_reason}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vsoverview_banlist_created}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vsoverview_banlist_duration}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vsoverview_banlist_end}</b></td>
			<td class="table0">&nbsp;</td>
		</tr>
{if !empty($banList[0].banid)}
{section loop=$banList name=ban}
		<tr id="banRow_{$banList[ban].banid}" class="{cycle values="table2,table1"}">
			<td>{$banList[ban].banid}</td>
			<td>{$banList[ban].ip|replace:"\\":""}</td>
			<td>{$banList[ban].name}</td>
			<td>{$banList[ban].uid}</td>
			<td>{$banList[ban].reason}</td>
			<td>{$webinterface->parseDate($banList[ban].created, 0, 'r')}</td>
			<td>{if $banList[ban].duration > 0}{$banList[ban].duration}{else}{$lang.OGP_LANG_vsoverview_banlist_unlimited}{/if}</td>
			<td>{if $banList[ban].duration > 0}{$webinterface->parseDate($banList[ban].created, $banList[ban].duration, 'r')}{else}{$lang.OGP_LANG_vsoverview_banlist_never}{/if}</td>
			<td align="center"><a href="javascript:deleteBan({$banList[ban].banid});"><img src="modules/TS3Admin/images/delete.png" alt="delete" border="0" /></a></td>
		</tr>
{/section}
{/if}
	</table>

