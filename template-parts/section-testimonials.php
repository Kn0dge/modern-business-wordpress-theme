<?php
/**
 * Template part for displaying the testimonials section on the front page
 *
 * @package Modern_Business
 */

if ( ! get_theme_mod( 'enable_testimonials_section', true ) ) {
    return;
}

// Get section settings from theme options
$section_title = get_theme_mod('testimonials_title', __('Testimonials', 'modern-business'));
$section_subtitle = get_theme_mod('testimonials_subtitle', __('What our clients say about us', 'modern-business'));
$testimonials_count = get_theme_mod('testimonials_count', 5);

// Query testimonials
$args = array(
    'post_type' => 'testimonial',
    'posts_per_page' => $testimonials_count,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
);

$testimonials_query = new WP_Query($args);
?>

<section id="testimonials" class="section testimonials-section">
    <div class="container">
        <h2 class="section-title animate-on-scroll"><?php echo esc_html($section_title); ?></h2>
        <p class="section-subtitle animate-on-scroll" style="text-align: <?php echo esc_attr(get_theme_mod('testimonials_text_align', 'center')); ?>;"><?php echo esc_html($section_subtitle); ?></p>
        
        <?php if ($testimonials_query->have_posts()) : ?>
            <div class="testimonials-slider animate-on-scroll">
                <?php while ($testimonials_query->have_posts()) : $testimonials_query->the_post(); 
                    $client_name = get_post_meta(get_the_ID(), 'testimonial_client_name', true);
                    $client_position = get_post_meta(get_the_ID(), 'testimonial_client_position', true);
                    $client_company = get_post_meta(get_the_ID(), 'testimonial_client_company', true);
                    $rating = get_post_meta(get_the_ID(), 'testimonial_rating', true) ?: 5;
                    
                    // If client name is empty, use the post title
                    if (empty($client_name)) {
                        $client_name = get_the_title();
                    }
                    
                    // Format the position and company if both exist
                    $position_text = '';
                    if ($client_position && $client_company) {
                        $position_text = $client_position . ', ' . $client_company;
                    } elseif ($client_position) {
                        $position_text = $client_position;
                    } elseif ($client_company) {
                        $position_text = $client_company;
                    }
                ?>
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <?php if ($rating > 0) : ?>
                                <div class="testimonial-rating">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <i class="fas fa-star<?php echo $i <= $rating ? '' : '-o'; ?>"></i>
                                    <?php endfor; ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php the_content(); ?>
                        </div>
                        <div class="testimonial-author">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo esc_url(modern_business_get_thumbnail_url(get_the_ID(), 'thumbnail')); ?>" alt="<?php echo esc_attr($client_name); ?>" class="author-img">
                            <?php endif; ?>
                            <div class="author-info">
                                <h4><?php echo esc_html($client_name); ?></h4>
                                <?php if ($position_text) : ?>
                                    <p><?php echo esc_html($position_text); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="text-center"><?php esc_html_e('No testimonials found.', 'modern-business'); ?></p>
        <?php endif; ?>
    </div>
</section>
