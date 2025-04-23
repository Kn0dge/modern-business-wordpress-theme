<?php
/**
 * The template for displaying the front page
 *
 * @package Modern_Business
 */

get_header();

// Get homepage sections and sort by order
$sections = array('hero', 'about', 'services', 'portfolio', 'team', 'testimonials', 'blog', 'contact');

foreach ($sections as $section) {
    if (get_theme_mod('homepage_section_' . $section . '_enabled', true)) {
        get_template_part('template-parts/section', $section);
    }
}

get_footer();