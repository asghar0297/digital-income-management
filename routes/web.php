<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrayerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
        Route::resource('transaction', TransactionController::class);

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // ajax routes
        Route::get('get-child-categories', [CategoryController::class, 'getChildCategories'])->name('getChildCategories');
    });
