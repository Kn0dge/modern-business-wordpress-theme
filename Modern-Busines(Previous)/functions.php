<?php
/**
 * Theme functions and definitions
 *
 * @package WordPress
 */

if (!function_exists('theme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function theme_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'theme'),
            'footer'  => esc_html__('Footer Menu', 'theme'),
        ));

        // Switch default core markup for search form, comment form, and comments to output valid HTML5.
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('theme_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for core custom logo.
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme_content_width() {
    $GLOBALS['content_width'] = apply_filters('theme_content_width', 640);
}
add_action('after_setup_theme', 'theme_content_width', 0);

/**
 * Register widget area.
 */
function theme_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'theme'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'theme'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here.', 'theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 2', 'theme'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here.', 'theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 3', 'theme'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here.', 'theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), '1.0.0');
    
    wp_enqueue_script('theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
    
    wp_enqueue_script('theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
    
    wp_enqueue_script('theme-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '20151215', true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'theme_scripts');

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
 * Load Alpha Color Picker.
 */
require get_template_directory() . '/inc/customizer-alpha-color-control.php';

/**
 * Load Iris Color Picker.
 */
require get_template_directory() . '/inc/customizer-iris-color-control.php';

/**
 * Load custom post types.
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Load shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load meta boxes.
 */
require get_template_directory() . '/inc/meta-boxes.php';

/**
 * Load theme options.
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * Load custom header.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Filter the excerpt length.
 */
function theme_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'theme_excerpt_length');

/**
 * Filter the excerpt "read more" string.
 */
function theme_excerpt_more($more) {
    return '&hellip; <a class="read-more" href="' . esc_url(get_permalink()) . '">' . __('Read More', 'theme') . '</a>';
}
add_filter('excerpt_more', 'theme_excerpt_more');

/**
 * Add custom color palette to the block editor.
 */
function theme_block_editor_settings() {
    // Get the colors from the customizer
    $primary_color = get_theme_mod('primary_color', '#13aff0');
    $secondary_color = get_theme_mod('secondary_color', '#0b7cac');
    $links_color = get_theme_mod('links_color', '#333333');
    $background_color = get_theme_mod('background_color', '#ffffff');
    
    // Add the colors to the editor
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Primary', 'theme'),
            'slug'  => 'primary',
            'color' => $primary_color,
        ),
        array(
            'name'  => __('Secondary', 'theme'),
            'slug'  => 'secondary',
            'color' => $secondary_color,
        ),
        array(
            'name'  => __('Links', 'theme'),
            'slug'  => 'links',
            'color' => $links_color,
        ),
        array(
            'name'  => __('Background', 'theme'),
            'slug'  => 'background',
            'color' => $background_color,
        ),
        array(
            'name'  => __('Black', 'theme'),
            'slug'  => 'black',
            'color' => '#000000',
        ),
        array(
            'name'  => __('White', 'theme'),
            'slug'  => 'white',
            'color' => '#ffffff',
        ),
    ));
}
add_action('after_setup_theme', 'theme_block_editor_settings');

function mordern_business_customizer_assets() {
    wp_enqueue_script('alpha-color-picker', get_template_directory_uri() . '/js/alpha-color-control.js', array('jquery', 'wp-color-picker-alpha'), null, true);
    wp_enqueue_style('alpha-color-picker', get_template_directory_uri() . '/js/alpha-color-control.css');
}
add_action('customize_controls_enqueue_scripts', 'mordern_business_customizer_assets');
