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

    <header id="masthead" class="site-header<?php echo (is_front_page() && get_theme_mod('header_transparent', true)) ? ' transparent' : ''; ?><?php echo get_theme_mod('nav_background_transparent', false) ? ' nav-background-transparent' : ''; ?>">
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

            <nav id="site-navigation" class="main-navigation">
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