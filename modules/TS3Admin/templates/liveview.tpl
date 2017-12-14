	
{section loop=$serverTree name=tree}{if $serverTree[tree].is_server == true}<div class="table0"><a href="javascript:sendMsg({$serverTree[tree].cid}, 3);" style="float:right;"><img src="modules/TS3Admin/images/viewer/16x16_channel_chat.png" class="viewer" border="0" title="Send Message" /></a><img src="modules/TS3Admin/images/viewer/16x16_server_green.png" width="16" height="16" class="viewer" /> <b>{$serverTree[tree].channel_name}</b></div>{else}
		<div class="{cycle values="table2,table1"}">
			<span style="float:right;">
				
			</span>
			{section loop=$serverTree[tree].draw_before name=line}<img src="modules/TS3Admin/images/viewer/{$serverTree[tree].draw_before[line]}.png" width="16" height="16" class="viewer" />{/section}<img src="modules/TS3Admin/images/viewer/line_{$serverTree[tree].mode}.png" width="16" height="16" class="viewer" /><img src="modules/TS3Admin/images/viewer/16x16_channel_green.png" width="16" height="16" class="viewer" /> {$serverTree[tree].channel_name} <a href="javascript:sendMsg({$serverTree[tree].cid}, 2);"><img src="modules/TS3Admin/images/viewer/16x16_channel_chat.png" class="viewer" border="0" title="Send Message" /></a><span class="serverview_channel" style="display:none;"><a href="javascript:moveToChan({$serverTree[tree].cid});"><img src="modules/TS3Admin/images/viewer/larrow.png" class="viewer" border="0" title="{$lang.OGP_LANG_vsliveview_liveview_tooltip_to_channel}{$serverTree[tree].cid}" /></a></span>
{section loop=$serverTree[tree].clients name=client}{if $serverTree[tree].clients[client].client_type == 0}
			<div id="serverview_client_{$serverTree[tree].clients[client].clid}" class="{cycle values="table2,table1"}">
				<span style="float:right;">
					<span class="serverview_client">
						<a href="javascript:setUserMoveToChan({$serverTree[tree].clients[client].clid});"><img src="modules/TS3Admin/images/viewer/rarrow.png" class="viewer" border="0" title="{$lang.OGP_LANG_vsliveview_liveview_tooltip_switch}" /></a>
						<a href="javascript:sendMsg({$serverTree[tree].clients[client].clid}, 1);"><img src="modules/TS3Admin/images/viewer/16x16_player_chat.png" class="viewer" border="0" title="{$lang.OGP_LANG_vsliveview_liveview_tooltip_send_msg}" /></a>
						<a href="javascript:poke({$serverTree[tree].clients[client].clid});"><img src="modules/TS3Admin/images/viewer/16x16_poke.png" class="viewer" border="0" title="{$lang.OGP_LANG_vsliveview_liveview_tooltip_poke}" /></a>
						<a href="javascript:kickClient({$serverTree[tree].clients[client].clid});"><img src="modules/TS3Admin/images/viewer/16x16_delete.png" width="16" height="16" class="viewer" border="0" title="{$lang.OGP_LANG_vsliveview_liveview_tooltip_kick}" /></a>
						<a href="javascript:banClient({$serverTree[tree].clients[client].clid});"><img src="modules/TS3Admin/images/viewer/16x16_ban_client.png" width="16" height="16" class="viewer" border="0" title="{$lang.OGP_LANG_vsliveview_liveview_tooltip_ban}" /></a>
					</span>
					<a href="javascript:backMoveToChan({$serverTree[tree].clients[client].clid});" style="display:none;" id="serverview_client_back_{$serverTree[tree].clients[client].clid}" class="serverview_client_back"><img src="modules/TS3Admin/images/viewer/back.png" class="viewer" border="0" /></a>
				</span>
			{section loop=$serverTree[tree].draw_before name=line}<img src="modules/TS3Admin/images/viewer/{$serverTree[tree].draw_before[line]}.png" width="16" height="16" class="viewer" />{/section}{if !isset($smarty.section.loop.last) || $smarty.section.loop.last == "line_t"}<img src="modules/TS3Admin/images/viewer/line_i.png" width="16" height="16" class="viewer" />{else}<img src="modules/TS3Admin/images/viewer/spacer.png" width="16" height="16" class="viewer" />{/if}{if isset($serverTree[tree].clients[client.index_next])}<img src="modules/TS3Admin/images/viewer/line_t.png" width="16" height="16" class="viewer" />{elseif isset($serverTree[tree.index_next]) && $serverTree[tree.index_next].pid == $serverTree[tree].cid}<img src="modules/TS3Admin/images/viewer/line_t.png" width="16" height="16" class="viewer" />{else}<img src="modules/TS3Admin/images/viewer/line_l.png" width="16" height="16" class="viewer" />{/if}<img src="modules/TS3Admin/images/viewer/{$serverTree[tree].clients[client].status_img}.png" width="16" height="16" class="viewer" /> <b>{$serverTree[tree].clients[client].client_nickname}</b></div>
{/if}{/section}
		</div>
{/if}{/section}
	
