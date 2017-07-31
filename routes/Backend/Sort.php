<?php

/*
* Sort Management
*/
Route::group(['namespace' => 'Sort'], function () {
    Route::get('sort/{type?}', 'SortController@index')->name('sort.index');

    Route::post('sort/collection/{id}', 'SortController@collectionShow')->name('sort.collection.show');
    Route::post('sort/collection-zone/{collectionZone}', 'SortController@collectionZoneShow')->name('sort.collection-zone.show');
    Route::post('sort/category/{category}', 'SortController@categoryShow')->name('sort.category.show');

    Route::post('sort/update', 'SortController@update')->name('sort.update');
});
