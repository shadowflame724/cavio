<?php

/*
* Categories Management
*/
Route::group(['namespace' => 'Category'], function () {

    Route::get('category',
        [
            'as' => 'category.index',
            'uses' => 'CategoryController@index'
        ]);

    Route::match(['GET', 'POST'], 'category/create/{p_id?}',
        [
            'as' => 'category.create',
            'uses' => 'CategoryController@create'
        ]);

    Route::match(['GET', 'POST'], 'category/edit/{id?}',
        [
            'as' => 'category.edit',
            'uses' => 'CategoryController@edit'
        ]);

    Route::get('category/delete/{id?}',
        [
            'as' => 'category.delete',
            'uses' => 'CategoryController@destroy'
        ]);
});
