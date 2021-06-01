/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Update of dark color
 

    document.addEventListener('DOMContentLoaded', function () {
        /**
         * Selectice refresh check from https://github.com/xwp/wp-jetpack/blob/feature/selective-refresh-widget-support/modules/widgets/contact-info/contact-info-map.js#L35
         * @type {*}
         */
        hasSelectiveRefresh = (
            'undefined' !== typeof wp &&
            wp.customize &&
            wp.customize.selectiveRefresh &&
            wp.customize.widgetsPreview &&
            wp.customize.widgetsPreview.WidgetPartial
        );
        if (hasSelectiveRefresh) {
            wp.customize.selectiveRefresh.bind('partial-content-rendered', function (placement) {
				var content_sidebar_1_width = jQuery('.content-sidebar-1').width();
				
				if (content_sidebar_1_width != 340) {
					jQuery('.content-sidebar-1 .widget').addClass('col-xl-4 col-md-6');
				}
            });
        }
	    $( document ).on( 'customize-preview-menu-refreshed', function( e, params ) {
	        if ( 'nav-menu' === params.wpNavMenuArgs.theme_location ) {
				// Add class so that the submenu is displayed

					// Computer

				jQuery(".menu-item-has-children").mouseover(function(e) {
						// console.log(jQuery("li#menu-item-32").find(' > .sub-menu'));

					if( jQuery( document ).width() > 975) {

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
					if( jQuery( document ).width() > 975) {
						jQuery(this, ".sub-menu").find(" > .sub-menu").removeClass("menu-over");
						
						jQuery(this).find(' > .sub-menu').css("display", "none");

					}
				});


					// Phone
				if(!jQuery(".menu-item-has-children").find(" > span").hasClass("button-menu")){
					jQuery(".menu-item-has-children").append("<span class='button-menu'></span>")
				}

				jQuery(".button-menu").click(function() {

					jquery_this = jQuery(this);
					if( jQuery( document ).width() < 975) {

						jQuery(".menu-item-has-children .sub-menu").removeAttr("style");

						if(jquery_this.parent().find(" > .sub-menu").hasClass("menu-over")){
							jQuery(this).parent().find(".sub-menu").removeClass("menu-over");
						}else{
							jQuery(this).parent().find(" > .sub-menu").addClass("menu-over");
						}
					}
				});
	        }
	    });

    });



	wp.customize( 'dark_mode_general', function( value ) {
		value.bind( function( to ) {
		  // console.log(to);
		} );
	});
     
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );

	} );

} )( jQuery );
