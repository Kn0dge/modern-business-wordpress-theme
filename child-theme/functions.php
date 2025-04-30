<?php
/**
 * Modern Business Child Theme functions and definitions
 *
 * @package Modern_Business_Child
 */

if (!function_exists('modern_business_child_enqueue_styles')) {
    /**
     * Enqueue parent and child theme styles
     */
    function modern_business_child_enqueue_styles() {
        $parent_style = 'modern-business-style'; // This is 'modern-business-style' for the parent theme.

        wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
        wp_enqueue_style('modern-business-child-style',
            get_stylesheet_directory_uri() . '/style.css',
            array($parent_style),
            wp_get_theme()->get('Version')
        );

        // Enqueue mobile menu CSS
        wp_enqueue_style('modern-business-mobile-menu-style',
            get_stylesheet_directory_uri() . '/mobile-menu.css',
            array('modern-business-child-style'),
            wp_get_theme()->get('Version')
        );
    }
}
add_action('wp_enqueue_scripts', 'modern_business_child_enqueue_styles');

    /**
 * Add ID to menu container for selective refresh compatibility
 */
function modern_business_add_menu_container_id($args) {
    if (isset($args['theme_location']) && $args['theme_location'] === 'primary') {
        $args['container_id'] = 'site-navigation';
    }
    return $args;
}
add_filter('wp_nav_menu_args', 'modern_business_add_menu_container_id');

?>
