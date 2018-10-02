<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Mocks\StoreProductsApi;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Symfony\Component\Process\Process;
use GuzzleHttp\Client;
use Tests\Mocks\GuzzleMocked;
use GuzzleHttp\HandlerStack;
use \PHPCouchDB\Server;
use App\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

     use GuzzleMocked;
     use DatabaseMigrations;

    public function testExample()
    {
        $this->assertTrue(true);
    }

public function test_it_returns_200()
{
    $response=StoreProductsApi::fetch_store_products();
    $this->assertEquals(200, $response->getStatusCode());
}

public function test_it_has_products_in_json()
{
  // code...
  $responseData=file_get_contents(__DIR__ . '/admin/products.json');
  $responseData = json_decode($responseData, TRUE);
  $statusCode = 200;
  $products= $this->createMockResponse($responseData, $statusCode);
  $products=json_decode($products->getBody()->getContents(),true);
  $products=$products['products'];
  $this->assertCount(10,$products);
}

public function test_save_shopify_store_products_to_kudobuzz()
{
  // code...
  $responseData=file_get_contents(__DIR__.'/admin/products.json');
  $responseData = json_decode($responseData, TRUE);
  $statusCode = 200;
  $products= $this->createMockResponse($responseData, $statusCode);
  $products=json_decode($products->getBody()->getContents(),true);
  $products=$products['products'];
  foreach ($products as $product) {
    // code...
    $result=Product::create($product);
    if ($result) {
      // code...
      $this->assertTrue(true);
    }else $this->assertTrue($result);

  }


}

public function test_create_new_product_on_shopify()
{
  // code...
  $product=factory(Product::class)->create();
  $response=$this->post('/api/product/save',$product->toArray());
  $response->assertSee($product->title);
}

public function test_it_gets_products_in_kudobuzz()
{
  $product=factory(Product::class,5)->create();
  $response=$this->get('/api/product/kudobuzz',$product->toArray());

  $this->assertNotEmpty($product);
}

}
