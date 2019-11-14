<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$page_id = openday\get_translate_id( get_theme_mod( OPENDAY_SLUG . '_aboutus_page_id', '' ), 'page' );
$permalink = '';
$title = get_theme_mod( OPENDAY_SLUG . '_aboutus_title', '' );
$excerpt = get_theme_mod( OPENDAY_SLUG . '_aboutus_excerpt', '' );
$thumbnail = __return_empty_string();
$thumbnail_id = attachment_url_to_postid( esc_url_raw( get_theme_mod( OPENDAY_SLUG . '_aboutus_thumbnail', '' ) ) );
$label = get_theme_mod( OPENDAY_SLUG . '_aboutus_label', __( 'Подробней', OPENDAY_TEXTDOMAIN ) );


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	$excerpt = pll__( $excerpt );
	$label = pll__( $label );
}


if ( absint( $thumbnail_id ) ) {
	$thumbnail = ( wp_is_mobile() ) ? wp_get_attachment_image_url( $thumbnail_id, 'medium', false ) : wp_get_attachment_image_url( $thumbnail_id, 'large', false );
}


if ( ! empty( $page_id ) ) {

	$page = get_post( $page_id, OBJECT, 'raw' );

	if ( $page && ! is_wp_error( $page ) ) {
		$permalink = get_permalink( $page->ID );
		if ( empty( $title ) ) $title = apply_filters( 'the_title', $page->post_title, $page->ID );
		if ( empty( $excerpt ) ) $excerpt = get_the_title( $page->post_excerpt );
	}

}


include get_theme_file_path( 'views/home/aboutus.php' );