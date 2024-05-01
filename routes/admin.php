<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/

Route::prefix('/category')->group(function(){
    Route::get('/',[CategoryController::class ,'index'])->name('categories');
    Route::post('/',[CategoryController::class ,'create'])->name('create_category');
    Route::view('/create','admin.category.create')->name('create_category_view');
    Route::post('/edit/{id}',[CategoryController::class ,'update'])->name('save_category');
    Route::get('/edit/{id}',[CategoryController::class,'show'])->name('edit_category');
});

Route::prefix('/product')->controller(ProductController::class )->group(function(){
    Route::get('/','index')->name('products');
    Route::get('/create','create')->name('create_product_view');
    Route::post('/','store')->name('create_product');
    Route::post('/edit/{id}' ,'update')->name('save_product');
    Route::get('/edit/{id}','show')->name('edit_product');
});
