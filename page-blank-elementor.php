<?php
/**
 * Template Name: Blank Elementor
 * Description: A blank page template for Elementor full-width canvas.
 *
 * @package Modern_Business
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
