







<?php
/**
 * Modern Business Customizer Settings: Sections with enable/disable toggles and comprehensive styling options
 *
 * @package Modern_Business
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$options = [
	'modern_business_sections_panel' => [
		'type'     => 'panel',
		'title'    => __( 'Sections', 'modern-business' ),
		'priority' => 30,
		'options'  => [
			// Hero Section
			'modern_business_hero_section' => [
				'type'        => 'section',
				'title'       => __( 'Hero Section', 'modern-business' ),
				'priority'    => 10,
				'panel'       => 'modern_business_sections_panel',
				'options'     => [
					'enable_hero_section' => [
						'type'              => 'checkbox',
						'control_type'      => 'checkbox',
						'label'             => __( 'Enable Hero Section', 'modern-business' ),
						'default'           => true,
						'sanitize_callback' => 'sanitize_checkbox',
						'priority'          => 1,
					],
					'enable_hero_background_color' => [
						'type'              => 'checkbox',
						'control_type'      => 'checkbox',
						'label'             => __( 'Enable Background Color', 'modern-business' ),
						'default'           => true,
						'sanitize_callback' => 'sanitize_checkbox',
						'priority'          => 5,
					],
					'hero_background_color' => [
						'type'              => 'color',
						'label'             => __( 'Background Color', 'modern-business' ),
						'default'           => '#f3f4f6',
						'sanitize_callback' => 'sanitize_hex_color',
						'priority'          => 10,
						'active_callback'   => function() {
							return get_theme_mod('enable_hero_background_color', true) && get_theme_mod('enable_hero_section', true);
						},
					],
					'enable_hero_text_color' => [
						'type'              => 'checkbox',
						'control_type'      => 'checkbox',
						'label'             => __( 'Enable Text Color', 'modern-business' ),
						'default'           => true,
						'sanitize_callback' => 'sanitize_checkbox',
						'priority'          => 15,
						'active_callback'   => function() {
							return get_theme_mod('enable_hero_section', true);
						},
					],
					'hero_text_color' => [
						'type'              => 'color',
						'label'             => __( 'Text Color', 'modern-business' ),
						'default'           => '#111827',
						'sanitize_callback' => 'sanitize_hex_color',
						'priority'          => 20,
						'active_callback'   => function() {
							return get_theme_mod('enable_hero_text_color', true) && get_theme_mod('enable_hero_section', true);
						},
					],
					'enable_hero_title_font_size' => [
						'type'              => 'checkbox',
						'control_type'      => 'checkbox',
						'label'             => __( 'Enable Title Font Size', 'modern-business' ),
						'default'           => true,
						'sanitize_callback' => 'sanitize_checkbox',
						'priority'          => 25,
					],
					'hero_title_font_size' => [
						'type'              => 'text',
						'label'             => __( 'Title Font Size', 'modern-business' ),
						'default'           => '3.5rem',
						'sanitize_callback' => 'sanitize_text_field',
						'priority'          => 30,
						'description'       => __( 'Use CSS units, e.g., 3.5rem, 56px', 'modern-business' ),
						'active_callback'   => function() {
							return get_theme_mod('enable_hero_title_font_size', true);
						},
					],
					'enable_hero_subtitle_font_size' => [
						'type'              => 'checkbox',
						'control_type'      => 'checkbox',
						'label'             => __( 'Enable Subtitle Font Size', 'modern-business' ),
						'default'           => true,
						'sanitize_callback' => 'sanitize_checkbox',
						'priority'          => 35,
					],
					'hero_subtitle_font_size' => [
						'type'              => 'text',
						'label'             => __( 'Subtitle Font Size', 'modern-business' ),
						'default'           => '1.25rem',
						'sanitize_callback' => 'sanitize_text_field',
						'priority'          => 40,
						'description'       => __( 'Use CSS units, e.g., 1.25rem, 20px', 'modern-business' ),
						'active_callback'   => function() {
							return get_theme_mod('enable_hero_subtitle_font_size', true);
						},
					],
					'enable_hero_font_family' => [
						'type'              => 'checkbox',
						'control_type'      => 'checkbox',
						'label'             => __( 'Enable Font Family', 'modern-business' ),
						'default'           => true,
						'sanitize_callback' => 'sanitize_checkbox',
						'priority'          => 45,
					],
					'hero_font_family' => [
						'type'              => 'select',
						'label'             => __( 'Font Family', 'modern-business' ),
						'default'           => 'system-ui, sans-serif',
						'sanitize_callback' => 'sanitize_text_field',
						'priority'          => 50,
						'description'       => __( 'Select font family', 'modern-business' ),
						'active_callback'   => function() {
							return get_theme_mod('enable_hero_font_family', true);
						},
						'choices'           => [
							'system-ui, sans-serif' => 'System UI',
							'Arial, sans-serif' => 'Arial',
							'Georgia, serif' => 'Georgia',
							'"Helvetica Neue", sans-serif' => 'Helvetica Neue',
							'"Times New Roman", serif' => 'Times New Roman',
							'"Courier New", monospace' => 'Courier New',
							'"Lucida Console", monospace' => 'Lucida Console',
						],
					],
					'enable_hero_padding' => [
	'type'              => 'checkbox',
	'control_type'      => 'checkbox',
	'label'             => __( 'Enable Padding', 'modern-business' ),
	'default'           => true,
	'sanitize_callback' => 'sanitize_checkbox',
	'priority'          => 55,
	'active_callback'   => function() {
		return get_theme_mod('enable_hero_section', true);
	},
],
'hero_padding_top' => [
	'type'              => 'text',
	'label'             => __( 'Padding Top', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 60,
	'description'       => __( 'CSS padding top value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_hero_padding', true) && get_theme_mod('enable_hero_section', true);
	},
],
'hero_padding_right' => [
	'type'              => 'text',
	'label'             => __( 'Padding Right', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 65,
	'description'       => __( 'CSS padding right value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_hero_padding', true) && get_theme_mod('enable_hero_section', true);
	},
],
'hero_padding_bottom' => [
	'type'              => 'text',
	'label'             => __( 'Padding Bottom', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 70,
	'description'       => __( 'CSS padding bottom value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_hero_padding', true) && get_theme_mod('enable_hero_section', true);
	},
],
'hero_padding_left' => [
	'type'              => 'text',
	'label'             => __( 'Padding Left', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 75,
	'description'       => __( 'CSS padding left value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_hero_padding', true) && get_theme_mod('enable_hero_section', true);
	},
],
// Similarly add margin and border controls with enable toggles and CSS value inputs

				],
			],
			// Portfolio Section
			'modern_business_portfolio_section' => [
				'type'        => 'section',
				'title'       => __( 'Portfolio Section', 'modern-business' ),
				'priority'    => 20,
				'panel'       => 'modern_business_sections_panel',
				'options'     => [
					'enable_portfolio_section' => [
						'type'              => 'checkbox',
						'control_type'      => 'checkbox',
						'label'             => __( 'Enable Portfolio Section', 'modern-business' ),
						'default'           => true,
						'sanitize_callback' => 'sanitize_checkbox',
						'priority'          => 1,
					],
					'enable_portfolio_background_color' => [
						'type'              => 'checkbox',
						'control_type'      => 'checkbox',
						'label'             => __( 'Enable Background Color', 'modern-business' ),
						'default'           => true,
						'sanitize_callback' => 'sanitize_checkbox',
						'priority'          => 5,
						'active_callback'   => function() {
							return get_theme_mod('enable_portfolio_section', true);
						},
					],
					'portfolio_background_color' => [
						'type'              => 'color',
						'label'             => __( 'Background Color', 'modern-business' ),
						'default'           => '#ffffff',
						'sanitize_callback' => 'sanitize_hex_color',
						'priority'          => 10,
						'active_callback'   => function() {
							return get_theme_mod('enable_portfolio_background_color', true) && get_theme_mod('enable_portfolio_section', true);
						},
					],
					'enable_portfolio_text_color' => [
						'type'              => 'checkbox',
						'control_type'      => 'checkbox',
						'label'             => __( 'Enable Text Color', 'modern-business' ),
						'default'           => true,
						'sanitize_callback' => 'sanitize_checkbox',
						'priority'          => 15,
						'active_callback'   => function() {
							return get_theme_mod('enable_portfolio_section', true);
						},
					],
					'portfolio_text_color' => [
						'type'              => 'color',
						'label'             => __( 'Text Color', 'modern-business' ),
						'default'           => '#333333',
						'sanitize_callback' => 'sanitize_hex_color',
						'priority'          => 20,
						'active_callback'   => function() {
							return get_theme_mod('enable_portfolio_text_color', true) && get_theme_mod('enable_portfolio_section', true);
						},
					],
'enable_portfolio_padding' => [
	'type'              => 'checkbox',
	'control_type'      => 'checkbox',
	'label'             => __( 'Enable Padding', 'modern-business' ),
	'default'           => true,
	'sanitize_callback' => 'sanitize_checkbox',
	'priority'          => 55,
	'active_callback'   => function() {
		return get_theme_mod('enable_portfolio_section', true);
	},
],
'portfolio_padding_top' => [
	'type'              => 'text',
	'label'             => __( 'Padding Top', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 60,
	'description'       => __( 'CSS padding top value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_portfolio_padding', true) && get_theme_mod('enable_portfolio_section', true);
	},
],
'portfolio_padding_right' => [
	'type'              => 'text',
	'label'             => __( 'Padding Right', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 65,
	'description'       => __( 'CSS padding right value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_portfolio_padding', true) && get_theme_mod('enable_portfolio_section', true);
	},
],
'portfolio_padding_bottom' => [
	'type'              => 'text',
	'label'             => __( 'Padding Bottom', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 70,
	'description'       => __( 'CSS padding bottom value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_portfolio_padding', true) && get_theme_mod('enable_portfolio_section', true);
	},
],
'portfolio_padding_left' => [
	'type'              => 'text',
	'label'             => __( 'Padding Left', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 75,
	'description'       => __( 'CSS padding left value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_portfolio_padding', true) && get_theme_mod('enable_portfolio_section', true);
	},
],
// Similarly add margin and border controls with enable toggles and CSS value inputs
				],
			],
			// Additional sections like Testimonials, Team, Contact, Blog, Services, About can be added here similarly
			//Testimonial Section
			'modern_business_testimonials_section' => [
	'type'        => 'section',
	'title'       => __( 'Testimonials Section', 'modern-business' ),
	'priority'    => 30,
	'panel'       => 'modern_business_sections_panel',
	'options'     => [
		'enable_testimonials_section' => [
			'type'              => 'checkbox',
			'control_type'      => 'checkbox',
			'label'             => __( 'Enable Testimonials Section', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 1,
		],
		'enable_testimonials_background_color' => [
			'type'              => 'checkbox',
			'control_type'      => 'checkbox',
			'label'             => __( 'Enable Background Color', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 5,
			'active_callback'   => function() {
				return get_theme_mod('enable_testimonials_section', true);
			},
		],
		'testimonials_background_color' => [
			'type'              => 'color',
			'label'             => __( 'Background Color', 'modern-business' ),
			'default'           => '#f9fafb',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 10,
			'active_callback'   => function() {
				return get_theme_mod('enable_testimonials_background_color', true) && get_theme_mod('enable_testimonials_section', true);
			},
		],
		'enable_testimonials_text_color' => [
			'type'              => 'checkbox',
			'control_type'      => 'checkbox',
			'label'             => __( 'Enable Text Color', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 15,
			'active_callback'   => function() {
				return get_theme_mod('enable_testimonials_section', true);
			},
		],
		'testimonials_text_color' => [
			'type'              => 'color',
			'label'             => __( 'Text Color', 'modern-business' ),
			'default'           => '#374151',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 20,
			'active_callback'   => function() {
				return get_theme_mod('enable_testimonials_text_color', true) && get_theme_mod('enable_testimonials_section', true);
			},
		],
'enable_testimonials_padding' => [
	'type'              => 'checkbox',
	'control_type'      => 'checkbox',
	'label'             => __( 'Enable Padding', 'modern-business' ),
	'default'           => true,
	'sanitize_callback' => 'sanitize_checkbox',
	'priority'          => 55,
	'active_callback'   => function() {
		return get_theme_mod('enable_testimonials_section', true);
	},
],
'testimonials_padding_top' => [
	'type'              => 'text',
	'label'             => __( 'Padding Top', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 60,
	'description'       => __( 'CSS padding top value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_testimonials_padding', true) && get_theme_mod('enable_testimonials_section', true);
	},
],
'testimonials_padding_right' => [
	'type'              => 'text',
	'label'             => __( 'Padding Right', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 65,
	'description'       => __( 'CSS padding right value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_testimonials_padding', true) && get_theme_mod('enable_testimonials_section', true);
	},
],
'testimonials_padding_bottom' => [
	'type'              => 'text',
	'label'             => __( 'Padding Bottom', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 70,
	'description'       => __( 'CSS padding bottom value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_testimonials_padding', true) && get_theme_mod('enable_testimonials_section', true);
	},
],
'testimonials_padding_left' => [
	'type'              => 'text',
	'label'             => __( 'Padding Left', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 75,
	'description'       => __( 'CSS padding left value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_testimonials_padding', true) && get_theme_mod('enable_testimonials_section', true);
	},
],
// Similarly add margin and border controls with enable toggles and CSS value inputs
	],
],
		//team Section
		'modern_business_team_section' => [
	'type'        => 'section',
	'title'       => __( 'Team Section', 'modern-business' ),
	'priority'    => 40,
	'panel'       => 'modern_business_sections_panel',
	'options'     => [
		'enable_team_section' => [
			'type'              => 'checkbox',
			'control_type'      => 'checkbox',
			'label'             => __( 'Enable Team Section', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 1,
		],
		'enable_team_background_color' => [
			'type'              => 'checkbox',
			'control_type'      => 'checkbox',
			'label'             => __( 'Enable Background Color', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 5,
			'active_callback'   => function() {
				return get_theme_mod('enable_team_section', true);
			},
		],
		'team_background_color' => [
			'type'              => 'color',
			'label'             => __( 'Background Color', 'modern-business' ),
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 10,
			'active_callback'   => function() {
				return get_theme_mod('enable_team_background_color', true) && get_theme_mod('enable_team_section', true);
			},
		],
		'enable_team_text_color' => [
			'type'              => 'checkbox',
			'control_type'      => 'checkbox',
			'label'             => __( 'Enable Text Color', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 15,
			'active_callback'   => function() {
				return get_theme_mod('enable_team_section', true);
			},
		],
		'team_text_color' => [
			'type'              => 'color',
			'label'             => __( 'Text Color', 'modern-business' ),
			'default'           => '#111827',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 20,
			'active_callback'   => function() {
				return get_theme_mod('enable_team_text_color', true) && get_theme_mod('enable_team_section', true);
			},
		],
'enable_team_padding' => [
	'type'              => 'checkbox',
	'control_type'      => 'checkbox',
	'label'             => __( 'Enable Padding', 'modern-business' ),
	'default'           => true,
	'sanitize_callback' => 'sanitize_checkbox',
	'priority'          => 55,
	'active_callback'   => function() {
		return get_theme_mod('enable_team_section', true);
	},
],
'team_padding_top' => [
	'type'              => 'text',
	'label'             => __( 'Padding Top', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 60,
	'description'       => __( 'CSS padding top value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_team_padding', true) && get_theme_mod('enable_team_section', true);
	},
],
'team_padding_right' => [
	'type'              => 'text',
	'label'             => __( 'Padding Right', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 65,
	'description'       => __( 'CSS padding right value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_team_padding', true) && get_theme_mod('enable_team_section', true);
	},
],
'team_padding_bottom' => [
	'type'              => 'text',
	'label'             => __( 'Padding Bottom', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 70,
	'description'       => __( 'CSS padding bottom value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_team_padding', true) && get_theme_mod('enable_team_section', true);
	},
],
'team_padding_left' => [
	'type'              => 'text',
	'label'             => __( 'Padding Left', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 75,
	'description'       => __( 'CSS padding left value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_team_padding', true) && get_theme_mod('enable_team_section', true);
	},
],
// Similarly add margin and border controls with enable toggles and CSS value inputs
	],
],
		//Contact Section
		'modern_business_contact_section' => [
	'type'        => 'section',
	'title'       => __( 'Contact Section', 'modern-business' ),
	'priority'    => 50,
	'panel'       => 'modern_business_sections_panel',
	'options'     => [
		'enable_contact_section' => [
			'type'              => 'checkbox',
			'control_type'      => 'checkbox',
			'label'             => __( 'Enable Contact Section', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 1,
		],
		'enable_contact_background_color' => [
			'type'              => 'checkbox',
			'control_type'      => 'checkbox',
			'label'             => __( 'Enable Background Color', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 5,
			'active_callback'   => function() {
				return get_theme_mod('enable_contact_section', true);
			},
		],
		'contact_background_color' => [
			'type'              => 'color',
			'label'             => __( 'Background Color', 'modern-business' ),
			'default'           => '#f3f4f6',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 10,
			'active_callback'   => function() {
				return get_theme_mod('enable_contact_background_color', true) && get_theme_mod('enable_contact_section', true);
			},
		],
		'enable_contact_text_color' => [
			'type'              => 'checkbox',
			'control_type'      => 'checkbox',
			'label'             => __( 'Enable Text Color', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 15,
			'active_callback'   => function() {
				return get_theme_mod('enable_contact_section', true);
			},
		],
		'contact_text_color' => [
			'type'              => 'color',
			'label'             => __( 'Text Color', 'modern-business' ),
			'default'           => '#111827',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 20,
			'active_callback'   => function() {
				return get_theme_mod('enable_contact_text_color', true) && get_theme_mod('enable_contact_section', true);
			},
		],
'enable_contact_padding' => [
	'type'              => 'checkbox',
	'control_type'      => 'checkbox',
	'label'             => __( 'Enable Padding', 'modern-business' ),
	'default'           => true,
	'sanitize_callback' => 'sanitize_checkbox',
	'priority'          => 55,
	'active_callback'   => function() {
		return get_theme_mod('enable_contact_section', true);
	},
],
'contact_padding_top' => [
	'type'              => 'text',
	'label'             => __( 'Padding Top', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 60,
	'description'       => __( 'CSS padding top value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_contact_padding', true) && get_theme_mod('enable_contact_section', true);
	},
],
'contact_padding_right' => [
	'type'              => 'text',
	'label'             => __( 'Padding Right', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 65,
	'description'       => __( 'CSS padding right value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_contact_padding', true) && get_theme_mod('enable_contact_section', true);
	},
],
'contact_padding_bottom' => [
	'type'              => 'text',
	'label'             => __( 'Padding Bottom', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 70,
	'description'       => __( 'CSS padding bottom value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_contact_padding', true) && get_theme_mod('enable_contact_section', true);
	},
],
'contact_padding_left' => [
	'type'              => 'text',
	'label'             => __( 'Padding Left', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 75,
	'description'       => __( 'CSS padding left value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_contact_padding', true) && get_theme_mod('enable_contact_section', true);
	},
],
// Similarly add margin and border controls with enable toggles and CSS value inputs
	],
],
		//Blog Section
		'modern_business_blog_section' => [
	'type'        => 'section',
	'title'       => __( 'Blog Section', 'modern-business' ),
	'priority'    => 60,
	'panel'       => 'modern_business_sections_panel',
	'options'     => [
		'enable_blog_section' => [
			'type'              => 'checkbox',
			'control_type'      => 'checkbox',
			'label'             => __( 'Enable Blog Section', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 1,
		],
		'enable_blog_background_color' => [
			'type'              => 'checkbox',
			'label'             => __( 'Enable Background Color', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 5,
			'active_callback'   => function() {
				return get_theme_mod('enable_blog_section', true);
			},
		],
		'blog_background_color' => [
			'type'              => 'color',
			'label'             => __( 'Background Color', 'modern-business' ),
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 10,
			'active_callback'   => function() {
				return get_theme_mod('enable_blog_background_color', true) && get_theme_mod('enable_blog_section', true);
			},
		],
		'enable_blog_text_color' => [
			'type'              => 'checkbox',
			'label'             => __( 'Enable Text Color', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 15,
			'active_callback'   => function() {
				return get_theme_mod('enable_blog_section', true);
			},
		],
		'blog_text_color' => [
			'type'              => 'color',
			'label'             => __( 'Text Color', 'modern-business' ),
			'default'           => '#111827',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 20,
			'active_callback'   => function() {
				return get_theme_mod('enable_blog_text_color', true) && get_theme_mod('enable_blog_section', true);
			},
		],
'modern_business_blog_section' => [
	'type'        => 'section',
	'title'       => __( 'Blog Section', 'modern-business' ),
	'priority'    => 60,
	'panel'       => 'modern_business_sections_panel',
	'options'     => [
		'enable_blog_section' => [
			'type'              => 'checkbox',
			'label'             => __( 'Enable Blog Section', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 1,
		],
		'enable_blog_background_color' => [
			'type'              => 'checkbox',
			'label'             => __( 'Enable Background Color', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 5,
			'active_callback'   => function() {
				return get_theme_mod('enable_blog_section', true);
			},
		],
		'blog_background_color' => [
			'type'              => 'color',
			'label'             => __( 'Background Color', 'modern-business' ),
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 10,
			'active_callback'   => function() {
				return get_theme_mod('enable_blog_background_color', true) && get_theme_mod('enable_blog_section', true);
			},
		],
		'enable_blog_text_color' => [
			'type'              => 'checkbox',
			'label'             => __( 'Enable Text Color', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 15,
			'active_callback'   => function() {
				return get_theme_mod('enable_blog_section', true);
			},
		],
		'blog_text_color' => [
			'type'              => 'color',
			'label'             => __( 'Text Color', 'modern-business' ),
			'default'           => '#111827',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 20,
			'active_callback'   => function() {
				return get_theme_mod('enable_blog_text_color', true) && get_theme_mod('enable_blog_section', true);
			},
		],
		// Add additional styling options here as needed
	],
],
	],
],
		//Services Section
		'modern_business_services_section' => [
	'type'        => 'section',
	'title'       => __( 'Services Section', 'modern-business' ),
	'priority'    => 70,
	'panel'       => 'modern_business_sections_panel',
	'options'     => [
		'enable_services_section' => [
			'type'              => 'checkbox',
			'label'             => __( 'Enable Services Section', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 1,
		],
		'enable_services_background_color' => [
			'type'              => 'checkbox',
			'label'             => __( 'Enable Background Color', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 5,
			'active_callback'   => function() {
				return get_theme_mod('enable_services_section', true);
			},
		],
		'services_background_color' => [
			'type'              => 'color',
			'label'             => __( 'Background Color', 'modern-business' ),
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 10,
			'active_callback'   => function() {
				return get_theme_mod('enable_services_background_color', true) && get_theme_mod('enable_services_section', true);
			},
		],
		'enable_services_text_color' => [
			'type'              => 'checkbox',
			'label'             => __( 'Enable Text Color', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 15,
			'active_callback'   => function() {
				return get_theme_mod('enable_services_section', true);
			},
		],
		'services_text_color' => [
			'type'              => 'color',
			'label'             => __( 'Text Color', 'modern-business' ),
			'default'           => '#111827',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 20,
			'active_callback'   => function() {
				return get_theme_mod('enable_services_text_color', true) && get_theme_mod('enable_services_section', true);
			},
		],
'enable_services_padding' => [
	'type'              => 'checkbox',
	'label'             => __( 'Enable Padding', 'modern-business' ),
	'default'           => true,
	'sanitize_callback' => 'sanitize_checkbox',
	'priority'          => 55,
	'active_callback'   => function() {
		return get_theme_mod('enable_services_section', true);
	},
],
'services_padding_top' => [
	'type'              => 'text',
	'label'             => __( 'Padding Top', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 60,
	'description'       => __( 'CSS padding top value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_services_padding', true) && get_theme_mod('enable_services_section', true);
	},
],
'services_padding_right' => [
	'type'              => 'text',
	'label'             => __( 'Padding Right', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 65,
	'description'       => __( 'CSS padding right value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_services_padding', true) && get_theme_mod('enable_services_section', true);
	},
],
'services_padding_bottom' => [
	'type'              => 'text',
	'label'             => __( 'Padding Bottom', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 70,
	'description'       => __( 'CSS padding bottom value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_services_padding', true) && get_theme_mod('enable_services_section', true);
	},
],
'services_padding_left' => [
	'type'              => 'text',
	'label'             => __( 'Padding Left', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 75,
	'description'       => __( 'CSS padding left value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_services_padding', true) && get_theme_mod('enable_services_section', true);
	},
],
// Similarly add margin and border controls with enable toggles and CSS value inputs
	],
],
		//About Section
		'modern_business_about_section' => [
	'type'        => 'section',
	'title'       => __( 'About Section', 'modern-business' ),
	'priority'    => 80,
	'panel'       => 'modern_business_sections_panel',
	'options'     => [
		'enable_about_section' => [
			'type'              => 'checkbox',
			'label'             => __( 'Enable About Section', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 1,
		],
		'enable_about_background_color' => [
			'type'              => 'checkbox',
			'label'             => __( 'Enable Background Color', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 5,
			'active_callback'   => function() {
				return get_theme_mod('enable_about_section', true);
			},
		],
		'about_background_color' => [
			'type'              => 'color',
			'label'             => __( 'Background Color', 'modern-business' ),
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 10,
			'active_callback'   => function() {
				return get_theme_mod('enable_about_background_color', true) && get_theme_mod('enable_about_section', true);
			},
		],
		'enable_about_text_color' => [
			'type'              => 'checkbox',
			'label'             => __( 'Enable Text Color', 'modern-business' ),
			'default'           => true,
			'sanitize_callback' => 'sanitize_checkbox',
			'priority'          => 15,
			'active_callback'   => function() {
				return get_theme_mod('enable_about_section', true);
			},
		],
		'about_text_color' => [
			'type'              => 'color',
			'label'             => __( 'Text Color', 'modern-business' ),
			'default'           => '#111827',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'          => 20,
			'active_callback'   => function() {
				return get_theme_mod('enable_about_text_color', true) && get_theme_mod('enable_about_section', true);
			},
		],
'enable_about_padding' => [
	'type'              => 'checkbox',
	'label'             => __( 'Enable Padding', 'modern-business' ),
	'default'           => true,
	'sanitize_callback' => 'sanitize_checkbox',
	'priority'          => 55,
	'active_callback'   => function() {
		return get_theme_mod('enable_about_section', true);
	},
],
'about_padding_top' => [
	'type'              => 'text',
	'label'             => __( 'Padding Top', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 60,
	'description'       => __( 'CSS padding top value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_about_padding', true) && get_theme_mod('enable_about_section', true);
	},
],
'about_padding_right' => [
	'type'              => 'text',
	'label'             => __( 'Padding Right', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 65,
	'description'       => __( 'CSS padding right value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_about_padding', true) && get_theme_mod('enable_about_section', true);
	},
],
'about_padding_bottom' => [
	'type'              => 'text',
	'label'             => __( 'Padding Bottom', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 70,
	'description'       => __( 'CSS padding bottom value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_about_padding', true) && get_theme_mod('enable_about_section', true);
	},
],
'about_padding_left' => [
	'type'              => 'text',
	'label'             => __( 'Padding Left', 'modern-business' ),
	'default'           => '20px',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'          => 75,
	'description'       => __( 'CSS padding left value', 'modern-business' ),
	'active_callback'   => function() {
		return get_theme_mod('enable_about_padding', true) && get_theme_mod('enable_about_section', true);
	},
],
// Similarly add margin and border controls with enable toggles and CSS value inputs
	],
],

		],
	],
];

return $options;

if ( ! function_exists( 'sanitize_checkbox' ) ) {
	/**
	 * Sanitize checkbox input.
	 *
	 * @param mixed $checked Checkbox value.
	 * @return bool
	 */
	function sanitize_checkbox( $checked ) {
		return ( ( isset( $checked ) && true === $checked ) || $checked === '1' ) ? true : false;
	}
}
