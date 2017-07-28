<?php

/*
* Templates Administrator Message Management
*/
Route::group(['namespace' => 'TemplateMessage'], function () {
    Route::resource('template-messages', 'TemplateMessageController', ['except' => ['show']]);

    //For DataTables
    Route::post('template-messages/get', 'TemplateMessageController@table')->name('template-messages.get');
});
