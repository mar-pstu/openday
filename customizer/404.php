<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    OPENDAY_SLUG . '_error404',
    array(
        'title'            => __( 'Как к нам приехать', OPENDAY_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы. Якорь #error404', OPENDAY_TEXTDOMAIN ),
        'panel'            => OPENDAY_SLUG
    )
); /**/



$wp_customize->add_setting(
    OPENDAY_SLUG . '_error404_flag',
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_error404_flag',
    array(
        'section'           => OPENDAY_SLUG . '_error404',
        'label'             => __( 'Использовать секцию', OPENDAY_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/



$wp_customize->add_setting(
    OPENDAY_SLUG . '_error404_title',
    array(
        'default'           => __( 'Ошибка 404', OPENDAY_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_error404_title',
    array(
        'section'           => OPENDAY_SLUG . '_error404',
        'label'             => __( 'Заголовок', OPENDAY_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    OPENDAY_SLUG . '_error404_description',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_error404_description',
    array(
        'section'           => OPENDAY_SLUG . '_error404',
        'label'             => __( 'Подзаголовок', OPENDAY_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/


