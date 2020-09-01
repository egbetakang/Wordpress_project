<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_section('blog_section',array(

	'title' => __( 'Blog','hotel-galaxy'),
	'panel'=>'hotelgalaxy_theme_layout',
	'capability'=>'edit_theme_options',
	'priority' => 5,			

));

$wp_customize->add_setting(
	'hotel_galaxy_option[post_content]',
	array(
		'default' => $defaults['post_content'],
		'type' => 'option',
		'sanitize_callback' => 'hotelgalaxy_blog_excerpt_sanitize',
	)
);

$wp_customize->add_control(
	'hotel_galaxy_option[post_content]',
	array(
		'type' => 'select',
		'label' => __( 'Content Type', 'hotel-galaxy'),
		'section' => 'blog_section',
		'choices' => array(
			'full' => __( 'Full', 'hotel-galaxy'),
			'excerpt' => __( 'Excerpt', 'hotel-galaxy'),
		),
		'settings' => 'hotel_galaxy_option[post_content]',
		'priority' => 1,
	)
);


?>