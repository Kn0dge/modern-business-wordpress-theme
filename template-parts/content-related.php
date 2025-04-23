<?php
/**
 * Template part for displaying related posts
 *
 * @package Modern_Business
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-card related-post'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="blog-img-container">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium', array('class' => 'blog-img')); ?>
            </a>
        </div>
    <?php endif; ?>
    
    <div class="blog-content">
        <h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        
        <div class="blog-meta">
            <span><?php modern_business_posted_on(); ?></span>
        </div>
        
        <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm">
            <?php esc_html_e('Read More', 'modern-business'); ?>
        </a>
    </div>
</article>