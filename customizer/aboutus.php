<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    OPENDAY_SLUG . '_aboutus',
    array(
        'title'            => __( 'О нас', OPENDAY_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы. Якорь #aboutus', OPENDAY_TEXTDOMAIN ),
        'panel'            => OPENDAY_SLUG
    )
); /**/



$wp_customize->add_setting(
    OPENDAY_SLUG . '_aboutus_flag',
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_aboutus_flag',
    array(
        'section'           => OPENDAY_SLUG . '_aboutus',
        'label'             => __( 'Использовать секцию', OPENDAY_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    OPENDAY_SLUG . '_aboutus_page_id',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_aboutus_page_id',
    array(
        'section'           => OPENDAY_SLUG . '_aboutus',
        'label'             => __( 'Выбор страницы', OPENDAY_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/



$wp_customize->add_setting(
    OPENDAY_SLUG . '_aboutus_title',
    array(
        'default'           => __( 'О нас', OPENDAY_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_aboutus_title',
    array(
        'section'           => OPENDAY_SLUG . '_aboutus',
        'label'             => __( 'Заголовок', OPENDAY_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    OPENDAY_SLUG . '_aboutus_excerpt',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_aboutus_excerpt',
    array(
        'section'           => OPENDAY_SLUG . '_aboutus',
        'label'             => __( 'Описание', OPENDAY_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/




$wp_customize->add_setting(
    OPENDAY_SLUG . '_aboutus_label',
    array(
        'default'           => __( 'Подробней', OPENDAY_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_aboutus_label',
    array(
        'section'           => OPENDAY_SLUG . '_aboutus',
        'label'             => __( 'Текст кнопки', OPENDAY_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    OPENDAY_SLUG . '_aboutus_thumbnail',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_url',
    )
);
$wp_customize->add_control(
   new WP_Customize_Image_Control(
       $wp_customize,
       OPENDAY_SLUG . '_aboutus_thumbnail',
       array(
           'label'      => __( 'Фон', OPENDAY_TEXTDOMAIN ),
           'section'    => OPENDAY_SLUG . '_aboutus',
           'settings'   => OPENDAY_SLUG . '_aboutus_thumbnail'
       )
   )
);

