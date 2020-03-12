( function () {

	jQuery( 'body' ).on( 'click', '[data-share-url]', function ( e ) {

		e.preventDefault();

		var type = jQuery( e.target ).attr( 'data-share-type' );
		var url = jQuery( this ).attr( 'data-share-url' );
		var share;

		if ( url.length == 0 ) {
			url = window.location;
		}

		console.log( url );

		switch ( type ) {
			case 'email':
				share = 'mailto:?&subject=&body=' + url;
				break;
			case 'facebook':
				share = 'https://www.facebook.com/sharer/sharer.php?u=' + url;
				break;
			case 'twitter':
				share = 'https://twitter.com/intent/tweet?text=' + url;
				break;
			case 'viber':
				share = 'viber://forward?text=' + url;
				break;
			case 'linkedin':
				share = 'https://www.linkedin.com/shareArticle?mini=true&url=' + url;
				break;
			case 'telegram':
				share = 'https://telegram.me/share/url?url=' + url;
				break;
			case 'whatsapp':
				share = 'whatsapp://send?text=' + url;
				break;
			default:
				share = '';
				break;
		}

		window.open( share, '' , 'toolbar=0,status=0,width=626,height=436' );

	} );

} )();