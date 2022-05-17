<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ServiceController;
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
    Route::resource('tables', TableController::class);
    Route::resource('services', ServiceController::class);
});

Route::get('/dashboard/frontend',[App\Http\Controllers\Frontend\HomeController::class,'index'])->name('frontend.dashboard');
Route::get('/category/{slug}',[App\Http\Controllers\Frontend\HomeController::class,'show'])->name('productcategory.show');
Route::get('home', [App\Http\Controllers\Frontend\HomeController::class, 'home'])->name('home');
Route::get('ourteam', [App\Http\Controllers\Frontend\HomeController::class, 'ourteam'])->name('ourteam');
Route::get('about-us', [App\Http\Controllers\Frontend\HomeController::class, 'aboutUs'])->name('about.us');
Route::get('bookings', [App\Http\Controllers\Frontend\HomeController::class, 'booking'])->name('booking');
Route::post('bookings', [App\Http\Controllers\Frontend\HomeController::class, 'bookingStore'])->name('booking.store');
Route::get('booking', [App\Http\Controllers\Frontend\HomeController::class, 'booking'])->name('booking');
Route::get('service', [App\Http\Controllers\Frontend\HomeController::class, 'service'])->name('service');
Route::get('menu', [App\Http\Controllers\Frontend\HomeController::class, 'menu'])->name('menu');

