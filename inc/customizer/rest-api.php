<?php
/**
 * REST API endpoints for React Admin Styling Options
 *
 * @package Modern_Business
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register REST API routes for styling options.
 */
function modern_business_register_rest_routes() {
	error_log('modern_business_register_rest_routes called'); // Debug log

	register_rest_route(
		'modern-business/v1',
		'/styling-options',
		array(
			'methods'             => 'GET',
			'callback'            => 'modern_business_get_styling_options',
			'permission_callback' => function () {
				return current_user_can( 'manage_options' );
			},
		)
	);

	register_rest_route(
		'modern-business/v1',
		'/styling-options',
		array(
			'methods'             => 'POST',
			'callback'            => 'modern_business_save_styling_options',
			'permission_callback' => function () {
				return current_user_can( 'manage_options' );
			},
			// Removed 'args' validation to allow object type for options
		)
	);
}
add_action( 'rest_api_init', 'modern_business_register_rest_routes' );

/**
 * Get styling options from the database.
 *
 * @param WP_REST_Request $request Request object.
 * @return WP_REST_Response
 */
function modern_business_get_styling_options( $request ) {
	error_log('modern_business_get_styling_options called'); // Debug log
	$options = get_option( 'modern_business_styling_options', array() );
	return rest_ensure_response( $options );
}

/**
 * Save styling options to the database.
 *
 * @param WP_REST_Request $request Request object.
 * @return WP_REST_Response
 */
function modern_business_save_styling_options( $request ) {
	error_log('modern_business_save_styling_options called'); // Debug log
	$params = $request->get_json_params();
	error_log('Received options: ' . print_r($params, true)); // Log received data
	if ( ! isset( $params['options'] ) || ! is_array( $params['options'] ) ) {
		return new WP_Error( 'invalid_data', 'Invalid options data', array( 'status' => 400 ) );
	}

	// Recursive sanitization function
	function sanitize_recursive( $value ) {
		if ( is_array( $value ) ) {
			return array_map( 'sanitize_recursive', $value );
		} elseif ( is_string( $value ) ) {
			return sanitize_text_field( $value );
		}
		return $value;
	}

	$options = sanitize_recursive( $params['options'] );
	update_option( 'modern_business_styling_options', $options );

	return rest_ensure_response( array( 'success' => true ) );
}
