$(document).ready(
	function(){  
		$('.dragbox')  
		.each(function(){  
			$(this).hover(function(){  
				$(this).find('h4').addClass('collapse'); 
			}, function(){  
			$(this).find('h4').removeClass('collapse');  
			})  
			.find('h4').hover(function(){  
				$(this).find('.configure').css('visibility', 'visible'); 
			}, function(){  
				$(this).find('.configure').css('visibility', 'hidden');  
			})  
			.click(function(){  
				$(this).siblings('.dragbox-content').toggle();  
				//Save state on change of collapse state of panel  
				updateWidgetData();  
			})  
			.end()  
			.find('.configure').css('visibility', 'hidden');  
		});  
	  
		$('.column').sortable({  
			connectWith: '.column',  
			handle: 'h4',  
			cursor: 'move',  
			placeholder: 'placeholder',  
			forcePlaceholderSize: true,  
			opacity: 0.4,   
			start: function(event, ui){
				$(ui.item).find('.dragbox-content').toggle();
			},
			stop: function(){  
				updateWidgetData();  
			}
		})  
		.disableSelection();  
	}  
);
function updateWidgetData(){  
	var items=[];  
	$('.column').each(function(){  
		var columnId=$(this).attr('id');  
		$('.dragbox', this).each(function(i){  
			var collapsed=0;  
			if($(this).find('.dragbox-content').css('display')=="none")  
				collapsed=1;  
			//Create Item object for current panel  
			var item={  
				id: $(this).attr('id'),  
				collapsed: collapsed,  
				order : i,  
				column: columnId  
			};  
			//Push item object into items array  
			items.push(item);  
		});  
	});  
	//Assign items array to sortorder JSON variable  
	var sortorder={ items: items };  
	//Pass sortorder variable to server using ajax to save state  
	$.post('home.php?m=dashboard&p=updateWidgets', 'data='+$.toJSON(sortorder), function(response){ 
		if(response.indexOf("success") < 0){
			$("#console").html('<h0><div class="Failed">Failed to update widget order.</div></h0>').hide().fadeIn(1000);  
		}
	});  
}