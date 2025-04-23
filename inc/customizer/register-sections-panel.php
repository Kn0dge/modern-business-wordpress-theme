<?php
/**
 * Register Sections Panel and Controls for Modern Business Theme Customizer
 *
 * @package Modern_Business
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the Sections panel and its controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function modern_business_register_sections_panel( $wp_customize ) {
	// Load options from sections.php
	$options_path = get_template_directory() . '/inc/customizer/options/sections.php';
	if ( ! file_exists( $options_path ) ) {
		return;
	}
	$options = include $options_path;

	// Register the panel
	if ( isset( $options['modern_business_sections_panel'] ) ) {
		$panel = $options['modern_business_sections_panel'];
		$wp_customize->add_panel(
			'modern_business_sections_panel',
			[
				'title'    => isset( $panel['title'] ) ? $panel['title'] : __( 'Sections', 'modern-business' ),
				'priority' => isset( $panel['priority'] ) ? $panel['priority'] : 10,
			]
		);

		// Register sections and controls
		if ( isset( $panel['options'] ) && is_array( $panel['options'] ) ) {
			foreach ( $panel['options'] as $section_id => $section ) {
				if ( isset( $section['type'] ) && 'section' === $section['type'] ) {
					$wp_customize->add_section(
						$section_id,
						[
							'title'    => isset( $section['title'] ) ? $section['title'] : '',
							'priority' => isset( $section['priority'] ) ? $section['priority'] : 10,
							'panel'    => 'modern_business_sections_panel',
						]
					);

					if ( isset( $section['options'] ) && is_array( $section['options'] ) ) {
						foreach ( $section['options'] as $setting_id => $setting ) {
							// Add setting
							$setting_args = [
								'default'           => isset( $setting['default'] ) ? $setting['default'] : '',
								'sanitize_callback' => isset( $setting['sanitize_callback'] ) ? $setting['sanitize_callback'] : 'sanitize_text_field',
							];

							// Add transport => postMessage for enable toggles for realtime preview
							if ( strpos( $setting_id, 'enable_' ) === 0 ) {
								$setting_args['transport'] = 'postMessage';
							}

							$wp_customize->add_setting(
								$setting_id,
								$setting_args
							);

							// Add control
							$control_args = [
								'label'       => isset( $setting['label'] ) ? $setting['label'] : '',
								'section'     => $section_id,
								'type'        => isset( $setting['type'] ) ? $setting['type'] : 'text',
								'description' => isset( $setting['description'] ) ? $setting['description'] : '',
								'priority'    => isset( $setting['priority'] ) ? $setting['priority'] : 10,
							];

							// Add active_callback if exists
							if ( isset( $setting['active_callback'] ) && is_callable( $setting['active_callback'] ) ) {
								$control_args['active_callback'] = $setting['active_callback'];
							}

							$wp_customize->add_control(
								$setting_id,
								$control_args
							);

							// Add selective refresh partial for enable toggles if supported
							if ( isset( $wp_customize->selective_refresh ) && strpos( $setting_id, 'enable_' ) === 0 ) {
								$section_slug = str_replace( [ 'enable_', '_section' ], '', $setting_id );
								$section_slug = str_replace( '_', '-', $section_slug );
								$section_selector = '.' . $section_slug . '-section';

								$wp_customize->selective_refresh->add_partial(
									$setting_id,
									[
										'selector'        => $section_selector,
										'render_callback' => function() use ( $section_slug ) {
											get_template_part( 'template-parts/section', $section_slug );
										},
										'fallback_refresh' => true,
									]
								);
							}
						}
					}
				}
			}
		}
	}
}
/* Commented out to avoid conflict with inc/customizer.php registration function
add_action( 'customize_register', 'modern_business_register_sections_panel' );
*/
