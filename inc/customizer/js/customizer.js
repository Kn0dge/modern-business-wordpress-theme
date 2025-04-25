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
                }
            }
        });
    });

    // Live preview for portfolio count
    wp.customize('portfolio_count', function(value) {
        value.bind(function(newval) {
            location.reload();
        });
    });

    // Live preview for testimonials count
    wp.customize('testimonials_count', function(value) {
        value.bind(function(newval) {
            location.reload();
        });
    });

    // Live preview for team count
    wp.customize('team_count', function(value) {
        value.bind(function(newval) {
            location.reload();
        });
    });

    // Live preview for blog count
    wp.customize('blog_count', function(value) {
        value.bind(function(newval) {
            location.reload();
        });
    });

    // Live preview for contact form shortcode
    wp.customize('contact_form_shortcode', function(value) {
        value.bind(function(newval) {
            location.reload();
        });
    });

    // Removed live preview for custom overlay color as custom option is removed

    // Existing code...
})(jQuery);
