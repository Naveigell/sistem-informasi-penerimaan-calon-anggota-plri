<?php

use App\Http\Controllers\Candidates\AuthController;
use App\Http\Controllers\Candidates\RegistrationController;
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

Route::prefix('candidates')->name('candidates.')->middleware('should.authenticated:false')->group(function () {
    Route::prefix('registrations/{type}')->name('registrations.')->group(function () {
        Route::resource('/', RegistrationController::class)->only('index', 'create', 'store');
    });
});

Route::prefix('candidates/auth')->name('candidates.auth.')->group(function () {
    Route::post('/login', [AuthController::class, 'store'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::view('/dashboard', 'candidate.pages.dashboard.index')->name('candidates.dashboards.index')->middleware('should.have.role:candidate');
Route::view('/', 'candidate.pages.auth.login')->name('home');
Route::get('/candidate/{candidate}/pdf', [RegistrationController::class, 'downloadPdf'])->middleware('signed', 'should.have.role:candidate')->name('candidate.pdf.download');
