<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\User\src\Http\Controllers', 'middleware' => 'web'], function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', 'UserController@index')->name('index');

            Route::get('data', 'UserController@data')->name('data');

            Route::get('create', 'UserController@create')->name('create');

            Route::post('create', 'UserController@store')->name('store');

            Route::get('edit/{id}', 'UserController@edit')->name('edit');

            Route::post('edit/{id}', 'UserController@postEdit')->name('postEdit');

            Route::get('delete/{id}', 'UserController@delete')->name('delete');

            Route::post('postDelete/{id}', 'UserController@postDelete')->name('postDelete');
        });
    });
});