var header = $(".js-header");
var headerH = header.innerHeight();

function headerFixing() {
	$("body").css({
		paddingTop : headerH
	});

	header.css({
		position : "fixed",
		top : 0,
		left : 0,
		right : 0
	});
}

// Just fixing our header
headerFixing();

/* menu toggle button */
function toggleMainMenu(x) {
	x.classList.toggle("change");
	menuShowHide();
}

/* показ/скрытие меню */
function menuShowHide(speed){
	speed = speed || 0;

	var menu = $(".js-menu");

	menu.slideToggle(speed, function(){
		if (menu.is(":not(:visible)")) {
			menu.removeAttr("style");
		}
	});

}

$(".js-menu").singlePageNavigation({
	exceptClass : "menu__element_except",			// Class of items that except (will clickable, but not shine), default:  ""
	disabledClass : "menu__element_no-clickable",	// Class of items that disable (will shine, but not clickable), default:  ""
	current : "active",								// Current nav item class name, default:  "current"
	duration : 500,									// Scrolling speed (ms), default:  700
	delay : 300,									// Delay before scrolling, default:  0
	ease : "swing",									// Animate easing type, default:  "swing"
	offset : header,								// Top offset ([jquery element], [0 - xxx (px)]), default:  0
	offsetDynamic : 'innerHeight',					// Give an opportunity to set dynamic height for offset element, default : false
	scrollingOffsetBottom : 0.4, 					// Offset bottom (0.00 - 1.00 - percents (0.45 = 45% of window height), 1 - xxx - pixels), default:  0
	changeAddress : false,							// Changing address location when nav item clicked, default:  false
	currentClickable : true,						// Clickable of current nav element, default:  true
	beforeScrolling : function(){					// Function that execute before scrolling, default:  null
		console.log("start scrolling");

		if($(".btn-container").hasClass("change")){
			$(".btn-container").removeClass("change");
			menuShowHide(150);
		}
	},
	finishScrolling : function(){					// Function that execute after scrolling, default:  null
		console.log("finish scrolling");
	}
});
