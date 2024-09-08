<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ProductsController extends Controller
{
    function products(){
        return view('admin.products.products',
        [
            'categories'=>Category::all()
        ]);
    }
}
