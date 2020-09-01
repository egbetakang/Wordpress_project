<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'hotelgalaxy_customizer_live_preview_script' ) ) {

	add_action( 'customize_preview_init', 'hotelgalaxy_customizer_live_preview_script', 100 );


	function hotelgalaxy_customizer_live_preview_script(){

		wp_enqueue_script( 'hotelgalaxy-customizer-preview', trailingslashit( get_template_directory_uri() ) . '/assets/js/customizer-live-preview.js', array( 'customize-preview' ), HotelGalaxy_Version, true );

		wp_localize_script( 'hotelgalaxy-customizer-preview', 'hotelgalaxy_preview', array(
			'mobile' => hotelgalaxy_media_query( 'mobile' ),
			'tablet' => hotelgalaxy_media_query( 'tablet' ),
			'desktop' => hotelgalaxy_media_query( 'desktop' ),
			
		) );

	}
}

add_action( 'customize_controls_enqueue_scripts', 'hotelgalaxy_do_control_customizer_inline_scripts', 100 );

function hotelgalaxy_do_control_customizer_inline_scripts() {

	wp_localize_script( 'hotelgalaxy-typography-wpcustomizer-script', 'hotelgalaxy_customizer',
		array(
			'nonce' => wp_create_nonce( 'hotelgalaxy_customizer_nonce' )
		)
	);

	$number_of_fonts = apply_filters( 'hotelgalaxy_number_of_fonts', 50 );

	wp_localize_script(
		'hotelgalaxy-typography-wpcustomizer-script',
		'hotelgalaxyAllGoogleFonts',
		array(
			'googleFonts' => apply_filters( 'hotelgalaxy-google-typography-list', hotelgalaxy_all_google_fonts( $number_of_fonts ) )
		)
	);

	wp_localize_script( 'hotelgalaxy-typography-wpcustomizer-script', 'systemFonts', hotelgalaxy_default_typography() );

	wp_enqueue_script( 'hotelgalaxy-customizer-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customizer-control.js', array( 'customize-controls', 'jquery' ), HotelGalaxy_Version, true );

	$settings = array(
		'hotelgalaxy_get_default'=> hotelgalaxy_get_default(),
		'hotelgalaxy_color_default'=> hotelgalaxy_color_defaults(),
	);
	wp_localize_script( 'hotelgalaxy-customizer-controls', 'settings', $settings );

}




if ( ! function_exists( 'hotelgalaxy_sanitize_checkbox' ) ) {
	
	function hotelgalaxy_sanitize_checkbox( $checked ) {
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
}

if ( ! function_exists( 'hotelgalaxy_sanitize_URL' ) ) {
	
	function hotelgalaxy_sanitize_URL(  $url, $protocols = null ) {

		return esc_url( $url, $protocols, 'db' );
	}
}

if ( ! function_exists( 'hotelgalaxy_sanitize_text' ) ) {
	
	function hotelgalaxy_sanitize_text( $text ) {
		return sanitize_text_field( $text );
	}
}

if(!function_exists('hotelgalaxy_not_sanitize')){

	function hotelgalaxy_not_sanitize( $html ) {
		return stripslashes(wp_filter_post_kses( $html ));
	}
}

if ( ! function_exists( 'hotelgalaxy_sanitize_integer' ) ) {
	
	function hotelgalaxy_sanitize_integer( $input ) {
		return absint( $input );
	}
}

function hotelgalaxy_sanitize_variants( $input ) {
	if ( is_array( $input ) ) {
		$input = implode( ',', $input );
	}
	return sanitize_text_field( $input );
}


function hotelgalaxy_sanitize_rgba_color( $color ) {
	if ( '' === $color ) {
		return '';
	}

	if ( false === strpos( $color, 'rgba' ) ) {
		return hotelgalaxy_sanitize_hex_color( $color );
	}

	$color = str_replace( ' ', '', $color );
	sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );

	return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
}

if ( ! function_exists( 'hotelgalaxy_sanitize_hex_color' ) ) {
	
	function hotelgalaxy_sanitize_hex_color( $color ) {
		if ( '' === $color ) {
			return '';
		}
		
		if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
			return $color;
		}

		return '';
	}
}

function hotelgalaxy_sanitize_preset_layout( $input ) {
	return 'current';
}

function hotelgalaxy_sanitize_selectbox( $input, $setting ) {

	
	$input = sanitize_key( $input );
	
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function hotelgalaxy_has_custom_logo_callback() {
	if ( get_theme_mod( 'custom_logo' ) ) {
		return true;
	}

	return false;
}

function hotelgalaxy_sanitize_empty_absint( $input ) {
	if ( '' == $input ) {
		return '';
	}

	return absint( $input );
}

function hotel_galaxy_sanitize_text( $input ) {
	
	return wp_kses_post( force_balance_tags( $input ) );
}

function hotel_galaxy_sanitize_integer( $input ) {
	if( is_numeric( $input ) ) {
		return intval( $input );
	}
}


if ( ! function_exists( 'hotelgalaxy_dropdown_pages_sanitize' ) ) {

	
	function hotelgalaxy_dropdown_pages_sanitize( $page_id, $setting ) {

		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );
		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );

	}

}


function hotel_galaxy_room_sanitize( $value ) {
	if ( ! in_array( $value, array( 'Uncategorized','category' ) ) )    
		return $value;
}

if ( ! function_exists( 'hotelgalaxy_customize_partial_blogname' ) ) {
	
	function hotelgalaxy_customize_partial_blogname() {
		bloginfo( 'name' );
	}
}

if ( ! function_exists( 'hotelgalaxy_customize_partial_blogdescription' ) ) {
	
	function hotelgalaxy_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
}

if ( ! function_exists( 'hotelgalaxy_decimal_integer_sanitize' ) ) {
	
	function hotelgalaxy_decimal_integer_sanitize( $input ) {
		return abs( floatval( $input ) );
	}
}


if ( ! function_exists( 'hotelgalaxy_blog_excerpt_sanitize' ) ) {
	
	function hotelgalaxy_blog_excerpt_sanitize( $input ) {
		
		$valid = array('full', 'excerpt' );

		
		return ( in_array( $input, $valid ) ) ? $input : 'full';
	}
}



function hotelgalaxy_hex2rgba($color, $opacity = false) {
	
	$default = 'rgb(0,0,0)';
	
	//Return default if no color provided
	if(empty($color))
		return $default; 
	
	//Sanitize $color if "#" is provided 
	if ($color[0] == '#' ) {
		$color = substr( $color, 1 );
	}
	
        //Check if color has 6 or 3 characters and get values
	if (strlen($color) == 6) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) == 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
		return $default;
	}
	
        //Convert hexadec to rgb
	$rgb =  array_map('hexdec', $hex);
	
        //Check if opacity is set(rgba or rgb)
	if($opacity){
		if(abs($opacity) > 1)
			$opacity = 1.0;
		$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
	} else {
		$output = 'rgb('.implode(",",$rgb).')';
	}
	
        //Return rgb(a) color string
	return $output;
}
?>