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
    Route::post('finish-tissue/get-all-finishes', 'FinishTissueTableController@getAllFinishes')->name('finish-tissue.getAllFinishes');
    Route::post('finish-tissue/get-all-tissues', 'FinishTissueTableController@getAllTissues')->name('finish-tissue.getAllTissues');
    Route::post('finish-tissue/get-parent-finishes', 'FinishTissueTableController@getParentFinishes')->name('finish-tissue.getParentFinishes');
    Route::post('finish-tissue/get-parent-tissues', 'FinishTissueTableController@getParentTissues')->name('finish-tissue.getParentTissues');
});
