<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Modern_Business
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function modern_business_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'modern_business_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function modern_business_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'modern_business_pingback_header');

/**
 * Limit excerpt length
 */
function modern_business_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'modern_business_excerpt_length');

/**
 * Change excerpt more string
 */
function modern_business_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'modern_business_excerpt_more');

/**
 * Custom Walker for Nav Menu
 */
class Modern_Business_Menu_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;
        
        $active_class = '';
        if (in_array('current-menu-item', $item->classes)) {
            $active_class = ' active';
        }

        $output .= "<li class='" . implode(" ", $item->classes) . $active_class . "'>";
        
        $output .= '<a href="' . $permalink . '">';
        $output .= $title;
        $output .= '</a>';
    }
}

/**
 * Get thumbnail URL by size
 */
function modern_business_get_thumbnail_url($post_id = null, $size = 'full') {
    if (null === $post_id) {
        $post_id = get_the_ID();
    }
    
    if (has_post_thumbnail($post_id)) {
        $thumb_id = get_post_thumbnail_id($post_id);
        $thumb_url_array = wp_get_attachment_image_src($thumb_id, $size, true);
        return $thumb_url_array[0];
    }
    
    return '';
}

/**
 * Print SVG icons
 */
function modern_business_get_icon($icon) {
    switch ($icon) {
        case 'facebook':
            return '<i class="fab fa-facebook-f"></i>';
        case 'twitter':
            return '<i class="fab fa-twitter"></i>';
        case 'instagram':
            return '<i class="fab fa-instagram"></i>';
        case 'linkedin':
            return '<i class="fab fa-linkedin-in"></i>';
        case 'youtube':
            return '<i class="fab fa-youtube"></i>';
        case 'phone':
            return '<i class="fas fa-phone-alt"></i>';
        case 'email':
            return '<i class="far fa-envelope"></i>';
        case 'address':
            return '<i class="fas fa-map-marker-alt"></i>';
        case 'arrow-right':
            return '<i class="fas fa-arrow-right"></i>';
        case 'arrow-left':
            return '<i class="fas fa-arrow-left"></i>';
        default:
            return '';
    }
}

/**
 * Get related posts
 */
function modern_business_get_related_posts($post_id, $related_count, $args = array()) {
    $args = wp_parse_args($args, array(
        'orderby' => 'rand',
        'return'  => 'query',
    ));

    $related_args = array(
        'post_type'      => get_post_type($post_id),
        'posts_per_page' => $related_count,
        'post_status'    => 'publish',
        'post__not_in'   => array($post_id),
        'orderby'        => $args['orderby'],
    );

    // Get by categories
    $categories = get_the_category($post_id);
    if ($categories) {
        $category_ids = array();
        foreach($categories as $category) {
            $category_ids[] = $category->term_id;
        }

        $related_args['category__in'] = $category_ids;
    }

    // Get by tags
    $tags = get_the_tags($post_id);
    if ($tags) {
        $tag_ids = array();
        foreach($tags as $tag) {
            $tag_ids[] = $tag->term_id;
        }

        $related_args['tag__in'] = $tag_ids;
    }

    if ($args['return'] == 'query') {
        return new WP_Query($related_args);
    } else {
        return $related_args;
    }
}