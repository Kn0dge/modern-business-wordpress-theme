(function($) {
    // Hero Section
    wp.customize('enable_hero_section', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.hero-section').show();
            } else {
                $('.hero-section').hide();
            }
        });
    });

    wp.customize('hero_background_color', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('background-color', newval);
        });
    });

    wp.customize('hero_text_color', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('color', newval);
        });
    });

    wp.customize('hero_font_family', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('font-family', newval);
        });
    });

    wp.customize('hero_font_weight', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('font-weight', newval);
        });
    });

    wp.customize('hero_line_height', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('line-height', newval);
        });
    });

    wp.customize('hero_title_font_size', function(value) {
        value.bind(function(newval) {
            $('.hero-section .hero-title').css('font-size', newval);
        });
    });

    wp.customize('hero_subtitle_font_size', function(value) {
        value.bind(function(newval) {
            $('.hero-section .hero-subtitle').css('font-size', newval);
        });
    });

    wp.customize('hero_padding_top', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('padding-top', newval);
        });
    });
    wp.customize('hero_padding_right', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('padding-right', newval);
        });
    });
    wp.customize('hero_padding_bottom', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('padding-bottom', newval);
        });
    });
    wp.customize('hero_padding_left', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('padding-left', newval);
        });
    });

    wp.customize('hero_margin_top', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('margin-top', newval);
        });
    });
    wp.customize('hero_margin_right', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('margin-right', newval);
        });
    });
    wp.customize('hero_margin_bottom', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('margin-bottom', newval);
        });
    });
    wp.customize('hero_margin_left', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('margin-left', newval);
        });
    });

    wp.customize('hero_border_width', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('border-width', newval);
        });
    });
    wp.customize('hero_border_style', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('border-style', newval);
        });
    });
    wp.customize('hero_border_color', function(value) {
        value.bind(function(newval) {
            $('.hero-section').css('border-color', newval);
        });
    });

    // Portfolio Section
    wp.customize('enable_portfolio_section', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.portfolio-section').show();
            } else {
                $('.portfolio-section').hide();
            }
        });
    });

    wp.customize('portfolio_background_color', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('background-color', newval);
        });
    });

    wp.customize('portfolio_text_color', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('color', newval);
        });
    });

    wp.customize('portfolio_font_family', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('font-family', newval);
        });
    });

    wp.customize('portfolio_font_weight', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('font-weight', newval);
        });
    });

    wp.customize('portfolio_line_height', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('line-height', newval);
        });
    });

    wp.customize('portfolio_padding_top', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('padding-top', newval);
        });
    });
    wp.customize('portfolio_padding_right', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('padding-right', newval);
        });
    });
    wp.customize('portfolio_padding_bottom', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('padding-bottom', newval);
        });
    });
    wp.customize('portfolio_padding_left', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('padding-left', newval);
        });
    });

    wp.customize('portfolio_margin_top', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('margin-top', newval);
        });
    });
    wp.customize('portfolio_margin_right', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('margin-right', newval);
        });
    });
    wp.customize('portfolio_margin_bottom', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('margin-bottom', newval);
        });
    });
    wp.customize('portfolio_margin_left', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('margin-left', newval);
        });
    });

    wp.customize('portfolio_border_width', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('border-width', newval);
        });
    });
    wp.customize('portfolio_border_style', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('border-style', newval);
        });
    });
    wp.customize('portfolio_border_color', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('border-color', newval);
        });
    });

    // Additional sections (Testimonials, Team, Contact, Blog, Services, About) can be added similarly
})(jQuery);
