<?php
/**
 * Modern Business functions and definitions
 *
 * @package Modern_Business
 */
require_once get_template_directory() . '/inc/customizer/register-sections-panel.php';


if (!defined('_S_VERSION')) {
    // Replace the version number as needed
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function modern_business_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Register menu locations
    register_nav_menus(
        array(
            'primary' => esc_html__('Primary Menu', 'modern-business'),
            'footer' => esc_html__('Footer Menu', 'modern-business'),
        )
    );

    // Switch default core markup to output valid HTML5
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'modern_business_setup');

/**
 * Register widget area.
 */
function modern_business_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'modern-business'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'modern-business'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer 1', 'modern-business'),
            'id'            => 'footer-1',
            'description'   => esc_html__('First footer widget area', 'modern-business'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer 2', 'modern-business'),
            'id'            => 'footer-2',
            'description'   => esc_html__('Second footer widget area', 'modern-business'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer 3', 'modern-business'),
            'id'            => 'footer-3',
            'description'   => esc_html__('Third footer widget area', 'modern-business'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__('Footer 4', 'modern-business'),
            'id'            => 'footer-4',
            'description'   => esc_html__('Fourth footer widget area', 'modern-business'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'modern_business_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function modern_business_scripts() {
    wp_enqueue_style('modern-business-style', get_stylesheet_uri(), array(), _S_VERSION);
    
    // Font Awesome for icons
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    
    // Main JS file
    wp_enqueue_script('modern-business-script', get_template_directory_uri() . '/js/main.js', array('jquery'), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'modern_business_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Theme options page
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * Custom post types
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Load shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Add custom meta boxes
 */
require get_template_directory() . '/inc/meta-boxes.php';