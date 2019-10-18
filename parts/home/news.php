<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



$cat_id = openday\get_translate_id( get_theme_mod( OPENDAY_SLUG . '_news_cat_id', '' ), 'category' );


$cat = get_category( $cat_id, OBJECT, 'raw' );



if ( $cat && ! is_wp_error( $cat ) ) {

	$entries = get_posts( array(
		'numberposts' => 3,
		'category'    => $cat->term_id,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'post_type'   => 'post',
		'suppress_filters' => true,
	), OBJECT, 'raw' );


	if ( is_array( $entries ) && ! empty( $entries ) ) {

		$permalink = get_category_link( $cat->term_id );
		$title = get_theme_mod( OPENDAY_SLUG . '_news_title', __( 'Новости', OPENDAY_TEXTDOMAIN ) );
		$description = get_theme_mod( OPENDAY_SLUG . '_news_description', '' );
		$label = get_theme_mod( OPENDAY_SLUG . '_news_label', __( 'Смотреть все новости', OPENDAY_TEXTDOMAIN ) );

		if ( function_exists( 'pll__' ) ) {
		  $title = pll__( $title );
		  $description = pll__( $description );
		  $label = pll__( $label );
		}

		if ( empty( $title ) ) $title = strip_tags( apply_filters( 'single_cat_title', $cat->name ) );
		if ( empty( $description ) ) $description = strip_tags( $cat->category_description );

		ob_start();

		foreach ( $entries as $entry ) {
		
			?>

				<div class="col-xs-12 col-sm-7 col-md-4 col-lg-4">
					<div class="news__entry entry">
						<div class="thumbnail">
							<a href="<?php the_permalink( $entry->ID ); ?>">
								<?php openday\the_thumbnail_image( $entry->ID, 'medium' ); ?>
							</a>
							<?php openday\the_publish_date( strtotime( $entry->post_date ) ); ?>
						</div>
						<h3 class="title">
							<a href="<?php the_permalink( $entry->ID ); ?>">
								<?php echo apply_filters( 'the_title', $entry->post_title ); ?>
							</a>
						</h3>
						<p class="excerpt">
							<?php echo get_the_excerpt( $entry->ID ); ?>
						</p>
						<a class="btn btn-warning permalink" href="<?php the_permalink( $entry->ID ); ?>">
							<?php _e( 'Подробней', OPENDAY_TEXTDOMAIN ); ?>
						</a>
					</div>
				</div>

			<?php

		}

		$content = '<div class="row center-xs">' . ob_get_contents() . '</div>';

		ob_end_clean();

		include get_theme_file_path( 'views/home/section.php' );

	}
	
}











// $cat_id = openday\get_translate_id( get_theme_mod( OPENDAY_SLUG . '_news_cat_id', '' ), 'cat' );

// $cat = get_category( $cat_id, OBJECT, 'raw' );

// if ( $cat && ! is_wp_error( $cat ) ) {

//   $entries = get_post( array(
//     'numberposts' => 3,
//     'cat'    => $cat->term_id,
//     'orderby'     => 'date',
//     'order'       => 'DESC',
//     'post_type'   => 'post',
//     'suppress_filters' => true,
//   ), OBJECT, 'raw' );

//   if ( is_array( $entries ) && ! empty( $entries ) ) {

//     $permalink = get_cat_link( $cat->term_id );
//     $title = get_theme_mod( OPENDAY_SLUG . '_news_title', __( 'Новости', OPENDAY_TEXTDOMAIN ) );
//     $description = get_theme_mod( OPENDAY_SLUG . '_news_description', '' );
//     $label = get_theme_mod( OPENDAY_SLUG . '_news_label', __( 'Смотреть все новости', OPENDAY_TEXTDOMAIN ) );

//     if ( function_exists( 'pll__' ) ) {
//       $title = pll__( $title );
//       $description = pll__( $description );
//       $label = pll__( $label );
//     }

//     if ( empty( $title ) ) $title = strip_tags( apply_filters( 'single_cat_title', $cat->name ) );
//     if ( empty( $description ) ) $description = strip_tags( 'category_description' );

//     include get_theme_file_path( 'views/home/news.php' );

//   }

// }