<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tests\Mocks\StoreProductsApi;
use App\Product;
use Validator;
class ProductsController extends Controller
{
    //

    public function getProducts()
    {
      // code...
      $response=StoreProductsApi::fetch_store_products();
      return json_decode($response->getBody()->getContents(),true);
    }

    public function saveProducts()
    {
      $response=StoreProductsApi::fetch_store_products();
      $products=json_decode($response->getBody()->getContents(),true);

      $products=$products['products'];
      foreach ($products as $product) {
        // code...
        $validator = Validator::make($product, [
            'id' => 'required|unique:products',
        ]);
        if (!$validator->fails()) {
              $result=Product::create($product);
        }
      }

      return Product::all();
    }


    public function store(Request $request)
    {
      // code...
      $product = array('product' =>$request->all());
      $response=StoreProductsApi::save_product_on_shopify($product)->wait();
      $product= $response->getBody();
      $product= $product->getContents();

      // var_dump($product);
     $product=json_decode($product,TRUE);
     $product= $product['product'];
      // return $product->toArray();
      $validator = Validator::make($product, [
          'id' => 'required|unique:products',
      ]);

      if (!$validator->fails()) {
        // code...
        $result=Product::create($product);
        return response()->json(['product'=>$result]);
      }
      return response()->json(['error'=>'failed to save data'],400);
    }

    public function getKudobuzzStore()
    {
      // code...
      return response()->json(['data'=>Product::all()]); 
    }


}
