<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\ProductController;
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
});

Route::get('/dashboard/frontend',[App\Http\Controllers\Frontend\HomeController::class,'index'])->name('frontend.dashboard');
Route::get('/category/{slug}',[App\Http\Controllers\Frontend\HomeController::class,'show'])->name('productcategory.show');
Route::get('home', [App\Http\Controllers\Frontend\HomeController::class, 'home'])->name('home');
Route::get('ourteam', [App\Http\Controllers\Frontend\HomeController::class, 'ourteam'])->name('ourteam');
Route::get('about-us', [App\Http\Controllers\Frontend\HomeController::class, 'aboutUs'])->name('about.us');
Route::get('booking', [App\Http\Controllers\Frontend\HomeController::class, 'booking'])->name('booking');
