<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$page_id = openday\get_translate_id( get_theme_mod( OPENDAY_SLUG . '_aboutus_page_id', '' ), 'page' );
$permalink = '';
$title = get_theme_mod( OPENDAY_SLUG . '_aboutus_title', '' );
$excerpt = get_theme_mod( OPENDAY_SLUG . '_aboutus_excerpt', '' );
$thumbnail = '';
$thumbnail_id = attachment_url_to_postid( esc_url_raw( get_theme_mod( OPENDAY_SLUG . '_aboutus_thumbnail', '' ) ) );
$label = get_theme_mod( OPENDAY_SLUG . '_aboutus_label', __( 'Подробней', OPENDAY_TEXTDOMAIN ) );
$alt = '';


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	$excerpt = pll__( $excerpt );
	$label = pll__( $label );
}


if ( absint( $thumbnail_id ) ) {
	$thumbnail = ( wp_is_mobile() ) ? wp_get_attachment_image_url( $thumbnail_id, 'medium', false ) : wp_get_attachment_image_url( $thumbnail_id, 'large', false );
	$alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
}


if ( ! empty( $page_id ) ) {

	$page = get_post( $page_id, OBJECT, 'raw' );

	if ( $page && ! is_wp_error( $page ) ) {
		if ( empty( trim( $excerpt ) ) ) {
			$parts = get_extended( $page->post_content );
			$excerpt = do_shortcode( $parts[ 'main' ], false );
		}
		$permalink = get_permalink( $page->ID );
	}

}


include get_theme_file_path( 'views/home/aboutus.php' );