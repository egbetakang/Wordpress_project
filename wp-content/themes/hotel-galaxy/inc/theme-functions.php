<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// 
function hotelgalaxy_get_option( $key, $option = 'hotel_galaxy_option' ) {

	$defaults = hotelgalaxy_get_default();

	if ( ! isset( $defaults[ $key ] ) ) {
		return;
	}

	$settings = wp_parse_args(
		get_option( $option , array() ),
		$defaults
	);

	return $settings[ $key ];
}

// 
add_filter('wp_title', 'hotelgalaxy_custom_wp_title');

function hotelgalaxy_custom_wp_title( $title ) {

	if (is_date()){
		$title = __('Date&nbsp;&#8282;&nbsp;', 'hotel-galaxy');
		$title.= __(get_the_date(), 'hotel-galaxy');
	}


	return $title;
}



?>