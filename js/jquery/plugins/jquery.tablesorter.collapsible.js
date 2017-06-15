/**
 * @author Dan G. Switzer II
 */
(function ($){
	/* declare defaults */
	var defaults = {
		selector: "td.collapsible"        // the default selector to use
		, toggleAllSelector: ""           // the selector to use to attach the collapsibleToggle() function
		, classChildRow: "expand-child"   // define the "child row" css class
		, classCollapse: "collapsed"      // define the "collapsed" css class
		, classExpand: "expanded"         // define the "expanded" css class
		, showCollapsed: false            // specifies if the default css state should show collapsed (use this if you want to collapse the rows using CSS by default)
		, collapse: true                  // if true will force rows to collapse via JS (use this if you want JS to force the rows collapsed)
		, fx: {hide:"hide",show:"show"}   // the fx to use for showing/hiding elements (fx do not work correctly in IE6)
		, addAnchor: "append"             // how should we add the anchor? append, wrapInner, etc
		, textExpand: "Expand All"        // the text to show when expand all
		, textCollapse: "Collapse All"    // the text to show when collase all
	};

	$.fn.collapsible = function (sel, options){
		var self = this, bIsElOpt = (sel && sel.constructor == Object),
			settings = $.extend({}, defaults, bIsElOpt ? sel : options);
		
		if( !bIsElOpt ) settings.selector = sel;
		// make sure that if we're forcing to collapse, that we show the collapsed css state
		if( settings.collapse ) settings.showCollapsed = true;
		
		return this.each(function (){
			var $td = $(settings.selector, this);

				// if a "toggle all" selector has been specified, find and attach the behavior
				if( settings.toggleAllSelector.length > 0 ) $(this).find(settings.toggleAllSelector).collapsibleToggle(this);
			
				$("#servermonitor tr td.collapsible").click(function(){
					var $self = $(this), 
						$tr = $self.parent(), 
						$trc = $tr.next(), 
						bIsCollapsed = $self.hasClass(settings.classExpand);
					// change the css class
					$self[bIsCollapsed ? "removeClass" : "addClass"](settings.classExpand)[!bIsCollapsed ? "removeClass" : "addClass"](settings.classCollapse);
					while( $trc.hasClass(settings.classChildRow) ){
						// show all the table cells
						$("td", $trc)[bIsCollapsed ? settings.fx.hide : settings.fx.show]();
						// get the next row
						$trc = $trc.next();
					}
					return false;
				});
			
			// if not IE and we're automatically collapsing rows, collapse them now
			if( settings.collapse ){
				$td
					// get the tr element
					.parent()
					.each(function (){
						var $tr = $(this).next();
						while( $tr.hasClass(settings.classChildRow) ){
							// hide each table cell
							$tr = $tr.find("td").hide().end().next();
						}
					});
				$td.removeClass(settings.classCollapse).addClass(settings.classCollapse);
			}

			$("#servermonitor tr.expandme td.collapsible").each(function(){
					var $self = $(this), 
						$tr = $self.parent(), 
						$trc = $tr.next(), 
						bIsCollapsed = $self.hasClass(settings.classExpand);
					// change the css class
					$self[bIsCollapsed ? "removeClass" : "addClass"](settings.classExpand)[!bIsCollapsed ? "removeClass" : "addClass"](settings.classCollapse);
					while( $trc.hasClass(settings.classChildRow) ){
						// show all the table cells
						$("td", $trc)[bIsCollapsed ? settings.fx.hide : settings.fx.show]();
						// get the next row
						$trc = $trc.next();
					}
					return false;
				});
		});
	}
	
	$.fn.collapsibleToggle = function(table, options){
		var settings = $.extend({}, defaults, options), $table = $(table);

		// attach the expand behavior to all options
		this.toggle(
			// expand all entries
			function (){
				var $el = $(this);
				$el.addClass(settings.classExpand).removeClass(settings.classCollapse);
				if( !$el.is("td,th") )
					$el[$el.is(":input") ? "val" : "html"](settings.textCollapse);
				$(settings.selector, $table).removeClass(settings.classExpand).click();
			}
			// collapse all entries
			, function (){
				var $el = $(this);
				$el.addClass(settings.classCollapse).removeClass(settings.classExpand);
				if( !$el.is("td,th") )
					$el[$el.is(":input") ? "val" : "html"](settings.textExpand);
				$(settings.selector, $table).addClass(settings.classExpand).click();
			}
		);
		
		// update text
		if( !this.is("td,th") ) this[this.is(":input") ? "val" : "html"](settings.textExpand);
		
		return this.addClass(settings.classCollapse).removeClass(settings.classExpand);
	}
	
	var $self = $("#servermonitor tr.expandme td.collapsible");

})(jQuery);
