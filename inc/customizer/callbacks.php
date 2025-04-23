<?php
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
 * Sanitize checkbox input.
 *
 * @param mixed $checked Checkbox value.
 * @return bool
 */
function sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true === $checked ) || $checked === '1' ) ? true : false;
}

function modern_business_is_hero_background_color_enabled() {
    return get_theme_mod( 'enable_hero_background_color', true ) && modern_business_is_hero_section_enabled();
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
