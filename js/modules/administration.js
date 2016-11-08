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

var p = GetURLParameter('p');

if(p == 'banlist')
{
	$(document).ready(function(){
		$('span#check').css({'cursor':'pointer','color':'blue'});
		$('span#check').click(function(){
			$('input[type=checkbox]').each(function( ){
				if( this.checked )
				{
					$(this).attr('checked', false);
				}
				else
				{
					$(this).attr('checked', true);
				}
			});
		});
	});
}
else if(p == 'watch_logger')
{
	$(document).ready(function() 
		{ 
			$('input#search').quicksearch('table#servermonitor tbody tr.maintr');
			$("#servermonitor")
				.collapsible("td.collapsible", {collapse: true})
				.tablesorter({sortList: [[1,1]] , widgets: ['zebra','repeatHeaders']}); 
		} 
	);
}