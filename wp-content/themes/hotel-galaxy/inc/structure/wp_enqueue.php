<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


add_action('wp_enqueue_scripts', 'hotelgalaxy_theme_front_styles'); 

function hotelgalaxy_theme_front_styles(){

	wp_enqueue_style('hotelgalaxy_bootstrap_style', get_template_directory_uri().'/assets/css/bootstrap.css', array(), HotelGalaxy_Version);	
	  
	
	wp_enqueue_style('hotelgalaxy_fontawesome_style', get_template_directory_uri().'/assets/css/fontawesome.css', array(), HotelGalaxy_Version );


	wp_enqueue_style('hotelgalaxy_style', get_stylesheet_uri(), array(), HotelGalaxy_Version );
	
}

/**
 * Register and Enqueue Scripts.
 */

add_action('wp_enqueue_scripts', 'hotelgalaxy_theme_front_scripts');

function hotelgalaxy_theme_front_scripts(){

	$hotelgalaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), hotelgalaxy_get_default() );	

	wp_enqueue_script('jquery');

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script('Hotelgalaxy_bootstrap_script',get_template_directory_uri().'/assets/js/bootstrap.js', array(), HotelGalaxy_Version);

	
	wp_enqueue_script('Hotelgalaxy_custom_js_library',get_template_directory_uri() .'/assets/js/custom.js', array(), HotelGalaxy_Version);


	wp_localize_script( 'Hotelgalaxy_custom_js_library', 'hg_vars', array( 'sticky_menu'   => ( $hotelgalaxy_settings['sticky_menu']==='false') ? false : $hotelgalaxy_settings['sticky_menu'] ) );
	
}

?>