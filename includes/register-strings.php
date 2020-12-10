<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };







/**
 * Перевод сблоков
 * */
foreach ( array(
    'error404_title',
    'error404_description',
    'aboutus_title',
    'aboutus_excerpt',
    'aboutus_permalink',
    'aboutus_label',
    'direction_title',
    'direction_description',
    'fotos_title',
    'fotos_description',
    'jumbotron_title',
    'jumbotron_excerpt',
    'jumbotron_label',
    'lectors_title',
    'lectors_description',
    'news_title',
    'news_description',
    'news_label',
    'programs_title',
    'programs_description',
) as $key ) {
    $value = wp_strip_all_tags( get_theme_mod( OPENDAY_SLUG . '_' . $key, '' ) );
    if ( ! empty( $value ) ) {
        pll_register_string( $key, $value, OPENDAY_TEXTDOMAIN, false );
    }
}






/**
 * Перевод контактов
 * */
if ( ! empty( $contacts = get_theme_mod( OPENDAY_SLUG . '_socials', array() ) ) ) {
	foreach ( $contacts as $key => $value ) {
		pll_register_string( "contacts_$key", $value, OPENDAY_TEXTDOMAIN, false );
	}
}
