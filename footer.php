<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dos-lineas
 */

?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer container-fluid">


		<div class="content-footer row">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>

			<?php if (has_nav_menu( 'footer-menu' )): ?>
				
			<dir class="col-lg footer-content">
				<h3 class="footer-header center-table"><?php  echo wp_get_nav_menu_name('footer-menu'); ?></h3>
				<?php 
					wp_nav_menu( array(
						'theme_location' => 'footer-menu',
						'container_class'=> 'center-fixed',
						'fallback_cb' => false,
					) );
				?>
			</dir>

			<?php endif ?>

			<?php if (has_nav_menu( 'footer-menu-2' )): ?>

			<dir class="col-lg footer-content">
				<h3 class="footer-header center-table"><?php  echo wp_get_nav_menu_name('footer-menu-2'); ?></h3>
				<?php 
					wp_nav_menu( array(
						'theme_location' => 'footer-menu-2',
						'container_class'=> 'center-fixed',
						'fallback_cb' => false,
					) );
				?>	
			</dir>

			<?php endif ?>

		</div>
		<hr>
		<span class="site-info">
			<a href='http://weblowcosts.com/'>
				<?php
				esc_html_e( 'Theme developed by Web Low Costs', 'dos-lineas' );
				?>
			</a>
			<span class="sep"> | </span>
			<p>
				<?php 
				esc_html_e( 'Powered by', 'dos-lineas')
				?>
				<a href="https://wordpress.org/">WordPress</a>
			</p>
		</span>
	</footer>
	<div id="bottom-content"></div>

</div>

<?php
$page_load_style = get_theme_mod( 'page_load_style', true );

if($page_load_style):
?>

<style type="text/css">
	body{
		overflow-y: visible;	
	}

</style>

<?php
endif;
?>

<?php wp_footer(); ?>

</body>
</html>
