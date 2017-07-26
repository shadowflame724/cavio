<?php

/*
* Orders Management
*/
Route::group(['namespace' => 'Order'], function () {
    Route::resource('order', 'OrderController', ['except' => ['show']]);

});
