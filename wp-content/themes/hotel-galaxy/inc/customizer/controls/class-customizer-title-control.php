<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Hotelgalaxy_Title_Control' ) ) :
/**
 * Create a control to display titles within our sections
 */
class Hotelgalaxy_Title_Control extends WP_Customize_Control {
	public $type = 'hotelgalaxy-title-control';
	public $title = '';
	
	public function enqueue() {

		wp_enqueue_style( 'hotelgalaxy-customizer-title-control',  trailingslashit( get_template_directory_uri() ) . 'inc/customizer/controls/css/customizer-title-control.css', array(), HotelGalaxy_Version );
	}

	public function to_json() {
		parent::to_json();
		$this->json[ 'title' ] = esc_attr( $this->title );
	}
	
	public function content_template() {
		?>
		<div class="hotelgalaxy-title-control">
			<span>{{ data.title }}</span>
		</div>
		<?php
	}
}
endif;