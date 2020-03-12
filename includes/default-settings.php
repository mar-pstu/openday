<?php



namespace openday;



if ( ! defined( 'ABSPATH' ) ) { exit; };



function get_default_setting( $key ) {

	$settings = array(

		// главная страница - первый экран
		''     => '',

	);

	return ( array_key_exists( $key, $settings ) ) ? $settings[ $key ] : '';

}

add_filter( 'get_default_setting', 'openday\get_default_setting', 10, 1 );


