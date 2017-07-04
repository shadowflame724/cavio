<?php

Route::group(['namespace' => 'File'], function () {
    Route::post('file/upload', 'UploadController@uploadImage')->name('file.upload');
    Route::post('file/upload/collection', 'UploadController@uploadCollection')->name('file.upload.collection');
    Route::post('file/upload/finish-tissue', 'UploadController@uploadFinishTissue')->name('file.upload.finish-tissue');

    //Route::post('/upload-prev', 'UploadController@uploadImg')->name('team.upload-prev');
});