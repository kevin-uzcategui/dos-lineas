

<?php

/*

 * Template Name: With Sidebar Model

 * Template Post Type: post, page, product, briefcase_dos_lineas

 */

get_header();

?>

<div class="row">

	<div id="primary" class="container">

		<main id="main" class="site-main">

		<?php

		while ( have_posts() ) :

			the_post();



			get_template_part( 'template-parts/post/content-single-sidebar-modern' );

			the_post_navigation();

			if ( comments_open() || get_comments_number()) :
				if (!is_product()) {
					comments_template();
				}
			endif;


		endwhile;

		?>



		</main>

	</div>

</div>



<?php

get_footer();

?>

