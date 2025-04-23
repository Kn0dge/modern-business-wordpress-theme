<?php
/**
 * Enqueue React Admin App scripts and styles
 *
 * @package Modern_Business
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function modern_business_enqueue_react_admin_app() {
	$dir = get_template_directory() . '/react-admin/dist';
	$uri = get_template_directory_uri() . '/react-admin/dist';

	// Only enqueue on our custom admin page
	$screen = get_current_screen();
	if ( $screen && 'toplevel_page_modern_business_styling' !== $screen->id ) {
		return;
	}

	// Enqueue React app JS
	wp_enqueue_script(
		'modern-business-react-admin',
		$uri . '/admin.bundle.js',
		array( 'wp-element' ),
		filemtime( $dir . '/admin.bundle.js' ),
		true
	);

	// Localize script with REST API nonce and root URL for API calls
	wp_localize_script(
		'modern-business-react-admin',
		'modernBusinessAdminSettings',
		array(
			'root'  => esc_url_raw( rest_url() ),
			'nonce' => wp_create_nonce( 'wp_rest' ),
		)
	);
}
add_action( 'admin_enqueue_scripts', 'modern_business_enqueue_react_admin_app' );

/**
 * Add admin menu page for Modern Business Styling Options React app
 */
function modern_business_add_admin_menu() {
	add_menu_page(
		__( 'Modern Business Styling', 'modern-business' ),
		__( 'Styling Options', 'modern-business' ),
		'manage_options',
		'modern_business_styling',
		'modern_business_render_admin_page',
		'dashicons-admin-customizer',
		60
	);
}
add_action( 'admin_menu', 'modern_business_add_admin_menu' );

/**
 * Render the admin page container for React app
 */
function modern_business_render_admin_page() {
	echo '<div id="modern-business-react-admin"></div>';
}
