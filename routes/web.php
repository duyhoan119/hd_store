<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopingCartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('contact')->controller(ContactController::class)->group(function(){
    Route::get('/getall','index');
});

Route::prefix('product')->controller(ProductController::class)->group(function(){
    Route::get('{id}/{a?}','show')->name('show_detail');
});
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('cart/{user_id}',[ShopingCartController::class,'index'])->name('cart');
