<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if( ! function_exists('hotelgalaxy_add_home_service') ){

	add_action('hotelgalaxy_do_homeService', 'hotelgalaxy_add_home_service');

	function hotelgalaxy_add_home_service(){

		$hotelgalaxy_settings = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), hotelgalaxy_get_default() ); 	


		if( $hotelgalaxy_settings['is_home_service_section'] ){
			?>

			<div id="main-home-service" class="home-section">

				<div class="overlay">

					<div class="container">

						<?php 

						if(($hotelgalaxy_settings['is_home_service_header'] == true) || ($hotelgalaxy_settings["is_home_service_sub_header"] == true) || ($hotelgalaxy_settings['is_service_seprator'] == true)){
							?>

							<div class="entry-header">
								
								<?php 

								

								if( ($hotelgalaxy_settings['is_home_service_header'] == true) && !empty($hotelgalaxy_settings["home_service_section_header"]) ){

									echo '<h2>'.esc_html(wp_kses_post($hotelgalaxy_settings["home_service_section_header"])).'</h2>';
								}							
								
								if($hotelgalaxy_settings['is_service_seprator'] == true){
									echo '<div class="bar"></div>';
								}

								if( ($hotelgalaxy_settings['is_home_service_sub_header'] == true)&& !empty($hotelgalaxy_settings["home_service_section_description"]) ){
									echo '<p>'.esc_html(wp_kses_post($hotelgalaxy_settings["home_service_section_description"])).'</p>';
								}
								?>								

							</div>		

							<?php
						}
						?>

						<div class="service-content-area home-summary clearfix">
							<?php 
							if ( is_active_sidebar( 'home-services' ) ) {
								dynamic_sidebar( 'home-services' );
							}
							?>
						</div>
					</div>
				</div>
			</div>

			<?php
		}
	}
}
