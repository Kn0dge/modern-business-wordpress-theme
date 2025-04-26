<?php
/**
 * Modern Business Customizer CSS Output: Typography
 *
 * @package Modern_Business
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Modern_Business_Typography_CSS {

	private $fonts = array();

	public function __construct() {
		add_action( 'wp_head', array( $this, 'print_customizer_css' ), 999 );
		add_action( 'enqueue_block_editor_assets', array( $this, 'gutenberg_editor_style' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_fonts' ) );
	}

	public function print_customizer_css() {
		$css = $this->generate_css();

		// Debug output to verify CSS generation
		error_log( 'Modern_Business_Typography_CSS output length: ' . strlen( $css ) );

		if ( ! empty( $css ) ) {
			echo '<style id="modern-business-typography-css">' . $css . '</style>';
		}
	}

	public function generate_css() {
		$options = $this->get_customize_options();

		$css = '';

		foreach ( $options as $section_key => $section_options ) {
			if ( isset( $section_options['options'] ) ) {
				if ( $section_key === 'modern_business_contact_section_options' ) {
					// Exclude subtitle options for contact section
					$filtered_options = array_filter($section_options['options'], function($key) {
						 return strpos($key, 'subtitle') === false;
					}, ARRAY_FILTER_USE_KEY);
					$section_css = $this->get_css_data( $filtered_options, $section_key );
			  } else {
					$section_css = $this->get_css_data( $section_options['options'], $section_key );
			  }
			  
				if ( ! empty( $section_css ) ) {
					$css .= $section_css;
				}
			}
		}

		return $css;
	}

	private function get_customize_options() {
		// Load options from the sections.php file or other option files.
		$path = get_template_directory() . '/inc/customizer/options/sections.php';
		if ( file_exists( $path ) ) {
			$options_data = include $path;
			if ( isset( $options_data['modern_business_sections_panel'] ) ) {
				return $options_data['modern_business_sections_panel']['options'];
			}
		}
		return array();
	}

	private function get_css_data( $options, $section_key ) {
		$css = '';

		if ( is_array( $options ) ) {
			// Check if section is enabled
			$enable_section_key = 'enable_' . str_replace( 'modern_business_', '', $section_key );
			$section_enabled = get_theme_mod( $enable_section_key, true );

			if ( ! $section_enabled ) {
				return ''; // Skip CSS if section disabled
			}

			// Prepare padding values
			$padding_values = array();

			foreach ( $options as $option_key => $option_data ) {
				$value = get_theme_mod( $option_key, isset( $option_data['default'] ) ? $option_data['default'] : '' );

				// Handle font size
				if ( isset( $option_data['type'] ) && $option_data['type'] === 'text' && strpos( $option_key, 'font_size' ) !== false ) {
					$enable_key = 'enable_' . $option_key;
					if ( get_theme_mod( $enable_key, true ) ) {
						$selector = $this->get_selector_for_option( $option_key );
						if ( ! empty( $value ) && ! empty( $selector ) ) {
							$css .= $selector . '{ font-size: ' . esc_attr( $value ) . '; }';
						}
					}
				}

				// Handle color
				if ( isset( $option_data['type'] ) && $option_data['type'] === 'color' && strpos( $option_key, 'color' ) !== false ) {
					$enable_key = 'enable_' . $option_key;
					if ( get_theme_mod( $enable_key, true ) ) {
						$selector = $this->get_selector_for_option( $option_key );
						if ( ! empty( $value ) && ! empty( $selector ) ) {
							// Determine if background or text color
							if ( strpos( $option_key, 'background_color' ) !== false ) {
								$css .= $selector . '{ background-color: ' . esc_attr( $value ) . '; }';
							} else {
								$css .= $selector . '{ color: ' . esc_attr( $value ) . '; }';
							}
						}
					}
				}

				// Handle font family
				if ( isset( $option_data['type'] ) && $option_data['type'] === 'text' && strpos( $option_key, 'font_family' ) !== false ) {
					$enable_key = 'enable_' . $option_key;
					if ( get_theme_mod( $enable_key, true ) ) {
						$selector = $this->get_selector_for_option( $option_key );
						if ( ! empty( $value ) && ! empty( $selector ) ) {
							$css .= $selector . '{ font-family: ' . esc_attr( $value ) . '; }';
						}
					}
				}

				// Collect padding values
				if ( strpos( $option_key, 'padding_' ) === 0 ) {
					$enable_key = 'enable_' . str_replace( 'padding_', '', $option_key );
					if ( get_theme_mod( $enable_key, true ) ) {
						$padding_values[ $option_key ] = $value;
					}
				}
			}

			// Output padding CSS if enabled and values present
			if ( ! empty( $padding_values ) ) {
				$selector = $this->get_selector_for_section( $section_key );
				if ( ! empty( $selector ) ) {
					// Check if all padding values are equal for shorthand
					$unique_values = array_unique( $padding_values );
					if ( count( $unique_values ) === 1 ) {
						$css .= $selector . '{ padding: ' . esc_attr( reset( $unique_values ) ) . '; }';
					} else {
						$css .= $selector . '{ ';
						foreach ( $padding_values as $side => $val ) {
							$css .= 'padding-' . str_replace( 'padding_', '', $side ) . ': ' . esc_attr( $val ) . '; ';
						}
						$css .= '}';
					}
				}
			}
		}

		return $css;
	}

	private function get_selector_for_option( $option_key ) {
		// Map option keys to CSS selectors
		$map = array(
			// Hero Section - updated selectors to match actual markup
			'hero_title_font_size'    => '#hero .hero-title',
			'hero_subtitle_font_size' => '#hero .hero-subtitle',
			'hero_text_color'         => '#hero',
			'hero_background_color'   => '#hero',
			'hero_font_family'        => '#hero',
			// Portfolio Section
			'portfolio_text_color'       => '.portfolio-section',
			'portfolio_background_color' => '.portfolio-section',
			// Testimonials Section
			'testimonials_text_color'       => '.testimonials-section',
			'testimonials_background_color' => '.testimonials-section',
			// Team Section
			'team_text_color'       => '.team-section',
			'team_background_color' => '.team-section',
			// Contact Section
			'contact_text_color'       => '.contact-section',
			'contact_background_color' => '.contact-section',
			// Blog Section
			'blog_text_color'       => '.blog-section',
			'blog_background_color' => '.blog-section',
			// Services Section
			'services_text_color'       => '.services-section',
			'services_background_color' => '.services-section',
			// About Section
			'about_text_color'       => '.about-section',
			'about_background_color' => '.about-section',
		);

		return isset( $map[ $option_key ] ) ? $map[ $option_key ] : '';
	}

	private function get_selector_for_section( $section_key ) {
		// Map section keys to CSS selectors
		$map = array(
			'modern_business_hero_section'        => '.hero-section',
			'modern_business_portfolio_section'   => '.portfolio-section',
			'modern_business_testimonials_section'=> '.testimonials-section',
			'modern_business_team_section'        => '.team-section',
			'modern_business_contact_section'     => '.contact-section',
			'modern_business_blog_section'        => '.blog-section',
			'modern_business_services_section'    => '.services-section',
			'modern_business_about_section'       => '.about-section',
		);

		return isset( $map[ $section_key ] ) ? $map[ $section_key ] : '';
	}

	public function gutenberg_editor_style() {
		// Optionally add editor styles here
	}

	public function load_fonts() {
		// Optionally enqueue Google Fonts based on selected fonts
	}
}

new Modern_Business_Typography_CSS();
