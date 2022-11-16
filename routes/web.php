<?php

use App\Http\Controllers\Admin\AuthController as AuthAdminController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\FileController as AdminFileController;
use App\Http\Controllers\Admin\Master\FileController as MasterFileController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SelectionResultController;
use App\Http\Controllers\Candidates\AuthController as AuthCandidateController;
use App\Http\Controllers\Candidates\FileController as CandidateFileController;
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

Route::prefix('candidates')->name('candidates.')->group(function () {
    Route::prefix('registrations/{type}')->middleware('should.authenticated:false')->name('registrations.')->group(function () {
        Route::resource('/', RegistrationController::class)->only('index', 'create', 'store');
    });

    Route::resource('files', CandidateFileController::class)->only('index', 'update');
});

Route::prefix('candidates/auth')->name('candidates.auth.')->group(function () {
    Route::post('/login', [AuthCandidateController::class, 'store'])->name('login');
    Route::get('/logout', [AuthCandidateController::class, 'logout'])->name('logout');
});

Route::prefix('admin/auth')->name('admins.auth.')->group(function () {
    Route::post('/login', [AuthAdminController::class, 'store'])->name('login');
});

Route::prefix('admin')->name('admins.')->group(function () {
    Route::resource('candidates', CandidateController::class)->only('index', 'show', 'destroy');
    Route::resource('candidates.files', AdminFileController::class)->only('index');
    Route::resource('candidates.selection-results', SelectionResultController::class);
    Route::put('candidates/{candidate}/files/{file}/status/{status}', [AdminFileController::class, 'update'])->whereIn('status', ['accepted', 'declined'])->name('candidates.files.status.update');
    Route::resource('schedules', ScheduleController::class)->except('show');
    Route::prefix('master')->name('master.')->group(function () {
        Route::resource('files', MasterFileController::class)->except('show');
    });
});

Route::view('/admin/login', 'admin.pages.auth.login')->name('admin.login.index');
Route::view('/dashboard', 'candidate.pages.dashboard.index')->name('candidates.dashboards.index')->middleware('should.have.role:candidate');
Route::view('/', 'candidate.pages.auth.login')->name('home');
Route::get('/candidate/{candidate}/pdf', [RegistrationController::class, 'downloadPdf'])->middleware('signed', 'should.have.role:candidate')->name('candidate.pdf.download');
