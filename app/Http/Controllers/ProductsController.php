<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductMultiplePhotos;
use Carbon\Carbon;
use Auth;
use Image;

class ProductsController extends Controller
{
    function products(){
        return view('admin.products.products',
        [
            'categories'=>Category::all(),
            'products'=>Product::paginate(10),
        ]);
    }
    function addproducts(){
        return view('admin.products.add_products',
        [
            'categories'=>Category::all()
        ]);
    }

    function addproductspost(Request $request){

        $request->validate([
            'title'=>'required',
            'descriptions'=>'required',
            'quantity'=> 'required',
            'price'=> 'required',
            'category_id'=>'required',
            'thumbnail_photo'=>'required|image',
        ]);
        $product_id = Product::insertGetId([
            'title'=>$request->title,
            'descriptions'=>$request->descriptions,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
            'thumbnail_photo'=>'default.png',
            'created_at'=>Carbon::now()
        ]);

        $uploaded_product_photo = $request->file('thumbnail_photo');
        $product_photo_name = $product_id.'.'.$uploaded_product_photo->getClientOriginalExtension();
        $product_photo_location = base_path('public/uploads/products/'.$product_photo_name);
        Image::make($uploaded_product_photo)->save($product_photo_location);

        Product::find($product_id)->update([
            'thumbnail_photo'=>$product_photo_name
        ]);

        // Multiple photo upload start

        $flag = 1;
        foreach($request->file('multiple_photo') as $multiple_photo){
            $uploaded_multiple_product_photo = $multiple_photo;
            $product_multiple_photo_name = $product_id.'-'.$flag.'.'.$uploaded_multiple_product_photo->getClientOriginalExtension();
            $product_multiple_photo_location = base_path('public/uploads/product_multiple_photos/'.$product_multiple_photo_name);
            Image::make($uploaded_multiple_product_photo)->save($product_multiple_photo_location);
            $flag++;
            ProductMultiplePhotos::insert([
                'product_id'=>$product_id,
                'photo_name'=>$product_multiple_photo_name,
                'created_at'=>Carbon::now()
            ]);
        }

        //Multiple photo upload end

        return back()->with('product_add_message', 'Your product added successfully!');
    }
}
