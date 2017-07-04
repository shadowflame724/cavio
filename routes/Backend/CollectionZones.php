<?php
/*
* CollectionZones Management
*/
Route::group(['namespace' => 'CollectionZone'], function () {

    Route::any('collection/{collection}/collection_zones/store',
        [
            'as' => 'collection.zones.store',
            'uses' => 'CollectionZoneController@store'
        ]);
    Route::any('collection/collection_zones/{collectionZones}',
        [
            'as' => 'collection.zones.destroy',
            'uses' => 'CollectionZoneController@destroy'
        ]);
});