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

if(typeof p === 'undefined')
{
	$(document).ready(function(){ 
		$('input[name=remote_host]').change(function() { 
			$('#remote_host_ftp_ip').val(this.value);
		});
		$("#servermonitor")
		.collapsible("td.collapsible", {collapse: true});
	});
	$(document).tooltip({
		items: "img.center",
		position: {
			my: "left+5 centre", 
			at: "right top-290"
		},
		content: function() {
			var url = $( this ).attr("data-url");
			return "<img src='" + url + "'>";
		}
	});
}
else if(p == 'arrange_ports')
{
	$(document).ready(function(){
		$("input[type=text]").each(function(){
			$(this).numeric();
		});
		$('input#start_port.add').on('input', function() {
			$('input#end_port.add').val( Number($(this).val()) );
			$('span#total_assignable_ports.add').html(  parseInt( ( Number( $('input#end_port.add').val() ) - Number( $(this).val() ) ) / Number( $('input#port_increment.add').val() ) ) + 1 );
		});
		$('input#end_port.add').on('input', function() {
			$('span#total_assignable_ports.add').html(  parseInt( ( Number( $(this).val() ) - Number( $('input#start_port.add').val() ) ) / Number( $('input#port_increment.add').val() ) ) + 1 );
		});
		$('input#port_increment.add').on('input', function() {
			$('span#total_assignable_ports.add').html(  parseInt( ( Number( $('input#end_port.add').val() ) - Number( $('input#start_port.add').val() ) ) / Number( $(this).val() ) ) + 1 );
		});
	});
}