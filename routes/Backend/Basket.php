<?php

/*
* Baskets Management
*/
Route::group(['namespace' => 'Basket'], function () {
    Route::resource('basket', 'BasketController', ['except' => ['show']]);

});
