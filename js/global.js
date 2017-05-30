$(document).ready(function(){
    wireClicks();
    animateProgressBars();
    toggleEvents();
});

function wireClicks(){
	$("span.versionInfo").click(function(e){
		handleVersionClick();
	});
	
	$(".getAutoUpdateLink").click(function(e){
		showSteamUpdateLink($(this));
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

function showSteamUpdateLink(elem){
	$("div.mangificWrapper .magnificTitle").text($(elem).attr('autoupdatetext'));
	$("div.mangificWrapper .magnificContentsDiv").html('<p>' + $(elem).attr('autoupdatehtml') + '</p><p><input class="updateLink" style="width: 75%;" type="text" value="' + $(elem).attr('autoupdatelink') + '"><button class="copyButton">' + $(elem).attr('copyme') + '</button>&nbsp; <span class="copyStatus"></span></p>');
		
	showPopup(function(){
		$("input.updateLink").click(function(e){
			$(this).select();
		});
		
		$(".copyButton").click(function(e){
			copyInput($("input.updateLink"), $("span.copyStatus"), elem);
		});
		
		copyInput($("input.updateLink"), $("span.copyStatus"), elem);
	});
}

function copyInput(input, resultArea, elemWithAttr){
	$(input).select();
	var successful = document.execCommand('copy');
	var msg = successful ? 'successful' : 'unsuccessful';
	logToConsole('Copying text command was ' + msg);
	if(successful){
		$(resultArea).text($(elemWithAttr).attr('copysuccess')).fadeIn('fast').delay(500).fadeOut('slow').delay(500).fadeIn('slow').delay(500).fadeOut('slow').delay(500).fadeIn('fast').delay(2000).fadeIn('fast');
	}else{
		$(resultArea).text($(elemWithAttr).attr('copyfail')).fadeIn('fast').delay(500).fadeOut('slow').delay(500).fadeIn('slow').delay(500).fadeOut('slow').delay(500).fadeIn('fast').delay(2000).fadeIn('fast');
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
				$("span.copyVersionResult").text("Copied!").css("color", "#43ff0f").removeClass("hide");
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
}
