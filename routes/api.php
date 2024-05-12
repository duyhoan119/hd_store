<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopingCartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('category')->controller(CategoryController::class)->group(function(){
    Route::delete('{id}','destroy');
});
Route::prefix('product')->controller(ProductController::class)->group(function(){
    Route::delete('{id}','destroy');
});
Route::prefix('/cart')->controller(ShopingCartController::class)->group(function(){
    Route::post('','store'); 
    Route::delete('{id}','destroy');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
