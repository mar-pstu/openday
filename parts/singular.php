<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( have_posts() ) {

	while ( have_posts() ) {

		the_post();

		printf(
			'<div id="post-%1$s" class="%2$s">',
			get_the_ID(),
			join( ' ', get_post_class( '', get_the_ID() ) )
		);

		openday\the_pageheader();

		if ( has_excerpt( get_the_ID() ) ) {
			echo "<p class=\"lead\">";
			echo get_the_excerpt( get_the_ID() );
			echo "</p>";
		}

		openday\the_breadcrumbs();
		the_content();
		openday\the_pager();
		if( comments_open( get_the_ID() ) ) comments_template();

		echo "</div>";

	}

}