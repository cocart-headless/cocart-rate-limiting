<h1 align="center">CoCart - Rate Limiting</h1>

<p align="center">
	<a href="https://github.com/cocart-headless/cocart-rate-limiting/blob/master/LICENSE.md" target="_blank">
		<img src="https://img.shields.io/badge/license-GPL--3.0%2B-red.svg" alt="Licence">
	</a>
	<a href="https://wordpress.org/plugins/cocart-rate-limiting/">
		<img src="https://img.shields.io/wordpress/plugin/dt/cocart-rate-limiting.svg" alt="WordPress Plugin Downloads">
	</a>
</p>

Enables the rate limiting feature for [CoCart](https://cocartapi.com/?utm_medium=gh&utm_source=github&utm_campaign=readme&utm_content=cocart) that is available in **CoCart Plus** and up. It is setup so that it can be installed as a standalone WordPress plugin, or included into CoCart as a Composer Package.

## Setup

Once you have the plugin installed and activated you will have the default options applied.

You can if you want change any of the options via your `wp-config.php` file.

### Constants

These are the constants to use in your `wp-config.php` which will override the default values.

```php
define( 'COCART_RATE_LIMITING_ENABLED', true );
define( 'COCART_RATE_LIMITING_PROXY_SUPPORT', false );
define( 'COCART_RATE_LIMITING_LIMIT', 25 );
define( 'COCART_RATE_LIMITING_SECONDS', 10 );
```

[[See guide on Rate Limiting](https://github.com/co-cart/co-cart/blob/dev/docs/rate-limit-guide.md#proxy-standard-support)] for more advanced setup.

### Really restricted

If you want to restrict the rate limit even further to **1 request** per **60 seconds** for specified routes, then you can use this filter `cocart_rate_limit_restricted_request_patterns`.

```php
add_filter( 'cocart_rate_limit_restricted_request_patterns' function() {
  return array(
    '#^/cocart/v2/checkout?#'
  );
});
```

---

## CoCart Channels

We have different channels at your disposal where you can find information about the CoCart project, discuss it and get involved:

[![Twitter: cocartapi](https://img.shields.io/twitter/follow/cocartapi?style=social)](https://twitter.com/cocartapi) [![CoCart Github Stars](https://img.shields.io/github/stars/co-cart/co-cart?style=social)](https://github.com/co-cart/co-cart)

<ul>
  <li>📖 <strong>Docs</strong>: this is the place to learn how to use CoCart API. <a href="https://docs.cocart.xyz/#getting-started">Get started!</a></li>
  <li>🧰 <strong>Resources</strong>: this is the hub of all CoCart resources to help you build a headless store. <a href="https://cocart.dev/?utm_medium=repo&utm_source=github.com&utm_campaign=readme&utm_content=cocartratelimiting">Get resources!</a></li>
  <li>👪 <strong>Community</strong>: use our Discord chat room to share any doubts, feedback and meet great people. This is your place too to share <a href="https://cocartapi.com/community/?utm_medium=repo&utm_source=github.com&utm_campaign=readme&utm_content=cocartratelimiting">how are you planning to use CoCart!</a></li>
  <li>🐞 <strong>GitHub</strong>: we use GitHub for bugs and pull requests, doubts are solved with the community.</li>
  <li>🐦 <strong>Social media</strong>: a more informal place to interact with CoCart users, reach out to us on <a href="https://twitter.com/cocartapi">Twitter.</a></li>
  <li>💌 <strong>Newsletter</strong>: do you want to receive the latest plugin updates and news? Subscribe <a href="https://twitter.com/cocartapi">here.</a></li>
</ul>

---

## License

Released under [GNU General Public License v3.0](http://www.gnu.org/licenses/gpl-3.0.html).

## Credits

Website [cocartapi.com](https://cocartapi.com) &nbsp;&middot;&nbsp;
GitHub [@co-cart](https://github.com/co-cart) &nbsp;&middot;&nbsp;
Twitter [@cocartapi](https://twitter.com/cocartapi)

---

CoCart is developed and maintained by [Sébastien Dumont](https://github.com/seb86).
Founder of [CoCart Headless, LLC](https://github.com/cocart-headless).

Website [sebastiendumont.com](https://sebastiendumont.com) &nbsp;&middot;&nbsp;
GitHub [@seb86](https://github.com/seb86) &nbsp;&middot;&nbsp;
Twitter [@sebd86](https://twitter.com/sebd86)
