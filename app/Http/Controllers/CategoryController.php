<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Auth;

class CategoryController extends Controller
{
    function addCategory(){
        $categories = Category::latest()->simplePaginate(5);
        $deleted_categories = Category::onlyTrashed()->latest()->simplePaginate(5);
        return view('admin.add_category', compact('categories', 'deleted_categories'));
    }

    function categorypost(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ],
        [
            'category_name.required' => 'Please insert a category name!',
            'category_name.unique' => 'The category name is already taken!'
        ]);

        Category::insert([
            'category_name'=>$request->category_name,
            'admin_id'=>Auth::user()->id,
            'created_at'=>Carbon::now()
        ]);
        
        return back()->with('category_add_message', 'Your Category Added Successfully!');
    }

    function updatecategory($category_id){
        $category_name = Category:: find($category_id)->category_name;
        return view('admin.update_category', compact('category_name','category_id'));
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
        Category::onlyTrashed()->find($category_id)->forceDelete();
        return back()->with('category_force_delete_status', 'Category permanently deleted!');
    }

}
