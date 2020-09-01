<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'hotelgalaxy_widgets_init' ) ) {

	add_action( 'widgets_init', 'hotelgalaxy_widgets_init' );
	
	function hotelgalaxy_widgets_init() {

		register_sidebar( array(
			'name' => __( 'Home Services', 'hotel-galaxy'),
			'id' => 'home-services',
			'description' => __( 'Hotel galaxy Service area', 'hotel-galaxy'),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => ''
		) );
		

		register_sidebar( array(
			'name'          => __( 'Right Sidebar', 'hotel-galaxy'),
			'id'            => 'sidebar-primary',
			'before_widget' => '<aside id="%1$s" class="widget sidebar-widget %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></aside>',
			'before_title'  => apply_filters( 'hotelgalaxy_start_widget_title', '<h2 class="widget-title">' ),
			'after_title'   => apply_filters( 'hotelgalaxy_end_widget_title', '</h2>' ),
		) );


		register_sidebar( array(
			'name'          => __( 'Left Sidebar', 'hotel-galaxy'),
			'id'            => 'sidebar-left',
			'before_widget' => '<aside id="%1$s" class="widget sidebar-widget %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></aside>',
			'before_title'  => apply_filters( 'hotelgalaxy_start_widget_title', '<h2 class="widget-title">' ),
			'after_title'   => apply_filters( 'hotelgalaxy_end_widget_title', '</h2>' ),
		) );		

		register_sidebar( array(
			'name'          => __( 'Footer Widget', 'hotel-galaxy'),
			'id'            => 'footer-widget-area',
			'before_widget' => '<aside id="%1$s" class="widget footer-widget col-md-3 %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></aside>',
			'before_title'  => apply_filters( 'hotelgalaxy_start_widget_title', '<h2 class="widget-title">' ),
			'after_title'   => apply_filters( 'hotelgalaxy_end_widget_title', '</h2>' ),
		) );
	}
}



if ( ! function_exists( 'hotelgalaxy_construct_sidebars' ) ) {
	
	function hotelgalaxy_construct_sidebars() {

		$layout = hotelgalaxy_get_layout();

		$rs = array( 'right-sidebar', 'both-sidebars', 'both-right', 'both-left' );
		$ls = array( 'left-sidebar', 'both-sidebars', 'both-right', 'both-left' );
		
		if ( in_array( $layout, $ls ) ) {
			get_sidebar( 'left' );
		}

		if ( in_array( $layout, $rs ) ) {
			get_sidebar();
		}
	}

}

if ( ! function_exists( 'hotelgalaxy_get_layout' ) ) {
	
	function hotelgalaxy_get_layout() {
		$layout = hotelgalaxy_get_option( 'layout_setting' );

		if ( is_single() ) {
			$layout = hotelgalaxy_get_option( 'single_layout_setting' );
		}

		if ( is_singular() ) {
			$layout_meta = get_post_meta( get_the_ID(), '_generate-sidebar-layout-meta', true );

			if ( $layout_meta ) {
				$layout = $layout_meta;
			}
		}

		if ( is_home() || is_archive() || is_search() || is_tax() ) {
			$layout = hotelgalaxy_get_option( 'blog_layout_setting' );
		}

		return apply_filters( 'hotelgalaxy_sidebar_layout', $layout );
	}
}



?>