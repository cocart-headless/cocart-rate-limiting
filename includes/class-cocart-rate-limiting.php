<?php
/**
 * CoCart Rate Limiting core setup.
 *
 * @author   Sébastien Dumont
 * @category Package
 * @license  GPL-2.0+
 */

namespace CoCart\RateLimiting;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main CoCart Rate Limiting class.
 *
 * @class CoCart\RateLimiting\Plugin
 */
final class Plugin {

	/**
	 * Plugin Version
	 *
	 * @access public
	 *
	 * @static
	 */
	public static $version = '1.0.1';

	/**
	 * Initiate CoCart Rate Limiting.
	 *
	 * @access public
	 *
	 * @static
	 */
	public static function init() {
		// Enables the rate limiting feature for CoCart.
		add_filter( 'cocart_api_rate_limit_options', array( __CLASS__, 'cocart_api_rate_limit_options' ), 0 );

		// Load translation files.
		add_action( 'init', array( __CLASS__, 'load_plugin_textdomain' ), 0 );
	} // END init()

	/**
	 * Return the name of the package.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @return string
	 */
	public static function get_name() {
		return 'CoCart - Rate Limiting';
	} // END get_name()

	/**
	 * Return the version of the package.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @return string
	 */
	public static function get_version() {
		return self::$version;
	} // END get_version()

	/**
	 * Return the path to the package.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @return string
	 */
	public static function get_path() {
		return dirname( __DIR__ );
	} // END get_path()

	/**
	 * Enables the rate limiting feature for CoCart.
	 *
	 * Either sets the default options or what is configured
	 * in `wp-config.php` using the `COCART_RATE_LIMITING_*` constants.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @return array
	 */
	public static function cocart_api_rate_limit_options() {
		// Specified routes in CoCart will be restricted to 1 request per 60 seconds.
		$regex_path_patterns = apply_filters( 'cocart_rate_limit_restricted_request_patterns', array(
			'', // Example: #^/cocart/v2/checkout?#
		) );

		foreach ( $regex_path_patterns as $regex_path_pattern ) {
			if ( ! empty( $regex_path_pattern ) && preg_match( $regex_path_pattern, $GLOBALS['wp']->query_vars['rest_route'] ) ) {
				return array(
					'enabled'       => true,
					'proxy_support' => defined( 'COCART_RATE_LIMITING_PROXY_SUPPORT' ) ? COCART_RATE_LIMITING_PROXY_SUPPORT : false, // enables/disables Proxy support. Default:false,
					'limit'         => 1,
					'seconds'       => 60,
				);
			}
		}

		return array(
			'enabled'       => defined( 'COCART_RATE_LIMITING_ENABLED' ) ? COCART_RATE_LIMITING_ENABLED : true, // enables/disables Rate Limiting
			'proxy_support' => defined( 'COCART_RATE_LIMITING_PROXY_SUPPORT' ) ? COCART_RATE_LIMITING_PROXY_SUPPORT : false, // enables/disables Proxy support. Default:false
			'limit'         => defined( 'COCART_RATE_LIMITING_LIMIT' ) ? COCART_RATE_LIMITING_LIMIT : 25, // limit of request per timeframe. Default: 25
			'seconds'       => defined( 'COCART_RATE_LIMITING_SECONDS' ) ? COCART_RATE_LIMITING_SECONDS : 10, // timeframe in seconds. Default: 10
		);
	} // END cocart_api_rate_limit_options()

	/**
	 * Load the plugin translations if any ready.
	 *
	 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
	 *
	 * Locales found in:
	 *      - WP_LANG_DIR/cocart-rate-limiting/cocart-rate-limiting-LOCALE.mo
	 *      - WP_LANG_DIR/plugins/cocart-rate-limiting-LOCALE.mo
	 *
	 * @access public
	 *
	 * @static
	 */
	public static function load_plugin_textdomain() {
		if ( function_exists( 'determine_locale' ) ) {
			$locale = determine_locale();
		} else {
			$locale = is_admin() ? get_user_locale() : get_locale();
		}

		$locale = apply_filters( 'plugin_locale', $locale, 'cocart-rate-limiting' );

		unload_textdomain( 'cocart-rate-limiting' );
		load_textdomain( 'cocart-rate-limiting', WP_LANG_DIR . '/cocart-rate-limiting/cocart-rate-limiting-' . $locale . '.mo' );
		load_plugin_textdomain( 'cocart-rate-limiting', false, plugin_basename( dirname( COCART_RATE_LIMITING_FILE ) ) . '/languages' );
	} // END load_plugin_textdomain()

} // END class
