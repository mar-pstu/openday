<?php





function openday_customize_register( $wp_customize ) {


	$slug = OPENDAY_SLUG;


	$wp_customize->add_panel(
		"{$slug}_home",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Блоки главной страницы', OPENDAY_TEXTDOMAIN ),
			'priority'        => 100
		)
	);
	foreach ( array(
		'jumbotron',   // первый экран со счётчиком
		'aboutus',     // блок О нас
		'lectors',     // информация о лекторах
		'programs',    // информация о программе проведения
		'fotos',       // фотогалерея
		'news',        // блог/новости
		'direction',   // блок Как к нам проехать
	) as $file_name ) {
		include get_theme_file_path( "settings/home/{$file_name}.php" );
	}


	$wp_customize->add_panel(
		"{$slug}_pages",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Шаблоны страниц', OPENDAY_TEXTDOMAIN ),
			'priority'        => 200
		)
	);
	foreach ( array(
		'error404',    // настройки шаблона страницы ошибки 404
		'archive',     // страницы архивов, категорий и блога
		'single',      // пост блога
	) as $file_name ) {
		include get_theme_file_path( "settings/pages/{$file_name}.php" );
	}


	$wp_customize->add_panel(
		"{$slug}_lists",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Списки темы', OPENDAY_TEXTDOMAIN ),
			'priority'        => 300
		)
	);
	foreach ( array(
		'socials',     // список ссылок на страницы в социальных сетях
	) as $file_name ) {
		include get_theme_file_path( "settings/lists/{$file_name}.php" );
	}

};

add_action( 'customize_register', 'openday_customize_register' );