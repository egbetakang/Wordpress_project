<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if ( ! function_exists( 'hotelgalaxy_dashboard_menu_create' ) ) {
	
	add_action( 'admin_menu', 'hotelgalaxy_dashboard_menu_create' );

	function hotelgalaxy_dashboard_menu_create(){

		$hg_dashboard = add_theme_page( 'Hotel Galaxy', 'Hotel Galaxy', apply_filters( 'hotelgalaxy_dashboard_page_capability', 'edit_theme_options' ), 'hotelgalaxy-dashboard', 'hotelgalaxy_dashboard_page_settings' );
		
		add_action( "admin_print_styles-$hg_dashboard", 'hotelgalaxy_dashboard_styles' );
	}

}

if ( ! function_exists( 'hotelgalaxy_dashboard_styles' ) ) {

	function hotelgalaxy_dashboard_styles(){

		wp_enqueue_style( 'hotelgalaxy-dashboard-style', get_template_directory_uri() . '/assets/css/admin/dashboard.css', array(), HotelGalaxy_Version );
	}

}

if( ! function_exists('hotelgalaxy_dashboard_page_settings')){

	function hotelgalaxy_dashboard_page_settings(){

		$modules = array(

			"Slider" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),

			"Booking" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),

			"Spacing" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),

			"Room" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),

			"Event" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),

			"Background" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),

			"Color" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),

			"Blog" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),

			"Team" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),

			"Testimonial" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),

			"Gallery" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),

			"Typography" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),

			"Contact Template" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),

			"WooCommerce" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),

			"Callout" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),

			"CopyRight" => array( "url"=> hotelgalaxy_pro_url('https://webdzier.com/hotel-galaxy-premium/') ),
		);

		ksort($modules);

		?>
		<div class="wrapper">
			<div class="container">
				<header class="meta-header">

					<a class="hg-handle" href="<?php echo hotelgalaxy_pro_url()?>" target="_blank"><?php echo esc_html_e('Hotel Galaxy', 'hotel-galaxy') ?></a>
					<span class="hg-version"><?php echo esc_html(HotelGalaxy_Version); ?></span>

				</header>
			</div>			
			
			<div class="container clearfix">
				<div class="row">
					<div class="col-md-8">

						<div class="meta-content">

							<?php 

							do_action( 'hotelgalaxy_pro_modules' );

							if( ! defined('HG_PREMIUM_VERSION')){ ?>

								<div class="addons">
									<h3><?php esc_html_e('Premium Modules','hotel-galaxy') ?></h3>
								</div>

								<?php 

								foreach( $modules as $module => $info ) {
									?>

									<div class="addons">
										<div class="addon-name">
											<a href="<?php echo esc_url( $info['url'] ); ?>"><?php echo esc_html($module) ?></a>
										</div>

										<div class="addon-action">
											<a href="<?php echo esc_url( $info['url'] ); ?>"><?php echo esc_html__('Learn More', 'hotel-galaxy') ?></a>
										</div>
									</div>


									<?php

								}

							}

							?>

						</div>
					</div>
					<div class="col-md-4">
						<div class="meta-content">
							<div class="sider-header">
								<h3><?php esc_html_e('Reset Settings','hotel-galaxy') ?></h3>
							</div>

							<div class="sidebar-content">

								<p><?php esc_html_e( 'Reset your theme settings', 'hotel-galaxy'); ?></p>
								<form method="post">
									<p><input type="hidden" name="hg_reset_customizer" value="hotelgalaxy_reset_customizer_settings" /></p>
									<p>
										<?php
										$warning = 'return confirm("' . esc_html__( 'Warning: are you sure to reset your theme settings ?', 'hotel-galaxy') . '")';
										wp_nonce_field( 'hg_reset_customizer_nonce', 'hg_reset_customizer_nonce' );
										submit_button( esc_attr__( 'Reset Settings', 'hotel-galaxy'), 'button-primary', 'submit', false,
											array(
												'onclick' => esc_js( $warning )
											)
										);
										?>
									</p>
								</form>
							</div>

						</div>

					</div>
				</div>
			</div>
			

		</div>	

		<?php		

	}
}

if ( ! function_exists( 'hotelgalaxy_reset_customizer_settings' ) ) {

	add_action( 'admin_init', 'hotelgalaxy_reset_customizer_settings' );

	function hotelgalaxy_reset_customizer_settings() {				

		if ( empty( $_POST['hg_reset_customizer'] ) || 'hotelgalaxy_reset_customizer_settings' !== $_POST['hg_reset_customizer'] ) {
			return;
		}

		$nonce = isset( $_POST['hg_reset_customizer_nonce'] ) ? sanitize_key( $_POST['hg_reset_customizer_nonce'] ) : '';

		if ( ! wp_verify_nonce( $nonce, 'hg_reset_customizer_nonce' ) ) {
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}


		delete_option( 'hotel_galaxy_option' );
		delete_option( 'hg_background_settings' );
		delete_option( 'hg_section_manager' );
		delete_option( 'hg_spacing_settings' );
		delete_option( 'hg_woocommerce_settings' );
		delete_option( 'hotelgalaxy_dynamic_css_output' );
		remove_theme_mod( 'body_font_variants' );
		remove_theme_mod( 'body_font_category' );

		wp_safe_redirect( admin_url( 'themes.php?page=hotelgalaxy-dashboard&status=reset' ) );

		exit;
	}

}

if ( ! function_exists( 'hotelgalaxy_admin_errors' ) ) {

	add_action( 'admin_notices', 'hotelgalaxy_admin_errors' );
	
	function hotelgalaxy_admin_errors() {

		$screen = get_current_screen();

		if ( 'appearance_page_hotelgalaxy-dashboard' !== $screen->base ) {
			return;
		}

		if ( isset( $_GET['settings-updated'] ) && 'true' == $_GET['settings-updated'] ) {
			add_settings_error( 'hotelgalaxy-notices', 'true', esc_html__( 'Settings saved successfully.', 'hotel-galaxy'), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'imported' == $_GET['status'] ) {
			add_settings_error( 'hotelgalaxy-notices', 'imported', esc_html__( 'Import successful.', 'hotel-galaxy'), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'reset' == $_GET['status'] ) {
			add_settings_error( 'hotelgalaxy-notices', 'reset', esc_html__( 'Settings removed successfully.', 'hotel-galaxy'), 'updated' );
		}

		settings_errors( 'hotelgalaxy-notices' );
	}
}
?>