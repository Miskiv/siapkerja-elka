<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AnalisisMahasiswaController;
use App\Http\Controllers\DaftarMahasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\HasilAnalisisController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SSOController;
use App\Http\Controllers\UserController;
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

//front page
Route::get('/loginsso-v3', [SSOController::class, 'loginSSO']);
Route::get('qrcode/{uui}', [DokumenController::class, 'qrcode']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/home', [DashboardController::class, 'index']);

    //role admin
    Route::group(['middleware' => ['role:Super Admin|Admin']], function () {
        Route::resource('users', UserController::class);
        Route::resource('pertanyaan', PertanyaanController::class);
        Route::resource('jawaban', JawabanController::class);
        Route::resource('jurusan', JurusanController::class);
        Route::resource('daftar-mahasiswa', DaftarMahasiswaController::class);
        Route::resource('analisis-mahasiswa', AnalisisMahasiswaController::class);

    });
    Route::group(['middleware' => ['role:User']], function () {
        Route::resource('isi-kuesioner', KuesionerController::class);
        Route::resource('hasil-analisis', HasilAnalisisController::class);
    });

    Route::prefix('dokumen')->group(function () {
        //dokumen
        Route::get('/', [DokumenController::class, 'index']);
        Route::get('/read-flip-book', [DokumenController::class, 'flip_book']);
        Route::get('/read-flip-pakta', [DokumenController::class, 'flip_pakta']);
        Route::get('/read-flip-summary', [DokumenController::class, 'flip_summary']);
        Route::get('/approval', [DokumenController::class, 'approval']);
        Route::get('/form-approval/{param}', [DokumenController::class, 'form_approval']);
        Route::get('/approve/{param}', [DokumenController::class, 'approve']);
        Route::get('/riwayat', [DokumenController::class, 'riwayat']);
        Route::delete('/delete/{id}', [DokumenController::class, 'destroy']);
        Route::get('/export', [DokumenController::class, 'export']);

        //quiz
        Route::get('/read-flip-quiz', [QuizController::class, 'showQuiz'])->name('quiz.show');
        Route::post('/quiz/submit', [QuizController::class, 'submitQuiz'])->name('quiz.submit');
        Route::get('/quiz/result', [QuizController::class, 'showResult'])->name('quiz.result');
    });

    //activity log
    Route::get('activity-log', [ActivityLogController::class, 'index']);

    //edit password
    Route::get('/users-edit-password', [UserController::class, 'edit_password']);
    Route::post('/users-edit-password', [UserController::class, 'update_password']);
    Route::get('/version', [DashboardController::class, 'version']);
});

require __DIR__.'/auth.php';
