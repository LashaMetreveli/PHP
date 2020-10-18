<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Route::get('/', '\App\Http\Controllers\PageController@getGomePage');
// Route::get('/home', '\App\Http\Controllers\PageController@getGomePage');
// Route::get('/contact', '\App\Http\Controllers\PageController@getContactPage');
// Route::get('/about', '\App\Http\Controllers\PageController@getAboutPage');

Route::get('add-product', function () {
    Product::create([
        'name' => 'Laptop2',
        'price' => 800,
        'category' => "laptops"
    ]);
});


Route::get('product/create', '\App\Http\Controllers\ProductController@createProduct');
Route::get('products', '\App\Http\Controllers\ProductController@viewAllProducts');
Route::post('product/add', '\App\Http\Controllers\ProductController@addNewProduct');
