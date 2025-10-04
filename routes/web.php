<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::group(['middleware' => ['auth', 'role:admin']], function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        });
    });

    Route::group(['middleware' => ['auth', 'role:deliver']], function () {
        Route::get('/deliver/dashboard', function () {
            return view('deliver.dashboard');
        });
    });
});
