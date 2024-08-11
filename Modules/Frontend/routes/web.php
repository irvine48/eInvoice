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

Route::middleware(['web'])->name('frontend.')->group(function () {

    /* Landing */
    Route::controller(FrontendController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });

    /* LHDN API */
    Route::controller(ApiController::class)->name('api.')->group(function () {
        Route::get('/login-as-taxpayer-system', 'loginAsTaxpayerSystem')->name('login-as-taxpayer-system');
        Route::get('/login-as-intermediary-system', 'loginAsIntermediarySystem')->name('login-as-intermediary-system');
    });
});
