`<?php
/**
 * Custom Meta Boxes for Modern Business Theme
 *
 * @package Modern_Business
 */

/**
 * Register meta boxes for custom post types like portfolio, testimonials, and team.
 */
function modern_business_register_meta_boxes() {
    add_meta_box(
        'testimonial_client_info',
        __('Testimonial Client Info', 'modern-business'),
        'modern_business_testimonial_client_info_callback',
        'testimonial',
        'normal',
        'high'
    );

    add_meta_box(
        'team_member_info',
        __('Team Member Info', 'modern-business'),
        'modern_business_team_member_info_callback',
        'team',
        'normal',
        'high'
    );

    add_meta_box(
        'portfolio_item_info',
        __('Portfolio Item Info', 'modern-business'),
        'modern_business_portfolio_item_info_callback',
        'portfolio',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'modern_business_register_meta_boxes');

/**
 * Callback to display testimonial client info meta box.
 */
function modern_business_testimonial_client_info_callback($post) {
    wp_nonce_field('modern_business_save_testimonial_client_info', 'modern_business_testimonial_client_info_nonce');

    $client_name = get_post_meta($post->ID, 'testimonial_client_name', true);
    $client_position = get_post_meta($post->ID, 'testimonial_client_position', true);
    $client_company = get_post_meta($post->ID, 'testimonial_client_company', true);
    $rating = get_post_meta($post->ID, 'testimonial_rating', true) ?: 5;
    ?>
    <p>
        <label for="testimonial_client_name"><?php _e('Client Name', 'modern-business'); ?></label><br>
        <input type="text" id="testimonial_client_name" name="testimonial_client_name" value="<?php echo esc_attr($client_name); ?>" class="widefat" />
    </p>
    <p>
        <label for="testimonial_client_position"><?php _e('Client Position', 'modern-business'); ?></label><br>
        <input type="text" id="testimonial_client_position" name="testimonial_client_position" value="<?php echo esc_attr($client_position); ?>" class="widefat" />
    </p>
    <p>
        <label for="testimonial_client_company"><?php _e('Client Company', 'modern-business'); ?></label><br>
        <input type="text" id="testimonial_client_company" name="testimonial_client_company" value="<?php echo esc_attr($client_company); ?>" class="widefat" />
    </p>
    <p>
        <label for="testimonial_rating"><?php _e('Rating (1-5)', 'modern-business'); ?></label><br>
        <input type="number" id="testimonial_rating" name="testimonial_rating" value="<?php echo esc_attr($rating); ?>" min="1" max="5" class="widefat" />
    </p>
    <?php
}

/**
 * Callback to display team member info meta box.
 */
function modern_business_team_member_info_callback($post) {
    wp_nonce_field('modern_business_save_team_member_info', 'modern_business_team_member_info_nonce');

    $position = get_post_meta($post->ID, 'team_position', true);
    $facebook = get_post_meta($post->ID, 'team_facebook', true);
    $twitter = get_post_meta($post->ID, 'team_twitter', true);
    $linkedin = get_post_meta($post->ID, 'team_linkedin', true);
    $instagram = get_post_meta($post->ID, 'team_instagram', true);
    ?>
    <p>
        <label for="team_position"><?php _e('Position', 'modern-business'); ?></label><br>
        <input type="text" id="team_position" name="team_position" value="<?php echo esc_attr($position); ?>" class="widefat" />
    </p>
    <p>
        <label for="team_facebook"><?php _e('Facebook URL', 'modern-business'); ?></label><br>
        <input type="url" id="team_facebook" name="team_facebook" value="<?php echo esc_url($facebook); ?>" class="widefat" />
    </p>
    <p>
        <label for="team_twitter"><?php _e('Twitter URL', 'modern-business'); ?></label><br>
        <input type="url" id="team_twitter" name="team_twitter" value="<?php echo esc_url($twitter); ?>" class="widefat" />
    </p>
    <p>
        <label for="team_linkedin"><?php _e('LinkedIn URL', 'modern-business'); ?></label><br>
        <input type="url" id="team_linkedin" name="team_linkedin" value="<?php echo esc_url($linkedin); ?>" class="widefat" />
    </p>
    <p>
        <label for="team_instagram"><?php _e('Instagram URL', 'modern-business'); ?></label><br>
        <input type="url" id="team_instagram" name="team_instagram" value="<?php echo esc_url($instagram); ?>" class="widefat" />
    </p>
    <?php
}

/**
 * Callback to display portfolio item info meta box.
 */
function modern_business_portfolio_item_info_callback($post) {
    wp_nonce_field('modern_business_save_portfolio_item_info', 'modern_business_portfolio_item_info_nonce');

    $project_url = get_post_meta($post->ID, 'portfolio_project_url', true);
    ?>
    <p>
        <label for="portfolio_project_url"><?php _e('Project URL', 'modern-business'); ?></label><br>
        <input type="url" id="portfolio_project_url" name="portfolio_project_url" value="<?php echo esc_url($project_url); ?>" class="widefat" />
    </p>
    <?php
}

/**
 * Save meta box data.
 */
function modern_business_save_meta_boxes($post_id) {
    // Verify nonce for testimonial client info
    if (isset($_POST['modern_business_testimonial_client_info_nonce']) && !wp_verify_nonce($_POST['modern_business_testimonial_client_info_nonce'], 'modern_business_save_testimonial_client_info')) {
        return;
    }
    // Verify nonce for team member info
    if (isset($_POST['modern_business_team_member_info_nonce']) && !wp_verify_nonce($_POST['modern_business_team_member_info_nonce'], 'modern_business_save_team_member_info')) {
        return;
    }
    // Verify nonce for portfolio item info
    if (isset($_POST['modern_business_portfolio_item_info_nonce']) && !wp_verify_nonce($_POST['modern_business_portfolio_item_info_nonce'], 'modern_business_save_portfolio_item_info')) {
        return;
    }

    // Save testimonial client info
    if (isset($_POST['testimonial_client_name'])) {
        update_post_meta($post_id, 'testimonial_client_name', sanitize_text_field($_POST['testimonial_client_name']));
    }
    if (isset($_POST['testimonial_client_position'])) {
        update_post_meta($post_id, 'testimonial_client_position', sanitize_text_field($_POST['testimonial_client_position']));
    }
    if (isset($_POST['testimonial_client_company'])) {
        update_post_meta($post_id, 'testimonial_client_company', sanitize_text_field($_POST['testimonial_client_company']));
    }
    if (isset($_POST['testimonial_rating'])) {
        $rating = intval($_POST['testimonial_rating']);
        if ($rating < 1) $rating = 1;
        if ($rating > 5) $rating = 5;
        update_post_meta($post_id, 'testimonial_rating', $rating);
    }

    // Save team member info
    if (isset($_POST['team_position'])) {
        update_post_meta($post_id, 'team_position', sanitize_text_field($_POST['team_position']));
    }
    if (isset($_POST['team_facebook'])) {
        update_post_meta($post_id, 'team_facebook', esc_url_raw($_POST['team_facebook']));
    }
    if (isset($_POST['team_twitter'])) {
        update_post_meta($post_id, 'team_twitter', esc_url_raw($_POST['team_twitter']));
    }
    if (isset($_POST['team_linkedin'])) {
        update_post_meta($post_id, 'team_linkedin', esc_url_raw($_POST['team_linkedin']));
    }
    if (isset($_POST['team_instagram'])) {
        update_post_meta($post_id, 'team_instagram', esc_url_raw($_POST['team_instagram']));
    }

    // Save portfolio item info
    if (isset($_POST['portfolio_project_url'])) {
        update_post_meta($post_id, 'portfolio_project_url', esc_url_raw($_POST['portfolio_project_url']));
    }
}
add_action('save_post', 'modern_business_save_meta_boxes');
?>
