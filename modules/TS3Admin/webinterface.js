var requestCount;
var loadingImage;

function onLoad()
{
	requestCount = 0;
	loadingImage = document.getElementById("loadingImage");
}

function changeDisplay(idname, type)
{
	document.getElementById(idname).style.display = type;
}

function lang(key)
{
	return document.getElementById(key).title;
}

function isArray(obj)
{
	return obj.constructor == Array;
}

function changeTokenType(el)
{
	document.getElementById("clearLink").focus();
	
	switch(el.selectedIndex)
	{
	case 1:
		document.getElementById("tokentype0").style.display = "block";
		document.getElementById("tokentype1").style.display = "none";
		document.getElementById("tokenAddSubmit").disabled = false;
		break;
	
	case 2:
		document.getElementById("tokentype0").style.display = "none";
		document.getElementById("tokentype1").style.display = "block";
		document.getElementById("tokenAddSubmit").disabled = false;
		break;
	
	default:
		document.getElementById("tokentype0").style.display = "none";
		document.getElementById("tokentype1").style.display = "none";
		document.getElementById("tokenAddSubmit").disabled = true;
	}
}

function setvserverstate(action)
{
	document.getElementById("clearLink").focus();
	
	if( action.toUpperCase() != "START" && action.toUpperCase() != "STOP" ) return;
	
	var vserver = document.getElementsByName("vserver");
	var sid = 0;
	for(var i=0; i<vserver.length; i++)
	{
		if( document.getElementsByName("vserver")[i].checked == true )
		{
			sid = document.getElementsByName("vserver")[i].value;
			break;
		}
	}
	
	var urlAdd = "";
	if( action.toUpperCase() == "STOP" )
	{
		if( !confirm(lang("js_confirm_server_stop").replace(/%1/, sid)) ) return;	// "Wollen Sie Server #"+sid+" wirklich stoppen?"
		
		urlAdd = encodeURIComponent("stopserver");
	}
	else
	{
		urlAdd = encodeURIComponent("startserver");
	}
	
	requestCount += 1;
	
	with(new Ajax)
	{
		url = "home.php?m=TS3Admin";
		method = "POST";
		params = "ajaxRequest=1&do="+urlAdd+"&serverid="+encodeURIComponent(sid);
		onSuccess = function(txt,xml)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			try
			{
				var result = eval( '(' + txt + ')' );
			}
			catch(e)
			{
				return false;
			}
			
			if( result[0] == "OK" )
			{
				var newState = "";
				if( result[2] == "serverstart" ) newState = "online";
				else newState = "offline";
				
				var vserver = document.getElementById("serverstatus"+result[1]);
				vserver.innerHTML = newState;
				vserver.className = newState;
			}
			else
			{
				alert(lang("js_error")+" "+result[1]+": "+result[2]);
			}
		};
		onError = function(msg)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			alert(lang("js_ajax_error").replace(/%1/, msg));
		};
		doRequest();
	}
	
	checkLoadingImage();
}

function vserverdelete()
{
	document.getElementById("clearLink").focus();
	
	var vserver = document.getElementsByName("vserver");
	var sid = 0;
	for(var i=0; i<vserver.length; i++)
	{
		if( document.getElementsByName("vserver")[i].checked == true )
		{
			sid = document.getElementsByName("vserver")[i].value;
			break;
		}
	}
	
	if( !confirm(lang("js_confirm_server_delete").replace(/%1/, sid)) ) return;
	
	requestCount += 1;
	
	with(new Ajax)
	{
		url = "home.php?m=TS3Admin";
		method = "POST";
		params = "ajaxRequest=1&do=deleteserver&serverid="+encodeURIComponent(sid);
		onSuccess = function(txt,xml)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			try
			{
				var result = eval( '(' + txt + ')' );
			}
			catch(e)
			{
				return false;
			}
			
			if( result[0] == "OK" )
			{
				alert(lang("js_notice_server_deleted").replace(/%1/, result[1]));
				//location.reload();
				location.href = "home.php?m=TS3Admin";
			}
			else
			{
				alert(lang("js_error")+" "+result[1]+": "+result[2]);
			}
		};
		onError = function(msg)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			alert(lang("js_ajax_error").replace(/%1/, msg));
		};
		doRequest();
	}
	
	checkLoadingImage();
}

function serveredit(serverProp)
{
	document.getElementById("clearLink").focus();
	
	var newValue = prompt(lang("js_prompt_new_propvalue").replace(/%1/, serverProp), document.getElementById(serverProp).innerHTML);
	if( newValue === null ) return;
	
	requestCount += 1;
	
	with(new Ajax)
	{
		url = "home.php?m=TS3Admin";
		method = "POST";
		params = "ajaxRequest=1&do=serveredit&serverprop="+encodeURIComponent(serverProp)+"&value="+encodeURIComponent(newValue);
		onSuccess = function(txt,xml)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			try
			{
				var result = eval( '(' + txt + ')' );
			}
			catch(e)
			{
				return false;
			}
			
			if( result[0] == "OK" )
			{
				document.getElementById(result[1]).innerHTML = result[2];
			}
			else
			{
				alert(lang("js_error")+" "+result[1]+": "+result[2]);
			}
		};
		onError = function(msg)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			alert(lang("js_ajax_error").replace(/%1/, msg));
		};
		doRequest();
	}
	
	checkLoadingImage();
}

function serveredit_enum(serverProp)
{
	document.getElementById("clearLink").focus();
	
	var value = document.getElementsByName(serverProp);
	var newValue = 0;
	
	for(var i=0; i<value.length; i++)
	{
		if( value[i].checked == true )
		{
			newValue = value[i].value;
			break;
		}
	}
	
	requestCount += 1;
	
	with(new Ajax)
	{
		url = "home.php?m=TS3Admin";
		method = "POST";
		params = "ajaxRequest=1&do=serveredit&serverprop="+encodeURIComponent(serverProp)+"&value="+encodeURIComponent(newValue);
		onSuccess = function(txt,xml)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			try
			{
				var result = eval( '(' + txt + ')' );
			}
			catch(e)
			{
				return false;
			}
			
			if( result[0] == "OK" )
			{
				
			}
			else
			{
				alert(lang("js_error")+" "+result[1]+": "+result[2]);
			}
		};
		onError = function(msg)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			alert(lang("js_ajax_error").replace(/%1/, msg));
		};
		doRequest();
	}
	
	checkLoadingImage();
}

function serverupdate(serverProps)
{
	document.getElementById("clearLink").focus();
	
	if( !isArray(serverProps) ) return;
	
	var queryString = "";
	
	for(var i=0; i<serverProps.length; i++)
	{
		queryString += "&serverprop[]="+encodeURIComponent(serverProps[i]);
	}
	
	requestCount += 1;
	
	with(new Ajax)
	{
		url = "home.php?m=TS3Admin";
		method = "POST";
		params = "ajaxRequest=1&do=serverupdate"+queryString;
		onSuccess = function(txt,xml)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			try
			{
				var result = eval( '(' + txt + ')' );
			}
			catch(e)
			{
				return false;
			}
			
			if( result[0] == "OK" )
			{
				for(var i=1; i<result.length; i++)
				{
					document.getElementById(result[i][0]).innerHTML = result[i][1];
				}
			}
			else
			{
				alert(lang("js_error")+" "+result[1]+": "+result[2]);
			}
		};
		onError = function(msg)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			alert(lang("js_ajax_error").replace(/%1/, msg));
		};
		doRequest();
	}
	
	checkLoadingImage();
}

function deleteToken(token)
{
	document.getElementById("clearLink").focus();
	
	requestCount += 1;
	
	with(new Ajax)
	{
		url = "home.php?m=TS3Admin";
		method = "POST";
		params = "ajaxRequest=1&do=deletetoken&token="+encodeURIComponent(token);
		onSuccess = function(txt,xml)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			try
			{
				var result = eval( '(' + txt + ')' );
			}
			catch(e)
			{
				return false;
			}
			
			if( result[0] == "OK" )
			{
				var el = document.getElementById("tokenRow_"+result[1]);
				
			    el.parentNode.removeChild(el);
			}
			else
			{
				alert(lang("js_error")+" "+result[1]+": "+result[2]);
			}
		};
		onError = function(msg)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			alert(lang("js_ajax_error").replace(/%1/, msg));
		};
		doRequest();
	}
	
	checkLoadingImage();
}

function serverViewUpdate(userAction)
{
	if( !userAction && !document.getElementById("liveViewAutoUpdateActivated").checked ) return;
	
	if( document.getElementById("liveViewSelection").value != "" )
	{
		//setTimeout("serverViewUpdate(false);", 2000);
		return;
	}
	
	requestCount += 1;
	
	with(new Ajax)
	{
		url = "home.php?m=TS3Admin&type=cleared";
		method = "POST";
		params = "ajaxRequest=1&do=serverviewupdate";
		onSuccess = function(txt,xml)
		{
			requestCount -= 1;			
			document.getElementById("serverview").innerHTML = txt;
		};
		onError = function(msg)
		{
			requestCount -= 1;			
			alert(lang("js_ajax_error").replace(/%1/, msg));
		};
		doRequest();
	}
}

function kickClient(clid)
{
	document.getElementById("clearLink").focus();
	
	requestCount += 1;
	
	with(new Ajax)
	{
		url = "home.php?m=TS3Admin";
		method = "POST";
		params = "ajaxRequest=1&do=clientkick&clid="+encodeURIComponent(clid);
		onSuccess = function(txt,xml)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			try
			{
				var result = eval( '(' + txt + ')' );
			}
			catch(e)
			{
				return false;
			}
			
			if( result[0] == "OK" )
			{
				var el = document.getElementById("serverview_client_"+result[1]);
				
			    el.parentNode.removeChild(el);
			    
			    serverViewUpdate();
			}
			else
			{
				alert(lang("js_error")+" "+result[1]+": "+result[2]);
			}
		};
		onError = function(msg)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			alert(lang("js_ajax_error").replace(/%1/, msg));
		};
		doRequest();
	}
	
	checkLoadingImage();
}

function setUserMoveToChan(clid)
{
	var els = document.getElementsByClassName("serverview_channel");
	for(i=0; i<els.length; i++)
	{
		els[i].style.display = "inline";
	}
	
	els = document.getElementsByClassName("serverview_client");
	for(i=0; i<els.length; i++)
	{
		els[i].style.display = "none";
	}
	
	document.getElementById("serverview_client_back_"+clid).style.display = "inline";
	
	document.getElementById("liveViewSelection").value = clid;
}

function moveToChan(cid)
{
	if( document.getElementById("liveViewSelection").value == "" ) return;
	
	var clid = document.getElementById("liveViewSelection").value;
	
	requestCount += 1;
	
	with(new Ajax)
	{
		url = "home.php?m=TS3Admin";
		method = "POST";
		params = "ajaxRequest=1&do=clientmove&clid="+encodeURIComponent(clid)+"&cid="+encodeURIComponent(cid);
		onSuccess = function(txt,xml)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			backMoveToChan();
			
			try
			{
				var result = eval( '(' + txt + ')' );
			}
			catch(e)
			{
				return false;
			}
			
			if( result[0] == "OK" )
			{
				//var el = document.getElementById("serverview_client_"+result[1]);
				
			    //el.parentNode.removeChild(el);
				
			    serverViewUpdate(true);
			}
			else
			{
				alert(lang("js_error")+" "+result[1]+": "+result[2]);
			}
		};
		onError = function(msg)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			backMoveToChan();
			
			alert(lang("js_ajax_error").replace(/%1/, msg));
		};
		doRequest();
	}
	
	checkLoadingImage();
}

function backMoveToChan(clid)
{
	var els = document.getElementsByClassName("serverview_channel");
	for(i=0; i<els.length; i++)
	{
		els[i].style.display = "none";
	}
	
	els = document.getElementsByClassName("serverview_client");
	for(i=0; i<els.length; i++)
	{
		els[i].style.display = "inline";
	}
	
	els = document.getElementsByClassName("serverview_client_back");
	for(i=0; i<els.length; i++)
	{
		els[i].style.display = "none";
	}
	
	//document.getElementById("serverview_client_back_"+clid).style.display = "none";
	
	document.getElementById("liveViewSelection").value = "";
}

function poke(clid)
{
	document.getElementById("clearLink").focus();
	
	var msg = prompt(lang("js_prompt_poke_to").replace(/%1/, clid));
	if( msg === null ) return;
	
	requestCount += 1;
	
	with(new Ajax)
	{
		url = "home.php?m=TS3Admin";
		method = "POST";
		params = "ajaxRequest=1&do=clientpoke&clid="+encodeURIComponent(clid)+"&msg="+encodeURIComponent(msg);
		onSuccess = function(txt,xml)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			try
			{
				var result = eval( '(' + txt + ')' );
			}
			catch(e)
			{
				return false;
			}
			
			if( result[0] == "OK" )
			{
				//var el = document.getElementById("serverview_client_"+result[1]);
				
			    //el.parentNode.removeChild(el);
				
			    //serverViewUpdate(true);
			}
			else
			{
				alert(lang("js_error")+" "+result[1]+": "+result[2]);
			}
		};
		onError = function(msg)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			alert(lang("js_ajax_error").replace(/%1/, msg));
		};
		doRequest();
	}
	
	checkLoadingImage();
}

function sendMsg(cid, mode)
{
	document.getElementById("clearLink").focus();
	
	var to = "";
	switch(mode)
	{
		case 1: to = "Client"; break;
		case 2: to = "Channel"; break;
		case 3: to = "Server"; break;
	}
	
	var msg = prompt(lang("js_prompt_msg_to").replace(/%1/, to).replace(/%2/, cid));
	if( msg === null ) return;
	
	requestCount += 1;
	
	with(new Ajax)
	{
		url = "home.php?m=TS3Admin";
		method = "POST";
		params = "ajaxRequest=1&do=clientmsg&cid="+encodeURIComponent(cid)+"&mode="+encodeURIComponent(mode)+"&msg="+encodeURIComponent(msg);
		onSuccess = function(txt,xml)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			try
			{
				var result = eval( '(' + txt + ')' );
			}
			catch(e)
			{
				return false;
			}
			
			if( result[0] == "OK" )
			{
				//var el = document.getElementById("serverview_client_"+result[1]);
				
			    //el.parentNode.removeChild(el);
				
			    //serverViewUpdate(true);
			}
			else
			{
				alert(lang("js_error")+" "+result[1]+": "+result[2]);
			}
		};
		onError = function(msg)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			alert(lang("js_ajax_error").replace(/%1/, msg));
		};
		doRequest();
	}
	
	checkLoadingImage();
}

function deleteBan(banid)
{
	document.getElementById("clearLink").focus();
	
	requestCount += 1;
	
	with(new Ajax)
	{
		url = "home.php?m=TS3Admin";
		method = "POST";
		params = "ajaxRequest=1&do=deleteban&banid="+encodeURIComponent(banid);
		onSuccess = function(txt,xml)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			try
			{
				var result = eval( '(' + txt + ')' );
			}
			catch(e)
			{
				return false;
			}
			
			if( result[0] == "OK" )
			{
				var el = document.getElementById("banRow_"+result[1]);
				
			    el.parentNode.removeChild(el);
			}
			else
			{
				alert(lang("js_error")+" "+result[1]+": "+result[2]);
			}
		};
		onError = function(msg)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			alert(lang("js_ajax_error").replace(/%1/, msg));
		};
		doRequest();
	}
	
	checkLoadingImage();
}

function addBan()
{
	document.getElementById("clearLink").focus();
	
	requestCount += 1;
	
	var ip = document.getElementById("newBanIP").value;
	var name = document.getElementById("newBanName").value;
	var uid = document.getElementById("newBanUID").value;
	var reason = document.getElementById("newBanReason").value;
	var duration = document.getElementById("newBanDuration").value * document.getElementById("newBanDurationMode").value;
	
	with(new Ajax)
	{
		url = "home.php?m=TS3Admin";
		method = "POST";
		params = "ajaxRequest=1&do=addban&ip="+encodeURIComponent(ip)+"&name="+encodeURIComponent(name)+"&uid="+encodeURIComponent(uid)+"&reason="+encodeURIComponent(reason)+"&duration="+encodeURIComponent(duration);
		onSuccess = function(txt,xml)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			banListUpdate();
			
			try
			{
				var result = eval( '(' + txt + ')' );
			}
			catch(e)
			{
				return false;
			}
			
			if( result[0] == "OK" )
			{
				//var el = document.getElementById("banRow_"+result[1]);
				
			    //el.parentNode.removeChild(el);
				
				//alert("OK "+result[1]);
			}
			else
			{
				
				alert(lang("js_error")+" "+result[1]+": "+result[2]);
			}
		};
		onError = function(msg)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			alert(lang("js_ajax_error").replace(/%1/, msg));
		};
		doRequest();
	}
	
	checkLoadingImage();
}

function banClient(clid)
{
	document.getElementById("clearLink").focus();
	
	var duration = prompt(lang("js_prompt_banduration"));
	if( duration === null ) return;
	duration *= 3600;
	
	var reason = prompt(lang("js_prompt_banreason"));
	if( reason === null ) return;
	
	requestCount += 1;
	
	with(new Ajax)
	{
		url = "home.php?m=TS3Admin";
		method = "POST";
		params = "ajaxRequest=1&do=clientban&clid="+encodeURIComponent(clid)+"&duration="+encodeURIComponent(duration)+"&reason="+encodeURIComponent(reason);
		onSuccess = function(txt,xml)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			banListUpdate();
			
			try
			{
				var result = eval( '(' + txt + ')' );
			}
			catch(e)
			{
				return false;
			}
			
			if( result[0] == "OK" )
			{
				//var el = document.getElementById("banRow_"+result[1]);
				
			    //el.parentNode.removeChild(el);
				
				//alert("OK "+result[1]);
				var el = document.getElementById("banRow_"+result[1]);
				
			    el.parentNode.removeChild(el);
			    
			    serverViewUpdate();
			}
			else
			{
				
				alert(lang("js_error")+" "+result[1]+": "+result[2]);
			}
		};
		onError = function(msg)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			alert(lang("js_ajax_error").replace(/%1/, msg));
		};
		doRequest();
	}
	
	checkLoadingImage();
}

function banListUpdate()
{
	requestCount += 1;
	
	with(new Ajax)
	{
		url = "home.php?m=TS3Admin&type=cleared";
		method = "POST";
		params = "ajaxRequest=1&do=banlistupdate";
		onSuccess = function(txt,xml)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			document.getElementById("banlist").innerHTML = txt;
		};
		onError = function(msg)
		{
			requestCount -= 1;
			checkLoadingImage();
			
			alert(lang("js_ajax_error").replace(/%1/, msg));
		};
		doRequest();
	}
	
	checkLoadingImage();
}

function checkLoadingImage()
{
	if( requestCount > 0 )
	{
		loadingImage.style.visibility = "visible";
	}
	else
	{
		loadingImage.style.visibility = "hidden";
	}
	setTimeout("window.location.href=window.location.href;",500);
}

// class
function Ajax()
{
	this.url = "";
	this.params = "";
	this.method = "GET";
	this.onSuccess = null;
	
	this.onError = function(msg)
	{
		alert(msg);
	}
}

Ajax.prototype.doRequest = function()
{
	if( !this.url )
	{
		this.onError("There was no URL. The request will be aborted.");
		return false;
	}
	
	if( !this.method )
	{
		this.method = "GET";
	}
	else
	{
		this.method = this.method.toUpperCase();
	}
	
	var _this = this;
	
	var xmlHttpRequest = getXMLHttpRequest();
	if( !xmlHttpRequest )
	{
		this.onError("There was no XMLHttpRequest object can be created.");
		return false;
	}
	
	switch(this.method)
	{
		case "GET":
			xmlHttpRequest.open(this.method, this.url+"?"+this.params, true);
			xmlHttpRequest.onreadystatechange = readyStateHandler;
			xmlHttpRequest.send(null);
			break;
		
		case "POST":
			xmlHttpRequest.open(this.method, this.url, true);
			xmlHttpRequest.onreadystatechange = readyStateHandler;
			xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xmlHttpRequest.send(this.params);
			break;
	}
	
	function readyStateHandler()
	{
		if( xmlHttpRequest.readyState < 4 )
		{
			return false;
		}
		
		if( xmlHttpRequest.status == 200 || xmlHttpRequest.status == 304 )
		{
			if(_this.onSuccess)
			{
				_this.onSuccess(xmlHttpRequest.responseText, xmlHttpRequest.responseXML);
			}
		}
		else
		{
			if(_this.onError)
			{
				_this.onError("["+xmlHttpRequest.status+" "+xmlHttpRequest.statusText+"] There was an error in data transmission.");
			}
		}
	}
}

// returns XMLHttpRequest object
function getXMLHttpRequest()
{
	if(window.XMLHttpRequest)
	{
		// for firefox, opera, etc...
		return new XMLHttpRequest();
	}
	else
	{
		if(window.ActiveXObject)
		{
			try
			{
				// new for ie
				return new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e)
			{
				try
				{
					// old for ie
					return new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch(e)
				{
					return null;
				}
			}
		}
	}
	return null;
}