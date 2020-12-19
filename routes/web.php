<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;


Route::middleware('costum-auth')->prefix('game')->name('game.')->group(function () {
    Route::get('/all', '\App\Http\Controllers\GameController@viewAllGames')->name('all');
    Route::get('/create', '\App\Http\Controllers\GameController@createGame')->name('create');
    Route::post('/add', '\App\Http\Controllers\GameController@addNewGame')->name('add');
    Route::delete('/delete', '\App\Http\Controllers\GameController@deleteGame')->name('delete');
    Route::get('edit', '\App\Http\Controllers\GameController@editGame')->name('edit');
    Route::post('/update', '\App\Http\Controllers\GameController@updateGame')->name('update');
});


Route::name('front.')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('index');
    Route::get('/game/{slug}', [HomeController::class, 'singleGame'])->name('game');
    Route::get('/category/{slug}', [HomeController::class, 'singleCategory'])->name('category');
});

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::resource('/category', CategoryController::class)->except('show', 'create');
    Route::resource('/game', GameController::class)->except('show', 'create');
});

Auth::routes();

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
