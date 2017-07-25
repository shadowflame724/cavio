<?php

/*
* Goods Management
*/
Route::group(['namespace' => 'Product'], function () {
    Route::resource('product', 'ProductController', ['except' => ['show']]);
    Route::get('product/slug/{slug}', 'ProductController@getBySlug');

    //For DataTables
    Route::post('product/get', 'ProductTableController')->name('product.get');
});
