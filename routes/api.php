<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/',function()
// {
//    return view('welcome');
// });
// Route::get('/',[ProductController::class,'index'])->name('product.index');
// Route::prefix('users')->group(function () {
//     Route::get('/create-products',[ProductController::class,'create'])->name('product.create');
//     Route::get('/edit-products/{id}',[ProductController::class,'edit'])->name('product.edit');
//     Route::get('/show-products',[ProductController::class,'show'])->name('product.show');
//     Route::post('/store-products',[ProductController::class,'store'])->name('product.store');
//     Route::put('/update-products/{id}',[ProductController::class,'update'])->name('product.update');
//     Route::get('/destroy-products/{id}',[ProductController::class,'destroy'])->name('product.destroy');
//     Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('cart.addToCart');
//     Route::get('/checkout',[CartController::class,'checkout'])->name('cart.checkout');
// });
// Route::group(['prefix'=>'prac'],function ()
// {
//     Route::get('/',function ()
//     {
//         return view('sample');
//     });
//     Route::get('/',[PracticeController::class,'index']);
// });
