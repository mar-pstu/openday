<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    "{$slug}_archive",
    array(
        'title'            => __( 'Архивы, категории, блог', OPENDAY_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => '',
        'panel'            => "{$slug}_pages",
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_archive_publish_date_flag",
    array(
        'default'           => true,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_archive_publish_date_flag",
    array(
        'section'           => "{$slug}_archive",
        'label'             => __( 'Показывать дату публикации', OPENDAY_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_archive_comments_count_flag",
    array(
        'default'           => true,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_archive_comments_count_flag",
    array(
        'section'           => "{$slug}_archive",
        'label'             => __( 'Показывать количество комментариев возле каждой записи', OPENDAY_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/