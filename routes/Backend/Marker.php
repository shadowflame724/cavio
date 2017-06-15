<?php
/*
* Marker Management
*/
Route::group(['namespace' => 'Marker'], function () {
    Route::get('collection/{collection}/marker/edit',
        [
            'as' => 'collection.marker.edit',
            'uses' => 'MarkerController@edit'
        ]);
    Route::any('collection/{collection}/marker/store',
        [
            'as' => 'collection.marker.store',
            'uses' => 'MarkerController@store'
        ]);
    Route::post('collection/marker',
        [
            'as' => 'marker.update',
            'uses' => 'MarkerController@update'
        ]);
    Route::any('collection/marker/{marker}',
        [
            'as' => 'marker.destroy',
            'uses' => 'MarkerController@destroy'
        ]);
});