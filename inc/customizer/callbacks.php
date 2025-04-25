<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Sanitize RGBA color string.
 *
 * @param string $color RGBA color string.
 * @return string Sanitized RGBA color string or empty string.
 */
function modern_business_sanitize_rgba_color( $color ) {
    if ( empty( $color ) ) {
        return '';
    }

    // Allow hex colors without alpha
    if ( preg_match( '/^#([A-Fa-f0-9]{3}){1,2}$/', $color ) ) {
        return sanitize_hex_color( $color );
    }

    // Allow rgba colors
    if ( preg_match( '/^rgba?\(\s*(\d{1,3}\s*,\s*){2,3}(\d{1,3}|\d*\.?\d+)\s*\)$/', $color ) ) {
        return esc_attr( $color );
    }

    return '';
}

/**
 * Sanitize image input for customizer.
 *
 * @param string $image Image URL or attachment ID.
 * @return string Sanitized image URL or empty string.
 */
function modern_business_sanitize_image( $image ) {
    // Allow empty value.
    if ( empty( $image ) ) {
        return '';
    }

    // Check if it's a valid URL.
    if ( filter_var( $image, FILTER_VALIDATE_URL ) ) {
        return esc_url_raw( $image );
    }

    // Check if it's an attachment ID.
    if ( is_numeric( $image ) ) {
        $image_src = wp_get_attachment_url( intval( $image ) );
        if ( $image_src ) {
            return esc_url_raw( $image_src );
        }
    }

    // Otherwise, return empty string.
    return '';
}
/**
 * Callback functions for active_callback in Customizer options.
 *
 * @package Modern_Business
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function modern_business_is_hero_section_enabled() {
    return get_theme_mod( 'enable_hero_section', true );
}

/**
 * Check if hero slider is enabled.
 *
 * @return bool
 */
function modern_business_is_hero_slider_enabled() {
    return get_theme_mod( 'enable_hero_slider', false );
}

/**
 * Active callback to disable hero background color when hero slider is enabled.
 *
 * @return bool
 */
if ( ! function_exists( 'modern_business_is_hero_background_color_enabled' ) ) {
    function modern_business_is_hero_background_color_enabled() {
        return ! modern_business_is_hero_slider_enabled() && get_theme_mod( 'enable_hero_background_color', true ) && modern_business_is_hero_section_enabled();
    }
}

/**
 * Active callback to show hero slider options only when hero slider is enabled.
 *
 * @return bool
 */
if ( ! function_exists( 'modern_business_is_hero_slider_options_enabled' ) ) {
    function modern_business_is_hero_slider_options_enabled() {
        return modern_business_is_hero_slider_enabled();
    }
}

/**
 * Sanitize checkbox input.
 *
 * @param mixed $checked Checkbox value.
 * @return bool
 */
function sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true === $checked ) || $checked === '1' ) ? true : false;
}

if ( ! function_exists( 'modern_business_is_hero_background_color_enabled' ) ) {
    function modern_business_is_hero_background_color_enabled() {
        return ! modern_business_is_hero_slider_enabled() && get_theme_mod( 'enable_hero_background_color', true ) && modern_business_is_hero_section_enabled();
    }
}

function modern_business_is_hero_text_color_enabled() {
    return get_theme_mod( 'enable_hero_text_color', true ) && modern_business_is_hero_section_enabled();
}

function modern_business_is_hero_title_font_size_enabled() {
    return get_theme_mod( 'enable_hero_title_font_size', true );
}

function modern_business_is_hero_subtitle_font_size_enabled() {
    return get_theme_mod( 'enable_hero_subtitle_font_size', true );
}

function modern_business_is_hero_font_family_enabled() {
    return get_theme_mod( 'enable_hero_font_family', true );
}

function modern_business_is_hero_padding_enabled() {
    return get_theme_mod( 'enable_hero_padding', true ) && modern_business_is_hero_section_enabled();
}

function modern_business_is_portfolio_section_enabled() {
    return get_theme_mod( 'enable_portfolio_section', true );
}

function modern_business_is_portfolio_background_color_enabled() {
    return get_theme_mod( 'enable_portfolio_background_color', true ) && modern_business_is_portfolio_section_enabled();
}

function modern_business_is_portfolio_text_color_enabled() {
    return get_theme_mod( 'enable_portfolio_text_color', true ) && modern_business_is_portfolio_section_enabled();
}

function modern_business_is_portfolio_padding_enabled() {
    return get_theme_mod( 'enable_portfolio_padding', true ) && modern_business_is_portfolio_section_enabled();
}

function modern_business_is_testimonials_section_enabled() {
    return get_theme_mod( 'enable_testimonials_section', true );
}

function modern_business_is_testimonials_background_color_enabled() {
    return get_theme_mod( 'enable_testimonials_background_color', true ) && modern_business_is_testimonials_section_enabled();
}

function modern_business_is_testimonials_text_color_enabled() {
    return get_theme_mod( 'enable_testimonials_text_color', true ) && modern_business_is_testimonials_section_enabled();
}

function modern_business_is_testimonials_padding_enabled() {
    return get_theme_mod( 'enable_testimonials_padding', true ) && modern_business_is_testimonials_section_enabled();
}

function modern_business_is_team_section_enabled() {
    return get_theme_mod( 'enable_team_section', true );
}

function modern_business_is_team_background_color_enabled() {
    return get_theme_mod( 'enable_team_background_color', true ) && modern_business_is_team_section_enabled();
}

function modern_business_is_team_text_color_enabled() {
    return get_theme_mod( 'enable_team_text_color', true ) && modern_business_is_team_section_enabled();
}

function modern_business_is_team_padding_enabled() {
    return get_theme_mod( 'enable_team_padding', true ) && modern_business_is_team_section_enabled();
}

function modern_business_is_contact_section_enabled() {
    return get_theme_mod( 'enable_contact_section', true );
}

function modern_business_is_contact_background_color_enabled() {
    return get_theme_mod( 'enable_contact_background_color', true ) && modern_business_is_contact_section_enabled();
}

function modern_business_is_contact_text_color_enabled() {
    return get_theme_mod( 'enable_contact_text_color', true ) && modern_business_is_contact_section_enabled();
}

function modern_business_is_contact_padding_enabled() {
    return get_theme_mod( 'enable_contact_padding', true ) && modern_business_is_contact_section_enabled();
}

function modern_business_is_blog_section_enabled() {
    return get_theme_mod( 'enable_blog_section', true );
}

function modern_business_is_blog_background_color_enabled() {
    return get_theme_mod( 'enable_blog_background_color', true ) && modern_business_is_blog_section_enabled();
}

function modern_business_is_blog_text_color_enabled() {
    return get_theme_mod( 'enable_blog_text_color', true ) && modern_business_is_blog_section_enabled();
}

function modern_business_is_services_section_enabled() {
    return get_theme_mod( 'enable_services_section', true );
}

function modern_business_is_services_background_color_enabled() {
    return get_theme_mod( 'enable_services_background_color', true ) && modern_business_is_services_section_enabled();
}

function modern_business_is_services_text_color_enabled() {
    return get_theme_mod( 'enable_services_text_color', true ) && modern_business_is_services_section_enabled();
}

function modern_business_is_services_padding_enabled() {
    return get_theme_mod( 'enable_services_padding', true ) && modern_business_is_services_section_enabled();
}

function modern_business_is_about_section_enabled() {
    return get_theme_mod( 'enable_about_section', true );
}

function modern_business_is_about_background_color_enabled() {
    return get_theme_mod( 'enable_about_background_color', true ) && modern_business_is_about_section_enabled();
}

function modern_business_is_about_text_color_enabled() {
    return get_theme_mod( 'enable_about_text_color', true ) && modern_business_is_about_section_enabled();
}

function modern_business_is_about_padding_enabled() {
    return get_theme_mod( 'enable_about_padding', true ) && modern_business_is_about_section_enabled();
}

function modern_business_is_hero_title_customization_enabled() {
    return get_theme_mod( 'hero_title_customization', true );
}

function modern_business_is_hero_title_font_size_customization_enabled() {
    return get_theme_mod( 'hero_title_font_size_customization', true );
}

function modern_business_is_hero_subtitle_customization_enabled() {
    return get_theme_mod( 'hero_subtitle_customization', true );
}

function modern_business_is_hero_subtitle_font_size_customization_enabled() {
    return get_theme_mod( 'hero_subtitle_font_size_customization', true );
}

function modern_business_is_hero_button_customization_enabled() {
    return get_theme_mod( 'hero_button_customization', true );
}
