<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LampuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\GantiPasswordController;

Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'showlogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('/beranda', [BerandaController::class, 'index']);

    Route::get('/lampu', [LampuController::class, 'lampu']);
    Route::get('/lampu/create', [LampuController::class, 'lampucreate']);
    Route::post('/lampu/create', [LampuController::class, 'lampustore']);
    Route::get('/lampu/edit/{id}', [LampuController::class, 'lampuedit']);
    Route::post('/lampu/edit/{id}', [LampuController::class, 'lampuupdate']);
    Route::get('/lampu/delete/{id}', [LampuController::class, 'lampudelete']);
    Route::get('/lampu/aktif/{id}', [LampuController::class, 'lampuaktif']);


    Route::get('/pakan', [PakanController::class, 'pakan']);
    Route::get('/pakan/aktif/{id}', [PakanController::class, 'pakanaktif']);
    Route::get('/pakan/create', [PakanController::class, 'pakancreate']);
    Route::post('/pakan/create', [PakanController::class, 'pakanstore']);
    Route::get('/pakan/edit/{id}', [PakanController::class, 'pakanedit']);
    Route::post('/pakan/edit/{id}', [PakanController::class, 'pakanupdate']);
    Route::get('/pakan/delete/{id}', [PakanController::class, 'pakandelete']);

    Route::get('/galeri', [GaleriController::class, 'galeri']);
    Route::get('/galeri/create', [GaleriController::class, 'galericreate']);
    Route::post('/galeri/create', [GaleriController::class, 'galeristore']);
    Route::get('/galeri/edit/{id}', [GaleriController::class, 'galeriedit']);
    Route::post('/galeri/edit/{id}', [GaleriController::class, 'galeriupdate']);
    Route::get('/galeri/delete/{id}', [GaleriController::class, 'galeridelete']);

    Route::get('/tentang', [TentangController::class, 'tentang']);
    Route::get('/tentang/create', [TentangController::class, 'tentangcreate']);
    Route::post('/tentang/create', [TentangController::class, 'tentangstore']);
    Route::get('/tentang/edit/{id}', [TentangController::class, 'tentangedit']);
    Route::post('/tentang/edit/{id}', [TentangController::class, 'tentangupdate']);
    Route::get('/tentang/delete/{id}', [TentangController::class, 'tentangdelete']);

    Route::get('/data/masuk', [DataMasukController::class, 'index']);
    Route::get('/data/masuk/kirim/{id}', [DataMasukController::class, 'kirim']);
    Route::get('/data/masuk/delete/{id}', [DataMasukController::class, 'delete']);
});

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('/logout', [LogoutController::class, 'logout']);
    Route::get('/gantipassword', [GantiPasswordController::class, 'index']);
    Route::post('/gantipassword', [GantiPasswordController::class, 'update']);
});
