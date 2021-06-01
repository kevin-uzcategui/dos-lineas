( function( $ ) {
	//Event to handle resizing
	var postContentListTimer;
	
	var postContentSingleTimer;

	var backgoundContentListTimer;

	var woocommerceSizeAllTimer;

	var widgetJsTimer;

	var footerWidgetJsTimer;

	jQuery(window).resize(function (){
		clearTimeout(postContentListTimer);
		postContentListTimer = setTimeout(post_content_list, 100);

		clearTimeout(postContentSingleTimer);
		postContentSingleTimer = setTimeout(post_content_single, 100);

		clearTimeout(backgoundContentListTimer);
		backgoundContentListTimer = setTimeout(backgound_content_list, 100);

		clearTimeout(woocommerceSizeAllTimer);
		woocommerceSizeAllTimer = setTimeout(woocommerce_size_all, 100);

		clearTimeout(widgetJsTimer);
		widgetJsTimer = setTimeout(widget_js, 100);
	});

	/*
	 * Post
	 */
	
	function post_content_single() {
	
		if(jQuery(".single-post-container").hasClass("style-big-img")){
			if (jQuery("body").hasClass("single-post")) {

				var image_posts = jQuery('.image-posts');
				var posts_header_height = jQuery('.posts-header').outerHeight(true);
				var content_image_and_header_single_post = jQuery('.content-image-and-header-single-post, content-header-single-post')

				content_image_and_header_single_post.css('height', 'auto');
				var wp_post_image_width = image_posts.find('.wp-post-image').outerWidth(true);
				var wp_post_image_width_division = wp_post_image_width / 16;
				var wp_post_image_heigt_calc =  wp_post_image_width_division * 9;
				image_posts.css("height", wp_post_image_heigt_calc);

				if ( image_posts.find('.wp-post-image').outerHeight(true) <= posts_header_height ) {
					content_image_and_header_single_post.css('height', posts_header_height);
					image_posts.css('height', '100%');
				}
			}
		}

		if(jQuery(".single-post-container").hasClass("style-modern")){
			if (jQuery("body").hasClass("single-post")) {

				var content_image_and_header_single_post = jQuery('.content-image-and-header-single-post');
				var posts_header_height = jQuery('.posts-header').outerHeight(true);
				var content_image_and_header_single_post = jQuery('.content-image-and-header-single-post, content-header-single-post')

				content_image_and_header_single_post.css('height', 'auto');
				var wp_post_image_width = content_image_and_header_single_post.find('.wp-post-image').outerWidth(true);
				var wp_post_image_width_division = wp_post_image_width / 4;
				var wp_post_image_heigt_calc =  wp_post_image_width_division * 3;
				content_image_and_header_single_post.css("min-height", wp_post_image_heigt_calc);

			}
		}


		if (jQuery("body").hasClass("single-briefcase_dos_lineas") ) {

			var image_posts = jQuery('.image-posts');
			var posts_header_height = jQuery('.posts-header').outerHeight(true);
			var content_image_and_header_single_post = jQuery('.content-image-and-header-single-post, content-header-single-post')



			content_image_and_header_single_post.css('height', 'auto');
			var wp_post_image_width = image_posts.find('.wp-post-image').outerWidth(true);
			var wp_post_image_width_division = wp_post_image_width / 16;
			var wp_post_image_heigt_calc =  wp_post_image_width_division * 9;
			image_posts.css("height", wp_post_image_heigt_calc);



			if ( image_posts.find('.wp-post-image').outerHeight(true) <= posts_header_height ) {
				content_image_and_header_single_post.css('height', posts_header_height);
				image_posts.css('height', '100%');
			}
		}

	}

	// jQuery(document).ready(function(){
	// 	setTimeout( function() {
	// 		console.log("entro");
			post_content_single();
	// 	}, 5000);
	// });

	function post_content_list(){

		if(jQuery(".post-content-list").hasClass('post-style-vertical')){

			jQuery(".post-content-list .button-blog").css('position', 'inherit');

			jQuery(".post-content-list .button-blog").css('margin-bottom', '0');

			jQuery(".post-content-list .text-content-list").css('height', 'auto');

		}

		jQuery(".post-content-list").each(function(indice, elemento){
			/*Image provided*/
			var wp_post_image_width = jQuery(this).find('.img-responsive').outerWidth(true);
			var wp_post_image_width_division = wp_post_image_width / 16;
			var wp_post_image_heigt_calc =  wp_post_image_width_division * 9;

			jQuery('.post-content-list .wp-post-image').css('height', wp_post_image_heigt_calc);
		
			/*Assign size (style horizontal)*/
			if (jQuery(this).hasClass('post-style-horizontal')) {
				var text_content_list = jQuery(this).find('.text-content-list');

				var text_content_list_height = text_content_list.height();

				var text_content_list_count = 0;
				$(this).find('.text-content-list > *').each(function(indice, elemento){
					text_content_list_count += jQuery(this).outerHeight(true);	
				});

				$(this).find('.button-blog').css('bottom', text_content_list_count - text_content_list_height);


			}else if(jQuery(this).hasClass('post-style-vertical')){
				
				var this_jQuery = jQuery(this);

				setTimeout( function() {
					var post_content_list_height = this_jQuery.height();

					var content_briefcase_img_height = this_jQuery.find('.content-briefcase-img').height();

					this_jQuery.find('.text-content-list').css('height', post_content_list_height - content_briefcase_img_height);

					this_jQuery.find('.button-blog').css('position', 'absolute');
					this_jQuery.find('.button-blog').css('margin-bottom', '21px');		
				}, 200);	
			}
		});

	}

	post_content_list();

	/*
	 * Briefcase
	 */
	function backgound_content_list(){

		/*Variables*/

		var backgound_briefcase_list_width = jQuery('.backgound-briefcase-list').width();

		/*Carculo del tamaño de la imagen*/

		jQuery('.backgound-briefcase-list').css('height', backgound_briefcase_list_width);

		/*Carcular la cantidad de texto*/

		jQuery(".briefcase-title").each(function(indice, elemento){
			var briefcase_title_height = jQuery(this)[0].scrollHeight;

			if (backgound_briefcase_list_width - 7 < briefcase_title_height) {
				jQuery(this).addClass('title-big');
			}
		});

		// if(jQuery('.briefcase_dos_lineas-content-list').hasClass('briefcase-style-simple')){

		// }else if(jQuery('.briefcase_dos_lineas-content-list').hasClass('briefcase-style-line')){
				
		// }
	}

	backgound_content_list();

	/*
	 * WooCommerce
	 */

	function woocommerce_size_all(){
		var width_all = jQuery(window).width();
		var width_padding_margin_all = width_all - jQuery("#content").width();
		var width_padding_margin_half = width_padding_margin_all / 2;
		
		var width_padding_margin_half_menor = "-" + width_padding_margin_half;

		jQuery(".woocommerce-checkout-payment").before("<style>.woocommerce-checkout-payment{ margin-left:" + width_padding_margin_half_menor +  "px; margin-right:" + width_padding_margin_half_menor +  "px; padding-left:" + width_padding_margin_half +  "px; padding-right:"  + width_padding_margin_half +  "px;}</style>");
		jQuery(".woocommerce-tabs").before("<style>.woocommerce-tabs{ margin-left:" + width_padding_margin_half_menor +  "px; margin-right:" + width_padding_margin_half_menor +  "px; padding-left:" + width_padding_margin_half +  "px; padding-right:"  + width_padding_margin_half +  "px;}</style>");
	};

	document.addEventListener("DOMContentLoaded", function(event) {
		woocommerce_size_all();
	});

	/*
	 * Widget
	 */	

	function widget_js(){
		
		/*js #secondary.widget-area*/

		// Responsive

		var content_sidebar_1_width = jQuery('.content-sidebar-1').width();
		
		if (content_sidebar_1_width != 340) {
			jQuery('.content-sidebar-1 .widget').addClass('col-xl-4 col-md-6');
		}

		// calculate line size

		var recent_posts_width = jQuery('#secondary.widget-area .widget').width();
		jQuery('.widget-header').before('<style>.widget-header::after{ width: ' + recent_posts_width + 'px;}</style>');			
		
		/*js #widget-404.widget-area*/

		var recent_posts_width = jQuery('#widget-404.widget-area .widget').width();
		jQuery('.widget-header').before('<style>.widget-header::after{ width: ' + recent_posts_width + 'px;}</style>');	

	}
	document.addEventListener("DOMContentLoaded", function(event) {
		widget_js()
	});

} )( jQuery );