<?php

use Illuminate\Support\Facades\Route;

//Module Dashboard
Route::group(['namespace' => 'Modules\Dashboard\src\Http\Controllers'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'DashboardController@index');
    });
});
