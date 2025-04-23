<?php
/**
 * Theme Options Page
 *
 * @package Modern_Business
 */

/**
 * Add Theme Options page to the admin menu
 */
function modern_business_add_options_page() {
    add_theme_page(
        __('Theme Options', 'modern-business'),
        __('Theme Options', 'modern-business'),
        'edit_theme_options',
        'modern-business-options',
        'modern_business_options_page_html'
    );
}
add_action('admin_menu', 'modern_business_add_options_page');

/**
 * Register settings for the options page
 */
function modern_business_register_settings() {
    // Homepage Sections - visibility and order
    register_setting(
        'modern_business_options',
        'modern_business_homepage_sections',
        array(
            'type' => 'array',
            'sanitize_callback' => 'modern_business_sanitize_homepage_sections',
            'default' => array(
                'hero' => array(
                    'enabled' => true,
                    'order' => 1,
                ),
                'about' => array(
                    'enabled' => true,
                    'order' => 2,
                ),
                'services' => array(
                    'enabled' => true,
                    'order' => 3,
                ),
                'portfolio' => array(
                    'enabled' => true,
                    'order' => 4,
                ),
                'team' => array(
                    'enabled' => true,
                    'order' => 5,
                ),
                'testimonials' => array(
                    'enabled' => true,
                    'order' => 6,
                ),
                'blog' => array(
                    'enabled' => true,
                    'order' => 7,
                ),
                'contact' => array(
                    'enabled' => true,
                    'order' => 8,
                ),
            ),
        )
    );

    // About Section
    register_setting(
        'modern_business_options',
        'modern_business_about_title',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('About Us', 'modern-business'),
        )
    );

    register_setting(
        'modern_business_options',
        'modern_business_about_subtitle',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('Learn more about our company and our mission', 'modern-business'),
        )
    );

    // Services Section
    register_setting(
        'modern_business_options',
        'modern_business_services_title',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('Our Services', 'modern-business'),
        )
    );

    register_setting(
        'modern_business_options',
        'modern_business_services_subtitle',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('We offer a wide range of services to meet your needs', 'modern-business'),
        )
    );

    // Portfolio Section
    register_setting(
        'modern_business_options',
        'modern_business_portfolio_title',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('Our Portfolio', 'modern-business'),
        )
    );

    register_setting(
        'modern_business_options',
        'modern_business_portfolio_subtitle',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('Check out our latest work', 'modern-business'),
        )
    );

    register_setting(
        'modern_business_options',
        'modern_business_portfolio_count',
        array(
            'type' => 'number',
            'sanitize_callback' => 'absint',
            'default' => 6,
        )
    );

    // Team Section
    register_setting(
        'modern_business_options',
        'modern_business_team_title',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('Our Team', 'modern-business'),
        )
    );

    register_setting(
        'modern_business_options',
        'modern_business_team_subtitle',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('Meet the people behind our success', 'modern-business'),
        )
    );

    register_setting(
        'modern_business_options',
        'modern_business_team_count',
        array(
            'type' => 'number',
            'sanitize_callback' => 'absint',
            'default' => 4,
        )
    );

    // Testimonials Section
    register_setting(
        'modern_business_options',
        'modern_business_testimonials_title',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('Testimonials', 'modern-business'),
        )
    );

    register_setting(
        'modern_business_options',
        'modern_business_testimonials_subtitle',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('What our clients say about us', 'modern-business'),
        )
    );

    register_setting(
        'modern_business_options',
        'modern_business_testimonials_count',
        array(
            'type' => 'number',
            'sanitize_callback' => 'absint',
            'default' => 5,
        )
    );

    // Blog Section
    register_setting(
        'modern_business_options',
        'modern_business_blog_title',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('Latest Blog Posts', 'modern-business'),
        )
    );

    register_setting(
        'modern_business_options',
        'modern_business_blog_subtitle',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('Read our latest articles and news', 'modern-business'),
        )
    );

    register_setting(
        'modern_business_options',
        'modern_business_blog_count',
        array(
            'type' => 'number',
            'sanitize_callback' => 'absint',
            'default' => 3,
        )
    );

    // Contact Section
    register_setting(
        'modern_business_options',
        'modern_business_contact_title',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('Contact Us', 'modern-business'),
        )
    );

    register_setting(
        'modern_business_options',
        'modern_business_contact_subtitle',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('Get in touch with us', 'modern-business'),
        )
    );

    register_setting(
        'modern_business_options',
        'modern_business_contact_form_shortcode',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '',
        )
    );

    // Portfolio Settings
    register_setting(
        'modern_business_options',
        'modern_business_portfolio_permalink',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_title',
            'default' => 'portfolio',
        )
    );

    // Performance Options
    register_setting(
        'modern_business_options',
        'modern_business_load_fontawesome',
        array(
            'type' => 'boolean',
            'sanitize_callback' => 'rest_sanitize_boolean',
            'default' => true,
        )
    );

    register_setting(
        'modern_business_options',
        'modern_business_preload_animation',
        array(
            'type' => 'boolean',
            'sanitize_callback' => 'rest_sanitize_boolean',
            'default' => true,
        )
    );
}
add_action('admin_init', 'modern_business_register_settings');

/**
 * Sanitize homepage sections
 */
function modern_business_sanitize_homepage_sections($sections) {
    if (!is_array($sections)) {
        return array();
    }

    $default_sections = array(
        'hero', 'about', 'services', 'portfolio', 'team', 'testimonials', 'blog', 'contact'
    );

    $sanitized = array();

    foreach ($default_sections as $section) {
        if (isset($sections[$section])) {
            $sanitized[$section] = array(
                'enabled' => isset($sections[$section]['enabled']) ? (bool) $sections[$section]['enabled'] : false,
                'order' => isset($sections[$section]['order']) ? absint($sections[$section]['order']) : 99,
            );
        } else {
            $sanitized[$section] = array(
                'enabled' => false,
                'order' => 99,
            );
        }
    }

    return $sanitized;
}

/**
 * Render the Theme Options page
 */
function modern_business_options_page_html() {
    // Check user capabilities
    if (!current_user_can('edit_theme_options')) {
        return;
    }

    // Show error/update messages
    settings_errors('modern_business_messages');
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('modern_business_options');
            ?>
            <div class="nav-tab-wrapper">
                <a href="#homepage-sections" class="nav-tab nav-tab-active"><?php _e('Homepage Sections', 'modern-business'); ?></a>
                <a href="#section-content" class="nav-tab"><?php _e('Section Content', 'modern-business'); ?></a>
                <a href="#performance" class="nav-tab"><?php _e('Performance', 'modern-business'); ?></a>
                <a href="#advanced" class="nav-tab"><?php _e('Advanced Settings', 'modern-business'); ?></a>
            </div>

            <div id="homepage-sections" class="tab-content active">
                <h2><?php _e('Homepage Sections Order & Visibility', 'modern-business'); ?></h2>
                <p><?php _e('Drag and drop sections to change their order. Uncheck to hide a section.', 'modern-business'); ?></p>
                
                <table class="form-table section-order-table">
                    <thead>
                        <tr>
                            <th><?php _e('Order', 'modern-business'); ?></th>
                            <th><?php _e('Section', 'modern-business'); ?></th>
                            <th><?php _e('Visible', 'modern-business'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sections = get_option('modern_business_homepage_sections');
                        $section_names = array(
                            'hero' => __('Hero Banner', 'modern-business'),
                            'about' => __('About Us', 'modern-business'),
                            'services' => __('Our Services', 'modern-business'),
                            'portfolio' => __('Portfolio', 'modern-business'),
                            'team' => __('Team Members', 'modern-business'),
                            'testimonials' => __('Testimonials', 'modern-business'),
                            'blog' => __('Latest Blog Posts', 'modern-business'),
                            'contact' => __('Contact Section', 'modern-business'),
                        );

                        // Sort sections by order
                        uasort($sections, function($a, $b) {
                            return $a['order'] - $b['order'];
                        });

                        foreach ($sections as $section_id => $section) {
                            $name = isset($section_names[$section_id]) ? $section_names[$section_id] : ucfirst($section_id);
                            ?>
                            <tr class="section-row" data-section="<?php echo esc_attr($section_id); ?>">
                                <td class="section-order"><span class="dashicons dashicons-move"></span>
                                    <input type="hidden" name="modern_business_homepage_sections[<?php echo esc_attr($section_id); ?>][order]" value="<?php echo esc_attr($section['order']); ?>">
                                </td>
                                <td class="section-name"><?php echo esc_html($name); ?></td>
                                <td class="section-visibility">
                                    <input type="checkbox" id="section-<?php echo esc_attr($section_id); ?>-visible" 
                                           name="modern_business_homepage_sections[<?php echo esc_attr($section_id); ?>][enabled]" 
                                           <?php checked($section['enabled'], true); ?> value="1">
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div id="section-content" class="tab-content">
                <h2><?php _e('Section Content', 'modern-business'); ?></h2>
                
                <div class="section-tabs">
                    <a href="#about-section" class="section-tab active"><?php _e('About', 'modern-business'); ?></a>
                    <a href="#services-section" class="section-tab"><?php _e('Services', 'modern-business'); ?></a>
                    <a href="#portfolio-section" class="section-tab"><?php _e('Portfolio', 'modern-business'); ?></a>
                    <a href="#team-section" class="section-tab"><?php _e('Team', 'modern-business'); ?></a>
                    <a href="#testimonials-section" class="section-tab"><?php _e('Testimonials', 'modern-business'); ?></a>
                    <a href="#blog-section" class="section-tab"><?php _e('Blog', 'modern-business'); ?></a>
                    <a href="#contact-section" class="section-tab"><?php _e('Contact', 'modern-business'); ?></a>
                </div>
                
                <div id="about-section" class="section-content active">
                    <h3><?php _e('About Section', 'modern-business'); ?></h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php _e('Section Title', 'modern-business'); ?></th>
                            <td>
                                <input type="text" name="modern_business_about_title" value="<?php echo esc_attr(get_option('modern_business_about_title')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('Section Subtitle', 'modern-business'); ?></th>
                            <td>
                                <input type="text" name="modern_business_about_subtitle" value="<?php echo esc_attr(get_option('modern_business_about_subtitle')); ?>" class="regular-text">
                            </td>
                        </tr>
                    </table>
                    <p class="description"><?php _e('The main content for the About section is taken from a page. Create a page with "About" template or use the Customizer to select a specific page.', 'modern-business'); ?></p>
                </div>
                
                <div id="services-section" class="section-content">
                    <h3><?php _e('Services Section', 'modern-business'); ?></h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php _e('Section Title', 'modern-business'); ?></th>
                            <td>
                                <input type="text" name="modern_business_services_title" value="<?php echo esc_attr(get_option('modern_business_services_title')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('Section Subtitle', 'modern-business'); ?></th>
                            <td>
                                <input type="text" name="modern_business_services_subtitle" value="<?php echo esc_attr(get_option('modern_business_services_subtitle')); ?>" class="regular-text">
                            </td>
                        </tr>
                    </table>
                    <p class="description"><?php _e('Services are created as custom post types. Add services from the Services menu in the sidebar.', 'modern-business'); ?></p>
                </div>
                
                <div id="portfolio-section" class="section-content">
                    <h3><?php _e('Portfolio Section', 'modern-business'); ?></h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php _e('Section Title', 'modern-business'); ?></th>
                            <td>
                                <input type="text" name="modern_business_portfolio_title" value="<?php echo esc_attr(get_option('modern_business_portfolio_title')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('Section Subtitle', 'modern-business'); ?></th>
                            <td>
                                <input type="text" name="modern_business_portfolio_subtitle" value="<?php echo esc_attr(get_option('modern_business_portfolio_subtitle')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('Number of Items to Display', 'modern-business'); ?></th>
                            <td>
                                <input type="number" name="modern_business_portfolio_count" value="<?php echo esc_attr(get_option('modern_business_portfolio_count', 6)); ?>" class="small-text" min="1" max="24">
                            </td>
                        </tr>
                    </table>
                    <p class="description"><?php _e('Portfolio items are created as custom post types. Add portfolio items from the Portfolio menu in the sidebar.', 'modern-business'); ?></p>
                </div>
                
                <div id="team-section" class="section-content">
                    <h3><?php _e('Team Section', 'modern-business'); ?></h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php _e('Section Title', 'modern-business'); ?></th>
                            <td>
                                <input type="text" name="modern_business_team_title" value="<?php echo esc_attr(get_option('modern_business_team_title')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('Section Subtitle', 'modern-business'); ?></th>
                            <td>
                                <input type="text" name="modern_business_team_subtitle" value="<?php echo esc_attr(get_option('modern_business_team_subtitle')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('Number of Team Members to Display', 'modern-business'); ?></th>
                            <td>
                                <input type="number" name="modern_business_team_count" value="<?php echo esc_attr(get_option('modern_business_team_count', 4)); ?>" class="small-text" min="1" max="20">
                            </td>
                        </tr>
                    </table>
                    <p class="description"><?php _e('Team members are created as custom post types. Add team members from the Team menu in the sidebar.', 'modern-business'); ?></p>
                </div>
                
                <div id="testimonials-section" class="section-content">
                    <h3><?php _e('Testimonials Section', 'modern-business'); ?></h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php _e('Section Title', 'modern-business'); ?></th>
                            <td>
                                <input type="text" name="modern_business_testimonials_title" value="<?php echo esc_attr(get_option('modern_business_testimonials_title')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('Section Subtitle', 'modern-business'); ?></th>
                            <td>
                                <input type="text" name="modern_business_testimonials_subtitle" value="<?php echo esc_attr(get_option('modern_business_testimonials_subtitle')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('Number of Testimonials to Display', 'modern-business'); ?></th>
                            <td>
                                <input type="number" name="modern_business_testimonials_count" value="<?php echo esc_attr(get_option('modern_business_testimonials_count', 5)); ?>" class="small-text" min="1" max="20">
                            </td>
                        </tr>
                    </table>
                    <p class="description"><?php _e('Testimonials are created as custom post types. Add testimonials from the Testimonials menu in the sidebar.', 'modern-business'); ?></p>
                </div>
                
                <div id="blog-section" class="section-content">
                    <h3><?php _e('Blog Section', 'modern-business'); ?></h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php _e('Section Title', 'modern-business'); ?></th>
                            <td>
                                <input type="text" name="modern_business_blog_title" value="<?php echo esc_attr(get_option('modern_business_blog_title')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('Section Subtitle', 'modern-business'); ?></th>
                            <td>
                                <input type="text" name="modern_business_blog_subtitle" value="<?php echo esc_attr(get_option('modern_business_blog_subtitle')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('Number of Posts to Display', 'modern-business'); ?></th>
                            <td>
                                <input type="number" name="modern_business_blog_count" value="<?php echo esc_attr(get_option('modern_business_blog_count', 3)); ?>" class="small-text" min="1" max="12">
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div id="contact-section" class="section-content">
                    <h3><?php _e('Contact Section', 'modern-business'); ?></h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php _e('Section Title', 'modern-business'); ?></th>
                            <td>
                                <input type="text" name="modern_business_contact_title" value="<?php echo esc_attr(get_option('modern_business_contact_title')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('Section Subtitle', 'modern-business'); ?></th>
                            <td>
                                <input type="text" name="modern_business_contact_subtitle" value="<?php echo esc_attr(get_option('modern_business_contact_subtitle')); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('Contact Form Shortcode', 'modern-business'); ?></th>
                            <td>
                                <input type="text" name="modern_business_contact_form_shortcode" value="<?php echo esc_attr(get_option('modern_business_contact_form_shortcode')); ?>" class="regular-text" placeholder="[contact-form-7 id=&quot;123&quot; title=&quot;Contact form&quot;]">
                                <p class="description"><?php _e('Enter a shortcode for your contact form plugin (e.g., Contact Form 7, WPForms, etc.).', 'modern-business'); ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div id="performance" class="tab-content">
                <h2><?php _e('Performance Settings', 'modern-business'); ?></h2>
                <table class="form-table">
                    <tr>
                        <th scope="row"><?php _e('Load Font Awesome', 'modern-business'); ?></th>
                        <td>
                            <label for="modern_business_load_fontawesome">
                                <input type="checkbox" name="modern_business_load_fontawesome" id="modern_business_load_fontawesome" <?php checked(get_option('modern_business_load_fontawesome', true)); ?> value="1">
                                <?php _e('Load Font Awesome icons (disable if you\'re using a different icon set)', 'modern-business'); ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e('Animation Preload', 'modern-business'); ?></th>
                        <td>
                            <label for="modern_business_preload_animation">
                                <input type="checkbox" name="modern_business_preload_animation" id="modern_business_preload_animation" <?php checked(get_option('modern_business_preload_animation', true)); ?> value="1">
                                <?php _e('Enable preloader animation (creates a smoother initial page load)', 'modern-business'); ?>
                            </label>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="advanced" class="tab-content">
                <h2><?php _e('Advanced Settings', 'modern-business'); ?></h2>
                <table class="form-table">
                    <tr>
                        <th scope="row"><?php _e('Portfolio Permalink Base', 'modern-business'); ?></th>
                        <td>
                            <input type="text" name="modern_business_portfolio_permalink" value="<?php echo esc_attr(get_option('modern_business_portfolio_permalink', 'portfolio')); ?>" class="regular-text">
                            <p class="description"><?php _e('Customize the URL base for portfolio items. Default is "portfolio".', 'modern-business'); ?></p>
                        </td>
                    </tr>
                </table>
            </div>

            <?php submit_button(__('Save Settings', 'modern-business')); ?>
        </form>
    </div>

    <style>
        .nav-tab-wrapper {
            margin-bottom: 20px;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        
        .section-tabs {
            display: flex;
            flex-wrap: wrap;
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
        }
        .section-tab {
            padding: 10px 15px;
            margin-right: 5px;
            background: #e5e5e5;
            text-decoration: none;
            border-radius: 3px 3px 0 0;
            font-weight: 500;
            color: #555;
        }
        .section-tab.active {
            background: #fff;
            border: 1px solid #ccc;
            border-bottom-color: #fff;
            margin-bottom: -1px;
            color: #0073aa;
        }
        .section-content {
            display: none;
        }
        .section-content.active {
            display: block;
        }
        
        .section-order-table {
            width: 100%;
            max-width: 500px;
            background: #fff;
            border: 1px solid #e5e5e5;
        }
        .section-order-table th {
            text-align: left;
            padding: 8px 10px;
            font-weight: 600;
            border-bottom: 1px solid #e5e5e5;
        }
        .section-row {
            background: #fff;
        }
        .section-row td {
            padding: 10px;
            border-bottom: 1px solid #f0f0f0;
        }
        .section-order {
            width: 30px;
            cursor: move;
        }
        .dashicons-move {
            color: #aaa;
        }
        .section-visibility {
            width: 50px;
            text-align: center;
        }
    </style>

    <script>
        jQuery(document).ready(function($) {
            // Tab navigation
            $('.nav-tab').on('click', function(e) {
                e.preventDefault();
                var target = $(this).attr('href');
                
                $('.nav-tab').removeClass('nav-tab-active');
                $(this).addClass('nav-tab-active');
                
                $('.tab-content').removeClass('active');
                $(target).addClass('active');
            });
            
            // Section tab navigation
            $('.section-tab').on('click', function(e) {
                e.preventDefault();
                var target = $(this).attr('href');
                
                $('.section-tab').removeClass('active');
                $(this).addClass('active');
                
                $('.section-content').removeClass('active');
                $(target).addClass('active');
            });
            
            // Make sections sortable
            $('.section-order-table tbody').sortable({
                handle: '.section-order',
                update: function(event, ui) {
                    $('.section-order-table tbody tr').each(function(index) {
                        $(this).find('input[name*="[order]"]').val(index + 1);
                    });
                }
            });
        });
    </script>
    <?php
}