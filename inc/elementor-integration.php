<?php
/**
 * Elementor Integration for Modern Business Styling Options
 *
 * @package Modern_Business
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

/**
 * Helper function to add common styling controls for a section.
 *
 * @param \Elementor\Widget_Base $widget Elementor widget instance.
 * @param string $section_id Unique section identifier.
 * @param string $section_label Human-readable section label.
 * @param string $section_class CSS class selector for the section.
 */
function modern_business_add_section_styling_controls( $widget, $section_id, $section_label, $section_class ) {
	$widget->add_control(
		"enable_{$section_id}_background_color",
		[
			'label' => __( 'Enable Background Color', 'modern-business' ),
			'type' => Controls_Manager::SWITCHER,
			'default' => 'yes',
		]
	);
	$widget->add_control(
		"{$section_id}_background_color",
		[
			'label'     => sprintf( __( '%s Background Color', 'modern-business' ), $section_label ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#ffffff',
			'selectors' => [
				"{{WRAPPER}} {$section_class}" => 'background-color: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_background_color" => 'yes',
			],
		]
	);

	$widget->add_control(
		"enable_{$section_id}_text_color",
		[
			'label' => __( 'Enable Text Color', 'modern-business' ),
			'type' => Controls_Manager::SWITCHER,
			'default' => 'yes',
		]
	);
	$widget->add_control(
		"{$section_id}_text_color",
		[
			'label'     => sprintf( __( '%s Text Color', 'modern-business' ), $section_label ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#111827',
			'selectors' => [
				"{{WRAPPER}} {$section_class}, {{WRAPPER}} {$section_class} h1, {{WRAPPER}} {$section_class} h2, {{WRAPPER}} {$section_class} h3, {{WRAPPER}} {$section_class} p" => 'color: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_text_color" => 'yes',
			],
		]
	);

	$widget->add_control(
		"enable_{$section_id}_title_font_size",
		[
			'label' => __( 'Enable Title Font Size', 'modern-business' ),
			'type' => Controls_Manager::SWITCHER,
			'default' => 'yes',
		]
	);
	$widget->add_control(
		"{$section_id}_title_font_size",
		[
			'label'       => sprintf( __( '%s Title Font Size', 'modern-business' ), $section_label ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '3rem',
			'description' => __( 'Use CSS units, e.g., 3rem, 48px', 'modern-business' ),
			'selectors'   => [
				"{{WRAPPER}} {$section_class} h1, {{WRAPPER}} {$section_class} h2" => 'font-size: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_title_font_size" => 'yes',
			],
		]
	);

	$widget->add_control(
		"enable_{$section_id}_subtitle_font_size",
		[
			'label' => __( 'Enable Subtitle Font Size', 'modern-business' ),
			'type' => Controls_Manager::SWITCHER,
			'default' => 'yes',
		]
	);
	$widget->add_control(
		"{$section_id}_subtitle_font_size",
		[
			'label'       => sprintf( __( '%s Subtitle Font Size', 'modern-business' ), $section_label ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '1.25rem',
			'description' => __( 'Use CSS units, e.g., 1.25rem, 20px', 'modern-business' ),
			'selectors'   => [
				"{{WRAPPER}} {$section_class} p, {{WRAPPER}} {$section_class} h3" => 'font-size: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_subtitle_font_size" => 'yes',
			],
		]
	);

	$widget->add_control(
		"enable_{$section_id}_font_family",
		[
			'label' => __( 'Enable Font Family', 'modern-business' ),
			'type' => Controls_Manager::SWITCHER,
			'default' => 'yes',
		]
	);
	$widget->add_control(
		"{$section_id}_font_family",
		[
			'label'       => sprintf( __( '%s Font Family', 'modern-business' ), $section_label ),
			'type'        => Controls_Manager::TEXT,
			'default'     => 'system-ui, sans-serif',
			'description' => __( 'CSS font-family value', 'modern-business' ),
			'selectors'   => [
				"{{WRAPPER}} {$section_class}" => 'font-family: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_font_family" => 'yes',
			],
		]
	);

	// Padding controls
	$widget->add_control(
		"enable_{$section_id}_padding",
		[
			'label' => __( 'Enable Padding', 'modern-business' ),
			'type' => Controls_Manager::SWITCHER,
			'default' => 'yes',
		]
	);
	$widget->add_control(
		"{$section_id}_padding_top",
		[
			'label'       => __( 'Padding Top', 'modern-business' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '20px',
			'description' => __( 'CSS padding top value', 'modern-business' ),
			'selectors'   => [
				"{{WRAPPER}} {$section_class}" => 'padding-top: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_padding" => 'yes',
			],
		]
	);
	$widget->add_control(
		"{$section_id}_padding_right",
		[
			'label'       => __( 'Padding Right', 'modern-business' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '20px',
			'description' => __( 'CSS padding right value', 'modern-business' ),
			'selectors'   => [
				"{{WRAPPER}} {$section_class}" => 'padding-right: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_padding" => 'yes',
			],
		]
	);
	$widget->add_control(
		"{$section_id}_padding_bottom",
		[
			'label'       => __( 'Padding Bottom', 'modern-business' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '20px',
			'description' => __( 'CSS padding bottom value', 'modern-business' ),
			'selectors'   => [
				"{{WRAPPER}} {$section_class}" => 'padding-bottom: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_padding" => 'yes',
			],
		]
	);
	$widget->add_control(
		"{$section_id}_padding_left",
		[
			'label'       => __( 'Padding Left', 'modern-business' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '20px',
			'description' => __( 'CSS padding left value', 'modern-business' ),
			'selectors'   => [
				"{{WRAPPER}} {$section_class}" => 'padding-left: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_padding" => 'yes',
			],
		]
	);

	// Margin controls
	$widget->add_control(
		"enable_{$section_id}_margin",
		[
			'label' => __( 'Enable Margin', 'modern-business' ),
			'type' => Controls_Manager::SWITCHER,
			'default' => 'yes',
		]
	);
	$widget->add_control(
		"{$section_id}_margin_top",
		[
			'label'       => __( 'Margin Top', 'modern-business' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '20px',
			'description' => __( 'CSS margin top value', 'modern-business' ),
			'selectors'   => [
				"{{WRAPPER}} {$section_class}" => 'margin-top: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_margin" => 'yes',
			],
		]
	);
	$widget->add_control(
		"{$section_id}_margin_right",
		[
			'label'       => __( 'Margin Right', 'modern-business' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '20px',
			'description' => __( 'CSS margin right value', 'modern-business' ),
			'selectors'   => [
				"{{WRAPPER}} {$section_class}" => 'margin-right: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_margin" => 'yes',
			],
		]
	);
	$widget->add_control(
		"{$section_id}_margin_bottom",
		[
			'label'       => __( 'Margin Bottom', 'modern-business' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '20px',
			'description' => __( 'CSS margin bottom value', 'modern-business' ),
			'selectors'   => [
				"{{WRAPPER}} {$section_class}" => 'margin-bottom: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_margin" => 'yes',
			],
		]
	);
	$widget->add_control(
		"{$section_id}_margin_left",
		[
			'label'       => __( 'Margin Left', 'modern-business' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '20px',
			'description' => __( 'CSS margin left value', 'modern-business' ),
			'selectors'   => [
				"{{WRAPPER}} {$section_class}" => 'margin-left: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_margin" => 'yes',
			],
		]
	);

	// Border controls
	$widget->add_control(
		"enable_{$section_id}_border",
		[
			'label' => __( 'Enable Border', 'modern-business' ),
			'type' => Controls_Manager::SWITCHER,
			'default' => 'no',
		]
	);
	$widget->add_control(
		"{$section_id}_border_color",
		[
			'label'     => __( 'Border Color', 'modern-business' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#000000',
			'selectors' => [
				"{{WRAPPER}} {$section_class}" => 'border-color: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_border" => 'yes',
			],
		]
	);
	$widget->add_control(
		"{$section_id}_border_width",
		[
			'label'       => __( 'Border Width', 'modern-business' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '1px',
			'description' => __( 'CSS border width value', 'modern-business' ),
			'selectors'   => [
				"{{WRAPPER}} {$section_class}" => 'border-width: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_border" => 'yes',
			],
		]
	);
	$widget->add_control(
		"{$section_id}_border_style",
		[
			'label'       => __( 'Border Style', 'modern-business' ),
			'type'        => Controls_Manager::SELECT,
			'default'     => 'solid',
			'options'     => [
				'solid'  => __( 'Solid', 'modern-business' ),
				'dashed' => __( 'Dashed', 'modern-business' ),
				'dotted' => __( 'Dotted', 'modern-business' ),
				'double' => __( 'Double', 'modern-business' ),
				'none'   => __( 'None', 'modern-business' ),
			],
			'selectors'   => [
				"{{WRAPPER}} {$section_class}" => 'border-style: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_border" => 'yes',
			],
		]
	);
	$widget->add_control(
		"{$section_id}_border_radius",
		[
			'label'       => __( 'Border Radius', 'modern-business' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '0px',
			'description' => __( 'CSS border radius value', 'modern-business' ),
			'selectors'   => [
				"{{WRAPPER}} {$section_class}" => 'border-radius: {{VALUE}};',
			],
			'condition' => [
				"enable_{$section_id}_border" => 'yes',
			],
		]
	);
}

/**
 * Register Elementor controls for styling options.
 *
 * @param \Elementor\Widget_Base $widget Elementor widget instance.
 */
function modern_business_elementor_register_controls( $widget ) {
	$widget->start_controls_section(
		'modern_business_styling_section',
		[
			'label' => __( 'Modern Business Styling', 'modern-business' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		]
	);

	// Helper function to add padding and margin controls
	$add_spacing_controls = function( $prefix, $label_prefix, $selectors ) use ( $widget ) {
		$widget->add_control(
			"enable_{$prefix}_padding",
			[
				'label' => __( "Enable {$label_prefix} Padding", 'modern-business' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$widget->add_control(
			"{$prefix}_padding_top",
			[
				'label' => __( "{$label_prefix} Padding Top", 'modern-business' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'selectors' => [
					"{{WRAPPER}} {$selectors}" => 'padding-top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					"enable_{$prefix}_padding" => 'yes',
				],
			]
		);
		$widget->add_control(
			"{$prefix}_padding_right",
			[
				'label' => __( "{$label_prefix} Padding Right", 'modern-business' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'selectors' => [
					"{{WRAPPER}} {$selectors}" => 'padding-right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					"enable_{$prefix}_padding" => 'yes',
				],
			]
		);
		$widget->add_control(
			"{$prefix}_padding_bottom",
			[
				'label' => __( "{$label_prefix} Padding Bottom", 'modern-business' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'selectors' => [
					"{{WRAPPER}} {$selectors}" => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					"enable_{$prefix}_padding" => 'yes',
				],
			]
		);
		$widget->add_control(
			"{$prefix}_padding_left",
			[
				'label' => __( "{$label_prefix} Padding Left", 'modern-business' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'selectors' => [
					"{{WRAPPER}} {$selectors}" => 'padding-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					"enable_{$prefix}_padding" => 'yes',
				],
			]
		);

		$widget->add_control(
			"enable_{$prefix}_margin",
			[
				'label' => __( "Enable {$label_prefix} Margin", 'modern-business' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$widget->add_control(
			"{$prefix}_margin_top",
			[
				'label' => __( "{$label_prefix} Margin Top", 'modern-business' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'selectors' => [
					"{{WRAPPER}} {$selectors}" => 'margin-top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					"enable_{$prefix}_margin" => 'yes',
				],
			]
		);
		$widget->add_control(
			"{$prefix}_margin_right",
			[
				'label' => __( "{$label_prefix} Margin Right", 'modern-business' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'selectors' => [
					"{{WRAPPER}} {$selectors}" => 'margin-right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					"enable_{$prefix}_margin" => 'yes',
				],
			]
		);
		$widget->add_control(
			"{$prefix}_margin_bottom",
			[
				'label' => __( "{$label_prefix} Margin Bottom", 'modern-business' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'selectors' => [
					"{{WRAPPER}} {$selectors}" => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					"enable_{$prefix}_margin" => 'yes',
				],
			]
		);
		$widget->add_control(
			"{$prefix}_margin_left",
			[
				'label' => __( "{$label_prefix} Margin Left", 'modern-business' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'selectors' => [
					"{{WRAPPER}} {$selectors}" => 'margin-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					"enable_{$prefix}_margin" => 'yes',
				],
			]
		);
	};

	// Add styling controls for all theme sections
	$sections = [
		'hero'        => [ 'label' => 'Hero Section', 'class' => '.hero-section' ],
		'portfolio'   => [ 'label' => 'Portfolio Section', 'class' => '.portfolio-section' ],
		'testimonials'=> [ 'label' => 'Testimonials Section', 'class' => '.testimonials-section' ],
		'team'        => [ 'label' => 'Team Section', 'class' => '.team-section' ],
		'contact'     => [ 'label' => 'Contact Section', 'class' => '.contact-section' ],
		'blog'        => [ 'label' => 'Blog Section', 'class' => '.blog-section' ],
		'services'    => [ 'label' => 'Services Section', 'class' => '.services-section' ],
		'about'       => [ 'label' => 'About Section', 'class' => '.about-section' ],
	];

	foreach ( $sections as $id => $data ) {
		modern_business_add_section_styling_controls( $widget, $id, $data['label'], $data['class'] );
		$add_spacing_controls( $id, $data['label'], $data['class'] );
	}

	$widget->end_controls_section();
}
add_action( 'elementor/element/after_section_end', 'modern_business_elementor_register_controls', 10, 1 );

/**
 * Apply saved styling options to Elementor frontend.
 */
function modern_business_elementor_apply_styling() {
	$options = get_option( 'modern_business_styling_options', array() );

	if ( empty( $options ) ) {
		return;
	}

	$custom_css = '';

	$sections = [
		'hero'        => '.hero-section',
		'portfolio'   => '.portfolio-section',
		'testimonials'=> '.testimonials-section',
		'team'        => '.team-section',
		'contact'     => '.contact-section',
		'blog'        => '.blog-section',
		'services'    => '.services-section',
		'about'       => '.about-section',
	];

	foreach ( $sections as $id => $class ) {
		if ( ! empty( $options["enable_{$id}_background_color"] ) && $options["enable_{$id}_background_color"] ) {
			$custom_css .= "{$class} { background-color: " . esc_attr( $options["{$id}_background_color"] ) . "; }";
		}
		if ( ! empty( $options["enable_{$id}_text_color"] ) && $options["enable_{$id}_text_color"] ) {
			$custom_css .= "{$class}, {$class} h1, {$class} h2, {$class} h3, {$class} p { color: " . esc_attr( $options["{$id}_text_color"] ) . "; }";
		}
		if ( ! empty( $options["enable_{$id}_title_font_size"] ) && $options["enable_{$id}_title_font_size"] ) {
			$custom_css .= "{$class} h1, {$class} h2 { font-size: " . esc_attr( $options["{$id}_title_font_size"] ) . "; }";
		}
		if ( ! empty( $options["enable_{$id}_subtitle_font_size"] ) && $options["enable_{$id}_subtitle_font_size"] ) {
			$custom_css .= "{$class} p, {$class} h3 { font-size: " . esc_attr( $options["{$id}_subtitle_font_size"] ) . "; }";
		}
		if ( ! empty( $options["enable_{$id}_font_family"] ) && $options["enable_{$id}_font_family"] ) {
			$custom_css .= "{$class} { font-family: " . esc_attr( $options["{$id}_font_family"] ) . "; }";
		}

		if ( ! empty( $options["enable_{$id}_padding"] ) && $options["enable_{$id}_padding"] ) {
			$custom_css .= "{$class} { padding-top: " . esc_attr( $options["{$id}_padding_top"] ) . "; }";
			$custom_css .= "{$class} { padding-right: " . esc_attr( $options["{$id}_padding_right"] ) . "; }";
			$custom_css .= "{$class} { padding-bottom: " . esc_attr( $options["{$id}_padding_bottom"] ) . "; }";
			$custom_css .= "{$class} { padding-left: " . esc_attr( $options["{$id}_padding_left"] ) . "; }";
		}

		if ( ! empty( $options["enable_{$id}_margin"] ) && $options["enable_{$id}_margin"] ) {
			$custom_css .= "{$class} { margin-top: " . esc_attr( $options["{$id}_margin_top"] ) . "; }";
			$custom_css .= "{$class} { margin-right: " . esc_attr( $options["{$id}_margin_right"] ) . "; }";
			$custom_css .= "{$class} { margin-bottom: " . esc_attr( $options["{$id}_margin_bottom"] ) . "; }";
			$custom_css .= "{$class} { margin-left: " . esc_attr( $options["{$id}_margin_left"] ) . "; }";
		}

		if ( ! empty( $options["enable_{$id}_border"] ) && $options["enable_{$id}_border"] ) {
			$custom_css .= "{$class} { border-color: " . esc_attr( $options["{$id}_border_color"] ) . "; }";
			$custom_css .= "{$class} { border-width: " . esc_attr( $options["{$id}_border_width"] ) . "; }";
			$custom_css .= "{$class} { border-style: " . esc_attr( $options["{$id}_border_style"] ) . "; }";
			$custom_css .= "{$class} { border-radius: " . esc_attr( $options["{$id}_border_radius"] ) . "; }";
		}
	}

	if ( $custom_css ) {
		wp_add_inline_style( 'elementor-frontend', $custom_css );
	}
}
add_action( 'elementor/frontend/after_enqueue_styles', 'modern_business_elementor_apply_styling' );
