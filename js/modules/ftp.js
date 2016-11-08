$(document).ready(
	function (){
		$(".tablesorter").collapsible("td.collapsible", {collapse: true})
		.tablesorter({
				// set default sort column
				sortList: [[4,0]],
				// don't sort by first column
				headers: {0: {sorter: false}}
				// set the widgets being used - zebra stripping
				, widgets: ['zebra']
				, onRenderHeader: function (){
					this.wrapInner("<span></span>");
				}
				, debug: false
			});
	}
);