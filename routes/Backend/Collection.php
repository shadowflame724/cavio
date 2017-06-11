<?php

/*
* Collections Management
*/
Route::group(['namespace' => 'Collection'], function () {
    Route::resource('collection', 'CollectionController', ['except' => ['show']]);


    //For DataTables
    Route::post('collection/get', 'CollectionTableController')->name('collection.get');
});
