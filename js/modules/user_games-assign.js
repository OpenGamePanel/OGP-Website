$('document').ready(function(){
	$('#change_access_rights_submit').prop('disabled', true);
	$(".change_access_rights").each( function( index, element ){
		$(element).on('change', function(){
			if($(".change_access_rights:checked").length > 0)
			{
				$('#change_access_rights_submit').prop('disabled', false);
			}
			else
			{
				$('#change_access_rights_submit').prop('disabled', true);
			}
		});
	});
});

function change_access_rights(id_type, assign_id)
{
	var rights = $("#dialog").data();
	var home_ids = [];
		
	$(".change_access_rights:checked").each( function( index, element ){
		home_ids[index] = $(element).data("home_id");
	});
	
	var check_access_rights = '<table>';
	
	$.each(rights, function( index, value ) {
		if(index == 'uiDialog')
		{
			return true;
		}
		check_access_rights += "<tr><td align='right'><label for='" + value + "'>" + langConsts['OGP_LANG_' + value] + ":</label></td>" +
							   "<td align='left'><input class='ar_flag' id='" + value + "' type='checkbox' name='" + value + "' value='" + index + "' checked='checked' /></td></tr>" +
							   "<tr><td colspan='2' class='info'>" + langConsts['OGP_LANG_' + value + '_info'] + "</td></tr>";
	});
	
	check_access_rights += '</table>';
	
	var addpost = {};
	addpost[ 'home_ids' ] = home_ids;
	addpost[ 'assign_id' ] = assign_id;
	addpost[ 'id_type' ] = id_type;
	addpost[ 'change_access_rights' ] = 'true';
	addpost.flags = [];
	var destURL = "home.php?m=user_games&p=assign&" + id_type + "_id=" + assign_id;
	var destURLCleared = destURL + "&type=cleared";
	$('#dialog').html(check_access_rights);
	$('#dialog').dialog({
		autoOpen: true,
		width: 450,
		modal: true,
		buttons: [{ text: "Set Access Rights", click: function(){
				$('input[class="ar_flag"]:checked').each(function(){
					var flag = $(this).val();
					addpost.flags.push(flag);
				});
				$.ajax({
						type: "POST",
						url: destURLCleared,
						data: addpost,
						success: function(data){
							location.href = destURL;
						}
				});
				$( this ).dialog( "close" );
			}
		}],
		close: function() {
			$( this ).dialog( "close" );
		}
	});
}