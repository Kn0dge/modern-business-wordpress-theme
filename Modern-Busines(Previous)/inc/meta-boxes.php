<?php
/**
 * Custom meta boxes for Modern Business Theme
 *
 * @package Modern_Business
 */

/**
 * Register meta boxes
 */
function modern_business_register_meta_boxes() {
    // Service meta box
    add_meta_box(
        'service_options',
        __('Service Options', 'modern-business'),
        'modern_business_service_meta_box_callback',
        'service',
        'normal',
        'high'
    );

    // Portfolio meta box
    add_meta_box(
        'portfolio_options',
        __('Portfolio Options', 'modern-business'),
        'modern_business_portfolio_meta_box_callback',
        'portfolio',
        'normal',
        'high'
    );

    // Team member meta box
    add_meta_box(
        'team_options',
        __('Team Member Details', 'modern-business'),
        'modern_business_team_meta_box_callback',
        'team',
        'normal',
        'high'
    );

    // Testimonial meta box
    add_meta_box(
        'testimonial_options',
        __('Testimonial Details', 'modern-business'),
        'modern_business_testimonial_meta_box_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'modern_business_register_meta_boxes');

/**
 * Service meta box callback
 */
function modern_business_service_meta_box_callback($post) {
    // Add a nonce field
    wp_nonce_field('modern_business_service_meta_box', 'modern_business_service_meta_box_nonce');

    // Get current values
    $service_icon = get_post_meta($post->ID, 'service_icon', true);
    $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true) ?: 'fontawesome';
    
    ?>
    <p><label for="service_icon_type"><?php _e('Icon Type:', 'modern-business'); ?></label></p>
    <select id="service_icon_type" name="service_icon_type">
        <option value="fontawesome" <?php selected($service_icon_type, 'fontawesome'); ?>><?php _e('Font Awesome', 'modern-business'); ?></option>
        <option value="image" <?php selected($service_icon_type, 'image'); ?>><?php _e('Custom Image', 'modern-business'); ?></option>
    </select>
    
    <div id="fontawesome-icon-section" style="<?php echo $service_icon_type === 'fontawesome' ? 'display:block;' : 'display:none;'; ?>">
        <p><label for="service_icon"><?php _e('Font Awesome Icon Class:', 'modern-business'); ?></label></p>
        <input type="text" id="service_icon" name="service_icon" value="<?php echo esc_attr($service_icon); ?>" class="regular-text" placeholder="e.g., fas fa-laptop">
        <p class="description"><?php _e('Enter a Font Awesome icon class. For example: fas fa-laptop, far fa-chart-bar, etc.', 'modern-business'); ?></p>
        <p class="description"><?php _e('Find icons at: <a href="https://fontawesome.com/icons" target="_blank">Font Awesome Icons</a>', 'modern-business'); ?></p>
    </div>
    
    <div id="image-icon-section" style="<?php echo $service_icon_type === 'image' ? 'display:block;' : 'display:none;'; ?>">
        <p><label><?php _e('Custom Icon Image:', 'modern-business'); ?></label></p>
        <?php 
        $service_image_id = get_post_meta($post->ID, 'service_image_id', true);
        $image_src = '';
        
        if ($service_image_id) {
            $image_src = wp_get_attachment_image_src($service_image_id, 'thumbnail')[0];
        }
        ?>
        <div class="custom-icon-preview" style="margin-bottom: 10px;">
            <?php if ($image_src) : ?>
                <img src="<?php echo esc_url($image_src); ?>" alt="" style="max-width: 100px; height: auto;">
            <?php endif; ?>
        </div>
        <input type="hidden" name="service_image_id" id="service_image_id" value="<?php echo esc_attr($service_image_id); ?>">
        <button type="button" class="button upload-icon-button"><?php _e('Upload Image', 'modern-business'); ?></button>
        <button type="button" class="button remove-icon-button" <?php echo empty($image_src) ? 'style="display:none"' : ''; ?>><?php _e('Remove Image', 'modern-business'); ?></button>
        <p class="description"><?php _e('Upload a custom icon image. Recommended size: 100x100px.', 'modern-business'); ?></p>
    </div>
    
    <script>
        jQuery(document).ready(function($) {
            // Show/hide appropriate icon section based on selected type
            $('#service_icon_type').on('change', function() {
                var iconType = $(this).val();
                
                if (iconType === 'fontawesome') {
                    $('#fontawesome-icon-section').show();
                    $('#image-icon-section').hide();
                } else {
                    $('#fontawesome-icon-section').hide();
                    $('#image-icon-section').show();
                }
            });
            
            // Handle image upload
            $('.upload-icon-button').on('click', function(e) {
                e.preventDefault();
                
                var button = $(this);
                var imageId = $('#service_image_id');
                var previewContainer = $('.custom-icon-preview');
                var removeButton = $('.remove-icon-button');
                
                // Create a new media frame
                var frame = wp.media({
                    title: '<?php _e('Select or Upload Icon Image', 'modern-business'); ?>',
                    button: {
                        text: '<?php _e('Use this image', 'modern-business'); ?>'
                    },
                    multiple: false
                });
                
                // When an image is selected in the media frame...
                frame.on('select', function() {
                    // Get media attachment details from the frame state
                    var attachment = frame.state().get('selection').first().toJSON();
                    
                    // Set the image ID in the hidden input
                    imageId.val(attachment.id);
                    
                    // Set the image in the preview container
                    previewContainer.html('<img src="' + attachment.url + '" alt="" style="max-width: 100px; height: auto;">');
                    
                    // Show the remove button
                    removeButton.show();
                });
                
                // Finally, open the modal
                frame.open();
            });
            
            // Handle image removal
            $('.remove-icon-button').on('click', function(e) {
                e.preventDefault();
                
                // Clear the image ID
                $('#service_image_id').val('');
                
                // Clear the preview
                $('.custom-icon-preview').html('');
                
                // Hide the remove button
                $(this).hide();
            });
        });
    </script>
    <?php
}

/**
 * Portfolio meta box callback
 */
function modern_business_portfolio_meta_box_callback($post) {
    // Add a nonce field
    wp_nonce_field('modern_business_portfolio_meta_box', 'modern_business_portfolio_meta_box_nonce');

    // Get current values
    $client = get_post_meta($post->ID, 'portfolio_client', true);
    $project_date = get_post_meta($post->ID, 'portfolio_date', true);
    $project_url = get_post_meta($post->ID, 'portfolio_url', true);
    $gallery_images = get_post_meta($post->ID, 'portfolio_gallery', true);
    
    ?>
    <div class="portfolio-meta-fields">
        <p>
            <label for="portfolio_client"><strong><?php _e('Client:', 'modern-business'); ?></strong></label><br>
            <input type="text" id="portfolio_client" name="portfolio_client" value="<?php echo esc_attr($client); ?>" class="regular-text">
        </p>
        
        <p>
            <label for="portfolio_date"><strong><?php _e('Project Date:', 'modern-business'); ?></strong></label><br>
            <input type="date" id="portfolio_date" name="portfolio_date" value="<?php echo esc_attr($project_date); ?>" class="regular-text">
        </p>
        
        <p>
            <label for="portfolio_url"><strong><?php _e('Project URL:', 'modern-business'); ?></strong></label><br>
            <input type="url" id="portfolio_url" name="portfolio_url" value="<?php echo esc_url($project_url); ?>" class="regular-text" placeholder="https://example.com">
        </p>
        
        <div class="portfolio-gallery-section">
            <p><strong><?php _e('Project Gallery:', 'modern-business'); ?></strong></p>
            <p class="description"><?php _e('Add additional images to showcase your project.', 'modern-business'); ?></p>
            
            <div class="portfolio-gallery-preview">
                <?php
                if (!empty($gallery_images)) {
                    $gallery_ids = explode(',', $gallery_images);
                    foreach ($gallery_ids as $image_id) {
                        $image_url = wp_get_attachment_image_src($image_id, 'thumbnail');
                        if ($image_url) {
                            echo '<div class="gallery-item" data-id="' . esc_attr($image_id) . '">';
                            echo '<img src="' . esc_url($image_url[0]) . '" alt="">';
                            echo '<button type="button" class="remove-gallery-image"><span class="dashicons dashicons-no-alt"></span></button>';
                            echo '</div>';
                        }
                    }
                }
                ?>
            </div>
            
            <input type="hidden" name="portfolio_gallery" id="portfolio_gallery" value="<?php echo esc_attr($gallery_images); ?>">
            <button type="button" class="button add-gallery-images">
                <?php _e('Add Gallery Images', 'modern-business'); ?>
            </button>
        </div>
    </div>
    
    <style>
        .portfolio-gallery-preview {
            display: flex;
            flex-wrap: wrap;
            margin: 10px 0;
        }
        .gallery-item {
            position: relative;
            width: 100px;
            margin: 0 10px 10px 0;
        }
        .gallery-item img {
            width: 100%;
            height: auto;
            border: 1px solid #ddd;
        }
        .remove-gallery-image {
            position: absolute;
            top: 0;
            right: 0;
            background: rgba(0,0,0,0.5);
            color: #fff;
            border: none;
            padding: 0;
            width: 20px;
            height: 20px;
            cursor: pointer;
        }
        .remove-gallery-image .dashicons {
            font-size: 16px;
            width: 16px;
            height: 16px;
        }
    </style>
    
    <script>
        jQuery(document).ready(function($) {
            // Handle gallery image upload
            $('.add-gallery-images').on('click', function(e) {
                e.preventDefault();
                
                var button = $(this);
                var galleryInput = $('#portfolio_gallery');
                var previewContainer = $('.portfolio-gallery-preview');
                
                // Create a new media frame
                var frame = wp.media({
                    title: '<?php _e('Select Gallery Images', 'modern-business'); ?>',
                    button: {
                        text: '<?php _e('Add to gallery', 'modern-business'); ?>'
                    },
                    multiple: true
                });
                
                // When images are selected in the media frame...
                frame.on('select', function() {
                    // Get media attachment details from the frame state
                    var attachments = frame.state().get('selection').toJSON();
                    var currentGallery = galleryInput.val();
                    var galleryIds = currentGallery ? currentGallery.split(',') : [];
                    
                    // Loop through each attachment
                    $(attachments).each(function() {
                        var attachment = this;
                        
                        // Add the ID to the gallery array if it's not already there
                        if ($.inArray(attachment.id.toString(), galleryIds) === -1) {
                            galleryIds.push(attachment.id.toString());
                            
                            // Add the image to the preview
                            previewContainer.append(
                                '<div class="gallery-item" data-id="' + attachment.id + '">' +
                                '<img src="' + attachment.sizes.thumbnail.url + '" alt="">' +
                                '<button type="button" class="remove-gallery-image"><span class="dashicons dashicons-no-alt"></span></button>' +
                                '</div>'
                            );
                        }
                    });
                    
                    // Update the hidden input
                    galleryInput.val(galleryIds.join(','));
                });
                
                // Finally, open the modal
                frame.open();
            });
            
            // Handle gallery image removal
            $('.portfolio-gallery-preview').on('click', '.remove-gallery-image', function(e) {
                e.preventDefault();
                
                var item = $(this).closest('.gallery-item');
                var imageId = item.data('id');
                var galleryInput = $('#portfolio_gallery');
                var galleryIds = galleryInput.val().split(',');
                
                // Remove the ID from the gallery array
                galleryIds = galleryIds.filter(function(id) {
                    return id != imageId;
                });
                
                // Update the hidden input
                galleryInput.val(galleryIds.join(','));
                
                // Remove the image from the preview
                item.remove();
            });
        });
    </script>
    <?php
}

/**
 * Team member meta box callback
 */
function modern_business_team_meta_box_callback($post) {
    // Add a nonce field
    wp_nonce_field('modern_business_team_meta_box', 'modern_business_team_meta_box_nonce');

    // Get current values
    $position = get_post_meta($post->ID, 'team_position', true);
    $facebook = get_post_meta($post->ID, 'team_facebook', true);
    $twitter = get_post_meta($post->ID, 'team_twitter', true);
    $linkedin = get_post_meta($post->ID, 'team_linkedin', true);
    $instagram = get_post_meta($post->ID, 'team_instagram', true);
    $email = get_post_meta($post->ID, 'team_email', true);
    $phone = get_post_meta($post->ID, 'team_phone', true);
    
    ?>
    <div class="team-meta-fields">
        <p>
            <label for="team_position"><strong><?php _e('Position/Job Title:', 'modern-business'); ?></strong></label><br>
            <input type="text" id="team_position" name="team_position" value="<?php echo esc_attr($position); ?>" class="regular-text">
        </p>
        
        <h3><?php _e('Contact Information', 'modern-business'); ?></h3>
        
        <p>
            <label for="team_email"><strong><?php _e('Email:', 'modern-business'); ?></strong></label><br>
            <input type="email" id="team_email" name="team_email" value="<?php echo esc_attr($email); ?>" class="regular-text">
        </p>
        
        <p>
            <label for="team_phone"><strong><?php _e('Phone:', 'modern-business'); ?></strong></label><br>
            <input type="text" id="team_phone" name="team_phone" value="<?php echo esc_attr($phone); ?>" class="regular-text">
        </p>
        
        <h3><?php _e('Social Media Links', 'modern-business'); ?></h3>
        
        <p>
            <label for="team_facebook"><strong><?php _e('Facebook:', 'modern-business'); ?></strong></label><br>
            <input type="url" id="team_facebook" name="team_facebook" value="<?php echo esc_url($facebook); ?>" class="regular-text" placeholder="https://facebook.com/username">
        </p>
        
        <p>
            <label for="team_twitter"><strong><?php _e('Twitter:', 'modern-business'); ?></strong></label><br>
            <input type="url" id="team_twitter" name="team_twitter" value="<?php echo esc_url($twitter); ?>" class="regular-text" placeholder="https://twitter.com/username">
        </p>
        
        <p>
            <label for="team_linkedin"><strong><?php _e('LinkedIn:', 'modern-business'); ?></strong></label><br>
            <input type="url" id="team_linkedin" name="team_linkedin" value="<?php echo esc_url($linkedin); ?>" class="regular-text" placeholder="https://linkedin.com/in/username">
        </p>
        
        <p>
            <label for="team_instagram"><strong><?php _e('Instagram:', 'modern-business'); ?></strong></label><br>
            <input type="url" id="team_instagram" name="team_instagram" value="<?php echo esc_url($instagram); ?>" class="regular-text" placeholder="https://instagram.com/username">
        </p>
    </div>
    <?php
}

/**
 * Testimonial meta box callback
 */
function modern_business_testimonial_meta_box_callback($post) {
    // Add a nonce field
    wp_nonce_field('modern_business_testimonial_meta_box', 'modern_business_testimonial_meta_box_nonce');

    // Get current values
    $client_name = get_post_meta($post->ID, 'testimonial_client_name', true) ?: get_the_title($post->ID);
    $client_position = get_post_meta($post->ID, 'testimonial_client_position', true);
    $client_company = get_post_meta($post->ID, 'testimonial_client_company', true);
    $rating = get_post_meta($post->ID, 'testimonial_rating', true) ?: 5;
    
    ?>
    <div class="testimonial-meta-fields">
        <p>
            <label for="testimonial_client_name"><strong><?php _e('Client Name:', 'modern-business'); ?></strong></label><br>
            <input type="text" id="testimonial_client_name" name="testimonial_client_name" value="<?php echo esc_attr($client_name); ?>" class="regular-text">
            <p class="description"><?php _e('If left empty, the testimonial title will be used.', 'modern-business'); ?></p>
        </p>
        
        <p>
            <label for="testimonial_client_position"><strong><?php _e('Client Position:', 'modern-business'); ?></strong></label><br>
            <input type="text" id="testimonial_client_position" name="testimonial_client_position" value="<?php echo esc_attr($client_position); ?>" class="regular-text" placeholder="<?php _e('e.g., CEO', 'modern-business'); ?>">
        </p>
        
        <p>
            <label for="testimonial_client_company"><strong><?php _e('Client Company:', 'modern-business'); ?></strong></label><br>
            <input type="text" id="testimonial_client_company" name="testimonial_client_company" value="<?php echo esc_attr($client_company); ?>" class="regular-text" placeholder="<?php _e('e.g., ABC Inc.', 'modern-business'); ?>">
        </p>
        
        <p>
            <label for="testimonial_rating"><strong><?php _e('Rating:', 'modern-business'); ?></strong></label><br>
            <select id="testimonial_rating" name="testimonial_rating">
                <option value="5" <?php selected($rating, 5); ?>><?php _e('5 Stars', 'modern-business'); ?></option>
                <option value="4" <?php selected($rating, 4); ?>><?php _e('4 Stars', 'modern-business'); ?></option>
                <option value="3" <?php selected($rating, 3); ?>><?php _e('3 Stars', 'modern-business'); ?></option>
                <option value="2" <?php selected($rating, 2); ?>><?php _e('2 Stars', 'modern-business'); ?></option>
                <option value="1" <?php selected($rating, 1); ?>><?php _e('1 Star', 'modern-business'); ?></option>
            </select>
        </p>
    </div>
    <?php
}

/**
 * Save meta box data
 */
function modern_business_save_meta_box_data($post_id) {
    // Check if our nonce is set for each post type
    if (isset($_POST['modern_business_service_meta_box_nonce'])) {
        // Verify the nonce
        if (!wp_verify_nonce($_POST['modern_business_service_meta_box_nonce'], 'modern_business_service_meta_box')) {
            return;
        }
        
        // Update service fields
        if (isset($_POST['service_icon'])) {
            update_post_meta($post_id, 'service_icon', sanitize_text_field($_POST['service_icon']));
        }
        
        if (isset($_POST['service_icon_type'])) {
            update_post_meta($post_id, 'service_icon_type', sanitize_text_field($_POST['service_icon_type']));
        }
        
        if (isset($_POST['service_image_id'])) {
            update_post_meta($post_id, 'service_image_id', absint($_POST['service_image_id']));
        }
    }
    
    if (isset($_POST['modern_business_portfolio_meta_box_nonce'])) {
        // Verify the nonce
        if (!wp_verify_nonce($_POST['modern_business_portfolio_meta_box_nonce'], 'modern_business_portfolio_meta_box')) {
            return;
        }
        
        // Update portfolio fields
        if (isset($_POST['portfolio_client'])) {
            update_post_meta($post_id, 'portfolio_client', sanitize_text_field($_POST['portfolio_client']));
        }
        
        if (isset($_POST['portfolio_date'])) {
            update_post_meta($post_id, 'portfolio_date', sanitize_text_field($_POST['portfolio_date']));
        }
        
        if (isset($_POST['portfolio_url'])) {
            update_post_meta($post_id, 'portfolio_url', esc_url_raw($_POST['portfolio_url']));
        }
        
        if (isset($_POST['portfolio_gallery'])) {
            update_post_meta($post_id, 'portfolio_gallery', sanitize_text_field($_POST['portfolio_gallery']));
        }
    }
    
    if (isset($_POST['modern_business_team_meta_box_nonce'])) {
        // Verify the nonce
        if (!wp_verify_nonce($_POST['modern_business_team_meta_box_nonce'], 'modern_business_team_meta_box')) {
            return;
        }
        
        // Update team fields
        if (isset($_POST['team_position'])) {
            update_post_meta($post_id, 'team_position', sanitize_text_field($_POST['team_position']));
        }
        
        if (isset($_POST['team_email'])) {
            update_post_meta($post_id, 'team_email', sanitize_email($_POST['team_email']));
        }
        
        if (isset($_POST['team_phone'])) {
            update_post_meta($post_id, 'team_phone', sanitize_text_field($_POST['team_phone']));
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
    }
    
    if (isset($_POST['modern_business_testimonial_meta_box_nonce'])) {
        // Verify the nonce
        if (!wp_verify_nonce($_POST['modern_business_testimonial_meta_box_nonce'], 'modern_business_testimonial_meta_box')) {
            return;
        }
        
        // Update testimonial fields
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
            update_post_meta($post_id, 'testimonial_rating', intval($_POST['testimonial_rating']));
        }
    }
}
add_action('save_post', 'modern_business_save_meta_box_data');