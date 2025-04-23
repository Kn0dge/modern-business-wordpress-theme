/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
    // Initialize all color pickers
    $( document ).ready( function() {
        // Initialize Iris color pickers
        $( '.iris-color-control' ).each( function() {
            var $this = $( this );
            var palettes = $this.data( 'palettes' );
            
            $this.wpColorPicker({
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
        
        // Add custom color palettes to all color pickers
        $( '.wp-color-picker' ).iris({
            palettes: [
                '#000000',
                '#ffffff',
                '#dd3333',
                '#dd9933',
                '#eeee22',
                '#81d742',
                '#1e73be',
                '#8224e3'
            ]
        });
    });
})( jQuery );
