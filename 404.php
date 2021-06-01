<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package dos-lineas
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'dos-lineas' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'dos-lineas' ); ?></p>

					<?php get_search_form();?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
			<section class="content-widget-404">
				<div id="widget-404" class="row widget-area">
					<div class="col-xl-4 col-md-6">	
						<?php the_widget( 'WP_Widget_Recent_Posts', array(), array('before_title' => '<h2 class="widget-header">', 'after_title' => '</h2>') ); ?>
					</div>
					<div class="col-xl-4 col-md-6">	
						<div class="widget widget_categories">
							<h2 class="widget-header"><?php esc_html_e( 'Most Used Categories', 'dos-lineas' ); ?></h2>
							<ul>
								<?php
								wp_list_categories( array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								) );
								?>
							</ul>
						</div><!-- .widget -->
					</div>
					<div class="col-xl-4 col-md-6">	
						<?php 
						/* translators: %1$s: smiley */ 
						$dos_lineas_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'dos-lineas' ), convert_smilies( ':)' ) ) . '</p>';	
						the_widget( 'WP_Widget_Archives', 'dropdown=1', array('before_title' => '<h2 class="widget-header">', 'after_title' => "</h2>$dos_lineas_archive_content") );
						?>
					</div>							
				</div>
			</section><!-- .content-widget-404 -->	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
