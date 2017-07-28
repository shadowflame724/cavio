<?php

/*
* Settings Management
*/
Route::group(['namespace' => 'Settings'], function () {

    Route::get('settings',
        [
            'as' => 'settings.edit',
            'uses' => 'SettingsController@edit'
        ]);

    Route::patch('settings/edit',
        [
            'as' => 'settings.update',
            'uses' => 'SettingsController@update'
        ]);
});
