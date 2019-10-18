<div class="jumbotron lazy" id="jumbotron" data-src="<?php echo esc_attr( $bgi_src ); ?>">
	<div class="container">
		<div class="row center-xs middle-xs">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
				<?php if ( ! empty( $title ) ) : ?><div class="title-container"><h1><?php echo $title; ?></h1></div><?php endif; ?>
				<?php if ( ! empty( $excerpt ) ) : ?><p class="excerpt"><?php echo $excerpt; ?></p><?php endif; ?>
				<?php if ( ! empty( $permalink ) ) : ?>
					<div class="permalink-container">
						<a class="btn btn-info btn-lg" href="<?php echo $permalink; ?>"><?php echo $label; ?></a>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 first-xs text-center">
				<?php if ( $timestamp ) : ?>
					<time class="date">
						<span class="day"><?php echo date( 'd', $timestamp ); ?></span>
						<span class="month"><?php echo date_i18n( 'M', $timestamp ); ?></span>
						<span class="year"><?php echo date( 'Y', $timestamp ); ?></span>
					</time>
					<div class="counter" id="counter" data-timing-of="<?php echo $timestamp; ?>">
						<div class="param days" id="days">
							<div class="value"><?php echo $days; ?></div>
							<div class="label">Days</div>
						</div>
						<div class="param hours" id="hours">
							<div class="value"><?php echo $hours; ?></div>
							<div class="label">Hours</div>
						</div>
						<div class="param mins" id="mins">
							<div class="value"><?php echo $mins; ?></div>
							<div class="label">Mins</div>
						</div>
						<div class="param secs" id="secs">
							<div class="value"><?php echo $secs; ?></div>
							<div class="label">Secs</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>