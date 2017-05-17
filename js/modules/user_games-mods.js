$("#mods select, #mods input").change(function(){
	$(this).css("background", "#fe9cb1");
});

$('.set_options').click(function(){
	var instance = $(this);
	var mod_cfg_id = $(this).attr('id');
	var modtr = $('#mod_cfg_id_'+mod_cfg_id);
	var addpost = {};
	
	var cpus = [];

	$("#cpu_select").find('.cpus:checked').each(function(i, e) {
		cpus.push($(this).val());
		addpost['cpus'] = cpus.join();
	});

	addpost[ 'set_options' ] = 1;
	addpost[ 'cliopts' ] = modtr.find('#cliopts').val();

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
				if(instance.is('.set_affinity_button')){
					$("#cpu_select").css("background", "#bdf2a2");
				}else{
					modtr.find("select, input[type='text']").css("background", "#bdf2a2");
				}
			}
			$("#result").html('<p class="'+data.result+'">'+data.info+'</p>');
		},
		dataType: "json"
	});
});
