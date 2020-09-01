<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'hotelgalaxy_site_info_bar_position' ) ) {

	add_action('hotelgalaxy_site_info_bar', 'hotelgalaxy_site_info_bar_position');
	
	function hotelgalaxy_site_info_bar_position() {

		$hotelgalaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), hotelgalaxy_get_default() );	

		?>

		<div class="container">

			<?php if(!empty($hotelgalaxy_settings['information_text_1'])){ ?>

				<span id="info-1" class="info-bar-inner user-addr" >

					<?php 

					echo sprintf( 
						'<span>%1$s &#8282; </span> %2$s', 
						esc_html( $hotelgalaxy_settings['information_title_1'] ), 
						esc_html( $hotelgalaxy_settings['information_text_1'] )  
					);

					?>						
					
				</span>

			<?php } ?>


			<?php if(!empty($hotelgalaxy_settings['information_text_2'])){ ?>
				<span class="info-bar-inner" id="info-2">

					<?php 

					echo sprintf( 
						'<span>%1$s &#8282;</span> %2$s',
						esc_html( $hotelgalaxy_settings['information_title_2']), 
						esc_html( $hotelgalaxy_settings['information_text_2'])  
					);

					?>

				</span>
			<?php } ?>


			<span class="info-bar-inner user-social">

				<?php 

				for($i=1; $i<=5; $i++){

					$socialmedia_icon = $hotelgalaxy_settings['socialmedia_icon_'.$i];

					$socialmedia_url = $hotelgalaxy_settings['socialmedia_url_'.$i]; 

					if( !empty( $socialmedia_icon ) && !empty( $socialmedia_url ) ){ 

						echo sprintf( 
							'<a href="%1$s" id="bar-social-icon-%3$s" target="_blank" class="social-icon" data-toggle="tooltip"><i class="%2$s"></i></a>', 

							esc_url( $socialmedia_url ),

							esc_html($socialmedia_icon),

							esc_attr($i) 

						);
					}

				}

				
				
				?>


			</span>

		</div>

		<?php

	}

}

?>