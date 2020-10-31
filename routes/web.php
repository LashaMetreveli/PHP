<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Route::get('add-product', function () {
//     Product::create([
//         'name' => 'Laptop2',
//         'price' => 800,
//         'category' => "laptops"
//     ]);
// });


Route::get('products', '\App\Http\Controllers\ProductController@viewAllProducts')->name('product.all');
Route::post('product/add', '\App\Http\Controllers\ProductController@addNewProduct')->name('product.add');
Route::post('product/delete', '\App\Http\Controllers\ProductController@deleteProduct')->name('product.delete');
Route::get('product/edit/{id}', '\App\Http\Controllers\ProductController@editProduct')->name('product.edit');
Route::post('product/update/{id}', '\App\Http\Controllers\ProductController@updateProduct')->name('product.update');

// Route::get('test', function () {
//     foreach (range(0, 500) as $r) {
//         Product::create([
//             'name' => 'product ' . uniqid() . ' ' . $r,
//             'price' => rand(1000, 5000),
//             'category' => 'laptop',

//         ]);
//     }
// });
