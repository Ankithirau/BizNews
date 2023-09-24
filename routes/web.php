<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\TagsController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\frontend\FrontendController;

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
Auth::routes();


// Route::get('/admin',[App\Http\Controllers\HomeController::class,'index']);

// Route::get('admin/login',[LoginController::class,'index'])->name('admin.login');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/category',CategoryController::class);
    Route::get('/category-destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
    Route::get('/category-relative',[CategoryController::class,'relative_subcategory'])->name('category.relative');
    Route::resource('/subcategory',SubCategoryController::class);
    Route::get('/subcategory-destroy/{id}',[SubCategoryController::class,'destroy'])->name('subcategory.destroy');
    Route::resource('/posts',PostController::class);
    Route::get('/posts-destroy/{id}',[PostController::class,'destroy'])->name('posts.destroy');
    Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');
    Route::get('/enquiry',[DashboardController::class,'enquiry'])->name('enquiry.index');
    Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
    Route::post('/profile-update',[ProfileController::class,'profileUpdate'])->name('profile.update');
    Route::get('/users',[ProfileController::class,'users'])->name('users.index');
    Route::resource('/tags',TagsController::class);
    Route::resource('/role',RoleController::class);
    Route::get('/tags-delete/{id}',[TagsController::class,'destroy'])->name('tags.destroy');
});

// Route::prefix('/')->middleware('auth')->group(function () {
//     Route::resource('/category',CategoryController::class);
// });

Route::group([], function () {
    // Routes without a prefix
    Route::get('/',[FrontendController::class,'index'])->name('frontend.index');
    Route::get('/contact-us',[ContactController::class,'index'])->name('contact.index');
    Route::post('/contact_us/store',[ContactController::class,'store'])->name('contact.store');
});