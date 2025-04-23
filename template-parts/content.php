<?php
/**
 * Template part for displaying posts
 *
 * @package Modern_Business
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="blog-img-container">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium_large', array('class' => 'blog-img')); ?>
            </a>
        </div>
    <?php endif; ?>
    
    <div class="blog-content">
        <?php
        $categories = get_the_category();
        if (!empty($categories)) :
            ?>
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
</article><!-- #post-<?php the_ID(); ?> -->