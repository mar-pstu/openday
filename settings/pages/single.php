<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    "{$slug}_single",
    array(
        'title'            => __( 'Пост', OPENDAY_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => '',
        'panel'            => "{$slug}_pages",
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_single_thumbnail_flag",
    array(
        'default'           => true,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_single_thumbnail_flag",
    array(
        'section'           => "{$slug}_single",
        'label'             => __( 'Показывать миниатюру в заголовке', OPENDAY_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/