<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if ( ! function_exists( 'hotelgalaxy_header_image_css' ) ) {

	function hotelgalaxy_header_image_css() {

		$hotelgalaxy_settings = wp_parse_args(
			get_option( 'hotel_galaxy_option', array() ),
			hotelgalaxy_default_images()
		);

		$css = new HotelGalaxy_CSS;

		if(!defined('HG_PREMIUM_VERSION')){

			$css->set_selector('body');
			$css->add_property('background-image', 'url('. esc_url($hotelgalaxy_settings['body_background_image']).')');
			$css->add_property('background-repeat','no-repeat');
			$css->add_property('background-size','100% auto');
			$css->add_property('background-position','center top');
			$css->add_property('background-attachment','fixed');


			$css->set_selector('.site-header');

			$css->add_property('background-image', 'url('.esc_url($hotelgalaxy_settings['header_background_image']).')');
			$css->add_property('background-repeat','no-repeat');
			$css->add_property('background-size','100% auto');
			$css->add_property('background-position','center top');
			$css->add_property('background-attachment','fixed');			

			
		}		

		do_action( 'hotelgalaxy_header_image_css', $css );

		return apply_filters( 'hotelgalaxy_header_image_css_output', $css->css_output() );
	}
}

if ( ! function_exists( 'hotelgalaxy_base_css' ) ) {

	function hotelgalaxy_base_css() {

		$hotelgalaxy_settings = wp_parse_args(
			get_option( 'hotel_galaxy_option', array() ),
			hotelgalaxy_get_default()
		);

		$css = new HotelGalaxy_CSS;

		if ( hotelgalaxy_get_option( 'logo_width' ) ) {
			
			$css->set_selector( '.site-logo .header_logo' );
			
			$css->add_property( 'width', absint( hotelgalaxy_get_option( 'logo_width' ) ), false, 'px' );
		}

		if(!defined('HG_BACKGROUND_ADDON_VERSION')){

			$css->set_selector('#breadcrumb-section');
			$css->add_property('background-image', 'url('.esc_attr($hotelgalaxy_settings['page_title_bg']).')');
			$css->add_property('background-repeat','no-repeat');
			$css->add_property('background-size','100% auto');
			$css->add_property('background-position','center');
			$css->add_property('background-attachment','fixed');

		}		


		// navigation direction

		if( $hotelgalaxy_settings['nav_dropdown_direction'] == 'left'){
			
			$css->set_selector('#mastser-header .dropdown-menu');
			$css->add_property('left','unset');			
			$css->add_property('right','0.1',false,'px');			
		}
		
		// sticky navbar

		if( $hotelgalaxy_settings['sticky_menu'] == 'desktop' || $hotelgalaxy_settings['sticky_menu'] == 'mobile'){

			$css->start_media_query( hotelgalaxy_media_query( $hotelgalaxy_settings['sticky_menu'] ) );

			$css->set_selector ('.desktop_mobile_sticky');
			$css->add_property('position', 'fixed');
			$css->add_property('top', '0');
			$css->add_property('width', '100',false,'%');
			$css->add_property('z-index', '999999');

			$css->stop_media_query();

		}		


		// 	slider

		$css->set_selector('.carousel-caption');
		$css->add_property(' bottom', 'unset');
		$css->add_property(' top', '25%');

		if( $hotelgalaxy_settings['is_carousel_sideborder'] ){
			$css->add_property(' border-left', '8px solid');
			$css->add_property(' border-right', '8px solid');
		}

		if( !($hotelgalaxy_settings['is_carousel_background_overlay']) ){
			
			$css->add_property('background-color', 'unset');
			$css->add_property('border', 'unset');
		}




		do_action( 'hotelgalaxy_base_css', $css );

		return apply_filters( 'hotelgalaxy_base_css_output', $css->css_output() );

	}
}

if ( ! function_exists( 'hotelgalaxy_font_css' ) ) {
	
	function hotelgalaxy_font_css() {

		$default = hotelgalaxy_default_fonts();

		$hotelgalaxy_settings = wp_parse_args(
			get_option( 'hotel_galaxy_option', array() ),
			$default
		);

		$css = new HotelGalaxy_CSS;

		$body_family = hotelgalaxy_font_family_css('body_font', 'hotel_galaxy_option', $default );

		$site_title_family = hotelgalaxy_font_family_css('site_title_font', 'hotel_galaxy_option', $default );

		$site_tagline_family = hotelgalaxy_font_family_css('site_tagline_font', 'hotel_galaxy_option', $default );
		

		$h1_family = hotelgalaxy_font_family_css('h1_font', 'hotel_galaxy_option',$default );

		$h2_family = hotelgalaxy_font_family_css('h2_font', 'hotel_galaxy_option', $default );

		$h3_family = hotelgalaxy_font_family_css('h3_font', 'hotel_galaxy_option', $default );

		$h4_family = hotelgalaxy_font_family_css('h4_font', 'hotel_galaxy_option', $default );


		$h5_family = hotelgalaxy_font_family_css('h5_font', 'hotel_galaxy_option', $default );

		$h6_family = hotelgalaxy_font_family_css('h6_font', 'hotel_galaxy_option', $default );

		$slider_title_family = hotelgalaxy_font_family_css('slider_title_font', 'hotel_galaxy_option', $default );

		$slider_description_family = hotelgalaxy_font_family_css('slider_description_font', 'hotel_galaxy_option', $default );

		$service_widget_title_family = hotelgalaxy_font_family_css('service_widget_title_font', 'hotel_galaxy_option', $default );

		$service_widget_description_family = hotelgalaxy_font_family_css('service_widget_description_font', 'hotel_galaxy_option', $default );

		$button_family = hotelgalaxy_font_family_css('buttons_font', 'hotel_galaxy_option', $default );

		$widget_title_family = hotelgalaxy_font_family_css('widgets_title_font', 'hotel_galaxy_option', $default );

		$footer_family = hotelgalaxy_font_family_css('footer_font', 'hotel_galaxy_option', $default );

		$primary_navigation_family = hotelgalaxy_font_family_css('navigation_font', 'hotel_galaxy_option', $default );

		$breadcrum_family = hotelgalaxy_font_family_css('breadcrum_font', 'hotel_galaxy_option', $default );

		$infobar_family = hotelgalaxy_font_family_css('infobar_font', 'hotel_galaxy_option', $default );

		$home_headers_family = hotelgalaxy_font_family_css('home_headers_font', 'hotel_galaxy_option', $default );

		$home_description_family = hotelgalaxy_font_family_css('home_description_font', 'hotel_galaxy_option', $default );

		$icon_callout_family = hotelgalaxy_font_family_css('icon_callout_font', 'hotel_galaxy_option', $default );

		// 
		$css->set_selector( 'body, button, input, select, textarea' );
		$css->add_property( 'font-family', $body_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['body_font_weight'] ), $default['body_font_weight'] );
		$css->add_property( 'text-transform', esc_attr( $hotelgalaxy_settings['body_font_transform'] ), $default['body_font_transform'] );
		$css->add_property( 'font-size', absint( $hotelgalaxy_settings['body_font_size'] ), absint($default['body_font_size']), 'px' );

		// 
		$css->set_selector( 'body' );
		$css->add_property( 'line-height', floatval( $hotelgalaxy_settings['body_line_height'] ), $default['body_line_height'] );

		$css->set_selector( 'p' );
		$css->add_property( 'margin-bottom', floatval( $hotelgalaxy_settings['paragraph_margin'] ), $default['paragraph_margin'], 'em' );


		// 
		$css->set_selector( '.main-title' );
		$css->add_property( 'font-family', $site_title_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['site_title_font_weight'] ), $default['site_title_font_weight'] );
		$css->add_property( 'text-transform', esc_attr( $hotelgalaxy_settings['site_title_font_transform'] ), $default['site_title_font_transform'] );
		$css->add_property( 'font-size', absint( $hotelgalaxy_settings['site_title_font_size'] ), absint($default['site_title_font_size']), 'px' );

		// 
		$css->set_selector( '.site-description' );
		$css->add_property( 'font-family', $site_tagline_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['site_tagline_font_weight'] ), $default['site_tagline_font_weight'] );
		$css->add_property( 'text-transform', esc_attr( $hotelgalaxy_settings['site_tagline_font_transform'] ), $default['site_tagline_font_transform'] );
		$css->add_property( 'font-size', absint( $hotelgalaxy_settings['site_tagline_font_size'] ), absint($default['site_tagline_font_size']), 'px' );
		
		// 
		$css->set_selector( 'h1' );
		$css->add_property( 'font-family', $h1_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['h1_weight'] ), $default['h1_weight']);
		$css->add_property( 'text-transform', esc_attr( $hotelgalaxy_settings['h1_transform'] ), $default['h1_transform'] );
		$css->add_property( 'font-size', absint( $hotelgalaxy_settings['h1_font_size'] ), absint($default['h1_font_size']), 'px' );
		$css->add_property( 'line-height', floatval( $hotelgalaxy_settings['h1_line_height'] ), floatval($default['h1_line_height']), 'em' );
		$css->add_property( 'margin-bottom', floatval( $hotelgalaxy_settings['h1_margin_bottom'] ), floatval($default['h1_margin_bottom']), 'px' );
		// 
		$css->set_selector( 'h2' );
		$css->add_property( 'font-family', $h2_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['h2_weight'] ), $default['h2_weight']);
		$css->add_property( 'text-transform', esc_attr( $hotelgalaxy_settings['h2_transform'] ), $default['h2_transform'] );
		$css->add_property( 'font-size', absint( $hotelgalaxy_settings['h2_font_size'] ), absint($default['h2_font_size']), 'px' );
		$css->add_property( 'line-height', floatval( $hotelgalaxy_settings['h2_line_height'] ), floatval($default['h2_line_height']), 'em' );
		$css->add_property( 'margin-bottom', floatval( $hotelgalaxy_settings['h2_margin_bottom'] ), floatval($default['h2_margin_bottom']), 'px' );
		// 
		$css->set_selector( 'h3' );
		$css->add_property( 'font-family', $h3_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['h3_weight'] ), $default['h3_weight']);
		$css->add_property( 'text-transform', esc_attr( $hotelgalaxy_settings['h3_transform'] ), $default['h3_transform'] );
		$css->add_property( 'font-size', absint( $hotelgalaxy_settings['h3_font_size'] ), absint($default['h3_font_size']), 'px' );
		$css->add_property( 'line-height', floatval( $hotelgalaxy_settings['h3_line_height'] ), floatval($default['h3_line_height']), 'em' );
		$css->add_property( 'margin-bottom', floatval( $hotelgalaxy_settings['h3_margin_bottom'] ), floatval($default['h3_margin_bottom']), 'px' );
		
		// 
		$css->set_selector( 'h4' );
		$css->add_property( 'font-family', $h4_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['h4_weight'] ), $default['h4_weight']);
		$css->add_property( 'text-transform', esc_attr( $hotelgalaxy_settings['h4_transform'] ), $default['h4_transform'] );
		$css->add_property( 'font-size', absint( $hotelgalaxy_settings['h4_font_size'] ), absint($default['h4_font_size']), 'px' );
		$css->add_property( 'line-height', floatval( $hotelgalaxy_settings['h4_line_height'] ), floatval($default['h4_line_height']), 'em' );
		$css->add_property( 'margin-bottom', floatval( $hotelgalaxy_settings['h4_margin_bottom'] ), floatval($default['h4_margin_bottom']), 'px' );


		// 
		$css->set_selector( 'h5' );
		$css->add_property( 'font-family', $h5_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['h5_weight'] ), $default['h5_weight']);
		$css->add_property( 'text-transform', esc_attr( $hotelgalaxy_settings['h5_transform'] ), $default['h5_transform'] );
		$css->add_property( 'font-size', absint( $hotelgalaxy_settings['h5_font_size'] ), absint($default['h5_font_size']), 'px' );
		$css->add_property( 'line-height', floatval( $hotelgalaxy_settings['h5_line_height'] ), floatval($default['h5_line_height']), 'em' );
		$css->add_property( 'margin-bottom', floatval( $hotelgalaxy_settings['h5_margin_bottom'] ), floatval($default['h5_margin_bottom']), 'px' );


		// 
		$css->set_selector( 'h6' );
		$css->add_property( 'font-family', $h6_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['h6_weight'] ), $default['h6_weight']);
		$css->add_property( 'text-transform', esc_attr( $hotelgalaxy_settings['h6_transform'] ), $default['h6_transform'] );
		$css->add_property( 'font-size', absint( $hotelgalaxy_settings['h6_font_size'] ), absint($default['h6_font_size']), 'px' );
		$css->add_property( 'line-height', floatval( $hotelgalaxy_settings['h6_line_height'] ), floatval($default['h6_line_height']), 'em' );
		$css->add_property( 'margin-bottom', floatval( $hotelgalaxy_settings['h6_margin_bottom'] ), floatval($default['h6_margin_bottom']), 'px' );

		// heading on mobile device
		$css->start_media_query( hotelgalaxy_media_query( 'mobile' ) );

		$css->set_selector ('.main-title');
		$css->add_property('font-size', absint($hotelgalaxy_settings['mobile_site_title_font_size']), absint($default['mobile_site_title_font_size']), 'px');

		$css->set_selector ('h1');
		$css->add_property('font-size', absint($hotelgalaxy_settings['mobile_h1_font_size']), absint($default['mobile_h1_font_size']), 'px');

		$css->set_selector ('h2');
		$css->add_property('font-size', absint($hotelgalaxy_settings['mobile_h2_font_size']), absint($default['mobile_h2_font_size']), 'px');

		$css->stop_media_query();

		// 
		$css->set_selector( 'a#read-more,button:not(.menu-toggle),html input[type="button"],input[type="reset"],input[type="submit"],.button,.button:visited,.wp-block-button .wp-block-button__link' );
		$css->add_property( 'font-family', $button_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['buttons_font_weight'] ), $default['buttons_font_weight'] );
		$css->add_property( 'text-transform', esc_attr( $hotelgalaxy_settings['buttons_font_transform'] ), $default['buttons_font_transform'] );
		$css->add_property( 'font-size', absint( $hotelgalaxy_settings['buttons_font_size'] ), absint($default['buttons_font_size']), 'px' );
		// 

		$css->set_selector( '.widget-title' );
		$css->add_property( 'font-family', $widget_title_family);

		$css->add_property( 'font-weight', esc_attr($hotelgalaxy_settings['widgets_title_font_weight'] ), $default['widgets_title_font_weight']);

		$css->add_property( 'text-transform', esc_attr( $hotelgalaxy_settings['widgets_title_font_transform']), $default['widgets_title_font_transform']);
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['widgets_title_font_size'] ), absint($default['widgets_title_font_size']), 'px' );
		$css->add_property( 'margin-bottom', absint($hotelgalaxy_settings['widgets_title_separator'] ), absint($default['widgets_title_separator']), 'px' );

		//widget content
		$css->set_selector( '.widget' );
		$css->add_property( 'font-size', absint( $hotelgalaxy_settings['widgets_content_font_size'] ), absint($default['widgets_content_font_size']), 'px' );

		// footer 
		$css->set_selector( '.copyright-bar' );
		$css->add_property( 'font-family', $footer_family);
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['footer_font_weight']), $default['footer_font_weight']);
		$css->add_property( 'text-transform', esc_attr($hotelgalaxy_settings['footer_font_transform'] ), $default['footer_font_transform']);
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['footer_font_size'] ), absint($default['footer_font_size']), 'px' );


		// primary navigation
		$css->set_selector('#mastser-header .navbar-nav > li > a');
		$css->add_property( 'font-family', $primary_navigation_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['navigation_font_weight']), $default['navigation_font_weight']);
		$css->add_property( 'text-transform', esc_attr($hotelgalaxy_settings['navigation_font_transform'] ), $default['navigation_font_transform']);
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['navigation_font_size'] ), absint($default['navigation_font_size']), 'px' );

		$css->start_media_query( hotelgalaxy_media_query( 'mobile' ) );

		$css->set_selector('#mastser-header .navbar-nav > li > a');
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['mobile_navigation_font_size'] ), absint($default['mobile_navigation_font_size']), 'px' );

		$css->stop_media_query();


		// slider
		$css->set_selector( '.carousel-caption h2' );
		$css->add_property( 'font-family', $slider_title_family);
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['slider_title_font_weight']), $default['slider_title_font_weight']);
		$css->add_property( 'text-transform', esc_attr($hotelgalaxy_settings['slider_title_font_transform'] ), $default['slider_title_font_transform']);
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['slider_title_font_size'] ), absint($default['slider_title_font_size']), 'px' );
		$css->add_property( 'line-height', absint($hotelgalaxy_settings['slider_title_line_height'] ), absint($default['slider_title_line_height']), 'px' );

		$css->start_media_query( hotelgalaxy_media_query( 'mobile' ) );
		$css->set_selector ('.carousel-caption h2');
		$css->add_property('font-size', absint($hotelgalaxy_settings['mobile_slider_title_font_size']), absint($default['mobile_slider_title_font_size']), 'px');

		$css->stop_media_query();


		// slider
		$css->set_selector( '.carousel-caption p' );
		$css->add_property( 'font-family', $slider_description_family);
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['slider_description_font_weight']), $default['slider_description_font_weight']);
		$css->add_property( 'text-transform', esc_attr($hotelgalaxy_settings['slider_description_font_transform'] ), $default['slider_description_font_transform']);
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['slider_description_font_size'] ), absint($default['slider_description_font_size']), 'px' );

		if ( '' !== $hotelgalaxy_settings['slider_description_line_height'] ) {
			$css->add_property( 'line-height', floatval($hotelgalaxy_settings['slider_description_line_height'] ), $default['slider_description_line_height'], 'em' );
		}

		$css->start_media_query( hotelgalaxy_media_query( 'mobile' ) );
		$css->set_selector ('.carousel-caption p');
		$css->add_property('font-size', absint($hotelgalaxy_settings['mobile_slider_description_font_size']), absint($default['mobile_slider_description_font_size']), 'px');

		$css->stop_media_query();

		// service widget icon

		$css->set_selector( '#main-home-service .service-widget-item .service-icon i' );
		$css->add_property('font-size', absint($hotelgalaxy_settings['service_widget_icon_size']), absint($default['service_widget_icon_size']), 'px');

		$css->start_media_query( hotelgalaxy_media_query( 'mobile' ) );
		$css->set_selector ('#main-home-service .service-widget-item .service-icon i');
		$css->add_property('font-size', absint($hotelgalaxy_settings['mobile_service_widget_icon_size']), absint($default['mobile_service_widget_icon_size']), 'px');

		$css->stop_media_query();

		// service widget
		$css->set_selector( '#main-home-service .service-title' );
		$css->add_property( 'font-family', $service_widget_title_family);
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['service_widget_title_font_weight']), $default['service_widget_title_font_weight']);
		$css->add_property( 'text-transform', esc_attr($hotelgalaxy_settings['service_widget_title_font_transform'] ), $default['service_widget_title_font_transform']);
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['service_widget_title_font_size'] ), absint($default['service_widget_title_font_size']), 'px' );

		$css->add_property( 'line-height', floatval($hotelgalaxy_settings['service_widget_title_line_height'] ), $default['service_widget_title_line_height'], 'em' );

		$css->start_media_query( hotelgalaxy_media_query( 'mobile' ) );
		$css->set_selector ('#main-home-service .service-title');
		$css->add_property('font-size', absint($hotelgalaxy_settings['mobile_service_widget_title_font_size']), absint($default['mobile_service_widget_title_font_size']), 'px');

		$css->stop_media_query();

		// service widget description
		$css->set_selector( '#main-home-service .service-widget-item p' );
		$css->add_property( 'font-family', $service_widget_description_family);
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['service_widget_description_font_weight']), $default['service_widget_description_font_weight']);
		$css->add_property( 'text-transform', esc_attr($hotelgalaxy_settings['service_widget_description_font_transform'] ), $default['service_widget_description_font_transform']);
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['service_widget_description_font_size'] ), absint($default['service_widget_description_font_size']), 'px' );

		$css->add_property( 'line-height', floatval($hotelgalaxy_settings['service_widget_description_line_height'] ), $default['service_widget_description_line_height'], 'em' );

		$css->start_media_query( hotelgalaxy_media_query( 'mobile' ) );
		$css->set_selector ('#main-home-service .service-title');
		$css->add_property('font-size', absint($hotelgalaxy_settings['mobile_service_widget_description_font_size']), absint($default['mobile_service_widget_description_font_size']), 'px');

		$css->stop_media_query();


		// breadcrums

		$css->set_selector('#breadcrumb-section .breadcrumb-header');
		$css->add_property( 'font-family', $breadcrum_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['breadcrum_font_weight']), $default['breadcrum_font_weight']);
		$css->add_property( 'text-transform', esc_attr($hotelgalaxy_settings['breadcrum_font_transform'] ), $default['breadcrum_font_transform']);
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['breadcrum_font_size'] ), absint($default['breadcrum_font_size']), 'px' );

		$css->start_media_query( hotelgalaxy_media_query( 'mobile' ) );

		$css->set_selector('#breadcrumb-section .breadcrumb-header');
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['mobile_breadcrum_font_size'] ), absint($default['mobile_breadcrum_font_size']), 'px' );

		$css->stop_media_query();

		// info bar

		$css->set_selector('.info-bar .info-bar-inner');
		$css->add_property( 'font-family', $infobar_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['infobar_font_weight']), $default['infobar_font_weight']);
		$css->add_property( 'text-transform', esc_attr($hotelgalaxy_settings['infobar_font_transform'] ), $default['infobar_font_transform']);
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['infobar_font_size'] ), absint($default['infobar_font_size']), 'px' );

		$css->start_media_query( hotelgalaxy_media_query( 'mobile' ) );
		
		$css->set_selector('.info-bar .info-bar-inner');
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['mobile_infobar_font_size'] ), absint($default['mobile_infobar_font_size']), 'px' );

		$css->stop_media_query();

		// social icon size
		$css->set_selector('.info-bar .user-social .social-icon i');
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['infobar_social_icon_size'] ), absint( $default['infobar_social_icon_size'] ), 'px' );

		$css->start_media_query( hotelgalaxy_media_query( 'mobile' ) );
		
		$css->set_selector('.info-bar .user-social .social-icon i');
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['mobile_infobar_social_icon_size'] ), absint($default['mobile_infobar_social_icon_size']), 'px' );

		$css->stop_media_query();

		// home section header
		$css->set_selector('.home-section .entry-header h2');
		$css->add_property( 'font-family', $home_headers_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['home_headers_font_weight']), $default['home_headers_font_weight']);
		$css->add_property( 'text-transform', esc_attr($hotelgalaxy_settings['home_headers_font_transform'] ), $default['home_headers_font_transform']);
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['home_headers_font_size'] ), absint($default['home_headers_font_size']), 'px' );		

		// home section description
		$css->set_selector('.home-section .entry-header p');
		$css->add_property( 'font-family', $home_description_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['home_description_font_weight']), $default['home_description_font_weight']);
		$css->add_property( 'text-transform', esc_attr($hotelgalaxy_settings['home_description_font_transform'] ), $default['home_description_font_transform']);
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['home_description_font_size'] ), absint($default['home_description_font_size']), 'px' );

		$css->start_media_query( hotelgalaxy_media_query( 'mobile' ) );

		$css->set_selector('.home-section .entry-header h2');
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['mobile_home_headers_font_size'] ), absint($default['mobile_home_headers_font_size']), 'px' );
		
		$css->set_selector('.home-section .entry-header p');
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['mobile_home_description_font_size'] ), absint($default['mobile_home_description_font_size']), 'px' );

		$css->stop_media_query();

		// icon callout

		$css->set_selector('.icon-callout-area .icon-callout-inner-title');
		$css->add_property( 'font-family', $breadcrum_family );
		$css->add_property( 'font-weight', esc_attr( $hotelgalaxy_settings['icon_callout_font_weight']), $default['icon_callout_font_weight']);
		$css->add_property( 'text-transform', esc_attr($hotelgalaxy_settings['icon_callout_font_transform'] ), $default['icon_callout_font_transform']);
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['icon_callout_font_size'] ), absint($default['icon_callout_font_size']), 'px' );

		$css->start_media_query( hotelgalaxy_media_query( 'mobile' ) );

		$css->set_selector('.icon-callout-area .icon-callout-inner-title');
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['mobile_icon_callout_font_size'] ), absint($default['mobile_icon_callout_font_size']), 'px' );

		$css->stop_media_query();

		//icon size
		$css->set_selector('.icon-callout-area .icon-callout-inner-icon');
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['icon_callout_icon_size'] ), absint($default['icon_callout_icon_size']), 'px' );

		$css->set_selector('.icon-callout-area .icon-callout-inner-icon');
		$css->add_property( 'font-size', absint($hotelgalaxy_settings['mobile_icon_callout_icon_size'] ), absint($default['mobile_icon_callout_icon_size']), 'px' );

		$css->stop_media_query();


		do_action( 'hotelgalaxy_font_css', $css );

		return apply_filters( 'hotelgalaxy_font_css_output', $css->css_output() );

	}
}


if ( ! function_exists( 'hotelgalaxy_color_css' ) ) {
	
	function hotelgalaxy_color_css() {

		$hotelgalaxy_settings = wp_parse_args(
			get_option( 'hotel_galaxy_option', array() ),
			hotelgalaxy_color_defaults()
		);

		$css = new HotelGalaxy_CSS;

		$css->set_selector('body');
		$css->set_selector('#hg-wrapper');
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['body_background_color']));	

		$css->set_selector('body, caption');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['text_color']));		

		$css->set_selector( 'a, a:visited' );
		$css->add_property( 'color',  esc_attr($hotelgalaxy_settings['link_color']));

		$css->set_selector('a:visited')->add_property('color', esc_attr($hotelgalaxy_settings['link_color_visited']));		

		$css->set_selector('a:hover, a:focus, a:active');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['link_color_hover']));

		$css->set_selector('.entry-title a, .entry-title a:visited');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['blog_post_title_color']));

		$css->set_selector('.entry-title a:hover');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['blog_post_title_hover_color']));

		$css->set_selector( '.entry-meta' );
		$css->add_property( 'color', esc_attr( $hotelgalaxy_settings['entry_meta_text_color'] ) );

		$css->set_selector('.entry-meta a,.entry-meta a:visited');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['entry_meta_link_color']));

		$css->set_selector( '.entry-meta a:hover' );
		$css->add_property( 'color', esc_attr( $hotelgalaxy_settings['entry_meta_link_color_hover'] ) );


		$css->set_selector('a#read-more');		
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['readmore_background_color']));
		$css->add_property('border-color', esc_attr($hotelgalaxy_settings['readmore_background_color']));
		

		$css->set_selector('.scroll-top');		
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['back_to_top_background_color']));

		$css->set_selector('.scroll-top:hover');		
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['back_to_top_background_hover_color']));

		$css->set_selector('.scroll-top i');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['back_to_top_text_color']));

		$css->set_selector('.scroll-top i:hover');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['back_to_top_text_hover_color']));

		// button color
		$css->set_selector('.button, button, html input[type=button], input[type=reset], input[type=submit]');
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['button_background_color']));	

		$css->set_selector('blockquote');
		$css->add_property('border-color', '#3a3a3a');

		$css->set_selector('.footer-info');
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['footer_background_color']));

		$css->set_selector('.copyright-bar');
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['footer_bar_background_color']));		

		$css->set_selector('.paging-navigation .nav-links span');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['pagination_text_color_visited']));
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['pagination_color']));

		$css->set_selector('.paging-navigation .nav-links a');
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['pagination_background_color']));
		$css->add_property('color', esc_attr($hotelgalaxy_settings['pagination_color']));

		$css->set_selector('.paging-navigation .nav-links a:hover');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['pagination_text_hover_color']));
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['pagination_color']));		

		// siderbar 
		$css->set_selector('.sidebar-widget');
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['sidebar_widget_background_color']));

		$css->set_selector('.sidebar-widget .widget-title');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['sidebar_widget_title_color']));

		$css->set_selector('.sidebar-widget');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['sidebar_widget_text_color']));

		$css->set_selector('.sidebar-widget a,.sidebar-widget a:visited');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['sidebar_widget_link_color']));

		$css->set_selector('.sidebar-widget a:hover');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['sidebar_widget_link_hover_color']));

		// footer icon bar
		$css->set_selector('.icon-callout-area');
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['footer_icon_bar_background_color']));

		$css->set_selector('.icon-callout-area .icon-callout-inner-icon i');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['footer_icon_bar_icon_color']));	

		$css->set_selector('.icon-callout-area .icon-callout-inner-title');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['footer_icon_bar_title_color']));		

		// footer widget

		$css->set_selector('.footer-widget .widget-inner, .footer-widget .widget-inner caption');
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['footer_widget_background_color']));		
		$css->add_property('color', esc_attr($hotelgalaxy_settings['footer_widget_text_color']));

		$css->set_selector('.footer-widget .widget-inner .widget-title');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['footer_widget_title_color']));

		$css->set_selector('.footer-widget .widget-inner a,.footer-widget .widget-inner a:visited');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['footer_widget_link_color']));


		$css->set_selector('.footer-widget .widget-inner a:hover');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['footer_widget_link_hover_color']));		

		$css->set_selector('.footer-widget .widget-title:after');
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['footer_widget_title_underline_color']));		

		// sidebar
		$css->set_selector('.sidebar-widget');
		$css->add_property('border-top', '2px solid');
		$css->add_property('border-top-color', esc_attr($hotelgalaxy_settings['sidebar_widget_top_border_color']));

		$css->set_selector('.sidebar-widget .tagcloud .tag-cloud-link');
		$css->add_property('border-color', esc_attr($hotelgalaxy_settings['sidebar_tag_color']));
		$css->add_property('color', esc_attr($hotelgalaxy_settings['sidebar_tag_color']));

		$css->set_selector('.tagcloud .tag-cloud-link:hover');
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['sidebar_tag_color']));
		$css->add_property('border-color', esc_attr($hotelgalaxy_settings['sidebar_tag_color']));

		$css->set_selector('.info-bar');
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['infobar_background_color']));		

		$css->set_selector('.site-header');
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['header_background_color']));
		
		$css->set_selector('.main-title a');
		$css->add_property('color',  esc_attr($hotelgalaxy_settings['site_title_color']));

		$css->set_selector('.site-description');
		$css->add_property('color',  esc_attr($hotelgalaxy_settings['site_tagline_color']));
		

		// master navbar

		$css->set_selector('#mastser-header .navbar');
		$css->add_property('color','#ffffff');
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['navigation_background_color']));



		$css->set_selector('#mastser-header .navbar-default .navbar-toggle:hover, #mastser-header .navbar-default .navbar-toggle:focus');
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['navigation_background_hover_color']));
		$css->add_property('border-color', esc_attr($hotelgalaxy_settings['navigation_background_hover_color']));

		
		$css->set_selector('#mastser-header .navbar-nav > li > a, .main-navigation .mobile-bar-items a, #mastser-header .navbar-brand, #mastser-header .navbar-default .navbar-toggle .icon-bar');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['navigation_text_color']));
		
		
		
		$css->set_selector('.navbar-default .navbar-toggle');
		$css->add_property('border-color', esc_attr($hotelgalaxy_settings['navigation_text_color']));

		$css->set_selector('#mastser-header .navbar-default .navbar-toggle .icon-bar');
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['navigation_text_color']));

		// current text
		$css->set_selector('#mastser-header .navbar-nav > .active > a');
		$css->add_property('color', esc_attr($hotelgalaxy_settings['navigation_text_current_color']));
		$css->add_property('background-color', esc_attr($hotelgalaxy_settings['navigation_background_current_color']));

		$css->set_selector('#mastser-header .navbar-default .navbar-nav > .open > a,
		#mastser-header .navbar-default .navbar-nav > .open > a:hover, 
		#mastser-header .navbar-default .navbar-nav > .open > a:focus,
		#mastser-header .navbar-nav > li > a:hover');

			$css->add_property('background-color', esc_attr($hotelgalaxy_settings['navigation_background_hover_color']));

			$css->add_property('color', esc_attr($hotelgalaxy_settings['navigation_text_hover_color']));

			$css->set_selector('#mastser-header .dropdown-menu');
			$css->add_property('background-color', esc_attr($hotelgalaxy_settings['subnavigation_background_color']));

			// sub menu current text color
			$css->set_selector('#mastser-header .navbar-nav .dropdown-menu > .active > a');
			$css->add_property('color', esc_attr($hotelgalaxy_settings['subnavigation_text_current_color']));

			$css->add_property('background-color', esc_attr($hotelgalaxy_settings['subnavigation_background_current_color']));

			// submenu text color			

			$css->set_selector('#mastser-header .navbar-nav .dropdown-menu li a');
			$css->add_property('color', esc_attr($hotelgalaxy_settings['subnavigation_text_color']));		
			

			// sub menu colors
			$css->set_selector('#mastser-header .dropdown-menu > li > a:hover, #mastser-header .dropdown-menu > li > a:focus');
			$css->add_property('color', esc_attr($hotelgalaxy_settings['subnavigation_text_hover_color']));
			$css->add_property('background-color', esc_attr($hotelgalaxy_settings['subnavigation_background_hover_color']));	 
			

		// main carousel			

			$css->set_selector('.carousel-caption');
			$css->add_property(' border-color', esc_attr($hotelgalaxy_settings['carousel_caption_border_color']));

			// slider title color
			$css->set_selector('.carousel-caption h2');
			$css->add_property(' color', esc_attr($hotelgalaxy_settings['home_slider_title_color']));

			// slider description color
			$css->set_selector('.carousel-caption p');
			$css->add_property(' color', esc_attr($hotelgalaxy_settings['home_slider_description_color']));
			

			// homepage colors

			$css->set_selector( '.entry-header .bar' );
			$css->add_property( 'background-color', esc_attr( $hotelgalaxy_settings['seprator_color'] ) );

			$css->set_selector( '.entry-header .bar:before' );
			$css->add_property( 'background-color', esc_attr( $hotelgalaxy_settings['seprator_color_before'] ) );

			$css->set_selector('#main-home-service .entry-header h2');		
			$css->add_property('color', esc_attr($hotelgalaxy_settings['home_service_header_title_color']));

			$css->set_selector('#main-home-service .entry-header p');
			$css->add_property('color', esc_attr($hotelgalaxy_settings['home_service_header_description_color']));


			$css->set_selector('#main-home-room .entry-header h2');		
			$css->add_property('color', esc_attr($hotelgalaxy_settings['home_room_header_title_color']));

			$css->set_selector('#main-home-room .entry-header p');
			$css->add_property('color', esc_attr($hotelgalaxy_settings['home_room_header_description_color']));


			

			$css->set_selector('#main-home-room #read-more');
			$css->add_property('color', esc_attr($hotelgalaxy_settings['home_room_button_color']));
			$css->add_property('background-color', esc_attr($hotelgalaxy_settings['home_room_button_background_color']));
			$css->add_property('border-color', esc_attr($hotelgalaxy_settings['home_room_button_background_color']));			

			$css->set_selector('#main-home-room a#read-more:hover');
			$css->add_property('color', esc_attr($hotelgalaxy_settings['home_room_button_hover_color']));
			$css->add_property('background-color', esc_attr($hotelgalaxy_settings['home_room_button_hover_background_color']));
			$css->add_property('border-color', esc_attr($hotelgalaxy_settings['home_room_button_hover_background_color']));		
			

			$css->set_selector('#main-home-blog .entry-header h2');		
			$css->add_property('color', esc_attr($hotelgalaxy_settings['home_blog_header_title_color']));

			$css->set_selector('#main-home-blog .entry-header p');
			$css->add_property('color', esc_attr($hotelgalaxy_settings['home_blog_header_description_color']));

			$css->set_selector('#main-home-shortcode .entry-header h2');		
			$css->add_property('color', esc_attr($hotelgalaxy_settings['home_shortcode_header_title_color']));

			$css->set_selector('#main-home-shortcode .entry-header p');
			$css->add_property('color', esc_attr($hotelgalaxy_settings['home_shortcode_header_description_color']));

			$css->set_selector('.date-overlay');
			$css->add_property('background-color', esc_attr($hotelgalaxy_settings['theme_color']));	

			// home blog
			$css->set_selector( '#main-home-blog .overlay' );
			$css->add_property( 'background-color', esc_attr( $hotelgalaxy_settings['home_blog_background_color'] ) );

			// home room
			$css->set_selector( '#main-home-room .overlay' );
			$css->add_property( 'background-color', esc_attr( $hotelgalaxy_settings['home_room_background_color'] ) );

			// home service
			$css->set_selector( '#main-home-service .overlay' );
			$css->add_property( 'background-color', esc_attr( $hotelgalaxy_settings['home_service_background_color'] ) );

			// home shortcode
			$css->set_selector( '#main-home-shortcode .overlay' );
			$css->add_property( 'background-color', esc_attr( $hotelgalaxy_settings['home_shortcode_background_color'] ) );

			do_action( 'hotelgalaxy_colors_css', $css );

			return apply_filters( 'hotelgalaxy_colors_css_output', $css->css_output() );

		}
	}


	add_action( 'wp_enqueue_scripts', 'hotelgalaxy_enqueue_dynamic_css', 50 );

	function hotelgalaxy_enqueue_dynamic_css(){

		if ( ! get_option( 'hotelgalaxy_dynamic_css_output', false ) || is_customize_preview() || apply_filters( 'hotelgalaxy_dynamic_css_skip_cache', false ) ) {

			$css = hotelgalaxy_header_image_css(). hotelgalaxy_base_css() . hotelgalaxy_font_css() . hotelgalaxy_color_css();

		} else {

			$css = get_option( 'hotelgalaxy_dynamic_css_output' ) . '/* End cached CSS */';
		}

		$css = $css . hotelgalaxy_no_cache_dynamic_css() . hotelgalaxy_do_icon_css();

		wp_add_inline_style( 'hotelgalaxy_style', $css );
	}

	add_action( 'customize_save_after', 'hotelgalaxy_update_dynamic_css_cache' );

	function hotelgalaxy_update_dynamic_css_cache() {

		if ( apply_filters( 'hotelgalaxy_dynamic_css_skip_cache', false ) ) {
			return;
		}

		$css = hotelgalaxy_header_image_css(). hotelgalaxy_base_css() . hotelgalaxy_font_css() . hotelgalaxy_color_css();

		update_option( 'hotelgalaxy_dynamic_css_output', $css );
	}

	function hotelgalaxy_no_cache_dynamic_css() {
		$css = new HotelGalaxy_CSS;
	}

	function hotelgalaxy_do_icon_css() {
		$output = false;

		if ( 'font' === hotelgalaxy_get_option( 'icons' ) ) {

			$url = trailingslashit( get_template_directory_uri() );

			$output = '@font-face {
				font-family: "HotelGalaxy";
				src:  url("' . $url . 'assets/fonts/hotelgalaxy.eot");
				src:  url("' . $url . 'assets/fonts/hotelgalaxy.eot#iefix") format("embedded-opentype"),
				url("' . $url . 'assets/fonts/hotelgalaxy.woff2") format("woff2"),
				url("' . $url . 'assets/fonts/hotelgalaxy.woff") format("woff"),
				url("' . $url . 'assets/fonts/hotelgalaxy.ttf") format("truetype"),
				url("' . $url . 'assets/fonts/hotelgalaxy.svg#HotelGalaxy") format("svg");
				font-weight: normal;
				font-style: normal;
			}';

		}


		if ( $output ) {

			return str_replace( array( "\r", "\n", "\t" ), '', $output );
		}

	}

	?>