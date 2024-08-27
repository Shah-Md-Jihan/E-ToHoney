<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Auth;
use Image;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function addCategory(){
        $categories = Category::latest()->simplePaginate(5);
        $deleted_categories = Category::onlyTrashed()->latest()->simplePaginate(5);
        return view('admin.add_category', compact('categories', 'deleted_categories'));
    }

    function categorypost(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
            'category_photo' => 'required|image',
        ],
        [
            'category_name.required' => 'Please insert a category name!',
            'category_name.unique' => 'The category name is already taken!',
            'category_photo.image' => 'Please select an image',
        ]);

        $category_id = Category::insertGetId([
            'category_name'=>$request->category_name,
            'category_photo'=>'default.php',
            'admin_id'=>Auth::user()->id,
            'created_at'=>Carbon::now()
        ]);

        $uploaded_photo = $request->file('category_photo');
        $category_photo_name = $category_id.'.'.$uploaded_photo->getClientOriginalExtension();
        $category_photo_location = base_path('public/uploads/categories/'.$category_photo_name);
        Image::make($uploaded_photo)->save($category_photo_location);

        Category::find($category_id)->update([
            'category_photo'=>$category_photo_name
        ]);
        
        return back()->with('category_add_message', 'Your Category Added Successfully!');
    }

    function updatecategory($category_id){
        $category_name = Category:: find($category_id)->category_name;
        $current_category_photo_name = Category::find($category_id)->category_photo;
        return view('admin.update_category', compact('category_name','category_id','current_category_photo_name'));
    }

    function updatecategorypost(Request $request){
        $updated_category_name = $request->category_name;
        Category::find($request->category_id)->update([
            'category_name' => $updated_category_name 
        ]);

        return redirect('add/category')->with('category_update_message', 'Category updated successfully');
    }

    function deletecategory($category_id){
        Category::find($category_id)->delete();
        return back()->with('category_delete_status', 'Category deleted successfully!');

    }

    function restorecategory($category_id){
    
     Category::withTrashed()->find($category_id)->restore();
     return back()->with('category_restore_status', 'Category restored successfully!');

    }

    function harddeletecategory($category_id){

        $category_category_photo_location = base_path('public/uploads/categories/'.Category::onlyTrashed()->find($category_id)->category_photo);
        Category::onlyTrashed()->find($category_id)->forceDelete();
        unlink($category_category_photo_location);
        return back()->with('category_force_delete_status', 'Category permanently deleted!');
    }

}
