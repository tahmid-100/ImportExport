<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Middleware\CheckRole;

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



Route::middleware(['auth', 'role:admin'])->group(function () {
  Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
  Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
  Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
  Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

  Route::get('/products', [ProductController::class, 'index'])->name('products.index');
  Route::post('/products', [ProductController::class, 'store'])->name('products.store');
  Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
  Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});







