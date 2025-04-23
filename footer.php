<?php
/**
 * The template for displaying the footer
 *
 * @package Modern_Business
 */

?>

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php else : ?>
                        <h3><?php esc_html_e('About Us', 'modern-business'); ?></h3>
                        <p><?php esc_html_e('We are a modern business theme company focused on providing excellent services and solutions for our clients.', 'modern-business'); ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="footer-column">
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else : ?>
                        <h3><?php esc_html_e('Quick Links', 'modern-business'); ?></h3>
                        <ul class="footer-links">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'modern-business'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php esc_html_e('About', 'modern-business'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/services')); ?>"><?php esc_html_e('Services', 'modern-business'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/portfolio')); ?>"><?php esc_html_e('Portfolio', 'modern-business'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><?php esc_html_e('Blog', 'modern-business'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact', 'modern-business'); ?></a></li>
                        </ul>
                    <?php endif; ?>
                </div>
                
                <div class="footer-column">
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php else : ?>
                        <h3><?php esc_html_e('Contact Us', 'modern-business'); ?></h3>
                        <ul class="footer-links">
                            <?php if ($phone = get_theme_mod('contact_phone', '(123) 456-7890')) : ?>
                                <li><?php echo modern_business_get_icon('phone'); ?> <?php echo esc_html($phone); ?></li>
                            <?php endif; ?>
                            
                            <?php if ($email = get_theme_mod('contact_email', 'info@example.com')) : ?>
                                <li><?php echo modern_business_get_icon('email'); ?> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></li>
                            <?php endif; ?>
                            
                            <?php if ($address = get_theme_mod('contact_address', '123 Main St, City, Country')) : ?>
                                <li><?php echo modern_business_get_icon('address'); ?> <?php echo esc_html($address); ?></li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                
                <div class="footer-column">
                    <?php if (is_active_sidebar('footer-4')) : ?>
                        <?php dynamic_sidebar('footer-4'); ?>
                    <?php else : ?>
                        <h3><?php esc_html_e('Newsletter', 'modern-business'); ?></h3>
                        <p><?php esc_html_e('Subscribe to our newsletter to receive updates and news.', 'modern-business'); ?></p>
                        <div class="footer-subscribe">
                            <form action="#" method="post">
                                <input type="email" name="email" placeholder="<?php esc_attr_e('Your Email', 'modern-business'); ?>" required>
                                <button type="submit"><?php echo modern_business_get_icon('arrow-right'); ?></button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div><!-- .footer-content -->
            
            <div class="footer-bottom">
                <div class="footer-social">
                    <?php if ($facebook = get_theme_mod('social_facebook', '#')) : ?>
                        <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener"><?php echo modern_business_get_icon('facebook'); ?></a>
                    <?php endif; ?>
                    
                    <?php if ($twitter = get_theme_mod('social_twitter', '#')) : ?>
                        <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener"><?php echo modern_business_get_icon('twitter'); ?></a>
                    <?php endif; ?>
                    
                    <?php if ($instagram = get_theme_mod('social_instagram', '#')) : ?>
                        <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener"><?php echo modern_business_get_icon('instagram'); ?></a>
                    <?php endif; ?>
                    
                    <?php if ($linkedin = get_theme_mod('social_linkedin', '#')) : ?>
                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener"><?php echo modern_business_get_icon('linkedin'); ?></a>
                    <?php endif; ?>
                    
                    <?php if ($youtube = get_theme_mod('social_youtube', '')) : ?>
                        <a href="<?php echo esc_url($youtube); ?>" target="_blank" rel="noopener"><?php echo modern_business_get_icon('youtube'); ?></a>
                    <?php endif; ?>
                </div>
                
                <div class="copyright">
                    <?php
                    $copyright = get_theme_mod('footer_copyright', '© ' . date('Y') . ' ' . get_bloginfo('name') . '. ' . __('All Rights Reserved.', 'modern-business'));
                    echo wp_kses_post($copyright);
                    ?>
                </div>
            </div><!-- .footer-bottom -->
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>