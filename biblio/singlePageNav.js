/*
 * jQuery Single Page Navigation Plugin
 * http://github.com/davinskiy/singlePageNavigation
 *
 * @version 1.0.0
 *
 */

;(function($){
	var name = "singlePageNavigation";
	$.fn[name] = function(options){
		
		var container = $(this);
		if (!container.data(name)){

			var f = function(){

				// Settings
				options.exceptClass = options.exceptClass || "";
				options.disabledClass = options.disabledClass || "";
				options.current = options.current || "current";
				options.duration = options.duration || 700;
				options.delay = options.delay || 0;
				options.ease = options.ease || "swing";
				options.offset = options.offset || 0;
				options.offsetDynamic = options.offsetDynamic || false;
				options.scrollingOffsetBottom = options.scrollingOffsetBottom || 0.4;
				options.changeAddress = options.changeAddress || false;
				options.currentClickable = options.currentClickable || true;
				options.beforeScrolling = options.beforeScrolling || null;
				options.finishScrolling = options.finishScrolling || null;

				var menu_items_li = $(container).children("li");
				var menu_items_a = $(container).find("a");
				var scrolled = false;

				// Scroll processing
				$(document).on("scroll", function() {

					if (scrolled) return;

					setTimeout(function(){
						var documentScroll = $(this).scrollTop();
						var docHeight = $( window ).height();
						var doc_view = (documentScroll + docHeight);

						// Bottom offset
						var bottom_offset = getPxFromPercent( options.scrollingOffsetBottom, docHeight );

						for(var i = 0; i < menu_items_a.length; i++){
							if(menu_items_li.eq(i).hasClass(options.exceptClass)){
								continue;
							}
							var item_pos = $(menu_items_a.eq(i).attr("href")).offset().top;

							if (doc_view > (item_pos + bottom_offset)) {
								menu_items_li.removeClass(options.current);
								menu_items_li.eq(i).addClass(options.current);
							}

						}
						scrolled = false;

					}, 50);
					scrolled = true;
				});

				// Click processing
				menu_items_a.on("click", function(e){
					
					if( !$(this).parent().hasClass(options.exceptClass) ){
						e.preventDefault();

						// Disable menu item for click
						if ($(this).parent().hasClass(options.disabledClass)) {
							return false;
						}

						// Clickable current menu item
						if (options.currentClickable === false) {
							if ($(this).parent().hasClass(options.current)) {
								return false;
							}
						}

						// Function that execute before scrolling
						if(options.beforeScrolling)
							options.beforeScrolling();

						// If we choice to change address of our browser, we do it
						if (options.changeAddress) {
							try {
								history.pushState(null, null, $(this).attr("href"));
							} catch(e) {
								location.hash = $(this).attr("href");
							}
						}


						// Position to scroll with offset
						var scrollTo = $($(this).attr("href")).offset().top;
						var completeCalled = false;

						setTimeout(function(){

							var offset_top = options.offset;

							// Setting dynamic height, if we choose it
							if (options.offsetDynamic !== false) {
								switch(options.offsetDynamic){
									case 'height': offset_top = offset_top.height(); break;
									case 'innerHeight': offset_top = offset_top.innerHeight(); break;
									case 'outerHeight': offset_top = offset_top.outerHeight(); break;
									default: offset_top = 0;
								}
							}

							scrollTo -= offset_top;

							// Scrolling to the position that we need
							$('html, body').animate({
								scrollTop: scrollTo
							}, {
								duration : options.duration,
								easing : options.ease,
								complete : function(){
									if(!completeCalled){
										completeCalled = true;
										if (options.finishScrolling) {
											options.finishScrolling();
										}
									}
								}
							});
						}, options.delay);
					}
				});


				function getPxFromPercent(percent, docHeight){
					if (percent < 1) {
						return (docHeight / 100) * ((percent < 1) ? percent * 100 : percent);
					}
					return percent;
				}
			}
			container.data( name, f() );
		}
		else {
			return container.data(name);
		}
	}
})(jQuery);

