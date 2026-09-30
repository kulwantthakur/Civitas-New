<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\SectionController;

Route::prefix('dashboard')
    ->middleware(['auth'])
    ->name('dashboard.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::controller(SettingsController::class)->prefix('settings')->group(function () {
            Route::get('/', 'edit')->name('settings.edit');
            Route::put('/', 'update')->name('settings.update');
            Route::put('/password', 'updatePassword')->name('settings.password');
        });

        Route::controller(SectionController::class)->prefix('sections')->group(function () {
            Route::get('/', 'index')->name('sections.index');
            Route::post('/', 'store')->name('sections.store');
            Route::put('/{section}', 'update')->name('sections.update');
            Route::delete('/{section}', 'destroy')->name('sections.destroy');
            Route::post('/{section}/toggle', 'toggleActive')->name('sections.toggle');
            Route::post('/{section}/reorder', 'reorder')->name('sections.reorder');
        });

        Route::controller(PageController::class)->prefix('pages')->group(function () {
            Route::get('/', 'index')->name('pages.index');
            Route::get('/create', 'create')->name('pages.create');
            Route::post('/', 'store')->name('pages.store');
            Route::get('/{page}/edit', 'edit')->name('pages.edit');
            Route::put('/{page}', 'update')->name('pages.update');
            Route::delete('/{page}', 'destroy')->name('pages.destroy');
            Route::post('/{page}/toggle', 'toggleActive')->name('pages.toggle');
            Route::post('/{page}/reorder', 'reorder')->name('pages.reorder');
        });
    });
