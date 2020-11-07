<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('testFunctions', function () {
    // dump(10, $_GET, ['some_key' => 'some p']);
    // dd(Product::first(), "some war");
    // dump(Product::first());
    // dd(asset('css/app.css'));
    // dd(secure_asset('css/app.css'));
    // dump(route('product.all'));
    dump(app('auth'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('costum/register', [App\Http\Controllers\AuthorisationController::class, 'register'])->name(
    'auth.costum.register'
);
Route::get('costum/login', [App\Http\Controllers\AuthorisationController::class, 'login'])->name(
    'auth.costum.login'
);
Route::get('costum/reset', [App\Http\Controllers\AuthorisationController::class, 'reset'])->name(
    'auth.costum.reset'
);
