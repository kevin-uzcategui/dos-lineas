<?php
/**
 * dos-lineas functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package WordPress
 * @package dos-lineas
 * @since 1.0
 * @version 1.0
 */






if ( ! function_exists( 'dos_lineas_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dos_lineas_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on dos-lineas, use a find and replace
		 * to change 'dos-lineas' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dos-lineas', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'nav-menu', esc_html__( 'Main menu (Header)', 'dos-lineas' ));

		register_nav_menu( 'footer-menu', esc_html__( 'Central Secondary Menu (Footer)', 'dos-lineas' ));

		register_nav_menu( 'footer-menu-2', esc_html__( 'Right secondary menu (Footer)', 'dos-lineas' ));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// habilita la eleccion de diferentes formatos en un post de Wordpress
			add_theme_support('post-formats', array( 
		'aside',
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 60,
			'width'       => 60,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		function theme_get_customizer_css() {
			ob_start();

			$main_font = get_theme_mod( 'main_font', '' );
			$main_font = !empty($main_font) ? $main_font : 'Raleway';	
			$archive_main_font = str_replace(' ', '', $main_font);
			$css_main_font = "\"$main_font\", sans-serif";

			$segundary_font = get_theme_mod( 'segundary_font', '' );
			$segundary_font = !empty($segundary_font) ? $segundary_font : 'Zilla Slab';
			$archive_segundary_font = str_replace(' ', '', $segundary_font);
			$css_segundary_font = "\"$segundary_font\", sans-serif";

			if($segundary_font === $main_font):

			?>
			@font-face {
				font-family: <?php echo $main_font ?>;
				src: url('<?php echo get_template_directory_uri() ?>/fonts/<?php echo $archive_main_font ?>-Regular.ttf'), 
				url('<?php echo get_template_directory_uri() ?>/fonts/<?php echo $archive_main_font ?>-Bold.ttf');
			}
			<?php
			
			else:

			?>
			@font-face {
				font-family: <?php echo $main_font ?>;
				src: url('<?php echo get_template_directory_uri() ?>/fonts/<?php echo $archive_main_font ?>-Regular.ttf') format('truetype'), 
				url('<?php echo get_template_directory_uri() ?>/fonts/<?php echo $archive_main_font ?>-Bold.ttf') format('truetype');
			}
			
			@font-face {
				font-family: <?php echo $segundary_font ?>;
				src: url('<?php echo get_template_directory_uri() ?>/fonts/<?php echo $archive_segundary_font ?>-Regular.ttf') format('truetype'), 
				url('<?php echo get_template_directory_uri() ?>/fonts/<?php echo $archive_segundary_font ?>-Bold.ttf') format('truetype');
			}			
			<?php

			endif;
			?>


			h1, h2, h3, h4, h5, h6{
				font-family: <?php echo $css_segundary_font; ?>;
			}

			body, button, input, select, optgroup, textarea{
				font-family: <?php echo $css_main_font; ?>;
			}
			<?php

			$main_color = get_theme_mod( 'main_color', '' );

			$main_color_dark = adjustBrightness($main_color, -30);

			if ( ! empty( $main_color ) ) {
				?>
				a:hover{
					color: <?php echo $main_color_dark; ?>;
				}
				table thead th{
					    border-bottom: 3px solid <?php echo $main_color; ?>;
				}
				.product_meta a::after, nav#site-navigation a::after, #colophon a::after, .container-blog a::after{
					border-top: 3px solid <?php echo $main_color; ?>;
				}
				.button-blog{
					border-bottom: 1px solid <?php echo $main_color; ?>;
				}
				hr{
					background-color: <?php echo $main_color; ?>;
				}
				.sep{
					color: <?php echo $main_color; ?>;
				}
				.color-blue::before{
					color: <?php echo $main_color; ?>;
				}
				button.button-border {
					border: 1px solid <?php echo $main_color; ?>;
					color: <?php echo $main_color; ?>;
				}
				button, button.button-forms, input[type="button"], input[type="reset"], input[type="submit"]{
				    background: <?php echo $main_color; ?>;
				}				
				a {
					color: <?php echo $main_color; ?>;
				}
				a::after {
					border-top: 3px solid <?php echo $main_color; ?>;
				}
				nav a::after, .site-footer a::after, .container-blog a::after{
				    border-top: 3px solid <?php echo $main_color; ?>;
				}
				.main-navigation.toggled .menu-menu-principal-container ul li{
					border-bottom: 1px solid <?php echo $main_color; ?>;
				}
				.main-navigation ul li.current_page_item_line::before{
					border-top: 3px solid <?php echo $main_color; ?>;
				}
				.main-navigation .menu-toggle .fa-bars-custom {
					color: <?php echo $main_color; ?>;
				}
				.main-navigation.toggled li.menu-item-has-children ul li{
					border-top: 1px solid <?php echo $main_color; ?>;
				}

				.main-navigation.toggled .menu-menu-principal-container ul.menu-over li.menu-item-has-children ul li{
				    border-top: 1px solid <?php echo $main_color; ?>;
				}


				@media screen and (max-width: 61.9em){
					.main-navigation .menu-menu-principal-container ul .menu-item-has-children .button-menu::after{
					    color: <?php echo $main_color; ?>;
					    border: 3px solid <?php echo $main_color; ?>;
					}
				}

				.style-modern .content-header-single-post .posts-header .product_meta:after{
					border-bottom: 3px solid <?php echo $main_color; ?>;
				}


				.style-modern .content-image-and-header-single-post .posts-header .product_meta:after{
					border-bottom: 3px solid <?php echo $main_color; ?>;
				}				

				.footer-content .footer-header::before{
					border-top: 3px solid <?php echo $main_color; ?>;
				}

				.footer-content .footer-header::after{
					border-top: 1px solid <?php echo $main_color; ?>;
				}

				h1.titlewidget::before, 
				h2.titlewidget::before, 
				h3.titlewidget::before, 
				h4.titlewidget::before, 
				h5.titlewidget::before, 
				h6.titlewidget::before {
					border-top: 3px solid <?php echo $main_color; ?>;
				}

				h1.titlewidget::after,
				h2.titlewidget::after,
				h3.titlewidget::after,
				h4.titlewidget::after,
				h5.titlewidget::after,
				h6.titlewidget::after{
				    border-top: 1px solid <?php echo $main_color; ?>;
				}
				figcaption{
					color: <?php echo $main_color; ?>;
				}
				.main-navigation .menu-cart .item-of-cart{
					background-color: <?php echo $main_color; ?>;
				}
				nav a::after{
					border-top: 3px solid <?php echo $main_color; ?>;
				}
				.widget-area .widget .widget-header::before{
				    border-top: 3px solid <?php echo $main_color; ?>;
				}

				.widget-area .widget .widget-header::after{
    				border-top: 1px solid <?php echo $main_color; ?>;
				}

				.line-img .elementor-image-box-img img {
					border-bottom: 3px solid <?php echo $main_color; ?>; 
				}

				button{
					background: <?php echo $main_color; ?>;
				}
				.elementor-widget-id_button .button-animation-1,
				input[type="submit"].wpcf7-submit,
				input[type="submit"].search-submit,
				input[type="submit"].submit,
				button.button{
					box-shadow: 0px 0px 0px 1px <?php echo $main_color; ?>;
				}
				.elementor-widget-id_button .button-animation-1:hover, 
				input[type="submit"].wpcf7-submit:hover, 
				input[type="submit"].search-submit:hover, 
				input[type="submit"].submit:hover, 
				button.button:hover {
				    box-shadow: 0px 0px 0px 3px <?php echo $main_color; ?>;
				}

				.main-navigation .menu-toggle .content-line-menu-toggle span{
				    background-color: <?php echo $main_color; ?>;
				}

				.ball:nth-child(1){
					background: <?php echo $main_color; ?>;
				}
				.ball:nth-child(2){
					background: <?php echo $main_color; ?>;
				}
				.ball:nth-child(3){
					background: <?php echo $main_color; ?>;
				}
				.ball:nth-child(4){
					background: <?php echo $main_color; ?>;
				}
				.ball:nth-child(5){
					background: <?php echo $main_color; ?>;
				}
				.ball:nth-child(6){
					background: <?php echo $main_color; ?>;
				}
				.ball:nth-child(7){
					background: <?php echo $main_color; ?>;
				}
				.main-navigation .menu-menu-principal-container > ul > li:not(.menu-item-has-children):last-child::after{
				    border-bottom-color: <?php echo $main_color; ?>;
				    border-right-color: <?php echo $main_color; ?>;
				}
				.main-navigation .menu-menu-principal-container > ul > li:not(.menu-item-has-children):last-child::before{
				    border-top-color: <?php echo $main_color; ?>;
				    border-left-color: <?php echo $main_color; ?>;
				}

				.main-navigation.toggled .menu-menu-principal-container li{
				    border-bottom: 1px solid <?php echo $main_color; ?>;
				}
				.main-navigation.toggled li.menu-item-has-children ul li{
					border-top: 1px solid <?php echo $main_color; ?>;
				}
				.post-content-list .text-content-list .button-blog:after, .post-content-list .text-content-list .button-blog:before{
					background-color: <?php echo $main_color; ?>;
				}

				.post-content-list .text-content-list .button-blog:before{
					border-top: 3px solid <?php echo $main_color; ?>;
				}

				.post-content-list .text-content-list .button-blog:hover:after, .post-content-list .text-content-list .button-blog:hover:before{
					border-top: 1px solid <?php echo $main_color; ?>;
				}

				.content-all-post-briefcase_dos_lineas .briefcase_dos_lineas-content-list.briefcase-style-line .row-briefcase-list .backgound-briefcase-list::before{
					background-color: <?php echo $main_color; ?>;
				}

				.error404 .error-404{
				    border-bottom: 1px solid <?php echo $main_color; ?>;
				}

				/* WooCommerce */
				.product_meta a::after{
				    border-top: 3px solid <?php echo $main_color; ?>;
				}
				.woocommerce-MyAccount-content a::after{
					border-top: 3px solid <?php echo $main_color; ?>;
				}

				.products .product .add_to_cart_button, .products .product .product_type_simple, .products .product .added_to_cart{
					background: <?php echo $main_color; ?>;
				}

				.products .product > .woocommerce-LoopProduct-link .onsale{
					color: <?php echo $main_color; ?>;
				}

				.woocommerce-ordering .orderby{
				    border: 1px solid <?php echo $main_color; ?>;
				    background: transparent;
				    color: <?php echo $main_color; ?>;
				}
				.single-product-content .woocommerce-tabs .wc-tabs .description_tab.active{
					background-color: <?php echo $main_color; ?>;
				}
				.single-product-content .woocommerce-tabs .wc-tabs .description_tab{
				    border-bottom: 3px solid <?php echo $main_color; ?>;
				    border-right: 1px solid <?php echo $main_color; ?>;
				    border-left: 1px solid <?php echo $main_color; ?>;
				}
				.single-product-content .onsale{
					   background-color: <?php echo $main_color; ?>;
				}
				.single-product-content .woocommerce-tabs ul.wc-tabs > li{
				    border-bottom: 3px solid <?php echo $main_color; ?>;
				    border-right: 1px solid <?php echo $main_color; ?>;
				    border-left: 1px solid <?php echo $main_color; ?>;
				}

				.single-product-content .woocommerce-tabs ul.wc-tabs .reviews_tab.active, .single-product-content .woocommerce-tabs ul.wc-tabs > li.active{
					background-color: <?php echo $main_color; ?>;
				}


				.woocommerce-cart .woocommerce form.woocommerce-cart-form table.shop_table thead th{
					border-bottom: 3px solid <?php echo $main_color; ?>;
				}
				.woocommerce-cart .woocommerce .cart-collaterals .wc-proceed-to-checkout .checkout-button{
					background: <?php echo $main_color; ?>;
				}

				.single-product-content .woocommerce-tabs ul.wc-tabs .reviews_tab{
					border-bottom: 3px solid <?php echo $main_color; ?>;

					border-right: 1px solid <?php echo $main_color; ?>;

					border-left: 1px solid <?php echo $main_color; ?>;
				}
				

				.woocommerce-account .woocommerce-MyAccount-navigation ul{
					background-color: <?php echo $main_color; ?>;
				}
				.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active{
				    border-top: 3px solid <?php echo $main_color; ?>;
				    border-right: 1px solid <?php echo $main_color; ?>;
				    border-left: 1px solid <?php echo $main_color; ?>;
				}
				.woocommerce-account .woocommerce-MyAccount-navigation ul .woocommerce-MyAccount-navigation-link{
				    border-right: 1px solid <?php echo $main_color; ?>;
				    border-left: 1px solid <?php echo $main_color; ?>;
				}
				.woocommerce-account .woocommerce-MyAccount-navigation ul li{
					border-top: 3px solid <?php echo $main_color; ?>;
				    border-bottom: 3px solid <?php echo $main_color; ?>;
				    background-color: <?php echo $main_color; ?>;
				}
				.woocommerce-checkout .type-page .woocommerce-checkout-payment ul.wc_payment_methods li.wc_payment_method{
					border: 3px solid <?php echo $main_color; ?>;	
				}
				.woocommerce-order-received #content .woocommerce-notice{
					border-top: 3px solid <?php echo $main_color; ?>;
				}
				.woocommerce-order-received #content ul.woocommerce-order-overview li{
					border-left: 1px solid <?php echo $main_color; ?>;
				}

				<?php
			}

			$segundary_color = get_theme_mod( 'segundary_color', '' );

			$segundary_color_dark = adjustBrightness($segundary_color, -25);

			if ( ! empty( $segundary_color ) ) {
				?>

				.site-branding{
					background: <?php echo $segundary_color; ?>;
				}
				footer{
					background-color: <?php echo $segundary_color; ?>;
				}
				.background-blue{
					background-color: <?php echo $segundary_color; ?>;
				}

				.style-big-img .content-image-and-header-single-post .posts-header{
					background-color: <?php echo $segundary_color; ?>bd;
				}

				.style-big-img .content-header-single-post .posts-header{
					background-color: <?php echo $segundary_color; ?>;
				}

				.line-segundary-img img{
					border-bottom: 3px solid <?php echo $segundary_color; ?>;
				}
				.main-navigation.toggled{
					background: <?php echo $segundary_color; ?>;
				}
				.main-navigation .menu-menu-principal-container .menu-item-has-children .menu-over{
					background-color: <?php echo $segundary_color; ?>;
				}
				.posts-header-sidebar{
					background-color: <?php echo $segundary_color; ?>d9;
				}
				.elementor-widget-id_button .button-animation-1,
				input[type="submit"].wpcf7-submit,
				input[type="submit"].search-submit,
				input[type="submit"].submit,
				button.button{
					background: <?php echo $segundary_color; ?>;
				}
				.posts-header{
					background-color: <?php echo $segundary_color; ?>d9;
				}
				.containerbol{
				    background-color: <?php echo $segundary_color; ?>fa;
				}

				.main-navigation.toggled .menu-menu-principal-container > ul > li{
					background-color: <?php echo $segundary_color_dark; ?>;
				}

				.main-navigation.toggled .menu-menu-principal-container ul.menu-over li.menu-item-has-children.menu-item-type-taxonomy{
				    border-bottom: 1px solid <?php echo $segundary_color; ?>;
				}

				.main-navigation.toggled .menu-menu-principal-container > ul > li > ul > li{
					background-color: <?php echo $segundary_color; ?>;
				}

				.main-navigation.toggled .menu-menu-principal-container > ul > li > ul > li ul li a{
				    color: <?php echo $segundary_color; ?>;
				}

				.content-all-post-briefcase_dos_lineas .briefcase_dos_lineas-content-list.briefcase-style-simple .row-briefcase-list .backgound-briefcase-list:hover .briefcase-title-content{
					background-color: <?php echo $segundary_color; ?>70;
				}

				.content-all-post-briefcase_dos_lineas .briefcase_dos_lineas-content-list.briefcase-style-simple .row-briefcase-list .backgound-briefcase-list .briefcase-title-content .briefcase-title.title-big::before{
					background-image: linear-gradient(to bottom, transparent 60%, <?php echo $segundary_color; ?> 100%);

				}

				.content-all-post-briefcase_dos_lineas .briefcase_dos_lineas-content-list .row-briefcase-list .backgound-briefcase-list{
					background-color: <?php echo $segundary_color; ?>;	
				}

				.content-all-post-briefcase_dos_lineas .briefcase_dos_lineas-content-list.briefcase-style-simple .row-briefcase-list .backgound-briefcase-list:hover .briefcase-link .briefcase-title-content{
					background-color: <?php echo $segundary_color; ?>70;
				}

				.content-all-post-briefcase_dos_lineas .briefcase_dos_lineas-content-list.briefcase-style-line .row-briefcase-list:hover .backgound-briefcase-list .briefcase-link .briefcase-title-content{
       				background-image: linear-gradient(to left, transparent 0%, <?php echo $segundary_color; ?> 100%);	

				}

				.content-all-post-briefcase_dos_lineas .briefcase_dos_lineas-content-list.briefcase-style-line .row-briefcase-list .backgound-briefcase-list .briefcase-link .briefcase-title-content .briefcase-title.title-big::before{
					background-image: linear-gradient(to bottom, transparent 60%, <?php echo $segundary_color; ?> 100%);
				}



				/*WooCommerce*/

				.woocommerce-order-received #content .woocommerce-notice::after{
					border: 3px solid <?php echo $segundary_color; ?>;
					color: <?php echo $segundary_color; ?>;
				}
		    	.products .product > .woocommerce-LoopProduct-link .star-rating::before{
		    		background-color: <?php echo $segundary_color; ?>;
		  		}


				.single-product-content .entry-summary .price ins{
					background: <?php echo $segundary_color; ?>;
				}

				.products .product > .woocommerce-LoopProduct-link .price{
						background-color: <?php echo $segundary_color; ?>;
				}

				.products .product > .woocommerce-LoopProduct-link .onsale{
					background-color: <?php echo $segundary_color; ?>;				
				}
				
				.woocommerce-order-received #content .woocommerce-order > p ~ p::before{
					color: <?php echo $segundary_color; ?>;
				}

			  <?php
			}

			$text_color = get_theme_mod( 'text_color', '' );
			if ( ! empty( $text_color ) ) {
			  ?>
				input[type="text"],
				input[type="email"],
				input[type="url"],
				input[type="password"],
				input[type="search"],
				input[type="number"],
				input[type="tel"],
				input[type="range"],
				input[type="date"],
				input[type="month"],
				input[type="week"],
				input[type="time"],
				input[type="datetime"],
				input[type="datetime-local"],
				input[type="color"],
				textarea {
					color: <?php echo $text_color; ?>;
				}

				input[type="text"]:focus,
				input[type="email"]:focus,
				input[type="url"]:focus,
				input[type="password"]:focus,
				input[type="search"]:focus,
				input[type="number"]:focus,
				input[type="tel"]:focus,
				input[type="range"]:focus,
				input[type="date"]:focus,
				input[type="month"]:focus,
				input[type="week"]:focus,
				input[type="time"]:focus,
				input[type="datetime"]:focus,
				input[type="datetime-local"]:focus,
				input[type="color"]:focus,
				textarea:focus {
					color: <?php echo $text_color; ?>;
				}

				body,
				button,
				input,
				select,
				optgroup,
				textarea {
					color: <?php echo $text_color; ?>;
				}
				.post-content-list .text-content-list .entry-title a{
					color: <?php echo $text_color; ?>;
				}

			  <?php
			}

			$dark_mode = get_theme_mod( 'dark_mode', '' );

			$dark_color = get_theme_mod( 'dark_color', '' );

			if ( ! empty( $dark_color ) and $dark_mode) {
				?>
				body, input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"], select, textarea{
					color: #fff;
					background-color: <?php echo $dark_color; ?> !important;
				}

				label{
					color: #fff;
				}

				input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"], select, textarea{
				    border-top: 1px solid #fff;
				    border-left: 1px solid #fff;
				    border-right: 1px solid #fff;
				    border-bottom: 3px solid #fff;	
		    	}

		    	input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="number"]:focus, input[type="tel"]:focus, input[type="range"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="week"]:focus, input[type="time"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="color"]:focus, textarea:focus{
		    		color: #fff;
		    	}

				<?php
			}

			// Shadow

			$post_setting_shadow = get_theme_mod( 'post_setting_shadow', '' );

			if ( ! empty( $post_setting_shadow ) ) {
				?>
				.post-content-list .content-briefcase-img a, .post-content-list .text-content-list{
					box-shadow: 0px 0px 50px 0px rgba(0, 0, 0, 0.3);
				}
				<?php
			}

			$briefcase_setting_shadow = get_theme_mod( 'briefcase_setting_shadow', '' );

			if ( ! empty( $briefcase_setting_shadow ) ) {
				?>
				.content-all-post-briefcase_dos_lineas .briefcase_dos_lineas-content-list .row-briefcase-list{
					box-shadow: 0px 0px 50px 0px rgba(0, 0, 0, 0.3);
				}
				<?php
			}

			$woocommerce_shadow_setting = get_theme_mod( 'woocommerce_shadow_setting', '' );

			if ( ! empty( $woocommerce_shadow_setting	 ) ) {
				?>
				.products .product{
					box-shadow: 0px 0px 50px 0px rgba(0, 0, 0, 0.3);
				}
				<?php
			}

			$header_shadow_setting = get_theme_mod( 'header_shadow_setting', '' );

			if ( ! empty( $header_shadow_setting	 ) ) {
				?>
				.site-branding{
					box-shadow: 0px 7px 37px 0px rgba(0,0,0,0.37 );
				}
				<?php
			}


			$css = ob_get_clean();

			return $css;

		}
	}
	
endif;
add_action( 'after_setup_theme', 'dos_lineas_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dos_lineas_content_width() {
	// This variable is intended to be oViewruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'dos_lineas_content_width', 640 );
}
add_action( 'after_setup_theme', 'dos_lineas_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dos_lineas_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dos-lineas' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'add widget here. It appears among all the articles, between the content and the comments', 'dos-lineas' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-header">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Bottom left widget (Footer)', 'dos-lineas' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets to the footer here. The location of this widget area is the bottom left', 'dos-lineas' ),
		'before_widget' => '<div id="%1$s" class="col-lg footer-content widget widget-footer %2$s center-fixed ">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-header center-table">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'dos_lineas_widgets_init' );

/**
 * Elementor compatibility
 */


require_once 'custom-elementor.php';

function create_custom_categories( $elements_manager ) {

    $elements_manager->add_category(
        'custom-category-dos-lineas',
        [
         'title' => __( 'Dos Lineas (exclusive)', 'dos-lineas' ),
         'icon' => 'fa fa-plug',
        ]
    );
}
add_action( 'elementor/elements/categories_registered', 'create_custom_categories' );


/**
 * Custom Post Type
 */



// Creamos un CPT con soporte para Genesis de briefcase

if ( ! function_exists('dos_lineas_create_cpt_portfolio') ) {

	// Registramos el CPT de briefcase

	function dos_lineas_create_cpt_portfolio() {

		$labels = array(
			'name'                => __( 'Portfolio', 'dos-lineas' ),
			'singular_name'       => __( 'Portfolio', 'dos-lineas' ),
			'menu_name'           => __( 'Portfolio', 'dos-lineas' ),
			'name_admin_bar'      => __( 'Portfolio', 'dos-lineas' ),
			'parent_item_colon'   => __( 'Father:', 'dos-lineas' ),
			'all_items'           => __( 'Portfolio', 'dos-lineas' ),
			'add_new_item'        => __( 'Add Portfolio', 'dos-lineas' ),
			'add_new'             => __( 'Add Portfolio', 'dos-lineas' ),
			'new_item'            => __( 'New Portfolio', 'dos-lineas' ),
			'edit_item'           => __( 'Edit Portfolio', 'dos-lineas' ),
			'update_item'         => __( 'Update Portfolio', 'dos-lineas' ),
			'view_item'           => __( 'View Portfolio', 'dos-lineas' ),
			'search_items'        => __( 'Search of Portfolio', 'dos-lineas' ),
			'not_found'           => __( 'Not found', 'dos-lineas' ),
			'not_found_in_trash'  => __( 'Not found', 'dos-lineas' ),
		);
		$args = array(
			'label'               => __( 'cero_post_type_Briefcase', 'dos-lineas' ),
			'description'         => __( 'Look what we are able to do', 'dos-lineas' ),
			'labels'              => $labels,
			'show_in_rest' => true,
			'supports'            => array( 
										'title', 
										'editor', 
										'page-attributes',
										'excerpt', 
										'author',
										'thumbnail', 
										'comments',
										'trackbacks',
										'revisons',
										'post_formats',
										'custom-fields',
										'genesis-cpt-archives-settings',
										'genesis-seo',
										'genesis-scripts',
										'genesis-layouts',
										'genesis-rel-author',	
									),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 4,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,		
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'taxonomies'          => array( 'category_briefcase' ),
			'menu_icon' => 'dashicons-portfolio',
			'query_var'          => "ture",
			'rewrite'            => array( 'slug' => __( 'portfolio', 'dos-lineas' ) ),

		);

	  register_taxonomy( 'category_briefcase', array( 0 => 'briefcase_dos_lineas' ), array(
	    'hierarchical'       => true,
	    'show_in_rest' 				 => true,
	    'label' => __( 'Categories' , 'dos-lineas' ),
	    'singular_label' => __( 'Category' , 'dos-lineas' ),
	    'labels'             => array(
								    'name'             => __( 'Project Categories', 'dos-lineas' ),
								    'singular_name'    => __( 'Category', 'dos-lineas' ),
									'menu_name'         => _x( 'Categories', 'Admin menu name', 'dos-lineas' ),
								    'search_items'     => __( 'Search of por Categories', 'dos-lineas'  ),
								    'all_items'        => __( 'All Categories', 'dos-lineas' ),
								    'parent_item'      => __( 'Categories father', 'dos-lineas' ),
								    'parent_item_colon'=> __( 'Categories father:', 'dos-lineas' ),
								    'edit_item'        => __( 'Edit Categories', 'dos-lineas' ),
								    'update_item'      => __( 'Update Categories', 'dos-lineas' ),
								    'add_new_item'     => __( 'Add new Categories', 'dos-lineas' ),
								    'new_item_name'    => __( 'new name Categories', 'dos-lineas' ),
								    'menu_name' 	   => __( 'Categories', 'dos-lineas'),
	  							),
		'public'                     => true,
		'show_ui'                    => true,
	    'show_in_rest' 				 => true,		  
		'show_admin_column'          => true,
		'show_in_menu'				 => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	    'rewrite'           		 => array( 'slug' => __( 'category-portfolio', 'dos-lineas') ),
	    'default_term'       => __( 'Uncategorized', 'dos-lineas'),  	
	  ));

		register_post_type( 'briefcase_dos_lineas', $args );

	}

	// adding translations to One Click Demo Import

	if (

		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_CL.mo') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_CL.po') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_CO.mo') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_CO.po') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_ES.mo') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_ES.po') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_GT.mo') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_GT.po') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_MX.mo') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_MX.po') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_PE.mo') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_PE.po') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_PR.mo') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_PR.po') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_UY.mo') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_UY.po') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_VE.mo') or
		!file_exists(dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_VE.po')

	) {
		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_CL.mo', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_CL.mo');
		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_CL.po', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_CL.po');

		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_CO.mo', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_CO.mo');
		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_CO.po', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_CO.po');	

		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_ES.mo', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_ES.mo');
		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_ES.po', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_ES.po');

		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_GT.mo', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_GT.mo');
		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_GT.po', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_GT.po');

		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_MX.mo', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_MX.mo');
		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_MX.po', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_MX.po');	

		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_PE.mo', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_PE.mo');
		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_PE.po', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_PE.po');

		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_PR.mo', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_PR.mo');
		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_PR.po', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_PR.po');

		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_UY.mo', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_UY.mo');
		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_UY.po', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_UY.po');	

		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_VE.mo', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_VE.mo');
		copy(dirname(__FILE__, 1) . '/languages/one-import/pt-ocdi-es_VE.po', dirname(__FILE__, 3) . '/languages/plugins/pt-ocdi-es_VE.po');
	}

}

add_action( 'init', 'dos_lineas_create_cpt_portfolio', 0 );

// Adding translations to One Click Demo Import


function one_click_demo_custom_translate_text( $traduccion ) { 


	if (
		get_locale() == 'es_ES' or 
		get_locale() == 'es_UY' or 
		get_locale() == 'es_CO' or 
		get_locale() == 'es_MX' or 
		get_locale() == 'es_VE' or 
		get_locale() == 'es_AR' or 
		get_locale() == 'es_GT' or 
		get_locale() == 'es_PE' or 
		get_locale() == 'es_PR' or 
		get_locale() == 'es_CL' and
		is_admin()
	) {

	    $palabras = array(
	        'When you import the data, the following things might happen:' => 'Al importar los datos, pueden ocurrir las siguientes cosas:',
	        'if you want to import the WooCommerce test data, you must have it done the plug-in before exporting the Demo.' => 'Si desea importar los datos de prueba de WooCommerce, debe hacer que se complete el complemento antes de exportar la demostración.',
	        'Avance' => 'Avanzado',
	        'Photography' => 'Fotografía',
			'Jewelry' => 'Joyas',
			'Restaurant' => 'Restaurante',
			'Clothing' => 'Ropa',
			'Service' => 'Servicios',
			'Technological' => 'Tecnológico',
	    );
	    $traduccion = str_ireplace(array_keys($palabras), $palabras, $traduccion);
	    return $traduccion; 
	}
	return $traduccion;
  
}
add_filter('gettext', 'one_click_demo_custom_translate_text'); 
add_filter('ngettext', 'one_click_demo_custom_translate_text');


/**
 * Filter the except length to 25 words.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Enqueue scripts and styles.
 */

function dos_lineas_scripts() {

	wp_enqueue_style('line-main-styles', get_stylesheet_uri(), array('line-google-fonts', 'bootstrap_css', 'fontawesome_css'));

	// if(function_exists( 'theme_get_customizer_css' )){
		$custom_css = theme_get_customizer_css();
	    wp_add_inline_style( 'line-main-styles', $custom_css );
    // }

	wp_enqueue_style( 'bootstrap_css', 
  					'//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', 
  					array(), 
  					'4.4.1'); 

	wp_enqueue_style( 'fontawesome_css', 
  					get_site_url() . '/wp-content/themes/dos-lineas/file-sontawesome/css/all.css'); 

	wp_enqueue_script( 'bootstrap_js', 
  					'//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', 
  					array('jquery'), 
  					'4.4.1', 
  					true); 

	wp_enqueue_script( 'dos-lineas-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151217', true );

	wp_enqueue_script( 'dos-lineas-general', get_template_directory_uri() . '/js/general.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'dos-lineas-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'dos_lineas_scripts' );

function admin_style() {

	wp_enqueue_style('admin-styles', get_stylesheet_directory_uri().'/admin.css');

	wp_enqueue_script('admin_custom_script', get_stylesheet_directory_uri().'/js/admin.js', array(), false, true );

}

add_action('admin_enqueue_scripts', 'admin_style');




// registramos los plugins que queremos 
add_action( 'tgmpa_register', 'twentysixteen_register_required_plugins' );

function twentysixteen_register_required_plugins() {
	
	$plugins = array(
		array(
			'name'        => __('Elementor Page Builder', 'dos-lineas'),
			'slug'        => 'elementor',
			'required'  => true,
		),
		array(
			'name'        => 'Contact Form 7',
			'slug'        => 'contact-form-7',
			'required'  => true,
		),
		array(
			'name'        => __('Demo import', 'dos-lineas'),
			'slug'        => 'one-click-demo-import',
			'required'  => true,
		),
	);

	$config = array(
		'id'           => 'dos-lineas',         // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => esc_html__('install-plugins'), // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table. 
	);

	tgmpa( $plugins, $config );
}

/**
 * Integration with Kirki.
 */

if ( ! class_exists( 'Kirki' ) ) {
    include_once( dirname( __FILE__ ) . '/inc/kirki/kirki.php' );
}

function superminimal_customizer_config() {
	 $args = array(
	// Only use this if you are bundling the plugin with your theme 
	'url_path'     => get_stylesheet_directory_uri() . '/inc/kirki/',

	);
	return $args;
}
add_filter( 'kirki/config', 'superminimal_customizer_config' );



/**
 * Class Color Mod
 */
include_once('inc/function-color-mod.php');



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Plugins recommendation for theme
 */

// incluimos la clase principal
require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';


/**
 * Demo Importa.
 */
if (is_admin() and is_plugin_active('one-click-demo-import/one-click-demo-import.php') and is_plugin_active('elementor/elementor.php')) {
	require get_template_directory() . '/inc/demo-importa.php';
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__ViewSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';

}


// Ensure cart contents update when products are added to the cart via AJAX
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>

	<div class="menu-cart">

		<?php global $woocommerce; ?>

		<p>|</p>

		<a href=" <?php echo WC()->cart->get_cart_url(); ?>">

			<i class="fas fa-shopping-cart"></i>

			<div class="item-of-cart">

				<?php echo WC()->cart->get_cart_contents_count(); ?>

			</div>

		</a>

	</div>								

    <?php

    $fragments['.menu-cart'] = ob_get_clean();

    return $fragments;
}


// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['selectWoo'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce_frontend_styles'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the smallscreen optimisation
	unset( $enqueue_styles['woocommerce-layout'] );
	unset( $enqueue_styles['woocommerce-smallscreen'] );
	unset( $enqueue_styles['woocommerce_fancybox_styles'] );
	unset( $enqueue_styles['woocommerce_chosen_styles'] );
	unset( $enqueue_styles['woocommerce_prettyPhoto_css'] );
	unset( $enqueue_styles['woocommerce-inline'] );
	unset( $enqueue_styles['select2'] );
	return $enqueue_styles;
}

function remove_header_and_bg(){
  global $submenu;
  unset($submenu['themes.php'][15]); // header_image
  unset($submenu['themes.php'][20]); // background_image

    //$site_path = rawurlencode( get_blog_details()->path );

   
}
add_action( 'admin_menu', 'remove_header_and_bg', 999 );


add_action('after_setup_theme', 'errores');

function errores(){
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
}