<?php


namespace openday;



if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<nav class="nav" id="nav">
  <div class="bg"></div>
  <div class="overlay">
    <button class="btn btn-close close btn-lg pull-right">
      <span class="sr-only"></span>
    </button>
    <?php echo get_languages_list(); ?>
    <?php echo render_socials_list( get_theme_mod( OPENDAY_SLUG . '_socials', array() ) ); ?>
    <?php if ( has_nav_menu( 'main' ) ) : ?>
      <h2><?php _e( 'Меню', OPENDAY_TEXTDOMAIN ); ?></h2>
      <?php
        wp_nav_menu( array(
          'theme_location'  => 'main',
          'menu'            => 'main',
          'container'       => false,
          'menu_class'      => 'nav__list list',
          'echo'            => true,
          'depth'           => 2,
        ) );
      ?>
    <?php endif; ?>
  </div>
</nav>