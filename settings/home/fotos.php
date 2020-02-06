<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    "{$slug}_fotos",
    array(
        'title'            => __( 'Фото', OPENDAY_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы. Якорь #fotos', OPENDAY_TEXTDOMAIN ),
        'panel'            => "{$slug}_home",
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_fotos_flag",
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_fotos_flag",
    array(
        'section'           => "{$slug}_fotos",
        'label'             => __( 'Использовать секцию', OPENDAY_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    "{$slug}_fotos_title",
    array(
        'default'           => __( 'Галерея', OPENDAY_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_fotos_title",
    array(
        'section'           => "{$slug}_fotos",
        'label'             => __( 'Заголовок', OPENDAY_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_fotos_description",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    "{$slug}_fotos_description",
    array(
        'section'           => "{$slug}_fotos",
        'label'             => __( 'Подзаголовок', OPENDAY_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/




$wp_customize->add_setting(
    "{$slug}_fotos_number",
    array(
        'default'           => 10,
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    "{$slug}_fotos_number",
    array(
        'section'           => "{$slug}_fotos",
        'label'             => __( 'Количество фото', OPENDAY_TEXTDOMAIN ),
        'type'              => 'number',
        'input_attrs'       => array(
            'min'             => 1,
            'max'             => 50,
        ),
    )
); /**/





if ( class_exists( 'CustomizeImageGalleryControl\Control' ) ) {
    $wp_customize->add_setting(
        "{$slug}_fotos",
        array(
            'default'           => __return_empty_array(),
            'transport'         => 'reset',
            'sanitize_callback' => 'wp_parse_id_list',
        )
    );
    $wp_customize->add_control( new CustomizeImageGalleryControl\Control(
        $wp_customize,
        "{$slug}_fotos",
        array(
            'label'          => __( 'Фото', OPENDAY_TEXTDOMAIN ),
            'section'        => "{$slug}_fotos",
            'settings'       => "{$slug}_fotos",
            'type'           => 'image_gallery',
        )
    ) );
} else {
    for ( $i = 0; $i < get_theme_mod( "{$slug}_fotos_number", 10 ); $i++ ) { 
        $wp_customize->add_setting(
            "{$slug}_fotos[{$i}]",
            array(
                'default'           => '',
                'transport'         => 'reset',
                'sanitize_callback' => 'sanitize_url',
            )
        );
        $wp_customize->add_control(
           new WP_Customize_Image_Control(
               $wp_customize,
               "{$slug}_fotos[{$i}]",
               array(
                   'label'         => sprintf( __( 'Фото %d', OPENDAY_TEXTDOMAIN ), ( $i + 1 ) ),
                   'section'       => "{$slug}_fotos",
                   'settings'      => "{$slug}_fotos[{$i}]",
               )
           )
        );
    }
}