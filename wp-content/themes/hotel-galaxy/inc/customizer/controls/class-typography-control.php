<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'HotelGalaxy_Typography_Control' ) ) {

	class HotelGalaxy_Typography_Control extends WP_Customize_Control {

		public $type = 'hotelgalaxy-customizer-typography';

		public function enqueue() {

			wp_enqueue_style( 'hotelgalaxy-typography-select2-style', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/controls/css/select2.css', array(), HotelGalaxy_Version );

			wp_enqueue_script( 'hotelgalaxy-typography-select2-script', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/controls/js/select2.js', array( 'customize-controls', 'jquery' ), HotelGalaxy_Version, true );

			wp_enqueue_style( 'hotelgalaxy-typography-wpcustomizer-style', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/controls/css/typography-wpcustomizer.css', array(), HotelGalaxy_Version );			


			wp_enqueue_script( 'hotelgalaxy-typography-wpcustomizer-script', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/controls/js/typography-wpcustomizer.js', array( 'customize-controls', 'hotelgalaxy-typography-select2-script' ), HotelGalaxy_Version, true );



			
		}

		public function to_json() {
			parent::to_json();

			$this->json['system_fonts_title'] = __( 'System fonts', 'hotel-galaxy');

			$this->json['google_fonts_title'] = __( 'Google fonts', 'hotel-galaxy');

			$this->json['family_title'] = esc_html__( 'Font family', 'hotel-galaxy');

			$this->json['default_typography'] = hotelgalaxy_default_typography();

			$this->json['variant_title'] = esc_html__( 'Variants', 'hotel-galaxy');

			$this->json['weight_title'] = esc_html__( 'Font Weight', 'hotel-galaxy');

			$this->json['transform_title'] = esc_html__( 'Text Transform', 'hotel-galaxy');

			foreach ( $this->settings as $key => $value ) {
				
				$this->json[ $key ] = array(

					'id' => isset( $value->id ) ? $value->id : '',
					'link'  => $this->get_link( $key ),
					'value' => $this->value( $key ),
					'default' => isset( $value->default ) ? $value->default : '',
					
				);

				if ( $key === 'weight') {
					$this->json[ $key ]['choices'] = $this->hotelgalaxy_font_weight_choices();
				}

				if ( $key === 'transform') {
					$this->json[ $key ]['choices'] = $this->hotelgalaxy_text_transform_choices();
				}
			}

			
		}

		public function hotelgalaxy_font_weight_choices() {
			return array(
				'normal' => esc_html( 'normal' ),
				'bold' => esc_html( 'bold' ),
				'100' => esc_html( '100' ),
				'200' => esc_html( '200' ),
				'300' => esc_html( '300' ),
				'400' => esc_html( '400' ),
				'500' => esc_html( '500' ),
				'600' => esc_html( '600' ),
				'700' => esc_html( '700' ),
				'800' => esc_html( '800' ),
				'900' => esc_html( '900' ),
			);
		}

		public function hotelgalaxy_text_transform_choices() {
			return array(
				'none' => esc_html( 'none' ),
				'capitalize' => esc_html( 'capitalize' ),
				'uppercase' => esc_html( 'uppercase' ),
				'lowercase' => esc_html( 'lowercase' ),
			);
		}

		public function content_template() {
			?>

			<# if ( '' !== data.label ) { #>		

			<label class="customize-control-title">{{ data.label }} </label>

			<# } #>

			<# if ( typeof ( data.family ) !== 'undefined' ) { #>

			<div class="hotelgalaxy-font-family entry-meta">

				<select {{{ data.family.link }}} data-category="{{{ data.category.id }}}" data-variants="{{{ data.variant.id }}}" class="body_font_family" style="width:100%;">

					<optgroup label="{{ data.system_fonts_title }}">

						<# 

						var defaultTypography = data.default_typography;

						for(var key in  defaultTypography) {

						var name = defaultTypography[ key ].split(',')[0];					
						var selected_sf = ( defaultTypography[ key ] === data.family.value ) ? "selected" : ''; 	

						#>

						<option value="{{ defaultTypography[ key ] }}" {{selected_sf}}> {{ name }}</option>

						<# } #>


					</optgroup>

					<optgroup label="{{ data.google_fonts_title }}">
						<#
						var googleFonts = hotelgalaxyAllGoogleFonts.googleFonts;

						for( var key in googleFonts ){

						var selected_gf = ( data.default_typography[ key ] === data.family.value ) ? "selected" : ''; 
						#>

						<option value="{{googleFonts[key].name}}" {{selected_gf}}>{{googleFonts[key].name}}</option>

						<#	} #>
						

					</optgroup>
				</select>
			</div>				
			<# }  #>

			<# 

			if ( typeof ( data.variant ) !== 'undefined' ) { 

			var id = data.family.value.split(' ').join('_').toLowerCase();

			var font_data = hotelgalaxyAllGoogleFonts.googleFonts[id];

			var variants = '';

			if ( typeof font_data !== 'undefined' ) {
			variants = font_data.variants;
		}

		if ( data.variant.value == null ) {
		data.variant.value = data.variant.default;
	}

	#>

	<div id="{{{ data.variant.id }}}" class="hotelgalaxy-font-variant entry-meta" data-saved-value="{{ data.variant.value }}">
		<label class="customize-control-title">{{data.variant_title}}</label>


		<select name="{{{ data.variant.id }}}" multiple="multiple" class="hg-font-variant" style="width:100%;" {{{ data.variant.link }}}>
			<#
			_.each( variants, function( label, value ) { #>

			<option value="{{ label }}" > {{ label }} </option>

			<# } ) #>
		</select>

	</div>				
	<# } #>

	<# if (  typeof ( data.category ) !== 'undefined' ) { #>
	<div class="hotelgalaxy-font-category">
		<label>
			<input name="{{{ data.category.id }}}" type="hidden" {{{ data.category.link }}} value="{{{ data.category.value }}}" class="hotelgalaxy-hidden-input" />

		</label>
	</div>
	<# } #>

	<div class="hg-text-transform-weight entry-meta">

		<# if (  typeof ( data.transform ) !== 'undefined') { #>

		<div class="hg-text-transform entry-inner">

			<# if (data.transform_title !== '') { #>
				<label class="customize-control-title">{{ data.transform_title }}</label>
			<# } #>

			<select {{{ data.transform.link }}}>

					<# _.each( data.transform.choices, function( label, choice ) { 

					var selected_transform = ( data.transform.value === choice ) ? "selected" : ''; 
					#>					

					<option value="{{ choice }}" {{selected_transform}}>{{ label }}</option>

					<# } ) #>

				</select>
			
		</div>
		<# } #>


		<# if (  typeof ( data.weight ) !== 'undefined') { #>
		<div class="hg-font-weight entry-inner">

			<# if (data.weight_title !== '') { #>
				<label class="customize-control-title">{{ data.weight_title }}</label>
			<# } #>
			
				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { 

					var selected_weight = ( data.weight.value === choice ) ? "selected" : ''; 
					#>					

					<option value="{{ choice }}" {{selected_weight}}>{{ label }}</option>

					<# } ) #>

				</select>
				
			
		</div>
		<# } #>

		


	</div>

	<?php
}
}
}

?>