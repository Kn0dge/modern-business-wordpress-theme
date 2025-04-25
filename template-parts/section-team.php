<?php
/**
 * Template part for displaying the team section on the front page
 *
 * @package Modern_Business
 */

if ( ! get_theme_mod( 'enable_team_section', true ) ) {
    return;
}

// Get section settings from theme options
$section_title = get_theme_mod('team_title', __('Our Team', 'modern-business'));
$section_subtitle = get_theme_mod('team_subtitle', __('Meet the people behind our success', 'modern-business'));
$team_count = get_theme_mod('team_count', 4);

// Query team members
$args = array(
    'post_type' => 'team',
    'posts_per_page' => $team_count,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
);

$team_query = new WP_Query($args);
?>

<section id="team" class="section team-section">
    <div class="container">
        <h2 class="section-title animate-on-scroll"><?php echo esc_html($section_title); ?></h2>
        <p class="section-subtitle animate-on-scroll"><?php echo esc_html($section_subtitle); ?></p>
        
        <?php if ($team_query->have_posts()) : ?>
            <div class="team-grid animate-on-scroll">
                <?php while ($team_query->have_posts()) : $team_query->the_post(); 
                    $position = get_post_meta(get_the_ID(), 'team_position', true);
                    $facebook = get_post_meta(get_the_ID(), 'team_facebook', true);
                    $twitter = get_post_meta(get_the_ID(), 'team_twitter', true);
                    $linkedin = get_post_meta(get_the_ID(), 'team_linkedin', true);
                    $instagram = get_post_meta(get_the_ID(), 'team_instagram', true);
                ?>
                    <div class="team-member">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="team-img-container">
                                <img src="<?php echo esc_url(modern_business_get_thumbnail_url(get_the_ID(), 'medium_large')); ?>" alt="<?php the_title_attribute(); ?>" class="team-img">
                            </div>
                        <?php endif; ?>
                        <div class="team-info">
                            <h3 class="team-name"><?php the_title(); ?></h3>
                            <?php if ($position) : ?>
                                <div class="team-position"><?php echo esc_html($position); ?></div>
                            <?php endif; ?>
                            <div class="team-social">
                                <?php if ($facebook) : ?>
                                    <a href="<?php echo esc_url($facebook); ?>" class="social-link" target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ($twitter) : ?>
                                    <a href="<?php echo esc_url($twitter); ?>" class="social-link" target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ($linkedin) : ?>
                                    <a href="<?php echo esc_url($linkedin); ?>" class="social-link" target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ($instagram) : ?>
                                    <a href="<?php echo esc_url($instagram); ?>" class="social-link" target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="text-center"><?php esc_html_e('No team members found.', 'modern-business'); ?></p>
        <?php endif; ?>
    </div>
</section>
