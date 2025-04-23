<?php
/**
 * The template for displaying all pages
 *
 * @package Modern_Business
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        
        // Get the featured image if it exists
        if (has_post_thumbnail()) :
            $featured_img_url = modern_business_get_thumbnail_url(get_the_ID(), 'full');
        ?>
            <div class="page-header with-bg" style="background-image: url('<?php echo esc_url($featured_img_url); ?>')">
                <div class="container">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </div>
            </div>
        <?php else : ?>
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </div>
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="content-area">
                <div class="main-content">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <?php
                            the_content();

                            wp_link_pages(
                                array(
                                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'modern-business'),
                                    'after'  => '</div>',
                                )
                            );
                            ?>
                        </div><!-- .entry-content -->

                        <?php if (get_edit_post_link()) : ?>
                            <footer class="entry-footer">
                                <?php
                                edit_post_link(
                                    sprintf(
                                        wp_kses(
                                            /* translators: %s: Name of current post. Only visible to screen readers */
                                            __('Edit <span class="screen-reader-text">%s</span>', 'modern-business'),
                                            array(
                                                'span' => array(
                                                    'class' => array(),
                                                ),
                                            )
                                        ),
                                        wp_kses_post(get_the_title())
                                    ),
                                    '<span class="edit-link">',
                                    '</span>'
                                );
                                ?>
                            </footer><!-- .entry-footer -->
                        <?php endif; ?>
                    </article><!-- #post-<?php the_ID(); ?> -->

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
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