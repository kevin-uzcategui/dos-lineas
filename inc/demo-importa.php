<?php
/**
 * TGM Compatibility File
 *
 * @package dos-lineas
 */

use \Elementor\Core\Files\Manager;

function ocdi_import_files() {

	return array(
		array(
			'import_file_name'           => __('General', 'dos-lineas'),
			'categories'                 => array( 'WooCommerce' ),
			'import_file_url'            => 'https://demo.weblowcosts.com/import/general/doslineas.xml',
			'import_widget_file_url'     => 'https://demo.weblowcosts.com/import/general/widgets.wie',
			'import_customizer_file_url' => 'https://demo.weblowcosts.com/import/general/datos.dat',
			'import_preview_image_url'   => 'https://demo.weblowcosts.com/wp-content/uploads/2021/01/5.1-General-miniatura.jpg',
			'import_notice'              => __( 'Note: if you want to import the WooCommerce test data, you must have it done the plug-in before exporting the Demo.', 'dos-lineas' ),
			'preview_url'                => 'https://demo.weblowcosts.com/general/',
		),
		array(
			'import_file_name'           => __('Photography', 'dos-lineas'),
			'import_file_url'            => 'https://demo.weblowcosts.com/import/fotografa/fotografa.xml',
			'import_widget_file_url'     => 'https://demo.weblowcosts.com/import/fotografa/widgets.wie',
			'import_customizer_file_url' => 'https://demo.weblowcosts.com/import/fotografa/datos.dat',
			'import_preview_image_url'   => 'https://demo.weblowcosts.com/wp-content/uploads/2021/01/5.2-Fotografia-miniatura-2.jpg',
			'preview_url'                => 'https://demo.weblowcosts.com/forografia/',
		),
		array(
			'import_file_name'           => __('Jewelry', 'dos-lineas'),
			'categories'                 => array( 'WooCommerce' ),
			'import_file_url'            => 'https://demo.weblowcosts.com/import/joyas/joyas.xml',
			'import_widget_file_url'     => 'https://demo.weblowcosts.com/import/joyas/widgets.wie',
			'import_customizer_file_url' => 'https://demo.weblowcosts.com/import/joyas/datos.dat',
			'import_preview_image_url'   => 'https://demo.weblowcosts.com/wp-content/uploads/2021/01/5.3-Joyas-miniatura.jpg',
			'import_notice'              => __( 'Note: If you want to import the WooCommerce test data, you must have it done the plug-in before exporting the Demo.', 'dos-lineas' ),
			'preview_url'                => 'https://demo.weblowcosts.com/joyas/',
		),

		array(
			'import_file_name'           => __('Restaurant', 'dos-lineas'),
			'import_file_url'            => 'https://demo.weblowcosts.com/import/restarante/restarante.xml',
			'import_widget_file_url'     => 'https://demo.weblowcosts.com/import/restarante/widgets.wie',
			'import_customizer_file_url' => 'https://demo.weblowcosts.com/import/restarante/datos.dat',
			'import_preview_image_url'   => 'https://demo.weblowcosts.com/wp-content/uploads/2021/01/5.4-Restaurante-miniatura.jpg',
			'preview_url'                => 'https://demo.weblowcosts.com/restaurante/',
		),

		array(
			'import_file_name'           => __('Clothing', 'dos-lineas'),
			'categories'                 => array( 'WooCommerce' ),			
			'import_file_url'            => 'https://demo.weblowcosts.com/import/ropa/ropa.xml',
			'import_widget_file_url'     => 'https://demo.weblowcosts.com/import/ropa/widgets.wie',
			'import_customizer_file_url' => 'https://demo.weblowcosts.com/import/ropa/datos.dat',
			'import_preview_image_url'   => 'https://demo.weblowcosts.com/wp-content/uploads/2021/01/5.5-Ropa-miniatura.jpg',
			'import_notice'              => __( 'Note: if you want to import the WooCommerce test data, you must have it done the plug-in before exporting the Demo.', 'dos-lineas' ),			
			'preview_url'                => 'https://demo.weblowcosts.com/ropa-elegante/',
		),

		array(
			'import_file_name'           => __('Service', 'dos-lineas'),
			'import_file_url'            => 'https://demo.weblowcosts.com/import/servisios/servisios.xml',
			'import_widget_file_url'     => 'https://demo.weblowcosts.com/import/servisios/widgets.wie',
			'import_customizer_file_url' => 'https://demo.weblowcosts.com/import/servisios/datos.dat',
			'import_preview_image_url'   => 'https://demo.weblowcosts.com/wp-content/uploads/2021/01/5.6-Servisio-miniatura-2.jpg',
			'preview_url'                => 'https://demo.weblowcosts.com/servicios-de-mantenimiento/',
		),

		array(
			'import_file_name'           => __('Technological', 'dos-lineas'),
			'categories'                 => array( 'WooCommerce' ),				
			'import_file_url'            => 'https://demo.weblowcosts.com/import/tecnologia/tecnologia.xml',
			'import_widget_file_url'     => 'https://demo.weblowcosts.com/import/tecnologia/widgets.wie',
			'import_customizer_file_url' => 'https://demo.weblowcosts.com/import/tecnologia/datos.dat',
			'import_preview_image_url'   => 'https://demo.weblowcosts.com/wp-content/uploads/2021/01/5.7-Tecnologico-miniatura.jpg',
			'import_notice'              => __( 'Note: if you want to import the WooCommerce test data, you must have it done the plug-in before exporting the Demo.', 'dos-lineas' ),			
			'preview_url'                => 'https://demo.weblowcosts.com/productos-tecnologicos/',
		),						
	);
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );

function ocdi_after_import( $selected_import ) {

    $manager_elemntor = new Manager();

	if ( 'General' === $selected_import['import_file_name'] ) {

		global $wpdb;

		$from_http = 'http://demo.weblowcosts.com/general';

		$from_https = 'https://demo.weblowcosts.com/general';

		$to = get_site_url();

		$wpdb->query(
			"UPDATE {$wpdb->postmeta} " .
			"SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from_http ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
			"WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );

		$wpdb->query(
			"UPDATE {$wpdb->postmeta} " .
			"SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from_https ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
			"WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );

		if(is_multisite()){
			
			$blog_id = get_current_blog_id();

			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, '2\\\/2021\\\/01', '%d\\\/2021\\\/01') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';", $blog_id));


			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, '2\\\/2020\\\/12', '%d\\\/2020\\\/12') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';", $blog_id));


			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, '2\\\/2020\\\/03', '%d\\\/2020\\\/03') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';", $blog_id));
		}else{
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, 'sites\\\/2', '') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';", get_current_blog_id()));
		}

	    $manager_elemntor->clear_cache();

	}else if('Photography' === $selected_import['import_file_name'] or 'Fotografía' === $selected_import['import_file_name']){

		$from_http = 'http://demo.weblowcosts.com/forografia';

		$from_https = 'https://demo.weblowcosts.com/forografia';

		$to = get_site_url();

		global $wpdb;

		$rows_affected = $wpdb->query(
			"UPDATE {$wpdb->postmeta} " .
			"SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from_http ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
			"WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );
		
		$rows_affected = $wpdb->query(
			"UPDATE {$wpdb->postmeta} " .
			"SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from_https ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
			"WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );


		if(is_multisite()){
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, '3\\\/2020\\\/12', '%d\\\/2020\\\/12') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';", get_current_blog_id()));	
		}else{
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, 'sites\\\/3', '') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';"));
		}

	    $manager_elemntor->clear_cache();		

	}else if('Jewelry' === $selected_import['import_file_name'] or 'Joyas' === $selected_import['import_file_name']){
		$from_http = 'http://demo.weblowcosts.com/joyas';

		$from_https = 'https://demo.weblowcosts.com/joyas';

		$to = get_site_url();

		global $wpdb;

		$rows_affected = $wpdb->query(
			"UPDATE {$wpdb->postmeta} " .
			"SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from_http ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
			"WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );
		
		$rows_affected = $wpdb->query(
			"UPDATE {$wpdb->postmeta} " .
			"SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from_https ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
			"WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );

		if(is_multisite()){
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, '4\\\/2020\\\/12', '%d\\\/2020\\\/12') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';", get_current_blog_id()));	
		}else{
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, 'sites\\\/4', '') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';"));
		}

	    $manager_elemntor->clear_cache();		

	}else if('Restaurant' === $selected_import['import_file_name'] or 'Restaurante' === $selected_import['import_file_name']){
		$from_http = 'http://demo.weblowcosts.com/restaurante';

		$from_https = 'https://demo.weblowcosts.com/restaurante';

		$to = get_site_url();

		global $wpdb;

		$rows_affected = $wpdb->query(
			"UPDATE {$wpdb->postmeta} " .
			"SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from_http ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
			"WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );
		
		$rows_affected = $wpdb->query(
			"UPDATE {$wpdb->postmeta} " .
			"SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from_https ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
			"WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );

		if(is_multisite()){

			$blog_id = get_current_blog_id();

			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, '5\\\/2020\\\/12', '%d\\\/2020\\\/12') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';", $blog_id));
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, '5\\\/2020\\\/01', '%d\\\/2020\\\/01') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';", $blog_id));	
		}else{
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, 'sites\\\/5', '') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';"));
		}

	    $manager_elemntor->clear_cache();				

	}else if('Clothing' === $selected_import['import_file_name'] or 'Ropa' === $selected_import['import_file_name']){
		$from_http = 'http://demo.weblowcosts.com/ropa-elegante';

		$from_https = 'https://demo.weblowcosts.com/ropa-elegante';

		$to = get_site_url();

		global $wpdb;
		
		$rows_affected = $wpdb->query(
			"UPDATE {$wpdb->postmeta} " .
			"SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from_http ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
			"WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );

		$rows_affected = $wpdb->query(
			"UPDATE {$wpdb->postmeta} " .
			"SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from_https ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
			"WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );

		if(is_multisite()){

			$blog_id = get_current_blog_id();

			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, '7\\\/2020\\\/12', '%d\\\/2020\\\/12') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';", $blog_id));
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, '10\\\/2020\\\/12', '%d\\\/2020\\\/12') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';", $blog_id));			
		}else{
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, 'sites\\\/3', '') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';"));

			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, 'sites\\\/10', '') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';"));			
		}

	    $manager_elemntor->clear_cache();

	}else if('Service' === $selected_import['import_file_name'] or 'Servicios' === $selected_import['import_file_name']){
		$from_http = 'http://demo.weblowcosts.com/servicios-de-mantenimiento';

		$from_https = 'https://demo.weblowcosts.com/servicios-de-mantenimiento';

		$to = get_site_url();

		global $wpdb;

		$rows_affected = $wpdb->query(
			"UPDATE {$wpdb->postmeta} " .
			"SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from_http ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
			"WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );
		
		$rows_affected = $wpdb->query(
			"UPDATE {$wpdb->postmeta} " .
			"SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from_https ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
			"WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );

		if(is_multisite()){

			$blog_id = get_current_blog_id();

			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, '8\\\/2020\\\/12', '%d\\\/2020\\\/12') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';", $blog_id));
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, '11\\\/2020\\\/12', '%d\\\/2020\\\/12') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';", $blog_id));
		}else{
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, 'sites\\\/8', '') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';"));
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, 'sites\\\/10', '') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';"));
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, 'sites\\\/11', '') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';"));					
		}

	    $manager_elemntor->clear_cache();		

	}else if('Technological' === $selected_import['import_file_name'] or 'Tecnológico' === $selected_import['import_file_name']){
		$from_http = 'http://demo.weblowcosts.com/productos-tecnologicos';

		$from_https = 'https://demo.weblowcosts.com/productos-tecnologicos';

		$to = get_site_url();

		global $wpdb;

		$rows_affected = $wpdb->query(
			"UPDATE {$wpdb->postmeta} " .
			"SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from_http ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
			"WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );
		
		$rows_affected = $wpdb->query(
			"UPDATE {$wpdb->postmeta} " .
			"SET `meta_value` = REPLACE(`meta_value`, '" . str_replace( '/', '\\\/', $from_https ) . "', '" . str_replace( '/', '\\\/', $to ) . "') " .
			"WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%' ;" );

		if(is_multisite()){

			$blog_id = get_current_blog_id();

			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, '8\\\/2020\\\/12', '%d\\\/2020\\\/12') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';", $blog_id));
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, '11\\\/2020\\\/12', '%d\\\/2020\\\/12') 	WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';", $blog_id));				
		}else{
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, 'sites\\\/8', '') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';"));
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, 'sites\\\/11', '') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';"));
			$wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET `meta_value` = REPLACE(`meta_value`, 'sites\\\/12', '') WHERE `meta_key` = '_elementor_data' AND `meta_value` LIKE '[%';"));				
		}

	    $manager_elemntor->clear_cache();				

	}

}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import' );


if ( ! function_exists( 'ocdi_after_import_setup' ) ) :
	function ocdi_after_import_setup() {
		// Assign menus to their locations.
		$nav_menu = get_term_by( 'name', 'menú principal', 'nav_menu' );
		$footer_menu = get_term_by( 'name', 'Otros enlaces', 'nav_menu' );
		$footer_menu_2 = get_term_by( 'name', 'Redes sociales', 'nav_menu' );
		set_theme_mod( 'nav_menu_locations', array(
				'nav-menu' => $nav_menu->term_id, 
				'footer-menu' => $footer_menu->term_id, 
				'footer-menu-2' => $footer_menu_2->term_id, 
			)
		);

		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Inicio' );
		$blog_page_id  = get_page_by_title( 'Blog' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );
	}
	add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );
endif;


