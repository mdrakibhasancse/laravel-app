<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ReviewController;
use App\Http\Middleware\OnlyAdmin;
use Illuminate\Support\Facades\Route;





Route::get('/',[HomeController::class,'index']);
Route::get('/single_product/{id}',[HomeController::class,'single_product']);
Route::get('/search',[HomeController::class,'search']);
Route::post('/search_ajax',[HomeController::class,'searchAjax']);

Route::get('/cart_product/{id}',[CartController::class,'cart_product']);
Route::get('/checkout',[CartController::class,'checkout']);
Route::get('/cart/remove/{id}',[CartController::class,'cartRemove']);
Route::get('/cart/add_one_product/{id}',[CartController::class,'add_one_product']);
Route::get('/cart/remove_one_product/{id}',[CartController::class,'remove_one_product']);
Route::post('/product_review',[ReviewController::class,'store']);




Route::prefix('/admin')->middleware(['auth',OnlyAdmin::class])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
});






require __DIR__.'/auth.php';
