<?php
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
