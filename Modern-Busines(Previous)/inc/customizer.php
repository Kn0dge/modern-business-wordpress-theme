<?php
/**
 * Modern Business Theme Customizer
 *
 * @package Modern_Business
 */

function modern_business_load_custom_controls() {
    require_once get_template_directory() . '/inc/customizer-iris-color-control.php';
    require_once get_template_directory() . '/inc/customizer-alpha-color-control.php';
}
add_action('customize_register', 'modern_business_load_custom_controls');

/**
 * Enqueue wp-color-picker script and style for customizer controls
 */
function modern_business_customizer_enqueue_scripts() {
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_style('wp-color-picker');
}
add_action('customize_controls_enqueue_scripts', 'modern_business_customizer_enqueue_scripts');

function modern_business_customize_register($wp_customize) {
    // Remove old theme_global_colors section and settings to avoid duplication
    if (isset($wp_customize->sections()['theme_global_colors'])) {
        unset($wp_customize->sections()['theme_global_colors']);
    }
    $old_settings = ['primary_color', 'secondary_color', 'links_color', 'background_color'];
    foreach ($old_settings as $setting) {
        if (isset($wp_customize->settings()[$setting])) {
            unset($wp_customize->settings()[$setting]);
        }
    }

    // Unified Global Colors Section
    $wp_customize->add_section(
        'modern_business_global_colors',
        array(
            'title'    => __('Global Colors', 'modern-business'),
            'priority' => 20,
        )
    );

    $wp_customize->add_setting(
        'global_primary_color',
        array(
            'default'           => '#3B82F6',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Customizer_Iris_Color_Control(
            $wp_customize,
            'global_primary_color',
            array(
                'label'    => __('Primary Color', 'modern-business'),
                'section'  => 'modern_business_global_colors',
                'settings' => 'global_primary_color',
                'priority' => 10,
            )
        )
    );

    $wp_customize->add_setting(
        'global_secondary_color',
        array(
            'default'           => '#14B8A6',
            'sanitize_callback' => 'sanitize_rgba_color',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Customizer_Alpha_Color_Control(
            $wp_customize,
            'global_secondary_color',
            array(
                'label'    => __('Secondary Color', 'modern-business'),
                'section'  => 'modern_business_global_colors',
                'settings' => 'global_secondary_color',
                'priority' => 20,
            )
        )
    );

    $wp_customize->add_setting(
        'global_accent_color',
        array(
            'default'           => '#F97316',
            'sanitize_callback' => 'sanitize_rgba_color',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Customizer_Alpha_Color_Control(
            $wp_customize,
            'global_accent_color',
            array(
                'label'    => __('Accent Color', 'modern-business'),
                'section'  => 'modern_business_global_colors',
                'settings' => 'global_accent_color',
                'priority' => 30,
            )
        )
    );

    $wp_customize->add_setting(
        'global_background_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Customizer_Iris_Color_Control(
            $wp_customize,
            'global_background_color',
            array(
                'label'    => __('Background Color', 'modern-business'),
                'section'  => 'modern_business_global_colors',
                'settings' => 'global_background_color',
                'priority' => 40,
            )
        )
    );

    $wp_customize->add_setting(
        'global_text_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Customizer_Iris_Color_Control(
            $wp_customize,
            'global_text_color',
            array(
                'label'    => __('Text Color', 'modern-business'),
                'section'  => 'modern_business_global_colors',
                'settings' => 'global_text_color',
                'priority' => 50,
            )
        )
    );

    $wp_customize->add_setting(
        'global_button_color',
        array(
            'default'           => '#3B82F6',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Customizer_Iris_Color_Control(
            $wp_customize,
            'global_button_color',
            array(
                'label'    => __('Button Color', 'modern-business'),
                'section'  => 'modern_business_global_colors',
                'settings' => 'global_button_color',
                'priority' => 60,
            )
        )
    );

    $wp_customize->add_setting(
        'global_button_text_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Customizer_Iris_Color_Control(
            $wp_customize,
            'global_button_text_color',
            array(
                'label'    => __('Button Text Color', 'modern-business'),
                'section'  => 'modern_business_global_colors',
                'settings' => 'global_button_text_color',
                'priority' => 70,
            )
        )
    );

    // Typography Section
    $wp_customize->add_section('modern_business_typography', array(
        'title'    => __('Typography', 'modern-business'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('heading_font_family', array(
        'default'           => 'Arial, sans-serif',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('heading_font_family', array(
        'label'    => __('Heading Font Family', 'modern-business'),
        'section'  => 'modern_business_typography',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('body_font_family', array(
        'default'           => 'Arial, sans-serif',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('body_font_family', array(
        'label'    => __('Body Font Family', 'modern-business'),
        'section'  => 'modern_business_typography',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('base_font_size', array(
        'default'           => 16,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('base_font_size', array(
        'label'    => __('Base Font Size (px)', 'modern-business'),
        'section'  => 'modern_business_typography',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 10,
            'max' => 30,
        ),
    ));

    // Layout Section
    $wp_customize->add_section('modern_business_layout', array(
        'title'    => __('Layout', 'modern-business'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('header_layout', array(
        'default'           => 'standard',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('header_layout', array(
        'label'    => __('Header Layout', 'modern-business'),
        'section'  => 'modern_business_layout',
        'type'     => 'select',
        'choices'  => array(
            'standard' => __('Standard', 'modern-business'),
            'centered' => __('Centered', 'modern-business'),
            'minimal'  => __('Minimal', 'modern-business'),
        ),
    ));

    $wp_customize->add_setting('footer_layout', array(
        'default'           => 'standard',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_layout', array(
        'label'    => __('Footer Layout', 'modern-business'),
        'section'  => 'modern_business_layout',
        'type'     => 'select',
        'choices'  => array(
            'standard' => __('Standard', 'modern-business'),
            'centered' => __('Centered', 'modern-business'),
            'minimal'  => __('Minimal', 'modern-business'),
        ),
    ));

    $wp_customize->add_setting('sidebar_position', array(
        'default'           => 'right',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('sidebar_position', array(
        'label'    => __('Sidebar Position', 'modern-business'),
        'section'  => 'modern_business_layout',
        'type'     => 'select',
        'choices'  => array(
            'right'  => __('Right', 'modern-business'),
            'left'   => __('Left', 'modern-business'),
            'none'   => __('None', 'modern-business'),
        ),
    ));

    // Additional sections and settings can be added here as needed
    $wp_customize->add_setting('testimonials_subtitle', array(
        'default'           => __('What our clients say about us', 'modern-business'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonials_subtitle', array(
        'label'    => __('Testimonials Section Subtitle', 'modern-business'),
        'section'  => 'modern_business_testimonials_section',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('testimonials_count', array(
        'default'           => 5,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('testimonials_count', array(
        'label'    => __('Number of Testimonials to Show', 'modern-business'),
        'section'  => 'modern_business_testimonials_section',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 20,
        ),
    ));

    $wp_customize->add_setting('testimonials_bg_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'testimonials_bg_color', array(
        'label'    => __('Background Color', 'modern-business'),
        'section'  => 'modern_business_testimonials_section',
        'settings' => 'testimonials_bg_color',
    )));

    $wp_customize->add_setting('testimonials_text_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'testimonials_text_color', array(
        'label'    => __('Text Color', 'modern-business'),
        'section'  => 'modern_business_testimonials_section',
        'settings' => 'testimonials_text_color',
    )));

    $wp_customize->add_setting('testimonials_text_align', array(
        'default'           => 'center',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('testimonials_text_align', array(
        'label'    => __('Text Alignment', 'modern-business'),
        'section'  => 'modern_business_testimonials_section',
        'type'     => 'select',
        'choices'  => array(
            'left'   => __('Left', 'modern-business'),
            'center' => __('Center', 'modern-business'),
            'right'  => __('Right', 'modern-business'),
        ),
    ));

    // Contact Section Style Customization
    $wp_customize->add_setting(
        'contact_bg_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_rgba_color',
        )
    );
    $wp_customize->add_control(
        new Customizer_Iris_Color_Control(
            $wp_customize,
            'contact_bg_color',
            array(
                'label'    => __('Background Color', 'modern-business'),
                'section'  => 'modern_business_contact_section',
                'settings' => 'contact_bg_color',
            )
        )
    );

    // Add transparency setting for contact background color
    $wp_customize->remove_setting('contact_bg_color_opacity');
    $wp_customize->remove_control('contact_bg_color_opacity');
    $wp_customize->add_setting(
        'contact_text_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_rgba_color',
        )
    );
    $wp_customize->add_control(
        new Customizer_Iris_Color_Control(
            $wp_customize,
            'contact_text_color',
            array(
                'label'    => __('Text Color', 'modern-business'),
                'section'  => 'modern_business_contact_section',
                'settings' => 'contact_text_color',
            )
        )
    );

    $wp_customize->add_setting(
        'contact_text_align',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'contact_text_align',
        array(
            'label'    => __('Text Alignment', 'modern-business'),
            'section'  => 'modern_business_contact_section',
            'type'     => 'select',
            'choices'  => array(
                'left'   => __('Left', 'modern-business'),
                'center' => __('Center', 'modern-business'),
                'right'  => __('Right', 'modern-business'),
            ),
        )
    );

    $wp_customize->add_setting(
        'contact_padding_top',
        array(
            'default'           => 50,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'contact_padding_top',
        array(
            'label'    => __('Padding Top (px)', 'modern-business'),
            'section'  => 'modern_business_contact_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'contact_padding_bottom',
        array(
            'default'           => 50,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'contact_padding_bottom',
        array(
            'label'    => __('Padding Bottom (px)', 'modern-business'),
            'section'  => 'modern_business_contact_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'contact_margin_top',
        array(
            'default'           => 0,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'contact_margin_top',
        array(
            'label'    => __('Margin Top (px)', 'modern-business'),
            'section'  => 'modern_business_contact_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'contact_margin_bottom',
        array(
            'default'           => 0,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'contact_margin_bottom',
        array(
            'label'    => __('Margin Bottom (px)', 'modern-business'),
            'section'  => 'modern_business_contact_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'contact_font_size',
        array(
            'default'           => 18,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'contact_font_size',
        array(
            'label'    => __('Font Size (px)', 'modern-business'),
            'section'  => 'modern_business_contact_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 10,
                'max' => 50,
            ),
        )
    );

    // Portfolio Section Style Customization
    $wp_customize->add_setting(
        'portfolio_bg_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new Customizer_Iris_Color_Control(
            $wp_customize,
            'portfolio_bg_color',
            array(
                'label'    => __('Background Color', 'modern-business'),
                'section'  => 'modern_business_portfolio_section',
                'settings' => 'portfolio_bg_color',
            )
        )
    );

    $wp_customize->add_setting(
        'portfolio_text_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new Customizer_Iris_Color_Control(
            $wp_customize,
            'portfolio_text_color',
            array(
                'label'    => __('Text Color', 'modern-business'),
                'section'  => 'modern_business_portfolio_section',
                'settings' => 'portfolio_text_color',
            )
        )
    );

    // Blog Section Customization
    $wp_customize->add_section(
        'modern_business_blog_section',
        array(
            'title'    => __('Blog Section', 'modern-business'),
            'priority' => 55,
        )
    );

    $wp_customize->add_setting(
        'blog_title',
        array(
            'default'           => __('Latest Blog Posts', 'modern-business'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'blog_title',
        array(
            'label'    => __('Blog Section Title', 'modern-business'),
            'section'  => 'modern_business_blog_section',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'blog_subtitle',
        array(
            'default'           => __('Read our latest articles and news', 'modern-business'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'blog_subtitle',
        array(
            'label'    => __('Blog Section Subtitle', 'modern-business'),
            'section'  => 'modern_business_blog_section',
            'type'     => 'textarea',
        )
    );

    $wp_customize->add_setting(
        'blog_count',
        array(
            'default'           => 3,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'blog_count',
        array(
            'label'    => __('Number of Blog Posts to Show', 'modern-business'),
            'section'  => 'modern_business_blog_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 1,
                'max' => 20,
            ),
        )
    );

    // Blog Section Style Customization
    $wp_customize->add_setting(
        'blog_bg_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_rgba_color',
        )
    );
    $wp_customize->add_control(
        new Customizer_Iris_Color_Control(
            $wp_customize,
            'blog_bg_color',
            array(
                'label'    => __('Background Color', 'modern-business'),
                'section'  => 'modern_business_blog_section',
                'settings' => 'blog_bg_color',
            )
        )
    );
    $wp_customize->add_setting(
        'blog_text_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_rgba_color',
        )
    );
    $wp_customize->add_control(
        new Customizer_Iris_Color_Control(
            $wp_customize,
            'blog_text_color',
            array(
                'label'    => __('Text Color', 'modern-business'),
                'section'  => 'modern_business_blog_section',
                'settings' => 'blog_text_color',
            )
        )
    );

    $wp_customize->add_setting(
        'blog_text_align',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'blog_text_align',
        array(
            'label'    => __('Text Alignment', 'modern-business'),
            'section'  => 'modern_business_blog_section',
            'type'     => 'select',
            'choices'  => array(
                'left'   => __('Left', 'modern-business'),
                'center' => __('Center', 'modern-business'),
                'right'  => __('Right', 'modern-business'),
            ),
        )
    );

    $wp_customize->add_setting(
        'blog_padding_top',
        array(
            'default'           => 50,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'blog_padding_top',
        array(
            'label'    => __('Padding Top (px)', 'modern-business'),
            'section'  => 'modern_business_blog_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'blog_padding_bottom',
        array(
            'default'           => 50,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'blog_padding_bottom',
        array(
            'label'    => __('Padding Bottom (px)', 'modern-business'),
            'section'  => 'modern_business_blog_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'blog_margin_top',
        array(
            'default'           => 0,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'blog_margin_top',
        array(
            'label'    => __('Margin Top (px)', 'modern-business'),
            'section'  => 'modern_business_blog_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'blog_margin_bottom',
        array(
            'default'           => 0,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'blog_margin_bottom',
        array(
            'label'    => __('Margin Bottom (px)', 'modern-business'),
            'section'  => 'modern_business_blog_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'blog_font_size',
        array(
            'default'           => 18,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'blog_font_size',
        array(
            'label'    => __('Font Size (px)', 'modern-business'),
            'section'  => 'modern_business_blog_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 10,
                'max' => 50,
            ),
        )
    );

    // Blog Section Style Customization
    $wp_customize->add_setting(
        'blog_bg_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new Customizer_Iris_Color_Control(
            $wp_customize,
            'blog_bg_color',
            array(
                'label'    => __('Background Color', 'modern-business'),
                'section'  => 'modern_business_blog_section',
                'settings' => 'blog_bg_color',
            )
        )
    );

    $wp_customize->add_setting(
        'blog_text_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new Customizer_Iris_Color_Control(
            $wp_customize,
            'blog_text_color',
            array(
                'label'    => __('Text Color', 'modern-business'),
                'section'  => 'modern_business_blog_section',
                'settings' => 'blog_text_color',
            )
        )
    );

    // Testimonials Section Customization
    $wp_customize->add_section(
        'modern_business_testimonials_section',
        array(
            'title'    => __('Testimonials Section', 'modern-business'),
            'priority' => 60,
        )
    );

    $wp_customize->add_setting(
        'testimonials_title',
        array(
            'default'           => __('Testimonials', 'modern-business'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'testimonials_title',
        array(
            'label'    => __('Testimonials Section Title', 'modern-business'),
            'section'  => 'modern_business_testimonials_section',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'testimonials_subtitle',
        array(
            'default'           => __('What our clients say about us', 'modern-business'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'testimonials_subtitle',
        array(
            'label'    => __('Testimonials Section Subtitle', 'modern-business'),
            'section'  => 'modern_business_testimonials_section',
            'type'     => 'textarea',
        )
    );

    $wp_customize->add_setting(
        'testimonials_count',
        array(
            'default'           => 5,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'testimonials_count',
        array(
            'label'    => __('Number of Testimonials to Show', 'modern-business'),
            'section'  => 'modern_business_testimonials_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 1,
                'max' => 20,
            ),
        )
    );

    // Testimonials Section Style Customization
    $wp_customize->add_setting(
        'testimonials_bg_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new Customizer_Iris_Color_Control(
            $wp_customize,
            'testimonials_bg_color',
            array(
                'label'    => __('Background Color', 'modern-business'),
                'section'  => 'modern_business_testimonials_section',
                'settings' => 'testimonials_bg_color',
            )
        )
    );

    $wp_customize->add_setting(
        'testimonials_text_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new Customizer_Iris_Color_Control(
            $wp_customize,
            'testimonials_text_color',
            array(
                'label'    => __('Text Color', 'modern-business'),
                'section'  => 'modern_business_testimonials_section',
                'settings' => 'testimonials_text_color',
            )
        )
    );

    $wp_customize->add_setting(
        'testimonials_text_align',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'testimonials_text_align',
        array(
            'label'    => __('Text Alignment', 'modern-business'),
            'section'  => 'modern_business_testimonials_section',
            'type'     => 'select',
            'choices'  => array(
                'left'   => __('Left', 'modern-business'),
                'center' => __('Center', 'modern-business'),
                'right'  => __('Right', 'modern-business'),
            ),
        )
    );

    $wp_customize->add_setting(
        'testimonials_padding_top',
        array(
            'default'           => 50,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'testimonials_padding_top',
        array(
            'label'    => __('Padding Top (px)', 'modern-business'),
            'section'  => 'modern_business_testimonials_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'testimonials_padding_bottom',
        array(
            'default'           => 50,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'testimonials_padding_bottom',
        array(
            'label'    => __('Padding Bottom (px)', 'modern-business'),
            'section'  => 'modern_business_testimonials_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'testimonials_margin_top',
        array(
            'default'           => 0,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'testimonials_margin_top',
        array(
            'label'    => __('Margin Top (px)', 'modern-business'),
            'section'  => 'modern_business_testimonials_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'testimonials_margin_bottom',
        array(
            'default'           => 0,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'testimonials_margin_bottom',
        array(
            'label'    => __('Margin Bottom (px)', 'modern-business'),
            'section'  => 'modern_business_testimonials_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'testimonials_font_size',
        array(
            'default'           => 18,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'testimonials_font_size',
        array(
            'label'    => __('Font Size (px)', 'modern-business'),
            'section'  => 'modern_business_testimonials_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 10,
                'max' => 50,
            ),
        )
    );

    // Testimonials Section Style Customization
    $wp_customize->add_setting(
        'testimonials_bg_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'testimonials_bg_color',
            array(
                'label'    => __('Background Color', 'modern-business'),
                'section'  => 'modern_business_testimonials_section',
                'settings' => 'testimonials_bg_color',
            )
        )
    );

    $wp_customize->add_setting(
        'testimonials_text_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'testimonials_text_color',
            array(
                'label'    => __('Text Color', 'modern-business'),
                'section'  => 'modern_business_testimonials_section',
                'settings' => 'testimonials_text_color',
            )
        )
    );

    // Header Section
    $wp_customize->add_section(
        'modern_business_header_section',
        array(
            'title'    => __('Header Settings', 'modern-business'),
            'priority' => 30,
        )
    );

    // Header Transparency
    $wp_customize->add_setting(
        'header_transparent',
        array(
            'default'           => true,
            'sanitize_callback' => 'modern_business_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'header_transparent',
        array(
            'label'    => __('Transparent Header on Homepage', 'modern-business'),
            'section'  => 'modern_business_header_section',
            'type'     => 'checkbox',
        )
    );

    // Hero Section
    $wp_customize->add_section(
        'modern_business_hero_section',
        array(
            'title'    => __('Hero Section', 'modern-business'),
            'priority' => 40,
        )
    );

    // Hero Title
    $wp_customize->add_setting(
        'hero_title',
        array(
            'default'           => __('We Create Modern & Professional Websites', 'modern-business'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hero_title',
        array(
            'label'    => __('Hero Title', 'modern-business'),
            'section'  => 'modern_business_hero_section',
            'type'     => 'text',
        )
    );

    // Hero Subtitle
    $wp_customize->add_setting(
        'hero_subtitle',
        array(
            'default'           => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.', 'modern-business'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hero_subtitle',
        array(
            'label'    => __('Hero Subtitle', 'modern-business'),
            'section'  => 'modern_business_hero_section',
            'type'     => 'textarea',
        )
    );

    // Hero Section Style Customization
    $wp_customize->add_setting(
        'hero_bg_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'hero_bg_color',
            array(
                'label'    => __('Background Color', 'modern-business'),
                'section'  => 'modern_business_hero_section',
                'settings' => 'hero_bg_color',
            )
        )
    );

    // Add transparency setting for hero background color
    $wp_customize->remove_setting('hero_bg_color_opacity');
    $wp_customize->remove_control('hero_bg_color_opacity');

    $wp_customize->add_setting(
        'hero_text_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'hero_text_color',
            array(
                'label'    => __('Text Color', 'modern-business'),
                'section'  => 'modern_business_hero_section',
                'settings' => 'hero_text_color',
            )
        )
    );

    $wp_customize->add_setting(
        'hero_text_align',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hero_text_align',
        array(
            'label'    => __('Text Alignment', 'modern-business'),
            'section'  => 'modern_business_hero_section',
            'type'     => 'select',
            'choices'  => array(
                'left'   => __('Left', 'modern-business'),
                'center' => __('Center', 'modern-business'),
                'right'  => __('Right', 'modern-business'),
            ),
        )
    );

    $wp_customize->add_setting(
        'hero_padding_top',
        array(
            'default'           => 50,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'hero_padding_top',
        array(
            'label'    => __('Padding Top (px)', 'modern-business'),
            'section'  => 'modern_business_hero_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'hero_padding_bottom',
        array(
            'default'           => 50,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'hero_padding_bottom',
        array(
            'label'    => __('Padding Bottom (px)', 'modern-business'),
            'section'  => 'modern_business_hero_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'hero_margin_top',
        array(
            'default'           => 0,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'hero_margin_top',
        array(
            'label'    => __('Margin Top (px)', 'modern-business'),
            'section'  => 'modern_business_hero_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'hero_margin_bottom',
        array(
            'default'           => 0,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'hero_margin_bottom',
        array(
            'label'    => __('Margin Bottom (px)', 'modern-business'),
            'section'  => 'modern_business_hero_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 200,
            ),
        )
    );

    $wp_customize->add_setting(
        'hero_font_size',
        array(
            'default'           => 18,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'hero_font_size',
        array(
            'label'    => __('Font Size (px)', 'modern-business'),
            'section'  => 'modern_business_hero_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 10,
                'max' => 50,
            ),
        )
    );

    // Hero Background Image
    $wp_customize->add_setting(
        'hero_background',
        array(
            'default'           => '',
            'sanitize_callback' => 'modern_business_sanitize_image',
        )
    );

     // Hero Slider Settings
     $wp_customize->add_section(
        'hero_slider_section',
        array(
            'title'    => __('Hero Slider Settings', 'modern-business'),
            'priority' => 35,
        )
    );

    // Transition Effect
    $wp_customize->add_setting(
        'hero_slider_transition',
        array(
            'default'           => 'fade',
            'sanitize_callback' => 'modern_business_sanitize_select',
        )
    );

    $wp_customize->add_control(
        'hero_slider_transition',
        array(
            'label'    => __('Transition Effect', 'modern-business'),
            'section'  => 'hero_slider_section',
            'type'     => 'select',
            'choices'  => array(
                'fade' => __('Fade', 'modern-business'),
                'slide' => __('Slide', 'modern-business'),
                'zoom' => __('Zoom', 'modern-business'),
                'flip' => __('Flip', 'modern-business'),
            ),
        )
    );

    // Random Transitions
    $wp_customize->add_setting(
        'hero_slider_random_transitions',
        array(
            'default'           => false,
            'sanitize_callback' => 'modern_business_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'hero_slider_random_transitions',
        array(
            'label'    => __('Use Random Transitions', 'modern-business'),
            'section'  => 'hero_slider_section',
            'type'     => 'checkbox',
        )
    );

    // Slider Images
    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting(
            'hero_slider_image_' . $i,
            array(
                'default'           => '',
                'sanitize_callback' => 'modern_business_sanitize_image',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'hero_slider_image_' . $i,
                array(
                    'label'    => sprintf(__('Slider Image %d', 'modern-business'), $i),
                    'section'  => 'hero_slider_section',
                    'settings' => 'hero_slider_image_' . $i,
                )
            )
        );
    }

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'hero_background',
            array(
                'label'    => __('Hero Background Image', 'modern-business'),
                'section'  => 'modern_business_hero_section',
                'settings' => 'hero_background',
            )
        )
    );

    // Primary Button Text
    $wp_customize->add_setting(
        'hero_primary_btn_text',
        array(
            'default'           => __('Get Started', 'modern-business'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hero_primary_btn_text',
        array(
            'label'    => __('Primary Button Text', 'modern-business'),
            'section'  => 'modern_business_hero_section',
            'type'     => 'text',
        )
    );

    // Primary Button URL
    $wp_customize->add_setting(
        'hero_primary_btn_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'hero_primary_btn_url',
        array(
            'label'    => __('Primary Button URL', 'modern-business'),
            'section'  => 'modern_business_hero_section',
            'type'     => 'url',
        )
    );

    // Secondary Button Text
    $wp_customize->add_setting(
        'hero_secondary_btn_text',
        array(
            'default'           => __('Learn More', 'modern-business'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'hero_secondary_btn_text',
        array(
            'label'    => __('Secondary Button Text', 'modern-business'),
            'section'  => 'modern_business_hero_section',
            'type'     => 'text',
        )
    );

    // Secondary Button URL
    $wp_customize->add_setting(
        'hero_secondary_btn_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'hero_secondary_btn_url',
        array(
            'label'    => __('Secondary Button URL', 'modern-business'),
            'section'  => 'modern_business_hero_section',
            'type'     => 'url',
        )
    );

    // Footer Section
    $wp_customize->add_section(
        'modern_business_footer_section',
        array(
            'title'    => __('Footer Settings', 'modern-business'),
            'priority' => 100,
        )
    );

    // Footer Copyright Text
    $wp_customize->add_setting(
        'footer_copyright',
        array(
            'default'           => __('© 2023 Modern Business Theme. All Rights Reserved.', 'modern-business'),
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    $wp_customize->add_control(
        'footer_copyright',
        array(
            'label'    => __('Copyright Text', 'modern-business'),
            'section'  => 'modern_business_footer_section',
            'type'     => 'textarea',
        )
    );

    // Contact Info Section
    $wp_customize->add_section(
        'modern_business_contact_section',
        array(
            'title'    => __('Contact Information', 'modern-business'),
            'priority' => 90,
        )
    );

    // Phone Number
    $wp_customize->add_setting(
        'contact_phone',
        array(
            'default'           => '(123) 456-7890',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'contact_phone',
        array(
            'label'    => __('Phone Number', 'modern-business'),
            'section'  => 'modern_business_contact_section',
            'type'     => 'text',
        )
    );

    // Email
    $wp_customize->add_setting(
        'contact_email',
        array(
            'default'           => 'info@example.com',
            'sanitize_callback' => 'sanitize_email',
        )
    );

    $wp_customize->add_control(
        'contact_email',
        array(
            'label'    => __('Email Address', 'modern-business'),
            'section'  => 'modern_business_contact_section',
            'type'     => 'email',
        )
    );

    // Address
    $wp_customize->add_setting(
        'contact_address',
        array(
            'default'           => '123 Main St, City, Country',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'contact_address',
        array(
            'label'    => __('Address', 'modern-business'),
            'section'  => 'modern_business_contact_section',
            'type'     => 'text',
        )
    );

    // Social Media Section
    $wp_customize->add_section(
        'modern_business_social_section',
        array(
            'title'    => __('Social Media', 'modern-business'),
            'priority' => 95,
        )
    );

    // Facebook
    $wp_customize->add_setting(
        'social_facebook',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'social_facebook',
        array(
            'label'    => __('Facebook URL', 'modern-business'),
            'section'  => 'modern_business_social_section',
            'type'     => 'url',
        )
    );

    // Twitter
    $wp_customize->add_setting(
        'social_twitter',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'social_twitter',
        array(
            'label'    => __('Twitter URL', 'modern-business'),
            'section'  => 'modern_business_social_section',
            'type'     => 'url',
        )
    );

    // Instagram
    $wp_customize->add_setting(
        'social_instagram',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'social_instagram',
        array(
            'label'    => __('Instagram URL', 'modern-business'),
            'section'  => 'modern_business_social_section',
            'type'     => 'url',
        )
    );

    // LinkedIn
    $wp_customize->add_setting(
        'social_linkedin',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'social_linkedin',
        array(
            'label'    => __('LinkedIn URL', 'modern-business'),
            'section'  => 'modern_business_social_section',
            'type'     => 'url',
        )
    );

    // YouTube
    $wp_customize->add_setting(
        'social_youtube',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'social_youtube',
        array(
            'label'    => __('YouTube URL', 'modern-business'),
            'section'  => 'modern_business_social_section',
            'type'     => 'url',
        )
    );

    // Colors Section
    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#3B82F6',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label'    => __('Primary Color', 'modern-business'),
                'section'  => 'colors',
                'settings' => 'primary_color',
            )
        )
    );

    $wp_customize->add_setting(
        'secondary_color',
        array(
            'default'           => '#14B8A6',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'secondary_color',
            array(
                'label'    => __('Secondary Color', 'modern-business'),
                'section'  => 'colors',
                'settings' => 'secondary_color',
            )
        )
    );

    $wp_customize->add_setting(
        'accent_color',
        array(
            'default'           => '#F97316',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'accent_color',
            array(
                'label'    => __('Accent Color', 'modern-business'),
                'section'  => 'colors',
                'settings' => 'accent_color',
            )
        )
    );
    // Navigation Bar Style and Position Customization
    $wp_customize->add_section(
        'modern_business_navigation_section',
        array(
            'title'    => __('Navigation Bar Settings', 'modern-business'),
            'priority' => 35,
        )
    );

    $wp_customize->add_setting(
        'nav_position',
        array(
            'default'           => 'top',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'nav_position',
        array(
            'label'    => __('Navigation Bar Position', 'modern-business'),
            'section'  => 'modern_business_navigation_section',
            'type'     => 'select',
            'choices'  => array(
                'top'    => __('Top', 'modern-business'),
                'bottom' => __('Bottom', 'modern-business'),
                'left'   => __('Left', 'modern-business'),
                'right'  => __('Right', 'modern-business'),
            ),
        )
    );

    $wp_customize->add_setting(
        'nav_bg_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'nav_bg_color',
            array(
                'label'    => __('Navigation Background Color', 'modern-business'),
                'section'  => 'modern_business_navigation_section',
                'settings' => 'nav_bg_color',
            )
        )
    );

    // Add transparency setting for navigation background color
    $wp_customize->remove_setting('nav_bg_color_opacity');
    $wp_customize->remove_control('nav_bg_color_opacity');

    $wp_customize->add_setting(
        'nav_text_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'nav_text_color',
            array(
                'label'    => __('Navigation Text Color', 'modern-business'),
                'section'  => 'modern_business_navigation_section',
                'settings' => 'nav_text_color',
            )
        )
    );

    $wp_customize->add_setting(
        'nav_text_align',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'nav_text_align',
        array(
            'label'    => __('Navigation Text Alignment', 'modern-business'),
            'section'  => 'modern_business_navigation_section',
            'type'     => 'select',
            'choices'  => array(
                'left'   => __('Left', 'modern-business'),
                'center' => __('Center', 'modern-business'),
                'right'  => __('Right', 'modern-business'),
            ),
        )
    );

    $wp_customize->add_setting(
        'nav_padding_top',
        array(
            'default'           => 10,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'nav_padding_top',
        array(
            'label'    => __('Navigation Padding Top (px)', 'modern-business'),
            'section'  => 'modern_business_navigation_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 100,
            ),
        )
    );

    $wp_customize->add_setting(
        'nav_padding_bottom',
        array(
            'default'           => 10,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'nav_padding_bottom',
        array(
            'label'    => __('Navigation Padding Bottom (px)', 'modern-business'),
            'section'  => 'modern_business_navigation_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 100,
            ),
        )
    );

    $wp_customize->add_setting(
        'nav_margin_top',
        array(
            'default'           => 0,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'nav_margin_top',
        array(
            'label'    => __('Navigation Margin Top (px)', 'modern-business'),
            'section'  => 'modern_business_navigation_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 100,
            ),
        )
    );

    $wp_customize->add_setting(
        'nav_margin_bottom',
        array(
            'default'           => 0,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'nav_margin_bottom',
        array(
            'label'    => __('Navigation Margin Bottom (px)', 'modern-business'),
            'section'  => 'modern_business_navigation_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 100,
            ),
        )
    );

    $wp_customize->add_setting(
        'nav_font_size',
        array(
            'default'           => 16,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'nav_font_size',
        array(
            'label'    => __('Navigation Font Size (px)', 'modern-business'),
            'section'  => 'modern_business_navigation_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 10,
                'max' => 40,
            ),
        )
    );
    // Footer Section
    $wp_customize->add_section(
        'modern_business_footer_section',
        array(
            'title'    => __('Footer Section', 'modern-business'),
            'priority' => 100,
        )
    );

    $wp_customize->add_setting(
        'footer_text',
        array(
            'default'           => __('© 2023 Modern Business. All rights reserved.', 'modern-business'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_text',
        array(
            'label'    => __('Footer Text', 'modern-business'),
            'section'  => 'modern_business_footer_section',
            'type'     => 'text',
        )
    );

    // Footer Style Customization
    $wp_customize->add_setting(
        'footer_bg_color',
        array(
            'default'           => '#222222',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_bg_color',
            array(
                'label'    => __('Background Color', 'modern-business'),
                'section'  => 'modern_business_footer_section',
                'settings' => 'footer_bg_color',
            )
        )
    );

    // Add transparency setting for footer background color
    $wp_customize->remove_setting('footer_bg_color_opacity');
    $wp_customize->remove_control('footer_bg_color_opacity');

    $wp_customize->add_setting(
        'footer_text_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_text_color',
            array(
                'label'    => __('Text Color', 'modern-business'),
                'section'  => 'modern_business_footer_section',
                'settings' => 'footer_text_color',
            )
        )
    );

    $wp_customize->add_setting(
        'footer_link_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_link_color',
            array(
                'label'    => __('Link Color', 'modern-business'),
                'section'  => 'modern_business_footer_section',
                'settings' => 'footer_link_color',
            )
        )
    );

    $wp_customize->add_setting(
        'footer_link_hover_color',
        array(
            'default'           => '#ff6600',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_link_hover_color',
            array(
                'label'    => __('Link Hover Color', 'modern-business'),
                'section'  => 'modern_business_footer_section',
                'settings' => 'footer_link_hover_color',
            )
        )
    );

    $wp_customize->add_setting(
        'footer_text_align',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_text_align',
        array(
            'label'    => __('Text Alignment', 'modern-business'),
            'section'  => 'modern_business_footer_section',
            'type'     => 'select',
            'choices'  => array(
                'left'   => __('Left', 'modern-business'),
                'center' => __('Center', 'modern-business'),
                'right'  => __('Right', 'modern-business'),
            ),
        )
    );

    $wp_customize->add_setting(
        'footer_padding_top',
        array(
            'default'           => 20,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'footer_padding_top',
        array(
            'label'    => __('Padding Top (px)', 'modern-business'),
            'section'  => 'modern_business_footer_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 100,
            ),
        )
    );

    $wp_customize->add_setting(
        'footer_padding_bottom',
        array(
            'default'           => 20,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'footer_padding_bottom',
        array(
            'label'    => __('Padding Bottom (px)', 'modern-business'),
            'section'  => 'modern_business_footer_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 100,
            ),
        )
    );

    $wp_customize->add_setting(
        'footer_margin_top',
        array(
            'default'           => 0,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'footer_margin_top',
        array(
            'label'    => __('Margin Top (px)', 'modern-business'),
            'section'  => 'modern_business_footer_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 100,
            ),
        )
    );

    $wp_customize->add_setting(
        'footer_margin_bottom',
        array(
            'default'           => 0,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'footer_margin_bottom',
        array(
            'label'    => __('Margin Bottom (px)', 'modern-business'),
            'section'  => 'modern_business_footer_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 100,
            ),
        )
    );

    $wp_customize->add_setting(
        'footer_font_size',
        array(
            'default'           => 14,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'footer_font_size',
        array(
            'label'    => __('Font Size (px)', 'modern-business'),
            'section'  => 'modern_business_footer_section',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 10,
                'max' => 30,
            ),
        )
    );
    // Global Colors Section
    $wp_customize->add_section(
        'modern_business_global_colors',
        array(
            'title'    => __('Global Colors', 'modern-business'),
            'priority' => 20,
        )
    );

    $wp_customize->add_setting(
        'global_primary_color',
        array(
            'default'           => '#3B82F6',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'global_primary_color',
            array(
                'label'    => __('Primary Color', 'modern-business'),
                'section'  => 'modern_business_global_colors',
                'settings' => 'global_primary_color',
            )
        )
    );

    // Add transparency setting for primary color
    $wp_customize->remove_setting('global_primary_color_opacity');
    $wp_customize->remove_control('global_primary_color_opacity');

    $wp_customize->add_setting(
        'global_secondary_color',
        array(
            'default'           => '#14B8A6',
            'sanitize_callback' => 'sanitize_rgba_color',
        )
    );

    $wp_customize->add_control(
        new Customizer_Alpha_Color_Control(
            $wp_customize,
            'global_secondary_color',
            array(
                'label'    => __('Secondary Color', 'modern-business'),
                'section'  => 'modern_business_global_colors',
                'settings' => 'global_secondary_color',
            )
        )
    );

    // Add transparency setting for secondary color
    $wp_customize->remove_setting('global_secondary_color_opacity');
    $wp_customize->remove_control('global_secondary_color_opacity');

    $wp_customize->add_setting(
        'global_accent_color',
        array(
            'default'           => '#F97316',
            'sanitize_callback' => 'sanitize_rgba_color',
        )
    );

    $wp_customize->add_control(
        new Customizer_Alpha_Color_Control(
            $wp_customize,
            'global_accent_color',
            array(
                'label'    => __('Accent Color', 'modern-business'),
                'section'  => 'modern_business_global_colors',
                'settings' => 'global_accent_color',
            )
        )
    );

    // Add transparency setting for accent color
    $wp_customize->remove_setting('global_accent_color_opacity');
    $wp_customize->remove_control('global_accent_color_opacity');

    $wp_customize->add_setting(
        'global_background_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'global_background_color',
            array(
                'label'    => __('Background Color', 'modern-business'),
                'section'  => 'modern_business_global_colors',
                'settings' => 'global_background_color',
            )
        )
    );

    $wp_customize->add_setting(
        'global_text_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'global_text_color',
            array(
                'label'    => __('Text Color', 'modern-business'),
                'section'  => 'modern_business_global_colors',
                'settings' => 'global_text_color',
            )
        )
    );

    $wp_customize->add_setting(
        'global_button_color',
        array(
            'default'           => '#3B82F6',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'global_button_color',
            array(
                'label'    => __('Button Color', 'modern-business'),
                'section'  => 'modern_business_global_colors',
                'settings' => 'global_button_color',
            )
        )
    );

    $wp_customize->add_setting(
        'global_button_text_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'global_button_text_color',
            array(
                'label'    => __('Button Text Color', 'modern-business'),
                'section'  => 'modern_business_global_colors',
                'settings' => 'global_button_text_color',
            )
        )
    );
    // Typography Section
    $wp_customize->add_section(
        'modern_business_typography',
        array(
            'title'    => __('Typography', 'modern-business'),
            'priority' => 30,
        )
    );

    $wp_customize->add_setting(
        'heading_font_family',
        array(
            'default'           => 'Arial, sans-serif',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'heading_font_family',
        array(
            'label'    => __('Heading Font Family', 'modern-business'),
            'section'  => 'modern_business_typography',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'body_font_family',
        array(
            'default'           => 'Arial, sans-serif',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'body_font_family',
        array(
            'label'    => __('Body Font Family', 'modern-business'),
            'section'  => 'modern_business_typography',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'base_font_size',
        array(
            'default'           => 16,
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'base_font_size',
        array(
            'label'    => __('Base Font Size (px)', 'modern-business'),
            'section'  => 'modern_business_typography',
            'type'     => 'number',
            'input_attrs' => array(
                'min' => 10,
                'max' => 30,
            ),
        )
    );
    // Layout Section
    $wp_customize->add_section(
        'modern_business_layout',
        array(
            'title'    => __('Layout', 'modern-business'),
            'priority' => 40,
        )
    );

    $wp_customize->add_setting(
        'header_layout',
        array(
            'default'           => 'standard',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'header_layout',
        array(
            'label'    => __('Header Layout', 'modern-business'),
            'section'  => 'modern_business_layout',
            'type'     => 'select',
            'choices'  => array(
                'standard' => __('Standard', 'modern-business'),
                'centered' => __('Centered', 'modern-business'),
                'minimal'  => __('Minimal', 'modern-business'),
            ),
        )
    );

    $wp_customize->add_setting(
        'footer_layout',
        array(
            'default'           => 'standard',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_layout',
        array(
            'label'    => __('Footer Layout', 'modern-business'),
            'section'  => 'modern_business_layout',
            'type'     => 'select',
            'choices'  => array(
                'standard' => __('Standard', 'modern-business'),
                'centered' => __('Centered', 'modern-business'),
                'minimal'  => __('Minimal', 'modern-business'),
            ),
        )
    );

    $wp_customize->add_setting(
        'sidebar_position',
        array(
            'default'           => 'right',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'sidebar_position',
        array(
            'label'    => __('Sidebar Position', 'modern-business'),
            'section'  => 'modern_business_layout',
            'type'     => 'select',
            'choices'  => array(
                'right'  => __('Right', 'modern-business'),
                'left'   => __('Left', 'modern-business'),
                'none'   => __('None', 'modern-business'),
            ),
        )
    );
}
add_action('customize_register', 'modern_business_customize_register');

/**
 * Output global color CSS variables in the head.
 */
function modern_business_global_colors_css() {
    $background_color = get_theme_mod('global_background_color', '#ffffff');
    $text_color = get_theme_mod('global_text_color', '#000000');
    $button_color = get_theme_mod('global_button_color', '#3B82F6');
    $button_text_color = get_theme_mod('global_button_text_color', '#ffffff');

    ?>
    <style type="text/css">
        :root {
            --color-primary: <?php echo esc_attr(get_theme_mod('global_primary_color', '#3B82F6')); ?>;
            --color-secondary: <?php echo esc_attr(get_theme_mod('global_secondary_color', '#14B8A6')); ?>;
            --color-accent: <?php echo esc_attr(get_theme_mod('global_accent_color', '#F97316')); ?>;
            --color-background: <?php echo esc_attr($background_color); ?>;
            --color-text: <?php echo esc_attr($text_color); ?>;
            --color-button: <?php echo esc_attr($button_color); ?>;
            --color-button-text: <?php echo esc_attr($button_text_color); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'modern_business_global_colors_css');

/**
 * Output typography CSS variables in the head.
 */
function modern_business_typography_css() {
    ?>
    <style type="text/css">
        :root {
            --font-family-heading: <?php echo esc_attr(get_theme_mod('heading_font_family', 'Arial, sans-serif')); ?>;
            --font-family-body: <?php echo esc_attr(get_theme_mod('body_font_family', 'Arial, sans-serif')); ?>;
            --base-font-size: <?php echo intval(get_theme_mod('base_font_size', 16)); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'modern_business_typography_css');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function modern_business_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function modern_business_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Output customizer CSS.
 */
function modern_business_customizer_css() {
    $portfolio_bg_color = get_theme_mod('portfolio_bg_color', '#ffffff');
    $contact_bg_color = get_theme_mod('contact_bg_color', '#ffffff');
    $blog_bg_color = get_theme_mod('blog_bg_color', '#ffffff');
    $testimonials_bg_color = get_theme_mod('testimonials_bg_color', '#ffffff');
    $hero_bg_color = get_theme_mod('hero_bg_color', '#ffffff');
    $nav_bg_color = get_theme_mod('nav_bg_color', '#ffffff');
    $footer_bg_color = get_theme_mod('footer_bg_color', '#222222');
    ?>
    <style type="text/css">
        :root {
            --color-primary: <?php echo esc_attr(get_theme_mod('primary_color', '#3B82F6')); ?>;
            --color-secondary: <?php echo esc_attr(get_theme_mod('secondary_color', '#14B8A6')); ?>;
            --color-accent: <?php echo esc_attr(get_theme_mod('accent_color', '#F97316')); ?>;
        }

        .portfolio-section {
            background-color: <?php echo esc_attr($portfolio_bg_color); ?>;
        }

        .contact-section {
            background-color: <?php echo esc_attr($contact_bg_color); ?>;
        }

        .blog-section {
            background-color: <?php echo esc_attr($blog_bg_color); ?>;
        }

        .testimonials-section {
            background-color: <?php echo esc_attr($testimonials_bg_color); ?>;
        }

        .hero-section {
            background-color: <?php echo esc_attr($hero_bg_color); ?>;
        }

        nav.main-navigation {
            background-color: <?php echo esc_attr($nav_bg_color); ?>;
        }

        footer.site-footer {
            background-color: <?php echo esc_attr($footer_bg_color); ?>;
        }

        .hero {
            <?php if (get_theme_mod('hero_background')) : ?>
            background-image: url('<?php echo esc_url(get_theme_mod('hero_background')); ?>');
            background-size: cover;
            background-position: center;
            <?php endif; ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'modern_business_customizer_css');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if (!function_exists('modern_business_customize_preview_js')) {
    function modern_business_customize_preview_js() {
        wp_enqueue_script('modern-business-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
    }
}
add_action('customize_preview_init', 'modern_business_customize_preview_js');

/**
 * Sanitize checkbox values
 */
function modern_business_sanitize_checkbox($checked) {
    return ((isset($checked) && true == $checked) ? true : false);
}

function modern_business_sanitize_select($input, $setting) {
    $choices = $setting->manager->get_control($setting->id)->choices;
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}

/**
 * Sanitize image
 */
function modern_business_sanitize_image($image, $setting) {
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
    
    // Return an array with file extension and mime_type
    $file = wp_check_filetype($image, $mimes);
    
    // If $image has a valid mime_type, return it; otherwise, return the default.
    return ($file['ext'] ? $image : $setting->default);
}