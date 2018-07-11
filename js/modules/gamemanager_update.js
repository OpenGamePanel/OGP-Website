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

$(document).ready(function(){
	if( GetURLParameter('get_sgc') == 'show' )
	{
		var home_id = GetURLParameter('home_id');
		var mod_id = GetURLParameter('mod_id');
		var returnUrl = "home.php?m=gamemanager&p=update&update=refresh&home_id="+home_id+"&mod_id="+mod_id
		var addpost = {};
		addpost.sgc = '';
		$('#dialog').html("<label for='SteamGuardCode'>Steam Guard:</label>\n"+
						  "<input class='SteamGuardCode' type=text style='width:99%;' name='sgc'>");
		$('#dialog').dialog({
			autoOpen: true,
			width: 450,
			modal: true,
			buttons: [{ text: "Send Code", click: function(){
					addpost.sgc = $('input[class="SteamGuardCode"]').val();
					$.ajax({
						type: "POST",
						url: returnUrl,
						data: addpost,
						async: false,
						success: function(data){
							$('#dialog').html("<div class=\"loader\"></div>");
							setTimeout(function(){
								window.location.href = returnUrl;
							}, 10000);
						}
					});
				}
			}],
			close: function() {
				$( this ).dialog( "close" );
			}
		});
	}
});