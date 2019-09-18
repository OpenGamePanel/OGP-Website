$(document).ready(function(){
    wireClicks();
    animateProgressBars();
    toggleEvents();
});

function wireClicks(){
	$("span.versionInfo").click(function(e){
		handleVersionClick();
	});
	
	$(".getAPILinks").click(function(e){
		showAPILinks($(this));
	});
	
	$(".serverIdToggle").click(function(e){
		showHideServerIDShow($(this));
	});
}

function showHideServerIDShow(linkElem){
	if($(".serverId:visible").length){
		$(".serverId").removeClass('hide').addClass('hide');
		$(linkElem).text($(linkElem).attr('showtext'));
		$("tr.expand-child").each(function(e){
			$("td:first", $(this)).attr('colspan', Number($("td:first", $(this)).attr('colspan')) - 1);
		}); 
	}else{
		$(".serverId").removeClass('hide');
		$(linkElem).text($(linkElem).attr('hidetext'));
		$("tr.expand-child").each(function(e){
			$("td:first", $(this)).attr('colspan', Number($("td:first", $(this)).attr('colspan')) + 1);
		}); 
	}
}

function animateProgressBars(){
	var percent = 0;
	$(".progress-bar").each(function() {
		percent = $(this).attr("data");
		if(percent){
			$(this).animate({
				width: percent + "%"
			});
		}
	});
}

function showAPILinks(elem){
	$("div.mangificWrapper .magnificTitle").text(getLang('api_links'));
	
	var apiToken = elem.attr('token');
	var ipAddr = elem.attr('ip');
	var port = elem.attr('port');
	var modKey = elem.attr('modkey');
	var panelURL = elem.attr('panelurl');
	
	if(apiToken && ipAddr && port && modKey && panelURL){
		
		var actions = new Array(
			{url: 'ogp_api.php?gamemanager/start', lang: 'start_server'}, 
			{url: 'ogp_api.php?gamemanager/stop', lang: 'stop_server'},
			{url: 'ogp_api.php?gamemanager/restart', lang: 'restart_server'}
		); 
		
		
		var hasRcon = elem.attr('hasrcon');
		if(hasRcon && hasRcon === 'true'){
			actions.push({url: 'ogp_api.php?gamemanager/rcon', lang: 'rcon_command_title', additional: '&command={YOUR_RCON_COMMAND}'});
		}
		
		var isSteam = elem.attr('hassteam');
		if(isSteam && isSteam === 'true'){
			actions.push({url: 'ogp_api.php?gamemanager/update', lang: 'get_steam_autoupdate_api_link', additional: '&type=steam', selected: true});
		}
		
		var selectListHTML = '<select class="ogpAPIActions">';
		for(var i = 0; i < actions.length; i++){
			selectListHTML += '<option value="' + actions[i]["url"] + '" ' + (actions[i].hasOwnProperty('additional') && actions[i].additional ? 'additional="' + actions[i].additional + '"' : '') + ' ' + (actions[i].hasOwnProperty('selected') && actions[i]["selected"] && actions[i]["selected"] == true ? 'selected' : '') + '>' + getLang(actions[i]["lang"]) + '</option>'; 
		}
		selectListHTML += '</select>';
	
		$("div.mangificWrapper .magnificContentsDiv").html(decodeEntities(getLang('api_links_popup_html')) + '<p>' + getLang('actions') +':&nbsp; ' + selectListHTML + '</p><p><input class="updateLink" style="width: 75%;" type="text" value=""><button class="copyButton">' + $(elem).attr('copyme') + '</button>&nbsp; <span class="copyStatus"></span></p>');
			
		showPopup(function(){
			$(".ogpAPIActions").change(function(e){
				var newActionValue = $(this).val();
				var apiURL = panelURL + '/' + newActionValue + '&token=' + apiToken + '&ip=' + ipAddr + '&port=' + port + '&mod_key=' + modKey;
				var additionalParamsToAdd = $('option:selected', $(this)).attr('additional');
				if(additionalParamsToAdd){
					apiURL += additionalParamsToAdd;
				}
				$("input.updateLink").val(apiURL);
			});
			
			$("input.updateLink").click(function(e){
				$(this).select();
			});
			
			$(".copyButton").click(function(e){
				copyInput($("input.updateLink"), $("span.copyStatus"), elem);
			});
			
			copyInput($("input.updateLink"), $("span.copyStatus"), elem);
			
			$(".ogpAPIActions").trigger('change');
		});
	}
}

function copyInput(input, resultArea, elemWithAttr){
	input.select();
	var successful = document.execCommand('copy');
	var msg = successful ? 'successful' : 'unsuccessful';
	logToConsole('Copying text command was ' + msg);
	if(successful){
		$(resultArea).text($(elemWithAttr).attr('copysuccess')).fadeIn('fast').delay(500).fadeOut('slow').delay(500).fadeIn('slow').delay(500).fadeOut('slow').delay(500).fadeIn('fast').delay(2000).fadeIn('fast').fadeOut('slow');
	}else{
		$(resultArea).text($(elemWithAttr).attr('copyfail')).fadeIn('fast').delay(500).fadeOut('slow').delay(500).fadeIn('slow').delay(500).fadeOut('slow').delay(500).fadeIn('fast').delay(2000).fadeIn('fast').fadeOut('slow');
	}
}

function showPopup(onOpen, onClose){
	$.magnificPopup.open({
		items: {
			src: $("div.mangificWrapper div.white-popup"),
			type: 'inline'
		},
		callbacks: {
			close: function() {
				cleanupPopup();
				if(!isUndefinedOrEmptyValue(onClose) && jQuery.isFunction(onClose)){
					onClose();
				}
			},
			open: function() {
				if(!isUndefinedOrEmptyValue(onOpen) && jQuery.isFunction(onOpen)){
					onOpen();
				}
			}
		}
	});
}

function cleanupPopup(){
	$("div.mangificWrapper .magnificTitle").text('');
	$("div.mangificWrapper .magnificContentsDiv").html('');
}

function handleVersionClick(){
	if($("span.versionNumber").hasClass("hide")){
		$("span.versionNumber").removeClass("hide");
		$("span.version").removeClass("hide");
			
		// Copy the value of the version if their browser supports it
		$(document.body).append("<input class='tempCopyValue hide' type='text' value='" + $("span.versionNumber").text() + "' />");
		try {
			$("input.tempCopyValue").removeClass("hide");
			$("input.tempCopyValue").select();
			var successful = document.execCommand('copy');
			$("input.tempCopyValue").remove();
			var msg = successful ? 'successful' : 'unsuccessful';
			logToConsole('Copying text command was ' + msg);
			if(successful){
				$("span.copyVersionResult").text($("span.copyVersionResult").attr('lang')).css("color", "#43ff0f").removeClass("hide");
				$("span.copyVersionResult").css("left", $("span.versionNumber").offset().left + $("span.versionNumber").width() + 5 + "px");
				$("span.copyVersionResult").fadeIn('fast', function(e){  hideVLength(); }).delay(500).fadeOut('slow', function(e){  showVLength(); }).delay(500).fadeIn('slow', function(e){  hideVLength(); }).delay(500).fadeOut('slow', function(e){  showVLength(); }).delay(500).fadeIn('fast', function(e){  hideVLength(); }).delay(2000).fadeIn('fast',function() {
					resetVersionView(true);
				});
			}
		}catch(err){
			resetVersionView(true);
		}
	}else{
		$("span.copyVersionResult").stop();
		resetVersionView();
	}
}

function logToConsole(msg){
	window.console && console.log(msg);
}

function isUndefinedOrEmptyValue(input, canBeFalse){
	if(typeof input === typeof undefined || input === null || input === ''){
		return true;
	}
	
	if(input === false && !isUndefinedOrEmptyValue(canBeFalse) && canBeFalse === true){
		return false;
	}else if(input === false){
		return true;
	}
	
	return false;
}

function resetVersionView(hideVersion){
	$("input.tempCopyValue").remove();
	$("span.copyVersionResult").text("");
	if(isUndefinedOrEmptyValue(hideVersion)){
		$("span.versionNumber").removeClass("hide").addClass("hide");
		$("span.version").removeClass("hide").addClass("hide");
	}
	$("span.copyVersionResult").removeClass("hide").addClass("hide");
}

function hideVLength(){
	$("span.versionNumberCopyLengthener").removeClass("hide").addClass("hide");
}

function showVLength(){
	$("span.versionNumberCopyLengthener").removeClass("hide");
}

function toggleEvents(){
	// Toggle show server id if setting is enabled and the markup is on the page.
	if($("p.serverIdToggle").length){
		$("p.serverIdToggle").trigger("click");
	}
	
	$(".tablesorter").tablesorter({
		cssHeader: "header",
		cssAsc: "headerSortUp",
		cssDesc: "headerSortDown",
		cssChildRow: "expand-child",
		sortInitialOrder: "asc",
		sortMultiSortKey: "shiftKey"
	});
}

function getLang(key){
	if(!key.startsWith(langConstPrefix)){
		key = langConstPrefix + key;
	}
	
	if(langConsts && langConsts.hasOwnProperty(key)){
		return langConsts[key];
	}
	
	return false;
}

function decodeEntities(encodedString) {
	var textArea = document.createElement('textarea');
	textArea.innerHTML = encodedString;
	var toReturn = textArea.value;
	textArea.remove();
	return toReturn;
}


