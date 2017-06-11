<?php

Route::group(['namespace' => 'File'], function () {
    Route::post('file/upload', 'UploadController@uploadImage')->name('file.upload');
    //Route::post('/upload-prev', 'UploadController@uploadImg')->name('team.upload-prev');
});