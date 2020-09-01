<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'admin_init', 'hotelgalaxy_do_db_updates', 5 );

function hotelgalaxy_do_db_updates() {

	$option = get_option('hotel_galaxy_option');

	$new_option = array();

	if(has_header_image() && empty($option['header_background_image'])){		

		$new_option['header_background_image'] = esc_attr(get_header_image());
	}

	if(isset($option['header_hide'])){		

		$new_option['sticky_menu'] = $option['header_hide'];
		unset($option['header_hide']);
	}

	if(isset($option['address'])){

		$new_option['information_title_1'] = __('Address','hotel-galaxy');

		$new_option['information_text_1'] = $option['address'];
		unset($option['address']);
	}

	if(isset($option['reservation_line'])){

		$new_option['information_title_2'] = __('Reservation','hotel-galaxy');

		$new_option['information_text_2'] = $option['reservation_line'];
		unset($option['reservation_line']);
	}

	if(isset($option['facebook_link'])){

		$new_option['socialmedia_icon_1'] = 'fa fa-facebook';

		$new_option['socialmedia_url_1'] = $option['facebook_link'];
		unset($option['facebook_link']);
	}

	if(isset($option['twitter_link'])){

		$new_option['socialmedia_icon_2'] = 'fa fa-twitter';

		$new_option['socialmedia_url_2'] = $option['twitter_link'];
		unset($option['twitter_link']);
	}

	if(isset($option['skyup_link'])){

		$new_option['socialmedia_icon_3'] = 'fa fa-skype';

		$new_option['socialmedia_url_3'] = $option['skyup_link'];
		unset($option['skyup_link']);
	}

	if(isset($option['googleplus_link'])){

		$new_option['socialmedia_icon_4'] = 'fa fa-google-plus';

		$new_option['socialmedia_url_4'] = $option['googleplus_link'];
		unset($option['googleplus_link']);
	}

	if(isset($option['service_show'])){		

		$new_option['is_home_service_section'] = $option['service_show'];
		unset($option['service_show']);
	}

	if(isset($option['service_title'])){		

		$new_option['home_service_section_header'] = $option['service_title'];
		unset($option['service_title']);
	}

	if(isset($option['service_description'])){		

		$new_option['home_service_section_description'] = $option['service_description'];
		unset($option['service_description']);
	}



	if(!empty($new_option)){

		$new_settings = wp_parse_args( $new_option, $option );		

		update_option( 'hotel_galaxy_option', $new_settings);
	}	
}
?>