// EDIT HOME 
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

function loadMods() {
	if( $('#mods').get(0) )
	{
		var addpost = {};
		addpost[ 'm' ] = 'user_games';
		addpost[ 'p' ] = 'mods';
		addpost[ 'type' ] = 'cleared';
		addpost[ 'home_id' ] = GetURLParameter('home_id');
		$.ajax({
			type: "GET",
			url: "home.php",
			data: addpost,
			success: function(data){
				$( "#mods" ).html(data);
			}
		});
	}
}

$(document).ready(function() {
	loadMods();
	var select_home_path = $('#dialog').attr('data-select_home_path');
	var set_this_path = $('#dialog').attr('data-set_this_path');
	var cancel = $('#dialog').attr('data-cancel');
	// Open folder browser
	$('#browse').unbind().click(function(event){
		var addpost = {};
		addpost[ 'm' ] = 'user_games';
		addpost[ 'p' ] = 'browser';
		addpost[ 'home_id' ] = $(this).attr('data-home-id');
		addpost[ 'folder' ] = $(this).attr('data-path');
		addpost[ 'type' ] = 'cleared';
		addpost[ 'all_fs' ] = 'yes';
		$.ajax({
				type: "GET",
				url: "home.php",
				data: addpost,
				success: function(data){ 
					$( "#dialog" ).attr('title', select_home_path).html(data);
					$( "#dialog" ).dialog({
						resizable: true,
						width: 460,
						modal: true,
						buttons: 
						[{ text: set_this_path, click: function(){
								var selected_path = $('#selected_path').text();
								$('input[name="home_path"]').val(selected_path);
								$( "#change_home_path" ).click();
								$( this ).dialog( "close" );
							}
						},{ text: cancel, click: function(){
								$( this ).dialog( "close" );
							}
						}]
					});
				}
		});
		event.preventDefault();
	});
	// Enter folder
	$('.folder').each(function(){
		$(this).click(function(){
			var addpost = {};
			addpost[ 'm' ] = 'user_games';
			addpost[ 'p' ] = 'browser';
			addpost[ 'home_id' ] = $('.levelup').attr('data-home-id');
			addpost[ 'item' ] = $(this).attr('data-item');
			addpost[ 'type' ] = 'cleared';
			addpost[ 'all_fs' ] = 'yes';
			$.ajax({
					type: "GET",
					url: "home.php",
					data: addpost,
					success: function(data){
						$( "#dialog" ).html(data);
					}
			});
		});
	});
	// Back to previous folder
	$('.levelup').click(function(){
		var addpost = {};
		addpost[ 'm' ] = 'user_games';
		addpost[ 'p' ] = 'browser';
		addpost[ 'home_id' ] = $(this).attr('data-home-id');
		addpost[ 'back' ] = 'back';
		addpost[ 'type' ] = 'cleared';
		addpost[ 'all_fs' ] = 'yes';
		$.ajax({
				type: "GET",
				url: "home.php",
				data: addpost,
				success: function(data){ 
					$( "#dialog" ).html(data);
				}
		});
	});
	// Create new folder
	$('#addfolder').click(function(){
		var addpost = {};
		addpost[ 'm' ] = 'user_games';
		addpost[ 'p' ] = 'browser';
		addpost[ 'home_id' ] = $('.levelup').attr('data-home-id');
		addpost[ 'create_folder' ] = 'create_folder';
		addpost[ 'folder_name' ] = $('input[name=dirname]').val();
		addpost[ 'type' ] = 'cleared';
		addpost[ 'all_fs' ] = 'yes';
		$.ajax({
				type: "GET",
				url: "home.php",
				data: addpost,
				success: function(data){ 
					$( "#dialog" ).html(data);
				}
		});
	});
	
	$("#main_settings select, #main_settings input").change(function(){
		$(this).css("background", "#fe9cb1");
	});
	
	$('#main_settings input:submit').unbind().click(function(e){
		var submitName = $(this).attr('name');
		if(submitName != 'delete_ftp' && submitName != 'create_ftp' && submitName != 'master_server')
		{
			e.preventDefault();
			var thisForm = $(this).closest('form');
			var formData = thisForm.serializeArray();
			formData.push({ name: submitName });
			if(submitName == 'change_home')
			{
				$.each( formData, function( i, field ) {
					if( field.name == "home_path" )
					{
						formData[i]['value'] = formData[i]['value'].replace(/\\/g,'');
						thisForm.find('input[name="home_path"]').val(formData[i]['value']);
					}
				});
			}
			$.post(window.location + "&type=cleared", formData, function(data) {
				if(data.result == 'success')
				{
					thisForm.find("select, input[type='text']").css("background", "#bdf2a2");
					if(submitName == 'change_home_cfg_id')
					{
						loadMods();
					}
				}
				$("#result").html('<p class="'+data.result+'">'+data.info+'</p>');
			}, "json");
		}
	});

});

$(window).load(function(){
	$('input[name="expiration_date"]').datetimepicker();
});
