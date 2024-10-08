<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductMultiplePhotos;

class FrontendController extends Controller
{
    function index(){
        return view('index',[
            'categories'=> Category::all(),
            'products'=> Product::latest()->get()
        ]);
    }

    function productdetail($product_id){
        $product_info = Product::find($product_id);
        $category_id = Product::find($product_id)->category_id;
        $related_products = Product::where('category_id', $category_id)->where('id', '!=', $product_id)->latest()->limit(4)->get();
        $multiple_photos = ProductMultiplePhotos::where('product_id', $product_id)->get();
        return view('product_detail', compact('product_info', 'related_products', 'multiple_photos'));
    }
}
