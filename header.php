<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <?php get_template_part( 'parts/head' ); ?>
  <body <?php body_class(); ?> data-nav="inactive">
    <?php get_template_part( 'parts/nav' ); ?>
    <div class="wrapper" id="wrapper">
      <header class="wrapper__item wrapper__item--header header" id="header">
        <div class="container">
          <div class="row middle-xs">
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
              <div class="bloginfo">
                <?php the_custom_logo(); ?>
                <?php if ( is_multisite() ) : ?>
                  <?php switch_to_blog( get_main_site_id() ); ?>
                  <a class="network" href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a>
                  <span class="separator"></span>
                  <?php restore_current_blog(); ?>
                <?php endif; ?>
                <a class="name" href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a>
              </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">
              <button class="burger" id="burger">
                <span class="bar bar1"></span>
                <span class="bar bar2"></span>
                <span class="bar bar3"></span>
                <span class="bar bar4"></span>
                <span class="sr-only"><?php _e( 'Открыть меню', OPENDAY_TEXTDOMAIN ); ?></span>
              </button>
            </div>
          </div>
        </div>
      </header>
      <main class="wrapper__item wrapper__item--main main" id="main">