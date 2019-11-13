<?php


namespace openday;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( have_posts() ) {

	while ( have_posts() ) {

		the_post();

		printf(
			'<div id="post-%1$s" class="%2$s">',
			get_the_ID(),
			join( ' ', get_post_class( '', get_the_ID() ) )
		);
		the_content();
		the_pager();
		if( comments_open( get_the_ID() ) ) comments_template();

		echo "</div>";

	}

}