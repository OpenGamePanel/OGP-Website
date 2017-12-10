<div>
	<a href="#" id="clearLink" style=""></a>
	<img src="modules/TS3Admin/images/loading.gif" id="loadingImage" style="visibility:hidden;" />
	<img src="modules/TS3Admin/images/spacer.png" width="16" height="16" style="visibility:hidden;" />
	<a href="home.php?m=TS3Admin&">{$lang.OGP_LANG_head_vserver_overview}</a> | <a href="home.php?m=TS3Admin&liveview">{$lang.OGP_LANG_head_vserver_liveview}</a>
</div>

<fieldset class="infoBox" style="width:800px;"><!--float:left;--><legend>{$lang.OGP_LANG_vstoken_token_virtualserver} #{$data.virtualserver_id} {$lang.OGP_LANG_vstoken_token_head}</legend>
	<table width="100%" border="0" cellspacing="1" cellpadding="3">
		<tr>
			<td class="table0"><b>{$lang.OGP_LANG_vstoken_token_type}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vstoken_token_id1}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vstoken_token_id2}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vstoken_token_tokencode}</b></td>
			<td class="table0"><b>{$lang.OGP_LANG_vstoken_token_delete}</b></td>
		</tr>
{if $tokenList != false}
{foreach from=$tokenList item=token}
		<tr id="tokenRow_{$token.token}" class="{cycle values="table2,table1"}">
			<td>{if $token.token_type == 1}{$lang.OGP_LANG_vstoken_new_tokentype_1}{else}{$lang.OGP_LANG_vstoken_new_tokentype_0}{/if}</td>
			<td>{if $token.token_type == 1}{$channelGroupListNames[$token.token_id1].name}{else}{$serverGroupListNames[$token.token_id1].name}{/if} ({$token.token_id1})</td>
			<td>{if $token.token_type == 1}{$channelListNames[$token.token_id2].channel_name} ({$token.token_id2}){/if}</td>
			<td>{$token.token}</td>
			<td align="center"><a href="javascript:deleteToken('{$token.token}');"><img src="modules/TS3Admin/images/delete.png" alt="delete" border="0" /></a></td>
		</tr>
{/foreach}
{/if}
	</table>
	<br /><a href="javascript:location.href='home.php?m=TS3Admin&token';"><img src="modules/TS3Admin/images/refresh.png" alt="reload" border="0" /></a>
</fieldset>


<fieldset style="width:220px;"><legend>{$lang.OGP_LANG_vstoken_new_head}</legend>
{if !empty($addToken)}
	{if $addToken[0]|upper == "ERROR"}
		<p>{$lang.OGP_LANG_error} {$addToken[1]}: {$addToken[2]}</p>
	{else}
		<p>
			{$lang.OGP_LANG_vstoken_new_added_ok}
		</p>
	{/if}
{/if}
	<form action="home.php?m=TS3Admin&token&do=addtoken" method="post">
		{$lang.OGP_LANG_vstoken_new_tokentype}<br />
		<select name="tokentype" onchange="changeTokenType(this);">
			<option value="-1" selected="selected"></option>
			<option value="0">{$lang.OGP_LANG_vstoken_new_servergroup}</option>
			<option value="1">{$lang.OGP_LANG_vstoken_new_channelgroup}</option>
		</select><br />
		
		<div id="tokentype0" style="display:none;">
			<p><br />
				{$lang.OGP_LANG_vstoken_new_select_group}<br />
				<select name="tokenid1_0">
{foreach from=$serverGroupList item=serverGroup}{if $serverGroup.type == 1}
					<option value="{$serverGroup.sgid}">{$serverGroup.name}</option>
{/if}{/foreach}
				</select>
				<input type="hidden" name="tokenid2_0" value="0" />
			</p>
		</div>
		
		<div id="tokentype1" style="display:none;">
			<p><br />
				{$lang.OGP_LANG_vstoken_new_select_channelgroup}<br />
				<select name="tokenid1_1">
{foreach from=$channelGroupList item=channelGroup}{if $channelGroup.type == 1}
					<option value="{$channelGroup.cgid}">{$channelGroup.name}</option>
{/if}{/foreach}
				</select>
				<br /><br />
				{$lang.OGP_LANG_vstoken_new_select_channel}<br />
				<select name="tokenid2_1">
{foreach from=$channelList item=channel}
					<option value="{$channel.cid}">{$channel.channel_name}</option>
{/foreach}
				</select>
			</p>
		</div>
		<br />
		<input type="submit" name="tokenAddSubmit" id="tokenAddSubmit" value="{$lang.OGP_LANG_vstoken_new_create}" disabled="disabled" />
	</form>
</fieldset>
