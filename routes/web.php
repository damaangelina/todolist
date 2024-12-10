<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/navigasi', function () {
    return view('navigasi');
});

Route::get('/landing2', function () {
    return view('landing2');
});

Route::get('/landing3', function () {
    return view('landing3');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/beranda', function () {
    return view('beranda'); 
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/tugas',[TugasController::class, 'tampil'])->name('tugas.tampil');
Route::get('/tugas/tambah',[TugasController::class, 'tambah'])->name('tugas.tambah');
Route::post('/tugas/submit',[TugasController::class, 'submit'])->name('tugas.submit');
Route::get('/tugas/edit/{id}',[TugasController::class, 'edit'])->name('tugas.edit');
Route::post('/tugas/update/{id}',[TugasController::class, 'update'])->name('tugas.update');
Route::delete('/tugas/delete/{id}', [TugasController::class, 'delete'])->name('tugas.delete');
Route::get('/api/tugas', [TugasController::class, 'getTugas']);
Route::get('/tugas/cari', [TugasController::class, 'cari'])->name('tugas.cari');
Route::get('/tugas/sort', [TugasController::class, 'sort'])->name('tugas.sort');
