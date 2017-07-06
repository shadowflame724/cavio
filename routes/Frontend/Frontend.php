<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');

Route::get('about', 'FrontendController@about')->name('about');
Route::get('faq', 'FrontendController@faq')->name('faq');
Route::get('news', 'FrontendController@news')->name('news');

Route::get('contacts', 'FrontendController@contacts')->name('contacts');
Route::post('message', 'MessageController@store')->name('message.store');

Route::get('payments', 'FrontendController@payments')->name('payments');
Route::get('showrooms', 'FrontendController@showrooms')->name('showrooms');
Route::get('privacy-policy', 'FrontendController@privacyPolicy')->name('privacy-policy');
Route::get('stash', 'FrontendController@stash')->name('stash');
Route::get('catalogue', 'FrontendController@catalogue')->name('catalogue');
Route::get('finish-tissue', 'FrontendController@finishTissue')->name('finish-tissue');

Route::get('product/{good}', 'GoodsController@show')->name('goods.show');


Route::get('collections', 'CollectionController@index')->name('collections');
Route::get('collections/{collection}', 'CollectionController@show')->name('collections.show');

Route::get('zones', 'ZoneController@index')->name('zones');
Route::get('zones/{zone}', 'ZoneController@show')->name('zones.show');




Route::get('macros', 'FrontendController@macros')->name('macros');

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
