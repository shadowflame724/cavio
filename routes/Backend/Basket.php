<?php

/*
* Baskets Management
*/
Route::group(['namespace' => 'Basket'], function () {
    Route::get('baskets', 'BasketController@index')->name('baskets.index');
    Route::get('baskets/{basket}', 'BasketController@show')->name('baskets.show');
    Route::post('baskets/get', 'BasketController@table')->name('baskets.get');
});
