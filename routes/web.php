<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\HomeController;



/*
|--------------------------------------------------------------------------
| Web Routes


|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
     return view('welcome');
});

Auth::routes();


Route::prefix('admin')->name('webadmin.')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('chefs', ChefController::class);
    Route::resource('tags', TagController::class);
});
Route::post('/Category', [App\Http\Controllers\CategoryController::class,'store'])->name('Category.store');
Route::get('Category/edit/{id}', [App\Http\Controllers\CategoryController::class,'edit'])->name('Category.edit');
Route::put('Category/update/{id}',[App\Http\Controllers\CategoryController::class,'update'])->name('Category.update');
Route::get('/Category/{id}/show', [App\Http\Controllers\CategoryController::class,'show'])->name('Category.show');
Route::delete('/Category/delete/{id}', [App\Http\Controllers\CategoryController::class,'destroy'])->name('Category.destroy');
Route::get('/Category/create', [App\Http\Controllers\CategoryController::class,'create'])->name('Category.create');
Route::get('Category/index', [App\Http\Controllers\CategoryController::class,'index'])->name('Category.index');





Route::get('/dashboard/frontend',[App\Http\Controllers\Frontend\HomeController::class,'index'])->name('frontend.dashboard');
Route::get('/category/{id}/show',[App\Http\Controllers\Frontend\HomeController::class,'show'])->name('productcategory.show');




