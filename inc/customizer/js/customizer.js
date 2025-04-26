(function($) {
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

    // General Settings - Colors
    wp.customize('general_text_color', function(value) {
        value.bind(function(newval) {
            $('body').css('color', newval);
        });
    });
    wp.customize('general_background_color', function(value) {
        value.bind(function(newval) {
            $('body').css('background-color', newval);
        });
    });

    // General Settings - Typography
    wp.customize('general_font_family', function(value) {
        value.bind(function(newval) {
            $('body').css('font-family', newval);
        });
    });
    wp.customize('general_font_size', function(value) {
        value.bind(function(newval) {
            $('body').css('font-size', newval + 'px');
        });
    });

    // Hero Section
    wp.customize('enable_hero_section', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('#hero').show();
            } else {
                $('#hero').hide();
            }
        });
    });
    wp.customize('hero_title', function(value) {
        value.bind(function(newval) {
            $('#hero .hero-title').text(newval);
        });
    });
    wp.customize('hero_subtitle', function(value) {
        value.bind(function(newval) {
            $('#hero .hero-subtitle').text(newval);
        });
    });
    wp.customize('hero_background_color', function(value) {
        value.bind(function(newval) {
            $('#hero').css('background-color', newval);
        });
    });
    wp.customize('hero_background', function(value) {
        value.bind(function(newval) {
            $('#hero').css('background-image', newval ? 'url(' + newval + ')' : 'none');
        });
    });
    wp.customize('hero_text_color', function(value) {
        value.bind(function(newval) {
            $('#hero, #hero .hero-content, #hero .hero-content *').css('color', newval);
        });
    });
    wp.customize('hero_text_align', function(value) {
        value.bind(function(newval) {
            var align = newval === 'center' ? 'center' : (newval === 'right' ? 'flex-end' : 'flex-start');
            $('#hero .hero-content').css({
                'text-align': newval,
                'align-items': align
            });
        });
    });
    wp.customize('hero_padding_top', function(value) {
        value.bind(function(newval) {
            $('#hero').css('padding-top', newval);
        });
    });
    wp.customize('hero_padding_bottom', function(value) {
        value.bind(function(newval) {
            $('#hero').css('padding-bottom', newval);
        });
    });
    wp.customize('hero_font_size', function(value) {
        value.bind(function(newval) {
            $('#hero .hero-title').css('font-size', newval + 'px');
        });
    });
    wp.customize('hero_primary_btn_text', function(value) {
        value.bind(function(newval) {
            $('#hero .hero-buttons .btn-primary').text(newval);
        });
    });
    wp.customize('hero_primary_btn_url', function(value) {
        value.bind(function(newval) {
            $('#hero .hero-buttons .btn-primary').attr('href', newval);
        });
    });
    wp.customize('hero_secondary_btn_text', function(value) {
        value.bind(function(newval) {
            $('#hero .hero-buttons .btn-outline').text(newval);
        });
    });
    wp.customize('hero_secondary_btn_url', function(value) {
        value.bind(function(newval) {
            $('#hero .hero-buttons .btn-outline').attr('href', newval);
        });
    });

    // About Section
    wp.customize('enable_about_section', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.about-section').show();
            } else {
                $('.about-section').hide();
            }
        });
    });
    wp.customize('about_title', function(value) {
        value.bind(function(newval) {
            $('.about-section .section-title').text(newval);
        });
    });
    wp.customize('about_subtitle', function(value) {
        value.bind(function(newval) {
            $('.about-section .section-subtitle').text(newval);
        });
    });
    wp.customize('about_bg_color', function(value) {
        value.bind(function(newval) {
            $('.about-section .background-color-overlay').css('background-color', newval);
        });
    });
    wp.customize('about_text_color', function(value) {
        value.bind(function(newval) {
            $('.about-section, .about-section *').css('color', newval);
        });
    });
    wp.customize('about_text_align', function(value) {
        value.bind(function(newval) {
            $('.about-section .section-subtitle').css('text-align', newval);
        });
    });
    wp.customize('about_padding_top', function(value) {
        value.bind(function(newval) {
            $('.about-section').css('padding-top', newval);
        });
    });
    wp.customize('about_padding_bottom', function(value) {
        value.bind(function(newval) {
            $('.about-section').css('padding-bottom', newval);
        });
    });
    wp.customize('about_font_size', function(value) {
        value.bind(function(newval) {
            $('.about-section').css('font-size', newval + 'px');
        });
    });

    // Services Section
    wp.customize('enable_services_section', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.services-section').show();
            } else {
                $('.services-section').hide();
            }
        });
    });
    wp.customize('services_title', function(value) {
        value.bind(function(newval) {
            $('.services-section .section-title').text(newval);
        });
    });
    wp.customize('services_subtitle', function(value) {
        value.bind(function(newval) {
            $('.services-section .section-subtitle').text(newval);
        });
    });
    wp.customize('services_text_align', function(value) {
        value.bind(function(newval) {
            $('.services-section').css('text-align', newval);
            $('.services-section .section-subtitle').css('text-align', newval);
        });
    });
    wp.customize('services_bg_color', function(value) {
        value.bind(function(newval) {
            $('.services-section').css('background-color', newval);
        });
    });
    wp.customize('services_text_color', function(value) {
        value.bind(function(newval) {
            $('.services-section, .services-section *').css('color', newval);
        });
    });
    wp.customize('services_padding_top', function(value) {
        value.bind(function(newval) {
            $('.services-section').css('padding-top', newval);
        });
    });
    wp.customize('services_padding_bottom', function(value) {
        value.bind(function(newval) {
            $('.services-section').css('padding-bottom', newval);
        });
    });
    wp.customize('services_font_size', function(value) {
        value.bind(function(newval) {
            $('.services-section').css('font-size', newval + 'px');
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
    wp.customize('portfolio_title', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section .section-title').text(newval);
        });
    });
    wp.customize('portfolio_subtitle', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section .section-subtitle').text(newval);
        });
    });
    wp.customize('portfolio_text_align', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('text-align', newval);
            $('.portfolio-section .section-subtitle').css('text-align', newval);
        });
    });
    wp.customize('portfolio_bg_color', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('background-color', newval);
        });
    });
    wp.customize('portfolio_background', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.portfolio-section').css('background-image', 'url(' + newval + ')');
            } else {
                $('.portfolio-section').css('background-image', 'none');
            }
        });
    });
    wp.customize('portfolio_text_color', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section, .portfolio-section *').css('color', newval);
        });
    });
    wp.customize('portfolio_padding_top', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('padding-top', newval);
        });
    });
    wp.customize('portfolio_padding_bottom', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section').css('padding-bottom', newval);
        });
    });
    wp.customize('portfolio_font_size', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section, .portfolio-section .section-title, .portfolio-section .section-subtitle, .portfolio-section .portfolio-item').css('font-size', newval + 'px');
        });
    });
    wp.customize('portfolio_primary_btn_text', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section .btn-primary').text(newval);
        });
    });
    wp.customize('portfolio_primary_btn_url', function(value) {
        value.bind(function(newval) {
            $('.portfolio-section .btn-primary').attr('href', newval);
        });
    });

    // Team Section
    wp.customize('enable_team_section', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.team-section').show();
            } else {
                $('.team-section').hide();
            }
        });
    });
    wp.customize('team_title', function(value) {
        value.bind(function(newval) {
            $('.team-section .section-title').text(newval);
        });
    });
    wp.customize('team_subtitle', function(value) {
        value.bind(function(newval) {
            $('.team-section .section-subtitle').text(newval);
        });
    });
    wp.customize('team_text_align', function(value) {
        value.bind(function(newval) {
            $('.team-section').css('text-align', newval);
            $('.team-section .section-subtitle').css('text-align', newval);
        });
    });
    wp.customize('team_bg_color', function(value) {
        value.bind(function(newval) {
            $('.team-section').css('background-color', newval);
        });
    });
    wp.customize('team_text_color', function(value) {
        value.bind(function(newval) {
            $('.team-section, .team-section *').css('color', newval);
        });
    });
    wp.customize('team_padding_top', function(value) {
        value.bind(function(newval) {
            $('.team-section').css('padding-top', newval);
        });
    });
    wp.customize('team_padding_bottom', function(value) {
        value.bind(function(newval) {
            $('.team-section').css('padding-bottom', newval);
        });
    });
    wp.customize('team_font_size', function(value) {
        value.bind(function(newval) {
            $('.team-section, .team-section .section-title, .team-section .section-subtitle, .team-section .team-member').css('font-size', newval + 'px');
        });
    });

    // Testimonials Section
    wp.customize('enable_testimonials_section', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.testimonials-section').show();
            } else {
                $('.testimonials-section').hide();
            }
        });
    });
    wp.customize('testimonials_title', function(value) {
        value.bind(function(newval) {
            $('.testimonials-section .section-title').text(newval);
        });
    });
    wp.customize('testimonials_subtitle', function(value) {
        value.bind(function(newval) {
            $('.testimonials-section .section-subtitle').text(newval);
        });
    });
    wp.customize('testimonials_text_align', function(value) {
        value.bind(function(newval) {
            $('.testimonials-section').css('text-align', newval);
            $('.testimonials-section .section-subtitle').css('text-align', newval);
        });
    });
    wp.customize('testimonials_bg_color', function(value) {
        value.bind(function(newval) {
            $('.testimonials-section').css('background-color', newval);
        });
    });
    wp.customize('testimonials_text_color', function(value) {
        value.bind(function(newval) {
            $('.testimonials-section, .testimonials-section *').css('color', newval);
        });
    });
    wp.customize('testimonials_padding_top', function(value) {
        value.bind(function(newval) {
            $('.testimonials-section').css('padding-top', newval);
        });
    });
    wp.customize('testimonials_padding_bottom', function(value) {
        value.bind(function(newval) {
            $('.testimonials-section').css('padding-bottom', newval);
        });
    });
    wp.customize('testimonials_font_size', function(value) {
        value.bind(function(newval) {
            $('.testimonials-section, .testimonials-section .section-title, .testimonials-section .section-subtitle').css('font-size', newval + 'px');
        });
    });

    // Blog Section
    wp.customize('enable_blog_section', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.blog-section').show();
            } else {
                $('.blog-section').hide();
            }
        });
    });
    wp.customize('blog_bg_color', function(value) {
        value.bind(function(newval) {
            $('.blog-section').css('background-color', newval);
        });
    });
    wp.customize('blog_text_color', function(value) {
        value.bind(function(newval) {
            $('.blog-section, .blog-section *').css('color', newval);
        });
    });
    wp.customize('blog_padding_top', function(value) {
        value.bind(function(newval) {
            $('.blog-section').css('padding-top', newval);
        });
    });
    wp.customize('blog_padding_bottom', function(value) {
        value.bind(function(newval) {
            $('.blog-section').css('padding-bottom', newval);
        });
    });
    wp.customize('blog_font_size', function(value) {
        value.bind(function(newval) {
            $('.blog-section, .blog-section *').css('font-size', newval + 'px');
        });
    });

    // Contact Section
    wp.customize('enable_contact_section', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('.contact-section').show();
            } else {
                $('.contact-section').hide();
            }
        });
    });
    wp.customize('contact_title', function(value) {
        value.bind(function(newval) {
            $('.contact-section .section-title').text(newval);
        });
    });
    wp.customize('contact_subtitle', function(value) {
        value.bind(function(newval) {
            $('.contact-section .section-subtitle').text(newval);
        });
    });
    wp.customize('contact_phone', function(value) {
        value.bind(function(newval) {
            $('.contact-section .contact-detail:has(.fa-phone-alt) p').text(newval);
        });
    });
    wp.customize('contact_email', function(value) {
        value.bind(function(newval) {
            $('.contact-section .contact-detail:has(.fa-envelope) p a').attr('href', 'mailto:' + newval).text(newval);
        });
    });
    wp.customize('contact_address', function(value) {
        value.bind(function(newval) {
            $('.contact-section .contact-detail:has(.fa-map-marker-alt) p').text(newval);
        });
    });
    wp.customize('contact_form_shortcode', function(value) {
        value.bind(function(newval) {
            if (newval) {
                if (wp.customize && wp.customize.previewer && typeof wp.customize.previewer.refresh === 'function') {
                    wp.customize.previewer.refresh();
                } else {
                    location.reload();
                }
            } else {
                // If newval is empty, clear the contact form container
                $('.contact-form').empty();
            }
        });
    });
    
    wp.customize('contact_bg_color', function(value) {
        value.bind(function(newval) {
            $('.contact-section').css('background-color', newval);
        });
    });
    wp.customize('contact_text_color', function(value) {
        value.bind(function(newval) {
            $('.contact-section, .contact-section *').css('color', newval);
        });
    });
    wp.customize('contact_text_align', function(value) {
        value.bind(function(newval) {
            $('.contact-section').css('text-align', newval);
            $('.contact-section').css('text-align', newval);
        });
    });

    wp.customize('contact_info_bg_color', function(value) {
        value.bind(function(newval) {
            $('.contact-section .contact-info').css('background-color', newval);
        });
    });

    /*   // Live preview for portfolio count
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
*/
})(jQuery);
