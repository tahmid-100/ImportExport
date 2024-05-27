<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminDashboardController;

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

/*Route::get('/', function () {
  return view('welcome');
});*/


Route::get('/account/login', [LoginController::class, 'index'])->name('account.login');
Route::get('/account/register', [LoginController::class, 'register'])->name('account.register');
Route::post('/account/authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');

Route::get('/account/logout', [LoginController::class, 'logout'])->name('account.logout');

Route::post('/account/process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');



Route::get('/account/dashboard', [DashboardController::class, 'index'])
->name('account.dashboard')
->middleware('role:customer');
     Route::get('/account/profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('role:customer');
    Route::put('/account/profile/update-name', [ProfileController::class, 'updateName'])->name('profile.updateName')->middleware('role:customer');
    Route::put('/account/profile/update-email', [ProfileController::class, 'updateEmail'])->name('profile.updateEmail')->middleware('role:customer');
    Route::put('/account/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword')->middleware('role:customer');
    Route::put('/account/profile/update-phone', [ProfileController::class, 'updatePhone'])->name('profile.updatePhone')->middleware('role:customer');
    Route::put('/account/profile/update-image', [ProfileController::class, 'updateImage'])->name('profile.updateImage')->middleware('role:customer');
  

    Route::get('/cart/add', [CartController::class, 'addToCart'])->name('cart.add')
    ->middleware('role:customer');   //->->
    Route::get('/account/cart', [CartController::class, 'index'])->name('my.cart')
    ->middleware('role:customer');
    Route::delete('/cart/delete/{cartItem}', [CartController::class, 'delete'])->name('cart.delete')
    ->middleware('role:customer');
   
Route::post('/cart/buy/{cartItem}', [OrderController::class, 'buy'])->name('cart.buy')
->middleware('role:customer');



Route::middleware(['auth', 'role:admin'])->group(function () {
  Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
  Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
  Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
  Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

  Route::get('/products', [ProductController::class, 'index'])->name('products.index');
  Route::post('/products', [ProductController::class, 'store'])->name('products.store');
  Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
  Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
  // In your routes file (web.php)
Route::get('/customers', [AdminController::class, 'showCustomers'])->name('admin.customers');
Route::delete('/customers/{id}', [AdminController::class, 'destroy'])->name('customers.destroy');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');


});







