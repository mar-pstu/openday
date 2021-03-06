<?php





define( 'OPENDAY_URL', get_template_directory_uri() . '/' );
define( 'OPENDAY_DIR', get_template_directory() . '/' );
define( 'OPENDAY_TEXTDOMAIN', 'openday' );
define( 'OPENDAY_VERSION', '1.0.9' );
define( 'OPENDAY_SLUG', 'openday' );
define( 'OPENDAY_ONE_MIN', 60 );
define( 'OPENDAY_ONE_HOUR', 60*60 );
define( 'OPENDAY_ONE_DAY', 60*60*24 );




get_template_part( 'includes/default-settings' );
get_template_part( 'includes/enqueue' );
get_template_part( 'includes/template-functions' );
get_template_part( 'includes/gutenberg' );






if ( function_exists( 'pll_register_string' ) ) {
	include get_theme_file_path( 'includes/register-strings.php' );
}







if ( is_customize_preview() ) {
	include get_theme_file_path( 'includes/customizer.php' );
}





function openday_theme_supports() {
	add_theme_support( 'menus' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header', array(
		'default-image'          => false,
		'random-default'         => false,
		'flex-height'            => true,
		'flex-width'             => true,
		'default-text-color'     => 'ffffff',
		'header-text'            => true,
		'uploads'                => false,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
		'video'                  => false, // с 4.7
		'video-active-callback'  => false, // с 4.7
	) );
	add_theme_support( 'automatic-feed-links' );
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
	add_filter( 'term_description', 'shortcode_unautop');
	add_filter( 'term_description', 'do_shortcode' );
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
		'before_title'     => '<h3 class="widget__title title">',
		'after_title'      => '</h3>',
	) );
	register_sidebar( array(
		'name'             => __( 'Колонка', OPENDAY_TEXTDOMAIN ),
		'id'               => 'column',
		'description'      => '',
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title title">',
		'after_title'      => '</h3>',
	) );
}
add_action( 'widgets_init', 'openday_register_sidebars' );




function openday_like_processing() {
	if ( isset( $_GET[ 'security' ] ) && wp_verify_nonce( $_GET[ 'security' ], 'liked' ) ) {
		if ( isset( $_GET[ 'post_id' ] ) && ! empty( $_GET[ 'client_id' ] ) && ! empty( $_GET[ 'client_id' ] ) ) {
			$post_id = sanitize_key( $_GET[ 'post_id' ] );
			$client_id = sanitize_text_field( $_GET[ 'client_id' ] );
			$liked = get_post_meta(  $post_id, '_liked', false );
			$action = '';
			if ( in_array( $client_id, $liked ) ) {
				delete_post_meta( $post_id, '_liked', $client_id );
				$action = 'delete';
			} else {
				add_post_meta( sanitize_key( $_GET[ 'post_id' ] ), '_liked', $client_id, false );
				$action = 'add';
			}
			wp_send_json_success( array(
				'action' => $action,
				'count'  => count( get_post_meta(  $post_id, '_liked', false ) ),
			) );
		}
	}
	wp_die();
}
add_action( 'wp_ajax_liked', 'openday_like_processing' );
add_action( 'wp_ajax_nopriv_liked', 'openday_like_processing' );