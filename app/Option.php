<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //
    public function values()
    {
      // code...
      return $this->hasMany(Value::class);
    }
}
