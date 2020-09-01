<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
} 


// footer section 

$wp_customize->add_section('footer_section',array(

	'title' => __( 'Footer','hotel-galaxy'),
	'panel'=>'hotelgalaxy_theme_layout',
	'capability'=>'edit_theme_options',
	'priority' => 22,			

));

// 
$wp_customize->add_setting(
	'hotel_galaxy_option[back_to_top]',
	array(
		'default' => $defaults['back_to_top'],
		'type' => 'option',
		'sanitize_callback' => 'hotelgalaxy_sanitize_selectbox',
	)
);

$wp_customize->add_control(
	'hotel_galaxy_option[back_to_top]',
	array(
		'type' => 'select',
		'label' => __( 'Back to Top Button', 'hotel-galaxy'),
		'section' => 'footer_section',
		'choices' => array(
			'enable' => __( 'Enable', 'hotel-galaxy'),
			'' => __( 'Disable', 'hotel-galaxy'),
		),
		'settings' => 'hotel_galaxy_option[back_to_top]',
		'priority' => 10,
	)
);
?>