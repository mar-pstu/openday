// ( function( blocks, editor, i18n, element, components, _ ) {

// 	var el = element.createElement;
// 	var RichText = editor.RichText;
// 	var MediaUpload = editor.MediaUpload;
// 	var TextControl = wp.components.TextControl;
// 	var InnerBlocks = editor.InnerBlocks;

// 	blocks.registerBlockType( 'openday/widget', {

// 		title: i18n.__( 'Виджет', 'openday' ),

// 		keywords: [
// 			i18n.__( 'ПГТУ', 'openday' ),
// 			i18n.__( 'виджет', 'openday' ),
// 			i18n.__( 'блок', 'openday' ),
// 			i18n.__( 'меню', 'openday' ),
// 			i18n.__( 'контейнер', 'openday' ),
// 		],

// 		icon: 'category',

// 		category: 'layout',

// 		supports: {
// 			customClassName: false,
// 			html: false,
// 		},

// 		edit: function( props ) {
// 			function onChangeLevel( newLevel ) { props.setAttributes( { level: newLevel } ); }
// 			return el( 'div', { className: 'widget' },
// 				el( wp.editor.BlockControls, 
// 					{ 
// 						key: 'controls',
// 						controls: [
// 							{
// 								icon: 'heading',
// 								title: 'h2',
// 								isActive: props.attributes.level === 'h2',
// 								onClick: function() { onChangeLevel( 'h2' ) },
// 								subscript: '2',
// 							},
// 							{
// 								icon: 'heading',
// 								title: 'h3',
// 								isActive: props.attributes.level === 'h3',
// 								onClick: function() { onChangeLevel( 'h3' ) },
// 								subscript: '3',
// 							},
// 							{
// 								icon: 'heading',
// 								title: 'h4',
// 								isActive: props.attributes.level === 'h4',
// 								onClick: function() { onChangeLevel( 'h4' ) },
// 								subscript: '4',
// 							},
// 						]
// 					}
// 				),
// 				el( RichText, {
// 					tagName: props.attributes.level,
// 					className: 'title',
// 					inline: true,
// 					placeholder: i18n.__( 'Имя', 'openday' ),
// 					value: props.attributes.title,
// 					formattingControls: [],
// 					onChange: function( value ) { props.setAttributes( { title: value } ); },
// 				} ),
// 				el( RichText, {
// 					tagName: 'p',
// 					className: 'excerpt',
// 					inline: true,
// 					placeholder: i18n.__( 'Описание', 'openday' ),
// 					value: props.attributes.excerpt,
// 					formattingControls: [],
// 					onChange: function( value ) { props.setAttributes( { excerpt: value } ); },
// 				} ),
// 			);
// 		},

// 		save: function( props ) {
// 			return el( 'div', { className: props.className + ' widget' },
// 				el( InnerBlocks.Content, null )
// 			);
// 		},

// 	} );

// } )(
// 	window.wp.blocks,
// 	window.wp.editor,
// 	window.wp.i18n,
// 	window.wp.element,
// 	window.wp.components,
// 	window._,
// );