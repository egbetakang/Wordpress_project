<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

// header background image
$wp_customize->add_section(
	'header_background_image_section',
	array(
		'title' => __( 'Header', 'hotel-galaxy'),
		'capability' => 'edit_theme_options',
		'priority' => 1,
		'panel' => 'hotelgalaxy_background_image_panel'
	)
);

$wp_customize->add_setting('hotel_galaxy_option[header_background_image]',array(
	'type'=>'option',
	'default'=>$default_images['header_background_image'],	
	'sanitize_callback'=>'esc_url_raw',	
	'capability'        => 'edit_theme_options'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'hotel_galaxy_option[header_background_image]',array(
	'label'=>__('Header Background','hotel-galaxy'),
	'section'=>'header_background_image_section',
	'priority' => 1,
	'settings'=>'hotel_galaxy_option[header_background_image]'
)));


// body background image
$wp_customize->add_section(
	'body_background_image',
	array(
		'title' => __( 'Body', 'hotel-galaxy'),
		'capability' => 'edit_theme_options',
		'priority' => 1,
		'panel' => 'hotelgalaxy_background_image_panel'
	)
);

// body background image
$wp_customize->add_setting('hotel_galaxy_option[body_background_image]',array(
	'type'=>'option',
	'default'=>$default_images['body_background_image'],	
	'sanitize_callback'=>'esc_url_raw',	
	'capability'        => 'edit_theme_options'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'hotel_galaxy_option[body_background_image]',array(
	'label'=>__('Body Background','hotel-galaxy'),
	'section'=>'body_background_image',
	'priority' => 1,
	'settings'=>'hotel_galaxy_option[body_background_image]'
)));




// breadcrums image
$wp_customize->add_section(
	'breadcrums_background_image',
	array(
		'title' => __( 'Breadcrums', 'hotel-galaxy'),
		'capability' => 'edit_theme_options',
		'priority' => 1,
		'panel' => 'hotelgalaxy_background_image_panel'
	)
);
//  image

$wp_customize->add_setting('hotel_galaxy_option[page_title_bg]',array(
	'type'=>'option',
	'default'=>$defaults['page_title_bg'],	
	'sanitize_callback'=>'esc_url_raw',	
	'capability'        => 'edit_theme_options'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'hotel_galaxy_option[page_title_bg]',array(
	'label'=>__('Breadcrum Image','hotel-galaxy'),
	'section'=>'breadcrums_background_image',
	'settings'=>'hotel_galaxy_option[page_title_bg]'
)));


?>