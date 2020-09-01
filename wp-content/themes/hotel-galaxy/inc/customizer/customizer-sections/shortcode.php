<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/*****Blog section******/

$wp_customize->add_section('shortcode_sec',array(
	'title' => __( 'Shortcode','hotel-galaxy'),
	'description' => '',
	'panel'=>'hotelgalaxy_homepage_layout',
	'capability'=>'edit_theme_options',
	'priority' => 37,			
	));

//section show or hide
$wp_customize->add_setting(	'hotel_galaxy_option[shortcode_show]',array(
	'type'    => 'option',
	'default'=>$defaults['shortcode_show'],
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
	'capability'        => 'edit_theme_options',
	)
);
$wp_customize->add_control( 'shortcode_show', array(
	'label'        => __( 'Display Section', 'hotel-galaxy'),
	'type'=>'checkbox',
	'section'    => 'shortcode_sec',
	'settings'   => 'hotel_galaxy_option[shortcode_show]',
	) );

//display seprator
$wp_customize->add_setting(	'hotel_galaxy_option[is_shortcode_seprator]',array(
	'type'    => 'option',
	'default'=>$defaults['is_shortcode_seprator'],
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
	'capability'        => 'edit_theme_options',
));

$wp_customize->add_control( 'is_shortcode_seprator', array(
	'label'        => __( 'Display Seprator', 'hotel-galaxy'),
	'type'=>'checkbox',
	'priority'=> 1,
	'section'    => 'shortcode_sec',
	'settings'   => 'hotel_galaxy_option[is_shortcode_seprator]',
) );

//Blog title

$wp_customize->add_setting('hotel_galaxy_option[shortcode_title]',array(
	'type'=>'option',
	'default'=>$defaults['shortcode_title'],	
	'sanitize_callback'=>'hotelgalaxy_not_sanitize',
	'capability'        => 'edit_theme_options',
	));

$wp_customize->add_control( 'shortcode_title', array(
	'label'        => __( 'Header', 'hotel-galaxy'),
	'type'=>'text',
	'section'    => 'shortcode_sec',
	'settings'   => 'hotel_galaxy_option[shortcode_title]',
	));

//display header
$wp_customize->add_setting(	'hotel_galaxy_option[is_home_shortcode_header]',array(
	'type'    => 'option',
	'default'=>$defaults['is_home_shortcode_header'],
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
	'capability'        => 'edit_theme_options',
	)
);
$wp_customize->add_control( 'is_home_shortcode_header', array(
	'label'        => __( 'Display header', 'hotel-galaxy'),
	'type'=>'checkbox',
	'section'    => 'shortcode_sec',
	'settings'   => 'hotel_galaxy_option[is_home_shortcode_header]',
	) );


//Blog description
$wp_customize->add_setting('hotel_galaxy_option[shortcode_description]',array(
	'type'=>'option',
	'default'=>$defaults['shortcode_description'],	
	'sanitize_callback'=>'hotelgalaxy_not_sanitize',
	'capability'        => 'edit_theme_options',
	));

$wp_customize->add_control( 'shortcode_description', array(
	'label'        => __( 'Sub Header', 'hotel-galaxy'),
	'type'=>'textarea',
	'section'    => 'shortcode_sec',
	'settings'   => 'hotel_galaxy_option[shortcode_description]',
	));

//display subheader
$wp_customize->add_setting(	'hotel_galaxy_option[is_home_shortcode_sub_header]',array(
	'type'    => 'option',
	'default'=>$defaults['is_home_shortcode_sub_header'],
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
	'capability'        => 'edit_theme_options',
	)
);
$wp_customize->add_control( 'is_home_shortcode_sub_header', array(
	'label'        => __( 'Display sub-header', 'hotel-galaxy'),
	'type'=>'checkbox',
	'section'    => 'shortcode_sec',
	'settings'   => 'hotel_galaxy_option[is_home_shortcode_sub_header]',
	) );


//contact form 7 shortcode
$wp_customize->add_setting('hotel_galaxy_option[shortcode_echo]',array(
	'type'=>'option',
	'default'=>$defaults['shortcode_echo'],	
	'sanitize_callback'=>'hotelgalaxy_sanitize_text',
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'shortcode_echo', array(
	'label'        => __( 'Contact Form 7 Shortcode', 'hotel-galaxy'),
	'type'=>'text',
	'section'    => 'shortcode_sec',
	'settings'   => 'hotel_galaxy_option[shortcode_echo]',
	));




?>