<?php

/*
* Orders Management
*/
Route::group(['namespace' => 'Order'], function () {
    Route::resource('orders', 'OrderController', ['except' => ['show']]);

    Route::get('orders/get', 'OrderController@table')->name('orders.get');
});
