( function( blocks, editor, i18n, element, components, _ ) {

	var el = element.createElement;
	var RichText = editor.RichText;
	var MediaUpload = editor.MediaUpload;
	var TextControl = wp.components.TextControl;
	var InnerBlocks = editor.InnerBlocks;

	blocks.registerBlockType( 'openday/widget', {

		title: i18n.__( 'Виджет', 'openday' ),

		keywords: [
			i18n.__( 'ПГТУ', 'openday' ),
			i18n.__( 'виджет', 'openday' ),
			i18n.__( 'блок', 'openday' ),
			i18n.__( 'меню', 'openday' ),
			i18n.__( 'контейнер', 'openday' ),
		],

		icon: 'feedback',

		category: 'layout',

		supports: {
			customClassName: false,
			html: false,
		},

		attributes: {
			level: {
				type: 'string',
				default: 'h4',
			},
			title: {
				type: 'array',
				source: 'children',
				selector: '.title',
				default: '',
			},
			excerpt: {
				type: 'array',
				source: 'children',
				selector: '.excerpt',
				default: '',
			},
		},

		edit: function( props ) {
			return el( 'div', { className: 'openday-widget' },
				el( wp.editor.BlockControls, { 
					key: 'controls',
					controls: [
						{
							icon: 'heading',
							title: 'h3',
							isActive: props.attributes.level === 'h3',
							onClick: function() { onChangeLevel( 'h3' ) },
							subscript: '3',
						},
						{
							icon: 'heading',
							title: 'h4',
							isActive: props.attributes.level === 'h4',
							onClick: function() { onChangeLevel( 'h4' ) },
							subscript: '4',
						},
					] }
				),
				el( RichText, {
					tagName: props.attributes.level,
					className: 'openday-widget__title title',
					inline: true,
					placeholder: i18n.__( 'Имя', 'openday' ),
					value: props.attributes.title,
					formattingControls: [],
					onChange: function( value ) { props.setAttributes( { title: value } ); },
				} ),
				el( RichText, {
					tagName: 'ul',
					multiline: 'li',
					placeholder: i18n.__( 'Список подстраниц', 'pstu-next-theme' ),
					value: props.attributes.excerpt,
					onChange: function( value ) { props.setAttributes( { excerpt: value } ); },
					className: 'excerpt'
				} )
			);
		},
		save: function( props ) {
			return el( 'div', { className: props.className + ' widget' },
				( props.attributes.title.length > 0 ) && el( RichText.Content, {
						tagName: props.attributes.level,
						value: props.attributes.title,
						className: 'widget__title title'
					} ),
				( props.attributes.excerpt.length > 0 ) && el( RichText.Content, {
					tagName: 'ul',
					className: 'excerpt',
					value: props.attributes.excerpt
				} ),
			);
		},

	} );

} )(
	window.wp.blocks,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element,
	window.wp.components,
	window._,
);