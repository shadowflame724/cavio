<?php

/**
 * All route names are prefixed with 'admin.access'.
 */
Route::group([
    'prefix' => 'access',
    'as' => 'access.',
    'namespace' => 'Access',
], function () {


    /*
     * User Management
     */
    Route::group([
        'middleware' => 'access.routeNeedsRole:1'
    ], function () {

        Route::group(['namespace' => 'User'], function () {
            /*
             * For DataTables
             */
            Route::post('user/get', 'UserTableController')->name('user.get');

            /*
             * User Status'
             */
            Route::get('user/deactivated', 'UserStatusController@getDeactivated')->name('user.deactivated');
            Route::get('user/deleted', 'UserStatusController@getDeleted')->name('user.deleted');

            /*
             * User CRUD
             */
            Route::resource('user', 'UserController');

            /*
             * Specific User
             */
            Route::group(['prefix' => 'user/{user}'], function () {
                // Account
                Route::get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail')->name('user.account.confirm.resend');

                // Status
                Route::get('mark/{status}', 'UserStatusController@mark')->name('user.mark')->where(['status' => '[0,1]']);

                // Password
                Route::get('password/change', 'UserPasswordController@edit')->name('user.change-password');
                Route::patch('password/change', 'UserPasswordController@update')->name('user.change-password.post');

                // Access
                Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');

                // Session
                Route::get('clear-session', 'UserSessionController@clearSession')->name('user.clear-session');
            });

            /*
             * Deleted User
             */
            Route::group(['prefix' => 'user/{deletedUser}'], function () {
                Route::get('delete', 'UserStatusController@delete')->name('user.delete-permanently');
                Route::get('restore', 'UserStatusController@restore')->name('user.restore');
            });
        });

        /*
        * Role Management
        */
        Route::group(['namespace' => 'Role'], function () {
            Route::resource('role', 'RoleController', ['except' => ['show']]);

            //For DataTables
            Route::post('role/get', 'RoleTableController')->name('role.get');
        });

        /*
        * Page Management
        */
        Route::group(['namespace' => 'Page'], function () {
            Route::resource('page', 'PageController', ['except' => ['show']]);

            //For DataTables
            Route::post('page/get', 'PageTableController')->name('page.get');
        });

        /*
        * Block Management

        Route::group(['namespace' => 'Block'], function () {
            Route::resource('page.block', 'BlockController', ['except' => ['show']]);

            //For DataTables
            Route::post('block/get/{page}', 'BlockTableController')->name('block.get');
        });

        /*
        * Categories Management
        */
        Route::group(['namespace' => 'Category'], function () {

            Route::get('category',
                [
                    'as' => 'category.index',
                    'uses' => 'CategoryController@index'
                ]);

            Route::match(['GET', 'POST'], 'category/create/{p_id?}',
                [
                    'as' => 'category.create',
                    'uses' => 'CategoryController@create'
                ]);

            Route::match(['GET', 'POST'], 'category/edit/{id?}',
                [
                    'as' => 'category.edit',
                    'uses' => 'CategoryController@edit'
                ]);

            Route::get('category/delete/{id}',
                [
                    'as' => 'category.delete',
                    'uses' => 'CategoryController@destroy'
                ]);
        });

        /*
        * News Management
        */
        Route::group(['namespace' => 'News'], function () {
            Route::resource('news', 'NewsController', ['except' => ['show']]);

            //For DataTables
            Route::post('news/get', 'NewsTableController')->name('news.get');
        });

        /*
        * Collections Management
        */
        Route::group(['namespace' => 'Collection'], function () {
            Route::resource('collection', 'CollectionController', ['except' => ['show']]);


            //For DataTables
            Route::post('collection/get', 'CollectionTableController')->name('collection.get');
        });

    });
});
