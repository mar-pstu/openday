<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    "{$slug}_socials",
    array(
        'title'            => __( 'Социальные сети', OPENDAY_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Список контактов в социальных сетях', OPENDAY_TEXTDOMAIN ),
        'panel'            => "{$slug}_lists",
    )
); /**/


foreach ( array(
	'linkedin'  => __( 'LinkedIn', OPENDAY_TEXTDOMAIN ),
	'whatsapp'  => __( 'WhatsApp', OPENDAY_TEXTDOMAIN ),
	'facebook'  => __( 'Facebook', OPENDAY_TEXTDOMAIN ),
	'twitter'   => __( 'Twitter', OPENDAY_TEXTDOMAIN ),
) as $key => $label ) {
	$wp_customize->add_setting(
	    "{$slug}_socials[$key]",
	    array(
	        'default'           => '',
	        'transport'         => 'reset',
	        'sanitize_callback' => 'esc_url',
	    )
	);
	$wp_customize->add_control(
	    "{$slug}_socials[$key]",
	    array(
	        'section'           => "{$slug}_socials",
	        'label'             => $label,
	        'type'              => 'text',
	    )
	); /**/
}