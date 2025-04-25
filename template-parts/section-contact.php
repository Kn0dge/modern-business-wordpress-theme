<?php
/**
 * Template part for displaying the contact section on the front page
 *
 * @package Modern_Business
 */

if ( ! get_theme_mod( 'enable_contact_section', true ) ) {
    return;
}

// Get section settings from theme options
$section_title = get_theme_mod('contact_title', __('Contact Us', 'modern-business'));
$section_subtitle = get_theme_mod('contact_subtitle', __('Get in touch with us', 'modern-business'));
$contact_form_shortcode = get_theme_mod('contact_form_shortcode', '');

// Get contact info from customizer
$phone = get_theme_mod('contact_phone', '(123) 456-7890');
$email = get_theme_mod('contact_email', 'info@example.com');
$address = get_theme_mod('contact_address', '123 Main St, City, Country');
?>

<section id="contact" class="section contact-section">
    <div class="container">
        <h2 class="section-title animate-on-scroll"><?php echo esc_html($section_title); ?></h2>
        <p class="section-subtitle animate-on-scroll"><?php echo esc_html($section_subtitle); ?></p>
        
        <div class="contact-container animate-on-scroll">
            <div class="contact-info">
                <h3 class="contact-info-title"><?php esc_html_e('Get In Touch', 'modern-business'); ?></h3>
                <p><?php esc_html_e('Feel free to contact us using the information below or send us a message using the form. We\'ll get back to you as soon as possible.', 'modern-business'); ?></p>
                
                <div class="contact-details">
                    <?php if ($phone) : ?>
                        <div class="contact-detail">
                            <div class="contact-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h4><?php esc_html_e('Phone', 'modern-business'); ?></h4>
                                <p><?php echo esc_html($phone); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($email) : ?>
                        <div class="contact-detail">
                            <div class="contact-icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div>
                                <h4><?php esc_html_e('Email', 'modern-business'); ?></h4>
                                <p><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($address) : ?>
                        <div class="contact-detail">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4><?php esc_html_e('Address', 'modern-business'); ?></h4>
                                <p><?php echo esc_html($address); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="contact-form">
                <?php
                if (!empty($contact_form_shortcode)) {
                    echo do_shortcode($contact_form_shortcode);
                } else {
                    // Fallback form if no shortcode is provided
                    ?>
                    <form action="#" method="post" class="contact-form-inner">
                        <div class="form-group">
                            <label for="name" class="form-label"><?php esc_html_e('Your Name', 'modern-business'); ?></label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="form-label"><?php esc_html_e('Your Email', 'modern-business'); ?></label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject" class="form-label"><?php esc_html_e('Subject', 'modern-business'); ?></label>
                            <input type="text" id="subject" name="subject" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="message" class="form-label"><?php esc_html_e('Your Message', 'modern-business'); ?></label>
                            <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary"><?php esc_html_e('Send Message', 'modern-business'); ?></button>
                    </form>
                    <p class="form-note"><?php esc_html_e('Note: This is a placeholder form. To make it functional, please install a form plugin and add the shortcode in Theme Options.', 'modern-business'); ?></p>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
