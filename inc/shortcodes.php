<?php
/**
 * Custom shortcodes for Modern Business Theme
 *
 * @package Modern_Business
 */

/**
 * Shortcode for Services
 */
function modern_business_services_shortcode($atts) {
    // Merge attributes with defaults
    $atts = shortcode_atts(
        array(
            'count' => 3,
            'category' => '',
            'columns' => 3,
        ),
        $atts,
        'services'
    );

    $count = intval($atts['count']);
    $columns = intval($atts['columns']);
    
    if ($columns < 1 || $columns > 4) {
        $columns = 3;
    }
    
    $args = array(
        'post_type' => 'service',
        'posts_per_page' => $count,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    // Handle category if specified
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => explode(',', $atts['category']),
            ),
        );
    }
    
    $services_query = new WP_Query($args);
    
    if (!$services_query->have_posts()) {
        return '<p>' . __('No services found.', 'modern-business') . '</p>';
    }
    
    ob_start();
    ?>
    <div class="services-grid columns-<?php echo esc_attr($columns); ?>">
        <?php while ($services_query->have_posts()) : $services_query->the_post(); ?>
            <div class="service-card">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="service-image">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                <?php endif; ?>
                <div class="service-content">
                    <h3 class="service-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div class="service-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="btn btn-outline"><?php _e('Learn More', 'modern-business'); ?></a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php
    wp_reset_postdata();
    
    return ob_get_clean();
}
add_shortcode('services', 'modern_business_services_shortcode');

/**
 * Shortcode for Portfolio
 */
function modern_business_portfolio_shortcode($atts) {
    // Merge attributes with defaults
    $atts = shortcode_atts(
        array(
            'count' => 6,
            'category' => '',
            'columns' => 3,
            'filter' => 'true',
        ),
        $atts,
        'portfolio'
    );

    $count = intval($atts['count']);
    $columns = intval($atts['columns']);
    $show_filter = filter_var($atts['filter'], FILTER_VALIDATE_BOOLEAN);
    
    if ($columns < 1 || $columns > 4) {
        $columns = 3;
    }
    
    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => $count,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    // Handle category if specified
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'slug',
                'terms' => explode(',', $atts['category']),
            ),
        );
    }
    
    $portfolio_query = new WP_Query($args);
    
    if (!$portfolio_query->have_posts()) {
        return '<p>' . __('No portfolio items found.', 'modern-business') . '</p>';
    }
    
    ob_start();
    
    // Show filter buttons if enabled
    if ($show_filter) {
        // Get all portfolio categories
        $categories = array();
        
        if (empty($atts['category'])) {
            $terms = get_terms(array(
                'taxonomy' => 'portfolio_category',
                'hide_empty' => true,
            ));
            
            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    $categories[$term->slug] = $term->name;
                }
            }
        } else {
            // Use only specified categories
            $specified_terms = explode(',', $atts['category']);
            foreach ($specified_terms as $term_slug) {
                $term = get_term_by('slug', trim($term_slug), 'portfolio_category');
                if ($term && !is_wp_error($term)) {
                    $categories[$term->slug] = $term->name;
                }
            }
        }
        
        if (!empty($categories)) {
            ?>
            <div class="portfolio-filter">
                <button class="filter-btn active" data-filter="*"><?php _e('All', 'modern-business'); ?></button>
                <?php foreach ($categories as $slug => $name) : ?>
                    <button class="filter-btn" data-filter=".<?php echo esc_attr($slug); ?>"><?php echo esc_html($name); ?></button>
                <?php endforeach; ?>
            </div>
            <?php
        }
    }
    ?>
    
    <div class="portfolio-grid columns-<?php echo esc_attr($columns); ?>">
        <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); 
            // Get category classes for filtering
            $categories = get_the_terms(get_the_ID(), 'portfolio_category');
            $category_classes = '';
            $category_names = array();
            
            if (!empty($categories) && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                    $category_classes .= ' ' . $category->slug;
                    $category_names[] = $category->name;
                }
            }
        ?>
            <div class="portfolio-item<?php echo esc_attr($category_classes); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo esc_url(modern_business_get_thumbnail_url(get_the_ID(), 'medium_large')); ?>" alt="<?php the_title_attribute(); ?>" class="portfolio-img">
                <?php endif; ?>
                <div class="portfolio-overlay">
                    <h3 class="portfolio-title"><?php the_title(); ?></h3>
                    <?php if (!empty($category_names)) : ?>
                        <div class="portfolio-category"><?php echo esc_html(implode(', ', $category_names)); ?></div>
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>" class="portfolio-link">
                        <span class="screen-reader-text"><?php _e('View Project', 'modern-business'); ?></span>
                        <i class="fas fa-link"></i>
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php
    wp_reset_postdata();
    
    return ob_get_clean();
}
add_shortcode('portfolio', 'modern_business_portfolio_shortcode');

/**
 * Shortcode for Team Members
 */
function modern_business_team_shortcode($atts) {
    // Merge attributes with defaults
    $atts = shortcode_atts(
        array(
            'count' => 4,
            'columns' => 4,
        ),
        $atts,
        'team'
    );

    $count = intval($atts['count']);
    $columns = intval($atts['columns']);
    
    if ($columns < 1 || $columns > 4) {
        $columns = 4;
    }
    
    $args = array(
        'post_type' => 'team',
        'posts_per_page' => $count,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC',
    );
    
    $team_query = new WP_Query($args);
    
    if (!$team_query->have_posts()) {
        return '<p>' . __('No team members found.', 'modern-business') . '</p>';
    }
    
    ob_start();
    ?>
    <div class="team-grid columns-<?php echo esc_attr($columns); ?>">
        <?php while ($team_query->have_posts()) : $team_query->the_post(); 
            $position = get_post_meta(get_the_ID(), 'team_position', true);
            $facebook = get_post_meta(get_the_ID(), 'team_facebook', true);
            $twitter = get_post_meta(get_the_ID(), 'team_twitter', true);
            $linkedin = get_post_meta(get_the_ID(), 'team_linkedin', true);
            $instagram = get_post_meta(get_the_ID(), 'team_instagram', true);
        ?>
            <div class="team-member">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="team-img-container">
                        <img src="<?php echo esc_url(modern_business_get_thumbnail_url(get_the_ID(), 'medium_large')); ?>" alt="<?php the_title_attribute(); ?>" class="team-img">
                    </div>
                <?php endif; ?>
                <div class="team-info">
                    <h3 class="team-name"><?php the_title(); ?></h3>
                    <?php if ($position) : ?>
                        <div class="team-position"><?php echo esc_html($position); ?></div>
                    <?php endif; ?>
                    <div class="team-social">
                        <?php if ($facebook) : ?>
                            <a href="<?php echo esc_url($facebook); ?>" class="social-link" target="_blank" rel="noopener">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        <?php endif; ?>
                        <?php if ($twitter) : ?>
                            <a href="<?php echo esc_url($twitter); ?>" class="social-link" target="_blank" rel="noopener">
                                <i class="fab fa-twitter"></i>
                            </a>
                        <?php endif; ?>
                        <?php if ($linkedin) : ?>
                            <a href="<?php echo esc_url($linkedin); ?>" class="social-link" target="_blank" rel="noopener">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        <?php endif; ?>
                        <?php if ($instagram) : ?>
                            <a href="<?php echo esc_url($instagram); ?>" class="social-link" target="_blank" rel="noopener">
                                <i class="fab fa-instagram"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php
    wp_reset_postdata();
    
    return ob_get_clean();
}
add_shortcode('team', 'modern_business_team_shortcode');

/**
 * Shortcode for Testimonials
 */
function modern_business_testimonials_shortcode($atts) {
    // Merge attributes with defaults
    $atts = shortcode_atts(
        array(
            'count' => 5,
            'layout' => 'slider',
        ),
        $atts,
        'testimonials'
    );

    $count = intval($atts['count']);
    $layout = $atts['layout'];
    
    $args = array(
        'post_type' => 'testimonial',
        'posts_per_page' => $count,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    $testimonials_query = new WP_Query($args);
    
    if (!$testimonials_query->have_posts()) {
        return '<p>' . __('No testimonials found.', 'modern-business') . '</p>';
    }
    
    ob_start();
    
    if ($layout === 'slider') {
        ?>
        <div class="testimonials-slider">
            <?php while ($testimonials_query->have_posts()) : $testimonials_query->the_post(); 
                $client_name = get_post_meta(get_the_ID(), 'testimonial_client_name', true);
                $client_position = get_post_meta(get_the_ID(), 'testimonial_client_position', true);
            ?>
                <div class="testimonial">
                    <div class="testimonial-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="testimonial-author">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo esc_url(modern_business_get_thumbnail_url(get_the_ID(), 'thumbnail')); ?>" alt="<?php echo esc_attr($client_name); ?>" class="author-img">
                        <?php endif; ?>
                        <div class="author-info">
                            <h4><?php echo esc_html($client_name); ?></h4>
                            <?php if ($client_position) : ?>
                                <p><?php echo esc_html($client_position); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php
    } else {
        ?>
        <div class="testimonials-grid">
            <?php while ($testimonials_query->have_posts()) : $testimonials_query->the_post(); 
                $client_name = get_post_meta(get_the_ID(), 'testimonial_client_name', true);
                $client_position = get_post_meta(get_the_ID(), 'testimonial_client_position', true);
            ?>
                <div class="testimonial">
                    <div class="testimonial-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="testimonial-author">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo esc_url(modern_business_get_thumbnail_url(get_the_ID(), 'thumbnail')); ?>" alt="<?php echo esc_attr($client_name); ?>" class="author-img">
                        <?php endif; ?>
                        <div class="author-info">
                            <h4><?php echo esc_html($client_name); ?></h4>
                            <?php if ($client_position) : ?>
                                <p><?php echo esc_html($client_position); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php
    }
    
    wp_reset_postdata();
    
    return ob_get_clean();
}
add_shortcode('testimonials', 'modern_business_testimonials_shortcode');

/**
 * Shortcode for Call to Action
 */
function modern_business_cta_shortcode($atts) {
    // Merge attributes with defaults
    $atts = shortcode_atts(
        array(
            'title' => __('Ready to Get Started?', 'modern-business'),
            'text' => __('Contact us today to learn more about our services', 'modern-business'),
            'button_text' => __('Contact Us', 'modern-business'),
            'button_url' => '#contact',
            'background' => '',
            'text_color' => '',
            'button_style' => 'primary',
        ),
        $atts,
        'cta'
    );
    
    $style = '';
    if (!empty($atts['background'])) {
        $style .= 'background-color: ' . esc_attr($atts['background']) . ';';
    }
    if (!empty($atts['text_color'])) {
        $style .= 'color: ' . esc_attr($atts['text_color']) . ';';
    }
    
    ob_start();
    ?>
    <div class="cta-section" style="<?php echo esc_attr($style); ?>">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title"><?php echo esc_html($atts['title']); ?></h2>
                <p class="cta-text"><?php echo esc_html($atts['text']); ?></p>
                <a href="<?php echo esc_url($atts['button_url']); ?>" class="btn btn-<?php echo esc_attr($atts['button_style']); ?>">
                    <?php echo esc_html($atts['button_text']); ?>
                </a>
            </div>
        </div>
    </div>
    <?php
    
    return ob_get_clean();
}
add_shortcode('cta', 'modern_business_cta_shortcode');

/**
 * Shortcode for Recent Posts
 */
function modern_business_recent_posts_shortcode($atts) {
    // Merge attributes with defaults
    $atts = shortcode_atts(
        array(
            'count' => 3,
            'columns' => 3,
            'category' => '',
            'show_excerpt' => 'true',
            'show_meta' => 'true',
        ),
        $atts,
        'recent_posts'
    );

    $count = intval($atts['count']);
    $columns = intval($atts['columns']);
    $show_excerpt = filter_var($atts['show_excerpt'], FILTER_VALIDATE_BOOLEAN);
    $show_meta = filter_var($atts['show_meta'], FILTER_VALIDATE_BOOLEAN);
    
    if ($columns < 1 || $columns > 4) {
        $columns = 3;
    }
    
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $count,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    // Handle category if specified
    if (!empty($atts['category'])) {
        $args['category_name'] = $atts['category'];
    }
    
    $posts_query = new WP_Query($args);
    
    if (!$posts_query->have_posts()) {
        return '<p>' . __('No posts found.', 'modern-business') . '</p>';
    }
    
    ob_start();
    ?>
    <div class="blog-grid columns-<?php echo esc_attr($columns); ?>">
        <?php while ($posts_query->have_posts()) : $posts_query->the_post(); 
            $categories = get_the_category();
        ?>
            <div class="blog-card">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="blog-img-container">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo esc_url(modern_business_get_thumbnail_url(get_the_ID(), 'medium_large')); ?>" alt="<?php the_title_attribute(); ?>" class="blog-img">
                        </a>
                    </div>
                <?php endif; ?>
                <div class="blog-content">
                    <?php if (!empty($categories)) : ?>
                        <span class="blog-category"><?php echo esc_html($categories[0]->name); ?></span>
                    <?php endif; ?>
                    
                    <h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    
                    <?php if ($show_meta) : ?>
                        <div class="blog-meta">
                            <span><?php modern_business_posted_on(); ?></span>
                            <span><?php modern_business_comment_count(); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($show_excerpt) : ?>
                        <div class="blog-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php endif; ?>
                    
                    <a href="<?php the_permalink(); ?>" class="btn btn-outline"><?php _e('Read More', 'modern-business'); ?></a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php
    wp_reset_postdata();
    
    return ob_get_clean();
}
add_shortcode('recent_posts', 'modern_business_recent_posts_shortcode');