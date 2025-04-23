<?php
/**
 * Custom template tags for this theme
 *
 * @package Modern_Business
 */

if (!function_exists('modern_business_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function modern_business_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );

        echo '<span class="posted-on"><i class="far fa-calendar-alt"></i> ' . $time_string . '</span>';
    }
endif;

if (!function_exists('modern_business_posted_by')) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function modern_business_posted_by() {
        echo '<span class="byline"><i class="far fa-user"></i> ' . esc_html__('By ', 'modern-business') . '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>';
    }
endif;

if (!function_exists('modern_business_entry_footer')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function modern_business_entry_footer() {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'modern-business'));
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<span class="cat-links"><i class="fas fa-folder-open"></i> ' . esc_html__('Categories: %1$s', 'modern-business') . '</span>', $categories_list);
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html__(', ', 'modern-business'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links"><i class="fas fa-tags"></i> ' . esc_html__('Tags: %1$s', 'modern-business') . '</span>', $tags_list);
            }
        }

        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link"><i class="far fa-comment"></i> ';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: post title */
                        __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'modern-business'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                )
            );
            echo '</span>';
        }

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
            '<span class="edit-link"><i class="fas fa-edit"></i> ',
            '</span>'
        );
    }
endif;

if (!function_exists('modern_business_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function modern_business_post_thumbnail() {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
            </div><!-- .post-thumbnail -->
        <?php else : ?>
            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail(
                    'medium_large',
                    array(
                        'class' => 'img-fluid',
                        'alt' => the_title_attribute(
                            array(
                                'echo' => false,
                            )
                        ),
                    )
                );
                ?>
            </a>
            <?php
        endif;
    }
endif;

if (!function_exists('modern_business_comment_count')) :
    /**
     * Display the comment count with appropriate icon
     */
    function modern_business_comment_count() {
        if (!post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-count"><i class="far fa-comments"></i> ';
            comments_number('0', '1', '%');
            echo '</span>';
        }
    }
endif;

/**
 * Displays the navigation to next/previous pages when applicable.
 */
if (!function_exists('modern_business_pagination')) :
    function modern_business_pagination() {
        the_posts_pagination(
            array(
                'mid_size' => 2,
                'prev_text' => '<i class="fas fa-arrow-left"></i> ' . esc_html__('Previous', 'modern-business'),
                'next_text' => esc_html__('Next', 'modern-business') . ' <i class="fas fa-arrow-right"></i>',
                'screen_reader_text' => esc_html__('Posts navigation', 'modern-business'),
            )
        );
    }
endif;