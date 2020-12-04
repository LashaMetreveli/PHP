<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;

Route::name('front.')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('index');
    Route::get('/post/{slug}', [HomeController::class, 'singlePost'])->name('post');
    Route::get('/category/{slug}', [HomeController::class, 'singleCategory'])->name('category');
});

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::resource('/category', CategoryController::class)->except('show', 'create');
    Route::resource('/post', PostController::class)->except('show');
});


Route::middleware('costum-auth')->prefix('products')->name('product.')->group(function () {
    Route::get('/all', '\App\Http\Controllers\ProductController@viewAllProducts')->name('all');
    Route::post('/add', '\App\Http\Controllers\ProductController@addNewProduct')->name('add');
    Route::post('/delete', '\App\Http\Controllers\ProductController@deleteProduct')->name('delete');
    Route::get('edit/{id}', '\App\Http\Controllers\ProductController@editProduct')->name('edit');
    Route::post('/update/{id}', '\App\Http\Controllers\ProductController@updateProduct')->name('update');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('custom/register', [App\Http\Controllers\AuthorisationController::class, 'register'])->name(
    'auth.custom.register'
)->middleware('guest');
Route::post('custom/login', [App\Http\Controllers\AuthorisationController::class, 'login'])->name(
    'auth.custom.login'
)->middleware('guest');
Route::post('custom/reset', [App\Http\Controllers\AuthorisationController::class, 'reset'])->name(
    'auth.custom.reset'
)->middleware('guest');
Route::post('custom/logout', [App\Http\Controllers\AuthorisationController::class, 'logout'])->name(
    'auth.custom.logout'
)->middleware('auth');


Route::get('testFunctions', function () {
    // dump(10, $_GET, ['some_key' => 'some p']);
    // dd(Product::first(), "some war");
    // dump(Product::first());
    // dd(asset('css/app.css'));
    // dd(secure_asset('css/app.css'));
    // dump(route('product.all'));
    // dump(app('auth'));
    dd(Route::has('product.all'));
});
