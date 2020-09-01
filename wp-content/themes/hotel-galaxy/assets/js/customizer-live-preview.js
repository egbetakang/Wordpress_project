// live color update
function hotelgalaxy_color_live_preview(id,selector,properties = []){

	wp.customize('hotel_galaxy_option['+id+']', function(value){

		value.bind(function(color){	

			var property = '';

			if(properties.length){

				for(var key in properties){

					property+= properties[key]+':'+ color+';';

				}	

				if (jQuery( 'style#' + id ).length ) {

					jQuery( 'style#' + id ).html( selector + '{' + property + '}' );

				}else {

					jQuery( 'head' ).append( '<style id="' + id + '">' + selector + '{' + property + '}</style>' );

					setTimeout(function() {
						jQuery( 'style#' + id ).not( ':last' ).remove();
					}, 1000);
				}
			}

			
		});
	});
}


hotelgalaxy_color_live_preview(
	'theme_color',
	'.date-overlay',
	['background-color'],
	);

hotelgalaxy_color_live_preview(
	'seprator_color',
	'.entry-header .bar',
	['background-color'],
	);

hotelgalaxy_color_live_preview(
	'seprator_color_before',
	'.entry-header .bar:before',
	['background-color'],
	);

// navigation color
hotelgalaxy_color_live_preview(
	'navigation_text_current_color',
	'#mastser-header .navbar-nav > .active > a',
	['color'],
	);

// navigation color
hotelgalaxy_color_live_preview(
	'navigation_background_current_color',
	'#mastser-header .navbar-nav > .active > a',
	['background-color'],
	);

hotelgalaxy_color_live_preview(
	'navigation_background_hover_color',
	'#mastser-header .navbar-default .navbar-nav > .open > a,\
	#mastser-header .navbar-default .navbar-nav > .open > a:hover,\
	#mastser-header .navbar-default .navbar-nav > .open > a:focus,\
	#mastser-header .navbar-nav > li > a:hover',
	['background-color'],
	);

// body color
hotelgalaxy_color_live_preview(
	'body_background_color',
	'#hg-wrapper',
	['background-color'],
	);

// body color
hotelgalaxy_color_live_preview(
	'text_color',
	'body',
	['color'],
	);
// link color
hotelgalaxy_color_live_preview(
	'link_color',
	'a, a:visited',
	['color'],
	);

// link hover color
hotelgalaxy_color_live_preview(
	'link_color_hover',
	'a:hover, a:focus, a:active',
	['color'],
	);

// link visited color
hotelgalaxy_color_live_preview(
	'link_color_visited',
	'a:visited',
	['color'],
	);

// blog post title color
hotelgalaxy_color_live_preview(
	'blog_post_title_color',
	'.entry-title a,\
	.entry-title a:visited',
	['color'],
	);

// blog post title hover color
hotelgalaxy_color_live_preview(
	'blog_post_title_hover_color',
	'.entry-title a:hover',
	['color'],
	);

// theme colors
// info bar bg color
hotelgalaxy_color_live_preview(
	'infobar_background_color',
	'.info-bar',
	['background-color'],
	);

// readmore color
hotelgalaxy_color_live_preview(
	'readmore_background_color',
	'a#read-more',
	['border-color','background-color'],
	);



// back to top scroll color
hotelgalaxy_color_live_preview(
	'back_to_top_background_color',
	'.scroll-top',
	['background-color'],
	);

// button background color
hotelgalaxy_color_live_preview(
	'.button, a.button, button_background_color',
	'button,\
	html input[type=button],\
	input[type=reset],\
	input[type=submit]',
	['background-color'],
	);


// pagination background color
hotelgalaxy_color_live_preview(
	'pagination_color',
	'.paging-navigation .nav-links span',
	['background-color'],
	);
// pagination hover background color
hotelgalaxy_color_live_preview(
	'pagination_color',
	'.paging-navigation .nav-links a:hover',
	['background-color'],
	);

// pagination color
hotelgalaxy_color_live_preview(
	'pagination_color',
	'.paging-navigation .nav-links a',
	['color'],
	);

// sidebar widger top border color
hotelgalaxy_color_live_preview(
	'sidebar_widget_top_border_color',
	'.sidebar-widget',
	['border-top-color'],
	);
// footer icon colors
hotelgalaxy_color_live_preview(
	'footer_icon_bar_background_color',
	'.icon-callout-area',
	['background-color'],
	);

hotelgalaxy_color_live_preview(
	'footer_icon_bar_icon_color',
	'.icon-callout-area .icon-callout-inner-icon i',
	['color'],
	);

hotelgalaxy_color_live_preview(
	'footer_icon_bar_title_color',
	'.icon-callout-area .icon-callout-inner-title',
	['color'],
	);

// footer widget underline color
hotelgalaxy_color_live_preview(
	'footer_widget_title_underline_color',
	'.footer-widget .widget-inner .widget-title:after',
	['background-color'],
	);

// footer widget color
hotelgalaxy_color_live_preview(
	'footer_widget_background_color',
	'.footer-widget .widget-inner',
	['background-color'],
	);



// footer widget title color
hotelgalaxy_color_live_preview(
	'footer_widget_title_color',
	'.footer-widget .widget-inner .widget-title',
	['color'],
	);

// footer widget text color
hotelgalaxy_color_live_preview(
	'footer_widget_text_color',
	'.footer-widget .widget-inner, .footer-widget .widget-inner caption',
	['color'],
	);
// footer widget link color
hotelgalaxy_color_live_preview(
	'footer_widget_link_color',
	'.footer-widget .widget-inner a, .footer-widget .widget-inner a:visited',
	['color'],
	);

// footer widget link hover color
hotelgalaxy_color_live_preview(
	'footer_widget_link_hover_color',
	'.footer-widget .widget-inner a:hover',
	['color'],
	);

// footer widget background color
hotelgalaxy_color_live_preview(
	'footer_background_color',
	'.footer-info',
	['background-color'],
	);

// copyright background color
hotelgalaxy_color_live_preview(
	'footer_bar_background_color',
	'.copyright-bar',
	['background-color'],
	);

// sidebar tag color
hotelgalaxy_color_live_preview(
	'sidebar_tag_color',
	'.sidebar-widget .tagcloud .tag-cloud-link',
	['border-color','background-color','color'],
	);


// footer tag color
hotelgalaxy_color_live_preview(
	'sidebar_tag_color',
	'.tagcloud .tag-cloud-link:hover',
	['border-color','background-color'],
	);


// carousel_caption_border_color
hotelgalaxy_color_live_preview(
	'carousel_caption_border_color',
	'.carousel-caption',
	['border-color'],
	);



// slider title color
hotelgalaxy_color_live_preview(
	'home_slider_title_color',
	'.carousel-caption h2',
	['color'],
	);

// slider description color
hotelgalaxy_color_live_preview(
	'home_slider_description_color',
	'.carousel-caption p',
	['color'],
	);

// slider description color
hotelgalaxy_color_live_preview(
	'home_slider_description_color',
	'.carousel-caption p',
	['color'],
	);

// slider description color
hotelgalaxy_color_live_preview(
	'home_slider_description_color',
	'.carousel-caption p',
	['color'],
	);


// blog background color
hotelgalaxy_color_live_preview(
	'home_blog_background_color',
	'#main-home-blog .overlay',
	['background-color'],
	);

// room background color
hotelgalaxy_color_live_preview(
	'home_room_background_color',
	'#main-home-room .overlay',
	['background-color'],
	);

// room button color
hotelgalaxy_color_live_preview(
	'home_room_button_color',
	'#main-home-room a#read-more',
	['color'],
	);

// room button color
hotelgalaxy_color_live_preview(
	'home_room_button_background_color',
	'#main-home-room a#read-more',
	['border-color','background-color'],
	);

// room button color
hotelgalaxy_color_live_preview(
	'home_room_button_hover_color',
	'#main-home-room a#read-more:hover',
	['color'],
	);

// room button color
hotelgalaxy_color_live_preview(
	'home_room_button_hover_background_color',
	'#main-home-room a#read-more:hover',
	['border-color','background-color'],
	);

// service background color
hotelgalaxy_color_live_preview(
	'home_service_background_color',
	'#main-home-service .overlay',
	['background-color'],
	);

// shortcode background color
hotelgalaxy_color_live_preview(
	'home_shortcode_background_color',
	'#main-home-shortcode .overlay',
	['background-color'],
	);


// typography

function hotelgalaxy_live_typography( id, selector, property, unit, media, settings ) {

	settings = typeof settings !== 'undefined' ? settings : 'hotel_galaxy_option';
	
	unit = typeof unit !== 'undefined' ? unit : '';

	wp.customize( settings + '[' + id + ']', function( value ) {

		value.bind( function( newval ) {

			var isTablet = ( id.substring( 0, 6 ) == 'tablet') ? true : false,
			isMobile = ( id.substring( 0, 6 ) == 'mobile') ? true : false;

			if ( isTablet ) {

				if ( wp.customize(settings + '[' + id + ']').get() == '' ) {

					var desktopID = id.replace( 'tablet_', '' );

					newval = wp.customize(settings + '[' + desktopID + ']').get();
				}
			}

			if ( isMobile ) {

				if ( wp.customize(settings + '[' + id + ']').get() == '') {
					
					var desktopID = id.replace( 'mobile_', '' );
					
					newval = wp.customize(settings + '[' + desktopID + ']').get();
				}
			}

			if ( ! isTablet && ! isMobile ) {

				var tabletValue = ( typeof wp.customize(settings + '[tablet_' + id + ']') !== 'undefined' ) ? wp.customize(settings + '[tablet_' + id + ']').get() : '',
				mobileValue = ( typeof wp.customize(settings + '[mobile_' + id + ']') !== 'undefined' ) ? wp.customize(settings + '[mobile_' + id + ']').get() : '';

				// The tablet setting exists, mobile doesn't
				if ( '' !== tabletValue && '' == mobileValue ) {
					media = hotelgalaxy_preview.desktop + ', ' + hotelgalaxy_preview.mobile;
				}

				// The tablet setting doesn't exist, mobile does
				if ( '' == tabletValue && '' !== mobileValue ) {
					media = hotelgalaxy_preview.desktop + ', ' + hotelgalaxy_preview.tablet;
				}

				// The tablet setting doesn't exist, neither does mobile
				if ( '' == tabletValue && '' == mobileValue ) {
					media = hotelgalaxy_preview.desktop + ', ' + hotelgalaxy_preview.tablet + ', ' + hotelgalaxy_preview.mobile;
				}

			}

			media_query = typeof media !== 'undefined' ? 'media="' + media + '"' : '';
			

			jQuery( 'head' ).append( '<style id="' + id + '" ' + media_query + '>' + selector + '{' + property + ':' + newval + unit + ';}</style>' );
			
			setTimeout(function() {
				jQuery( 'style#' + id ).not( ':last' ).remove();
			}, 1000);

			setTimeout("jQuery('body').trigger('hotelgalaxy_spacing_updated');", 1000);

		});

	});
	
}

hotelgalaxy_live_typography(
	'body_font_weight', 
	'body, button, input, select, textarea', 
	'font-weight'
	);

hotelgalaxy_live_typography(
	'body_font_transform', 
	'body, button, input, select, textarea', 
	'text-transform'
	);

hotelgalaxy_live_typography(
	'body_font_size', 
	'body, button, input, select, textarea', 
	'font-size',
	'px'
	);

hotelgalaxy_live_typography(
	'body_line_height', 
	'body', 
	'line-height',
	''
	);

hotelgalaxy_live_typography(
	'paragraph_margin', 
	'p', 
	'margin-bottom',
	'em'
	);

// h1

hotelgalaxy_live_typography('h1_weight', 'h1', 'font-weight' );
hotelgalaxy_live_typography('h1_transform', 'h1', 'text-transform' );
hotelgalaxy_live_typography('h1_line_height', 'h1', 'line-height','em' );
hotelgalaxy_live_typography('h1_font_size', 'h1', 'font-size','px', hotelgalaxy_preview.desktop );
hotelgalaxy_live_typography('mobile_h1_font_size', 'h1', 'font-size','px', hotelgalaxy_preview.mobile );

// h2

hotelgalaxy_live_typography('h2_weight', 'h2', 'font-weight' );
hotelgalaxy_live_typography('h2_transform', 'h2', 'text-transform' );
hotelgalaxy_live_typography('h2_line_height', 'h2', 'line-height','em' );
hotelgalaxy_live_typography('h2_font_size', 'h2', 'font-size','px', hotelgalaxy_preview.desktop );
hotelgalaxy_live_typography('mobile_h2_font_size', 'h2', 'font-size','px', hotelgalaxy_preview.mobile );

// h3

hotelgalaxy_live_typography('h3_weight', 'h3', 'font-weight' );
hotelgalaxy_live_typography('h3_transform', 'h3', 'text-transform' );
hotelgalaxy_live_typography('h3_line_height', 'h3', 'line-height','em' );
hotelgalaxy_live_typography('h3_font_size', 'h3', 'font-size','px', hotelgalaxy_preview.desktop );
hotelgalaxy_live_typography('mobile_h3_font_size', 'h3', 'font-size','px', hotelgalaxy_preview.mobile );


// slider title font

hotelgalaxy_live_typography('slider_title_font_weight', '.carousel-caption h2', 'font-weight' );
hotelgalaxy_live_typography('slider_title_font_transform', '.carousel-caption h2', 'text-transform' );
hotelgalaxy_live_typography('slider_title_line_height', '.carousel-caption h2', 'line-height','em' );
hotelgalaxy_live_typography('slider_title_font_size', '.carousel-caption h2', 'font-size','px', hotelgalaxy_preview.desktop );


// slider description font

hotelgalaxy_live_typography('slider_description_font_weight', '.carousel-caption p', 'font-weight' );
hotelgalaxy_live_typography('slider_description_font_transform', '.carousel-caption p', 'text-transform' );
hotelgalaxy_live_typography('slider_description_line_height', '.carousel-caption p', 'line-height','em' );
hotelgalaxy_live_typography('slider_description_font_size', '.carousel-caption p', 'font-size','px', hotelgalaxy_preview.desktop );



