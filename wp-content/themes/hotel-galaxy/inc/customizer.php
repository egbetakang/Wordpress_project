<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

add_action( 'customize_register', 'hotelgalaxy_set_customizer_helpers', 1 );

function hotelgalaxy_set_customizer_helpers() {

	require_once trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-helpers.php';
}

if ( ! function_exists( 'hotelgalaxy_customize_register' ) ) {

	add_action( 'customize_register', 'hotelgalaxy_customize_register' );

	function hotelgalaxy_customize_register( $wp_customize ) {

		require_once trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-helpers.php';

		$defaults = hotelgalaxy_get_default();	

		$color_default = hotelgalaxy_color_defaults();

		$default_images = hotelgalaxy_default_images();	


		if ( method_exists( $wp_customize, 'register_control_type' ) ) {		

			$wp_customize->register_control_type('Hotelgalaxy_Title_Control');

		}
		
		
		require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/customizer-panels.php';

		require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/site-information.php';

		require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/infobar.php';

		require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/primary-navigation.php';

		require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/colors.php';

		require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/services.php';

		require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/home-slider.php';

		require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/room-section.php';
		

		require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/home-blog.php';

		require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/shortcode.php';
		

		require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/icon-callout.php';

		require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/footer.php';
		

		require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/blog.php';

		if( !defined('HG_BACKGROUND_ADDON_VERSION') ){

			require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/background_image.php';
		}

		

	}

}

if ( ! function_exists( 'hotelgalaxy_customize_register_typography' ) ) {

	add_action( 'customize_register', 'hotelgalaxy_customize_register_typography' );

	function hotelgalaxy_customize_register_typography( $wp_customize ) {

		if( function_exists('hg_premium_customize_register_fonts' )){
			return;
		}

		require_once trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-helpers.php';

		$default_font = hotelgalaxy_default_fonts();

		if ( method_exists( $wp_customize, 'register_control_type' ) ) {

			$wp_customize->register_control_type( 'HotelGalaxy_Typography_Control' );

			$wp_customize->register_control_type('Hotelgalaxy_Range_Slider_Control');

			$wp_customize->register_control_type('Hotelgalaxy_Title_Control');

		}	

		require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/typography_body.php';

		require_once trailingslashit( dirname( __FILE__ ) ) . 'customizer/customizer-sections/typography_heading.php';
	}


}


if(! function_exists('hotelgalaxy_customizer_partials')){


	add_action( 'customize_register', 'hotelgalaxy_customizer_partials' );

	function hotelgalaxy_customizer_partials( WP_Customize_Manager $wp_customize ) {

    // Abort if selective refresh is not available.
		if ( ! isset( $wp_customize->selective_refresh ) ) {
			return;
		}

		if ( $wp_customize->get_control( 'blogname' ) ) {
			$wp_customize->get_control( 'blogname' )->priority = 2;
			$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		}

		if ( $wp_customize->get_control( 'blogdescription' ) ) {
			$wp_customize->get_control( 'blogdescription' )->priority = 4;
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		}				

		if ( $wp_customize->get_control( 'custom_logo' ) ) {
			$wp_customize->get_setting( 'custom_logo' )->transport = 'refresh';
		}


		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.main-title a',
			'render_callback' => 'hotelgalaxy_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'render_callback' => 'hotelgalaxy_customize_partial_blogdescription',
		) );


		$wp_customize->selective_refresh->add_partial( 'hotel_galaxy_option[information_title_1]', array(
			'selector' => '#info-1',
			'render_callback' => function(){ return $default['information_title_1']; },
		) );

		$wp_customize->selective_refresh->add_partial( 'hotel_galaxy_option[information_title_2]', array(
			'selector' => '#info-2',
			'render_callback' => function(){ return $default['information_title_2']; },
		) );

		$wp_customize->selective_refresh->add_partial( 'hotel_galaxy_option[socialmedia_icon_1]', array(
			'selector' => '#bar-social-icon-1',
			'render_callback' => function(){ return $default['socialmedia_icon_1']; },
		) );

		$wp_customize->selective_refresh->add_partial( 'hotel_galaxy_option[socialmedia_icon_2]', array(
			'selector' => '#bar-social-icon-2',
			'render_callback' => function(){ return $default['socialmedia_icon_2']; },
		) );

		$wp_customize->selective_refresh->add_partial( 'hotel_galaxy_option[socialmedia_icon_3]', array(
			'selector' => '#bar-social-icon-3',
			'render_callback' => function(){ return $default['socialmedia_icon_3']; },
		) );

		$wp_customize->selective_refresh->add_partial( 'hotel_galaxy_option[socialmedia_icon_4]', array(
			'selector' => '#bar-social-icon-4',
			'render_callback' => function(){ return $default['socialmedia_icon_4']; },
		) );

		$wp_customize->selective_refresh->add_partial( 'hotel_galaxy_option[socialmedia_icon_5]', array(
			'selector' => '#bar-social-icon-5',
			'render_callback' => function(){ return $default['socialmedia_icon_5']; },
		) );

		$wp_customize->selective_refresh->add_partial( 'hotel_galaxy_option[footer_collout_title_1]', array(
			'selector' => '.icon-callout-area #footer-icon-callout-1',
			'render_callback' => function(){ return $default['footer_collout_title_1']; },
		) );

		$wp_customize->selective_refresh->add_partial( 'hotel_galaxy_option[footer_collout_title_2]', array(
			'selector' => '.icon-callout-area #footer-icon-callout-2',
			'render_callback' => function(){ return $default['footer_collout_title_2']; },
		) );

		$wp_customize->selective_refresh->add_partial( 'hotel_galaxy_option[footer_collout_title_3]', array(
			'selector' => '.icon-callout-area #footer-icon-callout-3',
			'render_callback' => function(){ return $default['footer_collout_title_3']; },
		) );

		$wp_customize->selective_refresh->add_partial( 'hotel_galaxy_option[footer_collout_title_4]', array(
			'selector' => '.icon-callout-area #footer-icon-callout-4',
			'render_callback' => function(){ return $default['footer_collout_title_4']; },
		) );


	}
}



?>