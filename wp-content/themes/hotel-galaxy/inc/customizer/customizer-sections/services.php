<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/*****Services section******/

$wp_customize->add_section('service_sec',array(
	'title' => __( 'Service','hotel-galaxy'),
	'description' => '',
	'panel'=>'hotelgalaxy_homepage_layout',
	'capability'=>'edit_theme_options',
	'priority' => 2,			
	));

//section show or hide
$wp_customize->add_setting(	'hotel_galaxy_option[is_home_service_section]',array(
	'type'    => 'option',
	'default'=>$defaults['is_home_service_section'],
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
	'capability'        => 'edit_theme_options',
	)
);
$wp_customize->add_control( 'is_home_service_section', array(
	'label'        => __( 'Display Section', 'hotel-galaxy'),
	'type'=>'checkbox',
	'section'    => 'service_sec',
	'priority' => 1,
	'settings'   => 'hotel_galaxy_option[is_home_service_section]',
	) );

//section target
$wp_customize->add_setting(	'hotel_galaxy_option[home_service_button_target]',array(
	'type'    => 'option',
	'default'=>$defaults['home_service_button_target'],
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
	'capability'        => 'edit_theme_options',
	)
);
$wp_customize->add_control( 'home_service_button_target', array(
	'label'        => __( 'Link Open New Tab', 'hotel-galaxy'),
	'type'=>'checkbox',
	'section'    => 'service_sec',
	'priority' => 1,
	'settings'   => 'hotel_galaxy_option[home_service_button_target]',
	) );

//is button
$wp_customize->add_setting(	'hotel_galaxy_option[is_home_service_button]',array(
	'type'    => 'option',
	'default'=>$defaults['is_home_service_button'],
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
	'capability'        => 'edit_theme_options',
	)
);
$wp_customize->add_control( 'is_home_service_button', array(
	'label'        => __( 'Display More Button', 'hotel-galaxy'),
	'type'=>'checkbox',
	'section'    => 'service_sec',
	'priority' => 1,
	'settings'   => 'hotel_galaxy_option[is_home_service_button]',
	) );

//display seprator
$wp_customize->add_setting(	'hotel_galaxy_option[is_service_seprator]',array(
	'type'    => 'option',
	'default'=>$defaults['is_service_seprator'],
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
	'capability'        => 'edit_theme_options',
));

$wp_customize->add_control( 'is_service_seprator', array(
	'label'        => __( 'Display Seprator', 'hotel-galaxy'),
	'type'=>'checkbox',
	'priority'=> 1,
	'section'    => 'service_sec',
	'settings'   => 'hotel_galaxy_option[is_service_seprator]',
) );

//services title
$wp_customize->add_setting('hotel_galaxy_option[home_service_section_header]',array(
	'type'=>'option',
	'default'=>$defaults['home_service_section_header'],	
	'sanitize_callback'=>'hotelgalaxy_not_sanitize',
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'home_service_section_header', array(
	'label'        => __( 'Header', 'hotel-galaxy'),
	'type'=>'text',
	'section'    => 'service_sec',
	'priority' => 2,
	'settings'   => 'hotel_galaxy_option[home_service_section_header]',
	));

//dispaly header
$wp_customize->add_setting(	'hotel_galaxy_option[is_home_service_header]',array(
	'type'    => 'option',
	'default'=>$defaults['is_home_service_header'],
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
	'capability'        => 'edit_theme_options',
	)
);
$wp_customize->add_control( 'is_home_service_header', array(
	'label'        => __( 'Display header', 'hotel-galaxy'),
	'type'=>'checkbox',
	'section'    => 'service_sec',
	'priority' => 2,
	'settings'   => 'hotel_galaxy_option[is_home_service_header]',
	) );


//services desc
$wp_customize->add_setting('hotel_galaxy_option[home_service_section_description]',array(
	'type'=>'option',
	'default'=>$defaults['home_service_section_description'],	
	'sanitize_callback'=>'hotelgalaxy_not_sanitize',
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'home_service_section_description', array(
	'label'        => __( 'Sub Header', 'hotel-galaxy'),
	'type'=>'textarea',
	'section'    => 'service_sec',
	'priority' => 3,
	'settings'   => 'hotel_galaxy_option[home_service_section_description]',
	));

//dispaly sub header
$wp_customize->add_setting(	'hotel_galaxy_option[is_home_service_sub_header]',array(
	'type'    => 'option',
	'default'=>$defaults['is_home_service_sub_header'],
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
	'capability'        => 'edit_theme_options',
	)
);
$wp_customize->add_control( 'is_home_service_sub_header', array(
	'label'        => __( 'Display sub header', 'hotel-galaxy'),
	'type'=>'checkbox',
	'section'    => 'service_sec',
	'priority' => 3,
	'settings'   => 'hotel_galaxy_option[is_home_service_sub_header]',
	) );


// column

$wp_customize->add_setting(
	'hotel_galaxy_option[home_service_widget_column]',
	array(
		'default' => $defaults['home_service_widget_column'],
		'type' => 'option',
		'sanitize_callback' => 'hotelgalaxy_sanitize_selectbox'
	)
);

$wp_customize->add_control(
	'hotel_galaxy_option[home_service_widget_column]',
	array(
		'type' => 'select',
		'label' => esc_html__( 'Column', 'hotel-galaxy'),
		'section' => 'service_sec',
		'priority' => 3,
		'choices' => array(
			'col-md-6' => esc_html__( '2 column', 'hotel-galaxy'),
			'col-md-4' => esc_html__( '3 column', 'hotel-galaxy'),
			'col-md-3' => esc_html__( '4 column', 'hotel-galaxy'),
		),
		'settings' => 'hotel_galaxy_option[home_service_widget_column]',
	)
);

//services button
$wp_customize->add_setting('hotel_galaxy_option[home_service_button_text]',array(
	'type'=>'option',
	'default'=>$defaults['home_service_button_text'],	
	'sanitize_callback'=>'hotelgalaxy_not_sanitize',
	'capability'        => 'edit_theme_options',
	));
$wp_customize->add_control( 'home_service_button_text', array(
	'label'        => __( 'Button Text', 'hotel-galaxy'),
	'type'=>'text',
	'section'    => 'service_sec',
	'priority' => 3,
	'settings'   => 'hotel_galaxy_option[home_service_button_text]',
	));

?>