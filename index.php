<?php


namespace openday;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


?>


	<div class="row">

		<div class="col-xs-12 col-sm-12 <?php echo ( is_active_sidebar( 'column' ) ) ? 'col-md-8 col-lg-8' : 'col-md-12 col-lg-12'; ?>">

			<?php

				the_pageheader();
				the_breadcrumbs();

				if ( is_singular() ) {
					get_template_part( 'parts/singular' );
				} else {
					get_template_part( 'parts/archive' );
				}

			?>

		</div>

		<?php if ( is_active_sidebar( 'column' ) ) : ?>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<?php get_sidebar( 'column' ); ?>
			</div>
		<?php endif; ?>

	</div>


<?php get_footer(); ?>