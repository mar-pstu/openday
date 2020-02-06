<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
    "{$slug}_news",
    array(
        'title'            => __( 'Новости', OPENDAY_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы. Якорь #news. Новости (посты) берутся из категории.', OPENDAY_TEXTDOMAIN ),
        'panel'            => OPENDAY_SLUG
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_news_flag",
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_news_flag",
    array(
        'section'           => "{$slug}_news",
        'label'             => __( 'Использовать секцию', OPENDAY_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    "{$slug}_news_cat_id",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    "{$slug}_news_cat_id",
    array(
        'section'           => "{$slug}_news",
        'label'             => __( 'Выбор категории', OPENDAY_TEXTDOMAIN ),
        'type'              => 'select',
        'choices'           => openday\get_categories_choices(),
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_news_title",
    array(
        'default'           => __( 'Новости', OPENDAY_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_news_title",
    array(
        'section'           => "{$slug}_news",
        'label'             => __( 'Заголовок', OPENDAY_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_news_description",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    "{$slug}_news_description",
    array(
        'section'           => "{$slug}_news",
        'label'             => __( 'Подзаголовок', OPENDAY_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/




$wp_customize->add_setting(
    "{$slug}_news_label",
    array(
        'default'           => __( 'Смотреть все новости', OPENDAY_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_news_label",
    array(
        'section'           => "{$slug}_news",
        'label'             => __( 'Текст кнопки', OPENDAY_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/