<?php

/**

 * Template part for displaying a message that posts cannot be found

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package dos-lineas

 */



$classes_briefcase = array(

    get_post_type() . '-content-list',

    'briefcase-style-line',

);

?>



<article id="post-<?php the_ID(); ?>" <?php post_class( $classes_briefcase ); ?> >

	<div class="row row-general row-briefcase-list">

		<div class="backgound-briefcase-list">

				<a class="briefcase-link" href="<?php the_permalink(); ?>">

					<div class="briefcase-title-content">

						<?php echo the_title('<h2 class="briefcase-title">', '</h2>'); ?>

					</div>

						<?php echo the_post_thumbnail('medium_large');  ?>

				</a>

		</div>

	</div>

</article>

