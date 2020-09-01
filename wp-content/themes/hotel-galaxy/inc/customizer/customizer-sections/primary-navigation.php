<?php 

$wp_customize->add_section('sticky_navigation_section',array(
	'title' => __( 'Sticky Navigation','hotel-galaxy'),
	'panel'=>'hotelgalaxy_theme_layout',
	'capability'=>'edit_theme_options',
	'priority' => 2,			
));


//sticky navbar
$wp_customize->add_setting(
	'hotel_galaxy_option[sticky_menu]',
	array(
		'default' => $defaults['sticky_menu'],
		'type' => 'option',
		'sanitize_callback' => 'hotelgalaxy_sanitize_selectbox'
	)
);

$wp_customize->add_control(
	'hotel_galaxy_option[sticky_menu]',
	array(
		'type' => 'select',
		'label' => esc_html__( 'Sticky Navigation', 'hotel-galaxy'),
		'section' => 'sticky_navigation_section',
		'choices' => array(
			'mobile' => esc_html__( 'Mobile only', 'hotel-galaxy'),
			'desktop' => esc_html__( 'Desktop only', 'hotel-galaxy'),
			'true' => esc_html__( 'On', 'hotel-galaxy'),
			'false' => esc_html__( 'Off', 'hotel-galaxy')
		),
		'settings' => 'hotel_galaxy_option[sticky_menu]',
		'priority' => 1
	)
);

// nav primary

$wp_customize->add_section('hotelgalaxy_primary_navigation_layout',array(
	'title' => __( 'Primary Navigation','hotel-galaxy'),
	'panel'=>'hotelgalaxy_theme_layout',
	'capability'=>'edit_theme_options',
	'priority' => 2,			
));


$wp_customize->add_setting(
	'hotel_galaxy_option[nav_dropdown_direction]',
	array(
		'default' => $defaults['nav_dropdown_direction'],
		'type' => 'option',
		'sanitize_callback' => 'hotelgalaxy_sanitize_selectbox',
	)
);

$wp_customize->add_control(
	'hotel_galaxy_option[nav_dropdown_direction]',
	array(
		'type' => 'select',
		'label' => __( 'Dropdown Direction', 'hotel-galaxy'),
		'section' => 'hotelgalaxy_primary_navigation_layout',
		'choices' => array(
			'right' => __( 'Right', 'hotel-galaxy'),
			'left' => __( 'Left', 'hotel-galaxy'),
		),
		'settings' => 'hotel_galaxy_option[nav_dropdown_direction]',
		'priority' => 1,
	)
);
?>