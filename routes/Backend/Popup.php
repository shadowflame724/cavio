<?php

/*
* Popup Management
*/
Route::group(['namespace' => 'Popup'], function () {

    Route::get('popup',
        [
            'as' => 'popup.edit',
            'uses' => 'PopupController@edit'
        ]);

    Route::patch('popup/edit',
        [
            'as' => 'popup.update',
            'uses' => 'PopupController@update'
        ]);
});
