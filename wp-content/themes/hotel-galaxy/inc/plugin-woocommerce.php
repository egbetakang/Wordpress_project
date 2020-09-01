<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


add_action( 'after_setup_theme', 'hotelgalaxy_woocommerce_setup' );

function hotelgalaxy_woocommerce_setup() {

	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	add_theme_support( 'wc-product-gallery-zoom' );

	add_theme_support( 'wc-product-gallery-lightbox' );

	add_theme_support( 'wc-product-gallery-slider' );

	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);

	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

}


if ( ! function_exists( 'hotelgalaxy_woocommerce_start' ) ) {
	
	add_action( 'woocommerce_before_main_content', 'hotelgalaxy_woocommerce_start', 10 );

	function hotelgalaxy_woocommerce_start(){
		?>
		<div class="container">

			<main class="content-area">

				<div class="row">

					<div class="col-md-8">	

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

							<div class="inside-article">								

								<div class="entry-content" itemprop="text">
									<?php
								}

							}
							
							if ( ! function_exists( 'hotelgalaxy_woocommerce_end' ) ) {
								add_action( 'woocommerce_after_main_content', 'hotelgalaxy_woocommerce_end', 10 );

								function hotelgalaxy_woocommerce_end(){

									?>


								</div>



							</div>
						</article>		

					</div>			

					<div class="col-md-4">

						<?php get_sidebar(); ?>

					</div>	

				</div>

			</main>

		</div>	


		<?php

	}

}

if ( ! function_exists( 'hotelgalaxy_woocommerce_style' ) ) {

	add_action( 'wp_enqueue_scripts', 'hotelgalaxy_woocommerce_style', 100 );

	function hotelgalaxy_woocommerce_style(){

		if ( ! class_exists( 'WooCommerce' ) ) {
			return;
		}

		$css = '.woocommerce .quantity .qty{ padding: 5px 0px; }';


		$css = str_replace( array( "\r", "\n", "\t" ), '', $css );
		wp_add_inline_style( 'woocommerce-general', $css );
	}

}

?>