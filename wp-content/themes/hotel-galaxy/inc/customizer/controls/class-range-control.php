<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Hotelgalaxy_Range_Slider_Control' ) ) {

	class Hotelgalaxy_Range_Slider_Control extends WP_Customize_Control {

		
		public $type = 'hotelgalaxy-range-slider';

		public $description = '';

		public $sub_description = '';
		
		public function enqueue() {

			wp_enqueue_style( 'hotelgalaxy-slider-control-css', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/controls/css/slider-control.css', null );

			wp_enqueue_script( 'hotelgalaxy-slider-control-js', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/controls/js/slider-control.js', array( 'jquery', 'customize-base', 'jquery-ui-slider' ), false, true );

			
		}

		public function to_json() {
			
			parent::to_json();

			$devices = array( 'tablet','mobile','desktop' );
			
			foreach ( $devices as $device ) {

				$this->json['choices'][ $device ]['min']  = ( isset( $this->choices[ $device ]['min'] ) ) ? $this->choices[ $device ]['min'] : '0';

				$this->json['choices'][ $device ]['max']  = ( isset( $this->choices[ $device ]['max'] ) ) ? $this->choices[ $device ]['max'] : '100';

				$this->json['choices'][ $device ]['step'] = ( isset( $this->choices[ $device ]['step'] ) ) ? $this->choices[ $device ]['step'] : '1';

				$this->json['choices'][ $device ]['edit'] = ( isset( $this->choices[ $device ]['edit'] ) ) ? $this->choices[ $device ]['edit'] : false;

				$this->json['choices'][ $device ]['unit'] = ( isset( $this->choices[ $device ]['unit'] ) ) ? $this->choices[ $device ]['unit'] : false;
			}

			foreach ( $this->settings as $key => $value ) {
				
				$this->json[ $key ] = array(
					
					'link'  => $this->get_link( $key ),
					'value' => $this->value( $key ),
					'default' => isset( $value->default ) ? $value->default : '',
				);
			}

			$this->json['tablet_label'] = __( 'Tablet','hotel-galaxy');

			$this->json['mobile_label'] = __( 'Mobile','hotel-galaxy');

			$this->json['desktop_label'] = __( 'Desktop','hotel-galaxy');
			
			$this->json['reset_label'] = __( 'Reset','hotel-galaxy');

			$this->json['description'] = $this->description;

			$this->json['sub_description'] = $this->sub_description;
		}

		/**
		 * Render the control in the customizer
		 */
		protected function content_template() {
			?>
			<div class="hotelgalaxy-range-slider-control">
				<div class="hg-range-title-area">
					<# if ( data.label || data.description ) { #>
					<div class="hg-range-title-info">
						<# if ( data.label ) { #>
						<label class="customize-control-title">{{{ data.label }}}</label>
						<# } #>

						<# if ( data.description ) { #>
						<p class="description">{{{ data.description }}}</p>
						<# } #>
					</div>
					<# } #>

					<div class="hg-range-slider-controls">
						<span class="hg-device-controls">
							<# if ( typeof ( data.desktop ) !== 'undefined' ) { #>
							<span class="hotelgalaxy-device-desktop dashicons dashicons-desktop" data-option="desktop" title="{{ data.desktop_label }}"></span>
							<# } #>

							<# if ( typeof (data.tablet) !== 'undefined' ) { #>
							<span class="hotelgalaxy-device-tablet dashicons dashicons-tablet" data-option="tablet" title="{{ data.tablet_label }}"></span>
							<# } #>

							<# if ( typeof (data.mobile) !== 'undefined' ) { #>
							<span class="hotelgalaxy-device-mobile dashicons dashicons-smartphone" data-option="mobile" title="{{ data.mobile_label }}"></span>
							<# } #>
						</span>

						<span title="{{ data.reset_label }}" class="hotelgalaxy-reset dashicons dashicons-image-rotate"></span>
					</div>
				</div>

				<div class="hg-range-slider-areas">
					<# if ( typeof ( data.desktop ) !== 'undefined' ) { #>
					<label class="range-option-area" data-option="desktop" style="display: none;">
						<div class="wrapper <# if ( '' !== data.choices['desktop']['unit'] ) { #>has-unit<# } #>">
							<div class="hotelgalaxy-slider" data-step="{{ data.choices['desktop']['step'] }}" data-min="{{ data.choices['desktop']['min'] }}" data-max="{{ data.choices['desktop']['max'] }}"></div>

							<div class="hg_range_value <# if ( '' == data.choices['desktop']['unit'] && ! data.choices['desktop']['edit'] ) { #>hide-value<# } #>">
								<input <# if ( data.choices['desktop']['edit'] ) { #>style="display:inline-block;"<# } else { #>style="display:none;"<# } #> type="number" step="{{ data.choices['desktop']['step'] }}" class="desktop-range value" value="{{ data.desktop.value }}" min="{{ data.choices['desktop']['min'] }}" max="{{ data.choices['desktop']['max'] }}" {{{ data.desktop.link }}} data-reset_value="{{ data.desktop.default }}" />
								<span <# if ( ! data.choices['desktop']['edit'] ) { #>style="display:inline-block;"<# } else { #>style="display:none;"<# } #> class="value">{{ data.desktop.value }}</span>

								<# if ( data.choices['desktop']['unit'] ) { #>
								<span class="unit">{{ data.choices['desktop']['unit'] }}</span>
								<# } #>
							</div>
						</div>
					</label>
					<# } #>

					<# if ( 'undefined' !== typeof ( data.tablet ) ) { #>
					<label class="range-option-area" data-option="tablet" style="display:none">
						<div class="wrapper <# if ( '' !== data.choices['tablet']['unit'] ) { #>has-unit<# } #>">
							<div class="hotelgalaxy-slider" data-step="{{ data.choices['tablet']['step'] }}" data-min="{{ data.choices['tablet']['min'] }}" data-max="{{ data.choices['tablet']['max'] }}"></div>

							<div class="hg_range_value <# if ( '' == data.choices['tablet']['unit'] && ! data.choices['desktop']['edit'] ) { #>hide-value<# } #>">
								<input <# if ( data.choices['tablet']['edit'] ) { #>style="display:inline-block;"<# } else { #>style="display:none;"<# } #> type="number" step="{{ data.choices['tablet']['step'] }}" class="tablet-range value" value="{{ data.tablet.value }}" min="{{ data.choices['tablet']['min'] }}" max="{{ data.choices['tablet']['max'] }}" {{{ data.tablet.link }}} data-reset_value="{{ data.tablet.default }}" />
								<span <# if ( ! data.choices['tablet']['edit'] ) { #>style="display:inline-block;"<# } else { #>style="display:none;"<# } #> class="value">{{ data.tablet.value }}</span>

								<# if ( data.choices['tablet']['unit'] ) { #>
								<span class="unit">{{ data.choices['tablet']['unit'] }}</span>
								<# } #>
							</div>
						</div>
					</label>
					<# } #>

					<# if ( 'undefined' !== typeof ( data.mobile ) ) { #>
					<label class="range-option-area" data-option="mobile" style="display:none;">
						<div class="wrapper <# if ( '' !== data.choices['mobile']['unit'] ) { #>has-unit<# } #>">
							<div class="hotelgalaxy-slider" data-step="{{ data.choices['mobile']['step'] }}" data-min="{{ data.choices['mobile']['min'] }}" data-max="{{ data.choices['mobile']['max'] }}"></div>

							<div class="hg_range_value <# if ( '' == data.choices['mobile']['unit'] && ! data.choices['desktop']['edit'] ) { #>hide-value<# } #>">
								<input <# if ( data.choices['mobile']['edit'] ) { #>style="display:inline-block;"<# } else { #>style="display:none;"<# } #> type="number" step="{{ data.choices['mobile']['step'] }}" class="mobile-range value" value="{{ data.mobile.value }}" min="{{ data.choices['mobile']['min'] }}" max="{{ data.choices['mobile']['max'] }}" {{{ data.mobile.link }}} data-reset_value="{{ data.mobile.default }}" />
								<span <# if ( ! data.choices['mobile']['edit'] ) { #>style="display:inline-block;"<# } else { #>style="display:none;"<# } #> class="value">{{ data.mobile.value }}</span>

								<# if ( data.choices['mobile']['unit'] ) { #>
								<span class="unit">{{ data.choices['mobile']['unit'] }}</span>
								<# } #>
							</div>
						</div>
					</label>
					<# } #>
				</div>

				<# if ( data.sub_description ) { #>
				<p class="description sub-description">{{{ data.sub_description }}}</p>
				<# } #>
			</div>
			<?php
		}	

	}

}