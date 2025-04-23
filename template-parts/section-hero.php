<?php
/**
 * Template part for displaying the hero section on the front page
 *
 * @package Modern_Business
 */

if ( ! get_theme_mod( 'enable_hero_section', true ) ) {
    return;
}

// Get hero settings from the customizer
$hero_title = get_theme_mod('hero_title', __('We Create Modern & Professional Websites', 'modern-business'));
$hero_subtitle = get_theme_mod('hero_subtitle', __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.', 'modern-business'));
$hero_primary_btn_text = get_theme_mod('hero_primary_btn_text', __('Get Started', 'modern-business'));
$hero_primary_btn_url = get_theme_mod('hero_primary_btn_url', '#');
$hero_secondary_btn_text = get_theme_mod('hero_secondary_btn_text', __('Learn More', 'modern-business'));
$hero_secondary_btn_url = get_theme_mod('hero_secondary_btn_url', '#');

// Hero background image is set via CSS in customizer.php
?>

<section id="hero" class="hero">
    <div class="container">
        <div class="hero-content animate-on-scroll">
            <h1 class="hero-title"><?php echo esc_html($hero_title); ?></h1>
            <p class="hero-subtitle"><?php echo esc_html($hero_subtitle); ?></p>
            
            <div class="hero-buttons">
                <?php if ($hero_primary_btn_text) : ?>
                    <a href="<?php echo esc_url($hero_primary_btn_url); ?>" class="btn btn-primary"><?php echo esc_html($hero_primary_btn_text); ?></a>
                <?php endif; ?>
                
                <?php if ($hero_secondary_btn_text) : ?>
                    <a href="<?php echo esc_url($hero_secondary_btn_url); ?>" class="btn btn-outline"><?php echo esc_html($hero_secondary_btn_text); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
