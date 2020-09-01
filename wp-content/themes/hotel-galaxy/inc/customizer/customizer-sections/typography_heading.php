<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_section(
	'heading_typography_section',
	array(
		'title' => __( 'Heading', 'hotel-galaxy'),
		'capability' => 'edit_theme_options',
		'panel'=>'hotelgalaxy_typography_layout',
		'priority' => 2,
	)
);

$wp_customize->add_control(
	new Hotelgalaxy_Title_Control(
		$wp_customize,
		'hotelgalaxy_heading_1_title',
		array(
			'section' => 'heading_typography_section',
			'type' => 'hotelgalaxy-title-control',
			'title'	=> __( 'Heading  (h1)', 'hotel-galaxy'),
			'settings' => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname',
		)
	)
);

$wp_customize->add_setting(
	'hotel_galaxy_option[h1_font]',
	array(
		'default' => $default_font['h1_font'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_setting(
	'h1_font_category',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_setting(
	'h1_font_variants',
	array(
		'default' => '',
		'sanitize_callback' => 'hotelgalaxy_sanitize_variants'
	)
);

$wp_customize->add_setting(
	'hotel_galaxy_option[h1_weight]',
	array(
		'default' => $default_font['h1_weight'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_key',
		'transport' => 'postMessage'
	)
);

$wp_customize->add_setting(
	'hotel_galaxy_option[h1_transform]',
	array(
		'default' => $default_font['h1_transform'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_key',
		'transport' => 'postMessage'
	)
);

$wp_customize->add_control(
	new HotelGalaxy_Typography_Control(
		$wp_customize,
		'h1_font_control',
		array(
			'label' => __('Font Family', 'hotel-galaxy'),
			'section' => 'heading_typography_section',
			'settings' => array(
				'family' => 'hotel_galaxy_option[h1_font]',
				'variant' => 'h1_font_variants',
				'category' => 'h1_font_category',
				'weight' => 'hotel_galaxy_option[h1_weight]',
				'transform' => 'hotel_galaxy_option[h1_transform]',
			),
		)
	)
);

$wp_customize->add_setting(
	'hotel_galaxy_option[h1_font_size]',
	array(
		'default' => $default_font['h1_font_size'],
		'type' => 'option',
		'sanitize_callback' => 'absint',
		'transport' => 'postMessage'
	)
);


$wp_customize->add_setting(
	'hotel_galaxy_option[mobile_h1_font_size]',
	array(
		'default' => $default_font['mobile_h1_font_size'],
		'type' => 'option',
		'sanitize_callback' => 'hotelgalaxy_sanitize_empty_absint',
		'transport' => 'postMessage'
	)
);

$wp_customize->add_control(
	new Hotelgalaxy_Range_Slider_Control(
		$wp_customize,
		'h1_font_sizes',
		array(
			'label' => __( 'Font size', 'hotel-galaxy'),
			'section' => 'heading_typography_section',
			'settings' => array(
				'desktop' => 'hotel_galaxy_option[h1_font_size]',
				'mobile' => 'hotel_galaxy_option[mobile_h1_font_size]',
			),
			'choices' => array(
				'desktop' => array(
					'min' => 15,
					'max' => 100,
					'step' => 1,
					'edit' => true,
					'unit' => 'px',
				),
				'mobile' => array(
					'min' => 15,
					'max' => 100,
					'step' => 1,
					'edit' => true,
					'unit' => 'px',
				),
			),
		)
	)
);

$wp_customize->add_setting(
	'hotel_galaxy_option[h1_line_height]',
	array(
		'default' => $default_font['h1_line_height'],
		'type' => 'option',
		'sanitize_callback' => 'hotelgalaxy_decimal_integer_sanitize',
		'transport' => 'postMessage'
	)
);

$wp_customize->add_control(
	new Hotelgalaxy_Range_Slider_Control(
		$wp_customize,
		'hotel_galaxy_option[h1_line_height]',
		array(
			'label' => __( 'Line height', 'hotel-galaxy'),
			'section' => 'heading_typography_section',
			'settings' => array(
				'desktop' => 'hotel_galaxy_option[h1_line_height]',
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

 // heading 2 *************************************

$wp_customize->add_control(
	new Hotelgalaxy_Title_Control(
		$wp_customize,
		'hotelgalaxy_heading_2_title',
		array(
			'section' => 'heading_typography_section',
			'type' => 'hotelgalaxy-title-control',
			'title'	=> __( 'Heading  (h2)', 'hotel-galaxy'),
			'settings' => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname',
		)
	)
);


$wp_customize->add_setting(
	'hotel_galaxy_option[h2_font]',
	array(
		'default' => $default_font['h2_font'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_setting(
	'h2_font_category',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_setting(
	'h2_font_variants',
	array(
		'default' => '',
		'sanitize_callback' => 'hotelgalaxy_sanitize_variants'
	)
);

$wp_customize->add_setting(
	'hotel_galaxy_option[h2_weight]',
	array(
		'default' => $default_font['h2_weight'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_key',
		'transport' => 'postMessage'
	)
);

$wp_customize->add_setting(
	'hotel_galaxy_option[h2_transform]',
	array(
		'default' => $default_font['h2_transform'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_key',
		'transport' => 'postMessage'
	)
);

$wp_customize->add_control(
	new HotelGalaxy_Typography_Control(
		$wp_customize,
		'h2_font_control',
		array(
			'label' => __('Font Family', 'hotel-galaxy'),
			'section' => 'heading_typography_section',
			'settings' => array(
				'family' => 'hotel_galaxy_option[h2_font]',
				'variant' => 'h2_font_variants',
				'category' => 'h2_font_category',
				'weight' => 'hotel_galaxy_option[h2_weight]',
				'transform' => 'hotel_galaxy_option[h2_transform]',
			),
		)
	)
);

$wp_customize->add_setting(
	'hotel_galaxy_option[h2_font_size]',
	array(
		'default' => $default_font['h2_font_size'],
		'type' => 'option',
		'sanitize_callback' => 'absint',
		'transport' => 'postMessage'
	)
);


$wp_customize->add_setting(
	'hotel_galaxy_option[mobile_h2_font_size]',
	array(
		'default' => $default_font['mobile_h2_font_size'],
		'type' => 'option',
		'sanitize_callback' => 'hotelgalaxy_sanitize_empty_absint',
		'transport' => 'postMessage'
	)
);

$wp_customize->add_control(
	new Hotelgalaxy_Range_Slider_Control(
		$wp_customize,
		'h2_font_sizes',
		array(
			'description' => __( 'Font size', 'hotel-galaxy'),
			'section' => 'heading_typography_section',
			'settings' => array(
				'desktop' => 'hotel_galaxy_option[h2_font_size]',
				'mobile' => 'hotel_galaxy_option[mobile_h2_font_size]',
			),
			'choices' => array(
				'desktop' => array(
					'min' => 15,
					'max' => 100,
					'step' => 1,
					'edit' => true,
					'unit' => 'px',
				),
				'mobile' => array(
					'min' => 15,
					'max' => 100,
					'step' => 1,
					'edit' => true,
					'unit' => 'px',
				),
			),
		)
	)
);

$wp_customize->add_setting(
	'hotel_galaxy_option[h2_line_height]',
	array(
		'default' => $default_font['h2_line_height'],
		'type' => 'option',
		'sanitize_callback' => 'hotelgalaxy_decimal_integer_sanitize',
		'transport' => 'postMessage'
	)
);

$wp_customize->add_control(
	new Hotelgalaxy_Range_Slider_Control(
		$wp_customize,
		'hotel_galaxy_option[h2_line_height]',
		array(
			'description' => __( 'Line height', 'hotel-galaxy'),
			'section' => 'heading_typography_section',
			'settings' => array(
				'desktop' => 'hotel_galaxy_option[h2_line_height]',
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

// heading 3 ******************************


$wp_customize->add_control(
	new Hotelgalaxy_Title_Control(
		$wp_customize,
		'hotelgalaxy_heading_3_title',
		array(
			'section' => 'heading_typography_section',
			'type' => 'hotelgalaxy-title-control',
			'title'	=> __( 'Heading  (h3)', 'hotel-galaxy'),
			'settings' => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname',
		)
	)
);

$wp_customize->add_setting(
			'hotel_galaxy_option[h3_font]',
			array(
				'default' => $default_font['h3_font'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_setting(
			'h3_font_category',
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_setting(
			'h3_font_variants',
			array(
				'default' => '',
				'sanitize_callback' => 'hotelgalaxy_sanitize_variants'
			)
		);

		$wp_customize->add_setting(
			'hotel_galaxy_option[h3_weight]',
			array(
				'default' => $default_font['h3_weight'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_key',
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_setting(
			'hotel_galaxy_option[h3_transform]',
			array(
				'default' => $default_font['h3_transform'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_key',
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control(
			new HotelGalaxy_Typography_Control(
				$wp_customize,
				'h3_font_control',
				array(
					'label' => __( 'Font Family', 'hotel-galaxy'),
					'section' => 'heading_typography_section',
					'settings' => array(
						'family' => 'hotel_galaxy_option[h3_font]',
						'variant' => 'h3_font_variants',
						'category' => 'h3_font_category',
						'weight' => 'hotel_galaxy_option[h3_weight]',
						'transform' => 'hotel_galaxy_option[h3_transform]',
					),
				)
			)
		);

		$wp_customize->add_setting(
			'hotel_galaxy_option[h3_font_size]',
			array(
				'default' => $default_font['h3_font_size'],
				'type' => 'option',
				'sanitize_callback' => 'absint',
				'transport' => 'postMessage'
			)
		);

		
		
		$wp_customize->add_control(
			new Hotelgalaxy_Range_Slider_Control(
				$wp_customize,
				'h3_font_sizes',
				array(
					'label' => __( 'Font size', 'hotel-galaxy'),
					'section' => 'heading_typography_section',
					'settings' => array(
						'desktop' => 'hotel_galaxy_option[h3_font_size]',
						
					),
					'choices' => array(
						'desktop' => array(
							'min' => 10,
							'max' => 80,
							'step' => 1,
							'edit' => true,
							'unit' => 'px',
						),
						
					),
				)
			)
		);

		$wp_customize->add_setting(
			'hotel_galaxy_option[h3_line_height]',
			array(
				'default' => $default_font['h3_line_height'],
				'type' => 'option',
				'sanitize_callback' => 'hotelgalaxy_decimal_integer_sanitize',
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control(
			new Hotelgalaxy_Range_Slider_Control(
				$wp_customize,
				'hotel_galaxy_option[h3_line_height]',
				array(
					'description' => __( 'Line height', 'hotel-galaxy'),
					'section' => 'heading_typography_section',
					'settings' => array(
						'desktop' => 'hotel_galaxy_option[h3_line_height]',
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