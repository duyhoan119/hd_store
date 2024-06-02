<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopingCartController;
use App\Http\Controllers\UserController;
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
    Route::get('/{a?}','index')->name('list');
    Route::get('{id}/{a?}','show')->name('show_detail');
    Route::get('{id}','findByCate')->name('find_by_cate');
});
Route::prefix('news')->controller(NewsController::class)->group(function(){
    Route::get('/{a?}','index')->name('news');
    Route::get('{id}/{a?}','show')->name('new');
    Route::get('{id}','findByCate')->name('find_by_cate_news');
});
Route::view('/contact','Client.contact.index')->name('contact');
Route::get('/',[HomeController::class,'index'])->name('home');
Route::view('/login','Client.login.index')->name('login');
Route::post('/register',[UserController::class,'store'])->name('register');
Route::post('/sign-in',[UserController::class,'login'])->name('sign_in');
Route::get('cart/{user_id}',[ShopingCartController::class,'index'])->name('cart');
