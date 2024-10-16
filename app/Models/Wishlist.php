<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    function connectionwithproduct(){
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
