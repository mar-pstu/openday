<?php 


/**
 * Регистрация блоков Гутенберга
 */



if ( ! defined( 'ABSPATH' ) ) { exit; };



function block_assets() {
	if ( is_admin() && ( ! wp_doing_ajax() ) ) {
		wp_enqueue_script( 'openday-gutenberg', OPENDAY_URL . 'scripts/gutenberg.js', array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ), OPENDAY_VERSION, 'in_footer' );
	    wp_enqueue_style( 'openday-gutenberg', OPENDAY_URL . 'styles/gutenberg.css', array( 'wp-edit-blocks' ), OPENDAY_VERSION );
	}
}
add_action( 'enqueue_block_assets', 'block_assets' );





function openday_register_blocks() {
	register_block_type( 'openday/person', array(
		'editor_style' => 'openday-gutenberg',
		'editor_script' => 'openday-gutenberg',
	) );
	register_block_type( 'openday/clearfix', array(
		'editor_style' => 'openday-gutenberg',
		'editor_script' => 'openday-gutenberg',
	) );
	register_block_type( 'openday/program', array(
		'editor_style' => 'openday-gutenberg',
		'editor_script' => 'openday-gutenberg',
	) );
	register_block_type( 'openday/step', array(
		'editor_style' => 'openday-gutenberg',
		'editor_script' => 'openday-gutenberg',
	) );
	register_block_type( 'openday/widget', array(
		'editor_style' => 'openday-gutenberg',
		'editor_script' => 'openday-gutenberg',
	) );
}
add_action( 'init', 'openday_register_blocks' );
