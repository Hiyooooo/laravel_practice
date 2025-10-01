<?php

// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return "Selamat Datang di Website Saya";
// });

// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('beranda');
// });



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassroomController;


// Rute untuk Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk Halaman Profil
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');

// Rute untuk Halaman Kontak
Route::get('/kontak', [KontakController::class, 'kontak'])->name('kontak');

// Rute untuk Halaman Data Siswa
Route::get('/datasiswa', [DataSiswaController::class, 'datasiswa'])->name(name: 'datasiswa');

// Rute untuk Halaman Guardian
Route::get('/guardians', [GuardianController::class, 'guardians'])->name('guardians');

// Rute untuk Halaman Classroom
Route::get('/classrooms', [ClassroomController::class, 'classrooms'])->name('classrooms');

// Rute Resource untuk Data Siswa
Route::resource('datasiswa', DataSiswaController::class)->names([
    'index' => 'datasiswa',
]);

