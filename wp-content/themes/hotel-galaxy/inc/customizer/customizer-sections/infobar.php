<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}



/**genral setting start***/ 
$wp_customize->add_section('infobar_section',array(
	'title' => __( 'Top Information Bar','hotel-galaxy'),
	'panel'=>'hotelgalaxy_theme_layout',
	'capability'=>'edit_theme_options',
	'priority' => 3,			
));


// social media

$wp_customize->add_control(
	new Hotelgalaxy_Title_Control(
		$wp_customize,
		'hotelgalaxy_infobar_information_title',
		array(
			'section' => 'infobar_section',
			'priority' => 1,
			'type' => 'hotelgalaxy-title-control',
			'title'	=> __( 'Information Bar Settings', 'hotel-galaxy'),
			'settings' => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname',
		)
	)
);


for($i=1; $i <= 2; $i++){

	$information_title = 'hotel_galaxy_option[information_title_'.$i.']';
	$information_text = 'hotel_galaxy_option[information_text_'.$i.']';


	$wp_customize->add_control(
		new Hotelgalaxy_Title_Control(
			$wp_customize,
			'hotelgalaxy_infobar_information_title_'.$i,
			array(
				'section' => 'infobar_section',
				'type' => 'hotelgalaxy-title-control',
				'title'	=> __( 'Information ', 'hotel-galaxy'),
				'settings' => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname',
			)
		)
	);


	$wp_customize->add_setting($information_title,array(
		'type'=>'option',
		'default'=>'',	
		'sanitize_callback'=>'hotelgalaxy_sanitize_text',
		'capability'        => 'edit_theme_options',
		'transport' => 'postMessage',
	));

// 
	$wp_customize->add_control( $information_title, array(
		'label'        => null,
		'description' => __( 'Title Ex:- Address','hotel-galaxy'),
		'type'=>'text',
		'section'    => 'infobar_section',
		'settings'   => $information_title,
		
	) );

	$wp_customize->add_setting($information_text,array(
		'type'=>'option',
		'default'=>'',	
		'sanitize_callback'=>'hotelgalaxy_sanitize_text',
		'capability'        => 'edit_theme_options',
		'transport' => 'postMessage',
	));

	$wp_customize->add_control( $information_text, array(
		'label'        => null,
		'description' => __( 'Text','hotel-galaxy'),
		'type'=>'text',
		'section'    => 'infobar_section',
		'settings'   => $information_text,
		
	) );


}


// social media

$wp_customize->add_control(
	new Hotelgalaxy_Title_Control(
		$wp_customize,
		'hotelgalaxy_infobar_socialmedia_title',
		array(
			'section' => 'infobar_section',
			'type' => 'hotelgalaxy-title-control',
			'title'	=> __( 'Social Media Settings', 'hotel-galaxy'),
			'settings' => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname',
		)
	)
);

// social icons

for($i=1; $i <= 5; $i++){

	$s_icon = 'socialmedia_icon_'.$i;
	$s_url = 'socialmedia_url_'.$i;

	$socialmedia_icon = 'hotel_galaxy_option['.$s_icon.']';
	$socialmedia_url = 'hotel_galaxy_option['.$s_url.']';


	$wp_customize->add_control(
		new Hotelgalaxy_Title_Control(
			$wp_customize,
			'hotelgalaxy_infobar_socialmedia_title_'.$i,
			array(
				'section' => 'infobar_section',
				'type' => 'hotelgalaxy-title-control',
				'title'	=> esc_html( 'Icon '.$i),
				'settings' => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname',
			)
		)
	);


	$wp_customize->add_setting($socialmedia_icon,array(
		'type'=>'option',
		'default'=>$defaults[$s_icon],	
		'sanitize_callback'=>'hotelgalaxy_sanitize_text',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( $socialmedia_icon, array(
		'label'        => null,
		'description' => __( 'Icon Ex:- fa fa-facebook','hotel-galaxy'),
		'type'=>'text',
		'section'    => 'infobar_section',
		'settings'   => $socialmedia_icon,
		
	) );

	// 

	$wp_customize->add_setting($socialmedia_url,array(
		'type'=>'option',
		'default'=>$defaults[$s_url],
		'sanitize_callback'=>'hotelgalaxy_sanitize_URL',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( $socialmedia_url, array(
		'label'        => null,
		'description' => __( 'URL Ex:- https://example.com','hotel-galaxy'),
		'type'=>'text',
		'section'    => 'infobar_section',
		'settings'   => $socialmedia_url,
		
	) );


}


/**social links end**/


/**genral setting end***/ 
?>