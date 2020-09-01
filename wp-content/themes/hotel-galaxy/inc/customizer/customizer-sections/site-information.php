<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

$wp_customize->add_setting(
	'hotel_galaxy_option[show_title]',
	array(
		'default' => $defaults['show_title'],
		'type' => 'option',
		'sanitize_callback' => 'hotelgalaxy_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'hotel_galaxy_option[show_title]',
	array(
		'type' => 'checkbox',
		'label' => __( 'Show site title', 'hotel-galaxy'),
		'section' => 'title_tagline',
		'priority' => 1,
	)
);

$wp_customize->add_setting(
	'hotel_galaxy_option[show_tagline]',
	array(
		'default' => $defaults['show_tagline'],
		'type' => 'option',
		'sanitize_callback' => 'hotelgalaxy_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'hotel_galaxy_option[show_tagline]',
	array(
		'type' => 'checkbox',
		'label' => __( 'Show site tagline', 'hotel-galaxy'),
		'section' => 'title_tagline',
		'priority' => 3,
	)
);	
// 
?>