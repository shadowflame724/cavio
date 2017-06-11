<?php

/*
* Block Management
*/
Route::group(['namespace' => 'Block'], function () {
    Route::resource('page.block', 'BlockController', ['except' => ['show']]);

    //For DataTables
    Route::post('block/get/{page}', 'BlockTableController')->name('block.get');
});