<?php
/**
 * The header for our theme
 *
 * @package Modern_Business
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'modern-business'); ?></a>

<?php
$header_layout = get_theme_mod('header_layout', 'standard');
$header_classes = 'site-header';
if (get_theme_mod('header_transparent', true)) {
    $header_classes .= ' transparent';
}
$header_classes .= ' header-layout-' . esc_attr($header_layout);
?>
<header id="masthead" class="<?php echo $header_classes; ?>">
        <div class="container header-container">
            <div class="site-logo">
                <?php
                if (has_custom_logo()) :
                    the_custom_logo();
                else :
                ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                <?php
                endif;
                ?>
            </div><!-- .site-logo -->

            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="screen-reader-text"><?php esc_html_e('Menu', 'modern-business'); ?></span>
                <span class="menu-icon"></span>
            </button>

            <?php
            $nav_position = get_theme_mod('nav_position', 'top');
            $nav_bg_color = get_theme_mod('nav_bg_color', '#ffffff');
            $nav_text_color = get_theme_mod('nav_text_color', '#000000');
            $nav_text_align = get_theme_mod('nav_text_align', 'center');
            $nav_padding_top = get_theme_mod('nav_padding_top', 10);
            $nav_padding_bottom = get_theme_mod('nav_padding_bottom', 10);
            $nav_margin_top = get_theme_mod('nav_margin_top', 0);
            $nav_margin_bottom = get_theme_mod('nav_margin_bottom', 0);
            $nav_font_size = get_theme_mod('nav_font_size', 16);

            $nav_style = sprintf(
                'background-color: %s; color: %s; text-align: %s; padding-top: %dpx; padding-bottom: %dpx; margin-top: %dpx; margin-bottom: %dpx; font-size: %dpx;',
                esc_attr($nav_bg_color),
                esc_attr($nav_text_color),
                esc_attr($nav_text_align),
                intval($nav_padding_top),
                intval($nav_padding_bottom),
                intval($nav_margin_top),
                intval($nav_margin_bottom),
                intval($nav_font_size)
            );

            $nav_position_class = 'nav-position-' . esc_attr($nav_position);
            ?>
            <nav id="site-navigation" class="main-navigation <?php echo $nav_position_class; ?>" style="<?php echo $nav_style; ?>">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'main-menu',
                        'container'      => false,
                        'walker'         => new Modern_Business_Menu_Walker(),
                    )
                );
                ?>
            </nav><!-- #site-navigation -->
        </div>
    </header><!-- #masthead -->
