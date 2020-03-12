jQuery( document ).ready( function () {

	jQuery( 'body' ).on( 'click', '.burger, #nav .bg, #nav .close', function() {
		if ( jQuery( 'body' ).attr( 'data-nav' ) == 'active' ) {
			jQuery( '#nav' ).removeClass( 'nav--active' );
			jQuery( '.burger' ).removeClass( 'burger--active' );
			jQuery( 'body' ).attr( 'data-nav', 'inactive' ).css( { 'overflow': 'auto' } );
		} else {
			jQuery( '#nav' ).addClass( 'nav--active' );
			jQuery( '.burger' ).addClass( 'burger--active' );
			jQuery( 'body' ).attr( 'data-nav', 'active' ).css( { 'overflow': 'hidden' } );
		}
	} )

} );
