<script src="modules/TS3Admin/webinterface.js" type="text/javascript"></script>
<body onload="onLoad();{if $liveviewAutoUpdate == true}liveViewUpdateInterval = setInterval('serverViewUpdate(false)', 10000);{/if}">
<div id="jsMsg" style="display:none;">
	<span id="js_error">{$lang.OGP_LANG_js_error}</span>
	<span id="js_ajax_error">{$lang.OGP_LANG_js_ajax_error}</span>
	<span id="js_confirm_server_stop" title="{$lang.OGP_LANG_js_confirm_server_stop}"></span>
	<span id="js_confirm_server_delete" title="{$lang.OGP_LANG_js_confirm_server_delete}"></span>
	<span id="js_notice_server_deleted" title="{$lang.OGP_LANG_js_notice_server_deleted}"></span>
	<span id="js_prompt_banduration" title="{$lang.OGP_LANG_js_prompt_banduration}"></span>
	<span id="js_prompt_banreason" title="{$lang.OGP_LANG_js_prompt_banreason}"></span>
	<span id="js_prompt_msg_to" title="{$lang.OGP_LANG_js_prompt_msg_to}"></span>
	<span id="js_prompt_poke_to" title="{$lang.OGP_LANG_js_prompt_poke_to}"></span>
	<span id="js_prompt_new_propvalue" title="{$lang.OGP_LANG_js_prompt_new_propvalue}"></span>
</div>
<!--[if IE]>
Attention: Internet Explorer is not completely supported.
<![endif]-->
