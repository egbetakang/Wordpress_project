<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

if ( class_exists( 'WP_Customize_Panel' ) ) {

	if ( ! $wp_customize->get_panel( 'hotelgalaxy_homepage_layout' ) ) {
		$wp_customize->add_panel( 'hotelgalaxy_homepage_layout', array(
			'priority' => 26,
			'title' => __( 'Front Page', 'hotel-galaxy'),
		) );
	}

	if ( ! $wp_customize->get_panel( 'hotelgalaxy_theme_layout' ) ) {
		$wp_customize->add_panel( 'hotelgalaxy_theme_layout', array(
			'priority' => 27,
			'title' => __( 'Layout', 'hotel-galaxy'),
		) );
	}

	if ( ! $wp_customize->get_panel( 'hotelgalaxy_colors_panel' ) ) {

		$wp_customize->add_panel( 'hotelgalaxy_colors_panel', array(
			'priority'       => 30,
			'theme_supports' => '',
			'title'          => __( 'Colors', 'hotel-galaxy'),
			'description'    => '',
		) );
	}

	if ( ! $wp_customize->get_panel( 'hotelgalaxy_background_image_panel' ) ) {

		$wp_customize->add_panel( 'hotelgalaxy_background_image_panel', array(
			'priority'       => 31,
			'theme_supports' => '',
			'title'          => __( 'Background Image', 'hotel-galaxy'),
			'description'    => '',
		) );
	}


	if ( ! $wp_customize->get_panel( 'hotelgalaxy_typography_layout' ) ) {
		
		$wp_customize->add_panel( 'hotelgalaxy_typography_layout', array(
			'priority' => 100,
			'title' => __( 'Typography', 'hotel-galaxy'),
		) );
	}



}		


?>