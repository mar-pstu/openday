jQuery( document ).ready( function () {
	jQuery( '.lazy' ).lazy();
	jQuery( '.fancybox' ).fancybox();
	jQuery( '.wp-block-gallery .blocks-gallery-item img' ).closest( 'a' ).fancybox();
} );