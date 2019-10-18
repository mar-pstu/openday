( function( blocks, editor, i18n, element, components, _ ) {
    var el = element.createElement;

    blocks.registerBlockType( 'openday/clearfix', {
        title: i18n.__( 'PSTU Clearfix', 'openday' ),
        description: i18n.__( 'Используется для решения проблем, возникающих при содержании «плавающих» элементов в рамках блока контейнера или обтекания элементов', 'openday' ),
        keywords: [
            i18n.__( 'ПГТУ', 'openday' ),
            i18n.__( 'очистка', 'openday' ),
            i18n.__( 'ластик', 'openday' ),
            i18n.__( 'обтекание', 'openday' ),
            i18n.__( 'изображение', 'openday' ),
            i18n.__( 'выравнивание', 'openday' ),
        ],
        icon: 'editor-removeformatting',
        
        category: 'layout',

        edit: function( props ) {
            return el(
                'div', {
                    className: 'openday-clearfix ' + props.className
                },
                el(
                    'div', {
                        className: 'openday-clearfix-inner'
                    },
                    el(
                        'span', {
                            className: 'label'
                        },
                        'clearfix'
                    )
                ),
            );
        },

        save: function( props ) {
            return el( 'div', {
                className: 'clearfix'
            } );
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