<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(! function_exists('hotelgalaxy_theme_support')){


	add_action( 'after_setup_theme', 'hotelgalaxy_theme_support' ); 	

	function hotelgalaxy_theme_support(){

		load_theme_textdomain( 'hotel-galaxy');

		add_theme_support( 'automatic-feed-links');

		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'woocommerce' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'post-formats', array( 
			'aside', 
			'image', 
			'video', 
			'quote', 
			'link', 
			'status' 
		) );

		add_theme_support( 'title-tag' );

		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		add_theme_support( 'customize-selective-refresh-widgets' );
		
		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );		

		
		add_theme_support('custom-logo',
			array(
				'height'      => 70,
				'width'       => 350,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);		

	// Set post thumbnail size.
		set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
		add_image_size( 'hotelgalaxy-fullscreen', 1980, 9999 );

	// If the retina setting is active, double the recommended width and height.	

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

	// Register primary menu.

		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'hotel-galaxy'),
		) );

	// Pixels

		global $content_width;

		if ( ! isset( $content_width ) ) {

			$content_width = 1200; 
		}


	}

}

function hotelgalaxy_classic_editor_styles() {

	$classic_editor_styles = array(
		'/assets/css/editor-style-classic.css',
	);

	add_editor_style( $classic_editor_styles );

}

add_action( 'init', 'hotelgalaxy_classic_editor_styles' );



?>