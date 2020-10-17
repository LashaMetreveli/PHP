<?php

use Illuminate\Support\Facades\Route;

Route::get('/', '\App\Http\Controllers\PageController@getGomePage');
Route::get('/home', '\App\Http\Controllers\PageController@getGomePage');
Route::get('/contact', '\App\Http\Controllers\PageController@getContactPage');
Route::get('/about', '\App\Http\Controllers\PageController@getAboutPage');
