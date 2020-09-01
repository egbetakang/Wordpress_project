(function (api) {

	api('hotel_galaxy_option[theme_color]', function(value){

		value.bind(function(themecolor){
			
			var infobar_backgroundColor_setting = api.instance('hotel_galaxy_option[infobar_background_color]');
			var footer_icon_callout_backgroundColor_setting = api.instance('hotel_galaxy_option[footer_icon_bar_background_color]');
			var readmore_backgroundColor_setting = api.instance('hotel_galaxy_option[readmore_background_color]');
			var back_to_top_backgroundColor_setting = api.instance('hotel_galaxy_option[back_to_top_background_color]');
			var button_backgroundColor_setting = api.instance('hotel_galaxy_option[button_background_color]');
			var pagination_color_setting = api.instance('hotel_galaxy_option[pagination_color]');
			var sidebar_widget_top_borderColor_setting = api.instance('hotel_galaxy_option[sidebar_widget_top_border_color]');
			var footer_widget_title_underlineColor_setting = api.instance('hotel_galaxy_option[footer_widget_title_underline_color]');
			var sidebar_tagColor_settings = api.instance('hotel_galaxy_option[sidebar_tag_color]');			
			var carousel_caption_borderColor_setting = api.instance('hotel_galaxy_option[carousel_caption_border_color]');
			var home_room_button_background_color_setting = api.instance('hotel_galaxy_option[home_room_button_background_color]');
			var navigation_background_current_color = api.instance('hotel_galaxy_option[navigation_background_current_color]');
			var navigation_background_hover_color = api.instance('hotel_galaxy_option[navigation_background_hover_color]');
			var seprator_color = api.instance('hotel_galaxy_option[seprator_color]');
			var seprator_color_before = api.instance('hotel_galaxy_option[seprator_color_before]');
			

			hotelgalaxy_theme_color_changer(themecolor);
			

			function hotelgalaxy_theme_color_changer(colorcode){

				infobar_backgroundColor_setting.set(colorcode);
				footer_icon_callout_backgroundColor_setting.set(colorcode);
				readmore_backgroundColor_setting.set(colorcode);
				back_to_top_backgroundColor_setting.set(colorcode);
				button_backgroundColor_setting.set(colorcode);
				pagination_color_setting.set(colorcode);
				sidebar_widget_top_borderColor_setting.set(colorcode);
				footer_widget_title_underlineColor_setting.set(colorcode);
				sidebar_tagColor_settings.set(colorcode);				
				carousel_caption_borderColor_setting.set(colorcode);				
				home_room_button_background_color_setting.set(colorcode);				
				navigation_background_current_color.set(colorcode);				
				navigation_background_hover_color.set(colorcode);				
				seprator_color.set( colorcode );				
				seprator_color_before.set(colorcode);				
			}

			function hotelgalaxy_hex2rgb( hex, opacity ) {
				var h=hex.replace('#', '');
				h =  h.match(new RegExp('(.{'+h.length/3+'})', 'g'));

				for(var i=0; i<h.length; i++)
					h[i] = parseInt(h[i].length==1? h[i]+h[i]:h[i], 16);

				if (typeof opacity != 'undefined')  h.push(opacity);

				return 'rgba('+h.join(',')+')';
			}
		});
	});


})(wp.customize);