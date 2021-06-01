/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var menuJsDosLineasListTimer;

	jQuery(window).resize(function (){
		clearTimeout(menuJsDosLineasListTimer);
		menuJsDosLineasListTimer = setTimeout(menu_js_dos_lineas, 100);
	});




	// Menu size controller

	jQuery(".custom-logo").css("height", "60px");

	jQuery(function(){
		var state = true;
	    jQuery(document).scroll(function(){
	    	if(jQuery(this).scrollTop() == 0){
				jQuery(".custom-logo").animate({
					height: "60px",
				}, "fast", "linear");
				state = true;
	    	}else if(jQuery(this).scrollTop() > 1 && state){
				jQuery(".custom-logo").animate({
					height: "27px",
				}, "fast", "linear");
				state = false;
	    	}
	    });
	});


	function menu_js_dos_lineas() {
		// Determine if the menu is lowered
		// if (jQuery() <= ) {} // mejora
			if(jQuery(".menu-menu-principal-container").height() > 26){
				jQuery('.menu-menu-principal-container').addClass('delete-wall-art');
			}else{
				jQuery('.menu-menu-principal-container').removeClass('delete-wall-art');			
			}

		// Determine footer position

		function windowHeightCacl(){
			if(jQuery("body").hasClass("admin-bar")){
				var header_footer_height = jQuery('.site-branding').outerHeight(true) + jQuery('#colophon').outerHeight(true) + jQuery('#wpadminbar').outerHeight(true)
			}else{
				var header_footer_height = jQuery('.site-branding').outerHeight(true) + jQuery('#colophon').outerHeight(true);
			}
			var min_height = jQuery(window).outerHeight(true) - header_footer_height;
			
			var page_height = jQuery('#content').outerHeight(true);
			
			if(page_height < min_height){
			   jQuery("body").addClass("no-have-scroll");
			}else{
				jQuery("body").removeClass("no-have-scroll");
			}
		};

		setInterval(windowHeightCacl, 2000);

		// Menu last child 

		jQuery(".current_page_item").addClass("current_page_item_line");
		jQuery(".current-menu-item").addClass("current_page_item_line");

		var menu_last_child = jQuery("#menu-menu-principal li").last();
		menu_last_child.addClass("menu-last-child");



		jQuery("#pestaña a").attr("target", "_blank");


		// allows the animation of the hamburger menu
		jQuery(document).delegate(".menu-toggle", "click", function(event) {
			jQuery("#bottom-content").addClass("shadow-content");
			jQuery("#site-navigation").attr("animate", "toggled");
			jQuery("body").css("overflow", "hidden");
			jQuery("#page").css("overflow", "hidden");
			jQuery("#content").addClass("content-toggle");
		    jQuery(this).addClass("oppenned");
		    event.stopPropagation();
		});

		jQuery(document).delegate("#bottom-content", "click", function(event) {
			jQuery("#bottom-content").removeClass("shadow-content");
			jQuery("#site-navigation").attr("animate", "no-toggled");
			jQuery("#content").removeClass("content-toggle");
		    setTimeout( function() {
		    	jQuery(".menu-toggle").removeClass("oppenned");
				jQuery("#page").css("overflow", "visible");
				jQuery("body").css("overflow", "visible");
		    	jQuery("#site-navigation").removeClass("toggled");
		    	jQuery("#site-navigation").attr("animate", "");
		    }, 600);
		    event.stopPropagation();
		});

		jQuery(document).delegate(".oppenned", "click", function(event) {
			jQuery("#bottom-content").removeClass("shadow-content");
			jQuery("#site-navigation").attr("animate", "no-toggled");
			jQuery("#content").removeClass("content-toggle");
			setTimeout( function() {
				jQuery(".menu-toggle").removeClass("oppenned");
				jQuery("#page").css("overflow", "visible");
				jQuery("body").css("overflow", "visible");		
		    	jQuery("#site-navigation").attr("animate", "");
		    }, 600);
		    event.stopPropagation();
		});



		// Add class so that the submenu is displayed

			// Computer

		jQuery(".menu-item-has-children").mouseover(function(e) {

			if( window.innerWidth > 990) {
				jQuery(this, ".sub-menu").find(" > .sub-menu").addClass("menu-over");

				var menu_over = jQuery(this).find(' > .sub-menu');

				menu_over.css("display", "table");

				setTimeout( function() {

					var position_menu_over = menu_over.offset().left + menu_over.width()

					if (position_menu_over >= jQuery(document).width()) {
						menu_over.css("left", "-100%");
					}

				}, 10);

			}
		});

		jQuery(".menu-item-has-children").mouseout(function() {
			if( window.innerWidth > 990) {
				jQuery(this, ".sub-menu").find(" > .sub-menu").removeClass("menu-over");
				
				jQuery(this).find(' > .sub-menu').css("display", "none");

			}
		});

			// Phone
		if(!jQuery(".menu-item-has-children").find(" > span").hasClass("button-menu")){
			jQuery(".menu-item-has-children").append("<span class='button-menu'></span>")
		}

	}

	menu_js_dos_lineas();

	// Phone
	jQuery(document.body).on("click", ".button-menu", function(){
		jquery_this = jQuery(this);
		if( window.innerWidth < 990) {

			jQuery(".menu-item-has-children .sub-menu").removeAttr("style");

			if(jquery_this.parent().find(" > .sub-menu").hasClass("menu-over")){
				jQuery(this).parent().find(".sub-menu").removeClass("menu-over");
			}else{
				jQuery(this).parent().find(" > .sub-menu").addClass("menu-over");
			}
		}
	});

	// WooCommerce star status

	jQuery(document).ready(function(){

		jQuery("#review_form  .star-1").hover(function(){
			jQuery(this).addClass("star-hover");
		}, function(){
			jQuery(this).removeClass("star-hover");
		}
		);

		jQuery("#review_form  .star-2").hover(function(){
			jQuery(".star-1").addClass("star-hover");
			jQuery(this).addClass("star-hover");
		}, function(){
			jQuery(".star-1").removeClass("star-hover");
			jQuery(this).removeClass("star-hover");
		}
		);

		jQuery("#review_form  .star-3").hover(function(){
			jQuery(".star-1").addClass("star-hover");
			jQuery(".star-2").addClass("star-hover");
			jQuery(this).addClass("star-hover");
		}, function(){
			jQuery(".star-1").removeClass("star-hover");
			jQuery(".star-2").removeClass("star-hover");
			jQuery(this).removeClass("star-hover");
		}
		);

		jQuery("#review_form  .star-4").hover(function(){
			jQuery(".star-1").addClass("star-hover");
			jQuery(".star-2").addClass("star-hover");
			jQuery(".star-3").addClass("star-hover");
			jQuery(this).addClass("star-hover");
		}, function(){
			jQuery(".star-1").removeClass("star-hover");
			jQuery(".star-2").removeClass("star-hover");
			jQuery(".star-3").removeClass("star-hover");
			jQuery(this).removeClass("star-hover");
		}
		);

		jQuery("#review_form  .star-5").hover(function(){
			jQuery(".star-1").addClass("star-hover");
			jQuery(".star-2").addClass("star-hover");
			jQuery(".star-3").addClass("star-hover");
			jQuery(".star-4").addClass("star-hover");
			jQuery(this).addClass("star-hover");
		}, function(){
			jQuery(".star-1").removeClass("star-hover");
			jQuery(".star-2").removeClass("star-hover");
			jQuery(".star-3").removeClass("star-hover");
			jQuery(".star-4").removeClass("star-hover");
			jQuery(this).removeClass("star-hover");
		}
		);


		jQuery(document.body).on("click", "#review_form  .stars span > a", function() {
				if(jQuery(this).attr("class") == "star-1 star-hover active" || jQuery(this).attr("class") == "star-1 star-completely star-hover active" || jQuery(this).attr("class") == "star-1 star-completely active star-hover"){
					jQuery(this).addClass("star-completely");
					jQuery(".star-2").removeClass("star-completely");
					jQuery(".star-3").removeClass("star-completely");
					jQuery(".star-4").removeClass("star-completely");
					jQuery(".star-5").removeClass("star-completely");
				}

				if(jQuery(this).attr("class") == "star-2 star-hover active" || jQuery(this).attr("class") == "star-2 star-completely star-hover active" || jQuery(this).attr("class") == "star-2 star-completely active star-hover"){
					jQuery(".star-1").addClass("star-completely");
					jQuery(this).addClass("star-completely");
					jQuery(".star-3").removeClass("star-completely");
					jQuery(".star-4").removeClass("star-completely");
					jQuery(".star-5").removeClass("star-completely");
				};

				if(jQuery(this).attr("class") == "star-3 star-hover active" || jQuery(this).attr("class") == "star-3 star-completely star-hover active" || jQuery(this).attr("class") == "star-3 star-completely active star-hover"){
					jQuery(".star-1").addClass("star-completely");
					jQuery(".star-2").addClass("star-completely");
					jQuery(this).addClass("star-completely");
					jQuery(".star-4").removeClass("star-completely");
					jQuery(".star-5").removeClass("star-completely");					
				};

				if(jQuery(this).attr("class") == "star-4 star-hover active" || jQuery(this).attr("class") == "star-4 star-completely star-hover active" || jQuery(this).attr("class") == "star-4 star-completely active star-hover"){
					jQuery(".star-1").addClass("star-completely");
					jQuery(".star-2").addClass("star-completely");
					jQuery(".star-3").addClass("star-completely");
					jQuery(this).addClass("star-completely");
					jQuery(".star-5").removeClass("star-completely");					
				};
				if(jQuery(this).attr("class") == "star-5 star-hover active" || jQuery(this).attr("class") == "star-5 star-completely star-hover active" || jQuery(this).attr("class") == "star-5 star-completely active star-hover"){
					jQuery(".star-1").addClass("star-completely");
					jQuery(".star-2").addClass("star-completely");
					jQuery(".star-3").addClass("star-completely");
					jQuery(".star-4").addClass("star-completely");
					jQuery(this).addClass("star-completely");
				};
		});	
	});

	var container, button, menu, links, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			setTimeout( function() {
				container.className = container.className.replace( ' toggled', '' );
				button.setAttribute( 'aria-expanded', 'false' );
				menu.setAttribute( 'aria-expanded', 'false' );
			}, 600);	
		} else {

			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( container ) );
} )();
