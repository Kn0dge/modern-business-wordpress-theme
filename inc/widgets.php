<?php
/**
 * Register widget areas for dynamic section management
 *
 * @package Modern_Business
 */

function modern_business_register_widget_areas() {
    $sections = array(
        'hero' => __('Hero Section', 'modern-business'),
        'about' => __('About Section', 'modern-business'),
        'services' => __('Services Section', 'modern-business'),
        'portfolio' => __('Portfolio Section', 'modern-business'),
        'team' => __('Team Section', 'modern-business'),
        'testimonials' => __('Testimonials Section', 'modern-business'),
        'blog' => __('Blog Section', 'modern-business'),
        'contact' => __('Contact Section', 'modern-business'),
    );

    foreach ($sections as $id => $name) {
        register_sidebar(
            array(
                'name'          => $name,
                'id'            => 'section-' . $id,
                'description'   => sprintf(__('Widgets in this area will be shown in the %s.', 'modern-business'), $name),
                'before_widget' => '<section id="%1$s" class="widget %2$s section-widget section-widget-' . $id . '">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }
}
add_action('widgets_init', 'modern_business_register_widget_areas');
?>
