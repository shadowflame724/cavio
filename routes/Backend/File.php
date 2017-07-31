<?php

Route::group(['namespace' => 'File'], function () {
    Route::post('file/upload', 'UploadController@uploadImage')->name('file.upload');
    Route::post('file/upload/collection', 'UploadController@uploadCollection')->name('file.upload.collection');
    Route::post('file/upload/finish-tissue', 'UploadController@uploadFinishTissue')->name('file.upload.finish-tissue');
    Route::post('file/upload/collection-zone', 'UploadController@uploadCollectionZone')->name('file.upload.collection-zone');
    Route::post('file/upload/cropped', 'UploadController@uploadCropped')->name('file.upload.cropped');

    Route::post('file/upload/documents', 'UploadController@uploadDocument')->name('file.upload.documents');


    //Route::post('/upload-prev', 'UploadController@uploadImg')->name('team.upload-prev');
});