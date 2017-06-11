<?php

/*
* Page Management
*/
Route::group(['namespace' => 'Page'], function () {
    Route::resource('page', 'PageController', ['except' => ['show']]);

    //For DataTables
    Route::post('page/get', 'PageTableController')->name('page.get');
});
