<?php
/**
 * Template part for displaying the about section on the front page
 *
 * @package Modern_Business
 */

if ( ! get_theme_mod( 'enable_about_section', true ) ) {
    return;
}

// Get section settings from theme options
$section_title = get_theme_mod('about_title', __('About Us', 'modern-business'));
$section_subtitle = get_theme_mod('about_subtitle', __('Learn more about our company and our mission', 'modern-business'));

// Sample about content - in a real theme you might pull this from a page
$about_columns = array(
    array(
        'icon' => 'fas fa-chart-line',
        'title' => __('Our Mission', 'modern-business'),
        'content' => __('We strive to provide exceptional service and results for all our clients. Our mission is to exceed expectations and deliver value.', 'modern-business'),
    ),
    array(
        'icon' => 'fas fa-lightbulb',
        'title' => __('Our Vision', 'modern-business'),
        'content' => __('To become the leading provider in our industry by focusing on innovation, quality and customer satisfaction.', 'modern-business'),
    ),
    array(
        'icon' => 'fas fa-hands-helping',
        'title' => __('Our Values', 'modern-business'),
        'content' => __('Integrity, excellence, teamwork, and customer focus form the foundation of everything we do in our business.', 'modern-business'),
    ),
);
?>

<section id="about" class="section about-section" style="position: relative;">
    <div class="background-color-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1;"></div>
    <div class="container" style="position: relative; z-index: 2;">
        <h2 class="section-title animate-on-scroll"><?php echo esc_html($section_title); ?></h2>
        <p class="section-subtitle animate-on-scroll" style="text-align: <?php echo esc_attr(get_theme_mod('about_text_align', 'center')); ?>;"><?php echo esc_html($section_subtitle); ?></p>
        
        <div class="about-columns animate-on-scroll">
            <?php foreach ($about_columns as $column) : ?>
                <div class="about-column">
                    <div class="about-icon">
                        <i class="<?php echo esc_attr($column['icon']); ?>"></i>
                    </div>
                    <h3 class="about-title"><?php echo esc_html($column['title']); ?></h3>
                    <p><?php echo esc_html($column['content']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
