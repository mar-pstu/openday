<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };







/**
 * Перевод сблоков
 * */
foreach ( array(
    '_error404_title',
    '_error404_description',
    '_aboutus_title',
    '_aboutus_excerpt',
    '_aboutus_label',
    '_direction_title',
    '_direction_description',
    '_fotos_title',
    '_fotos_description',
    '_jumbotron_title',
    '_jumbotron_excerpt',
    '_jumbotron_label',
    '_lectors_title',
    '_lectors_description',
    '_news_title',
    '_news_description',
    '_news_label',
    '_programs_title',
    '_programs_description',
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
