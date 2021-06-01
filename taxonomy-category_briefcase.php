<?php

/**

 * The template for displaying archive pages

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package dos-lineas

 */


if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly

}

get_template_part( 'archive', get_post_type() );





