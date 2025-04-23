<?php
/**
 * Minimal test customizer panel to verify customizer functionality.
 *
 * @package Modern_Business
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function modern_business_test_customizer_panel( $wp_customize ) {
    $wp_customize->add_panel( 'test_panel', array(
        'title'    => __( 'Test Panel', 'modern-business' ),
        'priority' => 100,
    ) );

    $wp_customize->add_section( 'test_section', array(
        'title'    => __( 'Test Section', 'modern-business' ),
        'panel'    => 'test_panel',
        'priority' => 10,
    ) );

    $wp_customize->add_setting( 'test_setting', array(
        'default'           => 'default value',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'test_setting', array(
        'label'    => __( 'Test Setting', 'modern-business' ),
        'section'  => 'test_section',
        'type'     => 'text',
        'priority' => 10,
    ) );
}
add_action( 'customize_register', 'modern_business_test_customizer_panel' );
