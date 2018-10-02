<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('products','ProductsController@getProducts');
Route::post('products','ProductsController@saveProducts');
Route::post('product/save','ProductsController@store');
Route::get('products/kudobuzz','ProductsController@getKudobuzzStore');
