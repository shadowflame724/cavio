<?php

/*
* Document Management
*/
Route::group(['namespace' => 'Document'], function () {
    Route::resource('documents', 'DocumentController', ['except' => ['show']]);

    Route::post('documents/get', 'DocumentController@table')->name('documents.get');
});
