<?php

use Illuminate\Support\Facades\Route;

Route::get('/', '\App\Http\Controllers\PageController@getHomePage');

Route::get('/home', '\App\Http\Controllers\PageController@getHomePage');
Route::get('/order', '\App\Http\Controllers\PageController@getOrderPage');
Route::get('/about', '\App\Http\Controllers\PageController@getAboutPage');

// Route::get('/home', '\App\Http\Controllers\PageController@getHomePage');
// Route::get('/contact', '\App\Http\Controllers\PageController@getContactPage');
// Route::get('/about', '\App\Http\Controllers\PageController@getAboutPage');
