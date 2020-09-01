<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'hotelgalaxy_icon_callout_create' ) ) {

	add_action( 'hotelgalaxy_callout_icons_install', 'hotelgalaxy_icon_callout_create' );
	
	function hotelgalaxy_icon_callout_create() {

		$hotelgalaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), hotelgalaxy_get_default() ); 

		?>

		<section class="icon-callout-area">

			<div class="container">		

				<div class="row">

					<div class="col-lg-12">

						<?php for( $i=1; $i<=4; $i++ ){

							?>

							<div id="footer-icon-callout-<?php echo esc_attr($i)?>" class="col-md-3 col-sm-6 col-xs-12">							
								<span class="icon-callout-inner-icon">
									<i class="<?php echo esc_attr( $hotelgalaxy_settings['footer_collout_icon_'.$i]); ?>"></i>
								</span>

								<span class="icon-callout-inner-title">
									<?php 

									echo sprintf( __( '%s', 'hotel-galaxy' ), $hotelgalaxy_settings['footer_collout_title_'.$i] );									
									?>
								</span>

							</div>

							<?php

						} ?>

					</div>

				</div>

			</div>

		</section>

		<?php
	}
}

if ( ! function_exists( 'hotelgalaxy_construct_footer' ) ) {

	add_action( 'hotelgalaxy_theme_footer', 'hotelgalaxy_construct_footer' );
	
	function hotelgalaxy_construct_footer() {

		?>

		<footer class="site-footer-area">

			<div class="footer-info">

				<div class="container">

					<div class="row">

						<div class="col-lg-12">

							<?php do_action('hotelgalaxy_add_footer_widget') ?>

						</div>

					</div>

				</div>
			</div>

			<address class="copyright-bar">
				
				<?php do_action('hotelgalaxy_credits');	?>				
				
			</address>

		</footer>
		<?php

	}
}

if ( ! function_exists( 'hotelgalaxy_add_footer_info' ) ) {

	add_action( 'hotelgalaxy_credits', 'hotelgalaxy_add_footer_info' );
	
	function hotelgalaxy_add_footer_info() {

		$copyright = sprintf( '<span class="copyright">&copy; %1$s %2$s</span> &bull; %4$s <a href="%3$s" itemprop="url">%5$s</a>',
			date( 'Y' ),
			get_bloginfo( 'name' ),
			esc_url( 'https://webdzier.com' ),
			_x( 'Powered by', 'Webdzier', 'hotel-galaxy'),
			__( 'Webdzier', 'hotel-galaxy')
		);

		echo apply_filters( 'hotelgalaxy_copyright', $copyright ); 
	}
}


if ( ! function_exists( 'hotelgalaxy_footer_widget' ) ) {

	add_action( 'hotelgalaxy_add_footer_widget', 'hotelgalaxy_footer_widget' );
	
	function hotelgalaxy_footer_widget() {

		if(is_active_sidebar( 'footer-widget-area' )){

			dynamic_sidebar( 'footer-widget-area' );

		}


	}
}

if ( ! function_exists( 'hotelgalaxy_back_to_top_control' ) ) {

	add_action( 'hotelgalaxy_back_to_top', 'hotelgalaxy_back_to_top_control' );
	
	function hotelgalaxy_back_to_top_control() {

		$hotelgalaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), hotelgalaxy_get_default() );

		if (  $hotelgalaxy_settings['back_to_top'] !== 'enable') {
			return;
		}

		echo apply_filters('hotelgalaxy_back_to_top_output',
			sprintf( '<a href="#" class="scroll-top" rel="nofollow"><i class="%1$s"></i></a>', 
				esc_attr(apply_filters('hotelgalaxy_back_to_top_icon','fa fa-arrow-up'))

			));

	}
}

?>