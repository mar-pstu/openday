<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    "{$slug}_programs",
    array(
        'title'            => __( 'Программа мероприятия', OPENDAY_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы "Программа". Якорь #programs. Если у страницы есть дочерние, то будут сформированы вкладки.', OPENDAY_TEXTDOMAIN ),
        'panel'            => "{$slug}_home",
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_programs_flag",
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_programs_flag",
    array(
        'section'           => "{$slug}_programs",
        'label'             => __( 'Использовать секцию', OPENDAY_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    "{$slug}_programs_page_id",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    "{$slug}_programs_page_id",
    array(
        'section'           => "{$slug}_programs",
        'label'             => __( 'Выбор страницы', OPENDAY_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_programs_title",
    array(
        'default'           => __( 'Программа', OPENDAY_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_programs_title",
    array(
        'section'           => "{$slug}_programs",
        'label'             => __( 'Заголовок', OPENDAY_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_programs_description",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    "{$slug}_programs_description",
    array(
        'section'           => "{$slug}_programs",
        'label'             => __( 'Подзаголовок', OPENDAY_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/




