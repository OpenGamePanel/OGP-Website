$(document).ready(function(){
    wireClicks();
});

function wireClicks(){
	$("span.versionInfo").click(function(e){
		handleVersionClick();
	});
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
