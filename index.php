<?php
/**
 * The main template file
 *
 * @package Modern_Business
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="page-header">
        <div class="container">
            <h1 class="page-title">
                <?php
                if (is_home() && !is_front_page()) {
                    single_post_title();
                } elseif (is_archive()) {
                    the_archive_title();
                } elseif (is_search()) {
                    /* translators: %s: search query. */
                    printf(esc_html__('Search Results for: %s', 'modern-business'), '<span>' . get_search_query() . '</span>');
                } else {
                    esc_html_e('Blog', 'modern-business');
                }
                ?>
            </h1>
            
            <?php
            if (is_archive()) {
                the_archive_description('<div class="archive-description">', '</div>');
            }
            ?>
        </div>
    </div>

    <div class="container">
        <div class="content-area">
            <div class="main-content">
                <?php
                if (have_posts()) :
                    
                    echo '<div class="blog-grid columns-3">';
                    
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', get_post_type());

                    endwhile;
                    
                    echo '</div>';

                    modern_business_pagination();

                else :

                    get_template_part('template-parts/content', 'none');

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
</main><!-- #main -->

<?php
get_footer();