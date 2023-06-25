<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\Courses\src\Http\Controllers', 'middleware' => 'web'], function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('courses')->name('courses.')->group(function () {
            Route::get('/', 'CoursesController@index')->name('index');

            Route::get('data', 'CoursesController@data')->name('data');

            Route::get('create', 'CoursesController@create')->name('create');

            Route::post('create', 'CoursesController@store')->name('store');

            Route::get('edit/{id}', 'CoursesController@edit')->name('edit');

            Route::post('edit/{id}', 'CoursesController@postEdit')->name('postEdit');

            Route::get('delete/{id}', 'CoursesController@delete')->name('delete');

            Route::post('postDelete/{id}', 'CoursesController@postDelete')->name('postDelete');
        });
    });
});

Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});