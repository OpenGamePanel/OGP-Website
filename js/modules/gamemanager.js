function uploadMapImg(button) {
	var home_id = $(button).attr('id');
	var mod_id = $(button).attr('data-mod_id');
	var map = $(button).attr('data-map');
	
	var title = $('#translation').attr('data-title');
	var upload_button = $('#translation').attr('data-upload_button');
	var bad_file = $('#translation').attr('data-bad_file');
	var upload_failure = $('#translation').attr('data-upload_failure');
	
	$('div.main-content').append('<div class="dialog-form'+home_id+'" title="'+title+'" >\
								  <form class="upload-mapImage-form'+home_id+'" enctype="multipart/form-data" >\
								  <input type="hidden" name="map" value="'+map+'" />\
								  <input type="file" name="map-image" class="'+home_id+'" value="" />\
								  <input type="hidden" name="home_id" value="'+home_id+'" />\
								  <input type="hidden" name="mod_id" value="'+mod_id+'" />\
								  </form>\
								  </div>');

	$( ".dialog-form"+home_id ).dialog({
		autoOpen: true,
		height: 145,
		width: 350,
		modal: true,
		buttons: [{ text: upload_button, click: function(){
				var filename = $('input[name=map-image].'+home_id).val().split('\\').pop(),
					extension = filename.split('.').pop();
				
				if(extension.match(/png|jpg|gif/) != null)
				{
					filesize = $('input[name=map-image].'+home_id)[0].files[0].fileSize;
					if(filesize > 1048576)
					{
						alert(bad_file);
					}
					else
					{
						$(".upload-mapImage-form"+home_id).append('<input type="hidden" name="extension" value="'+extension+'" />');
						$('.status'+home_id).remove();
						$( ".dialog-form"+home_id ).append('<center class="status'+home_id+'" ><img style="height:10px;" src="images/loading.gif" /></center>');
						data = new FormData($(".upload-mapImage-form"+home_id)[0]);
						console.log('Submitting');
						$.ajax({
							type: 'POST',
							url: 'home.php?m=gamemanager&p=upload_map_image&type=cleared',
							data: data,
							cache: false,
							contentType: false,
							processData: false
						}).done(function(data) {
							$('.status'+home_id).remove();
							$( ".dialog-form"+home_id ).append('<center class="status'+home_id+'" >'+$.trim(data)+'</center>');
						}).fail(function(jqXHR,status, errorThrown) {
							$('.status'+home_id).remove();
							$( ".dialog-form"+home_id ).append('<center class="status'+home_id+'" >'+upload_failure+'</center>');
							console.log(errorThrown);
							console.log(jqXHR.responseText);
							console.log(jqXHR.status);
						});
					}
				}
				else
				{
					alert(bad_file);
				}
			}
		}],
		close: function() {
			$( ".dialog-form"+home_id ).remove();
		}
	});
}

$(document).ready(function(){
	$('input#search').quicksearch('table#servermonitor tbody tr.maintr');
	$("#servermonitor")
		.collapsible("td.collapsible", {collapse: true})
		.tablesorter({sortList: [[0,0], [1,0]] , widgets: ['zebra']});


	$("div#server_icon").click(function(){
		var id = $(this).attr('class');
		if($("input[type=radio]."+id).attr('checked'))
		{
			$("input[type=radio]."+id).attr('checked', false).prop('checked', false);
		}
		else
		{
			$("input[type=radio]."+id).attr('checked', true).prop('checked', true);
		}
	});

	$('.size').click(function(){
		var id = $(this).attr('data-home_id');
		$.post( "home.php?m=user_games&type=cleared&p=get_size&home_id="+id, function( data ) {
			$('.size[data-home_id='+id+']').text( data ).removeClass('sizeText').addClass('sizeText');
		});
	});

	$('#execute_operations').click(function(){
		var addpost = {};
		$('input[type=radio]:checked').each(function( ){
			var name = $(this).attr('name');
			var value = $(this).val();
			addpost[ name ] = value;
		});
		
		$('.right.bloc').html('<img src="images/loading.gif" />');
		
		$.ajax({
		type: "POST",
		url: "home.php?m=gamemanager&p=game_monitor",
		data: addpost,
		complete: function(){ 
			document.location.reload(); 
		}
		});
	});

	$('img#action-stop').click(function(){
		$('input[type=radio]#action-stop').each(function( ){
			if( this.checked )
			{
				$(this).attr('checked', false).prop('checked', false);
			}
			else
			{
				$(this).attr('checked', true).prop('checked', true);
			}
		});
	});

	$('img#action-restart').click(function(){
		$('input[type=radio]#action-restart').each(function( ){
			if( this.checked )
			{
				$(this).attr('checked', false).prop('checked', false);
			}
			else
			{
				$(this).attr('checked', true).prop('checked', true);
			}
		});
	});

	$('img#action-start').click(function(){
		$('input[type=radio]#action-start').each(function( ){
			if( this.checked )
			{
				$(this).attr('checked', false).prop('checked', false);
			}
			else
			{
				$(this).attr('checked', true).prop('checked', true);
			}
		});
	});
	
	// Allow admin users to set game server order
	handleOrderingGameServers();
});


function handleOrderingGameServers(){
	var elemBeingDragged = null;
	var childExpanderRow = null;
	var helperItemBeingDragged = null;
	if($('h2.isAdminUser').length){
		$('table#servermonitor tbody').sortable({
			handle: '.sortHandle', // https://stackoverflow.com/questions/15554951/sortable-rows-only-when-a-specific-column-is-dragged#answer-16753297
			delay: 250, // https://stackoverflow.com/questions/22913592/jquery-ui-sortable-any-event-to-trigger-once-delay-completed
			start: function( event, ui ) {
				$('.expand-child td').css('display', 'none');
				$('td', ui.item).removeClass('expanded');
				ui.helper.css('cursor', 'move');
				elemBeingDragged = ui.item;	
				childExpanderRow = elemBeingDragged.nextAll('tr.expand-child').first();
				helperItemBeingDragged = ui.helper;
			},
			stop: function( event, ui ) {
				if(childExpanderRow && childExpanderRow.length && elemBeingDragged && elemBeingDragged.length){
					elemBeingDragged.after(childExpanderRow.detach());
					if(childExpanderRow.next('tr.expand-child').length){
						elemBeingDragged.before(childExpanderRow.next('tr.expand-child').detach());
					}
				}
				if(helperItemBeingDragged.length){
					helperItemBeingDragged.css('cursor', '');
				}
			},
			update: function(event, ui){
				saveGameServerOrder();
			}
		});
	}
}

function saveGameServerOrder(){
	var i = 0;
	var postData = {order: new Array()};
	var homeId = null;
	
	if(userAPIKey){
		
		// Build the data
		$('table#servermonitor tbody .maintr:visible').each(function(e){
			homeId = $('td.serverId', $(this)).text();
			if(homeId){
				postData.order.push({home_id: homeId, order: i});
				i++;
			}
		});
		
		// Make the call		
		$.ajax({
			type: "POST",
			url: "ogp_api.php?gamemanager_admin/reorder&token=" + userAPIKey,
			data: JSON.stringify(postData),
			success: function(e){
				logToConsole("Game server order successfully saved!");
			}
		});
	}
}
