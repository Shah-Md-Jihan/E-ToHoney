<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
// use CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Category controller routes 
Route::get('/add/category', [CategoryController::class, 'addCategory'])->name('addcategory');
Route::post('/add/category/post', [CategoryController::class, 'categorypost'])->name('postcategory');
Route::get('/update/category/{category_id}', [CategoryController::class, 'updatecategory']);
Route::post('/update/category/post', [CategoryController::class, 'updatecategorypost']);
Route::get('/delete/{category_id}', [CategoryController::class, 'deletecategory']);
Route::get('/restore/category/{category_id}', [CategoryController::class, 'restorecategory']);
Route::get('/hard/delete/{category_id}', [CategoryController::class, 'harddeletecategory']);