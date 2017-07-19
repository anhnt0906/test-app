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
        Route::get('view', 'admin\ProductController@index')->name('product.view');
        Route::get('create', 'admin\ProductController@createProduct')->name('product.create');
        Route::post('create', 'admin\ProductController@saveProduct')->name('product.save');
        Route::get('edit/{id}', 'admin\ProductController@editProduct')->where('id', '[0-9]+')->name('product.edit');
        Route::post('edit/{id}', 'admin\ProductController@saveEditProduct')->where('id', '[0-9]+')->name('product.edit.save');
        Route::get('delete/{id}', 'admin\ProductController@deleteProduct')->where('id', '[0-9]+')->name('product.delete');
    });
});
