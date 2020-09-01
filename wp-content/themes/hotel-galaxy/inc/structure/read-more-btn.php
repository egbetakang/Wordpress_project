<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if ( ! function_exists( 'hotelgalaxy_excerpt_more' ) ) {

	add_filter( 'excerpt_more', 'hotelgalaxy_excerpt_more' );
	
	function hotelgalaxy_excerpt_more( $more ) {

		return apply_filters( 'hotelgalaxy_excerpt_more_output', 
			sprintf( '<footer><a title="%1$s" id="read-more" href="%2$s"><i class="icon"></i>%3$s</a></footer>',
				the_title_attribute( 'echo=0' ),

				esc_url( get_permalink( get_the_ID() ) ),
				__( 'Read More', 'hotel-galaxy')
			) );

	}
}

if ( ! function_exists( 'hotelgalaxy_show_excerpt' ) ) {
	
	function hotelgalaxy_show_excerpt() {

		global $post;

		
		$more_tag = apply_filters( 'hotelgalaxy_more_tag', strpos( $post->post_content, '<!--more-->' ) );

		$format = ( false !== get_post_format() ) ? get_post_format() : 'standard';

		$show_excerpt = ( 'excerpt' === hotelgalaxy_get_option( 'post_content' ) ) ? true : false;

		$show_excerpt = ( 'standard' !== $format ) ? false : $show_excerpt;

		$show_excerpt = ( $more_tag ) ? false : $show_excerpt;

		$show_excerpt = ( is_search() ) ? true : $show_excerpt;

		return apply_filters( 'hotelgalaxy_show_excerpt', $show_excerpt );
	}
}
?>