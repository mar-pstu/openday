<?php if ( ! defined( 'ABSPATH' ) ) { exit; }; ?>
<section class="section aboutus" id="aboutus">
  <div class="container">
    <div class="row center-xs middle-xs">
      <?php if ( ! empty( trim( $thumbnail ) ) ) : ?>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <img class="thumbnail lazy" src="#" data-src="<?php echo esc_attr( $thumbnail ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
        </div>
      <?php endif; ?>
      <div class="col-xs-12 col-sm col-md col-lg">
        <?php if ( ! empty( trim( $title ) ) ) : ?><div class="text-left"><h2><?php echo $title; ?></h2></div><?php endif; ?>
        <?php if ( ! empty( trim( $excerpt ) ) ) : ?><div class="excerpt"><?php echo $excerpt; ?></div><?php endif; ?>
        <?php if ( ! empty( $permalink ) ) : ?>
          <a class="btn btn-default permalink" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label; ?></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>