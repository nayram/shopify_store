<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        "id"=>Carbon::now()->timestamp,
        "title"=>$faker->title,
        "body_html"=>$faker->paragraph,
        "product_type"=>"clothes",
        "vendor"=>"MadinaClothing"
    ];
});
