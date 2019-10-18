<section class="section <?php echo $name; ?>" id="<?php echo $name; ?>">
  <div class="container">
    <?php if ( ! empty( $title ) ) : ?><div class="text-center"><h2><?php echo $title; ?></h2></div><?php endif; ?>
    <?php if ( ! empty( $description ) ) : ?><p class="description"><?php echo $description; ?></p><?php else : ?><br><?php endif; ?>
    <div class="content">
      <?php echo $content; ?>
    </div>
    <?php if ( ! empty( $permalink ) ) : ?>
      <p class="text-center">
        <a class="btn btn-primary btn-lg" href="<?php echo $permalink; ?>"><?php echo $label; ?></a>
      </p>
    <?php endif; ?>
  </div>
</section>