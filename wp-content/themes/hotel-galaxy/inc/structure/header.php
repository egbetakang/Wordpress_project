<?php 

if ( ! defined( 'ABSPATH' ) ) {	exit; }


if ( ! function_exists( 'hotelgalaxy_navigation_position' ) ) {

	add_action('hotelgalaxy_menu', 'hotelgalaxy_navigation_position');
	
	function hotelgalaxy_navigation_position() {

		$hotelgalaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), hotelgalaxy_get_default() ); 

		?>

		<nav class="navbar navbar-default main-navigation">

			<div class="navbar-header">

				<span class="navbar-brand">Menu</span>

				<?php do_action( 'hg_inside_mobile_header' ); ?>

				<button type="button" id="hg-mobile-menu-button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
					
						<span class="sr-only"><?php _e('Toggle navigation','hotel-galaxy'); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					
				</button>

				

			</div>

			<div class="collapse navbar-collapse" id="navbar">
				<?php 

				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class' => 'nav navbar-nav',
					'fallback_cb' => 'hotelgalaxy_fallback_page_menu::hotelgalaxy_fallbac',	
					'walker' => new hotelgalaxy_wp_bootstrap_navwalker()						
				));		

				?> 	

			</div>

		</nav>

		<?php
	}

}




if ( ! function_exists( 'hotelgalaxy_header_items' ) ) {

	add_action('hotelgalaxy_add_logo', 'hotelgalaxy_header_items');

	function hotelgalaxy_header_items() {

		$order = apply_filters( 'hotelgalaxy_header_items_order',
			array(
				'site-title',
				'logo',
			)
		);		

		foreach ( $order as $item ) {

			if ( 'site-title' === $item ) {
				hotelgalaxy_site_title_construct();
			}

			if ( 'logo' === $item ) {
				hotelgalaxy_logo_construct();
			}
		}

	}
}


if ( ! function_exists( 'hotelgalaxy_site_title_construct' ) ) {

	function hotelgalaxy_site_title_construct() {

		$hotelgalaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), hotelgalaxy_get_default() );


		$title = get_bloginfo( 'title' );
		$tagline = get_bloginfo( 'description' );

		$site_title = apply_filters( 'hotelgalaxy_site_title_output', sprintf(
			'<%1$s class="main-title" itemprop="headline">
			<a href="%2$s" rel="home">
			%3$s
			</a>
			</%1$s>',

			( is_front_page() && is_home() ) ? 'h1' : 'p',

			esc_url( apply_filters( 'hotelgalaxy_site_title_href', home_url( '/' ) ) ),

			get_bloginfo( 'name' )

		) );

		$site_tagline = apply_filters( 'hotelgalaxy_site_description_output', sprintf(
			'<p class="site-description" itemprop="description">
			%1$s
			</p>',
			html_entity_decode( get_bloginfo( 'description', 'display' ) )
		) );

		$show_title = $hotelgalaxy_settings['show_title'];


		$show_tagline = $hotelgalaxy_settings['show_tagline'];

			// ***

		if ( $show_title || $show_tagline ) {			

			echo apply_filters( 'hotelgalaxy_site_branding_output', sprintf( 
				'<div class="site-branding">
				%1$s
				%2$s
				</div>',
				( $show_title ) ? $site_title : '',
				( $show_tagline ) ? $site_tagline : ''
			) );

		}
	}
}


if ( ! function_exists( 'hotelgalaxy_logo_construct' ) ) {

	function hotelgalaxy_logo_construct() {

		$logo = ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'custom_logo' ) ) ? wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' ) : false;

		$logo_url = $logo[0];


		if ( empty( $logo_url ) ) {
			return;
		}

		$attr = apply_filters( 'hotelgalaxy_logo_attributes', array(
			'class' => 'header-image',

			'alt'	=> esc_attr( apply_filters( 'hotelgalaxy_logo_title', get_bloginfo( 'name', 'display' ) ) ),

			'src'	=> $logo_url,

			'title'	=> esc_attr( apply_filters( 'hotelgalaxy_logo_title', get_bloginfo( 'name', 'display' ) ) ),
		) );

		$attr = array_map( 'esc_attr', $attr );

		$html_attr = '';
		foreach ( $attr as $name => $value ) {
			$html_attr .= " $name=" . '"' . $value . '"';
		}

		echo apply_filters( 'hotelgalaxy_logo_output', sprintf( 
			'<div class="site-logo">
			<a href="%1$s" title="%2$s" rel="home">
			<img %3$s />
			</a>
			</div>',
			esc_url( apply_filters( 'hotelgalaxy_logo_href' , home_url( '/' ) ) ),
			esc_attr( apply_filters( 'hotelgalaxy_logo_title', get_bloginfo( 'name', 'display' ) ) ),
			$html_attr
		), $logo_url, $html_attr );

	}

}




?>