<?php

use App\Http\Controllers\AcccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransferController;
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
        Route::resource('accounts', AccountController::class);
        Route::resource('transfer', TransferController::class);
        Route::resource('transaction', TransactionController::class);

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // ajax routes
        Route::get('get-child-categories', [CategoryController::class, 'getChildCategories'])->name('getChildCategories');
        Route::get('graph/get-expense-by-categories', [DashboardController::class, 'getExpenseByCategories'])->name('getExpenseByCategories');
        Route::get('graph/get-expenses', [DashboardController::class, 'getExpenses'])->name('getExpenses');
        Route::get('graph/get-accounts', [DashboardController::class, 'getAccounts'])->name('getAccounts');
        Route::get('graph/get-daily-expense-chart', [DashboardController::class, 'getDailyExpenseChart'])->name('getDailyExpenseChart');
        Route::get('graph/get-monthly-expense-chart', [DashboardController::class, 'getMonthlyExpenseChart'])->name('getMonthlyExpenseChart');
    });
