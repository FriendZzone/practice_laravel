<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\User\src\Http\Controllers', 'middleware' => 'web'], function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('users')->name('user.')->group(function () {
            Route::get('/', 'UserController@index')->name('index');

            Route::get('data', 'UserController@data')->name('data');

            Route::get('create', 'UserController@create')->name('create');

            Route::post('create', 'UserController@store')->name('store');

            Route::get('edit/{user}', 'UserController@edit')->name('edit');

            Route::post('edit/{user}', 'UserController@update')->name('update');

            Route::get('delete/{user}', 'UserController@delete')->name('delete');

            Route::post('postDelete/{user}', 'UserController@postDelete')->name('postDelete');
        });
    });
});