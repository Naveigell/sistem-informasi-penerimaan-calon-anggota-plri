<?php

use App\Http\Controllers\Admin\AuthController as AuthAdminController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\ClothingInstructionController;
use App\Http\Controllers\Admin\FileController as AdminFileController;
use App\Http\Controllers\Admin\Master\FileController as MasterFileController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use App\Http\Controllers\Admin\RegistrationProcedureController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SelectionResultController as AdminSelectionResultController;
use App\Http\Controllers\Candidates\AuthController as AuthCandidateController;
use App\Http\Controllers\Candidates\BiodataController;
use App\Http\Controllers\Candidates\FileController as CandidateFileController;
use App\Http\Controllers\Candidates\RegistrationController as CandidateRegistrationController;
use App\Http\Controllers\Candidates\SelectionResultController as CandidateSelectionResultController;
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
        Route::resource('/', CandidateRegistrationController::class)->only('index', 'create', 'store');
    });

    Route::middleware('should.have.role:candidate')->group(function () {
        Route::resource('biodatas', BiodataController::class)->only('index');
        Route::resource('files', CandidateFileController::class)->only('index', 'update');
        Route::view('/dashboard', 'candidate.pages.dashboard.index')->name('dashboards.index');
        Route::resource('selection-results', CandidateSelectionResultController::class)->only('index');
        Route::patch('selection-results/{schedule}', [CandidateSelectionResultController::class, 'store'])->name('selection-result.store');
        Route::get('/selection-results/template/print', [CandidateSelectionResultController::class, 'printTemplate'])->name('selection-results.template.print');
    });
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
    Route::resource('candidates.selection-results', AdminSelectionResultController::class);
    Route::put('candidates/{candidate}/files/{file}/status/{status}', [AdminFileController::class, 'update'])->whereIn('status', ['accepted', 'declined'])->name('candidates.files.status.update');
    Route::resource('schedules', ScheduleController::class)->except('show');
    Route::resource('registrations', AdminRegistrationController::class)->only('index', 'update');
    Route::resource('registration-procedures', RegistrationProcedureController::class)->only('index', 'update');
    Route::resource('clothing-instructions', ClothingInstructionController::class)->only('index', 'update');
    Route::prefix('master')->name('master.')->group(function () {
        Route::resource('files', MasterFileController::class)->except('show');
    });
});

Route::view('/admin/login', 'admin.pages.auth.login')->name('admin.login.index');
Route::view('/', 'candidate.pages.auth.login')->name('home');
Route::get('/candidate/{candidate}/pdf', [CandidateRegistrationController::class, 'downloadPdf'])->middleware('signed', 'should.have.role:candidate')->name('candidate.pdf.download');
