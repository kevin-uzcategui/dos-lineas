

<?php

/*

 * Template Name: With sidebar

 * Template Post Type: post, page, product, briefcase_dos_lineas

 */

get_header();

?>

<div class="row">

	<div id="primary" class="container col-xl-8">

		<main id="main" class="site-main">

		<?php

		while ( have_posts() ) :

			the_post();



			get_template_part( 'template-parts/content-single-sidebar', get_post_type() );

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

	<div id="primary" class="container col-xl-4">

	<?php

	get_sidebar();

	?>

	</div>

</div>



<?php

get_footer();

?>

