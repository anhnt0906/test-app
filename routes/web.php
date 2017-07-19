<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::prefix('product')->group(function () {
        Route::get('view','admin\Product@index')->name('product.view');
        Route::get('create','admin\Product@createProduct')->name('product.create');
        Route::post('create','admin\Product@saveProduct')->name('product.save');
        Route::get('edit/{$id}','admin\Product@editProduct')->name('product.edit');
        Route::post('edit/{$id}','admin\Product@saveEditProduct')->name('product.edit.save');
    });
});
