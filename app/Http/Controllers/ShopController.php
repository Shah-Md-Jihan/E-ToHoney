<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    function shop(){
        return view('shop',[
            'allproducts'=> Product::all(),
            'allcategories'=> Category::all(),
        ]);
    }
}
