<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');


Route::get('about', 'FrontendController@about')->name('about');
Route::get('faq', 'FrontendController@faq')->name('faq');
Route::get('news', 'NewsController@index')->name('news');
//Route::post('news/{id}', 'NewsController@filter')->name('filter');
Route::get('news/{news}', 'NewsController@show')->name('news.show');


Route::get('contacts', 'FrontendController@contacts')->name('contacts');
Route::post('message', 'MessageController@store')->name('message.store');

//Route::get('payments', 'FrontendController@payments')->name('payments');
Route::get('showrooms', 'FrontendController@showrooms')->name('showrooms');
//Route::get('privacy-policy', 'FrontendController@privacyPolicy')->name('privacy-policy');
Route::get('stash', 'FrontendController@stash')->name('stash');
Route::get('finish-tissue', 'FrontendController@finishTissue')->name('finish-tissue');

Route::get('catalogue', 'ProductController@index')->name('catalogue');
Route::get('catalogue/{slug}', 'ProductController@catOne')->name('catalogue.one');
Route::get('product/{slug}', 'ProductController@one')->name('goods.show');

Route::get('collections', 'CollectionController@index')->name('collections');
Route::get('collections/{slug}', 'CollectionController@show')->name('collections.show');
Route::get('collections/{collection}/{slug}', 'CollectionController@showPopup')->name('collections.show_popup');

Route::get('zones', 'ZoneController@index')->name('zones');
Route::get('zones/{slug}', 'ZoneController@show')->name('zones.show');
Route::get('zones/{zone}/{collection}', 'ZoneController@showPopup')->name('zones.show_popup');

Route::get('macros', 'FrontendController@macros')->name('macros');

Route::get('subscribe', 'MailchimpController@subscribeNews')->name('subscribe');
Route::get('unsubscribe', 'MailchimpController@unsubscribeNews')->name('unsubscribe');

Route::get('press-design', 'FrontendController@pressDesign')->name('press-design');

/**
 * Корзина
 */
Route::get('basket', 'BasketController@index')->name('basket.index');
Route::get('basket/show', 'BasketController@show')->name('basket.show');
Route::put('basket/', 'BasketController@store')->name('basket.store');
Route::post('basket/{id}', 'BasketController@update')->name('basket.update');
Route::delete('basket/{id}', 'BasketController@destroy')->name('basket.destroy');

Route::put('order', 'BasketController@orderSend')->name('order.send');



/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
    });
});
