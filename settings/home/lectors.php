<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    "{$slug}_lectors",
    array(
        'title'            => __( 'Лекторы', OPENDAY_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы. Якорь #lectors', OPENDAY_TEXTDOMAIN ),
        'panel'            => "{$slug}_home",
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_lectors_flag",
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_lectors_flag",
    array(
        'section'           => "{$slug}_lectors",
        'label'             => __( 'Использовать секцию', OPENDAY_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    "{$slug}_lectors_page_id",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    "{$slug}_lectors_page_id",
    array(
        'section'           => "{$slug}_lectors",
        'label'             => __( 'Выбор страницы', OPENDAY_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_lectors_title",
    array(
        'default'           => __( 'Лекторы', OPENDAY_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_lectors_title",
    array(
        'section'           => "{$slug}_lectors",
        'label'             => __( 'Заголовок', OPENDAY_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_lectors_description",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    "{$slug}_lectors_description",
    array(
        'section'           => "{$slug}_lectors",
        'label'             => __( 'Подзаголовок', OPENDAY_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/




