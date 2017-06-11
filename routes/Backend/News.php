<?php

/*
* News Management
*/
Route::group(['namespace' => 'News'], function () {
    Route::resource('news', 'NewsController', ['except' => ['show']]);

    //For DataTables
    Route::post('news/get', 'NewsTableController')->name('news.get');
});
