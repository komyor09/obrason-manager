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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/orders', function () {
        return view('orders');
    })->name('orders');
    Route::get('/delivers', function () {
        return view('delivers');
    })->name('delivers');
    Route::get('/client', function () {
        return view('client');
    })->name('client');
    Route::get('/products', function () {
        return view('products');
    })->name('products');
    Route::group(['prefix' => 'deliver', 'as' => 'deliver.'], function () {
        Route::get('/index', function () {
            return view('deliver.index');
        })->name('index');
        Route::get('/create', function () {
            return view('deliver.create');
        })->name('create');
        Route::get('/store', function () {
            return view('deliver.store');
        })->name('store');
        Route::get('/edit', function () {
            return view('deliver.edit');
        })->name('edit');
        Route::get('/destroy', function () {
            return view('deliver.destroy');
        })->name('destroy');
    });
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/index', function () {
            return view('product.index');
        })->name('index');
        Route::get('/create', function () {
            return view('product.create');
        })->name('create');
        Route::get('/store', function () {
            return view('product.store');
        })->name('store');
        Route::get('/edit', function () {
            return view('product.edit');
        })->name('edit');
        Route::get('/destroy', function () {
            return view('product.destroy');
        })->name('destroy');
    });
});
