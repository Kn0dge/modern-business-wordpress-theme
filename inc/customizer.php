<?php
/**
 * Modern Business Customizer
 *
 * @package Modern_Business
 */



if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once get_template_directory() . '/inc/customizer/callbacks.php';
require_once get_template_directory() . '/inc/customizer/css-output/typography.php';
require_once get_template_directory() . '/inc/customizer/rest-api.php';
require_once get_template_directory() . '/inc/customizer/color-alpha-control.php';
require_once get_template_directory() . '/inc/customizer/register-sections-panel.php';
//require_once get_template_directory() . '/inc/customizer/test-customizer-panel.php';

/**
 * Register customizer settings, sections, and controls recursively.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @param string $parent_section Parent section ID.
 * @param array $options Array of options to register.
 */
function modern_business_register_options_recursive( $wp_customize, $parent_section, $options ) {
    foreach ( $options as $option_key => $option_data ) {
        if ( ! isset( $option_data['type'] ) ) {
            continue;
        }
        if ( $option_data['type'] === 'panel' ) {
            $panel_args = array(
                'title'    => isset( $option_data['title'] ) ? $option_data['title'] : '',
                'priority' => isset( $option_data['priority'] ) ? $option_data['priority'] : 10,
                'panel'    => $parent_section,
            );
            $wp_customize->add_panel( $option_key, $panel_args );
            if ( isset( $option_data['options'] ) && is_array( $option_data['options'] ) ) {
                modern_business_register_options_recursive( $wp_customize, $option_key, $option_data['options'] );
            }
        } elseif ( $option_data['type'] === 'section' ) {
            $section_args = array(
                'title'    => isset( $option_data['title'] ) ? $option_data['title'] : '',
                'priority' => isset( $option_data['priority'] ) ? $option_data['priority'] : 10,
                'panel'    => $parent_section,
                'description' => isset( $option_data['description'] ) ? $option_data['description'] : '',
            );
            $wp_customize->add_section( $option_key, $section_args );
            if ( isset( $option_data['options'] ) && is_array( $option_data['options'] ) ) {
                modern_business_register_options_recursive( $wp_customize, $option_key, $option_data['options'] );
            }
        } else {
            $setting_args = array(
                'default'           => isset( $option_data['default'] ) ? $option_data['default'] : '',
                'sanitize_callback' => isset( $option_data['sanitize_callback'] ) ? $option_data['sanitize_callback'] : '',
                'transport'         => isset( $option_data['transport'] ) ? $option_data['transport'] : 'postMessage',
            );
            $wp_customize->add_setting( $option_key, $setting_args );

            $control_args = array(
                'label'       => isset( $option_data['label'] ) ? $option_data['label'] : '',
                'section'     => $parent_section,
                'type'        => isset( $option_data['control_type'] ) ? $option_data['control_type'] : 'text',
                'priority'    => isset( $option_data['priority'] ) ? $option_data['priority'] : 10,
                'description' => isset( $option_data['description'] ) ? $option_data['description'] : '',
            );

            if ( isset( $option_data['choices'] ) ) {
                $control_args['choices'] = $option_data['choices'];
            }

            if ( isset( $option_data['input_attrs'] ) ) {
                $control_args['input_attrs'] = $option_data['input_attrs'];
            }

            if ( isset( $option_data['active_callback'] ) && is_callable( $option_data['active_callback'] ) ) {
                $control_args['active_callback'] = $option_data['active_callback'];
            }

            if ( isset( $option_data['type'] ) && $option_data['type'] === 'color' ) {
                $wp_customize->register_control_type( '\WPTRT\Customize\Control\ColorAlpha' );
                $wp_customize->add_control( new \WPTRT\Customize\Control\ColorAlpha( $wp_customize, $option_key, $control_args ) );
            } elseif ( isset( $option_data['control_type'] ) && 'image' === $option_data['control_type'] ) {
                $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $option_key, $control_args ) );
            } else {
                $wp_customize->add_control( $option_key, $control_args );
            }
        }
    }
}

/**
 * Define all customizer sections and options in a data array.
 *
 * @return array
 */
function modern_business_get_customizer_options() {
	$path = get_template_directory() . '/inc/customizer/options/sections.php';
	if ( file_exists( $path ) ) {
		$options_data = include $path;
		if ( isset( $options_data['modern_business_sections_panel'] ) ) {
			return $options_data;
		}
	}
	return array();
}

/**
 * Register customizer settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function modern_business_customize_register( $wp_customize ) {
    $options = modern_business_get_customizer_options();

    // Register panel if defined
    foreach ( $options as $key => $option ) {
        if ( isset( $option['type'] ) && $option['type'] === 'panel' ) {
            $panel_args = array(
                'title'    => isset( $option['title'] ) ? $option['title'] : '',
                'priority' => isset( $option['priority'] ) ? $option['priority'] : 10,
            );
            $wp_customize->add_panel( $key, $panel_args );

            if ( isset( $option['options'] ) && is_array( $option['options'] ) ) {
                modern_business_register_options_recursive( $wp_customize, $key, $option['options'] );
            }
        }
    }
}

add_action( 'customize_register', 'modern_business_customize_register' );

function modern_business_enqueue_hero_slider_script() {
    wp_enqueue_script( 'modern-business-hero-slider', get_template_directory_uri() . '/inc/customizer/js/hero-slider.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'modern_business_enqueue_hero_slider_script' );

// Enqueue hero slider overlay styles
function modern_business_enqueue_hero_slider_overlay_styles() {
    wp_enqueue_style( 'modern-business-hero-slider-overlay', get_template_directory_uri() . '/inc/customizer/css/hero-slider-overlay.css', array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'modern_business_enqueue_hero_slider_overlay_styles' );
