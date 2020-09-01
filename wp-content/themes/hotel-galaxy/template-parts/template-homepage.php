<?php 

if ( ! defined( 'ABSPATH' ) ) { exit; }

/*
		Template Name: Home

*/

		get_header();

		if( defined('HG_SECTION_MANAGER_ADDON_VERSION' )){
			
			do_action('hotelgalaxy_do_premiumSection');

		}else{

			do_action('hotelgalaxy_do_homeSlider');

			do_action('hotelgalaxy_do_homeService');

			do_action('hotelgalaxy_do_homeRoom');

			do_action('hotelgalaxy_do_homeBlog');

			do_action('hotelgalaxy_do_homeShortcode');
		}
		

		get_footer(); 

		?>