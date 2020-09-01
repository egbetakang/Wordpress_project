<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_section(
	'body_typography_section',
	array(
		'title' => __( 'Body', 'hotel-galaxy'),
		'capability' => 'edit_theme_options',
		'panel'=>'hotelgalaxy_typography_layout',
		'priority' => 1,
	)
);

$wp_customize->add_setting(
	'hotel_galaxy_option[body_font]',
	array(
		'default' => $default_font['body_font'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);


$wp_customize->add_setting(
	'body_font_variants',
	array(
		'default' => $default_font['body_font_variants'],
		'sanitize_callback' => 'hotelgalaxy_sanitize_variants',
	)
);

$wp_customize->add_setting(
	'body_font_category',
	array(
		'default' => $default_font['body_font_category'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);


$wp_customize->add_setting(
	'hotel_galaxy_option[body_font_weight]',
	array(
		'default' => $default_font['body_font_weight'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_key',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_setting(
	'hotel_galaxy_option[body_font_transform]',
	array(
		'default' => $default_font['body_font_transform'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_key',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new HotelGalaxy_Typography_Control(
		$wp_customize,
		'hotel_galaxy_option[body_font]',
		array(
			'label' => __( 'Font Family', 'hotel-galaxy'),
			'section' => 'body_typography_section',
			'priority' => 1,
			'settings' => array(
				'family' => 'hotel_galaxy_option[body_font]',
				'variant' => 'body_font_variants',
				'category' => 'body_font_category',
				'weight' => 'hotel_galaxy_option[body_font_weight]',
				'transform' => 'hotel_galaxy_option[body_font_transform]',
			),
		)
	)
);




		// font size

$wp_customize->add_setting(
	'hotel_galaxy_option[body_font_size]',
	array(
		'default' => $default_font['body_font_size'],
		'type' => 'option',
		'sanitize_callback' => 'hotelgalaxy_sanitize_integer',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Hotelgalaxy_Range_Slider_Control(
		$wp_customize,
		'hotel_galaxy_option[body_font_size]',
		array(
			'type' => 'hotelgalaxy-range-slider',
			'label' => __( 'Font size', 'hotel-galaxy'),
			'section' => 'body_typography_section',
			'settings' => array(
				'desktop' => 'hotel_galaxy_option[body_font_size]',
			),
			'choices' => array(
				'desktop' => array(
					'min' => 6,
					'max' => 25,
					'step' => 1,
					'edit' => true,
					'unit' => 'px',
				),
			),
		)
	)
);

		// font size

$wp_customize->add_setting(
	'hotel_galaxy_option[body_line_height]',
	array(
		'default' => $default_font['body_line_height'],
		'type' => 'option',
		'sanitize_callback' => 'hotelgalaxy_decimal_integer_sanitize',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Hotelgalaxy_Range_Slider_Control(
		$wp_customize,
		'hotel_galaxy_option[body_line_height]',
		array(
			'type' => 'hotelgalaxy-range-slider',
			'label' => __( 'Line Height', 'hotel-galaxy'),
			'section' => 'body_typography_section',
			'settings' => array(
				'desktop' => 'hotel_galaxy_option[body_line_height]',
			),
			'choices' => array(
				'desktop' => array(
					'min' => 1,
					'max' => 3,
					'step' => .1,
					'edit' => true,
					'unit' => '',
				),
			),
		)
	)
);

		// paragraph margin

$wp_customize->add_setting(
	'hotel_galaxy_option[paragraph_margin]',
	array(
		'default' => $default_font['paragraph_margin'],
		'type' => 'option',
		'sanitize_callback' => 'hotelgalaxy_decimal_integer_sanitize',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Hotelgalaxy_Range_Slider_Control(
		$wp_customize,
		'hotel_galaxy_option[paragraph_margin]',
		array(
			'type' => 'hotelgalaxy-range-slider',
			'label' => __( 'Paragraph margin', 'hotel-galaxy'),
			'section' => 'body_typography_section',
			'settings' => array(
				'desktop' => 'hotel_galaxy_option[paragraph_margin]',
			),
			'choices' => array(
				'desktop' => array(
					'min' => 0,
					'max' => 5,
					'step' => .1,
					'edit' => true,
					'unit' => 'em',
				),
			),
		)
	)
);

?>