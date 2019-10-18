<?php


$page_id = openday\get_translate_id( get_theme_mod( OPENDAY_SLUG . '_programs_page_id', '' ), 'page' );


if ( ! empty( $page_id ) ) {

	$parent = get_post( $page_id, OBJECT, 'raw' );

	if ( $parent && ! empty( $parent ) ) {

		$name = 'programs';
		$title = get_theme_mod( OPENDAY_SLUG . '_programs_title', '' );
		$description = get_theme_mod( OPENDAY_SLUG . '_programs_description', '' );
		$content = __return_empty_string();
		$permalink = __return_empty_string();
		$label = __return_empty_string();
		$headings = __return_empty_array();
		$tabs = __return_empty_array();

		if ( function_exists( 'pll__' ) ) {
			$title = pll__( $title );
			$description = pll__( $description );
		}

		if ( empty( $title ) ) $title = apply_filters( 'the_title', $parent->post_title, $parent->ID );
		if ( empty( $description ) ) $description = esc_html( $parent->post_excerpt );

		$days = get_pages( array(
			'sort_order'   => 'ASC',
			'sort_column'  => 'post_title',
			'parent'       => ( int ) $parent->ID,
			'post_type'    => 'page',
			'post_status'  => 'publish',
		) );

		if ( is_array( $days ) && ! empty( $days ) ) {
			foreach ( $days as $day ) {
				$parts = get_extended( $day->post_content );
				$headings[] = sprintf(
					'<li><a href="#tab-content-%1$s"><div class="title">%2$s</div><div class="excerpt">%3$s</div></a></li>',
					$day->ID,
					strip_tags( $day->post_title ),
					( empty( $day->post_excerpt ) ) ? '' : strip_tags( $day )
				);
				$tabs[] = sprintf(
					'<article class="tab" id="tab-content-%1$s"><h3>%2$s</h3> %3$s</article>',
					$day->ID,
					apply_filters( 'the_title', $day->post_title, $day->ID ),
					do_shortcode( $parts[ 'main' ], false )
				);
			}
		}

		if ( empty( $headings ) && empty( $content ) ) {
			$content = do_shortcode( $parent->post_content, false );
		} else {
			$content = sprintf(
				'<ul id="headings" class="headings">%1$s</ul> %2$s',
				implode( "\r\n", $headings ),
				implode( "\r\n", $tabs )
			);
		}

		include get_theme_file_path( 'views/home/section.php' );

	}



}