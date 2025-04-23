<?php
/**
 * The template for displaying all single posts
 *
 * @package Modern_Business
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        
        // Get featured image URL
        $featured_img_url = modern_business_get_thumbnail_url(get_the_ID(), 'full');
    ?>
        <div class="single-post-header"<?php echo $featured_img_url ? ' style="background-image: url(' . esc_url($featured_img_url) . ')"' : ''; ?>>
            <div class="container">
                <div class="post-header-content">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    
                    <div class="entry-meta">
                        <?php
                        modern_business_posted_on();
                        modern_business_posted_by();
                        ?>
                    </div><!-- .entry-meta -->
                </div>
            </div>
        </div>

        <div class="container">
            <div class="content-area">
                <div class="main-content">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <?php
                            the_content(
                                sprintf(
                                    wp_kses(
                                        /* translators: %s: Name of current post. Only visible to screen readers */
                                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'modern-business'),
                                        array(
                                            'span' => array(
                                                'class' => array(),
                                            ),
                                        )
                                    ),
                                    wp_kses_post(get_the_title())
                                )
                            );

                            wp_link_pages(
                                array(
                                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'modern-business'),
                                    'after'  => '</div>',
                                )
                            );
                            ?>
                        </div><!-- .entry-content -->

                        <footer class="entry-footer">
                            <?php modern_business_entry_footer(); ?>
                        </footer><!-- .entry-footer -->
                    </article><!-- #post-<?php the_ID(); ?> -->

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    
                    // Get related posts
                    $related_posts = modern_business_get_related_posts(get_the_ID(), 3);
                    
                    if ($related_posts->have_posts()) :
                    ?>
                        <div class="related-posts">
                            <h3 class="related-title"><?php esc_html_e('Related Posts', 'modern-business'); ?></h3>
                            <div class="blog-grid columns-3">
                                <?php
                                while ($related_posts->have_posts()) :
                                    $related_posts->the_post();
                                    get_template_part('template-parts/content', 'related');
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    <?php
                    endif;
                    ?>
                </div><!-- .main-content -->
                
                <?php if (is_active_sidebar('sidebar-1')) : ?>
                    <aside id="secondary" class="widget-area">
                        <?php dynamic_sidebar('sidebar-1'); ?>
                    </aside><!-- #secondary -->
                <?php endif; ?>
            </div><!-- .content-area -->
        </div>
    <?php
    endwhile; // End of the loop.
    ?>
</main><!-- #main -->

<?php
get_footer();