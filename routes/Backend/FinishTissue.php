<?php

/*
* FinishTissue Management
*/
Route::group(['namespace' => 'FinishTissue'], function () {
    Route::resource('finish-tissue', 'FinishTissueController', ['except' => ['show']]);

    Route::any('finish-tissue/destroy/{finishTissue}',
        [
            'as' => 'finish-tissue.destroy.child',
            'uses' => 'FinishTissueController@destroy'
        ]);

    Route::any('finish-tissue/child/{finishTissue}',
        [
            'as' => 'finish-tissue.store.child',
            'uses' => 'FinishTissueController@storeChild'
        ]);

    //For DataTables
    Route::post('finish-tissue/get', 'FinishTissueTableController')->name('finish-tissue.get');
});
