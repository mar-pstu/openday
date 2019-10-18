jQuery.each( [ 'pdf', 'doc', 'xls', 'zip', 'ppt', 'odt', 'psd' ], function( i, type ) {
	var selector;
	switch( type ) {
		case 'doc':
			selector = 'a[href$=".doc"], a[href$=".docx"], a[href$=".docm"], a[href$=".rtf"]';
			break;
		case 'xls':
			selector = 'a[href$=".xls"], a[href$=".xlsx"], a[href$=".ods"], a[href$=".csv"], a[href$=".xlsm"]';
			break;
		case 'zip':
			selector = 'a[href$=".zip"], a[href$=".rar"], a[href$=".7z"]';
			break;
		case 'ppt':
			selector = 'a[href$=".ppt"], a[href$=".pptx"], a[href$=".odp"], a[href$=".pptm"]';
			break;
		default:
			selector = 'a[href$=".' + type + '"]';
			break;
	}
	jQuery( selector ).each( function ( index, element ) {
		var $link = jQuery( element );
		if (
			$link.find( '.file, .file-' + type ).length < 1 &&
			! $link.hasClass( 'no-file-icon' ) &&
			! $link.hasClass( 'button' ) &&
			! $link.hasClass( 'btn' ) &&
			! $link.hasClass( 'wp-block-file__button' ) &&
			$link.children( 'img' ).length < 1
		) {
			$link.prepend( jQuery( '<span>', {
				class: 'file file-' + type
			} ) );
		}
	} );
} );










/* Навигационное меню */
jQuery( document ).ready( function () {

	jQuery( 'body' ).on( 'click', '.burger, #nav .bg, #nav .close', function() {
		if ( jQuery( 'body' ).attr( 'data-nav' ) == 'active' ) {
			jQuery( '#nav' ).removeClass( 'nav--active' );
			jQuery( '.burger' ).removeClass( 'burger--active' );
			jQuery( 'body' ).attr( 'data-nav', 'inactive' ).css( { 'overflow': 'auto' } );
		} else {
			jQuery( '#nav' ).addClass( 'nav--active' );
			jQuery( '.burger' ).addClass( 'burger--active' );
			jQuery( 'body' ).attr( 'data-nav', 'active' ).css( { 'overflow': 'hidden' } );
		}
	} )

} );










/* кнопка наверх */
jQuery( document ).ready( function () {
  var $w = jQuery( window ),
    $toTopBtn = jQuery( '<button>', {
      class: 'to-top-btn',
      id: 'toTopBtn',
      title: OpenDayTheme.toTopBtn,
    } ).appendTo( jQuery( 'body' ) );
  function _btnHide() {
    if ( $w.scrollTop() > screen.height * 0.5) {
      $toTopBtn.show();
    } else {
      $toTopBtn.hide();
    }
  }
  function _toTopBtnClick() {
    jQuery( 'body, html' ).animate( {
      scrollTop: 0
    }, 500 );
    return false;
  }
  _btnHide();
  $w.bind( 'scroll', _btnHide );
  $toTopBtn.bind( 'click', _toTopBtnClick );
} );




jQuery( document ).ready( function () {
	var $container = jQuery( '#counter' );
	if ( $container.length > 0 ) {
		var timing_of = new Date( parseInt( $container.attr( 'data-timing-of' ) ) ),
			current_time = new Date(),
			time_left,
			$days = $container.find( '#days .value' ),
			$hours = $container.find( '#hours .value' ),
			$mins = $container.find( '#mins .value' ),
			$secs = $container.find( '#secs .value' );
		if ( timing_of > current_time ) {
			time_left = timing_of.valueOf() - current_time.valueOf();
			setInterval( function () {
				if ( time_left > 1000 ) {
					time_left = time_left - 1000;
					var days = Math.floor( time_left / ( 1000*60*60*24 ) ),
						hours = Math.floor( ( time_left - ( days*1000*60*60*24 ) ) / ( 1000*60*60 ) ),
						mins = Math.floor( ( time_left - ( days*1000*60*60*24 ) - ( hours*1000*60*60 ) ) / ( 1000*60 ) ),
						secs = Math.floor( ( time_left - ( days*1000*60*60*24 ) - ( hours*1000*60*60 ) - ( mins*1000*60 ) ) / 1000 );
					$days.text( days );
					$hours.text( hours );
					$mins.text( mins );
					$secs.text( secs );
				}
			}, 1000 );
		}
	}
} );






jQuery( document ).ready( function () {
	var $container = jQuery( '#programs' );
	if ( $container.length > 0 ) {
		var $links = $container.find( '.headings li a' ).removeClass( 'active' ).eq( 0 ).addClass( 'active' ).end(),
			$tabs = $container.find( '.tab' ).removeClass( 'active' ).eq( 0 ).addClass( 'active' ).end();
		$links.on( 'click', function ( e ) {
			e.preventDefault();
			var $link = jQuery( this );
			$links.removeClass( 'active' );
			$link.addClass( 'active' );
			$tabs.removeClass( 'active' );
			$tabs.filter( jQuery( this ).attr( 'href' ) ).addClass( 'active' );
		} )
	}
} );