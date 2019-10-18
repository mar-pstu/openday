<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$page_id = openday\get_translate_id( get_theme_mod( OPENDAY_SLUG . '_lectors_page_id', '' ), 'page' );


if ( ! empty( $page_id ) ) {

	$page = get_post( $page_id, OBJECT, 'raw' );

	if ( $page && ! is_wp_error( $page ) ) {

		$name = 'lectors';
		$title = get_theme_mod( OPENDAY_SLUG . '_lectors_title', __( 'Лекторы', OPENDAY_TEXTDOMAIN ) );
		$description = get_theme_mod( OPENDAY_SLUG . '_lectors_description', '' );

		if ( function_exists( 'pll__' ) ) {
		  $title = pll__( $title );
		  $description = pll__( $description );
		}

		$content = do_shortcode( $page->post_content );

	  if ( empty( $title ) ) $title = apply_filters( 'the_title', $page->post_title, $page->ID );
	  if ( empty( $description ) ) $description = $page->post_excerpt;

		include get_theme_file_path( 'views/home/section.php' );
		
	}

}