<?php


get_header();



foreach ( array(
    'jumbotron',
    'aboutus',
    'lectors',
    'programs',
    'fotos',
    'news',
    'direction',
) as $key ) {
    if ( get_theme_mod( OPENDAY_SLUG . "_{$key}_flag", false ) )
        get_template_part( "parts/home/$key" );
}



get_footer();