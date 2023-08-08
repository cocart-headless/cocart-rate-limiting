=== CoCart - Rate Limiting ===
Author URI: https://sebastiendumont.com
Plugin URI: https://cocart.xyz
Contributors: cocartforwc, sebd86
Tags: woocommerce, rest-api, decoupled, headless, rate-limit
Requires at least: 5.6
Requires PHP: 7.4
Tested up to: 6.3
Stable tag: 1.0.1
WC requires at least: 6.4
WC tested up to: 7.9
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Enables the rate limiting feature for CoCart.

== Description ==

This free add-on for [CoCart](https://wordpress.org/plugins/cart-rest-api-for-woocommerce/) enables the rate limiting feature available in version **4.0** an up.

Simply install and activate. **No configuration required!**

But if you want, you can change any of the options via your `wp-config.php` file.

★★★★★
> An excellent plugin, which makes building a headless WooCommerce experience a breeze. Easy to use, nearly zero setup time. [Harald Schneider](https://wordpress.org/support/topic/excellent-plugin-8062/)

### Constants

These are the constants to use in your `wp-config.php` which will override the default values.

`
define( 'COCART_RATE_LIMITING_ENABLED', true );
define( 'COCART_RATE_LIMITING_PROXY_SUPPORT', false );
define( 'COCART_RATE_LIMITING_LIMIT', 25 );
define( 'COCART_RATE_LIMITING_SECONDS', 10 );
`

[[See guide on Rate Limiting](https://github.com/co-cart/co-cart/blob/dev/docs/rate-limit-guide.md#proxy-standard-support)] for more advanced setup.

## 🧰 Tools and Libraries

* **[CoCart Beta Tester](https://github.com/co-cart/cocart-beta-tester)** allows you to easily update to prerelease versions of CoCart Lite for testing and development purposes.
* **[CoCart VSCode](https://github.com/co-cart/cocart-vscode)** extension for Visual Studio Code adds snippets and autocompletion of functions, classes and hooks.
* **[CoCart Product Support Boilerplate](https://github.com/co-cart/cocart-product-support-boilerplate)** provides a basic boilerplate for supporting a different product types to add to the cart with validation including adding your own parameters.
* **[CoCart Cart Callback Example](https://github.com/co-cart/cocart-cart-callback-example)** provides you an example of registering a callback that can be triggered when updating the cart.
* **[CoCart Tweaks](https://github.com/co-cart/co-cart-tweaks)** provides a starting point for developers to tweak CoCart to their needs.

★★★★★
> Amazing Plugin. I’m using it to create a react-native app with WooCommerce as back-end. This plugin is a life-saver! [Daniel Loureiro](https://wordpress.org/support/topic/amazing-plugin-1562/)

#### 👍 Add-ons to further enhance CoCart

We also have other add-ons that extend CoCart to enhance your development and your customers shopping experience.

* **[CoCart - CORS](https://wordpress.org/plugins/cocart-cors/)** enables support for CORS to allow CoCart to work across multiple domains. - **FREE**
* **[CoCart - Cart Enhanced](https://wordpress.org/plugins/cocart-get-cart-enhanced/)** enhances the data returned for the cart and the items added to it. - **FREE**
* **[CoCart - JWT Authentication](https://wordpress.org/plugins/cocart-cors/)** provides JWT authentication for CoCart.

### ⌨️ Join our growing community

A Discord community for developers, WordPress agencies and shop owners building the fastest and best headless WooCommerce stores with CoCart.

[Join our community](https://cocart.xyz/community/?utm_medium=wp.org&utm_source=wordpressorg&utm_campaign=readme&utm_content=cocart)

### 🐞 Bug reports

Bug reports for CoCart - Rate Limiting Support are welcomed in the [CoCart - Rate Limiting repository on GitHub](https://github.com/co-cart/cocart-rate-limiting/issues). Please note that GitHub is not a support forum, and that issues that aren’t properly qualified as bugs will be closed.

### More information

* The [CoCart plugin](https://cocart.xyz/?utm_medium=wp.org&utm_source=wordpressorg&utm_campaign=readme&utm_content=cocart) official website.
* The CoCart [Documentation](https://docs.cocart.xyz/)
* [Subscribe to updates](http://eepurl.com/dKIYXE)
* Like, Follow and Star on [Facebook](https://www.facebook.com/cocartforwc/), [Twitter](https://twitter.com/cocartapi), [Instagram](https://www.instagram.com/co_cart/) and [GitHub](https://github.com/co-cart/co-cart)

#### 💯 Credits

This plugin is created by [Sébastien Dumont](https://sebastiendumont.com).

== Installation ==

= Minimum Requirements =

* WordPress v5.6
* WooCommerce v6.3
* PHP v7.4
* CoCart v4.0.0

= Recommended Requirements =

* WordPress v6.0 or higher.
* WooCommerce v7.0 or higher.
* PHP v8.0 or higher.

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don’t need to leave your web browser. To do an automatic install of CoCart - Rate Limiting Support, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type "CoCart" and click Search Plugins. Once you’ve found the plugin you can view details about it such as the point release, rating and description. Most importantly of course, you can install it by simply clicking "Install Now".

= Manual installation =

The manual installation method involves downloading the plugin and uploading it to your webserver via your favourite FTP application. The WordPress codex contains [instructions on how to do this here](https://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).

= Updating =

Automatic updates should work like a charm; as always though, ensure you backup your site just in case.

== Changelog ==

[View the full changelog here](https://github.com/co-cart/cocart-rate-limiting/blob/master/CHANGELOG.md).
