<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$title = get_theme_mod( OPENDAY_SLUG . '_jumbotron_title', get_bloginfo( 'name' ) );
$excerpt = get_theme_mod( OPENDAY_SLUG . '_jumbotron_excerpt', get_bloginfo( 'description' ) );
$label = get_theme_mod( OPENDAY_SLUG . '_jumbotron_label', __( 'Подробней', OPENDAY_TEXTDOMAIN ) );
$page_id = openday\get_translate_id( get_theme_mod( OPENDAY_SLUG . '_jumbotron_page_id', '' ), 'page' );
$permalink = ( empty( $page_id ) ) ? '' : get_permalink( $page_id );
$bgi_src = get_theme_mod( OPENDAY_SLUG . '_jumbotron_bgi', OPENDAY_URL . 'images/jumbotron.svg' );
$timestamp = strtotime( get_theme_mod( OPENDAY_SLUG . '_jumbotron_timestamp', '' ) );
if ( $timestamp ) {
  $days = floor( $timestamp / ( 1000*60*60*24 ) );
  $hours = floor( ( $timestamp - ( $days*1000*60*60*24 ) ) / ( 1000*60*60 ) );
  $mins = floor( ( $timestamp - ( $days*1000*60*60*24 ) - ( $hours*1000*60*60 ) ) / ( 1000*60 ) );
  $secs = floor( ( $timestamp - ( $days*1000*60*60*24 ) - ( $hours*1000*60*60 ) - ( $mins*1000*60 ) ) / 1000 );
  if ( file_exists( OPENDAY_DIR . 'scripts/jumbotron.js' ) ) {
    wp_enqueue_script( 'openday-main' );
    wp_add_inline_script( 'openday-main', file_get_contents( OPENDAY_DIR . 'scripts/jumbotron.js' ), 'after' );
  }
}

if ( function_exists( 'pll__' ) ) {
  $title = pll__( $title );
  $excerpt = pll__( $excerpt );
  $label = pll__( $label );
}

include get_theme_file_path( 'views/home/jumbotron.php' );