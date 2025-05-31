<?php
/**
 * Plugin Name: CoCart - Rate Limiting
 * Plugin URI:  https://cocartapi.com
 * Description: Enables the rate limiting feature for CoCart.
 * Author:      CoCart Headless, LLC
 * Author URI:  https://cocartapi.com
 * Version:     1.0.5
 * Text Domain: cocart-rate-limiting
 * Domain Path: /languages/
 * Requires at least: 5.6
 * Requires PHP: 7.4
 * CoCart requires at least: 4.2
 * CoCart tested up to: 4.4
 *
 * @package CoCart Rate Limiting
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
	/**
	 * Initialize CoCart Rate Limiting.
	 */
	function cocart_rate_limiting() {
		return \CoCart\RateLimiting\Plugin::init();
	}

	cocart_rate_limiting();
}
