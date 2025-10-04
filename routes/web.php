<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Для проверки роли (отладка)
Route::get('/check-role', function () {
    $user = Auth::user();
    if (!$user) {
        return 'Пользователь не авторизован';
    }
    return 'Роль пользователя: ' . ($user->role?->name ?? 'не задана');
})->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/orders', function () {
            return view('orders');
        })->name('orders');

        Route::get('/delivers', function () {
            return view('delivers');
        })->name('delivers');
    });

    Route::middleware('role:deliver')->group(function () {
        Route::get('/deliver/dashboard', function () {
            return view('deliver.dashboard');
        })->name('deliver.dashboard');

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
    });

    Route::get('/client', function () {
        return view('client');
    })->name('client');

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/index', function () {
            return view('product.index');
        })->name('index');
        Route::get('/create', function () {
            return view('product.create');
        })->name('create');
        Route::get('/show', function () {
            return view('product.show');
        })->name('show');
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
