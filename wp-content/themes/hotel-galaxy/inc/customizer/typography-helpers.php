<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}


if ( ! function_exists( 'hotelgalaxy_all_google_fonts' ) ) {

	function hotelgalaxy_all_google_fonts( $amount = 'all' ) {


		$itmes = json_decode( hotelgalaxy_google_fonts() );

		$googlefonts = array();

		foreach ( $itmes as $font ) {			
			$atts = array(
				'name'     => $font->family,
				'category' => $font->category,
				'variants' => $font->variants,
			);

			
			$id = strtolower( str_replace( ' ', '_', $font->family ) );

			
			$googlefonts[ $id ] = $atts;
		}

		if ( $amount !== 'all' ) {

			$googlefonts = array_slice( $googlefonts, 0, $amount );
		}

		asort( $googlefonts );

		return apply_filters( 'hotelgalaxy_google_fonts_array', $googlefonts );

	}
}



if ( ! function_exists( 'hotelgalaxy_font_family_css' ) ) {
	
	function hotelgalaxy_font_family_css( $fontname, $option, $default_settings ) {

		$hotelgalaxy_settings = wp_parse_args(
			get_option( $option, array() ),
			$default_settings
		);

		$no_quotes = array(
			'inherit',
			'Arial, Helvetica, sans-serif',
			'Georgia, Times New Roman, Times, serif',
			'Helvetica',
			'Impact',
			'Segoe UI, Helvetica Neue, Helvetica, sans-serif',
			'Tahoma, Geneva, sans-serif',
			'Trebuchet MS, Helvetica, sans-serif',
			'Verdana, Geneva, sans-serif',
			apply_filters( 'hotelgalaxy_typography_system_stack', '-apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"' ),
		);

		$font_family = $hotelgalaxy_settings[ $fontname ];



		if (  $font_family == 'System Stack') {

			$system_stack = '-apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"';

			$font_family = apply_filters( 'hotelgalaxy_typography_system_stack', $system_stack );
		}

		if ( strpos( $font_family, ':' ) !== false ) {

			$font_family = current( explode( ':', $font_family ) );
		}

		if ( in_array( $font_family, $no_quotes ) ) {
			$wrapper_start = null;
			$wrapper_end = null;
		} else {
			$wrapper_start = '"';
			$wrapper_end = '"' . hotelgalaxy_get_font_category( $font_family, $fontname );
		}


		$output = ( 'inherit' == $font_family ) ? '' : $wrapper_start . $font_family . $wrapper_end;
		return $output;

	}

}

if ( ! function_exists( 'hotelgalaxy_get_font_variants' ) ) {

	function hotelgalaxy_get_font_variants( $font, $key = '' ) {

		if ( in_array( $font, hotelgalaxy_default_typography() ) ) {
			return;
		}

		if ( '' !== $key && get_theme_mod( $key . '_variants' ) ) {
			return get_theme_mod( $key . '_variants' );
		}

		$defaults = hotelgalaxy_default_fonts();


		if ( $defaults[ $key ] == $font ) {
			return $defaults[ $key . '_variants' ];
		}
		
		$fonts = hotelgalaxy_all_google_fonts();

		
		$id = strtolower( str_replace( ' ', '_', $font ) );

		
		if ( ! array_key_exists( $id, $fonts ) ) {
			return;
		}

		
		$variants = $fonts[ $id ]['variants'];

		
		$output = array();
		if ( $variants ) {
			foreach ( $variants as $variant ) {
				$output[] = $variant;
			}
			return implode( ',', apply_filters( 'hotelgalaxy_typography_variants', $output ) );
		}
	}
}



if ( ! function_exists( 'hotelgalaxy_get_font_category' ) ) {
	
	function hotelgalaxy_get_font_category( $font, $key = '' ) {
		
		if ( in_array( $font, hotelgalaxy_default_typography() ) ) {
			return;
		}

		
		if ( '' !== $key && get_theme_mod( $key . '_category' ) ) {
			return ', ' . get_theme_mod( $key . '_category' );
		}

		
		$defaults = hotelgalaxy_default_fonts();

		
		if ( $defaults[ $key ] == $font ) {
			return ', ' . $defaults[ $key . '_category' ];
		}

		
		$fonts = hotelgalaxy_all_google_fonts();

		
		$id = strtolower( str_replace( ' ', '_', $font ) );

		
		if ( ! array_key_exists( $id, $fonts ) ) {
			return;
		}

		
		$category = ! empty( $fonts[ $id ]['category'] ) ? ', ' . $fonts[ $id ]['category'] : '';

		
		return $category;

	}
}


if ( ! function_exists( 'hotelgalaxy_enqueue_google_fonts' ) ) {

	add_action( 'wp_enqueue_scripts', 'hotelgalaxy_enqueue_google_fonts', 0 );
	
	function hotelgalaxy_enqueue_google_fonts() {

		if ( is_admin() ) {
			return;
		}

		$hotelgalaxy_settings = wp_parse_args(
			get_option( 'hotel_galaxy_option', array() ),
			hotelgalaxy_default_fonts()
		);

		$default_typography = hotelgalaxy_default_typography();
		
		$not_google = str_replace( ' ', '+',  $default_typography);
		
		$font_id = array('body_font');

		$google_fonts = array();

		if ( ! empty( $font_id ) ) {

			foreach ( $font_id as $key ) {

				
				if ( ! isset( $hotelgalaxy_settings[ $key ] ) ) {
					continue;
				}

				
				if ( strpos( $hotelgalaxy_settings[ $key ], ':' ) !== false ) {

					$hotelgalaxy_settings[ $key ] = current( explode( ':', $hotelgalaxy_settings[ $key ] ) );
				}

				
				$value = str_replace( ' ', '+', $hotelgalaxy_settings[ $key ] );

				
				$variants = hotelgalaxy_get_font_variants( $hotelgalaxy_settings[ $key ], $key );

				
				$value = ! empty( $variants ) ? $value . ':' . $variants : $value;

				
				if ( ! in_array( $value, $google_fonts ) ) {
					$google_fonts[] = $value;
				}

			}

		}
		
		$google_fonts = array_diff( $google_fonts, $not_google );

		$google_fonts = implode( '|', $google_fonts );

		
		$google_fonts = apply_filters( 'hotelgalaxy_typography_google_fonts', $google_fonts );

		
		$subset = apply_filters( 'hotelgalaxy_fonts_subset','' );

		
		$font_args = array();
		$font_args['family'] = $google_fonts;
		if ( '' !== $subset ) {
			$font_args['subset'] = urlencode( $subset );
		}

		$display = apply_filters( 'hotelgalaxy_google_font_display', '' );

		if ( $display ) {
			$font_args['display'] = $display;
		}


		$fonts_url = add_query_arg( $font_args, '//fonts.googleapis.com/css' );

		if ( $google_fonts ) {

			wp_enqueue_style( 'hotelgalaxy-fonts', $fonts_url, array(), null, 'all' );
		}
	}
}
?>