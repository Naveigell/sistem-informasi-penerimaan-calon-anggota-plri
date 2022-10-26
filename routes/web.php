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

Route::prefix('candidates')->name('candidates.')->group(function () {
    Route::prefix('registrations/{type}')->name('registrations.')->group(function ($type) {
        Route::resource('/', \App\Http\Controllers\Candidates\RegistrationController::class)->only('index', 'create', 'store');
    });
});

Route::view('/', 'candidate.pages.auth.login');
