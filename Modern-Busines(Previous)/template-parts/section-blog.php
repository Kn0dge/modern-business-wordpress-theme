<?php
/**
 * Template part for displaying the blog section on the front page
 *
 * @package Modern_Business
 */

// Get section settings from theme mods
$section_title = get_theme_mod('blog_title', __('Latest Blog Posts', 'modern-business'));
$section_subtitle = get_theme_mod('blog_subtitle', __('Read our latest articles and news', 'modern-business'));
$blog_count = get_theme_mod('blog_count', 3);

// Query blog posts
$args = array(
    'post_type' => 'post',
    'posts_per_page' => $blog_count,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
);

$blog_query = new WP_Query($args);
?>

<?php
$blog_text_align = get_theme_mod('blog_text_align', 'center');
$blog_padding_top = get_theme_mod('blog_padding_top', 50);
$blog_padding_bottom = get_theme_mod('blog_padding_bottom', 50);
$blog_margin_top = get_theme_mod('blog_margin_top', 0);
$blog_margin_bottom = get_theme_mod('blog_margin_bottom', 0);
$blog_font_size = get_theme_mod('blog_font_size', 18);

$blog_style = sprintf(
    'background-color: %s; color: %s; text-align: %s; padding-top: %dpx; padding-bottom: %dpx; margin-top: %dpx; margin-bottom: %dpx; font-size: %dpx;',
    esc_attr(get_theme_mod('blog_bg_color', '#ffffff')),
    esc_attr(get_theme_mod('blog_text_color', '#000000')),
    esc_attr($blog_text_align),
    intval($blog_padding_top),
    intval($blog_padding_bottom),
    intval($blog_margin_top),
    intval($blog_margin_bottom),
    intval($blog_font_size)
);
?>
<section id="blog" class="section blog-section" style="<?php echo $blog_style; ?>">
    <div class="container">
        <h2 class="section-title animate-on-scroll"><?php echo esc_html($section_title); ?></h2>
        <p class="section-subtitle animate-on-scroll"><?php echo esc_html($section_subtitle); ?></p>
        
        <?php if ($blog_query->have_posts()) : ?>
            <div class="blog-grid animate-on-scroll">
                <?php while ($blog_query->have_posts()) : $blog_query->the_post(); 
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
                            
                            <div class="blog-meta">
                                <span><?php modern_business_posted_on(); ?></span>
                                <span><?php modern_business_comment_count(); ?></span>
                            </div>
                            
                            <div class="blog-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline">
                                <?php esc_html_e('Read More', 'modern-business'); ?>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            
            <div class="text-center mt-5 animate-on-scroll">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-primary">
                    <?php esc_html_e('View All Posts', 'modern-business'); ?>
                </a>
            </div>
            
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="text-center"><?php esc_html_e('No blog posts found.', 'modern-business'); ?></p>
        <?php endif; ?>
    </div>
</section>
