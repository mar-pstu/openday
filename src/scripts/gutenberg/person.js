( function( blocks, editor, i18n, element, components, _ ) {

	var el = element.createElement;
	var RichText = editor.RichText;
	var MediaUpload = editor.MediaUpload;
	var TextControl = wp.components.TextControl;

	blocks.registerBlockType( 'openday/person', {

		title: i18n.__( 'Лектор', 'openday' ),

		keywords: [
			i18n.__( 'ПГТУ', 'openday' ),
			i18n.__( 'лектор', 'openday' ),
			i18n.__( 'список', 'openday' ),
			i18n.__( 'сотрудник', 'openday' ),
		],

		icon: 'businessman',

		category: 'layout',
		supports: {
			customClassName: false,
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
			mediaID: {
				type: 'number',
			},
			mediaAlt: {
				type: 'string',
				default: '',
			},
			mediaURL: {
				type: 'string',
				source: 'attribute',
				selector: '.foto img',
				attribute: 'data-src',
				default: '',
			},
			link: {
				type: 'string',
				source: 'attribute',
				selector: '.btn',
				attribute: 'href',
				default: '',
			},
			facebook: {
				type: 'string',
				source: 'attribute',
				selector: '.facebook',
				attribute: 'href',
				default: '',
			},
			twitter: {
				type: 'string',
				source: 'attribute',
				selector: '.twitter',
				attribute: 'href',
				default: '',
			},
			instagram: {
				type: 'string',
				source: 'attribute',
				selector: '.instagram',
				attribute: 'href',
				default: '',
			},
			linkedin: {
				type: 'string',
				source: 'attribute',
				selector: '.linkedin',
				attribute: 'href',
				default: '',
			},
		},

		edit: function( props ) {
			var socials = (
				( props.attributes.facebook.length > 0 )
				|| ( props.attributes.twitter.length > 0 )
				|| ( props.attributes.instagram.length > 0 )
				|| ( props.attributes.linkedin.length > 0 )
			) ? true : false;
			function onChangeLevel( newLevel ) { props.setAttributes( { level: newLevel } ); }
			return el( 'div', { className: 'openday-person' },
				el( wp.editor.InspectorControls, null,
					el( wp.components.PanelBody,
						{
							title: i18n.__( 'Социальные сети', 'pstu-next-theme' ),
							initialOpen: true
						},
						el( TextControl, {
							label: 'Facebook',
        					value: props.attributes.facebook,
        					onChange: function( value ) { props.setAttributes( { facebook: value } ); },
						} ),
						el( TextControl, {
							label: 'Twitter',
        					value: props.attributes.twitter,
        					onChange: function( value ) { props.setAttributes( { twitter: value } ); },
						} ),
						el( TextControl, {
							label: 'Instagram',
        					value: props.attributes.instagram,
        					onChange: function( value ) { props.setAttributes( { instagram: value } ); },
						} ),
						el( TextControl, {
							label: 'LinkedIn',
        					value: props.attributes.linkedin,
        					onChange: function( value ) { props.setAttributes( { linkedin: value } ); },
						} )
					),
				),
				el( wp.editor.BlockControls, 
					{ 
						key: 'controls',
						controls: [
							{
								icon: 'heading',
								title: 'h2',
								isActive: props.attributes.level === 'h2',
								onClick: function() { onChangeLevel( 'h2' ) },
								subscript: '2',
							},
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
						]
					}
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
								className: props.attributes.mediaID ? 'foto' : 'add-image-button',
								onClick: obj.open
							},
							! props.attributes.mediaID ? '' : el( 'img', { src: props.attributes.mediaURL } )
						);
					}
				} ),
				( socials ) && el( 'ul', { className: 'socials' },
					( props.attributes.facebook.length > 0 ) && el( 'li', null,
						el( 'a', { href: props.attributes.facebook, className: 'facebook', target: '_blank' } ) ),
					( props.attributes.twitter.length > 0 ) && el( 'li', null,
						el( 'a', { href: props.attributes.twitter, className: 'twitter', target: '_blank' } ) ),
					( props.attributes.instagram.length > 0 ) && el( 'li', null,
						el( 'a', { href: props.attributes.instagram, className: 'instagram', target: '_blank' } ) ),
					( props.attributes.linkedin.length > 0 ) && el( 'li', null,
						el( 'a', { href: props.attributes.linkedin, className: 'linkedin', target: '_blank' } ) ),
				),
				el( RichText, {
					tagName: props.attributes.level,
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
					value: props.attributes.excerpt,
					formattingControls: [],
					onChange: function( value ) { props.setAttributes( { excerpt: value } ); },
				} ),
				el( wp.editor.URLInputButton, {
					url: props.attributes.link,
					onChange: function( url, post ) {
						props.setAttributes( { link: url, text: ( post && post.title ) || 'Click here' } );
					}
				} ),
			);
		},

		save: function( props ) {
			var socials = (
				( props.attributes.facebook.length > 0 )
				|| ( props.attributes.twitter.length > 0 )
				|| ( props.attributes.instagram.length > 0 )
				|| ( props.attributes.linkedin.length > 0 )
			) ? true : false;
			return el( 'div', { className: 'person' },
				( props.attributes.title.length > 0 ) && el( RichText.Content, {
					tagName: props.attributes.level,
					value: props.attributes.title,
					className: 'title'
				} ),
				el( 'div', { className: 'foto' },
					props.attributes.mediaURL && el( 'img', {
						className: 'foto lazy',
						'data-src': props.attributes.mediaURL,
						'src': '#',
						'alt': props.attributes.mediaAlt,
					} ),
					( socials ) && el( 'ul', { className: 'socials' },
						( props.attributes.facebook.length > 0 ) && el( 'li',null,
							el( 'a', { href: props.attributes.facebook, className: 'facebook' } ), el( 'span', { className: 'sr-only' }, 'Facebook' ) ),
						( props.attributes.twitter.length > 0 ) && el( 'li',null,
							el( 'a', { href: props.attributes.twitter, className: 'twitter' } ), el( 'span', { className: 'sr-only' }, 'Twitter' ) ),
						( props.attributes.instagram.length > 0 ) && el( 'li',null,
							el( 'a', { href: props.attributes.instagram, className: 'instagram' } ), el( 'span', { className: 'sr-only' }, 'Instagram' ) ),
						( props.attributes.linkedin.length > 0 ) && el( 'li',null,
							el( 'a', { href: props.attributes.linkedin, className: 'linkedin' } ), el( 'span', { className: 'sr-only' }, 'LinkedIn' ) ),
					)
				),
				( props.attributes.title.length > 0 ) && el( RichText.Content, {
					tagName: 'p',
					value: props.attributes.excerpt,
					className: 'excerpt'
				} ),
				( props.attributes.link.length > 0 ) && el( RichText.Content, {
					tagName: 'a',
					className: 'btn btn-primary btn-sm',
					href: props.attributes.link,
					value: i18n.__( 'Подробней', 'openday' ),
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