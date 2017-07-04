<?php

/*
* Messages Management
*/
Route::group(['namespace' => 'Message'], function () {
    Route::get('messages', 'MessageController@index')->name('messages.index');

    Route::get('message/{message}', 'MessageController@show')->name('message.show');

    //For DataTables
    Route::post('message/get', 'MessageController@table')->name('messages.get');
});
