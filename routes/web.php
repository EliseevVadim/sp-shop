<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
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
    return view('home');
});

Route::get('/search/{word}', [ProductController::class, "searchProducts"])->name('searchProduct');

Route::get('/initialProducts', [ProductController::class, "loadInitialProducts"])->name('initialProducts');

Route::get('/allCategories', [CategoriesController::class, "loadAllCategories"])->name('allCategories');

Route::get('/searchByCategory/{id}', [ProductController::class, "loadProductsByCategoryId"])->name('searchByCategory');

Route::post('/addOrder', [OrdersController::class, "addOrder"])->name('addOrder');
