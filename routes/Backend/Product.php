<?php

/*
* Goods Management
*/
Route::group(['namespace' => 'Product'], function () {
    Route::resource('product', 'ProductController', ['except' => ['show']]);
    Route::get('product/slug/{slug}', 'ProductController@getBySlug');
    Route::get('product/full-data', 'ProductController@indexFull')->name('product.fullDataIndex');
    Route::get('product/duplicate/{product}', 'ProductController@duplicateProduct')->name('product.duplicate');


    //For DataTables
    Route::post('product/get', 'ProductTableController@simpleTable')->name('product.get');
    Route::post('full-data-product/get', 'ProductTableController@fullDataTable')->name('full-data-product.get');

});
