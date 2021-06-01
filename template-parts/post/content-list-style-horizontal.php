<?php

/**

 * Template part for displaying a message that posts cannot be found

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package dos-lineas

 */

 

$classes_post = array(

    get_post_type() . '-content-list',

    'post-style-horizontal',

);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $classes_post ); ?> >

	<div class="row row-general">



		<div class="col-md-6 col-xl-5 modifier content-briefcase-img img-responsive">

			<?php if (has_post_thumbnail()): ?>

				<a href="<?php the_permalink(); ?>">

					<?php echo the_post_thumbnail( 'medium_large' ); ?>

				</a>

			<?php else: ?>

				<a href="<?php the_permalink(); ?>" class="background-blue"></a>

			<?php endif ?>

		</div>

		<div class="col-md-6 col-xl-7 text-content-list">

			<h2 class="entry-title mini-header">
				<a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
			</h2>

			<div class="product_meta">

				<i class="fas fa-archive color-blue"></i>

				<?php the_category() ?>

				<span> | </span>

				<i class="fas fa-calendar-day color-blue"></i>

				<?php

				$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

				if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {

					$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';

				}



				$time_string = sprintf( $time_string,

					esc_attr( get_the_date( DATE_W3C ) ),

					esc_html( get_the_date() ),

					esc_attr( get_the_modified_date( DATE_W3C ) ),

					esc_html( get_the_modified_date() )

				);



				$posted_on = sprintf(

					'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'

				);



				echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

				?>

				<span> | </span>

				<i class="fas fa-user color-blue"></i> 

				<?php

				$byline = sprintf(

					'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'

				);



				echo '<span class="byline">' . $byline . '</span>'; // WPCS: XSS OK.

				?>

			</div>

			<?php the_excerpt(); ?>

			<a href="<?php the_permalink(); ?>" class="button-blog">

				<?php esc_html_e( 'Read now' , 'dos-lineas')?>

			</a>

		</div>

	</div>

</article>