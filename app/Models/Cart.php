<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['quantity'];
    use HasFactory;
    function relationwithproducttable(){
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
