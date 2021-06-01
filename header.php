<?php

/**

 * The header for our theme

 *

 * This is the template that displays all of the <head> section and everything up until <div id="content">

 *

 * @link https://develoepr.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package dos-lineas

 */



?>

<!doctype html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width, user-scalable=no">

	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<style type="text/css">

	body{

		overflow-y: hidden;	

	}



</style>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="containerbol">

  <div class="ball"></div>

  <div class="ball"></div>

  <div class="ball"></div>

  <div class="ball"></div>

  <div class="ball"></div>

  <div class="ball"></div>

  <div class="ball"></div>

</div>

<script type="text/javascript">



document.addEventListener("DOMContentLoaded", function(event) {

	jQuery(".containerbol")

			.animate({

          		opacity: "0.1"

         	}, 800, function() {

				jQuery(".containerbol").css("display", "none");

			});

			

	jQuery("body").css("overflow", "visible");

});





</script>

<div id="page" class="site">

	<header id="masthead" class="site-header container-fluid">

		<div class="site-branding">

			<div class="container">

				<div class="row">

					<div class="col-9 col-sm-6 col-lg-3 header-content">

						<?php

						the_custom_logo();

						?>

						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

					</div>

					<nav id="site-navigation" class="col-3 col-sm-6 col-lg-9 main-navigation">

						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">

							<div class="content-line-menu-toggle">

								<span class="cls"></span>

								<span></span>

								<span class="cls"></span>

							</div>

							<p class="text-menu">

								<?php esc_html_e( 'Menu', 'dos-lineas' ); ?>

							</p>

						</button>

						<?php

						wp_nav_menu( array(

							'theme_location' => 'nav-menu',

							'container_class'=> 'menu-menu-principal-container'

						) );


						if ( class_exists( 'WooCommerce' ) ) : 

							if( apply_filters( 'woocommerce_car_by_dos_lineas', true ) ):?>

								<div class="menu-cart">

									<?php global $woocommerce; ?>

									<p>|</p>

									<a href=" <?php echo wc_get_cart_url(); ?>">

										<i class="fas fa-shopping-cart"></i>

										<div class="item-of-cart">

											<?php echo $woocommerce->cart->cart_contents_count; ?>

										</div>

									</a>

								</div>								
							<?php endif;
						endif; ?>

						

					</nav>	

				</div>

			</div>

		</div>

	</header>



	<div id="content" class="container">