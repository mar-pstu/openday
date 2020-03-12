jQuery( document ).ready( function () {
	var $container = jQuery( '#programs' );
	if ( $container.length > 0 ) {
		var $links = $container.find( '.headings li a' ).removeClass( 'active' ).eq( 0 ).addClass( 'active' ).end(),
			$tabs = $container.find( '.tab' ).removeClass( 'active' ).eq( 0 ).addClass( 'active' ).end();
		$links.on( 'click', function ( e ) {
			e.preventDefault();
			var $link = jQuery( this );
			$links.removeClass( 'active' );
			$link.addClass( 'active' );
			$tabs.removeClass( 'active' );
			$tabs.filter( jQuery( this ).attr( 'href' ) ).addClass( 'active' );
		} )
	}
} );