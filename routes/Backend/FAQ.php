<?php

/*
* FAQs Management
*/
Route::group(['namespace' => 'FAQ'], function () {
    Route::resource('faq', 'FAQController', ['except' => ['show']]);


    //For DataTables
    Route::post('faq/get', 'FAQTableController')->name('faq.get');
});
