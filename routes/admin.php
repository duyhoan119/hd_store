<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::prefix('/product')->group(function(){
    Route::get('/',[ProductController::class ,'index'])->name('products');
    Route::post('/',[ProductController::class ,'create'])->name('create_product');
    Route::view('/create','admin.category.create')->name('create_product_view');
    Route::post('/edit/{id}',[ProductController::class ,'update'])->name('save_product');
    Route::get('/edit/{id}',[ProductController::class,'show'])->name('edit_product');
});
