<?php


namespace openday;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( have_posts() ) {

	while ( have_posts() ) {

		the_post();

		?>
			<?php if ( is_single() ) : ?>
				<p class="text-right">
					<?php the_like_button( get_the_ID() ); ?>
				</p>
			<?php endif; ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class( '', get_the_ID() ); ?> >

		<?

		the_content();
		the_pager();

		if( comments_open( get_the_ID() ) ) comments_template();

		?>

			</div>

		<?php

	}

}