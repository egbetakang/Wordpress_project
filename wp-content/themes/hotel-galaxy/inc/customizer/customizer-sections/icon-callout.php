<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_section('icon_callout_section',array(

	'title' => __( 'Footer Icon Bar ','hotel-galaxy'),
	'panel'=>'hotelgalaxy_theme_layout',
	'capability'=>'edit_theme_options',
	'priority' => 22,			

));

// 

for($i=1; $i <= 4; $i++){

	$c_i = 'footer_collout_icon_'.$i;
	$c_t = 'footer_collout_title_'.$i;

	$callout_icon = 'hotel_galaxy_option['.$c_i.']';
	$callout_title = 'hotel_galaxy_option['.$c_t.']';


	$wp_customize->add_control(
		new Hotelgalaxy_Title_Control(
			$wp_customize,
			'hotelgalaxy_footer_callout_title_'.$i,
			array(
				'section' => 'icon_callout_section',
				'type' => 'hotelgalaxy-title-control',
				'title'	=> sprintf( __( 'Icon %s ', 'hotel-galaxy' ), $i ),
				'settings' => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname',
			)
		)
	);


	$wp_customize->add_setting($callout_icon,array(
		'type'=>'option',
		'default'=>$defaults[$c_i],	
		'sanitize_callback'=>'hotelgalaxy_sanitize_text',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( $callout_icon, array(
		'label'        => null,
		'description' => __( 'Fontawsome icon example:- fa fa-car','hotel-galaxy'),
		'type'=>'text',
		'section'    => 'icon_callout_section',
		'settings'   => $callout_icon,
		
	) );

	// 

	$wp_customize->add_setting($callout_title,array(
		'type'=>'option',
		'default'=>$defaults[$c_i],
		'sanitize_callback'=>'hotelgalaxy_sanitize_text',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( $callout_title, array(
		'label'        => null,
		'description' => __( 'Enter Title','hotel-galaxy'),
		'type'=>'text',
		'section'    => 'icon_callout_section',
		'settings'   => $callout_title,
		
	) );


}


?>