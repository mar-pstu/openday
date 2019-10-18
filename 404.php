<?php

get_header();


$title = get_theme_mod( OPENDAY_SLUG . '_error404_title', __( 'Ошибка 404', OPENDAY_TEXTDOMAIN ) );
$description = get_theme_mod( OPENDAY_SLUG . '_error404_description', '' );

if ( function_exists( 'pll__' ) ) {
  $title = pll__( $title );
  $description = pll__( $description );
}



?>
	<div class="container">
		<div class="row center-xs middle-xs">
			<div class="col-xs-12 col-sm-9 col-md-8 col-lg-6">
				<div class="error404__wrap wrap">
					<div class="text-right">
						<a class="btn btn-close" href="<?php echo home_url( '/' ); ?>">
							<span class="sr-only"><?php _e( 'На главную', OPENDAY_TEXTDOMAIN ); ?></span>
						</a>
					</div>
					<img class="logo lazy center-block" src="#" data-src="<?php echo OPENDAY_URL; ?>images/404.svg" alt="<?php esc_attr_e( 'Ошибка 404', OPENDAY_TEXTDOMAIN ); ?>">
					<?php if ( ! empty( $title ) ) : ?><h1 class="title"><?php echo $title; ?></h1><?php endif; ?>
					<?php
						if ( has_nav_menu( 'error404' ) ) wp_nav_menu( array(
							'theme_location'  => 'error404',
							'menu'            => 'error404',
							'container'       => false,
							'menu_class'      => 'shortcuts',
							'echo'            => true,
							'depth'           => 1,
						) );
					?>
					<?php if ( ! empty( $description ) ) : ?><p class="description"><?php echo $description; ?></p><?php else : ?><br><?php endif; ?>
					<div class="text-center">
						<a class="btn btn-info home-link" href="<?php echo home_url( '/' ); ?>"><?php _e( 'Вернуться на главную', OPENDAY_TEXTDOMAIN ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<style>
		.error404 {
			background-image: url( <?php echo OPENDAY_URL; ?>images/jumbotron.svg );
		}
	</style>
<?php get_footer(); ?>