<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    OPENDAY_SLUG . '_fotos',
    array(
        'title'            => __( 'Фото', OPENDAY_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы. Якорь #fotos', OPENDAY_TEXTDOMAIN ),
        'panel'            => OPENDAY_SLUG
    )
); /**/



$wp_customize->add_setting(
    OPENDAY_SLUG . '_fotos_flag',
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_fotos_flag',
    array(
        'section'           => OPENDAY_SLUG . '_fotos',
        'label'             => __( 'Использовать секцию', OPENDAY_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    OPENDAY_SLUG . '_fotos_title',
    array(
        'default'           => __( 'Галерея', OPENDAY_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_fotos_title',
    array(
        'section'           => OPENDAY_SLUG . '_fotos',
        'label'             => __( 'Заголовок', OPENDAY_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    OPENDAY_SLUG . '_fotos_description',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    OPENDAY_SLUG . '_fotos_description',
    array(
        'section'           => OPENDAY_SLUG . '_fotos',
        'label'             => __( 'Подзаголовок', OPENDAY_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/





if ( class_exists( 'CustomizeImageGalleryControl\Control' ) ) {
    $wp_customize->add_setting(
        OPENDAY_SLUG . '_fotos',
        array(
            'default'           => array(),
            'transport'         => 'reset',
            'sanitize_callback' => 'wp_parse_id_list',
        )
    );
    $wp_customize->add_control( new CustomizeImageGalleryControl\Control(
        $wp_customize,
        OPENDAY_SLUG . '_fotos',
        array(
            'label'          => __( 'Фото', OPENDAY_TEXTDOMAIN ),
            'section'        => OPENDAY_SLUG . '_fotos',
            'settings'       => OPENDAY_SLUG . '_fotos',
            'type'           => 'image_gallery',
        )
    ) );
} else {
    for ( $i = 0; $i < 8; $i++ ) { 
        $wp_customize->add_setting(
            OPENDAY_SLUG . "_fotos[{$i}]",
            array(
                'default'           => '',
                'transport'         => 'reset',
                'sanitize_callback' => 'sanitize_url',
            )
        );
        $wp_customize->add_control(
           new WP_Customize_Image_Control(
               $wp_customize,
               OPENDAY_SLUG . "_fotos[{$i}]",
               array(
                   'label'         => __( 'Фото', OPENDAY_TEXTDOMAIN ) . ' ' . ( $i + 1 ),
                   'section'       => OPENDAY_SLUG . '_fotos',
                   'settings'      => OPENDAY_SLUG . "_fotos[{$i}]",
               )
           )
        );
    }
}