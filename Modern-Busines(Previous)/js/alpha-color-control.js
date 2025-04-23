/**
 * Alpha Color Picker JS
 *
 * This file includes several helper functions and the core control JS.
 */

( function( $ ) {
    // Add Alpha Color Picker to all inputs with 'alpha-color-control' class
    $( function() {
        // Loop through each control and transform it into an alpha color picker
        $( '.alpha-color-control' ).each( function() {
            // Get the palette
            var palette = $( this ).data( 'palette' );
            
            // Get the default color
            var defaultColor = $( this ).data( 'default-color' );
            
            // Get show opacity
            var showOpacity = $( this ).data( 'show-opacity' );
            
            // Set up the control
            $( this ).wpColorPicker({
                palettes: palette.split( '|' ),
                defaultColor: defaultColor,
                change: function( event, ui ) {
                    // Send ajax request to wp.customize to trigger the Save action
                    var setting = $( this ).attr( 'data-customize-setting-link' );
                    if ( setting ) {
                        wp.customize( setting, function( obj ) {
                            obj.set( ui.color.toString() );
                        });
                    }
                },
                clear: function() {
                    // Send ajax request to wp.customize to trigger the Save action
                    var setting = $( this ).attr( 'data-customize-setting-link' );
                    if ( setting ) {
                        wp.customize( setting, function( obj ) {
                            obj.set( '' );
                        });
                    }
                }
            });
            
            // Show or hide the opacity slider
            if ( showOpacity === 'true' ) {
                $( this ).closest( '.wp-picker-container' ).find( '.wp-picker-opacity-slider' ).show();
            } else {
                $( this ).closest( '.wp-picker-container' ).find( '.wp-picker-opacity-slider' ).hide();
            }
        });
    });
})( jQuery );
