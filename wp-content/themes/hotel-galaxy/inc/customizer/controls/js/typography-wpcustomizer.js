(function(api){

	api.controlConstructor['hotelgalaxy-customizer-typography'] = api.Control.extend({
		ready: function() {
			var control = this;


			control.container.on('change','.hotelgalaxy-font-family select', function(){

				var _this = jQuery( this ),
				_value = _this.val(),
				categoryID = _this.attr( 'data-category' ),
				variantsID = _this.attr( 'data-variants' );

				control.settings['family'].set( _this.val());

				if ( 'undefined' == typeof control.settings['category'] || 'undefined' == typeof control.settings['variant'] ) {
					return;
				}

				setTimeout(function(){

					var googleFonts = hotelgalaxyAllGoogleFonts.googleFonts;

					var id = _value.split(' ').join('_').toLowerCase();

					var font_variant = jQuery( 'select[name="' + variantsID + '"]' );
					var font_category = jQuery( 'input[name="' + categoryID + '"' );

					if( id in googleFonts ){

						

						_this.closest( '.hotelgalaxy-font-family' ).next( 'div' ).show();

						

						font_variant.find( 'option' ).remove();
						

						jQuery.each( googleFonts[ id ].variants, function( key, value ) {						
							
							font_variant.append( jQuery( '<option></option>' ).attr( 'value', value ).text( value ) );
							
						} );						

						// variants
						control.settings[ 'variant' ].set( googleFonts[ id ].variants );
						
						// category
						control.settings[ 'category' ].set( googleFonts[ id ].category );
						font_category.val( googleFonts[ id ].category );

					}else{

						_this.closest( '.hotelgalaxy-font-family' ).next( 'div' ).hide();

						control.settings[ 'category' ].set( '' )
						control.settings[ 'variant' ].set( '' )

						font_category.val( '' );
						font_variant.find( 'option' ).remove();
					}

				});				
			});			
		}
	});

})(wp.customize);

jQuery( document ).ready( function( $ ) {

	$('.hotelgalaxy-font-family select').select2();

	$('.hotelgalaxy-font-family').each(function(key, value){

		var _this = $( this );

		var selectVal = _this.find( 'select' ).val();		

		if ( $.inArray( selectVal , systemFonts ) !== -1 ) {

			_this.next( '.hotelgalaxy-font-variant' ).hide();

		}
	});

	$( '.hotelgalaxy-font-variant' ).each( function( key, value ) {

		var _this = $( this );

		var _value = _this.data( 'saved-value' );

		if ( _value ) {
			_value = _value.toString().split( ',' );
		}

		_this.find( '.hg-font-variant' ).select2().val( _value ).trigger( 'change.select2' );

	} );

});