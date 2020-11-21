<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::middleware('costum-auth')->name('product.')->group(function () {
    Route::get('products', '\App\Http\Controllers\ProductController@viewAllProducts')->name('all');
    Route::post('product/add', '\App\Http\Controllers\ProductController@addNewProduct')->name('add');
    Route::post('product/delete', '\App\Http\Controllers\ProductController@deleteProduct')->name('delete');
    Route::get('product/edit/{id}', '\App\Http\Controllers\ProductController@editProduct')->name('edit');
    Route::post('product/update/{id}', '\App\Http\Controllers\ProductController@updateProduct')->name('update');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('costum/register', [App\Http\Controllers\AuthorisationController::class, 'register'])->name(
    'auth.costum.register'
)->middleware('guest');
Route::post('costum/login', [App\Http\Controllers\AuthorisationController::class, 'login'])->name(
    'auth.costum.login'
)->middleware('guest');
Route::post('costum/reset', [App\Http\Controllers\AuthorisationController::class, 'reset'])->name(
    'auth.costum.reset'
)->middleware('guest');
Route::post('costum/logout', [App\Http\Controllers\AuthorisationController::class, 'logout'])->name(
    'auth.costum.logout'
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
