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

// Get slider settings and images
$enable_slider = get_theme_mod('enable_hero_slider', false);
$transition = get_theme_mod('hero_slider_transition', 'fade');
$random_transitions = get_theme_mod('hero_slider_random_transitions', false);

$slider_images = array();
for ($i = 1; $i <= 5; $i++) {
    $image = get_theme_mod('hero_slider_image_' . $i);
    if ($image) {
        $slider_images[] = $image;
    }
}

$hero_bg_color = get_theme_mod('hero_bg_color', '#ffffff');
$hero_text_color = get_theme_mod('hero_text_color', '#000000');
$hero_text_align = get_theme_mod('hero_text_align', 'center');
$hero_padding_top = get_theme_mod('hero_padding_top', 50);
$hero_padding_bottom = get_theme_mod('hero_padding_bottom', 50);
$hero_margin_top = get_theme_mod('hero_margin_top', 0);
$hero_margin_bottom = get_theme_mod('hero_margin_bottom', 0);
$hero_font_size = get_theme_mod('hero_font_size', 18);

$hero_style = sprintf(
    'background-color: %s; color: %s; text-align: %s; padding-top: %dpx; padding-bottom: %dpx; margin-top: %dpx; margin-bottom: %dpx; font-size: %dpx; position: relative; overflow: hidden; height: 100vh;',
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
    <?php if ($enable_slider && !empty($slider_images)) : ?>
        <div class="hero-slider" data-transition="<?php echo esc_attr($transition); ?>" data-random-transitions="<?php echo esc_attr($random_transitions ? 'true' : 'false'); ?>" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; z-index: 1;">
            <?php foreach ($slider_images as $index => $image) : ?>
                <div class="hero-slide" style="background-image: url('<?php echo esc_url($image); ?>'); width: 100%; height: 100%; background-size: cover; background-position: center; position: absolute; top: 0; left: 0; opacity: <?php echo $index === 0 ? '1' : '0'; ?>; transition: opacity 1s ease-in-out;"></div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <style>
            #hero {
                background-image: url('<?php echo esc_url(get_theme_mod('hero_background_image', '')); ?>');
                background-size: cover;
                background-position: center;
            }
        </style>
    <?php endif; ?>

    <div class="hero-content animate-on-scroll" style="position: relative; z-index: 2; max-width: 1200px; margin: 0 auto; padding: 20px; height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: <?php echo esc_attr($hero_text_align === 'center' ? 'center' : ($hero_text_align === 'right' ? 'flex-end' : 'flex-start')); ?>; text-align: <?php echo esc_attr($hero_text_align); ?>;">
        <h1 class="hero-title" style="font-size: <?php echo esc_attr($hero_font_size); ?>px; margin-bottom: 20px; color: <?php echo esc_attr($hero_text_color); ?>;"><?php echo esc_html($hero_title); ?></h1>
        <p class="hero-subtitle" style="margin-bottom: 30px; color: <?php echo esc_attr($hero_text_color); ?>;"><?php echo esc_html($hero_subtitle); ?></p>

        <div class="hero-buttons">
            <?php if ($hero_primary_btn_text) { ?>
                <a href="<?php echo esc_url($hero_primary_btn_url); ?>" class="btn btn-primary" style="margin-right: 10px;"><?php echo esc_html($hero_primary_btn_text); ?></a>
            <?php } ?>

            <?php if ($hero_secondary_btn_text) { ?>
                <a href="<?php echo esc_url($hero_secondary_btn_url); ?>" class="btn btn-outline"><?php echo esc_html($hero_secondary_btn_text); ?></a>
            <?php } ?>
        </div>
    </div>
</div>
</section>
