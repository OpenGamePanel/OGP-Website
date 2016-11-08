$("#mods select, #mods input").change(function(){
	$(this).css("background", "red");
});

$('.set_options').click(function(){
	var mod_cfg_id = $(this).attr('id');
	var modtr = $('#mod_cfg_id_'+mod_cfg_id);
	var addpost = {};
	addpost[ 'set_options' ] = 1;
	addpost[ 'cliopts' ] = modtr.find('#cliopts').val();
	addpost[ 'cpus' ] = modtr.find('#cpus').val();
	addpost[ 'nice' ] = modtr.find('#nice').val();
	addpost[ 'mod_cfg_id' ] = mod_cfg_id;
	if( modtr.find('#maxplayers').get(0) )
	{
		addpost[ 'maxplayers' ] = modtr.find('#maxplayers').val();
	}
	$.ajax({
		type: "POST",
		url: "home.php?m=user_games&p=edit&type=cleared&data_type=json&home_id="+GetURLParameter('home_id'),
		data: addpost,
		success: function(data){
			if(data.result == 'success')
			{
				modtr.find("select, input[type='text']").css("background", "green");
			}
			$("#result").html('<p class="'+data.result+'">'+data.info+'</p>');
		},
		dataType: "json"
	});
});
