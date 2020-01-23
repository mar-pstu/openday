<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };


$fotos = get_theme_mod( OPENDAY_SLUG . '_fotos', array() );


if ( is_array( $fotos ) && ! empty( $fotos ) ) {

	$result = __return_empty_array();

	for ( $i = 0; $i < get_theme_mod( OPENDAY_SLUG . '_fotos_number', 10 ); $i++ ) {
		if ( isset( $fotos[ $i ] ) && ! empty( $fotos[ $i ] ) ) {
			$attachment_id = ( is_numeric( $fotos[ $i ] ) ) ? sanitize_key( $fotos[ $i ] ) : attachment_url_to_postid( esc_url_raw( $fotos[ $i ] ) );
			if ( absint( $attachment_id ) ) {
				$result[] = sprintf(
					'<a class="fotos__item item" href="%1$s" rel="fotos"><figure class="overlay"><img class="thumbnail"src="#" data-src="%2$s" alt="%3$s"><figcapture class="title">%3$s</figcapture></figure></a>',
					wp_get_attachment_image_url( $attachment_id, 'full', false ),
					wp_get_attachment_image_url( $attachment_id, 'medium', false ),
					esc_attr( wp_get_attachment_caption( $attachment_id ) )
				);
			}
		}
	}


	if ( ! empty( $result ) ) {
		$name = 'fotos';
		$title = get_theme_mod( OPENDAY_SLUG . '_fotos_title', __( 'Галерея', OPENDAY_TEXTDOMAIN ) );
		$description = get_theme_mod( OPENDAY_SLUG . '_fotos_description', '' );
		$permalink = __return_empty_string();
		$label = __return_empty_string();
		wp_enqueue_script( 'blocksit' );
		wp_add_inline_script( 'blocksit', file_get_contents( OPENDAY_DIR . 'scripts/fotos.min.js' ), 'after' );
		$content = '<div class="gallery" id="fotos-gallery">' . implode( "\r\n", $result ) . '</div>';
		if ( function_exists( 'pll__' ) ) {
			$title = pll__( $title );
			$description = pll__( $description );
		}
		include get_theme_file_path( 'views/home/section.php' );
	}

}