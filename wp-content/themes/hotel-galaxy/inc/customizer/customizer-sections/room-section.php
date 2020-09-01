<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// room section

$wp_customize->add_section('room_sec',array(
	'title' => __( 'Room','hotel-galaxy'),
	'panel'=>'hotelgalaxy_homepage_layout',
	'capability'=>'edit_theme_options',
	'priority' => 3,			
));

//section show or hide
$wp_customize->add_setting(	'hotel_galaxy_option[room_sec_show]',array(
	'type'    => 'option',
	'default'=>$defaults['room_sec_show'],	
	'capability'        => 'edit_theme_options',
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
));

$wp_customize->add_control( 'room_sec_show', array(
	'label'        => __( 'Display Section', 'hotel-galaxy'),
	'type'=>'checkbox',
	'section'    => 'room_sec',	
	'priority'    => 1,	
	'settings'   => 'hotel_galaxy_option[room_sec_show]',
) );


//display button
$wp_customize->add_setting(	'hotel_galaxy_option[room_is_button]',array(
	'type'    => 'option',
	'default'=>$defaults['room_is_button'],	
	'capability'        => 'edit_theme_options',
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
)
);

$wp_customize->add_control( 'hotel_galaxy_option[room_is_button]', array(
	'label'        => __( 'Display Button', 'hotel-galaxy'),
	'type'=>'checkbox',
	'section'    => 'room_sec',	
	'priority'    => 1,	
	'settings'   => 'hotel_galaxy_option[room_is_button]',
) );

//is target
$wp_customize->add_setting(	'hotel_galaxy_option[room_is_target]',array(
	'type'    => 'option',
	'default'=>$defaults['room_is_target'],	
	'capability'        => 'edit_theme_options',
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
)
);

$wp_customize->add_control( 'hotel_galaxy_option[room_is_target]', array(
	'label'        => __( 'Open in new tab', 'hotel-galaxy'),
	'type'=>'checkbox',
	'section'    => 'room_sec',	
	'priority'    => 1,	
	'settings'   => 'hotel_galaxy_option[room_is_target]',
) );

//display seprator
$wp_customize->add_setting(	'hotel_galaxy_option[is_room_seprator]',array(
	'type'    => 'option',
	'default'=>$defaults['is_room_seprator'],
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
	'capability'        => 'edit_theme_options',
));

$wp_customize->add_control( 'is_room_seprator', array(
	'label'        => __( 'Display Seprator', 'hotel-galaxy'),
	'type'=>'checkbox',
	'priority'=> 1,
	'section'    => 'room_sec',
	'settings'   => 'hotel_galaxy_option[is_room_seprator]',
) );

//Room title
$wp_customize->add_setting('hotel_galaxy_option[room_sec_title]',array(
	'type'=>'option',
	'default'=>$defaults['room_sec_title'],
	'sanitize_callback'=>'hotelgalaxy_not_sanitize',	
	'capability'        => 'edit_theme_options',
));
$wp_customize->add_control( 'room_sec_title', array(
	'label'        => __( 'Header', 'hotel-galaxy'),
	'type'=>'text',
	'section'    => 'room_sec',	
	'priority'    => 2,	
	'settings'   => 'hotel_galaxy_option[room_sec_title]',
));

//display header
$wp_customize->add_setting(	'hotel_galaxy_option[is_home_room_header]',array(
	'type'    => 'option',
	'default'=>$defaults['is_home_room_header'],	
	'capability'        => 'edit_theme_options',
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
));

$wp_customize->add_control( 'is_home_room_header', array(
	'label'        => __( 'Display header', 'hotel-galaxy'),
	'type'=>'checkbox',
	'section'    => 'room_sec',	
	'priority'    => 2,	
	'settings'   => 'hotel_galaxy_option[is_home_room_header]',
) );

//Room desc
$wp_customize->add_setting('hotel_galaxy_option[room_sec_description]',array(
	'type'=>'option',
	'default'=>$defaults['room_sec_description'],
	'sanitize_callback'=>'hotelgalaxy_not_sanitize',	
	'capability'        => 'edit_theme_options',
));
$wp_customize->add_control( 'room_sec_description', array(
	'label'        => __( 'Sub Header', 'hotel-galaxy'),
	'type'=>'textarea',
	'section'    => 'room_sec',	
	'priority'    => 3,	
	'settings'   => 'hotel_galaxy_option[room_sec_description]',
));

//display subheader
$wp_customize->add_setting(	'hotel_galaxy_option[is_home_room_sub_header]',array(
	'type'    => 'option',
	'default'=>$defaults['is_home_room_sub_header'],	
	'capability'        => 'edit_theme_options',
	'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
));

$wp_customize->add_control( 'is_home_room_sub_header', array(
	'label'        => __( 'Display sub-header', 'hotel-galaxy'),
	'type'=>'checkbox',
	'section'    => 'room_sec',	
	'priority'    => 3,	
	'settings'   => 'hotel_galaxy_option[is_home_room_sub_header]',
) );

// column

$wp_customize->add_setting(
	'hotel_galaxy_option[home_room_column]',
	array(
		'default' => $defaults['home_room_column'],
		'type' => 'option',
		'sanitize_callback' => 'hotelgalaxy_sanitize_selectbox'
	)
);

$wp_customize->add_control(
	'hotel_galaxy_option[home_room_column]',
	array(
		'type' => 'select',
		'label' => esc_html__( 'Column', 'hotel-galaxy'),
		'section' => 'room_sec',
		'priority'    => 4,	
		'choices' => array(
			'col-md-6' => esc_html__( '2 column', 'hotel-galaxy'),
			'col-md-4' => esc_html__( '3 column', 'hotel-galaxy'),
			'col-md-3' => esc_html__( '4 column', 'hotel-galaxy'),
		),
		'settings' => 'hotel_galaxy_option[home_room_column]',
	)
);



if(!defined('HG_ROOM_ADDON_VERSION')){
// room cat
	$wp_customize->add_setting('hotel_galaxy_option[room_cat]',array(
		'default' =>$defaults['room_cat'],
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'hotel_galaxy_room_sanitize',
		'type'=>'option',
	) );

	$wp_customize->add_control( new Hotelgalaxy_RoomCategory_Dropdown_Control( $wp_customize, 'hotel_galaxy_option[room_cat]', array(
		'label'   => __('Select Category to Show','hotel-galaxy'),
		'section' => 'room_sec',
		'priority'    => 5,	
		'settings'   =>  'hotel_galaxy_option[room_cat]',
	) ) );
	
}

//button text
$wp_customize->add_setting('hotel_galaxy_option[room_button_text]',array(
	'type'=>'option',
	'default'=>$defaults['room_button_text'],
	'sanitize_callback'=>'hotelgalaxy_not_sanitize',	
	'capability'        => 'edit_theme_options',
));
$wp_customize->add_control( 'hotel_galaxy_option[room_button_text]', array(
	'label'        => __( 'Button Text', 'hotel-galaxy'),
	'type'=>'text',
	'section'    => 'room_sec',	
	'priority'    => 5,	
	'settings'   => 'hotel_galaxy_option[room_button_text]',
));


?>
