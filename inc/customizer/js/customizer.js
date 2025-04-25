(function($) {
    // Existing code...

    // Add live preview for hero slider overlay option
    wp.customize('hero_slider_overlay', function(value) {
        value.bind(function(newval) {
            var $overlay = $('.hero-slider-overlay');
            if (newval === 'none') {
                $overlay.hide();
            } else {
                $overlay.show();
                $overlay.removeClass('hero-slider-overlay-light hero-slider-overlay-dark hero-slider-overlay-custom');
                if (newval === 'light') {
                    $overlay.addClass('hero-slider-overlay-light');
                    $overlay.css('background-color', '');
                } else if (newval === 'dark') {
                    $overlay.addClass('hero-slider-overlay-dark');
                    $overlay.css('background-color', '');
                } else if (newval === 'custom') {
                    $overlay.addClass('hero-slider-overlay-custom');
                    var customColor = wp.customize.value('hero_slider_overlay_color')();
                    $overlay.css('background-color', customColor);
                }
            }
        });
    });

    // Add live preview for custom overlay color
    wp.customize('hero_slider_overlay_color', function(value) {
        value.bind(function(newval) {
            var $overlay = $('.hero-slider-overlay.hero-slider-overlay-custom');
            if ($overlay.length) {
                $overlay.css('background-color', newval);
            }
        });
    });

    // Existing code...
})(jQuery);
