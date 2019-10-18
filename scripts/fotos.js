jQuery( document ).ready( function () {
	function GalleryInit () {
		var args;
		var settings;
		if ( screen.width > 480 && screen.width <= 768 ) {
			args = {
				numOfCol: 3,
				offsetX: 5,
				offsetY: 5,
			};
		} else if ( screen.width > 768 && screen.width <= 980 ) {
			args = {
				numOfCol: 4,
				offsetX: 5,
				offsetY: 5,
			};
		} else if ( screen.width > 980 ) {
			args = {
				numOfCol: 5,
				offsetX: 5,
				offsetY: 5,
			};
		}
		jQuery( '#fotos-gallery' ).BlocksIt( jQuery.extend( {
			numOfCol: 2,
			offsetX: 2,
			offsetY: 2,
			blockElement: '.item',
		}, args ) );
	}
	jQuery( "#fotos-gallery .thumbnail" ).lazy( {
		afterLoad: GalleryInit,
	} );
	jQuery( window ).resize( GalleryInit );
	jQuery( "#fotos-gallery .link" ).fancybox( {} );
	GalleryInit();
} );