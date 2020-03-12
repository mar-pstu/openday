<?php


namespace openday;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class( 'archive__entry entry' ); ?>>
			<div class="row center-xs">
				<div class="col-xs-8 col-sm-4 col-md-4 col-lg-3">
					<a class="thumbnail" href="<?php the_permalink( get_the_ID() ); ?>">
						<?php
							the_thumbnail_image( get_the_ID(), 'mudium' );
							if ( get_theme_mod( OPENDAY_SLUG . '_archive_publish_date_flag', true ) ) {
								the_publish_date( strtotime( $post->post_date ) );
							}
						?>
					</a>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
					<h3 class="title"><a href="<?php the_permalink( get_the_ID() ); ?>"><?php the_title(); ?></a></h3>
					<?php the_share_link( wp_get_shortlink() ); ?>
					<p class="excerpt"><?php echo get_the_excerpt( get_the_ID() ); ?></p>
					<p class="text-right">
						<?php if ( get_theme_mod( OPENDAY_SLUG . '_archive_comments_count_flag', true ) && ( get_comments_number( get_the_ID() ) > 0 ) ) : ?>
							<a class="comments" href="<?php comments_link(); ?>">
								<span class="sr-only"><?php _e( 'Оставлено комментариев', OPENDAY_TEXTDOMAIN ); ?></span> <?php comments_number(); ?>
							</a>
						<?php endif; ?>
						<a class="permalink btn btn-primary" href="<?php the_permalink( get_the_ID() ); ?>">
							<?php _e( 'Подробней', OPENDAY_TEXTDOMAIN ); ?>
						</a>
					</p>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
	<?php
		the_posts_pagination();
	?>
<?php endif; ?>