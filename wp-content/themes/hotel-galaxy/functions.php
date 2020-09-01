<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HotelGalaxy_Version', '4.2.7' );

/**
 * All necessary theme files
 */


$theme_path = get_template_directory();


require $theme_path . '/inc/structure/theme_setup.php';

require $theme_path . '/inc/structure/wp_enqueue.php';

require $theme_path . '/inc/structure/bootstrap_navwalker.php';

require $theme_path . '/inc/structure/post-meta.php';

require $theme_path . '/inc/structure/header.php';

require $theme_path .'/inc/structure/sidebar_widget.php' ;

require $theme_path . '/inc/structure/breadcrumbs.php';

require $theme_path . '/inc/structure/featured-images.php';

require $theme_path . '/inc/structure/read-more-btn.php';

require $theme_path . '/inc/structure/comment-form.php';

require $theme_path . '/inc/structure/footer.php';

require $theme_path . '/inc/defaults.php';

require $theme_path . '/inc/theme-functions.php';

require $theme_path . '/inc/google-fonts.php';

require $theme_path . '/inc/markup.php';

require $theme_path . '/inc/migrate.php';

require $theme_path . '/inc/dashboard.php';

require $theme_path . '/inc/customizer.php';

require $theme_path . '/inc/customizer/typography-helpers.php';

require $theme_path . '/inc/classes/class-css.php';

require $theme_path . '/inc/classes/class-service-widget.php';

require $theme_path . '/inc/css-output.php';

require $theme_path . '/inc/plugin-woocommerce.php';

require $theme_path . '/inc/svg_icons.php';

require $theme_path . '/inc/homepage/home-infobar.php';

require $theme_path . '/inc/homepage/home-slider.php';

require $theme_path . '/inc/homepage/home-services.php';

require $theme_path . '/inc/homepage/home-room.php';

require $theme_path . '/inc/homepage/home-blogs.php';

require $theme_path . '/inc/homepage/home-shortcode.php';



// 
function hotelgalaxy_media_query( $device ) {

	$mobile = apply_filters( 'hotelgalaxy_mobile_media_query', '(max-width:768px)' );

	$mobile_menu = apply_filters( 'hotelgalaxy_mobile_menu_media_query', $mobile );
	

	$tablet = apply_filters( 'hotelgalaxy_tablet_media_query', '(min-width: 769px) and (max-width: 1024px)' );

	$desktop = apply_filters( 'hotelgalaxy_desktop_media_query', '(min-width:1025px)' );	

	$query = apply_filters( 'hotelgalaxy_media_queries', array(
		'mobile' 		=> $mobile,
		'mobile-menu' 	=> $mobile_menu,
		'tablet' 		=> $tablet,
		'desktop' 		=> $desktop,	
		
		
	) );

	return $query[ $device ];
}




if ( ! function_exists( 'hotelgalaxy_pro_url' ) ) {
	
	function hotelgalaxy_pro_url( $url = 'https://webdzier.com', $trailingslashit = true ) {

		if ( $trailingslashit ) {
			$url = trailingslashit( $url );
		}		

		return esc_url( $url );
	}
}

?>