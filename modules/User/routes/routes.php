<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\User\src\Http\Controllers', 'middleware' => 'web'], function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/', 'UserController@index')->name('admin.users.index');
            Route::get('/data', 'UserController@data')->name('admin.users.data');

            Route::get('edit/{id}', 'UserController@edit')->name('admin.users.edit');
            Route::post('edit/{id}', 'UserController@postEdit')->name('admin.users.postEdit');

            Route::get('create', 'UserController@create')->name('admin.users.create');
            Route::post('create', 'UserController@store')->name('admin.users.store');
        });
    });
});
