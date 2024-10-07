<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TenagaKerjaController;
use App\Http\Controllers\UploadController;


Route::resource('mahasiswa', MahasiswaController::class);
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

Route::resource('tenaga-kerja', TenagaKerjaController::class);
Route::get('/tenaga-kerja/create', [TenagaKerjaController::class, 'create'])->name('tenaga-kerja.create');
Route::post('/tenaga-kerja/store', [TenagaKerjaController::class, 'store'])->name('tenaga-kerja.store');
Route::get('/tenaga_kerja', [TenagaKerjaController::class, 'index'])->name('tenagaKerja.index');



Route::get('/upload', [UploadController::class, 'index'])->name('upload.index');
Route::post('/upload', [UploadController::class, 'upload'])->name('upload');

