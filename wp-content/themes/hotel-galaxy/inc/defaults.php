<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

if(!function_exists('hotelgalaxy_default_images')){

	function hotelgalaxy_default_images($filter = true){

		$defaults = array(
			'body_background_image' => '', 
			'header_background_image'=>'',
		);

		if ( $filter ) {
			return apply_filters( 'hotelgalaxy_default_images',$defaults);
		}

		return $defaults;
	}
	
}

if ( ! function_exists( 'hotelgalaxy_get_default' ) ) {

	function hotelgalaxy_get_default( $filter = true){
		$default = array(
			
			'show_title' => true,
			'show_tagline' => true,
			'retina_logo' => '',
			'logo_width' => '',
			'sticky_menu' => 'false',	
			'nav_dropdown_direction' => 'right',
			'nav_search' => 'disable',			
			
			'slider_sec_btn'=>'',
			'slider_excerpt_word'=>20,
			'is_carousel_sideborder'=> true,
			'is_carousel_background_overlay'=> true,					

			'information_title_1'=>'',			
			'information_text_1'=>'',
			'information_title_2'=>'',						
			'information_text_2'=>'',		

			'social_open_new_tab'=>true,
			'socialmedia_icon_1'=>'',
			'socialmedia_url_1'=>'',
			'socialmedia_icon_2'=>'',
			'socialmedia_url_2'=>'',
			'socialmedia_icon_3'=>'',
			'socialmedia_url_3'=>'',
			'socialmedia_icon_4'=>'',
			'socialmedia_url_4'=>'',
			'socialmedia_icon_5'=>'',
			'socialmedia_url_5'=>'',
			
			'is_home_service_section'=>true,
			'is_home_service_header'=>true,
			'is_service_seprator' => true,
			'is_home_service_sub_header'=>true,
			'home_service_section_header'=>'',
			'is_home_service_button'=>true,
			'home_service_button_text'=>'',
			'home_service_button_target'=>false,
			'home_service_section_description'=>'',
			'home_service_widget_column'=>'col-md-4',

			'is_home_room_header'=>true,
			'is_home_room_sub_header'=>true,
			'is_room_seprator' => true,
			'room_sec_show'=>true,
			'room_is_button'=>true,
			'room_is_target'=>true,
			'room_sec_title'=>'',
			'room_sec_description'=>'',			
			'room_cat'=>'',
			'room_button_text'=>'',
			'home_room_column'=>'col-md-4',

			'blog_show'=>true,
			'is_home_blog_header'=>true,
			'is_home_blog_sub_header'=>true,
			'is_blog_seprator' => true,
			'blog_title'=>'',
			'blog_description'=>'',
			'home_blog_column'=>'col-md-4',	
			'home_blog_category'=>'',		
			'home_blog_posts_per_page'=>6,		

			'is_home_shortcode_header'=>true,
			'is_home_shortcode_sub_header'=>true,
			'is_shortcode_seprator' => true,
			'shortcode_show'=>true,			
			'shortcode_title'=>'',
			'shortcode_description'=>'',
			'shortcode_echo'=>'',		

			'page_title_bg'=>'',

			'footer_collout_title_1'=>'',
			'footer_collout_icon_1'=>'',
			
			'footer_collout_title_2'=>'',
			'footer_collout_icon_2'=>'',
			
			'footer_collout_title_3'=>'',
			'footer_collout_icon_3'=>'',
			
			'footer_collout_title_4'=>'',
			'footer_collout_icon_4'=>'',			

			'back_to_top'=>'enable',			
			'sidebar_widget_background_img' => '',
			'icons' => 'font',
			'post_content' => 'excerpt',

			'layout_setting' => 'right-sidebar',
			'blog_layout_setting' => 'right-sidebar',
			'single_layout_setting' => 'right-sidebar',
		);

		return apply_filters('hotelgalaxy_default_settings', $default );
	}
}

if( !function_exists('hotelgalaxy_color_defaults')){

	function hotelgalaxy_color_defaults( $filter = true ) {

		$defaults =array(
			'body_background_color' => '#f2f2f2',
			'header_background_color' => '#ffffff',
			'site_title_color' => '#222222',
			'site_tagline_color' => '#757575',
			
			'mobile_navigation_background_color' => '#222222',		

			'navigation_text_current_color' => '#ffffff',
			'navigation_background_current_color' => '#a29060',	
			'navigation_text_color' => '#3a3a3a',
			'navigation_text_hover_color' => '#ffffff',
			'navigation_background_color' => '#ffffff',					
			'navigation_background_hover_color' => '#a29060',			

			'subnavigation_text_current_color' => '#ffffff',
			'subnavigation_text_color' => '#ffffff',
			'subnavigation_text_hover_color' => '#ffffff',
			'subnavigation_background_color' => '#000000',
			'subnavigation_background_current_color' => '#4f4f4f',
			'subnavigation_background_hover_color' => '#3f3f3f',			
			
			'infobar_background_color' => '#a29060',			

			'text_color' => '#3a3a3a',
			'link_color' => '#1e73be',
			'link_color_hover' => '#a29060',
			'link_color_visited' => '#a29060',
			'blog_post_title_color' => '#a29060',
			'blog_post_title_hover_color' => '#3a3a3a',			
			'home_blog_background_color'=>'#000000',

			'readmore_background_color'=>'#a29060',
			'back_to_top_text_color'=>'#ffffff',
			'back_to_top_text_hover_color'=>'',
			'back_to_top_background_color'=>'#a29060',
			'back_to_top_background_hover_color'=>'',

			'button_background_color'=>'#a29060',		

			'pagination_color' => '#a29060',
			'pagination_text_color_visited'=>'#ffffff',
			'pagination_background_color'=>'#ffffff',
			'pagination_text_hover_color'=>'#ffffff',			
			
			'sidebar_widget_top_border_color'=>'#a29060',

			'sidebar_widget_background_color'=>'#ffffff',
			'sidebar_widget_title_color'=>'#000000',
			'sidebar_widget_text_color'=>'',
			'sidebar_widget_link_color'=>'',
			'sidebar_widget_link_hover_color'=>'',

			'footer_icon_bar_background_color'=>'#a29060',			
			'footer_icon_bar_icon_color'=>'#ffffff',			
			'footer_icon_bar_title_color'=>'#ffffff',						
			
			'footer_widget_background_color'=>'',
			'footer_widget_title_color'=>'#ffffff',
			'footer_widget_text_color'=>'',
			'footer_widget_link_color'=>'',
			'footer_widget_link_hover_color'=>'',
			'footer_widget_title_underline_color'=>'#a29060',
			
			'sidebar_tag_color'=>'#a29060',
			
			'carousel_caption_border_color'=>'#a29060',	

			'home_slider_title_color'=>'#ffffff',		
			'home_slider_description_color'=>'#ffffff',	

			'seprator_color'=>'#a29060',
			'seprator_color_before'=>'#a29060',

			'home_service_header_title_color'=>'#3a3a3a',		
			'home_service_header_description_color'=>'#3a3a3a',	
			'home_room_header_title_color'=>'#3a3a3a',
			'home_room_header_description_color'=>'#3a3a3a',
			'home_blog_header_title_color'=>'#444444',
			'home_blog_header_description_color'=>'#444444',
			'home_shortcode_header_title_color'=>'#3a3a3a',
			'home_shortcode_header_description_color'=>'#3a3a3a',	

			'footer_background_color'=>'#202021',
			'copyright_background_color'=>'#1a1a1b',			

			'footer_bar_background_color'=>'#1a1a1b',
			'footer_bar_text_color' => '#ffffff',
			'footer_bar_link_color' => '#a29060',
			'footer_bar_link_hover_color' => '#606060',

			'entry_meta_text_color' => '#595959',
			'entry_meta_link_color' => '#595959',
			'entry_meta_link_color_hover' => '#1e73be',

			'theme_color' => '#a29060',

			'home_service_title_color'=>'#000000',
			'home_service_description_color'=>'#000000',
			'home_service_background_color'=>'#ffffff',
			
			'home_room_title_color'=>'#000000',
			'home_room_description_color'=>'#000000',
			'home_room_background_color'=>'#ffffff',

			'home_room_button_color' => '#ffffff',
			'home_room_button_background_color' => '#a29060',
			'home_room_button_hover_color' => '#ffffff',
			'home_room_button_hover_background_color' => '#606060',

			'home_blog_title_color'=>'#ffffff',
			'home_blog_description_color'=>'#ffffff',
			'home_blog_background_color'=>'#000000',

			'home_shortcode_title_color'=>'#000000',
			'home_shortcode_description_color'=>'#000000',
			'home_shortcode_background_color'=>'#ffffff',
		);

		if ( $filter ) {
			return apply_filters( 'hotelgalaxy_color_defaults',$defaults);
		}

		return $defaults;
	}

}

if ( ! function_exists( 'hotelgalaxy_default_fonts' ) ) {

	function hotelgalaxy_default_fonts( $filter = true ) {

		$default = array(

			'site_title_font' => 'inherit',
			'site_title_font_category' => '',
			'site_title_font_variants' => '',
			'site_title_font_weight' => 'bold',
			'site_title_font_transform' => 'none',
			'site_title_font_size' => '35',
			'mobile_site_title_font_size' => '25',

			'site_tagline_font' => 'inherit',
			'site_tagline_font_category' => '',
			'site_tagline_font_variants' => '',
			'site_tagline_font_weight' => 'normal',
			'site_tagline_font_transform' => 'none',
			'site_tagline_font_size' => '15',

			'body_font' => 'System Stack',
			'body_font_variants' => '',
			'body_font_category' => '',
			'body_font_weight' => 'normal',
			'body_font_transform' => 'none',
			'body_font_size' => '17',
			'body_line_height' => '1.5',
			'paragraph_margin'=>'1.0',

			'h1_font' => 'inherit',
			'h1_font_category' => '',
			'h1_font_variants' => '',
			'h1_weight' => '300',
			'h1_transform' => 'none',
			'h1_font_size' => '40',
			'h1_line_height' => '1.2', 
			'h1_margin_bottom' => '20',
			'mobile_h1_font_size' => '30',

			'h2_font' => 'inherit',
			'h2_font_category' => '',
			'h2_font_variants' => '',
			'h2_weight' => '300',
			'h2_transform' => 'none',
			'h2_font_size' => '30',
			'h2_line_height' => '1.2',
			'h2_margin_bottom' => '20',
			'mobile_h2_font_size' => '25',

			'h3_font' => 'inherit',
			'h3_font_category' => '',
			'h3_font_variants' => '',
			'h3_weight' => 'normal',
			'h3_transform' => 'none',
			'h3_font_size' => '20',
			'h3_line_height' => '1.2', 
			'h3_margin_bottom' => '20',

			'h4_font' => 'inherit',
			'h4_font_category' => '',
			'h4_font_variants' => '',
			'h4_weight' => 'normal',
			'h4_transform' => 'none',
			'h4_font_size' => '',
			'h4_line_height' => '',
			'h4_margin_bottom' => '20', 

			'h5_font' => 'inherit',
			'h5_font_category' => '',
			'h5_font_variants' => '',
			'h5_weight' => 'normal',
			'h5_transform' => 'none',
			'h5_font_size' => '',
			'h5_line_height' => '', 
			'h5_margin_bottom' => '20',

			'h6_font' => 'inherit',
			'h6_font_category' => '',
			'h6_font_variants' => '',
			'h6_weight' => 'normal',
			'h6_transform' => 'none',
			'h6_font_size' => '',
			'h6_line_height' => '',
			'h6_margin_bottom' => '20',

			'buttons_font' => 'inherit',
			'buttons_font_category' => '',
			'buttons_font_variants' => '',
			'buttons_font_weight' => 'normal',
			'buttons_font_transform' => 'none',
			'buttons_font_size' => '15', 

			'navigation_font' => 'inherit',
			'navigation_font_category' => '',
			'navigation_font_variants' => '',
			'navigation_font_weight' => 'normal',
			'navigation_font_transform' => 'none',
			'navigation_font_size' => '15',
			'mobile_navigation_font_size' => '',


			'widgets_title_font' => 'inherit',
			'widgets_title_font_category' => '',
			'widgets_title_font_variants' => '',
			'widgets_title_font_weight' => 'normal',
			'widgets_title_font_transform' => 'none',
			'widgets_title_font_size' => '20',
			'widgets_title_separator' => '30',
			'widgets_content_font_size' => '17',			

			'infobar_font' => 'inherit',
			'infobar_font_category' => '',
			'infobar_font_variants' => '',
			'infobar_font_weight' => 'normal',
			'infobar_font_transform' => 'none',
			'infobar_font_size' => '17',
			'mobile_infobar_font_size' => '13',

			'infobar_social_icon_size' => '18',
			'mobile_infobar_social_icon_size' => '14',

			'breadcrum_font' => 'inherit',
			'breadcrum_font_category' => '',
			'breadcrum_font_variants' => '',
			'breadcrum_font_weight' => 'normal',
			'breadcrum_font_transform' => 'none',
			'breadcrum_font_size' => '24',
			'mobile_breadcrum_font_size' => '15',

			'icon_callout_font' => 'inherit',
			'icon_callout_font_category' => '',
			'icon_callout_font_variants' => '',
			'icon_callout_font_weight' => 'normal',
			'icon_callout_font_transform' => 'none',
			'icon_callout_font_size' => '20',
			'mobile_icon_callout_font_size' => '15',
			'icon_callout_icon_size' => '40',
			'mobile_icon_callout_icon_size' => '15',

			'home_headers_font' => 'inherit',
			'home_headers_font_category' => '',
			'home_headers_font_variants' => '',
			'home_headers_font_weight' => 'normal',
			'home_headers_font_transform' => 'none',
			'home_headers_font_size' => '24',
			'mobile_home_headers_font_size' => '15',

			'home_description_font' => 'inherit',
			'home_description_font_category' => '',
			'home_description_font_variants' => '',
			'home_description_font_weight' => 'normal',
			'home_description_font_transform' => 'none',
			'home_description_font_size' => '17',
			'mobile_home_description_font_size' => '12',

			'slider_title_font' => 'inherit',
			'slider_title_font_category' => '',
			'slider_title_font_variants' => '',
			'slider_title_font_weight' => 'normal',
			'slider_title_font_transform' => 'none',
			'slider_title_font_size' => '30',
			'mobile_slider_title_font_size' => '20',
			'slider_title_line_height' => '', 

			'slider_description_font' => 'inherit',
			'slider_description_font_category' => '',
			'slider_description_font_variants' => '',
			'slider_description_font_weight' => 'normal',
			'slider_description_font_transform' => 'none',
			'slider_description_font_size' => '17',
			'mobile_slider_description_font_size' => '12',
			'slider_description_line_height' => '', 

			'service_widget_icon_size' => '55',
			'mobile_service_widget_icon_size' => '40',

			'service_widget_title_font' => 'inherit',
			'service_widget_title_font_category' => '',
			'service_widget_title_font_variants' => '',
			'service_widget_title_font_weight' => 'normal',
			'service_widget_title_font_transform' => 'none',
			'service_widget_title_font_size' => '24',
			'mobile_service_widget_title_font_size' => '17',
			'service_widget_title_line_height' => '1.5',

			'service_widget_description_font' => 'inherit',
			'service_widget_description_font_category' => '',
			'service_widget_description_font_variants' => '',
			'service_widget_description_font_weight' => 'normal',
			'service_widget_description_font_transform' => 'none',
			'service_widget_description_font_size' => '17',
			'mobile_service_widget_description_font_size' => '14',
			'service_widget_description_line_height' => '1.5',

			'footer_font' => 'inherit',
			'footer_font_category' => '',
			'footer_font_variants' => '',
			'footer_font_weight' => 'normal',
			'footer_font_transform' => 'none',
			'footer_font_size' => '15',

			'content_background_color' => '#ffffff',
			'content_text_color' => '',
			'content_link_color' => '',
			'content_link_hover_color' => '',
			
		);

if ( $filter ) {
	return apply_filters( 'hotelgalaxy_default_fonts', $default );
}

return $default;
}
}




if ( ! function_exists( 'hotelgalaxy_default_typography' ) ) {
	
	function hotelgalaxy_default_typography() {
		$fonts = array(
			'inherit',
			'Arial, Helvetica, sans-serif',
			'Century Gothic',
			'Comic Sans MS',
			'Courier New',			
			'Georgia, Times New Roman, Times, serif',
			'Helvetica',
			'Impact',
			'Lucida Console',
			'Lucida Sans Unicode',
			'Palatino Linotype',
			'System Stack',
			'Segoe UI, Helvetica Neue, Helvetica, sans-serif',
			'Tahoma, Geneva, sans-serif',
			'Trebuchet MS, Helvetica, sans-serif',
			'Verdana, Geneva, sans-serif',
		);

		return apply_filters( 'hotelgalaxy_default_typography', $fonts );
	}
}


?>