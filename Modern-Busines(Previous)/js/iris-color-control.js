/**
 * Iris Color Picker JS
 *
 * This file includes the core control JS for the Iris color picker.
 */

( function( $ ) {
    // Add Iris Color Picker to all inputs with 'iris-color-control' class
    $( function() {
        // Loop through each control and transform it into an iris color picker
        $( '.iris-color-control' ).each( function() {
            // Get the palettes
            var palettes = $( this ).data( 'palettes' );
            
            // Set up the control
            $( this ).wpColorPicker({
                palettes: palettes ? JSON.parse( palettes ) : true,
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
        });
    });
})( jQuery );
