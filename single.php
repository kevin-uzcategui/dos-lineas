<?php

/**

 * The template for displaying all single posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post

 *

 * @package dos-lineas

 */



get_header();

?>


<div id="primary" class="container">

	<main id="main" class="site-main">

	<?php

	while ( have_posts() ) :

		the_post();

		get_template_part( 'template-parts/post/content-single-modern' );

		the_post_navigation();

		if ( comments_open() || get_comments_number() ) :

			comments_template();

		endif;

	endwhile;

	?>

	</main>

</div>

<?php

get_sidebar();

get_footer();



