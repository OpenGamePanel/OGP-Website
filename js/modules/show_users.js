$(document).ready(function() {
	styleRows();
	removeAbilityToShowSubUsersIfNone();
	$("tr.subusersShowHide").click(function(e){
		// Get UID
		var td = $(this).find('td.subUserShowHideTextTd');
		var showText = $(td).attr('showtext');
		var hideText = $(td).attr('hidetext');
		var tr = $(this);
		var uid = $(tr).attr('uid');
		if(typeof uid != typeof undefined && uid != null && uid !== false && uid != ""){
			if(td.hasClass('expand')){
				moveSubuserRowsAndShow(td, tr, uid);
				styleSubUserRows(td, tr, uid);
				td.removeClass('expand').addClass('collapse');
				td.html(hideText + "&uarr;");
			}else if(td.hasClass('collapse')){
				hideSubuserRows(td, tr, uid);
				td.removeClass('collapse').addClass('expand');
				td.html(showText + "&darr;");
			}
		}
	});
	
	$('td.actions').click(function(e){
		e.stopPropagation();
	});
	
	// Trigger click on all subuser sections twice due to new search functionality which I do not like.
	$(".subusersShowHide").trigger("click").trigger("click");
});

function moveSubuserRowsAndShow(td, tr, uid){
	var subuserRowsOwnedByUid = $("tr[ownedby='" + uid + "']");
	var subuserRow = null;
	if(subuserRowsOwnedByUid.length){
		subuserRowsOwnedByUid.each(function(e){
			subuserRow = $(this).detach();
			$(tr).after(subuserRow);
			$(this).removeClass('hide');
		});
	}
}

function hideSubuserRows(td, tr, uid){
	var subuserRowsOwnedByUid = $("tr[ownedby='" + uid + "']");
	if(subuserRowsOwnedByUid.length){
		$(subuserRowsOwnedByUid).addClass('hide');
	}
}

function styleRows(){
	$("tr:not(.subuser):odd").css('background-color', '#ededed');
	$("tr:not(.subuser):even").css('background-color', '#FFF');
}

function styleSubUserRows(){
	$("tr:not(.subuser)").each(function(e){
		var childrenSubUsers
	});
}

function styleSubUserRows(td, tr, uid){
	$("tr[ownedby='" + uid + "']:even").css('background-color', '#e5ffff');
	$("tr[ownedby='" + uid + "']:odd").css('background-color', '#dbf3ff');
}

function removeAbilityToShowSubUsersIfNone(){
	$("tr.subusersShowHide").each(function(e){
		var uid = $(this).attr('uid');
		if(typeof uid != typeof undefined && uid != null && uid !== false && uid != ""){
			if(!$("tr[ownedby='" + uid + "']").length){
				$(this).removeClass('subusersShowHide');
				$(this).find('td.subUserShowHideTextTd').html('');
			}
		}
	});
}
