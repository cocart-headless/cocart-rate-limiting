<h1 align="center">CoCart - Rate Limiting</h1>

<p align="center"><img src="https://cocart.xyz/wp-content/uploads/2021/11/cocart-home-default.png.webp" alt="CoCart Logo" /></p>

<br>

Enables the rate limiting feature for [CoCart](https://cocart.xyz/?utm_medium=gh&utm_source=github&utm_campaign=readme&utm_content=cocart) that is available in version **4.0** an up. It is setup so that it can be installed as a standalone WordPress plugin, or included into CoCart as a Composer Package.

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

## License

Released under [GNU General Public License v3.0](http://www.gnu.org/licenses/gpl-3.0.html).

---

## CoCart Channels

We have different channels at your disposal where you can find information about the CoCart project, discuss it and get involved:

[![Twitter: cocartapi](https://img.shields.io/twitter/follow/cocartapi?style=social)](https://twitter.com/cocartapi) [![CoCart GitHub Stars](https://img.shields.io/github/stars/co-cart/co-cart?style=social)](https://github.com/co-cart/co-cart)

<ul>
  <li>📖 <strong>Docs</strong>: this is the place to learn how to use CoCart API. <a href="https://docs.cocart.xyz/#getting-started">Get started!</a></li>
  <li>🧰 <strong>Resources</strong>: this is the hub of all CoCart resources to help you build a headless store. <a href="https://cocart.dev/?utm_medium=gh&utm_source=github&utm_campaign=readme&utm_content=cocart">Get resources!</a></li>
  <li>👪 <strong>Community</strong>: use our Discord chat room to share any doubts, feedback and meet great people. This is your place too to share <a href="https://cocart.xyz/community/?utm_medium=gh&utm_source=github&utm_campaign=readme&utm_content=cocart">how are you planning to use CoCart!</a></li>
  <li>🐞 <strong>GitHub</strong>: we use GitHub for bugs and pull requests, doubts are solved with the community.</li>
  <li>🐦 <strong>Social media</strong>: a more informal place to interact with CoCart users, reach out to us on <a href="https://twitter.com/cocartapi">Twitter.</a></li>
  <li>💌 <strong>Newsletter</strong>: do you want to receive the latest plugin updates and news? Subscribe <a href="https://twitter.com/cocartapi">here.</a></li>
</ul>

---

## Credits

CoCart Rate Limiting is developed and maintained by [Sébastien Dumont](https://github.com/seb86).

Founder of CoCart - [Sébastien Dumont](https://github.com/seb86).

---

Website [sebastiendumont.com](https://sebastiendumont.com) &nbsp;&middot;&nbsp;
GitHub [@seb86](https://github.com/seb86) &nbsp;&middot;&nbsp;
Twitter [@sebd86](https://twitter.com/sebd86)

<p align="center">
    <img src="https://raw.githubusercontent.com/seb86/my-open-source-readme-template/master/a-sebastien-dumont-production.png" width="353">
</p>