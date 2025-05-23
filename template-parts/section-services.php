<?php
/**
 * Template part for displaying the services section on the front page
 *
 * @package Modern_Business
 */

if ( ! get_theme_mod( 'enable_services_section', true ) ) {
    return;
}

// Get section settings from theme options
$section_title = get_theme_mod('services_title', __('Our Services', 'modern-business'));
$section_subtitle = get_theme_mod('services_subtitle', __('We offer a wide range of services to meet your needs', 'modern-business'));

$services_count = get_theme_mod('services_count', 6);

// Query services
$args = array(
    'post_type' => 'service',
    'posts_per_page' => $services_count,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
);

$services_query = new WP_Query($args);
?>

<section id="services" class="section services-section">
    <div class="container">
        <h2 class="section-title animate-on-scroll"><?php echo esc_html($section_title); ?></h2>
        <p class="section-subtitle animate-on-scroll" style="text-align: <?php echo esc_attr(get_theme_mod('services_text_align', 'center')); ?>;"><?php echo esc_html($section_subtitle); ?></p>
        
        <?php if ($services_query->have_posts()) : ?>
            <div class="services-grid animate-on-scroll">
                <?php while ($services_query->have_posts()) : $services_query->the_post(); 
                    $service_icon = get_post_meta(get_the_ID(), 'service_icon', true);
                    $service_icon_type = get_post_meta(get_the_ID(), 'service_icon_type', true) ?: 'fontawesome';
                ?>
                    <div class="service-card">
                        <?php if ($service_icon_type === 'fontawesome' && $service_icon) : ?>
                            <div class="service-icon">
                                <i class="<?php echo esc_attr($service_icon); ?>"></i>
                            </div>
                        <?php elseif ($service_icon_type === 'image') : 
                            $service_image_id = get_post_meta(get_the_ID(), 'service_image_id', true);
                            if ($service_image_id) :
                                $image_url = wp_get_attachment_image_url($service_image_id, 'thumbnail');
                            ?>
                                <div class="service-icon">
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>">
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        
                        <h3 class="service-title"><?php the_title(); ?></h3>
                        <div class="service-excerpt"><?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm"><?php esc_html_e('Learn More', 'modern-business'); ?></a>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="text-center"><?php esc_html_e('No services found.', 'modern-business'); ?></p>
        <?php endif; ?>
    </div>
</section>
