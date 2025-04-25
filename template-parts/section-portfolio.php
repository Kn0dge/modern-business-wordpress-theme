<?php
/**
 * Template part for displaying the portfolio section on the front page
 *
 * @package Modern_Business
 */

if ( ! get_theme_mod( 'enable_portfolio_section', true ) ) {
    return;
}

// Get section settings from theme options
$section_title = get_theme_mod('portfolio_title', __('Our Portfolio', 'modern-business'));
$section_subtitle = get_theme_mod('portfolio_subtitle', __('Check out our latest work', 'modern-business'));
$portfolio_count = get_theme_mod('portfolio_count', 6);

// Get categories for filtering
$categories = get_terms(array(
    'taxonomy' => 'portfolio_category',
    'hide_empty' => true,
));

// Query portfolio items
$args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => $portfolio_count,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
);

$portfolio_query = new WP_Query($args);
?>

<section id="portfolio" class="section portfolio-section">
    <div class="container">
        <h2 class="section-title animate-on-scroll"><?php echo esc_html($section_title); ?></h2>
        <p class="section-subtitle animate-on-scroll"><?php echo esc_html($section_subtitle); ?></p>
        
        <?php if (!empty($categories) && !is_wp_error($categories)) : ?>
            <div class="portfolio-filter animate-on-scroll">
                <button class="filter-btn active" data-filter="*"><?php esc_html_e('All', 'modern-business'); ?></button>
                <?php foreach ($categories as $category) : ?>
                    <button class="filter-btn" data-filter=".<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?></button>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <?php if ($portfolio_query->have_posts()) : ?>
            <div class="portfolio-grid animate-on-scroll">
                <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); 
                    // Get categories for filtering
                    $portfolio_cats = get_the_terms(get_the_ID(), 'portfolio_category');
                    $cat_classes = '';
                    $cat_names = array();
                    
                    if (!empty($portfolio_cats) && !is_wp_error($portfolio_cats)) {
                        foreach ($portfolio_cats as $cat) {
                            $cat_classes .= ' ' . $cat->slug;
                            $cat_names[] = $cat->name;
                        }
                    }
                ?>
                    <div class="portfolio-item<?php echo esc_attr($cat_classes); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo esc_url(modern_business_get_thumbnail_url(get_the_ID(), 'medium_large')); ?>" alt="<?php the_title_attribute(); ?>" class="portfolio-img">
                        <?php endif; ?>
                        <div class="portfolio-overlay">
                            <h3 class="portfolio-title"><?php the_title(); ?></h3>
                            <?php if (!empty($cat_names)) : ?>
                                <div class="portfolio-category"><?php echo esc_html(implode(', ', $cat_names)); ?></div>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>" class="portfolio-link">
                                <i class="fas fa-link"></i>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="text-center"><?php esc_html_e('No portfolio items found.', 'modern-business'); ?></p>
        <?php endif; ?>
    </div>
</section>
