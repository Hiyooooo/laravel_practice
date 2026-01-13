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



use App\Http\Controllers\Admin\AdminClassroomController;
use App\Http\Controllers\Admin\AdminSubjectController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\Admin\AdminGuardianController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\LoginController;
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

// Rute untuk Halaman Teacher
Route::get('/teachers', [TeacherController::class, 'teachers'])->name('teachers');

// Rute untuk halaman Subject
Route::get('/subjects', [SubjectController::class, 'subjects'])->name('subjects');

// Rute untuk halaman dashboard
Route::view('/dashboard', 'admin/dashboard')->name('dashboard');

// -- ADMIN MENU -- 

// Admin Student
Route::get('/admin/datasiswa', [AdminStudentController::class, 'index'])
    ->name('datasiswa.index');

Route::post('/admin/datasiswa', [AdminStudentController::class, 'store'])
    ->name('datasiswa.store');

Route::put('/admin/datasiswa/{id}', [AdminStudentController::class, 'update'])
    ->name('datasiswa.update');

Route::delete('/admin/datasiswa/{id}', [AdminStudentController::class, 'delete'])
    ->name('datasiswa.delete');


// Admin Classroom
Route::get('/admin/classroom', [AdminClassroomController::class, 'index'])
    ->name('classroom.index');

Route::post('/admin/classroom', [AdminClassroomController::class, 'store'])
    ->name('classroom.store');

Route::put('/admin/classroom/{id}', [AdminClassroomController::class, 'update'])
    ->name('classroom.update');

// Admin Guardian
Route::get('/admin/guardian', [AdminGuardianController::class, 'index'])
    ->name('guardian.index');

Route::post('/admin/guardian', [AdminGuardianController::class, 'store'])
    ->name('guardian.store');

Route::put('/admin/guardian/{id}', [AdminGuardianController::class, 'update'])
    ->name('guardian.update');

Route::delete('/admin/guardian/{id}', [AdminGuardianController::class, 'delete'])
    ->name('guardian.delete');


// Admin Teacher
Route::get('/admin/teacher', [AdminTeacherController::class, 'index'])
    ->name('teacher.index');
Route::post('/admin/teacher', [AdminTeacherController::class, 'store'])
    ->name('teacher.store');
Route::put('/admin/teacher/{id}', [AdminTeacherController::class, 'update'])
    ->name('teacher.update');
Route::delete('/admin/teacher/{id}', [AdminTeacherController::class, 'delete'])
    ->name('teacher.delete');

// Admin Subject
Route::get('/admin/subjects', [AdminSubjectController::class, 'index'])
    ->name('subject.index');

Route::post('/admin/subjects', [AdminSubjectController::class, 'store'])
    ->name('subject.store');

Route::put('/admin/subjects/{id}', [AdminSubjectController::class, 'update'])
    ->name('subject.update');

// Rute untuk halaman login
Route::get('/login', [LoginController::class, 'login'])->name('login');