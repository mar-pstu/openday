( function( blocks, editor, i18n, element, components, _ ) {

	var el = element.createElement;
	var RichText = editor.RichText;
	var MediaUpload = editor.MediaUpload;
	var TextControl = wp.components.TextControl;
	var InnerBlocks = editor.InnerBlocks;

	blocks.registerBlockType( 'openday/program', {
		title: i18n.__( 'Программа мероприятия', 'openday' ),
		keywords: [
			i18n.__( 'ПГТУ', 'openday' ),
			i18n.__( 'программа', 'openday' ),
			i18n.__( 'список', 'openday' ),
			i18n.__( 'меню', 'openday' ),
			i18n.__( 'пункты', 'openday' ),
			i18n.__( 'контейнер', 'openday' ),
		],
		icon: 'media-spreadsheet',
		category: 'layout',
		supports: {
			customClassName: false,
			html: false,
		},
		edit: function( props ) {
			return el( 'div', { className: 'openday-steps' },
				el( editor.InnerBlocks, {
					allowedBlocks: [ 'openday/step' ],
                	template: [ [ 'openday/step', { 'placeholder': 'Выступление' } ] ],
				} ),
			);
		},
		save: function( props ) {
			return el( 'ul', { className: props.className + ' steps' }, el( InnerBlocks.Content, null ) );
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