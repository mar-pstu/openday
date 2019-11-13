<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    OPENDAY_SLUG . '_jumbotron',
    array(
        'title'            => __( 'Первый экран', OPENDAY_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы. Якорь #jumbotron', OPENDAY_TEXTDOMAIN ),
        'panel'            => OPENDAY_SLUG
    )
); /**/



$wp_customize->add_setting(
    OPENDAY_SLUG . '_jumbotron_flag',
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_jumbotron_flag',
    array(
        'section'           => OPENDAY_SLUG . '_jumbotron',
        'label'             => __( 'Использовать секцию', OPENDAY_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    OPENDAY_SLUG . '_jumbotron_page_id',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_key',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_jumbotron_page_id',
    array(
        'section'           => OPENDAY_SLUG . '_jumbotron',
        'label'             => __( 'Выбор страницы', OPENDAY_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/



$wp_customize->add_setting(
    OPENDAY_SLUG . '_jumbotron_title',
    array(
        'default'           => get_bloginfo( 'name' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_jumbotron_title',
    array(
        'section'           => OPENDAY_SLUG . '_jumbotron',
        'label'             => __( 'Заголовок', OPENDAY_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    OPENDAY_SLUG . '_jumbotron_excerpt',
    array(
        'default'           => get_bloginfo( 'description' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_jumbotron_excerpt',
    array(
        'section'           => OPENDAY_SLUG . '_jumbotron',
        'label'             => __( 'Описание', OPENDAY_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/




$wp_customize->add_setting(
    OPENDAY_SLUG . '_jumbotron_label',
    array(
        'default'           => __( 'Подробней', OPENDAY_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_jumbotron_label',
    array(
        'section'           => OPENDAY_SLUG . '_jumbotron',
        'label'             => __( 'Текст кнопки', OPENDAY_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    OPENDAY_SLUG . '_jumbotron_bgi',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_url',
    )
);
$wp_customize->add_control(
   new WP_Customize_Image_Control(
       $wp_customize,
       OPENDAY_SLUG . '_jumbotron_bgi',
       array(
           'label'      => __( 'Фон', OPENDAY_TEXTDOMAIN ),
           'section'    => OPENDAY_SLUG . '_jumbotron',
           'settings'   => OPENDAY_SLUG . '_jumbotron_bgi'
       )
   )
);


$wp_customize->add_setting(
    OPENDAY_SLUG . '_jumbotron_timestamp',
    array(
        'default'           => '',
        'transport'         => 'reset',
    )
);
$wp_customize->add_control(
   new WP_Customize_Date_Time_Control(
       $wp_customize,
       OPENDAY_SLUG . '_jumbotron_timestamp',
       array(
           'label'      => __( 'Дата и время проведения мероприятия', OPENDAY_TEXTDOMAIN ),
           'section'    => OPENDAY_SLUG . '_jumbotron',
           'settings'   => OPENDAY_SLUG . '_jumbotron_timestamp'
       )
   )
);
