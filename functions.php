<?php





define( 'OPENDAY_URL', get_template_directory_uri() . '/' );
define( 'OPENDAY_DIR', get_template_directory() . '/' );
define( 'OPENDAY_TEXTDOMAIN', 'openday' );
define( 'OPENDAY_VERSION', '1.0.5' );
define( 'OPENDAY_SLUG', 'openday' );
define( 'OPENDAY_ONE_MIN', 60 );
define( 'OPENDAY_ONE_HOUR', 60*60 );
define( 'OPENDAY_ONE_DAY', 60*60*24 );





get_template_part( 'includes/enqueue' );
get_template_part( 'includes/template-functions' );
get_template_part( 'includes/gutenberg' );






if ( function_exists( 'pll_register_string' ) ) {
	include get_theme_file_path( 'includes/register-strings.php' );
}







if ( is_customize_preview() ) {
	add_action( 'customize_register', function ( $wp_customize ) {
		$wp_customize->add_panel(
			OPENDAY_SLUG,
			array(
				'capability'      => 'edit_theme_options',
				'title'           => __( 'Настройки темы "Open Day"', OPENDAY_TEXTDOMAIN ),
				'priority'        => 200
			)
		);
		include get_theme_file_path( 'customizer/jumbotron.php' );
		include get_theme_file_path( 'customizer/aboutus.php' );
		include get_theme_file_path( 'customizer/lectors.php' );
		include get_theme_file_path( 'customizer/programs.php' );
		include get_theme_file_path( 'customizer/fotos.php' );
		include get_theme_file_path( 'customizer/news.php' );
		include get_theme_file_path( 'customizer/fotos.php' );
		include get_theme_file_path( 'customizer/direction.php' );
		include get_theme_file_path( 'customizer/404.php' );
		include get_theme_file_path( 'customizer/socials.php' );
	} );
}





function openday_theme_supports() {
	add_theme_support( 'menus' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_filter( 'widget_text', 'do_shortcode' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'automatic-feed-links' );
	add_image_size( 'thumbnail-3x2', 600, 400, true ); // размер миниатюры 3x2 с жестким кадрированием
	add_filter( 'image_size_names_choose', function ( $sizes ) {
		return array_merge( $sizes, array(
			'thumbnail-3x2' => __( '2x3 жесткое кадрирование', OPENDAY_TEXTDOMAIN ),
		) );
	}, 10, 1 );

	add_filter( 'widget_text', 'do_shortcode' );
	add_filter( 'wp_nav_menu_objects', function ( $items ) {
		foreach( $items as $item ) {
			if( openday\has_sub_menu( $item->ID, $items ) ) $item->classes[] = 'has-sub-menu';
		}
		return $items;
	} );
}
add_action( 'after_setup_theme', 'openday_theme_supports' );







function openday_load_textdomain() {
	load_theme_textdomain( OPENDAY_TEXTDOMAIN, OPENDAY_DIR . 'languages/' );
}
add_action( 'after_setup_theme', 'openday_load_textdomain' );






function openday_register_nav_menus() {
	register_nav_menus( array(
		'main'      => __( 'Главное меню', OPENDAY_TEXTDOMAIN ),
		'error404'  => __( 'Меню страницы 404', OPENDAY_TEXTDOMAIN ),
	) );
}
add_action( 'after_setup_theme', 'openday_register_nav_menus' );






function openday_register_sidebars() {
	register_sidebar( array(
		'name'             => __( 'Сайдбар подвала', OPENDAY_TEXTDOMAIN ),
		'id'               => 'basement',
		'description'      => '',
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	) );
	register_sidebar( array(
		'name'             => __( 'Колонка', OPENDAY_TEXTDOMAIN ),
		'id'               => 'column',
		'description'      => '',
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	) );
}
add_action( 'widgets_init', 'openday_register_sidebars' );