jQuery( document ).ready( function () {
	jQuery( 'body' ).on( 'click', '.timepicker', function () {
		jQuery( this ).datetimepicker( {
			datepicker: false,
			format:'H:i'
		} );
	} );
} );