<?php
/**
 * dos-lineas Theme Customizer
 *
 * @package dos-lineas
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function dos_lineas_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->remove_section( 'header_image');


	// Customize Typography

	$wp_customize->add_section( 'typography_options', array(
	    'title'       => __( 'Typography', 'dos-lineas' ), //Visible title of section
	    'priority'    => 20, //Determines widget-headert order this appears in
	    'capability'  => 'edit_theme_options', //Capability needed to tweak
	    'description' => __('Change the text shape by selecting any of the fonts. If you want us to add a new font, write to us at kevin@weblowcosts.com', 'dos-lineas'), ) 
	);

	$wp_customize->add_setting( 'segundary_font',
	 array(
	    'default'    => 'default', //Default setting/value to save
	    'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
	    'transport' => 'refresh',
	 ) 
	);

	$wp_customize->add_setting( 'main_font',
	 array(
	    'default'    => 'default', //Default setting/value to save
	    'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
	    'transport' => 'refresh',
	 ) 
	);

	$wp_customize->add_control( new WP_Customize_Control(
	 $wp_customize, //Pass the $wp_customize object (required)
	 'segundary_font', //Set a unique ID for the control
	 array(
	    'label'      => __( 'Title', 'dos-lineas' ), //Admin-visible name of the control
	    'description' => __( 'Change the font of the titles (H1, H2, H3 ...)', 'dos-lineas' ),
	    'settings'   => 'segundary_font', //Which setting to load and manipulate (serialized is okay)
	    'priority'   => 10, //Determines the order this control appears in for the specified section
	    'section'    => 'typography_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
	    'type'    => 'select',
	    'choices' => array(
			'' => __( 'Default', 'dos-lineas' ),
			'Raleway' => 'Raleway',
			'Zilla Slab' => 'Zilla Slab',
			'Lato' => 'Lato',
			'Roboto' => 'Roboto',
			'Roboto Condensed' => 'Roboto Condensed',
			'Roboto Mono' => 'Roboto Mono',
			'Roboto Slab' => 'Roboto Slab',
			'Merriweather' => 'Merriweather',
			'Merriweather Sans' => 'Merriweather Sans',
			'Asap' => 'Asap',
			'Asap Condensed' => 'Asap Condensed',
			'Alegreya' => 'Alegreya',
			'Alegreya Sans' => 'Alegreya Sans',
			'Montserrat' => 'Montserrat',
			'Montserrat Alternates' => 'Montserrat Alternates',
			'Montserrat Subrayada' => 'Montserrat Subrayada',
			'Open Sans' => 'Open Sans',
			'Open Sans Condensed' => 'Open Sans Condensed',
			'Source Sans Pro' => 'Source Sans Pro',
			'Gentium Book Basic' => 'Gentium Book Basic',
	    )
	)
	) );

	$wp_customize->add_control( new WP_Customize_Control(
	 $wp_customize, //Pass the $wp_customize object (required)
	 'main_font', //Set a unique ID for the control
	 array(
	    'label'      => __( 'Text', 'dos-lineas' ), //Admin-visible name of the control
	    'description' => __( 'Change the font of the text of the articles, buttons, text fields ...', 'dos-lineas' ),
	    'settings'   => 'main_font', //Which setting to load and manipulate (serialized is okay)
	    'priority'   => 10, //Determines the order this control appears in for the specified section
	    'section'    => 'typography_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
	    'type'    => 'select',
	    'choices' => array(
			'' => __( 'Default', 'dos-lineas' ),
			'Raleway' => 'Raleway',
			'Zilla Slab' => 'Zilla Slab',
			'Lato' => 'Lato',
			'Roboto' => 'Roboto',
			'Roboto Condensed' => 'Roboto Condensed',
			'Roboto Mono' => 'Roboto Mono',
			'Roboto Slab' => 'Roboto Slab',
			'Merriweather' => 'Merriweather',
			'Merriweather Sans' => 'Merriweather Sans',
			'Asap' => 'Asap',
			'Asap Condensed' => 'Asap Condensed',
			'Alegreya' => 'Alegreya',
			'Alegreya Sans' => 'Alegreya Sans',
			'Montserrat' => 'Montserrat',
			'Montserrat Alternates' => 'Montserrat Alternates',
			'Montserrat Subrayada' => 'Montserrat Subrayada',
			'Open Sans' => 'Open Sans',
			'Open Sans Condensed' => 'Open Sans Condensed',
			'Source Sans Pro' => 'Source Sans Pro',
			'Gentium Book Basic' => 'Gentium Book Basic',
	    )
	)
	) );

	// Customize Header

	$wp_customize->add_section( 'header_section', array(
	    'title'       => _x( 'Header', 'title of a custom section', 'dos-lineas' ), //Visible title of section
  	    'priority'    => 40, //Determines widget-headert order this appears in
		'capability'  => 'edit_theme_options',
	) 
	);

	$wp_customize->add_setting( 'header_shadow_setting',
	 array(
	    'transport' => 'refresh',
	    'capability'  => 'edit_theme_options',
	 ) 
	);

	$wp_customize->add_control( new WP_Customize_Control(
	 $wp_customize, //Pass the $wp_customize object (required)
	 'header_shadow_setting', //Set a unique ID for the control
	 array(
	    'label'      => __( 'Box Shadow', 'dos-lineas' ), //Admin-visible name of the control
	    'settings'   => 'header_shadow_setting', //Which setting to load and manipulate (serialized is okay)
	    'priority'   => 10, //Determines the order this control appears in for the specified section
	    'section'    => 'header_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
	    'type'    => 'checkbox',
        'std'        => '1',  
	)
	) );

	// Customize Other

	$wp_customize->add_section( 'other_section', array(
	    'title'       => _x( 'Other', 'title of a custom section', 'dos-lineas' ), //Visible title of section
  	    'priority'    => 40, //Determines widget-headert order this appears in
		'capability'  => 'edit_theme_options',
	) 
	);

	$wp_customize->add_setting( 'page_load_style',
	 array(
	    'transport' => 'refresh',
	    'capability'  => 'edit_theme_options',
		'default'    => true	
	 ) 
	);

	$wp_customize->add_control( new WP_Customize_Control(
	 $wp_customize, //Pass the $wp_customize object (required)
	 'page_load_style', //Set a unique ID for the control
	 array(
	    'label'      => __( 'Page Load Style', 'dos-lineas' ), //Admin-visible name of the control
	    'settings'   => 'page_load_style', //Which setting to load and manipulate (serialized is okay)
	    'priority'   => 10, //Determines the order this control appears in for the specified section
	    'section'    => 'other_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
	    'type'    => 'checkbox',
        'std'        => '1',
	)
	) );

	// Customize Post

	$wp_customize->add_section( 'post_section', array(
	    'title'       => _x( 'Post', 'Post of Custom Post Type', 'dos-lineas' ), //Visible title of section
  	    'priority'    => 50, //Determines widget-headert order this appears in
	    'description' => __('Change the style of your portfolio listing', 'dos-lineas'), 
		'capability'  => 'edit_theme_options',
	) 
	);

	$wp_customize->add_setting( 'post_setting_style',
	 array(
	    'default'    => 'style-line', //Default setting/value to save
	    'transport' => 'refresh',
	    'capability'  => 'edit_theme_options',
	 ) 
	);

	$wp_customize->add_setting( 'post_setting_shadow',
	 array(
	    'transport' => 'refresh',
	    'capability'  => 'edit_theme_options',
	 ) 
	);

	$wp_customize->add_control( new WP_Customize_Control(
	 $wp_customize, //Pass the $wp_customize object (required)
	 'shadow_post', //Set a unique ID for the control
	 array(
	    'label'      => __( 'Box Shadow', 'dos-lineas' ), //Admin-visible name of the control
	    'settings'   => 'post_setting_shadow', //Which setting to load and manipulate (serialized is okay)
	    'priority'   => 10, //Determines the order this control appears in for the specified section
	    'section'    => 'post_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
	    'type'    => 'checkbox',
        'std'        => '1'	    
	)
	) );

	// Customize Briefcase

	$wp_customize->add_section( 'briefcase_section', array(
	    'title'       => __( 'Briefcase', 'dos-lineas' ), //Visible title of section
  	    'priority'    => 50, //Determines widget-headert order this appears in
	    'description' => __('Change the style of your portfolio listing', 'dos-lineas'), 
		'capability'  => 'edit_theme_options',
	) 
	);

	$wp_customize->add_setting( 'briefcase_setting_style',
	 array(
	    'default'    => 'style-line', //Default setting/value to save
	    'transport' => 'refresh',
	    'capability'  => 'edit_theme_options',
	 ) 
	);

	$wp_customize->add_setting( 'briefcase_setting_shadow',
	 array(
	    'transport' => 'refresh',
	    'capability'  => 'edit_theme_options',
	 ) 
	);

	$wp_customize->add_control( new WP_Customize_Control(
	 $wp_customize, //Pass the $wp_customize object (required)
	 'shadow_briefcase', //Set a unique ID for the control
	 array(
	    'label'      => __( 'Box Shadow', 'dos-lineas' ), //Admin-visible name of the control
	    'settings'   => 'briefcase_setting_shadow', //Which setting to load and manipulate (serialized is okay)
	    'priority'   => 10, //Determines the order this control appears in for the specified section
	    'section'    => 'briefcase_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
	    'type'    => 'checkbox',
        'std'        => '1'	    
	)
	) );

	// Customize WooCommerce Adds

	$wp_customize->add_setting( 'woocommerce_shadow_setting',
	 array(
	    'transport' => 'refresh',
	    'capability'  => 'edit_theme_options',
	 ) 
	);

	$wp_customize->add_control( new WP_Customize_Control(
	 $wp_customize, //Pass the $wp_customize object (required)
	 'woocommerce_shadow_setting', //Set a unique ID for the control
	 array(
	    'label'      => __( 'Box Shadow', 'dos-lineas' ), //Admin-visible name of the control
	    'settings'   => 'woocommerce_shadow_setting', //Which setting to load and manipulate (serialized is okay)
	    'priority'   => 80, //Determines the order this control appears in for the specified section
	    'section'    => 'woocommerce_product_catalog', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
	    'type'    => 'checkbox',
        'std'        => '1'	    
	)
	) );

	

}
add_action( 'customize_register', 'dos_lineas_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function dos_lineas_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function dos_lineas_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dos_lineas_customize_preview_js() {
	wp_enqueue_script( 'dos-lineas-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'dos_lineas_customize_preview_js' );


/**
 * Items configured with kirki
 */


function superminimal_demo_fields( $fields ) {

	// Color Control

	// Kirki::add_field( 'dark_mode_general', [
	// 	'type'        => 'toggle',
	// 	'settings'    => 'dark_mode',
	// 	'label'       => esc_html__( 'Switch to dark mode', 'dos-lineas' ),
	// 	'description' => esc_html__( 'When activating this mode the background and the gray tones have a dark tone. Also the text will change to white. (This does not affect objects added with Elementor)', 'dos-lineas' ),
	// 	'js_vars'     => [
	// 	  [
	// 	    'element'  => '#content',
	// 	    'function' => 'dos_lineas_customize_preview_js'
	// 	  ],
	// 	],			
	// 	'section'     => 'colors',
	// 	'default'     => '0',
	// 	'priority'    => 1,
	// ] );

	// $segundary_color = get_theme_mod( 'segundary_color', '' );

	// Kirki::add_field( 'dark_color_general', [
	// 	'type'        => 'color-palette',
	// 	'settings'    => 'dark_color',
	// 	'label'       => esc_html__( 'Dark background color', 'dos-lineas' ),
	// 	'description' => esc_html__( 'The colors that can be selected are based on the secondary color.', 'dos-lineas' ),
	// 	'section'     => 'colors',
	// 	'default'     => $segundary_color,
	// 	'priority'    => 2,
	// 	'choices'     => [
	// 		'colors' => [ '#000000', '#222222', '#444444' ],
	// 		'style'  => 'round',
	// 	],
	// 	'active_callback'  => [
	// 		[
	// 			'setting'  => 'dark_mode', 
	// 			'operator' => '==',
	// 			'value'    => true,
	// 		],
	// 	]			
	// ] );

	Kirki::add_field( 'main_color_general', [
		'type'        => 'color',
		'settings'    => 'main_color',
		'label'       => esc_html__( 'Main Color', 'dos-lineas' ),
		'description' => esc_html__( 'For the main color it is recommended that it be a light tone', 'dos-lineas' ),
		'section'     => 'colors',
		'default'     => '#0099f2',
		'priority'   => 3,
	] );

	Kirki::add_field( 'segundary_color_general', [
		'type'        => 'color',
		'settings'    => 'segundary_color',
		'label'   => esc_html__( 'Segundary color', 'dos-lineas' ),
		'description' => esc_html__( 'For the secondary color it is recommended that it be a dark tone', 'dos-lineas' ),
		'section'     => 'colors',
		'default'     => '#001724',
		'priority'   => 4,
	] );

	Kirki::add_field( 'text_color_general', [
		'type'        => 'color',
		'settings'    => 'text_color',
		'label'   => esc_html__( 'Text color', 'dos-lineas' ),
		'section'     => 'colors',
		'default'     => '#001724',
		'priority'   => 5,
		'active_callback'  => [
			[
				'setting'  => 'dark_mode', 
				'operator' => '==',
				'value'    => false,
			],
		]			
	] );

	// Post

	Kirki::add_field( 'style_post', [
		'type'        => 'select',
		'settings'    => 'post_setting_style',
		'label'       => esc_html__( 'Select Style', 'dos-lineas' ),
		'section'     => 'post_section',
		'default'     => 'style-horizontal',
		'priority'    => 1,
		'multiple'    => 1,
		'choices'     => [
			'style-horizontal' => esc_html__( 'Style Horizontal', 'dos-lineas' ),
			'style-vertical' => esc_html__( 'Style Vertical', 'dos-lineas' ),
		],
	] );

	// Briefcase

	Kirki::add_field( 'style_briefcase', [
		'type'        => 'select',
		'settings'    => 'briefcase_setting_style',
		'label'       => esc_html__( 'Select Style', 'dos-lineas' ),
		'section'     => 'briefcase_section',
		'default'     => 'style-simple',
		'priority'    => 1,
		'multiple'    => 1,
		'choices'     => [
			'style-simple' => esc_html__( 'Style Simple', 'dos-lineas' ),
			'style-line' => esc_html__( 'Style Line', 'dos-lineas' ),
		],
	] );












	return $fields;
}
add_filter( 'kirki/fields', 'superminimal_demo_fields' );







































