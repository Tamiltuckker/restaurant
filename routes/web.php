<?php
use App\Http\Controllers\Admin\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

// use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ChangePasswordController;

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
    Route::get('/{user}/impersonate',[App\Http\Controllers\Admin\UserController::class,'impersonate'])->name('users.impersonate');
    Route::get('/leave-impersonate',[App\Http\Controllers\Admin\UserController::class,'leaveImpersonate'])->name('users.leaveimpersonate');
    Route::impersonate();
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('chefs', ChefController::class);
    Route::resource('tags', TagController::class);
    Route::resource('tables', TableController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('bookings', BookingController::class);
});

Route::get('/dashboard/frontend',[App\Http\Controllers\Frontend\HomeController::class,'index'])->name('frontend.dashboard');
Route::get('/category/{slug}',[App\Http\Controllers\Frontend\HomeController::class,'show'])->name('productcategory.show');
Route::get('home', [App\Http\Controllers\Frontend\HomeController::class, 'home'])->name('home');
Route::get('ourteam', [App\Http\Controllers\Frontend\HomeController::class, 'ourteam'])->name('ourteam');
Route::get('about-us', [App\Http\Controllers\Frontend\HomeController::class, 'aboutUs'])->name('about.us');
Route::get('booking', [App\Http\Controllers\Frontend\HomeController::class, 'booking'])->name('booking');
Route::post('bookings', [App\Http\Controllers\Frontend\HomeController::class, 'bookingStore'])->name('booking.store');
Route::get('service', [App\Http\Controllers\Frontend\HomeController::class, 'service'])->name('service');
Route::get('menu', [App\Http\Controllers\Frontend\HomeController::class, 'menu'])->name('menu');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('menu', [App\Http\Controllers\Frontend\UserController::class, 'menu'])->name('menu');

Route::get('changepassword', [App\Http\Controllers\Frontend\ChangePasswordController::class,'index'])->name('changepassword.form');
Route::post('change-password', [App\Http\Controllers\Frontend\ChangePasswordController::class, 'store'])->name('change.password');
Route::get('myprofile', [App\Http\Controllers\Frontend\ChangePasswordController::class, 'view'])->name('myprofile');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});
