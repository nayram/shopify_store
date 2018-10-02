<?php

namespace Tests\Mocks;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 *
 */
class StoreProductsApi
{


  public function __construct()
  {

  }

  public static function fetch_store_products()
  {
    // code...
    $apiClient = new Client(['http_errors' => false]);
    $response=$apiClient->get("https://3c52d2afe45f8ddc906151993f6fd5b7:f9ea936e7c72d9871ba07484213e9521@madinaclothing.myshopify.com/admin/products.json?limit=10",[
      'Content-Type'=>'application/json'
    ]);
    // $response = $client->request("GET", "https://3c52d2afe45f8ddc906151993f6fd5b7:f9ea936e7c72d9871ba07484213e9521@madinaclothing.myshopify.com/admin/products.json");
    return $response;
  }

  public static function save_product_on_shopify($product)
  {
    $apiClient = new Client(['http_errors' => false]);
    $response=$apiClient->postAsync("https://3c52d2afe45f8ddc906151993f6fd5b7:f9ea936e7c72d9871ba07484213e9521@madinaclothing.myshopify.com/admin/products.json?limit=10", array(
      'json' => $product
    ));
    return $response;
  }


}
 ?>
