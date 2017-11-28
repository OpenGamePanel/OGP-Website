function GetURLParameter(sParam)
{
	var sPageURL = window.location.search.substring(1);
	var sURLVariables = sPageURL.split('&');
	for (var i = 0; i < sURLVariables.length; i++)
	{
		var sParameterName = sURLVariables[i].split('=');
		if (sParameterName[0] == sParam)
		{
			return sParameterName[1];
		}
	}
}

function checkSession() {
	var ret = true;
    var request = new XMLHttpRequest();
    request.open('GET', 'modules/litefm/SessionCheck.php', false);
    request.onload = function(e) {
		var session = JSON.parse(this.responseText);
		if(!session.valid) {
			alert("Your session has expired.");
			window.location = "index.php";
			ret = false;
		}
    }
    request.send(null);
	return ret;
}

function detectIE() {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');
    var trident = ua.indexOf('Trident/');

    if (msie > 0) {
        // IE 10 or older => return version number
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    if (trident > 0) {
        // IE 11 (or newer) => return version number
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }

    // other browser
    return false;
}

var ie = detectIE();

if (!Date.now) {
    Date.now = function() { return new Date().getTime(); }
}

function indexedDBOk() {
    return "indexedDB" in window;
}

function downloadFile(home_id, file_id, file_size, file_name)
{
	if(checkSession() == false) { return; }
	var fileNode = document.getElementById('fileid'+file_id);
	var aLink = document.getElementById('jsDwl'+file_id);
	if (aLink.getAttribute('disabled') == 'disabled') {
        return;	
    }
	aLink.setAttribute('disabled','disabled');
	var did = Date.now();
	var bytesDownloaded = 0;
	var progressbar = document.createElement('DIV');
	var progress = document.createElement('DIV');
	var percentage = document.createElement("SPAN");
	progressbar.setAttribute('id','progress_'+file_id);
	progressbar.setAttribute('style', 'background:white;'+
									  'height:4px;'+
									  'width:400px;'+
									  'border:1px solid black;'+
									  'position:absolute;'+
									  'z-index:2;');
	percentage.setAttribute('id','percentage_'+file_id);
	progressbar.appendChild(progress);
	fileNode.appendChild(progressbar);
	fileNode.appendChild(percentage);
	progressbar = document.getElementById('progress_'+file_id);
	progress = progressbar.firstChild;
	percentage = document.getElementById('percentage_'+file_id);
	var key = 1;
	var db;
	var memoryStore;
	
	function failure() {
		progressbar.parentNode.removeChild(progressbar); 
		percentage.parentNode.removeChild(percentage);
		window.onbeforeunload = false;
		window.onunload = false;
	}
	
	function init() {
		if(ie)
		{
			if(ie >= 10)
			{
				memoryStore = [];
				getFilePart();
			}
			else
			{
				failure();
				alert('Your browser does not support this function.'); 
				return;
			}
		}
		else
		{
			if( !indexedDBOk() ) 
			{ 
				failure();
				alert('Your browser does not support this function.'); 
				return;
			}
		 
			var openRequest = indexedDB.open(did,1);
		 
			openRequest.onupgradeneeded = function(e) {
				var thisDB = e.target.result;
		 
				if(!thisDB.objectStoreNames.contains("dl_parts")) {
					thisDB.createObjectStore("dl_parts");
				}
			}
		 
			openRequest.onsuccess = function(e) {
				db = e.target.result;
				getFilePart();
			}
		 
			openRequest.onerror = function(e) {
				failure();
				cleanUp();
				alert(e.target.error.name);
				return;
			}
		}
	}

	function addBuffer(arraybuffer, key) {
		if(ie)
		{
			// Store the blob in memory
			memoryStore.push(new Blob([arraybuffer]));
		}
		else
		{
			// Store the blob in indexedDB
			var transaction = db.transaction(["dl_parts"],"readwrite");
			var store = transaction.objectStore("dl_parts");
			var request = store.add(new Blob([arraybuffer]), key);
			request.onerror = function(e) {
				failure();
				cleanUp();
				alert(e.target.error.name);
				return;
			}
		}
	}

	function getAllParts() {
		if(ie)
		{
			navigator.msSaveOrOpenBlob(new Blob(memoryStore), file_name);
		}
		else
		{
			var trans = db.transaction(["dl_parts"],"readonly");
			var store = trans.objectStore("dl_parts");
			var parts = [];
			trans.oncomplete = function(evt) { 
				try
				{
					var fileUrl = (window.URL || window.webkitURL).createObjectURL(new Blob(parts));
					var a = document.createElement('a');
					a.href = fileUrl;
					a.target = '_blank';
					a.download = file_name || fileUrl;
					var evt=new MouseEvent('click', {'view':window,'bubbles':true,'cancelable':true});
					a.dispatchEvent(evt);
					// Otherwise Firefox fails starting the download.
					setTimeout(function() { window.URL.revokeObjectURL(a.href); }, 1);
					parts = [];
				} 
				catch(e)
				{
					console.log(e);
				}
			};
		 
			var cursorRequest = store.openCursor();
		 
			cursorRequest.onerror = function(error) {
				failure();
				cleanUp();
				alert(error);
				return;
			};
		 
			cursorRequest.onsuccess = function(evt) {                    
				var cursor = evt.target.result;
				if (cursor) {
					parts.push(cursor.value);
					cursor.continue();
				}
			};
		}
	}
	
	function cleanUp() {
		if(ie)
		{
			memoryStore = [];
		}
		else
		{
			db.close();
			indexedDB.deleteDatabase(did);
		}
		var xhr = new XMLHttpRequest();
		xhr.open('POST', "home.php?m=litefm&home_id="+home_id+"&p=get&remove_did="+did+"&type=cleared", false);
		xhr.send(null);
		window.onunload = false;
	}
	
	function getFilePart()
	{
		var xhr = new XMLHttpRequest();
		xhr.open('POST', "home.php?m=litefm&home_id="+home_id+"&item="+file_id+"&name="+file_name+"&p=get&type=cleared&size="+file_size+"&did="+did, true);
		xhr.responseType = 'arraybuffer';
		xhr.onload = function(e) {
			if(this.response.byteLength != 0)
			{
				var lapTime = Date.now() - did; // milliseconds from download start
				// Uncompress and calculate the statistics.
				var compressed = new Uint8Array(this.response);
				var inflate = new Zlib.Inflate(compressed);
				var plain = inflate.decompress();
				bytesDownloaded += plain.byteLength;
				var multiplier = 1000 / lapTime;
				var MBs = (bytesDownloaded / 1000000) * multiplier;
				var value = bytesDownloaded * 100 / file_size;
				progress.setAttribute('style', 'background:blue;'+
											   'height:4px;'+
											   'width:'+value+'%;');
				percentage.innerHTML = "&nbsp;"+(Math.round(value * 100) / 100)+"%&nbsp;-&nbsp;"+MBs.toFixed(2)+"MB/s";
				addBuffer(plain, key++);
				// Get the next part
				getFilePart();
			}
			else
			{
				getAllParts();
				// Otherwise Firefox fails starting the download.
				setTimeout(function() { cleanUp(); }, 60000);
				// element.remove(); fails on IE
				progressbar.parentNode.removeChild(progressbar); 
				percentage.parentNode.removeChild(percentage);
				aLink.removeAttribute('disabled');
				window.onbeforeunload = false;
			}
		};
		xhr.send(null);
	}
	
	window.onbeforeunload = function(){
		return 'A file download is in progress';
	};
	
	window.onunload = function(){
		cleanUp();
	}
	
	init();
}

$(document).ready(function(){
	/* translation & info */
	var select_at_least_one_item = $('#dialog').attr('data-select_at_least_one_item'),
		ask_delete = $('#dialog').attr('data-ask_delete'),
		ask_rename = $('#dialog').attr('data-ask_rename'),
		ask_move = $('#dialog').attr('data-ask_move'),
		ask_copy = $('#dialog').attr('data-ask_copy'),
		ask_compress = $('#dialog').attr('data-ask_compress'),
		ask_uncompress = $('#dialog').attr('data-ask_uncompress'),
		archive_name = $('#dialog').attr('data-archive_name'),
		archive_type = $('#dialog').attr('data-archive_type'),
		file_name = $('#dialog').attr('data-file_name'),
		folder_name = $('#dialog').attr('data-folder_name'),
		compresses_files_separately = $('#dialog').attr('data-compresses_files_separately'),
		to = $('#dialog').attr('data-to'),
		yes = $('#dialog').attr('data-yes'),
		no = $('#dialog').attr('data-no'),
		max_file_uploads = $('#dialog').attr('data-max_file_uploads'),
		upload_to_web = $('#dialog').attr('data-upload_to_web'),
		transfer_to_server = $('#dialog').attr('data-transfer_to_server'),
		upload = $('#dialog').attr('data-upload'),
		ask_change_attr = $('#dialog').attr('data-ask_change_attr'),
		ask_send_by_email = $('#dialog').attr('data-ask_send_by_email'),
		subject = $('#dialog').attr('data-subject'),
		message = $('#dialog').attr('data-message'),
		dest_email = $('#dialog').attr('data-dest_email'),
		user_email = $('#dialog').attr('data-user_email');
	// Home id
	var home_id = GetURLParameter('home_id');
	// Browse folder (when using "move/uncompress")
	$('.folder').each(function(){
		$(this).click(function(){
			if(checkSession() == false) { return; }
			var addpost = {};
			addpost[ 'm' ] = 'user_games';
			addpost[ 'p' ] = 'browser';
			addpost[ 'home_id' ] = $('.levelup').attr('data-home-id');
			addpost[ 'item' ] = $(this).attr('data-item');
			addpost[ 'type' ] = 'cleared';
			$.ajax({
					type: "GET",
					url: "home.php",
					data: addpost,
					success: function(data){
						data = data.replace("user_games.js","litefm.js");
						$( "#browser" ).html(data);
					}
			});
		});
	});
	// Back to previous folder (when using "move/uncompress")
	$('.levelup').click(function(){
		if(checkSession() == false) { return; }
		var addpost = {};
		addpost[ 'm' ] = 'user_games';
		addpost[ 'p' ] = 'browser';
		addpost[ 'home_id' ] = $(this).attr('data-home-id');
		addpost[ 'back' ] = 'back';
		addpost[ 'type' ] = 'cleared';
		$.ajax({
				type: "GET",
				url: "home.php",
				data: addpost,
				success: function(data){
					data = data.replace("user_games.js","litefm.js");
					$( "#browser" ).html(data);
				}
		});
	});
	// Create new folder (when using "move/uncompress")
	$('#addfolder').click(function(){
		if(checkSession() == false) { return; }
		var addpost = {};
		addpost[ 'm' ] = 'user_games';
		addpost[ 'p' ] = 'browser';
		addpost[ 'home_id' ] = home_id;
		addpost[ 'create_folder' ] = 'create_folder';
		addpost[ 'folder_name' ] = $('input[name=dirname]').val();
		addpost[ 'type' ] = 'cleared';
		$.ajax({
				type: "GET",
				url: "home.php",
				data: addpost,
				success: function(data){
					data = data.replace("user_games.js","litefm.js");
					$( "#browser" ).html(data);
				}
		});
	});
	// Switch checkboxes 
	$("#switch_check").click(function(){
		var checkBoxes = $('input[class="item"]');
		checkBoxes.prop("checked", !checkBoxes.prop("checked"));
	});
	// Remove
	$("#remove.operations-button").click(function(){
		if(checkSession() == false) { return; }
		var addpost = {};
		addpost.items = [];
		addpost.remove = '';
		var item = '';
		var value = '';
		var items = '';
		$('input[class="item"]:checked').each(function(){
			item = $(this).attr('data-item');
			value = $(this).attr('value');
			addpost.items.push(item);
			items += "<br>"+value;
		});
		if(items != '')
		{
			$('#dialog').html(ask_delete.replace("%s", ":"+items));
			$('#dialog').dialog({
				autoOpen: true,
				width: 450,
				modal: true,
				buttons: [{ text: yes, click: function(){
						$.ajax({
							type: "POST",
							url: "home.php?m=litefm&home_id="+home_id+"&type=cleared",
							data: addpost,
							complete: function(){
								window.location.href = window.location.href.replace('&back','');
							}
						});
						$( this ).dialog( "close" );
					}
				},{ text: no, click: function(){
						$( this ).dialog( "close" );
					}
				}],
				close: function() {
					$( this ).dialog( "close" );
				}
			});
		}
		else
		{
			alert(select_at_least_one_item);
		}
	});
	// Rename
	$("#rename.operations-button").click(function(){
		if(checkSession() == false) { return; }
		var addpost = {};
		addpost.items = [];
		addpost.values = [];
		addpost.rename = '';
		var value = '';
		var items = '';
		$('input[class="item"]:checked').each(function(){
			item = $(this).attr('data-item');
			value = $(this).attr('value').replace('"', "&quot;");
			addpost.items.push(item);
			items += "<br><input class='rename' type=text style='width:100%;' name='"+item+"' value=\""+value+"\">";
		});
		if(items != '')
		{
			$('#dialog').html(ask_rename+":"+items);
			$('#dialog').dialog({
				autoOpen: true,
				width: 450,
				modal: true,
				buttons: [{ text: yes, click: function(){
						$('input[class="rename"]').each(function(){
							value = $(this).val();
							addpost.values.push(value);
						});
						$.ajax({
							type: "POST",
							url: "home.php?m=litefm&home_id="+home_id+"&type=cleared",
							data: addpost,
							complete: function(){ 
								window.location.href = window.location.href.replace('&back','');
							}
						});
						$( this ).dialog( "close" );
					}
				},{ text: no, click: function(){
						$( this ).dialog( "close" );
					}
				}],
				close: function() {
					$( this ).dialog( "close" );
				}
			});
		}
		else
		{
			alert(select_at_least_one_item);
		}
	});
	// Move
	$("#move.operations-button").click(function(){
		if(checkSession() == false) { return; }
		var addpost = {};
		addpost.items = [];
		addpost.values = [];
		addpost.move = '';
		var value = '';
		var items = '';
		$('input[class="item"]:checked').each(function(){
			item = $(this).attr('data-item');
			value = $(this).attr('value');
			addpost.items.push(item);
			items += "<br>"+value;
		});
		if(items != '')
		{
			var addpostb = {};
			addpostb[ 'm' ] = 'user_games';
			addpostb[ 'p' ] = 'browser';
			addpostb[ 'home_id' ] = home_id;
			addpostb[ 'folder' ] = $('#dialog').attr('data-folder');
			addpostb[ 'type' ] = 'cleared';
			$.ajax({
					type: "GET",
					url: "home.php",
					data: addpostb,
					async: false,
					success: function(data){
						data = data.replace("user_games.js","litefm.js");
						$('#dialog').html(ask_move+":"+items+"<br>"+to+":<br><div id='browser' >"+data+"</div>");
					}
			});
			$('#dialog').dialog({
				autoOpen: true,
				width: 450,
				modal: true,
				buttons: [{ text: yes, click: function(){
						addpost.selected_path = $('#selected_path').text();
						$.ajax({
							type: "POST",
							url: "home.php?m=litefm&home_id="+home_id+"&type=cleared",
							data: addpost,
							complete: function(){ 
								window.location.href = window.location.href.replace('&back','');
							}
						});
						$( this ).dialog( "close" );
					}
				},{ text: no, click: function(){
						$( this ).dialog( "close" );
					}
				}],
				close: function() {
					$( this ).dialog( "close" );
				}
			});
		}
		else
		{
			alert(select_at_least_one_item);
		}
	});
	// Copy
	$("#copy.operations-button").click(function(){
		if(checkSession() == false) { return; }
		var addpost = {};
		addpost.items = [];
		addpost.values = [];
		addpost.copy = '';
		var value = '';
		var items = '';
		$('input[class="item"]:checked').each(function(){
			item = $(this).attr('data-item');
			value = $(this).attr('value');
			addpost.items.push(item);
			items += "<br>"+value;
		});
		if(items != '')
		{
			var addpostb = {};
			addpostb[ 'm' ] = 'user_games';
			addpostb[ 'p' ] = 'browser';
			addpostb[ 'home_id' ] = home_id;
			addpostb[ 'folder' ] = $('#dialog').attr('data-folder');
			addpostb[ 'type' ] = 'cleared';
			$.ajax({
					type: "GET",
					url: "home.php",
					data: addpostb,
					async: false,
					success: function(data){
						data = data.replace("user_games.js","litefm.js");
						$('#dialog').html(ask_copy+":"+items+"<br>"+to+":<br><div id='browser' >"+data+"</div>");
					}
			});
			$('#dialog').dialog({
				autoOpen: true,
				width: 450,
				modal: true,
				buttons: [{ text: yes, click: function(){
						addpost.selected_path = $('#selected_path').text();
						$.ajax({
							type: "POST",
							url: "home.php?m=litefm&home_id="+home_id+"&type=cleared",
							data: addpost,
							complete: function(){ 
								window.location.href = window.location.href.replace('&back','');
							}
						});
					}
				},{ text: no, click: function(){
						$( this ).dialog( "close" );
					}
				}],
				close: function() {
					$( this ).dialog( "close" );
				}
			});
		}
		else
		{
			alert(select_at_least_one_item);
		}
	});
	// Compress
	$("#compress.operations-button").click(function(){
		if(checkSession() == false) { return; }
		var addpost = {};
		addpost.items = [];
		addpost.compress = '';
		var value = '';
		var items = '';
		$('input[class="item"]:checked').each(function(){
			item = $(this).attr('data-item');
			value = $(this).attr('value');
			addpost.items.push(item);
			items += "<br>"+value;
		});
		if(items != '')
		{
			$('#dialog').html(ask_compress+":"+items+"<br>"+
							 "<label for='archive_name'>"+archive_name+"</label>\n"+
							 "<input name='archive_name' id='archive_name' type=text value='archive' ><br>\n"+
							 "<label for='archive_type'>"+archive_type+"</label>\n"+
							 "<select name='archive_type' id='archive_type' >\n"+
							 "<option value='zip'>zip</option>\n"+
							 "<option value='tbz'>tbz</option>\n"+
							 "<option value='tgz'>tgz</option>\n"+
							 "<option value='tar'>tar</option>\n"+
							 "<option value='bz2'>bz2 ("+compresses_files_separately+")</option>\n"+
							 "</select>");
			
			$('#dialog').dialog({
				autoOpen: true,
				width: 450,
				modal: true,
				buttons: [{ text: yes, click: function(){
						addpost.archive_name = $('#archive_name').val();
						addpost.archive_type = $('#archive_type').val();
						$.ajax({
							type: "POST",
							url: "home.php?m=litefm&home_id="+home_id+"&type=cleared",
							data: addpost,
							complete: function(){
								window.location.href = window.location.href.replace('&back','');
							}
						});
						$( this ).dialog( "close" );
					}
				},{ text: no, click: function(){
						$( this ).dialog( "close" );
					}
				}],
				close: function() {
					$( this ).dialog( "close" );
				}
			});
		}
		else
		{
			alert(select_at_least_one_item);
		}
	});
	// Uncompress
	$("#uncompress.operations-button").click(function(){
		if(checkSession() == false) { return; }
		var addpost = {};
		addpost.items = [];
		addpost.values = [];
		addpost.uncompress = '';
		var value = '';
		var items = '';
		var ext = '';
		$('input[class="item"]:checked').each(function(){
			item = $(this).attr('data-item');
			value = $(this).attr('value');
			ext = value.split('.').pop();
			if(ext.match(/^(tar|tgz|gz|Z|zip|bz2|tbz|lzma|xz|txz)$/i) != null)
			{
				addpost.items.push(item);
				items += "<br>"+value;
			}
		});
		if(items != '')
		{
			var addpostb = {};
			addpostb[ 'm' ] = 'user_games';
			addpostb[ 'p' ] = 'browser';
			addpostb[ 'home_id' ] = home_id;
			addpostb[ 'folder' ] = $('#dialog').attr('data-folder');
			addpostb[ 'type' ] = 'cleared';
			$.ajax({
					type: "GET",
					url: "home.php",
					data: addpostb,
					async: false,
					success: function(data){
						data = data.replace("user_games.js","litefm.js");
						$('#dialog').html(ask_uncompress+":"+items+"<br>"+to+":<br><div id='browser' >"+data+"</div>");
					}
			});
			$('#dialog').dialog({
				autoOpen: true,
				width: 450,
				modal: true,
				buttons: [{ text: yes, click: function(){
						addpost.selected_path = $('#selected_path').text();
						$.ajax({
							type: "POST",
							url: "home.php?m=litefm&home_id="+home_id+"&type=cleared",
							data: addpost,
							complete: function(){ 
								window.location.href = window.location.href.replace('&back','');
							}
						});
					}
				},{ text: no, click: function(){
						$( this ).dialog( "close" );
					}
				}],
				close: function() {
					$( this ).dialog( "close" );
				}
			});
		}
		else
		{
			alert(select_at_least_one_item);
		}
	});
	// Create File
	$("#create_file.operations-button").click(function(){
		if(checkSession() == false) { return; }
		var addpost = {};
		addpost.create_file = '';
		$('#dialog').html("<label for='file_name'>"+file_name+"</label>\n"+
						  "<input id='file_name' type=text style='width:100%;' name='file_name' >");
		$('#dialog').dialog({
			autoOpen: true,
			width: 450,
			modal: true,
			buttons: [{ text: yes, click: function(){
					addpost.file_name = $('input[id="file_name"]').val();
					$.ajax({
						type: "POST",
						url: "home.php?m=litefm&home_id="+home_id+"&type=cleared",
						data: addpost,
						complete: function(){ 
							window.location.href = window.location.href.replace('&back','');
						}
					});
					$( this ).dialog( "close" );
				}
			},{ text: no, click: function(){
					$( this ).dialog( "close" );
				}
			}],
			close: function() {
				$( this ).dialog( "close" );
			}
		});
	});
	// Create Folder
	$("#create_folder.operations-button").click(function(){
		if(checkSession() == false) { return; }
		var addpost = {};
		addpost.create_folder = '';
		$('#dialog').html("<label for='folder_name'>"+folder_name+"</label>\n"+
						  "<input id='folder_name' type=text style='width:100%;' name='folder_name' >");
		$('#dialog').dialog({
			autoOpen: true,
			width: 450,
			modal: true,
			buttons: [{ text: yes, click: function(){
					addpost.folder_name = $('input[id="folder_name"]').val();
					$.ajax({
						type: "POST",
						url: "home.php?m=litefm&home_id="+home_id+"&type=cleared",
						data: addpost,
						complete: function(){ 
							window.location.href = window.location.href.replace('&back','');
						}
					});
					$( this ).dialog( "close" );
				}
			},{ text: no, click: function(){
					$( this ).dialog( "close" );
				}
			}],
			close: function() {
				$( this ).dialog( "close" );
			}
		});
	});
	// upload
	$("#upload.operations-button").click(function(){
		if(checkSession() == false) { return; }
		$('#dialog').html('<div class="uploadLiteFMStatus status"></div>\
						  <form id="upload" action="home.php?m=litefm&home_id='+home_id+'&type=cleared&data_type=json" method="post" enctype="multipart/form-data">\
							<input type="file" name="files[]" multiple="multiple" id="files">\
							<input type="submit" name="upload" id="uploadsubmit" value="'+upload+'" >\
						  </form>\
						  <div class="progress">\
							'+upload_to_web+':<br><progress class="bar" max="100" style="width:100%;" ></progress><div class="percent"></div >\
							'+transfer_to_server+':<br><progress class="bar2" max="100" style="width:100%;" ></progress><div class="percent2"></div >\
						  </div>');
		/* variables */
		var progress = $('.progress');
		var percent = $('.percent');
		var bar = $('.bar');
		var percent2 = $('.percent2');
		var bar2 = $('.bar2');
		progress.hide();
		var refresh = null;

		$('#dialog').dialog({
			autoOpen: true,
			width: 350,
			resizable: true,
			modal: true,
			close: function() {
				$( this ).dialog( "close" );
				window.location.href = window.location.href.replace('&back','');
				if(refresh != null){
					clearInterval(refresh);
					refresh = null;
				}
			}, 
			open: function(){
				refresh = null;
				resetUploadUI();
			},
			beforeClose: function(){
				if(refresh != null){
					return false;
				}
			},
			create: function(){
				refresh = null;
			}
		});

		/* submit form with ajax request using jQuery.form plugin */
		$('form#upload').ajaxForm({
			/* set data type json */
			dataType:'json',
			beforeSubmit : function(arr, $form, options){
				if(!$("form#upload input#uploadsubmit").hasClass('disabled')){	
					resetUploadUI();
					var i = 0;
					$.each(arr, function(index, input) {
						if(typeof input.value.name !== 'undefined')
						{
							i++;
						}
					});
					if( i > max_file_uploads )
					{
						alert("The upload exceeds the max_file_uploads directive in php.ini ("+max_file_uploads+" files).");
						return false;
					}
					if( i == 0)
					{
						return false;
					}
				}else{
					return false;
				}
			},
			/* reset before submitting */
			beforeSend: function() {
				refresh = "YES";
				progress.show();
				percent.html('0%');
				percent2.html('0%');
				$("form#upload input#files, form#upload input#uploadsubmit").removeClass('disabled').addClass('disabled').prop('disabled', true);				
			},
			/* progress bar call back*/
			uploadProgress: function(event, position, total, percentComplete) {
				var pVel = percentComplete + '%';
				bar.val(percentComplete);
				percent.html(pVel);
			},
			error: function(jqXHR, textStatus, errorThrown){
				resetUploadUI();
				$(".uploadLiteFMStatus").html(textStatus.charAt(0).toUpperCase() + textStatus.slice(1) + ": " + errorThrown).addClass('failure');
			},
			/* success call back */
			success: function(data) {
				if(typeof data.count !== 'undefined')
				{
					var files_qty = data.count,
						files_info = data.files,
						percent_file = [],
						file_complete = [],
						percent_total = 0,
						pVel = "",
						rond_total = 0;

					refresh = setInterval(function(){
						$.each(files_info, function(index, file){
							if(typeof file_complete[index] !== 'undefined' && file_complete[index] == true)
							{
								return true;
							}
							$.ajax({
									type: "POST",
									url: 'home.php?m=litefm&home_id='+home_id+'&type=cleared&pid='+file['pid']+'&size='+file['size']+'&filename='+file['filename']+"&data_type=json",
									dataType:'json',
									async: false,
									success: function(data){
										percent_file[index] = data.pct / parseInt(files_qty);
										file_complete[index] = data.complete;
									}
							});
						});
						
						percent_total = 0;
						$.each(percent_file, function(index, percent){
							percent_total += percent;
						});
						
						rond_total = parseInt(percent_total);
						if(isNaN(rond_total)){
							rond_total = Number(0);
						}
						
						pVel = rond_total + '%';
						bar2.val(rond_total);
						percent2.html(pVel);
						
						var stop_refresh = true;
						$.each(file_complete, function(index, complete){
							if(complete == false)
							{
								stop_refresh = false;
								return false;
							}
						});
						
						if(stop_refresh == true)
						{
							resetUploadUI();
							
							var successMess = getLang("upload_complete");
							if(!successMess){
								successMess = "File(s) successfully uploaded.";
							}
							
							$(".uploadLiteFMStatus").html(successMess).removeClass('success').addClass('success');
							$("form#upload input#files").val('');
							clearInterval(refresh);
							refresh = null;
						}
					}, 2000);
				}
				else
				{
					if(typeof data.error.post_max_size !== 'undefined')
					{
						alert(data.error.post_max_size);
					}
					if(typeof data.error.error_message !== 'undefined')
					{
						var error_messages = "";
						$.each(data.error.error_message, function(index, message){
							error_messages += message+"\n\n";
						});
						alert(error_messages);
					}
				}
			}
		});
	});
	// secure file
	$(".chattrButton").each(function(){
		$(this).click(function(){
			if(checkSession() == false) { return; }
			var addpost = {};
			addpost.secure_file = '',
			addpost.set_attr = $(this).attr('data-set_attr'),
			addpost.file_name = $(this).attr('data-file_name');
			addpost.item = $(this).attr('data-item');
			$('#dialog').html(ask_change_attr.replace("%file_name%",addpost.file_name));
			$('#dialog').dialog({
				autoOpen: true,
				width: 450,
				modal: true,
				buttons: [{ text: yes, click: function(){
						$.ajax({
							type: "POST",
							url: "home.php?m=litefm&home_id="+home_id+"&type=cleared",
							data: addpost,
							complete: function(){ 
								window.location.href = window.location.href.replace('&back','');
							}
						});
						$( this ).dialog( "close" );
					}
				},{ text: no, click: function(){
						$( this ).dialog( "close" );
					}
				}],
				close: function() {
					$( this ).dialog( "close" );
				}
			});
		});
	});
	// send_by_email
	$("#send_by_email.operations-button").click(function(){
		if(checkSession() == false) { return; }
		var addpost = {};
		addpost.items = [];
		addpost.send_by_email = '';
		var value = '';
		var items = '';
		$('input[class="item"]:checked').each(function(){
			item = $(this).attr('data-item');
			value = $(this).attr('value');
			addpost.items.push(item);
			items += "<br>"+value;
		});
		if(items != '')
		{
			if(user_email == "")
			{
				user_email = "destination@email";
			}
			$('#dialog').html(ask_send_by_email+":"+items+"<br>"+
							 "<label for='archive_name'>"+archive_name+"</label><br>\n"+
							 "<input name='archive_name' id='archive_name' type=text value='archive' style='width:100%;'><br>\n"+
							 "<label for='archive_type'>"+archive_type+"</label><br>\n"+
							 "<select name='archive_type' id='archive_type' style='width:100%;'>\n"+
							 "<option value='zip'>zip</option>\n"+
							 "<option value='tbz'>tbz</option>\n"+
							 "<option value='tgz'>tgz</option>\n"+
							 "<option value='tar'>tar</option>\n"+
							 "<option value='bz2'>bz2 ("+compresses_files_separately+")</option>\n"+
							 "</select><br>"+
							 "<label for='subject'>"+subject+"</label><br>\n"+
							 "<input name='subject' id='subject' type=text value='Files attached' style='width:100%;'><br>\n"+
							 "<label for='message'>"+message+"</label><br>\n"+
							 "<textarea name='message' id='message' style='width:100%;'>There are the files you requested from OGP</textarea><br>\n"+
							 "<label for='dest_email'>"+dest_email+"</label><br>\n"+
							 "<input name='dest_email' id='dest_email' type=text value='"+user_email+"' style='width:100%;'><br>\n");
			
			$('#dialog').dialog({
				autoOpen: true,
				width: 450,
				modal: true,
				buttons: [{ text: yes, click: function(){
						addpost.archive_name = $('#archive_name').val();
						addpost.archive_type = $('#archive_type').val();
						addpost.subject = $('#subject').val();
						addpost.message = $('#message').val();
						addpost.dest_email = $('#dest_email').val();
						$.ajax({
							type: "POST",
							url: "home.php?m=litefm&home_id="+home_id+"&type=cleared",
							data: addpost,
							success: function(data){
								data = $.trim(data);
								if(data != '')
								{
									alert(data);
								}
							},
							complete: function(){
								window.location.href = window.location.href.replace('&back','');
							}
						});
						$( this ).dialog( "close" );
					}
				},{ text: no, click: function(){
						$( this ).dialog( "close" );
					}
				}],
				close: function() {
					$( this ).dialog( "close" );
				}
			});
		}
		else
		{
			alert(select_at_least_one_item);
		}
	});
});

function resetUploadUI(){
	$(".uploadLiteFMStatus").html('').removeClass('success').removeClass('error');
	$("form#upload input#files, form#upload input#uploadsubmit").removeClass('disabled').prop('disabled', false);
	
	$('.progress').hide();
	$('.percent').html('0%');
	$('.percent2').html('0%');
	
	$('progress.bar').attr('value', '0');
	$('progress.bar2').attr('value', '0');
}
