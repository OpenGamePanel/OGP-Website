$(document).ready(function(){
	
	var uninstalling_module_dataloss = $('#dialog').attr('data-uninstalling_module_dataloss');
	var are_you_sure = $('#dialog').attr('data-are_you_sure');
	var remove_files_for = $('#dialog').attr('data-remove_files_for');
	var confirm = $('#dialog').attr('data-confirm');
	var cancel = $('#dialog').attr('data-cancel');
	
	$('.install').click(function(){
		var addpost = {};
		var folder = $(this).attr('data-module-folder');
		addpost[ 'm' ] = 'modulemanager';
		addpost[ 'p' ] = 'add';
		addpost[ 'module' ] = folder;
		
		$('#loading.'+folder).html('<img style="height:10px;" src="images/loading.gif" />');
		
		$.ajax({
		type: "GET",
		url: "home.php",
		data: addpost,
		complete: function(){ 
			document.location.reload(); 
		}
		});
	});

	$('.uninstall').click(function(){
		var addpost = {};
		var folder = $(this).attr('data-module-folder');
		var id = $(this).attr('data-module-id');
		addpost[ 'm' ] = 'modulemanager';
		addpost[ 'p' ] = 'del';
		addpost[ 'id' ] = id;
		addpost[ 'module' ] = folder;
		$( "#dialog" ).attr('title', are_you_sure+'?').html('<p>'+uninstalling_module_dataloss+'</p>');
		$( "#dialog" ).dialog({
			resizable: false,
			height:150,
			modal: true,
			buttons: 
			[{ text: confirm, click: function(){
					$( this ).dialog( "close" );
					$('#loading.'+folder).html('<img style="height:10px;" src="images/loading.gif" />');
					$.ajax({
						type: "GET",
						url: "home.php",
						data: addpost,
						complete: function(){ 
							document.location.reload(); 
						}
					});
				}
			},{ text: cancel, click: function(){
					$( this ).dialog( "close" );
				}
			}]
		});
	});

	$('.remove').click(function(){
		var addpost = {};
		var folder = $(this).attr('data-module-folder');
		var mode = $(this).attr('data-remove-mode');
		addpost[ 'remove' ] = mode;
		addpost[ 'folder' ] = folder;
		
		$( "#dialog" ).attr('title', are_you_sure+'?').html('<p>'+remove_files_for+' '+folder+'?</p>');
		$( "#dialog" ).dialog({
			resizable: false,
			height:150,
			modal: true,
			buttons: 
			[{ text: confirm, click: function(){
					$( this ).dialog( "close" );
					$('#loading.'+folder).html('<img style="height:10px;" src="images/loading.gif" />');
					$.ajax({
						type: "POST",
						url: "home.php?m=extras&type=cleared",
						data: addpost,
						complete: function(){ 
							document.location.reload();
						}
					});
				}
			},{ text: cancel, click: function(){
					$( this ).dialog( "close" );
				}
			}]
		});
	});

	$('button[name=update]').click(function(){
		$('#updateButton').html('<img style="height:20px;" src="images/loading.gif" />');
		var addpost = {};
		addpost.theme = [];
		addpost.module = [];
		addpost.update = '';
		var name = '';
		var value = '';
		$('input[type=checkbox]:checked').each(function(){
			name = $(this).attr('name');
			value = $(this).attr('value');
			if(name == 'theme')
			{
				addpost.theme.push(value);
			}
			if(name == 'module')
			{
				addpost.module.push(value);
			}
			return addpost;
		});
		var mirror = $('#mirror').val();
		if(typeof mirror != "undefined")
		{
			addpost.mirror = mirror;
		}
		$.ajax({
			type: "POST",
			url: "home.php?m=extras&type=cleared",
			data: addpost,
			success: function(data){
				var message = data.replace(/(<([^>]+)>)/ig,"");
					message = message.trim();
				if(message != '')
				{
					alert(message);
				}
			},
			complete: function(){ 
				document.location.reload();
			}
		});
	});

});
