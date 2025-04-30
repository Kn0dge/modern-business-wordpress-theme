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

    // Mobile Menu Customizer Bindings and Functionality
     // Enable Mobile Menu
     wp.customize('enable_mobile_menu', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.menu-toggle').show();
            } else {
                $('.menu-toggle').hide();
                $('#site-navigation').hide();
            }
        });
    });

    // Mobile Menu Background Color
    wp.customize('mobile_menu_background_color', function(value) {
        value.bind(function(newval) {
            $('#site-navigation').css('background-color', newval);
        });
    });

    // Mobile Menu Text Color
    wp.customize('mobile_menu_text_color', function(value) {
        value.bind(function(newval) {
            $('#site-navigation').css('color', newval);
            $('#site-navigation a').css('color', newval);
        });
    });

    // Mobile Menu Font Family
    wp.customize('mobile_menu_font_family', function(value) {
        value.bind(function(newval) {
            $('#site-navigation').css('font-family', newval);
        });
    });

    // Mobile Menu Font Size
    wp.customize('mobile_menu_font_size', function(value) {
        value.bind(function(newval) {
            $('#site-navigation').css('font-size', newval + 'px');
        });
    });

    // Mobile Menu Link Color
    wp.customize('mobile_menu_link_color', function(value) {
        value.bind(function(newval) {
            $('#site-navigation a').css('color', newval);
        });
    });

    // Mobile Menu Link Hover Color
    wp.customize('mobile_menu_link_hover_color', function(value) {
        value.bind(function(newval) {
            $('#site-navigation a:hover').css('color', newval);
        });
    });

    // Mobile Menu Toggle Color
    wp.customize('mobile_menu_toggle_color', function(value) {
        value.bind(function(newval) {
            $('.menu-toggle .menu-icon').css('background-color', newval);
        });
    });

    // Mobile Menu Toggle Size
    wp.customize('mobile_menu_toggle_size', function(value) {
        value.bind(function(newval) {
            $('.menu-toggle').css({
                'width': newval + 'px',
                'height': newval + 'px',
            });
            $('.menu-toggle .menu-icon').css({
                'width': newval + 'px',
                'height': newval + 'px',
            });
        });
    });

    // Mobile Menu Padding
    wp.customize('mobile_menu_padding', function(value) {
        value.bind(function(newval) {
            $('#site-navigation').css('padding', newval);
        });
    });

    // Mobile Menu Border Color
    wp.customize('mobile_menu_border_color', function(value) {
        value.bind(function(newval) {
            $('#site-navigation').css('border-color', newval);
        });
    });

    // Mobile Menu Border Radius
    wp.customize('mobile_menu_border_radius', function(value) {
        value.bind(function(newval) {
            $('#site-navigation').css('border-radius', newval + 'px');
        });
    });

    // Mobile Menu Overlay Color
    wp.customize('mobile_menu_overlay_color', function(value) {
        value.bind(function(newval) {
            $('.mobile-menu-overlay').css('background-color', newval);
        });
    });

    // Mobile Menu Overlay Opacity
    wp.customize('mobile_menu_overlay_opacity', function(value) {
        value.bind(function(newval) {
            $('.mobile-menu-overlay').css('opacity', newval);
        });
    });

    // Mobile Menu Animation Style
    wp.customize('mobile_menu_animation_style', function(value) {
        value.bind(function(newval) {
            $('#site-navigation').attr('data-animation-style', newval);
        });
    });

    // Mobile Menu Sticky Enabled
    wp.customize('mobile_menu_sticky_enabled', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('#masthead').addClass('sticky-mobile-menu');
            } else {
                $('#masthead').removeClass('sticky-mobile-menu');
            }
        });
    });

    // Mobile Menu Breakpoint
    wp.customize('mobile_menu_breakpoint', function(value) {
        value.bind(function(newval) {
            window.mobileMenuBreakpoint = newval;
        });
    });

    // Mobile Menu Submenu Toggle Enabled
    wp.customize('mobile_menu_submenu_toggle_enabled', function(value) {
        value.bind(function(newval) {
            if (newval) {
                addSubmenuToggles();
            } else {
                removeSubmenuToggles();
            }
        });
    });

    // Mobile Menu Submenu Toggle Icon
    wp.customize('mobile_menu_submenu_toggle_icon', function(value) {
        value.bind(function(newval) {
            $('.submenu-toggle').text(newval);
        });
    });

    // Functions to add/remove submenu toggles
    function addSubmenuToggles() {
        $('#site-navigation .menu-item-has-children').each(function() {
            if ($(this).children('.submenu-toggle').length === 0) {
                $(this).children('a').after('<button class="submenu-toggle" aria-expanded="false" aria-label="Toggle Submenu">+</button>');
            }
        });

        $('.submenu-toggle').off('click').on('click', function(e) {
            e.preventDefault();
            var $button = $(this);
            var $submenu = $button.siblings('.sub-menu');
            var expanded = $button.attr('aria-expanded') === 'true';
            $button.attr('aria-expanded', !expanded);
            $submenu.slideToggle(200);
        });
    }

    function removeSubmenuToggles() {
        $('.submenu-toggle').remove();
        $('#site-navigation .sub-menu').show();
    }

    // Initialize submenu toggles on document ready
    $(document).ready(function() {
        wp.customize('mobile_menu_submenu_toggle_enabled').get() && addSubmenuToggles();

        // Mobile menu toggle button click
        $('.menu-toggle').on('click', function() {
            var $nav = $('#site-navigation');
            var $overlay = $('.mobile-menu-overlay');

            if ($nav.is(':visible')) {
                $nav.slideUp(300);
                $overlay.fadeOut(300);
            } else {
                $nav.slideDown(300);
                if ($overlay.length === 0) {
                    $('body').append('<div class="mobile-menu-overlay"></div>');
                    $overlay = $('.mobile-menu-overlay');
                }
                $overlay.css('opacity', wp.customize('mobile_menu_overlay_opacity').get() || 0.5);
                $overlay.css('background-color', wp.customize('mobile_menu_overlay_color').get() || '#000');
                $overlay.fadeIn(300);

                $overlay.on('click', function() {
                    $nav.slideUp(300);
                    $overlay.fadeOut(300);
                });
            }
        });
    });

(function($) {
    // Existing code above...

    // Listen for changes to the primary menu and refresh the menu container
    wp.customize('nav_menu_locations[primary]', function(value) {
        value.bind(function(newval) {
            wp.customize.selectiveRefresh.partial('primary_menu').refresh();
        });
    });

})(jQuery);
