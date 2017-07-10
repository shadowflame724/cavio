<?php
/*
* Excel Management
*/
Route::group(['namespace' => 'Excel'], function () {
    Route::get('excel',
        [
            'as' => 'excel.show',
            'uses' => 'ExcelController@index'
        ]);
    Route::post('excel/import',
        [
            'as' => 'excel.import',
            'uses' => 'ExcelController@import'
        ]);
    Route::post('excel/export',
        [
            'as' => 'excel.export',
            'uses' => 'ExcelController@export'
        ]);
});