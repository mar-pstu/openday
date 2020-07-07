<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$page_id = openday\get_translate_id( get_theme_mod( OPENDAY_SLUG . '_direction_page_id', '' ), 'page' );


if ( ! empty( $page_id ) ) {

  $page = get_post( $page_id, OBJECT, 'raw' );

  if ( $page && ! is_wp_error( $page ) ) {

    $name = 'direction';
    $title = get_theme_mod( OPENDAY_SLUG . '_direction_title', __( 'Как к нам приехать', OPENDAY_TEXTDOMAIN ) );
    $description = get_theme_mod( OPENDAY_SLUG . '_direction_description', '' );

    if ( function_exists( 'pll__' ) ) {
      $title = pll__( $title );
      $description = pll__( $description );
    }

    $content = do_shortcode( $page->post_content );
    
    if ( empty( $description ) ) $description = $page->post_excerpt;

    include get_theme_file_path( 'views/home/section.php' );
    
  }

}