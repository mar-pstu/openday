<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    OPENDAY_SLUG . '_socials',
    array(
        'title'            => __( 'Социальные сети', OPENDAY_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Список контактов в социальных сетях', OPENDAY_TEXTDOMAIN ),
        'panel'            => OPENDAY_SLUG
    )
); /**/


foreach ( array(
	'linkedin'  => __( 'LinkedIn', OPENDAY_TEXTDOMAIN ),
	'whatsapp'  => __( 'WhatsApp', OPENDAY_TEXTDOMAIN ),
	'facebook'  => __( 'Facebook', OPENDAY_TEXTDOMAIN ),
	'twitter'   => __( 'Twitter', OPENDAY_TEXTDOMAIN ),
) as $key => $label ) {
	$wp_customize->add_setting(
	    OPENDAY_SLUG . "_socials[$key]",
	    array(
	        'default'           => '',
	        'transport'         => 'reset',
	        'sanitize_callback' => 'esc_url',
	    )
	);
	$wp_customize->add_control(
	    OPENDAY_SLUG . "_socials[$key]",
	    array(
	        'section'           => OPENDAY_SLUG . '_socials',
	        'label'             => $label,
	        'type'              => 'text',
	    )
	); /**/
}