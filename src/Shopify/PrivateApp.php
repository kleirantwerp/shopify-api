<?php

namespace Shopify;

/**
 * Class PrivateApp
 *
 * @package Shopify
 *
 * Used for Private Apps where access_token isn't required.
 */
class PrivateApp extends Client {

  /**
   * Private app credentials.
   * See: [your-domain].myshopify.com/admin/apps/private
   *
   * @param string $shop_domain
   *   Shopify domain.
   * @param string $access_token
   *   Shopify Access token.
   * @param array $opts
   *   Default options to set.
   */
  public function __construct($shop_domain, $access_token, array $opts = []) {
    $this->shop_domain = $shop_domain;
    $this->client_type = 'private';

    if (isset($opts['version'])) {
      $this->version = $opts['version'];
      unset($opts['version']);
    }
    $opts['headers']['X-Shopify-Access-Token'] = $access_token;

    $opts['base_uri'] = $this->getApiUrl();
    $this->client = $this->getNewHttpClient($opts);
  }
}
