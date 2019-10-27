<?php



namespace openday;



if ( ! defined( 'ABSPATH' ) ) { exit; };



function get_custom_logo_img() {
	$result = __return_empty_string();
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( $custom_logo_id ) {
		$result = sprintf(
			'<img class="custom-logo" src="%1$s" alt="%2$s">',
			wp_get_attachment_image_src( $custom_logo_id, 'thumbnail', false ),
			get_bloginfo( 'name', 'display' )
		);
	}
	return $result;
}



function get_languages_list() {
	$result = array();
	if ( ( function_exists( 'pll_the_languages' ) ) && ( function_exists( 'pll_current_language' ) ) ) {
		$current = pll_current_language( 'slug' );
		$other = pll_the_languages( array(
			'dropdown'           => 0,
			'show_names'         => '',
			'display_names_as'   => 'slug',
			'show_flags'         => 0,
			'hide_if_empty'      => 0,
			'force_home'         => 0,
			'echo'               => 0,
			'hide_if_no_translation' => 0,
			'hide_current'       => 1,
			'post_id'            => ( is_singular() ) ? get_the_ID() : NULL,
			'raw'                => 1,
		) );
		if ( ( $other ) && ( ! empty( $other ) ) ) {
			$result[] = '<li class="current">' . $current . '</li>';
			foreach ( $other as $lang ) $result[] = sprintf(
				'<li><a href="%1$s">%2$s</a></li>',
				$lang[ 'url' ],
				$lang[ 'name' ]
			);
		}
	}
	if ( ! empty( $result ) ) echo '<ul class="languages">' . implode( "\r\n", $result ) . '</ul>';
}




function the_breadcrumbs() {
	ob_start();
	if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb();
	} else {
			if ( ! is_front_page() ) {
				echo '<a href="';
				echo home_url();
				echo '">'.__( 'Главная', OPENDAY_TEXTDOMAIN );
				echo "</a> » ";
				if ( is_category() || is_single() ) {
						the_category(' ');
						if ( is_single() ) {
								echo " » ";
								the_title();
						}
				} elseif ( is_page() ) {
						echo the_title();
				}
			}
			else {
				echo __( 'Домашняя страница', OPENDAY_TEXTDOMAIN );
			}
	}
	$result = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $result ) ) {
		echo '<div id="breadcrumbs" class="breadcrumbs">';
		echo $result;
		echo '</div>';
	}
}





function get_translate_id( $id, $type = 'post' ) {
    $result = '';
    if ( $id && ! empty( $id ) ) {
        if ( defined( 'POLYLANG_FILE' ) ) {
            switch ( $type ) {
                case 'category':
                    $translate = ( function_exists( 'pll_get_term' ) ) ? pll_get_term( $id, pll_current_language( 'slug' ) ) : $translate;
                    break;
                case 'post':
                case 'page':
                default:
                    $translate = ( function_exists( 'pll_get_post' ) ) ? pll_get_post( $id, pll_current_language( 'slug' ) ) : $translate;
                    break;
            } // switch
            $result = ( $translate ) ? $translate : '';
        } else {
            $result = $id;
        }
    }
    return $result;
}







function render_socials_list( $contacts = array() ) {
	$result = __return_empty_array();
	if ( is_array( $contacts ) && ! empty( $contacts ) ) {
		foreach ( $contacts as $key => $value ) {
			if ( ! empty( $value ) ) {
				$result[] = sprintf(
					'<li><a class="%1$s" href="%2$s"><span class="sr-only">%1$s</span></a></li>',
					$key,
					$value
				);
			}
		}
	}
	return ( empty( $result ) ) ? '' : '<ul class="socials">' . implode( "\r\n", $result ) . '</ul>';
}





function the_pager() {
	ob_start();
	foreach ( array(
		'previous'  => array(
			'entry'     => get_previous_post(),
			'label'     => __( 'Смотреть предыдущий пост', OPENDAY_TEXTDOMAIN ),
		),
		'next'      => array(
			'entry'     => get_next_post(),
			'label'     => __( 'Смотреть следующий пост', OPENDAY_TEXTDOMAIN ),
		),
	) as $key => $value ) {
		if ( $value[ 'entry' ] && ! is_wp_error( $value[ 'entry' ] ) ) {
			$title = apply_filters( 'the_title', $value[ 'entry' ]->post_title, $value[ 'entry' ]->ID );
			$label = $value[ 'label' ];
			$permalink = get_permalink( $value[ 'entry' ]->ID );
			include get_theme_file_path( 'views/adjacent-post.php' );
		}
	}
	$content = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $content ) ) {
			echo '<nav class="pager">' . $content . '</nav>';
	}
}







function the_pageheader() {
	if ( is_archive() ) {
		$title = get_the_archive_title();
		$excerpt = get_the_archive_description();
		$term = get_queried_object();
		$thumbnail_id = get_term_meta( $term->term_id, OPENDAY_SLUG . '_thumbnail', true );
	} else {
		$title = get_the_title();
		$excerpt = ( has_excerpt( get_the_ID() ) ) ? get_the_excerpt( get_the_ID() ) : false;
		$thumbnail_id = ( has_post_thumbnail( get_the_ID() ) ) ? get_post_thumbnail_id( get_the_ID() ) : false;
	}
	include get_theme_file_path( 'views/pageheader.php' );
}




function the_publish_date( $timestamp ) {
	printf(
		'<time datetime="%1$s" class="publish"><span class="day">%2$s</span> <span class="month">%3$s</span> <span class="year">%4$s</span></time>',
		date( 'Y-m-d G:i', $timestamp ),
		date( 'd', $timestamp ),
		date_i18n( 'M', $timestamp ),
		date( 'Y', $timestamp )
	);
}




function the_thumbnail_image( $post_id, $size = 'thumbnail' ) {
	printf(
		'<img class="lazy wp-post-thumbnail" src="#" data-src="%1$s" alt="%2$s"/>',
		( has_post_thumbnail( $post_id ) ) ? get_the_post_thumbnail_url( $post_id, $size ) : OPENDAY_URL . 'images/thumbnail.png',
		the_title_attribute( array(
			'before' => '',
			'after'  => '',
			'echo'   => false,
			'post'   => $post_id,
		) )
	);
}






function get_categories_choices() {
	$result = __return_empty_array();
	$categories = get_categories( array(
		'taxonomy'     => 'category',
		'type'         => 'post',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => 1,
		'exclude'      => '',
		'include'      => '',
		'number'       => 0,
		'pad_counts'   => false,
	) );
	if ( is_array( $categories ) && ! empty( $categories ) ) {
		foreach ( $categories as $category ) {
			$result[ $category->term_id ] = esc_html( apply_filters( 'single_cat_title', $category->name ) );
		}
	}
	return $result;
}