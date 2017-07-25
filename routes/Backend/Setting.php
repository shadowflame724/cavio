<?php

/*
* Settings Management
*/
Route::group(['namespace' => 'Setting'], function () {
    Route::resource('setting', 'SettingController', ['except' => ['show']]);

});
