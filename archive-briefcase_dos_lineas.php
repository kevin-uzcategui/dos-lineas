<?php

/**

 * The template for displaying archive pages

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package dos-lineas

 */

get_header();

?>
  
	<div id="primary" class="content-area">

		<main id="main" class="site-main">



		<?php if ( have_posts() ) : ?>

			<header class="page-header">

				<?php

				the_archive_title( '<h1 class="page-title titlewidget">', '</h1>' );

				the_archive_description( '<div class="archive-description">', '</div>' );

				?>

			</header><!-- .page-header -->

			<?php $id_img_number = 0; ?>

			<div class="content-all-post-<?php echo get_post_type() ?>">

				<?php

				/* Start the Loop */

				$template_style_portfolio = get_theme_mod ('briefcase_setting_style', 'style-simple');

				while ( have_posts() ) :

					the_post();

					/*

					 * Include the Post-Type-specific template for the content.

					 * If you want to override this in a child theme, then include a file

					 * called content-list___.php (where ___ is the style name) and that will be used instead.

					 */



					get_template_part( 'template-parts/briefcase/content-list', $template_style_portfolio);

				endwhile;

				?>

			</div>

			<?php 	

			the_posts_navigation();



		else :



			get_template_part( 'template-parts/content', 'none' );



		endif;

		?>

		</main><!-- #main -->

	</div><!-- #primary -->



<?php



get_sidebar();



get_footer();

