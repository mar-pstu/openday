jQuery( document ).ready( function () {
	var $container = jQuery( '#counter' ),
		timing_of = new Date( parseInt( $container.attr( 'data-timing-of' ) ) ),
		current_time = new Date(),
		time_left,
		$days = $container.find( '#days .value' ),
		$hours = $container.find( '#hours .value' ),
		$mins = $container.find( '#mins .value' ),
		$secs = $container.find( '#secs .value' );
	if ( timing_of > current_time ) {
		time_left = timing_of.valueOf() - current_time.valueOf();
		setInterval( function () {
			if ( time_left > 1000 ) {
				time_left = time_left - 1000;
				var days = Math.floor( time_left / ( 1000*60*60*24 ) ),
					hours = Math.floor( ( time_left - ( days*1000*60*60*24 ) ) / ( 1000*60*60 ) ),
					mins = Math.floor( ( time_left - ( days*1000*60*60*24 ) - ( hours*1000*60*60 ) ) / ( 1000*60 ) ),
					secs = Math.floor( ( time_left - ( days*1000*60*60*24 ) - ( hours*1000*60*60 ) - ( mins*1000*60 ) ) / 1000 );
				$days.text( days );
				$hours.text( hours );
				$mins.text( mins );
				$secs.text( secs );
			}
		}, 1000 );
	}
} );

// ГЛАВНАЯ СТРАНИЦА табы для секции "Программа"
jQuery( document ).ready( function () {
	var $container = jQuery( '#programs-tabs' ),
		$links = $container.find( '.tabs-headings li a' ).removeClass( 'active' ).eq( 0 ).addClass( 'active' ).end(),
		$tabs = $container.find( '.content' ).removeClass( 'active' ).eq( 0 ).addClass( 'active' ).end();
	$links.on( 'click', function ( e ) {
		e.preventDefault();
		var $link = jQuery( this );
		$links.removeClass( 'active' );
		$link.addClass( 'active' );
		$tabs.removeClass( 'active' );
		$tabs.filter( jQuery( this ).attr( 'href' ) ).addClass( 'active' );
	} )
} );