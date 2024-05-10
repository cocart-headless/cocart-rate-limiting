<?php
/**
 * CoCart Rate Limiting core setup.
 *
 * @author  Sébastien Dumont
 * @package CoCart Rate Limiting
 * @license GPL-2.0+
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
	 *
	 * @var string
	 */
	public static $version = '1.0.2';

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
		/**
		 * Specified routes in CoCart will be restricted to 1 request per 60 seconds.
		 *
		 * @since 1.0.0 Introduced.
		 *
		 * @param array List of regex patterns matching the routes to restrict.
		 */
		$regex_path_patterns = apply_filters( 'cocart_rate_limit_restricted_request_patterns', array(
			'', // Example: #^/cocart/v2/checkout?#.
		) );

		foreach ( $regex_path_patterns as $regex_path_pattern ) {
			if ( ! empty( $regex_path_pattern ) && preg_match( $regex_path_pattern, $GLOBALS['wp']->query_vars['rest_route'] ) ) {
				return array(
					'enabled'       => true,
					'proxy_support' => defined( 'COCART_RATE_LIMITING_PROXY_SUPPORT' ) ? COCART_RATE_LIMITING_PROXY_SUPPORT : false, // enables/disables Proxy support. Default:false.
					'limit'         => 1,
					'seconds'       => 60,
				);
			}
		}

		return array(
			'enabled'       => defined( 'COCART_RATE_LIMITING_ENABLED' ) ? COCART_RATE_LIMITING_ENABLED : true, // enables/disables Rate Limiting.
			'proxy_support' => defined( 'COCART_RATE_LIMITING_PROXY_SUPPORT' ) ? COCART_RATE_LIMITING_PROXY_SUPPORT : false, // enables/disables Proxy support. Default:false.
			'limit'         => defined( 'COCART_RATE_LIMITING_LIMIT' ) ? COCART_RATE_LIMITING_LIMIT : 25, // limit of request per timeframe. Default: 25.
			'seconds'       => defined( 'COCART_RATE_LIMITING_SECONDS' ) ? COCART_RATE_LIMITING_SECONDS : 10, // timeframe in seconds. Default: 10.
		);
	} // END cocart_api_rate_limit_options()
} // END class
