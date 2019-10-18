<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };




/**
 * Подключение скриптов
 *
 * @param string $handle Имя / идентификатор скрипта
 * @param string $src URL на файл скрипта
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param bool $in_footer подключать в шапке или подвале
 */
function openday_scripts() {
	wp_enqueue_script( 'openday-main', OPENDAY_URL . 'scripts/main.min.js', array( 'jquery', 'fancybox' ), OPENDAY_VERSION, true );
	wp_localize_script( 'openday-main', 'OpenDayTheme', array( 'toTopBtn' => 'Наверх' ) );
	wp_enqueue_script( 'lazyload', OPENDAY_URL . 'scripts/lazyload.min.js', array( 'jquery' ), '1.7.6', true );
	wp_enqueue_script( 'fancybox', OPENDAY_URL . 'scripts/fancybox.min.js', array( 'jquery' ), '3.3.5', true );
	wp_add_inline_script( 'fancybox', "jQuery( '.fancybox' ).fancybox();", 'after' );
	wp_add_inline_script( 'lazyload', "jQuery( '.lazy' ).lazy();", 'after' );
	wp_enqueue_script( 'superembed', OPENDAY_URL . 'scripts/superembed.min.js', array( 'jquery' ), '3.1', true );
	wp_register_script( 'blocksit', OPENDAY_URL . 'scripts/blocksit.min.js', array( 'jquery', 'lazyload' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'openday_scripts' );






/**
 * Подключение стилей
 *
 * @param string $handle Имя / идентификатор стиля
 * @param string $src URL на файла стиля
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param string $media для каких устройств подключать
 */
function openday_styles() {
	wp_enqueue_style( 'openday-main', OPENDAY_URL . 'styles/main.min.css', array(), OPENDAY_VERSION, 'all' );
	wp_enqueue_style( 'openday-font', 'https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,900&amp;display=swap&amp;subset=cyrillic-ext', array(), '14', 'all' );
	wp_enqueue_style( 'fancybox', OPENDAY_URL . 'styles/fancybox.min.css', array(), '3.3.5', 'all' );
}
add_action( 'wp_enqueue_scripts', 'openday_styles', 10, 0 );







function openday_ctitical_styles() {
	if ( file_exists( OPENDAY_DIR . 'styles/critical.min.css' ) ) {
		echo '<style type="text/css">' . file_get_contents( OPENDAY_DIR . 'styles/critical.min.css' ) . '</style>';
	}
}
add_action( 'wp_head', 'openday_ctitical_styles', 10, 0 );