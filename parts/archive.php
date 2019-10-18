<?php if ( ! defined( 'ABSPATH' ) ) { exit; }; ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" class="<?php post_class( 'archive__entry entry' ); ?>">
			<div class="row center-xs">
				<div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">
					<a class="thumbnail" href="<?php the_permalink( get_the_ID() ); ?>">
						<?php openday\the_thumbnail_image( get_the_ID(), 'mudium' ); ?>
						<?php openday\the_publish_date( strtotime( $post->post_date ) ); ?>
					</a>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					<h3 class="title"><?php the_title(); ?></h3>
					<p class="excerpt"><?php echo get_the_excerpt( get_the_ID() ); ?></p>
					<p class="text-right">
						<a class="permalink btn btn-primary" href="<?php the_permalink( get_the_ID() ); ?>">
							<?php _e( 'Подробней', OPENDAY_TEXTDOMAIN ); ?>
						</a>
					</p>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>