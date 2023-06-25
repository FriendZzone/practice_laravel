<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\Categories\src\Http\Controllers', 'middleware' => 'web'], function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', 'CategoriesController@index')->name('index');

            Route::get('data', 'CategoriesController@data')->name('data');

            Route::get('create', 'CategoriesController@create')->name('create');

            Route::post('create', 'CategoriesController@store')->name('store');

            Route::get('edit/{id}', 'CategoriesController@edit')->name('edit');

            Route::post('edit/{id}', 'CategoriesController@postEdit')->name('postEdit');

            Route::get('delete/{id}', 'CategoriesController@delete')->name('delete');

            Route::post('postDelete/{id}', 'CategoriesController@postDelete')->name('postDelete');

            Route::get('categoriesList/{slug}', 'CategoriesController@postDelete')->name('categories');
        });
    });
});
