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
	public static $version = '1.0.0';

	/**
	 * Initiate CoCart Rate Limiting.
	 *
	 * @access public
	 *
	 * @static
	 */
	public static function init() {
		// Update CoCart add-on counter upon activation.
		register_activation_hook( COCART_RATE_LIMITING_FILE, array( __CLASS__, 'activate_addon' ) );

		// Update CoCart add-on counter upon deactivation.
		register_deactivation_hook( COCART_RATE_LIMITING_FILE, array( __CLASS__, 'deactivate_addon' ) );

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
	 * Runs when the plugin is activated.
	 *
	 * Adds plugin to list of installed CoCart add-ons.
	 *
	 * @access public
	 */
	public static function activate_addon() {
		$addons_installed = get_option( 'cocart_addons_installed', array() );

		$plugin = plugin_basename( COCART_RATE_LIMITING_FILE );

		// Check if plugin is already added to list of installed add-ons.
		if ( ! in_array( $plugin, $addons_installed, true ) ) {
			array_push( $addons_installed, $plugin );
			update_option( 'cocart_addons_installed', $addons_installed );
		}
	} // END activate_addon()

	/**
	 * Runs when the plugin is deactivated.
	 *
	 * Removes plugin from list of installed CoCart add-ons.
	 *
	 * @access public
	 */
	public static function deactivate_addon() {
		$addons_installed = get_option( 'cocart_addons_installed', array() );

		$plugin = plugin_basename( COCART_RATE_LIMITING_FILE );

		// Remove plugin from list of installed add-ons.
		if ( in_array( $plugin, $addons_installed, true ) ) {
			$addons_installed = array_diff( $addons_installed, array( $plugin ) );
			update_option( 'cocart_addons_installed', $addons_installed );
		}
	} // END deactivate_addon()

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
