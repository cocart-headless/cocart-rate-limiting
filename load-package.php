<?php
/**
 * This file is designed to be used to load as package NOT a WP plugin!
 *
 * @version 1.0.0
 * @package CoCart Limit Rating
 */

defined( 'ABSPATH' ) || exit;

if ( version_compare( PHP_VERSION, '7.4', '<' ) ) {
	return;
}

if ( ! defined( 'COCART_RATE_LIMITING_FILE' ) ) {
	define( 'COCART_RATE_LIMITING_FILE', __FILE__ );
}

// Include the main CoCart Rate Limiting class.
if ( ! class_exists( 'CoCart\RateLimiting\Plugin', false ) ) {
	include_once untrailingslashit( plugin_dir_path( COCART_RATE_LIMITING_FILE ) ) . '/includes/class-cocart-rate-limiting.php';
}

/**
 * Returns the main instance of cocart_rate_limiting and only runs if it does not already exists.
 *
 * @return cocart_rate_limiting
 */
if ( ! function_exists( 'cocart_rate_limiting' ) ) {
	function cocart_rate_limiting() {
		return \CoCart\RateLimiting\Plugin::init();
	}

	cocart_rate_limiting();
}
