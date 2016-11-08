function toggleChecked(status) {
	$("input[type=checkbox]").each( function() {
		$(this).attr('checked', status).prop('checked', status);
	});
}