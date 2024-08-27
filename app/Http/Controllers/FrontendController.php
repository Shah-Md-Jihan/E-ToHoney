<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class FrontendController extends Controller
{
    function index(){
        return view('index',[
            'categories'=>Category::all()
        ]);
    }
}
