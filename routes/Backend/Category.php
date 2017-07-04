<?php

/*
* Categories Management
*/
Route::group(['namespace' => 'Category'], function () {

    Route::get('category', 'CategoryController@index')->name('category.index');

    Route::get('category/create/{p_id?}', 'CategoryController@create')->name('category.create');
    Route::post('category/store/{p_id?}', 'CategoryController@store')->name('category.store');

    Route::get('category/category/edit/{id?}', 'CategoryController@edit')->name('category.edit');
    Route::post('category/category/edit/{id?}', 'CategoryController@update')->name('category.update');

    Route::get('category/delete/{id?}', 'CategoryController@destroy')->name('category.delete');
});
