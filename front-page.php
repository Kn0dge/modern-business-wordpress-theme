<?php
/**
 * The template for displaying the front page
 *
 * @package Modern_Business
 */

get_header();

// Get homepage sections and sort by order
$homepage_sections = get_option('modern_business_homepage_sections');

if (!empty($homepage_sections)) {
    // Sort sections by order
    uasort($homepage_sections, function($a, $b) {
        return $a['order'] - $b['order'];
    });
    
    // Loop through sections and include them if enabled
    foreach ($homepage_sections as $section_id => $section) {
        if (isset($section['enabled']) && $section['enabled']) {
            get_template_part('template-parts/section', $section_id);
        }
    }
} else {
    // Default fallback sections if the option doesn't exist
    ?>
    <?php if (is_active_sidebar('section-hero')) : ?>
        <?php dynamic_sidebar('section-hero'); ?>
    <?php elseif ( get_theme_mod( 'enable_hero_section', true ) ) : ?>
        <?php get_template_part('template-parts/section', 'hero'); ?>
    <?php endif; ?>

    <?php if (is_active_sidebar('section-about')) : ?>
        <?php dynamic_sidebar('section-about'); ?>
    <?php elseif ( get_theme_mod( 'enable_about_section', true ) ) : ?>
        <?php get_template_part('template-parts/section', 'about'); ?>
    <?php endif; ?>

    <?php if (is_active_sidebar('section-services')) : ?>
        <?php dynamic_sidebar('section-services'); ?>
    <?php elseif ( get_theme_mod( 'enable_services_section', true ) ) : ?>
        <?php get_template_part('template-parts/section', 'services'); ?>
    <?php endif; ?>

    <?php if (is_active_sidebar('section-portfolio')) : ?>
        <?php dynamic_sidebar('section-portfolio'); ?>
    <?php elseif ( get_theme_mod( 'enable_portfolio_section', true ) ) : ?>
        <?php get_template_part('template-parts/section', 'portfolio'); ?>
    <?php endif; ?>

    <?php if (is_active_sidebar('section-team')) : ?>
        <?php dynamic_sidebar('section-team'); ?>
    <?php elseif ( get_theme_mod( 'enable_team_section', true ) ) : ?>
        <?php get_template_part('template-parts/section', 'team'); ?>
    <?php endif; ?>

    <?php if (is_active_sidebar('section-testimonials')) : ?>
        <?php dynamic_sidebar('section-testimonials'); ?>
    <?php elseif ( get_theme_mod( 'enable_testimonials_section', true ) ) : ?>
        <?php get_template_part('template-parts/section', 'testimonials'); ?>
    <?php endif; ?>

    <?php if (is_active_sidebar('section-blog')) : ?>
        <?php dynamic_sidebar('section-blog'); ?>
    <?php elseif ( get_theme_mod( 'enable_blog_section', true ) ) : ?>
        <?php get_template_part('template-parts/section', 'blog'); ?>
    <?php endif; ?>

    <?php if (is_active_sidebar('section-contact')) : ?>
        <?php dynamic_sidebar('section-contact'); ?>
    <?php elseif ( get_theme_mod( 'enable_contact_section', true ) ) : ?>
        <?php get_template_part('template-parts/section', 'contact'); ?>
    <?php endif; ?>
    <?php
}

if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
endif;

get_footer();