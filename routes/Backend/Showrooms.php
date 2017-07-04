<?php

/*
* Showroom Management
*/
Route::group(['namespace' => 'Showroom'], function () {
    Route::resource('showroom', 'ShowroomController', ['except' => ['show']]);

    //For DataTables
    Route::post('showroom/get', 'ShowroomTableController')->name('showroom.get');
});
