<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;


Route::get('/', [FrontendController::class, 'index']);
Route::get('/product/details/{product_id}', [FrontendController::class, 'productdetail']);

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['verified']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);

// Category controller routes 
Route::get('/add/category', [CategoryController::class, 'addCategory'])->name('addcategory');
Route::post('/add/category/post', [CategoryController::class, 'categorypost'])->name('postcategory');
Route::get('/update/category/{category_id}', [CategoryController::class, 'updatecategory']);
Route::post('/update/category/post', [CategoryController::class, 'updatecategorypost']);
Route::get('/delete/{category_id}', [CategoryController::class, 'deletecategory']);
Route::get('/restore/category/{category_id}', [CategoryController::class, 'restorecategory']);
Route::get('/hard/delete/{category_id}', [CategoryController::class, 'harddeletecategory']);

// Profile Controller Route
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/post', [ProfileController::class, 'profilepost']);
Route::post('/password/post', [ProfileController::class, 'passwordpost']);


// ProductsController Routes
Route::get('/products', [ProductsController::class, 'products']);
Route::get('add/products', [ProductsController::class, 'addproducts']);
Route::post('add/products/post', [ProductsController::class, 'addproductspost']);


// ShopController Routes
Route::get('/shop', [ShopController::class, 'shop']);