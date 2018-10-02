<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable =['id','title','body_html','vendor','product_type',
    'handle','published_at','template_suffix','tags','published_scope','admin_graphql_api_id'];
    
    public function variants()
    {
      // code...
      return $this->hasMany(Variant::class);
    }
}
