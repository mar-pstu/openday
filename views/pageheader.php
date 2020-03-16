<?php

if ( ! defined( 'ABSPATH' ) ) { exit; };

?>

<div class="pageheader">
	<?php if ( ! empty( $thumbnail_url ) ) : ?>
		<img class="lazy wp-post-thumbnail" src="#" data-src="<?php echo esc_attr( $thumbnail_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
	<?php endif; ?>
    <h1 class="title"><?php echo $title; ?></h1>
</div>

<?php if ( ! empty( $excerpt ) ) : ?>
	<div class="lead">
		<?php echo $excerpt; ?>
	</div>
<?php endif; ?>