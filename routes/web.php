<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AnalisisMahasiswaController;
use App\Http\Controllers\DaftarMahasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasilAnalisisController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\PertanyaanController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/home', [DashboardController::class, 'index']);

    //role admin
    Route::group(['middleware' => ['role:Super Admin|Admin|Staff Departemen|TIM UHI']], function () {
        Route::resource('users', UserController::class);

        Route::get('getPerbandinganKriteria/{param}', [PertanyaanController::class, 'getperbandingan']);
        Route::resource('pertanyaan', PertanyaanController::class);
        Route::resource('jawaban', JawabanController::class);
        Route::resource('jurusan', JurusanController::class);
        Route::resource('daftar-mahasiswa', DaftarMahasiswaController::class);
        Route::get('/analisis-mahasiswa/{id}/{kriteria_id}', [AnalisisMahasiswaController::class, 'showAnalisis']);
        Route::resource('analisis-mahasiswa', AnalisisMahasiswaController::class);
        Route::get('comparison/{criteria}', [PertanyaanController::class, 'generateComparisons']);
        Route::resource('kriteria', KriteriaController::class);



    });
    Route::group(['middleware' => ['role:User']], function () {
        Route::resource('isi-kuesioner', KuesionerController::class);
        Route::resource('hasil-analisis', HasilAnalisisController::class);
    });

    //activity log
    Route::get('activity-log', [ActivityLogController::class, 'index']);

    //edit password
    Route::get('/users-edit-password', [UserController::class, 'edit_password']);
    Route::post('/users-edit-password', [UserController::class, 'update_password']);
    Route::get('/version', [DashboardController::class, 'version']);
});

require __DIR__.'/auth.php';
