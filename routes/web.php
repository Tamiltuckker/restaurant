<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard/frontend', function () {
    return view('frontend.index');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/Category', [App\Http\Controllers\CategoryController::class,'store'])->name('Category.store');
Route::get('Category/edit/{id}', [App\Http\Controllers\CategoryController::class,'edit'])->name('Category.edit');
Route::put('Category/update/{id}',[App\Http\Controllers\CategoryController::class,'update'])->name('Category.update');
Route::get('/Category/{id}/show', [App\Http\Controllers\CategoryController::class,'show'])->name('Category.show');
Route::get('/Category/delete/{id}', [App\Http\Controllers\CategoryController::class,'destroy'])->name('Category.destroy');
Route::get('/Category/create', [App\Http\Controllers\CategoryController::class,'create'])->name('Category.create');
Route::get('Category/index', [App\Http\Controllers\CategoryController::class,'index'])->name('Category.index');