<?php
/*
* Block Management
*/
Route::group(['namespace' => 'Marker'], function () {
    Route::resource('collection.marker', 'MarkerController', ['except' => ['show']]);

    //For DataTables
    //Route::post('block/get/{page}', 'BlockTableController')->name('block.get');
});