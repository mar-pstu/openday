( function( blocks, editor, i18n, element, components, _ ) {

	var el = element.createElement;
	var RichText = editor.RichText;
	var MediaUpload = editor.MediaUpload;
	var TextControl = wp.components.TextControl;

	blocks.registerBlockType( 'openday/step', {

		title: i18n.__( 'Выступление', 'openday' ),

		keywords: [
			i18n.__( 'ПГТУ', 'openday' ),
			i18n.__( 'выступление', 'openday' ),
			i18n.__( 'список', 'openday' ),
			i18n.__( 'программа', 'openday' ),
			i18n.__( 'мероприятие', 'openday' ),
		],

		icon: 'megaphone',

		category: 'layout',

		supports: {
			customClassName: false,
		},

		parent: [ 'openday/program' ],

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
			mediaID: {
				type: 'number',
				default: '',
			},
			mediaAlt: {
				type: 'string',
				default: '',
			},
			mediaURL: {
				type: 'string',
				source: 'attribute',
				selector: '.thumbnail',
				attribute: 'data-src',
				default: '',
			},
			time: {
				type: 'array',
				source: 'children',
				selector: '.time',
				default: '',
			},
		},

		edit: function( props ) {
			var attributes = props.attributes;
			function onChangeLevel( newLevel ) { props.setAttributes( { level: newLevel } ); }
			return el( 'div', { className: 'openday-steps__item item' },
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
				el( MediaUpload, {
					onSelect: function( media ) {
						return props.setAttributes( {
							mediaURL: ( typeof media.sizes.thumbnail == "undefined" ) ? media.url : media.sizes.thumbnail.url,
							mediaID: media.id,
							mediaAlt: media.alt,
						} );
					},
					allowedTypes: 'image',
					value: props.attributes.mediaID,
					render: function( obj ) {
						return el( components.Button, {
								className: props.attributes.mediaID ? 'thumbnail' : 'add-image-button',
								onClick: obj.open
							},
							! props.attributes.mediaID ? '' : el( 'img', { src: props.attributes.mediaURL } )
						);
					}
				} ),
				el( 'div', { className: 'overlay' },
					el( RichText, {
						tagName: 'div',
						className: 'time',
						inline: true,
						placeholder: i18n.__( 'Время проведения', 'openday' ),
						value: props.attributes.time,
						formattingControls: [],
						onChange: function( value ) { props.setAttributes( { time: value } ); },
					} ),
					el( RichText, {
						tagName: attributes.level,
						className: 'title',
						inline: true,
						placeholder: i18n.__( 'Имя', 'openday' ),
						value: props.attributes.title,
						formattingControls: [],
						onChange: function( value ) { props.setAttributes( { title: value } ); },
					} ),
					el( RichText, {
						tagName: 'p',
						className: 'excerpt',
						inline: true,
						placeholder: i18n.__( 'Описание', 'openday' ),
						value: attributes.excerpt,
						formattingControls: [],
						onChange: function( value ) { props.setAttributes( { excerpt: value } ); },
					} ),
				),
			);
		},

		save: function( props ) {
			return el( 'div', { className: 'steps__item item' },
				( props.attributes.mediaURL ) && el( 'img', {
					className: 'thumbnail lazy',
					'data-src': props.attributes.mediaURL,
					'src': '#',
					'alt': props.attributes.mediaAlt,
				} ),
				el( 'div', { className: 'overlay' },
					( props.attributes.time.length > 0 ) && el( 'div', {
						className: 'time',
						datetime: props.attributes.time,
					}, props.attributes.time ),
					( props.attributes.title.length > 0 ) && el( RichText.Content, {
						tagName: props.attributes.level,
						value: props.attributes.title,
						className: 'title'
					} ),
					( props.attributes.excerpt.length > 0 ) && el( RichText.Content, {
						tagName: 'p',
						className: 'excerpt',
						value: props.attributes.excerpt
					} ),
				),
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