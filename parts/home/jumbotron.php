<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$title = get_theme_mod( OPENDAY_SLUG . '_jumbotron_title', get_bloginfo( 'name' ) );
$excerpt = get_theme_mod( OPENDAY_SLUG . '_jumbotron_excerpt', get_bloginfo( 'description' ) );
$label = get_theme_mod( OPENDAY_SLUG . '_jumbotron_label', __( 'Подробней', OPENDAY_TEXTDOMAIN ) );
$page_id = openday\get_translate_id( get_theme_mod( OPENDAY_SLUG . '_jumbotron_page_id', '' ), 'page' );
$permalink = ( empty( $page_id ) ) ? '' : get_permalink( $page_id );
$bgi_src = get_theme_mod( OPENDAY_SLUG . '_jumbotron_bgi', OPENDAY_URL . 'images/jumbotron.svg' );
$timing_of = strtotime( get_theme_mod( OPENDAY_SLUG . '_jumbotron_timestamp', '' ) );
$current = time();
$time_left = false;
$days = 0;
$hours = 0;
$mins = 0;
$secs = 0;

if ( empty( $bgi_src ) ) {
	$bgi_src = OPENDAY_URL . 'images/jumbotron.svg';
}


if ( $timing_of > $current ) {
  $time_left = $timing_of - $current;
  $days = floor( $time_left / OPENDAY_ONE_DAY );
  $hours = floor( ( $time_left - ( $days * OPENDAY_ONE_DAY ) ) / OPENDAY_ONE_HOUR );
  $mins = floor( ( $time_left - ( $days * OPENDAY_ONE_DAY ) - ( $hours * OPENDAY_ONE_HOUR ) ) / OPENDAY_ONE_MIN );
  $secs = floor( $time_left - ( $days * OPENDAY_ONE_DAY ) - ( $hours * OPENDAY_ONE_HOUR ) - ( $mins * OPENDAY_ONE_MIN ) );  
}

if ( function_exists( 'pll__' ) ) {
  $title = pll__( $title );
  $excerpt = pll__( $excerpt );
  $label = pll__( $label );
}

include get_theme_file_path( 'views/home/jumbotron.php' );