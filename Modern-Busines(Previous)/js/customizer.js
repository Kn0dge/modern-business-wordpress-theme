/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
    // Initialize wpColorPicker on Iris color controls safely
    $( function() {
        if ( $.fn.wpColorPicker ) {
            $( '.iris-color-control' ).wpColorPicker();
        }
    } );

    // Site title and description.
    wp.customize( 'blogname', function( value ) {
        value.bind( function( to ) {
            $( '.site-title a' ).text( to );
        } );
    } );
    wp.customize( 'blogdescription', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).text( to );
        } );
    } );

    // Header text color.
    wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( to ) {
            if ( 'blank' === to ) {
                $( '.site-title, .site-description' ).css( {
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                } );
            } else {
                $( '.site-title, .site-description' ).css( {
                    'clip': 'auto',
                    'position': 'relative'
                } );
                $( '.site-title a, .site-description' ).css( {
                    'color': to
                } );
            }
        } );
    } );

    // Global Colors
    wp.customize( 'primary_color', function( value ) {
        value.bind( function( to ) {
            document.documentElement.style.setProperty('--primary-color', to);
            $( 'a:hover' ).css( 'color', to );
        } );
    } );

    wp.customize( 'secondary_color', function( value ) {
        value.bind( function( to ) {
            document.documentElement.style.setProperty('--secondary-color', to);
        } );
    } );

    wp.customize( 'links_color', function( value ) {
        value.bind( function( to ) {
            document.documentElement.style.setProperty('--links-color', to);
            $( 'a' ).css( 'color', to );
        } );
    } );

    wp.customize( 'background_color', function( value ) {
        value.bind( function( to ) {
            document.documentElement.style.setProperty('--background-color', to);
            $( 'body' ).css( 'background-color', to );
        } );
    } );

    wp.customize( 'primary_color_alpha', function( value ) {
        value.bind( function( to ) {
            document.documentElement.style.setProperty('--primary-color-alpha', to);
        } );
    } );

    // Header Styles
    wp.customize( 'header_background_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-header' ).css( 'background-color', to );
        } );
    } );

    wp.customize( 'header_text_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-header' ).css( 'color', to );
        } );
    } );

    // Footer Styles
    wp.customize( 'footer_background_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-footer' ).css( 'background-color', to );
        } );
    } );

    wp.customize( 'footer_text_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-footer' ).css( 'color', to );
        } );
    } );

    // Typography
    wp.customize( 'body_font_color', function( value ) {
        value.bind( function( to ) {
            $( 'body' ).css( 'color', to );
        } );
    } );

    wp.customize( 'heading_color', function( value ) {
        value.bind( function( to ) {
            $( 'h1, h2, h3, h4, h5, h6' ).css( 'color', to );
        } );
    } );

    // Button Styles
    wp.customize( 'button_background_color', function( value ) {
        value.bind( function( to ) {
            $( '.button, button, input[type="button"], input[type="reset"], input[type="submit"]' ).css( 'background-color', to );
        } );
    } );

    wp.customize( 'button_text_color', function( value ) {
        value.bind( function( to ) {
            $( '.button, button, input[type="button"], input[type="reset"], input[type="submit"]' ).css( 'color', to );
        } );
    } );

    wp.customize( 'button_hover_background_color', function( value ) {
        value.bind( function( to ) {
            $( 'head' ).append( '<style>.button:hover, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover { background-color: ' + to + '; }</style>' );
        } );
    } );

    wp.customize( 'button_hover_text_color', function( value ) {
        value.bind( function( to ) {
            $( 'head' ).append( '<style>.button:hover, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover { color: ' + to + '; }</style>' );
        } );
    } );
} )( jQuery );
