<?php

/*
* Goods Management
*/
Route::group(['namespace' => 'Good'], function () {
    Route::resource('good', 'GoodController', ['except' => ['show']]);


    //For DataTables
    Route::post('good/get', 'GoodTableController')->name('good.get');
});
