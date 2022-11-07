<?php

/**

 * Template part for displaying posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package dos-lineas

 */
$classes_single_posts = array(

    'style-modern',

    'single-post-container',

);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes_single_posts); ?>>

<?php if (has_post_thumbnail()): ?>
	<div class="content-image-and-header-single-post">
		<div class="image-posts">
			<?php the_post_thumbnail( 'large' ); ?>
		</div>
		<header class="posts-header background-imagen">

			<?php

			the_title( '<h1 class="entry-title">', '</h1>' );

			?>

			<div class="product_meta">

				<?php

				dos_lineas_posted_on();

				dos_lineas_posted_by();

				?>

			</div>

		</header>
	</div>
<?php else: ?>
	<div class="content-header-single-post">

		<header class="posts-header background-blue">

			<?php

			the_title( '<h1 class="entry-title">', '</h1>' );

			?>

			<div class="product_meta">

				<?php

				dos_lineas_posted_on();

				dos_lineas_posted_by();

				?>

			</div>

		</header>
		
	</div>
<?php endif ?>



	<div class="container-blog">

		<?php

		the_content( sprintf(

			wp_kses(

				/* translators: %s: Name of current post. Only visible to screen readers */

				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'dos-lineas' ),

				array(

					'span' => array(

						'class' => array(),

					),

				)

			),

			get_the_title()

		) );



		wp_link_pages( array(

			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dos-lineas' ),

			'after'  => '</div>',

		) );

		?>

	</div>

	<div class="entry-footer">

		<?php dos_lineas_entry_footer(); ?>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->

