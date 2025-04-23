( function( $ ) {
    // Extend the wpColorPicker to support alpha transparency
    $.wp.wpColorPicker.prototype.options.change = function(event, ui) {
        var rgbaColor = ui.color.toString();
        $(this).val(rgbaColor).trigger('change');
    };

    $(function() {
        $('.color-alpha').wpColorPicker({
            // Enable alpha channel support
            change: function(event, ui) {
                var rgbaColor = ui.color.toString();
                $(this).val(rgbaColor).trigger('change');
            },
            clear: function() {
                $(this).val('').trigger('change');
            }
        });
    });
})( jQuery );
