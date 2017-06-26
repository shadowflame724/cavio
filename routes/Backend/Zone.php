<?php

/*
* Zones Management
*/
Route::group(['namespace' => 'Zone'], function () {
    Route::resource('zone', 'ZoneController', ['except' => ['show']]);

    //For DataTables
    Route::post('zone/get', 'ZoneTableController')->name('zone.get');
});
