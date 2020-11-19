<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    "{$slug}_jumbotron",
    array(
        'title'            => __( 'Первый экран', OPENDAY_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы. Якорь #jumbotron', OPENDAY_TEXTDOMAIN ),
        'panel'            => "{$slug}_home",
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_jumbotron_flag",
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_jumbotron_flag",
    array(
        'section'           => "{$slug}_jumbotron",
        'label'             => __( 'Использовать секцию', OPENDAY_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    "{$slug}_jumbotron_page_id",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_key',
    )
);
$wp_customize->add_control(
    "{$slug}_jumbotron_page_id",
    array(
        'section'           => "{$slug}_jumbotron",
        'label'             => __( 'Выбор страницы', OPENDAY_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/


$wp_customize->add_setting(
    "{$slug}_jumbotron_permalink",
    array(
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_jumbotron_permalink",
    array(
        'section'           => "{$slug}_jumbotron",
        'label'             => __( 'Ссылка на описание', OPENDAY_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/


$wp_customize->add_setting(
    "{$slug}_jumbotron_title",
    array(
        'default'           => get_bloginfo( 'name' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_jumbotron_title",
    array(
        'section'           => "{$slug}_jumbotron",
        'label'             => __( 'Заголовок', OPENDAY_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_jumbotron_excerpt",
    array(
        'default'           => get_bloginfo( 'description' ),
        'transport'         => 'reset',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    "{$slug}_jumbotron_excerpt",
    array(
        'section'           => "{$slug}_jumbotron",
        'label'             => __( 'Ссылка', OPENDAY_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/




$wp_customize->add_setting(
    "{$slug}_jumbotron_label",
    array(
        'default'           => __( 'Подробней', OPENDAY_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_jumbotron_label",
    array(
        'section'           => "{$slug}_jumbotron",
        'label'             => __( 'Текст кнопки', OPENDAY_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_jumbotron_bgi",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
   new WP_Customize_Image_Control(
       $wp_customize,
       "{$slug}_jumbotron_bgi",
       array(
           'label'      => __( 'Фон', OPENDAY_TEXTDOMAIN ),
           'section'    => "{$slug}_jumbotron",
           'settings'   => "{$slug}_jumbotron_bgi",
       )
   )
);


$wp_customize->add_setting(
    "{$slug}_jumbotron_timestamp",
    array(
        'default'           => '',
        'transport'         => 'reset',
    )
);
$wp_customize->add_control(
   new WP_Customize_Date_Time_Control(
       $wp_customize,
       "{$slug}_jumbotron_timestamp",
       array(
           'label'      => __( 'Дата и время проведения мероприятия', OPENDAY_TEXTDOMAIN ),
           'section'    => "{$slug}_jumbotron",
           'settings'   => "{$slug}_jumbotron_timestamp",
       )
   )
);
