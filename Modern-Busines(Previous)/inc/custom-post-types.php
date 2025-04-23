<?php
/**
 * Register Custom Post Types for Modern Business Theme
 *
 * @package Modern_Business
 */

/**
 * Register Service Custom Post Type
 */
function modern_business_register_service_post_type() {
    $labels = array(
        'name'                  => _x('Services', 'Post Type General Name', 'modern-business'),
        'singular_name'         => _x('Service', 'Post Type Singular Name', 'modern-business'),
        'menu_name'             => __('Services', 'modern-business'),
        'name_admin_bar'        => __('Service', 'modern-business'),
        'archives'              => __('Service Archives', 'modern-business'),
        'attributes'            => __('Service Attributes', 'modern-business'),
        'parent_item_colon'     => __('Parent Service:', 'modern-business'),
        'all_items'             => __('All Services', 'modern-business'),
        'add_new_item'          => __('Add New Service', 'modern-business'),
        'add_new'               => __('Add New', 'modern-business'),
        'new_item'              => __('New Service', 'modern-business'),
        'edit_item'             => __('Edit Service', 'modern-business'),
        'update_item'           => __('Update Service', 'modern-business'),
        'view_item'             => __('View Service', 'modern-business'),
        'view_items'            => __('View Services', 'modern-business'),
        'search_items'          => __('Search Service', 'modern-business'),
        'not_found'             => __('Not found', 'modern-business'),
        'not_found_in_trash'    => __('Not found in Trash', 'modern-business'),
        'featured_image'        => __('Featured Image', 'modern-business'),
        'set_featured_image'    => __('Set featured image', 'modern-business'),
        'remove_featured_image' => __('Remove featured image', 'modern-business'),
        'use_featured_image'    => __('Use as featured image', 'modern-business'),
        'insert_into_item'      => __('Insert into Service', 'modern-business'),
        'uploaded_to_this_item' => __('Uploaded to this Service', 'modern-business'),
        'items_list'            => __('Services list', 'modern-business'),
        'items_list_navigation' => __('Services list navigation', 'modern-business'),
        'filter_items_list'     => __('Filter Services list', 'modern-business'),
    );
    
    $args = array(
        'label'                 => __('Service', 'modern-business'),
        'description'           => __('Service Description', 'modern-business'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-admin-tools',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'services'),
    );
    
    register_post_type('service', $args);
}
add_action('init', 'modern_business_register_service_post_type');

/**
 * Register Portfolio Custom Post Type
 */
function modern_business_register_portfolio_post_type() {
    $labels = array(
        'name'                  => _x('Portfolio', 'Post Type General Name', 'modern-business'),
        'singular_name'         => _x('Portfolio Item', 'Post Type Singular Name', 'modern-business'),
        'menu_name'             => __('Portfolio', 'modern-business'),
        'name_admin_bar'        => __('Portfolio Item', 'modern-business'),
        'archives'              => __('Portfolio Archives', 'modern-business'),
        'attributes'            => __('Portfolio Attributes', 'modern-business'),
        'parent_item_colon'     => __('Parent Portfolio Item:', 'modern-business'),
        'all_items'             => __('All Portfolio Items', 'modern-business'),
        'add_new_item'          => __('Add New Portfolio Item', 'modern-business'),
        'add_new'               => __('Add New', 'modern-business'),
        'new_item'              => __('New Portfolio Item', 'modern-business'),
        'edit_item'             => __('Edit Portfolio Item', 'modern-business'),
        'update_item'           => __('Update Portfolio Item', 'modern-business'),
        'view_item'             => __('View Portfolio Item', 'modern-business'),
        'view_items'            => __('View Portfolio Items', 'modern-business'),
        'search_items'          => __('Search Portfolio Item', 'modern-business'),
        'not_found'             => __('Not found', 'modern-business'),
        'not_found_in_trash'    => __('Not found in Trash', 'modern-business'),
        'featured_image'        => __('Featured Image', 'modern-business'),
        'set_featured_image'    => __('Set featured image', 'modern-business'),
        'remove_featured_image' => __('Remove featured image', 'modern-business'),
        'use_featured_image'    => __('Use as featured image', 'modern-business'),
        'insert_into_item'      => __('Insert into Portfolio Item', 'modern-business'),
        'uploaded_to_this_item' => __('Uploaded to this Portfolio Item', 'modern-business'),
        'items_list'            => __('Portfolio Items list', 'modern-business'),
        'items_list_navigation' => __('Portfolio Items list navigation', 'modern-business'),
        'filter_items_list'     => __('Filter Portfolio Items list', 'modern-business'),
    );
    
    $portfolio_slug = get_option('modern_business_portfolio_permalink', 'portfolio');
    
    $args = array(
        'label'                 => __('Portfolio Item', 'modern-business'),
        'description'           => __('Portfolio Description', 'modern-business'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 21,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => $portfolio_slug),
    );
    
    register_post_type('portfolio', $args);
}
add_action('init', 'modern_business_register_portfolio_post_type');

/**
 * Register Portfolio Category Taxonomy
 */
function modern_business_register_portfolio_category_taxonomy() {
    $labels = array(
        'name'                       => _x('Portfolio Categories', 'Taxonomy General Name', 'modern-business'),
        'singular_name'              => _x('Portfolio Category', 'Taxonomy Singular Name', 'modern-business'),
        'menu_name'                  => __('Portfolio Categories', 'modern-business'),
        'all_items'                  => __('All Categories', 'modern-business'),
        'parent_item'                => __('Parent Category', 'modern-business'),
        'parent_item_colon'          => __('Parent Category:', 'modern-business'),
        'new_item_name'              => __('New Category Name', 'modern-business'),
        'add_new_item'               => __('Add New Category', 'modern-business'),
        'edit_item'                  => __('Edit Category', 'modern-business'),
        'update_item'                => __('Update Category', 'modern-business'),
        'view_item'                  => __('View Category', 'modern-business'),
        'separate_items_with_commas' => __('Separate categories with commas', 'modern-business'),
        'add_or_remove_items'        => __('Add or remove categories', 'modern-business'),
        'choose_from_most_used'      => __('Choose from the most used', 'modern-business'),
        'popular_items'              => __('Popular Categories', 'modern-business'),
        'search_items'               => __('Search Categories', 'modern-business'),
        'not_found'                  => __('Not Found', 'modern-business'),
        'no_terms'                   => __('No categories', 'modern-business'),
        'items_list'                 => __('Categories list', 'modern-business'),
        'items_list_navigation'      => __('Categories list navigation', 'modern-business'),
    );
    
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
        'rewrite'                    => array('slug' => 'portfolio-category'),
    );
    
    register_taxonomy('portfolio_category', array('portfolio'), $args);
}
add_action('init', 'modern_business_register_portfolio_category_taxonomy');

/**
 * Register Team Member Custom Post Type
 */
function modern_business_register_team_post_type() {
    $labels = array(
        'name'                  => _x('Team', 'Post Type General Name', 'modern-business'),
        'singular_name'         => _x('Team Member', 'Post Type Singular Name', 'modern-business'),
        'menu_name'             => __('Team', 'modern-business'),
        'name_admin_bar'        => __('Team Member', 'modern-business'),
        'archives'              => __('Team Archives', 'modern-business'),
        'attributes'            => __('Team Member Attributes', 'modern-business'),
        'parent_item_colon'     => __('Parent Team Member:', 'modern-business'),
        'all_items'             => __('All Team Members', 'modern-business'),
        'add_new_item'          => __('Add New Team Member', 'modern-business'),
        'add_new'               => __('Add New', 'modern-business'),
        'new_item'              => __('New Team Member', 'modern-business'),
        'edit_item'             => __('Edit Team Member', 'modern-business'),
        'update_item'           => __('Update Team Member', 'modern-business'),
        'view_item'             => __('View Team Member', 'modern-business'),
        'view_items'            => __('View Team Members', 'modern-business'),
        'search_items'          => __('Search Team Member', 'modern-business'),
        'not_found'             => __('Not found', 'modern-business'),
        'not_found_in_trash'    => __('Not found in Trash', 'modern-business'),
        'featured_image'        => __('Profile Image', 'modern-business'),
        'set_featured_image'    => __('Set profile image', 'modern-business'),
        'remove_featured_image' => __('Remove profile image', 'modern-business'),
        'use_featured_image'    => __('Use as profile image', 'modern-business'),
        'insert_into_item'      => __('Insert into Team Member', 'modern-business'),
        'uploaded_to_this_item' => __('Uploaded to this Team Member', 'modern-business'),
        'items_list'            => __('Team Members list', 'modern-business'),
        'items_list_navigation' => __('Team Members list navigation', 'modern-business'),
        'filter_items_list'     => __('Filter Team Members list', 'modern-business'),
    );
    
    $args = array(
        'label'                 => __('Team Member', 'modern-business'),
        'description'           => __('Team Member Description', 'modern-business'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 22,
        'menu_icon'             => 'dashicons-groups',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'team'),
    );
    
    register_post_type('team', $args);
}
add_action('init', 'modern_business_register_team_post_type');

/**
 * Register Testimonial Custom Post Type
 */
function modern_business_register_testimonial_post_type() {
    $labels = array(
        'name'                  => _x('Testimonials', 'Post Type General Name', 'modern-business'),
        'singular_name'         => _x('Testimonial', 'Post Type Singular Name', 'modern-business'),
        'menu_name'             => __('Testimonials', 'modern-business'),
        'name_admin_bar'        => __('Testimonial', 'modern-business'),
        'archives'              => __('Testimonial Archives', 'modern-business'),
        'attributes'            => __('Testimonial Attributes', 'modern-business'),
        'parent_item_colon'     => __('Parent Testimonial:', 'modern-business'),
        'all_items'             => __('All Testimonials', 'modern-business'),
        'add_new_item'          => __('Add New Testimonial', 'modern-business'),
        'add_new'               => __('Add New', 'modern-business'),
        'new_item'              => __('New Testimonial', 'modern-business'),
        'edit_item'             => __('Edit Testimonial', 'modern-business'),
        'update_item'           => __('Update Testimonial', 'modern-business'),
        'view_item'             => __('View Testimonial', 'modern-business'),
        'view_items'            => __('View Testimonials', 'modern-business'),
        'search_items'          => __('Search Testimonial', 'modern-business'),
        'not_found'             => __('Not found', 'modern-business'),
        'not_found_in_trash'    => __('Not found in Trash', 'modern-business'),
        'featured_image'        => __('Client Image', 'modern-business'),
        'set_featured_image'    => __('Set client image', 'modern-business'),
        'remove_featured_image' => __('Remove client image', 'modern-business'),
        'use_featured_image'    => __('Use as client image', 'modern-business'),
        'insert_into_item'      => __('Insert into Testimonial', 'modern-business'),
        'uploaded_to_this_item' => __('Uploaded to this Testimonial', 'modern-business'),
        'items_list'            => __('Testimonials list', 'modern-business'),
        'items_list_navigation' => __('Testimonials list navigation', 'modern-business'),
        'filter_items_list'     => __('Filter Testimonials list', 'modern-business'),
    );
    
    $args = array(
        'label'                 => __('Testimonial', 'modern-business'),
        'description'           => __('Testimonial Description', 'modern-business'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 23,
        'menu_icon'             => 'dashicons-format-quote',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'testimonials'),
    );
    
    register_post_type('testimonial', $args);
}
add_action('init', 'modern_business_register_testimonial_post_type');

/**
 * Flush rewrite rules on theme activation
 */
function modern_business_rewrite_flush() {
    modern_business_register_service_post_type();
    modern_business_register_portfolio_post_type();
    modern_business_register_portfolio_category_taxonomy();
    modern_business_register_team_post_type();
    modern_business_register_testimonial_post_type();
    flush_rewrite_rules();
}
register_activation_hook(get_template_directory() . '/functions.php', 'modern_business_rewrite_flush');