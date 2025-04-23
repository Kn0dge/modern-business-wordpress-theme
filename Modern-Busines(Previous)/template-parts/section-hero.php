<?php
/**
 * Template part for displaying the hero section on the front page
 *
 * @package Modern_Business
 */

// Get hero settings from the customizer
$hero_title = get_theme_mod('hero_title', __('We Create Modern & Professional Websites', 'modern-business'));
$hero_subtitle = get_theme_mod('hero_subtitle', __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.', 'modern-business'));
$hero_primary_btn_text = get_theme_mod('hero_primary_btn_text', __('Get Started', 'modern-business'));
$hero_primary_btn_url = get_theme_mod('hero_primary_btn_url', '#');
$hero_secondary_btn_text = get_theme_mod('hero_secondary_btn_text', __('Learn More', 'modern-business'));
$hero_secondary_btn_url = get_theme_mod('hero_secondary_btn_url', '#');

// Get slider settings
$transition = get_theme_mod('hero_slider_transition', 'fade');
$random_transitions = get_theme_mod('hero_slider_random_transitions', false);

// Get slider images
$slider_images = array();
for ($i = 1; $i <= 5; $i++) {
    $image = get_theme_mod('hero_slider_image_' . $i);
    if ($image) {
        $slider_images[] = $image;
    }
}
?>

<?php
$hero_bg_color = get_theme_mod('hero_bg_color', '#ffffff');
$hero_text_color = get_theme_mod('hero_text_color', '#000000');
$hero_text_align = get_theme_mod('hero_text_align', 'center');
$hero_padding_top = get_theme_mod('hero_padding_top', 50);
$hero_padding_bottom = get_theme_mod('hero_padding_bottom', 50);
$hero_margin_top = get_theme_mod('hero_margin_top', 0);
$hero_margin_bottom = get_theme_mod('hero_margin_bottom', 0);
$hero_font_size = get_theme_mod('hero_font_size', 18);

$hero_style = sprintf(
    'background-color: %s; color: %s; text-align: %s; padding-top: %dpx; padding-bottom: %dpx; margin-top: %dpx; margin-bottom: %dpx; font-size: %dpx;',
    esc_attr($hero_bg_color),
    esc_attr($hero_text_color),
    esc_attr($hero_text_align),
    intval($hero_padding_top),
    intval($hero_padding_bottom),
    intval($hero_margin_top),
    intval($hero_margin_bottom),
    intval($hero_font_size)
);
?>
<section id="hero" class="hero" style="<?php echo $hero_style; ?>">
    <?php if (!empty($slider_images)) : ?>
        <div class="hero-slider" data-transition="<?php echo esc_attr($transition); ?>" data-random-transitions="<?php echo esc_attr($random_transitions ? 'true' : 'false'); ?>">
            <?php foreach ($slider_images as $index => $image) : ?>
                <div class="hero-slide" style="background-image: url('<?php echo esc_url($image); ?>')"></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
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