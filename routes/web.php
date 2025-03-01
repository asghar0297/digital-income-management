<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrayerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;

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

    Route::resource('prayer-management', PrayerController::class);
    Route::prefix('expense-management')->name('expense-management.')->group(function () {
        Route::resource('category', CategoryController::class);
        Route::get('get-child-categories', [CategoryController::class, 'getChildCategories'])->name('getChildCategories');
        Route::resource('transaction', TransactionController::class);
    });
