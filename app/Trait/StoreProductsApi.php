<?php
namespace App\Trait;

use GuzzleHttp\Client;

/**
 *
 */
trait StoreProductApi
{

  public function fetch_store_products()
  {
    // code...
    $client = new Client(['http_errors' => false]);
    $response = $client->request("GET", "https://3c52d2afe45f8ddc906151993f6fd5b7:f9ea936e7c72d9871ba07484213e9521@madinaclothing.myshopify.com/admin/products.json");
    return $response;
  }


}
 ?>
