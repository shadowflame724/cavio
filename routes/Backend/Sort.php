<?php

/*
* Sort Management
*/
Route::group(['namespace' => 'Sort'], function () {
    Route::get('sort', 'SortController@index')->name('sort.index');
    Route::get('sort/collection/{id}', 'SortController@collectionShow')->name('sort.collection.show');
    Route::post('sort/collection/update', 'SortController@collectionUpdate')->name('sort.collection.update');

    //Route::get('sort/collection-zone', 'SortController@collectionZoneIndex')->name('sort.collection-zone.index');
    Route::get('sort/collection-zone/{collectionZone}', 'SortController@collectionZoneShow')->name('sort.collection-zone.show');
    //Route::get('sort/collection-zone/update/{collectionZone}', 'SortController@collectionZoneUpdate')->name('sort.collection-zone.update');

    //Route::get('sort/category', 'SortController@categoryIndex')->name('sort.category.index');
    Route::get('sort/category/{category}', 'SortController@categoryShow')->name('sort.category.show');
    //Route::get('sort/category/update/{category}', 'SortController@categoryUpdate')->name('sort.category.update');
});
