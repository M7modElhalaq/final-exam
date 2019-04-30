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

Route::get('/', 'FrontEndController@index')->name('frontIndex');
Route::get('/categories', 'FrontEndController@categories')->name('frontCategories');
Route::get('/product/{id}', 'FrontEndController@product')->name('frontProduct');

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('admin', function (){
        return view('dashboard.index');
    })->name('admin.index');


    /* ################## PRODUCTS ###################*/

    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductController@index')->name('products');
        Route::get('/addProduct', 'ProductController@create')->name('add_product');
        Route::post('/createProduct', 'ProductController@store')->name('create_product');
        Route::get('/editProduct/{id}', 'ProductController@edit')->name('edit_product');
        Route::put('/editProduct/{id}/update', 'ProductController@update')->name('update_product');
        Route::delete('/deleteProduct/{id}', 'ProductController@destroy')->name('delete_product');
    });

    /* ################## PRODUCTS ###################*/

    /* ################## CATEGORIES ###################*/

    Route::prefix('categories')->group(function () {
        Route::get('/', 'CategoryController@index')->name('categories');
        Route::get('/createCategory', 'CategoryController@create')->name('create_category');
        Route::post('/createCategory', 'CategoryController@store')->name('store_category');
        Route::get('/editCategory/{id}', 'CategoryController@edit')->name('edit_category');
        Route::put('/editCategory/{id}/update', 'CategoryController@update')->name('update_category');
        Route::delete('/deleteCategory/{id}', 'CategoryController@destroy')->name('delete_category');
    });

    /* ################## CATEGORIES ###################*/


});
