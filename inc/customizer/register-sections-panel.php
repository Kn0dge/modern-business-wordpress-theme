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

	// Recursive function to register panels, sections, and controls
	$register_options = function( $wp_customize, $options, $parent_panel = '' ) use ( &$register_options ) {
		foreach ( $options as $id => $option ) {
			if ( ! isset( $option['type'] ) ) {
				continue;
			}
			if ( 'panel' === $option['type'] ) {
				$wp_customize->add_panel(
					$id,
					[
						'title'    => isset( $option['title'] ) ? $option['title'] : '',
						'priority' => isset( $option['priority'] ) ? $option['priority'] : 10,
						'panel'    => $parent_panel,
					]
				);
				if ( isset( $option['options'] ) && is_array( $option['options'] ) ) {
					$register_options( $wp_customize, $option['options'], $id );
				}
			} elseif ( 'section' === $option['type'] ) {
				$wp_customize->add_section(
					$id,
					[
						'title'    => isset( $option['title'] ) ? $option['title'] : '',
						'priority' => isset( $option['priority'] ) ? $option['priority'] : 10,
						'panel'    => $parent_panel,
					]
				);
				if ( isset( $option['options'] ) && is_array( $option['options'] ) ) {
					foreach ( $option['options'] as $setting_id => $setting ) {
						$setting_args = [
							'default'           => isset( $setting['default'] ) ? $setting['default'] : '',
							'sanitize_callback' => isset( $setting['sanitize_callback'] ) ? $setting['sanitize_callback'] : 'sanitize_text_field',
						];
						if ( strpos( $setting_id, 'enable_' ) === 0 ) {
							$setting_args['transport'] = 'postMessage';
						}
						$wp_customize->add_setting(
							$setting_id,
							$setting_args
						);
						$control_args = [
							'label'       => isset( $setting['label'] ) ? $setting['label'] : '',
							'section'     => $id,
							'type'        => isset( $setting['type'] ) ? $setting['type'] : 'text',
							'description' => isset( $setting['description'] ) ? $setting['description'] : '',
							'priority'    => isset( $setting['priority'] ) ? $setting['priority'] : 10,
						];
						if ( isset( $setting['active_callback'] ) && is_callable( $setting['active_callback'] ) ) {
							$control_args['active_callback'] = $setting['active_callback'];
						}
						if ( isset( $setting['control_type'] ) && 'image' === $setting['control_type'] ) {
							$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $setting_id, $control_args ) );
						} else {
							$wp_customize->add_control(
								$setting_id,
								$control_args
							);
						}
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
	};

	// Register the main panel and its children recursively
	if ( isset( $options['modern_business_sections_panel'] ) ) {
		$main_panel = $options['modern_business_sections_panel'];
		$wp_customize->add_panel(
			'modern_business_sections_panel',
			[
				'title'    => isset( $main_panel['title'] ) ? $main_panel['title'] : __( 'Sections', 'modern-business' ),
				'priority' => isset( $main_panel['priority'] ) ? $main_panel['priority'] : 10,
			]
		);
		if ( isset( $main_panel['options'] ) && is_array( $main_panel['options'] ) ) {
			$register_options( $wp_customize, $main_panel['options'], 'modern_business_sections_panel' );
		}
	}
}
/* Commented out to avoid conflict with inc/customizer.php registration function
add_action( 'customize_register', 'modern_business_register_sections_panel' );
*/
