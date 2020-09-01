<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**slider setting start***/ 
$wp_customize->add_section('slider_sec',array(
	'title' => __( 'Slider','hotel-galaxy'),
	'panel'=>'hotelgalaxy_homepage_layout',
	'capability'=>'edit_theme_options',
	'priority' => 0,			
));


//slider btn text
$wp_customize->add_setting('hotel_galaxy_option[slider_sec_btn]',array(
	'type'=>'option',
	'default'=>$defaults['slider_sec_btn'],
	'sanitize_callback'=>'hotelgalaxy_sanitize_text',	
	'capability'        => 'edit_theme_options',
	
));

$wp_customize->add_control( 'slider_sec_btn', array(
	'label'        => __( 'Button Text', 'hotel-galaxy'),
	'type'=>'text',
	'priority'=> 1,	
	'section'    => 'slider_sec',	
	'settings'   => 'hotel_galaxy_option[slider_sec_btn]',
));

/******end*******/


if( ! defined( 'HG_SLIDER_ADDON_VERSION' ) ){


	for($i=1; $i<=5; $i++){

		$wp_customize->add_setting( "Page_slider_$i",array(
			'sanitize_callback' => 'hotelgalaxy_dropdown_pages_sanitize',
		));

		$wp_customize->add_control( "Page_slider_$i",array(
			'label'           => __( 'Slider Image', 'hotel-galaxy') . ' ' . $i,
			'section'         => 'slider_sec',
			'type'            => 'dropdown-pages',
			'priority'        => 100,			
		));
	}

}

?>